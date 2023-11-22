/*******************************************************************************
 * Copyright (c) 2000, 2007 IBM Corporation and others.
 * All rights reserved. This program and the accompanying materials
 * are made available under the terms of the Eclipse Public License v1.0
 * which accompanies this distribution, and is available at
 * http://www.eclipse.org/legal/epl-v10.html
 *
 * Contributors:
 *     IBM Corporation - initial API and implementation
 *******************************************************************************/
package org.eclipse.ui.ide.markers.compatibility.internal;

import java.io.IOException;
import java.io.StringReader;
import java.io.StringWriter;
import java.lang.reflect.InvocationTargetException;
import java.util.ArrayList;
import java.util.Arrays;
import java.util.Collection;
import java.util.HashSet;
import java.util.Iterator;

import org.eclipse.core.resources.IMarker;
import org.eclipse.core.resources.IResource;
import org.eclipse.core.resources.IResourceChangeEvent;
import org.eclipse.core.resources.IResourceChangeListener;
import org.eclipse.core.resources.ResourcesPlugin;
import org.eclipse.core.resources.mapping.ResourceMapping;
import org.eclipse.core.resources.mapping.ResourceMappingContext;
import org.eclipse.core.resources.mapping.ResourceTraversal;
import org.eclipse.core.runtime.CoreException;
import org.eclipse.core.runtime.IConfigurationElement;
import org.eclipse.core.runtime.IProgressMonitor;
import org.eclipse.core.runtime.IStatus;
import org.eclipse.core.runtime.NullProgressMonitor;
import org.eclipse.core.runtime.Status;
import org.eclipse.core.runtime.SubProgressMonitor;
import org.eclipse.core.runtime.jobs.Job;
import org.eclipse.jface.operation.IRunnableWithProgress;
import org.eclipse.jface.preference.IPreferenceStore;
import org.eclipse.jface.util.IPropertyChangeListener;
import org.eclipse.jface.util.PropertyChangeEvent;
import org.eclipse.ui.IMemento;
import org.eclipse.ui.IPageLayout;
import org.eclipse.ui.PlatformUI;
import org.eclipse.ui.WorkbenchException;
import org.eclipse.ui.XMLMemento;
import org.eclipse.ui.ide.markers.compatibility.api.FilterConfigurationArea;
import org.eclipse.ui.ide.markers.compatibility.api.MarkerField;
import org.eclipse.ui.ide.markers.compatibility.api.MarkerItem;
import org.eclipse.ui.internal.ide.IDEInternalPreferences;
import org.eclipse.ui.internal.ide.IDEWorkbenchPlugin;
import org.eclipse.ui.internal.ide.StatusUtil;
import org.eclipse.ui.progress.IWorkbenchSiteProgressService;
import org.eclipse.ui.statushandlers.StatusManager;
import org.eclipse.ui.views.markers.internal.MarkerMessages;
import org.eclipse.ui.views.markers.internal.MarkerSupportRegistry;
import org.eclipse.ui.views.markers.internal.MarkerType;
import org.eclipse.ui.views.markers.internal.ProblemFilter;
import org.eclipse.ui.views.markers.internal.Util;

/**
 * The CachedMarkerBuilder is the object that generates the list of markers from
 * a generator.
 * 
 * @since 3.4
 */
public class CachedMarkerBuilder {

	private static final MarkerCategory[] EMPTY_CATEGORY_ARRAY = new MarkerCategory[0];
	private static final MarkerEntry[] EMPTY_ENTRY_ARRAY = new MarkerEntry[0];

	private static final int SHORT_DELAY = 100;// The 100 ms short delay for
	// scheduling

	private static final int TIME_OUT = 30000;// The 30s long delay to run

	private static final String TAG_FILTERS_SECTION = "filterGroups"; //$NON-NLS-1$
	private static final String TAG_GROUP_ENTRY = "filterGroup"; //$NON-NLS-1$
	private static final String TAG_AND = "andFilters"; //$NON-NLS-1$
	private static final String TAG_CATEGORY_GROUP = "categoryGroup"; //$NON-NLS-1$
	private static final String VALUE_NONE = "none"; //$NON-NLS-1$
	private static final String TAG_LEGACY_FILTER_ENTRY = "filter"; //$NON-NLS-1$

