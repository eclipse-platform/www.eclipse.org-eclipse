/*******************************************************************************
 * Copyright (c) 2007,2008 IBM Corporation and others.
 * All rights reserved. This program and the accompanying materials
 * are made available under the terms of the Eclipse Public License v1.0
 * which accompanies this distribution, and is available at
 * http://www.eclipse.org/legal/epl-v10.html
 *
 * Contributors:
 *     IBM Corporation - initial API and implementation
 ******************************************************************************/

package org.eclipse.ui.ide.markers.compatibility.api;

import org.eclipse.core.commands.AbstractHandler;
import org.eclipse.core.commands.ExecutionEvent;
import org.eclipse.core.commands.ExecutionException;
import org.eclipse.core.commands.operations.IUndoableOperation;
import org.eclipse.core.resources.IMarker;
import org.eclipse.core.runtime.CoreException;
import org.eclipse.core.runtime.IAdaptable;
import org.eclipse.core.runtime.IProgressMonitor;
import org.eclipse.jface.dialogs.ErrorDialog;
import org.eclipse.ui.IWorkbenchPart;
import org.eclipse.ui.PlatformUI;
import org.eclipse.ui.handlers.HandlerUtil;
import org.eclipse.ui.ide.undo.WorkspaceUndoUtil;
import org.eclipse.ui.internal.ide.IDEWorkbenchPlugin;

/**
 * MarkerViewHandler is the abstract class of the handlers for the 
 * {@link MarkerSupportView}
 * @since 3.4
 */
public abstract class MarkerViewHandler extends AbstractHandler {

	private static final IMarker[] EMPTY_MARKER_ARRAY = new IMarker[0];

	/**
	 * Get the view this event occurred on.
	 * @return {@link MarkerSupportView} or <code>null</code>
	 */
	public MarkerSupportView getView(ExecutionEvent event) {
		IWorkbenchPart part =  HandlerUtil.getActivePart(event);
		if(part == null)
			return null;
		return (MarkerSupportView) part;
	}
	
	
	/**
	 * Execute the specified undoable operation
	 */
	public void execute(IUndoableOperation operation, String title,
			IProgressMonitor monitor, IAdaptable uiInfo) {
		try {
			PlatformUI.getWorkbench().getOperationSupport()
					.getOperationHistory().execute(operation, monitor, uiInfo);
		} catch (ExecutionException e) {
			if (e.getCause() instanceof CoreException) {
				ErrorDialog
						.openError(WorkspaceUndoUtil.getShell(uiInfo), title,
								null, ((CoreException) e.getCause())
										.getStatus());
			} else {
				IDEWorkbenchPlugin.log(title, e);
			}
		}
	}

	/**
	 * Get the selected markers for the receiver in the view from
	 * event. If the view cannot be found then return an empty
	 * array.
	 * @return {@link IMarker}[]
	 */
	public IMarker[] getSelectedMarkers(ExecutionEvent event){
		MarkerSupportView view = getView(event);
		if(view == null)
			return EMPTY_MARKER_ARRAY;
		return view.getSelectedMarkers();
	}
}
