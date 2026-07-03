# Platform and Equinox API - 4.41

A special thanks to everyone who [contributed to Eclipse-Platform](acknowledgements.md#eclipse-platform) or [contributed to Equinox](acknowledgements.md#equinox) in this release!

---
## Platform Changes

### Shared Disabled Image Descriptor on `ImageDescriptor`

<details>
<summary>Contributors</summary>

- [Heiko Klare](https://github.com/HeikoKlare)
</details>

`ImageDescriptor` now provides `asDisabledDescriptor()`, which returns a lazily created, shared `ImageDescriptor` for the disabled version of the image.
This allows you to use a single descriptor with a `ResourceManager` to share both the original and disabled images, instead of managing two independent descriptors.

## Language Toolkit (LTK)

### Copy Refactoring Support
<details>
<summary>Contributors</summary>

- [Felix Schmid](https://github.com/Felix-Schmid)
</details>

LTK already supported refactoring operations for moving, renaming, and deleting resources, but part of the infrastructure for copying was missing.
Copy participants contributed via the `org.eclipse.ltk.core.refactoring.copyParticipants` extension point are now invoked when resources are copied.

These copy participants can perform refactorings, such as adjusting package names for specific languages.
For example, the Eclipse 4diac IDE includes a participant that updates package names to match the new folder structure when resources are copied.
It can be found [here](https://github.com/eclipse-4diac/4diac-ide/blob/develop/plugins/org.eclipse.fordiac.ide.typemanagement/src/org/eclipse/fordiac/ide/typemanagement/refactoring/copy/CopyTypeParticipant.java).

<!--
---
## SWT Changes
-->
