package org.eclipse.ui.ide.markers.compatibility.internal;

import org.eclipse.core.commands.ExecutionEvent;
import org.eclipse.ui.ide.markers.compatibility.api.MarkerViewHandler;
import org.eclipse.ui.views.markers.internal.DialogTaskProperties;
import org.eclipse.ui.views.markers.internal.MarkerMessages;

/**
 * AddTaskHandler is the handler for adding a new task to the task list.
 * 
 * @since 3.4
 */
public class AddTaskHandler extends MarkerViewHandler {

	/*
	 * (non-Javadoc)
	 * 
	 * @see org.eclipse.core.commands.IHandler#execute(org.eclipse.core.commands.ExecutionEvent)
	 */
	public Object execute(ExecutionEvent event) {

		final ExtendedMarkersView view = getView(event);
		if (view == null)
			return this;

		DialogTaskProperties dialog = new DialogTaskProperties(view.getSite()
				.getShell());
		dialog.create();
		dialog.getShell().setText(MarkerMessages.addGlobalTaskDialog_title);
		dialog.open();
		return this;
	}
}
