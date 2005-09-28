<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
    <title>Using OpenGL in SWT Applications</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="Content-Style-Type" content="text/css">
    <link rel="stylesheet" href="http://dev.eclipse.org/default_style.css" type="text/css">
    <link rel="stylesheet" href="http://www.eclipse.org/swt/swt.css" type="text/css">
    <link rel="shortcut icon" href="http://www.eclipse.org/images/eclipse.ico" type="image/x-icon">
</head>
<body bgcolor="#ffffff" text="#000000">
<table width="875px" class="swtpage">
<colgroup><col width="125px"><col width="750px"></colgroup>
<tr><?php include "../sidebar.php"; ?>
<td valign="top" style="padding: 10px"><h1 style="padding: 0; margin: 0; border-bottom: 1px solid #000000;">Using OpenGL in SWT Applications</h1>

<p>Support for OpenGL is included in SWT 3.2 in the package
<i>org.eclipse.swt.opengl</i>.</p>

<p>OpenGL applications use two separate APIs: the window-system
independent drawing API (OpenGL), and a window-system specific
integration layer (WGL under Windows, GLX under X, etc).  SWT
provides a thin layer above the window-system specific integration API,
enabling applications to use their Java OpenGL binding of choice.</p>

<h3>Java OpenGL Bindings</h3>

<ol>
<li>The <a href="http://www.lwjgl.org/">Lightweight Java Game Library
(LWJGL)</a> is a Java binding to OpenGL which supports OpenGL 2.0 and
many interesting extensions.  For an example using <i>LWJGL</i> with SWT, see
<a href="http://dev.eclipse.org/viewcvs/index.cgi/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet195.java?rev=HEAD&amp;content-type=text/vnd.viewcvs-markup">Snippet 195</a>.
<p></p>
<li><a href="http://gljava.sourceforge.net/">gljava</a> is a Java binding
for OpenGL which aims to be simple and thin.  <i>gljava</i> is reported to work
well with SWT.
<p></p>
<li><a href="http://jogl.dev.java.net/">JOGL</a> is a Java binding for OpenGL.
<a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=110757">Bug #110757</a>
is tracking support for using <i>JOGL</i> with SWT.
<p></p>
<li><i>org.eclipse.opengl</i> is an experimental Java binding
for OpenGL 1.1 and GLU built as an Eclipse plugin. This is useful for
simple OpenGL applications that do not require a more complete binding.  For an
example using this binding, see
<a href="http://dev.eclipse.org/viewcvs/index.cgi/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet174.java?rev=HEAD&amp;content-type=text/vnd.viewcvs-markup">Snippet 174</a>.
<p></p>
</ol>

<h3>Examples using the org.eclipse.opengl binding</h3>

<p>To run the examples below, download the examples zip along with
the <i>org.eclipse.opengl</i> zip for your platform and import them using
the <i>Existing Projects into Workspace</i> wizard.</p>

<table width="100%">
<tr><th bgcolor="#0080c0" align="left" style="padding: 2px;"><font color="#ffffff">&nbsp; Experimental OpenGL Binding</font>
</table>

<table width="100%" cellpadding="3px">
<tr><td valign="top"><span style="white-space: nowrap;">27 Sep 2005</span>
    <td valign="top">Experimental Java binding plugin for Win32
    <td valign="top"><a href="eclipse-opengl-3.1.0-win32.zip">eclipse-opengl-3.1.0-win32.zip</a>
<tr><td valign="top"><span style="white-space: nowrap;">27 Sep 2005</span>
    <td valign="top">Experimental Java binding plugin for Linux x86
    <td valign="top"><a href="eclipse-opengl-3.1.0-linux-x86.zip">eclipse-opengl-3.1.0-linux-x86.zip</a>
<tr><td valign="top"><span style="white-space: nowrap;">27 Sep 2005</span>
    <td valign="top">Experimental Java binding plugin for Linux x86-64
    <td valign="top"><a href="eclipse-opengl-3.1.0-linux-x86-64.zip">eclipse-opengl-3.1.0-linux-x86-64.zip</a>
<tr><td valign="top"><span style="white-space: nowrap;">27 Sep 2005</span>
    <td valign="top">Experimental Java binding plugin for MacOS X
    <td valign="top"><a href="eclipse-opengl-3.1.0-macosx.zip">eclipse-opengl-3.1.0-macosx.zip</a>
<tr><td valign="top"><span style="white-space: nowrap;">27 Sep 2005</span>
    <td valign="top">Example applications
    <td valign="top"><a href="org.eclipse.swt.opengl.examples_3.2.0.zip">org.eclipse.swt.opengl.examples_3.2.0.zip</a>
<tr><td valign="top"><span style="white-space: nowrap;">27 Sep 2005</span>
    <td valign="top">Example plugin with a view that uses OpenGL
    <td valign="top"><a href="org.eclipse.swt.examples.openglview_3.2.0.zip">org.eclipse.swt.examples.openglview_3.2.0.zip</a>
<tr><td>&nbsp;<td><td>
<tr><th colspan="3" bgcolor="#0080c0" align="left" style="padding: 2px;"><font color="#ffffff">&nbsp; Deprecated OpenGL Binding</font>
<tr><td valign="top"><span style="white-space: nowrap;">10 Nov 2004</span>
    <td valign="top">Experimental OpenGL plugins for SWT 3.1
    <td valign="top"><a href="opengl.html">old implementation</a>
</table>

</table>
</body>
</html>
