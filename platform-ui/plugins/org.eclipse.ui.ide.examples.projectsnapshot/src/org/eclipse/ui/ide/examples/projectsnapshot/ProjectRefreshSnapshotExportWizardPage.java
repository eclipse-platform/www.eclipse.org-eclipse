/*******************************************************************************
 * Copyright (c) 2007, 2010 Wind River Systems, Inc. and others.
 * All rights reserved. This program and the accompanying materials
 * are made available under the terms of the Eclipse Public License v1.0
 * which accompanies this distribution, and is available at
 * http://www.eclipse.org/legal/epl-v10.html
 *
 * Contributors:
 *    Markus Schorn - initial API and implementation
 *    Francis Lynch (Wind River) - adapted from CDT TeamSharedExportWizardPage
 *******************************************************************************/
package org.eclipse.ui.ide.examples.projectsnapshot;

import java.io.File;
import java.net.URI;
import java.util.ArrayList;
import java.util.Collection;
import java.util.HashSet;
import java.util.Iterator;
import java.util.List;

import org.eclipse.core.resources.IProject;
import org.eclipse.core.runtime.CoreException;
import org.eclipse.core.runtime.IPath;
import org.eclipse.core.runtime.MultiStatus;
import org.eclipse.core.runtime.Path;
import org.eclipse.jface.dialogs.ErrorDialog;
import org.eclipse.jface.dialogs.IDialogConstants;
import org.eclipse.jface.dialogs.MessageDialog;
import org.eclipse.jface.viewers.CheckStateChangedEvent;
import org.eclipse.jface.viewers.CheckboxTableViewer;
import org.eclipse.jface.viewers.ICheckStateListener;
import org.eclipse.jface.viewers.IStructuredContentProvider;
import org.eclipse.jface.viewers.IStructuredSelection;
import org.eclipse.jface.viewers.Viewer;
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
import org.eclipse.swt.widgets.Event;
import org.eclipse.swt.widgets.Label;
import org.eclipse.swt.widgets.Shell;
import org.eclipse.swt.widgets.Table;
import org.eclipse.swt.widgets.Text;
import org.eclipse.ui.dialogs.WizardDataTransferPage;
import org.eclipse.ui.internal.ide.IDEWorkbenchPlugin;
import org.eclipse.ui.model.WorkbenchLabelProvider;

/**
 * The wizard page for export refresh snapshot
 */
