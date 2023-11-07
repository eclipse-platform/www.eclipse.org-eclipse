/*******************************************************************************
 * Copyright (c) 2004, 2010 IBM Corporation and others.
 * All rights reserved. This program and the accompanying materials
 * are made available under the terms of the Eclipse Public License v1.0
 * which accompanies this distribution, and is available at
 * http://www.eclipse.org/legal/epl-v10.html
 *
 * Contributors:
 *     IBM Corporation - initial API and implementation
 *     Red Hat, Inc - extensive changes to allow importing of Archive Files
 *     Philippe Ombredanne (pombredanne@nexb.com)
 *     		- Bug 101180 [Import/Export] Import Existing Project into Workspace default widget is back button , should be text field
 *     Martin Oberhuber (martin.oberhuber@windriver.com)
 *     		- Bug 187318[Wizards] "Import Existing Project" loops forever with cyclic symbolic links
 *     Remy Chi Jian Suen  (remy.suen@gmail.com)
 *     		- Bug 210568 [Import/Export] [Import/Export] - Refresh button does not update list of projects
 *     Francis Lynch (Wind River) - adapted from standard project import wizard
 *******************************************************************************/
package org.eclipse.ui.ide.examples.projectsnapshot;

import java.io.File;
import java.io.IOException;
import java.lang.reflect.InvocationTargetException;
import java.net.URI;
import java.util.ArrayList;
import java.util.Collection;
import java.util.HashSet;
import java.util.Iterator;
import java.util.List;
import java.util.Set;

import org.eclipse.core.resources.IProject;
import org.eclipse.core.resources.IProjectDescription;
import org.eclipse.core.resources.IResource;
import org.eclipse.core.resources.IWorkspace;
import org.eclipse.core.resources.ResourcesPlugin;
import org.eclipse.core.runtime.CoreException;
import org.eclipse.core.runtime.IPath;
import org.eclipse.core.runtime.IProgressMonitor;
import org.eclipse.core.runtime.IStatus;
import org.eclipse.core.runtime.OperationCanceledException;
import org.eclipse.core.runtime.Path;
import org.eclipse.core.runtime.Platform;
import org.eclipse.core.runtime.Status;
import org.eclipse.core.runtime.SubProgressMonitor;
import org.eclipse.jface.dialogs.Dialog;
import org.eclipse.jface.dialogs.ErrorDialog;
import org.eclipse.jface.dialogs.IDialogConstants;
import org.eclipse.jface.dialogs.IDialogSettings;
import org.eclipse.jface.dialogs.MessageDialog;
import org.eclipse.jface.operation.IRunnableWithProgress;
import org.eclipse.jface.viewers.CheckStateChangedEvent;
import org.eclipse.jface.viewers.CheckboxTreeViewer;
import org.eclipse.jface.viewers.ICheckStateListener;
import org.eclipse.jface.viewers.ITreeContentProvider;
import org.eclipse.jface.viewers.LabelProvider;
import org.eclipse.jface.viewers.Viewer;
import org.eclipse.jface.viewers.ViewerComparator;
import org.eclipse.jface.wizard.WizardPage;
import org.eclipse.osgi.util.NLS;
import org.eclipse.swt.SWT;
import org.eclipse.swt.events.FocusAdapter;
import org.eclipse.swt.events.SelectionAdapter;
import org.eclipse.swt.events.SelectionEvent;
import org.eclipse.swt.events.TraverseEvent;
import org.eclipse.swt.events.TraverseListener;
import org.eclipse.swt.layout.GridData;
import org.eclipse.swt.layout.GridLayout;
import org.eclipse.swt.widgets.Button;
import org.eclipse.swt.widgets.Composite;
import org.eclipse.swt.widgets.DirectoryDialog;
import org.eclipse.swt.widgets.Label;
import org.eclipse.swt.widgets.Text;
import org.eclipse.ui.actions.WorkspaceModifyOperation;
import org.eclipse.ui.dialogs.IOverwriteQuery;
import org.eclipse.ui.internal.ide.IDEWorkbenchPlugin;
import org.eclipse.ui.internal.ide.StatusUtil;
import org.eclipse.ui.statushandlers.StatusManager;

/**
 * The ProjectRefreshSnapshotImportWizardPage is the page that allows the user
 * to import projects from a particular location with refresh snapshots.
 */
