# Java Development Tools - 4.41

A special thanks to everyone who [contributed to JDT](acknowledgements.md#java-development-tools) in this release!

<!--
---
## Java&trade; XX Support 
-->

<!--
---
## JUnit
-->


## Java Editor

### Open Types and Methods in a New Editor from Hyperlinks

<details>
<summary>Contributors</summary>

- [Sougandh S](https://github.com/SougandhS)
</details>

The Java editor now provides an `Open in New Editor` option in the hyperlink popup for types and methods.

![Context in Hyperlink](images/OptionInHyperLink.png)

When navigating to a declaration, implementation, or method within the same editor, users can now choose to open the target in a separate editor tab directly from the hyperlink menu. 

![Context in action](images/OpenInNewEditor.gif)

This makes it easier to inspect implementations, compare code, and work with multiple locations in parallel without losing your current position.

### Enhanced For-loop to ForEach Quick Assist

<details>
<summary>Contributors</summary>

[Ivan Gualandri](https://github.com/inuyasha82)
[Carsten Hammer](https://github.com/carstenartur)
</details>

With this new quick assist, on an enhanced for-loop like the following:

```java
for (String adj : list) {
    System.out.println(adj);
}
```

if the list item is an Iterable object a new option is added: `Convert Enhanced for loop to forEach`. 
This let the user to convert the loop above, with a `forEach` statement:

```java
list.forEach(adj -> {
    System.out.println(adj);
});
```
Below an animation of the new quick assist:

![Foreach conversion in action](images/foreachexample.gif)


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
