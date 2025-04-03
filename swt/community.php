<?php require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/app.class.php");	require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/nav.class.php"); 	require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/menu.class.php"); 	$App 	= new App();	$Nav	= new Nav();	$Menu 	= new Menu();		include($App->getProjectCommon());

$pageTitle = "The SWT Community Page";

ob_start();
?>
<div id="midcolumn">
<h1>The SWT Community Page</h1>

<p>This page provides links to additional SWT widgets, applications, and information
maintained elsewhere in the community.  If you have a project and would like to
see it listed here, please let us know on the
<a href="http://dev.eclipse.org/mailman/listinfo/platform-dev">Platform developer mailing list</a>.</p>

<div class="homeitem">
<h2>SWT Wiki</h2>

<p>The community is welcome to use and contribute to the <a href="http://wiki.eclipse.org/SWT">SWT wiki</a>.</p>
</div>

<div class="homeitem">
<h2>Additional Widgets</h2>

<ul>
<li><b><a href="http://www.eclipse.org/nebula/">The Nebula Project</a></b>

    <p>An Eclipse project that collects various custom SWT widgets and other UI components.</p>

<li><b><a href="http://code.google.com/p/swt-paperclips/">PaperClips</a></b>
    <i>by Woodcraft Mill & Cabinet and Others</i>

    <p>Simplified printing support for SWT. PaperClips provides document building
     blocks (text, images, tables, borders) which may be combined and sent to the
     library for printing.</p>
    
<li><b><a href="http://www.kupzog.de/fkmk_uk/Programming/Downloads/downloads.html">KTable Widget</a></b>
    <i>by Friederich Kupzog</i>

    <p>KTable is a custom drawn table widget for SWT that provides a flexible
    grid of cells to display data.  It provides custom cell rendering, a variety of
    selection modes and cell editing.</p>

<li><b><a href="http://www.novocode.com/swt/">SWT Controls</a></b>
    <i>by Novocode</i>

    <p>A variety of controls such as FramedComposite, HyperLink,
    LiveSashForm and SizeGrip developed using SWT graphics, events
    and widgets.</p>

<li><b><a href="http://sourceforge.net/projects/swt-datepicker/">SWT DatePicker widget</a></b>
    <i>by Andrey Onistchuk and Sebastian</i>

    <p>Emulated widgets that provide a date-picker panel and combo widget
    with drop-down date-picker panel.</p>

<li><b><a href="http://swtcalendar.sourceforge.net/">SWTCalendar widget</a></b>
    <i>by Bryan Yu</i>

    <p>SWTCalendar was designed to be a flexible component so a developer
    can embed a date picker in their application or create their own
    standalone date picker dialog.</p>

<li><b><a href="http://swtgraph.sf.net">SWTGraph</a></b>
	<i>by Felipe Santos Andrade</i>

	<p>A set of custom-draw graphing components.
	There is currently a fully functional Cartesian Graph, and a Gantt Graph is being developed.</p>

<li><b><a href="http://swtlayeredgraph.sourceforge.net/">SWT Layered Graph</a></b>
	<i>by James Davis</i>

	<p>The purpose of SWT Layered Graph is to provide highly usable and customizable graph functionality.</p>

<li><b><a href="http://libxine-java.sourceforge.net">libxine-java</a></b>
	<i>by Matthias Ringwald</i>

	<p>libxine-java is a Java interface that allows Java applications to play
	all media types supported by the xine library.  Video playback can be
	integrated into applications with SWT or AWT Canvas widgets.</p>

<li><b><a href="http://metawidget.org/">Metawidget</a></b>
	<i>by Richard Kennard and others</i>

	<p>Metawidget is a 'smart User Interface widget' that populates itself, at runtime, with UI components to match
	the properties of your business objects.  SWT is a supported Metawidget front end.</p>
</ul>
</div>

<div class="homeitem">
<h2>Some Applications that use SWT</h2>

