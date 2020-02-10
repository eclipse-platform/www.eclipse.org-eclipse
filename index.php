<?php require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/app.class.php");	require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/nav.class.php"); 	require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/menu.class.php"); 	$App 	= new App();	$Nav	= new Nav();	$Menu 	= new Menu();		include($App->getProjectCommon());
ob_start();
?>
<div id="midcolumn">
<h1>SWT: The Standard Widget Toolkit</h1>

<p>SWT is an <a href="http://www.eclipse.org/legal/">open source</a> widget toolkit for Java designed to provide efficient,
portable access to the user-interface facilities of the operating systems
on which it is implemented.</p>

<div class="homeitem">
	<h2>Welcome</h2>

	<p>Welcome to SWT! You may have come to this page looking for <a href="snippets/">snippets</a> (little code examples)
	or <a href="examples.php">examples</a> (big code examples like <em>ControlExample</em>);
	<a href="widgets/">widget snapshots</a>
	or <a href="docs.php">documentation</a>.
	Or maybe you want to request a <a href="bugs.php">feature</a>,
	report a <a href="bugs.php">bug</a>,
	or ask a <a href="https://www.eclipse.org/forums/index.php/f/100/">question</a>.
	Whatever the reason, you will find many resources here. Enjoy!</p>
</div>

<div class="homeitem">
	<h2>Downloads</h2>

	<table width="100%">
		<tr><td width="100%" valign="top">
			<p>
				<b><font size="+1">Latest Release</font></b><br>
				<a href="https://download.eclipse.org/eclipse/downloads/index.html#Latest_Release">Download page</a><br>
				For links to latest released version of the SWT Binary and Source for all platforms, select the entry for the latest official release and then click on SWT Binary and Source from the menu on the left.
			</p>
		</td></tr>
		<tr><td width="100%" valign="top">
			<p>
				<b><font size="+1">Stable Builds</font></b><br>
				<a href="https://download.eclipse.org/eclipse/downloads/index.html#Stable_Builds">Download page</a><br>
				For links to stable milestone builds of the SWT Binary and Source for all platforms, select the entry for the latest milestone build and then click on SWT Binary and Source from the menu on the left.
			</p>
		</td></tr>
		<tr><td width="100%" valign="top">
			<p>
				<b><font size="+1">Integration Builds</font></b><br>
				<a href="https://download.eclipse.org/eclipse/downloads/index.html#Integration_Builds">Download page</a><br>
				For links to daily Integration builds of SWT Binary and Source for all platforms, select a current integration build 
				(select entry starting with I in the Integration builds) and then click on SWT Binary and Source from the menu on the left.
			</p>
		</td></tr>
		<tr><td width="100%" valign="top">
			<p>
				<b><font size="+1">Maven Artifacts</font></b><br>
				SWT fragments for all the supported platforms are published to Maven Central for every release. The table below contains the links to the artifacts.
				<table border="1" cellpadding="3" cellspacing="1">
					<tr>
						<td width="25%" align="center"><a href="https://mvnrepository.com/artifact/org.eclipse.platform/org.eclipse.swt.win32.win32.x86_64">Windows</a></td>
						<td width="25%" align="center"><a href="https://mvnrepository.com/artifact/org.eclipse.platform/org.eclipse.swt.cocoa.macosx.x86_64">Mac/Cocoa</a></td>
						<td width="25%" align="center"><a href="https://mvnrepository.com/artifact/org.eclipse.platform/org.eclipse.swt.gtk.linux.x86_64">Linux/GTK (x86 64-bit)</a></td>
						<td width="25%" align="center"><a href="https://mvnrepository.com/artifact/org.eclipse.platform/org.eclipse.swt.gtk.linux.ppc64le">Linux/GTK (ppcle 64-bit)</a></td>
					</tr>
				</table>
			</p>
		</td></tr>
	</table>
</div>

