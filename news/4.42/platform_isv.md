# Platform and Equinox API - 4.42

A special thanks to everyone who [contributed to Eclipse-Platform](acknowledgements.md#eclipse-platform) or [contributed to Equinox](acknowledgements.md#equinox) in this release!

---
## Platform Changes

### Find/Replace Overlay Available in Any Part Adapting to `ITextViewer`
<!-- https://github.com/eclipse-platform/eclipse.platform.ui/pull/4509 -->
<details>
<summary>Contributors</summary>

- [Heiko Klare](https://github.com/HeikoKlare)
</details>

The find/replace overlay is no longer restricted to text editors.
A part that supports find/replace by adapting to `IFindReplaceTarget`
now gets the overlay instead of the find/replace dialog
if it additionally adapts to `ITextViewer`,
i.e., if `getAdapter(ITextViewer.class)` returns the viewer presenting the part's text.
The overlay places itself on that viewer's text widget and takes its colors from it,
which is why the part itself decides whether the overlay can be hosted.
The `Console` view is the first part outside of text editors to provide that adapter.

Users can restrict the overlay to text editors again with `Restrict find/replace overlay to text editors`
in `Preferences > General > Editors > Text Editors`,
which serves as a fallback in case the overlay misbehaves in a part it has not been tried in yet.

### POJO Handlers for `org.eclipse.ui.handlers`
<!-- https://github.com/eclipse-platform/eclipse.platform.ui/pull/4242 -->
<details>
<summary>Contributors</summary>

- [Lars Vogel](https://github.com/vogella)
</details>

Handlers contributed through the `org.eclipse.ui.handlers` extension point no longer have to implement `IHandler`.
The class can be a plain Java object with `@Execute` and `@CanExecute` methods,
whose arguments are injected from the active part context, as in E4 model handlers.
This also applies to the `defaultHandler` attribute of `org.eclipse.ui.commands`.

```xml
<extension point="org.eclipse.ui.handlers">
   <handler
         commandId="com.example.commands.close"
         class="com.example.CloseHandler">
   </handler>
</extension>
```

```java
public class CloseHandler {

	@CanExecute
	public boolean canExecute(IWorkbench workbench) {
		return !workbench.isClosing();
	}

	@Execute
	public void execute(IWorkbench workbench) {
		workbench.close();
	}
}
```

You can move your handler code to the E4 programming model one handler at a time,
without changing the application model.
Field injection, method injection and `@PostConstruct` work as well, but constructor injection and `IObjectWithState` are not supported.
Handlers that implement `IHandler` continue to work as before.

### Typed Factory Methods for JFace Label Providers
<!-- https://github.com/eclipse-platform/eclipse.platform.ui/pull/4433 -->
<details>
<summary>Contributors</summary>

- [Lars Vogel](https://github.com/vogella)
</details>

The `createTextProvider`, `createImageProvider` and `createTextImageProvider` methods of `LabelProvider` and `ColumnLabelProvider` are now generic,
so you no longer have to cast the element inside the function.

```java
viewer.setLabelProvider(ColumnLabelProvider.createTextProvider(Person::getName));
```

Existing callers continue to compile and run unchanged.

### CSS `@media` Rules and the `:not()` Selector
<!-- https://github.com/eclipse-platform/eclipse.platform.ui/pull/4323 -->
<!-- https://github.com/eclipse-platform/eclipse.platform.ui/pull/4322 -->
<details>
<summary>Contributors</summary>

- [Lars Vogel](https://github.com/vogella)
</details>

A theme no longer needs a second style sheet to differ on one platform.
The CSS engine now evaluates `@media` rules with the features `-eclipse-os`, `-eclipse-ws` and `-eclipse-os-version`,
and with `-eclipse-bundle` and `-eclipse-bundle-version`, so you can style an optional contribution only where it is installed.
The version features also have minimum and maximum variants, such as `-eclipse-min-os-version`.
An unknown feature, value or media type does not match, so the block contributes no rules.

The new `:not()` selector excludes elements from a broad rule.
Its argument is a single simple selector, and pseudo-classes are not supported as arguments.

```css
@media (-eclipse-os: linux) {
  CTabFolder { background-color: #2f2f2f; }
}

Label:not(.highlighted) { color: #cccccc; }
```

### Relative Font Sizes and More Font Weights in CSS
<!-- https://github.com/eclipse-platform/eclipse.platform.ui/pull/4315 -->
<!-- https://github.com/eclipse-platform/eclipse.platform.ui/pull/4421 -->
<!-- https://github.com/eclipse-platform/eclipse.platform.ui/pull/4369 -->
<!-- https://github.com/eclipse-platform/eclipse.platform.ui/pull/4422 -->
<!-- https://github.com/eclipse-platform/eclipse.platform.ui/pull/4458 -->
<details>
<summary>Contributors</summary>

- [Lars Vogel](https://github.com/vogella)
</details>

`font-size` now accepts `em`, `%`, `larger` and `smaller`, resolved against the font the widget had before styling.
A theme can therefore make a font a bit larger and still respect the size you configured.

`font-weight` now accepts `normal`, `bold`, `bolder`, `lighter`, the numbers `100` to `900`,
and face names such as `light` or `semi-bold`.
A weight selects the installed face of the font family, or the nearest one if that weight is missing.

```css
Label { font-size: 1.2em; font-weight: semi-bold; }
```

If your style sheet uses `px`, check its font sizes.
A `px` value was read as points so far and is now converted with 1px = 0.75pt, so it renders smaller.
Use `pt` to keep the previous size.

### A Malformed CSS Rule No Longer Discards the Style Sheet
<!-- https://github.com/eclipse-platform/eclipse.platform.ui/pull/4321 -->
<details>
<summary>Contributors</summary>

- [Lars Vogel](https://github.com/vogella)
</details>

A single unsupported construct used to discard every rule of a style sheet.
The CSS engine now skips only what it cannot parse and logs it:
a bad declaration is dropped on its own, and a bad selector drops its rule.
The rest of your theme continues to apply.

---
## SWT Changes

### `TabFolder` Honors Background and Foreground Colors (Windows)
<!-- https://github.com/eclipse-platform/eclipse.platform.swt/pull/3785 -->
<details>
<summary>Contributors</summary>

- [Lars Vogel](https://github.com/vogella)
</details>

On Windows, `TabFolder.setBackground()` and `TabFolder.setForeground()` now take effect on the tabs.
This removes the white tabs and the bright frame from dialogs such as `Customize Perspective` in the dark theme.

As soon as you set either color on a `TabFolder`,
it paints its tab strip, tabs, pane and `SWT.BORDER` frame itself and gets a flat look instead of the native one.
This also applies if your application already sets colors that had no visible effect so far,
for example only a foreground, or a background matching the parent.
Remove these calls if you want to keep the native look,
which a `TabFolder` without its own colors retains.

The `Customize Perspective` dialog before (top) and after (bottom) the change:

![Customize Perspective dialog with white tabs and a bright frame on top, and with dark tabs and a subtle frame below](images/tabfolder-custom-colors-dark-theme.png)

### `ToolItem` Inherits Its Parent's Background (Windows)
<!-- https://github.com/eclipse-platform/eclipse.platform.swt/pull/3792 -->
<details>
<summary>Contributors</summary>

- [Lars Vogel](https://github.com/vogella)
</details>

On Windows, `ToolItem.getBackground()` now returns the color the item inherits from a parent with a background mode,
as set with `Composite.setBackgroundMode()`.
It used to return the system default,
which disagreed with `ToolBar.getBackground()` and with the behavior on GTK and macOS.
If your application reads this value on Windows, you now get the inherited color.

In the dark theme, this also improves selected toolbar buttons in the IDE.
Buttons such as `Toggle Mark Occurrences` now use a subtle color derived from the toolbar
instead of a bright block, so their icons remain easy to see.
Hot items follow the same color logic.

Colors set with `ToolItem.setBackground()` or `ToolBar.setBackground()` still take precedence,
and tool bars without an inherited background are not affected.

Before:

![Selected Toggle Mark Occurrences button as a bright block on a dark toolbar](images/toolitem-selected-dark-theme-before.png)

After:

![Selected Toggle Mark Occurrences button in a subtle gray on a dark toolbar](images/toolitem-selected-dark-theme-after.png)
