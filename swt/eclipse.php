<?php require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/app.class.php");	require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/nav.class.php"); 	require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/menu.class.php"); 	$App 	= new App();	$Nav	= new Nav();	$Menu 	= new Menu();		include($App->getProjectCommon());

$pageTitle = "Developing SWT applications using Eclipse";

ob_start();
?>
<div id="midcolumn">
<h1>Developing SWT applications using Eclipse</h1>

<p>While SWT is integrated as part of the Eclipse plug-in API, for standalone
application development it is best to develop against the SWT standalone
download.  This document will help you get set up.</p>

<p>First, download the .zip of SWT for your platform from the
<a href="/swt/">SWT homepage</a>.</p>

<p>The SWT .zip file can then be imported into your workspace. In the
<i>File</i> menu, choose <i>Import</i> and select the
<i>Existing Projects Into Workspace</i> wizard.
(In newer versions of eclipse, you can find <i>Existing Projects Into Workspace</i>
in the <i>General</i> category).</p>

<center><p><img src="images/existing.png" alt="Existing Projects Into Workspace Wizard"></p></center>

<p>Direct the wizard to the location where you downloaded the .zip file.
This will create a project called <i>org.eclipse.swt</i> in your
workspace.</p>

<center><p><img src="images/import-projects.png" alt="Import Projects Wizard"></p></center>

<p>Your Java projects can then add the SWT project as a dependency.
Open the properties dialog of your Java project, and on the <i>Java
Build Path</i> page, include the org.eclipse.swt project.</p>

<center><p><img src="images/add-project.png" alt="Project Properties"></p></center>

<p>With the SWT project as a dependency, you can now benefit from
Eclipse features such as the Javadoc view and code assist.</p>

<center><p><img src="images/swt-example.png" alt="SWT Eclipse Example"></p></center>

<p>Now you can run any main class in your project by selecting the class and then selecting
<i>Run &gt; Run As &gt; Java Application</i></p>

</div>
<?php 
$html = ob_get_clean();

# Generate the web page
$App->generatePage($theme, $Menu, $Nav, $pageAuthor, $pageKeywords, $pageTitle, $html);
?>