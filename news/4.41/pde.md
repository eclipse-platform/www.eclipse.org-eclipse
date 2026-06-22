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