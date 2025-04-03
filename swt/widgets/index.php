<?php require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/app.class.php");	require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/nav.class.php"); 	require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/menu.class.php"); 	$App 	= new App();	$Nav	= new Nav();	$Menu 	= new Menu();		include($App->getProjectCommon());

$pageTitle = "SWT Widgets";

ob_start();
?>
<div id="midcolumn">
<h1>SWT Widgets</h1>

<p>Below are screenshots and links to documentation for many of the
widgets included in SWT.  For a complete list of classes including
those that don't screenshot well, see the
<a href="https://help.eclipse.org/index.jsp?topic=/org.eclipse.platform.doc.isv/reference/api/org/eclipse/swt/widgets/package-summary.html">SWT Javadoc</a>.</p>

<table width="100%" style="border-bottom: 1px solid #000000;">
<colgroup>
    <col width="242">
    <col width="242">
    <col width="242">
</colgroup>
<tr><td align="center" valign="bottom">
        <table>
        <tr><td align="center"><a href="https://help.eclipse.org/topic/org.eclipse.platform.doc.isv/reference/api/org/eclipse/swt/browser/Browser.html"><img src="gallery-browser.png" width="169" height="111" border="0" alt="Bowser"></a>
        <tr><td align="center"><b>Browser</b><br>
        <small><a href="https://help.eclipse.org/topic/org.eclipse.platform.doc.isv/reference/api/org/eclipse/swt/browser/Browser.html">javadoc</a> -
        <a href="../snippets/#browser">snippets</a></small>
        </table>
    <td align="center" valign="bottom">
        <table>
        <tr><td align="center"><a href="https://help.eclipse.org/topic/org.eclipse.platform.doc.isv/reference/api/org/eclipse/swt/widgets/Button.html"><img src="gallery-arrow.png" width="55" height="58" border="0" alt="Button"></a>
        <tr><td align="center"><b>Button</b> (<tt>SWT.ARROW</tt>)<br>
        <small><a href="https://help.eclipse.org/topic/org.eclipse.platform.doc.isv/reference/api/org/eclipse/swt/widgets/Button.html">javadoc</a> -
        <a href="../snippets/#button">snippets</a></small>
        </table>
    <td align="center" valign="bottom">
        <table>
        <tr><td align="center"><a href="https://help.eclipse.org/topic/org.eclipse.platform.doc.isv/reference/api/org/eclipse/swt/widgets/Button.html"><img src="gallery-check.png" width="94" height="62" border="0" alt="Button"></a>
        <tr><td align="center"><b>Button</b> (<tt>SWT.CHECK</tt>)<br>
        <small><a href="https://help.eclipse.org/topic/org.eclipse.platform.doc.isv/reference/api/org/eclipse/swt/widgets/Button.html">javadoc</a> -
        <a href="../snippets/#button">snippets</a></small>
        </table>
<tr><td height="25px"><td><td>
<tr><td align="center" valign="bottom">
        <table>
        <tr><td align="center"><a href="https://help.eclipse.org/topic/org.eclipse.platform.doc.isv/reference/api/org/eclipse/swt/widgets/Button.html"><img src="gallery-push.png" width="100" height="62" border="0" alt="Button"></a>
        <tr><td align="center"><b>Button</b> (<tt>SWT.PUSH</tt>)<br>
        <small><a href="https://help.eclipse.org/topic/org.eclipse.platform.doc.isv/reference/api/org/eclipse/swt/widgets/Button.html">javadoc</a> -
        <a href="../snippets/#button">snippets</a></small>
        </table>
    <td align="center" valign="bottom">
        <table>
        <tr><td align="center"><a href="https://help.eclipse.org/topic/org.eclipse.platform.doc.isv/reference/api/org/eclipse/swt/widgets/Button.html"><img src="gallery-radio.png" width="210" height="56" border="0" alt="Button"></a>
        <tr><td align="center"><b>Button</b> (<tt>SWT.RADIO</tt>)<br>
        <small><a href="https://help.eclipse.org/topic/org.eclipse.platform.doc.isv/reference/api/org/eclipse/swt/widgets/Button.html">javadoc</a> -
        <a href="../snippets/#button">snippets</a></small>
        </table>
    <td align="center" valign="bottom">
        <table>
        <tr><td align="center"><a href="https://help.eclipse.org/topic/org.eclipse.platform.doc.isv/reference/api/org/eclipse/swt/widgets/Button.html"><img src="gallery-toggle.png" width="132" height="63" border="0" alt="Button"></a>
        <tr><td align="center"><b>Button</b> (<tt>SWT.TOGGLE</tt>)<br>
        <small><a href="https://help.eclipse.org/topic/org.eclipse.platform.doc.isv/reference/api/org/eclipse/swt/widgets/Button.html">javadoc</a> -
        <a href="../snippets/#button">snippets</a></small>
        </table>
