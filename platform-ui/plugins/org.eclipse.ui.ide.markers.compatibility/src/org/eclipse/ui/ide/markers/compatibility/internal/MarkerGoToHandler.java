package org.eclipse.ui.ide.markers.compatibility.internal;
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

import org.eclipse.core.commands.ExecutionEvent;
import org.eclipse.ui.ide.markers.compatibility.api.MarkerViewHandler;

/**
 * MarkerGoToHandler is the handler for the go to action.
 * @since 3.4
 */
public class MarkerGoToHandler extends MarkerViewHandler {

	/* (non-Javadoc)
	 * @see org.eclipse.core.commands.IHandler#execute(org.eclipse.core.commands.ExecutionEvent)
	 */
	public Object execute(ExecutionEvent event)  {
		ExtendedMarkersView view = getView(event);
		if(view == null)
			return this;
		view.openSelectedMarkers();
		return this;
	}
	


}
