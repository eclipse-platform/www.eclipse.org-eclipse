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

<!--
---
## SWT Changes
-->
