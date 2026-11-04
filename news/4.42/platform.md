# Platform and Equinox - 4.42 

A special thanks to everyone who [contributed to Eclipse-Platform](acknowledgements.md#eclipse-platform) or [contributed to Equinox](acknowledgements.md#equinox) in this release!



## Views, Dialogs and Toolbar

### Compare Console Output with Clipboard

<details>
<summary>Contributors</summary>

- [Sougandh S](https://github.com/SougandhS)
</details>

The `Console` view now provides a `Compare with Clipboard` action to compare console output directly with text currently available in the clipboard using the `Compare Editor`.

![Compare with clipboard in context](images/CompareWithClipboardContext.png)

This makes it easier to identify differences between console output and expected or reference content without manually copying the output into a separate editor or comparison tool.

![Compare console in action](images/CompareConsoleInAction.gif)

The action is available when the `org.eclipse.compare` and` org.eclipse.compare.structuremergeviewer` bundles are present. 
If these optional dependencies are not available, the action is not provided.

### Find/Replace Overlay in the Console View
<!-- https://github.com/eclipse-platform/eclipse.platform.ui/pull/4509 -->
<details>
<summary>Contributors</summary>

- [Heiko Klare](https://github.com/HeikoKlare)
</details>

The find/replace overlay, which you know from text editors when pressing `Ctrl+F`,
is now also available in the `Console` view.
It is shown on top of the console output and behaves just like it does in an editor,
so you no longer have to fall back to the find/replace dialog to search console output.

![Find/replace overlay searching the output in the Console view](images/findreplace-overlay-console.png)

You can restrict the overlay to text editors again with `Restrict find/replace overlay to text editors`
in `Preferences > General > Editors > Text Editors`.
The preference only serves as a fallback
and may be removed again in any future release once the generalized behavior has proven itself.

![Preference to restrict the find/replace overlay to text editors](images/findreplace-overlay-restrict-preference.png)

See [the related news](platform_isv.md#findreplace-overlay-available-in-any-part-adapting-to-itextviewer)
for how other views can offer the overlay.

---

<!--
---
## Text Editors
-->

<!--
---
## Preferences
-->

## Themes and Styling

### Switch Themes from the Window Menu
<!-- https://github.com/eclipse-platform/eclipse.platform.ui/pull/4356 -->
<details>
<summary>Contributors</summary>

- [Lars Vogel](https://github.com/vogella)
</details>

The new `Window > Appearance > Themes` submenu lets you switch the theme without opening the preferences.
It lists all installed themes, including custom themes contributed by plug-ins,
applies your choice right away and remembers it for the next start.
A switch between a light and a dark theme offers a restart.
`Set current theme as default` makes the active theme the default for new workspaces.

![Themes submenu listing the Dark and Light themes together with custom themes](images/themes-submenu.png)

### `DateTime` Follows the Dark Theme and Honors Custom Colors (Windows)
<!-- https://github.com/eclipse-platform/eclipse.platform.swt/pull/3793 -->
<details>
<summary>Contributors</summary>

- [Lars Vogel](https://github.com/vogella)
</details>

On Windows, `DateTime` no longer stands out with light colors in a dark application.
Its month calendar, including the one in the drop-down, now follows the dark theme,
and the date and time field is colored too, with the selected field still highlighted.
The field has a flat border instead of the sunken native edge,
and the drop-down button takes the field's color, leaving just the arrow.

![Due Date field with a date and a drop-down arrow in a dark application](images/datetime-dark-theme-field.png)

![Month calendar drop-down in dark colors](images/datetime-dark-theme-calendar.png)

`DateTime.setBackground()` and `DateTime.setForeground()` now take effect too,
and `DateTime.getBackground()` and `DateTime.getForeground()` return the colors in use.
These colors take precedence over the dark defaults and also apply outside of dark mode.
A `DateTime` without custom colors in light mode keeps its native look.

### Visible Selection in Unfocused Trees and Tables (Windows)
<!-- https://github.com/eclipse-platform/eclipse.platform.swt/pull/3659 -->
<details>
<summary>Contributors</summary>

- [Lars Vogel](https://github.com/vogella)
</details>

In the dark theme on Windows, you can now see the selection of a `Tree` or `Table` that does not have the focus.
It used to be nearly invisible, for example in the `Project Explorer` while you work in an editor with `Link with Editor` enabled.
The selection now has a subtle fill derived from the background of the control,
which stays distinct from the focused and hovered states.
The light theme and high contrast mode keep their native look.

An unfocused selection on `build.properties` before (top) and after (bottom) the change:

![Selected row that barely stands out from the dark background on top, and a subtle gray fill behind the icon and label below](images/unfocused-selection-dark-theme.png)

---

<!--
---
## Views, Dialogs and Toolbar
-->

## General Updates

### Minimum glibc Version Raised to 2.34 on Linux
<!-- https://github.com/eclipse-platform/eclipse.platform.releng.aggregator/issues/4080 -->
<details>
<summary>Contributors</summary>

- [Alexander Kurtakov](https://github.com/akurtakov)
</details>

The native parts of Eclipse and SWT on Linux are now built on Debian 12 instead of Debian 11 (EOL).
As a result, the Eclipse launcher and the SWT GTK 3 native libraries now require **glibc 2.34 or newer**, which the GTK 4 libraries already required.

In glibc 2.34, `dlopen` and `dlsym` moved from `libdl` into `libc`.
Binaries built against glibc 2.34 or newer link to these new symbol versions and can't be loaded on older systems.

This means Eclipse no longer runs on Linux distributions that ship an older glibc, for example:

- Red Hat Enterprise Linux 8 and derivatives such as AlmaLinux 8 and Rocky Linux 8 (glibc 2.28)
- Ubuntu 20.04 (glibc 2.31)
- Debian 11 (glibc 2.31)

Red Hat Enterprise Linux 9, Ubuntu 22.04, Debian 12 and newer releases are not affected.

On an unsupported system, the launcher fails to start with an error like:

```
./eclipse: /lib64/libc.so.6: version `GLIBC_2.34' not found (required by ./eclipse)
```
