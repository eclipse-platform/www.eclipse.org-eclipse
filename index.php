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
	<h2>Releases</h2>

	<table width="100%">
		<tr><td width="50%" valign="top">
			<table width="100%">
			<tr><td>
			<b><font size="+1">Stable</font></b><br>
			<!-- Important: Use links like the following that don't break when the build is moved to the archive:
					"https://www.eclipse.org/downloads/download.php?file=/eclipse/downloads/drops4/R-4.4.2-201502041700/swt-4.4.2-win32-win32-x86.zip" -->
			<a href="https://www.eclipse.org/downloads/download.php?file=/eclipse/downloads/drops4/R-4.4.2-201502041700/swt-4.4.2-win32-win32-x86.zip">Windows</a>,
			<a href="https://www.eclipse.org/downloads/download.php?file=/eclipse/downloads/drops4/R-4.4.2-201502041700/swt-4.4.2-gtk-linux-x86.zip">Linux</a>,
			<a href="https://www.eclipse.org/downloads/download.php?file=/eclipse/downloads/drops4/R-4.4.2-201502041700/swt-4.4.2-cocoa-macosx-x86_64.zip">OS&nbsp;X</a>,
			<a href="http://download.eclipse.org/eclipse/downloads/drops4/R-4.4.2-201502041700/#SWT" target="_top">more...</a><br>
			<small>4.4.2 Final Release - <span style="white-space: nowrap;">February 4, 2015</span></small><br>
			<ul>
				<li><a href="R4_4/new_and_noteworthy.html">New and Noteworthy</a></li>
				<li><a href="language.php">Language Pack</a></li>
			</ul>
			</table>
		</td>
		<td width="50%" valign="top">
			<table width="100%">
				<tr><td>
				<b><font size="+1">Development</font></b><br>
				<a href="http://download.eclipse.org/eclipse/downloads/">4.5 Integration Builds</a>
				<span style="white-space: nowrap;">
				<small>For links to SWT Binary and Source for all platforms,<br>select current 4.5 Integration Build and then scroll to bottom of page.<br></small></span>
				<ul>
					<li><a href="R4_5/new_and_noteworthy.html">4.5 New and Noteworthy</a></li>
				</ul>
				</td></tr>
			</table>
		</td>
	</table>
</div>

<div class="homeitem">
	<h2>Articles</h2>

	<ul>
		<li><a href="eclipse.php">How to develop SWT applications in Eclipse</a></li>
		<li><a href="examples.php">How to run the ControlExample and other SWT examples</a></li>
		<li><a href="macosx/">How to deploy SWT applications on Mac OS X</a></li>
		<li><a href="jws/">How to deploy SWT applications using Java Web Start</a></li>
		<li><a href="git.php">How to use SWT from Git</a></li>
		<li><a href="jnigen.php">How to generate the SWT JNI Code</a></li>
		<li><a href="macgen.php">How to generate the SWT JNI Code for Cocoa</a></li>
		<li><a href="opengl/">Using OpenGL in SWT Applications</a></li>
		<li><a href="cocoaport.php">How to help with the SWT Cocoa port</a></li>
		<li><a href="fixbugs.php">How to fix a bug in SWT</a></li>
		<li><a href="http://www.eclipse.org/articles/index.php?sort=date&category=SWT">Many more articles about SWT</a> on Eclipse Corner at eclipse.org</li>
		<li><a href="docs.php">Full list of articles and documentation</a></li>
	</ul>
</div>

<div class="homeitem">
	<h2>Resources</h2>

	<ul>
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

