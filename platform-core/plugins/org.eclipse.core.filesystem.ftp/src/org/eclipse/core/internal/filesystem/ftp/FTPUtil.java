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

import java.net.URL;
import org.eclipse.core.filesystem.EFS;
import org.eclipse.core.filesystem.provider.FileInfo;
import org.eclipse.core.runtime.IProgressMonitor;
import org.eclipse.core.runtime.SubProgressMonitor;
import org.eclipse.ftp.*;

public class FTPUtil {
	private static final ThreadLocal openClients = new ThreadLocal();

	public static IClient createClient(URL url) throws FtpException {
		IClient client = Ftp.createClient(url);
		client.setDataTransferMode(IClient.PASSIVE_DATA_TRANSFER, true);
		client.setAuthentication(KeyRing.USER, KeyRing.PASS);
		client.setTimeout(30);
		return client;
	}

	public static IClient getClient() {
		return (IClient) openClients.get();
	}

	/**
	 * Use this method to ensure that the same connection is used for multiple commands
	 * issued from the same thread.
	 */
	public static void run(URL url, IFtpRunnable runnable, IProgressMonitor monitor) throws FtpException {
		monitor = Policy.monitorFor(monitor);
		IClient openClient = (IClient) openClients.get();
		monitor.beginTask("", 100);
		//if the wrong client is connected, disconnect before trying again
		if (openClient != null && !openClient.getUrl().equals(url)) {
			openClient.close(new SubProgressMonitor(monitor, 0));
			openClient = null;
		}
		if (openClient == null) {
			openClient = createClient(url);
			openClient.open(new SubProgressMonitor(monitor, 5));
			String path = url.getPath();
			if (path.length() >0) {
				try {
					openClient.changeDirectory(path, new SubProgressMonitor(monitor, 5));
				} catch (Exception e) {
					System.out.println("cannot change into path " + path);
				}
			}
			openClients.set(openClient);
		}
		runnable.run(new SubProgressMonitor(monitor, 90));
		//just leave the client open to reuse the connection
	}

	/**
	 * Converts a directory entry to a file info
	 * @return The file information for a directory entry
	 */
	public static FileInfo entryToFileInfo(IDirectoryEntry entry) {
		FileInfo info = new FileInfo(entry.getName());
		info.setExists(true);
		info.setLastModified(entry.getModTime().getTime());
		info.setLength(entry.getSize());
		info.setDirectory(entry.hasDirectorySemantics());
		return info;
	}
}
