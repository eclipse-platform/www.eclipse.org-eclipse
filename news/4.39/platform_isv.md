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

### New Method: Shell.getZoom()

<details>
<summary>Contributors</summary>

- [Amartya Parijat](https://github.com/amartya4256)
</details>

A new API, `Shell.getZoom()`, has been added to retrieve the **native zoom level of a shell**.
The returned value is the zoom of the shell as originally considered by the OS and not an adjusted zoom value as considered by SWT autoscaling capabilities.
When using the monitor-specific scaling capability on Windows, the value conforms to the zoom of the monitor the shell is placed on. On other platforms or when monitor-specific scaling is disabled on Windows, it conforms to the global application scale factor according to `DPIUtil#getNativeDeviceZoom()`.

### Clarification of Device.getDPI() Contract

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

### API to Disable Autoscaling for Controls

<details>
<summary>Contributors</summary>

- [Amartya Parijat](https://github.com/amartya4256)
- [Heiko Klare](https://github.com/HeikoKlare)
- [Andreas Koch](https://github.com/akoch-yatta)
</details>

The autoscaling implementation on Windows differs fundamentally from the implementations on GTK (Linux) and Cocoa (macOS).
On Linux and macOS, autoscaling is realized by computing and applying a single, global scale factor; the operating system then transparently handles all further scaling internally.
On Windows, the situation is considerably more complex. 
The SWT implementation must explicitly convert every pixel-based value—such as positions, sizes, and bounds—according to the active autoscaling settings before passing them to the operating system. 
When fractional zoom levels are used (for example, 125% or 175%), these conversions can introduce rounding errors.

In most scenarios, particularly when working with standard widgets, these rounding effects rarely result in visible issues. 
However, when custom rendering using a `GC` is involved, they can easily lead to rendering artifacts on a `Canvas`. 
A common example is an incorrectly converted clipping region that becomes slightly too large or too small after scaling.

The most reliable way to avoid such issues is to remove SWT autoscaling from the equation entirely and render directly to the `GC` using pixel coordinates. 
To support this use case, a new API has been added to `Control`: `Control.setAutoscalingMode(AutoscalingMode)`.

There are currently three enum values available for `AutoscalingMode`:

- `Enabled`: Default value. Autoscaling is applied as usual.
- `Disabled`: Autoscaling is disabled; the Control behaves as if the zoom were 100%.
- `Disabled_Inherited`: Same as `Disabled`, but the autoscaling mode is inherited by **newly** created child controls.

`Control.setAutoscalingMode(AutoscalingMode)` returns a boolean indicating whether the requested mode was accepted and applied. 
On Linux and macOS, the current implementations always return false.
`Control.isAutoScalable()` is implemented for Windows as well and utilizes the currently set autoscaling mode to return a meaningful value. 
If you overwrite this method in custom implementations of a `Control`, it could make sense to revise that.

Example:
```java
Canvas canvas = new Canvas(parent, SWT.None);
boolean autoscalingDisabled = canvas.setAutoScalingMode(AutoscalingMode.Disabled);
...
GC gc = new Gc(canvas, SWT.None);
gc.drawText("This is a test", x, y);
```

A `GC` always inherits its rendering context from the `Drawable` it is created for. 
Consequently, when autoscaling is disabled on the `Control`, the associated `GC` will also render with autoscaling disabled.


### Monitor-Specific Scaling by Default (Windows)

<details>
<summary>Contributors</summary>

- [Heiko Klare](https://github.com/HeikoKlare)
- [Andreas Koch](https://github.com/akoch-yatta)
</details>

Monitor-specific scaling is used as default in RCP products on Windows [since the 4.36 release of Eclipse](../4.36/platform.md#monitor-specific-ui-scaling-as-default-windows-only).
So far, SWT still defaults to use the pre-existing HiDPI support based on one zoom for the whole application during its lifecycle.

With this release, SWT defaults to having monitor-specific scaling enabled on Windows as well.
In consequene, all SWT-based application will start with monitor-specific scaling enabled, unless configured otherwise.

This change comes with some updates of defaults regarding autoscaling properties to unify the behavior and establish reasonable default behaviors.
It affects the autoscaling setting (via `swt.autoScale`) and the DPI awareness used by the UI thread.
While the existing scaling support used `swt.autoScale=integer` and a DPI awareness of "System" by default, monitor-specific scaling requires `swt.autoScale=quarter` and a DPI awareness of "PerMonitorV2" to work properly.

_Note:_ The Equinox launcher executable has also been adapted to start the process with DPI awareness "PerMonitorV2", such that the process DPI awareness fits to the default settings of the application (monitor-specific scaling being enabled).
This conforms to the default DPI awareness of the JVM.
The former default of the Equinox launcher executable was DPI awareness "System".
See also [the according news](platform.md#equinox-launcher-scaling-defaults-windows-only).  

#### Default

The most relevant configurations are the new and the previous defaults: 

- Monitor-specific scaling enabled (no configuration, new default): When instantiating a `Display`, the DPI awareness of the UI thread is set to "PerMonitorV2" and the `swt.autoScale` mode defaults to `quarter`.
- Monitor-specific scaling disabled (`-Dswt.autoScale.updateOnRuntime=false`, former default): When instantiating a `Display`, the DPI awareness of the UI thread is set to "System" and the `swt.autoScale` mode defaults to `integer`.

The latter configuration conforms to what Eclipse products used as default before monitor-specific scaling was enabled by default.
Note that with a plain SWT-based application, using `-Dswt.autoScale.updateOnRuntime=false` will lead to a slighly different result than before.
While previously the DPI awareness was taken from the JVM, it is now changed to "System", because the JVM default "PerMonitorV2" does not produce reasonable results with the pre-existing scaling support.
It might have been reasonable when using custom `swt.autoScale` values such as `false`, which why in case such a custom autoscale value is specified, the DPI awareness of the JVM is still used.

As a result of this, a runtime application started from an Eclipse IDE will use the same DPI awareness than a final product using the Equinox launcher executable (unless a custom `swt.autoScale` value is specified).
Previously, the experience with monitor-specific scaling disabled was different in a runtime application and in a product using the Equinox launcher executable.
 

#### Custom `swt.autoScale` Values

The `swt.autoScale` property allows to set different autoscaling modes, such as `integer` (rounding fractional scale values to multiples of 100) or `false` (completely disable autoscaling).
When a custom autoscale value is set, no automatic change of the DPI awareness of the UI thread is performed but the JVM default is used.
This preserves existing behavior of autoscale-customized applications.
The DPI awareness can still be customized via a system property (see subsequent section).

In case you used to use a custom `swt.autoScale` value, you may now need to set `-Dswt.autoScale.updateOnRuntime=false` to preserve your behavior.

*Note:* With monitor-specific scaling enabled, only the autoscale values `quarter` and `exact` are valid. 

*Note:* Instead of using `-Dswt.autoScale=false`, you may now consider using autoscale disablement at the level of `Controls` instead, see [the according news](#api-to-disable-autoscaling-for-controls). 

#### Custom DPI Awareness

To allow the customization of the DPI awareness for an application without changing the application's manifest, an according system property has been introduced: `org.eclipse.swt.internal.win32.dpiAwareness`
With this system property, the DPI awareness can be specified to "System", "PerMonitor" and "PerMonitorV2".
For example, to start an application with System DPI awareness, you can specify: `-Dorg.eclipse.swt.internal.win32.dpiAwareness=System`

*Note:* This property is flagged as internal and may be subject to change with any subsequent Eclipse release.
