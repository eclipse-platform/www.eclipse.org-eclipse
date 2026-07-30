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

---
## SWT Changes

### Test Your Application on Linux with GTK4
<details>
<summary>Contributors</summary>

- [Александър Куртаков](https://github.com/akurtakov)
</details>

The GTK4 port of SWT received a large number of fixes in this release.
Drag and drop is now implemented, menus and toolbars behave correctly, `Shell` sizing has been reworked, images are no longer blurry on HiDPI displays, and the dark theme preference is honored.
Complete applications, including the Eclipse IDE itself, are now usable on GTK4.

GTK3 remains the default.
To run a plain SWT application against GTK4, set the `SWT_GTK4` environment variable to `1`:

```
SWT_GTK4=1 java -cp ... MyApplication
```

If you start your application through the Equinox launcher, pass the [`--launcher.GTK_version`](https://equinox.eclipseprojects.io/launcher/equinox_launcher.html#display-arguments) argument on the command line or add it to your `eclipse.ini`:

```
--launcher.GTK_version 4
```

No rebuild is required, because the Linux SWT fragments ship both the GTK3 and the GTK4 native bindings.

GTK4 support is a preview, so please run your own applications with it and report what you find in the [SWT issue tracker](https://github.com/eclipse-platform/eclipse.platform.swt/issues).
These reports drive the remaining work needed to make GTK4 the default.
