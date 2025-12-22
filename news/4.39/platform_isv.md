# Platform and Equinox API - 4.39

A special thanks to everyone who [contributed to Eclipse-Platform](acknowledgements.md#eclipse-platform) or [contributed to Equinox](acknowledgements.md#equinox) in this release!

---
## Platform Changes

### Perspective Switcher Respects IPresentationEngine.NO_MOVE

<details>
<summary>Contributors</summary>

- [Lars Vogel](https://github.com/vogella)
</details>

The perspective switcher now respects the `IPresentationEngine.NO_MOVE` tag.
This enhancement prevents drag-and-drop reordering of perspective items if the perspective switcher tool control has this tag applied.
Developers can programmatically lock or unlock this reordering feature by adding or removing the `IPresentationEngine.NO_MOVE` tag to the tool control.

Example usage (programmatic):

```java
// To lock the perspective switcher reordering:
toolControl.getTags().add(IPresentationEngine.NO_MOVE);
// To unlock:
toolControl.getTags().remove(IPresentationEngine.NO_MOVE);
```


---
## SWT Changes

### Native PDF Output Support

<details>
<summary>Contributors</summary>

- [Christoph Läubrich](https://github.com/laeubi)
</details>

SWT now provides native PDF generation capabilities through a new `PDFDocument` class, enabling direct export of widget content to PDF files without requiring external libraries.

Applications can now export SWT widget content to PDF using the standard `Control.print(GC)` API with the familiar GC drawing operations, or create fully customized PDF documents programmatically.

#### Platform Support

| Platform | Implementation |
|----------|----------------|
| GTK (Linux) | Cairo PDF surface |
| Cocoa (macOS) | Core Graphics CGPDFContext |
| Win32 (Windows) | Microsoft Print to PDF |

#### Example Usage

```java
// Create a PDF document
PDFDocument pdf = new PDFDocument(display, "output.pdf", 595, 842); // A4 size in points

// Print a control to the PDF
GC gc = new GC(pdf);
control.print(gc);
gc.dispose();

// Dispose the document when done
pdf.dispose();
```

This enhancement eliminates the need for external PDF libraries and provides a native, platform-integrated solution for PDF generation in SWT applications.
See [Snippet388](https://github.com/eclipse-platform/eclipse.platform.swt/blob/master/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet388.java) for a complete working example.