<ul>
<li><b><a href="http://azureus.sourceforge.net/">Azureus</a></b>

    <p>Azureus is a featureful bittorrent client implementation written
    in Java using SWT.</p>

<li><b><a href="http://www.rssowl.org/">RSSOwl</a></b>

    <p>RSSOwl is an RSS newsreader that lets you gather, organize, update, and
    store information from any compliant source in a convenient, easy to use
    interface, save selected information in various formats for offline viewing
    and sharing, and much more.</p>

<li><b><a href="http://sourceforge.net/projects/deinonychus/">Deinonychus</a></b>

    <p>Deinonychus is an email client written in Java featuring a GUI built
    with SWT. Supports MIME, IMAP, POP, and SMTP.</p>

<li><b><a href="http://members.quicknet.nl/blankendaalr/dbgl/">DOSBox Game Launcher</a></b>

    <p>DOSBox Game Launcher serves as a front-end GUI to <a href="http://www.dosbox.com/">DOSBox</a>.

<li><b><a href="http://eclipse-games.sourceforge.net/">eclipse-games</a></b>

    <p>A collection of games that run as eclipse plug-ins.</p>

<li><b><a href="http://fandev.org/doc/docLib/Fwt.html">Fantom Widget Toolkit</a></b>

    <p>The Fan programming language uses SWT as the underlying implementation for
    the Fantom Widget Toolkit.  The FWT leverages Fan's declarative programming model
    and closures to make building up UIs simple.</p>

<li><b><a href="http://fnr.sourceforge.net">Feed'n Read</a></b>

    <p>Feed'n Read is a Java-based open source newsfeed reader. It is powered by the
    Sun ROME syndication framework and uses JFace and SWT.</p>

<li><b><a href="http://matrex.sourceforge.net/">Matrex</a></b>

    <p>Matrex is a multithreaded vectorial spreadsheet application that is
    written in Java with SWT.</p>

<li><b><a href="http://sancho-gui.sourceforge.net/">sancho</a></b>

    <p>sancho is a gui that connects to a p2p core application. Power users
    that use p2p applications usually choose one that has core/gui separation.
    sancho provides an easy to use, powerful, and configurable gui, currently
    supporting the gui protocol of the popular mldonkey core.</p>

<li><b><a href="http://www.solaraccounts.co.uk">Solar Accounts</a></b>

    <p>Solar Accounts is a simple accounting software package for self-employed people in the UK.</p>

<li><b><a href="http://sourceforge.net/projects/qftp/">VirgoFTP</a></b>

    <p>VirgoFTP is an FTP client, similar to CuteFTP, written in Java using SWT.</p>
    
<li><b><a href="http://zekr.org">Zekr Quran Study Tool</a></b>

    <p>Zekr is an open platform for research and development on the Holy Quran.
    It is written in Java and uses SWT as the widget toolkit.</p>

</ul>
</div>

<div class="homeitem">
<h2>Tutorials</h2>

<ul>	
<li><b><a href="http://www.cs.umanitoba.ca/~eclipse/">Getting Started with Eclipse and SWT</a></b></li>

	<p>This site contains some tutorials and example programs that will help programmers who are 
	new to Eclipse and the Standard Widget Toolkit (SWT) install Eclipse correctly and run some 
	simple Java/SWT programs.</p>
	
	
<li><b><a href="http://www.cs.umanitoba.ca/~eclipse/6-Compiling.pdf">Compiling Eclipse Applications for Windows With GCJ/MinGW</a></b></li>

	<p>A guide for compiling an SWT application into an executable.</p>

<li><b><a href="http://www.javalobby.org/eps/swt_intro/">An introduction to SWT</a></b></li>

	<p>Adapted from "SWT and JFace", a No Fluff Just Stuff 2004 presentation.</p>
</ul>
</div>

</div>
<?php 
$html = ob_get_clean();

# Generate the web page
$App->generatePage($theme, $Menu, $Nav, $pageAuthor, $pageKeywords, $pageTitle, $html);
?>