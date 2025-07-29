# Platform and Equinox API - 4.37

A special thanks to everyone who [contributed to Eclipse-Platform](acknowledgements.md#eclipse-platform) or [contributed to Equinox](acknowledgements.md#equinox) in this release!

---
## Platform Changes

### Terminal View and Connectors Support

The Terminal view along with the associated Local, SSH and Telnet connectors from the CDT Project have been migrated to the Eclipse Platform to make them more generally available.
These have  been part of the Eclipse IDE packages for many years and have proven to be a useful extension to the IDE!

To use them in your own product, or install it in a custom Eclipse IDE setup, you can now use the feature `org.eclipse.terminal.feature`.

See [Support Launching with a Terminal Console](platform.md#support-launching-with-a-terminal-console) for a use case.

### Perspective Switcher Menu Can Now Be Hidden Programmatically

It is now possible to dynamically hide the context menu in the perspective switcher using the application model API. 
This enables Eclipse RCP apps using 3.x API to enable and disable the menu at runtime.

Example usage:
```java
Display.getDefault().asyncExec(() -> {
  List<MToolControl> elements = modelService.findElements(window, "PerspectiveSwitcher", MToolControl.class, null,
      EModelService.IN_TRIM);
  if (elements != null && !elements.isEmpty()) {
    elements.get(0).getTags().add("NoMenu");
  }
});
```

<!--
---
## SWT Changes
-->


