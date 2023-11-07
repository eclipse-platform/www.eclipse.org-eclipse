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

import org.eclipse.core.commands.ExecutionEvent;
import org.eclipse.core.resources.IMarker;
import org.eclipse.swt.dnd.TextTransfer;
import org.eclipse.swt.dnd.Transfer;
import org.eclipse.ui.ide.markers.compatibility.api.MarkerField;
import org.eclipse.ui.ide.markers.compatibility.api.MarkerViewHandler;
import org.eclipse.ui.part.MarkerTransfer;

/**
 * MarkerCopyHandler is the handler for the copy action when the markers view is
 * selected.
 * 
 * @since 3.4
 */
public class MarkerCopyHandler extends MarkerViewHandler  {

	/*
	 * (non-Javadoc)
	 * 
	 * @see org.eclipse.core.commands.IHandler#execute(org.eclipse.core.commands.ExecutionEvent)
	 */
	public Object execute(ExecutionEvent event) {
		ExtendedMarkersView view = getView(event);
		if (view == null)
			return null;

		setClipboard(view);
		return this;
	}

	/**
	 * Set the workbench clipboard for the markers.
	 */
	private void setClipboard(ExtendedMarkersView view) {

		IMarker[] markers = view.getSelectedMarkers();

		String markerReport = createMarkerReport(view, markers);

		// Place the markers on the clipboard
		Object[] data;
		Transfer[] transferTypes;
		if (markerReport == null) {
			data = new Object[] { markers };
			transferTypes = new Transfer[] { MarkerTransfer.getInstance() };
		} else {
			data = new Object[] { markers, markerReport };
			transferTypes = new Transfer[] { MarkerTransfer.getInstance(),
					TextTransfer.getInstance() };
		}

		view.getClipboard().setContents(data, transferTypes);

	}

	/**
	 * Creates a plain-text report of the selected markers based on predefined
	 * properties.
	 * 
	 * @param view the view being copied
	 * @return the marker report
	 */
	String createMarkerReport(ExtendedMarkersView view, IMarker[] markers) {
		StringBuffer report = new StringBuffer();

		 MarkerField[] fields = view.getVisibleFields();
		
		// create header
		for (int i = 0; i < fields.length; i++) {
			report.append(fields[i].getColumnHeaderText());
			if (i == fields.length - 1) {
				report.append(Character.LINE_SEPARATOR);
			} else {
				report.append('\t');
			}
		}

		for (int i = 0; i < markers.length; i++) {
			
			for (int j = 0; j < fields.length; j++) {
				report.append(fields[j].getMarkerValue(markers[i]));
				if (j == fields.length - 1) {
					report.append(Character.LINE_SEPARATOR);
				} else {
					report.append('\t');
				}
			}
		}

		return report.toString();
	}

}
