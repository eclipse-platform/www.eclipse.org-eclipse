Bugs for the 3.1 readme

- https://bugs.eclipse.org/bugs/show_bug.cgi?id=87798 Eclipse crash when using the file dialog (on SP2)
- https://bugs.eclipse.org/bugs/show_bug.cgi?id=56184 [browser] IE sometimes freezes on PDF documents with Acrobat Reader 6.

Behaviour changes

- FillLayout will throw ClassCastException if you set layout data on its children (previously ignored all layout data)
- Widgets will throw IllegalArgumentException (with text "Argument not valid") if created with a disposed parent (previously threw no exception or threw SWTException with text "Widget Is Disposed")
