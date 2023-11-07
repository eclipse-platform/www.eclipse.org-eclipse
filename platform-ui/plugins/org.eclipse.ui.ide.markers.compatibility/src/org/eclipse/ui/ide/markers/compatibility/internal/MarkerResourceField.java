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

import org.eclipse.ui.ide.markers.compatibility.api.MarkerField;
import org.eclipse.ui.ide.markers.compatibility.api.MarkerItem;
import org.eclipse.ui.ide.markers.compatibility.api.MarkerSupportConstants;
import org.eclipse.ui.ide.markers.compatibility.api.MarkerViewUtil;

/**
 * MarkerResourceField is the field that specifies the resource column.
 * 
 * @since 3.4
 */
public class MarkerResourceField extends MarkerField {

	/*
	 * (non-Javadoc)
	 * 
	 * @see org.eclipse.ui.provisional.views.markers.IMarkerField#getValue(org.eclipse.ui.provisional.views.markers.MarkerItem)
	 */
	public String getValue(MarkerItem item) {
		if (item.isConcrete()) {
			return item.getAttributeValue(MarkerViewUtil.NAME_ATTRIBUTE, item
					.getConcreteRepresentative().getMarker().getResource()
					.getName());
		}
		return MarkerSupportConstants.EMPTY_STRING;
	}
}