<tr><td height="25px"><td><td>
<tr><td align="center" valign="bottom">
        <table>
        <tr><td align="center"><a href="https://help.eclipse.org/topic/org.eclipse.platform.doc.isv/reference/api/org/eclipse/swt/widgets/Canvas.html"><img src="gallery-canvas.png" width="123" height="121" border="0" alt="Canvas"></a>
        <tr><td align="center"><b>Canvas</b><br>
        <small><a href="https://help.eclipse.org/topic/org.eclipse.platform.doc.isv/reference/api/org/eclipse/swt/widgets/Canvas.html">javadoc</a> -
        <a href="../snippets/#canvas">snippets</a></small>
        </table>
    <td align="center" valign="bottom">
        <table>
        <tr><td align="center"><a href="https://help.eclipse.org/topic/org.eclipse.platform.doc.isv/reference/api/org/eclipse/swt/widgets/Combo.html"><img src="gallery-combo.png" width="162" height="60" border="0" alt="Combo"></a>
        <tr><td align="center"><b>Combo</b><br>
        <small><a href="https://help.eclipse.org/topic/org.eclipse.platform.doc.isv/reference/api/org/eclipse/swt/widgets/Combo.html">javadoc</a> -
        <a href="../snippets/#combo">snippets</a></small>
        </table>
    <td align="center" valign="bottom">
        <table>
        <tr><td align="center"><a href="https://help.eclipse.org/topic/org.eclipse.platform.doc.isv/reference/api/org/eclipse/swt/widgets/Composite.html"><img src="gallery-composite.png" width="179" height="108" border="0" alt="Composite"></a>
        <tr><td align="center"><b>Composite</b><br>
        <small><a href="https://help.eclipse.org/topic/org.eclipse.platform.doc.isv/reference/api/org/eclipse/swt/widgets/Composite.html">javadoc</a> -
        <a href="../snippets/#composite">snippets</a></small>
        </table>
<tr><td height="25px"><td><td>
<tr><td align="center" valign="bottom">
        <table>
        <tr><td align="center"><a href="https://help.eclipse.org/topic/org.eclipse.platform.doc.isv/reference/api/org/eclipse/swt/widgets/CoolBar.html"><img src="gallery-coolbar.png" width="230" height="84" border="0" alt="CoolBar"></a>
        <tr><td align="center"><b>CoolBar</b><br>
        <small><a href="https://help.eclipse.org/topic/org.eclipse.platform.doc.isv/reference/api/org/eclipse/swt/widgets/CoolBar.html">javadoc</a> -
        <a href="../snippets/#coolbar">snippets</a></small>
        </table>
    <td align="center" valign="bottom">
        <table>
        <tr><td align="center"><a href="https://help.eclipse.org/topic/org.eclipse.platform.doc.isv/reference/api/org/eclipse/swt/custom/CTabFolder.html"><img src="gallery-ctabfolder.png" width="222" height="79" border="0" alt="Group"></a>
        <tr><td align="center"><b>CTabFolder</b><br>
        <small><a href="https://help.eclipse.org/topic/org.eclipse.platform.doc.isv/reference/api/org/eclipse/swt/custom/CTabFolder.html">javadoc</a> -
        <a href="../snippets/#ctabfolder">snippets</a></small>
        </table>
    <td align="center" valign="bottom">
        <table>
        <tr><td align="center">
        <a href="https://help.eclipse.org/topic/org.eclipse.platform.doc.isv/reference/api/org/eclipse/swt/widgets/DateTime.html"><img src="gallery-datetime.png" width="202" height="157" border="0" alt="DateTime"></a>
        <tr><td align="center"><b>DateTime</b><br>
        <small><a href="https://help.eclipse.org/topic/org.eclipse.platform.doc.isv/reference/api/org/eclipse/swt/widgets/DateTime.html">javadoc</a> -
        <a href="../snippets/#datetime">snippets</a></small>
        </table>