public class ProjectRefreshSnapshotExportWizardPage extends
		WizardDataTransferPage {

	private IStructuredSelection fInitialSelection;
	private CheckboxTableViewer fProjectViewer;
	private Text directorySnapshotPathField;
	private Button browseSnapshotDirectoryButton;
	// Keep track of the directory that we browsed to last time
	// the wizard was invoked.
	private static String previouslyBrowsedSnapshotDirectory = ""; //$NON-NLS-1$

	/**
	 * Create an instance of this class
	 */
	protected ProjectRefreshSnapshotExportWizardPage(String name,
			IStructuredSelection selection) {
		super(name);
		fInitialSelection = selection;
	}

	/**
	 * Create an instance of this class.
	 * 
	 * @param selection
	 *            the selection
	 */
	public ProjectRefreshSnapshotExportWizardPage(IStructuredSelection selection) {
		this("refreshSnapshotExportPage", selection); //$NON-NLS-1$
		setTitle(Messages.ProjectRefreshSnapshotExportWizardPage_title);
		setDescription(Messages.ProjectRefreshSnapshotExportWizardPage_description);
	}

	public void createControl(Composite parent) {
		initializeDialogUnits(parent);

		Composite composite = new Composite(parent, SWT.NULL);
		composite.setLayout(new GridLayout());
		composite.setLayoutData(new GridData(GridData.VERTICAL_ALIGN_FILL
				| GridData.HORIZONTAL_ALIGN_FILL));
		composite.setFont(parent.getFont());

		createResourcesGroup(composite);
		createSnapshotArea(composite);

		restoreWidgetValues();
		if (fInitialSelection != null) {
			setupBasedOnInitialSelections();
		}

		updateWidgetEnablements();
		setPageComplete(determinePageCompletion());
		setErrorMessage(null); // should not initially have error message

		setControl(composite);
	}

	private void checkForComplete() {
		if (fProjectViewer.getCheckedElements().length > 0) {
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
	 * Creates the checkbox tree and list for selecting resources.
	 * 
	 * @param parent
	 *            the parent control
	 */
	private final void createResourcesGroup(Composite parent) {
		Composite resourcesGroup = new Composite(parent, SWT.NONE);
		resourcesGroup.setLayout(new GridLayout());
		resourcesGroup.setLayoutData(new GridData(GridData.FILL_BOTH));
		resourcesGroup.setFont(parent.getFont());

		new Label(resourcesGroup, SWT.NONE)
				.setText(Messages.ProjectRefreshSnapshotExportWizardPage_selectProjects);
		Table table = new Table(resourcesGroup, SWT.CHECK | SWT.BORDER);
		table.setLayoutData(new GridData(GridData.FILL_BOTH));
		fProjectViewer = new CheckboxTableViewer(table);
		fProjectViewer.setContentProvider(new IStructuredContentProvider() {
			List fContents;

			public Object[] getElements(Object input) {
				if (fContents != null && fContents == input)
					return fContents.toArray();
				return new Object[0];
			}

			public void inputChanged(Viewer viewer, Object oldInput,
					Object newInput) {
				if (newInput instanceof List)
					fContents = (List) newInput;
				else
					fContents = null;
				// we use a fixed set.
			}

			public void dispose() {
			}

		});
		fProjectViewer.setLabelProvider(new WorkbenchLabelProvider());
		ICheckStateListener checkListener = new ICheckStateListener() {
			public void checkStateChanged(CheckStateChangedEvent event) {
				updateWidgetEnablements();
			}
		};
		fProjectViewer.addCheckStateListener(checkListener);

		// top level group
		Composite buttonComposite = new Composite(resourcesGroup, SWT.NONE);
		buttonComposite.setFont(parent.getFont());

		GridLayout layout = new GridLayout(2, true);
		layout.marginHeight = layout.marginWidth = 0;
		buttonComposite.setLayout(layout);
		buttonComposite.setLayoutData(new GridData(GridData.VERTICAL_ALIGN_FILL
				| GridData.HORIZONTAL_ALIGN_FILL));

		Button selectButton = createButton(buttonComposite,
				IDialogConstants.SELECT_ALL_ID,
				Messages.ProjectRefreshSnapshotExportWizardPage_selectAll,
				false);

		SelectionAdapter listener = new SelectionAdapter() {
			// @Override
			public void widgetSelected(SelectionEvent e) {
				fProjectViewer.setAllChecked(true);
				updateWidgetEnablements();
			}
		};
		selectButton.addSelectionListener(listener);

		Button deselectButton = createButton(buttonComposite,
				IDialogConstants.DESELECT_ALL_ID,
				Messages.ProjectRefreshSnapshotExportWizardPage_deselectAll,
				false);

		listener = new SelectionAdapter() {
			// @Override
			public void widgetSelected(SelectionEvent e) {
				fProjectViewer.setAllChecked(false);
				updateWidgetEnablements();
			}
		};
		deselectButton.addSelectionListener(listener);

		initProjects();
	}

	private Button createButton(Composite parent, int id, String label,
			boolean defaultButton) {
		Button button = new Button(parent, SWT.PUSH);

		GridData buttonData = new GridData(GridData.FILL_HORIZONTAL);
		button.setLayoutData(buttonData);

		button.setData(new Integer(id));
		button.setText(label);
		button.setFont(parent.getFont());

		if (defaultButton) {
			Shell shell = parent.getShell();
			if (shell != null) {
				shell.setDefaultButton(button);
			}
			button.setFocus();
		}
		button.setFont(parent.getFont());
		setButtonLayoutData(button);
		return button;
	}

	private void initProjects() {
		ArrayList input = new ArrayList();
		IProject[] projects;
		projects = IDEWorkbenchPlugin.getPluginWorkspace().getRoot()
				.getProjects();
		for (int i = 0; i < projects.length; i++) {
			if (projects[i].isOpen()) {
				input.add(projects[i]);
			}
		}
		fProjectViewer.setInput(input);
	}

	private void setupBasedOnInitialSelections() {
		HashSet names = new HashSet();
		Iterator it = fInitialSelection.iterator();
		while (it.hasNext()) {
			IProject project = (IProject) it.next();
			names.add(project.getName());
		}

		Collection prjsc = (Collection) fProjectViewer.getInput();
		Object[] prjs = prjsc.toArray();
		for (int i = 0; i < prjs.length; i++) {
			Object element = prjs[i];
			IProject prj = (IProject) element;
			if (names.contains(prj.getName())) {
				fProjectViewer.setChecked(prj, true);
			}
		}
	}

	/**
	 * Create the area to specify the snapshot directory.
	 */
	private void createSnapshotArea(Composite workArea) {
		// project specification group
		Composite snapshotGroup = new Composite(workArea, SWT.NONE);
		GridLayout layout = new GridLayout();
		layout.numColumns = 3;
		layout.makeColumnsEqualWidth = false;
		layout.marginWidth = 0;
		snapshotGroup.setLayout(layout);
		snapshotGroup.setLayoutData(new GridData(GridData.FILL_HORIZONTAL));

		Label title = new Label(snapshotGroup, SWT.NONE);
		title.setText(Messages.ProjectRefreshSnapshotExportWizardPage_selectSnapshot);

		// refresh snapshot directory location entry field
		this.directorySnapshotPathField = new Text(snapshotGroup, SWT.BORDER);

		this.directorySnapshotPathField.setLayoutData(new GridData(
				GridData.FILL_HORIZONTAL | GridData.GRAB_HORIZONTAL));

		// browse button
		browseSnapshotDirectoryButton = new Button(snapshotGroup, SWT.PUSH);
		browseSnapshotDirectoryButton
				.setText(Messages.ProjectRefreshSnapshotExportWizardPage_snapshotBrowse);
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
				checkForComplete();
			}

		});

	}

	/**
	 * The browse button has been selected. Select the location.
	 */
	protected void handleLocationSnapshotDirectoryButtonPressed() {

		DirectoryDialog dialog = new DirectoryDialog(
				directorySnapshotPathField.getShell());
		dialog.setMessage(Messages.ProjectRefreshSnapshotExportWizardPage_browseSnapshot);

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
			checkForComplete();
		}

	}

	/**
	 * @return Return true to indicate that the operation was a success
	 */
	public boolean finish() {
		IProject[] projectsToSnapshot = getCheckedElements();

		// about to invoke the operation so save our state
		saveWidgetValues();

		return executeSnapshotOperation(projectsToSnapshot);
	}

	private IProject[] getCheckedElements() {
		Object[] obj = fProjectViewer.getCheckedElements();
		IProject[] prjs = new IProject[obj.length];
		System.arraycopy(obj, 0, prjs, 0, obj.length);
		return prjs;
	}

	private boolean executeSnapshotOperation(final IProject[] projects) {
		final MultiStatus status = new MultiStatus(
				IDEWorkbenchPlugin.IDE_WORKBENCH, 0,
				Messages.ProjectRefreshSnapshotExportWizardPage_errorsOccurred,
				null);

		final IPath snapshotPath = new Path(directorySnapshotPathField
				.getText().trim());
		for (int i = 0; i < projects.length; i++) {
			IProject project = projects[i];
			try {
				String projectName = project.getName();
				boolean cancelled = false;
				IPath zipPath = snapshotPath.append(projectName + "-index.zip"); //$NON-NLS-1$
				if (zipPath.toFile().exists()) {
					String[] buttons = new String[] {
							IDialogConstants.YES_LABEL,
							IDialogConstants.NO_LABEL,
							IDialogConstants.CANCEL_LABEL };
					String question = NLS
							.bind(Messages.ProjectRefreshSnapshotExportWizardPage_overwrite,
									zipPath.toString());
					MessageDialog d = new MessageDialog(
							getShell(),
							Messages.ProjectRefreshSnapshotExportWizardPage_question,
							null, question, MessageDialog.QUESTION, buttons, 0) {
						protected int getShellStyle() {
							return super.getShellStyle() | SWT.SHEET;
						}
					};
					int overwrite = d.open();
					switch (overwrite) {
					case 0: // Yes
						break;
					case 1: // No
						continue;
					case 2: // Cancel
					default:
						cancelled = true;
						break;
					}
				}
				if (cancelled)
					break;
				URI snapshotLocation = org.eclipse.core.filesystem.URIUtil
						.toURI(zipPath);
				project.saveSnapshot(IProject.SNAPSHOT_TREE, snapshotLocation,
						null);
			} catch (CoreException e) {
				status.merge(e.getStatus());
			}
		}
		if (!status.isOK()) {
			IDEWorkbenchPlugin.log("", status); //$NON-NLS-1$
			ErrorDialog.openError(getContainer().getShell(),
					getErrorDialogTitle(), null, // no special message
					status);
			return false;
		}

		return true;
	}

	// @Override
	protected boolean validateSourceGroup() {
		// there must be some resources selected for Export
		boolean isValid = true;
		Object[] projectsToExport = getCheckedElements();
		if (projectsToExport.length == 0) {
			setErrorMessage(Messages.ProjectRefreshSnapshotExportWizardPage_needProjectSelected);
			isValid = false;
		} else {
			setErrorMessage(null);
		}
		return super.validateSourceGroup() && isValid;
	}

	// @Override
	protected void updateWidgetEnablements() {
		boolean pageComplete = determinePageCompletion();
		setPageComplete(pageComplete);
		if (pageComplete) {
			setMessage(null);
		}
		super.updateWidgetEnablements();
	}

	public void handleEvent(Event event) {
		updateWidgetEnablements();
	}

	// @Override
	protected String getErrorDialogTitle() {
		return Messages.ProjectRefreshSnapshotExportWizardPage_errorDialogTitle;
	}

	// @Override
	protected boolean allowNewContainerName() {
		return false;
	}
}
