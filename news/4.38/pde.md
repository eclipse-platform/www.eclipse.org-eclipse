# Plug-in Development Environment - 4.38

A special thanks to everyone who [contributed to PDE](acknowledgements.md#plug-in-development-environment) in this release!

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

---
## JUnit Plug-in Test Launch

### JUnit 5 and JUnit 6 conflicts in Eclipse 4.38+

Eclipse 4.38 supports JUnit 6 in parallel to JUnit 5. To achieve this, the platform contains both JUnit 5 and JUnit 6.
This can result in launch configuration and runtime problems in tests,
when a plug-in does not correctly bound the version of JUnit Jupiter (JUnit 5 and JUnit 6) bundles.

The most common problem is running a JUnit 5 plug-in test launch with a `MANIFEST.MF` dependency to `junit-jupiter-api`.
This will result in no tests executed. To resolve the problem, either specify a version bound `junit-jupiter-api;bundle-version="[5.0.0,6.0.0)"`
or update the test launch to use JUnit 6. Other unbound dependencies to JUnit Jupiter bundles can likewise result in no executed tests.

A more difficult to analyze problem is when a transitive dependency of the plug-in has an unbound dependency to JUnit Jupiter.
The Plug-in Explorer view or the [Plug-in Dependencies](https://github.com/iloveeclipse/plugindependencies) view
can be used to analyze unexpected dependencies to JUnit 6.

Example issues that indicate mixed JUnit 5 and 6 in the dependencies and/or package imports:

* Launch is executed by runs no tests or reports that no tests were found
* Launch configuration dialog shows validation error: `Cannot find class 'org.junit.platform.commons.annotation.Testable' on project build path`
* Runtime error: `Bundle "X" not found. Possible causes include missing dependencies, too restrictive version ranges, mixed JUnit versions, or a non-matching required execution environment.`
* Runtime error: `java.util.ServiceConfigurationError: org.junit.platform.engine.TestEngine: org.junit.jupiter.engine.JupiterTestEngine not a subtype`