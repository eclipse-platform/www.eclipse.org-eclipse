# Platform and Equinox API - 4.36

A special thanks to everyone who [contributed to Eclipse-Platform](acknowledgements.md#eclipse-platform) or [contributed to Equinox](acknowledgements.md#equinox) in this release!

<!--
---
## Platform Changes
-->

---
## SWT Changes

### Lazy Handle Generation for Images and Fonts (Windows only)

<details>
<summary>Contributors</summary>

- [Shahzaib Ibrahim](https://github.com/ShahzaibIbrahim)
- [Federico Jeanne](https://github.com/fedejeanne)
- [Heiko Klare](https://github.com/HeikoKlare)
- [Andreas Koch](https://github.com/akoch-yatta)
- [Amartya Parijat](https://github.com/amartya4256)
</details>

When creating resources like image `Image` and `Font`, the necessary OS handles were previously created eagerly upon instantiation of the resource.
On Windows, this behavior was changed for images and fonts.
Handles are now generated upon first access.
Until then, only the metadata to generate a handle is stored.

This is particularly relevant on Windows because of the introduction of [monitor-specific scaling](platform.md#monitor-specific-ui-scaling-as-default-windows-only).
That requires all resources to be potentially available at different zooms at the same time, depending on the zooms of the monitors on which application windows are placed.
The lazy loading is one contribution to mitigate an increasing number of OS handles while reducing unnecessary OS handle generation in general.

More precisely, images now only store their data source (such as a file path or a data provider) upon instantiation.
In case the image data of an image is retrieved (`getImageData(zoom)`), the data is loaded from the data source for the specified zoom, still without creating an OS handle for it.
Once the handle is accessed for the first time (e.g., due to usage in a control or drawing via a `GC`), it is created.

*Note:* if for an image the image data or handles are retrieved for different zooms, they are all stored in a single `Image` instance.
Multiple zooms do not require the creation of multiple `Image` instances.

As Linux and MacOS do not support monitor-specific scaling and thus do not require resources at different zooms at the same time, the feature is currently only implemented for Windows.