public class ProjectRefreshSnapshotImportWizardPage extends WizardPage
		implements IOverwriteQuery {

	/**
	 * The name of the folder containing metadata information for the workspace.
	 */
	public static final String METADATA_FOLDER = ".metadata"; //$NON-NLS-1$

	/**
	 * Class declared public only for test suite.
	 */
	public class ProjectRecord {
		File projectSystemFile;

		String projectName;

		Object parent;

		int level;

		IProjectDescription description;

		/**
		 * Create a record for a project based on the info in the file.
		 */
		ProjectRecord(File file) {
			projectSystemFile = file;
			setProjectName();
		}

		/**
		 * Set the name of the project based on the projectFile.
		 */
		private void setProjectName() {
			try {

				// If we don't have the project name try again
				if (projectName == null) {
					IPath path = new Path(projectSystemFile.getPath());
					// if the file is in the default location, use the directory
					// name as the project name
					if (isDefaultLocation(path)) {
						projectName = path.segment(path.segmentCount() - 2);
						description = IDEWorkbenchPlugin.getPluginWorkspace()
								.newProjectDescription(projectName);
					} else {
						description = IDEWorkbenchPlugin.getPluginWorkspace()
								.loadProjectDescription(path);
						projectName = description.getName();
					}

				}
			} catch (CoreException e) {
				// no good couldn't get the name
			}
		}

		/**
		 * Returns whether the given project description file path is in the
		 * default location for a project
		 * 
		 * @param path
		 *            The path to examine
		 * @return Whether the given path is the default location for a project
		 */
		private boolean isDefaultLocation(IPath path) {
			// The project description file must at least be within the project,
			// which is within the workspace location
			if (path.segmentCount() < 2)
				return false;
			return path.removeLastSegments(2).toFile()
					.equals(Platform.getLocation().toFile());
		}

		/**
		 * Get the name of the project
		 * 
		 * @return String
		 */
		public String getProjectName() {
			return projectName;
		}

		/**
		 * Gets the label to be used when rendering this project record in the
		 * UI.
		 * 
		 * @return String the label
		 * @since 3.4
		 */
		public String getProjectLabel() {
			if (description == null)
				return projectName;

			String path = projectSystemFile.getParent();

			return NLS
					.bind(Messages.ProjectRefreshSnapshotImportWizardPage_projectLabel,
							projectName, path);
		}
	}

	// dialog store id constants
	private final static String STORE_RECURSE_SUBFOLDERS = "WizardProjectRefreshSnapshotImportPage.STORE__RECURSE_SUBFOLDERS_ID"; //$NON-NLS-1$

	private Text directoryPathField;

	private Text directorySnapshotPathField;

	private CheckboxTreeViewer projectsList;

	private Button recurseIntoSubFoldersCheckbox;

	private boolean recurseIntoSubFolders = false;

	private ProjectRecord[] selectedProjects = new ProjectRecord[0];

	// Keep track of the directory that we browsed to last time
	// the wizard was invoked.
	private static String previouslyBrowsedDirectory = ""; //$NON-NLS-1$

	private static String previouslyBrowsedSnapshotDirectory = ""; //$NON-NLS-1$

	private Button browseDirectoriesButton;

	private Button browseSnapshotDirectoryButton;

	private IProject[] wsProjects;

	// The last selected path to minimize searches
	private String lastPath;

	// The last time that the file or folder at the selected path was modified
	// to minimize searches
	private long lastModified;

	// The last selected snapshot directory path
	private String lastSnapshotPath;

	// The last time the snapshot folder was modified
	private long lastSnapshotModified;

	/**
	 * Creates a new project creation wizard page.
	 */
	public ProjectRefreshSnapshotImportWizardPage() {
		this("refreshSnapshotImportPage"); //$NON-NLS-1$
	}

	/**
	 * Create a new instance of the receiver.
	 */
	public ProjectRefreshSnapshotImportWizardPage(String pageName) {
		super(pageName);
		setPageComplete(false);
		setTitle(Messages.ProjectRefreshSnapshotImportWizardPage_title);
		setDescription(Messages.ProjectRefreshSnapshotImportWizardPage_description);
	}

	/*
	 * (non-Javadoc)
	 * 
	 * @see
	 * org.eclipse.jface.dialogs.IDialogPage#createControl(org.eclipse.swt.widgets
	 * .Composite)
	 */
	public void createControl(Composite parent) {

		initializeDialogUnits(parent);

		Composite workArea = new Composite(parent, SWT.NONE);
		setControl(workArea);

		workArea.setLayout(new GridLayout());
		workArea.setLayoutData(new GridData(GridData.FILL_BOTH
				| GridData.GRAB_HORIZONTAL | GridData.GRAB_VERTICAL));

		createProjectsRoot(workArea);
		createProjectsList(workArea);
		createOptionsArea(workArea);
		createSnapshotArea(workArea);
		restoreWidgetValues();
		Dialog.applyDialogFont(workArea);

	}

	private void checkForComplete() {
		if (projectsList.getCheckedElements().length > 0) {
			String path = directorySnapshotPathField.getText().trim();
			if (path.length() > 0) {
				File dirpath = new File(path);
				if (dirpath.exists()) {
					setPageComplete(true);
					return;
				}
			}
		}

		setPageComplete(false);
	}

	/**
	 * Create the checkbox list for the found projects.
	 */
	private void createProjectsList(Composite workArea) {

		Label title = new Label(workArea, SWT.NONE);
		title.setText(Messages.ProjectRefreshSnapshotImportWizardPage_selectProject);

		Composite listComposite = new Composite(workArea, SWT.NONE);
		GridLayout layout = new GridLayout();
		layout.numColumns = 2;
		layout.marginWidth = 0;
		layout.makeColumnsEqualWidth = false;
		listComposite.setLayout(layout);

		listComposite.setLayoutData(new GridData(GridData.GRAB_HORIZONTAL
				| GridData.GRAB_VERTICAL | GridData.FILL_BOTH));

		projectsList = new CheckboxTreeViewer(listComposite, SWT.BORDER);
		GridData listData = new GridData(GridData.GRAB_HORIZONTAL
				| GridData.GRAB_VERTICAL | GridData.FILL_BOTH);
		listData.heightHint = 100;
		projectsList.getControl().setLayoutData(listData);

		projectsList.setContentProvider(new ITreeContentProvider() {

			/*
			 * (non-Javadoc)
			 * 
			 * @see
			 * org.eclipse.jface.viewers.ITreeContentProvider#getChildren(java
			 * .lang.Object)
			 */
			public Object[] getChildren(Object parentElement) {
				return null;
			}

			/*
			 * (non-Javadoc)
			 * 
			 * @see
			 * org.eclipse.jface.viewers.IStructuredContentProvider#getElements
			 * (java.lang.Object)
			 */
			public Object[] getElements(Object inputElement) {
				return getValidProjects();
			}

			/*
			 * (non-Javadoc)
			 * 
			 * @see
			 * org.eclipse.jface.viewers.ITreeContentProvider#hasChildren(java
			 * .lang.Object)
			 */
			public boolean hasChildren(Object element) {
				return false;
			}

			/*
			 * (non-Javadoc)
			 * 
			 * @see
			 * org.eclipse.jface.viewers.ITreeContentProvider#getParent(java
			 * .lang.Object)
			 */
			public Object getParent(Object element) {
				return null;
			}

			/*
			 * (non-Javadoc)
			 * 
			 * @see org.eclipse.jface.viewers.IContentProvider#dispose()
			 */
			public void dispose() {

			}

			/*
			 * (non-Javadoc)
			 * 
			 * @see
			 * org.eclipse.jface.viewers.IContentProvider#inputChanged(org.eclipse
			 * .jface.viewers.Viewer, java.lang.Object, java.lang.Object)
			 */
			public void inputChanged(Viewer viewer, Object oldInput,
					Object newInput) {
			}

		});

		projectsList.setLabelProvider(new LabelProvider() {
			/*
			 * (non-Javadoc)
			 * 
			 * @see
			 * org.eclipse.jface.viewers.LabelProvider#getText(java.lang.Object)
			 */
			public String getText(Object element) {
				return ((ProjectRecord) element).getProjectLabel();
			}
		});

		projectsList.addCheckStateListener(new ICheckStateListener() {
			/*
			 * (non-Javadoc)
			 * 
			 * @see
			 * org.eclipse.jface.viewers.ICheckStateListener#checkStateChanged
			 * (org.eclipse.jface.viewers.CheckStateChangedEvent)
			 */
			public void checkStateChanged(CheckStateChangedEvent event) {
				checkForComplete();
			}
		});

		projectsList.setInput(this);
		projectsList.setComparator(new ViewerComparator());
	}

	/**
	 * Create the area to specify the snapshot directory.
	 */
	private void createSnapshotArea(Composite workArea) {

		// project specification group
		Composite projectGroup = new Composite(workArea, SWT.NONE);
		GridLayout layout = new GridLayout();
		layout.numColumns = 3;
		layout.makeColumnsEqualWidth = false;
		layout.marginWidth = 0;
		projectGroup.setLayout(layout);
		projectGroup.setLayoutData(new GridData(GridData.FILL_HORIZONTAL));

		Label title = new Label(projectGroup, SWT.NONE);
		title.setText(Messages.ProjectRefreshSnapshotImportWizardPage_selectSnapshot);

		// refresh snapshot directory location entry field
		this.directorySnapshotPathField = new Text(projectGroup, SWT.BORDER);

		this.directorySnapshotPathField.setLayoutData(new GridData(
				GridData.FILL_HORIZONTAL | GridData.GRAB_HORIZONTAL));

		// browse button
		browseSnapshotDirectoryButton = new Button(projectGroup, SWT.PUSH);
		browseSnapshotDirectoryButton
				.setText(Messages.ProjectRefreshSnapshotImportWizardPage_snapshotBrowse);
		setButtonLayoutData(browseSnapshotDirectoryButton);

		browseSnapshotDirectoryButton
				.addSelectionListener(new SelectionAdapter() {
					/*
					 * (non-Javadoc)
					 * 
					 * @see org.eclipse.swt.events.SelectionAdapter#widgetS
					 * elected(org.eclipse.swt.events.SelectionEvent)
					 */
					public void widgetSelected(SelectionEvent e) {
						handleLocationSnapshotDirectoryButtonPressed();
					}
				});

		directorySnapshotPathField.addTraverseListener(new TraverseListener() {

			/*
			 * (non-Javadoc)
			 * 
			 * @see org.eclipse.swt.events.TraverseListener#keyTraversed(
			 * org.eclipse.swt.events.TraverseEvent)
			 */
			public void keyTraversed(TraverseEvent e) {
				if (e.detail == SWT.TRAVERSE_RETURN) {
					e.doit = false;
					updateSnapshotPath(directorySnapshotPathField.getText()
							.trim());
					checkForComplete();
				}
			}

		});

		directorySnapshotPathField.addFocusListener(new FocusAdapter() {

			/*
			 * (non-Javadoc)
			 * 
			 * @see
			 * org.eclipse.swt.events.FocusListener#focusLost(org.eclipse.swt
			 * .events.FocusEvent)
			 */
			public void focusLost(org.eclipse.swt.events.FocusEvent e) {
				updateSnapshotPath(directorySnapshotPathField.getText().trim());
			}

		});

	}

	/**
	 * Create the area with the extra options.
	 */
	private void createOptionsArea(Composite workArea) {
		Composite optionsGroup = new Composite(workArea, SWT.NONE);
		optionsGroup.setLayout(new GridLayout());
		optionsGroup.setLayoutData(new GridData(GridData.FILL_HORIZONTAL));

		recurseIntoSubFoldersCheckbox = new Button(optionsGroup, SWT.CHECK);
		recurseIntoSubFoldersCheckbox
				.setText(Messages.ProjectRefreshSnapshotImportWizardPage_recurse);
		recurseIntoSubFoldersCheckbox.setLayoutData(new GridData(
				GridData.FILL_HORIZONTAL));
		recurseIntoSubFoldersCheckbox
				.addSelectionListener(new SelectionAdapter() {
					public void widgetSelected(SelectionEvent e) {
						recurseIntoSubFolders = recurseIntoSubFoldersCheckbox
								.getSelection();
						lastPath = null; // force update
						updateProjectsList(directoryPathField.getText().trim());
					}
				});
	}

	/**
	 * Create the area where you select the root directory for the projects.
	 * 
	 * @param workArea
	 *            Composite
	 */
	private void createProjectsRoot(Composite workArea) {

		// project specification group
		Composite projectGroup = new Composite(workArea, SWT.NONE);
		GridLayout layout = new GridLayout();
		layout.numColumns = 3;
		layout.makeColumnsEqualWidth = false;
		layout.marginWidth = 0;
		projectGroup.setLayout(layout);
		projectGroup.setLayoutData(new GridData(GridData.FILL_HORIZONTAL));

		Label dirTitle = new Label(projectGroup, SWT.NONE);
		dirTitle.setText(Messages.ProjectRefreshSnapshotImportWizardPage_sourceDirectory);

		// project location entry field
		this.directoryPathField = new Text(projectGroup, SWT.BORDER);

		this.directoryPathField.setLayoutData(new GridData(
				GridData.FILL_HORIZONTAL | GridData.GRAB_HORIZONTAL));

		// browse button
		browseDirectoriesButton = new Button(projectGroup, SWT.PUSH);
		browseDirectoriesButton
				.setText(Messages.ProjectRefreshSnapshotImportWizardPage_sourceBrowse);
		setButtonLayoutData(browseDirectoriesButton);

		browseDirectoriesButton.addSelectionListener(new SelectionAdapter() {
			/*
			 * (non-Javadoc)
			 * 
			 * @see org.eclipse.swt.events.SelectionAdapter#widgetS
			 * elected(org.eclipse.swt.events.SelectionEvent)
			 */
			public void widgetSelected(SelectionEvent e) {
				handleLocationDirectoryButtonPressed();
			}

		});

		directoryPathField.addTraverseListener(new TraverseListener() {

			/*
			 * (non-Javadoc)
			 * 
			 * @see
			 * org.eclipse.swt.events.TraverseListener#keyTraversed(org.eclipse
			 * .swt.events.TraverseEvent)
			 */
			public void keyTraversed(TraverseEvent e) {
				if (e.detail == SWT.TRAVERSE_RETURN) {
					e.doit = false;
					updateProjectsList(directoryPathField.getText().trim());
				}
			}

		});

		directoryPathField.addFocusListener(new FocusAdapter() {

			/*
			 * (non-Javadoc)
			 * 
			 * @see
			 * org.eclipse.swt.events.FocusListener#focusLost(org.eclipse.swt
			 * .events.FocusEvent)
			 */
			public void focusLost(org.eclipse.swt.events.FocusEvent e) {
				updateProjectsList(directoryPathField.getText().trim());
			}

		});
	}

	/*
	 * (non-Javadoc) Method declared on IDialogPage. Set the focus on path
	 * fields when page becomes visible.
	 */
	public void setVisible(boolean visible) {
		super.setVisible(visible);
		if (visible) {
			this.directoryPathField.setFocus();
		}
	}

	/**
	 * Update the list of projects based on path. Method declared public only
	 * for test suite.
	 */
	public void updateProjectsList(final String path) {
		// on an empty path empty selectedProjects
		if (path == null || path.length() == 0) {
			setMessage(Messages.ProjectRefreshSnapshotImportWizardPage_selectProjects);
			selectedProjects = new ProjectRecord[0];
			projectsList.refresh(true);
			projectsList.setCheckedElements(selectedProjects);
			checkForComplete();
			lastPath = path;
			return;
		}

		final File directory = new File(path);
		long modified = directory.lastModified();
		if (path.equals(lastPath) && lastModified == modified) {
			// since the file/folder was not modified and the path did not
			// change, no refreshing is required
			return;
		}

		lastPath = path;
		lastModified = modified;

		try {
			getContainer().run(true, true, new IRunnableWithProgress() {

				/*
				 * (non-Javadoc)
				 * 
				 * @see
				 * org.eclipse.jface.operation.IRunnableWithProgress#run(org
				 * .eclipse.core.runtime.IProgressMonitor)
				 */
				public void run(IProgressMonitor monitor) {

					boolean dirSelected = true;

					monitor.beginTask(
							Messages.ProjectRefreshSnapshotImportWizardPage_searching,
							100);
					selectedProjects = new ProjectRecord[0];
					Collection files = new ArrayList();
					monitor.worked(10);

					File dirpath = new File(path);
					if (dirpath.exists()) {
						dirSelected = true;
					}

					if (dirSelected && directory.isDirectory()) {

						if (!collectProjectFilesFromDirectory(files, directory,
								null, monitor)) {
							return;
						}
						Iterator filesIterator = files.iterator();
						selectedProjects = new ProjectRecord[files.size()];
						int index = 0;
						monitor.worked(50);
						monitor.subTask(Messages.ProjectRefreshSnapshotImportWizardPage_processing);
						while (filesIterator.hasNext()) {
							File file = (File) filesIterator.next();
							selectedProjects[index] = new ProjectRecord(file);
							index++;
						}
					} else {
						monitor.worked(60);
					}
					monitor.done();
				}

			});
		} catch (InvocationTargetException e) {
			IDEWorkbenchPlugin.log(e.getMessage(), e);
		} catch (InterruptedException e) {
			// Nothing to do if the user interrupts.
		}

		projectsList.refresh(true);
		projectsList.setCheckedElements(getValidProjects());
		if (getValidProjects().length < selectedProjects.length) {
			setMessage(
					Messages.ProjectRefreshSnapshotImportWizardPage_hiddenProjects,
					WARNING);
		} else {
			setMessage(Messages.ProjectRefreshSnapshotImportWizardPage_description);
		}
		checkForComplete();
	}

	/**
	 * Update the refresh snapshot directory if it has changed. Causes the
	 * projects list to be updated as well, if it has changed.
	 */
	private void updateSnapshotPath(final String path) {
		// on an empty path empty selectedProjects
		if (path == null || path.length() == 0) {
			setMessage(Messages.ProjectRefreshSnapshotImportWizardPage_selectProjects);
			selectedProjects = new ProjectRecord[0];
			projectsList.refresh(true);
			projectsList.setCheckedElements(selectedProjects);
			checkForComplete();
			lastPath = path;
			return;
		}

		final File directory = new File(path);
		long modified = directory.lastModified();
		if (path.equals(lastSnapshotPath) && lastSnapshotModified == modified) {
			// since the file/folder was not modified and the path did not
			// change, no refreshing is required
			return;
		}

		lastSnapshotPath = path;
		lastSnapshotModified = modified;
		lastPath = null; // force update of projects list
		updateProjectsList(directoryPathField.getText().trim());
		checkForComplete();
	}

	/**
	 * Display an error dialog with the specified message.
	 * 
	 * @param message
	 *            the error message
	 */
	protected void displayErrorDialog(String message) {
		MessageDialog.openError(getContainer().getShell(),
				getErrorDialogTitle(), message);
	}

	/**
	 * Get the title for an error dialog. Subclasses should override.
	 */
	protected String getErrorDialogTitle() {
		return Messages.ProjectRefreshSnapshotImportWizardPage_internalError;
	}

	/**
	 * Get the title for an error dialog. Subclasses should override.
	 */
	protected String getInformationDialogTitle() {
		return Messages.ProjectRefreshSnapshotImportWizardPage_snapshotError;
	}

	/**
	 * Collect the list of .project files that are under directory into files.
	 * To avoid potential performance degradation on slow file systems, by
	 * default only the files in this directory are collected; no recursion into
	 * sub-directories is performed unless the user checks the "recurse into
	 * subfolders" flag.
	 * 
	 * @param monitor
	 *            The monitor to report to
	 * @return boolean <code>true</code> if the operation was completed.
	 */
	private boolean collectProjectFilesFromDirectory(Collection files,
			File directory, Set directoriesVisited, IProgressMonitor monitor) {

		if (monitor.isCanceled()) {
			return false;
		}
		monitor.subTask(NLS.bind(
				Messages.ProjectRefreshSnapshotImportWizardPage_checking,
				directory.getPath()));
		File[] contents = directory.listFiles();
		if (contents == null)
			return false;

		// Initialize recursion guard for recursive symbolic links
		if (directoriesVisited == null) {
			directoriesVisited = new HashSet();
			try {
				directoriesVisited.add(directory.getCanonicalPath());
			} catch (IOException exception) {
				StatusManager.getManager().handle(
						StatusUtil.newStatus(IStatus.ERROR,
								exception.getLocalizedMessage(), exception));
			}
		}

		// first look for project description files
		final String dotProject = IProjectDescription.DESCRIPTION_FILE_NAME;
		for (int i = 0; i < contents.length; i++) {
			File file = contents[i];
			if (file.isFile() && file.getName().equals(dotProject)) {
				files.add(file);
				// don't search sub-directories since we can't have nested
				// projects
				return true;
			}
		}
		if (!recurseIntoSubFolders)
			return true;
		// no project description found, so recurse into sub-directories
		for (int i = 0; i < contents.length; i++) {
			if (contents[i].isDirectory()) {
				if (!contents[i].getName().equals(METADATA_FOLDER)) {
					try {
						String canonicalPath = contents[i].getCanonicalPath();
						if (!directoriesVisited.add(canonicalPath)) {
							// already been here --> do not recurse
							continue;
						}
					} catch (IOException exception) {
						StatusManager.getManager().handle(
								StatusUtil.newStatus(IStatus.ERROR,
										exception.getLocalizedMessage(),
										exception));

					}
					collectProjectFilesFromDirectory(files, contents[i],
							directoriesVisited, monitor);
				}
			}
		}
		return true;
	}

	/**
	 * The browse button has been selected. Select the location.
	 */
	protected void handleLocationDirectoryButtonPressed() {

		DirectoryDialog dialog = new DirectoryDialog(
				directoryPathField.getShell());
		dialog.setMessage(Messages.ProjectRefreshSnapshotImportWizardPage_browseSource);

		String dirName = directoryPathField.getText().trim();
		if (dirName.length() == 0) {
			dirName = previouslyBrowsedDirectory;
		}

		if (dirName.length() == 0) {
			dialog.setFilterPath(IDEWorkbenchPlugin.getPluginWorkspace()
					.getRoot().getLocation().toOSString());
		} else {
			File path = new File(dirName);
			if (path.exists()) {
				dialog.setFilterPath(new Path(dirName).toOSString());
			}
		}

		String selectedDirectory = dialog.open();
		if (selectedDirectory != null) {
			previouslyBrowsedDirectory = selectedDirectory;
			directoryPathField.setText(previouslyBrowsedDirectory);
			updateProjectsList(selectedDirectory);
		}

	}

	/**
	 * The browse button has been selected. Select the location.
	 */
	protected void handleLocationSnapshotDirectoryButtonPressed() {

		DirectoryDialog dialog = new DirectoryDialog(
				directorySnapshotPathField.getShell());
		dialog.setMessage(Messages.ProjectRefreshSnapshotImportWizardPage_browseSnapshot);

		String dirName = directorySnapshotPathField.getText().trim();
		if (dirName.length() == 0) {
			dirName = previouslyBrowsedSnapshotDirectory;
		}

		if (dirName.length() == 0) {
			dialog.setFilterPath(IDEWorkbenchPlugin.getPluginWorkspace()
					.getRoot().getLocation().toOSString());
		} else {
			File path = new File(dirName);
			if (path.exists()) {
				dialog.setFilterPath(new Path(dirName).toOSString());
			}
		}

		String selectedDirectory = dialog.open();
		if (selectedDirectory != null) {
			previouslyBrowsedSnapshotDirectory = selectedDirectory;
			directorySnapshotPathField
					.setText(previouslyBrowsedSnapshotDirectory);
			updateSnapshotPath(selectedDirectory);
		}

	}

	/**
	 * Create the selected projects
	 * 
	 * @return boolean <code>true</code> if all project creations were
	 *         successful.
	 */
	public boolean createProjects() {

		saveWidgetValues();

		final Object[] selected = projectsList.getCheckedElements();
		final IPath snapshotPath = new Path(directorySnapshotPathField
				.getText().trim());

		WorkspaceModifyOperation op = new WorkspaceModifyOperation() {
			protected void execute(IProgressMonitor monitor)
					throws InvocationTargetException, InterruptedException {
				try {
					monitor.beginTask("", selected.length); //$NON-NLS-1$
					if (monitor.isCanceled()) {
						throw new OperationCanceledException();
					}
					for (int i = 0; i < selected.length; i++) {
						createExistingProject((ProjectRecord) selected[i],
								snapshotPath,
								new SubProgressMonitor(monitor, 1));
					}
				} finally {
					monitor.done();
				}
			}
		};
		// run the new project creation operation
		try {
			getContainer().run(true, true, op);
		} catch (InterruptedException e) {
			return false;
		} catch (InvocationTargetException e) {
			// one of the steps resulted in a core exception
			Throwable t = e.getTargetException();
			String message = Messages.ProjectRefreshSnapshotImportWizardPage_creationProblems;
			IStatus status;
			if (t instanceof CoreException) {
				status = ((CoreException) t).getStatus();
			} else {
				status = new Status(IStatus.ERROR,
						IDEWorkbenchPlugin.IDE_WORKBENCH, 1, message, t);
			}
			ErrorDialog.openError(getShell(), message, null, status);
			return false;
		}
		return true;
	}

	/**
	 * Performs clean-up if the user cancels the wizard without doing anything
	 */
	public void performCancel() {
	}

	/**
	 * Create the project described in record. If it is successful return true.
	 * 
	 * @return boolean <code>true</code> if successful
	 */
	private boolean createExistingProject(final ProjectRecord record,
			IPath snapshotPath, IProgressMonitor monitor)
			throws InvocationTargetException, InterruptedException {
		String projectName = record.getProjectName();
		final IWorkspace workspace = ResourcesPlugin.getWorkspace();
		final IProject project = workspace.getRoot().getProject(projectName);
		if (record.description == null) {
			// error case
			record.description = workspace.newProjectDescription(projectName);
			IPath locationPath = new Path(
					record.projectSystemFile.getAbsolutePath());

			// If it is under the root use the default location
			if (Platform.getLocation().isPrefixOf(locationPath)) {
				record.description.setLocation(null);
			} else {
				record.description.setLocation(locationPath);
			}
		} else {
			record.description.setName(projectName);
		}
		// load snapshot and open project
		try {
			monitor.beginTask(
					Messages.ProjectRefreshSnapshotImportWizardPage_createProjectsTask,
					100);
			project.create(record.description, new SubProgressMonitor(monitor,
					30));
			IPath zipPath = snapshotPath.append(projectName + "-index.zip"); //$NON-NLS-1$
			URI snapshotLocation = org.eclipse.core.filesystem.URIUtil
					.toURI(zipPath);
			project.loadSnapshot(IProject.SNAPSHOT_TREE, snapshotLocation,
					new SubProgressMonitor(monitor, 40));
			project.open(IResource.NONE, new SubProgressMonitor(monitor, 30));
		} catch (CoreException e) {
			throw new InvocationTargetException(e);
		} finally {
			monitor.done();
		}

		return true;
	}

	/**
	 * The <code>WizardDataTransfer</code> implementation of this
	 * <code>IOverwriteQuery</code> method asks the user whether the existing
	 * resource at the given path should be overwritten.
	 * 
	 * @return the user's reply: one of <code>"YES"</code>, <code>"NO"</code>,
	 *         <code>"ALL"</code>, or <code>"CANCEL"</code>
	 */
	public String queryOverwrite(String pathString) {

		Path path = new Path(pathString);

		String messageString;
		// Break the message up if there is a file name and a directory
		// and there are at least 2 segments.
		if (path.getFileExtension() == null || path.segmentCount() < 2) {
			messageString = NLS.bind(
					Messages.ProjectRefreshSnapshotImportWizardPage_overwrite,
					pathString);
		} else {
			messageString = NLS
					.bind(Messages.ProjectRefreshSnapshotImportWizardPage_overwriteInFolder,
							path.lastSegment(), path.removeLastSegments(1)
									.toOSString());
		}

		final MessageDialog dialog = new MessageDialog(getContainer()
				.getShell(),
				Messages.ProjectRefreshSnapshotImportWizardPage_question, null,
				messageString, MessageDialog.QUESTION, new String[] {
						IDialogConstants.YES_LABEL,
						IDialogConstants.YES_TO_ALL_LABEL,
						IDialogConstants.NO_LABEL,
						IDialogConstants.NO_TO_ALL_LABEL,
						IDialogConstants.CANCEL_LABEL }, 0);
		String[] response = new String[] { YES, ALL, NO, NO_ALL, CANCEL };
		// run in syncExec because callback is from an operation,
		// which is probably not running in the UI thread.
		getControl().getDisplay().syncExec(new Runnable() {
			public void run() {
				dialog.open();
			}
		});
		return dialog.getReturnCode() < 0 ? CANCEL : response[dialog
				.getReturnCode()];
	}

	/**
	 * Method used for test suite.
	 * 
	 * @return CheckboxTreeViewer the viewer containing all the projects found
	 */
	public CheckboxTreeViewer getProjectsList() {
		return projectsList;
	}

	/**
	 * Retrieve all the projects in the current workspace.
	 * 
	 * @return IProject[] array of IProject in the current workspace
	 */
	private IProject[] getProjectsInWorkspace() {
		if (wsProjects == null) {
			wsProjects = IDEWorkbenchPlugin.getPluginWorkspace().getRoot()
					.getProjects();
		}
		return wsProjects;
	}

	/**
	 * Get the array of valid project records that can be imported from the
	 * source workspace or archive, selected by the user. If a project with the
	 * same name exists in both the source workspace and the current workspace,
	 * or if no refresh snapshot for the project is found in the snapshot
	 * folder, it will not appear in the list of projects to import and thus
	 * cannot be selected for import.
	 * 
	 * Method declared public for test suite.
	 * 
	 * @return ProjectRecord[] array of projects that can be imported into the
	 *         workspace
	 */
	public ProjectRecord[] getValidProjects() {
		List validProjects = new ArrayList();
		for (int i = 0; i < selectedProjects.length; i++) {
			String projectName = selectedProjects[i].getProjectName();
			if (!isProjectInWorkspace(projectName) && hasSnapshot(projectName)) {
				validProjects.add(selectedProjects[i]);
			}
		}
		return (ProjectRecord[]) validProjects
				.toArray(new ProjectRecord[validProjects.size()]);
	}

	/**
	 * Determine if the project with the given name is in the current workspace.
	 * 
	 * @param projectName
	 *            String the project name to check
	 * @return boolean true if the project with the given name is in this
	 *         workspace
	 */
	private boolean isProjectInWorkspace(String projectName) {
		if (projectName == null) {
			return false;
		}
		IProject[] workspaceProjects = getProjectsInWorkspace();
		for (int i = 0; i < workspaceProjects.length; i++) {
			if (projectName.equals(workspaceProjects[i].getName())) {
				return true;
			}
		}
		return false;
	}

	/**
	 * Determine if the named project has a refresh snapshot in the current
	 * snapshot directory.
	 * 
	 * @param projectName
	 *            String the project name to check
	 * @return boolean true if the project with the given name has a refresh
	 *         snapshot in the current snapshot directory
	 */
	private boolean hasSnapshot(String projectName) {
		if (projectName == null) {
			return false;
		}
		final IPath snapshotPath = new Path(directorySnapshotPathField
				.getText().trim());
		IPath zipPath = snapshotPath.append(projectName + "-index.zip"); //$NON-NLS-1$
		return zipPath.toFile().exists();
	}

	/**
	 * Use the dialog store to restore widget values to the values that they
	 * held last time this wizard was used to completion.
	 * 
	 * Method declared public only for use of tests.
	 */
	public void restoreWidgetValues() {
		IDialogSettings settings = getDialogSettings();
		if (settings != null) {
			recurseIntoSubFolders = settings
					.getBoolean(STORE_RECURSE_SUBFOLDERS);
			recurseIntoSubFoldersCheckbox.setSelection(recurseIntoSubFolders);
		}
	}

	/**
	 * Since Finish was pressed, write widget values to the dialog store so that
	 * they will persist into the next invocation of this wizard page.
	 * 
	 * Method declared public only for use of tests.
	 */
	public void saveWidgetValues() {
		IDialogSettings settings = getDialogSettings();
		if (settings != null) {
			settings.put(STORE_RECURSE_SUBFOLDERS, recurseIntoSubFolders);
		}
	}

}
