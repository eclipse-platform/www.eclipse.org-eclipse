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

import java.util.ArrayList;
import java.util.Collection;
import java.util.HashSet;
import java.util.Iterator;
import java.util.List;

import org.eclipse.core.resources.IFile;
import org.eclipse.core.resources.IMarker;
import org.eclipse.core.resources.IResource;
import org.eclipse.core.resources.mapping.ResourceMapping;
import org.eclipse.core.runtime.CoreException;
import org.eclipse.core.runtime.IAdaptable;
import org.eclipse.core.runtime.IAdapterFactory;
import org.eclipse.core.runtime.IProgressMonitor;
import org.eclipse.core.runtime.IStatus;
import org.eclipse.core.runtime.Platform;
import org.eclipse.core.runtime.Status;
import org.eclipse.core.runtime.jobs.Job;
import org.eclipse.jface.action.ContributionManager;
import org.eclipse.jface.action.MenuManager;
import org.eclipse.jface.util.IPropertyChangeListener;
import org.eclipse.jface.util.OpenStrategy;
import org.eclipse.jface.util.PropertyChangeEvent;
import org.eclipse.jface.viewers.ColumnPixelData;
import org.eclipse.jface.viewers.EditingSupport;
import org.eclipse.jface.viewers.IOpenListener;
import org.eclipse.jface.viewers.ISelection;
import org.eclipse.jface.viewers.IStructuredSelection;
import org.eclipse.jface.viewers.ITreeContentProvider;
import org.eclipse.jface.viewers.OpenEvent;
import org.eclipse.jface.viewers.StructuredSelection;
import org.eclipse.jface.viewers.TableLayout;
import org.eclipse.jface.viewers.TreeViewer;
import org.eclipse.jface.viewers.TreeViewerColumn;
import org.eclipse.jface.viewers.Viewer;
import org.eclipse.jface.window.SameShellProvider;
import org.eclipse.jface.window.Window;
import org.eclipse.osgi.util.NLS;
import org.eclipse.swt.SWT;
import org.eclipse.swt.dnd.Clipboard;
import org.eclipse.swt.events.HelpEvent;
import org.eclipse.swt.events.HelpListener;
import org.eclipse.swt.events.SelectionAdapter;
import org.eclipse.swt.events.SelectionEvent;
import org.eclipse.swt.events.SelectionListener;
import org.eclipse.swt.events.TreeAdapter;
import org.eclipse.swt.events.TreeEvent;
import org.eclipse.swt.graphics.FontMetrics;
import org.eclipse.swt.graphics.GC;
import org.eclipse.swt.layout.FillLayout;
import org.eclipse.swt.widgets.Composite;
import org.eclipse.swt.widgets.Control;
import org.eclipse.swt.widgets.Menu;
import org.eclipse.swt.widgets.ScrollBar;
import org.eclipse.swt.widgets.Scrollable;
import org.eclipse.swt.widgets.Tree;
import org.eclipse.swt.widgets.TreeColumn;
import org.eclipse.ui.IEditorInput;
import org.eclipse.ui.IEditorPart;
import org.eclipse.ui.IMemento;
import org.eclipse.ui.IPartListener2;
import org.eclipse.ui.ISelectionListener;
import org.eclipse.ui.IViewSite;
import org.eclipse.ui.IWorkbenchPage;
import org.eclipse.ui.IWorkbenchPart;
import org.eclipse.ui.IWorkbenchPartReference;
import org.eclipse.ui.PartInitException;
import org.eclipse.ui.PlatformUI;
import org.eclipse.ui.contexts.IContext;
import org.eclipse.ui.ide.IDE;
import org.eclipse.ui.ide.ResourceUtil;
import org.eclipse.ui.ide.markers.compatibility.api.MarkerField;
import org.eclipse.ui.ide.markers.compatibility.api.MarkerItem;
import org.eclipse.ui.ide.markers.compatibility.api.MarkerSupportConstants;
import org.eclipse.ui.internal.ide.IDEInternalPreferences;
import org.eclipse.ui.internal.ide.IDEWorkbenchPlugin;
import org.eclipse.ui.internal.ide.StatusUtil;
import org.eclipse.ui.menus.IMenuService;
import org.eclipse.ui.part.ViewPart;
import org.eclipse.ui.progress.IWorkbenchSiteProgressService;
import org.eclipse.ui.progress.WorkbenchJob;
import org.eclipse.ui.statushandlers.StatusManager;
import org.eclipse.ui.views.markers.internal.MarkerMessages;
import org.eclipse.ui.views.markers.internal.MarkerSupportRegistry;
import org.eclipse.ui.views.tasklist.ITaskListResourceAdapter;

/**
 * The ExtendedMarkersView is the internal implementation of the view that shows
 * markers using the markerGenerators extension point.
 * 
 * The ExtendedMarkersView fully supports the markerSupport extension point and
 * is meant to be used as a view to complement them.
 * 
 * The markerContentGenerators to be used by the view can be specified by
 * appending a comma separated list of them after a colon in the class
 * specification of the view. If this list is left out the problems
 * markerContentProvider will be used.
 * 
 * @since 3.4
 */
public class ExtendedMarkersView extends ViewPart {

	/**
	 * MarkerSelectionEntry is a cache of the values for a marker entry.
	 * 
	 * @since 3.4
	 */
	final class MarkerSelectionEntry {

		Object[] cachedValues;

		MarkerSelectionEntry(MarkerItem item) {
			MarkerField[] fields = builder.getVisibleFields();
			cachedValues = new Object[fields.length];
			for (int i = 0; i < fields.length; i++) {
				cachedValues[i] = fields[i].getValue(item);
			}
		}

