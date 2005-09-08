<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
    <title>SWT Resources and Links</title>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
    <link rel="stylesheet" href="http://dev.eclipse.org/default_style.css" type="text/css">
    <link rel="stylesheet" href="swt.css" type="text/css">
    <link rel="shortcut icon" href="http://www.eclipse.org/images/eclipse.ico" type="image/x-icon">
</head>
<body bgcolor="#ffffff" text="#000000">
<table width="635px" style="border-bottom: 1px solid #000000;">
<colgroup><col width="125px"><col width="510px"></colgroup>
<tr><?php include "sidebar.php"; ?>
<td valign="top" style="padding: 10px"><h1 style="padding: 0; margin: 0; border-bottom: 1px solid #000000;">SWT Resources and Links</h1>

<p>This page contains links and references to books, tutorials, and
articles about SWT.</p>

<table width="100%">
<tr><th bgcolor="#0080c0" align="left" style="padding: 2px;"><font color="#ffffff">SWT in Books</font>
</table>

<p>SWT is in print in the following books.</p>

<ul>
   <li><a href="http://www.amazon.com/exec/obidos/tg/detail/-/0321256638/qid=1088631104/sr=8-3/ref=sr_8_xs_ap_i3_xgl14/104-7716812-0314361?v=glance&amp;s=books&amp;n=507846">
       <em>"SWT: The Standard Widget Toolkit, Volume 1"</em></a> by Steve Northover and Mike Wilson</li>
   <li><a href="http://www.amazon.com/exec/obidos/tg/detail/-/1590593251/qid=1088631104/sr=8-1/ref=pd_ka_1/104-7716812-0314361?v=glance&amp;s=books&amp;n=507846">
       <em>"The Definitive Guide to SWT and JFace"</em></a> by Rob Warner and Robert Harris</li>
   <li><a href="http://www.amazon.com/exec/obidos/ASIN/0321305027">
       <em>"The Java Developer's Guide to Eclipse, Second Edition"</em></a> by Jim D'Anjou, Scott Fairbrother, Dan Kehn, John Kellerman, and Pat McCarthy (Chapter 14)</li>
   <li><a href="http://www.amazon.com/exec/obidos/tg/detail/-/0321205758/qid=1075410339//ref=sr_8_xs_ap_i1_xgl14/002-9415319-6500833?v=glance&amp;s=books&amp;n=507846">
       <em>"Contributing to Eclipse: Principles, Patterns, and Plugins"</em></a> by Erich Gamma and Kent Beck (Chapter 34)</li>
   <li><a href="http://www.amazon.com/exec/obidos/tg/detail/-/1930110960/qid=1075410470//ref=sr_8_xs_ap_i1_xgl14/002-9415319-6500833?v=glance&amp;s=books&amp;n=507846">
       <em>"Eclipse in Action: A Guide for the Java Developer"</em></a> by David Gallardo, Ed Burnette, and Robert McGovern (Appendix D)</li>
</ul>

<table width="100%">
<tr><th bgcolor="#0080c0" align="left" style="padding: 2px;"><font color="#ffffff">SWT Documentation Inside Eclipse</font>
</table>

<p>The Eclipse Help system contains good solid documentation for SWT in
the <em>Platform Plug-in Developer Guide</em>. To get there in Eclipse,
select <strong>Help</strong> &gt; <strong>Help Contents</strong> &gt;
<strong>Platform Plug-in Developer Guide</strong>.</p>

<p>You can also get this document <a
href="http://www.eclipse.org/documentation/main.html">in PDF
format</a>.</p>

<p>SWT documentation appears in the following sections of the
<em>Platform Plug-in Developer Guide</em>:</p>
<ul>
  <li>Programmer's Guide: Standard Widget Toolkit</li>
  <li>Reference: API Reference: org.eclipse.swt</li>
  <li>Examples Guide: Standard Widget Toolkit</li>
</ul>

<table width="100%">
<tr><th bgcolor="#0080c0" align="left" style="padding: 2px;"><font color="#ffffff">More articles about SWT</font>
</table>

<ul>
<li>SWT articles published in JDJ:
  <ul>
    <li><a href="http://www.sys-con.com/story/?storyid=37463&amp;DE=1">SWT: A Native Widget Toolkit for Java, Part 1 of 2</a></li>
    <li><a href="http://www.sys-con.com/story/?storyid=37509&amp;DE=1">SWT: A Native Widget Toolkit for Java, Part 2 of 2</a></li>
  </ul>
  <p></p>

<li>SWT articles on IBM Developerworks Library:
  <ul>
    <li><a href="http://www-106.ibm.com/developerworks/opensource/library/os-ecgui1/">Using the Eclipse GUI outside the Eclipse Workbench</a></li>
    <li><a href="http://www-106.ibm.com/developerworks/opensource/library/os-activex/">Integrate ActiveX controls into SWT applications</a></li>
    <li><a href="http://www-106.ibm.com/developerworks/opensource/library/os-ecca/">Equipping SWT applications with content assistants</a></li>
  </ul>
</ul>

<table width="100%">
<tr><th bgcolor="#0080c0" align="left" style="padding: 2px;"><font color="#ffffff">SWT Online Tutorials</font>
</table>

<p>There have been a few tutorials posted about SWT which you may find useful.</p>

<ul>
  <li><a href="http://www.cs.umanitoba.ca/~eclipse/">Getting Started
       with Eclipse and SWT</a> from the University of Manitoba.
</ul>

<table width="100%">
<tr><th bgcolor="#0080c0" align="left" style="padding: 2px;"><font color="#ffffff">SWT Examples</font>
</table>

<p>Full-blown examples that can be downloaded from the eclipse download
page.  The examples in package org.eclipse.swt.examples run standalone,
and the examples in org.eclipse.swt.examples.* packages are eclipse
plug-ins.</p>
<ul>
  <li>To get the examples, first go to the eclipse download page: <a href="http://download.eclipse.org/downloads/index.php">
      http://download.eclipse.org/downloads/index.php</a></li>
  <li>Then click on the eclipse build that you would like examples for
      (i.e. the eclipse build that you are running; typically the latest Stable Build).</li>
  <li>Then scroll down until you see "Example Plug-ins". Read the paragraph on installing them, and select the download for your platform.</li>
  <li>After installing the examples, the source for them will be in a src.zip file in the
      appropriate subdirectory of: eclipse/plugins/org.eclipse.sdk.examples.source_&lt;version&gt;/src/
      <br>For example, the 3.1 source for the standalone examples in org.eclipse.swt.examples is in: org.eclipse.sdk.examples.source_3.1.0/src/org.eclipse.swt.examples_3.1.0/swtexamplessrc.zip.</li>
  <li>To run the plug-in SWT examples, restart eclipse, go to <i>Window &gt; Show View... &gt; Other...</i> and expand "SWT Examples".</li>
</ul>

</table>
</body>
</html>
