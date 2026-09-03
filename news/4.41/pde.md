# Plug-in Development Environment - 4.41

A special thanks to everyone who [contributed to PDE](acknowledgements.md#plug-in-development-environment) in this release!

<!--
## Editors
-->

<!--
## API Tools
-->

<!--
---
## PDE Compiler 
-->

## Editors

### Empty Package Removed from Manifest
<!-- https://github.com/eclipse-pde/eclipse.pde/pull/2136 -->
<!-- https://github.com/eclipse-pde/eclipse.pde/pull/2292 -->
<details>
<summary>Contributors</summary>

- [Neha Burnwal ](https://github.com/nburnwal09)

</details>

When a class is moved and the source package becomes empty, or when all classes in a package are deleted, the package is now automatically removed from the `Export-Package` header in `MANIFEST.MF` if it was previously exported.
This prevents the manifest from listing packages that no longer contain any resources and ensures that empty packages are cleaned up automatically.

![Empty package removed after moving a class](images/handle_movement.gif)

![Empty package removed after deleting classes](images/handle_deletion.gif)

### p2.inf Editor Support in Bundle and Feature Editors
<!-- https://github.com/eclipse-pde/eclipse.pde/pull/2210 -->
<details>
<summary>Contributors</summary>

- [Neha Burnwal ](https://github.com/nburnwal09)
</details>

The PDE `Plug-in Manifest Editor` and `Feature Manifest Editor` now include a dedicated **p2.inf** tab.

Previously, `p2.inf` files had to be opened and edited as plain text with no tooling support.
Now, when you open a plug-in or feature project in PDE's multi-page editor, the `p2.inf` file automatically appears as an additional tab — right alongside `MANIFEST.MF` or `feature.xml`.

The editor provides:

- **Syntax highlighting** — keys and values are visually distinguished, making the file easier to read at a glance.
- **Context-aware content assist** — press `Ctrl+Space` anywhere in the file to get smart suggestions for valid `p2.inf` keys such as `requires`, `provides`, `instructions`, and `properties`, as well as their nested sub-keys (e.g., `requires.0.namespace` and `requires.0.name`).
Suggestions follow the exact key hierarchy that p2 expects.

This works for both plug-in projects (where `p2.inf` resides in `META-INF/`) and feature projects (where it resides in the project root).
For the full `p2.inf` syntax reference, see the [Customizing Metadata](https://eclipse.dev/eclipse/markdown/?file=eclipse-equinox/p2/master/docs/Customizing_Metadata.md) documentation.

![p2.inf file shown as a dedicated tab alongside MANIFEST.MF and feature.xml](images/p2-inf-editor-tab.gif)

![Context-aware content assist in the p2.inf editor](images/p2-inf-auto-completion.gif)

### Dependency Cycles Through Import-Package Are Detected
<!--
https://github.com/eclipse-pde/eclipse.pde/pull/2406
https://github.com/eclipse-pde/eclipse.pde/pull/2408
-->
<details>
<summary>Contributors</summary>

- [Lars Vogel](https://github.com/vogella)
</details>

The `Look for cycles in the dependency graph` action of the `MANIFEST.MF` editor now also finds cycles that run through `Import-Package` dependencies.
Previously only cycles formed by `Require-Bundle` were reported.

---
## Launching

### Fix Validation Problems Directly in the Validation Dialog
<!-- https://github.com/eclipse-pde/eclipse.pde/pull/2351 -->
<details>
<summary>Contributors</summary>

- [Lars Vogel](https://github.com/vogella)
</details>

The dialog shown by `Validate Plug-ins` on the `Plug-ins` tab of a launch configuration now offers two fixes:

- `Select Required` adds the missing required plug-ins and features.
- `Remove Unresolved` unchecks every plug-in that did not resolve.

Validation is repeated after each pass,
so plug-ins that only become unresolved once a dependency was removed are handled in the same click,
and the dialog shows that there are no problems left once everything is resolved.
The launch configuration tab is marked dirty so you can apply the change.

---
## Performance

### Plug-in Classpaths Are Updated in Parallel
<!--
https://github.com/eclipse-pde/eclipse.pde/pull/2363
https://github.com/eclipse-pde/eclipse.pde/pull/2375
-->
<details>
<summary>Contributors</summary>

- [Lars Vogel](https://github.com/vogella)
- [Hannes Wellmann](https://github.com/HannesWell)
</details>

Reloading the target platform in a workspace with many plug-ins is noticeably faster,
because the `Plug-in Dependencies` classpath of the affected projects is now computed in parallel.

You can switch the parallel computation off with the new `Update plug-in classpaths in parallel` preference
on the `Preferences > Plug-in Development` page.

---
## Views and Dialogs

### Enable OSGi Console Option in Launch Configurations
<!-- https://github.com/eclipse-pde/eclipse.pde/pull/2274 -->
<details>
<summary>Contributors</summary>

- [Elsa Zacharia](https://github.com/elsazac)
</details>

The launch configurations dialog now provides a new `Enable OSGi Console` option.
When selected, the required `-console` argument is added automatically to the program arguments.
This removes the need to manually edit the program arguments and helps preserve the setting when launch configurations are recreated.

![Enable OSGI console option](images/Enable_osgi_console.png)

### Enhancements to Show Launch Bundles Dialog
<!-- https://github.com/eclipse-pde/eclipse.pde/pull/2395 -->
<!-- https://github.com/eclipse-pde/eclipse.pde/issues/2371 -->
<details>
<summary>Contributors</summary>

- [Neha Burnwal](https://github.com/nburnwal09)

</details>

The `Show Launch Bundles` dialog in the Eclipse launch configuration has been improved with three enhancements:

- Bundles are now sorted **alphabetically**, making it easier to navigate the list.
- A **search box** has been added to quickly filter bundles by name.
- Bundles that share the same symbolic name are now **highlighted**, making duplicates easier to identify.

![Search support in Show Launch Bundles dialog](images/show_launchBundles_find.png)

![Duplicate bundles highlighted in Show Launch Bundles dialog](images/show_launchBundles_duplicate.png)

### Find Support Added in Plug-ins View
<!-- https://github.com/eclipse-pde/eclipse.pde/pull/2343 -->
<details>
<summary>Contributors</summary>

- [Neha Burnwal ](https://github.com/nburnwal09)
</details>

The `Plug-ins` view now includes a search box that allows you to filter plug-ins by name.
You can type directly into the search box or use `Ctrl+F` (or `Cmd+F` on macOS) to focus it.
This makes it easier to locate specific plug-ins in large workspaces.

![Find support added in Plug-ins View](images/find_support.png)

### Layout Spy Joins the PDE Spies
<!--
https://github.com/eclipse-pde/eclipse.pde/pull/2383
https://github.com/eclipse-pde/eclipse.pde/pull/2388
https://github.com/eclipse-pde/eclipse.pde/pull/2400
-->
<details>
<summary>Contributors</summary>

- [Lars Vogel](https://github.com/vogella)
</details>

The SWT layout spy now appears in the PDE spies window and menu next to the other spies,
and it shows the widgets of the selected control in a tree.
It keeps its global `Ctrl+Shift+Alt+F9` key binding (`Cmd+Shift+Alt+F9` on macOS), so you can still open it on top of a blocking dialog.

The new `Find Class` button hides the spy, lets you click any control,
and then reports the owning element of the e4 application model and its implementing class,
including the contribution URI and the bundle.
Parts of the 3.x compatibility layer are unwrapped, so you see the real view or editor class.
For a control that does not belong to the application model, such as one in a plain JFace dialog,
the shell and the class of its data object are reported instead.

### Preference Spy Tracks the User Scope
<!-- https://github.com/eclipse-pde/eclipse.pde/pull/2347 -->
<details>
<summary>Contributors</summary>

- [Lars Vogel](https://github.com/vogella)
</details>

The preference spy watched the bundle default, configuration, default and instance scopes,
so changes to the user scope, which stores per-user preferences under `<user.home>/.eclipse`, went unnoticed.
The user scope is now watched as well and is included in `Show All Preferences`.
