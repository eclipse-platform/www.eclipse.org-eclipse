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

### ImageDataAtSizeProvider Referencable

<details>
<summary>Contributors</summary>

- [Michael Bangas](https://github.com/Michael5601)
- [Arun Jose](https://github.com/arunjose696)
- [Heiko Klare](https://github.com/HeikoKlare)
</details>

The `ImageDataAtSizeProvider` interface is now available as public API.
It allows SWT users to provide image data at a custom width and height, rather than relying solely on zoom-based scaling.
To this end, the `getImageData(int width, int height)` method of the provider needs to be implemented.

The `ImageDataAtSizeProvider` is particularly useful in cases where precise control over image dimensions is needed, allowing users to create image data at a specific width and height.

If such a provider shall also be used to retrieve image data for specific zooms, the `getDefaultSize() : Point` method can overwritten to define the size that the image data shall have at 100% zoom.
In that case, calls to `getImageData(int zoom)` are delegated to `getImageData(int width, int height)` with the given zoom applied to the default size. 

#### Example Usage

```java
// Lambda implementation of ImageDataAtSizeProvider
ImageDataAtSizeProvider provider = (width, height) -> {
    PaletteData palette = new PaletteData(0xFF0000, 0xFF00, 0xFF);
    ImageData data = new ImageData(width, height, 32, palette);
    int pixel = palette.getPixel(drawnRgb);

    // Draw a border
    for (int i = 0; i < width; i++) {
        data.setPixel(i, 0, pixel);
        data.setPixel(i, height - 1, pixel);
    }
    for (int i = 0; i < height; i++) {
        data.setPixel(0, i, pixel);
        data.setPixel(width - 1, i, pixel);
    }
    return data;
};

// Create an Image using the provider
Image image = new Image(display, provider);
```

Images from this provider can be drawn at a specific size using `GC.drawImage(Image, int, int, int, int)`.
See also the [news on the introduction of that method](../4.38/platform_isv.md#new-gc-api-for-drawing-scaled-images).

### New API Shell.getZoom()

<details>
<summary>Contributors</summary>

- [Amartya Parijat](https://github.com/amartya4256)
</details>

A new API, `Shell.getZoom()`, has been added to retrieve the **native zoom level of a shell**.
The returned value is the zoom of the shell as originally considered by the OS and not an adjusted zoom value as considered by SWT autoscaling capabilities.
When using the monitor-specific scaling capability on Windows, the value conforms to the zoom of the monitor the shell is placed on. On other platforms or when monitor-specific scaling is disabled on Windows, it conforms to the global application scale factor according to `DPIUtil#getNativeDeviceZoom()`.

### Clarification of Device.getDPI() contract

<details>
<summary>Contributors</summary>

- [Shahzaib Ibrahim](https://github.com/ShahzaibIbrahim)
- [Heiko Klare](https://github.com/HeikoKlare)
- [Andreas Koch](https://github.com/akoch-yatta)
</details>

`Device.getDPI()` is a long-standing API method in SWT. 
It was introduced at a time when monitor zooming — typically relevant only for HiDPI displays — was not yet a concern. 
As a result, the method implicitly established a contract whereby a Display exposes a single, global DPI value, independent of the number of connected monitors.

When SWT was adapted to better support HiDPI monitors roughly a decade ago, this implicit contract was retained but extended through the introduction of autoscaling. 
Under this extended contract, the DPI returned by `Device.getDPI()` is derived as follows: if the autoscaled zoom used by the SWT autoscaling mechanism differs from the native zoom, the returned DPI will be calculated relative from the autoscaled zoom to the DPI of the native zoom. 
For example, in the Windows implementation (with a base DPI of 96), this method returns 120 when autoscale mode is set to *integer*, and 96 when autoscale mode is set to *quarter*.

With the subsequent introduction of monitor-specific scaling in the Windows implementation of SWT, the original assumption of a single DPI value per `Display`, independent of the number of connected monitors, is no longer valid in all scenarios.
With this release, the method is adapted in Windows to always return the system base DPI (which is currently `96`) when monitor-specific scaling is enabled, as with that mode the autoscaled zoom used by SWT for a shell is always the same as the native zoom of the monitor the shell is placed on.

Because existing usages of `Device.getDPI()` may still rely on the mentioned assumption, it is recommended that such usages be reviewed. 
In many cases, they may no longer be necessary or can be replaced with calculations based on the new monitor-aware API `Shell.getZoom()`.
