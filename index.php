<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
    <title>SWT: The Standard Widget Toolkit</title>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
    <link rel="stylesheet" href="http://dev.eclipse.org/default_style.css" type="text/css">
    <link rel="stylesheet" href="swt.css" type="text/css">
    <link rel="shortcut icon" href="http://www.eclipse.org/images/eclipse.ico" type="image/x-icon">
</head>
<body bgcolor="#ffffff" text="#000000">
<table width="875px" class="swtpage">
<colgroup><col width="125px"><col width="750px"></colgroup>
<tr><?php include "sidebar.php"; ?>
<td valign="top" style="padding: 10px"><h1 style="padding: 0; margin: 0; border-bottom: 1px solid #000000;">SWT: The Standard Widget Toolkit</h1>

<p>SWT is an <a href="http://www.eclipse.org/legal/">open source</a> widget toolkit for Java designed to provide efficient,
portable access to the user-interface facilities of the operating systems
on which it is implemented.</p>

<table width="100%">
<tr><th bgcolor="#0080c0" align="left" style="padding: 2px;"><font color="#ffffff">Cocoa Port</font>
</table>

<p>We are looking for help with the cocoa port of SWT.
To get started, <a href="http://www.eclipse.org/swt/cvs.php">load SWT from CVS</a> into your eclipse workspace.
The projects you need are:
<ul>
<li>org.eclipse.swt</li>
<li>org.eclipse.swt.cocoa.macosx</li>
<li>org.eclipse.swt.examples (not required, but useful for testing)</li>
</ul>
<p>If you find a bug, <a href="https://bugs.eclipse.org/bugs/enter_bug.cgi?product=Platform&component=SWT">open an eclipse bug report</a>
with <b>Platform: Macintosh</b> and <b>OS: Mac OSX - Cocoa</b>.
Also, you can <a href="https://bugs.eclipse.org/bugs/buglist.cgi?classification=Eclipse&product=Platform&component=SWT&op_sys=Mac+OS+X+-+Cocoa&bug_status=UNCONFIRMED&bug_status=NEW&bug_status=ASSIGNED&bug_status=REOPENED">
pick an interesting bug from here</a>.
Then see if you can figure out how to fix the problem, and if so, attach a patch to the bug report.
Discussion can take place on the <a href="news://news.eclipse.org/eclipse.platform.swt">SWT newsgroup</a>.
</p><p>See Steve Northover's blog for a bit of background:
<ul>
<li><a href="http://inside-swt.blogspot.com/2007/11/hacking-at-apple.html">Hacking at Apple</a></li>
<li><a href="http://inside-swt.blogspot.com/2007/11/great-success.html">Great Success</a></li>
<li><a href="http://inside-swt.blogspot.com/2007/11/ok-community-blow-your-brains-out.html">Call For Volunteers</a></li>
</ul>
</p><p>Thanks to those who are already jumping in and getting their feet wet!
</p>

<table width="100%">
<tr><th bgcolor="#0080c0" align="left" style="padding: 2px;"><font color="#ffffff">Releases</font>
</table>

<table width="100%">
<tr><td width="50%" valign="top">
  <table width="100%">
  <tr><td>
      <b><font size="+1">Stable</font></b><br>
      <a href="http://download.eclipse.org/eclipse/downloads/drops/R-3.3.1.1-200710231652/download.php?dropFile=swt-3.3.1.1-win32-win32-x86.zip">Windows</a>,
      <a href="http://download.eclipse.org/eclipse/downloads/drops/R-3.3.1.1-200710231652/download.php?dropFile=swt-3.3.1.1-gtk-linux-x86.zip">Linux</a>,
      <span style="white-space: nowrap;">
      <a href="http://download.eclipse.org/eclipse/downloads/drops/R-3.3.1.1-200710231652/download.php?dropFile=swt-3.3.1.1-carbon-macosx.zip">OS X</a></span>,
      <a href="http://download.eclipse.org/eclipse/downloads/drops/R-3.3.1.1-200710231652/index.php#swt" target="_top">more...</a><br>
      <small>3.3.1.1 Final Release - <span style="white-space: nowrap;">25 October 2007</span></small><br>
  <ul>
  <li><a href="R3_3/plan.html">3.3 Development Plan</a></li>
  <li><a href="R3_3/new_and_noteworthy.html">New and Noteworthy</a></li>
  <li><a href="language.php">Language Pack</a></li>
  </ul>
  </table>
