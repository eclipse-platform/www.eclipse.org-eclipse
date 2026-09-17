# Java Development Tools - 4.42

A special thanks to everyone who [contributed to JDT](acknowledgements.md#java-development-tools) in this release!

<!--
---
## Java&trade; XX Support 
-->

---
## JUnit

### Reload Imported JUnit Test Results
<!-- https://github.com/eclipse-jdt/eclipse.jdt.ui/pull/3145 -->

<details>
<summary>Contributors</summary>

- [Carsten Hammer](https://github.com/carstenartur)
</details>

You can now refresh results imported from a local XML file without importing it again.
After your external test run updates that same file, select the imported run in the `JUnit` view.
Click `Reload Test Run`, the refresh icon in the view's toolbar.
Its tooltip is `Reload the imported test results from their source file`:

![The highlighted refresh button displays the tooltip Reload the imported test results from their source file](images/junit-reload-test-run.png)

The updated results replace the existing run at the same history position instead of adding a duplicate:

![The reloaded report contains two successful tests and no failures](images/junit-imported-results-after-reload.png)

Reloading reads the file; it does not rerun tests or monitor subsequent file changes.
The command is enabled only for runs imported from a local file.
If the file cannot be read or contains invalid XML, Eclipse reports an error and keeps the previous results.

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

### More Accurate JUnit Execution Times
<!-- https://github.com/eclipse-jdt/eclipse.jdt.ui/pull/3163 -->

<details>
<summary>Contributors</summary>

- [Carsten Hammer](https://github.com/carstenartur)
</details>

You can now see more accurate execution times in the `JUnit` view.
Individual test durations are measured in the test JVM using a monotonic clock,
avoiding communication delays and system-clock adjustments.

Open the view menu (three dots at the top right).
Select `Show Execution Time` for elapsed time and `Show Execution Time Details` for CPU diagnostics.
The options are independent and only affect the display, not recording.
The details option is off by default.

![The JUnit view menu with both Show Execution Time and Show Execution Time Details selected](images/junit-execution-time-menu.png)

With both options selected, compare CPU-intensive work with a test that mostly waits:

![A CPU-bound test uses CPU time while a sleeping test records mostly non-CPU time](images/junit-execution-time-details.png)

CPU, user-mode and system values cover the measured test-execution thread, not worker threads started by the test.
`non-CPU` is elapsed time minus that thread's CPU time, not a separate measurement of waiting time.

CPU details are shown only when recorded data is available; recording requires support from the test JVM.
Recorded details are retained in the JUnit history across restarts and can be viewed without a running test JVM.

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