	private boolean building = true;// Start with nothing until we have
	// something

	private MarkerCategory[] categories;
	private MarkerMap currentMap = null;

	private MarkerContentGenerator generator; // The MarkerContentGenerator we
	// are
	// building for

	private Job markerProcessJob;

	private IWorkbenchSiteProgressService progressService;

	private Job updateJob;

	private MarkerGroup categoryGroup;

	private Collection enabledFilters;
	private Collection filters;
	private IResource[] focusResources = MarkerSupportInternalUtilities.EMPTY_RESOURCE_ARRAY;
	private MarkerField[] visibleFields;

	private boolean andFilters = false;
	private MarkerComparator comparator;
	private IMemento memento;
	private String viewId;

	// The time the build started. A -1 indicates no build in progress.
	private long preBuildTime = -1;

	// without a builder update

	/**
	 * Create a new instance of the receiver. Update using the updateJob.
	 * 
	 * @param id
	 *            id of the view we are building for
	 */
	CachedMarkerBuilder(MarkerContentGenerator contentGenerator, String id,
			IMemento memento) {
		this.generator = contentGenerator;
		this.viewId = id;
		initialiseVisibleFields();
		initializePreferenceListener();

		this.memento = memento;
		if (memento == null)
			setDefaultCategoryGroup(contentGenerator);
		else {
			// Set up the category group if it has been set or set a default.
			String categoryGroupID = memento.getString(TAG_CATEGORY_GROUP);
			if (categoryGroupID == null)
				setDefaultCategoryGroup(contentGenerator);
			else {
				if (categoryGroupID.equals(VALUE_NONE))
					this.categoryGroup = null;
				else {
					MarkerGroup newGroup = contentGenerator
							.getMarkerGroup(categoryGroupID);
					if (newGroup == null)
						setDefaultCategoryGroup(contentGenerator);
					else
						this.categoryGroup = newGroup;
				}
			}
		}

		createMarkerProcessJob();
		// Hook up to the resource changes after all widget have been created
		ResourcesPlugin.getWorkspace().addResourceChangeListener(
				getUpdateListener(),
				IResourceChangeEvent.POST_CHANGE
						| IResourceChangeEvent.PRE_BUILD
						| IResourceChangeEvent.POST_BUILD);

	}

	/**
	 * Create a preference listener for any preference updates.
	 */
	private void initializePreferenceListener() {
		IDEWorkbenchPlugin.getDefault().getPreferenceStore()
				.addPropertyChangeListener(new IPropertyChangeListener() {
					/*
					 * (non-Javadoc)
					 * 
					 * @see org.eclipse.jface.util.IPropertyChangeListener#propertyChange(org.eclipse.jface.util.PropertyChangeEvent)
					 */
					public void propertyChange(PropertyChangeEvent event) {
						if(event.getProperty().equals(getMementoPreferenceName())){
							rebuildFilters();
						}
							

					}
				});

	}

	/**
	 * Rebuild the list of filters
	 */
	protected void rebuildFilters() {
		filters = null;
		enabledFilters = null;
		scheduleMarkerUpdate();
		
	}

	/**
	 * Add the resources in resourceMapping to the resourceCollection
	 */
	private void addResources(Collection resourceCollection,
			ResourceMapping resourceMapping) {

		try {
			ResourceTraversal[] traversals = resourceMapping.getTraversals(
					ResourceMappingContext.LOCAL_CONTEXT,
					new NullProgressMonitor());
			for (int i = 0; i < traversals.length; i++) {
				ResourceTraversal traversal = traversals[i];
				IResource[] result = traversal.getResources();
				for (int j = 0; j < result.length; j++) {
					resourceCollection.add(result[j]);
				}
			}
		} catch (CoreException e) {
			MarkerSupportInternalUtilities.handle(e);
		}

	}

	/**
	 * Return whether the filters are being ANDed or ORed.
	 * 
	 * @return boolean
	 */
	boolean andFilters() {
		return andFilters;
	}

