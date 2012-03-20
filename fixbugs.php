<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
    <title>Fixing a bug in SWT</title>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
    <link rel="stylesheet" href="http://dev.eclipse.org/default_style.css" type="text/css">
    <link rel="stylesheet" href="swt.css" type="text/css">
    <link rel="shortcut icon" href="http://www.eclipse.org/images/eclipse.ico" type="image/x-icon">
</head>
<body bgcolor="#ffffff" text="#000000">
<table width="635px" class="swtpage">
<colgroup><col width="125px"><col width="510px"></colgroup>
<tr><?php include "sidebar.php"; ?>
<td valign="top" style="padding: 10px"><h1 style="padding: 0; margin: 0; border-bottom: 1px solid #000000;">Fixing a bug in SWT</h1>
<p></p>

<h2>Set up your Java environment:</h2>
<ol>
<li>Download and install a Java JRE (SWT only requires a 1.4.x JRE to
run but you can also use more recent ones).<br>
</li>
<li><a href="http://www.eclipse.org/downloads/">Download and install the current Eclipse build.</a>
(Select the "Eclipse Classic" download.)</li>
<li><a href="http://www.eclipse.org/swt/git.php">Setup SWT from GIT.</a>
Make sure to load <code>org.eclipse.swt</code> plus any swt fragment you need
(for example, <code>org.eclipse.swt.gtk.linux.x86</code>),
<code>org.eclipse.swt.snippets</code>,
and <code>org.eclipse.swt.examples</code>.
<br>
</li>
<li>Click on any Snippet or example, and select Run As&gt;Java
Application.<br>
</li>
</ol>

<h2>Understand SWT:</h2>
The <a href="http://www.eclipse.org/swt/">eclipse.org/swt/</a> page contains many links
and resources that are useful for understanding SWT. Some of these are:
<ul>
<li><a href="http://www.eclipse.org/swt/widgets/">Snapshots of all of the SWT widgets</a></li>
<li><a href="http://www.eclipse.org/swt/snippets/">Little standalone snippets of SWT code</a></li>
<li><a href="http://www.eclipse.org/swt/examples.php">Larger examples of SWT code</a></li>
<li><a href="http://www.eclipse.org/swt/faq.php">A list of Frequently Asked Questions</a></li>
<li><a href="http://www.eclipse.org/swt/tools.php">Tools for implementing and testing SWT</a></li>
<li><a href="http://www.eclipse.org/swt/javadoc.php">Online Javadoc</a></li>
<li><a href="http://www.eclipse.org/swt/docs.php">A comprehensive list of SWT articles, tutorials, and other documentation</a></li>
</ul>

<h2>Understand open source:</h2>
<ul>
<li>Read up on Eclipse and <a href="http://wiki.eclipse.org/Development_Resources">
understand the Eclipse development process</a>.<br>
</li>
</ul>
<h3 style="margin-left: 40px;">Bugzilla<br>
</h3>
<ul>
<ul>
<li><a href="https://bugs.eclipse.org/bugs/page.cgi?id=bug-writing.html">Tips on filing new bugs</a>.</li>
<li><a href="http://www.eclipse.org/swt/bugs.php">Find or open SWT bugs and feature requests</a>.<br></li>
</ul>
</ul>

<h2>Find the Operating System doc:</h2>
<ul>
<li><a href="http://msdn.microsoft.com/en-ca/default.aspx"><a href="http://msdn.microsoft.com/en-ca/default.aspx">Windows documentation</a>.</li>
<li><a href="http://www.gtk.org/documentation.php">GTK documentation</a>.</li>
<li><a href="http://developer.apple.com/mac/library/navigation/index.html#section=Frameworks&topic=Cocoa%20Layer">Cocoa documentation</a>.</li>
<li><a href="http://www.opengroup.org/openmotif/docs/">Motif documentation</a>.</li>
</ul>

</table>
</body>
</html>
