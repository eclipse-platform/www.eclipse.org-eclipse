package org.eclipse.ui.ide.markers.compatibility.internal;

import org.eclipse.core.commands.ExecutionEvent;
import org.eclipse.core.commands.IHandler;
import org.eclipse.ui.ide.markers.compatibility.api.MarkerViewHandler;

/**
 * The ConfigureContentsDialogHandler is the handler for opening the contents
 * configuration dialog
 * 
 * @since 3.4
 */
public class ConfigureContentsDialogHandler extends MarkerViewHandler implements IHandler {

	/*
	 * (non-Javadoc)
	 * 
	 * @see org.eclipse.core.commands.IHandler#execute(org.eclipse.core.commands.ExecutionEvent)
	 */
	public Object execute(ExecutionEvent event) {
		ExtendedMarkersView view = getView(event);
		if (view == null)
			return this;
		view.openFiltersDialog();
		return this;
	}

}
