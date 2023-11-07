/**********************************************************************
 * Copyright (c) 2005, 2006 IBM Corporation and others. All rights reserved.   This
 * program and the accompanying materials are made available under the terms of
 * the Common Public License v1.0 which accompanies this distribution, and is
 * available at http://www.eclipse.org/legal/cpl-v10.html
 * 
 * Contributors: 
 * IBM - Initial API and implementation
 * Tianchao Li (lit@in.tum.de) - Partially fix bug #137878
 **********************************************************************/
package org.eclipse.core.internal.filesystem.ftp;

import java.io.*;
import java.net.*;
import org.eclipse.core.filesystem.*;
import org.eclipse.core.filesystem.provider.FileInfo;
import org.eclipse.core.filesystem.provider.FileStore;
import org.eclipse.core.runtime.*;
import org.eclipse.ftp.*;
import org.eclipse.ftp.internal.FTPDirectoryEntry;

/**
 * Implementation of FileStore for accessing files using file transfer protocol (FTP).
 */
public class FTPFile extends FileStore {
	protected final IPath relativePath;
	protected final URL root;

	/* requirement of root and relativePath
	   root:
	    (correct)
	    "ftp://ftp.leo.org" 
	    "ftp://ftp.leo.org/test" 
	    (probably correct)
	    "ftp://ftp.leo.org/"
	    "ftp://ftp.leo.org/test/"
	   relativePath:
	    (correct)
	    ""
	    "test/welcome.txt"
	    "welcome.txt"
	    (probably wrong?)
	    "/test/welcome.txt"
	    "/welcome.txt"
	*/
	public FTPFile(URL root, IPath relativePath) {
		this.root = root;
		this.relativePath = relativePath;
	}

	public IFileInfo[] childInfos(int options, IProgressMonitor monitor) {
		final IDirectoryEntry[] entries = listFiles(monitor, false);
		if (entries == null)
			return EMPTY_FILE_INFO_ARRAY;
		IFileInfo[] infos = new IFileInfo[entries.length];
		for (int i = 0; i < entries.length; i++) {
			infos[i] = FTPUtil.entryToFileInfo(entries[i]);
		}
		return infos;
	}

	public String[] childNames(int options, IProgressMonitor monitor) {
		final IDirectoryEntry[] entries = listFiles(monitor, false);
		if (entries == null)
			return EMPTY_STRING_ARRAY;
		String[] names = new String[entries.length];
		for (int i = 0; i < entries.length; i++) {
			names[i] = entries[i].getName();
		}
		return names;
	}

	private IFileInfo createMissingInfo(String myName) {
		FileInfo info = new FileInfo(myName);
		info.setExists(false);
		return info;
	}

	public void delete(int options, IProgressMonitor monitor) throws CoreException {
		FTPUtil.run(root, new IFtpRunnable() {
			public void run(IProgressMonitor pm) throws FtpException {
				if (fetchInfo().isDirectory()) {
					FTPUtil.getClient().deleteDirectory(relativePath.toString(), pm);
				} else {
					FTPUtil.getClient().deleteFile(relativePath.toString(), pm);
				}
			}
		}, monitor);
	}

	public IFileInfo fetchInfo(int options, IProgressMonitor monitor) {
		if (relativePath.isEmpty())
			return fetchRootInfo(options, monitor);
		String myName = getName();
		try {
			IFileInfo[] infos = getParent().childInfos(options, monitor);
			for (int i = 0; i < infos.length; i++) {
				if (myName.equals(infos[i].getName()))
					return infos[i];
			}
		} catch (CoreException e) {
			//ignore and fall through below
		}
		//this file doesn't exist - that's fine
		return createMissingInfo(myName);
	}

	/**
	 * Since the root element has no parent directory, we must
	 * list its own contents and then return the directory information
	 * for the self reference directory entry (".").
	 * 
	 * @return File info for the root element
	 */
	private IFileInfo fetchRootInfo(int options, IProgressMonitor monitor) {
		IDirectoryEntry[] entries = listFiles(monitor, true);
		for (int i = 0; i < entries.length; i++) {
			if (entries[i].getName().equals(".")) {//$NON-NLS-1$
				FileInfo info = FTPUtil.entryToFileInfo(entries[i]);
				info.setName(getName());
				return info;
			}
		}
		return createMissingInfo(getName());
	}

