# Plug-in Development Environment - 4.37

A special thanks to everyone who [contributed to PDE](acknowledgements.md#plug-in-development-environment) in this release!

## General Updates

### JUnit Plugin-test launches

<details>
<summary>Contributors</summary>

- [Christoph Läubrich ](https://github.com/laeubi)
</details>

PDE previously has created JUnit Plugin-test launches with some broad inclusion settings and defaults that do not always fit different project setups.
From now on, it uses a more minimal approach when creating new JUnit Plugin-test launches by default that is only selecting the test-plugin and leverage
the option to include all required dependencies automatically.

This results in much smaller launches that start up faster and do not pull in everything in your workspace by default what is especially a problem when
many independent components in a workspace are to be tested.

Beside of this it is now possible to configure the used default settings for new launches to adapt to individual needs, because of this 
we **strongly recommend** you review these settings and make sure they fit your needs after an upgrade.

![New PDE Launch Settings](images/pde_junit_launch_config.png)

As this only affects new launches, you either need to adapt existing launches or delete older ones so they are created with fresh settings on the next run,
if you find any issues or difficulties using this feature don't hesitate to let us know and open an [issue](https://github.com/eclipse-pde/eclipse.pde/issues)
or a new [discussion](https://github.com/eclipse-pde/eclipse.pde/discussions).

### OSGi Test Framework Support

<details>
<summary>Contributors</summary>

- [Christoph Läubrich ](https://github.com/laeubi)
</details>

The [OSGi Testing Support](https://github.com/eclipse-osgi-technology/osgi-test#osgi-testing-support) is a great library for testing OSGi applications,
and PDE now add first-class support as it does for OSGi Annotations already.

To enable this do the following:

1. Make sure your target platform contains the necessary OSGi test dependencies, to make this more easy PDE provides a feature named `org.eclipse.pde.osgitest.dependencies.feature`.
2. Go to the [Build Path Settings](https://help.eclipse.org/latest/topic/org.eclipse.jdt.doc.user/reference/ref-properties-build-path.htm) and add the JUNIT Library under the [Libraries Tab](https://help.eclipse.org/latest/topic/org.eclipse.jdt.doc.user/reference/ref-properties-build-path.htm#libraries) but do not add any JUnit or OSGi Testing imports/requirements to your manifest!
3. Place your Tests into a source folder marked as test source

PDE will then automatically add required dependencies for OSGi Testing Support and you can use all the standard annotations right now.

After that just run your tests as the usual plugin test, you can find an example [here](examples/osgitest-example.zip), if you find any issues or has suggestions don't hesitate to let us know and open an issue [here](https://github.com/eclipse-pde/eclipse.pde/issues).

<!--
## Editors
-->

<!--
## API Tools
-->

<!--
---
## PDE Compiler 
-->
