<?php require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/app.class.php");	require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/nav.class.php"); 	require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/menu.class.php"); 	$App 	= new App();	$Nav	= new Nav();	$Menu 	= new Menu();		include($App->getProjectCommon());

$pageTitle = "How to Deploy SWT Applications using Java Web Start";

ob_start();
?>
<div id="midcolumn">
<h1>How to deploy SWT Applications using Java Web Start</h1>

<p>SWT applications can be deployed using Java Web Start (JWS).  Here are the steps to help you package and deploy your SWT application with JWS.</p>
<p>First, create jar archives with SWT and its libraries for each platform that you wish to run on:</p>
<ol>
	<li>Create a directory <em>&lt;yourApplication&gt;</em> for collecting the deployable .jar archives.</li>
	<li>Go to <a href="https://www.eclipse.org/swt/">https://www.eclipse.org/swt</a> and download the desired SWT Release for one of your target platforms. Extract this into a convenient location.</li>
	<li>Rename the <em>swt.jar</em> file in the extracted folder to a name that describes its target platform, such as <em>swt-&lt;ws&gt;-&lt;os&gt;-&lt;arch&gt;.jar</em>.</li>
	<li><em>(If you are packaging SWT version 3.3 or newer then this step should be skipped)</em> Create a .jar archive of SWT's native libraries for the target platform by going into the extracted folder and executing <em>"<code>jar cvf swt-native-&lt;ws&gt;-&lt;os&gt;-&lt;arch&gt;.jar *.&lt;library-suffix&gt;</code>"</em>.
		<em>&lt;library-suffix&gt;</em> will be <em>"dll"</em> for Windows and <em>"so"</em> for Linux and Solaris.</li>
	<li>Copy the jars from steps 3 and 4 into the <em>&lt;yourApplication&gt;</em> directory.  Repeat steps 2 through 4 for each target platform.</li>
</ol>

<p>Second, create a jar archive with your application:</p>
<ol>
	<li>In Eclipse, select your application's project(s) and invoke the <em>File->Export...</em> menu item.</li>
	<li>In the Export wizard selector, select <em>Java - Jar file</em> and press the <em>Next</em> button.</li>
	<li>Select the files that are to be deployed, set the export destination to <em>&lt;yourApplication&gt;/&lt;yourApplication&gt;.jar</em>, and press <em>Finish</em>.</li>
</ol>

<p>Third, sign all jar archives that are to be deployed:</p>
<ol>
	<li>Go into the <em>&lt;yourApplication&gt;</em> folder, execute <em>"<code>keytool -genkey -keystore keystore -alias myself</code>"</em>, and enter all required information.</li>
	<li>Execute <em>"<code>jarsigner -keystore keystore &lt;yourApplication&gt;.jar myself</code>"</em></li>
	<li>Repeat step 2 for each of the <em>swt-&lt;ws&gt;-&lt;os&gt;-&lt;arch&gt;.jar</em> and <em>swt-native-&lt;ws&gt;-&lt;os&gt;-&lt;arch&gt;.jar</em> archives.</li>
</ol>

<p>The last step is to create a .jnlp file that will be used to launch your application through JWS <a href="https://docs.oracle.com/javase/1.5.0/docs/guide/javaws/developersguide/syntax.html">(jnlp syntax guide)</a>.
The example .jnlp file below demonstrates how to specify the SWT jars based on the target platform
<em>(note that if you are packaging SWT version 3.3 or newer then the &lt;nativelib&gt; tags are not needed)</em>.</p>

