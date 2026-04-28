# Plug-in Development Environment - 4.40

A special thanks to everyone who [contributed to PDE](acknowledgements.md#plug-in-development-environment) in this release!

## Editors

### Default New Product Configurations to Plug-ins and Features
<!-- https://github.com/eclipse-pde/eclipse.pde/issues/761 -->
<details>
<summary>Contributors</summary>

- [Lars Vogel](https://github.com/vogella)
</details>

Newly created product configurations now default to the **plug-ins and features** type instead of plug-ins only.
This is the most flexible configuration.
It also matches how most Eclipse-based products are assembled today.
You can still switch to a plug-ins-only product on the `Overview` tab if needed.
Note that individual product wizards may still choose a different default during creation.

### Copy Entries from the Target Editor Content Tab
<!-- https://github.com/eclipse-pde/eclipse.pde/pull/2302 -->
<details>
<summary>Contributors</summary>

- [Lars Vogel](https://github.com/vogella)
</details>

You can now copy entries from the `Content` tab of the target-definition editor.
This mirrors the behavior already available on the `Locations` tab.
Copy is available from the context menu or via the platform copy keystroke.
That is `Ctrl+C` on Linux and Windows, and `Cmd+C` on macOS.
Multi-selection and expanded children are included in the copied text.
The copy action is wired through the workbench binding service.
Any user-remapped key binding for `Copy` is honored automatically.

### Native Combo Widgets in PDE Form Parts
<!-- https://github.com/eclipse-pde/eclipse.pde/issues/2304 -->
<details>
<summary>Contributors</summary>

- [Lars Vogel](https://github.com/vogella)
</details>

PDE form-based editors now use the native SWT `Combo` widget in their form parts instead of the custom-drawn `CCombo`.
This includes the `MANIFEST.MF`, product, and target editors.
The native control blends better with the current operating-system theme.
The improvement is most visible in dark mode and on high-DPI displays.

### More Reliable Target Resolution
<!-- https://github.com/eclipse-pde/eclipse.pde/issues/310 -->
<details>
<summary>Contributors</summary>

- [Lars Vogel](https://github.com/vogella)
</details>

Reloading the same target definition while a previous resolve was still running could start two resolve jobs in parallel.
This led to a `Cannot invoke ProfileLock.unlock()` error in the log.
Cancelled resolve jobs also piled up in the `Progress` view.
Resolve jobs are now serialized per target handle via a scheduling rule.
A new resolve waits for the previous one to finish before starting.
Resolves of different targets remain independent.

### Faster Syntax Highlighting in the Target Definition Editor
<!-- https://github.com/eclipse-pde/eclipse.pde/issues/2283 -->
<details>
<summary>Contributors</summary>

- [Lars Vogel](https://github.com/vogella)
</details>

The presentation reconciler used by the target-definition editor no longer scans content past the damaged region on every keystroke.
Editing large `.target` files now feels noticeably more responsive.
Multi-line XML comments continue to be highlighted correctly.

<!--
## API Tools
-->

<!--
---
## PDE Compiler 
-->

## PDE Build

### Stable Classpath Order for Plug-in Dependencies
<details>
<summary>Contributors</summary>

- [Lars Vogel](https://github.com/vogella)
</details>

The `Plug-in Dependencies` classpath container now has a deterministic order.
This matters when a target contains multiple bundles with the same symbolic name, for example two versions of `jakarta.annotation-api`.
Previously the order could change between IDE restarts.
The **Updating plug-in dependencies** job then triggered a partial or full build at startup.

## Views and Dialogs

### CSS Spy Widget Hierarchy Export
<!-- https://github.com/eclipse-pde/eclipse.pde/pull/2237 -->
<details>
<summary>Contributors</summary>

- [Lars Vogel](https://github.com/vogella)
</details>

You can now use the `Copy widget info to clipboard` button in the `CSS Spy` 
to export the selected widget's hierarchy with detailed CSS-relevant information.
The exported information includes the CSS selector notation, 
filtered SWT style bits, 
computed versus declared values, 
and the inheritance chain.

An example of the exported information:

```text
Widget Hierarchy
================

Tree#VariablesViewer
  SWT Style: SWT.MULTI SWT.H_SCROLL SWT.V_SCROLL SWT.FULL_SELECTION SWT.LEFT_TO_RIGHT SWT.VIRTUAL
  CSS Properties:
    background-color: #2f2f2f  /* declared: rgb(47, 47, 47) */
    background-image: none
    color: #aaaaaa  /* declared: rgb(170, 170, 170) */
    font-family: "Ubuntu Sans"  /* declared: #org-eclipse-debug-ui-VariableTextFont */
    font-size: 11
    font-style: normal
    font-weight: normal
    swt-lines-visible: true
    text-transform: none
    visibility: visible
  SWT background: rgb(47,47,47)
  Bounds: x=1124 y=196 w=385 h=413
```

### Always show Installable Unit (IU) ID in target editor
<!-- https://github.com/eclipse-pde/eclipse.pde/pull/2208 -->
<details>
<summary>Contributors</summary>

- [Lars Vogel](https://github.com/vogella)
</details>

The Target Platform Editor now always displays the technical ID of Installable Units (IUs) 
in the `Definition` and `Content` tabs.
This ensures a clear mapping between the UI representation and the underlying source.
If a descriptive name exists and differs from the ID, 
both are shown in the format `Name [ID]`; 
otherwise, only the ID is displayed.

![Target Editor showing IU IDs](images/target-editor-iu-id.png)


### Version Mapping for Required Bundles and Imported Packages
<details>
<summary>Contributors</summary>

- [Neha Burnwal ](https://github.com/nburnwal09)

</details>

A quick fix is provided for adding the available matching version range for required bundles and imported packages 
in the `MANIFEST.MF` file. 

![Addition of matching version](images/versionAdd_quickFix.png)

The quick fix is labeled as `Require latest available version range`. 
Once the user clicks on `Finish`, it adds the version range to the specific require bundle or import package.
For example, version 7.2.3 is interpreted as the compatible range [7.2.0,8.0.0)

## Documentation

### Source References Documentation Migrated from the Wiki
<details>
<summary>Contributors</summary>

- [Lars Vogel](https://github.com/vogella)
</details>

The `PDE/UI/SourceReferences` page has been migrated from the Eclipse wiki into the PDE repository.
The page is now maintained alongside the code at `docs/SourceReferences.md`.
Headings were standardized and indented code blocks were converted to fenced blocks with language hints.
A broken inline link in the `Eclipse-SourceReferences` example was also fixed.