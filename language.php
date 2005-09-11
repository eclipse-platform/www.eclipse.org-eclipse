<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
    <title>SWT Language Pack</title>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
    <link rel="stylesheet" href="http://dev.eclipse.org/default_style.css" type="text/css">
    <link rel="stylesheet" href="swt.css" type="text/css">
    <link rel="shortcut icon" href="http://www.eclipse.org/images/eclipse.ico" type="image/x-icon">
</head>
<body bgcolor="#ffffff" text="#000000">
<table width="635px" class="swtpage">
<colgroup><col width="125px"><col width="510px"></colgroup>
<tr><?php include "sidebar.php"; ?>
<td valign="top" style="padding: 10px"><h1 style="padding: 0; margin: 0; border-bottom: 1px solid #000000;">The SWT Language Pack</h1>

<p>In most cases, the native widgets correctly pick up the locale of the
machine you are running on and display the translated string provided by
the operating system.  For example, the FileDialog will have the correct
strings for "Open" and "Cancel" if the locale on your machine has been
set correctly.  However, on some platforms, a native widget may not
exist and an emulated widget may be be used.  In addition, all custom
widgets (org.eclipse.swt.custom) are "emulated".  For these widgets, the
correct translations need to be provided.  To have an SWT application
with translated strings for all SWT widgets you need to download the
swt-nl.jar and include it on the classpath of your application. For
example:</p>

  <pre>
java -Duser.language=fr -Djava.library.path=C:\MyApp
  -classpath C:\MyApp\swt.jar;C:\MyApp\swt-nl.jar;C:\MyApp\myApp.jar
  my.org.HelloWorld</pre>

<p>IBM has donated translations from their products to Eclipse.  This
language pack contains translations for German, Spanish, French,
Italian, Japanese, Korean, Portuguese (Brazil), Traditional Chinese and
Simplified Chinese.  These translations are based on the Eclipse 3.0.1
build but should work with all 2.1 and 3.0 releases of SWT.</p>

<p>To use the translations, simply download
<a href="swt-nl.jar">swt-nl.jar</a> and place it on the classpath of your
application.</p>
</table>
</body>
</html>
