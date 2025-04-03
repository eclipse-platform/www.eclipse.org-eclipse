<?php require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/app.class.php");	require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/nav.class.php"); 	require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/menu.class.php"); 	$App 	= new App();	$Nav	= new Nav();	$Menu 	= new Menu();		include($App->getProjectCommon());

$pageTitle = "Using SWT from CVS";

ob_start();
?>
<div id="midcolumn">
<h1>Using SWT from CVS</h1>

<h1>*** NOTE: SWT has migrated its source to <a href="git.php">GIT</a>. ***</h1>

<p>SWT lives in Eclipse CVS at <a href="http://dev.eclipse.org/viewcvs/">dev.eclipse.org</a>.</p>

<ul>
<li>Anonymous CVS access: <tt>:pserver:anonymous@dev.eclipse.org:/cvsroot/eclipse</tt></li>
<li><a href="http://dev.eclipse.org/viewcvs/">Browse the CVS repository</a> on the web
</ul>

<p>Running with SWT from CVS takes a bit of work to set up for your platform.  Here is a quick guide
to help you get set up.<p>

    <ol>
    <li>First, set up the CVSROOT.  Use <i>File &gt; Import... &gt; CVS &gt;
        Projects from CVS</i> and enter the information for the Eclipse
        CVS server.

        <center><p><img src="images/swt-cvsroot.png" alt="Host: dev.eclipse.org, Repository Path: /cvsroot/eclipse, and User: anonymous"></p></center>

    <li>Next, check out the <b>org.eclipse.swt</b> project, where all
        the Java code lives, along with the correct binary package for
        the DLLs from your platform.

        <center><p><img src="images/swt-checkout.png" alt="Specified modules: org.eclipse.swt, org.eclipse.swt.examples, org.eclipse.swt.gtk.linux.x86"></p></center>

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
        
        <p>You may also want to check out the <b>org.eclipse.swt.examples</b> and <b>org.eclipse.swt.snippets</b> projects.</p>

    <li>SWT has a different Eclipse <b>.classpath</b> file for each
        platform, so we need to set up Eclipse to use the right one.
        To do this we first show the <b>Navigator</b> view
        (<b>Window > Show View > Navigator</b>).

    <p></p>

    <li>Next, we expand <b>org.eclipse.swt</b> and find the
        <b>.classpath_<em>xxx</em></b> file for our platform and copy it to a file named
        <b>.classpath</b>.

        <center><p><img src="images/swt-classpath.png" alt="Name Conflict dialog with .classpath in the New Name field"></p></center>

    <li>After changing a <b>.classpath</b> file, it's usually a good
        idea to clean the projects that depend on it to make sure
        everyone is cool.
        <br>(Note that if you are building for a 64-bit platform, there is an extra step needed.
        Please see <a href="faq.php#gtk64">this FAQ</a> for details).

        <center><p><img src="images/swt-clean.png" alt="Using Project &gt; Clean... to recompile"></p></center>

    <li>We're ready to go!  To test our checkout, let's find an SWT
        application to run.  How about the ControlExample.

        <center><p><img src="images/swt-controlexample.png" alt="org.eclipse.swt.examples.controlexample.ControlExample in the Package Explorer view"></p></center>

    <li>After we've selected the ControlExample.java file, we can run
        it using <b>Run &gt; Run As &gt; Java Application</b>.

        <center><p><img src="images/swt-runas.png" alt="Shift+Alt+X J will also run the selected Java application"></p></center>

    </ol>
    
<p>And there you go!</p>

</div>
<?php 
$html = ob_get_clean();

# Generate the web page
$App->generatePage($theme, $Menu, $Nav, $pageAuthor, $pageKeywords, $pageTitle, $html);
?>