<div class="homeitem">
	<h2>Older Releases</h2>

	<ul>
		<li>
			<a href="http://archive.eclipse.org/eclipse/downloads/drops4/R-4.3.2-201402211700/index.php#SWT" target="_top">SWT 4.3.2</a>, 21 February 2014.
			<ul>
				<li><a href="R4_3/new_and_noteworthy.html">New and Noteworthy</a> items for each milestone</li>
			</ul>
		</li>
		<li>
			<a href="http://archive.eclipse.org/eclipse/downloads/drops4/R-4.2.2-201302041200/index.php#SWT" target="_top">SWT 3.8.2/4.2.2</a>, 6 February 2013.
			<ul>
				<li><a href="R4_2/new_and_noteworthy.html">New and Noteworthy</a> items for each milestone</li>
			</ul>
		</li>
		<li>
			<a href="http://archive.eclipse.org/eclipse/downloads/drops/R-3.7.2-201202080800/index.php#SWT" target="_top">SWT 3.7.2</a>, 8 February 2012.
			<ul>
				<li><a href="R3_7/new_and_noteworthy.html">New and Noteworthy</a> items for each milestone</li>
			</ul>
		</li>
		<li>
			<a href="http://archive.eclipse.org/eclipse/downloads/drops/R-3.6.2-201102101200/index.php#SWT" target="_top">SWT 3.6.2</a>, 11 February 2011.
			<ul>
				<li><a href="R3_6/new_and_noteworthy.html">New and Noteworthy</a> items for each milestone</li>
			</ul>
		</li>
		<li>
			<a href="http://archive.eclipse.org/eclipse/downloads/drops/R-3.5.2-201002111343/index.php#SWT" target="_top">SWT 3.5.2</a>, 12 February 2010.
			<ul>
				<li><a href="R3_5/new_and_noteworthy.html">New and Noteworthy</a> items for each milestone</li>
			</ul>
		</li>
		<li>
			<a href="http://archive.eclipse.org/eclipse/downloads/drops/R-3.4.2-200902111700/index.php#SWT" target="_top">SWT 3.4.2</a>, 13 February 2009.
			<ul>
				<li><a href="R3_4/new_and_noteworthy.html">New and Noteworthy</a> items for each milestone</li>
			</ul>
		</li>
		<li>
			<a href="http://archive.eclipse.org/eclipse/downloads/drops/R-3.3.2-200802211800/index.php#SWT" target="_top">SWT 3.3.2</a>, 22 February 2008.
			<ul>
				<li><a href="R3_3/new_and_noteworthy.html">New and Noteworthy</a> items for each milestone</li>
			</ul>
		</li>
		<li>
			<a href="http://archive.eclipse.org/eclipse/downloads/drops/R-3.2.2-200702121330/index.php#swt" target="_top">SWT 3.2.2</a>, 12 February 2007.
			<ul>
				<li><a href="R3_2/new_and_noteworthy.html">New and Noteworthy</a> items for each milestone</li>
			</ul>
		</li>
		<li>
			<a href="http://archive.eclipse.org/eclipse/downloads/drops/R-3.1.2-200601181600/index.php#swt" target="_top">SWT 3.1.2</a>, 19 January 2006.
			<ul>
				<li><a href="R3_1/new_and_noteworthy.html">New and Noteworthy</a> items for each milestone</li>
			</ul>
		</li>
		<li>
			<a href="http://archive.eclipse.org/eclipse/downloads/drops/R-3.0.2-200503110845/index.php#swt" target="_top">SWT 3.0.2</a>, 11 March 2005.
			<ul>
				<li><a href="R3_0/new_and_noteworthy.html">New and Noteworthy</a> items for each milestone</li>
			</ul>
		</li>
	</ul>
</div>
</div>

<div id="rightcolumn">
	<p><img src="images/vis-example.png" alt="Vista" width="225" height="225"></p>
	<p><img src="images/win-example.png" alt="Windows" width="216" height="204"></p>
	<p><img src="images/lin-example.png" alt="Linux" width="212" height="224"></p>
	<p><img src="images/mac-example.png" alt="Mac OS X" width="232" height="237"></p>
	<p><img src="images/mot-example.png" alt="Motif" width="232" height="210"></p>
	<p style="text-align: center">
		<img src="images/pho-example.png" alt="Photon" width="225" height="227">
		<a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet266.java">source</a>
	</p>
</div>
<?php 
$html = ob_get_clean();

# Generate the web page
$App->generatePage($theme, $Menu, $Nav, $pageAuthor, $pageKeywords, $pageTitle, $html);
?>
