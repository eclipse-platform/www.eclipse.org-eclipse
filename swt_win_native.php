<?php require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/app.class.php");	require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/nav.class.php"); 	require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/menu.class.php"); 	$App 	= new App();	$Nav	= new Nav();	$Menu 	= new Menu();		include($App->getProjectCommon());

$pageTitle = "Setting SWT windows native build setup";

ob_start();
?>
<div id="midcolumn">

<h1>Setting SWT windows native build setup</h1>

<h3>Software needed for setting up windows native build</h3>
<ol>
<li><p> Microsoft 'Visual Studio - Community 2017' and 'Windows 10 SDK', link to <a href="https://www.visualstudio.com/thank-you-downloading-visual-studio/?sku=Community&rel=15">download page</a></p>
<li><p> JDK8 64bit and 32bit, link to <a href="http://www.oracle.com/technetwork/java/javase/overview/java8-2100321.html">Oracle JDK</a> or <a href="https://developer.ibm.com/javasdk/downloads/">IBM JDK</a></p>
<li><p> Webkit SDKs:</p>
 <ol>
	<li><p><a href="http://build.eclipse.org/eclipse/swt/WebKit-r72896.zip">WebKit-r72896</a></p>
	<li><p><a href="http://build.eclipse.org/eclipse/swt/WebKitSupportLibrary.zip">WebKitSupportLibrary</a></p>
 </ol>
<p><b>Disclaimer:</b></p>
<p><b>Note these Webkit SDKs are an older version being consumed by SWT native build process and
 Webkit build binaries are no more available for download in public <a href="https://webkit.org/downloads/">Webkit download page</a>.</b></p>
<p><b>But WebKit-r72896 sources are still avilable for download in public <a href="https://builds-nightly.webkit.org/files/trunk/src/WebKit-r72896.tar.bz2">main link</a>
and also on <a href="http://build.eclipse.org/eclipse/swt/WebKit-r72896.tar.bz2">backup link</a>.</b></p>
<li> Cygwin [Optional for local setup]</p>
</ol>
<p>Note: [Moved to latest "Win10 SDK" and "Visual Studio 2017 community edition" 
via bugzilla <a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=526802">bug 526802</a>]</b></p>

<h3>Steps to set up Windows native build:</h3>
<ol>
<li>[Optional for local setup] Install and configure Cygwin SSH Server on Windows.
<p> Note: Make sure 'openssh' package is also installed.</p>
<p> For more details on how to configuring SSH refer: <a href="http://docs.oracle.com/cd/E24628_01/install.121/e22624/preinstall_req_cygwin_ssh.htm#CHDJDBIA">link</a></p>

<li>[Optional for local setup] Configure the machine for password-less SSH authentication with the Hudson machine.
<p> For more details you can refer: <a href="http://users.cecs.anu.edu.au/~xzhang/pubDoc/IT/SSH%20without%20password%20from%20Windows.htm">public guide</a></p>
<p> Sharing some key steps below(which I recall):</p>
<ul>
<li><p> Generate the 'dsa' public/private key from your "swtbuild" account from windows machine.</p>
<li><p> Now login to the Hudson machine with "swtbuild" account.</p>
<li><p> Copy the public keys and register then on the Hudson machine.. this should enable password-less authentication.</p>
</ul>

<li><p> 'SWT_BUILDDIR' root directory contain various libraries like Visual Studio libraries, JDK and libraries for compiling Webkit etc.. </p>
<p> Setup your own 'SWT_BUILDDIR' with below like directory structure:</p>
<ul>
<li><p> Install Visual Studio Community 2017 libraries in default location or in: 'SWT_BUILDDIR\Microsoft\Visual Studio\2017'</p>
<li><p> Windows10 SDK gets installed in "Program Files (x86)" directory by default like: 'C:\Program Files (x86)\Windows Kits\10'</p>
<li><p> Unzip the two Webkit SDKs into 'SWT_BUILDDIR\Webkit' as below directories:</p>
	<ol>
	<li><p>'SWT_BUILDDIR\Webkit\r72896'</p>
	<li><p>'SWT_BUILDDIR\Webkit\SupportLibrary'</p>
	</ol>
	<p>Note: SWT's Webkit support exists for SWT 32bit on Windows, so Webkit SDKs are consumed only by the SWT 32bit build process.</p>
<li><p> Install/Unzip JDK8 64bit in 'SWT_BUILDDIR\Java\Oracle\jdk1.8.0-latest\x64'</p>
<li><p> Install/Unzip JDK8 32bit in 'SWT_BUILDDIR\Java\Oracle\jdk1.8.0-latest\x86'</p>
</ul>

<li> <p> For local testing, Run as Ant build below file with 'build_libraries' as target(assuming <a href="git.php">SWT setup</a> is in place):</p>
<p>${workspace_loc:/org.eclipse.swt.win32.win32.x86_64/build.xml}</p>
<p> For building windows native build for 32bit, you need to convert the source to 32bit first, by running 'replace.64.to.32' target</p>
<p> Once sources are converted to 32bit you can run the 'build_libraries' target for ${workspace_loc:/org.eclipse.swt.win32.win32.x86/build.xml}</p>
<li>[Optional for local setup] Now you can point the Windows hudson job to this machine and trigger a native build.
<p> Note: For testing purpose from hudson, temporarily turn the nativeChanges flag to 'true' to force a native build compilation.</p>
</ol>

</div>
<?php 
$html = ob_get_clean();

# Generate the web page
$App->generatePage($theme, $Menu, $Nav, $pageAuthor, $pageKeywords, $pageTitle, $html);
?>