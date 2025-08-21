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

<details>
<summary>Contributors</summary>

- [Lars Vogel](https://github.com/vogella)
</details>

It is now possible to dynamically hide the context menu in the perspective switcher using the application model API. 
This allows Eclipse RCP apps using 3.x API to enable and disable the menu at runtime.

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


## SWT Changes

### Clarified ImageDataProvider Contract

The `ImageDataProvider` API documentation has been updated to clarify that implementations are expected to return **linearly scaled** `ImageData` based on the zoom level.
For example, if `getImageData(100)` returns an image of width `w` and height `h`, then `getImageData(200)` must return an image of width `2 * w` and height `2 * h`, if non-null.
This only makes an implicit assumption explicit, some consumers have always relied on this linear scaling behavior, and lack of it may have led to unexpected behavior in the past.

Additionally, optional runtime checks verifying this linear scaling behavior are available as a debugging feature to assist developers in validating their implementations.

These checks can be enabled by starting the application with `-Dorg.eclipse.swt.internal.enableStrictChecks`, but note that this system property may be subject to change in future releases without prior notice.