	/**
	 * Build all of the markers in the receiver.
	 */
	void buildAllMarkers(IProgressMonitor monitor) {
		building = true;
		MarkerMap newMarkers;
		try {

			monitor.beginTask(MarkerMessages.MarkerView_19, 60);

			monitor.subTask(MarkerMessages.MarkerView_waiting_on_changes);

			if (monitor.isCanceled())
				return;

			monitor.subTask(MarkerMessages.MarkerView_searching_for_markers);
			SubProgressMonitor subMonitor = new SubProgressMonitor(monitor, 10);
			newMarkers = generator.generateFilteredMarkers(subMonitor,
					andFilters(), focusResources, getEnabledFilters());

			if (monitor.isCanceled())
				return;

			sortAndMakeCategories(new SubProgressMonitor(monitor, 30),
					newMarkers);
			monitor.done();
		} finally {
			building = false;
		}

	}

	/**
	 * Break the marker up into categories
	 * 
	 * @param start
	 *            the start index in the markers
	 * @param end
	 *            the last index to check
	 * @param sortIndex -
	 *            the parent of the field
	 * @return MarkerCategory[] or <code>null</code> if we are at the bottom
	 *         of the tree
	 */
	MarkerCategory[] buildHierarchy(MarkerMap markers, int start, int end,
			int sortIndex) {
		MarkerComparator sorter = getComparator();

		if (sortIndex > 0) {
			return null;// Are we out of categories?
		}

		Collection categories = new ArrayList();

		Object previous = null;
		int categoryStart = start;

		Object[] elements = markers.toArray();

		for (int i = start; i <= end; i++) {

			if (previous != null) {
				// Are we at a category boundary?
				if (sorter.compareCategory(previous, elements[i]) != 0) {
					categories
							.add(new MarkerCategory(
									this,
									categoryStart,
									i - 1,
									getCategoryGroup()
											.getMarkerField()
											.getValue(
													markers
															.elementAt(categoryStart))));
					categoryStart = i;
				}
			}
			previous = elements[i];

		}

		if (end >= categoryStart) {
			categories.add(new MarkerCategory(this, categoryStart, end,
					getCategoryGroup().getMarkerField().getValue(
							markers.elementAt(categoryStart))));
		}

		MarkerCategory[] nodes = new MarkerCategory[categories.size()];
		categories.toArray(nodes);
		return nodes;

	}

	/**
	 * Cancel the pending jobs in the receiver.
	 */
	private void cancelJobs() {
		markerProcessJob.cancel();
		updateJob.cancel();
	}

	/**
	 * Return a collection of all of the configuration fields for this generator
	 * 
	 * @return Collection of {@link FilterConfigurationArea}
	 */
	Collection createFilterConfigurationFields() {
		Collection result = new ArrayList();
		for (int i = 0; i < visibleFields.length; i++) {
			FilterConfigurationArea area = visibleFields[i]
					.generateFilterArea();
			if (area != null)
				result.add(area);

		}
		return result;
	}

	/**
	 * Create the job for updating the markers.
	 */
	private void createMarkerProcessJob() {
		markerProcessJob = new Job(MarkerMessages.MarkerView_processUpdates) {
			/*
			 * (non-Javadoc)
			 * 
			 * @see org.eclipse.core.runtime.jobs.Job#belongsTo(java.lang.Object)
			 */
			public boolean belongsTo(Object family) {
				return MarkerContentGenerator.CACHE_UPDATE_FAMILY == family;
			}

			/*
			 * (non-Javadoc)
			 * 
			 * @see org.eclipse.core.runtime.jobs.Job#run(org.eclipse.core.runtime.IProgressMonitor)
			 */
			protected IStatus run(IProgressMonitor monitor) {
				updateJob.cancel();
				buildAllMarkers(monitor);
				updateJob.schedule();
				return Status.OK_STATUS;
			}

			/*
			 * (non-Javadoc)
			 * 
			 * @see org.eclipse.ui.progress.WorkbenchJob#shouldRun()
			 */
			public boolean shouldRun() {

				// Hold off while everything is active
				if (preBuildTime > 0
						&& System.currentTimeMillis() - preBuildTime < TIME_OUT)
					return false;

				// Clear it if we are past the time out.
				preBuildTime = -1;
				// Do not run if the change came in before there is a viewer
				return PlatformUI.isWorkbenchRunning();
			}
		};
		markerProcessJob.setSystem(true);

	}

