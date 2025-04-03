<?php require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/app.class.php");	require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/nav.class.php"); 	require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/menu.class.php"); 	$App 	= new App();	$Nav	= new Nav();	$Menu 	= new Menu();		include($App->getProjectCommon());

$pageTitle = "Using SWT from Git";

ob_start();
?>
<div id="midcolumn">
<h1>Using SWT from Git</h1>
<h3>Intro</h3>
<p>As part of the Eclipse Git migration, SWT has moved all of its CVS projects into 2 Git repos first - one for sources and one for binaries.
Nowadays the binaries are also stored in the sources repository using Git Large File Storage (LFS) so that only one SWT Git repository exists.
<br>For those new to the Git world, there are many resources available online that can provide an intro to Git. Some recommended ones:
<ul>
<li>The <a href="https://git-scm.com/">git homepage</a> has a <a href="https://git-scm.com/documentation">documentation section</a> with good links to tutorials.</li>
<li>The online <a href="https://git-scm.com/book/en/v2">Pro Git</a> book provides a more comprehensive overview of Git.</li>
<li>The <a href="https://git-lfs.com/">Git Large File Storage (LFS) </a> provides a basic overview of Git-LFS.</li>

</ul>
</p>
<h3>Git Web View</h3>
<p>SWT lives at GitHub. The SWT repo can be viewed online at:
<ul>
<li><a href="https://github.com/eclipse-platform/eclipse.platform.swt/">eclipse.platform.swt.git</a></li> 
</ul>
The <a href="https://github.com/eclipse-platform/eclipse.platform.swt.binaries/">eclipse.platform.swt.binaries.git</a> repository is now obsolete and effectively archived.


<h3>Cloning the SWT repos</h3>
Anonymous git access to the SWT repositories can be obtained through either http or git protocols. To clone the SWT repos from the command line:
<ul>
<li><a href="https://docs.github.com/en/get-started/quickstart/fork-a-repo">Fork SWT repositories</a></li>
<li><a href="https://docs.github.com/en/repositories/creating-and-managing-repositories/cloning-a-repository">Clone your own fork locally</a></li>
</ul>
</p>


<h3>Using EGit</h3>
<p>While it is possible to use git (with <a href="https://github.com/git-lfs/git-lfs#installing">git-lfs installed</a>) only from the command line to develop SWT, it is recommended to use EGit to allow you to perform all git operations from within Eclipse.
Here is a quick guide to help you get set up (<b>see also <a href="https://wiki.eclipse.org/Platform-releng/Git_Workflows#Clone_a_repo">Platform-releng/Git Workflows page</a> for more workflow hints.</b>).<p>
<p>
The <a href="https://wiki.eclipse.org/EGit/User_Guide">EGit User guide</a> and especially its section about <a href="https://wiki.eclipse.org/EGit/User_Guide#GIT_LFS_Support">EGit's LFS support</a> provide general help with EGit.
</p>
<h4>Installing EGit with LFS Support</h4>
<p>
You can install EGit and its LFS Support from <a href="https://download.eclipse.org/releases/latest/">Latest Eclipse Simultaneous Release</a>, it's already available.
From within Eclipse, you can select Help>Install New Software... and then select the 2020-03 (or newer) site from the 'Work With' combo box.
From underneath the 'Collaboration' section select and install
<ul>
<li><code>Git integration for Eclipse</code></li>
<li><code>Java implementation of Git - optional LFS support</code></li>
</ul>

After EGit with LFS Support is installed make sure <a href="https://wiki.eclipse.org/EGit/User_Guide#GIT_LFS_Support">LFS support is enabled, ideally globally</a>.
</p>
<h4>Getting the Source</h4>
<p>
Getting the source is a two step process. First you clone the repository to the location specified in the Git preferences pages, and then you
must import the repos into your workspace. Note it is also possible to clone the repositiories via the command line tools and then just import
them into your workspace.
</p>
<h4>Cloning the SWT repos</h4>
<p>
<ol>
<li>Switch to the Git Repository Exploring perspective.</li>
<li>Click on Clone a Git repository
<center><p><img src="images/egit.clone.png" alt="Clone egit"></p></center>
</li>
<li>Paste one of the following URIs into the URI field, and EGit will fill in the rest for you. When finished, click Next.
<br>
For committer access, fork the repository and clone your own fork (substitute in proper userid):
<ul>
<li>https://github.com/userid/eclipse.platform.swt.git</li>
<li>https://github.com/userid/eclipse.platform.swt.binaries.git</li>
</ul>
</li>
<li>Select master and any other branches that you are interested in. Click Next.  
<center><p><img src="images/egit.branches.png" alt="Get branches"></p></center>
</li>
<li>Confirm the destination directory. Click Finish</li>
</ol>
</p>
<h4>Alternative - Adding an externally cloned SWT repo</h4>
<p>
<b>Note: If you have cloned the repository with EGit you can skip this step. This step is just for people who
have cloned a repo from the command line and want to import it. </b>
<ol>
<li>In the Git Repositories perspective, select the Add Git Repositories button</li>
<li>Browse to the directory that contains the repo and click search.</li>
<li>Select the found repos and click OK.</li>
</ol>
</p>
<h4>Importing the SWT bundles into your workspace</h4>
<p>
<ol>
<li>Once you have a repo cloned, right click on it and select Import Projects... (These screenshots show importing the source repo 
first).</li>
<li>Choose Import existing projects and click Next.
<center><p><img src="images/egit.import.png" alt="Clone repo"></p></center>
</li>
<li>Select which projects you want to import and click Finish. Although you can import all projects from
both repos, it might be better to select only the minimum set of projects you are interested in to keep
your workspace small (for example, org.eclipse.swt and org.eclipse.swt.cocoa.macosx if you are doing Cocoa
development).
<center><p><img src="images/egit.import2.png" alt="Clone repo"></p></center>
</li>
<li>Now repeat the same steps to import the other repository into the workspace.</li>
</ol>
</p>
<h4>Configuring EGit </h4>
<p>
Open Eclipse Preferences..., and expand the Team item in the tree. Under the Git item, select Configuration. Check the user name and 
and email - this will be used on all commits.