<tr><td height="25px"><td><td>
<tr><td align="center" valign="bottom">
        <table>
        <tr><td align="center">
        <a href="https://help.eclipse.org/topic/org.eclipse.platform.doc.isv/reference/api/org/eclipse/swt/widgets/ExpandBar.html"><img src="gallery-expandbar.png" width="293" height="195" border="0" alt="ExpandBar"></a>
        <tr><td align="center"><b>ExpandBar</b><br>
        <small><a href="https://help.eclipse.org/topic/org.eclipse.platform.doc.isv/reference/api/org/eclipse/swt/widgets/ExpandBar.html">javadoc</a> -
        <a href="../snippets/#expandbar">snippets</a></small>
        </table>
	<td align="center" valign="bottom">
        <table>
        <tr><td align="center"><a href="https://help.eclipse.org/topic/org.eclipse.platform.doc.isv/reference/api/org/eclipse/swt/widgets/Group.html"><img src="gallery-group.png" width="106" height="115" border="0" alt="Group"></a>
        <tr><td align="center"><b>Group</b><br>
        <small><a href="https://help.eclipse.org/topic/org.eclipse.platform.doc.isv/reference/api/org/eclipse/swt/widgets/Group.html">javadoc</a>
        </small>
        </table>
    <td align="center" valign="bottom">
        <table>
        <tr><td align="center"><a href="https://help.eclipse.org/topic/org.eclipse.platform.doc.isv/reference/api/org/eclipse/swt/widgets/Label.html"><img src="gallery-label.png" width="145" height="119" border="0" alt="Label"></a>
        <tr><td align="center"><b>Label</b><br>
        <small><a href="https://help.eclipse.org/topic/org.eclipse.platform.doc.isv/reference/api/org/eclipse/swt/widgets/Label.html">javadoc</a> -
        <a href="../snippets/#label">snippets</a></small>
        </table>
<tr><td height="25px"><td><td>
<tr><td align="center" valign="bottom">
        <table>
        <tr><td align="center"><a href="https://help.eclipse.org/topic/org.eclipse.platform.doc.isv/reference/api/org/eclipse/swt/widgets/Link.html"><img src="gallery-link.png" width="210" height="50" border="0" alt="Link"></a>
        <tr><td align="center"><b>Link</b><br>
        <small><a href="https://help.eclipse.org/topic/org.eclipse.platform.doc.isv/reference/api/org/eclipse/swt/widgets/Link.html">javadoc</a> -
        <a href="../snippets/#link">snippets</a></small>
        </table>
	<td align="center" valign="bottom">
        <table>
        <tr><td align="center"><a href="https://help.eclipse.org/topic/org.eclipse.platform.doc.isv/reference/api/org/eclipse/swt/widgets/List.html"><img src="gallery-list.png" width="147" height="168" border="0" alt="List"></a>
        <tr><td align="center"><b>List</b><br>
        <small><a href="https://help.eclipse.org/topic/org.eclipse.platform.doc.isv/reference/api/org/eclipse/swt/widgets/List.html">javadoc</a> -
        <a href="../snippets/#list">snippets</a></small>
        </table>
    <td align="center" valign="bottom">
        <table>
        <tr><td align="center"><a href="https://help.eclipse.org/topic/org.eclipse.platform.doc.isv/reference/api/org/eclipse/swt/widgets/Menu.html"><img src="gallery-menu.png" width="242" height="166" border="0" alt="Menu"></a>
        <tr><td align="center"><b>Menu</b><br>
        <small><a href="https://help.eclipse.org/topic/org.eclipse.platform.doc.isv/reference/api/org/eclipse/swt/widgets/Menu.html">javadoc</a> -
        <a href="../snippets/#menu">snippets</a></small>
        </table>