<td width="50%" valign="top">
  <table width="100%">
  <tr><td>
      <b><font size="+1">Development</font></b><br>
      <a href="http://download.eclipse.org/eclipse/downloads/drops/S-3.4M5-200802071530/download.php?dropFile=swt-3.4M5-win32-win32-x86.zip">Windows</a>,
      <a href="http://download.eclipse.org/eclipse/downloads/drops/S-3.4M5-200802071530/download.php?dropFile=swt-3.4M5-gtk-linux-x86.zip">Linux</a>,
      <span style="white-space: nowrap;">
      <a href="http://download.eclipse.org/eclipse/downloads/drops/S-3.4M5-200802071530/download.php?dropFile=swt-3.4M5-carbon-macosx.zip">OS X</a></span>,
      <a href="http://download.eclipse.org/eclipse/downloads/drops/S-3.4M5-200802071530/index.php#swt" target="_top">more...</a><br>
      <small>3.4 M5 - <span style="white-space: nowrap;">07 February 2008</span></small><br>
  <ul>
  <li><a href="R3_4/plan.html">3.4 Development Plan</a></li>
  <li><a href="R3_4/new_and_noteworthy.html">New and Noteworthy</a></li>
  </ul>
  </table>
</table>

<table width="100%">
<tr><th bgcolor="#0080c0" align="left" style="padding: 2px;"><font color="#ffffff">Articles</font>
</table>

<ul>
<li><a href="eclipse.php">How to develop SWT applications in Eclipse</a></li>
<li><a href="examples.php">How to run the ControlExample and other SWT examples</a></li>
<li><a href="macosx/">How to deploy SWT applications on Mac OS X</a></li>
<li><a href="jws/">How to deploy SWT applications using Java Web Start</a></li>
<li><a href="cvs.php">How to use SWT from CVS</a></li>
<li><a href="jnigen.php">How to generate the SWT JNI Code</a></li>
<li><a href="opengl/">Using OpenGL in SWT Applications</a></li>
<li><a href="http://www.eclipse.org/articles/index.php?sort=date&category=SWT">Many more articles about SWT</a> on Eclipse Corner at eclipse.org</li>
<li><a href="http://www.eclipse.org/swt/docs.php">Full list of articles and documentation</a></li>
</ul>

<table width="100%">
<tr><th bgcolor="#0080c0" align="left" style="padding: 2px;"><font color="#ffffff">Resources</font>
</table>

<ul>
<li><a href="widgets/">Widget screenshots</a> with links to documentation</li>
<li><a href="snippets/">Snippets</a>, helpful little code examples</li>
<li><a href="examples.php">Examples</a>, helpful big code examples</li>
<li><a href="faq.php">The SWT FAQ</a> answers many common questions</li>
<li><a href="tools.php">Tools and Plug-ins</a> for SWT developers</li>
<li><a href="http://help.eclipse.org/stable/nftopic/org.eclipse.platform.doc.isv/reference/api/overview-summary.html">Online Javadoc</a></li>
<li><a href="docs.php">Books and additional documentation</a></li>
<li><a href="test_plan.html">Test Plan for SWT</a></li>
<li><a href="community.php">SWT Community Page</a></li>
</ul>

<table width="100%">
<tr><th bgcolor="#0080c0" align="left" style="padding: 2px;"><font color="#ffffff">Contact Us</font>
</table>

<p>The <a href="news://news.eclipse.org/eclipse.platform.swt">SWT newsgroup</a>
is a very active user discussion and help forum.
See the
<a href="http://www.eclipse.org/newsgroups/index.html">Eclipse
newsgroups page</a>
[<a href="http://dev.eclipse.org/newslists/news.eclipse.platform.swt/maillist.html">archive</a>,
<a href="http://www.eclipse.org/search/search.cgi">search</a>].</p>

<p>SWT development is discussed and tracked in the
<a href="http://bugs.eclipse.org/bugs/" target="_top">Eclipse bugzilla</a> under the
Platform/SWT component.  You can subscribe to the new bug inbox by
watching <i>platform-swt-inbox@eclipse.org</i> from your
bugzilla email preferences.</p>

