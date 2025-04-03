<?php require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/app.class.php");	require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/nav.class.php"); 	require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/menu.class.php"); 	$App 	= new App();	$Nav	= new Nav();	$Menu 	= new Menu();		include($App->getProjectCommon());

$pageTitle = "Deploying SWT Applications on Mac OS X";

ob_start();
?>
<div id="midcolumn">
<h1>Deploying SWT Applications on Mac OS X</h1>

    <p>Under Mac OS X, applications are stored in an <b>application
    bundle</b>, which is simply a directory containing the executable and
    any associated resources for an application.  An application bundle
    has the extension <tt>.app</tt> and appears as a single file in the
    Finder.</p>

    <p>These application bundles are usually distributed inside
    compressed <b>disk images</b> with the extension <tt>.dmg</tt>.
    Disk images are automatically mounted on download, presenting
    the user with the bundle icon so it can be dragged to their Applications
    folder.  More information on application
    bundles and disk images can be found in Apple documentation.</p>

    <center><table>
    <tr><td><a href="SWTHello.dmg"><img style="display: block; text-align: center; margin: auto;" src="dmgicon.png" border="0" alt="SWTHello.dmg"></a>
    <tr><td><a href="SWTHello.dmg">Download SWTHello</a> (1.4MB)
    </table></center>

    <p><a href="SWTHello.dmg">SWTHello.dmg</a> is a disk image of a simple
    SWT Hello World application.</p>

    <h3>What's in the .app directory</h3>

    <p>The SWTHello.app directory contains the following files:</p>

    <table style="border: solid 1px #000000; margin-left: auto; margin-right: auto; padding: 10px;" bgcolor="#eeeeff">
    <tr><td><tt>SWTHello.app/Contents/Info.plist<br>
    SWTHello.app/Contents/Resources/swthello.icns<br>
    SWTHello.app/Contents/MacOS/swthello<br>
    SWTHello.app/Contents/MacOS/SWTHello.class<br>
    SWTHello.app/Contents/MacOS/swt/libswt-*.jnilib<br>
    SWTHello.app/Contents/MacOS/swt/swt.jar</tt></table>

    <p><a href="Info.plist">Info.plist</a> is an XML file describing
    the application name and description, vendor, icon, and executable
    to run.  The <i>Property List Editor</i> application can be used to
    edit this file.  The <tt>.icns</tt> file is our icon, and
    <tt>swthello</tt> is a small shell script.  The SWT <tt>.jar</tt>
    and <tt>.jnilib</tt> files are from the Mac OS X download of SWT
    from the <a href="/swt/">SWT homepage</a>.</p>

    <h3>Launching the application</h3>

    <p>In the SWTHello example, a small shell script is used as the
    executable to run.  This allows us to easily launch Java with
    any required options.</p>

<table style="border: solid 1px #000000; margin-left: auto; margin-right: auto; padding: 10px;" bgcolor="#eeeeff">
<tr><td><pre style="margin: auto;">#!/bin/sh
BASEDIR=`dirname $0`
exec java \
     -d64 \
     -XstartOnFirstThread \
     -classpath $BASEDIR/swt/swt.jar:$BASEDIR \
     SWTHello</pre></td></tr></table>

    <br>(NOTE: If you are using eclipse 3.2.2 or earlier, you also need <code>-Djava.library.path=..</code>)
	
    <p>The shell script launches java with the required classpath and Java
    library path settings to use SWT.  The <code>-d64</code> switch ensures
    that the 64-bit JVM is used; if swt.jar contains either the Carbon or
    32-bit Cocoa port of SWT then <code>-d32</code> should be specified instead.
    The special VM option <code>-XstartOnFirstThread</code>
    is also required for SWT applications to run properly on the Mac.</p>

    <h3>Creating a disk image</h3>

    <p>Disk images can be created on the command line using <tt>hdiutil</tt>
    or graphically using the <i>Disk Utility</i> application.</p>

    <table style="border: solid 1px #000000; margin-left: auto; margin-right: auto; padding: 10px;" bgcolor="#eeeeff">
    <tr><td><tt>hdiutil create -srcfolder SWTHello SWTHello.dmg<br>
    hdiutil internet-enable -yes SWTHello.dmg</tt></td></tr></table>

    <p>A DMG file can optionally be "internet-enabled", which streamlines
    the installation process, automatically mounting and copying the
    application to the Desktop.</p>

    <img style="display: block; text-align: center; margin: auto;" src="downloaded.png" alt="Screenshot">

    <p>Now that wasn't so bad, was it?</p>

</div>
<?php 
$html = ob_get_clean();

# Generate the web page
$App->generatePage($theme, $Menu, $Nav, $pageAuthor, $pageKeywords, $pageTitle, $html);
?>