		/**
		 * Return whether or not the entry is equivalent to the cached state.
		 * 
		 * @return boolean <code>true</code> if they are equivalent
		 */
		boolean isEquivalentTo(MarkerItem item) {
			MarkerField[] fields = builder.getVisibleFields();

			if (cachedValues.length != fields.length)
				return false;

			for (int i = 0; i < fields.length; i++) {
				if (cachedValues[i] == fields[i].getValue(item))
					continue;
				return false;
			}
			return true;
		}

	}

	private static int instanceCount = 0;

	private static final String TAG_GENERATOR = "markerContentGenerator"; //$NON-NLS-1$
	private static final String TAG_HORIZONTAL_POSITION = "horizontalPosition"; //$NON-NLS-1$
	private static final String TAG_VERTICAL_POSITION = "verticalPosition"; //$NON-NLS-1$
	private static final String MARKER_FIELD = "MARKER_FIELD"; //$NON-NLS-1$

	private static final String TAG_EXPANDED = "expanded"; //$NON-NLS-1$

	private static final String TAG_CATEGORY = "category"; //$NON-NLS-1$

	private static final String TAG_PART_NAME = "partName"; //$NON-NLS-1$
	static {
		Platform.getAdapterManager().registerAdapters(new IAdapterFactory() {

			/*
			 * (non-Javadoc)
			 * 
			 * @see org.eclipse.core.runtime.IAdapterFactory#getAdapter(java.lang.Object,
			 *      java.lang.Class)
			 */
			public Object getAdapter(Object adaptableObject, Class adapterType) {
				if (adapterType == IMarker.class
						&& adaptableObject instanceof MarkerEntry)
					return ((MarkerEntry) adaptableObject).getMarker();

				return null;
			}

			/*
			 * (non-Javadoc)
			 * 
			 * @see org.eclipse.core.runtime.IAdapterFactory#getAdapterList()
			 */
			public Class[] getAdapterList() {
				return new Class[] { IMarker.class };
			}
		}, MarkerEntry.class);
	}

	/**
	 * Return the next secondary id.
	 * 
	 * @return String
	 */
	static String newSecondaryID() {
		return String.valueOf(instanceCount);
	}

	/**
	 * Open the supplied marker in an editor in page
	 */
	public static void openMarkerInEditor(IMarker marker, IWorkbenchPage page) {
		// optimization: if the active editor has the same input as
		// the
		// selected marker then
		// RevealMarkerAction would have been run and we only need
		// to
		// activate the editor
		IEditorPart editor = page.getActiveEditor();
		if (editor != null) {
			IEditorInput input = editor.getEditorInput();
			IFile file = ResourceUtil.getFile(input);
			if (file != null) {
				if (marker.getResource().equals(file)) {
					page.activate(editor);
				}
			}
		}

		if (marker != null && marker.getResource() instanceof IFile) {
			try {
				IDE.openEditor(page, marker, OpenStrategy.activateOnOpen());
			} catch (PartInitException e) {

				// Check for a nested CoreException
				IStatus status = e.getStatus();
				if (status != null
						&& status.getException() instanceof CoreException) {
					status = ((CoreException) status.getException())
							.getStatus();
				}

				if (status == null)
					StatusManager.getManager().handle(
							StatusUtil.newStatus(IStatus.ERROR, e.getMessage(),
									e), StatusManager.SHOW);

				else
					StatusManager.getManager().handle(status,
							StatusManager.SHOW);

			}
		}
	}

	private CachedMarkerBuilder builder;
	Collection categoriesToExpand;

	private Clipboard clipboard;

	Collection preservedSelection = new ArrayList();

	private Job updateJob;

	private MarkersTreeViewer viewer;
	private IPropertyChangeListener preferenceListener;
	private ISelectionListener pageSelectionListener;
	private IPartListener2 partListener;
	private IMemento memento;

	private String[] defaultGeneratorIds = new String[0];

	/**
	 * Return a new instance of the receiver.
	 * 
	 * @param contentGeneratorId
	 *            the id of the generator to load.
	 */
	public ExtendedMarkersView(String contentGeneratorId) {
		super();
		instanceCount++;
		defaultGeneratorIds = new String[] { contentGeneratorId };
		preferenceListener = new IPropertyChangeListener() {
			/*
			 * (non-Javadoc)
			 * 
			 * @see org.eclipse.jface.util.IPropertyChangeListener#propertyChange(org.eclipse.jface.util.PropertyChangeEvent)
			 */
			public void propertyChange(PropertyChangeEvent event) {
				String propertyName = event.getProperty();
				if (propertyName
						.equals(IDEInternalPreferences.USE_MARKER_LIMITS)
						|| propertyName
								.equals(IDEInternalPreferences.MARKER_LIMITS_VALUE)) {
					viewer.refresh();
					updateTitle();
				}
			}
		};
		IDEWorkbenchPlugin.getDefault().getPreferenceStore()
				.addPropertyChangeListener(preferenceListener);
	}

	/**
	 * Add all concrete {@link MarkerItem} elements associated with the receiver
	 * to allMarkers.
	 */
	private void addAllConcreteItems(MarkerItem markerItem,
			Collection allMarkers) {
		if (markerItem.isConcrete()) {
			allMarkers.add(markerItem);
			return;
		}

		MarkerItem[] children = markerItem.getChildren();
		for (int i = 0; i < children.length; i++) {
			addAllConcreteItems(children[i], allMarkers);
		}

	}

	/**
	 * Add the category to the list of expanded categories.
	 */
	void addExpandedCategory(MarkerCategory category) {
		getCategoriesToExpand().add(category.getName());

	}

	/**
	 * Add all of the markers in markerItem recursively.
	 * 
	 * @param allMarkers
	 *            {@link Collection} of {@link IMarker}
	 */
	private void addMarkers(MarkerItem markerItem, Collection allMarkers) {
		if (markerItem.getMarker() != null)
			allMarkers.add(markerItem.getMarker());
		MarkerItem[] children = markerItem.getChildren();
		for (int i = 0; i < children.length; i++) {
			addMarkers(children[i], allMarkers);

		}

	}

