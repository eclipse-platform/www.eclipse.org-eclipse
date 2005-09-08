<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
    <title>SWT Snippet Instructions</title>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
    <link rel="stylesheet" href="http://dev.eclipse.org/default_style.css" type="text/css">
    <link rel="stylesheet" href="swt.css" type="text/css">
    <link rel="shortcut icon" href="http://www.eclipse.org/images/eclipse.ico" type="image/x-icon">
</head>
<body bgcolor="#ffffff" text="#000000">
<table width="635px" style="border-bottom: 1px solid #000000;">
<colgroup><col width="125px"><col width="510px"></colgroup>
<tr><?php include "sidebar.php"; ?>
<td valign="top" style="padding: 10px"><h1 style="padding: 0; margin: 0; border-bottom: 1px solid #000000;">SWT Snippet Instructions</h1>

<p>In order to compile an SWT snippet, you need to first have SWT in
your workspace.  First <a href="../eclipse.html">follow these instructions</a>
to get set up.</p>

<p>Next you need to create a class called Main, paste the snippet code
into it, and run it.  Here are the steps to do that.</p>

<ol>
<li><i>File &gt; New &gt; Project</i>.</li>
<li>Java and Java Project should be selected. Click Next.</li>
<li>Project name can be anything you like. Click Next.</li>
<li>Under the projects tab, add "org.eclipse.swt".</li>
<li>Click Finish.</li>
<li>Select the new project and right click.  Select <i>New &gt; Class</i>.</li>
<li>By convention, the name of the snippet class is "Main", so type "Main" in the "Name:" field. Click Finish.</li>
<li>Copy the snippet code and replace all of the text of "Main.java" with it.</li>
<li>Save the file.</li>
<li>Select <i>Run &gt; Run As &gt; Java Application</i>.</li>
</ol>

<p>And there you go!</p>

</body>
</html>
