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

<p>The Cocoa port of SWT will ship with Eclipse 3.5.</p>
<p>Early adopters can try it now by downloading
<a href="http://download.eclipse.org/eclipse/downloads/drops/S-3.5M3-200810301917/download.php?dropFile=eclipse-SDK-3.5M3-macosx-cocoa.tar.gz">
Eclipse 3.5 Milestone 3 for Mac OSX Cocoa</a>.</p>
<p>If you prefer to be bleeding edge, you can download the most recent
<a href="http://download.eclipse.org/eclipse/downloads/">3.5 Stream Integration Build (weekly)</a> or the 
<a href="http://download.eclipse.org/eclipse/downloads/">3.5 Stream Nightly Build</a> of Eclipse for Mac OSX Cocoa.
</p>
<p>There are still areas that need work. If you want to help, here is what you can do.
<ol>
<li>Read the <a href="http://www.eclipse.org/swt/R3_5/plan.html">SWT 3.5 Development Plan</a> to get a feel for the current status of the Cocoa port.</li>
<li>Subscribe to the <a href="https://dev.eclipse.org/mailman/listinfo/platform-swt-dev">SWT developers mailing list</a> for discussion and to keep track of current developments.</li>
<li>Then <a href="http://www.eclipse.org/swt/cvs.php">load SWT from CVS</a> into your Eclipse workspace.
The projects you need are:
<ul>
<li>org.eclipse.swt</li>
<li>org.eclipse.swt.cocoa.macosx</li>
<li>org.eclipse.swt.examples (not required, but useful for testing)</li>
<li>org.eclipse.swt.tools (not required, unless you need to extend the <a href="http://www.eclipse.org/swt/macgen.php">JNI Code</a>)</li>
</ul>
</li>
<li>Pick an interesting bug from the plan or <a href="https://bugs.eclipse.org/bugs/buglist.cgi?classification=Eclipse&product=Platform&component=SWT&op_sys=Mac+OS+X+-+Cocoa&bug_status=UNCONFIRMED&bug_status=NEW&bug_status=ASSIGNED&bug_status=REOPENED">
from here</a>, cc yourself to the bug, signal your intent to look at the bug in the bug itself or on the SWT mailing list,
and see if you can figure out how to fix the problem. If so, attach a patch to the bug report.</li>
</ol>
</p>
<p>If you find a bug, <a href="https://bugs.eclipse.org/bugs/enter_bug.cgi?product=Platform&component=SWT&rep_platform=Macintosh&op_sys=Mac+OS+X+-+Cocoa">open an Eclipse bug report against SWT Mac OSX Cocoa</a>.
</p>
<p>Thanks to all those who have helped so far!
</p>

</table>
</body>
</html>