	/**
	 * Create the columns for the receiver.
	 * 
	 * @param currentColumns
	 *            the columns to refresh
	 */
	private void createColumns(TreeColumn[] currentColumns) {

		Tree tree = viewer.getTree();
		TableLayout layout = new TableLayout();

		MarkerField[] fields = builder.getVisibleFields();

		for (int i = 0; i < fields.length; i++) {
			MarkerField markerField = fields[i];

			// Take into account the expansion indicator
			int columnWidth = markerField.getDefaultColumnWidth(tree);

			if (i == 0) {
				// Compute and store a font metric
				GC gc = new GC(tree);
				gc.setFont(tree.getFont());
				FontMetrics fontMetrics = gc.getFontMetrics();
				gc.dispose();
				columnWidth = Math.max(columnWidth, fontMetrics
						.getAverageCharWidth() * 5);
			}

			layout.addColumnData(new ColumnPixelData(columnWidth, true, true));
			TreeViewerColumn column;
			if (i < currentColumns.length)
				column = new TreeViewerColumn(viewer, currentColumns[i]);
			else {
				column = new TreeViewerColumn(viewer, SWT.NONE);
				column.getColumn().setResizable(true);
				column.getColumn().setMoveable(true);
				column.getColumn().addSelectionListener(getHeaderListener());
			}

			column.getColumn().setData(MARKER_FIELD, markerField);
			// Show the help in the first column
			column.setLabelProvider(new MarkerColumnLabelProvider(markerField,
					i == 0));
			column.getColumn().setText(markerField.getColumnHeaderText());
			column.getColumn().setToolTipText(
					markerField.getColumnTooltipText());
			column.getColumn().setImage(markerField.getColumnHeaderImage());

			EditingSupport support = markerField.getEditingSupport(viewer);
			if (support != null)
				column.setEditingSupport(support);

			if (builder.getPrimarySortField().equals(markerField))
				updateDirectionIndicator(column.getColumn(), markerField);

		}

		// Remove extra columns
		if (currentColumns.length > fields.length) {
			for (int i = fields.length; i < currentColumns.length; i++) {
				currentColumns[i].dispose();

			}
		}

		viewer.getTree().setLayout(layout);
		tree.setLinesVisible(true);
		tree.setHeaderVisible(true);
		tree.layout(true);

	}

	/*
	 * (non-Javadoc)
	 * 
	 * @see org.eclipse.ui.part.WorkbenchPart#createPartControl(org.eclipse.swt.widgets.Composite)
	 */
	public void createPartControl(Composite parent) {
		parent.setLayout(new FillLayout());

		viewer = new MarkersTreeViewer(new Tree(parent, SWT.H_SCROLL
				| SWT.V_SCROLL | SWT.MULTI | SWT.FULL_SELECTION));
		viewer.getTree().setLinesVisible(true);
		viewer.setUseHashlookup(true);

		createColumns(new TreeColumn[0]);

		viewer.setContentProvider(getContentProvider());
		getSite().setSelectionProvider(viewer);

		viewer.setInput(builder);
		if (memento != null) {
			Scrollable scrollable = (Scrollable) viewer.getControl();
			ScrollBar bar = scrollable.getVerticalBar();
			if (bar != null) {
				Integer position = memento.getInteger(TAG_VERTICAL_POSITION);
				if (position != null)
					bar.setSelection(position.intValue());
			}
			bar = scrollable.getHorizontalBar();
			if (bar != null) {
				Integer position = memento.getInteger(TAG_HORIZONTAL_POSITION);
				if (position != null)
					bar.setSelection(position.intValue());
			}
		}

		// Initialise any selection based filtering
		pageSelectionListener = getPageSelectionListener();
		getSite().getPage().addPostSelectionListener(pageSelectionListener);

		partListener = getPartListener();
		getSite().getPage().addPartListener(partListener);

		pageSelectionListener.selectionChanged(getSite().getPage()
				.getActivePart(), getSite().getPage().getSelection());

		viewer.addOpenListener(new IOpenListener() {
			public void open(OpenEvent event) {
				openSelectedMarkers();
			}

		});

		viewer.getTree().addTreeListener(new TreeAdapter() {
			/*
			 * (non-Javadoc)
			 * 
			 * @see org.eclipse.swt.events.TreeAdapter#treeCollapsed(org.eclipse.swt.events.TreeEvent)
			 */
			public void treeCollapsed(TreeEvent e) {
				removeExpandedCategory((MarkerCategory) e.item.getData());
			}

			/*
			 * (non-Javadoc)
			 * 
			 * @see org.eclipse.swt.events.TreeAdapter#treeExpanded(org.eclipse.swt.events.TreeEvent)
			 */
			public void treeExpanded(TreeEvent e) {
				addExpandedCategory((MarkerCategory) e.item.getData());
			}
		});

		// Set help on the view itself
		viewer.getControl().addHelpListener(new HelpListener() {
			/*
			 * (non-Javadoc)
			 * 
			 * @see org.eclipse.swt.events.HelpListener#helpRequested(org.eclipse.swt.events.HelpEvent)
			 */
			public void helpRequested(HelpEvent e) {
				Object provider = getAdapter(IContextProvider.class);
				if (provider == null)
					return;

				IContext context = ((IContextProvider) provider)
						.getContext(viewer.getControl());
				PlatformUI.getWorkbench().getHelpSystem().displayHelp(context);
			}

		});

		registerContextMenu();

	}