	/**
	 * Disable all of the filters in the receiver.
	 */
	void disableAllFilters() {
		Collection allFilters = getEnabledFilters();
		Iterator enabled = allFilters.iterator();
		while (enabled.hasNext()) {
			MarkerFieldFilterGroup group = (MarkerFieldFilterGroup) enabled
					.next();
			group.setEnabled(false);
		}
		allFilters.clear();
		writeFiltersPreference();
		scheduleMarkerUpdate();

	}

	/**
	 * Return all of the filters for the receiver.
	 * 
	 * @return Collection of MarkerFieldFilterGroup
	 */
	Collection getAllFilters() {
		if (filters == null) {
			filters = new ArrayList();
			IConfigurationElement[] filterReferences = generator
					.getFilterReferences();
			for (int i = 0; i < filterReferences.length; i++) {
				filters.add(new MarkerFieldFilterGroup(filterReferences[i],
						this));
			}

			// Honour the deprecated problemFilters
			if (viewId.equals(IPageLayout.ID_PROBLEM_VIEW)) {
				Iterator problemFilters = MarkerSupportRegistry.getInstance()
						.getRegisteredFilters().iterator();
				while (problemFilters.hasNext())
					filters.add(new CompatibilityMarkerFieldFilterGroup(
							(ProblemFilter) problemFilters.next(), this));
			}

			// Apply the last settings
			loadFiltersPreference();

		}
		return filters;
	}

	/**
	 * Return the categories for the receiver.
	 * 
	 * @return MarkerCategory[] or <code>null</code> if there are no
	 *         categories.
	 */
	MarkerCategory[] getCategories() {
		if (building) {
			return null;
		}
		return categories;
	}

	/**
	 * Return the group used to generate categories.
	 * 
	 * @return MarkerGroup or <code>null</code>.
	 */
	MarkerGroup getCategoryGroup() {

		return categoryGroup;
	}

	/**
	 * Return a new instance of the receiver with the field
	 * 
	 * @return MarkerComparator
	 */
	MarkerComparator getComparator() {

		if (comparator == null) {
			MarkerField field = null;
			if (getCategoryGroup() != null)
				field = getCategoryGroup().getMarkerField();
			comparator = new MarkerComparator(field, generator.getAllFields());
			comparator.restore(this.memento);
		}
		return comparator;
	}

	/**
	 * Return the elements in the adapter.
	 * 
	 * @return Object[]
	 */
	MarkerItem[] getElements() {

		if (refreshingMarkers()) {
			return MarkerSupportInternalUtilities.EMPTY_MARKER_ITEM_ARRAY;
		}
		if (isShowingHierarchy() && categories != null) {
			return categories;
		}
		return currentMap.toArray();
	}

	/**
	 * Return the currently enabled filters.
	 * 
	 * @return Collection of MarkerFieldFilterGroup
	 */
	Collection getEnabledFilters() {
		if (enabledFilters == null) {
			enabledFilters = new HashSet();
			Iterator filtersIterator = getAllFilters().iterator();
			while (filtersIterator.hasNext()) {
				MarkerFieldFilterGroup next = (MarkerFieldFilterGroup) filtersIterator
						.next();
				if (next.isEnabled())
					enabledFilters.add(next);
			}
		}
		return enabledFilters;
	}

	/**
	 * Return the generator for the receiver.
	 * 
	 * @return MarkerContentGenerator
	 */
	MarkerContentGenerator getGenerator() {
		return generator;
	}

	/**
	 * Get the name of the filters preference for the receiver,
	 * 
	 * @return String
	 */
	private String getLegacyFiltersPreferenceName() {

		if (viewId.equals(IPageLayout.ID_BOOKMARKS))
			return IDEInternalPreferences.BOOKMARKS_FILTERS;
		if (viewId.equals(IPageLayout.ID_TASK_LIST))
			return IDEInternalPreferences.TASKS_FILTERS;
		return IDEInternalPreferences.PROBLEMS_FILTERS;

	}

	/**
	 * Get the raw list of marker entries.
	 * 
	 * @return list of MarkerEntry
	 */
	MarkerEntry[] getMarkerEntries() {
		if (refreshingMarkers())
			return EMPTY_ENTRY_ARRAY;

		return currentMap.toArray();
	}

	/**
	 * Get the MarkerItem that matches marker.
	 * 
	 * @return MarkerItem or <code>null</code> if it cannot be found
	 */
	MarkerItem getMarkerItem(IMarker marker) {
		if (refreshingMarkers())
			return null;
		return currentMap.getMarkerItem(marker);
	}

