/*******************************************************************************
 * Copyright (c) 2008 IBM Corporation and others.
 * All rights reserved. This program and the accompanying materials
 * are made available under the terms of the Eclipse Public License v1.0
 * which accompanies this distribution, and is available at
 * http://www.eclipse.org/legal/epl-v10.html
 *
 * Contributors:
 *     IBM Corporation - initial API and implementation
 ******************************************************************************/

package org.eclipse.ui.ide.markers.compatibility.internal;

import org.eclipse.ui.ide.markers.compatibility.api.internal.ProblemFilter;

/**
 * CompatibilityMarkerFieldFilterGroup is a filter group that uses a
 * {@link ProblemFilter}.
 * 
 * @since 3.4
 */
public class CompatibilityMarkerFieldFilterGroup extends MarkerFieldFilterGroup {

	ProblemFilter problemFilter;

	/**
	 * Create a new instance of the receiver based on the ProblemFilter.
	 */
	public CompatibilityMarkerFieldFilterGroup(ProblemFilter filter,
			CachedMarkerBuilder cachedMarkerBuilder) {
		super(null, cachedMarkerBuilder);
		problemFilter = filter;
		setEnabled(filter.isEnabled());
		setScope(filter.getOnResource());
	}

	/*
	 * (non-Javadoc)
	 * 
	 * @see org.eclipse.ui.internal.views.markers.MarkerFieldFilterGroup#getID()
	 */
	public String getID() {
		return problemFilter.getId();
	}

	/*
	 * (non-Javadoc)
	 * 
	 * @see org.eclipse.ui.internal.views.markers.MarkerFieldFilterGroup#getName()
	 */
	public String getName() {
		return problemFilter.getName();
	}

	/*
	 * (non-Javadoc)
	 * 
	 * @see org.eclipse.ui.internal.views.markers.MarkerFieldFilterGroup#isSystem()
	 */
	public boolean isSystem() {
		return true;
	}

	/*
	 * (non-Javadoc)
	 * 
	 * @see org.eclipse.ui.internal.views.markers.MarkerFieldFilterGroup#makeWorkingCopy()
	 */
	MarkerFieldFilterGroup makeWorkingCopy() {

		CompatibilityMarkerFieldFilterGroup clone = new CompatibilityMarkerFieldFilterGroup(
				this.problemFilter, this.builder);
		if (populateClone(clone))
			return clone;
		return null;

	}

	/*
	 * (non-Javadoc)
	 * 
	 * @see org.eclipse.ui.internal.views.markers.MarkerFieldFilterGroup#calculateFilters()
	 */
	protected void calculateFilters() {
		super.calculateFilters();
		// Now initialize with the ProblemFilter
		for (int i = 0; i < fieldFilters.length; i++) {
			if (fieldFilters[i] instanceof CompatibilityFieldFilter)
				((CompatibilityFieldFilter) fieldFilters[i])
						.initialize(problemFilter);
		}
	}

}