<p>If you are modifying or porting SWT and have questions, try the
<a href="http://dev.eclipse.org/mailman/listinfo/platform-swt-dev">SWT developer mailing list</a>
[<a href="http://dev.eclipse.org/mhonarc/lists/platform-swt-dev/maillist.html">archive</a>,
<a href="http://www.eclipse.org/search/search.cgi">search</a>].</p>

<table width="100%">
<tr><th bgcolor="#0080c0" align="left" style="padding: 2px;"><font color="#ffffff">Older Releases</font>
</table>

<ul>
<li><a href="http://download.eclipse.org/eclipse/downloads/drops/R-3.2.2-200702121330/index.php">SWT 3.2.2</a>, 12 February 2007.</li>
<li><a href="http://download.eclipse.org/eclipse/downloads/drops/R-3.2-200606291905/index.php">SWT 3.2</a>, 30 June 2006.</li>
    <ul>
    <li><a href="R3_2/new_and_noteworthy.html">New and Noteworthy</a> items for each milestone</li>
    </ul>
<li><a href="http://archive.eclipse.org/eclipse/downloads/drops/R-3.1.2-200601181600/index.php">SWT 3.1.2</a>, 19 January 2006.
    <ul>
    <li><a href="R3_1/new_and_noteworthy.html">New and Noteworthy</a> items for each milestone</li>
    </ul>
<li><a href="http://archive.eclipse.org/eclipse/downloads/drops/R-3.0.2-200503110845/index.php">SWT 3.0.2</a>, 11 March 2005.</li>
    <ul>
    <li><a href="R3_0/new_and_noteworthy.html">New and Noteworthy</a> items for each milestone</li>
    </ul></li>
</ul>

<table width="100%">
<tr><th bgcolor="#0080c0" align="left" style="padding: 2px;"><font color="#ffffff">Cocoa Port</font>
</table>

<p>We are looking for help with the cocoa port of SWT.
To get started, <a href="http://www.eclipse.org/swt/cvs.php">load SWT from CVS</a> into your eclipse workspace.
The projects you need are:
<ul>
<li>org.eclipse.swt</li>
<li>org.eclipse.swt.cocoa.macosx</li>
<li>org.eclipse.swt.examples (not required, but useful for testing)</li>
</ul>
<p>If you find a bug, <a href="https://bugs.eclipse.org/bugs/enter_bug.cgi?product=Platform&component=SWT">open an eclipse bug report</a>
with <b>Platform: Macintosh</b> and <b>OS: Mac OSX - Cocoa</b>.
Also, you can <a href="https://bugs.eclipse.org/bugs/buglist.cgi?classification=Eclipse&product=Platform&component=SWT&op_sys=Mac+OS+X+-+Cocoa&bug_status=UNCONFIRMED&bug_status=NEW&bug_status=ASSIGNED&bug_status=REOPENED">
pick an interesting bug from here</a>.
Then see if you can figure out how to fix the problem, and if so, attach a patch to the bug report.
Discussion can take place on the <a href="news://news.eclipse.org/eclipse.platform.swt">SWT newsgroup</a>.
</p><p>See Steve Northover's blog for a bit of background:
<ul>
<li><a href="http://inside-swt.blogspot.com/2007/11/hacking-at-apple.html">Hacking at Apple</a></li>
<li><a href="http://inside-swt.blogspot.com/2007/11/great-success.html">Great Success</a></li>
<li><a href="http://inside-swt.blogspot.com/2007/11/ok-community-blow-your-brains-out.html">Call For Volunteers</a></li>
</ul>
</p><p>Thanks to those who are already jumping in and getting their feet wet!
</p>

<td valign="top" width="240px">
<center>
<p><img src="images/vis-example.png" alt="Vista" width="225" height="225"></p>
<p><img src="images/win-example.png" alt="Windows" width="216" height="204"></p>
<p><img src="images/lin-example.png" alt="Linux" width="212" height="224"></p>
<p><img src="images/mac-example.png" alt="Mac OS X" width="232" height="237"></p>
<p><img src="images/mot-example.png" alt="Motif" width="232" height="210"></p>
<p><img src="images/pho-example.png" alt="Photon" width="225" height="227"></p>
</center>
</table>
</body>
</html>