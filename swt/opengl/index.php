<?php require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/app.class.php");	require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/nav.class.php"); 	require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/menu.class.php"); 	$App 	= new App();	$Nav	= new Nav();	$Menu 	= new Menu();		include($App->getProjectCommon());

$pageTitle = "Using OpenGL in SWT Applications";

ob_start();
?>
<div id="midcolumn">
<h1>Using OpenGL in SWT Applications</h1>

<h3>Java OpenGL Bindings (SWT 3.2 and newer)</h3>

<p>Support for OpenGL is included in SWT as of Eclipse 3.2 in the package
<i>org.eclipse.swt.opengl</i>. See the <b>GLCanvas</b> class for
a widget which hosts an OpenGL context.</p>

<p>OpenGL applications use two separate APIs: the window-system
independent drawing API (OpenGL), and a window-system specific
integration layer (WGL under Windows, GLX under X, etc).  SWT
provides a thin layer above the window-system specific integration API,
enabling applications to use their Java OpenGL binding of choice.</p>

<ol>
<li>The <a href="https://www.lwjgl.org/">Lightweight Java Game Library
(LWJGL)</a> is a Java binding for OpenGL which supports OpenGL 2.0 and
many interesting extensions.  For an example using <i>LWJGL</i> with SWT, see
<a href="https://github.com/eclipse-platform/eclipse.platform.swt/tree/master/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet195.java">Snippet 195</a>.
<p></p>
<li><a href="https://jogamp.org/jogl/www/">JOGL</a> is a Java binding for OpenGL.
For an example using <i>JOGL</i> with SWT, see
<a href="https://github.com/eclipse-platform/eclipse.platform.swt/tree/master/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet209.java">Snippet 209</a>.
<p></p>
<li><a href="http://gljava.sourceforge.net/">gljava</a> is a Java binding
for OpenGL which aims to be simple and thin.  <i>gljava</i> is reported to work
well with SWT.
<p></p>
</ol>

<h3>The Experimental org.eclipse.opengl Binding (pre-SWT 3.2)</h3>

<p>Prior to Eclipse 3.2 there were experimental packages (available below) that facilitated the use of OpenGL in SWT.
To run the OpenGL view example, simply extract the zip and the
<i>org.eclipse.opengl</i> plugin to your Eclipse plugins folder. To run the standalone
example, download the examples zip along with the <i>org.eclipse.opengl</i> zip for
your platform and import them into your workspace.  There is also a stand-alone snippet that uses this package
(<a href="https://github.com/eclipse-platform/eclipse.platform.swt/tree/master/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet174.java">Snippet 174</a>).
</p>

<p><b>If you are using SWT 3.2 or newer then you should use the supported OpenGL binding that is
included in the SWT package instead of these experimental downloads which are not supported.</b></p>

<table width="100%">
<tr><th bgcolor="#0080c0" align="left" style="padding: 2px;"><font color="#ffffff">&nbsp; Deprecated OpenGL Binding for SWT (Experimental)</font>
</table>

<table width="100%" cellpadding="3px">
<tr><td valign="top"><span style="white-space: nowrap;">28 Sep 2005</span>
    <td valign="top">Windows
    <td valign="top"><a href="eclipse-opengl-0.5.0-win32.zip">eclipse-opengl-0.5.0-win32.zip</a>
<tr><td valign="top"><span style="white-space: nowrap;">28 Sep 2005</span>
    <td valign="top">Linux x86
    <td valign="top"><a href="eclipse-opengl-0.5.0-linux-x86.zip">eclipse-opengl-0.5.0-linux-x86.zip</a>
<tr><td valign="top"><span style="white-space: nowrap;">28 Sep 2005</span>
    <td valign="top">MacOS X
    <td valign="top"><a href="eclipse-opengl-0.5.0-macosx.zip">eclipse-opengl-0.5.0-macosx.zip</a>
<tr><td valign="top"><span style="white-space: nowrap;">28 Sep 2005</span>
    <td valign="top">Example applications
    <td valign="top"><a href="org.eclipse.swt.opengl.examples_0.5.0.zip">org.eclipse.swt.opengl.examples_0.5.0.zip</a>
<tr><td valign="top"><span style="white-space: nowrap;">28 Sep 2005</span>
    <td valign="top">Example plugin with a view that uses OpenGL
    <td valign="top"><a href="org.eclipse.swt.examples.openglview_0.5.0.zip">org.eclipse.swt.examples.openglview_0.5.0.zip</a>
<tr><td>&nbsp;<td><td>
<tr><th colspan="3" bgcolor="#0080c0" align="left" style="padding: 2px;"><font color="#ffffff">&nbsp; Deprecated OpenGL Binding for SWT 3.1</font>
<tr><td valign="top"><span style="white-space: nowrap;">10 Nov 2004</span>
    <td valign="top">Experimental OpenGL plugins for SWT 3.1
    <td valign="top"><a href="opengl.html">old implementation</a>
</table>

</div>
<?php 
$html = ob_get_clean();

# Generate the web page
$App->generatePage($theme, $Menu, $Nav, $pageAuthor, $pageKeywords, $pageTitle, $html);
?>