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

import org.eclipse.ui.ide.markers.compatibility.api.MarkerSupportView;
import org.eclipse.ui.ide.markers.compatibility.api.internal.MarkerSupportRegistry;

/**
 * The ProblemsView is the view supplied by the ide to show
 * problems.
 * @since 3.4
 */
public class ProblemsView extends MarkerSupportView {

	/**
	 * Create a new instance of the receiver.
	 */
	public ProblemsView() {
		super(MarkerSupportRegistry.PROBLEMS_GENERATOR);
		
	}

}
