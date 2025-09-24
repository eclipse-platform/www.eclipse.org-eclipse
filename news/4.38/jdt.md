# Java Development Tools - 4.38

A special thanks to everyone who [contributed to JDT](acknowledgements.md#java-development-tools) in this release!

<!--
---
## Java&trade; XX Support 
-->

<!--
---
## JUnit
-->

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


## Debugger


### Compare Variable Value with Clipboard

<details>
<summary>Contributors</summary>

- [Sougandh S ](https://github.com/SougandhS)
</details>

The Variables view now provides an option to compare a selected variable’s `toString()` value directly with the current clipboard content. 
The values open in a comparison viewer where differences are clearly highlighted, making it easier to verify actual values against expected results quickly and accurately.


To use this, select a variable from `Variables View` and choose `Compare With Clipboard` from its content menu

![Variable Compare with Clipboard](images/VariableCompareWithClipboardOption.png)


For `objects`, the clipboard content is compared to their `toString()` value.


![Variable Compare with Clipboard Result](images/VariableCompareWithClipboardResult.png)


Comparison also works with `Arrays` and `Primitives` too.


![Variable Compare with Clipboard Array](images/VariableCompareWithCllipboardArrays.png)


![Variable Compare with Clipboard Array](images/VariableCompareWithCllipboardPrimitives.png)

<!--
### JDT Developers
--> 