<tr><td height="25px"><td><td>
<tr><td align="center" valign="bottom">
        <table>
        <tr><td align="center"><a href="https://help.eclipse.org/topic/org.eclipse.platform.doc.isv/reference/api/org/eclipse/swt/widgets/ProgressBar.html"><img src="gallery-progressbar.png" width="159" height="51" border="0" alt="ProgressBar"></a>
        <tr><td align="center"><b>ProgressBar</b><br>
        <small><a href="https://help.eclipse.org/topic/org.eclipse.platform.doc.isv/reference/api/org/eclipse/swt/widgets/ProgressBar.html">javadoc</a> -
        <a href="../snippets/#progressbar">snippets</a></small>
        </table>
	<td align="center" valign="bottom">
        <table>
        <tr><td align="center"><a href="https://help.eclipse.org/topic/org.eclipse.platform.doc.isv/reference/api/org/eclipse/swt/widgets/Sash.html"><img src="gallery-sash.png" width="144" height="141" border="0" alt="Sash"></a>
        <tr><td align="center"><b>Sash</b><br>
        <small><a href="https://help.eclipse.org/topic/org.eclipse.platform.doc.isv/reference/api/org/eclipse/swt/widgets/Sash.html">javadoc</a> -
        <a href="../snippets/#sash">snippets</a></small>
        </table>
    <td align="center" valign="bottom">
        <table>
        <tr><td align="center"><a href="https://help.eclipse.org/topic/org.eclipse.platform.doc.isv/reference/api/org/eclipse/swt/custom/ScrolledComposite.html"><img src="gallery-scrolledcomposite.png" width="134" height="131" border="0" alt="ScrolledComposite"></a>
        <tr><td align="center"><b>ScrolledComposite</b><br>
        <small><a href="https://help.eclipse.org/topic/org.eclipse.platform.doc.isv/reference/api/org/eclipse/swt/custom/ScrolledComposite.html">javadoc</a> -
        <a href="../snippets/#scrolledcomposite">snippets</a></small>
        </table>
<tr><td height="25px"><td><td>
<tr><td align="center" valign="bottom">
        <table>
        <tr><td align="center"><a href="https://help.eclipse.org/topic/org.eclipse.platform.doc.isv/reference/api/org/eclipse/swt/widgets/Shell.html"><img src="gallery-shell.png" width="222" height="47" border="0" alt="Shell"></a>
        <tr><td align="center"><b>Shell</b><br>
        <small><a href="https://help.eclipse.org/topic/org.eclipse.platform.doc.isv/reference/api/org/eclipse/swt/widgets/Shell.html">javadoc</a> -
        <a href="../snippets/#shell">snippets</a></small>
        </table>
	<td align="center" valign="bottom">
        <table>
        <tr><td align="center"><a href="https://help.eclipse.org/topic/org.eclipse.platform.doc.isv/reference/api/org/eclipse/swt/widgets/Slider.html"><img src="gallery-slider.png" width="189" height="54" border="0" alt="Slider"></a>
        <tr><td align="center"><b>Slider</b><br>
        <small><a href="https://help.eclipse.org/topic/org.eclipse.platform.doc.isv/reference/api/org/eclipse/swt/widgets/Slider.html">javadoc</a> -
        <a href="../snippets/#slider">snippets</a></small>
        </table>
    <td align="center" valign="bottom">
        <table>
        <tr><td align="center"><a href="https://help.eclipse.org/topic/org.eclipse.platform.doc.isv/reference/api/org/eclipse/swt/widgets/Scale.html"><img src="gallery-scale.png" width="191" height="75" border="0" alt="Scale"></a>
        <tr><td align="center"><b>Scale</b><br>
        <small><a href="https://help.eclipse.org/topic/org.eclipse.platform.doc.isv/reference/api/org/eclipse/swt/widgets/Scale.html">javadoc</a> -
        <a href="../snippets/#scale">snippets</a></small>
        </table>
<tr><td height="25px"><td><td>
<tr><td align="center" valign="bottom">
        <table>
        <tr><td align="center"><a href="https://help.eclipse.org/topic/org.eclipse.platform.doc.isv/reference/api/org/eclipse/swt/widgets/Spinner.html"><img src="gallery-spinner.png" width="98" height="67" border="0" alt="Spinner"></a>
        <tr><td align="center"><b>Spinner</b><br>
        <small><a href="https://help.eclipse.org/topic/org.eclipse.platform.doc.isv/reference/api/org/eclipse/swt/widgets/Spinner.html">javadoc</a> -
        <a href="../snippets/#spinner">snippets</a></small>
        </table>
	<td align="center" valign="bottom">
        <table>
        <tr><td align="center"><a href="https://help.eclipse.org/topic/org.eclipse.platform.doc.isv/reference/api/org/eclipse/swt/custom/StyledText.html"><img src="gallery-styledtext.png" width="208" height="98" border="0" alt="StyledText"></a>
        <tr><td align="center"><b>StyledText</b><br>
        <small><a href="https://help.eclipse.org/topic/org.eclipse.platform.doc.isv/reference/api/org/eclipse/swt/custom/StyledText.html">javadoc</a> -
        <a href="../snippets/#styledtext">snippets</a></small>
        </table>
    <td align="center" valign="bottom">
        <table>
        <tr><td align="center"><a href="https://help.eclipse.org/topic/org.eclipse.platform.doc.isv/reference/api/org/eclipse/swt/widgets/TabFolder.html"><img src="gallery-tabfolder.png" width="178" height="116" border="0" alt="TabFolder"></a>
        <tr><td align="center"><b>TabFolder</b><br>
        <small><a href="https://help.eclipse.org/topic/org.eclipse.platform.doc.isv/reference/api/org/eclipse/swt/widgets/TabFolder.html">javadoc</a> -
        <a href="../snippets/#tabfolder">snippets</a></small>
        </table>
