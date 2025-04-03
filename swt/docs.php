<?php require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/app.class.php");	require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/nav.class.php"); 	require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/menu.class.php"); 	$App 	= new App();	$Nav	= new Nav();	$Menu 	= new Menu();		include($App->getProjectCommon());

$pageTitle = "SWT Documentation";

ob_start();
?>
<div id="midcolumn">
<h1>SWT Documentation</h1>

<p>This page contains links to books, tutorials, and articles about SWT.</p>

<div class="homeitem">
<h2>SWT in Books</h2>

<p>SWT is in print in the following books.</p>

<ul>
   <li><a href="https://www.amazon.com/exec/obidos/tg/detail/-/0321256638/qid=1088631104/sr=8-3/ref=sr_8_xs_ap_i3_xgl14/104-7716812-0314361?v=glance&amp;s=books&amp;n=507846">
       <em>"SWT: The Standard Widget Toolkit, Volume 1"</em></a> by Steve Northover and Mike Wilson
       <br>This book can be read online at the
       <a href="https://safari.informit.com/9780321256638">publisher's web site</a>.</li>
   <li><a href="https://www.amazon.com/exec/obidos/tg/detail/-/1590593251/qid=1088631104/sr=8-1/ref=pd_ka_1/104-7716812-0314361?v=glance&amp;s=books&amp;n=507846">
       <em>"The Definitive Guide to SWT and JFace"</em></a> by Rob Warner and Robert Harris</li>
   <li><a href="https://www.amazon.com/exec/obidos/ASIN/0321305027">
       <em>"The Java Developer's Guide to Eclipse, Second Edition"</em></a> by Jim D'Anjou, Scott Fairbrother, Dan Kehn, John Kellerman, and Pat McCarthy (Chapter 14)</li>
   <li><a href="https://www.amazon.com/exec/obidos/tg/detail/-/0321205758/qid=1075410339//ref=sr_8_xs_ap_i1_xgl14/002-9415319-6500833?v=glance&amp;s=books&amp;n=507846">
       <em>"Contributing to Eclipse: Principles, Patterns, and Plugins"</em></a> by Erich Gamma and Kent Beck (Chapter 34)</li>
   <li><a href="https://www.amazon.com/exec/obidos/tg/detail/-/1930110960/qid=1075410470//ref=sr_8_xs_ap_i1_xgl14/002-9415319-6500833?v=glance&amp;s=books&amp;n=507846">
       <em>"Eclipse in Action: A Guide for the Java Developer"</em></a> by David Gallardo, Ed Burnette, and Robert McGovern (Appendix D)</li>
   <li><a href="https://www.amazon.com/Eclipse-Rich-Client-Platform-Applications/dp/0321334612/ref=pd_sim_b_title_2">
       <em>"Eclipse Rich Client Platform: Designing, Coding, and Packaging Java(TM) Applications"</em></a> by Jeff McAffer and Jean-Michel Lemieux</li>
   <li><a href="https://www.amazon.com/Eclipse-Building-Commercial-Quality-Plug-ins-2nd/dp/032142672X/ref=pd_sim_b_title_3">
       <em>"Eclipse: Building Commercial-Quality Plug-ins"</em></a> by Eric Clayberg and Dan Rubel</li>
   <li><a href="https://www.amazon.com/SWT-JFace-Action-Design-Eclipse/dp/1932394273/ref=pd_sim_b_title_4">
       <em>"SWT/JFace in Action: GUI Design with Eclipse 3.0"</em></a> by Matthew Scarpino, Stephen Holder, Stanford Ng and Laurent Mihalkovic</li>
   <li><a href="https://safari.informit.com/0596006411">
       <em>"Eclipse"</em></a> and <a href="https://safari.informit.com/0596007108">
       <em>"Eclipse Cookbook"</em></a> by Steve Holzner</li>
</ul>
</div>

<div class="homeitem">
<h2>SWT Documentation Inside Eclipse</h2>

<p>The Eclipse Help system contains good solid documentation for SWT in
the <em>Platform Plug-in Developer Guide</em>. To get there in Eclipse, select
<br><strong>Help</strong> &gt; <strong>Help Contents</strong> &gt;
<strong>Platform Plug-in Developer Guide</strong>.</p>

