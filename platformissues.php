<?php require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/app.class.php");	require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/nav.class.php"); 	require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/menu.class.php"); 	$App 	= new App();	$Nav	= new Nav();	$Menu 	= new Menu();		include($App->getProjectCommon());

$pageTitle = "Known Platform Issues";

ob_start();
?>
<div id="midcolumn">
<h1>Known Platform Issues</h1>

<p>If you have issues you believe should go in here, please let us know on
the <a href="http://dev.eclipse.org/mailman/listinfo/platform-swt-dev">SWT developer mailing list</a>.</p>

<p><b>Linux</b></p>
<ul>
  <li><a href="#copyandpaste">Why am I having problems with cut and paste?</a></li>
</ul>

<p></p>
<hr>
<p></p>

<dl>
  <dt><strong><a name="copyandpaste"> Q: Why am I having problems with cut and paste?</a></strong></dt>
  <dd>A: Running Klipper in the background can interfere with copy/paste - try closing the Klipper app.
  </dd>
</dl>

</div>
<?php 
$html = ob_get_clean();

# Generate the web page
$App->generatePage($theme, $Menu, $Nav, $pageAuthor, $pageKeywords, $pageTitle, $html);
?>