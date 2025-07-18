# Java Development Tools - 4.37

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

### Support Overlapping Start and End Markers for Custom Folding Regions
<details>
<summary>Contributors</summary>

- [Daniel Schmid](https://github.com/danthe1st)
</details>

Custom Folding Regions have been enhanced to allow using the same text for both the start and end region comment.
If the start and end region markers are the same, the same comment can be used to end a folding region and start a new one.
The last section automatically ends when the last block is closed or at the end of the file.

This is useful if a class (or other Java file) contains multiple sections that are seperated with some comment.
To use this functionality, check "Enable folding of custom regions" in `Window > Preferences > Java > Editor > Folding` and enter the same text in "Region start comment text" and "Region end comment text".

![Preference window with folding of custom regions enabled and the start and end region markers set to the same text](images/overlappingStartEndCustomRegionMarkersPrefs.png)

This marker can then be used in comments to separate start and end regions.

![Java class with multiple sections seperated by comments](images/overlappingStartEndCustomRegionMarkersExpanded.png)

![The same Java class with some regions collapsed](images/overlappingStartEndCustomRegionMarkersCollapsed.png)



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