<p>SWT documentation appears in the following sections of the
<em>Platform Plug-in Developer Guide</em>:</p>
<ul>
  <li>Programmer's Guide: Standard Widget Toolkit</li>
  <li>Reference: API Reference: org.eclipse.swt.* (javadoc for each package)</li>
  <li>Examples Guide: Standard Widget Toolkit</li>
</ul>
</div>

<div class="homeitem">
<h2>SWT Online Documentation</h2>

<p>In addition to reading SWT documentation inside Eclipse, you can read it online here:</p>
  <ul>
    <li><a href="https://help.eclipse.org/topic/org.eclipse.platform.doc.isv/guide/swt.htm">Programmer's Guide</a></li>
    <li><a href="https://help.eclipse.org/index.jsp?topic=/org.eclipse.platform.doc.isv/reference/api/org/eclipse/swt/package-summary.html">API Reference</a></li>
    <li><a href="https://help.eclipse.org/topic/org.eclipse.platform.doc.isv/samples/samples.html">Examples Guide</a></li>
	<li><a href="javadoc.php">Online javadoc</a></li>
	<li><a href="https://www.eclipse.org/documentation/">Older versions of the Eclipse documentation</a></li>
  </ul>
</div>

<div class="homeitem">
<h2>SWT Articles at eclipse.org and eclipse.org/swt</h2>

<h4>Articles at eclipse.org:</h4>

  <ul>
	<li><a href="https://www.eclipse.org/articles/index.php?sort=date&category=SWT">Articles about SWT</a> on Eclipse Corner at eclipse.org (20 at last count)</li>
  </ul>

<h4>Articles at eclipse.org/swt:</h4>

  <ul>
	<li><a href="eclipse.php">How to develop SWT applications in Eclipse</a></li>
	<li><a href="examples.php">How to run the ControlExample and other SWT examples</a></li>
	<li><a href="macosx/">How to deploy SWT applications on Mac OS X</a></li>
	<li><a href="macgen.php">How to generate the SWT JNI Code for Cocoa</a></li>
	<li><a href="jws/">How to deploy SWT applications using Java Web Start</a></li>
	<li><a href="git.php">How to use SWT from GIT</a></li>
	<li><a href="jnigen.php">How to generate the SWT JNI Code</a></li>
	<li><a href="opengl/">Using OpenGL with SWT 3.2</a></li>
	<li><a href="fixbugs.php">How to fix a bug in SWT</a></li>
  </ul>
</div>

<div class="homeitem">
<h2>More Articles about SWT</h2>

<p>External articles, interviews in online journals:</p>

<ul>
<li>SWT articles published in OS News:
  <ul>
    <li><a href="https://www.osnews.com/story.php/10883/Desktop-Java-with-SWT-an-interview-with-Steve-Northover/">Desktop Java with SWT: an interview with Steve Northover</a></li>
  </ul>
  <p></p>

<li>SWT articles on IBM Developerworks Library:
  <ul>
    <li><a href="https://www.ibm.com/developerworks/opensource/library/os-ecca/index.html">Equipping SWT applications with content assistants</a></li>
  </ul>
</ul>
</div>

<div class="homeitem">
<h2>SWT Online Tutorials</h2>

<p>There have been a few tutorials posted about SWT that you may find useful:</p>

<ul>
	<li><a href="https://www.cs.umanitoba.ca/~eclipse/">Getting Started with Eclipse and SWT</a></li>
	
		<p>This site contains some tutorials and example programs that will help programmers who are 
		new to Eclipse and the Standard Widget Toolkit (SWT) install Eclipse correctly and run some 
		simple Java/SWT programs.</p>

	<li><a href="https://www.cs.umanitoba.ca/~eclipse/6-Compiling.pdf">Compiling Eclipse Applications for Windows With GCJ/MinGW</a></li>
	
		<p>A guide for compiling an SWT application into an executable.</p>
	
	<li><a href="https://www.javalobby.org/eps/swt_intro/">An introduction to SWT</a></li>
	
		<p>Adapted from "SWT and JFace", a No Fluff Just Stuff 2004 presentation.</p>
</ul>
</div>

</div>
<?php 
$html = ob_get_clean();

# Generate the web page
$App->generatePage($theme, $Menu, $Nav, $pageAuthor, $pageKeywords, $pageTitle, $html);
?>
