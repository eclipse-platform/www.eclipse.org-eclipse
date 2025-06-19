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
- Go to "Install new Software" and add the site https://download.eclipse.org/tools/cdt/releases/12.1/cdt-12.1.0/.
  Then select `Terminal (Console) View` and `TM Terminal Local Connector Extension`.
- Now in the toolbar choose the `Open a Terminal` icon ensure the `Terminal` view works for your platform.
- Go to `Help > Install New Software` and add the site https://download.eclipse.org/eclipse/updates/4.37-I-builds/ then select `...`.

Now that the terminal console support is installed, you can use it.
You can install m2e PDE support from https://download.eclipse.org/technology/m2e/releases/latest/
and then use this [example project](images/test.terminal.zip):

- Open the `console.target` and set it as active target platform.
- Open the `console.product` and start it; you will see a warning and some garbled characters.
- Go to the launch configuration and then open the tab `Common` and choose `Allocate Terminal`.
- Run it again and you will get colorized content and auto-completion using `<tab>`.

![Preference page for enabling terminal console](images/terminal_console.png)