	/**
	 * Get the name for the preferences for the receiver.
	 * 
	 * @return String
	 */
	private String getMementoPreferenceName() {
		return getClass().getName() + viewId;
	}

	/**
	 * Return the primary sort field
	 * 
	 * @return MarkerField
	 */
	MarkerField getPrimarySortField() {
		return getComparator().getPrimarySortField();
	}

	/**
	 * Get the sort direction of field
	 * 
	 * @return int one of {@link MarkerComparator#ASCENDING} or
	 *         {@link MarkerComparator#DESCENDING}
	 */
	int getSortDirection(MarkerField field) {
		if (getComparator().descendingFields.contains(field))
			return MarkerComparator.DESCENDING;
		return MarkerComparator.ASCENDING;
	}

	/**
	 * Return the total number of markers.
	 * 
	 * @return int
	 */
	int getTotalMarkerCount() {
		MarkerItem[] elements = getElements();
		if (elements.length == 0 || elements[0].isConcrete())
			return elements.length;
		int length = 0;
		for (int i = 0; i < elements.length; i++) {
			length += elements[i].getChildren().length;
		}

		return length;
	}

	/**
	 * Return the resource listener for the builder
	 * 
	 * @return IResourceChangeListener
	 */
	private IResourceChangeListener getUpdateListener() {
		return new IResourceChangeListener() {

			/**
			 * Returns whether or not the given even contains marker deltas for
			 * this view.
			 * 
			 * @param event
			 *            the resource change event
			 * @return <code>true</code> if the event contains at least one
			 *         relevant marker delta
			 * @since 3.3
			 */
			private boolean hasMarkerDelta(IResourceChangeEvent event) {
				Iterator markerTypes = generator.getMarkerTypes().iterator();
				while (markerTypes.hasNext()) {
					MarkerType type = (MarkerType) markerTypes.next();

					if (event.findMarkerDeltas(type.getId(), true).length > 0)
						return true;

				}
				return false;
			}

			/*
			 * (non-Javadoc)
			 * 
			 * @see org.eclipse.core.resources.IResourceChangeListener#resourceChanged(org.eclipse.core.resources.IResourceChangeEvent)
			 */
			public void resourceChanged(IResourceChangeEvent event) {
				if (!hasMarkerDelta(event))
					return;

				if (event.getType() == IResourceChangeEvent.PRE_BUILD) {
					preBuild();
					return;
				}

				if (event.getType() == IResourceChangeEvent.POST_BUILD) {
					postBuild();
					scheduleMarkerUpdate();
					return;
				}

				// After 30 seconds do updates anyways
				if (progressService == null)
					markerProcessJob.schedule(TIME_OUT);
				else
					progressService.schedule(markerProcessJob, TIME_OUT);

			}

		};
	}

	/**
	 * Get the fields that this content generator is displaying.
	 * 
	 * @return {@link MarkerField}[]
	 */
	MarkerField[] getVisibleFields() {
		return visibleFields;
	}

	/**
	 * Return whether or not the receiver has markers without scheduling
	 * anything if it doesn't.
	 * 
	 * @return boolean <code>true</code> if the markers have not been
	 *         calculated.
	 */
	boolean hasNoMarkers() {
		return currentMap == null;
	}

	/**
	 * Initialise the visible fields based pm
	 */
	private void initialiseVisibleFields() {
		MarkerField[] initialFields = getGenerator().getInitialVisible();

		visibleFields = new MarkerField[initialFields.length];
		System.arraycopy(initialFields, 0, visibleFields, 0,
				initialFields.length);

	}

	/**
	 * Return whether or not the receiver is building.
	 * 
	 * @return boolean
	 */
	boolean isBuilding() {
		return building;
	}

	/**
	 * Return whether or not we are showing a hierarchy,.
	 * 
	 * @return <code>true</code> if a hierarchy is being shown.
	 */
	boolean isShowingHierarchy() {
		return categoryGroup != null;
	}