	/**
	 * Return a part listener for the receiver.
	 * 
	 * @return IPartListener2
	 */
	private IPartListener2 getPartListener() {
		return new IPartListener2() {

			/*
			 * (non-Javadoc)
			 * 
			 * @see org.eclipse.ui.IPartListener2#partActivated(org.eclipse.ui.IWorkbenchPartReference)
			 */
			public void partActivated(IWorkbenchPartReference partRef) {
				// Do nothing by default

			}

			/*
			 * (non-Javadoc)
			 * 
			 * @see org.eclipse.ui.IPartListener2#partBroughtToTop(org.eclipse.ui.IWorkbenchPartReference)
			 */
			public void partBroughtToTop(IWorkbenchPartReference partRef) {
				// Do nothing by default

			}

			/*
			 * (non-Javadoc)
			 * 
			 * @see org.eclipse.ui.IPartListener2#partClosed(org.eclipse.ui.IWorkbenchPartReference)
			 */
			public void partClosed(IWorkbenchPartReference partRef) {
				// Do nothing by default

			}

			/*
			 * (non-Javadoc)
			 * 
			 * @see org.eclipse.ui.IPartListener2#partDeactivated(org.eclipse.ui.IWorkbenchPartReference)
			 */
			public void partDeactivated(IWorkbenchPartReference partRef) {
				// Do nothing by default

			}

			/*
			 * (non-Javadoc)
			 * 
			 * @see org.eclipse.ui.IPartListener2#partHidden(org.eclipse.ui.IWorkbenchPartReference)
			 */
			public void partHidden(IWorkbenchPartReference partRef) {
				// Do nothing by default

			}

			/*
			 * (non-Javadoc)
			 * 
			 * @see org.eclipse.ui.IPartListener2#partInputChanged(org.eclipse.ui.IWorkbenchPartReference)
			 */
			public void partInputChanged(IWorkbenchPartReference partRef) {
				// Do nothing by default

			}

			/*
			 * (non-Javadoc)
			 * 
			 * @see org.eclipse.ui.IPartListener2#partOpened(org.eclipse.ui.IWorkbenchPartReference)
			 */
			public void partOpened(IWorkbenchPartReference partRef) {
				// Do nothing by default

			}

			/*
			 * (non-Javadoc)
			 * 
			 * @see org.eclipse.ui.IPartListener2#partVisible(org.eclipse.ui.IWorkbenchPartReference)
			 */
			public void partVisible(IWorkbenchPartReference partRef) {
				if (partRef.getId().equals(
						ExtendedMarkersView.this.getSite().getId())) {
					pageSelectionListener.selectionChanged(getSite().getPage()
							.getActivePart(), getSite().getPage()
							.getSelection());
				}

			}

		};
	}

	public void dispose() {
		super.dispose();
		updateJob.cancel();
		instanceCount--;
		if (clipboard != null)
			clipboard.dispose();
		IDEWorkbenchPlugin.getDefault().getPreferenceStore()
				.removePropertyChangeListener(preferenceListener);
		getSite().getPage().removePostSelectionListener(pageSelectionListener);
		getSite().getPage().removePartListener(partListener);
	}

	/**
	 * Return all of the marker items in the receiver that are concrete.
	 * 
	 * @return MarkerItem[]
	 */
	MarkerItem[] getAllConcreteItems() {

		MarkerItem[] elements = builder.getElements();
		Collection allMarkers = new ArrayList();
		for (int i = 0; i < elements.length; i++) {
			addAllConcreteItems(elements[i], allMarkers);

		}
		MarkerItem[] markers = new MarkerItem[allMarkers.size()];
		allMarkers.toArray(markers);
		return markers;
	}

	/**
	 * Get all of the filters for the receiver.
	 * 
	 * @return Collection of {@link MarkerFieldFilterGroup}
	 */
	Collection getAllFilters() {
		return builder.getAllFilters();
	}

	/**
	 * Return all of the markers in the receiver.
	 * 
	 * @return IMarker[]
	 */
	IMarker[] getAllMarkers() {

		MarkerItem[] elements = builder.getElements();
		Collection allMarkers = new ArrayList();
		for (int i = 0; i < elements.length; i++) {
			addMarkers(elements[i], allMarkers);

		}
		IMarker[] markers = new IMarker[allMarkers.size()];
		allMarkers.toArray(markers);
		return markers;

	}

	/**
	 * Return the group used for categorisation.
	 * 
	 * @return MarkerGroup
	 */
	MarkerGroup getCategoryGroup() {
		return builder.getCategoryGroup();
	}

	/**
	 * Return the clipboard for the receiver.
	 * 
	 * @return Clipboard
	 */
	Clipboard getClipboard() {
		if (clipboard == null)
			clipboard = new Clipboard(viewer.getControl().getDisplay());
		return clipboard;
	}