<table style="border: solid 1px #000000; margin-left: auto; margin-right: auto; background-color: #eeeeff">
<tr><td><pre style="margin: 0; padding:0;">&lt;?xml version="1.0" encoding="utf-8"?&gt;
&lt;jnlp spec="1.0+"
	codebase="https://www.eclipse.org/swt/jws"
	href="controlexample.jnlp"&gt;
	&lt;information&gt;
  		&lt;title&gt;Control Example&lt;/title&gt;
  		&lt;vendor&gt;eclipse.org&lt;/vendor&gt;
  		&lt;homepage href="https://www.eclipse.org/swt/jws/" /&gt;
  		&lt;description&gt;A demonstration of SWT Widgets&lt;/description&gt;
  		&lt;description&gt;Control Example&lt;/description&gt;
	&lt;/information&gt;

	&lt;security&gt;
		&lt;all-permissions /&gt;
	&lt;/security&gt;

	&lt;resources&gt;
		&lt;j2se version="1.4+" /&gt;
		&lt;jar href="controlexample.jar" /&gt;
	&lt;/resources&gt;

	&lt;resources os="Windows" arch="x86"&gt;
		&lt;nativelib href="swt-native-win32-windows-x86.jar" /&gt;
		&lt;jar href="swt-win32-windows-x86.jar" /&gt;
	&lt;/resources&gt;

	&lt;resources os="Windows" arch="x86_64"&gt;
		&lt;nativelib href="swt-native-win32-windows-x86_64.jar" /&gt;
		&lt;jar href="swt-win32-windows-x86_64.jar" /&gt;
	&lt;/resources&gt;

	&lt;resources os="Windows" arch="amd64"&gt;
		&lt;nativelib href="swt-native-win32-windows-amd64.jar" /&gt;
		&lt;jar href="swt-win32-windows-x86_64.jar" /&gt;
	&lt;/resources&gt;

	&lt;resources os="Linux" arch="ppc"&gt;
		&lt;nativelib href="swt-native-gtk-linux-ppc.jar" /&gt;
		&lt;jar href="swt-gtk-linux-ppc.jar" /&gt;
	&lt;/resources&gt;

	&lt;resources os="Linux" arch="x86_64"&gt;
		&lt;nativelib href="swt-native-gtk-linux-x86_64.jar" /&gt;
		&lt;jar href="swt-gtk-linux-x86_64.jar" /&gt;
	&lt;/resources&gt;

	&lt;resources os="Linux" arch="amd64"&gt;
		&lt;nativelib href="swt-native-gtk-linux-x86_64.jar" /&gt;
		&lt;jar href="swt-gtk-linux-x86_64.jar" /&gt;
	&lt;/resources&gt;

	&lt;resources os="Linux"&gt;
		&lt;nativelib href="swt-native-gtk-linux-x86.jar" /&gt;
		&lt;jar href="swt-gtk-linux-x86.jar" /&gt;
	&lt;/resources&gt;

	&lt;resources os="SunOS" arch="sparc"&gt;
		&lt;nativelib href="swt-native-gtk-solaris-sparc.jar" /&gt;
		&lt;jar href="swt-gtk-solaris-sparc.jar" /&gt;
	&lt;/resources&gt;

	&lt;resources os="SunOS" arch="x86"&gt;
		&lt;nativelib href="swt-native-gtk-solaris-x86.jar" /&gt;
		&lt;jar href="swt-gtk-solaris-x86.jar" /&gt;
	&lt;/resources&gt;

	&lt;application-desc main-class="org.eclipse.swt.examples.controlexample.ControlExample" /&gt;
&lt;/jnlp&gt;</pre></td></tr></table>

<p>Now you can test the deployment of your application by pointing your browser at your .jnlp file (note that you must either have Java 1.5 or JWS
installed on your machine). You can also create a link to the .jnlp file from an HTML page, as shown below. If all steps have been done correctly then
JWS will ask if you want to trust your own unverified signature, and after answering Yes, your application will appear.  (Example:
<a href="https://www.eclipse.org/swt/jws/controlexample.jnlp">https://www.eclipse.org/swt/jws/controlexample.jnlp</a>).</p>

<img src="./swtjwscontrol.png" alt="SWT Control Example launched via Java Web Start">

<p>Voil&agrave;, your application is now deployable via Java Web Start!</p>

</div>
<?php 
$html = ob_get_clean();

# Generate the web page
$App->generatePage($theme, $Menu, $Nav, $pageAuthor, $pageKeywords, $pageTitle, $html);
?>