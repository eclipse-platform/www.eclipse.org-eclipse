<?php require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/app.class.php");	require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/nav.class.php"); 	require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/menu.class.php"); 	$App 	= new App();	$Nav	= new Nav();	$Menu 	= new Menu();		include($App->getProjectCommon());

$pageTitle = "Setting SWT windows native build setup";

ob_start();
?>
<div id="midcolumn">

<h1>Setting SWT windows native build setup</h1>

<h3>Software needed for setting up windows native build</h3>
<ol>
<li><p>Visual Studio 2008(<b>MSDN license</b> is a pre-requisite)</p>
<li><p>Windows Server 2003 SP1 SDK(<b>MSDN license</b> is a pre-requisite)</p>
<li><p>JDK5(IBM JDK preferred, also work in-progress to upgrade to JDK8 via <a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=520296">bug 520296</a>)</p>
<li><p>Webkit SDK version 'r72896' and WebKitSupportLibrary</p>
</ol>

<h3>Steps to set up Windows native build:</h3>
<ol>
<li> Install and configure Cygwin SSH Server on Windows.
<p> Note: Make sure 'openssh' package is also installed.</p>
<p> For more details on how to configuring SSH refer: <a href="http://docs.oracle.com/cd/E24628_01/install.121/e22624/preinstall_req_cygwin_ssh.htm#CHDJDBIA">link</a></p>

<li> Configure the machine for password-less SSH authentication with the Hudson machine.
<p> For more details you can refer: <a href="http://users.cecs.anu.edu.au/~xzhang/pubDoc/IT/SSH%20without%20password%20from%20Windows.htm">public guide</a></p>
<p> Sharing some key steps below(which I recall):</p>
<ul>
<li><p> Generate the 'dsa' public/private key from your "swtbuild" account from windows machine.</p>
<li><p> Now login to the Hudson machine with "swtbuild" account.</p>
<li><p> Copy the public keys and register then on the Hudson machine.. this should enable password-less authentication.</p>
</ul>

<li> <b>MSDN license</b> is a pre-requisite to configure 'swt-builddir'.
<p> "swt-builddir" can be copied from one of the existing windows build machine, recommended path is C:\BUILD\swt-builddir<p>
<p> This directory contains various libraries like Windows SDKs, Visual Studio libraries, JDK and libraries for compiling Webkit etc.. </p>
<p>or</p>
<p> Create your on 'swt-builddir' with below like directory structure:</p>
<ul>
<li><p> Create directory 'C:\BUILD\swt-builddir'</p>
<li><p> Install Windows Server 2003 SPI SDK in 'C:\BUILD\swt-builddir\MSSDKs\Windows Server 2003 SP1 SDK'</p>
<li><p> Install MS VS2008 in 'C:\BUILD\swt-builddir\MSVCs\Microsoft Visual Studio 8'</p>
<li><p> Install/Unzip Webkit SDK version 'r72896' and WebKitSupportLibrary</p>
<li><p> Install/Unzip IBM(preferred) JDK5 64bit in 'C:\BUILD\swt-builddir\ibm-sdk50-x86_64'</p>
<li><p> Install/Unzip IBM(preferred) JDK5 32bit in 'C:\BUILD\swt-builddir\ibm-java2-sdk-50-win-i386'</p>
<li><p> When using a new version of JDK say Java8, you might need to copy the file 'jawt.lib' from the lib sub-folder to jre\bin.
Note: This step will be optional once we have fix for <a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=520296">bug 520296</a></p>
</ul>

<li> <p> For local testing, Run as Ant build below file with 'build_libraries' as target:</p>
<p>${workspace_loc:/org.eclipse.swt.win32.win32.x86_64/build.xml}</p>

<li> Now you can point the Windows hudson job to this machine and trigger a native build.
<p> Note: For testing purpose from hudson, turn the nativeChanges flag to 'true' to force a native build compilation.</p>
</ol>

</div>
<?php 
$html = ob_get_clean();

# Generate the web page
$App->generatePage($theme, $Menu, $Nav, $pageAuthor, $pageKeywords, $pageTitle, $html);
?>