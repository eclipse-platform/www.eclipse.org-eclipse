<?php require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/app.class.php");	require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/nav.class.php"); 	require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/menu.class.php"); 	$App 	= new App();	$Nav	= new Nav();	$Menu 	= new Menu();		include($App->getProjectCommon());

$pageTitle = "SWT Development Tools";

ob_start();
?>
<div id="midcolumn">
<h1>SWT Development Tools</h1>

<p>The SWT Development Tools are available from the <a href="updatesite.php">SWT Tools Update Sites</a></p>

<p><b>JniGen</b> is a tool that generates JNI wrappers for creating the SWT Platform Interface (PI).
For more information on how to generate the JNI code, see <a href="jnigen.php">this tutorial</a>.</p>

<p><b>Sleak</b> is a simple tool that monitors the creation and disposal of SWT graphics resources.
(<a href="http://www.eclipse.org/articles/swt-design-2/sleak.htm">see tutorial</a>)</p>
<ul>
  <li><b>Sleak plug-in for Eclipse 2.1.0 to 3.3</b> <a href="tools/org.eclipse.swt.sleak_1.0.0.zip">(zip file)</a>
    <ul><li>Extract the zip file into the <code>eclipse/plugins/</code> folder.</li></ul></li>
  <li><b>Sleak plug-in for Eclipse 3.4 M1 - M5</b> <a href="tools/org.eclipse.swt.sleak_1.0.1.zip">(zip file)</a>
    <ul><li>Extract the zip file into the <code>eclipse/plugins/</code> folder.</li></ul></li>
  <li><b>Sleak plug-in for Eclipse 3.4 M6 - 3.5</b> <a href="tools/org.eclipse.swt.sleak_1.0.2.zip">(zip file)</a>
    <ul><li>Extract the zip file into the <code>eclipse/dropins/</code> folder.</li></ul></li>
  <li><b>Sleak plug-in for Eclipse 3.5 or later</b> 
    <ul><li>Available from the <a href="updatesite.php">SWT Tools Update Sites</a>.</li></ul></li>
</ul>
<ul>
  <li><b>After installing the Sleak plug-in (above):</b></li>
    <ul>
      <li>Extract the <code>.options</code> file from the <code>eclipse/plugins/org.eclipse.ui_&lt;version&gt;.jar</code> archive to the <code>eclipse/</code> folder.</li>
      <li>Add the following lines to the <code>.options</code> file:
           <br><code>org.eclipse.ui/debug=true</code>
           <br><code>org.eclipse.ui/trace/graphics=true</code></li>
      <li>Launch Eclipse with the "-clean -debug" options on the command line.
       	   <ul><li>Note that you do not need the "-clean" option with Eclipse 3.4 M6 or later.</li></ul></li>
      <li>Open the SWT Sleak view (Window &gt; Show View &gt; Other ... &gt; SWT Tools &gt; Sleak)</li>
      <li>The plug-in monitors all other plug-ins running in its Eclipse environment.</li>
    </ul>
</ul><ul>
  <li><b>Sleak for standalone applications </b><a href="http://git.eclipse.org/c/platform/eclipse.platform.swt.git/tree/bundles/org.eclipse.swt.tools/Sleak/org/eclipse/swt/tools/internal/Sleak.java">(Sleak.java)</a></li>
</ul>

<p><b>SWT Spy plug-in</b> for Eclipse is a simple tool that prints out
information about the widget under the cursor.  Currently, this includes
style, layout and parent information.</p>

<ul>
  <li>Requires Eclipse 3.0 or later.</li>
  <li>As of Eclipse 3.5, this is available from the <a href="updatesite.php">SWT Tools Update Sites</a>.</li>
  <li>Prior to Eclipse 3.5,
	<ul>
	  <li>Save <a href="tools/org.eclipse.swt.spy_1.0.1.jar">org.eclipse.swt.spy_1.0.1.jar</a>
      into the <code>eclipse/plugins/</code> folder.</li>
	  <li>Launch Eclipse with "-clean" option (clears caches so Eclipse will pick up new plugin).</li>
	</ul></li>
</ul><ul>
  <li><b>After installing the Spy plug-in (above):</b></li>
  <ul>
    <li>Open the SWT Spy view (Window &gt; Show View &gt; Other ... &gt; SWT Tools &gt; SWT Spy).</li>
    <li>Enable collection of info by clicking on the "Monitor" button in Spy view.</li>
    <li>Move cursor over the control of interest and see data printed in Spy view.</li>
    <li>To start or stop data collection while over a control, toggle the monitor action using CONTROL+ALT+SHIFT+".".</li>
  </ul>
</ul>

</div>
<?php 
$html = ob_get_clean();

# Generate the web page
$App->generatePage($theme, $Menu, $Nav, $pageAuthor, $pageKeywords, $pageTitle, $html);
?>