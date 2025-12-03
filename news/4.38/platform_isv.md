# Platform and Equinox API - 4.38

A special thanks to everyone who [contributed to Eclipse-Platform](acknowledgements.md#eclipse-platform) or [contributed to Equinox](acknowledgements.md#equinox) in this release!

---

<!--
## Platform Changes
-->

## SWT Changes

### New GC API for Drawing Scaled Images

<details>
<summary>Contributors</summary>

- [Arun Jose ](https://github.com/arunjose696)
- [Heiko Klare ](https://github.com/HeikoKlare)
- [Michael Bangas ](https://github.com/Michael5601)
</details>

A new `drawImage` method in `GC` allows drawing the **full image** into a specified destination rectangle:
```java
GC#drawImage(image, destX, destY, destWidth, destHeight)
```
Until now, the existing method `drawImage(image, srcX, srcY, srcWidth, srcHeight, destX, destY, destWidth, destHeight)`  was used for this purpose by specifying the full source bounds.
The new method simplifies the process by eliminating the need to provide the actual image bounds when drawing the entire image.

#### New Versus Existing Method

- **Existing method:** Handles scaling and cropping; requires explicit source bounds.
  Best suited for drawing a cropped part of the image.
  However, this is not a very common use case in Eclipse products, as images are mostly drawn at their full sizes.
- **New method:** Handles scaling and drawing the full image more efficently, as consumers do not need to call `getBounds()` to calculate the image size.
  Recommended for scenarios where cropping is unnecessary.

#### Examples

```java
// Old method: requires source bounds
gc.drawImage(image, 0, 0, image.getBounds().width, image.getBounds().height, 0, 0, 200, 100);

// New method: simpler, only need to provide destination cordinates
gc.drawImage(image, 0, 0, 200, 100);
```

#### Additional Note

When using the new `drawImage` method, images that can provide size-specific data (such as SVGs) are loaded at the destination size, avoiding blurry scaling.
For all other images the behavior remains the same as before, i.e., they are loaded at the closest available zoom level.
This destination-size loading is currently only available in the new method but may be added to the existing method in the future.

### Cursor Constructor Deprecation and Replacement

<details>
<summary>Contributors</summary>

- [Shahzaib Ibrahim](https://github.com/ShahzaibIbrahim)
</details>

The constructor `Cursor(Device, ImageData, ImageData, int, int)` has been **deprecated** in SWT due to its limited DPI support.
This constructor allows creating a cursor by providing a source image and a 1-bit mask to define transparency.
This approach requires developers to manually define mask pixels and works reliably **only** in fixed DPI environments.

However, this approach has become uncommon, as modern practices typically encode mask data directly into the image data itself, for example, by using alpha channels.

If you are currently using the deprecated constructor, you can switch to one of the following alternatives:

- `Cursor(Device, ImageData, int, int)`:
  This constructor that accepts a single ImageData object (containing both the image and the mask information) is not deprecated since the mask data is directly encoded into the image and as a user you don't need to define mask pixel by pixel.

- (**Recommended**) `Cursor(Device, ImageDataProvider, int, int)`:
  This constructor ensures the best possible image for a cursor at all zoom levels.

#### Call for Action

We encourage you to update your code and use the **recommended** constructor for better compatibility and a more future-proof code.