	/**
	 * Load the settings from the memento.
	 */
	private void loadFilterSettings(IMemento memento) {

		if (memento == null)
			return;

		Boolean andValue = memento.getBoolean(TAG_AND);
		if (andValue != null)
			setAndFilters(andValue.booleanValue());
		IMemento children[] = memento.getChildren(TAG_GROUP_ENTRY);

		for (int i = 0; i < children.length; i++) {
			IMemento child = children[i];
			String id = child.getString(IMemento.TAG_ID);
			if (id == null)
				continue;
			if (!loadGroupWithID(child, id))

				// Did not find a match must have been added by the user
				loadUserFilter(child);
		}

	}

	/**
	 * Load the filters defined in memento string.
	 */
	private void loadFiltersFrom(String mementoString) {
		if (mementoString.equals(IPreferenceStore.STRING_DEFAULT_DEFAULT))
			return;

		try {
			loadFilterSettings(XMLMemento.createReadRoot(new StringReader(
					mementoString)));
		} catch (WorkbenchException e) {
			StatusManager.getManager().handle(e.getStatus());
		}
	}

	/**
	 * Load the filters preference.
	 */
	private void loadFiltersPreference() {

		loadFiltersFrom(IDEWorkbenchPlugin.getDefault().getPreferenceStore()
				.getString(getMementoPreferenceName()));

		String legacyFilters = getLegacyFiltersPreferenceName();
		String migrationPreference = legacyFilters
				+ MarkerSupportInternalUtilities.MIGRATE_PREFERENCE_CONSTANT;

		if (IDEWorkbenchPlugin.getDefault().getPreferenceStore().getBoolean(
				migrationPreference))
			return;// Already migrated

		// Load any defined in a pre 3.4 workbench
		loadLegacyFiltersFrom(IDEWorkbenchPlugin.getDefault()
				.getPreferenceStore().getString(legacyFilters));

		// Mark as migrated
		IDEWorkbenchPlugin.getDefault().getPreferenceStore().setValue(
				migrationPreference, true);
	}

	/**
	 * Load the group with id from the child if there is a matching system group
	 * registered.
	 * 
	 * @return <code>true</code> if a matching group was found
	 */
	private boolean loadGroupWithID(IMemento child, String id) {
		Iterator groups = getAllFilters().iterator();

		while (groups.hasNext()) {
			MarkerFieldFilterGroup group = (MarkerFieldFilterGroup) groups
					.next();
			if (id.equals(group.getID())) {
				group.loadSettings(child);
				return true;
			}
		}
		return false;
	}

	/**
	 * Load the legacy filter into the system.
	 */
	private void loadLegacyFilter(IMemento child) {
		MarkerFieldFilterGroup newGroup = new MarkerFieldFilterGroup(null, this);
		newGroup.legacyLoadSettings(child);
		getAllFilters().add(newGroup);

	}

	/**
	 * Load the pre-3.4 filters.
	 */
	private void loadLegacyFiltersFrom(String mementoString) {

		if (mementoString.equals(IPreferenceStore.STRING_DEFAULT_DEFAULT))
			return;
		IMemento memento;
		try {
			memento = XMLMemento
					.createReadRoot(new StringReader(mementoString));
			restoreLegacyFilters(memento);
		} catch (WorkbenchException e) {
			StatusManager.getManager().handle(e.getStatus());
			return;
		}

	}

	/**
	 * Load the user supplied filter
	 */
	private void loadUserFilter(IMemento child) {
		MarkerFieldFilterGroup newGroup = new MarkerFieldFilterGroup(null, this);
		newGroup.loadSettings(child);
		getAllFilters().add(newGroup);
	}

	/**
	 * Post build has happened. Let it all run.
	 */
	protected void postBuild() {
		preBuildTime = -1;

	}

	/**
	 * We are in a pre build state. Do not update until the post build happens.
	 */
	protected void preBuild() {
		preBuildTime = System.currentTimeMillis();

	}

	/**
	 * Refresh the sort order and categories of the receiver.
	 * 
	 * @param service
	 *            The service to run the operation in.
	 */
	void refreshContents(IWorkbenchSiteProgressService service) {
		try {
			service.busyCursorWhile(new IRunnableWithProgress() {
				/*
				 * (non-Javadoc)
				 * 
				 * @see org.eclipse.jface.operation.IRunnableWithProgress#run(org.eclipse.core.runtime.IProgressMonitor)
				 */
				public void run(IProgressMonitor monitor) {

					// Let the build finish before trying to sort
					if (refreshingMarkers())
						return;
					sortAndMakeCategories(monitor, currentMap);
				}
			});
		} catch (InvocationTargetException e) {
			StatusManager.getManager().handle(
					StatusUtil.newStatus(IStatus.ERROR,
							e.getLocalizedMessage(), e));
		} catch (InterruptedException e) {
			StatusManager.getManager().handle(
					StatusUtil.newStatus(IStatus.ERROR,
							e.getLocalizedMessage(), e));
		}

	}

