# Platform and Equinox API - 4.39

A special thanks to everyone who [contributed to Eclipse-Platform](acknowledgements.md#eclipse-platform) or [contributed to Equinox](acknowledgements.md#equinox) in this release!

---
## Platform Changes

### Perspective Switcher Respects IPresentationEngine.NO_MOVE

<details>
<summary>Contributors</summary>

- [Lars Vogel](https://github.com/vogella)
</details>

The perspective switcher now respects the `IPresentationEngine.NO_MOVE` tag.
This enhancement prevents drag-and-drop reordering of perspective items if the perspective switcher tool control has this tag applied.
Developers can programmatically lock or unlock this reordering feature by adding or removing the `IPresentationEngine.NO_MOVE` tag to the tool control.

Example usage (programmatic):

```java
// To lock the perspective switcher reordering:
toolControl.getTags().add(IPresentationEngine.NO_MOVE);
// To unlock:
toolControl.getTags().remove(IPresentationEngine.NO_MOVE);
```


<!--
---
## SWT Changes
-->
