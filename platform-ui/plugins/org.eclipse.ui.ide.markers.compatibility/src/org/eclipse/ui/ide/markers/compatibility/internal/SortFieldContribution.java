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

import org.eclipse.jface.action.ContributionItem;
import org.eclipse.jface.action.IContributionItem;
import org.eclipse.jface.action.Separator;
import org.eclipse.swt.SWT;
import org.eclipse.swt.widgets.Event;
import org.eclipse.swt.widgets.Listener;
import org.eclipse.swt.widgets.Menu;
import org.eclipse.swt.widgets.MenuItem;
import org.eclipse.ui.ide.markers.compatibility.api.MarkerField;
import org.eclipse.ui.ide.markers.compatibility.api.internal.MarkerMessages;

/**
 * SortFieldContribution is the contribution that allows the user to choose
 * which field will become the primary sort field.
 * 
 * @since 3.4
 */
public class SortFieldContribution extends MarkersContribution {

	/**
	 * Create a new instance of the receiver.
	 */
	public SortFieldContribution() {
		super();
	}

	public SortFieldContribution(String id) {
		super(id);
	}

	/*
	 * (non-Javadoc)
	 * 
	 * @see org.eclipse.ui.actions.CompoundContributionItem#getContributionItems()
	 */
	protected IContributionItem[] getContributionItems() {

		MarkerField[] fields = getView().getBuilder().getVisibleFields();

		if (fields.length == 0)
			return new IContributionItem[0];

		IContributionItem[] items = new IContributionItem[fields.length + 2];

		for (int i = 0; i < fields.length; i++) {
			items[i] = getContributionItem(fields[i]);
		}

		items[fields.length] = new Separator();
		items[fields.length + 1] = getDirectionContribution();

		return items;

	}

	/**
	 * Return the ascending/descending contriution.
	 * @return IContributionItem
	 */
	private IContributionItem getDirectionContribution() {
		return new ContributionItem() {

			/*
			 * (non-Javadoc)
			 * 
			 * @see org.eclipse.jface.action.ContributionItem#fill(org.eclipse.swt.widgets.Menu,
			 *      int)
			 */
			public void fill(Menu menu, int index) {
				MenuItem item = new MenuItem(menu, SWT.CHECK);
				item.setText(MarkerMessages.sortDirectionAscending_text);
				final ExtendedMarkersView view = getView();
				item.addListener(SWT.Selection, new Listener() {
					/*
					 * (non-Javadoc)
					 * 
					 * @see org.eclipse.swt.widgets.Listener#handleEvent(org.eclipse.swt.widgets.Event)
					 */
					public void handleEvent(Event event) {

						if (view != null)
							view.toggleSortDirection();
					}
				});

				if (view != null)
					item.setSelection(view.getSortAscending());

			}

		};
	}

	/**
	 * Return the IContributionItem for field.
	 * 
	 * @return IContributionItem
	 */
	private IContributionItem getContributionItem(final MarkerField field) {
		return new ContributionItem() {

			/*
			 * (non-Javadoc)
			 * 
			 * @see org.eclipse.jface.action.ContributionItem#fill(org.eclipse.swt.widgets.Menu,
			 *      int)
			 */
			public void fill(Menu menu, int index) {
				MenuItem item = new MenuItem(menu, SWT.RADIO);
				String title = field.getColumnHeaderText();
				if (title.length() == 0)
					title = field.getColumnTooltipText();
				item.setText(title);
				ExtendedMarkersView view = getView();
				item.addListener(SWT.Selection,
						getMenuItemListener(field, view));

				if (view != null)
					item.setSelection(view.isPrimarySortField(field));

			}

			/**
			 * Return the menu item listener for selection of a field.
			 * 
			 * @return Listener
			 */
			private Listener getMenuItemListener(final MarkerField field,
					final ExtendedMarkersView view) {
				return new Listener() {
					/*
					 * (non-Javadoc)
					 * 
					 * @see org.eclipse.swt.widgets.Listener#handleEvent(org.eclipse.swt.widgets.Event)
					 */
					public void handleEvent(Event event) {

						MenuItem item = (MenuItem) event.widget;

						if (item.getSelection() && view != null)
							view.setPrimarySortField(field);
					}
				};
			}
		};
	}

}
