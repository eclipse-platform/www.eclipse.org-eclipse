package org.eclipse.ui.ide.markers.compatibility.internal;

import java.lang.reflect.InvocationTargetException;
import java.util.ArrayList;
import java.util.Collection;
import java.util.HashMap;
import java.util.Map;

import org.eclipse.core.commands.ExecutionEvent;
import org.eclipse.core.commands.ExecutionException;
import org.eclipse.core.resources.IMarker;
import org.eclipse.core.runtime.IProgressMonitor;
import org.eclipse.core.runtime.IStatus;
import org.eclipse.core.runtime.Status;
import org.eclipse.jface.dialogs.ProgressMonitorDialog;
import org.eclipse.jface.operation.IRunnableContext;
import org.eclipse.jface.operation.IRunnableWithProgress;
import org.eclipse.jface.wizard.IWizard;
import org.eclipse.jface.wizard.WizardDialog;
import org.eclipse.osgi.util.NLS;
import org.eclipse.swt.SWT;
import org.eclipse.swt.widgets.Shell;
import org.eclipse.ui.IMarkerResolution;
import org.eclipse.ui.PlatformUI;
import org.eclipse.ui.ide.IDE;
import org.eclipse.ui.ide.markers.compatibility.api.MarkerSupportConstants;
import org.eclipse.ui.ide.markers.compatibility.api.MarkerViewHandler;
import org.eclipse.ui.ide.markers.compatibility.api.WorkbenchMarkerResolution;
import org.eclipse.ui.ide.markers.compatibility.api.internal.MarkerMessages;
import org.eclipse.ui.internal.ide.IDEWorkbenchPlugin;
import org.eclipse.ui.progress.IWorkbenchSiteProgressService;
import org.eclipse.ui.statushandlers.StatusAdapter;
import org.eclipse.ui.statushandlers.StatusManager;

/**
 * QuickFixHandler is the command handler for the quick fix dialog.
 * 
 * @since 3.4
 */
public class QuickFixHandler extends MarkerViewHandler {

	private class QuickFixWizardDialog extends WizardDialog {

		public QuickFixWizardDialog(Shell parentShell, IWizard newWizard) {
			super(parentShell, newWizard);
			setShellStyle(SWT.CLOSE | SWT.MAX | SWT.TITLE | SWT.BORDER
					| SWT.MODELESS | SWT.RESIZE | getDefaultOrientation());
		}

	}

	/*
	 * (non-Javadoc)
	 * 
	 * @see org.eclipse.core.commands.IHandler#execute(org.eclipse.core.commands.ExecutionEvent)
	 */
	public Object execute(ExecutionEvent event) throws ExecutionException {

		final ExtendedMarkersView view = getView(event);
		if (view == null)
			return this;

		final Map resolutions = new HashMap();
		final IMarker selected = view.getSelectedMarkers()[0];

		IRunnableWithProgress resolutionsRunnable = new IRunnableWithProgress() {
			public void run(IProgressMonitor monitor) {
				monitor
						.beginTask(
								MarkerMessages.resolveMarkerAction_computationManyAction,
								100);

				IMarker[] allMarkers = view.getAllMarkers();
				monitor.worked(20);
				IMarkerResolution[] found = IDE.getMarkerHelpRegistry()
						.getResolutions(selected);
				int progressCount = 80;
				if (found.length > 1)
					progressCount = progressCount / found.length;
				for (int i = 0; i < found.length; i++) {
					IMarkerResolution markerResolution = found[i];
					if (markerResolution instanceof WorkbenchMarkerResolution) {
						IMarker[] other = ((WorkbenchMarkerResolution) markerResolution)
								.findOtherMarkers(allMarkers);
						Collection markers = new ArrayList();
						markers.add(selected);
						for (int j = 0; j < other.length; j++) {
							markers.add(other[j]);
						}
						resolutions.put(markerResolution, markers);
					} else {
						Collection markers = new ArrayList();
						markers.add(selected);
						resolutions.put(markerResolution, markers);
					}
					monitor.worked(progressCount);
				}
				monitor.done();
			}
		};

		Object service = view.getSite().getAdapter(
				IWorkbenchSiteProgressService.class);

		IRunnableContext context = new ProgressMonitorDialog(view.getSite()
				.getShell());

		try {
			if (service == null) {
				PlatformUI.getWorkbench().getProgressService().runInUI(context,
						resolutionsRunnable, null);
			} else {
				((IWorkbenchSiteProgressService) service).runInUI(context,
						resolutionsRunnable, null);
			}
		} catch (InvocationTargetException exception) {
			throw new ExecutionException(exception.getLocalizedMessage(),
					exception);
		} catch (InterruptedException exception) {

			throw new ExecutionException(exception.getLocalizedMessage(),
					exception);
		}

		String markerDescription = selected.getAttribute(IMarker.MESSAGE,
				MarkerSupportConstants.EMPTY_STRING);
		if (resolutions.isEmpty()) {
			Status newStatus = new Status(
					IStatus.INFO,
					IDEWorkbenchPlugin.IDE_WORKBENCH,
					NLS
							.bind(
									MarkerMessages.MarkerResolutionDialog_NoResolutionsFound,
									new Object[] { markerDescription }));
			StatusAdapter adapter = new StatusAdapter(newStatus);
			adapter.setProperty(StatusAdapter.TITLE_PROPERTY,
					MarkerMessages.MarkerResolutionDialog_CannotFixTitle);
			StatusManager.getManager().handle(adapter, StatusManager.SHOW);
		} else {

			String description = NLS.bind(
					MarkerMessages.MarkerResolutionDialog_Description,
					markerDescription);

			IWizard wizard = new QuickFixWizard(description, resolutions, view
					.getSite());
			WizardDialog dialog = new QuickFixWizardDialog(view.getSite()
					.getShell(), wizard);
			dialog.open();
		}
		return this;
	}
}
