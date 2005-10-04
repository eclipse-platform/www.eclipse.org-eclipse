<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
    <title>SWT Snippets</title>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
    <link rel="stylesheet" href="http://dev.eclipse.org/default_style.css" type="text/css">
    <link rel="stylesheet" href="../swt.css" type="text/css">
    <link rel="shortcut icon" href="http://www.eclipse.org/images/eclipse.ico" type="image/x-icon">
</head>
<body bgcolor="#ffffff" text="#000000">
<table width="635px" class="swtpage">
<colgroup><col width="125px"><col width="510px"></colgroup>
<tr><?php include "../sidebar.php"; ?>
<td style="padding: 10px"><h1 style="padding: 0; margin: 0; border-bottom: 1px solid #000000;">SWT Snippets</h1>

<p>Snippets are minimal stand-alone programs that demonstrate specific
techniques or functionality.  Often simply a small example is the easiest way to
understand how to use a particular feature.</p>

<p>Snippets also help isolate problems.  The best way to report an SWT
bug is to write your own snippet showing the problem and paste it into
the bug report.  For a snippet template, see the
"<a href="http://dev.eclipse.org/viewcvs/index.cgi/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet1.java?rev=HEAD&amp;content-type=text/vnd.viewcvs-markup">Hello World</a>"
example.</p>

<p>Note that the examples here are often edited for brevity rather than
completeness. They are intended to guide the reader towards the correct
solution, rather than be finished products.  These snippets are tested
against the HEAD stream and may sometimes reference new API or require
bug fixes from there.</p>

