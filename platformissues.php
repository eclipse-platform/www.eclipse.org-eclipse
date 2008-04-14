<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
    <title>Known Platform Issues</title>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
    <link rel="stylesheet" href="http://dev.eclipse.org/default_style.css" type="text/css">
    <link rel="stylesheet" href="swt.css" type="text/css">
    <link rel="shortcut icon" href="http://www.eclipse.org/images/eclipse.ico" type="image/x-icon">
    <style type="text/css"> dt { padding-top: 20px; padding-bottom: 5px; } </style>
</head>
<body bgcolor="#ffffff" text="#000000">
<table width="825px" class="swtpage">
<colgroup><col width="125px"><col width="700px"></colgroup>
<tr><?php include "sidebar.php"; ?>
<td valign="top" style="padding: 10px"><h1 style="padding: 0; margin: 0; border-bottom: 1px solid #000000;">Known Platform Issues</h1>

<p>If you have issues you believe should go in here, please let us know on
the <a href="http://dev.eclipse.org/mailman/listinfo/platform-swt-dev">SWT developer mailing list</a>.</p>

<p><b>Linux</b></p>
<ul>
  <li><a href="#copyandpaste">Why am I having problems with cut and paste?</a></li>
  <li><a href="#supportJavaBeans">Does SWT support JavaBeans?</a></li>
  <li><a href="#guibuilder">Is there a GUI Builder for SWT?</a></li>
  <li><a href="#whatisasnippet">What is a snippet and why do I care?</a></li>
  <li><a href="#swtsource">Where do I find the SWT source?</a></li>
  <p></p>
</ul>

<p></p>
<hr>
<p></p>

<dl>
  <dt><strong><a name="whatpackagesinSWT"> Q: Why am I having problems with cut and paste?</a></strong></dt>
  <dd>A: Running Klipper in the background can interfere with copy/paste. 
  </dd>

  <dt><strong><a name="supportJavaBeans">Q: Does SWT support JavaBeans?</a></strong></dt>
  <dd>A: To the extent that it makes sense, given the constraints of operating system
    compatibility, SWT mirrors the beans behavior. An example of this is the use
    of standard beans mechanisms for event dispatch (EventListener, EventObject and adapter
    classes). Some aspects of the beans paradigm, such as the ability to create beans with
    null constructors, run counter to the constraints of the underlying operating systems
    that SWT runs on.  For example, operating systems do not typically support creating a
    widget without specifying its parent. 
    <p></p>
    The essence of the problem is that if you allow a widget to be created with a null
    constructor, then you can't actually create the o/s resources at the time the constructor
    runs (you would have to wait until later, after the parent has been set). We can not
    do this, since we <em>always</em> create the o/s resources in the constructor, and for
    performance/efficiency/consistency reasons do not keep slots in the object to hold
    whatever state would be required if the object were to be created later. 
  </dd>

  <dt><strong><a name="guibuilder">Q: Is there a GUI Builder for SWT?</a></strong></dt>
  <dd>A: SWT itself does not provide a GUI Builder (also known as "GUI Designer", "GUI Editor",
  "Visual Builder", "Visual Designer", "Visual Editor", or "Visual Composition Editor").
  There are, however, several mature 'third-party' products listed at
  <a href="http://www.eclipseplugincentral.com/">http://www.eclipseplugincentral.com/</a>.
  Or you can follow the progress on the <a href="http://www.eclipse.org/vep/">Eclipse Visual Editor Project</a>.
  </dd>

  <dt><strong><a name="whatisasnippet">Q: What is a snippet and why do I care?</a></strong>
  </dt>
  <dd>A: A snippet is a <em>minimal stand alone</em> program that demonstrates functionality or
  	lack of functionality.  
  	
  	<p>Why is this important?  Posting a snippet to the news group is the
  	quickest way to get help.  Including a snippet in a bug report is the fastest
  	way to get a bug fixed.  Taking the time to construct a snippet helps you understand
  	the API of the library you are calling and focuses your thinking.  For example, the
  	SWT team uses C and Java snippets internally to prove or disprove problems in the operating system.
	Often, something you think is a bug is actually caused by something elsewhere
	in your program.  
	
	<p>Snippets isolate problems.  Code speaks louder than words.  
	
	<p>Here is a minimal stand alone SWT program to help you get started:
<pre>public static void main (String [] args) {
    Display display = new Display ();
    Shell shell = new Shell (display);
    shell.open ();
    while (!shell.isDisposed ()) {
        if (!display.readAndDispatch ()) display.sleep ();
    }
    display.dispose ();
}</pre>
    
	For a list of sample snippets, see the <a href="snippets">SWT snippets page</a>.
  </dd>

  <dt><strong><a name="swtsource">Q: Where do I find the SWT source?</a></strong>
  <dd>A: SWT's source can be retrieved directly from CVS as described in <a href="http://www.eclipse.org/swt/cvs.php">Using SWT from CVS</a>.  It's also included
      in eclipse as follows:
      <ul>
        <li>eclipse 3.4 and newer: <code>plugins/org.eclipse.swt.<em>&lt;ws&gt;</em>.<em>&lt;os&gt;</em>.<em>&lt;arch&gt;</em>.source_<em>X.X.X.&lt;version&gt;</em>.jar</code></li>
        <li>eclipse 3.3.2 and earlier: directory <code>plugins/org.eclipse.rcp.source.<em>&lt;os&gt;</em>.<em>&lt;ws&gt;</em>.<em>&lt;arch&gt;</em>_<em>X.X.X.&lt;version&gt;</em>/src/</code></li>
      </ul>
  </dd>
  
</dl>
</table>
</body>
</html>