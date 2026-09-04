# Java Development Tools - 4.42

A special thanks to everyone who [contributed to JDT](acknowledgements.md#java-development-tools) in this release!

<!--
---
## Java&trade; XX Support 
-->

---
## JUnit

### JUnit Test Run History Survives Restarts

<details>
<summary>Contributors</summary>

- [Carsten Hammer](https://github.com/carstenartur)
</details>

The `JUnit` view now preserves finished and stopped test runs when you close Eclipse normally and reopen the same workspace.
Recent runs reappear in the existing history,
up to the configured `Maximum count of remembered test runs`.
You can inspect previous results and failure traces after a restart without running the tests again.

Select a restored run to load its complete test tree and failure details on demand.
When the original saved launch configuration still exists,
you can also use `Rerun Test` and `Rerun Test - Failures First` after the restart.

<!--
---
## Java Editor
-->

<!--
---
## Java Views and Dialogs
-->

<!--
---
## Java Compiler
-->

<!--
---
## Java Formatter
-->

<!--
---
## Debug
-->

<!--
### JDT Developers
--> 