<div class="homeitem">
	<h2>How to contribute</h2>

	<ul>
		<li><a href="fixbugs.php">How to contribute a feature or bug fix to SWT</a></li>
		<li><a href="git.php">How to get the SWT source code via Git</a></li>
		<li><a href="swt_win_native.php">How to setup SWT Windows native build environment</a></li>
	</ul>
</div>
<div class="homeitem">
	<h2>Articles</h2>

	<ul>
		<li><a href="eclipse.php">How to develop SWT applications in Eclipse</a></li>
		<li><a href="examples.php">How to run the ControlExample and other SWT examples</a></li>
		<li><a href="macosx/">How to deploy SWT applications on Mac OS X</a></li>
		<li><a href="jnigen.php">How to generate the SWT JNI Code</a></li>
		<li><a href="macgen.php">How to generate the SWT JNI Code for Cocoa</a></li>
		<li><a href="opengl/">Using OpenGL in SWT Applications</a></li>
		<li><a href="http://www.eclipse.org/articles/index.php?sort=date&category=SWT">Many more articles about SWT</a> on Eclipse Corner at eclipse.org</li>
		<li><a href="docs.php">Full list of articles and documentation</a></li>
	</ul>
</div>

<div class="homeitem">
	<h2>Resources</h2>

	<ul>
		<li><a href="http://wiki.eclipse.org/SWT">SWT wiki</a></li>
		<li><a href="widgets/">Widget screenshots</a> with links to documentation</li>
		<li><a href="snippets/">Snippets</a>, helpful little code examples</li>
		<li><a href="examples.php">Examples</a>, helpful big code examples</li>
		<li><a href="faq.php">The SWT FAQ</a> answers many common questions</li>
		<li><a href="tools.php">Tools and Plug-ins</a> for SWT developers</li>
		<li><a href="javadoc.php">Online Javadoc</a></li>
		<li><a href="docs.php">Books and additional documentation</a></li>
		<li><a href="test_plan.html">Test Plan for SWT</a></li>
		<li><a href="community.php">SWT Community Page</a></li>
		<li><a href="http://www.eclipse.org/swtbot/">SWTBot</a>, UI/functional testing tool for SWT and Eclipse based applications.</li>
		<li><a href="http://wiki.eclipse.org/Accessibility">Eclipse/SWT Accessibility wiki</a></li>
	</ul>
</div>

<div class="homeitem">
	<h2><a href="#contact" name="contact"></a>Contact Us</h2>

	<p>The <a href="news://news.eclipse.org/eclipse.platform.swt">SWT newsgroup</a>
	[<a href="http://eclipse.org/newsgroups/register.php">register</a>]
	is a very active user discussion and help forum.
	See the
	<a href="http://www.eclipse.org/newsgroups/index.php">Eclipse Community Forums page (expand Eclipse Projects to see SWT)</a>
	for information on this and other newsgroups.</p>
	
	<p>SWT development is discussed and tracked in the
	<a href="http://bugs.eclipse.org/bugs/" target="_top">Eclipse bugzilla</a> under the
	Platform/SWT component.  You can subscribe to the new bug inbox by
	watching <i>platform-swt-inbox@eclipse.org</i> from your
	bugzilla email preferences.</p>
	
	<p>If you are modifying or porting SWT and have questions, try the
	<a href="http://dev.eclipse.org/mailman/listinfo/platform-swt-dev">SWT developer mailing list</a>
	[<a href="http://dev.eclipse.org/mhonarc/lists/platform-swt-dev/maillist.html">archive</a>,
	<a href="http://www.eclipse.org/search/search.cgi">search</a>].</p>
</div>
</div>

<div id="rightcolumn">
	<p><img src="images/win-example.png" alt="Windows" width="212" height="217"></p>
	<p><img src="images/lin-example.png" alt="Linux" width="212" height="283"></p>
	<p><img src="images/mac-example.png" alt="Mac OS X" width="212" height="217"></p>
</div>
<?php 
$html = ob_get_clean();

# Generate the web page
$App->generatePage($theme, $Menu, $Nav, $pageAuthor, $pageKeywords, $pageTitle, $html);
?>
