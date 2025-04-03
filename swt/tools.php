<?php require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/app.class.php");	require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/nav.class.php"); 	require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/menu.class.php"); 	$App 	= new App();	$Nav	= new Nav();	$Menu 	= new Menu();		include($App->getProjectCommon());

$pageTitle = "SWT Development Tools";

ob_start();
?>
<div id="midcolumn">
<h1>SWT Development Tools</h1>

<p>The SWT Development Tools described in this page are available from the <a href="updatesite.php">SWT Tools Update Sites</a></p>

<p><b>JniGen</b> is a tool that generates JNI wrappers for creating the SWT Platform Interface (PI).
For more information on how to generate the JNI code, see <a href="jnigen.php">this tutorial</a>.</p>

<p><b>Sleak</b> is a simple tool that monitors the creation and disposal of SWT graphics resources.
(<a href="http://www.eclipse.org/articles/swt-design-2/sleak.htm">see tutorial</a>)</p>
<ul>
  <li><b>Install Sleak plug-in</b> from <a href="updatesite.php">SWT Tools Update Sites</a></li>
</ul>
<ul>
  <li><b>After installing the Sleak plug-in (above):</b></li>
    <ul>
      <li>Create an empty options file with the following lines in it:
           <br><code>org.eclipse.ui/debug=true</code>
           <br><code>org.eclipse.ui/trace/graphics=true</code></li>
      <li>Launch Eclipse with the "-debug OPTIONS" where OPTIONS is the path to the options file created.
      <li>Open the SWT Sleak view (Window &gt; Show View &gt; Other ... &gt; SWT Tools &gt; Sleak)</li>
      <li>The plug-in monitors all other plug-ins running in its Eclipse environment.</li>
    </ul>
</ul><ul>
  <li><b>Sleak for standalone applications </b><a href="https://github.com/eclipse-platform/eclipse.platform.swt/tree/master/bundles/org.eclipse.swt.tools.spies/src/org/eclipse/swt/tools/internal/Sleak.java">(Sleak.java)</a></li>
</ul>

<p><b>SWT Spy plug-in</b> for Eclipse is a simple tool that prints out
information about the widget under the cursor.  Currently, this includes
style, layout and parent information.</p>

<ul>
  <li>Install Spy plug-in from <a href="updatesite.php">SWT Tools Update Sites</a>.</li>
</ul>
<ul>
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