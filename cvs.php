<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
    <title>Using SWT from CVS</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="Content-Style-Type" content="text/css">
    <link rel="stylesheet" href="http://dev.eclipse.org/default_style.css" type="text/css">
    <link rel="stylesheet" href="swt.css" type="text/css">
    <link rel="shortcut icon" href="http://www.eclipse.org/images/eclipse.ico" type="image/x-icon">
</head>
<body bgcolor="#ffffff" text="#000000">
<table width="875px" class="swtpage">
<colgroup><col width="125px"><col width="750px"></colgroup>
<tr><?php include "sidebar.php"; ?>
<td valign="top" style="padding: 10px"><h1 style="padding: 0; margin: 0; border-bottom: 1px solid #000000;">Using SWT from CVS</h1>

<p>SWT lives in Eclipse CVS at <a href="http://dev.eclipse.org/viewcvs/">dev.eclipse.org</a>.</p>

<ul>
<li>Anonymous CVS access: <tt>:pserver:anonymous@dev.eclipse.org:/cvsroot/eclipse</tt></li>
<li><a href="http://dev.eclipse.org/viewcvs/">Browse the CVS repository</a> on the web
</ul>

<p>Running with SWT from CVS takes a bit of work to set up for your platform.  Here is a quick guide
to help you get set up.<p>

    <ol>
    <li>First, set up the CVSROOT.  Use <i>File &gt; Import... &gt;
        Checkout Projects from CVS</i> and add enter the information for the Eclipse
        CVS server.

        <center><p><img src="images/swt-cvsroot.png" alt="cvsroot"></p></center>

    <li>Next, check out the <b>org.eclipse.swt</b> project, where all
        the Java code lives, along with the correct binary package for
        the DLLs from your platform.

        <center><p><img src="images/swt-checkout.png" alt="checkout"></p></center>

        <p>Each platform has a module for the binaries categorized by
        toolkit, OS, and CPU architecture.  Examples:</p>

        <table style="border-collapse: collapse; border: 1px solid #000000; margin-left: auto; margin-right: auto; padding: 0px;" width="80%">
        <tr><th style="background: #0080c0; color: #ffffff; border: solid 1px #000000; padding: 4px;">Windows
            <td style="border: 1px solid #000000; padding: 4px; text-align: center;">org.eclipse.swt.win32.win32.x86
        <tr><th style="background: #0080c0; color: #ffffff; border: solid 1px #000000; padding: 4px;">Mac OS X
            <td style="border: 1px solid #000000; padding: 4px; text-align: center;">org.eclipse.swt.cocoa.macosx
            <tr><th style="background: #0080c0; color: #ffffff; border: solid 1px #000000; padding: 4px;">Linux GTK
            <td style="border: 1px solid #000000; padding: 4px; text-align: center;">org.eclipse.swt.gtk.linux.x86
        <tr><th style="background: #0080c0; color: #ffffff; border: solid 1px #000000; padding: 4px;">Linux Motif
            <td style="border: 1px solid #000000; padding: 4px; text-align: center;">org.eclipse.swt.motif.linux.x86
        </table><p></p>

    <li>SWT has a different Eclipse <b>.classpath</b> file for each
        platform, so we need to set up Eclipse to use the right one.
        To do this we first show the <b>Navigator</b> view
        (<b>Window > Show View > Navigator</b>).

    <p></p>

    <li>Next, we expand <b>org.eclipse.swt</b> and find the
        <b>.classpath_<em>xxx</em></b> file for our platform and copy it to a file named
        <b>.classpath</b>.

        <center><p><img src="images/swt-classpath.png" alt="classpath"></p></center>

    <li>After changing a <b>.classpath</b> file, it's usually a good
        idea to clean the projects that depend on it to make sure
        everyone is cool.
        <br>(Note that if you are building for a 64-bit platform, there is an extra step needed.
        Please see <a href="http://www.eclipse.org/swt/faq.php#gtk64">this FAQ</a> for details).

        <center><p><img src="images/swt-clean.png" alt="classpath"></p></center>

    <li>We're ready to go!  To test our checkout, let's find an SWT
        application to run.  How about the ControlExample.

        <center><p><img src="images/swt-controlexample.png" alt="controlexample"></p></center>

    <li>After we've selected the ControlExample.java file, we can run
        it using <b>Run &gt; Run As &gt; Java Application</b> from the menu.

        <center><p><img src="images/swt-runas.png" alt="runas"></p></center>

    </ol>
    
<p>And there you go!</p>

</table>
</body>
</html>