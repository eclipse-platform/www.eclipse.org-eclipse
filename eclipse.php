<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
    <title>Developing SWT applications using Eclipse</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="Content-Style-Type" content="text/css">
    <link rel="stylesheet" href="http://dev.eclipse.org/default_style.css" type="text/css">
    <link rel="stylesheet" href="swt.css" type="text/css">
    <link rel="shortcut icon" href="http://www.eclipse.org/images/eclipse.ico" type="image/x-icon">
</head>
<body bgcolor="#ffffff" text="#000000">
<table width="875px" class="swtpage">
<colgroup><col width="125px"><col width="750px"></colgroup>
<tr><?php include "sidebar.php"; ?>
<td valign="top" style="padding: 10px"><h1 style="padding: 0; margin: 0; border-bottom: 1px solid #000000;">Developing SWT applications using Eclipse</h1>

<p>While SWT is integrated as part of the Eclipse plug-in API, for standalone
application development it is best to develop against the SWT standalone
download.  This document will help you get set up.</p>

<p>First, download the .zip of SWT for your platform from the
<a href="http://www.eclipse.org/swt/">SWT homepage</a>.</p>

<p>The SWT .zip file can then be imported into your workspace. In the
<i>File</i> menu, choose <i>Import</i> and select the
<i>Existing Projects Into Workspace</i> wizard.</p>

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

<p>And there you go!</p>

</table>
</body>
</html>