<?php require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/app.class.php");	require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/nav.class.php"); 	require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/menu.class.php"); 	$App 	= new App();	$Nav	= new Nav();	$Menu 	= new Menu();		include($App->getProjectCommon());

$pageTitle = "SWT Snippets";

ob_start();
?>
<div id="midcolumn">
<h1>SWT Snippets</h1>

<p>Snippets are minimal stand-alone programs that demonstrate specific
techniques or functionality.  Often a small example is the easiest way to
understand how to use a particular feature.
(If you are looking for large examples, like <em>ControlExample</em>, see the <a href="/swt/examples.php">SWT Examples</a>,
and if you are programming with JFace, you may find these <a href="http://wiki.eclipse.org/index.php/JFaceSnippets">JFace Snippets</a> useful).</p>

<p>Snippets also help isolate problems.  The best way to report an SWT
bug is to write your own snippet showing the problem and paste it into
the bug report.  For a snippet template, see the
"<a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet1.java">Hello World</a>"
example.</p>

<p>Note that the examples here are often edited for brevity rather than
completeness. They are intended to guide the reader towards the correct
solution, rather than be finished products.  These snippets are tested
against the HEAD stream and may sometimes reference new API or require
bug fixes from there.</p>

<p>To run a snippet, simply
<a href="/swt/eclipse.php">import SWT into your Eclipse workspace</a>,
create a new Java project that depends on SWT, copy the desired snippet to the clipboard,
and paste it into a new snippet class. (If you are using eclipse 3.2 M1 or earlier,
you need to create the class using the <i>New Class</i> wizard before pasting; but
since 3.2 M1 you can simply select your project and paste, and the class is created for you). 
Run by selecting the class and then selecting <i>Run &gt; Run As &gt; Java Application</i>.</p>

