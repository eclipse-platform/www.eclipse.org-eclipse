# Platform and Equinox - 4.40 

A special thanks to everyone who [contributed to Eclipse-Platform](acknowledgements.md#eclipse-platform) or [contributed to Equinox](acknowledgements.md#equinox) in this release!

<!--
---
## Views, Dialogs and Toolbar
-->

<!--
---
## Text Editors
-->

<!--
---
## Preferences
-->

---
## Themes and Styling

### Removed Rounded Tabs Support
<!-- https://github.com/eclipse-platform/eclipse.platform.ui/pull/3822 -->
<details>
<summary>Contributors</summary>

- [Lars Vogel](https://github.com/vogella)
</details>

Eclipse now only supports square tabs in `CTabRendering`.
The `Use round tabs` checkbox in the `General > Appearance` preference page and the `swt-corner-radius` CSS property are no longer available.
All tabs now have square corners.

### Removed Classic Theme
<details>
<summary>Contributors</summary>

- [Lars Vogel](https://github.com/vogella)
</details>

The `Classic` theme (`org.eclipse.e4.ui.css.theme.e4_classic`) has been removed.
Users who previously had the `Classic` theme selected will be automatically migrated to the `Light` theme upon the next startup.

### Manage Default Theme
<details>
<summary>Contributors</summary>

- [Lars Vogel](https://github.com/vogella)
</details>

A new `Manage default...` button has been added to the `General > Appearance` preference page, next to the theme selection.

![Manage Default Theme](images/manage-default-theme.png)

This allows you to set the currently selected theme as the default for new workspaces or workspaces that do not have an explicit theme configured.

![Default Theme Dialog](images/default-theme-dialog.png)

When switching themes, you also have the option to set the new theme as the default directly from the restart confirmation dialog.

![Theme Switch Default Selection](images/theme-switch-default-selection.png)

The default theme preference is product-scoped, allowing different Eclipse-based products to maintain their own independent defaults even when sharing the same user configuration.

---
## General Updates

### Skip Dot-folders When Scanning for Projects to Import
<details>
<summary>Contributors</summary>

- [Lars Vogel](https://github.com/vogella)
</details>

You can now skip directories starting with a `.` (e.g., `.git`, `.svn`, `.hg`) during recursive project scanning in the `Smart Import` and `Import Existing Projects` wizards.
This significantly improves import performance for repositories with large metadata folders.
A new `Skip folders starting with '.'` checkbox is available in both wizards and is enabled by default.

### Global Search Navigation Shortcuts
<details>
<summary>Contributors</summary>

- [Aung Nanda Oo](https://github.com/NikkiAung)
- [Shubham Waldiya](https://github.com/ShuWald)
</details>

The current search navigation commands `Ctrl+,` and `Ctrl+.` allow for navigation to the previous or next search result, respectively. 
However, one limitation is that these shortcuts only work when the search view is in focus.
This feature implements global search navigation commands `Alt+,` and `Alt+.` (`Cmd+Opt+,` and `Cmd+Opt+.` on macOS) to navigate to previous/next search results even when search view is out of focus, allowing for easier and more intuitive navigation.

![Global Search Navigation](images/GlobalSearchNavigationDemoFinal.gif)

The GIF demonstrates navigation using the new commands despite the user switching out of the Search view.

## Debugger

### Paste Multiple Expressions from Clipboard in Expressions View
<details>
<summary>Contributors</summary>

- [Sougandh S](https://github.com/SougandhS)
</details>

The `Expressions View` now improves pasting behavior when clipboard content contains line separators (such as `\n` etc). 
In such cases, a dialog prompts you to choose whether to treat the content as a single expression or split it into multiple expressions, one per line.

![Paste Prompt](images/ExpressionPaste.png)

This also makes it easier to copy multiple expressions (for example, from the `Expressions View`) and paste them as separate expressions in another `Eclipse` instance, simplifying sharing and migration. 
The selected behavior can be saved as a preference and changed later in the `Run/Debug `settings. 

![Expression Paste Preference](images/ExpressionPastePref.png)

A context menu entry for `Expression Paste` has also been added, improving discoverability.

![Expression Paste Context](images/ExpPasteContext.png)

### Refined Copy Actions in Variables and Expressions Views
<details>
<summary>Contributors</summary>

- [Sougandh S](https://github.com/SougandhS)
</details>

Copy behavior in the `Variables` view and `Expressions` view has been refined to provide more predictable and controlled results. 
Previously, copying would include the entire row (such as `Name`, `Value`, and `Types`), which could lead to unintended clipboard content.

Dedicated actions are now available to copy only the `Variable` name and `Expression` text, or the full row when needed.

![VariableAndExpression Copy](images/ExpressionAndVariable.png)

This makes it easier to copy exactly what is required and ensures that variable names and expressions can be reused directly without unintended content
