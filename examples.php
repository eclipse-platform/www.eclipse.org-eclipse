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

<p>The following SWT examples can be downloaded from the eclipse download page:
<ul>
<img src="images/controlexample.png" width="300" height="180" align="right" alt="ControlExample on Vista">
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
and the following examples are only available as Eclipse plugins:
<ul>
<li>BrowserDemo in the org.eclipse.swt.examples.browser.demos project</li>
<li>WebBrowser in the org.eclipse.swt.examples.browser project</li>
</ul>
</p>

<p>There are several ways to download and run the SWT examples:
<ul>
<li><a href="#insideEclipse">Run inside eclipse, either in an example view or from the SWT Example Launcher view.</a></li>
<li><a href="#standaloneInsideEclipse">Launch as standalone applications from within eclipse.</a></li>
<li><a href="#standaloneOutsideEclipse">Run as standalone applications outside of eclipse.</a></li>
</ul>
</p>

<table width="100%">
<tr><th bgcolor="#0080c0" align="left" style="padding: 2px;"><font color="#ffffff">
<a name="insideEclipse">Running the SWT Examples inside eclipse</a></font>
</table>

<ol>
  <li>To get the examples, go to the eclipse download page: <a href="http://download.eclipse.org/eclipse/downloads/index.php">
      http://download.eclipse.org/eclipse/downloads/index.php</a></li>
  <li>Click on the eclipse build that you would like examples for
      (i.e. the eclipse build that you are running; typically the latest Stable Build).</li>
  <li>Scroll down until you see "Example Plug-ins". Read the paragraph on installing them, and select the download for your platform.</li>
  <li>After installing the examples, the source for them will be in a src.zip file in the
      appropriate subdirectory of: eclipse/plugins/org.eclipse.sdk.examples.source_&lt;version&gt;/src/
      <br>For example, the 3.1 source for the standalone examples in org.eclipse.swt.examples is in: org.eclipse.sdk.examples.source_3.1.0/src/org.eclipse.swt.examples_3.1.0/swtexamplessrc.zip.</li>
      <br>The examples in package org.eclipse.swt.examples run standalone,
and the examples in org.eclipse.swt.examples.* packages are eclipse plug-ins.
  <li>To run the plug-in SWT examples, restart eclipse, go to <i>Window &gt; Show View... &gt; Other...</i> and expand "SWT Examples".</li>
</ol>

<p>Alternatively, you can use these (more detailed) steps from the eclipse ISV doc to download, install, and run
the eclipse SWT Examples:
<ol>
<li><a href = "http://help.eclipse.org/help32/topic/org.eclipse.platform.doc.isv/samples/samples.html">
	Installing the examples</a></li>
<li><a href = "http://help.eclipse.org/help32/topic/org.eclipse.platform.doc.isv/samples/org.eclipse.swt.examples.launcher/doc-html/swt_launcher_ex.html">
	Running the SWT examples as views or with the SWT Example Launcher</a></li>
<li><a href = "http://help.eclipse.org/help32/topic/org.eclipse.platform.doc.isv/samples/org.eclipse.swt.examples/doc-html/swt_manual_setup.html">
	Running the SWT standalone examples</a></li>
<li><a href = "http://help.eclipse.org/help32/topic/org.eclipse.platform.doc.isv/samples/org.eclipse.swt.examples/doc-html/swt_manual_setup.html#ExamplesOverview">
	SWT Examples Overview</a></li>
</ol>
</p>

<table width="100%">
<tr><th bgcolor="#0080c0" align="left" style="padding: 2px;"><font color="#ffffff">
<a name="standaloneInsideEclipse">Launching standalone SWT Examples inside eclipse</a></font>
</table>

<p></p>
<ol>
  <li><a href="eclipse.php">Load SWT into your workspace.</a></li>
  <li><a href="#insideEclipse">Load the SWT examples into your workspace by one of the methods listed above</a>.</li>
  <li>Run a standalone example by selecting the main class (e.g. org.eclipse.swt.examples.controlexample.ControlExample) and selecting
	<br><strong>Run &gt; Run As &gt; SWT Application</strong> (note: as of Eclipse 3.3 you should use
	<strong>Run &gt; Run As &gt; Java Application</strong> instead).</li>
</ol>

<table width="100%">
<tr><th bgcolor="#0080c0" align="left" style="padding: 2px;"><font color="#ffffff">
<a name="standaloneOutsideEclipse">Running standalone SWT Examples outside of eclipse</a></font>
</table>

<p>(Note that these instructions will only work for eclipse 3.1 and newer).  To run the ControlExample and CustomControlExample standalone:</p>
<ol>
<li>Go to the download page for the eclipse version you are running.
   For example, for eclipse 3.3 this is:<br>
   <a href="http://download.eclipse.org/eclipse/downloads/drops/R-3.3-200706251500/index.php">http://download.eclipse.org/eclipse/downloads/drops/R-3.3-200706251500/index.php</a>.
   </li>

<li>Scroll down to the "Example Plug-ins" section, download the examples zip for your platform, and unzip
   it to the same place that you originally unzipped eclipse.
   Let's say that you unzip both eclipse and its examples to d:\
   (answer Yes when it asks if you want to overwrite the license files).
   </li>

<li>(If you are using eclipse 3.3 or newer then you can skip this step) Open the file d:\eclipse\plugins\org.eclipse.swt.win32.win32.x86_3.X.X.jar
   in winzip and extract the following 3 files into d:\eclipse\plugins
   <ul>
   <li>swt-awt-win32-XXXX.dll
   <li>swt-gdip-win32-XXXX.dll
   <li>swt-win32-XXXX.dll
   </ul></li>

<li>Open a DOS window and type:<br>
   <code>d:<br>
   cd d:\eclipse\plugins\org.eclipse.swt.examples_3.X.X</code></li>

<li>Type the following line: (if you are using eclipse 3.3 or newer then the <code>-Djava.library.path</code> argument can be omitted)<br>

<code><i>&lt;pathToYourJRE&gt;</i>\bin\java -classpath .;..\org.eclipse.swt_3.X.X.jar;..\org.eclipse.swt.win32.win32.x86_3.X.X.jar;.\swtexamples.jar -Djava.library.path=.. org.eclipse.swt.examples.controlexample.ControlExample</code>

<p>This is the ControlExample. There is a tab for each control, and you can
change the various styles, etc, to see what changes in the controls. To run
the CustomControlExample simply use the class name CustomControlExample
instead of ControlExample in step 5.</p></li>

</ol>

</table>
</body>
</html>