	/**
	 * Return the content provider for the receiver.
	 * 
	 * @return ITreeContentProvider
	 */
	private ITreeContentProvider getContentProvider() {
		return new ITreeContentProvider() {

			/*
			 * (non-Javadoc)
			 * 
			 * @see org.eclipse.jface.viewers.IContentProvider#dispose()
			 */
			public void dispose() {

			}

			/*
			 * (non-Javadoc)
			 * 
			 * @see org.eclipse.jface.viewers.ILazyTreeContentProvider#updateChildCount(java.lang.Object,
			 *      int)
			 */
			// public void updateChildCount(Object element, int
			// currentChildCount) {
			//
			// int length;
			// if (element instanceof MarkerItem)
			// length = ((MarkerItem) element).getChildren().length;
			// else
			// // If it is not a MarkerItem it is the root
			// length = ((CachedMarkerBuilder) element).getElements().length;
			//
			// int markerLimit = MarkerSupportInternalUtilities
			// .getMarkerLimit();
			// length = markerLimit > 0 ? Math.min(length, markerLimit)
			// : length;
			// if (currentChildCount == length)
			// return;
			// viewer.setChildCount(element, length);
			//
			// }
			/*
			 * (non-Javadoc)
			 * 
			 * @see org.eclipse.jface.viewers.ILazyTreeContentProvider#updateElement(java.lang.Object,
			 *      int)
			 */
			// public void updateElement(Object parent, int index) {
			// MarkerItem newItem;
			//
			// if (parent instanceof MarkerItem)
			// newItem = ((MarkerItem) parent).getChildren()[index];
			// else
			// newItem = ((CachedMarkerBuilder) parent).getElements()[index];
			//
			// viewer.replace(parent, index, newItem);
			// updateChildCount(newItem, -1);
			//
			// if (!newItem.isConcrete()
			// && categoriesToExpand
			// .contains(((MarkerCategory) newItem).getName())) {
			// viewer.expandToLevel(newItem, 1);
			// categoriesToExpand.remove(newItem);
			// }
			//
			// }
			/*
			 * (non-Javadoc)
			 * 
			 * @see org.eclipse.jface.viewers.ITreeContentProvider#getChildren(java.lang.Object)
			 */
			public Object[] getChildren(Object parentElement) {
				MarkerItem[] children = ((MarkerItem) parentElement)
						.getChildren();

				return getLimitedChildren(children);
			}

			/**
			 * Get the children limited by the marker limits.
			 * 
			 * @return Object[]
			 */
			private Object[] getLimitedChildren(Object[] children) {
				int newLength = MarkerSupportInternalUtilities.getMarkerLimit();
				if (newLength > 0 && newLength < children.length) {
					Object[] newChildren = new Object[newLength];
					System.arraycopy(children, 0, newChildren, 0, newLength);
					return newChildren;
				}
				return children;
			}

			/*
			 * (non-Javadoc)
			 * 
			 * @see org.eclipse.jface.viewers.IStructuredContentProvider#getElements(java.lang.Object)
			 */
			public Object[] getElements(Object inputElement) {

				return getLimitedChildren(((CachedMarkerBuilder) inputElement)
						.getElements());
			}

			/*
			 * (non-Javadoc)
			 * 
			 * @see org.eclipse.jface.viewers.ILazyTreeContentProvider#getParent(java.lang.Object)
			 */
			public Object getParent(Object element) {
				Object parent = ((MarkerItem) element).getParent();
				if (parent == null)
					return builder;
				return parent;
			}

			/*
			 * (non-Javadoc)
			 * 
			 * @see org.eclipse.jface.viewers.ITreeContentProvider#hasChildren(java.lang.Object)
			 */
			public boolean hasChildren(Object element) {
				return ((MarkerItem) element).getChildren().length > 0;
			}

			/*
			 * (non-Javadoc)
			 * 
			 * @see org.eclipse.jface.viewers.IContentProvider#inputChanged(org.eclipse.jface.viewers.Viewer,
			 *      java.lang.Object, java.lang.Object)
			 */
			public void inputChanged(Viewer viewer, Object oldInput,
					Object newInput) {

			}
		};
	}

	/**
	 * Return the listener that updates sort values on selection.
	 * 
	 * @return SelectionListener
	 */
	private SelectionListener getHeaderListener() {

		return new SelectionAdapter() {
			/**
			 * Handles the case of user selecting the header area.
			 */
			public void widgetSelected(SelectionEvent e) {

				final TreeColumn column = (TreeColumn) e.widget;
				final MarkerField field = (MarkerField) column
						.getData(MARKER_FIELD);
				setPrimarySortField(field, column);
			}

		};

	}

	/**
	 * Return the selection listener for the page selection change.
	 * 
	 * @return ISelectionListener
	 */
	private ISelectionListener getPageSelectionListener() {
		return new ISelectionListener() {
			/**
			 * Get an ITaskListResourceAdapter for use by the default/
			 * 
			 * @return ITaskListResourceAdapter
			 */
			private ITaskListResourceAdapter getDefaultTaskListAdapter() {
				return new ITaskListResourceAdapter() {

					/*
					 * (non-Javadoc)
					 * 
					 * @see org.eclipse.ui.views.tasklist.ITaskListResourceAdapter#getAffectedResource(org.eclipse.core.runtime.IAdaptable)
					 */
					public IResource getAffectedResource(IAdaptable adaptable) {
						Object resource = adaptable.getAdapter(IResource.class);
						if (resource == null)
							resource = adaptable.getAdapter(IFile.class);
						if (resource == null)
							return null;
						return (IResource) resource;

					}

				};
			}

			/*
			 * (non-Javadoc)
			 * 
			 * @see org.eclipse.ui.ISelectionListener#selectionChanged(org.eclipse.ui.IWorkbenchPart,
			 *      org.eclipse.jface.viewers.ISelection)
			 */
			public void selectionChanged(IWorkbenchPart part,
					ISelection selection) {

				// Do not respond to our own selections or if we are not
				// visible
				if (part == ExtendedMarkersView.this
						|| !(getSite().getPage().isPartVisible(part)))
					return;

				List selectedElements = new ArrayList();
				if (part instanceof IEditorPart) {
					IEditorPart editor = (IEditorPart) part;
					IFile file = ResourceUtil.getFile(editor.getEditorInput());
					if (file == null) {
						IEditorInput editorInput = editor.getEditorInput();
						if (editorInput != null) {
							Object mapping = editorInput
									.getAdapter(ResourceMapping.class);
							if (mapping != null) {
								selectedElements.add(mapping);
							}
						}
					} else {
						selectedElements.add(file);
					}
				} else {
					if (selection instanceof IStructuredSelection) {
						for (Iterator iterator = ((IStructuredSelection) selection)
								.iterator(); iterator.hasNext();) {
							Object object = iterator.next();
							if (object instanceof IAdaptable) {
								ITaskListResourceAdapter taskListResourceAdapter;
								Object adapter = ((IAdaptable) object)
										.getAdapter(ITaskListResourceAdapter.class);
								if (adapter != null
										&& adapter instanceof ITaskListResourceAdapter) {
									taskListResourceAdapter = (ITaskListResourceAdapter) adapter;
								} else {
									taskListResourceAdapter = getDefaultTaskListAdapter();
								}

								IResource resource = taskListResourceAdapter
										.getAffectedResource((IAdaptable) object);
								if (resource == null) {
									Object mapping = ((IAdaptable) object)
											.getAdapter(ResourceMapping.class);
									if (mapping != null) {
										selectedElements.add(mapping);
									}
								} else {
									selectedElements.add(resource);
								}
							}
						}
					}
				}
				builder.updateForNewSelection(selectedElements.toArray());
			}

		};
	}