	public IFileStore getChild(String name) {
		return new FTPFile(root, relativePath.append(name));
	}

	public IFileSystem getFileSystem() {
		return FTPFileSystem.getInstance();
	}

	public String getName() {
		if (!relativePath.isEmpty())
			return relativePath.lastSegment();
		//this is the root resource, so use the last segment of the URL path
		String pathPart = root.getPath();
		int offset = pathPart.lastIndexOf('/');
		if (offset >= 0)
			return pathPart.substring(offset);
		//if there is only one segment, return it
		if (pathPart.length() > 0)
			return pathPart;
		return root.getHost();
	}

	public IFileStore getParent() {
		if (!relativePath.isEmpty())
			return new FTPFile(root, relativePath.removeLastSegments(1));
		//the root has no parent
		return null;
	}

	private IDirectoryEntry[] listFiles(IProgressMonitor monitor, final boolean includeParents) {
		final IDirectoryEntry[][] entries = new FTPDirectoryEntry[1][0];
		try {
			FTPUtil.run(root, new IFtpRunnable() {
				public void run(IProgressMonitor pm) throws FtpException {
					entries[0] = FTPUtil.getClient().listFiles(relativePath.toString(), includeParents, pm);
				}
			}, monitor);
		} catch (FtpException e) {
			Policy.log(IStatus.ERROR, "Error listing files from FTP file", e); //$NON-NLS-1$
		}
		return entries[0];
	}

	public IFileStore mkdir(int options, IProgressMonitor monitor) throws CoreException {
		//FTP fails a create attempt when the file or directory already exists,
		//so we must first check for existence.
		final IFileInfo fileInfo = fetchInfo();
		if (fileInfo.exists()) {
			if (!fileInfo.isDirectory()) {
				String message = "A directory could not be created because a file exists with the same name: " + toString();
				Policy.error(EFS.ERROR_WRONG_TYPE, message);
			}
			return this;
		}

		//create a directory
		FTPUtil.run(root, new IFtpRunnable() {
			public void run(IProgressMonitor pm) throws FtpException {
				FTPUtil.getClient().createDirectory(relativePath.toString(), pm);
			}
		}, monitor);
		return this;
	}

	public InputStream openInputStream(int options, IProgressMonitor monitor) throws CoreException {
		final InputStream[] result = new InputStream[1];
		FTPUtil.run(root, new IFtpRunnable() {
			public void run(IProgressMonitor pm) throws FtpException {
				result[0] = FTPUtil.getClient().getFile(relativePath.toString(), true, 0, pm);
			}
		}, monitor);
		return result[0];
	}

	public OutputStream openOutputStream(int options, final IProgressMonitor monitor) throws CoreException {
		return new ByteArrayOutputStream() {
			public void close() throws IOException {
				byte[] bytes = toByteArray();
				try {
					FTPFile.this.write(new ByteArrayInputStream(bytes), bytes.length, monitor);
				} catch (CoreException e) {
					throw new IOException(e.getMessage());
				}
			}
		};
	}

	public void putInfo(IFileInfo info, int options, IProgressMonitor monitor) throws CoreException {
		Policy.error(EFS.ERROR_WRITE, "The putInfo method is not implemented");
	}

	/* (non-Javadoc)
	 * @see org.eclipse.core.filesystem.IFileStore#toString()
	 */
	public String toString() {
		StringBuffer result = new StringBuffer(root.toString());
		int len = result.length();
		//make sure there is a slash separating root and relative path
		if (len > 0 && result.charAt(len - 1) != '/')
			result.append('/');
		result.append(relativePath.toString());
		return result.toString();
	}

	public URI toURI() {
		try {
			return (new URI(toString()));
		} catch (URISyntaxException e) {
			throw new RuntimeException(e);
		}
	}

	void write(final InputStream stream, final int size, IProgressMonitor monitor) throws CoreException {
		FTPUtil.run(root, new IFtpRunnable() {
			public void run(IProgressMonitor pm) throws FtpException {
				FTPUtil.getClient().putFile(relativePath.toString(), stream, size, true, pm);
			}
		}, monitor);
	}
}