<tr><td height="25px"><td><td>
<tr><td align="center" valign="bottom">
        <table>
        <tr><td align="center"><a href="https://help.eclipse.org/topic/org.eclipse.platform.doc.isv/reference/api/org/eclipse/swt/widgets/Table.html"><img src="gallery-table.png" width="210" height="130" border="0" alt="Table"></a>
        <tr><td align="center"><b>Table</b><br>
        <small><a href="https://help.eclipse.org/topic/org.eclipse.platform.doc.isv/reference/api/org/eclipse/swt/widgets/Table.html">javadoc</a> -
        <a href="../snippets/#table">snippets</a></small>
        </table>
	<td align="center" valign="bottom">
        <table>
        <tr><td align="center"><a href="https://help.eclipse.org/topic/org.eclipse.platform.doc.isv/reference/api/org/eclipse/swt/widgets/Text.html"><img src="gallery-textsingle.png" width="185" height="66" border="0" alt="Text"></a>
        <tr><td align="center"><b>Text</b> (<tt>SWT.SINGLE</tt>)<br>
        <small><a href="https://help.eclipse.org/topic/org.eclipse.platform.doc.isv/reference/api/org/eclipse/swt/widgets/Text.html">javadoc</a> -
        <a href="../snippets/#text">snippets</a></small>
        </table>
    <td align="center" valign="bottom">
        <table>
        <tr><td align="center"><a href="https://help.eclipse.org/topic/org.eclipse.platform.doc.isv/reference/api/org/eclipse/swt/widgets/Text.html"><img src="gallery-textmulti.png" width="180" height="79" border="0" alt="Text"></a>
        <tr><td align="center"><b>Text</b> (<tt>SWT.MULTI</tt>)<br>
        <small><a href="https://help.eclipse.org/topic/org.eclipse.platform.doc.isv/reference/api/org/eclipse/swt/widgets/Text.html">javadoc</a> -
        <a href="../snippets/#text">snippets</a></small>
        </table>
<tr><td height="25px"><td><td>
<tr><td align="center" valign="bottom">
        <table>
        <tr><td align="center"><a href="https://help.eclipse.org/topic/org.eclipse.platform.doc.isv/reference/api/org/eclipse/swt/widgets/ToolBar.html"><img src="gallery-toolbar.png" width="185" height="60" border="0" alt="ToolBar"></a>
        <tr><td align="center"><b>ToolBar</b><br>
        <small><a href="https://help.eclipse.org/topic/org.eclipse.platform.doc.isv/reference/api/org/eclipse/swt/widgets/ToolBar.html">javadoc</a> -
        <a href="../snippets/#toolbar">snippets</a></small>
        </table>
	<td align="center" valign="bottom">
        <table>
        <tr><td align="center"><a href="https://help.eclipse.org/topic/org.eclipse.platform.doc.isv/reference/api/org/eclipse/swt/widgets/Tray.html"><img src="gallery-tray.png" width="180" height="90" border="0" alt="Tray"></a>
        <tr><td align="center"><b>Tray</b><br>
        <small><a href="https://help.eclipse.org/topic/org.eclipse.platform.doc.isv/reference/api/org/eclipse/swt/widgets/Tray.html">javadoc</a> -
        <a href="../snippets/#tray">snippets</a></small>
        </table>
    <td align="center" valign="bottom">
        <table>
        <tr><td align="center"><a href="https://help.eclipse.org/topic/org.eclipse.platform.doc.isv/reference/api/org/eclipse/swt/widgets/Tree.html"><img src="gallery-tree.png" width="185" height="134" border="0" alt="Tree"></a>
        <tr><td align="center"><b>Tree</b><br>
        <small><a href="https://help.eclipse.org/topic/org.eclipse.platform.doc.isv/reference/api/org/eclipse/swt/widgets/Tree.html">javadoc</a> -
        <a href="../snippets/#tree">snippets</a></small>
        </table>
</table>
</div>
<?php 
$html = ob_get_clean();

# Generate the web page
$App->generatePage($theme, $Menu, $Nav, $pageAuthor, $pageKeywords, $pageTitle, $html);
?>