	/**
	 * Return all of the markers in the current selection
	 * 
	 * @return Array of {@link IMarker}
	 */
	public IMarker[] getSelectedMarkers() {
		ISelection selection = viewer.getSelection();
		if (selection instanceof IStructuredSelection) {
			IStructuredSelection structured = (IStructuredSelection) selection;
			Iterator elements = structured.iterator();
			Collection result = new ArrayList();
			while (elements.hasNext()) {
				MarkerItem next = (MarkerItem) elements.next();
				if (next.isConcrete())
					result.add(((MarkerEntry) next).getMarker());
			}
			if (result.isEmpty())
				return MarkerSupportInternalUtilities.EMPTY_MARKER_ARRAY;
			IMarker[] markers = new IMarker[result.size()];
			result.toArray(markers);
			return markers;
		}
		return MarkerSupportInternalUtilities.EMPTY_MARKER_ARRAY;

	}

	/**
	 * Return the sort direction.
	 * 
	 * @return boolean
	 */
	public boolean getSortAscending() {
		return viewer.getTree().getSortDirection() == SWT.TOP;
	}

	/**
	 * Return a job for updating the receiver.
	 * 
	 * @return Job
	 */
	private Job getUpdateJob(final CachedMarkerBuilder builder) {
		updateJob = new WorkbenchJob(MarkerMessages.MarkerView_queueing_updates) {

			/*
			 * (non-Javadoc)
			 * 
			 * @see org.eclipse.core.runtime.jobs.Job#belongsTo(java.lang.Object)
			 */
			public boolean belongsTo(Object family) {
				return family == MarkerContentGenerator.CACHE_UPDATE_FAMILY;
			}

			/**
			 * Return the viewer that is being updated.
			 * 
			 * @return TreeViewer
			 */
			private TreeViewer getViewer() {

				return viewer;
			}

			/*
			 * (non-Javadoc)
			 * 
			 * @see org.eclipse.ui.progress.UIJob#runInUIThread(org.eclipse.core.runtime.IProgressMonitor)
			 */
			public IStatus runInUIThread(IProgressMonitor monitor) {

				if (viewer.getControl().isDisposed()) {
					return Status.CANCEL_STATUS;
				}

				if (monitor.isCanceled())
					return Status.CANCEL_STATUS;

				// If there is only one category and the user has no saved state
				// show it
				if (builder.isShowingHierarchy()
						&& getCategoriesToExpand().isEmpty()) {
					MarkerCategory[] categories = builder.getCategories();
					if (categories != null && categories.length == 1)
						getCategoriesToExpand().add(categories[0].getName());
				}

				getViewer().refresh(true);
				updateTitle();

				if (preservedSelection.size() > 0) {

					Collection newSelection = new ArrayList();
					MarkerItem[] markerEntries = builder.getMarkerEntries();

					for (int i = 0; i < markerEntries.length; i++) {
						Iterator preserved = preservedSelection.iterator();
						while (preserved.hasNext()) {
							MarkerSelectionEntry next = (MarkerSelectionEntry) preserved
									.next();
							if (next.isEquivalentTo(markerEntries[i])) {
								newSelection.add(markerEntries[i]);
								continue;
							}
						}
					}

					getViewer().setSelection(
							new StructuredSelection(newSelection.toArray()),
							true);
					preservedSelection.clear();
				}
				if (getViewer().getTree().getItemCount() > 0)
					getViewer().getTree().setTopItem(
							getViewer().getTree().getItem(0));

				reexpandCategories(builder);
				return Status.OK_STATUS;
			}

			/*
			 * (non-Javadoc)
			 * 
			 * @see org.eclipse.ui.progress.WorkbenchJob#shouldRun()
			 */
			public boolean shouldRun() {
				return !builder.isBuilding();
			}

		};

		updateJob.setSystem(true);
		return updateJob;
	}

	/**
	 * Return the object that is the input to the viewer.
	 * 
	 * @return Object
	 */
	Object getViewerInput() {
		return viewer.getInput();
	}

	/**
	 * Get all of the fields visible in the receiver.
	 * 
	 * @return MarkerField[]
	 */
	MarkerField[] getVisibleFields() {
		return builder.getVisibleFields();
	}

