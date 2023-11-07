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
import org.eclipse.core.runtime.CoreException;
import org.eclipse.jface.viewers.CellEditor;
import org.eclipse.jface.viewers.CheckboxCellEditor;
import org.eclipse.jface.viewers.ColumnViewer;
import org.eclipse.jface.viewers.EditingSupport;
import org.eclipse.swt.graphics.Image;
import org.eclipse.swt.widgets.Composite;
import org.eclipse.swt.widgets.Control;
import org.eclipse.ui.ide.markers.compatibility.api.MarkerField;
import org.eclipse.ui.ide.markers.compatibility.api.MarkerItem;
import org.eclipse.ui.ide.markers.compatibility.api.MarkerSupportConstants;
import org.eclipse.ui.ide.markers.compatibility.api.internal.MarkerMessages;

/**
 * MarkerCompletionField is the class that specifies the completion entry.
 * 
 * @since 3.4
 */
public class MarkerCompletionField extends MarkerField {

	static final String COMPLETE_IMAGE_PATH = "$nl$/icons/full/obj16/complete_tsk.gif"; //$NON-NLS-1$

	static final String INCOMPLETE_IMAGE_PATH = "$nl$/icons/full/obj16/incomplete_tsk.gif"; //$NON-NLS-1$

	private static final int DONE = 2;
	private static final int NOT_DONE = 1;
	private static final int UNDEFINED = 0;

	private class CompletionEditingSupport extends EditingSupport {

		private CheckboxCellEditor editor;

		/**
		 * Create a new instance of the receiver.
		 */
		public CompletionEditingSupport(ColumnViewer viewer) {
			super(viewer);
			this.editor = new CheckboxCellEditor((Composite) viewer
					.getControl());
		}

		/*
		 * (non-Javadoc)
		 * 
		 * @see org.eclipse.jface.viewers.EditingSupport#canEdit(java.lang.Object)
		 */
		protected boolean canEdit(Object element) {
			if (element instanceof MarkerEntry)
				return ((MarkerEntry) element).getAttributeValue(
						IMarker.USER_EDITABLE, false);
			return false;
		}

		/*
		 * (non-Javadoc)
		 * 
		 * @see org.eclipse.jface.viewers.EditingSupport#getCellEditor(java.lang.Object)
		 */
		protected CellEditor getCellEditor(Object element) {
			return editor;
		}

		/*
		 * (non-Javadoc)
		 * 
		 * @see org.eclipse.jface.viewers.EditingSupport#getValue(java.lang.Object)
		 */
		protected Object getValue(Object element) {
			return new Boolean(((MarkerEntry) element).getAttributeValue(IMarker.DONE,
					false));
		}

		/*
		 * (non-Javadoc)
		 * 
		 * @see org.eclipse.jface.viewers.EditingSupport#setValue(java.lang.Object,
		 *      java.lang.Object)
		 */
		protected void setValue(Object element, Object value) {
			MarkerEntry entry = (MarkerEntry) element;
			Boolean booleanValue = (Boolean) value; 
			try {
				entry.getMarker().setAttribute(IMarker.DONE, booleanValue.booleanValue());
			} catch (CoreException e) {
				MarkerSupportInternalUtilities.handle(e);
			}

		}
	}

	/**
	 * Create a new instance of the receiver.
	 */
	public MarkerCompletionField() {
		super();
	}

	/*
	 * (non-Javadoc)
	 * 
	 * @see org.eclipse.ui.internal.provisional.views.markers.api.MarkerField#getDefaultColumnWidth(org.eclipse.swt.widgets.Control)
	 */
	public int getDefaultColumnWidth(Control control) {
		return 40;
	}

	/*
	 * (non-Javadoc)
	 * 
	 * @see org.eclipse.ui.internal.provisional.views.markers.MarkerField#getColumnHeaderText()
	 */
	public String getColumnHeaderText() {
		return MarkerSupportConstants.EMPTY_STRING;
	}

	/*
	 * (non-Javadoc)
	 * 
	 * @see org.eclipse.ui.internal.provisional.views.markers.MarkerField#getValue(org.eclipse.ui.internal.provisional.views.markers.MarkerItem)
	 */
	public String getValue(MarkerItem item) {
		return MarkerSupportConstants.EMPTY_STRING;
	}

	/*
	 * (non-Javadoc)
	 * 
	 * @see org.eclipse.ui.internal.provisional.views.markers.MarkerField#getImage(org.eclipse.ui.internal.provisional.views.markers.MarkerItem)
	 */
	public Image getImage(MarkerItem item) {

		switch (getDoneConstant(item)) {
		case DONE:
			return getCompleteImage();
		case NOT_DONE:
			return MarkerSupportInternalUtilities
					.createImage(INCOMPLETE_IMAGE_PATH);
		default:
			return null;
		}
	}

	/**
	 * Return the constant that indicates whether or not the receiver is done
	 * 
	 * @return 1 if it is done, 0 if it not and -1 if it cannot be determined.
	 */
	private int getDoneConstant(MarkerItem item) {

		int done = UNDEFINED;

		if (item.isConcrete()
				&& item.getAttributeValue(IMarker.USER_EDITABLE, true)) {
			done = NOT_DONE;
			if (item.getAttributeValue(IMarker.DONE, false)) {
				done = DONE;
			}
		}
		return done;
	}

	/**
	 * Return the image for task completion.
	 * 
	 * @return Image
	 */
	private Image getCompleteImage() {
		return MarkerSupportInternalUtilities.createImage(COMPLETE_IMAGE_PATH);
	}

	/*
	 * (non-Javadoc)
	 * 
	 * @see org.eclipse.ui.internal.provisional.views.markers.api.MarkerField#getColumnTooltipText()
	 */
	public String getColumnTooltipText() {
		return MarkerMessages.completion_description;
	}

	/*
	 * (non-Javadoc)
	 * 
	 * @see org.eclipse.ui.internal.provisional.views.markers.api.MarkerField#compare(org.eclipse.ui.internal.provisional.views.markers.api.MarkerItem,
	 *      org.eclipse.ui.internal.provisional.views.markers.api.MarkerItem)
	 */
	public int compare(MarkerItem item1, MarkerItem item2) {
		return getDoneConstant(item2) - getDoneConstant(item1);
	}

	/*
	 * (non-Javadoc)
	 * 
	 * @see org.eclipse.ui.internal.provisional.views.markers.api.MarkerField#getEditingSupport(org.eclipse.jface.viewers.ColumnViewer)
	 */
	public EditingSupport getEditingSupport(ColumnViewer viewer) {

		return new CompletionEditingSupport(viewer);
	}
}
