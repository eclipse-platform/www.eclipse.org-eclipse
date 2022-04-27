<?php require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/app.class.php");	require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/nav.class.php"); 	require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/menu.class.php"); 	$App 	= new App();	$Nav	= new Nav();	$Menu 	= new Menu();		include($App->getProjectCommon());

$pageTitle = "Setting SWT windows native build setup";

ob_start();
?>
<div id="midcolumn">

<h1>Setting SWT windows native build setup</h1>

<h3>Software needed for setting up windows native build</h3>
<ol>
<li><p> Microsoft 'Visual Studio - Community 2022' and 'Windows 10 SDK', link to <a href="https://visualstudio.microsoft.com/thank-you-downloading-visual-studio/?sku=Community&channel=Release&version=VS2022&source=VSLandingPage&cid=2030&passive=false">download page</a></p>
	<ul>
	<li>Run the web installer.
	<li>Go to "Desktop development with C++".
	<li>Select/turn the check-box ON for below items from the list:
		<ul>
		<li>MSVC v143 - VS 2022 C++ x64/x86 tools(Latest)
		<li>Windows 10 SDK (10.0.19041.0) for Desktop C++
		</ul>
		<p>Note: [Version numbers (v141, 10.0.19041.0) mentioned above get revised as per latest Microsoft 'Visual Studio' update.]</p>
	</ul>
<li><p> JDK11 64bit link to <a href="https://www.oracle.com/java/technologies/downloads/#java11">Oracle JDK</a> or <a href="https://www.ibm.com/support/pages/java-sdk-downloads">IBM JDK</a></p>
<li> Cygwin [Optional for local setup]</p>
</ol>
<p>Note: [Eclipse SWT Windows build scripts upgraded to latest "Win10 SDK" and "Visual Studio 2022" 
via bugzilla <a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=578519">bug 578519</a>]</b></p>

<h3>Steps to set up Windows native build:</h3>
<ol>
<li>[Optional for local setup] Install and configure Cygwin SSH Server on Windows.
<p> Note: Make sure 'openssh' package is also installed.</p>
<p> For more details on how to configuring SSH refer: <a href="http://docs.oracle.com/cd/E24628_01/install.121/e22624/preinstall_req_cygwin_ssh.htm#CHDJDBIA">link</a></p>

<li>[Optional for local setup] Configure the machine for password-less SSH authentication with the build machine.
<p> For more details you can refer: <a href="http://users.cecs.anu.edu.au/~xzhang/pubDoc/IT/SSH%20without%20password%20from%20Windows.htm">public guide</a></p>
<p> Sharing some key steps below(which I recall):</p>
<ul>
<li><p> Generate the 'dsa' public/private key from your "swtbuild" account from windows machine.</p>
<li><p> Now login to the build machine with "swtbuild" account.</p>
<li><p> Copy the public keys and register then on the build machine.. this should enable password-less authentication.</p>
</ul>

<li><p> 'SWT_BUILDDIR' root directory contain various libraries like Visual Studio libraries, JDK, etc.. </p>
<p> Setup your own 'SWT_BUILDDIR' with below like directory structure:</p>
<ul>
<li><p> Install Visual Studio Community 2019 libraries in default location or in: 'SWT_BUILDDIR\Microsoft\Visual Studio\2019'</p>
<li><p> Windows10 SDK gets installed in "Program Files (x86)" directory by default like: 'C:\Program Files (x86)\Windows Kits\10'</p>
<li><p> Install/Unzip JDK8 64bit in 'SWT_BUILDDIR\Java\Oracle\jdk1.8.0-latest\x64'</p>
</ul>

<li> <p> For local testing, Run as Ant build below file with 'build_libraries' as target(assuming <a href="git.php">SWT setup</a> is in place):</p>
<p>${workspace_loc:/org.eclipse.swt.win32.win32.x86_64/build.xml}</p>
<li>[Optional for local setup] Now you can point the Windows build job to this machine and trigger a native build.
<p> Note: For testing purpose from build machine, temporarily turn the nativeChanges flag to 'true' to force a native build compilation.</p>
</ol>

</div>
<?php 
$html = ob_get_clean();

# Generate the web page
$App->generatePage($theme, $Menu, $Nav, $pageAuthor, $pageKeywords, $pageTitle, $html);
?>