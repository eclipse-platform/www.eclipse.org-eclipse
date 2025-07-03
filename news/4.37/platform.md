# Platform and Equinox - 4.37 

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

<!--
---
## Themes and Styling
-->

<!--
---
## Views, Dialogs and Toolbar
-->

---
## General Updates

### Support Launching with a Terminal Console

<details>
<summary>Contributors</summary>

- [Christoph Läubrich ](https://github.com/laeubi)
</details>
When launching a process in Eclipse you can currently choose to allocate a console for input/output.
Via such a console, the relatively-recent support for ANSI color encoding enables integration of console applications that produce colorized output.

In terms of input though,
and for more advanced features such as text-based user interaction,
this still does not work well 
because advanced applications require a so-called [pseudo terminal](https://en.wikipedia.org/wiki/Pseudoterminal)
together with a [terminal emulator](https://en.wikipedia.org/wiki/Terminal_emulator)
to behave as if it were executed via a native command prompt.

While the [VT100 terminal emulator](https://en.wikipedia.org/wiki/VT100) was already added  in the previous release,
there remained the need to start the application in a proper terminal session.
That support is now provided by the new `Terminal Console`.

This is currently preliminary support and we would appreciate to get feedback.
Please don't hesitate to open an [issue](https://github.com/eclipse-platform/eclipse.platform/issues)
if something is missing or not working as expected.

The terminal support can be installed as follows:

- Download the latest integration build SDK [here](https://download.eclipse.org/eclipse/downloads/).
- Go to `Help > Install New Software` and add the site https://download.eclipse.org/eclipse/updates/4.37-I-builds/ then select
  `Terminal Feature` and `Terminal Session Support`.
- Now in the toolbar choose the `Open a Terminal` icon ensure the `Terminal` view works for your platform.

Now that the terminal console support is installed, you can use it.
You can install m2e PDE support from https://download.eclipse.org/technology/m2e/releases/latest/
and then use this [example project](examples/terminal-example.zip):

- Open the `console.target` and set it as active target platform.
- Open the `console.product` and start it; you will see a warning and some garbled characters.
- Go to the launch configuration and then open the tab `Common` and choose `Allocate Terminal`.
- Run it again and you will get colorized content and auto-completion using `<tab>`.

![Preference page for enabling terminal console](images/terminal_console.png)

### Provide Search Capabilities for WebKit Browser on GTK+

<details>
<summary>Contributors</summary>

- [Simeon Andreev ](https://github.com/trancexpress)
- [Andrey Loskutov ](https://github.com/iloveeclipse)
</details>

We added rudimentary searching capabilities to `Browser` widgets based on WebKit and GTK+.
The search is enabled by setting the `SWT.SEARCH` style flag of the `Browser` widget.
The hotkey to open the search dialog is `Ctrl+F`,
the dialog opens at the bottom left of the client area of the Browser widget. See screenshots below.

The search dialog is closed with `Esc`.
Its also closed when resizing or moving the `Browser` widget or its parent `Shell`.
The dialog can be dragged and will remember its position until such a resize or move.

The search can be disabled globally with the following VM property, e.g. in case of WebKit crashes:

```
-Dorg.eclipse.swt.internal.webkitgtk.disableBrowserSearch=true
```

Searching in the `Help Contents` dialog: 

![Browser search dialog in Help Contents dialog](images/webkit_browser_search_dialog1.png)

Searching in the `Help` view: 

![Browser search dialog in Help View](images/webkit_browser_search_dialog2.png)

![Preference page for enabling terminal console](images/terminal_console.png)

### Compare/Replace with Clipboard

<details>
<summary>Contributors</summary>

- [Lars Vogel ](https://github.com/vogella)
- [Andrey Loskutov ](https://github.com/iloveeclipse)
- [Sougandh S ](https://github.com/SougandhS)
</details>

A new feature has been added to enhance file and selection comparisons in Eclipse editors. 
You can now compare the current file content or a selected portion with the content of the system clipboard. 
This is particularly useful for quickly checking differences between a copied snippet and what's in your working file.

To use this, simply right-click within an editor and choose `Compare With → Clipboard`. 

![Compare Clipboard Context Menu](images/CompareClipBoard.png)

A comparison editor will open, highlighting differences between the selected text (or entire file if nothing is selected) and the clipboard content.

![Compare Clipboard Result](images/CompareResult.png)

Additionally, you can use the `Replace With → Clipboard` action to replace the selected content or entire file with the clipboard contents directly.

![Replace Clipboard Context Menu](images/ReplaceClipBoard.png)






