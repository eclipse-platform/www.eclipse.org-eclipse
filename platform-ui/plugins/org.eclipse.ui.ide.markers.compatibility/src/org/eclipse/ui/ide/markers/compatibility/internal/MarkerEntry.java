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

import org.eclipse.core.resources.IMarker;
import org.eclipse.core.runtime.CoreException;
import org.eclipse.core.runtime.IAdaptable;
import org.eclipse.core.runtime.IPath;
import org.eclipse.osgi.util.NLS;
import org.eclipse.ui.ide.markers.compatibility.api.MarkerItem;
import org.eclipse.ui.ide.markers.compatibility.api.MarkerSupportConstants;
import org.eclipse.ui.ide.markers.compatibility.api.MarkerViewUtil;
import org.eclipse.ui.ide.markers.compatibility.api.internal.MarkerMessages;
import org.eclipse.ui.ide.markers.compatibility.api.internal.MarkerTypesModel;

import com.ibm.icu.text.CollationKey;
import com.ibm.icu.text.Collator;

/**
 * The MarkerEntry is the class that wrappers an {@link IMarker} for display in
 * an {@link ExtendedMarkersView}.
 * 
 * @since 3.4
 */
public class MarkerEntry extends MarkerItem implements IAdaptable {

	// The key for the string we built for display
	private static final Object LOCATION_STRING = "LOCATION_STRING"; //$NON-NLS-1$
	Map attributeCache = new HashMap(0);
	private MarkerCategory category;
	Map collationKeys = new HashMap(0);
	private String folder;
	IMarker marker;

	/**
	 * Create a new instance of the receiver.
	 */
	public MarkerEntry(IMarker marker) {
		this.marker = marker;
	}

	/*
	 * (non-Javadoc)
	 * 
	 * @see org.eclipse.ui.internal.provisional.views.markers.MarkerItem#getAttributeValue(java.lang.String,
	 *      boolean)
	 */
	public boolean getAttributeValue(String attribute, boolean defaultValue) {
		boolean value;

		if (attributeCache.containsKey(attribute)) {
			Object cached = attributeCache.get(attribute);
			if (cached == null)
				return defaultValue;
			value = ((Boolean) cached).booleanValue();
		} else {
			value = marker.getAttribute(attribute, defaultValue);
			attributeCache.put(attribute, new Boolean(value));
		}

		return value;
	}

	/**
	 * Get the value of the attribute in the enclosed marker.
	 * 
	 * @param defaultValue
	 *            the defaultValue if the value is not set
	 * @return int
	 */
	public int getAttributeValue(String attribute, int defaultValue) {
		int value;
		if (attributeCache.containsKey(attribute)) {
			Object cached = attributeCache.get(attribute);
			if (cached == null)
				return defaultValue;
			value = ((Integer) cached).intValue();
		} else {
			value = marker.getAttribute(attribute, defaultValue);
			attributeCache.put(attribute, new Integer(value));
		}

		return value;

	}

	/**
	 * Get the String value of the attribute in the enclosed marker.
	 * 
	 * @param defaultValue
	 *            the defaultValue if the value is not set
	 * @return String
	 */
	public String getAttributeValue(String attribute, String defaultValue) {

		String value;

		if (attributeCache.containsKey(attribute)) {
			Object cached = attributeCache.get(attribute);
			if (cached == null)
				return defaultValue;
			value = (String) cached;
		} else {
			value = marker.getAttribute(attribute, defaultValue);
			attributeCache.put(attribute, value);
		}
		return value;
	}

	/*
	 * (non-Javadoc)
	 * 
	 * @see org.eclipse.ui.provisional.views.markers.MarkerItem#getChildren()
	 */
	public MarkerItem[] getChildren() {
		return MarkerSupportInternalUtilities.EMPTY_MARKER_ITEM_ARRAY;
	}

	/**
	 * Get the CollationKey for the string attribute.
	 * 
	 * @param defaultValue
	 *            the defaultValue if the value is not set
	 * @return CollationKey
	 */
	public CollationKey getCollationKey(String attribute, String defaultValue) {
		if (collationKeys.containsKey(attribute))
			return (CollationKey) collationKeys.get(attribute);
		String attributeValue = getAttributeValue(attribute, defaultValue);
		if (attributeValue.length() == 0)
			return MarkerSupportInternalUtilities.EMPTY_COLLATION_KEY;
		CollationKey key = Collator.getInstance().getCollationKey(
				attributeValue);
		collationKeys.put(attribute, key);
		return key;
	}

	/*
	 * (non-Javadoc)
	 * 
	 * @see org.eclipse.ui.provisional.views.markers.MarkerItem#getConcreteRepresentative()
	 */
	public MarkerEntry getConcreteRepresentative() {
		return this;
	}

	/*
	 * (non-Javadoc)
	 * 
	 * @see org.eclipse.ui.internal.provisional.views.markers.MarkerItem#getCreationTime()
	 */
	public long getCreationTime() {
		try {
			return marker.getCreationTime();
		} catch (CoreException e) {
			MarkerSupportInternalUtilities.handle(e);
			return -1;
		}
	}