	/**
	 * Check if the markers are still being built. If so schedule an update.
	 * 
	 * @return <code>true</code> if the map is empty.
	 */
	private boolean refreshingMarkers() {
		if (currentMap == null) {// First time?
			scheduleMarkerUpdate();
			return true;
		}
		return building;
	}

	/**
	 * Restore the pre-3.4 filters.
	 */
	private void restoreLegacyFilters(IMemento memento) {

		IMemento[] sections = null;
		if (memento != null)
			sections = memento.getChildren(TAG_LEGACY_FILTER_ENTRY);

		for (int i = 0; i < sections.length; i++) {
			IMemento child = sections[i];
			String id = child.getString(IMemento.TAG_ID);
			if (id == null)
				continue;
			loadLegacyFilter(child);
		}

	}

	/**
	 * Save the state of the receiver to memento
	 */
	void saveState(IMemento memento) {
		getComparator().saveState(memento);

		if (categoryGroup == null)
			memento.putString(TAG_CATEGORY_GROUP, VALUE_NONE);
		else
			memento.putString(TAG_CATEGORY_GROUP, getCategoryGroup().getId());
	}

	/**
	 * Schedule an update of the markers with a delay.
	 */
	void scheduleMarkerUpdate() {
		cancelJobs();
		currentMap = null;
		building = true;
		progressService.schedule(markerProcessJob, SHORT_DELAY);
	}

	/**
	 * Set whether the filters are being ANDed or ORed.
	 */
	void setAndFilters(boolean and) {
		andFilters = and;
	}

	/**
	 * Set the category group.
	 * 
	 * @param group
	 *            {@link MarkerGroup} or <code>null</code>.
	 */
	void setCategoryGroup(MarkerGroup group) {
		this.categoryGroup = group;
		comparator = null;
		scheduleMarkerUpdate();

	}

	/**
	 * Categorise by the default setting for contentGenerator.
	 */
	private void setDefaultCategoryGroup(MarkerContentGenerator contentGenerator) {
		String categoryName = contentGenerator.getCategoryName();
		if (categoryName != null) {
			MarkerGroup group = contentGenerator.getMarkerGroup(categoryName);
			if (group != null)
				categoryGroup = group;
		}

	}

	/**
	 * Set the generator and update the contents.
	 */
	void setGenerator(MarkerContentGenerator generator) {
		this.generator = generator;
		scheduleMarkerUpdate();
	}

	/**
	 * Set the primary sort field for the receiver.
	 */
	void setPrimarySortField(MarkerField field) {

		getComparator().setPrimarySortField(field);

	}

	/**
	 * Set the progress service for the receiver.
	 */
	void setProgressService(IWorkbenchSiteProgressService service) {
		progressService = service;
		if (service != null) {
			service.showBusyForFamily(ResourcesPlugin.FAMILY_MANUAL_BUILD);
			service.showBusyForFamily(ResourcesPlugin.FAMILY_AUTO_BUILD);
			service
					.showBusyForFamily(MarkerContentGenerator.CACHE_UPDATE_FAMILY);
		}

	}

	/**
	 * Set the updateJob for the receiver.
	 */
	void setUpdateJob(Job job) {
		updateJob = job;

	}

	/**
	 * Sort the newMarkers and build categories if required.
	 */
	void sortAndMakeCategories(IProgressMonitor monitor, MarkerMap newMarkers) {

		// Allow the keys to get regenerated
		Arrays.sort(newMarkers.toArray(), getComparator());

		monitor.worked(50);

		if (newMarkers.getSize() == 0) {
			categories = EMPTY_CATEGORY_ARRAY;
			currentMap = newMarkers;
			monitor.done();
			return;
		}

		monitor.subTask(MarkerMessages.MarkerView_queueing_updates);

		if (monitor.isCanceled())
			return;

		if (isShowingHierarchy()) {
			MarkerCategory[] newCategories = buildHierarchy(newMarkers, 0,
					newMarkers.getSize() - 1, 0);
			if (monitor.isCanceled())
				return;
			categories = newCategories;
		}

		monitor.worked(50);

		currentMap = newMarkers;
	}

