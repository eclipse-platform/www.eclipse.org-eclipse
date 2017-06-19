<?php require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/app.class.php");	require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/nav.class.php"); 	require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/menu.class.php"); 	$App 	= new App();	$Nav	= new Nav();	$Menu 	= new Menu();		include($App->getProjectCommon());

$pageTitle = "SWT Eclipse Bugzilla";

ob_start();
?>
<div id="midcolumn">
<h1>SWT Eclipse Bugzilla</h1>

<p>SWT bug reports are stored in the <a href="http://bugs.eclipse.org/bugs/">Eclipse Bugzilla database</a>.
<p>The SWT developers follow a <a href="https://wiki.eclipse.org/SWT/Devel/Triage">bug triage</a> process.</p>
<br>Here are some useful links:</p>

<h4><a href="https://bugs.eclipse.org/bugs/enter_bug.cgi?product=Platform&component=SWT">
	Open a new SWT bug report</a></h4>

<h4><a href="https://bugs.eclipse.org/bugs/enter_bug.cgi?product=Platform&component=SWT&bug_severity=enhancement">
	Request an SWT Feature</a></h4>

<h4><a href="https://bugs.eclipse.org/bugs/enter_bug.cgi?product=Platform&bug_severity=enhancement&component=SWT&short_desc=New%20Snippet%20Contribution%3A%20%5Bsummary%20here%5D&comment=Eclipse%20build%20id%20or%20SWT%20version%3A%20%5Bbuild%20id%20here%5D%0D%0A%0D%0APlatform%28s%29%20tested%20on%3A%20%5Blist%20platform%28s%29%20here%5D%0D%0A%0D%0ASnippet%20title%3A%20%5Bsnippet%20title%20or%20short%20description%20here%5D%0D%0A%0D%0ASnippet%20code%3A%20%5Bpaste%20snippet%20code%20here%5D">
	Contribute an SWT Snippet</a></h4>

<h4>
<form action="https://bugs.eclipse.org/bugs/buglist.cgi" method="get">
Find open SWT bug reports containing: 
<input type="text" name="long_desc" />
<input type="submit" value="Search" />
<input type="hidden" name="order" value="Bug Number" />
<input type="hidden" name="bug_status" value="__open__" />
<input type="hidden" name="classification" value="Eclipse" />
<input type="hidden" name="product" value="Platform" />
<input type="hidden" name="component" value="SWT" />
<input type="hidden" name="long_desc_type" value="allwordssubstr" />
</form>
</h4>

<h4>
<form action="https://bugs.eclipse.org/bugs/buglist.cgi" method="get">
Find any SWT bug reports containing: 
<input type="text" name="long_desc" />
<input type="submit" value="Search" />
<input type="hidden" name="order" value="Bug Number" />
<input type="hidden" name="classification" value="Eclipse" />
<input type="hidden" name="product" value="Platform" />
<input type="hidden" name="component" value="SWT" />
<input type="hidden" name="long_desc_type" value="allwordssubstr" />
</form>
</h4>

</div>
<?php 
$html = ob_get_clean();

# Generate the web page
$App->generatePage($theme, $Menu, $Nav, $pageAuthor, $pageKeywords, $pageTitle, $html);
?>
