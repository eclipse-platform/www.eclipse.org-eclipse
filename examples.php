<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
    <title>SWT Examples</title>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
    <link rel="stylesheet" href="http://dev.eclipse.org/default_style.css" type="text/css">
    <link rel="stylesheet" href="swt.css" type="text/css">
    <link rel="shortcut icon" href="http://www.eclipse.org/images/eclipse.ico" type="image/x-icon">
</head>
<body bgcolor="#ffffff" text="#000000">
<table width="635px" class="swtpage">
<colgroup><col width="125px"><col width="510px"></colgroup>
<tr><?php include "sidebar.php"; ?>
<td valign="top" style="padding: 10px"><h1 style="padding: 0; margin: 0; border-bottom: 1px solid #000000;">SWT Examples</h1>

<p></p>
<table width="100%">
<tr><th bgcolor="#0080c0" align="left" style="padding: 2px;"><font color="#ffffff">SWT Examples</font>
</table>

<p>SWT Examples are useful little programs that are written in SWT.
These are typically much larger and more comprehensive than SWT <a href="http://www.eclipse.org/swt/snippets/">Snippets</a>.
</p><p>The following SWT Examples can be downloaded from the Eclipse download page:
<ul>
<img src="images/controlexample.png" width="400" height="275" align="right" alt="ControlExample on Vista">
<li>ControlExample</li>
<li>CustomControlExample</li>
<li>AddressBook</li>
<li>BrowserExample</li>
<li>ClipboardExample</li>
<li>DNDExample (Drag and Drop)</li>
<li>FileViewer</li>
<li>GraphicsExample</li>
<li>HelloWorld [1-5]</li>
<li>HoverHelp</li>
<li>ImageAnalyzer</li>
<li>JavaViewer</li>
<li>LayoutExample</li>
<li>PaintExample</li>
<li>TextEditor</li>
<li>OLEExample (win32 only, OLE)</li>
<li>OleWebBrowser (win32 only, OLE)</li>
</ul>
</p>

<p>ControlExample, CustomControlExample, LayoutExample, and PaintExample are also available as Eclipse plugins,
and the following examples are <em>only</em> available as Eclipse plugins:
<ul>
<li>BrowserDemo in the org.eclipse.swt.examples.browser.demos project</li>
<li>WebBrowser in the org.eclipse.swt.examples.browser project</li>
</ul>
</p>

<p>There are several ways to download and run the SWT examples:
<ul>
<li><a href="#insideEclipse">Run inside Eclipse, either in an example view or from the SWT Example Launcher view.</a></li>
<li><a href="#standaloneInsideEclipse">Launch as standalone applications from within Eclipse.</a></li>
<li><a href="#standaloneOutsideEclipse">Run as standalone applications outside of Eclipse.</a></li>
</ul>
</p>

<table width="100%">
<tr><th bgcolor="#0080c0" align="left" style="padding: 2px;"><font color="#ffffff">
<a name="insideEclipse">Running the SWT Examples inside Eclipse</a></font>
</table>

<ol>
  <li>To get the examples, go to the Eclipse downloads page at <a href="http://download.eclipse.org/eclipse/downloads/index.php">
      http://download.eclipse.org/eclipse/downloads</a>.</li>
  <li>Click on the Eclipse build that you would like examples for
      (i.e. the Eclipse build that you are running; typically the latest Stable Build).</li>
  <li>Scroll down until you see "Example Plug-ins". Read the paragraph on installing them, and select the download for your platform.</li>
  <li>After installing the examples, you can find their source in <code>eclipse/plugins/org.eclipse.swt.examples.&lt;exampleName&gt;.source_&lt;version&gt;.jar</code>.
  <li>To run the plug-in SWT examples, restart Eclipse, go to <i>Window &gt; Show View... &gt; Other...</i> and expand "SWT Examples".</li>
</ol>

<p>Alternatively, you can use these (more detailed) steps from the Eclipse ISV doc to download, install, and run
the Eclipse SWT Examples:
<ol>
<li><a href = "http://help.eclipse.org/galileo/topic/org.eclipse.platform.doc.isv/samples/samples.html">
	Installing the examples</a></li>
<li><a href = "http://help.eclipse.org/galileo/topic/org.eclipse.platform.doc.isv/samples/org.eclipse.swt.examples.launcher/doc-html/swt_launcher_ex.html">
	Running the SWT examples as views or with the SWT Example Launcher</a></li>
<li><a href = "http://help.eclipse.org/galileo/topic/org.eclipse.platform.doc.isv/samples/org.eclipse.swt.examples/doc-html/swt_manual_setup.html">
	Running the SWT standalone examples</a></li>
<li><a href = "http://help.eclipse.org/galileo/topic/org.eclipse.platform.doc.isv/samples/org.eclipse.swt.examples/doc-html/swt_manual_setup.html#ExamplesOverview">
	SWT Examples Overview</a></li>
</ol>
</p>

<table width="100%">
<tr><th bgcolor="#0080c0" align="left" style="padding: 2px;"><font color="#ffffff">
<a name="standaloneInsideEclipse">Launching standalone SWT Examples inside Eclipse</a></font>
</table>

<p></p>
<ol>
  <li><a href="eclipse.php">Load SWT into your workspace.</a></li>
  <li><a href="#insideEclipse">Load the SWT examples into your workspace by one of the methods listed above</a>.</li>
  <li>Run a standalone example by selecting the main class (e.g. org.eclipse.swt.examples.controlexample.ControlExample) and selecting
	<br><em>Run &gt; Run As &gt; Java Application</em> (Note: prior to Eclipse 3.3 use
	<em>Run &gt; Run As &gt; SWT Application</em>).</li>
</ol>

<table width="100%">
<tr><th bgcolor="#0080c0" align="left" style="padding: 2px;"><font color="#ffffff">
<a name="standaloneOutsideEclipse">Running standalone SWT Examples outside of Eclipse</a></font>
</table>

<p>(NOTE: these instructions will only work for Eclipse 3.3 and newer) To run the ControlExample or CustomControlExample standalone:</p>
<ol>
  <li>Go to the Eclipse downloads page at <a href="http://download.eclipse.org/eclipse/downloads/index.php">
      http://download.eclipse.org/eclipse/downloads/index.php</a>.</li>
  <li>Click on the Eclipse build that you would like examples for
      (i.e. the Eclipse/SWT build that you are running; typically the latest Stable Build).</li>
  <li>Scroll down until you see "Example Plug-ins", download the .zip for your platform, and extract it to your local machine.</li>
  <li>In the directory with the extracted example plug-ins, find file <code>org.eclipse.swt.examples_&lt;version&gt;.jar</code>, and extract it in place.</li>
  <li>Open a DOS window (on Windows) or a terminal window (on Mac or Linux) and navigate to this directory.</li>
  <li>To run the example, type the following line with the appropriate paths substituted:<br>

<code>&lt;pathToYourJRE&gt;\bin\java -classpath &lt;pathOfYourPlatformSWTjar&gt;;.\swtexamples.jar org.eclipse.swt.examples.controlexample.ControlExample</code>

<p>This is the ControlExample. There is a tab for each control, and you can
change the various styles, etc, to see what changes in the controls. To run
the CustomControlExample simply use the class name CustomControlExample
instead of ControlExample in step 6.</p></li>

</ol>

</table>
</body>
</html>
