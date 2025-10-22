# Platform and Equinox API - 4.38

A special thanks to everyone who [contributed to Eclipse-Platform](acknowledgements.md#eclipse-platform) or [contributed to Equinox](acknowledgements.md#equinox) in this release!

<!--
---
## Platform Changes
-->

## SWT Changes

### New API: `GC#drawImage(Image image, int destX, int destY, int destWidth, int destHeight)`

<details>
    <summary>Contributors</summary>
    
    - [Arun Jose](https://github.com/arunjose696)
</details>

#### Description
A new `drawImage` method in `GC` allows drawing the **full image** into a specified destination rectangle.  
Until now, the existing method  
`drawImage(image, srcX, srcY, srcWidth, srcHeight, destX, destY, destWidth, destHeight)`  
was used for this purpose by specifying the full source bounds. The new method simplifies the process by eliminating the need to provide the actual image bounds when drawing the entire image.

#### New vs. Existing Method
- **Existing method:** Handles scaling and cropping; requires explicit source bounds. Best suited for drawing a cropped part of the image. However, this is not a very common use case in Eclipse products, as images are mostly drawn at their full sizes.  
- **New method:** Handles scaling and drawing the full image more efficently, as consumers do not need to call `getBounds()` to calculate the image size. Recommended for scenarios where cropping is unnecessary.

#### Examples
```java
// Old method: requires source bounds
gc.drawImage(image, 0, 0, image.getBounds().width, image.getBounds().height, 0, 0, 200, 100);

// New method: simpler, only need to provide destination cordinates
gc.drawImage(image, 0, 0, 200, 100);
```

#### Additional Note
When using the new `drawImage` method, images that can provide size-specific data (such as SVGs or images backed by `ImageDataAtSizeProvider`) are loaded at the destination size, avoiding blurry scaling.  
For all other images the behavior remains the same as before _i.e._ they are loaded at the closest available zoom level.  
This destination-size loading is currently only available in the new method but may be added to the existing method in the future.