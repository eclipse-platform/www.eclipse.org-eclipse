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

package org.eclipse.ui.examples.statushandlers.testtool.views;

import org.eclipse.swt.widgets.Composite;

/**
 * This interface should be implemented by any elements that will be visible in
 * the status handling test bed.
 */
public interface TestBedComponent {
	/**
	 * This method should create all controls on the given composite to interact
	 * with the user. First created control should be new composite.
	 * 
	 * @return The first composite.
	 */
	public Composite createComposite(Composite parent);

	/**
	 * This method should return a {@link TestBedRunnable} that will allow for
	 * running particular tests.
	 * 
	 * @return TestBedRunnable
	 */
	public TestBedRunnable getTestBedRunnable();

	/**
	 * This function returns a name of the component that will be presented to
	 * the user.
	 * 
	 * @return the name of the component
	 */
	public String getName();

	/**
	 * This function sets the composite controls to represent the runnable.
	 * 
	 * @param runnable
	 *            A runnable to be displayed
	 * @return true if the component is able to display the runnable, false
	 *         otherwise
	 */
	public boolean accept(TestBedRunnable runnable);
}