	/**
	 * Add group to the enabled filters.
	 */
	void toggleFilter(MarkerFieldFilterGroup group) {
		Collection enabled = getEnabledFilters();
		if (enabled.remove(group)) // true if it was present
			group.setEnabled(false);

		else {
			group.setEnabled(true);
			enabled.add(group);
		}
		writeFiltersPreference();
		scheduleMarkerUpdate();
	}

	/**
	 * Update the focus resources from list. If there is an update required
	 * return <code>true</code>. This method assumes that there are filters
	 * on resources enabled.
	 */
	void updateFocusElements(Object[] elements) {
		Collection resourceCollection = new ArrayList();
		for (int i = 0; i < elements.length; i++) {
			if (elements[i] instanceof IResource) {
				resourceCollection.add(elements[i]);
			} else {
				addResources(resourceCollection,
						((ResourceMapping) elements[i]));
			}
		}

		focusResources = new IResource[resourceCollection.size()];
		resourceCollection.toArray(focusResources);
	}

	/**
	 * Update the receiver for a change in selection.
	 */
	void updateForNewSelection(Object[] newElements) {
		if (updateNeeded(newElements)) {
			updateFocusElements(newElements);
			scheduleMarkerUpdate();
		}

	}

	/**
	 * Update the receiver from the dialog.
	 */
	void updateFrom(FiltersConfigurationDialog dialog) {
		setAndFilters(dialog.andFilters());
		filters = dialog.getFilters();
		enabledFilters = null;

		writeFiltersPreference();
		scheduleMarkerUpdate();

	}

	/**
	 * Return whether or not the list contains a resource that will require
	 * regeneration.
	 * 
	 * @return boolean <code>true</code> if regeneration is required.
	 */
	boolean updateNeeded(Object[] newElements) {

		Iterator filters = getEnabledFilters().iterator();

		while (filters.hasNext()) {
			MarkerFieldFilterGroup filter = (MarkerFieldFilterGroup) filters
					.next();

			int scope = filter.getScope();
			if (scope == MarkerFieldFilterGroup.ON_ANY
					|| scope == MarkerFieldFilterGroup.ON_WORKING_SET)
				continue;

			if (newElements == null || newElements.length < 1)
				continue;

			if (focusResources.length == 0)
				return true; // We had nothing now we have something

			if (Arrays.equals(focusResources, newElements))
				continue;

			if (scope == MarkerFieldFilterGroup.ON_ANY_IN_SAME_CONTAINER) {
				Collection oldProjects = MarkerFieldFilterGroup
						.getProjectsAsCollection(focusResources);
				Collection newProjects = MarkerFieldFilterGroup
						.getProjectsAsCollection(newElements);

				if (oldProjects.size() == newProjects.size()
						&& newProjects.containsAll(oldProjects))
					continue;
				return true;// Something must be different
			}
			return true;
		}

		return false;
	}

	private void writeFiltersPreference() {
		XMLMemento memento = XMLMemento.createWriteRoot(TAG_FILTERS_SECTION);

		writeFiltersSettings(memento);

		StringWriter writer = new StringWriter();
		try {
			memento.save(writer);
		} catch (IOException e) {
			IDEWorkbenchPlugin.getDefault().getLog().log(Util.errorStatus(e));
		}

		IDEWorkbenchPlugin.getDefault().getPreferenceStore().putValue(
				getMementoPreferenceName(), writer.toString());
		IDEWorkbenchPlugin.getDefault().savePluginPreferences();
	}

	/**
	 * Write the settings for the filters to the memento.
	 */
	private void writeFiltersSettings(XMLMemento memento) {

		memento.putBoolean(TAG_AND, andFilters);

		Iterator groups = getAllFilters().iterator();
		while (groups.hasNext()) {
			MarkerFieldFilterGroup group = (MarkerFieldFilterGroup) groups
					.next();
			IMemento child = memento
					.createChild(TAG_GROUP_ENTRY, group.getID());
			group.saveFilterSettings(child);
		}

	}
}