	/*
	 * (non-Javadoc)
	 * 
	 * @see org.eclipse.ui.part.ViewPart#init(org.eclipse.ui.IViewSite,
	 *      org.eclipse.ui.IMemento)
	 */
	public void init(IViewSite site, IMemento memento) throws PartInitException {
		super.init(site, memento);
		MarkerContentGenerator generator = null;

		if (memento != null) {
			generator = MarkerSupportRegistry.getInstance().getGenerator(
					memento.getString(TAG_GENERATOR));
		}

		if (generator == null && defaultGeneratorIds.length > 0) {
			generator = MarkerSupportRegistry.getInstance().getGenerator(
					defaultGeneratorIds[0]);
			if (generator == null)
				logInvalidGenerator(defaultGeneratorIds[0]);
		}

		if (generator == null)
			generator = MarkerSupportRegistry.getInstance()
					.getDefaultGenerator();

		// Add in the entries common to all markers views
		IMenuService menuService = (IMenuService) site
				.getService(IMenuService.class);

		// Add in the markers view actions

		menuService.populateContributionManager((ContributionManager) site
				.getActionBars().getMenuManager(), "menu:" //$NON-NLS-1$
				+ MarkerSupportRegistry.MARKERS_ID);
		menuService.populateContributionManager((ContributionManager) site
				.getActionBars().getToolBarManager(),
				"toolbar:" + MarkerSupportRegistry.MARKERS_ID); //$NON-NLS-1$

		String viewId = site.getId();
		if (site.getSecondaryId() != null) {
			viewId = viewId + site.getSecondaryId();
		}
		builder = new CachedMarkerBuilder(generator, viewId, memento);

		builder.setUpdateJob(getUpdateJob(builder));
		Object service = site.getAdapter(IWorkbenchSiteProgressService.class);
		if (service != null)
			builder.setProgressService((IWorkbenchSiteProgressService) service);
		this.memento = memento;

		if(memento == null || memento.getString(TAG_PART_NAME) == null)
			return;
		
		setPartName(memento.getString(TAG_PART_NAME));
	}

	/**
	 * Log that a generator id is invalid.
	 */
	void logInvalidGenerator(String id) {
		StatusManager.getManager().handle(
				new Status(IStatus.WARNING, IDEWorkbenchPlugin.IDE_WORKBENCH,
						NLS.bind("Invalid markerContentGenerator {0} ", //$NON-NLS-1$
								id)));
	}

	/**
	 * Return whether or not group is enabled.
	 * 
	 * @return boolean
	 */
	boolean isEnabled(MarkerFieldFilterGroup group) {
		return builder.getEnabledFilters().contains(group);
	}

	/**
	 * Return the main sort field for the receiver.
	 * 
	 * @return {@link MarkerField}
	 */
	boolean isPrimarySortField(MarkerField field) {
		return builder.getPrimarySortField().equals(field);
	}

	/**
	 * Return whether or not generator is the selected one.
	 * 
	 * @return boolean
	 */
	boolean isShowing(MarkerContentGenerator generator) {
		return this.builder.getGenerator().equals(generator);
	}

	/**
	 * Open the filters dialog for the receiver.
	 */
	void openFiltersDialog() {
		FiltersConfigurationDialog dialog = new FiltersConfigurationDialog(
				new SameShellProvider(getSite().getWorkbenchWindow().getShell()),
				builder);
		if (dialog.open() == Window.OK) {
			builder.updateFrom(dialog);
		}

	}

	/**
	 * Open the selected markers
	 */
	void openSelectedMarkers() {
		IMarker[] markers = getSelectedMarkers();
		for (int i = 0; i < markers.length; i++) {
			IMarker marker = markers[i];
			IWorkbenchPage page = getSite().getPage();

			openMarkerInEditor(marker, page);
		}
	}

	/**
	 * Register the context menu for the receiver so that commands may be added
	 * to it.
	 */
	private void registerContextMenu() {
		MenuManager contextMenu = new MenuManager();
		contextMenu.setRemoveAllWhenShown(true);
		getSite().registerContextMenu(contextMenu, viewer);
		// Add in the entries for all markers views if this has a different if
		if (!getSite().getId().equals(MarkerSupportRegistry.MARKERS_ID))
			getSite().registerContextMenu(MarkerSupportRegistry.MARKERS_ID,
					contextMenu, viewer);
		Control control = viewer.getControl();
		Menu menu = contextMenu.createContextMenu(control);

		control.setMenu(menu);
	}

	/**
	 * Remove the category from the list of expanded ones.
	 */
	void removeExpandedCategory(MarkerCategory category) {
		getCategoriesToExpand().remove(category.getName());

	}

	/**
	 * Preserve the selection for re-selection after the next update.
	 */
	void saveSelection(ISelection selection) {
		preservedSelection.clear();
		if (selection instanceof IStructuredSelection) {
			IStructuredSelection structured = (IStructuredSelection) selection;
			Iterator iterator = structured.iterator();
			while (iterator.hasNext()) {
				MarkerItem next = (MarkerItem) iterator.next();
				if (next.isConcrete()) {
					preservedSelection.add(new MarkerSelectionEntry(next));
					getCategoriesToExpand().add(next.getParent());
				} else
					getCategoriesToExpand().add(next);
			}
		}

	}

	/*
	 * (non-Javadoc)
	 * 
	 * @see org.eclipse.ui.part.ViewPart#saveState(org.eclipse.ui.IMemento)
	 */
	public void saveState(IMemento memento) {
		super.saveState(memento);
		memento.putString(TAG_GENERATOR, builder.getGenerator().getId());
		memento.putString(TAG_PART_NAME, getPartName());


		if (!getCategoriesToExpand().isEmpty()) {
			IMemento expanded = memento.createChild(TAG_EXPANDED);
			Iterator categories = getCategoriesToExpand().iterator();
			while (categories.hasNext()) {
				expanded.createChild(TAG_CATEGORY, (String) categories.next());
			}
		}
		builder.saveState(memento);
	}

	/**
	 * Select all of the elements in the receiver.
	 */
	void selectAll() {
		viewer.getTree().selectAll();

	}

	/**
	 * Set the category group for the receiver.
	 */
	void setCategoryGroup(MarkerGroup group) {
		getCategoriesToExpand().clear();
		builder.setCategoryGroup(group);
	}

	/**
	 * Set the content generator for the receiver.
	 */
	void setContentGenerator(MarkerContentGenerator generator) {
		viewer.setSelection(new StructuredSelection());
		viewer.removeAndClearAll();
		builder.setGenerator(generator);
		createColumns(viewer.getTree().getColumns());

	}

	/*
	 * (non-Javadoc)
	 * 
	 * @see org.eclipse.ui.part.WorkbenchPart#setFocus()
	 */
	public void setFocus() {
		viewer.getControl().setFocus();

	}

