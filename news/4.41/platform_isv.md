# Platform and Equinox API - 4.41

A special thanks to everyone who [contributed to Eclipse-Platform](acknowledgements.md#eclipse-platform) or [contributed to Equinox](acknowledgements.md#equinox) in this release!

---
## Platform Changes

### Shared Disabled Image Descriptor on `ImageDescriptor`

<details>
<summary>Contributors</summary>

- [Heiko Klare](https://github.com/HeikoKlare)
</details>

`ImageDescriptor` now provides `asDisabledDescriptor()`, which returns a lazily created, shared `ImageDescriptor` for the disabled version of the image.
This allows you to use a single descriptor with a `ResourceManager` to share both the original and disabled images, instead of managing two independent descriptors.

<!--
---
## SWT Changes
-->