	/*
	 * (non-Javadoc)
	 * 
	 * @see org.eclipse.ui.provisional.views.markers.MarkerItem#getDescription()
	 */
	public String getDescription() {
		return getAttributeValue(IMarker.MESSAGE,
				MarkerSupportConstants.EMPTY_STRING);
	}

	/*
	 * (non-Javadoc)
	 * 
	 * @see org.eclipse.ui.internal.provisional.views.markers.MarkerItem#getID()
	 */
	public long getID() {
		return marker.getId();
	}

	/*
	 * (non-Javadoc)
	 * 
	 * @see org.eclipse.ui.internal.provisional.views.markers.MarkerItem#getLocation()
	 */
	public String getLocation() {
		if (attributeCache.containsKey(LOCATION_STRING)) 
			return (String) attributeCache.get(LOCATION_STRING);
		
		//Is the location override set?
		String locationString = getAttributeValue(IMarker.LOCATION,
				MarkerSupportConstants.EMPTY_STRING);
		if (locationString.length() > 0) {

			attributeCache.put(LOCATION_STRING, locationString);
			return locationString;
		}

		// No override so use line number
		int lineNumber = getAttributeValue(IMarker.LINE_NUMBER, -1);
		String lineNumberString;
		if (lineNumber < 0)
			lineNumberString = MarkerMessages.Unknown;
		else
			lineNumberString = NLS.bind(MarkerMessages.label_lineNumber,
					Integer.toString(lineNumber));

		attributeCache.put(LOCATION_STRING, lineNumberString);
		return lineNumberString;

	}

	/*
	 * (non-Javadoc)
	 * 
	 * @see org.eclipse.ui.internal.provisional.views.markers.api.MarkerItem#getMarker()
	 */
	public IMarker getMarker() {
		return marker;
	}

	/*
	 * (non-Javadoc)
	 * 
	 * @see org.eclipse.ui.internal.provisional.views.markers.MarkerItem#getMarkerTypeName()
	 */
	public String getMarkerTypeName() {
		try {
			return MarkerTypesModel.getInstance().getType(marker.getType())
					.getLabel();
		} catch (CoreException e) {
			MarkerSupportInternalUtilities.handle(e);
			return NLS.bind(MarkerMessages.FieldMessage_WrongType, marker
					.toString());
		}
	}

	/*
	 * (non-Javadoc)
	 * 
	 * @see org.eclipse.ui.provisional.views.markers.MarkerItem#getParent()
	 */
	public MarkerItem getParent() {
		return category;
	}

	/*
	 * (non-Javadoc)
	 * 
	 * @see org.eclipse.ui.internal.provisional.views.markers.MarkerItem#getPath()
	 */
	public String getPath() {
		if (folder == null) {
			if (!marker.exists()) {
				return super.getPath();
			}

			// If the path attribute is set use it.
			try {
				Object pathAttribute = marker
						.getAttribute(MarkerViewUtil.PATH_ATTRIBUTE);

				if (pathAttribute != null) {
					folder = pathAttribute.toString();
					return folder;
				}
			} catch (CoreException exception) {
				// Log the exception and fall back.
				MarkerSupportInternalUtilities.handle(exception);
			}

			IPath path = marker.getResource().getFullPath();
			int n = path.segmentCount() - 1; // n is the number of segments
			// in container, not path
			if (n <= 0) {
				return super.getPath();
			}
			int len = 0;
			for (int i = 0; i < n; ++i) {
				len += path.segment(i).length();
			}
			// account for /'s
			if (n > 1) {
				len += n - 1;
			}
			StringBuffer sb = new StringBuffer(len);
			for (int i = 0; i < n; ++i) {
				if (i != 0) {
					sb.append('/');
				}
				sb.append(path.segment(i));
			}
			folder = sb.toString();

		}
		return folder;
	}

	/*
	 * (non-Javadoc)
	 * 
	 * @see org.eclipse.ui.provisional.views.markers.MarkerItem#isConcrete()
	 */
	public boolean isConcrete() {
		return true;
	}

	/**
	 * Set the category to markerCategory.
	 */
	public void setCategory(MarkerCategory markerCategory) {
		category = markerCategory;

	}

	/**
	 * Get the category of the receiver.
	 * 
	 * @return {@link MarkerCategory}
	 */
	public MarkerCategory getCategory() {
		return category;
	}

	/**
	 * Set the marker for the receiver.
	 * 
	 * @param marker
	 *            The marker to set.
	 */
	public void setMarker(IMarker marker) {
		this.marker = marker;
		attributeCache.clear();
	}

	/*
	 * (non-Javadoc)
	 * 
	 * @see org.eclipse.core.runtime.IAdaptable#getAdapter(java.lang.Class)
	 */
	public Object getAdapter(Class adapter) {
		if (adapter.equals(IMarker.class))
			return marker;
		return null;
	}

}
