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

package org.eclipse.ui.ide.markers.compatibility.api;

import java.util.Map;

import org.eclipse.ui.IMemento;

/**
 * A MarkerFieldFilter is a filter on a particular marker field.
 * @since 3.4
 */
public abstract class MarkerFieldFilter {
	
	private MarkerField field;

	/**
	 * Return whether or not marker should be filtered by the receiver.
	 * @return boolean <code>true</code> if the marker should be shown.
	 */
	public abstract boolean select(MarkerItem item);
	
	/**
	 * Initialise the receiver with the values in the values Map.
	 * @see FiltersContributionParameters
	 */
	public void initialize(Map values){
		//Do nothing by default
	}
	
	/**
	 * Populate the working copy with the copy of whatever fields are required.
	 */
	public void populateWorkingCopy(MarkerFieldFilter copy){
		copy.field = this.field;
	}

	/**
	 * Set the field for the receiver.
	 */
	public final void setField(MarkerField markerField) {
		field = markerField;
		
	}

	/**
	 * Get the field for the receiver.
	 * @return MarkerField
	 */
	public final MarkerField getField() {
		return field;
	}

	/**
	 * Get the id this was registered against.
	 * @return String
	 */
	public String getID() {
		return getField().getId();
	}

	/**
	 * Save any of the relevant state for the receiver in the memento
	 * so that it can be used to restore the user settings.
	 * @see #loadSettings(IMemento)
	 */
	public abstract void saveSettings(IMemento memento) ;

	/**
	 * Load any settings for the receiver from the memento.
	 * @see #saveSettings(IMemento)
	 */
	public abstract void loadSettings(IMemento memento) ;
}
