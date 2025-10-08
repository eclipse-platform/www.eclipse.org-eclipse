# Platform and Equinox API - 4.38

A special thanks to everyone who [contributed to Eclipse-Platform](acknowledgements.md#eclipse-platform) or [contributed to Equinox](acknowledgements.md#equinox) in this release!

<!--
---
## Platform Changes
-->


## SWT Changes

### Cursor Constructor Deprecation and Replacement

<details>
<summary>Contributors</summary>

- [Shahzaib Ibrahim](https://github.com/ShahzaibIbrahim)
</details>

The constructor `Cursor(Device, ImageData, ImageData, int, int)` has been **deprecated** in SWT due to its limited DPI support.

This constructor requires separate source and mask image data. However, this approach has become uncommon, as modern practices typically encode mask data directly into the image data itself (for example, by using alpha channels). For this reason, the constructor that accepts a single `ImageData` object (containing both the image and mask information) is **not** deprecated and remains the recommended approach.

You should now use the new constructor:

```
Cursor(Device, ImageDataProvider, int, int)
```

The new `ImageDataProvider`-based constructor ensures you get the best image for the cursor at all zoom levels, providing proper support for high-DPI displays and modern environments.

**Action Required:**  
Please update your code to use the new constructor for better compatibility and future-proofing.