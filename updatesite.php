<?php require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/app.class.php");	require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/nav.class.php"); 	require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/menu.class.php"); 	$App 	= new App();	$Nav	= new Nav();	$Menu 	= new Menu();		include($App->getProjectCommon());

$pageTitle = "SWT Tools Update Sites";

ob_start();
?>
<div id="midcolumn">
<h1>SWT Tools Update Sites</h1>

<p>The SWT Development Tools are available from the following update sites.</p> 
<p>For everyday development please ensure that you are 
using the most recent tools available. Stable releases of the tools are provided for the purpose of creating patches against maintenance
branches of SWT.</p>

<table border="1" align="center" cellpadding="3" cellspacing="1">
<tr>
<th> Update Site
</th><th> Update Site URL
</th></tr>
<tr>
<td> <strong>Most recent development build</strong> </td><td>http://www.eclipse.org/swt/updates/4.4</td>
</tr>
<tr>
<td> <strong>4.3.x releases</strong> </td><td>http://www.eclipse.org/swt/updates/4.3</td>
</tr>
<tr>
<td> <strong>3.8.x - 4.2.x releases</strong> </td><td> http://www.eclipse.org/swt/updates/3.8 </td>
</tr>
<tr>
<td> <strong>3.6.x - 3.7.x releases</strong> </td><td> http://www.eclipse.org/swt/updates/3.6 </td>
</tr>
<tr>
<td> <strong>3.5.x releases</strong> </td><td> http://www.eclipse.org/swt/updates/3.5 </td>
</tr>
</table>

</div>
<?php 
$html = ob_get_clean();

# Generate the web page
$App->generatePage($theme, $Menu, $Nav, $pageAuthor, $pageKeywords, $pageTitle, $html);
?>