<p>To run a snippet, simply <a href="eclipse.php">set up SWT in your
Eclipse workspace</a>, create new Java project that depends on SWT, and
paste the example into a new Java class.
<a href="instructions.php">More detailed instructions</a> are
available.</p>

  <ul>
    <li><b>"<a href="http://dev.eclipse.org/viewcvs/index.cgi/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet1.java?rev=HEAD&amp;content-type=text/vnd.viewcvs-markup">Hello World</a>"</b>
      <p></p>

    <li><b>Accessibility</b>
      <ul>
        <li> <a href="http://dev.eclipse.org/viewcvs/index.cgi/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet162.java?rev=HEAD&amp;content-type=text/vnd.viewcvs-markup">an accessible listener to provide state information</a></li>
        <li> <a href="http://dev.eclipse.org/viewcvs/index.cgi/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet164.java?rev=HEAD&amp;content-type=text/vnd.viewcvs-markup">override the text that is spoken for a native Button</a></li>
      </ul>
      <p></p>

    <li><a name="browser"><b>Browser</b></a>
      <ul>
        <li> <a href="http://dev.eclipse.org/viewcvs/index.cgi/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet148.java?rev=HEAD&amp;content-type=text/vnd.viewcvs-markup">check if the browser is available or not</a></li>
        <li> <a href="http://dev.eclipse.org/viewcvs/index.cgi/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet128.java?rev=HEAD&amp;content-type=text/vnd.viewcvs-markup">bring up a browser (single window)</a></li>
        <li> <a href="http://dev.eclipse.org/viewcvs/index.cgi/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet173.java?rev=HEAD&amp;content-type=text/vnd.viewcvs-markup">bring up a browser (support for new windows and pop-up filter)</a></li>
        <li> <a href="http://dev.eclipse.org/viewcvs/index.cgi/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet136.java?rev=HEAD&amp;content-type=text/vnd.viewcvs-markup">render HTML from memory</a></li>
        <li> <a href="http://dev.eclipse.org/viewcvs/index.cgi/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet137.java?rev=HEAD&amp;content-type=text/vnd.viewcvs-markup">render HTML that includes relative links from memory</a></li>
        <li> <a href="http://dev.eclipse.org/viewcvs/index.cgi/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet161.java?rev=HEAD&amp;content-type=text/vnd.viewcvs-markup">modify DOM (execute javascript)</a></li>
        <li> <a href="http://dev.eclipse.org/viewcvs/index.cgi/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet160.java?rev=HEAD&amp;content-type=text/vnd.viewcvs-markup">query DOM node value</a></li>
        <li> <a href="http://dev.eclipse.org/viewcvs/index.cgi/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet159.java?rev=HEAD&amp;content-type=text/vnd.viewcvs-markup">modify HTML title tag</a></li>
      </ul>
      <p></p>

    <li><a name="busyindicator"><b>BusyIndicator</b></a>
      <ul>
        <li> <a href="http://dev.eclipse.org/viewcvs/index.cgi/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet130.java?rev=HEAD&amp;content-type=text/vnd.viewcvs-markup">display busy cursor during long running task</a></li>
      </ul>
      <p></p>

    <li><a name="button"><b>Button</b></a>
      <ul>
        <li> <a href="http://dev.eclipse.org/viewcvs/index.cgi/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet108.java?rev=HEAD&amp;content-type=text/vnd.viewcvs-markup">set the default button</a></li>
        <li> <a href="http://dev.eclipse.org/viewcvs/index.cgi/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet169.java?rev=HEAD&amp;content-type=text/vnd.viewcvs-markup">make a toggle button have radio behavior</a></li>
      </ul>
      <p></p>

    <li><a name="canvas"><b>Canvas</b></a>
      <ul>
        <li> <a href="http://dev.eclipse.org/viewcvs/index.cgi/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet48.java?rev=HEAD&amp;content-type=text/vnd.viewcvs-markup">scroll an image (flicker free, no double buffering)</a></li>
        <li> <a href="http://dev.eclipse.org/viewcvs/index.cgi/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet21.java?rev=HEAD&amp;content-type=text/vnd.viewcvs-markup">implement tab traversal (behave like a tab group)</a></li>
      </ul>
      <p></p>

    <li><a name="caret"><b>Caret</b></a>
      <ul>
        <li> <a href="http://dev.eclipse.org/viewcvs/index.cgi/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet74.java?rev=HEAD&amp;content-type=text/vnd.viewcvs-markup">create a caret</a></li>
        <li> <a href="http://dev.eclipse.org/viewcvs/index.cgi/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet43.java?rev=HEAD&amp;content-type=text/vnd.viewcvs-markup">create a caret (using an image)</a></li>
      </ul>
      <p></p>

    <li><a name="clipboard"><b>Clipboard</b></a>
      <ul>
        <li> <a href="http://dev.eclipse.org/viewcvs/index.cgi/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet94.java?rev=HEAD&amp;content-type=text/vnd.viewcvs-markup">copy and paste data with the clipboard</a></li>
        <li> <a href="http://dev.eclipse.org/viewcvs/index.cgi/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet122.java?rev=HEAD&amp;content-type=text/vnd.viewcvs-markup">enable/disable menu depending on clipboard amp;content availability</a></li>
      </ul>
      <p></p>

    <li><a name="combo"><b>Combo</b></a>
      <ul>
        <li> <a href="http://dev.eclipse.org/viewcvs/index.cgi/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet26.java?rev=HEAD&amp;content-type=text/vnd.viewcvs-markup">create a combo box (non-editable)</a></li>
        <li> <a href="http://dev.eclipse.org/viewcvs/index.cgi/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet24.java?rev=HEAD&amp;content-type=text/vnd.viewcvs-markup">detect return in a combo box (default selelection)</a></li>
        <li> <a href="http://dev.eclipse.org/viewcvs/index.cgi/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet147.java?rev=HEAD&amp;content-type=text/vnd.viewcvs-markup">prevent CR from going to the default button</a></li>
      </ul>
      <p></p>

    <li><a name="composite"><b>Composite</b></a>
      <ul>
        <li> <a href="http://dev.eclipse.org/viewcvs/index.cgi/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet9.java?rev=HEAD&amp;content-type=text/vnd.viewcvs-markup">scroll a child control automatically</a></li>
        <li> <a href="http://dev.eclipse.org/viewcvs/index.cgi/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet75.java?rev=HEAD&amp;content-type=text/vnd.viewcvs-markup">set the tab traversal order of children</a></li>
        <li> <a href="http://dev.eclipse.org/viewcvs/index.cgi/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet98.java?rev=HEAD&amp;content-type=text/vnd.viewcvs-markup">create and dispose children of a composite</a></li>
        <li> <a href="http://dev.eclipse.org/viewcvs/index.cgi/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet115.java?rev=HEAD&amp;content-type=text/vnd.viewcvs-markup">force radio behavior on two different composites</a></li>
        <li> <a href="http://dev.eclipse.org/viewcvs/index.cgi/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet46.java?rev=HEAD&amp;content-type=text/vnd.viewcvs-markup">intercept mouse events (drag a button with the mouse)</a></li>
      </ul>
      <p></p>

    <li><a name="control"><b>Control</b></a>
      <ul>
        <li> <a href="http://dev.eclipse.org/viewcvs/index.cgi/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet14.java?rev=HEAD&amp;content-type=text/vnd.viewcvs-markup">detect mouse enter, exit and hover events</a></li>
        <li> <a href="http://dev.eclipse.org/viewcvs/index.cgi/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet127.java?rev=HEAD&amp;content-type=text/vnd.viewcvs-markup">prevent Tab from traversing out of a control</a></li>
        <li> <a href="http://dev.eclipse.org/viewcvs/index.cgi/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet25.java?rev=HEAD&amp;content-type=text/vnd.viewcvs-markup">print key state, code and character</a></li>
        <li> <a href="http://dev.eclipse.org/viewcvs/index.cgi/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet62.java?rev=HEAD&amp;content-type=text/vnd.viewcvs-markup">print mouse state and button (down, move, up)</a></li>
      </ul>
      <p></p>

    <li><a name="coolbar"><b>CoolBar</b></a>
      <ul>
        <li> <a href="http://dev.eclipse.org/viewcvs/index.cgi/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet20.java?rev=HEAD&amp;content-type=text/vnd.viewcvs-markup">create a cool bar</a></li>
        <li> <a href="http://dev.eclipse.org/viewcvs/index.cgi/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet150.java?rev=HEAD&amp;content-type=text/vnd.viewcvs-markup">create a cool bar (relayout when resized)</a></li>
        <li> <a href="http://dev.eclipse.org/viewcvs/index.cgi/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet140.java?rev=HEAD&amp;content-type=text/vnd.viewcvs-markup">drop-down a chevron menu containing hidden tool items</a></li>
      </ul>
      <p></p>

    <li><a name="ctabfolder"><b>CTabFolder, CTabItem</b></a>
      <ul>
        <li> <a href="http://dev.eclipse.org/viewcvs/index.cgi/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet82.java?rev=HEAD&amp;content-type=text/vnd.viewcvs-markup">prevent an item from closing</a></li>
        <li> <a href="http://dev.eclipse.org/viewcvs/index.cgi/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet165.java?rev=HEAD&amp;content-type=text/vnd.viewcvs-markup">min and max buttons, close button and image only on selected tab</a></li>
      </ul>
      <p></p>

    <li><a name="cursor"><b>Cursor</b></a>
      <ul>
        <li> <a href="http://dev.eclipse.org/viewcvs/index.cgi/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet44.java?rev=HEAD&amp;content-type=text/vnd.viewcvs-markup">set the hand cursor into a control</a></li>
        <li> <a href="http://dev.eclipse.org/viewcvs/index.cgi/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet92.java?rev=HEAD&amp;content-type=text/vnd.viewcvs-markup">create a cursor from a source and a mask</a></li>
        <li> <a href="http://dev.eclipse.org/viewcvs/index.cgi/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet119.java?rev=HEAD&amp;content-type=text/vnd.viewcvs-markup">create a color cursor from a source and a mask</a></li>
        <li> <a href="http://dev.eclipse.org/viewcvs/index.cgi/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet118.java?rev=HEAD&amp;content-type=text/vnd.viewcvs-markup">create a color cursor from an image file</a></li>
      </ul>
      <p></p>

    <li><a name="directorydialog"><b>DirectoryDialog</b></a>
      <ul>
        <li> <a href="http://dev.eclipse.org/viewcvs/index.cgi/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet33.java?rev=HEAD&amp;content-type=text/vnd.viewcvs-markup">prompt for a directory</a></li>
      </ul>
      <p></p>

    <li><a name="display"><b>Display</b></a>
      <ul>
        <li> <a href="http://dev.eclipse.org/viewcvs/index.cgi/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet60.java?rev=HEAD&amp;content-type=text/vnd.viewcvs-markup">create two one shot timers (5000 ms, 2000 ms)</a></li>
        <li> <a href="http://dev.eclipse.org/viewcvs/index.cgi/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet16.java?rev=HEAD&amp;content-type=text/vnd.viewcvs-markup">create one repeating timer (every 500 ms)</a></li>
        <li> <a href="http://dev.eclipse.org/viewcvs/index.cgi/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet68.java?rev=HEAD&amp;content-type=text/vnd.viewcvs-markup">stop a repeating timer when a button is pressed</a></li>
        <li> <a href="http://dev.eclipse.org/viewcvs/index.cgi/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet42.java?rev=HEAD&amp;content-type=text/vnd.viewcvs-markup">get the bounds and client area of a display</a></li>
        <li> <a href="http://dev.eclipse.org/viewcvs/index.cgi/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet7.java?rev=HEAD&amp;content-type=text/vnd.viewcvs-markup">fill a table from a background thread (sync exec)</a></li>
        <li> <a href="http://dev.eclipse.org/viewcvs/index.cgi/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet142.java?rev=HEAD&amp;content-type=text/vnd.viewcvs-markup">post mouse events (UI testing tools only)</a></li>
        <li> <a href="http://dev.eclipse.org/viewcvs/index.cgi/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet146.java?rev=HEAD&amp;content-type=text/vnd.viewcvs-markup">post key events (UI testing tools only)</a></li>
      </ul>
      <p></p>

    <li><a name="dnd"><b>Drag and Drop</b></a>
      <ul>
        <li> <a href="http://dev.eclipse.org/viewcvs/index.cgi/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet78.java?rev=HEAD&amp;content-type=text/vnd.viewcvs-markup">drag text between two labels</a></li>
        <li> <a href="http://dev.eclipse.org/viewcvs/index.cgi/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet91.java?rev=HEAD&amp;content-type=text/vnd.viewcvs-markup">drag leaf items in a tree</a></li>
        <li> <a href="http://dev.eclipse.org/viewcvs/index.cgi/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet79.java?rev=HEAD&amp;content-type=text/vnd.viewcvs-markup">define my own data transfer type</a></li>
        <li> <a href="http://dev.eclipse.org/viewcvs/index.cgi/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet84.java?rev=HEAD&amp;content-type=text/vnd.viewcvs-markup">define a default operation (in this example, Copy)</a></li>
        <li> <a href="http://dev.eclipse.org/viewcvs/index.cgi/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet83.java?rev=HEAD&amp;content-type=text/vnd.viewcvs-markup">determine data types available (win32 only)</a></li>
        <li> <a href="http://dev.eclipse.org/viewcvs/index.cgi/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet158.java?rev=HEAD&amp;content-type=text/vnd.viewcvs-markup">determine data types available (motif only)</a></li>
        <li> <a href="http://dev.eclipse.org/viewcvs/index.cgi/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet185.java?rev=HEAD&amp;content-type=text/vnd.viewcvs-markup">Dropped data type depends on target item in table</a></li>
      </ul>
      <p></p>

    <li><a name="filedialog"><b>FileDialog</b></a>
      <ul>
        <li> <a href="http://dev.eclipse.org/viewcvs/index.cgi/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet72.java?rev=HEAD&amp;content-type=text/vnd.viewcvs-markup">prompt for a file name (to save)</a></li>
      </ul>
      <p></p>

    <li><a name="font"><b>Font</b></a>
      <ul>
        <li> <a href="http://dev.eclipse.org/viewcvs/index.cgi/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet100.java?rev=HEAD&amp;content-type=text/vnd.viewcvs-markup">create a large font for use by a text widget</a></li>
      </ul>
      <p></p>

    <li><a name="formlayout"><b>FormLayout</b></a>
      <ul>
        <li> <a href="http://dev.eclipse.org/viewcvs/index.cgi/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet65.java?rev=HEAD&amp;content-type=text/vnd.viewcvs-markup">create a simple dialog using form layout</a></li>
        <li> <a href="http://dev.eclipse.org/viewcvs/index.cgi/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet69.java?rev=HEAD&amp;content-type=text/vnd.viewcvs-markup">center a label and single line text using a form layout</a></li>
        <li> <a href="http://dev.eclipse.org/viewcvs/index.cgi/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet71.java?rev=HEAD&amp;content-type=text/vnd.viewcvs-markup">create a simple OK/CANCEL dialog using form layout</a></li>
      </ul>
      <p></p>

    <li><a name="gc"><b>GC</b></a>
      <ul>
        <li> <a href="http://dev.eclipse.org/viewcvs/index.cgi/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet13.java?rev=HEAD&amp;content-type=text/vnd.viewcvs-markup">draw a thick line</a></li>
        <li> <a href="http://dev.eclipse.org/viewcvs/index.cgi/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet93.java?rev=HEAD&amp;content-type=text/vnd.viewcvs-markup">measure a string</a></li>
        <li> <a href="http://dev.eclipse.org/viewcvs/index.cgi/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet66.java?rev=HEAD&amp;content-type=text/vnd.viewcvs-markup">implement a simple scribble program</a></li>
        <li> <a href="http://dev.eclipse.org/viewcvs/index.cgi/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet70.java?rev=HEAD&amp;content-type=text/vnd.viewcvs-markup">create an icon (in memory)</a></li>
        <li> <a href="http://dev.eclipse.org/viewcvs/index.cgi/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet95.java?rev=HEAD&amp;content-type=text/vnd.viewcvs-markup">capture a widget image with a GC</a></li>
        <li> <a href="http://dev.eclipse.org/viewcvs/index.cgi/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet168.java?rev=HEAD&amp;content-type=text/vnd.viewcvs-markup">draw lines with different cap and join styles</a></li>
        <li> <a href="http://dev.eclipse.org/viewcvs/index.cgi/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet10.java?rev=HEAD&amp;content-type=text/vnd.viewcvs-markup">drawing with transformations, paths and alpha blending</a></li>
      </ul>
      <p></p>

    <li><a name="gridlayout"><b>GridLayout</b></a>
      <ul>
        <li> <a href="http://dev.eclipse.org/viewcvs/index.cgi/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet172.java?rev=HEAD&amp;content-type=text/vnd.viewcvs-markup">align widgets in rows and columns</a></li>
        <li> <a href="http://dev.eclipse.org/viewcvs/index.cgi/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet6.java?rev=HEAD&amp;content-type=text/vnd.viewcvs-markup">insert widgets into a grid layout</a></li>
        <li> <a href="http://dev.eclipse.org/viewcvs/index.cgi/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet175.java?rev=HEAD&amp;content-type=text/vnd.viewcvs-markup">exclude an invisible widget from a grid layout</a></li>
      </ul>
      <p></p>

    <li><a name="image"><b>Image</b></a>
      <ul>
        <li> <a href="http://dev.eclipse.org/viewcvs/index.cgi/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet112.java?rev=HEAD&amp;content-type=text/vnd.viewcvs-markup">display an image in a group</a></li>
        <li> <a href="http://dev.eclipse.org/viewcvs/index.cgi/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet139.java?rev=HEAD&amp;content-type=text/vnd.viewcvs-markup">rotate and flip an image</a></li>
        <li> <a href="http://dev.eclipse.org/viewcvs/index.cgi/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet141.java?rev=HEAD&amp;content-type=text/vnd.viewcvs-markup">display an animated GIF</a></li>
        <li> <a href="http://dev.eclipse.org/viewcvs/index.cgi/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet194.java?rev=HEAD&amp;content-type=text/vnd.viewcvs-markup">write an animated GIF</a></li>
      </ul>
      <p></p>

    <li><a name="label"><b>Label</b></a>
      <ul>
        <li> <a href="http://dev.eclipse.org/viewcvs/index.cgi/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet34.java?rev=HEAD&amp;content-type=text/vnd.viewcvs-markup">create a label (with an image)</a></li>
        <li> <a href="http://dev.eclipse.org/viewcvs/index.cgi/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet37.java?rev=HEAD&amp;content-type=text/vnd.viewcvs-markup">create a label (a separator)</a></li>
      </ul>
      <p></p>

    <li><a name="link"><b>Link</b></a>
      <ul>
        <li> <a href="http://dev.eclipse.org/viewcvs/index.cgi/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet182.java?rev=HEAD&amp;content-type=text/vnd.viewcvs-markup">create a link widget</a></li>
        <li> <a href="http://dev.eclipse.org/viewcvs/index.cgi/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet183.java?rev=HEAD&amp;content-type=text/vnd.viewcvs-markup">detect selection events in a link widget</a></li>
      </ul>
      <p></p>

    <li><a name="list"><b>List</b></a>
      <ul>
        <li> <a href="http://dev.eclipse.org/viewcvs/index.cgi/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet59.java?rev=HEAD&amp;content-type=text/vnd.viewcvs-markup">print selected items in a list</a></li>
      </ul>
      <p></p>

    <li><a name="menu"><b>Menu</b></a>
      <ul>
        <li> <a href="http://dev.eclipse.org/viewcvs/index.cgi/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet29.java?rev=HEAD&amp;content-type=text/vnd.viewcvs-markup">create a bar and pull down menu (accelerators, mnemonics) </a></li>
        <li> <a href="http://dev.eclipse.org/viewcvs/index.cgi/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet40.java?rev=HEAD&amp;content-type=text/vnd.viewcvs-markup">create a popup menu (set in multiple controls)</a></li>
        <li> <a href="http://dev.eclipse.org/viewcvs/index.cgi/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet89.java?rev=HEAD&amp;content-type=text/vnd.viewcvs-markup">create a menu with radio items</a></li>
        <li> <a href="http://dev.eclipse.org/viewcvs/index.cgi/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet73.java?rev=HEAD&amp;content-type=text/vnd.viewcvs-markup">enable menu items dynamically (when menu shown)</a></li>
        <li> <a href="http://dev.eclipse.org/viewcvs/index.cgi/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet97.java?rev=HEAD&amp;content-type=text/vnd.viewcvs-markup">fill a menu dynamically (when menu shown)</a></li>
        <li> <a href="http://dev.eclipse.org/viewcvs/index.cgi/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet131.java?rev=HEAD&amp;content-type=text/vnd.viewcvs-markup">show a popup menu (wait for it to close)</a></li>
        <li> <a href="http://dev.eclipse.org/viewcvs/index.cgi/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet152.java?rev=HEAD&amp;content-type=text/vnd.viewcvs-markup">update a status line when an item is armed</a></li>
        <li> <a href="http://dev.eclipse.org/viewcvs/index.cgi/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet178.java?rev=HEAD&amp;content-type=text/vnd.viewcvs-markup">access About, Preferences and Quit menus on carbon</a></li>
      </ul>
      <p></p>

    <li><a name="monitor"><b>Monitor</b></a>
      <ul>
        <li> <a href="http://dev.eclipse.org/viewcvs/index.cgi/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet120.java?rev=HEAD&amp;content-type=text/vnd.viewcvs-markup">center a shell on the primary monitor</a></li>
      </ul>
      <p></p>

    <li><a name="ole"><b>OLE and ActiveX</b></a>
      <ul>
        <li> <a href="http://dev.eclipse.org/viewcvs/index.cgi/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet123.java?rev=HEAD&amp;content-type=text/vnd.viewcvs-markup">get events from IE control</a></li>
        <li> <a href="http://dev.eclipse.org/viewcvs/index.cgi/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet81.java?rev=HEAD&amp;content-type=text/vnd.viewcvs-markup">browse the typelibinfo for a program id</a></li>
        <li> <a href="http://dev.eclipse.org/viewcvs/index.cgi/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet157.java?rev=HEAD&amp;content-type=text/vnd.viewcvs-markup">embed Word in an applet</a></li>
        <li> <a href="http://dev.eclipse.org/viewcvs/index.cgi/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet186.java?rev=HEAD&amp;content-type=text/vnd.viewcvs-markup">reading and writing to a SAFEARRAY</a></li>
        <li> <a href="http://dev.eclipse.org/viewcvs/index.cgi/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet187.java?rev=HEAD&amp;content-type=text/vnd.viewcvs-markup">execute a script function that exists on a web page</a></li>
      </ul>
      <p></p>

    <li><a name="opengl"><b>OpenGL</b></a>
      <ul>
        <li> <a href="http://dev.eclipse.org/viewcvs/index.cgi/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet174.java?rev=HEAD&amp;content-type=text/vnd.viewcvs-markup">draw a rectangle</a></li>
      </ul>
      <p></p>

    <li><a name="printing"><b>Printing</b></a>
      <ul>
        <li> <a href="http://dev.eclipse.org/viewcvs/index.cgi/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet132.java?rev=HEAD&amp;content-type=text/vnd.viewcvs-markup">print "Hello World!" in black, outlined in red, to default printer</a></li>
        <li> <a href="http://dev.eclipse.org/viewcvs/index.cgi/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet133.java?rev=HEAD&amp;content-type=text/vnd.viewcvs-markup">print text to printer, with word wrap and pagination</a></li>
      </ul>
      <p></p>

    <li><a name="program"><b>Program</b></a>
      <ul>
        <li> <a href="http://dev.eclipse.org/viewcvs/index.cgi/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet32.java?rev=HEAD&amp;content-type=text/vnd.viewcvs-markup">find the icon of the program that edits .bmp files</a></li>
        <li> <a href="http://dev.eclipse.org/viewcvs/index.cgi/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet105.java?rev=HEAD&amp;content-type=text/vnd.viewcvs-markup">invoke an external batch file</a></li>
        <li> <a href="http://dev.eclipse.org/viewcvs/index.cgi/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet30.java?rev=HEAD&amp;content-type=text/vnd.viewcvs-markup">invoke the system text editor on autoexec.bat</a></li>
      </ul>
      <p></p>

    <li><a name="progressbar"><b>ProgressBar</b></a>
      <ul>
        <li> <a href="http://dev.eclipse.org/viewcvs/index.cgi/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet57.java?rev=HEAD&amp;content-type=text/vnd.viewcvs-markup">update a progress bar (from the UI thread)</a></li>
        <li> <a href="http://dev.eclipse.org/viewcvs/index.cgi/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet56.java?rev=HEAD&amp;content-type=text/vnd.viewcvs-markup">update a progress bar (from another thread)</a></li>
      </ul>
      <p></p>

    <li><a name="rowlayout"><b>RowLayout</b></a>
      <ul>
        <li> <a href="http://dev.eclipse.org/viewcvs/index.cgi/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet176.java?rev=HEAD&amp;content-type=text/vnd.viewcvs-markup">Lay out widgets in a row</a></li>
        <li> <a href="http://dev.eclipse.org/viewcvs/index.cgi/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet177.java?rev=HEAD&amp;content-type=text/vnd.viewcvs-markup">Lay out widgets in a column</a></li>
      </ul>
      <p></p>

    <li><a name="sash"><b>Sash</b></a>
      <ul>
        <li> <a href="http://dev.eclipse.org/viewcvs/index.cgi/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet54.java?rev=HEAD&amp;content-type=text/vnd.viewcvs-markup">create a sash (allow it to be moved)</a></li>
        <li> <a href="http://dev.eclipse.org/viewcvs/index.cgi/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet107.java?rev=HEAD&amp;content-type=text/vnd.viewcvs-markup">implement a simple splitter (with a 20 pixel limit)</a></li>
      </ul>
      <p></p>

    <li><a name="sashform"><b>SashForm</b></a>
      <ul>
        <li> <a href="http://dev.eclipse.org/viewcvs/index.cgi/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet109.java?rev=HEAD&amp;content-type=text/vnd.viewcvs-markup">create a sash form with three children</a></li>
      </ul>
      <p></p>

    <li><a name="scale"><b>Scale</b></a>
      <ul>
        <li> <a href="http://dev.eclipse.org/viewcvs/index.cgi/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet45.java?rev=HEAD&amp;content-type=text/vnd.viewcvs-markup">create a scale (maximum 40, page increment 5)</a></li>
      </ul>
      <p></p>

    <li><a name="scrolledcomposite"><b>ScrolledComposite</b></a>
      <ul>
        <li> <a href="http://dev.eclipse.org/viewcvs/index.cgi/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet5.java?rev=HEAD&amp;content-type=text/vnd.viewcvs-markup">scroll a control in a scrolled composite</a></li>
        <li> <a href="http://dev.eclipse.org/viewcvs/index.cgi/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet166.java?rev=HEAD&amp;content-type=text/vnd.viewcvs-markup">create a ScrolledComposite with wrapping amp;content</a></li>
        <li> <a href="http://dev.eclipse.org/viewcvs/index.cgi/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet167.java?rev=HEAD&amp;content-type=text/vnd.viewcvs-markup">create two ScrolledComposites that scroll in tandem</a></li>
        <li> <a href="http://dev.eclipse.org/viewcvs/index.cgi/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet188.java?rev=HEAD&amp;content-type=text/vnd.viewcvs-markup">Scroll widgets into view when they get focus</a></li>
      </ul>
      <p></p>

    <li><a name="shell"><b>Shell</b></a>
      <ul>
        <li> <a href="http://dev.eclipse.org/viewcvs/index.cgi/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet50.java?rev=HEAD&amp;content-type=text/vnd.viewcvs-markup">create a dialog shell</a></li>
        <li> <a href="http://dev.eclipse.org/viewcvs/index.cgi/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet63.java?rev=HEAD&amp;content-type=text/vnd.viewcvs-markup">create a dialog shell (prompt for a value)</a></li>
        <li> <a href="http://dev.eclipse.org/viewcvs/index.cgi/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet104.java?rev=HEAD&amp;content-type=text/vnd.viewcvs-markup">create a splash screen</a></li>
        <li> <a href="http://dev.eclipse.org/viewcvs/index.cgi/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet99.java?rev=HEAD&amp;content-type=text/vnd.viewcvs-markup">prevent a shell from closing (prompt the user)</a></li>
        <li> <a href="http://dev.eclipse.org/viewcvs/index.cgi/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet4.java?rev=HEAD&amp;content-type=text/vnd.viewcvs-markup">prevent escape from closing a dialog</a></li>
        <li> <a href="http://dev.eclipse.org/viewcvs/index.cgi/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet27.java?rev=HEAD&amp;content-type=text/vnd.viewcvs-markup">open a shell minimized (iconified)</a></li>
        <li> <a href="http://dev.eclipse.org/viewcvs/index.cgi/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet28.java?rev=HEAD&amp;content-type=text/vnd.viewcvs-markup">open a shell maximized (full screen)</a></li>
        <li> <a href="http://dev.eclipse.org/viewcvs/index.cgi/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet134.java?rev=HEAD&amp;content-type=text/vnd.viewcvs-markup">create a non-rectangular window</a></li>
        <li> <a href="http://dev.eclipse.org/viewcvs/index.cgi/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet138.java?rev=HEAD&amp;content-type=text/vnd.viewcvs-markup">set icons with different resolutions</a></li>
        <li> <a href="http://dev.eclipse.org/viewcvs/index.cgi/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet180.java?rev=HEAD&amp;content-type=text/vnd.viewcvs-markup">emulate transparent shell</a></li>
      </ul>
      <p></p>

    <li><a name="slider"><b>Slider</b></a>
      <ul>
        <li> <a href="http://dev.eclipse.org/viewcvs/index.cgi/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet17.java?rev=HEAD&amp;content-type=text/vnd.viewcvs-markup">print scroll event details</a></li>
      </ul>
      <p></p>

    <li><a name="spinner"><b>Spinner</b></a>
      <ul>
        <li> <a href="http://dev.eclipse.org/viewcvs/index.cgi/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet184.java?rev=HEAD&amp;content-type=text/vnd.viewcvs-markup">create and initialize a spinner widget</a></li>
        <li> <a href="http://dev.eclipse.org/viewcvs/index.cgi/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet190.java?rev=HEAD&amp;content-type=text/vnd.viewcvs-markup">use floats in a spinner widget</a></li>
      </ul>
      <p></p>

    <li><a name="styledtext"><b>StyledText</b></a>
      <ul>
        <li> <a href="http://dev.eclipse.org/viewcvs/index.cgi/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet163.java?rev=HEAD&amp;content-type=text/vnd.viewcvs-markup">change font style, foreground and background colors of StyledText</a></li>
        <li> <a href="http://dev.eclipse.org/viewcvs/index.cgi/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet189.java?rev=HEAD&amp;content-type=text/vnd.viewcvs-markup">underline and strike through text</a></li>
      </ul>
      <p></p>

    <li><a name="awt"><b>Swing/AWT</b></a>
      <ul>
        <li> <a href="http://dev.eclipse.org/viewcvs/index.cgi/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet135.java?rev=HEAD&amp;content-type=text/vnd.viewcvs-markup">embed Swing/AWT in SWT</a></li>
        <li> <a href="http://dev.eclipse.org/viewcvs/index.cgi/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet154.java?rev=HEAD&amp;content-type=text/vnd.viewcvs-markup">embed a JTable in SWT (no flickering)</a></li>
        <li> <a href="http://dev.eclipse.org/viewcvs/index.cgi/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet155.java?rev=HEAD&amp;content-type=text/vnd.viewcvs-markup">draw an X using AWT Graphics</a></li>
        <li> <a href="http://dev.eclipse.org/viewcvs/index.cgi/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet156.java?rev=HEAD&amp;content-type=text/vnd.viewcvs-markup">convert between SWT Image and AWT BufferedImage</a></li>
      </ul>
      <p></p>

    <li><a name="tabfolder"><b>TabFolder, TabItem</b></a>
      <ul>
        <li> <a href="http://dev.eclipse.org/viewcvs/index.cgi/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet76.java?rev=HEAD&amp;content-type=text/vnd.viewcvs-markup">create a tab folder (six pages)</a></li>
      </ul>
      <p></p>

    <li><a name="table"><b>Table, TableItem, TableColumn</b></a>
      <ul>
        <li> <a href="http://dev.eclipse.org/viewcvs/index.cgi/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet151.java?rev=HEAD&amp;content-type=text/vnd.viewcvs-markup">add 1000 sorted entries to a virtual table every 500 ms</a></li>
        <li> <a href="http://dev.eclipse.org/viewcvs/index.cgi/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet129.java?rev=HEAD&amp;content-type=text/vnd.viewcvs-markup">color cells and rows in table</a></li>
        <li> <a href="http://dev.eclipse.org/viewcvs/index.cgi/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet35.java?rev=HEAD&amp;content-type=text/vnd.viewcvs-markup">create a table (no columns, no headers)</a></li>
        <li> <a href="http://dev.eclipse.org/viewcvs/index.cgi/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet38.java?rev=HEAD&amp;content-type=text/vnd.viewcvs-markup">create a table (columns, headers, lines)</a></li>
        <li> <a href="http://dev.eclipse.org/viewcvs/index.cgi/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet144.java?rev=HEAD&amp;content-type=text/vnd.viewcvs-markup">create a table with 1,000,000 items (lazy)</a></li>
        <li> <a href="http://dev.eclipse.org/viewcvs/index.cgi/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet7.java?rev=HEAD&amp;content-type=text/vnd.viewcvs-markup">create a table (lazy with a thread)</a></li>
        <li> <a href="http://dev.eclipse.org/viewcvs/index.cgi/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet113.java?rev=HEAD&amp;content-type=text/vnd.viewcvs-markup">detect a selection or check event in a table (SWT.CHECK)</a></li>
        <li> <a href="http://dev.eclipse.org/viewcvs/index.cgi/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet3.java?rev=HEAD&amp;content-type=text/vnd.viewcvs-markup">find a table cell from mouse down (SWT.FULL_SELECTION)</a></li>
        <li> <a href="http://dev.eclipse.org/viewcvs/index.cgi/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet110.java?rev=HEAD&amp;content-type=text/vnd.viewcvs-markup">find a table cell from mouse down (works for any table style)</a></li>
        <li> <a href="http://dev.eclipse.org/viewcvs/index.cgi/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet101.java?rev=HEAD&amp;content-type=text/vnd.viewcvs-markup">insert a table item (at an index)</a></li>
        <li> <a href="http://dev.eclipse.org/viewcvs/index.cgi/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet106.java?rev=HEAD&amp;content-type=text/vnd.viewcvs-markup">insert a table column (at an index)</a></li>
        <li> <a href="http://dev.eclipse.org/viewcvs/index.cgi/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet181.java?rev=HEAD&amp;content-type=text/vnd.viewcvs-markup">make columns reorderable by dragging</a></li>
        <li> <a href="http://dev.eclipse.org/viewcvs/index.cgi/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet126.java?rev=HEAD&amp;content-type=text/vnd.viewcvs-markup">place arbitrary controls in a table</a></li>
        <li> <a href="http://dev.eclipse.org/viewcvs/index.cgi/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet64.java?rev=HEAD&amp;content-type=text/vnd.viewcvs-markup">print selected items in a table</a></li>
        <li> <a href="http://dev.eclipse.org/viewcvs/index.cgi/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet53.java?rev=HEAD&amp;content-type=text/vnd.viewcvs-markup">remove selected items</a></li>
        <li> <a href="http://dev.eclipse.org/viewcvs/index.cgi/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet77.java?rev=HEAD&amp;content-type=text/vnd.viewcvs-markup">resize columns as table resizes</a></li>
        <li> <a href="http://dev.eclipse.org/viewcvs/index.cgi/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet51.java?rev=HEAD&amp;content-type=text/vnd.viewcvs-markup">scroll a table (set the top index)</a></li>
        <li> <a href="http://dev.eclipse.org/viewcvs/index.cgi/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet52.java?rev=HEAD&amp;content-type=text/vnd.viewcvs-markup">select an index (select and scroll)</a></li>
        <li> <a href="http://dev.eclipse.org/viewcvs/index.cgi/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet2.java?rev=HEAD&amp;content-type=text/vnd.viewcvs-markup">sort a table by column</a></li>
        <li> <a href="http://dev.eclipse.org/viewcvs/index.cgi/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet192.java?rev=HEAD&amp;content-type=text/vnd.viewcvs-markup">sort a table by column (virtual table, sort indicator)</a></li>
        <li> <a href="http://dev.eclipse.org/viewcvs/index.cgi/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet103.java?rev=HEAD&amp;content-type=text/vnd.viewcvs-markup">update table item text</a></li>
      </ul>
      <p></p>

    <li><a name="tablecursor"><b>TableCursor</b></a>
      <ul>
        <li> <a href="http://dev.eclipse.org/viewcvs/index.cgi/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet96.java?rev=HEAD&amp;content-type=text/vnd.viewcvs-markup">navigate a table cells with arrow keys</a></li>
      </ul>
      <p></p>

    <li><a name="tableeditor"><b>TableEditor</b></a>
      <ul>
        <li> <a href="http://dev.eclipse.org/viewcvs/index.cgi/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet88.java?rev=HEAD&amp;content-type=text/vnd.viewcvs-markup">edit the text of a table item (in place)</a></li>
        <li> <a href="http://dev.eclipse.org/viewcvs/index.cgi/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet124.java?rev=HEAD&amp;content-type=text/vnd.viewcvs-markup">edit a cell in a table (in place, fancy)</a></li>
        <li> <a href="http://dev.eclipse.org/viewcvs/index.cgi/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet149.java?rev=HEAD&amp;content-type=text/vnd.viewcvs-markup">place a progress bar in a table</a></li>
      </ul>
      <p></p>

    <li><a name="text"><b>Text</b></a>
      <ul>
        <li> <a href="http://dev.eclipse.org/viewcvs/index.cgi/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet117.java?rev=HEAD&amp;content-type=text/vnd.viewcvs-markup">add a select all menu item to the control</a></li>
        <li> <a href="http://dev.eclipse.org/viewcvs/index.cgi/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet24.java?rev=HEAD&amp;content-type=text/vnd.viewcvs-markup">detect CR in a text control (default selelection)</a></li>
        <li> <a href="http://dev.eclipse.org/viewcvs/index.cgi/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet116.java?rev=HEAD&amp;content-type=text/vnd.viewcvs-markup">prevent CR from going to the default button</a></li>
        <li> <a href="http://dev.eclipse.org/viewcvs/index.cgi/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet121.java?rev=HEAD&amp;content-type=text/vnd.viewcvs-markup">prompt for a password (set the echo character)</a></li>
        <li> <a href="http://dev.eclipse.org/viewcvs/index.cgi/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet55.java?rev=HEAD&amp;content-type=text/vnd.viewcvs-markup">resize a text control (show about 10 characters)</a></li>
        <li> <a href="http://dev.eclipse.org/viewcvs/index.cgi/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet22.java?rev=HEAD&amp;content-type=text/vnd.viewcvs-markup">select all the text in the control</a></li>
        <li> <a href="http://dev.eclipse.org/viewcvs/index.cgi/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet11.java?rev=HEAD&amp;content-type=text/vnd.viewcvs-markup">set the selection (i-beam)</a></li>
        <li> <a href="http://dev.eclipse.org/viewcvs/index.cgi/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet12.java?rev=HEAD&amp;content-type=text/vnd.viewcvs-markup">set the selection (start, end)</a></li>
        <li> <a href="http://dev.eclipse.org/viewcvs/index.cgi/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet19.java?rev=HEAD&amp;content-type=text/vnd.viewcvs-markup">verify input (only allow digits)</a></li>
        <li> <a href="http://dev.eclipse.org/viewcvs/index.cgi/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet179.java?rev=HEAD&amp;content-type=text/vnd.viewcvs-markup">verify input in a template (YYYY/MM/DD)</a></li>
        <li> <a href="http://dev.eclipse.org/viewcvs/index.cgi/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet191.java?rev=HEAD&amp;content-type=text/vnd.viewcvs-markup">detect when the user scrolls a text control</a></li>
      </ul>
      <p></p>

    <li><a name="textlayout"><b>TextLayout, TextStyle</b></a>
      <ul>
        <li> <a href="http://dev.eclipse.org/viewcvs/index.cgi/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet145.java?rev=HEAD&amp;content-type=text/vnd.viewcvs-markup">draw internationalized styled text on a shell</a></li>
        <li> <a href="http://dev.eclipse.org/viewcvs/index.cgi/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet197.java?rev=HEAD&amp;content-type=text/vnd.viewcvs-markup">draw dynamically wrapped text on a shell</a></li>
      </ul>
      <p></p>

    <li><a name="toolbar"><b>ToolBar, ToolItem</b></a>
      <ul>
        <li> <a href="http://dev.eclipse.org/viewcvs/index.cgi/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet18.java?rev=HEAD&amp;content-type=text/vnd.viewcvs-markup">create a tool bar (text)</a></li>
        <li> <a href="http://dev.eclipse.org/viewcvs/index.cgi/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet36.java?rev=HEAD&amp;content-type=text/vnd.viewcvs-markup">create a flat tool bar (images)</a></li>
        <li> <a href="http://dev.eclipse.org/viewcvs/index.cgi/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet47.java?rev=HEAD&amp;content-type=text/vnd.viewcvs-markup">create tool bar (normal, hot and disabled images)</a></li>
        <li> <a href="http://dev.eclipse.org/viewcvs/index.cgi/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet49.java?rev=HEAD&amp;content-type=text/vnd.viewcvs-markup">create tool bar (wrap on resize)</a></li>
        <li> <a href="http://dev.eclipse.org/viewcvs/index.cgi/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet58.java?rev=HEAD&amp;content-type=text/vnd.viewcvs-markup">place a combo box in a tool bar</a></li>
        <li> <a href="http://dev.eclipse.org/viewcvs/index.cgi/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet67.java?rev=HEAD&amp;content-type=text/vnd.viewcvs-markup">place a drop down menu in a tool bar</a></li>
        <li> <a href="http://dev.eclipse.org/viewcvs/index.cgi/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet153.java?rev=HEAD&amp;content-type=text/vnd.viewcvs-markup">update a status line when the pointer enters a ToolItem</a></li>
      </ul>
      <p></p>

    <li><a name="tooltips"><b>Tool Tips</b></a>
      <ul>
        <li> <a href="http://dev.eclipse.org/viewcvs/index.cgi/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet41.java?rev=HEAD&amp;content-type=text/vnd.viewcvs-markup">create tool tips for a tab folder, tool bar and control</a></li>
        <li> <a href="http://dev.eclipse.org/viewcvs/index.cgi/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet125.java?rev=HEAD&amp;content-type=text/vnd.viewcvs-markup">create fake tool tips for items in a table</a></li>
      </ul>
      <p></p>

    <li><a name="tracker"><b>Tracker</b></a>
      <ul>
        <li> <a href="http://dev.eclipse.org/viewcvs/index.cgi/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet23.java?rev=HEAD&amp;content-type=text/vnd.viewcvs-markup">create a tracker (drag on mouse down)</a></li>
        <li> <a href="http://dev.eclipse.org/viewcvs/index.cgi/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet31.java?rev=HEAD&amp;content-type=text/vnd.viewcvs-markup">create a tracker (drag when "torn off")</a></li>
      </ul>
      <p></p>

    <li><a name="tray"><b>Tray, TrayItem</b></a>
      <ul>
        <li> <a href="http://dev.eclipse.org/viewcvs/index.cgi/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet143.java?rev=HEAD&amp;content-type=text/vnd.viewcvs-markup">place a popup menu on the system tray</a></li>
      </ul>
      <p></p>

    <li><a name="tree"><b>Tree</b></a>
      <ul>
        <li> <a href="http://dev.eclipse.org/viewcvs/index.cgi/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet15.java?rev=HEAD&amp;content-type=text/vnd.viewcvs-markup">create a tree</a></li>
        <li> <a href="http://dev.eclipse.org/viewcvs/index.cgi/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet8.java?rev=HEAD&amp;content-type=text/vnd.viewcvs-markup">create a tree (lazy)</a></li>
        <li> <a href="http://dev.eclipse.org/viewcvs/index.cgi/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet114.java?rev=HEAD&amp;content-type=text/vnd.viewcvs-markup">detect a selection or check event in a tree (SWT.CHECK)</a></li>          
        <li> <a href="http://dev.eclipse.org/viewcvs/index.cgi/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet102.java?rev=HEAD&amp;content-type=text/vnd.viewcvs-markup">insert a tree item (at an index)</a></li>
        <li> <a href="http://dev.eclipse.org/viewcvs/index.cgi/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet61.java?rev=HEAD&amp;content-type=text/vnd.viewcvs-markup">print selected items in a tree</a></li>
        <li> <a href="http://dev.eclipse.org/viewcvs/index.cgi/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet80.java?rev=HEAD&amp;content-type=text/vnd.viewcvs-markup">limit selection to items that match a pattern</a></li>
        <li> <a href="http://dev.eclipse.org/viewcvs/index.cgi/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet90.java?rev=HEAD&amp;content-type=text/vnd.viewcvs-markup">detect mouse down in a tree item</a></li>
        <li> <a href="http://dev.eclipse.org/viewcvs/index.cgi/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet170.java?rev=HEAD&amp;content-type=text/vnd.viewcvs-markup">create a tree with columns</a></li>
        <li> <a href="http://dev.eclipse.org/viewcvs/index.cgi/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet193.java?rev=HEAD&amp;content-type=text/vnd.viewcvs-markup">make columns reorderable by dragging</a></li>
      </ul>
      <p></p>

    <li><a name="treeeditor"><b>TreeEditor</b></a>
      <ul>
        <li> <a href="http://dev.eclipse.org/viewcvs/index.cgi/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet111.java?rev=HEAD&amp;content-type=text/vnd.viewcvs-markup">edit the text of a tree item (in place, fancy)</a></li>
      </ul>
      <p></p>

    <li>... and lots more still to come. Keep checking back.
  </ul>
  
<h3>Snippets for Pocket PC</h3>
<ul>
    <li><b>"<a href="http://dev.eclipse.org/viewcvs/index.cgi/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet85.java?rev=HEAD&amp;content-type=text/vnd.viewcvs-markup">Hello World</a>"</b>
      <p></p>

    <li><b>Shell</b>
        <ul>
            <li> <a href="http://dev.eclipse.org/viewcvs/index.cgi/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet86.java?rev=HEAD&amp;content-type=text/vnd.viewcvs-markup">'Ok' button</a></li>
            <li> <a href="http://dev.eclipse.org/viewcvs/index.cgi/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet87.java?rev=HEAD&amp;content-type=text/vnd.viewcvs-markup">resize automatically as SIP is on or off</a></li>
        </ul>
</ul>
</table>
</body>
</html>