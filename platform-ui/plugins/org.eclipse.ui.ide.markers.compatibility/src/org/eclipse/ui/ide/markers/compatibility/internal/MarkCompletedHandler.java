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

import java.util.HashMap;
import java.util.Map;

import org.eclipse.core.commands.ExecutionEvent;
import org.eclipse.core.commands.operations.IUndoableOperation;
import org.eclipse.core.resources.IMarker;
import org.eclipse.ui.ide.markers.compatibility.api.MarkerViewHandler;
import org.eclipse.ui.ide.markers.compatibility.api.internal.MarkerMessages;
import org.eclipse.ui.ide.undo.UpdateMarkersOperation;

/**
 * MarkCompletedHandler is the handler for marking the current selection as
 * completed.
 * 
 * @since 3.4
 */
public class MarkCompletedHandler extends MarkerViewHandler {

	/*
	 * (non-Javadoc)
	 * 
	 * @see org.eclipse.core.commands.IHandler#execute(org.eclipse.core.commands.ExecutionEvent)
	 */
	public Object execute(ExecutionEvent event) {

		IMarker[] markers = getSelectedMarkers(event);
		if(markers.length == 0)
			return this;
		
		Map attrs = new HashMap();
		attrs.put(IMarker.DONE, Boolean.TRUE);
		IUndoableOperation op = new UpdateMarkersOperation(markers, attrs,
				MarkerMessages.markCompletedAction_title, true);
		execute(op, MarkerMessages.markCompletedAction_title, null, null);
		return this;
	}
}
