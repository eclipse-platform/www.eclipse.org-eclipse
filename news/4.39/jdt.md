# Java Development Tools - 4.39

A special thanks to everyone who [contributed to JDT](acknowledgements.md#java-development-tools) in this release!

<!--
---
## Java&trade; XX Support 
-->

<!--
---
## JUnit
-->


---
## Java Editor

### Folding with Showing Selected Java Elements
<details>
<summary>Contributors</summary>

- [Daniel Schmid](https://github.com/danthe1st)
</details>

Folding can now be used in the Java Editor when `Window` > `Preferences` > `Java` > `Editor` > `Only show the selected Java element` is enabled.
In previous releases, this option automatically disabled code folding.

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

## Debugger


### Improved Highlighting for Inline Chained Lambdas

<details>
<summary>Contributors</summary>

- [Sougandh S](https://github.com/SougandhS)
</details>


Building on the `inline lambda breakpoint` support added in **Eclipse 4.38**, the Java debugger now highlights the specific inline lambda expression when it is suspended.
Previously, selecting or focusing a lambda stack frame in a chained expression highlighted the entire line, making it difficult to identify the exact lambda. 
Now only the suspended lambda is highlighted, making it much easier to follow execution in complex chained expressions.

![Lambda Highlighting](images/LambdaHighlight.gif)


<!--
### JDT Developers
--> 
