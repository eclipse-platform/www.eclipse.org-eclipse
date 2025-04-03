<?php require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/app.class.php");	require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/nav.class.php"); 	require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/menu.class.php"); 	$App 	= new App();	$Nav	= new Nav();	$Menu 	= new Menu();		include($App->getProjectCommon());

$pageTitle = "Extending the Standard Widget Toolkit";

ob_start();
?>
<div id="midcolumn">
<h1>Extending the Standard Widget Toolkit</h1>
<p>Downloads for OOPSLA 2005 Tutorial "Extending the Standard Widget Toolkit"</p>
	<ul>
	<li><a href="t22-irvine.ppt">powerpoint slides</a></li>
	<li><a href="swt_demos.zip">source for demos</a></li>
	</ul>
	
</div>
<?php 
$html = ob_get_clean();

# Generate the web page
$App->generatePage($theme, $Menu, $Nav, $pageAuthor, $pageKeywords, $pageTitle, $html);
?>