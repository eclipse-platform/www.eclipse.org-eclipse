<?php require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/app.class.php");	require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/nav.class.php"); 	require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/menu.class.php"); 	$App 	= new App();	$Nav	= new Nav();	$Menu 	= new Menu();		include($App->getProjectCommon());

$pageTitle = "SWT Javadoc";

ob_start();
?>
<div id="midcolumn">
<h1>SWT Javadoc</h1>

<p>Online javadoc for the SWT project within Eclipse.</p>

<table width="100%">
<tr class="TableHeadingColor" bgcolor="#ccccff">
<th colspan="2" align="left"><font size="+1">
<b>Eclipse-style Javadoc</b></font></th>
</tr>

<tr class="TableRowColor" bgcolor="white">
<td width="30%"><b><a href="https://help.eclipse.org/topic/org.eclipse.platform.doc.isv/reference/api/org/eclipse/swt/package-summary.html">org.eclipse.swt</a></b></td>
<td>SWT constants and error handling support.</td>
</tr>

<tr class="TableRowColor" bgcolor="white">
<td width="30%"><b><a href="https://help.eclipse.org/topic/org.eclipse.platform.doc.isv/reference/api/org/eclipse/swt/accessibility/package-summary.html">org.eclipse.swt.accessibility</a></b></td>
<td>SWT Accessibility.</td>
</tr>

<tr class="TableRowColor" bgcolor="white">
<td width="30%"><b><a href="https://help.eclipse.org/topic/org.eclipse.platform.doc.isv/reference/api/org/eclipse/swt/awt/package-summary.html">org.eclipse.swt.awt</a></b></td>
<td>SWT AWT embedding support.</td>
</tr>

<tr class="TableRowColor" bgcolor="white">
<td width="30%"><b><a href="https://help.eclipse.org/topic/org.eclipse.platform.doc.isv/reference/api/org/eclipse/swt/browser/package-summary.html">org.eclipse.swt.browser</a></b></td>
<td>SWT Browser widget.</td>
</tr>

<tr class="TableRowColor" bgcolor="white">
<td width="30%"><b><a href="https://help.eclipse.org/topic/org.eclipse.platform.doc.isv/reference/api/org/eclipse/swt/custom/package-summary.html">org.eclipse.swt.custom</a></b></td>
<td>SWT Custom widgets.</td>
</tr>

<tr class="TableRowColor" bgcolor="white">
<td width="30%"><b><a href="https://help.eclipse.org/topic/org.eclipse.platform.doc.isv/reference/api/org/eclipse/swt/dnd/package-summary.html">org.eclipse.swt.dnd</a></b></td>
<td>SWT Drag and Drop support.</td>
</tr>

<tr class="TableRowColor" bgcolor="white">
<td width="30%"><b><a href="https://help.eclipse.org/topic/org.eclipse.platform.doc.isv/reference/api/org/eclipse/swt/events/package-summary.html">org.eclipse.swt.events</a></b></td>
<td>SWT typed listener support.</td>
</tr>

<tr class="TableRowColor" bgcolor="white">
<td width="30%"><b><a href="https://help.eclipse.org/topic/org.eclipse.platform.doc.isv/reference/api/org/eclipse/swt/graphics/package-summary.html">org.eclipse.swt.graphics</a></b></td>
<td>SWT graphics classes.</td>
</tr>

<tr class="TableRowColor" bgcolor="white">
<td width="30%"><b><a href="https://help.eclipse.org/topic/org.eclipse.platform.doc.isv/reference/api/org/eclipse/swt/layout/package-summary.html">org.eclipse.swt.layout</a></b></td>
<td>SWT layout classes.</td>
</tr>

<tr class="TableRowColor" bgcolor="white">
<td width="30%"><b><a href="https://help.eclipse.org/topic/org.eclipse.platform.doc.isv/reference/api/org/eclipse/swt/ole/win32/package-summary.html">org.eclipse.swt.ole.win32</a></b></td>
<td>SWT Win32 OLE implementation classes.</td>
</tr>

<tr class="TableRowColor" bgcolor="white">
<td width="30%"><b><a href="https://help.eclipse.org/topic/org.eclipse.platform.doc.isv/reference/api/org/eclipse/swt/opengl/package-summary.html">org.eclipse.swt.opengl</a></b></td>
<td>SWT OpenGL support.</td>
</tr>

<tr class="TableRowColor" bgcolor="white">
<td width="30%"><b><a href="https://help.eclipse.org/topic/org.eclipse.platform.doc.isv/reference/api/org/eclipse/swt/printing/package-summary.html">org.eclipse.swt.printing</a></b></td>
<td>SWT Printing support classes.</td>
</tr>

<tr class="TableRowColor" bgcolor="white">
<td width="30%"><b><a href="https://help.eclipse.org/topic/org.eclipse.platform.doc.isv/reference/api/org/eclipse/swt/program/package-summary.html">org.eclipse.swt.program</a></b></td>
<td>SWT Program support class.</td>
</tr>

<tr class="TableRowColor" bgcolor="white">
<td width="30%"><b><a href="https://help.eclipse.org/topic/org.eclipse.platform.doc.isv/reference/api/org/eclipse/swt/widgets/package-summary.html">org.eclipse.swt.widgets</a></b></td>
<td>SWT widget public API classes.</td>
</tr>
</table>

<p></p>

<table width="100%">
<tr class="TableHeadingColor" bgcolor="#ccccff">
<th colspan="2" align="left"><font size="+1">
<b>Generated Javadoc</b></font></th>
</tr>

<tr class="TableRowColor" bgcolor="white">
<td width="30%"><b><a href="https://help.eclipse.org/index.jsp?topic=%2Forg.eclipse.platform.doc.isv%2Freference%2Fapi%2Findex.html">Eclipse Platform API</a></b></td>
<td>Scroll to find the <code>org.eclipse.swt.*</code> packages.</td>
</tr>
</table>

</div>
<?php 
$html = ob_get_clean();

# Generate the web page
$App->generatePage($theme, $Menu, $Nav, $pageAuthor, $pageKeywords, $pageTitle, $html);
?>
