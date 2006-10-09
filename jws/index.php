<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
    <title>How to Deploy SWT Applications with Java Web Start</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="Content-Style-Type" content="text/css">
    <link rel="stylesheet" href="http://dev.eclipse.org/default_style.css" type="text/css">
    <link rel="stylesheet" href="../swt.css" type="text/css">
    <link rel="shortcut icon" href="http://www.eclipse.org/images/eclipse.ico" type="image/x-icon">
</head>
<body bgcolor="#ffffff" text="#000000">
<table width="800px" class="swtpage">
<colgroup><col width="125px"><col width="675px"></colgroup>
<tr><?php include "../sidebar.php"; ?>
<td valign="top" style="padding: 10px"><h1 style="padding: 0; margin: 0; border-bottom: 1px solid #000000;">How to deploy SWT Applications with Java Web Start</h1>

<p>SWT applications can be deployed using Java Web Start (JWS).  Here are the steps to help you package and deploy your SWT application with JWS.</p>
<p>First, create jar archives with SWT and its libraries for each platform that you wish to run on: (see <a href="#platformsnote">supported platforms</a> note)</p>
<ol>
	<li>Create a directory <em>&lt;yourApplication&gt;</em> for collecting the deployable .jar archives.</li>
	<li>Go to <a href="http://www.eclipse.org/swt/">http://www.eclipse.org/swt</a> and download the desired SWT Release for one of your target platforms. Extract this into a convenient location.</li>
	<li>Rename the <em>swt.jar</em> file in the extracted folder to a name that describes its target platform, such as <em>swt-&lt;platform&gt;.jar</em>.</li>
	<li>Create a .jar archive of SWT's native libraries for the target platform by going into the extracted folder and executing <em>"<code>jar cvf swt-native-&lt;platform&gt;.jar *.&lt;library-suffix&gt;</code>"</em>.
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
	<li>Repeat step 2 for each of the <em>swt-&lt;platform&gt;.jar</em> and <em>swt-native-&lt;platform&gt;.jar</em> archives.</li>
</ol>

<p>The last step is to create a .jnlp file that will be used to launch your application through JWS <a href="http://java.sun.com/j2se/1.5.0/docs/guide/javaws/developersguide/syntax.html">(jnlp syntax guide)</a>.
The example .jnlp file below demonstrates how to specify the SWT jars based on the target platform. </p>

<table style="border: solid 1px #000000; margin-left: auto; margin-right: auto; background-color: #eeeeff">
<tr><td><pre style="margin: 0; padding:0;">&lt;?xml version="1.0" encoding="utf-8"?&gt;
&lt;jnlp spec="1.0+"
	codebase="http://www.eclipse.org/swt/jws"
	href="controlexample.jnlp"&gt;
	&lt;information&gt;
  		&lt;title&gt;Control Example&lt;/title&gt;
  		&lt;vendor&gt;eclipse.org&lt;/vendor&gt;
  		&lt;homepage href="http://www.eclipse.org/swt/jws/" /&gt;
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
		&lt;nativelib href="swt-native-win32-win32.jar" /&gt;
		&lt;jar href="swt-win32-win32.jar" /&gt;
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
		&lt;nativelib href="swt-native-motif-linux-x86.jar" /&gt;
		&lt;jar href="swt-motif-linux-x86.jar" /&gt;
	&lt;/resources&gt;

	&lt;resources os="SunOS" arch="sparc"&gt;
		&lt;nativelib href="swt-native-gtk-solaris-sparc.jar" /&gt;
		&lt;jar href="swt-gtk-solaris-sparc.jar" /&gt;
	&lt;/resources&gt;

	&lt;application-desc main-class="org.eclipse.swt.examples.controlexample.ControlExample" /&gt;
&lt;/jnlp&gt;</pre></td></tr></table>

<p>Now you can test the deployment of your application by pointing your browser at your .jnlp file (note that you must either have Java 1.5 or JWS
installed on your machine). You can also create a link to the .jnlp file from an HTML page, as shown below. If all steps have been done correctly then
JWS will ask if you want to trust your own unverified signature, and after answering Yes, your application will appear.  (Example:
<a href="http://www.eclipse.org/swt/jws/controlexample.jnlp">http://www.eclipse.org/swt/jws/controlexample.jnlp</a>).</p>

<img src="./swtjwscontrol.png" alt="SWT Control Example launched via Java Web Start">

<p>Voil&agrave;, your application is now deployable via Java Web Start!</p>

<a name="platformsnote"></a><b>Note:</b> As of SWT 3.2, SWT applications are not deployable using JWS on Mac OS X.
See <a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=63306">bug 63306</a>.
</table>
</body>
</html>