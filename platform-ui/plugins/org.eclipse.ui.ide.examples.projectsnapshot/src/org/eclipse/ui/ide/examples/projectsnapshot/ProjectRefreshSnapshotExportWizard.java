/*******************************************************************************
 * Copyright (c) 2007, 2010 Wind River Systems, Inc. and others.
 * All rights reserved. This program and the accompanying materials
 * are made available under the terms of the Eclipse Public License v1.0
 * which accompanies this distribution, and is available at
 * http://www.eclipse.org/legal/epl-v10.html
 *
 * Contributors:
 *    Markus Schorn - initial API and implementation
 *    Francis Lynch (Wind River) - adapted from CDT TeamSharedExportWizard
 *******************************************************************************/

package org.eclipse.ui.ide.examples.projectsnapshot;

import org.eclipse.jface.dialogs.IDialogSettings;
import org.eclipse.jface.viewers.IStructuredSelection;
import org.eclipse.jface.wizard.Wizard;
import org.eclipse.ui.IExportWizard;
import org.eclipse.ui.IWorkbench;
import org.eclipse.ui.internal.ide.IDEWorkbenchPlugin;

/**
 * Wizard to create refresh snapshots
 */
public class ProjectRefreshSnapshotExportWizard extends Wizard implements
		IExportWizard {
	private static final String DIALOG_SETTINGS_SECTION = "ProjectRefreshSnapshotExportWizard"; //$NON-NLS-1$
	private ProjectRefreshSnapshotExportWizardPage fMainPage;
	private IStructuredSelection fSelection;

	public ProjectRefreshSnapshotExportWizard() {
		IDialogSettings workbenchSettings = IDEWorkbenchPlugin.getDefault()
				.getDialogSettings();
		IDialogSettings section = workbenchSettings
				.getSection(DIALOG_SETTINGS_SECTION);
		if (section == null) {
			section = workbenchSettings.addNewSection(DIALOG_SETTINGS_SECTION);
		}
		setDialogSettings(section);
	}

	// @Override
	public void addPages() {
		super.addPages();
		fMainPage = new ProjectRefreshSnapshotExportWizardPage(fSelection);
		addPage(fMainPage);
	}

	// @Override
	public boolean performFinish() {
		return fMainPage.finish();
	}

	public void init(IWorkbench workbench, IStructuredSelection selection) {
		fSelection = selection;
		setWindowTitle(Messages.ProjectRefreshSnapshotExportWizard_exportTitle);
		setDefaultPageImageDescriptor(IDEWorkbenchPlugin
				.getIDEImageDescriptor("wizban/exportzip_wiz.png")); //$NON-NLS-1$
		setNeedsProgressMonitor(true);
	}

}