<p>To contribute a new snippet, 
<a href="https://bugs.eclipse.org/bugs/enter_bug.cgi?product=Platform&bug_severity=enhancement&component=SWT&short_desc=New%20Snippet%20Contribution%3A%20%5Bsummary%20here%5D&comment=Eclipse%20build%20id%20or%20SWT%20version%3A%20%5Bbuild%20id%20here%5D%0D%0A%0D%0APlatform%28s%29%20tested%20on%3A%20%5Blist%20platform%28s%29%20here%5D%0D%0A%0D%0ASnippet%20title%3A%20%5Bsnippet%20title%20or%20short%20description%20here%5D%0D%0A%0D%0ASnippet%20code%3A%20%5Bpaste%20snippet%20code%20here%5D">
create a snippet contribution report in Bugzilla</a>. Thanks in advance for your contribution!</p>

  <ul>
    <li><b>"<a name=helloworld href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet1.java">Hello World</a>"</b>
      <p></p>

    <li><a name="accessibility"><b>Accessibility</b></a>
      <ul>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet162.java">using an accessible listener to provide state information</a></li>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet164.java">provide text that will be spoken for an image button</a> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/eclipse.png">(eclipse.png)</a></li>
		<li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet291.java">give accessible names to a tree and its tree items</a></li>
		<li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet334.java">respond to text-based questions from an AT</a></li>
		<li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet340.java">tell a screen reader about updates to a non-focused descriptive area</a></li>
		<li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet350.java">use accessible relations to provide additional information to an AT</a></li>
		<li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet357.java">provide a way for an AT to set text attributes in a StyledText</a></li>
		<li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet363.java">declare a message area to be a "live region"</a></li>
      </ul>
      <p></p>

    <li><a name="browser"><b>Browser</b></a>
      <ul>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet148.java">check if the browser is available or not</a></li>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet128.java">bring up a browser (single window)</a></li>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet173.java">bring up a browser with pop-up blocker</a></li>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet270.java">bring up a browser with pop-up window support</a></li>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet136.java">render HTML from memory</a></li>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet137.java">render HTML that includes relative links from memory</a></li>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet327.java">render HTML from memory in response to a link click</a></li>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet303.java">listen for DOM mousedown events with JavaScript (SWT 3.4 and earlier)</a></li>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet362.java">listen for DOM mousedown events with JavaScript (SWT 3.5 and newer)</a></li>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet161.java">modify DOM (execute JavaScript)</a></li>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet160.java">query DOM node value (SWT 3.4 and earlier)</a></li>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet308.java">query DOM node value (SWT 3.5 and newer)</a></li>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet159.java">modify HTML title tag</a></li>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet317.java">provide credentials for a basic authentication challenge</a></li>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet307.java">call Java from JavaScript</a></li>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet326.java">close a Browser such that it can be cancelled by an onbeforeunload handler</a></li>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet330.java">send custom headers and post data with HTTP requests</a></li>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet351.java">WebKit in a browser</a></li>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet260.java">Mozilla in a browser</a></li>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet267.java">toggle a Mozilla Browser between Design mode and View mode</a></li>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet277.java">implement a custom download handler for a Mozilla Browser</a></li>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet306.java">show an HTML element-specific context menu in a Mozilla Browser</a></li>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet321.java">examine request and response headers in a Mozilla Browser</a></li>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet323.java">view DOM tree and edit node values in a Mozilla Browser</a></li>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet329.java">zoom HTML page content in a Mozilla Browser</a></li>
      </ul>
      <p></p>

    <li><a name="busyindicator"><b>BusyIndicator</b></a>
      <ul>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet130.java">display busy cursor during long running task</a></li>
      </ul>
      <p></p>

    <li><a name="button"><b>Button</b></a>
      <ul>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet108.java">set the default button</a></li>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet169.java">make a toggle button have radio behavior</a></li>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet224.java">implement radio behavior for setSelection()</a></li>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet206.java">a button with text and image</a></li>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet293.java">create a tri-state button</a></li>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet315.java">create a tri-state button (toggle three states)</a></li>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet294.java">create a non-rectangular button</a></li>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet345.java">create buttons with wrapped titles</a></li>
       </ul>
      <p></p>

    <li><a name="canvas"><b>Canvas</b></a>
      <ul>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet245.java">paint a circle in a canvas</a></li>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet48.java">scroll an image (flicker free, no double buffering)</a></li>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet21.java">implement tab traversal (behave like a tab group)</a></li>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet275.java">update a portion of a Canvas frequently</a></li>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet290.java">ignore 2nd mouse up event after double-click</a></li>
      </ul>
      <p></p>

    <li><a name="caret"><b>Caret</b></a>
      <ul>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet74.java">create a caret</a></li>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet43.java">create a caret (using an image)</a></li>
      </ul>
      <p></p>

    <li><a name="ccombo"><b>CCombo</b></a>
      <ul>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet39.java">create a ccombo</a></li>
      </ul>
      <p></p>

    <li><a name="clipboard"><b>Clipboard</b></a>
      <ul>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet94.java">copy and paste data with the clipboard</a></li>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet282.java">copy and paste image with the clipboard using ImageTransfer</a></li>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet122.java">enable/disable menu depending on clipboard content availability</a></li>
      </ul>
      <p></p>

    <li><a name="color"><b>Color and RGB</b></a>
      <ul>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet208.java">adjust hue, brightness and saturation of a color</a></li>
     </ul>
      <p></p>
      
    <li><a name="combo"><b>Combo</b></a>
      <ul>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet26.java">create a combo box (non-editable)</a></li>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet24.java">detect return in a combo box (default selection)</a></li>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet147.java">prevent CR from going to the default button</a></li>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet269.java">set the caret position within a combo's text</a></li>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet289.java">add a new number item to a combo box</a></li>
      </ul>
      <p></p>

    <li><a name="composite"><b>Composite</b></a>
      <ul>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet9.java">scroll a child control automatically</a></li>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet75.java">set the tab traversal order of children</a></li>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet98.java">create and dispose children of a composite</a></li>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet115.java">force radio behavior on two different composites</a></li>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet46.java">intercept mouse events (drag a button with the mouse)</a></li>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet237.java">inherit a background color or image</a></li>
      </ul>
      <p></p>

    <li><a name="control"><b>Control</b></a>
      <ul>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet14.java">detect mouse enter, exit and hover events</a></li>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet127.java">prevent Tab from traversing out of a control</a></li>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet247.java">allow a multi-line text to process the default button</a></li>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet338.java">perform custom traversals</a></li>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet25.java">print key state, code and character</a></li>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet62.java">print mouse state and button (down, move, up)</a></li>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet324.java">print mouse events (all)</a></li>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet214.java">set a background image (a dynamic gradient)</a></li>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet365.java">set transparent background</a></li>
      </ul>
      <p></p>

    <li><a name="coolbar"><b>CoolBar</b></a>
      <ul>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet20.java">create a cool bar</a></li>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet150.java">create a cool bar (relayout when resized)</a></li>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet140.java">drop-down a chevron menu containing hidden tool items</a></li>
      </ul>
      <p></p>

    <li><a name="ctabfolder"><b>CTabFolder, CTabItem</b></a>
      <ul>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet82.java">prevent an item from closing</a></li>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet165.java">min and max buttons, close button and image only on selected tab</a></li>
      </ul>
      <p></p>

    <li><a name="cursor"><b>Cursor</b></a>
      <ul>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet44.java">set the hand cursor into a control</a></li>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet92.java">create a cursor from a source and a mask</a></li>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet119.java">create a color cursor from a source and a mask</a></li>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet118.java">create a color cursor from an image file</a></li>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet242.java">hide the Cursor over a control</a></li>
      </ul>
      <p></p>

    <li><a name="datetime"><b>DateTime</b></a>
      <ul>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet250.java">create a DateTime calendar and a DateTime time</a></li>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet251.java">create a DateTime calendar and a DateTime time in a dialog</a></li>
       </ul>
      <p></p>

    <li><a name="directorydialog"><b>DirectoryDialog</b></a>
      <ul>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet33.java">prompt for a directory</a></li>
      </ul>
      <p></p>

    <li><a name="display"><b>Display</b></a>
      <ul>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet60.java">create two one shot timers (5000 ms, 2000 ms)</a></li>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet16.java">create one repeating timer (every 500 ms)</a></li>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet68.java">stop a repeating timer when a button is pressed</a></li>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet42.java">get the bounds and client area of a display</a></li>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet7.java">fill a table from a background thread (sync exec)</a></li>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet142.java">post mouse events (UI testing tools only)</a></li>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet146.java">post key events (UI testing tools only)</a></li>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet304.java">post key events to simulate CTRL+END (UI testing tools only)</a></li>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet268.java">post mouse wheel events (UI testing tools only)</a></li>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet235.java">detect a system settings change</a></li>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet276.java">map from control-relative to display-relative coordinates</a></li>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet347.java">use application menu bar, if platform supports it</a></li>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet348.java">more complex example using application menu bar to provide better platform behavior</a></li>
      </ul>
      <p></p>

    <li><a name="dnd"><b>Drag and Drop</b></a>
      <ul>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet78.java">drag text between two labels</a></li>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet91.java">drag leaf items in a tree</a></li>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet79.java">define my own data transfer type</a></li>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet171.java">define a second data transfer type that subclasses the first</a></li>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet84.java">define a default operation (in this example, Copy)</a></li>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet83.java">determine data types available (win32 only)</a></li>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet158.java">determine data types available (motif only)</a></li>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet185.java">make a dropped data type depend on a target item in table</a></li>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet210.java">drag text between two StyledText widgets</a></li>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet257.java">drag text within a StyledText widget (with drag image)</a></li>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet259.java">detect drag in a custom control</a></li>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet284.java">drag and drop a URL</a></li>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet300.java">drag and drop text between SWT and Swing</a></li>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet319.java">drag and drop an object with a custom data transfer type from SWT to AWT/Swing</a></li>
      </ul>
      <p></p>
      
    <li><a name="expandbar"><b>ExpandBar</b></a>
      <ul>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet223.java">create an expand bar</a></li>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet343.java">change an ExpandItem's height in response to a change in a contained Control</a></li>
      </ul>
      <p></p>
      
    <li><a name="filedialog"><b>FileDialog</b></a>
      <ul>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet72.java">prompt for a file name (to save)</a></li>
      </ul>
      <p></p>

    <li><a name="font"><b>Font</b></a>
      <ul>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet100.java">create a large font for use by a text widget</a></li>
      </ul>
      <p></p>

    <li><a name="formlayout"><b>FormLayout</b></a>
      <ul>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet65.java">create a simple dialog using form layout</a></li>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet69.java">center a label and single line text using a form layout</a></li>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet71.java">create a simple OK/Cancel dialog using form layout</a></li>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet295.java">create a simple text prompt dialog using form layout</a></li>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet313.java">use a form layout to hide/show a composite</a></li>
      </ul>
      <p></p>

    <li><a name="gc"><b>GC</b></a>
      <ul>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet70.java">create an icon (in memory)</a></li>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet95.java">capture a widget image with a GC</a></li>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet280.java">draw a multi-gradient (without advanced graphics)</a></li>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet281.java">draw a multi-gradient</a></li>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet13.java">draw a thick line</a></li>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet168.java">draw lines with different cap and join styles</a></li>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet10.java">draw using transformations, paths and alpha blending</a></li>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet66.java">implement a simple scribble program</a></li>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet93.java">measure a string</a></li>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet207.java">reflect, shear and rotate images using matrix transformations</a></li>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet215.java">take a screen shot with a GC</a></li>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet252.java">draw 2 polylines with different line attributes</a></li>
      </ul>
      <p></p>

    <li><a name="gesture"><b>Gesture, Touch support</b></a>
      <ul>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet352.java">create a shell and listen for TouchEvents</a></li>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet353.java">Gesture example</a></li>
      </ul>
      <p></p>

    <li><a name="gridlayout"><b>GridLayout</b></a>
      <ul>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet172.java">align widgets in rows and columns</a></li>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet6.java">insert widgets into a grid layout</a></li>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet266.java">span columns and center within columns</a></li>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet175.java">exclude an invisible widget from a grid layout</a></li>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet335.java">show a wrappable Label that fills available width without expanding it</a></li>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet342.java">grow/shrink a wrappable Text's height to show its content as it changes</a></li>
      </ul>
      <p></p>

    <li><a name="image"><b>Image</b></a>
      <ul>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet112.java">display an image in a group</a></li>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet279.java">draw a reflection of an image</a></li>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet355.java">draw an image scaled to half size and double size</a></li>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet367.java">draw an image at various zoom/dpi levels</a></li>
      </ul>
      <p></p>

    <li><a name="image"><b>ImageData</b></a>
      <ul>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet141.java">display an animated GIF</a></li>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet139.java">rotate and flip an image</a></li>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet194.java">write an animated GIF</a></li>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet246.java">write a PNG</a></li>
      </ul>
      <p></p>
      
    <li><a name="label"><b>Label</b></a>
      <ul>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet34.java">create a label (with an image)</a></li>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet37.java">create a label (a separator)</a></li>
      </ul>
      <p></p>

    <li><a name="link"><b>Link</b></a>
      <ul>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet182.java">create a link widget</a></li>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet183.java">detect selection events in a link widget</a></li>
      </ul>
      <p></p>

    <li><a name="list"><b>List</b></a>
      <ul>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet59.java">print selected items in a list</a></li>
      </ul>
      <p></p>

    <li><a name="menu"><b>Menu</b></a>
      <ul>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet29.java">create a bar and pull down menu (accelerators, mnemonics) </a></li>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet40.java">create a popup menu (set in multiple controls)</a></li>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet238.java">create a popup menu with a submenu</a></li>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet89.java">create a menu with radio items</a></li>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet73.java">enable menu items dynamically (when menu shown)</a></li>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet97.java">fill a menu dynamically (when menu shown)</a></li>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet131.java">show a popup menu (wait for it to close)</a></li>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet152.java">update a status line when an item is armed</a></li>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet178.java">access About, Preferences and Quit menus on carbon</a></li>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet286.java">use a menu item's armListener to update a status line</a></li>
      </ul>
      <p></p>

    <li><a name="monitor"><b>Monitor</b></a>
      <ul>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet120.java">center a shell on the primary monitor</a></li>
      </ul>
      <p></p>

    <li><a name="ole"><b>OLE and ActiveX</b></a>
      <ul>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet123.java">get events from IE control</a></li>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet81.java">browse the typelibinfo for a program id</a></li>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet157.java">embed Word in an applet</a></li>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet186.java">reading and writing to a SAFEARRAY</a></li>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet187.java">execute a script function that exists on a web page</a></li>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet199.java">listen for Excel AppEvents</a></li>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet261.java">open an Excel Sheet</a></li>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet262.java">open a Word document</a></li>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet263.java">open a PowerPoint slide</a></li>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet264.java">open a Media Player</a></li>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet265.java">open a Windows Media Player</a></li>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet305.java">show selected cell position in Excel</a></li>
      </ul>
      <p></p>

    <li><a name="opengl"><b>OpenGL</b></a>
      <ul>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet195.java">draw a rotating torus using the LWJGL OpenGL binding</a></li>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet209.java">draw a rotating torus using the JOGL OpenGL binding</a></li>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet174.java">draw a rectangle using the org.eclipse.opengl OpenGL binding</a></li>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet341.java">capture a LWJGL drawing to an SWT Image</a></li>
      </ul>
      <p></p>
    <li><a name="path"><b>Path, Pattern</b></a>
       <ul>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet198.java">create a path from some text</a></li>      
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet285.java">create a circular shell from a path</a></li>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet200.java">fill a shape with a predefined pattern</a></li>
       </ul>
      <p></p>
      
    <li><a name="printing"><b>Printing</b></a>
      <ul>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet132.java">print "Hello World!" in black, outlined in red, to default printer</a></li>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet133.java">print text to printer, with word wrap and pagination</a></li>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet292.java">print a control to the printer</a></li>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet318.java">print in landscape mode</a></li>
      </ul>
      <p></p>

    <li><a name="program"><b>Program</b></a>
      <ul>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet32.java">find the icon of the program that edits .bmp files</a></li>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet105.java">invoke an external batch file</a></li>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet30.java">invoke the system text editor on a new file</a></li>
      </ul>
      <p></p>

    <li><a name="progressbar"><b>ProgressBar</b></a>
      <ul>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet57.java">update a progress bar (from the UI thread)</a></li>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet56.java">update a progress bar (from another thread)</a></li>
      </ul>
      <p></p>

    <li><a name="rowlayout"><b>RowLayout</b></a>
      <ul>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet176.java">align widgets in a row</a></li>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet177.java">align widgets in a column</a></li>
      </ul>
      <p></p>

    <li><a name="sash"><b>Sash</b></a>
      <ul>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet54.java">create a sash (allow it to be moved)</a></li>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet107.java">implement a simple splitter (with a 20 pixel limit)</a></li>
      </ul>
      <p></p>

    <li><a name="sashform"><b>SashForm</b></a>
      <ul>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet109.java">create a sash form with three children</a></li>
      </ul>
      <p></p>

    <li><a name="scale"><b>Scale</b></a>
      <ul>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet45.java">create a scale (maximum 40, page increment 5)</a></li>
      </ul>
      <p></p>

    <li><a name="scrolledcomposite"><b>ScrolledComposite</b></a>
      <ul>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet5.java">scroll a control in a scrolled composite</a></li>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet166.java">create a ScrolledComposite with wrapping content</a></li>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet167.java">create two ScrolledComposites that scroll in tandem</a></li>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet188.java">scroll a widget into view on focus in</a></li>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet296.java">use a ScrolledComposite to scroll a Tree vertically</a></li>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet322.java">use a ScrolledComposite to scroll a disabled control</a></li>
      </ul>
      <p></p>

    <li><a name="shell"><b>Shell</b></a>
      <ul>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet50.java">create a dialog shell</a></li>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet63.java">create a dialog shell (prompt for a value)</a></li>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet295.java">create a dialog shell (prompt for a string)</a></li>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet233.java">create a dialog shell and position it</a></li>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet104.java">create a splash screen</a></li>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet99.java">prevent a shell from closing (prompt the user)</a></li>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet248.java">allow escape to close a shell</a></li>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet4.java">prevent escape from closing a dialog</a></li>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet27.java">open a shell minimized (iconified)</a></li>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet28.java">open a shell maximized</a></li>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet134.java">create a non-rectangular window</a></li>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet285.java">create a circular shell from a path</a></li>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet138.java">set icons with different resolutions</a></li>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet180.java">emulate transparent shell</a></li>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet219.java">create a non-rectangular shell from a transparent image</a></li>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet314.java">use shell modified state to prompt for save</a></li>
      </ul>
      <p></p>

    <li><a name="slider"><b>Slider</b></a>
      <ul>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet17.java">print scroll event details</a></li>
      </ul>
      <p></p>

    <li><a name="spinner"><b>Spinner</b></a>
      <ul>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet184.java">create and initialize a spinner widget</a></li>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet190.java">use floats in a spinner widget</a></li>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet310.java">validate input in a spinner widget</a></li>
      </ul>
      <p></p>
      
    <li><a name="stacklayout"><b>StackLayout</b></a>
      <ul>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet249.java">use a stack layout to switch between composites</a></li>
      </ul>
      <p></p>

    <li><a name="styledtext"><b>StyledText</b></a>
      <ul>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet163.java">change font style, foreground and background colors of StyledText</a></li>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet244.java">draw a box around text</a></li>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet189.java">underline and strike through text</a></li>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet211.java">use rise and font with StyleRange</a></li>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet212.java">embed images in StyledText</a></li>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet213.java">use indent, alignment and justify</a></li>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet217.java">embed controls in StyledText</a></li>        
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet222.java">use bulleted lists in StyledText</a></li>        
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet218.java">use gradient background in StyledText</a></li>        
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet325.java">variable tab stops in StyledText</a></li>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet328.java">per line variable tab stops in StyledText</a></li>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet331.java">different types of indent and combining wrap indent and bulleted lists</a></li>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet332.java">using BidiSegmentEvent#segmentsChars to implement custom bidi segments</a></li>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet356.java">embed an inline link in StyledText</a></li>
      </ul>
      <p></p>

    <li><a name="awt"><b>Swing/AWT</b></a>
      <ul>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet135.java">embed Swing/AWT in SWT</a></li>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet154.java">embed a JTable in SWT (no flickering)</a></li>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet155.java">draw an X using AWT Graphics</a></li>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet156.java">convert between SWT Image and AWT BufferedImage</a></li>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet337.java">launch SWT from AWT and keep both active</a></li>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet319.java">drag and drop an object with a custom data transfer type from SWT to AWT/Swing</a></li>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet361.java">use Java2D to modify an image being displayed in an SWT GUI</a></li>
      </ul>
      <p></p>

    <li><a name="tabfolder"><b>TabFolder, TabItem</b></a>
      <ul>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet76.java">create a tab folder (six pages)</a></li>
      </ul>
      <p></p>

    <li><a name="table"><b>Table, TableItem, TableColumn</b></a>
      <ul>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet151.java">add 1000 sorted entries to a virtual table every 500 ms</a></li>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet129.java">color cells and rows in table</a></li>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet35.java">create a table (no columns, no headers)</a></li>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet38.java">create a table (columns, headers, lines)</a></li>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet297.java">create a table with column header images</a></li>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet144.java">create a table with 1,000,000 items (lazy)</a></li>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet201.java">create a table with 1,000,000 items (lazy, page size 64)</a></li>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet7.java">create a table (lazy with a thread)</a></li>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet301.java">create a table with no scroll bars</a>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet113.java">detect a selection or check event in a table (SWT.CHECK)</a></li>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet3.java">find a table cell from mouse down (SWT.FULL_SELECTION)</a></li>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet110.java">find a table cell from mouse down (works for any table style)</a></li>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet101.java">insert a table item (at an index)</a></li>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet106.java">insert a table column (at an index)</a></li>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet181.java">allow user to reorder columns by dragging or programmatically</a></li>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet126.java">place arbitrary controls in a table</a></li>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet64.java">print selected items in a table</a></li>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet53.java">remove selected items</a></li>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet77.java">resize columns as table resizes</a></li>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet51.java">scroll a table one "page" at a time (set the top index)</a></li>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet52.java">select an index (select and scroll)</a></li>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet2.java">sort a table by column</a></li>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet192.java">sort a table by column (virtual table, sort indicator)</a></li>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet103.java">update table item text</a></li>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet349.java">show a table with images of various sizes</a></li>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet230.java">draw images on right side of table item</a></li>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet228.java">show results as a bar chart in table</a></li>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet229.java">draw a custom gradient selection for table</a></li>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet231.java">draw multiple lines in a table item</a></li>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet234.java">fixed first column horizontal scroll remaining columns</a></li>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet236.java">draw different foreground colors for text in a TableItem</a></li>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet239.java">make text span multiple columns</a></li>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet253.java">compute the number of visible rows in a table</a></li>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet271.java">specify custom content dimensions in a table with no columns</a></li>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet272.java">specify custom content widths when a column is packed</a></li>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet273.java">modify the clipping of custom background paints</a></li>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet311.java">show a menu in a table header</a></li>
		<!-- <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet283.java">draw left aligned icon, text and selection</a> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/eclipse.png">(eclipse.png)</a></li> -->
      </ul>
      <p></p>

    <li><a name="tablecursor"><b>TableCursor</b></a>
      <ul>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet96.java">navigate a Table's cells with the arrow keys</a></li>
      </ul>
      <p></p>

    <li><a name="tableeditor"><b>TableEditor</b></a>
      <ul>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet88.java">edit the text of a table item (in place)</a></li>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet124.java">edit a cell in a table (in place, fancy)</a></li>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet149.java">place a progress bar in a table</a></li>
      </ul>
      <p></p>
      
    <li><a name="taskbar"><b>TaskBar, TaskBarItem</b></a>
      <ul>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet336.java">customize the taskbar item with progress indicator, overlay image, and overlay text</a></li>
      </ul>
      <p></p>

    <li><a name="text"><b>Text</b></a>
      <ul>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet117.java">add a select all menu item to the control</a></li>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet24.java">detect CR in a text control (default selection)</a></li>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet241.java">override Tab behavior to traverse out of a text control</a></li>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet116.java">prevent CR from going to the default button</a></li>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet121.java">prompt for a password (set the echo character)</a></li>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet55.java">resize a text control (show about 10 characters)</a></li>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet22.java">select all the text in the control</a></li>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet11.java">set the selection (i-beam)</a></li>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet12.java">set the selection (start, end)</a></li>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet19.java">verify input (only allow digits)</a></li>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet179.java">verify input in a template (YYYY/MM/DD)</a></li>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet191.java">detect when the user scrolls a text control</a></li>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet196.java">verify input using a regular expression</a></li>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet243.java">type in one text control, output to another</a></li>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet258.java">create a search text control</a></li>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet309.java">display different styles of the search Text control</a></li>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet320.java">implement content assist</a></li>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet346.java">set contents of a password field using a char array instead of a String</a></li>
      </ul>
      <p></p>

    <li><a name="textlayout"><b>TextLayout, TextStyle</b></a>
      <ul>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet145.java">draw internationalized styled text on a shell</a></li>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet197.java">draw dynamically wrapped text on a shell</a></li>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet203.java">justify, align and indent text</a></li>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet204.java">change the rise of text relative to the baseline</a></li>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet205.java">embed images and widgets in text</a></li>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet256.java">underline and strike through text</a></li>
       </ul>
      <p></p>

    <li><a name="toolbar"><b>ToolBar, ToolItem</b></a>
      <ul>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet18.java">create a tool bar (text)</a></li>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet36.java">create a flat tool bar (images)</a></li>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet47.java">create tool bar (normal, hot and disabled images)</a></li>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet49.java">create tool bar (wrap on resize)</a></li>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet58.java">place a combo box in a tool bar</a></li>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet67.java">place a drop down menu in a tool bar</a></li>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet153.java">update a status line when the mouse enters a tool item</a></li>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet288.java">create a tool bar containing animated gifs</a></li>
      </ul>
      <p></p>

    <li><a name="tooltips"><b>Tool Tips</b></a>
      <ul>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet41.java">create tool tips for a tab folder, tool bar and control</a></li>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet125.java">create emulated tool tips for items in a table</a></li>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet225.java">create a balloon tooltip for a tray item</a></li>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet278.java">show a tool tip iff it's not fully visible</a></li>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet216.java">show a tool tip inside a rectangle</a></li>
      </ul>
      <p></p>

    <li><a name="tracker"><b>Tracker</b></a>
      <ul>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet23.java">create a tracker (drag on mouse down)</a></li>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet31.java">create a tracker (drag when "torn off")</a></li>
      </ul>
      <p></p>

    <li><a name="tray"><b>Tray, TrayItem</b></a>
      <ul>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet143.java">place a popup menu on the system tray</a></li>
      </ul>
      <p></p>

    <li><a name="tree"><b>Tree, TreeItem, TreeColumn</b></a>
      <ul>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet15.java">create a tree</a></li>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet8.java">create a tree (lazy)</a></li>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet202.java">create a virtual tree (lazy)</a></li>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet302.java">create a tree with no scroll bars</a>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet114.java">detect a selection or check event in a tree (SWT.CHECK)</a></li>          
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet274.java">implement standard tree check box behavior (SWT.CHECK)</a>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet102.java">insert a tree item (at an index)</a></li>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet61.java">print selected items in a tree</a></li>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet80.java">limit selection to items that match a pattern</a></li>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet90.java">detect mouse down in a tree item</a></li>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet170.java">create a tree with columns</a></li>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet193.java">make columns reorderable by dragging</a></li>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet220.java">images on right side of TreeItem</a></li>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet232.java">show results as a bar chart in tree</a></li>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet226.java">draw a custom gradient selection for tree</a></li>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet227.java">draw multiple lines in a tree item</a></li>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet221.java">scroll tree when mouse at top or bottom</a></li>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet287.java">search for a string in a tree (recursively)</a></li>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet254.java">compute the number of visible rows in a tree</a></li>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet312.java">show a menu in a tree header</a></li>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet358.java">determine which TreeItems are visible in a Tree's viewport</a></li>
        <!-- <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet240.java">text that spans multiple columns</a></li> -->
      </ul>
      <p></p>

    <li><a name="treecursor"><b>TreeCursor</b></a>
      <ul>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet360.java">navigate a Tree's cells with the arrow keys</a></li>
      </ul>
      <p></p>

    <li><a name="treeeditor"><b>TreeEditor</b></a>
      <ul>
        <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet111.java">edit the text of a tree item (in place, fancy)</a></li>
      </ul>
      <p></p>

    <li>... and lots more still to come. Keep checking back.
  </ul>
  
<h3><a name="pocketpc">Snippets for Pocket PC</a></h3>
<ul>
    <li><b>"<a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet85.java">Hello World</a>"</b>
      <p></p>

    <li><b>Shell</b>
        <ul>
            <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet86.java">'Ok' button</a></li>
            <li> <a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet87.java">resize automatically as SIP is on or off</a></li>
        </ul>
</ul>
</div>
<?php 
$html = ob_get_clean();

# Generate the web page
$App->generatePage($theme, $Menu, $Nav, $pageAuthor, $pageKeywords, $pageTitle, $html);
?>