# Java Development Tools - 4.36

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

### Custom Folding Regions

It is now possible to create custom folding regions by specifying a comment at the start and end of the region.
You can enable and configure this feature under `Window > Preferences > Java > Editor > Folding > Custom folding regions`.

![Preference page for custom folding regions](images/custom_folding_regions_preferences.png)

on that preference page, you can specify the text that should be used to start and end a custom folding region.
When this is enabled,
writing a comment starting with the specified region start followed by another comment starting with the specified region end creates a folding region.

![code containing comments with the text 'region' and 'endregion'](images/custom_folding_regions_code_expanded.png)
					
Custom folding regions can be collapsed like any other folding regions.

![custom folding regions are collapsed](images/custom_folding_regions_code_collapsed.png)
					
### Project Properties Page for Folding
				
Preferences for folding can now be configured on a per-project basis in addition to configuring folding for the workspace.
This page is available under `Project > Properties > Java Editor > Folding`.

![Project Properties page for folding](images/folding_property_page.png)
			
### New folding mechanism as Default

In the previous release, a preference to enable different kinds of folding was introduced,
see the news for [4.35](../4.35/jdt.html#new-folding).
The feature has been further improved since then and is now **enabled by default**.

This feature enhances the code folding mechanism in Eclipse JDT by enabling folding for control statements 
such as **if**, **while**, **switch**, and **for**.
It improves code readability and navigation by allowing developers to collapse and expand structured blocks.

![View of the new folding](images/new-folding.png)

The feature can be disabled in the settings under `Java > Editor > Folding`.


![Settings view of the folding](images/settings-folding.png)

### Unnecessary SuppressWarnings Clean-up

A new clean-up has been added to remove unnecessary @SuppressWarnings tokens.  To access the new clean-up, go to <b>Source -> Cleanups... -> Configure</b> and on the <b>Unnecessary Code</b> tab, select: <b>Remove unnecessary suppresswarnings tokens</b>.

For example:

![Before unnecessary supppresswarnings clean-up](images/unnecessary-before.png)

is changed to:

![After unnecessary suppresswarnings clean-up](images/unnecessary-after.png)

### Improved Pattern instanceof to Switch Clean-up

The Pattern instanceof to switch clean-up for Java 21 and up has been improved and a number of errors have been fixed from the initial version released in 4.35.  The Pattern instanceof clean-up is available via the <b>Java Feature</b> tab of the clean-up configuration dialog under the <b>Java 21</b> group.

The first improvement is that the clean-up now recognizes checks for <b>null</b> and will use any statements to generate the <b>case null</b> in the switch. A <b>default</b> clause will still be generated based on any else clause (possibly empty if no else clause exists).

The second improvement is that in the case of a Pattern instanceof if statement that has no else clause, but is followed by a <b>return</b> or <b>throws</b> statement, these statements will be considered if a <b>switch expression</b> is possible.

A third improvement is that if a pattern variable is not used by the code in the if statement and the Java version is 22 or higher, then the unnamed variable: "_" will be substituted in the case.

For example:

![Pattern instanceof to switch before](images/pattern-instanceof-before.png)

gets converted to:

![Pattern instanceof to switch after](images/pattern-instanceof-after.png)

### Inliner Improvements for Lambdas

The inline refactoring has been improved with regards to lambda expressions.  In the past, only a simple return statement could be used to inline a method call inside a lambda expression body.  This is now enhanced to include an empty method or multiple statement methods.  Additionally, a lambda method reference is now recognized as a site for inlining a method.  This is important in the case where the original method is being deleted.

For example, if we inline b in the following:

![Inline in lambda before](images/lambda-inline-before.png)

We get:

![Inline in lambda after](images/lambda-inline-after.png)

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
			
---
## Debug

### Collapsing Stack Frames

Navigating in deep stack frames can be challenging during debuging, due to the high number of stack frames that are not relevant most of the time,
for example because they are provided by either the JDK, by a testing framework, or by a library.
This feature tries to help focus on the stack frames that are coming from the user-created projects,
drastically reducing the unnecessary noise in the Debug View.

![Original](images/not-collapsed.png)

The feature can be enabled from the Debug toolbar in `Debug > Java > Collapse Stack Frames`.

![Menu to enable](images/menuitem.png)

After enabling it, the view becomes much simpler and less intimidating:

![Collapsed stack frames](images/collapsed.png)

### Navigate to Variable Declaration

Users can now navigate to a variable’s declaration directly from the Variables view during a debug session,
making it easier to locate a variable, especially in methods with numerous local variables.

Choose `Navigate to Declaration` from context menu of a variable.

![Navigation_menu](images/NavigateToDeclareMenu.png)

The editor will jump and highlight its declaration.

![Navigation_done](images/Navigation.png)

### Auto-Resuming Trigger Points

Trigger points can now be configured to automatically resume execution when hit,
allowing breakpoints after the trigger point to be activated while skipping those before it,
thereby enabling a more focused and efficient debugging workflow.

Upon enabling a trigger point, a new option will be shown to `Continue execution on hit` or not.

![Triggerpoint Enabled](images/TriggerEnabled.png)

Once `Continue execution on hit` is toggled, the breakpoint label will update to `[Resume on hit]` meaning it won't suspend on hit.

![Triggerpoint Continue](images/TriggerContinue.png)

Resume trigger also supports conditions, meaning if condition is true it will resume the execution otherwise it will suspend.

![Resume-Triggerpoint with conditions](images/ResumeWithCondition.png)

Now when you run in debug mode, the trigger point won't hit, allowing you to skip previous breakpoints, and stop on the actual breakpoint on which you need to focus.

For example, here `Resume trigger` was set on line number 7 and during debugging it hit on line number 8 by skipping all the previous breakpoints.

![Resume-Triggerpoint execution](images/TriggerExecution.png)

<!--
### JDT Developers
-->
					
