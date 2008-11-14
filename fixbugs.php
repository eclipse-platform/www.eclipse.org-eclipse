<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
    <title>SWT Cocoa Port</title>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
    <link rel="stylesheet" href="http://dev.eclipse.org/default_style.css" type="text/css">
    <link rel="stylesheet" href="swt.css" type="text/css">
    <link rel="shortcut icon" href="http://www.eclipse.org/images/eclipse.ico" type="image/x-icon">
</head>
<body bgcolor="#ffffff" text="#000000">
<table width="635px" class="swtpage">
<colgroup><col width="125px"><col width="510px"></colgroup>
<tr><?php include "sidebar.php"; ?>
<td valign="top" style="padding: 10px"><h1 style="padding: 0; margin: 0; border-bottom: 1px solid #000000;">SWT Cocoa Port</h1>

<p></p>
<table width="100%">
<tr><th bgcolor="#0080c0" align="left" style="padding: 2px;"><font color="#ffffff">Cocoa Port</font>
</table>

<h1>Fixing a bug in SWT (Under Construction)<br>
</h1>
<h2>Set up your Java environment:</h2>
<ol>
<li>Download and install a Java JRE (SWT only requires a 1.4.x JRE to
run but you can obviously use more recent ones).<br>
</li>
<li>Download and install current Eclipse build. (<a
href="http://www.eclipse.org/downloads/">Available here</a>) Select
the "Eclipse Classic" download.</li>
<li>Setup SWT from CVS. Make sure to check out <span
style="font-style: italic;">org.eclipse.swt</span>, any swt fragment
you need (ex. <span style="font-style: italic;">org.eclipse.swt.gtk.linux.x86</span>),
<span style="font-style: italic;">org.eclipse.swt.snippets</span>,
and <span style="font-style: italic;">org.eclipse.swt.examples</span>.
(See <a href="http://www.eclipse.org/swt/cvs.php">instructions here</a>).
<br>
</li>
<li>Create a private CVS project for your test code. This is
important to keep track of bugs that are fixed.<br>
</li>
<li>Click on any Snippet or example, and select Run As&gt;Java
Application.<br>
</li>
</ol>
<h2>Understand SWT:</h2>
<ul>
<li>A picture of all the SWT widgets is <a
href="http://www.eclipse.org/swt/widgets/">available here</a>.</li>
<li>A comprehensive list of SWT articles and tutorials is <a
href="http://www.eclipse.org/swt/docs.php">available here</a>. </li>
</ul>
<h2>Understand open source:</h2>
<ul>
<li>To read up on Eclipse and understand the Eclipse development
process follow this <a
href="http://wiki.eclipse.org/Development_Resources">link</a>. <br>
</li>
</ul>
<h3 style="margin-left: 40px;">Bugzilla<br>
</h3>
<ul>
<ul>
<li>For tips on filing new bugs, see this <a
href="https://bugs.eclipse.org/bugs/page.cgi?id=bug-writing.html">link</a>.<br>
</li>
</ul>
</ul>
<h2>Find the Operating System documentation:</h2>
<ul>
<li>Windows documentation is<a
href="http://msdn.microsoft.com/en-ca/default.aspx"> found here</a>.</li>
<li>GTK documentation is <a
href="http://www.gtk.org/documentation.html">found here</a>.<br>
</li>
<li>Motif documentation is <a
href="http://www.opengroup.org/openmotif/docs/">found here</a>.</li>
</ul>
<br>

</table>
</body>
</html>
