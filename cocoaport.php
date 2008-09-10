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

<p>The Cocoa port of SWT is well underway. ControlExample and most of the SWT examples run, and
we expect to have an Eclipse build of macosx.cocoa.x86 available for 3.4 M2.
There are still areas that need work. Here is the port's status as of
<a href="http://dev.eclipse.org/mhonarc/lists/platform-swt-dev/msg06076.html">August 27, 2008</a>.
<p>If you want to help, here is what you can do.
To get started, <a href="http://www.eclipse.org/swt/cvs.php">load SWT from CVS</a> into your eclipse workspace.
The projects you need are:
<ul>
<li>org.eclipse.swt</li>
<li>org.eclipse.swt.cocoa.macosx</li>
<li>org.eclipse.swt.examples (not required, but useful for testing)</li>
<li>org.eclipse.swt.tools (not required, unless you need to extend the <a href="http://www.eclipse.org/swt/macgen.php">Platform Interface</a>)</li>
</ul>
</p><p>If you find a bug, <a href="https://bugs.eclipse.org/bugs/enter_bug.cgi?product=Platform&component=SWT&rep_platform=Macintosh&op_sys=Mac+OS+X+-+Cocoa">open an eclipse bug report</a>.
Also, you can <a href="https://bugs.eclipse.org/bugs/buglist.cgi?classification=Eclipse&product=Platform&component=SWT&op_sys=Mac+OS+X+-+Cocoa&bug_status=UNCONFIRMED&bug_status=NEW&bug_status=ASSIGNED&bug_status=REOPENED">
pick an interesting bug from here</a>, see if you can figure out how to fix the problem, and if so, attach a patch to the bug report.
Subscribe to the <a href="news://news.eclipse.org/eclipse.platform.swt">SWT newsgroup</a> for discussion and to keep track of current developments.
</p><p>For a history of the beginnings of the Cocoa port, see Steve Northover's blog:
<ul>
<li><a href="http://inside-swt.blogspot.com/2007/11/hacking-at-apple.html">Hacking at Apple</a></li>
<li><a href="http://inside-swt.blogspot.com/2007/11/great-success.html">Great Success</a></li>
<li><a href="http://inside-swt.blogspot.com/2007/11/ok-community-blow-your-brains-out.html">Call For Volunteers</a></li>
</ul>
</p><p>Thanks to those who have helped so far!
</p>

</table>
</body>
</html>
