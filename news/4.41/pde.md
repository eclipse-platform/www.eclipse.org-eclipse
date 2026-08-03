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

The PDE Bundle Manifest Editor and Feature Editor now include a dedicated **p2.inf** tab.

Previously, `p2.inf` files had to be opened and edited as plain text with no tooling support.
Now, when you open a plug-in or feature project in PDE's multi-page editor, the `p2.inf` file automatically appears as an additional tab — right alongside `MANIFEST.MF` or `feature.xml`.

The editor provides:

- **Syntax highlighting** — keys and values are visually distinguished, making the file easier to read at a glance.
- **Context-aware content assist** — press `Ctrl+Space` anywhere in the file to get smart suggestions for valid `p2.inf` keys such as `requires`, `provides`, `instructions`, and `properties`, as well as their nested sub-keys (e.g., `requires.0.namespace` and `requires.0.name`).
Suggestions follow the exact key hierarchy that p2 expects.

This works for both plug-in projects (where `p2.inf` lives in `META-INF/`) and feature projects (where it lives at the project root).
For the full `p2.inf` syntax reference, see the [Customizing Metadata](https://eclipse.dev/eclipse/markdown/?file=eclipse-equinox/p2/master/docs/Customizing_Metadata.md) documentation.

![p2.inf file shown as a dedicated tab alongside MANIFEST.MF and feature.xml](images/p2-inf-editor-tab.gif)

![Context-aware content assist in the p2.inf editor](images/p2-inf-auto-completion.gif)

## Views and Dialogs

### Enable OSGi Console Option in Launch Configurations
<!-- https://github.com/eclipse-pde/eclipse.pde/pull/2274 -->
<details>
<summary>Contributors</summary>

- [Elsa Zacharia](https://github.com/elsazac)
</details>

The launch configurations dialog now provides a new `Enable OSGi Console` option.
When selected, the required `-console` argument is added automatically to the program arguments.
This removes the need to manually edit program arguments and helps preserve the setting when launch configurations are recreated.

![Enable OSGI console option](images/Enable_osgi_console.png)

### Enhancements to Show Launch Bundles Dialog
<!-- https://github.com/eclipse-pde/eclipse.pde/pull/2395 -->
<!-- https://github.com/eclipse-pde/eclipse.pde/issues/2371 -->
<details>
<summary>Contributors</summary>

- [Neha Burnwal](https://github.com/nburnwal09)

</details>

The **Show Launch Bundles** dialog in the Eclipse launch configuration has been improved with three enhancements:

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