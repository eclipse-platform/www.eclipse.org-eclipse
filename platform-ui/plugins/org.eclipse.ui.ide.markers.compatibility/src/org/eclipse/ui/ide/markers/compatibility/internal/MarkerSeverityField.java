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

import org.eclipse.core.resources.IMarker;
import org.eclipse.ui.ide.markers.compatibility.api.MarkerField;
import org.eclipse.ui.ide.markers.compatibility.api.MarkerItem;
import org.eclipse.ui.ide.markers.compatibility.api.MarkerSupportConstants;
import org.eclipse.ui.ide.markers.compatibility.api.internal.MarkerMessages;

/**
 * MarkerSeverityField is the field for showing severity categories.
 * 
 * @since 3.4
 */
public class MarkerSeverityField extends MarkerField {

	
	/*
	 * (non-Javadoc)
	 * 
	 * @see org.eclipse.ui.internal.provisional.views.markers.MarkerField#getValue(org.eclipse.ui.internal.provisional.views.markers.MarkerItem)
	 */
	public String getValue(MarkerItem item) {

		switch (item.getAttributeValue(IMarker.SEVERITY, -1)) {
		case 2:
			return MarkerMessages.filtersDialog_severityError;
		case 1:
			return MarkerMessages.filtersDialog_severityWarning;
		case 0:
			return MarkerMessages.filtersDialog_severityInfo;

		default:
			return MarkerSupportConstants.EMPTY_STRING;
		}

	}

	/*
	 * (non-Javadoc)
	 * 
	 * @see org.eclipse.ui.internal.provisional.views.markers.MarkerField#compare(org.eclipse.ui.internal.provisional.views.markers.MarkerItem,
	 *      org.eclipse.ui.internal.provisional.views.markers.MarkerItem)
	 */
	public int compare(MarkerItem item1, MarkerItem item2) {
		return getSeverity(item2) - getSeverity(item1);
	}
}
