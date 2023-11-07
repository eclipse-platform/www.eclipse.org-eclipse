/*******************************************************************************
 * Copyright (c) 2007, 2008 IBM Corporation and others.
 * All rights reserved. This program and the accompanying materials
 * are made available under the terms of the Eclipse Public License v1.0
 * which accompanies this distribution, and is available at
 * http://www.eclipse.org/legal/epl-v10.html
 *
 * Contributors:
 *     IBM Corporation - initial API and implementation
 ******************************************************************************/

package org.eclipse.ui.examples.statushandlers.testtool.views;

import java.util.ArrayList;
import java.util.Iterator;
import java.util.List;

import org.eclipse.ui.IMemento;
import org.eclipse.ui.examples.statushandlers.testtool.Messages;
import org.eclipse.ui.examples.statushandlers.testtool.views.StatusHandlingComponent.DisplayedItem;
import org.eclipse.ui.views.properties.IPropertyDescriptor;
import org.eclipse.ui.views.properties.IPropertySource;
import org.eclipse.ui.views.properties.PropertyDescriptor;

/**
 * This component is responsible for testing statuses.
 */
public class StatusHandlingRunnable extends TestBedRunnable {

	public static final String STATUS_HANDLING_TYPE = "statusHandling"; //$NON-NLS-1$

	/**
	 * TODO: properties for statusAdapter
	 */
	private final class StatusHandlingPropertySource implements IPropertySource {

		private final IPropertyDescriptor[] PROPERTY_DESCRIPTOR = new IPropertyDescriptor[] {
				new PropertyDescriptor(STATUS,
						Messages.StatusHandlingRunnable_StatusProperty),
				new PropertyDescriptor(FLAG,
						Messages.StatusHandlingRunnable_Hint),
				new PropertyDescriptor(WRAPPED,
						Messages.StatusHandlingRunnable_Wrapped),
				new PropertyDescriptor(EXPLANATION,
						Messages.StatusHandlingRunnable_Explanation),
				new PropertyDescriptor(ACTION,
						Messages.StatusHandlingRunnable_Action) };

		public Object getEditableValue() {
			return null;
		}

		public IPropertyDescriptor[] getPropertyDescriptors() {
			PropertyDescriptor[] descriptors = new PropertyDescriptor[items
					.size()];

			for (int i = 0; i < items.size(); i++) {
				descriptors[i] = new PropertyDescriptor(
						Messages.StatusHandlingRunnable_StatusProperty + i,
						Messages.StatusHandlingRunnable_StatusHandlinNo + i);
			}

			return descriptors;
		}

		public Object getPropertyValue(Object id) {
			String stringId = (String) id;
			stringId = stringId.replaceAll(
					Messages.StatusHandlingRunnable_StatusProperty, ""); //$NON-NLS-1$
			final int index = Integer.parseInt(stringId);
			return new IPropertySource() {

				public Object getEditableValue() {
					return null;
				}

				public IPropertyDescriptor[] getPropertyDescriptors() {
					return PROPERTY_DESCRIPTOR;
				}

				public Object getPropertyValue(Object id) {
					DisplayedItem di = (DisplayedItem) items.get(index);

					if (id.equals(STATUS)) {
						return di.getStatus();
					}
					if (id.equals(FLAG)) {
						String result = ""; //$NON-NLS-1$
						if ((di.getHint() & 2) > 0) {
							result += Messages.StatusHandlingComponent_HintShow;
						}
						if ((di.getHint() & 1) > 0) {
							result += Messages.StatusHandlingComponent_HintLog;
						}
						if ((di.getHint() & 4) > 0) {
							result += Messages.StatusHandlingComponent_HintBlock;
						}
						if (result.equals("")) { //$NON-NLS-1$
							result += Messages.StatusHandlingComponent_HintNone;
						}
						return result;
					}
					if (id.equals(WRAPPED)) {
						return "" + di.isWrapped(); //$NON-NLS-1$
					}
					if (id.equals(EXPLANATION)) {
						return di.getExplanation();
					}
					if (id.equals(ACTION)) {
						return di.getAction();
					}
					return null;
				}

				public boolean isPropertySet(Object id) {
					return true;
				}

				public void resetPropertyValue(Object id) {
				}

				public void setPropertyValue(Object id, Object value) {
				}
			};
		}

		public boolean isPropertySet(Object id) {
			return false;
		}

		public void resetPropertyValue(Object id) {

		}

		public void setPropertyValue(Object id, Object value) {

		}
	}

	private static final String STATUS = "status"; //$NON-NLS-1$
	private static final String FLAG = "handleFlag"; //$NON-NLS-1$
	private static final String WRAPPED = "wrapped"; //$NON-NLS-1$
	private static final String EXPLANATION = "explanation"; //$NON-NLS-1$
	private static final String ACTION = "action"; //$NON-NLS-1$
	List items;

	public StatusHandlingRunnable(List statusItems) {
		items = statusItems;
	}

	StatusHandlingRunnable() {
		items = new ArrayList();
	}

	public void run() {
		for (Iterator it = items.iterator(); it.hasNext();) {
			DisplayedItem di = (DisplayedItem) it.next();
			di.execute();
		}
	}

	/*
	 * (non-Javadoc)
	 * 
	 * @see org.eclipse.ui.examples.statushandlers.testtool.views.TestBedRunnable#toString()
	 */
	public String toString() {
		return Messages.StatusHandlingRunnable_StatusHandling;
	}

	/*
	 * (non-Javadoc)
	 * 
	 * @see org.eclipse.core.runtime.IAdaptable#getAdapter(java.lang.Class)
	 */
	public Object getAdapter(Class adapter) {
		if (adapter == IPropertySource.class) {
			return new StatusHandlingPropertySource();
		}
		return null;
	}

	/*
	 * (non-Javadoc)
	 * 
	 * @see org.eclipse.ui.examples.statushandlers.testtool.views.TestBedRunnable#getTypeId()
	 */
	public String getTypeId() {
		return STATUS_HANDLING_TYPE;
	}

	/*
	 * (non-Javadoc)
	 * 
	 * @see org.eclipse.ui.examples.statushandlers.testtool.views.TestBedRunnable#saveState(org.eclipse.ui.IMemento)
	 */
	protected void saveState(IMemento memento) {
		for (int i = 0; i < items.size(); i++) {
			DisplayedItem di = (DisplayedItem) items.get(i);
			di.saveState(memento);
		}
	}

	/**
	 * Creates StatusHandlingRunnable from the memento
	 * 
	 * @param memento
	 *            that stores all information about runnable
	 * @return StatusHandlingRunnable corresponding to the memento
	 */
	public static TestBedRunnable create(IMemento memento) {
		StatusHandlingRunnable runnable = new StatusHandlingRunnable();
		IMemento children[] = memento.getChildren(DisplayedItem.STATUS);
		for (int i = 0; i < children.length; i++) {
			runnable.items.add(DisplayedItem.create(children[i]));
		}
		return runnable;
	}

}