<center><p><img src="images/egit.prefs.name.png" alt="Adding user name and email"></p></center>
</p>
<p>
Next switch to the Repository Settings tab. Under the branch tree, select the branch you are working on (most likely master) and
 create a new key with a name branch.[branchname].rebase and a value of true. This will ensure that the history will stay
 linear when merging in changes from the remote repository.
 
 <center><p><img src="images/egite.rebase.png" alt="Rebase"></p></center>
</p>
<h4>Setting Up SWT</h4>
    <ol>
    <li>Once you have imported the projects from both eclipse.platform.swt and eclipse.platform.swt.binaries into your workspace, you are ready
    to switch the classpath to match whatever platform you are runnning with.

        <p>Each platform has a module for the binaries categorized by
        toolkit, OS, and CPU architecture.  Examples:</p>

        <table style="border-collapse: collapse; border: 1px solid #000000; margin-left: auto; margin-right: auto; padding: 0px;" width="80%">
        <tr><th style="background: #0080c0; color: #ffffff; border: solid 1px #000000; padding: 4px;">Windows
            <td style="border: 1px solid #000000; padding: 4px; text-align: center;">org.eclipse.swt.win32.win32.x86
        <tr><th style="background: #0080c0; color: #ffffff; border: solid 1px #000000; padding: 4px;">Mac OS X
            <td style="border: 1px solid #000000; padding: 4px; text-align: center;">org.eclipse.swt.cocoa.macosx
            <tr><th style="background: #0080c0; color: #ffffff; border: solid 1px #000000; padding: 4px;">Linux GTK
            <td style="border: 1px solid #000000; padding: 4px; text-align: center;">org.eclipse.swt.gtk.linux.x86
        </table><p></p>
        

    <li>SWT has a different Eclipse <b>.classpath</b> file for each
        platform, so we need to set up Eclipse to use the right one.
        To do this we first show the <b>Navigator</b> view
        (<b>Window > Show View > Navigator</b>).

    <p></p>

    <li>Next, we expand <b>org.eclipse.swt</b> and find the
        <b>.classpath_<em>xxx</em></b> file for our platform and copy it to a file named
        <b>.classpath</b>.

        <center><p><img src="images/egit.classpath.png" alt="Name Conflict dialog with .classpath in the New Name field"></p></center>

    <li>After changing a <b>.classpath</b> file, it's usually a good
        idea to clean the projects that depend on it to make sure
        everyone is cool.
        <br>(Note that if you are building for a 64-bit platform, there is an extra step needed.
        Please see <a href="faq.php#gtk64">this FAQ</a> for details).

        <center><p><img src="images/egit.clean.png" alt="Using Project &gt; Clean... to recompile"></p></center>

    <li>We're ready to go!  To test our checkout, let's find an SWT
        application to run.  How about the ControlExample.

        <center><p><img src="images/egit.controlexample.png" alt="org.eclipse.swt.examples.controlexample.ControlExample in the Package Explorer view"></p></center>

    <li>After we've selected the ControlExample.java file, we can run
        it using <b>Run &gt; Run As &gt; Java Application</b>.

    <li>Optionally you can setup SWT native build setup
    <ul>
    <li> <a href="swt_win_native.php">Windows native build setup page</a>
    <li> Linux native build setup page
    <li> MAC native build setup page
    </ul>
    </ol>
    
<p>And there you go!</p>

</div>
<?php 
$html = ob_get_clean();

# Generate the web page
$App->generatePage($theme, $Menu, $Nav, $pageAuthor, $pageKeywords, $pageTitle, $html);
?>