	/**
	 * Set the primary sort field
	 */
	void setPrimarySortField(MarkerField field) {
		TreeColumn[] columns = viewer.getTree().getColumns();
		for (int i = 0; i < columns.length; i++) {
			TreeColumn treeColumn = columns[i];
			if (columns[i].getData(MARKER_FIELD).equals(field)) {
				setPrimarySortField(field, treeColumn);
				return;
			}
		}
		StatusManager.getManager().handle(
				StatusUtil.newStatus(IStatus.WARNING,
						"Sorting by non visible field " //$NON-NLS-1$
								+ field.getColumnHeaderText(), null));
	}

	/**
	 * Set the primary sort field to field and update the column.
	 */
	private void setPrimarySortField(MarkerField field, TreeColumn column) {
		builder.setPrimarySortField(field);

		IWorkbenchSiteProgressService service = (IWorkbenchSiteProgressService) getViewSite()
				.getAdapter(IWorkbenchSiteProgressService.class);
		builder.refreshContents(service);
		updateDirectionIndicator(column, field);
		viewer.refresh();
		reexpandCategories(builder);
	}

	/**
	 * Add group to the enabled filters.
	 */
	void toggleFilter(MarkerFieldFilterGroup group) {
		builder.toggleFilter(group);

	}

	/**
	 * Toggle the sort direction of the primary field
	 */
	void toggleSortDirection() {
		setPrimarySortField(builder.getPrimarySortField());

	}

	/**
	 * Update the direction indicator as column is now the primary column.
	 * 
	 * @field {@link MarkerField}
	 */
	void updateDirectionIndicator(TreeColumn column, MarkerField field) {
		viewer.getTree().setSortColumn(column);
		if (builder.getSortDirection(field) == MarkerComparator.ASCENDING)
			viewer.getTree().setSortDirection(SWT.UP);
		else
			viewer.getTree().setSortDirection(SWT.DOWN);
	}

	/**
	 * Update the title of the view.
	 */
	void updateTitle() {

		String status = MarkerSupportConstants.EMPTY_STRING;
		int totalCount = builder.getTotalMarkerCount();
		int filteredCount = 0;
		MarkerCategory[] categories = builder.getCategories();
		// Categories might be null if building is still happening
		if (categories != null && builder.isShowingHierarchy()) {
			int markerLimit = MarkerSupportInternalUtilities.getMarkerLimit();

			for (int i = 0; i < categories.length; i++) {
				filteredCount += markerLimit < 0 ? categories[i].getTotalSize()
						: Math.min(categories[i].getTotalSize(), markerLimit);
			}
		} else {
			filteredCount = MarkerSupportInternalUtilities.getMarkerLimit();
		}
		if (filteredCount < 0 || filteredCount >= totalCount) {
			status = NLS.bind(MarkerMessages.filter_itemsMessage, new Integer(
					totalCount));
		} else {
			status = NLS.bind(MarkerMessages.filter_matchedMessage,
					new Integer(filteredCount), new Integer(totalCount));
		}

		setContentDescription(status);

	}

	/**
	 * Set the selection of the receiver. reveal the item if reveal is true.
	 */
	void setSelection(StructuredSelection structuredSelection, boolean reveal) {

		List newSelection = new ArrayList(structuredSelection.size());

		for (Iterator i = structuredSelection.iterator(); i.hasNext();) {
			Object next = i.next();
			if (next instanceof IMarker) {
				MarkerItem marker = builder.getMarkerItem((IMarker) next);
				if (marker != null) {
					newSelection.add(marker);
				}
			}
		}

		viewer.setSelection(new StructuredSelection(newSelection), reveal);

	}

	/**
	 * Return the ids of the generators specified for the receiver.
	 * 
	 * @return String[]
	 */
	String[] getGeneratorIds() {
		return defaultGeneratorIds;
	}

	/**
	 * Turn off all filters in the builder.
	 */
	void disableAllFilters() {
		builder.disableAllFilters();

	}

	/**
	 * Return the builder for the receiver.
	 * 
	 * @return CachedMarkerBuilder
	 */
	CachedMarkerBuilder getBuilder() {
		return builder;
	}

	/**
	 * Get the categories to expand for the receiver.
	 * 
	 * @return Collection of MarkerCategory.
	 */
	private Collection getCategoriesToExpand() {
		if (categoriesToExpand == null) {
			categoriesToExpand = new HashSet();
			if (this.memento != null) {
				IMemento expanded = this.memento.getChild(TAG_EXPANDED);
				if (expanded != null) {
					IMemento[] mementoCategories = expanded
							.getChildren(TAG_CATEGORY);
					MarkerCategory[] markerCategories = builder.getCategories();
					if (markerCategories != null) {
						for (int i = 0; i < markerCategories.length; i++) {
							for (int j = 0; j < mementoCategories.length; j++) {
								if (markerCategories[i].getName().equals(
										mementoCategories[j].getID()))
									categoriesToExpand.add(markerCategories[i]
											.getName());
							}
						}
					}
				}
			}
		}
		return categoriesToExpand;
	}

	/**
	 * Restore the expanded categories.
	 */
	void reexpandCategories(final CachedMarkerBuilder builder) {
		if (!getCategoriesToExpand().isEmpty() && builder.isShowingHierarchy()) {
			MarkerItem[] items = builder.getElements();
			for (int i = 0; i < items.length; i++) {
				String name = ((MarkerCategory) items[i]).getName();
				if (getCategoriesToExpand().contains(name))
					viewer.expandToLevel(items[i], 2);

			}
		}
	}

	/**
	 * Initialize the title based on the count
	 */
	void initializeTitle(String count) {
		setPartName(NLS.bind(MarkerMessages.newViewTitle, new Object[] {
				getPartName(), count }));

	}
}
