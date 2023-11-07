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
import java.util.Collections;
import java.util.Iterator;
import java.util.List;

import org.eclipse.core.runtime.IStatus;
import org.eclipse.core.runtime.MultiStatus;
import org.eclipse.core.runtime.Status;
import org.eclipse.jface.viewers.IStructuredContentProvider;
import org.eclipse.jface.viewers.StructuredSelection;
import org.eclipse.jface.viewers.TableViewer;
import org.eclipse.jface.viewers.Viewer;
import org.eclipse.swt.SWT;
import org.eclipse.swt.events.SelectionAdapter;
import org.eclipse.swt.events.SelectionEvent;
import org.eclipse.swt.layout.GridData;
import org.eclipse.swt.layout.GridLayout;
import org.eclipse.swt.widgets.Button;
import org.eclipse.swt.widgets.Combo;
import org.eclipse.swt.widgets.Composite;
import org.eclipse.swt.widgets.Label;
import org.eclipse.swt.widgets.Text;
import org.eclipse.ui.IMemento;
import org.eclipse.ui.examples.statushandlers.testtool.Messages;
import org.eclipse.ui.examples.statushandlers.testtool.TestToolPlugin;
import org.eclipse.ui.statushandlers.IStatusAdapterConstants;
import org.eclipse.ui.statushandlers.StatusAdapter;
import org.eclipse.ui.statushandlers.StatusManager;

/**
 * This component allows for adding statuses to the test sequence
 */
public class StatusHandlingComponent implements TestBedComponent {

	private final class RemoveSelectionAdapter extends SelectionAdapter {
		public void widgetSelected(SelectionEvent e) {
			StructuredSelection sel = (StructuredSelection) statusTableViever
					.getSelection();
			for (Iterator it = sel.iterator(); it.hasNext();) {
				statusItems[0].remove(it.next());
			}
			statusTableViever.refresh();
		}
	}

	private class ContentProvider implements IStructuredContentProvider {

