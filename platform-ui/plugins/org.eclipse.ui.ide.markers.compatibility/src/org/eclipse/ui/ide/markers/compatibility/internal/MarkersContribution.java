/*******************************************************************************
 * Copyright (c) 2007 IBM Corporation and others.
 * All rights reserved. This program and the accompanying materials
 * are made available under the terms of the Eclipse Public License v1.0
 * which accompanies this distribution, and is available at
 * http://www.eclipse.org/legal/epl-v10.html
 *
 * Contributors:
 *     IBM Corporation - initial API and implementation
 ******************************************************************************/

package org.eclipse.ui.ide.markers.compatibility.internal;

import org.eclipse.ui.IWorkbenchPage;
import org.eclipse.ui.IWorkbenchPart;
import org.eclipse.ui.IWorkbenchWindow;
import org.eclipse.ui.PlatformUI;
import org.eclipse.ui.actions.CompoundContributionItem;

/**
 * MarkersContribution is the abstract superclass of the compound contribution
 * items used in the Markers views.
 * 
 * @since 3.4
 */
abstract class MarkersContribution extends CompoundContributionItem {

	/**
	 * Create a new instance of the receiver.
	 */
	public MarkersContribution() {
		super();
	}

	/**
	 * Create a new instance of the receiver.
	 */
	public MarkersContribution(String id) {
		super(id);
	}

	/**
	 * Get the view this contribution is working on.
	 * 
	 * @return ExtendedMarkersView
	 */
	ExtendedMarkersView getView() {
		IWorkbenchWindow active = PlatformUI.getWorkbench()
				.getActiveWorkbenchWindow();
		if (active == null)
			return null;
		IWorkbenchPage page = active.getActivePage();
		if (page == null)
			return null;
		IWorkbenchPart part = page.getActivePart();
		if (part == null)
			return null;

		return (ExtendedMarkersView) part;
	}

}
