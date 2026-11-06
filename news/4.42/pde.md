# Plug-in Development Environment - 4.42

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

## Views and Dialogs

### Enhanced Runtime Exported Packages View
<!-- https://github.com/eclipse-pde/eclipse.pde/pull/2418 -->
<details>
<summary>Contributors</summary>

- [Elsa Zacharia](https://github.com/elsazac)
</details>

The Runtime Packages section has been redesigned to provide a better representation of package relationships.
Previously, the section displayed only exported packages in a table.
Now, when users click the `Calculate Uses` option, the packages referenced in each exported package’s `uses:` directive are displayed as child nodes, which can be expanded to explore package dependencies.
Users can also add new packages and remove individual `uses:` entries directly from the tree using the `Remove` option.
Any removal is automatically reflected in the manifest, eliminating the need for manual updates.
This enhancement makes it easier to explore package dependencies and manage runtime package declarations.


![Enhanced Runtime Packages View](images/RuntimePackages.png)

### Usability Enhancements in the e4 Model Editor
<!--
https://github.com/eclipse-pde/eclipse.pde/pull/2431
https://github.com/eclipse-pde/eclipse.pde/pull/2432
https://github.com/eclipse-pde/eclipse.pde/pull/2534
https://github.com/eclipse-pde/eclipse.pde/pull/2588
https://github.com/eclipse-pde/eclipse.pde/pull/2537
https://github.com/eclipse-pde/eclipse.pde/pull/2558
-->
<details>
<summary>Contributors</summary>

- [Lars Vogel](https://github.com/vogella)
</details>

The e4 model editor now works well with dark themes:
its stylesheet no longer overrides the active theme, and the XMI and list tabs use theme-aware colors.
If you paste an element where it is not allowed, it goes into the closest parent that accepts it instead of the paste failing.
Larger drop zones in the tree make drag and drop easier to hit.