		/*
		 * (non-Javadoc)
		 * 
		 * @see org.eclipse.jface.viewers.IStructuredContentProvider#getElements(java.lang.Object)
		 */
		public Object[] getElements(Object inputElement) {
			return statusItems[0].toArray();
		}

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
		 * @see org.eclipse.jface.viewers.IContentProvider#inputChanged(org.eclipse.jface.viewers.Viewer,
		 *      java.lang.Object, java.lang.Object)
		 */
		public void inputChanged(Viewer viewer, Object oldInput, Object newInput) {

		}

	}

	/**
	 * An item to be displayed in the table.
	 */
	public static class DisplayedItem {

		// xml tags
		public static final String STATUS = "status"; //$NON-NLS-1$
		private static final String HINT = "hint"; //$NON-NLS-1$
		private static final String SEVERITY = "severity"; //$NON-NLS-1$
		private static final String SOURCEPLUGIN = "sourceplugin"; //$NON-NLS-1$
		private static final String MESSAGE = "message"; //$NON-NLS-1$
		private static final String TITLE = "title"; //$NON-NLS-1$
		private static final String EXPLANATION = "explanation"; //$NON-NLS-1$
		private static final String ACTION = "action"; //$NON-NLS-1$
		private static final String WRAPPED = "wrapped"; //$NON-NLS-1$
		private static final String MULTI = "multi"; //$NON-NLS-1$

		private int hint;
		private boolean wrapped;
		private String explanation;
		private String action;

		private IStatus status;
		private String title;
		private boolean multi;

		/**
		 * Constructs a new item.
		 * 
		 * @param status
		 *            a status
		 * @param hint
		 *            a hint to be passed with status
		 * @param wrapped
		 *            indicates if should be wrapped in StatusAdapter
		 * @param multi
		 *            indicates if should be {@link MultiStatus}
		 * @param title
		 *            a title to be passed in StatusAdapter
		 * @param explanation
		 *            an explanation to be passed in StatusAdapter
		 * @param action
		 *            an action to be passed in StatusAdapter
		 */
		public DisplayedItem(IStatus status, int hint, boolean wrapped,
				boolean multi, String title, String explanation, String action) {
			if (status == null)
				throw new IllegalArgumentException();
			this.status = status;
			this.hint = hint;
			this.wrapped = wrapped;
			this.title = title;
			this.explanation = explanation;
			this.action = action;
			this.multi = multi;
		}

		public String toString() {

			String severity = Messages.StatusHandlingComponent_Unknown;

			switch (status.getSeverity()) {
			case IStatus.CANCEL:
				severity = Messages.StatusHandlingComponent_SeverityCancel;
				break;
			case IStatus.ERROR:
				severity = Messages.StatusHandlingComponent_SeverityError;
				break;
			case IStatus.INFO:
				severity = Messages.StatusHandlingComponent_SeverityInfo;
				break;
			case IStatus.OK:
				severity = Messages.StatusHandlingComponent_SeverityOK;
				break;
			case IStatus.WARNING:
				severity = Messages.StatusHandlingComponent_SeverityWarning;
				break;
			}

			String stringHint = Messages.StatusHandlingComponent_Unknown;
			if (hint == StatusManager.NONE) {
				stringHint = Messages.StatusHandlingComponent_HintNone;
			} else {
				stringHint = ""; //$NON-NLS-1$
				if ((hint & StatusManager.SHOW) == StatusManager.SHOW) {
					stringHint += Messages.StatusHandlingComponent_HintShow;
				}
				if ((hint & StatusManager.LOG) == StatusManager.LOG) {
					stringHint += Messages.StatusHandlingComponent_HintLog;
				}
				if ((hint & StatusManager.BLOCK) == StatusManager.BLOCK) {
					stringHint += Messages.StatusHandlingComponent_HintBlock;
				}
			}

			return Messages.StatusHandlingComponent_Severity + severity
					+ Messages.StatusHandlingComponent_PluginId
					+ status.getPlugin()
					+ Messages.StatusHandlingComponent_Hint + stringHint
					+ Messages.StatusHandlingComponent_MultiStatus + multi
					+ Messages.StatusHandlingComponent_Wrapped + wrapped
					+ Messages.StatusHandlingComponent_Explanation
					+ explanation + Messages.StatusHandlingComponent_Action
					+ action;
		}

		/**
		 * Returns the hint
		 * 
		 * @return the hint
		 */
		public int getHint() {
			return hint;
		}

		/**
		 * Returns status
		 * 
		 * @return the status
		 */
		public IStatus getStatus() {
			return status;
		}

		/**
		 * Saves state to the memento
		 * 
		 * @param memento
		 *            memento that hold all the information
		 */
		public void saveState(IMemento memento) {
			IMemento child = memento.createChild(STATUS);
			child.putString(SOURCEPLUGIN, status.getPlugin());
			child.putInteger(SEVERITY, status.getSeverity());
			child.putInteger(HINT, hint);
			child.putString(MESSAGE, status.getMessage());
			child.putString(WRAPPED, "" + wrapped); //$NON-NLS-1$
			child.putString(MULTI, "" + status.isMultiStatus()); //$NON-NLS-1$
			child.putString(TITLE, title);
			child.putString(EXPLANATION, explanation);
			child.putString(ACTION, action);
		}

		/**
		 * Creates DisplayedItem from the memento
		 * 
		 * @param memento
		 *            that stores all information about DisplayedItem
		 * @return DisplayedItem corresponding to the memento
		 */
		public static Object create(IMemento memento) {
			String source = memento.getString(SOURCEPLUGIN);
			String message = memento.getString(MESSAGE);
			int severity = memento.getInteger(SEVERITY).intValue();
			int hint = memento.getInteger(HINT).intValue();
			boolean wrapped = new Boolean(memento.getString(WRAPPED)).booleanValue();
			String title = memento.getString(TITLE);
			if (title != null && title.length() == 0)
				title = null;
			String explanation = memento.getString(EXPLANATION);
			if (explanation != null && explanation.length() == 0)
				explanation = null;
			String action = memento.getString(ACTION);
			if (action != null && action.length() == 0)
				action = null;
			boolean multi = new Boolean(memento.getString(MULTI)).booleanValue();
			IStatus status = new Status(severity, source, message);
			if(multi){
				MultiStatus mStatus = new MultiStatus(source, severity, message, new NullPointerException());
				mStatus.add(status);
				mStatus.add(Status.OK_STATUS);
				status = mStatus;
			}
			return new DisplayedItem(status, hint, wrapped, multi, title, explanation, action);
		}

		/**
		 * Gets the explanation
		 * 
		 * @return The explanation.
		 */
		String getExplanation() {
			return explanation;
		}

		/**
		 * Sets explanation
		 * 
		 * @param explanation
		 *            The explanation to set.
		 */
		void setExplanation(String explanation) {
			this.explanation = explanation;
		}

		/**
		 * Returns the action.
		 * 
		 * @return The action.
		 */
		String getAction() {
			return action;
		}

		/**
		 * Sets the action.
		 * 
		 * @param action
		 *            The action to set.
		 */
		void setAction(String action) {
			this.action = action;
		}

		/**
		 * Indicates if the status is wrapped in StatusAdapter.
		 * 
		 * @return Returns the wrapped.
		 */
		boolean isWrapped() {
			return wrapped;
		}

		/**
		 * Sets the wrapped property
		 * 
		 * @param wrapped
		 *            The wrapped to set.
		 */
		void setWrapped(boolean wrapped) {
			this.wrapped = wrapped;
		}

		/**
		 * Returns the most important message in {@link StatusAdapter}
		 * @return the Title
		 */
		public String getTitle() {
			return title;
		}

		public void execute() {
			// see SampleStatusHandler
			// hints and statuses could be easily modified there
			if (isWrapped()) {
				StatusAdapter adapter = new StatusAdapter(getStatus());
				if (getTitle() != null) {
					adapter.setProperty(IStatusAdapterConstants.TITLE_PROPERTY,
							getTitle());
				}
				if (getAction() != null) {
					adapter.setProperty(IStatusAdapterConstants.HINT_PROPERTY,
							getAction());
				}
				if (getExplanation() != null) {
					adapter.setProperty(
							IStatusAdapterConstants.EXPLANATION_PROPERTY,
							getExplanation());
				}
				StatusManager.getManager().handle(adapter, getHint());
			} else {
				StatusManager.getManager().handle(getStatus(), getHint());
			}

		}
	}

	private List[] statusItems = new List[] { Collections
			.synchronizedList(new ArrayList()) };

	private TableViewer statusTableViever;
	private Combo statusSeverityField;
	private Text statusMessage;
	private Text statusPluginID;
	private Button showStatusField;
	private Button logStatusField;
	private Button blockStatusField;
	private Button wrappedStatusField;
	private Text titleField;
	private Text explanationField;
	private Text actionField;

	private Button multiStatusField;

	/*
	 * (non-Javadoc)
	 * 
	 * @see org.eclipse.ui.examples.statushandlers.testtool.views.TestBedComponent#createComposite(org.eclipse.swt.widgets.Composite)
	 */
	public Composite createComposite(Composite parent) {
		Composite composite = new Composite(parent, SWT.NONE);
		composite.setLayout(new GridLayout(2, false));
		composite.setLayoutData(new GridData(GridData.FILL_HORIZONTAL));

		statusTableViever = new TableViewer(composite, SWT.MULTI | SWT.BORDER
				| SWT.V_SCROLL | SWT.VIRTUAL);
		ContentProvider contentProvider = new ContentProvider();
		statusTableViever.setContentProvider(contentProvider);
		GridData gd = new GridData(GridData.FILL_BOTH);
		gd.verticalSpan = 2;
		statusTableViever.getTable().setLayoutData(gd);
		statusTableViever.setInput(new Object[0]);

		StatusHandlingView.createPopMenu(statusTableViever, statusItems,
				new RemoveSelectionAdapter());

		Composite addStatusComposite = new Composite(composite, SWT.BORDER);
		addStatusComposite.setLayout(new GridLayout(2, false));

		// duration
		Label label = new Label(addStatusComposite, SWT.NONE);
		label.setText(Messages.StatusHandlingComponent_SeverityLevel);
		statusSeverityField = new Combo(addStatusComposite, SWT.DROP_DOWN
				| SWT.READ_ONLY);
		statusSeverityField.setLayoutData(new GridData());
		statusSeverityField
				.setToolTipText(Messages.StatusHandlingComponent_GeneratedStatusSeverity);
		statusSeverityField.add(Messages.StatusHandlingComponent_SeverityOK);
		statusSeverityField.add(Messages.StatusHandlingComponent_SeverityInfo);
		statusSeverityField
				.add(Messages.StatusHandlingComponent_SeverityWarning);
		statusSeverityField
				.add(Messages.StatusHandlingComponent_SeverityCancel);
		statusSeverityField.add(Messages.StatusHandlingComponent_SeverityError);
		statusSeverityField.select(4);
		
		Label messageLabel = new Label(addStatusComposite, SWT.NONE);
		messageLabel.setText(Messages.StatusHandlingComponent_MessageLabel);
		
		statusMessage = new Text(addStatusComposite, SWT.BORDER);
		statusMessage.setLayoutData(new GridData(SWT.FILL, SWT.CENTER, true, false));
		statusMessage.setToolTipText(Messages.StatusHandlingComponent_MessageTooltip);
		statusMessage.setText(Messages.StatusHandlingComponent_ExemplaryMessage);

		Label labelID = new Label(addStatusComposite, SWT.NONE);
		labelID.setText(Messages.StatusHandlingComponent_PluginIdLabel);
		statusPluginID = new Text(addStatusComposite, SWT.BORDER);
		statusPluginID.setLayoutData(new GridData());
		statusPluginID
				.setToolTipText(Messages.StatusHandlingComponent_PluginIdTooltip);
		statusPluginID.setText(TestToolPlugin.PLUGIN_ID);

		showStatusField = new Button(addStatusComposite, SWT.CHECK);
		showStatusField
				.setText(Messages.StatusHandlingComponent_ShowStatusLabel);
		showStatusField.setLayoutData(new GridData());

		logStatusField = new Button(addStatusComposite, SWT.CHECK);
		logStatusField.setText(Messages.StatusHandlingComponent_LogStatusLabel);
		logStatusField.setLayoutData(new GridData());
		logStatusField
				.setToolTipText(Messages.StatusHandlingComponent_LogStatusTooltip);

		blockStatusField = new Button(addStatusComposite, SWT.CHECK);
		blockStatusField.setText(Messages.StatusHandlingComponent_BlockLabel);
		GridData blockGd = new GridData();
		blockStatusField.setLayoutData(blockGd);
		blockStatusField
				.setToolTipText(Messages.StatusHandlingComponent_blockTooltip);
		blockStatusField.addSelectionListener(new SelectionAdapter() {
			public void widgetSelected(SelectionEvent e) {
				if (blockStatusField.getSelection()) {
					showStatusField.setSelection(true);
				}
			}
		});
		
		multiStatusField = new Button(addStatusComposite, SWT.CHECK);
		multiStatusField.setText(Messages.StatusHandlingComponent_MultiStatus);
		multiStatusField.setToolTipText(Messages.StatusHandlingComponent_MultiStatusTooltip);

		wrappedStatusField = new Button(addStatusComposite, SWT.CHECK);
		wrappedStatusField
				.setText(Messages.StatusHandlingComponent_WrappedLabel);
		wrappedStatusField
				.setToolTipText(Messages.StatusHandlingComponent_WrappedTooltip);
		wrappedStatusField.addSelectionListener(new SelectionAdapter() {
			public void widgetSelected(SelectionEvent e) {
				if (wrappedStatusField.getSelection()) {
					titleField.setEnabled(true);
					explanationField.setEnabled(true);
					actionField.setEnabled(true);
				} else {
					titleField.setEnabled(false);
					explanationField.setEnabled(false);
					actionField.setEnabled(false);
				}
			}
		});
		
		new Label(addStatusComposite, SWT.NONE);
		
		final Label titleLabel = new Label(addStatusComposite, SWT.NONE);
		titleLabel.setText(Messages.StatusHandlingComponent_TitleLabel);
		
		titleField = new Text(addStatusComposite, SWT.BORDER);
		titleField.setLayoutData(new GridData(SWT.FILL, SWT.CENTER, true, false));
		titleField.setToolTipText(Messages.StatusHandlingComponent_TitleTooltip);
		titleField.setEnabled(false);

		final Label explanationLabel = new Label(addStatusComposite, SWT.NONE);
		explanationLabel.setText(Messages.StatusHandlingComponent_Explanation);
		explanationField = new Text(addStatusComposite, SWT.BORDER);
		explanationField.setLayoutData(new GridData(GridData.FILL_HORIZONTAL));
		explanationField
				.setToolTipText(Messages.StatusHandlingComponent_ExplanationTooltip);
		explanationField.setEnabled(false);

		final Label actionLabel = new Label(addStatusComposite, SWT.NONE);
		actionLabel.setText(Messages.StatusHandlingComponent_Action);
		actionField = new Text(addStatusComposite, SWT.BORDER);
		actionField.setLayoutData(new GridData(GridData.FILL_HORIZONTAL));
		actionField
				.setToolTipText(Messages.StatusHandlingComponent_ActionTooltip);
		actionField.setEnabled(false);

		Button addStatus = new Button(addStatusComposite, SWT.PUSH);

		addStatus.setText(Messages.StatusHandlingComponent_AddStatusLabel);
		addStatus.setLayoutData(new GridData(GridData.FILL_HORIZONTAL));
		addStatus.addSelectionListener(new SelectionAdapter() {

			public void widgetSelected(SelectionEvent e) {
				statusItems[0].add(createDisplayedItem());
				statusTableViever.refresh();
			}
		});

		Button fastExecute = new Button(addStatusComposite, SWT.PUSH);
		fastExecute.setLayoutData(new GridData(GridData.FILL_HORIZONTAL));
		fastExecute.setText(Messages.StatusHandlingComponent_FastExecute);
		fastExecute.addSelectionListener(new SelectionAdapter() {

			public void widgetSelected(SelectionEvent e) {
				DisplayedItem di = createDisplayedItem();
				di.execute();
			}
		});
		return composite;
	}
	
	private DisplayedItem createDisplayedItem(){
		boolean log = logStatusField.getSelection();
		boolean show = showStatusField.getSelection();
		boolean block = blockStatusField.getSelection();

		int hint = StatusManager.NONE;
		if (log) {
			hint = hint | StatusManager.LOG;
		}
		if (show) {
			hint = hint | StatusManager.SHOW;
		}
		if (block) {
			hint = hint | StatusManager.BLOCK;
		}

		int severity = IStatus.OK;
		switch (statusSeverityField.getSelectionIndex()) {
		case 0:
			severity = IStatus.OK;
			break;
		case 1:
			severity = IStatus.INFO;
			break;
		case 2:
			severity = IStatus.WARNING;
			break;
		case 3:
			severity = IStatus.CANCEL;
			break;
		case 4:
			severity = IStatus.ERROR;
			break;
		}

		boolean wrapped = wrappedStatusField.getSelection();
		String title = titleField.getText();
		if (title != null && title.length() == 0)
			title = null;
		String explanation = explanationField.getText();
		if (explanation != null && explanation.length() == 0)
			explanation = null;
		String action = actionField.getText();
		if (action != null && action.length() == 0)
			action = null;
		
		boolean multi = multiStatusField.getSelection();
		IStatus status = new Status(severity, statusPluginID.getText(), statusMessage.getText());
		if (multi) {
			MultiStatus mStatus = new MultiStatus(statusPluginID
					.getText(), severity, statusMessage.getText(),
					new NullPointerException());
			mStatus.add(status);
			mStatus.add(status);
			mStatus.add(status);
			mStatus.add(Status.OK_STATUS);
			status = mStatus;
		}
		
		return new DisplayedItem(status, hint, wrapped, multi, title,
				explanation, action);
	}

	/*
	 * (non-Javadoc)
	 * 
	 * @see org.eclipse.ui.examples.statushandlers.testtool.views.TestBedComponent#getName()
	 */
	public String getName() {
		return Messages.StatusHandlingComponent_Name;
	}

	/*
	 * (non-Javadoc)
	 * 
	 * @see org.eclipse.ui.examples.statushandlers.testtool.views.TestBedComponent#getTestBedRunnable()
	 */
	public TestBedRunnable getTestBedRunnable() {
		return new StatusHandlingRunnable(new ArrayList(statusItems[0]));
	}

	/*
	 * (non-Javadoc)
	 * 
	 * @see org.eclipse.ui.examples.statushandlers.testtool.views.TestBedComponent#accept(org.eclipse.ui.examples.statushandlers.testtool.views.TestBedRunnable)
	 */
	public boolean accept(TestBedRunnable runnable) {
		if (!(runnable instanceof StatusHandlingRunnable)) {
			return false;
		}
		StatusHandlingRunnable shr = (StatusHandlingRunnable) runnable;
		statusItems[0] = Collections.synchronizedList(new ArrayList(shr.items));
		statusTableViever.refresh();
		return true;
	}

}
