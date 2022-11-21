<?php require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/app.class.php");	require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/nav.class.php"); 	require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/menu.class.php"); 	$App 	= new App();	$Nav	= new Nav();	$Menu 	= new Menu();		include($App->getProjectCommon());

$pageTitle = "The SWT FAQ";

ob_start();
?>
<div id="midcolumn">
<h1>The SWT FAQ</h1>

<p>If you have questions you believe should go in here, please let us know on
the <a href="http://dev.eclipse.org/mailman/listinfo/platform-dev">Platform developer mailing list</a>
or just open a new bug: https://bugs.eclipse.org/bugs/enter_bug.cgi?product=Platform&component=SWT.</p>

<ul>
  <li><a href="#swtpatchtestingdetails">What are the testing details that should be accompanied with an SWT patch submitted for review?</a></li>
  <li><a href="#whatpackagesinSWT">What packages make up SWT?</a></li>
  <li><a href="#supportJavaBeans">Does SWT support JavaBeans?</a></li>
  <li><a href="#guibuilder">Is there a GUI Builder for SWT?</a></li>
  <li><a href="#whatisasnippet">What is a snippet and why do I care?</a></li>
  <li><a href="#swtsource">Where do I find the SWT source?</a></li>
</ul><ul>
  <li><a href="#howbuildjar">How do I build an SWT jar for my platform?</a></li>
  <li><a href="#howbuildplugin">How do I build the SWT Eclipse plug-in for my platform?</a></li>
  <li><a href="#howbuilddll">How do I build the SWT JNI libraries for my platform?</a></li>
  <li><a href="#howaddnatives">How do I add a new native to the SWT JNI libraries for my platform?</a></li>
  <li><a href="#howaddnativescocoa">How do I add a new native to the SWT JNI libraries for Cocoa?</a></li>
  <li><a href="#gtk64">How do I build the 64-bit version of SWT GTK?</a></li>
</ul><ul>
  <li><a href="#gtkstartup">Which GTK version do I need to run SWT?</a></li>
  <li><a href="#gtkversion">Which GTK version is being used by SWT?</a></li>
  <li><a href="#cocoa64launch">Why do I get an UnsatisfiedLinkError when launching from the 64-bit Cocoa port?</a></li>
</ul><ul>
  <li><a href="#winexternalmanifestfile">How to enable external manifest file on Windows?</a></li>
  <li><a href="#win10dpiawareness">How to enable 'dpiAwareness' setting on Windows 10?</a></li>
  <li><a href="#gtkfontsandcolors">On gtk, how do I change the default fonts and colors of widgets?</a></li>
</ul><ul>
  <li><a href="#missingjar">Why do I get the error "java.lang.NoClassDefFoundError: org/eclipse/swt/internal/XXX/OS."?</a></li>
  <li><a href="#missingdll">Why do I get the error "java.lang.UnsatisfiedLinkError: no swt-win32-3232 in java.library.path."?</a></li>
  <li><a href="#konquerorUnzip">Why do I get an error beginning with "...SWTException: Unsupported or unrecognized format" on startup?</a></li>
  <li><a href="#useUnzip">Why do I get the error "error while loading shared libraries: ./libXm.so.2: file too short" on startup?</a></li>
  <li><a href="#missinglibXm">Why do I get the error "java.lang.UnsatisfiedLinkError: libXm.so.2: cannot open shared object file: No such file or directory."?</a></li>
  <li><a href="#reflectionX">Why do I get an error beginning with "org.eclipse.swt.SWTError: Font not valid" on startup?</a></li>
  <li><a href="#notenoughheap">Why do I get the error "java.lang.OutOfMemoryError: Java heap space" when I try to create a very large Image?</a></li>
  <li><a href="#debugmode">How do I enable debug mode in Eclipse for SWT?</a></li>
  <li><a href="#cairoRemoved">Why does Eclipse (4.2 and greater) on GTK crash with a call to org.eclipse.swt.internal.C.memmove originating from some graphics call?</a></li>
</ul><ul>
  <li><a href="#swinginswt">Can I use Swing or AWT inside Eclipse?</a></li>
  <li><a href="#subclassing">Why can't I subclass SWT widgets like Button and Table?</a></li>
  <li><a href="#printstacktrace">Why don't SWTError and SWTException override all printStackTrace methods?</a></li>
  <li><a href="#printOnX">How do I print using my favorite Unix print program?</a></li>
  <li><a href="#installedprinters">How can I tell whether or not there are any printers installed?</a></li>
  <li><a href="#noprintimage">How do I print a snapshot of a widget?</a></li>
  <li><a href="#smallprint">Why does everything I print seem so small?</a></li>
  <li><a href="#printertrim">What does computeTrim mean for a Printer?</a></li>
  <li><a href="#autotest">How can I implement user interaction tests?</a></li>
  <li><a href="#gtkselectiongone">On gtk, why does my widget's selection disappear when it loses focus?</a></li>
  <li><a href="#gtkwidgethidden">On gtk and motif, why are some widgets hidden when they are visible on Windows or the Macintosh?</a></li>
  <li><a href="#advancedgraphics">Which platforms have advanced graphics support?</a></li>
</ul><ul>
  <li><a href="#whatisbrowser">What is the SWT Browser widget?</a></li>
  <li><a href="#browserplatforms">Which platforms support the SWT Browser, and which native renderers do they use?</a></li>
  <li><a href="#browserspecifydefault">How do I specify the default type of native renderer that is used by the Browser?</a></li>
  <li><a href="#browsernativeie">Which Internet Explorer version do Browsers on Windows use?</a></li>
  <li><a href="#browserlinux">What do I need to run the SWT Browser inside Eclipse on Linux?</a></li>
  <li><a href="#howusechromium">How do I explicitly use Chromium as the Browser's underlying renderer?</a></li>
  <li><a href="#howuseedge">How do I explicitly use Edge as the Browser's underlying renderer?</a></li>
  <li><a href="#howuseedgeoptions">What configuration options are avaibale for the Edge renderer?</a></li>
  <li><a href="#edgelimitations">What are the limitations of the Edge Browser renderer?</a></li>
  <li><a href="#browserscrollbar">How do I hide the Browser's scrollbars?</a></li>
  <li><a href="#browserproxy">How do I set a proxy for the Browser to use?</a></li>
</ul><ul>
  <li><a href="#swtawtosxmore">Why does the SWT_AWT bridge not work for me on OS X, even after updating Java or the OS?</a></li>
  <li><a href="#printOnGTK">Why is the Print menu item disabled in Eclipse on GTK (Linux, UNIX)?</a></li>
  <li><a href="#uithread">Why do I get the error "org.eclipse.swt.SWTException: Invalid thread access"?</a></li>
  <li><a href="#noautolayout">Why do I have to resize my shell to get my changed widgets to lay out again?</a></li>
  <li><a href="#nographicslibrary">Why do I get "SWTException: Unable to load graphics library" using GC?</a></li>
  <li><a href="#decorationHints">Why doesn't my Shell have the trim decorations that I specified in its constructor?</a></li>
  <li><a href="#noevents">Why doesn't a widget send events when I change it programmatically?</a></li>
  <li><a href="#relayout">Why doesn't my layout update when I create/dispose/move/resize a control?</a></li>
  <li><a href="#scrolledcomposite">How do I programmatically scroll a Composite?</a></li>
  <li><a href="#copypastewithKlipper">Why does Copy/Paste sometimes not work on Linux?</a></li>
  <li><a href="#jumplist">Can I use the TaskItem's menu without the launcher?</a></li>
  <li><a href="#multiplatformjar">How do I produce a single jar file that contains all of the various SWT platform jars?</a></li>
  <li><a href="#twistieanimation">How do I enable the fade annimation for expando buttons in Trees (Windows Vista and up) ?</a></li>
</ul><ul>
  <li><a href="#keyboardshortcuts" name="accessibility">What are the standard keyboard shortcuts on Windows, Mac OS X, Linux?</a></li>
  <li><a href="#screenreaders">Can I use a screen reader with Eclipse?</a></li>
  <li><a href="#oldScreenReaderNotWorking">Why doesn't my old Windows screen reader work with Eclipse 3.6?</a></li>
  <li><a href="#tableheaderswithJAWS">How do I get JAWS to read Table column headers?</a></li>
  <li><a href="#moreAccessibilityInfo">Where can I get more info on Accessibility in Eclipse/SWT?</a></li>
</ul>

<p></p>
<hr>
<p></p>

<p>
Archive: Questions that are not relevant for the latest SWT versions but may be useful for older versions.
</p>

<ul>
  <li><a href="#gtk32">How do I build the 32-bit version of SWT GTK?</a></li>
  <li><a href="#javawebstart">How can I deploy my standalone SWT application with Java Web Start?</a></li>
  <li><a href="#xpthemes">How do I make SWT use the Windows XP themes?</a></li>
  <li><a href="#browserlinuxrcp">What do I need to run the SWT Browser in a standalone application on Linux or Solaris?</a></li>
  <li><a href="#browsersolaris">What do I need to run the SWT Browser inside Eclipse on Solaris?</a></li>
  <li><a href="#howusemozilla">How do I explicitly use Mozilla as the Browser's underlying renderer?</a></li>
  <li><a href="#howusewebkit">How do I explicitly use WebKit as the Browser's underlying renderer?</a></li>
  <li><a href="#browserwebkitgtk">How do I use the WebKit renderer on Linux-GTK?</a></li>
  <li><a href="#browserapplets">Can I view Java applets in the SWT Browser?</a></li>
  <li><a href="#specifyxulrunner">Can I specify which XULRunner installation gets used?</a></li>
  <li><a href="#specifyprofile">Can I specify which Mozilla profile gets used?</a></li>
  <li><a href="#howdetectmozilla">How does the Browser detect a native Mozilla browser to use?</a></li>
  <li><a href="#printmozillapath">How can I determine which installed Mozilla browser is being used to render Browser content?</a></li>
  <li><a href="#mozillaplugins">How can my Mozilla-based Browser find my Mozilla plug-ins?</a></li>
  <li><a href="#howusejavaxpcom">How do I use JavaXPCOM with the Browser?</a></li>
  <li><a href="#swtawtsolaris">Why does the SWT_AWT bridge not work for me on AIX or Solaris?</a></li>
  <li><a href="#printOnGTKHangs">Why does Eclipse 3.3 freeze when I open an editor on GTK 2.10 (Linux, UNIX)?</a></li>
  <li><a href="#32eclipsegtk64">Why do I get strange drawing behaviour when running 32 bit Eclipse on a 64 bit GTK platform?</a></li>
  <li><a href="#rtlgtk28">Why doesn't SWT.RIGHT_TO_LEFT work on some GTK versions (less than 2.8)?</a></li>
</ul>

<p></p>
<hr>
<p></p>

<dl>
  <dt><strong><a name="swtpatchtestingdetails"> Q: What are the testing details that should be accompanied with an SWT patch submitted for review?</a></strong></dt>
  <dd>A:  Testing details that are needed to be accompanied with an SWT patch submitted for review.<br>
      <p>The SWT team is happy to receive patches and understand that providing patches is a challenging task for new contributors.</p>
      <p>The following is a list that could be associated with the bugzilla bug report:</p>
      <ul>
      <li>Results of the test snippet (if any) associated with that specified bug.
      <li>Results of the Widget's new behavior(if applicable) should be tested with various SWT examples: ControlExample.java, CustomControlExample.java and BrowserExample.java
      <li>For changes done to any specific widget, the  widget specific SWT snippets from the list of: <a href="https://www.eclipse.org/swt/snippets/">SWT Snippets</a> should be used for testing.
      <li>When adding a new API try to add new JUnit tests as separate gerrit patch(as gerrit validation will only succeed when the new API is in master and an IBuild exists)
      <li>For Windows only patch, which all operating systems are covered like Windows7, Windows10 (at times specific version of Win10 if applicable)
      <li>For MAC only patch, patch should be tested on latest OS version.
      <li>For Linux only patch, which all GTK versions are covered (GTK3, GTK4 or both) and also if applicable what all desktop managers(gnome, wayland etc..) are covered.
      <li>For patches across multiple platform, the patch should have been tested on all affected platforms, if possible for the contributor
      <li>Also if you expect some behavior change in Eclipse, always launch Eclipse in self-hosted mode to verify the behavior.
      </ul>
      <p><strong>Note: Patches satisfying all the items on the list will be reviewed with priority.</strong>
  </dd>

  <dt><strong><a name="whatpackagesinSWT"> Q: What packages make up SWT?</a></strong></dt>
  <dd>A:  Package names in SWT begin with the prefix <strong>org.eclipse.swt</strong>.<br>
      <p>Here is the complete list:</p>
      <ul>
      <li>org.eclipse.swt
      <li>org.eclipse.swt.accessibility
      <li>org.eclipse.swt.awt
      <li>org.eclipse.swt.browser
      <li>org.eclipse.swt.custom
      <li>org.eclipse.swt.dnd
      <li>org.eclipse.swt.events
      <li>org.eclipse.swt.graphics
      <li>org.eclipse.swt.internal.* (Not API, do not reference classes in these packages)
      <li>org.eclipse.swt.layout
      <li>org.eclipse.swt.opengl
      <li>org.eclipse.swt.ole.win32 (Windows only)
      <li>org.eclipse.swt.printing
      <li>org.eclipse.swt.program
      <li>org.eclipse.swt.widgets
      </ul>
      <p>Classes that are not in these packages do not belong to SWT.</p>
  </dd>

  <dt><strong><a name="supportJavaBeans">Q: Does SWT support JavaBeans?</a></strong></dt>
  <dd>A: To the extent that it makes sense, given the constraints of operating system
    compatibility, SWT mirrors the beans behavior. An example of this is the use
    of standard beans mechanisms for event dispatch (EventListener, EventObject and adapter
    classes). Some aspects of the beans paradigm, such as the ability to create beans with
    null constructors, run counter to the constraints of the underlying operating systems
    that SWT runs on.  For example, operating systems do not typically support creating a
    widget without specifying its parent.
    <p></p>
    The essence of the problem is that if you allow a widget to be created with a null
    constructor, then you can't actually create the o/s resources at the time the constructor
    runs (you would have to wait until later, after the parent has been set). We can not
    do this, since we <em>always</em> create the o/s resources in the constructor, and for
    performance/efficiency/consistency reasons do not keep slots in the object to hold
    whatever state would be required if the object were to be created later.
  </dd>

  <dt><strong><a name="guibuilder">Q: Is there a GUI Builder for SWT?</a></strong></dt>
  <dd>A: SWT itself does not provide a GUI Builder (also known as "GUI Designer", "GUI Editor",
  "Visual Builder", "Visual Designer", "Visual Editor", or "Visual Composition Editor").
  However, there is an Eclipse project called <a href="http://www.eclipse.org/windowbuilder/">WindowBuilder</a>
  which integrates an SWT GUI Designer. There are several other mature 'third-party' products listed at
  <a href="http://marketplace.eclipse.org/">http://marketplace.eclipse.org/</a>. Search for "GUI Builder".
  </dd>

  <dt><strong><a name="whatisasnippet">Q: What is a snippet and why do I care?</a></strong>
  </dt>
  <dd>A: A snippet is a <em>minimal stand alone</em> program that demonstrates functionality or
    lack of functionality.

    <p>Why is this important?  Posting a snippet to the news group is the
    quickest way to get help.  Including a snippet in a bug report is the fastest
    way to get a bug fixed.  Taking the time to construct a snippet helps you understand
    the API of the library you are calling and focuses your thinking.  For example, the
    SWT team uses C and Java snippets internally to prove or disprove problems in the operating system.
  Often, something you think is a bug is actually caused by something elsewhere
  in your program.

  <p>Snippets isolate problems.  Code speaks louder than words.

  <p>Here is a minimal stand alone SWT program to help you get started:
<pre>public static void main (String [] args) {
    Display display = new Display ();
    Shell shell = new Shell (display);
    shell.open ();
    while (!shell.isDisposed ()) {
        if (!display.readAndDispatch ()) display.sleep ();
    }
    display.dispose ();
}</pre>

  For a list of sample snippets, see the <a href="snippets">SWT snippets page</a>.
  </dd>

  <dt><strong><a name="swtsource">Q: Where do I find the SWT source?</a></strong>
  <dd>A: SWT's source can be retrieved directly from GIT as described in <a href="/swt/git.php">Using SWT from GIT</a>.  It's also included
      in eclipse as follows:
      <ul>
        <li>eclipse 3.4 and newer: <code>plugins/org.eclipse.swt.<em>&lt;ws&gt;</em>.<em>&lt;os&gt;</em>.<em>&lt;arch&gt;</em>.source_<em>X.X.X.&lt;version&gt;</em>.jar</code></li>
        <li>eclipse 3.3.2 and earlier: directory <code>plugins/org.eclipse.rcp.source.<em>&lt;os&gt;</em>.<em>&lt;ws&gt;</em>.<em>&lt;arch&gt;</em>_<em>X.X.X.&lt;version&gt;</em>/src/</code></li>
      </ul>
  </dd>

  <dt><strong><a name="howbuildjar">Q: How do I build an SWT jar for my platform?</a></strong>
  </dt>
  <dd>A: The SWT jar can be built from the eclipse GIT repository using an Ant task:
    <ol>
      <li> Retrieve SWT directly from GIT as described in <a href="/swt/git.php">Using SWT from GIT</a>
      <li>Load the projects <strong>org.eclipse.swt</strong> and <strong>org.eclipse.swt.</strong><em>WS.OS.ARCH</em> where <em>WS.OS.ARCH</em> are the names of the
        windowing system, operating system and architecture of interest, respectively.  For example, <strong>org.eclipse.swt.gtk.linux.x86</strong>.
      <li>In the project <strong>org.eclipse.swt.</strong><em>WS.OS.ARCH</em>, locate the file <strong>build.xml</strong>.  This is an Ant script.
      <li>Run Ant on the target <strong>build.jars</strong>.  If you are using eclipse as your development environment, you can run
        Ant by selecting the file in the Navigator or Packages view, then selecting <strong>Run Ant...</strong> from the context
        menu.
      <li>The script will create file <strong>swt.jar</strong> in the root directory of the <strong>org.eclipse.swt.</strong><em>WS.OS.ARCH</em>
        project.  When it has finished running you can Refresh this project to bring this jar into your eclipse workspace.
    </ol>
  </dd>

  <dt><strong><a name="howbuildplugin">Q: How do I build the SWT Eclipse plug-in for my platform?</a></strong>
  </dt>
  <dd>A: The SWT Eclipse plug-in can be built (excluding the signing of the jar) with the steps below.
    <ol>
      <li> Retrieve SWT directly from GIT as described in <a href="/swt/git.php">Using SWT from GIT</a>
      <li> Load the projects org.eclipse.swt and org.eclipse.swt.WS.OS.ARCH where WS.OS.ARCH are the names of the windowing system, operating system and architecture of interest, respectively. For example, org.eclipse.swt.gtk.linux.x86.
      <li>(optional) If you wish to compile SWT in your workspace, in the Navigator view rename the <strong>org.eclipse.swt</strong> project's <strong>.classpath_</strong>WS
        file to <strong>.classpath</strong>.  This is useful if, for instance, you have a patch to apply to the SWT codebase before building the plug-in.
      <li>Invoke the File > Export... menu item, then select the "Plug-in Development" - "Deployable Plug-ins and Fragments" wizard, and press Next.
      <li>In the resulting wizard's plug-ins list, select the <strong>org.eclipse.swt.</strong><em>WS.OS.ARCH</em> fragment.
      <li>Specify a destination for the output.
      <li>On the Options tab set the qualifier to the plug-in's desired qualifier string.  This will be something like <strong>v3655</strong> and must match the
        qualifier of Eclipse's SWT plug-in that is being replaced.
      <li>Press Finish to export the plug-in.
    </ol>
    <p>
    <em>Important note</em>: Once the plug-in has been exported, the intermediate files that were created in order to make the plug-in jar are not deleted.
    As a result, subsequent exports of the same plug-in will <em>NOT</em> recompile the workspace contents, and therefore will not contain any changes that have
    been made in the interim.  For such changes to be included in a re-export of the plug-in, these intermediate files must be deleted in order to force
    their recompilation.  The easiest way to do this is to select the <strong>org.eclipse.swt.</strong><em>WS.OS.ARCH</em> project, press F5 to refresh it, and
    then replace its content with the released content.
  </dd>

  <dt><strong><a name="howbuilddll">Q: How do I build the SWT JNI libraries for my platform?</a></strong>
  </dt>
  <dd>A: SWT uses JNI to interact with the native widgets in the
   operating system.  The SWT JNI libraries must be compiled for the
   windowing system, operating system and hardware architecture of
   interest.  The libraries can be built either from the code in the GIT
   repository or from an eclipse SDK download.

   <p>In order to build the required libraries and run Eclipse, you
   will require a JDK (Java Development Kit) version that is supported
   by Eclipse.  Check eclipse.org for details.</p>

   <p><strong>Building the SWT JNI libraries from the eclipse SDK download:</strong>
   <ol>
     <li>Download an Eclipse distribution from
       <a href="http://www.eclipse.org/downloads/index.php">http://www.eclipse.org/downloads/index.php</a>.</li>

     <li>Unzip the distribution.  This will create a directory called <tt>eclipse</tt>.
       This directory is subsequently referred to as <em>&lt;eclipseRoot&gt;</em>.

     <li>Copy file <tt><em>&lt;eclipseRoot&gt;</em>/plugins/org.eclipse.swt.<em>&lt;ws&gt;</em>.<em>&lt;os&gt;</em>.<em>&lt;arch&gt;</em>.source_X.X.X.<em>&lt;versionString&gt;</em>.zip</tt>
         to another directory and unzip it.

     <li>Edit the file <strong>build.sh</strong> (or <strong>build.bat</strong> on Windows)
         in the current directory. Set the environment variables defined in that file to
         match the location of your JRE, etc. Save the file and close it.

     <li>Run the <tt>build</tt> command (<strong>sh build.sh</strong> for UNIX and Linux
         platforms, <strong>build.bat</strong> for Windows).  This will create the appropriate
         library file(s) in the current directory.  For example, this will create
         <tt>swt-XXXX.dll</tt> files on windows, or <tt>libswt-XXXX.so</tt> files on Linux
         and Solaris.
   </ol>

   <p><strong>Building the SWT JNI libraries from the eclipse GIT repository:</strong><br>
   <strong>NOTE</strong>: These instructions require you to use Eclipse

   <ol>
     <li>Follow <a href="/swt/git.php">these instructions</a> to get SWT from GIT.

     <li>Compile the project.  This will create a folder called bin under the org.eclipse.swt project.

     <li>Change directory into <tt>org.eclipse.swt/bin/library</tt>

     <li>Edit the file <strong>build.sh</strong> (or <strong>build.bat</strong> on Windows)
         in the current directory. Set the environment variables defined in that file to
         match the location of your JRE, etc. Save the file and close it.

     <li>Run the <tt>build</tt> command (<strong>sh build.sh</strong> for UNIX and Linux
         platforms, <strong>build.bat</strong> for Windows).  This will create the appropriate
         library file(s) in the current directory.  For example, this will create
         <tt>swt-XXXX.dll</tt> files on windows, or <tt>libswt-XXXX.so</tt> files on Linux
         and Solaris.
  </ol>

  <p><strong>Building the SWT natives on Ubuntu 12.04, 14.04, etc. (without XULRunner support)</strong><br>
  <ol>
     <li>Install dependencies with:<br>
         <tt>$ sudo apt-get install libgnomeui-dev libxtst-dev freeglut3-dev libgtk-3-dev libgtk2.0-dev</tt>

     <li>Follow <a href="/swt/git.php">these instructions</a> to get SWT from GIT.

     <li>Make sure the org.eclipse.swt project is compiled.

     <li>Context menu &gt; Run As &gt; Ant Build...
     <li>On Targets tab, select "build_libraries" (14th from end of list).
     <li>On Properties tab, add these two properties:
       <ul>
         <li>to make the build succeed even without a XULRunner installation: targets = install
         <li>to enable GTK3 support: machine_gtk3 = localmachine
       </ul>
     <li>On JRE tab, select Execution Environment JavaSE-1.8.
     <li>If the JAVA_HOME environment variable is not yet set, go to Environment tab and set it to the root directory of the JDK.
     <li>Run the External Tools launch configuration. From now on, this is the only step you have to do to build natives.
  </ol>
  </dd>

  <dt><strong><a name="howaddnatives">Q: How do I add a new native to the SWT JNI libraries for my platform?</a></strong>
  </dt>
  <dd>A: For the steps to add new natives to the SWT JNI libraries, see <a href="/swt/jnigen.php">
  Generating the SWT JNI Code.</a>
  </dd>

  <dt><strong><a name="howaddnativescocoa">Q: How do I add a new native to the SWT JNI libraries for Cocoa?</a></strong>
  </dt>
  <dd>A: For the steps to add new natives to the SWT Cocoa JNI libraries, see <a href="/swt/macgen.php">
  Generating the SWT PI Code for Cocoa.</a>
  </dd>

  <dt><strong><a name="gtk64">Q: How do I build the 64-bit version of SWT GTK?</a></strong></dt>
  <dd>A: Follow these steps to extract the 64-bit SWT GTK source code from GIT and produce your own build:
  <ol>
    <li>Start Eclipse and retrieve the <code>org.eclipse.swt</code>, <code>org.eclipse.swt.gtk.linux.x86_64</code> and
      <code>org.eclipse.swt.tools</code> projects from dev.eclipse.org (see
      <a href="/swt/git.php">How to use SWT from GIT</a>, use <code>.classpath_gtk</code>
      as the <code>.classpath</code> file in the <code>org.eclipse.swt</code> project).</li>
    <li><i>Note this is not needed for builds after 4.3 M3 as the code was changed to 64-bit.</i> Convert SWT's Java from its 32-bit form to 64-bit:</li>
    <ul>
      <li>To convert the Java code in-place, go to the <code>build.xml</code> ant script in the <code>org.eclipse.swt.gtk.linux.x86_64</code>
        project and run its "replace.32.to.64" target.  Once this target has completed you must refresh (F5)
        the <code>org.eclipse.swt</code> project in order to pick up the changes.</li>
      <li>Run the "build_libraries" target in the same <code>build.xml</code> file.  Refresh (F5)
        the <code>org.eclipse.swt.gtk.linux.x86_64</code> project when this target has completed, to pick up the new libraries.</li>
    </ul>
    <li>You're done!  The <code>org.eclipse.swt.gtk.linux.x86_64</code> project will now contain the 64-bit native libraries, and if you're
      interested, the 64-bit source code will now be available in the <code>org.eclipse.swt.gtk.linux.x86_64/src</code> folder.
  </ol>
  </dd>

  <dt><strong><a name="gtkstartup">Q: Which GTK version do I need to run SWT?</a></strong></dt>
  <dd>A: SWT requires the following GTK+ versions (or newer) to be installed:
    <ul>
      <li>Eclipse/SWT 4.16.x: GTK+ 3.20.0 and its dependencies</li>
      <li>Eclipse/SWT 4.15.x: GTK+ 3.14.0 and its dependencies</li>
      <li>Eclipse/SWT 4.11.x - 4.14.x: GTK+ 3.10.0 and its dependencies</li>
      <li>Eclipse/SWT 4.10.x: GTK+ 3.8.0 and its dependencies</li>
      <li>Eclipse/SWT 4.7.x - 4.9.x: GTK+ 2.24.0 and its dependencies (for GTK+ 2) OR GTK+ 3.0.0 and its dependencies (for GTK+ 3)</li>
      <li>Eclipse/SWT 4.5.x - 4.6.x: GTK+ 2.18.0 and its dependencies (for GTK+ 2) OR GTK+ 3.0.0 and its dependencies (for GTK+ 3)</li>
      <li>Eclipse/SWT 4.4.x: GTK+ 2.10.0 and its dependencies (for GTK+ 2) OR GTK+ 3.0.0 and its dependencies (for GTK+ 3)</li>
      <li>Eclipse/SWT 4.3.x: GTK+ 2.10.0 and its dependencies</li>
      <li>Eclipse/SWT 3.8.x: GTK+ 2.6.0 and its dependencies</li>
      <li>Eclipse/SWT 3.6.x - 3.7.x: GTK+ 2.4.1 and its dependencies</li>
      <li>Eclipse/SWT 3.0.x - 3.5.x: GTK+ 2.2.1 and its dependencies</li>
      <li>Eclipse/SWT 2.1.x: GTK+ 2.0.6 and its dependencies</li>
    </ul>
    Note that Eclipse/SWT 4.3.x includes early access support for GTK+ 3.x.
    <p>
    Starting from Eclipse/SWT 4.4.x, Linux builds come with GTK+ 3 support enabled by default.
    </p>
    <p>
    Starting from Eclipse/SWT 4.10.x, Linux builds only come with GTK+ 3 support, GTK+ 2 is no longer supported.
    </p>
    <p>
    You can determine which version(s) of GTK you have installed with <tt>rpm -q gtk2</tt> or <tt>rpm -q gtk3</tt>.
    </p>
  </dd>

  <dt><strong><a name="gtkversion">Q: Which GTK version is being used by SWT?</a></strong></dt>
  <dd>A: Since Mars (4.5), SWT sets the <code>org.eclipse.swt.internal.gtk.version</code> system property to the version being used.
      To display this value in Eclipse, go to <b>Help &gt; Installation Details &gt; Configuration</b>.<br>
      Look for the line: <code>org.eclipse.swt.internal.gtk.version=3.14.12</code>,
      where 3.14.12 corresponds to the GTK version currently used by Eclipse.
  </dd>

  <dt><strong><a name="cocoa64launch">Q: Why do I get an UnsatisfiedLinkError when launching from the 64-bit Cocoa port?</a></strong></dt>
  <dd>A: You need to be sure that you are forcing your launch to use a 64-bit VM. Apple ships most of their VMs with 32 and
      64-bit binaries. To force the VM to run in 64-bit mode, use the -d64 option as VM argument in your launch configuration.

      <p>If you are launching with SWT from GIT in your workspace (see
      <a href="/swt/git.php">How to use SWT from GIT</a>, use <code>.classpath_cocoa</code>
      as the <code>.classpath</code> file in the <code>org.eclipse.swt</code> project and make sure you have the
      org.eclipse.swt.cocoa.maxosx.x86_64 project in your workspace),
      then you also need to modify the <code>.classpath</code> file as follows:
      <pre>
         attribute value="org.eclipse.swt.cocoa.macosx"</pre>change to:<pre>
         attribute value="org.eclipse.swt.cocoa.macosx.x86_64"</pre>
      </p>
  </dd>

  <dt><strong><a name="winexternalmanifestfile">Q: How to enable external manifest file on Windows?</a></strong></dt>
  <dd> A: Follow below steps(ref. <a href="https://blogs.msdn.microsoft.com/chrisforster/2007/12/11/a-solution-and-workaround-to-the-change-in-manifest-preference-behaviour-in-windows-2003-sp1-and-windows-vista/">MSDN blog</a>)
   on Windows to enable external manifest file:
    <br><ul>
      <li>Open Windows Registry Editor.</li>
      <li>Locate and then click the following registry subkey:
    HKEY_LOCAL_MACHINE\SOFTWARE\Microsoft\Windows\CurrentVersion\SideBySide</li>
      <li>On the Edit menu, point to New, and then click DWORD Value.</li>
      <li>Type PreferExternalManifest, and then press ENTER.</li>
      <li>Right-click PreferExternalManifest, and then click Modify.</li>
      <li>In the Edit DWORD Value dialog box, click Decimal under Base.</li>
      <li>In the Value data box, type 1, and then click OK.</li>
      <li>On the File menu, click Exit to close Registry Editor.</li>

    <p>The name of the manifest file must match the name of the executable.
    In the case of eclipse, the executable is <tt>javaw.exe</tt> and the manifest file
    must have the name <tt>javaw.exe.manifest</tt>.  The manifest file must be in the
    <tt>jre\bin</tt> folder for the VM you use to launch Eclipse.  Note: the
    <tt>eclipse.exe</tt> executable does not launch Eclipse; <tt>eclipse.exe</tt>
    displays a splash screen and then invokes the Java VM.</p>
    <p>Here is a <a href="javaw.exe.manifest">sample manifest file</a> to download.</p>
  </dd>

  <dt><strong><a name="win10dpiawareness">Q: How to enable 'dpiAwareness' setting on Windows 10?</a></strong></dt>
  <dd> A: In order to enable dpiawareness on Windows10, there must be a manifest file
    located in the same place as the executable that launches the application.
    <br>Here is a <a href="javaw.exe.manifest">sample manifest file</a> to download, for more details on <a href="https://www.eclipse.org/swt/faq.php#winexternalmanifestfile">how to enable external manifest file on Windows</a>
  </dd>

  <dt><strong><a name="gtkfontsandcolors">Q: On GTK, how do I change the default fonts and colors of widgets?</a></strong></dt>
  <dd>A: GTK uses a file called <tt>.gtkrc</tt> which is located in your home directory.
    On some versions of Linux, this file is called <tt>.gtkrc-2.0</tt>.
    Here is an example of the content of that file which sets the font and colors for Eclipse:
    <pre>
      style "eclipse" {
        font_name = "Sans 12"
        bg[NORMAL] = "#d6d3ce"
        bg[ACTIVE] = "#c7c2bc"
        bg[INSENSITIVE] = "#828282"
        bg[PRELIGHT] = "#3a6ea5"
        fg[NORMAL] = "#000000"
        fg[ACTIVE] = "#000000"
        fg[INSENSITIVE] = "#d4d0c8"
        fg[PRELIGHT] = "#ffffff"
      }
      class "GtkWidget" style "eclipse"
    </pre>

    <p>To turn off anti-aliasing of fonts you should use the facilities
    available in your desktop if possible, such as the Gnome Font
    Properties dialog.  An alternate approach is to ensure that your
    ~/fonts.conf or system-wide fonts.conf file contains the following:</p>
    <pre>
    &lt;match target="font"&gt;
    &lt;edit name="antialias" mode="assign"&gt;&lt;bool&gt;false&lt;/bool&gt;&lt;/edit&gt;
    &lt;edit name="hinting" mode="assign"&gt;&lt;bool&gt;true&lt;/bool&gt;&lt;/edit&gt;
    &lt;edit name="autohint" mode="assign"&gt;&lt;bool&gt;false&lt;/bool&gt;&lt;/edit&gt;
    &lt;/match&gt;
    </pre>
  </dd>

  <dt><strong><a name="missingjar">Q: Why do I get the error "java.lang.NoClassDefFoundError: org/eclipse/swt/internal/XXX/OS."?</a></strong></dt>
  <dd>A: On some platforms such as GTK, SWT is broken into multiple jars.  Therefore,
      you must ensure that all required jars are on the classpath.  The required jars are:
      <ul>
      <li>swt.jar (all platforms)</li>
      <li>swt-pi.jar (some platforms like GTK and Carbon)</li>
      <li>swt-mozilla.jar (for Browser widget on GTK and Motif)</li>
      <li>swt-gtk.jar (on Linux Motif)</li>
      </ul>
  </dd>

  <dt><strong><a name="missingdll">Q: Why do I get the error "java.lang.UnsatisfiedLinkError: no swt-win32-3232 in java.library.path."?</a></strong></dt>
  <dd>A: The SWT JNI libraries must be found at runtime.  As of Eclipse/SWT 3.3 this will happen
    automatically if the platform-specific SWT jar is on the java classpath.  For older Eclipse/SWT
    versions you need to place the SWT JNI libraries in a place where the Java Virtual Machine will
    find them.

    <p>The SWT JNI libraries are included in the SWT download.

    <p>A Java application can be informed of the location of the libraries in several ways:
    <p></p>
      <ol>
      <li>Set the library path in the VM launch arguments.

      <p>In the Launch Configuration Dialog of eclipse select the Arguments
      page, and in the VM arguments field enter:
      <tt>-Djava.library.path={runtime-library-path}</tt>
      Where the runtime-library-path is the absolute path to the directory containing
      the native code library (see above).

      <p>This solution means that the SWT libraries have to be manually
      added to every project that uses SWT.</p><p></p>

    <li>Set the library location in an environment variable.
    <p>For Windows this is done by editing the PATH environment variable to
    include the above mentioned runtime-library-path.
    <br>in Win 9X this is done by editing the autoexec.bat file,
    <br>on NT or 2K the variable is edited through <strong>My Computer</strong> &gt; <strong>Properties</strong> &gt; <strong>Advanced</strong> &gt; <strong>Environment Variables</strong>.
  <p>On linux/unix, modify the LD_LIBRARY_PATH environment variable to include the runtime-library-path.
  <p></p>

  <li>Copy the SWT library to a directory that is already on the Java library path.  For example, the jre/bin directory.
    <p>The disadvantage of this solution is that every time you upgrade eclipse you have to remember to copy the native code library.</p>
   </ol>
    <p>Starting with Eclipse 3.1, the SWT plugin that comes with Eclipse, includes the JNI libraries in the SWT jar.
    This was done to support OSGi and Eclipse RCP. If you are using the plugin you must extract the libraries
    to include them in the path.</p>
  </dd>

  <dt><strong><a name="konquerorUnzip">Q: Why do I get an error beginning with "...SWTException: Unsupported or unrecognized format" on startup?</a></strong></dt>
  <dd>A: There is a bug in the Konqueror decompressor which causes Eclipse to be improperly extracted
    if used.  To avoid this the Eclipse archive should first be downloaded to your machine and
    then extracted using unzip at the command line.
  </dd>

  <dt><strong><a name="useUnzip">Q: Why do I get the error "error while loading shared libraries: ./libXm.so.2: file too short" on startup?</a></strong>
  </dt>
  <dd>A: You must use unzip, not jar, to extract your eclipse download.  Jar does not extract the libXm.so.2 link file properly.
  </dd>

  <dt><strong><a name="missinglibXm">Q: Why do I get the error "java.lang.UnsatisfiedLinkError: libXm.so.2: cannot open shared object file: No such file or directory."?</a></strong></dt>
  <dd>A: On motif, the SWT library links against the open motif library libXm.so.2.  On most platforms, the open motif library is installed
  and added to the library path by default. However, on some Linux platforms, either open motif is not installed or is not on the default library
  path, or lesstif is installed.  Eclipse (and the standalone version of SWT) includes the libXm.so.2 library in the root of the Eclipse install.
  <p>You need to either launch Eclipse from the installed directory or modify the LD_LIBRARY_PATH environment variable to
  include the location of libXm.so.2. </p>
  <p>Note <code>-Djava.library.path</code> is used by the VM to locate libraries for System.loadLibrary calls.  However, it does
  not update the LD_LIBRARY_PATH and therefore does not help libraries locate other libraries.</p>
  </dd>

  <dt><strong><a name="reflectionX">Q: Why do I get an error beginning with "org.eclipse.swt.SWTError: Font not valid" on startup?</a></strong></dt>
  <dd>A: This error occurs if a recognized font cannot be resolved at startup time.  The scenario where
  this has been observed to sometimes happen is when accessing a remote machine via Reflection X.  This
  situation can be made to work by changing some settings in Reflection X.  For information about how to
  do this see <a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=33828#c14">bug 33828</a>.
  </dd>

  <dt><strong><a name="notenoughheap">Q: Why do I get the error "java.lang.OutOfMemoryError: Java heap space" when I try to create a very large Image?</a></strong></dt>
  <dd>A: This error occurs if there is not enough Java heap space to create a very large image, for example:<br>
    <pre>new Image(display, 10985, 1102);</pre>
  <br>To allocate more heap space for the Java VM, start eclipse with a VM argument that allocates more heap, for example:
    <pre>eclipse -vmargs -Xmx400m</pre>
  <br>allocates 400 Mb of heap space.
  </dd>

  <dt><strong><a name="debugmode">Q: How do I enable debug mode in Eclipse for SWT?</a></strong></dt>
  <dd>A: Follow these steps:
   <ol>
    <li>Create a .options file in the same directory as your eclipse executable.</li>
    <li>Place the following lines in the .options file:
    <br>org.eclipse.ui/debug=true
    <br>org.eclipse.ui/debug/swtdebugglobal=true</li>
    <li>Start up eclipse from the command line with the debug flag: ./eclipse -debug</li>
    </ol>
  <p>All messages from SWT will be printed to the console window.</p>
  </dd>

  <dt><strong><a name="swinginswt">Q: Can I use Swing or AWT inside Eclipse?</a></strong></dt>
  <dd>A: Yes.  As of Eclipse 3.2, Swing and AWT can be embedded in SWT on Windows, GTK and OS X.
  However it is important to note that a supporting JDK is required on some platforms in order for this
  to work.  Specifically, GTK require that JDK 1.5 or newer be used.
  Additionally, AIX and Solaris users must ensure that AWT is using XToolkit, as described in
  <a href="#swtawtsolaris">Why does the SWT_AWT bridge not work for me on AIX or Solaris?</a>

  <p>See this <a href="https://github.com/eclipse-platform/eclipse.platform.swt/tree/master/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet135.java">snippet</a> for an example of how to use the API.</p>
  </dd>

  <dt><strong><a name="cairoRemoved">Q: Why does Eclipse (4.2 and greater) on GTK crash with a call to org.eclipse.swt.internal.C.memmove originating from some graphics call?</a></strong></dt>
  <dd>A: Eclipse 4.2 (and greater) makes use of functions in cairo that were not present in the 1.0.2 version of cairo that shipped with Eclipse by default. Since all modern Linux distributions that ship GTK will ship a more recent version of the Cairo library, it was decided to stop shipping the library.
  <p>If you are running an older Linux distribution that does not include cairo, you will have to install the cairo library (any version greater than 1.2)</p>
  </dd>

  <dt><strong><a name="subclassing">Q: Why can't I subclass SWT widgets like Button and Table?</a></strong></dt>
  <dd>A: You can but it is not recommended.  The article <a href="http://eclipse.org/articles/Article-Writing%20Your%20Own%20Widget/Writing%20Your%20Own%20Widget.htm">Creating Your Own Widget using SWT</a>
  describes the reasons in detail:

  <h3>Subclassing Widgets Directly</h3>

<p>In extreme circumstances, you may need to subclass a widget other than
<i>Canvas</i> or <i>Composite</i>. We recommend against doing this unless all
other avenues have been explored and exhausted. Try to wrap the widget first,
before subclassing it. Here is why:</p>

<ul>
<li>Subclasses may inherit a lot of API that makes no sense, and must be
overridden.  In Java, you cannot override a method and change the return
type; therefore you cannot reimplement some methods.</li>

<li>Subclassing is typically not the safest way to extend a class that
you do not own.  For a simplified list of the common arguments, see the
article by <strong>Bill Venners</strong> in the Nov '98 issue of <i>Java
World</i> called <i>"Inheritance versus composition: Which one should
you choose?"</i> at: <a href="http://www.javaworld.com/javaworld/jw-11-1998/jw-11-techniques.html">
http://www.javaworld.com/javaworld/jw-11-1998/jw-11-techniques.html</a></li>

<li>Widget subclasses are almost certainly guaranteed to be
platform-specific unless great care is taken to ensure that they work on
all platforms.</li>

<li>Subclassed widgets can be affected by changes in the non-API
implementation of the superclass.</li>

<li>Subclassing may cause bad system-level bugs, and runs the risk of
leaking resources.  For example, if a subclass reimplements a method
without making certain that dispose code from the superclass method is
still called, then the new method will leak system resources.</li>

<li>Binary incompatibility across releases becomes possible. If a method
signature or field name changes, or new methods or fields are added,
there may be a name conflict in the widget subclass. Only <i>Canvas</i>
and <i>Composite</i> are guaranteed not to have name conflicts in future
releases.</li>

<li>See any paper by Leonid Mikhajlov on the <i>"Fragile Base Class
Problem"</i>.  You can find his paper "A Study of The Fragile Base Class
Problem" at: <a href="http://www.cas.mcmaster.ca/~emil/publications/fragile/">http://www.cas.mcmaster.ca/~emil/publications/fragile/</a></li>

</ul>

  <p>Subclassing <i>Canvas</i> or <i>Composite</i> is the best way to
  ensure that your widget works on all SWT platforms. The 'is-a' test in
  this case tests whether your widget is-a basic or compound widget.
  Subclassing anything else requires asking if the new widget <b>is an SWT
  native widget of the type being subclassed</b>. For example, a 100% Java
  portable <i>PictureLabel</i> is not an SWT native <i>Label</i>.</p>

  <p>When subclassing anything other than <i>Composite</i> or
  <i>Canvas</i> you must override the method <b>protected void
  checkSubclass()</b> to do nothing. Make sure you read the method comment
  before overriding it.</p>
  </dd>

  <dt><strong><a name="noeventfire">Q: Why are some events like Selection not fired in response to programmatic widget changes?</a></strong></dt>
  <dd><p>A: See <a href="#noevents">Why doesn't a widget send events when I change it programmatically?</a>.</p>
  </dd>

  <dt><strong><a name="printstacktrace">Q: Why don't SWTError and SWTException override all printStackTrace methods?</a></strong></dt>
  <dd>A: SWTError and SWTException each contain a slot which records the original
    exception (if it is known) that caused the SWTError or SWTException to be thrown.
    The printStackTrace() method in these classes has been overridden to print the
    stacktrace of the original exception as well.

    <p>The problem with the other two API methods (i.e. printStackTrace(PrintStream) and
    printStackTrace(PrintWriter)) is that the classes mentioned in their arguments
    (PrintStream and PrintWriter) are not available in the CLDC class library.
    Because we need to maintain compatability with CLDC, we can not override them.</p>
  </dd>

  <dt><strong><a name="printOnX">Q: How do I print using my favorite Unix print program?</a></strong></dt>
  <dd>A: You can use the External Tools support in Eclipse to print files using external programs.
    Just create a new Program launch config from the External Tools dialog that launches your
    favorite printing utility and you can pass the selected resource as a parameter.
    <ol>
    <li>Select the file you want to print.</li>
    <li><i>Run &gt; External Tools &gt; External Tools...</i></li>
    <li>Select "Program" in the Configurations: list.</li>
    <li>Click New</li>
    <li>Type: Print Selected File<br>
   in the Name: field.</li>
    <li>Type the full path name of your favorite printing program in the Location: field.
    For example: /usr/bin/lpr</li>
    <li>Type: ${container_loc}/${resource_name}<br>
   in the Arguments: field.</li>
    <li>Click Apply</li>
    <li>Click Run</li>
    </ol>
  </dd>

  <dt><strong><a name="installedprinters">Q: How can I tell whether or not there are any printers installed?</a></strong></dt>
  <dd>A: The method <code>org.eclipse.swt.printing.Printer.getPrinterList()</code> can be used to determine
      whether or not there are any printers installed on the system. This method returns an array of
      <code>PrinterData</code> objects. If the length of the array is 0, then there are no printers available.
      If there are 1 or more elements in the array, then each <code>PrinterData</code> object represents an
      installed printer.
  </dd>

  <dt><strong><a name="noprintimage">Q: How do I print a snapshot of a widget?</a></strong></dt>
  <dd>A: To print an image, the image needs to be created on the <em>printer</em>.
    A common mistake is to try to print an image that was created on a <em>display</em>.

    <p>First take the snapshot into an image that was created on the display,
    and then get the imageData and create a new Image just for printing.
    Something like this:
<pre>  // Take the snapshot into a display Image
  Point size = myWidget.getSize();
  Image image = new Image(display, size.x, size.y);
  GC gc = new GC(myWidget);
  gc.copyArea(image, 0, 0);
  gc.dispose();

  // Get the ImageData and create a new printer Image from it
  ImageData imageData = image.getImageData();
  Image printImage = new Image(printer, imageData);</pre>

    <p>Then print using <em>printImage</em>.
    (Remember to dispose both images when you are done with them).

    <p>This is true for all graphic objects that you want to use for printing:
    Fonts, Colors, and Images. You need to recreate them on the printer before
    you can use them for drawing on the printer GC. You might get lucky sometimes,
    if the printer happens to have this font or that color, but you won't get lucky
    on all platforms and for all printers, and you won't get lucky for images.
    So get into the habit of thinking "Did I create this graphics resource
    on the same device that I am now trying to draw to?"</p>
  </dd>

  <dt><strong><a name="smallprint">Q: Why does everything I print seem so small?</a></strong></dt>
  <dd>A: When you are printing something from the screen to a printer device, you
    need to think about scaling. What is happening is that your figure is being drawn
    in something like 72 x 72 dots per inch on the screen, but then you are printing
    it to something like a 300 x 300 or 600 x 600 DPI printer. What you have to do is
    ask both the screen and the printer what their DPI is, and then figure out what
    scale factor you need to use when you draw to the printer GC. The code might look
    like this:
    <pre>
      Point screenDPI = display.getDPI();
      Point printerDPI = printer.getDPI();
      int scaleFactor = printerDPI.x / screenDPI.x;
    </pre>
    Please see the ImageAnalyzer example in the org.eclipse.swt.examples project
    for an example of printing an image to a printer. Look at method
    menuPrint(). Note however that this is a pretty rough example, and it does
    not take into account what happens if the image is larger than the page - it
    just clips.

    <p>Text printing takes some thought also. You need to wrap words, put your page
    breaks in the right place, know where your margins are, etc. The SWT
    StyledText widget does its own text printing. If you need to see a more
    complicated example of printing a document, wrapping, margins, multi-page,
    etc., then please look at the inner class Printing in StyledText in
    org.eclipse.swt.custom. An instance of this class is created by the
    StyledText.print(Printer) API method.

    <p>Note also that when printing, any graphics objects that you use to draw,
    such as fonts, colors, and images, need to be re-created on the printer
    device before you can draw them to the printer GC.

    <p>We also recommend that you run your print job in a separate thread and not in
    the UI thread, because printing a long document to a slow printer can hang
    your entire UI while the printer spools.

    <p>Unfortunately, printing is not simply a matter of just passing in the
    printer GC instead of the screen GC. Printing has to be designed into your
    drawing classes. You don't have scrollbars anymore, so you have to either
    cut stuff off and print it on another page, or reorganize it, or scale it
    down, or wrap it somehow. Maybe you want to give some control to your users,
    and let them specify how many inches something should be, or whatever -
    maybe give them a ruler. There is no magic bullet - you
    will definitely have to give it some thought.</p>
  </dd>

  <dt><strong><a name="printertrim">Q: What does computeTrim mean for a Printer?</a></strong></dt>
  <dd>A: The "trim" is the area of the page that the printer cannot print on.
    Usually, computeTrim is used as follows: <br><code>Rectangle trim = printer.computeTrim(0, 0, 0, 0);</code>

  <p>A printer that can print edge-to-edge would have a trim.x and trim.y of 0,0.
  The trim.width and trim.height would be the same as the width and height of the physical paper.
  </p>

  <p>A 600 dot per inch printer that cannot print on the leftmost 0.18 inch of the paper would have a trim.x of -108.
  So to print starting at precisely 1" from the left edge, take 600 (i.e. 1") and "add" -108 (i.e. subtract 0.18") to get the starting x position.
  Trim positions are negative because they are relative to the 0,0 position of the client area (or 'printable area') of the paper.
  </p>
  </dd>

  <dt><strong><a name="autotest">Q: How can I implement user interaction tests?</a></strong></dt>
  <dd>A: The method <code>org.eclipse.swt.widgets.Display.post(Event)</code> can be used to post
      mouse and keyboard events into the OS, which emulates the user performing the specified action.
      This is the typical approach that is used for implementing JUnit test cases.
      <p>There are also stand-alone applications available for automating SWT user interaction tests:
      <ul>
        <li><a href="http://swtbot.sourceforge.net/index.html">SWTBot</a> (open source)</li>
        <li><a href="http://sourceforge.net/projects/abbot/">Abbot for SWT</a> (open source)</li>
        <li><a href="https://code.google.com/p/windowtester/">Window Tester</a> (open source)</li>
      </ul>
      </p>
  </dd>

  <dt><strong><a name="gtkselectiongone">Q: On gtk, why does my widget's selection disappear when it loses focus?</a></strong></dt>
  <dd>A: This effect may be seen if KDE color settings are being
      utilized.  This can be fixed by unchecking the "Apply KDE colors to
      non-KDE apps" option in the KDE colors control panel.
  </dd>

    <dt><strong><a name="gtkwidgethidden">Q: On gtk and motif, why are some widgets hidden when they are visible on Windows or the Macintosh?</a></strong></dt>
  <dd>A: The SWT.CENTER, although undefined for composites, has
the same value as SWT.EMBEDDED which is used to embed widgets from
other widget toolkits into SWT.  On some operating systems (GTK, Motif), this
may cause the children of this compostite to be obscured.  Do not use
the SWT.CENTER style when creating a composite.
  </dd>

    <dt><strong><a name="advancedgraphics">Q: Which platforms have advanced graphics support?</a></strong></dt>
  <dd>A:
  <ul>
    <li>SWT for Windows uses GDI+ for advanced graphics, which is installed on Windows XP and newer.
    Windows 2000 users can download and install a Microsoft package containing GDI+.</li>
    <li>SWT for GTK+ and Motif use Cairo for advanced graphics, which is installed on systems with GTK+ 2.8 or newer
    (for example RHEL 5).</li>
    <li>SWT for OS X uses Quartz for advanced graphics, which is installed on all supported OS X versions.</li>
  </ul>
  </dd>

  <dt><strong><a name="whatisbrowser">Q: What is the SWT Browser widget?</a></strong></dt>
  <dd>A: The SWT Browser widget wraps a native web browser engine and can be used to display HTML documents,
      provide browser-like experience or create hybrid web/native applications.
  </dd>

  <dt><strong><a name="browserplatforms">Q: Which platforms support the SWT Browser, and which native renderers are available?</a></strong></dt>
  <dd>A: The SWT Browser is currently available on all supported platforms. Available renderers and corresponding widget style flags are:
    <p>
    <table>
      <tr><th>Renderer</th><th>Platform</th><th>Style Flag</th><th>Default</th></tr>
      <tr><td>Internet Explorer</td><td>Windows</td><td><code>SWT.IE</code></td><td>Yes</td></tr>
      <tr><td>WebKit</td><td>macOS, Linux GTK</td><td><code>SWT.WEBKIT</code></td><td>Yes</td></tr>
      <tr><td>Edge (Chromium-based)</td><td>Windows</td><td><code>SWT.EDGE</code></td><td>No</td></tr>
      <tr><td>Chromium</td><td>All</td><td><code>SWT.CHROMIUM</code></td><td>No</td></tr>
    </table>
    <p>
    <em>Note:</em> As of Eclipse/SWT 4.8, Mozilla (XULRunner) renderer is no longer supported, <code>SWT.MOZILLA</code> flag is deprecated and has no effect.
    <p>
    Browser instances created with style <code>SWT.NONE</code> will use the default platform renderer
    according to the table above. Default renderer does not require additional software installation.
    It is possible to override the default native renderer, see <a href="#browserspecifydefault">How do I specify the default type of native renderer that is used by the Browser?</a>.
    <p>
    For additional information on specific renderers see <a href="#howusechromium">How do I explicitly use Chromium as the Browser's underlying renderer?</a> and
    <a href="#howuseedge">How do I explicitly use Edge as the Browser's underlying renderer?</a>.
  </dd>

  <dt><strong><a name="browserspecifydefault">Q: How do I specify the default type of native renderer that is used by the Browser?</a></strong></dt>
  <dd>A: The default native renderers that are used for <code>SWT.NONE</code>-style Browsers are listed in
    <a href="#browserplatforms">Which platforms support the SWT Browser, and which native renderers do they use?</a>.
    Default is chosen to not require additional software installation and to preserve backward-compativle behavior.
    <p>
    A user can set a property to specify the type of native renderer to use for <code>SWT.NONE</code>-style Browsers.
    Setting this property does not affect Browsers that are created with explicit renderer styles such as <code>SWT.WEBKIT</code> or <code>SWT.CHROMIUM</code>.
    The property name is <code>org.eclipse.swt.browser.DefaultType</code> and valid values for it currently include "<code>webkit</code>",
    "<code>ie</code>" (since 4.3), "<code>chromium</code>" (since 4.17) and "<code>edge</code>" (since 4.19).  This property must be set before the <em>first</em> Browser instance is created.
    <p>
    <em>Note:</em> As of Eclipse/SWT 4.8, Mozilla (XULRunner) renderer is no longer supported, the value <code>mozilla</code> has no effect.
    <p>
    A user can specify a comma-separated list of native renderers, in order of preference, for the <code>org.eclipse.swt.browser.DefaultType</code> value.
    Valus not applicable to a particular platform are ignored.  For example, the value of <code>edge,chromium</code> will change the default
    to Edge on Windows and Chromium on other platforms.
    <p>
    The best opportunity for a user to set this property is by launching their application with a <code>-D</code>
    VM switch (eg. add to the end of the eclipse.ini file: <code>-Dorg.eclipse.swt.browser.DefaultType=chromium</code>).
    <p>
    An alternate approach that an eclipse application may use is to provide a <code>BrowserInitializer</code>
    implementation that sets this property.  This implementation will be invoked when the first Browser instance
    is about to be created.  The steps to do this are:
    <ul>
      <li>Create a fragment with host plug-in <code>org.eclipse.swt</code>.</li>
      <li>In this fragment create class <code>org.eclipse.swt.browser.BrowserInitializer</code>.</li>
      <li>Implement a static initializer in this class that sets the <code>org.eclipse.swt.browser.DefaultType</code> property.
    </ul>
  </dd>

  <dt><strong><a name="browsernativeie">Q: Which Internet Explorer version do Browsers on Windows use?</a></strong></dt>
  <dd>A: All supported Windows versions provide Internet Explorer 11.
    <p>
    An HTML document can override this behavior by including a <code>X-UA-Compatible</code> meta tag as described in
    <a href="http://msdn.microsoft.com/en-us/library/cc288325%28v=vs.85%29.aspx">Defining Document Compatibility</a>.
    <p>
    Additionally, the Browser's default compatibility mode can be overridden by setting Java property <code>org.eclipse.swt.browser.IEVersion</code> to a value
    from <a href="http://msdn.microsoft.com/en-us/library/ee330730%28v=vs.85%29.aspx#browser_emulation">Browser Emulation</a> before the first
    Browser instance is created.  For example, adding the line <code>-Dorg.eclipse.swt.browser.IEVersion=7000</code> to the end of
    eclipse's <code>eclipse.ini</code> file will revert all IE-based Browsers to use IE7 compatibility mode by default.</li>
  </dd>

  <dt><strong><a name="browserlinux">Q: What do I need to run the SWT Browser inside Eclipse on Linux?</a></strong></dt>
  <dd>A: Default Browser renderer for Linux GTK is WebKitGTK+ 2.  Generally, it will be installed as part of the GTK-based desktop environment.
    <p>
    Particular package name depends on the distribution. For example:
    <ul>
      <li>RHEL, Fedora: webkit2gtk3 or webkitgtk4</li>
      <li>Debian, Ubuntu: libwebkit2gtk-4.0-37</li>
      <li>SLES, openSUSE: libwebkit2gtk-4_0-37</li>
    </ul>
    <p>
    <em>Note: </em> as of Eclipse/SWT 4.8, Mozilla (XULRunner) is no longer supported.
    </br>
    <em>Note: </em> as of Eclipse/SWT 4.15, WebKitGTK 1.x is no longer supported.
    <p>
    Chromium renderer is also available for Linux, see <a href="#howusechromium">How do I explicitly use Chromium as the Browser's underlying renderer?</a>.
  </dd>

  <dt><strong><a name="howusechromium">Q: How do I explicitly use Chromium as the Browser's underlying renderer?</a></strong></dt>
  <dd>A: To specify that a Chromium renderer be used by a Browser instance, create it with style <code>SWT.CHROMIUM</code> (since 4.17) or
  set the Java property <code>org.eclipse.swt.browser.DefaultType=chromium</code>.
  <p>
  You can get the SWT-Chromium libraries from the Eclipse SDK or from the standalone SWT Chromium support libraries section on the download page.
  <p>
  To use the Chromium libraries from the Eclipse SDK:
  <ul>
    <li>Install the CEF binaries in Eclipse from the p2 repo - <a href="http://dl.maketechnology.io/chromium-cef/rls/repository">CEF p2 repo from Make technology</a></li>
    <li>Add the required jars to classpath of project:
        <ul>
         <li>SWT-Chromium fragment (<code>org.eclipse.swt.browser.chromium.&lt;ws&gt;.&lt;os&gt;.&lt;arch&gt;.jar</code>)</li>
         <li>SWT fragment (<code>org.eclipse.swt.&lt;ws&gt;.&lt;os&gt;.&lt;arch&gt;.jar</code>)</li>
         <li>CEF binary (<code>com.make.chromium.cef.&lt;ws&gt;.&lt;os&gt;.&lt;arch&gt;.jar</code>)</li>
        </ul>
    </li>
  </ul>
  <p>
  To use the Chromium libraries from the standalone SWT downloads:
  <ul>
    <li>Get CEF binaries for your platform from the p2 repo:
     <ul>
       <li><a href="http://dl.maketechnology.io/chromium-cef/rls/repository/plugins/com.make.chromium.cef.gtk.linux.x86_64_0.4.0.202005172227.jar">CEF GTK binaries</a></li>
       <li><a href="http://dl.maketechnology.io/chromium-cef/rls/repository/plugins/com.make.chromium.cef.cocoa.macosx.x86_64_0.4.0.202005172227.jar">CEF Mac binaries</a></li>
       <li><a href="http://dl.maketechnology.io/chromium-cef/rls/repository/plugins/com.make.chromium.cef.win32.win32.x86_64_0.4.0.202005172227.jar">CEF Windows binaries</a></li>
     </ul>
    </li>
    <li>Add the required jars to classpath of project:
     <ul>
       <li>SWT-Chromium standalone jar (<code>swt-chromium.jar</code>)</li>
       <li>SWT standalone jar (<code>swt.jar</code>)</li>
       <li>CEF binary (<code>com.make.chromium.cef.&lt;ws&gt;.&lt;os&gt;.&lt;arch&gt;.jar</code>)</li>
     </ul>
    </li>
  </ul>
  <p>
  To launch Eclipse with Chromium as the default browser type:
  <ul>
    <li>Install the CEF binaries in Eclipse from the p2 repo - <a href="http://dl.maketechnology.io/chromium-cef/rls/repository">CEF p2 repo from Make technology</a></li>
    <li>In eclipse.ini, add <code>-Dorg.eclipse.swt.browser.DefaultType=chromium</code> under -vmargs.</li>
  </ul>
  </dd>

  <dt><strong><a name="howuseedge">Q: How do I explicitly use Edge as the Browser's underlying renderer?</a></strong></dt>
  <dd>A: To specify that an Edge renderer be used by a Browser instance, create it with style <code>SWT.EDGE</code> (since 4.19) or
    set the Java property <code>org.eclipse.swt.browser.DefaultType=edge</code>.
    <p>
    Edge rendering back-end uses the WebView2 component, which is based on, but distinct from the Edge browser itself.
    WebView2 has to be installed separately from one of the following sources:
    <ul>
      <li>A stand-alone runtime installer, either web or offline
        (<a href="https://developer.microsoft.com/en-us/microsoft-edge/webview2/#webview-title">Download the WebView2 Runtime</a> from Microsoft).
        <br/>
        This runtime will be shared between all applications on the machine and will auto-update itself independent of your application.
      </li>
      <li>
        A fixed-version archive with all the necessary files (Same link as above).
        <br/>
        This is a complete, fixed set of files to be included with your application.
        Unlike the first option, you have complete freedom in bundling, packaging and updating it.
      </li>
      <li>
        Beta, Dev or Canary version of the Edge browser
        (<a href="https://www.microsoftedgeinsider.com/en-us/download">https://www.microsoftedgeinsider.com/en-us/download</a>).
        <br/>
        This option is convenient for testing, but production deployments should use the previous two options.
      </li>
    </ul>
    <p>
    <em>Note:</em> Stable Edge browser installations <strong>don't</strong> provide a WebView2 component.
    <p>
    See also <a href="https://docs.microsoft.com/en-us/microsoft-edge/webview2/concepts/distribution">Distribution of apps using WebView2</a> on MSDN.
    <p>
    SWT will automatically locate installed browsers and runtimes.
    In case you want to use fixed-version binaries or override the automatically chosen version,
    set the <code>org.eclipse.swt.browser.EdgeDir</code> Java property to the directory containing <code>msedgewebview2.exe</code>.
    For example:
    <pre>    java "-Dorg.eclipse.swt.browser.EdgeDir=c:\Program Files (x86)\Microsoft\Edge Beta\Application\88.0.705.29" ...</pre>
    <p>
    WebView2 creates a user data directory to stores caches and persistent data like cookies and localStorage.
    All WebView2 instances in an application and all instances of the same application share this directory.
    <p>
    The default user directory location is <code>%LOCALAPPDATA%\&lt;AppName&gt;\WebView2</code>,
    where <code>&lt;AppName&gt;</code> is defined with <code>Display.setAppName()</code>.
    This location can be overridden on a per-process basis by setting the
    <code>org.eclipse.swt.browser.EdgeDataDir</code> Java property.
  </dd>

  <dt><strong><a name="howuseedgeoptions">Q: What configuration options are avaibale for the Edge renderer?</a></strong></dt>
  <dd>A: Several Java properties are available to fine-tune the behavior of the Edge renderer.
    <p>
    The properties <code>org.eclipse.swt.browser.EdgeDir</code> and <code>org.eclipse.swt.browser.EdgeDataDir</code> are described in
    <a href="#howuseedge">How do I explicitly use Edge as the Browser's underlying renderer</a>.
    <p>
    The property <code>org.eclipse.swt.browser.EdgeArgs</code> defines command line
    arguments to be passed directly to the Chromium process.
    For a list of available arguments (unofficial) see
    <a href="https://peter.sh/experiments/chromium-command-line-switches/">https://peter.sh/experiments/chromium-command-line-switches/</a>.
    <br/>
    For example, to disable GPU rendering use:
    <pre>    java -Dorg.eclipse.swt.browser.EdgeArgs=--disable-gpu ...</pre>
    <p>
    The property <code>org.eclipse.swt.browser.EdgeLanguage</code> is a language or
    language+country code that defines the browser UI language and preferred
    language for HTTP requests (<code>Accept-Languages</code> header).
    Example values: <code>en</code>, <code>ja</code>, <code>en-GB</code>, <code>de-AT</code>, etc.
    <p>
    Informational property <code>org.eclipse.swt.browser.EdgeVersion</code> contains the
    version of the browser currently in use.
    <p>
    <em>Note:</em> All of the properties described above must be set before the first instance of the Edge-based <code>Browser</code> is created.
  </dd>

  <dt><strong><a name="edgelimitations">Q: What are the limitations of the Edge Browser renderer?</a></strong></dt>
  <dd>A: Due to API differences and WebView2 implementation details, Edge renderer doesn't implement complete Browser widget API.
    Some features aren't available or behave differently compared to the older Internet Explorer renderer.
    <p>
    <ul>
      <li><code>AuthenticationListener</code>:
        Unsupported. Missing upstream API.
      </li>
      <li><code>StatusTextListener</code>:
        Unsupported. Conceptually obsolete.
      </li>
      <li><code>VisibilityWindowListener.hide</code>:
        Unsupported. Conceptually obsolete.
      </li>
      <li><code>ProgressListener.changed</code>:
        Unsupported. Missing upstream API.
      </li>
      <li><code>ProgressListener.completed</code>:
        Fires for the top level document only.
        On Edge version 88 and later it matches the <code>DOMContentLoaded</code> JavaScript event,
        on earlier versions it matches the <code>load</code> JavaScript event.
      </li>
      <li><code>LocationListener.changing</code>, <code>OpenWindowListener.open</code>:
        These events may return values and have to run synchronously.
        Calling <code>evaluate()</code> and <code>getText()</code> from their handlers is impossible and will throw an exception.
      </li>
      <li><code>LocationListener.changed</code>:
        Fires for the top document only. May not fire when using <code>setText()</code>.
      </li>
      <li><code>KeyListener</code>, <code>MouseListener</code>:
        Unsupported. Missing upstream API.
      </li>
      <li><code>evaluate(String script, boolean trusted)</code>:
        The parameter <code>trusted</code> is ignored. Everything runs in the same security context scoped to a given user directory.
      </li>
      <li><code>execute(String script)</code>:
        Execution is always asynchronous. You can't observe evaluation effects immediately after the <code>execute()</code> call.
        Use <code>evaluate()</code> for synchronous script evaluation.
      </li>
      <li><code>getText()</code>:
        Returns the live contents of HTML document as seen by the browser.
        This can differ from what was set with <code>setText()</code> due to browser processing and script execution.
        <br/>
        <em>Note:</em> Implemented as <code>evaluate("return document.documentElement.outerHTML")</code>.
      </li>
      <li><code>setText()</code>:
        This method uses <code>data:</code> URLs internally (WebView2 implementation detail) and these URLs might appear in the <code>LocationEvent.url</code> field.
      </li>
      <li><code>getCookie()</code>, <code>setCookie()</code>:
        Unsupported. WebView doesn't have a global cookie manager.
      </li>
      <li><code>setUrl(String url, String postData, String[] headers)</code>:
        The parameters <code>headers</code> and <code>postData</code> require Edge 88 or later
        (currently in Beta).
      </li>
      <li><code>close()</code>:
        Unsupported. Missing upstream API.
      </li>
      <li>
        Unless loaded from a <code>file://</code> URL, pages don't have access to other <code>file://</code> URLs.
      </li>
      <li>
        Pages navigated to with <code>setText()</code> might appear to have <code>data:</code> URLs in event parameters and elsewhere.
        (Internet Explorer uses <code>about:blank</code> URL in this case).
      </li>
    </ul>
    <p>
  </dd>

  <dt><strong><a name="browserscrollbar">Q: How do I hide the Browser's scrollbars?</a></strong></dt>
  <dd>A: The only way to influence whether scrollbars are shown in a Browser or not is for the document it's showing to
      specify a style such as <code>'overflow:auto'</code> or <code>'overflow:hidden'</code>.  There are two ways to do this:
      <ol>
      <li>If you are providing the document being shown then its body tag can specify this style like
          <code>&lt;body style='overflow:hidden'&gt;</code>.</li>
      <li>Alternatively, this style can be changed in the DOM for any document that has been loaded.  The easiest way
          to do this is with a line like <code><em>&lt;yourBrowser&gt;</em>.execute("document.getElementsByTagName('body')[0].style.overflow='auto'");</code>.</li>
      </ol>
  </dd>

  <dt><strong><a name="browserproxy">Q: How do I set a proxy for the Browser to use?</a></strong></dt>
  <dd>A:
    <ul>
      <li>Windows: All Browser instances, regardless of native renderer, automatically use Windows' global proxy settings.
        These settings can be changed at any time in the Windows Control Panel.
      <li>OS X: All Browser instances, regardless of native renderer, automatically use OS X's global proxy settings.
        These settings can be changed at any time in the OS X System Preferences.</li>
      <li>Linux/Solaris: Proxy information must be explicitly specified by setting values for java properties
        <code>network.proxy_host</code> and <code>network.proxy_port</code> (<em>@since 3.4</em>).  These properties are checked
        the first time a Browser is created, and if set, will be used for all non-local HTTP, HTTPS and FTP requests in all Browser
        instances.  A user wishing to set these values should do so by passing <code>-D...</code> VM arguments to the JRE at startup.</li>
    </ul>
  </dd>

  <dt><strong><a name="swtawtosxmore">Q: Why does the SWT_AWT bridge not work for me on OS X, even after updating Java or the OS?</a></strong></dt>
  <dd>A: Prior to Eclipse 3.6, both the Carbon and Cocoa versions of the SWT only supported embedding the SWT in an AWT Frame.
  In Cocoa SWT 3.6 and later, embedding works in either direction. If you have the right environment, next,
  make sure you are starting your application with the argument '-XstartOnFirstThread'. This is necessary even
  if you will be using Swing or the AWT. Next, make sure your code is calling each toolkit on the correct thread. Code
  that calls into the SWT must be running on the main thread, and code that calls the AWT or Swing must be called from
  a thread other than the SWT thread, using either java.awt.EventQueue.invokeLater() or javax.swing.SwingUtilities.invokeLater().
  <strong>NOTE:</strong> This is true on ALL PLATFORMS, not just Mac OS X, but your application is almost guaranteed to hang or
  be very unstable if you don't follow this rule on the Mac.
  </dd>

  <dt><strong><a name="printOnGTK">Q: Why is the Print menu item disabled in Eclipse on GTK (Linux, UNIX)?</a></strong></dt>
  <dd>A: GTK+ began supporting printing in version 2.10. To print in Eclipse, you need to have Eclipse version 3.3 or later,
  and at least GTK+ 2.10.0. To determine what GTK+ version you are running, type: <tt>rpm -q gtk2</tt>.
  <p>Prior to Eclipse 3.3, printing was not implemented on GTK; however you can use the External Tools support in Eclipse
  to print files using lpr or some other printing utility. See <a href="#printOnX">here</a> for the steps to set this up.
  </dd>

  <dt><strong><a name="uithread">Q: Why do I get the error "org.eclipse.swt.SWTException: Invalid thread access"?</a></strong></dt>
  <dd>A: In SWT, by definition the thread that creates the Display is a UI-thread.  This thread is responsible for
  reading and dispatching events from the operating system event queue, and invoking listeners in response to these events.
  Listener code is executed in the UI-thread.  This makes an SWT application generally quite responsive, behaving like most
  other operating system programs.  However, any long operation, when executed by a listener, will run in the UI-thread
  and prevent it from reading and dispatching events, thus hanging the application.

  <p>If a listener has a large amount of work to perform, instead of performing that work in the UI-thread, it can
  fork a separate thread so the UI-thread can continue dispatching events. If the other thread needs to execute code
  that accesses an SWT object, such as changing the string in a label, there is a concurrency issue.  At the very
  least, some kind of synchronization is necessary to prevent the operating system or SWT from crashing, hanging or
  behaving unpredictably.</p>

  <p>SWT implements a single-threaded UI model often called apartment threading.  In this model, only the UI-thread
  can invoke UI operations.  SWT strictly enforces this rule.  If you try and access an SWT object from outside the
  UI-thread, you get the exception "org.eclipse.swt.SWTException: Invalid thread access".  Different operating systems
  have different rules governing threads, UI components and synchronization.  Some use a single-threaded UI model
  like SWT.  Others allow only one thread at a time in the window system library, controlling access through a
  global lock.  This type of multi-threaded UI model is often called free threading.  Currently, in order to be
  simple, efficient and portable, SWT is apartment threaded.</p>

  <p>To allow background threads to perform operations on objects belonging to the UI-thread, the methods
  syncExec(Runnable runnable) and asyncExec(Runnable runnable) of Display are used.  These are the only
  methods in SWT that can be called from any thread.  They allow a runnable to be executed by the UI-thread,
  either synchronously, causing the background thread to wait for the runnable to finish, or asynchronously
  allowing the background thread to continue execution without waiting for the result.  A runnable that is
  executed using syncExec() most closely matches the equivalent direct call to the UI operation because a
  Java method call always waits for the result before proceeding, just like syncExec().</p>

  <p>The following code sets the text of a label from a background thread and waits for the operation to complete:

<pre>display.syncExec(
  new Runnable() {
    public void run(){
      label.setText(text);
    }
  });
</pre>
   </dd>

  <dt><strong><a name="noautolayout">Q: Why do I have to resize my shell to get my changed widgets to lay out again?</a></strong></dt>
  <dd>A: See <a href="#relayout">Why doesn't my layout update when I create/dispose/move/resize a control?</a>
  </dd>

  <dt><strong><a name="nographicslibrary">Q: Why do I get "SWTException: Unable to load graphics library" using GC?</a></strong></dt>
  <dd>A: Support for advanced graphics operations such as path for curvers and
      lines, alpha blending, antialiasing, patterns and transformations was
      added to SWT 3.1. On Windows, <a href="http://msdn.microsoft.com/library/default.asp?url=/library/en-us/gdicpp/gdiplus/gdiplus.asp">GDI+</a>
      is required. On X Windows platforms (i.e. GTK and Motif),
      <a href="http://cairographics.org/introduction">Cairo 0.4.0</a> is
      required. If your Windows platform does not have GDI+ by default then you can
      <a href="http://www.microsoft.com/downloads/details.aspx?FamilyID=6a63ab9c-df12-4d41-933c-be590feaa05a&amp;DisplayLang=en">download</a>
      a redistributable package from Microsoft.
  </dd>

  <dt><strong><a name="decorationHints"> Q:  Why doesn't my Shell have the trim decorations that I specified in its constructor?</a></strong></dt>
  <dd>A: The native window system is responsible for creating the decorations for all windows, and has the right to not fully honor the set of requested decorations.
    For this reason, styles that are passed to a Shell's constructor are considered to be hints.  For example, on some window managers, creating
    a shell with SWT.RESIZE, will also create a minimize and maximize button.  This is a constraint that all native applications are subject to.
  </dd>

  <dt><strong><a name="noevents"> Q:  Why doesn't a widget send events when I change it programmatically?</a></strong></dt>
  <dd>A: This is a design decision that is applied throughout SWT.  Events are usually not sent in response to programmatic changes (as opposed to user actions)
    in order to minimize notification of potentially unwanted events.  As a result, patterns like the following are <em>not</em> needed:
    <pre>
    ignoreNextSelectionEvent = true;
    myTable.select(2);
    ignoreNextSelectionEvent = false;
    </pre>
    Since a programmatic change implies that the application is already aware of the change being made, it can trigger the appropriate action directly.  If firing
    an event is still desired (for instance, to preserve object de-coupling) then the application can create the event and send it to the widget's listeners
    with <code>Widget.notifyListeners(int,Event)</code>.
    <p>Note that some specific programmatically-triggered events are sent, typically in response to low-level
    widget operations such as focus, move and resize changes. </p>
  </dd>

  <dt><strong><a name="relayout"> Q:  Why doesn't my layout update when I create/dispose/move/resize a control?</a></strong></dt>
  <dd>A: A layout is only performed automatically on a Composite's children when the Composite
      is resized, including when it is initially shown.  To make a Composite lay out its
      children under any other circumstances, such as when children are created or disposed,
      its <em>layout()</em> method must be called.  For an example of this see SWT snippet
      <a href="https://github.com/eclipse-platform/eclipse.platform.swt/tree/master/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet98.java">create and dispose children of a composite</a>.
  </dd>

  <dt><strong><a name="scrolledcomposite"> Q:  How do I programmatically scroll a Composite?</a></strong></dt>
  <dd>A: This is done by using a ScrolledComposite instead of a Composite, and invoking
      <code>ScrolledComposite.setOrigin(...)</code> to scroll it.  For an example of this see SWT snippet
      <a href="https://github.com/eclipse-platform/eclipse.platform.swt/tree/master/examples/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet296.java">use a ScrolledComposite to scroll a Tree vertically</a>.
  </dd>

  <dt><strong><a name="copypastewithKlipper"> Q:  Why does Copy/Paste sometimes not work on Linux?</a></strong></dt>
  <dd>A: There's a known Copy/Paste problem for people who run Klipper Clipboard applet which
      causes Eclipse clipboard operations to fail. For more information about this issue see
      <a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=153809">Bug 153809</a>
      <a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=226540">Bug 226540</a>.
  </dd>

  <dt><strong><a name="jumplist"> Q: Can I use the TaskItem's menu without the launcher?</a></strong></dt>
  <dd>A: The TaskItem's menu (also known as Jump List on Windows 7) was designed to be used  in conjunction with
  the eclipse launcher. That said, it is possible on Windows 7 to overwrite the default values for the items in the
  jump list calling <code>setData()</code> on the respective menu item using the following keys:
  <ol>
    <li><strong>org.eclipse.swt.win32.taskbar.executable:</strong> path to the executable</li>
    <li><strong>org.eclipse.swt.win32.taskbar.arguments:</strong> arguments to be passed to the executable</li>
    <li><strong>org.eclipse.swt.win32.taskbar.icon:</strong> path to the icon file</li>
    <li><strong>org.eclipse.swt.win32.taskbar.icon.index:</strong> the index of the icon, when the icon file is a dll or an exe</li>
  </ol>
  For more information about this issue see <a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=306039">Bug 306039</a>.
  <p></p>
  </dd>

   <dt><strong><a name="multiplatformjar"> Q:  How do I produce a single jar file that contains all of the various SWT platform jars?</a></strong></dt>
  <dd>A: Please see <a href="http://stackoverflow.com/questions/2706222/create-cross-platform-java-swt-application/5784073#5784073">this post</a> for a complete overview
  of how to package the jars.
  </dd>


  <dt><strong><a name="twistieanimation"> Q:  How do I enable the fade animation for expando buttons in Trees (Windows Vista and up) ?</a></strong></dt>
  <dd>A: The fade in/fade out animation for expando buttons on Trees that can be seen in some applications, like Windows Explorer and older version
  of Eclipse, has been disabled. See <a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=342282">Bug 342282</a> for details.
  <br>
  The animation can be enabled by passing the -Dorg.eclipse.swt.internal.win32.enableFadeInOutExpandos argument to the JVM. For example:<p>
  <code>eclipse -vmargs -Dorg.eclipse.swt.internal.win32.enableFadeInOutExpandos</code></p> will bring the animation back to Eclipse.
  <p>Alternatively, the flag <code>-Dorg.eclipse.swt.internal.win32.enableFadeInOutExpandos</code> can be added to the end of eclipse's
  <code>eclipse.ini</code> for the same result.</p>
  </dd>

  <dt><strong><a name="keyboardshortcuts">Q: What are the standard keyboard shortcuts on Windows, Mac OS X, Linux?</a></strong></dt>
  <dd>A: Since SWT uses native controls, standard keyboard shortcuts can be used in SWT applications.
  Here is a useful <a href="http://en.wikipedia.org/wiki/Table_of_keyboard_shortcuts">Table of Keyboard Shortcuts</a>.
  <br>Eclipse has additional keyboard shortcuts. For a list, type Ctrl + Shift + L.
  <br>On Mac OS X, the OS screen reader, VoiceOver, can also be used to navigate through controls using the keyboard.
  Here is the <a href="http://www.apple.com/accessibility/voiceover/manual.html">VoiceOver User's Manual</a>.
  </dd>

  <dt><strong><a name="screenreaders"> Q:  Can I use a screen reader with Eclipse?</a></strong></dt>
  <dd>A: Yes. Eclipse works with JAWS and NVDA on Windows, VoiceOver on the Mac, and Orca on Linux.
  Window-Eyes and Hal/SuperNova on Windows have not been tested recently, however they both worked the last time they were tested.
  </dd>

  <dt><strong><a name="oldScreenReaderNotWorking"> Q:  Why doesn't my old Windows screen reader work with Eclipse 3.6?</a></strong></dt>
  <dd>A: JAWS version 8 and 9 and Window-Eyes version 6 no longer work well with Eclipse and other SWT applications.
  Window-Eyes 6 will cause Eclipse to crash, and JAWS 8 and 9 can cause SWT applications to crash.
  The reason is that Eclipse 3.6 added support for IAccessible2, and these older screen reader versions
  contain a partial implementation of IAccessible2 that does not follow the current IAccessible2 specification.
  The workaround is to launch eclipse or your SWT application using the
  <br><code>-Dorg.eclipse.swt.accessibility.UseIA2=false</code>
  <br>VM argument. For more information about this issue see
  <a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=313182">Bug 313182</a>.
  </dd>

  <dt><strong><a name="tableheaderswithJAWS"> Q:  How do I get JAWS to read Table column headers?</a></strong></dt>
  <dd>A: JAWS does not read table column headers by default.
    To get JAWS to read table headers, you need to do the following steps with JAWS running:
  <ol>
    <li>Focus on the table</li>
    <li>Press Insert+F2  (this opens the "Run JAWS Manager" dialog)</li>
    <li>Select "Customize ListView" and OK   (this opens the "Customize ListView Headers" dialog)</li>
    <li>Select OK</li>
  </ol>
  </dd>

  <dt><strong><a name="moreAccessibilityInfo"> Q:  Where can I get more info on Accessibility in Eclipse/SWT?</a></strong></dt>
  <dd>A: You can get more information on the Accessibility Features in Eclipse, and the Eclipse/SWT Accessibility API on the
  <a href="http://wiki.eclipse.org/Accessibility">Eclipse/SWT Accessibility wiki</a>.
  </dd>

  <p></p>
  <hr>
  <p></p>

  <dt>Archived questions and answers</dt>

  <p></p>
  <hr>
  <p></p>

  <dt><strong><a name="gtk32">Q: How do I build the 32-bit version of SWT GTK?</a></strong></dt>
  <dd>A: Follow these steps to extract the 32-bit SWT GTK source code from GIT and produce your own build:
  <ol>
    <li>Start Eclipse and retrieve the <code>org.eclipse.swt</code>, <code>org.eclipse.swt.gtk.linux.x86</code> and
      <code>org.eclipse.swt.tools</code> projects from dev.eclipse.org (see
      <a href="/swt/git.php">How to use SWT from GIT</a>, use <code>.classpath_gtk</code>
      as the <code>.classpath</code> file in the <code>org.eclipse.swt</code> project).</li>
    <li>Convert SWT's Java from its 64-bit form to 32-bit:</li>
    <ul>
      <li>To convert the Java code in-place, go to the <code>build.xml</code> ant script in the <code>org.eclipse.swt.gtk.linux.x86</code>
        project and run its "replace.64.to.32" target.  Once this target has completed you must refresh (F5)
        the <code>org.eclipse.swt</code> project in order to pick up the changes.</li>
      <li>Run the "build_libraries" target in the same <code>build.xml</code> file.  Refresh (F5)
        the <code>org.eclipse.swt.gtk.linux.x86</code> project when this target has completed, to pick up the new libraries.</li>
    </ul>
    <li>You're done!  The <code>org.eclipse.swt.gtk.linux.x86</code> project will now contain the 32-bit native libraries, and if you're
      interested, the 32-bit source code will now be available in the <code>org.eclipse.swt.gtk.linux.x86/src</code> folder.
  </ol>
  </dd>

  <dt><strong><a name="javawebstart">Q: How can I deploy my standalone SWT application with Java Web Start?</a></strong></dt>
  <dd>A: For steps that can be used to package and deploy an SWT application with Java Web Start (JWS) see
    <a href="/swt/jws/">How to deploy SWT Applications with Java Web Start</a>.  A related article
    that describes the deployment of SWT applications with JWS (but does not outline the process of packaging SWT) can be found at
    <a href="http://www-106.ibm.com/developerworks/opensource/library/os-jws/">http://www-106.ibm.com/developerworks/opensource/library/os-jws/</a>.
  </dd>

  <dt><strong><a name="xpthemes">Q: How do I make SWT use the Windows XP themes?</a></strong></dt>
  <dd> A: In order for an application to use Windows XP themes, there must be a manifest file
    located in the same place as the executable that launches the application.
    <br>Here is a <a href="javaw.exe.manifest">sample manifest file</a> to download, for more details on <a href="https://www.eclipse.org/swt/faq.php#winexternalmanifestfile">how to enable external manifest file on Windows</a>

    <p>Note: As of SWT 3.2, the manifest file is no longer needed.</p>
  </dd>

  <dt><strong><a name="browserlinuxrcp">Q: What do I need to run the SWT Browser in a standalone application on Linux or Solaris?</a></strong></dt>
  <dd>A: Follow the steps below to use the SWT Browser widget in your standalone SWT application.
    <ul>
      <li>A supported native browser must be installed (<a href="#browserlinux">linux requirements</a>) (<a href="#browsersolaris">solaris requirements</a>).</li>
      <li>If a supported WebKitGTK and/or XULRunner is installed then it should be found automatically at runtime with no additional effort.  For other native Mozilla-based browsers:</li>
      <ol>
        <li>Set the environment variable MOZILLA_FIVE_HOME to the native browser's installation folder. e.g. <code>setenv MOZILLA_FIVE_HOME /usr/lib/mozilla</code></li>
        <li>Set the environmnent variable LD_LIBRARY_PATH to include MOZILLA_FIVE_HOME. e.g. <code>setenv LD_LIBRARY_PATH ${MOZILLA_FIVE_HOME}:${LD_LIBRARY_PATH}</code></li>
        <li>Your standalone SWT application can now use the Browser widget.
      </ol>
    </ul>
  </dd>

  <dt><strong><a name="browsersolaris">Q: What do I need to run the SWT Browser inside Eclipse on Solaris?</a></strong></dt>
  <dd>A: The Browser is supported on OpenSolaris (x86) and Solaris 10 (SPARC).  The Mozilla versions that are supported by each Eclipse release are:
    <ul>
      <li>OpenSolaris (x86)
      <ul>
        <li>Eclipse 3.5.0: Mozilla 1.7.x GTK2, XULRunner 1.8.x - 1.9.1.x</li>
        <li>Eclipse 3.5.2 and newer: Mozilla 1.7.x GTK2, XULRunner 1.8.x - 1.9.2.x and 3.6.x</li>
        <li>Note that a Firefox release whose contained Gecko version correlates with the Mozilla versions above can also be used.
        Unlike other platforms, since Sun's compiler does not produce statically-linked libraries, Firefox builds downloaded from mozilla.org
        <em>can</em> be used on Solaris.
      </ul>
      <li>Solaris 10 (SPARC)
      <ul>
        <li>Eclipse 3.5.1 and newer: the Mozilla version that is shipped with the OS in <code>/usr/sfw/lib/</code></li>
      </ul>
      <li>Solaris 11 (SPARC)
      <ul>
        <li>Eclipse 4.2 and newer: the Mozilla version 1.7.x GTK2 in <code>/usr/sfw/lib/</code></li>
        <li>Note that the above version is not installed by default. User needs to either install it using Solaris 10 packages or copy from solaris 10 installation</li>
      </ul>
    </ul>
  </dd>

  <dt><strong><a name="howusemozilla">Q: How do I explicitly use Mozilla as the Browser's underlying renderer?</a></strong></dt>
  <dd>A: A Browser can be created with style <code>SWT.MOZILLA</code> to specify that its renderer must be Mozilla-based (<em>@since 3.3</em>).
      Note that <code>SWT.MOZILLA</code> style is deprecated in <em>4.8</em> and XULRunner is not supported in Eclipse 4.8 and newer versions.
      <p>
      The runtime requirements for using Mozilla-based Browsers in Eclipse/SWT 4.4 to 4.7 are listed below. Note that failure to meet these runtime requirements will cause the Browser instantiation to fail.
    <ul>
      <li>Runtime Platform:
        <ul>
          <li>Windows (x86): Any XULRunner release with version 1.8.0.x - 3.6.x, 10.x or 24.x
          <li>Windows (x86_64): Any XULRunner release with version 1.9.2.x - 3.6.x, 10.x or 24.x, and the <a href="http://www.microsoft.com/en-us/download/details.aspx?id=13523">Visual C++ 2010 runtime</a> must be installed
          <li>OS X (32-bit): Any XULRunner release with version 1.8.1.2 - 3.6.x, 10.x or 24.x, and the JRE must be "Java for Mac OS X 10.4, Release 5" or newer
          <li>OS X (x86_64): Any XULRunner release with version 1.8.1.2 - 3.6.x, 10.x or 24.x
          <li>Linux and Solaris: See <a href="#browserlinux">What do I need to run the SWT Browser inside Eclipse on Linux?</a>
        </ul>
      </li>
      <li>To use <a href="http://developer.mozilla.org/en/docs/XULRunner">XULRunner</a> it must be detectable by the Browser.  For XULRunner versions 1.8.0.x - 3.6.x
        this is facilitated by either <a href="http://developer.mozilla.org/en/docs/XULRunner_1.8.0.1_Release_Notes#Installing_XULRunner">installing</a> it or by
        <a href="#specifyxulrunner">explicitly specifying its location.</a>  For XULRunner versions newer than 3.6.x the only way to do this is by explicitly specifying its location.</li>
    <li>The installed/specified XULRunner version must be 1.8.1.2 - 3.6.x to make use of JavaXPCOM
    </ul>
    <p>
    It is important to note that conflicts have been reported between the dependent libraries of WebKit and Mozilla.  As a result it is advised that Browser
    instances with these respective types not be mixed in an application.  If a Browser with one of these types <em>must</em> be used in an application then
    java property <code>org.eclipse.swt.browser.DefaultType</code> should also be set to this type to ensure that <code>SWT.NONE</code>-style Browsers
    do not cause the libraries from the other native browser renderer to be loaded (see
    <a href="#browserspecifydefault">How do I specify the default type of native renderer that is used by the Browser?</a>).  </p>
  </dd>

  <dt><strong><a name="howusewebkit">Q: How do I explicitly use WebKit as the Browser's underlying renderer?</a></strong></dt>
  <dd>A: To specify that a WebKit renderer be used by a Browser instance, create it with style <code>SWT.WEBKIT</code> (<em>@since 3.7</em>).  The runtime requirements for
      using WebKit-based Browsers are listed below.  Note that failure to meet these runtime requirements will cause the Browser instantiation to fail.
    <ul>
    <li>Linux: WebKitGTK 1.2.0 or newer must be in the library load path.  Examples of Linux distros that meet this requirement by default
        include Red Hat Enterprise Linux 6 and Ubuntu 10.04.</li>
    <li>OS X: No additional runtime requirements, the default renderer is WebKit-based.</li>
    <li>Windows: Eclipse/SWT 4.10 dropped 32-bit support and Webkit is no longer supported. For older versions:
    <ul>
      <li>32-bit SWT</li>
      <li>Safari must be installed</li>
      <li>For OSs older than XP+SP1, the path to the Apple Application Support installation must be prepended to Windows' "Path" environment variable
          before running eclipse.  This installation will be in a location like "<code>C:\Program Files\Safari\Apple Application Support</code>" or
          "<code>C:\Program Files\Common Files\Apple\Apple Application Support</code>".  If more than one of these directories are found then choose
          the one with "Safari" in its directory ancestry.</li>
    </ul>
    </ul>
    <p>
    It is important to note that conflicts have been reported between the dependent libraries of WebKit and Mozilla.  As a result it is advised that Browser
    instances with these respective types not be mixed in an application.  If a Browser with one of these types <em>must</em> be used in an application then
    java property <code>org.eclipse.swt.browser.DefaultType</code> should also be set to this type to ensure that <code>SWT.NONE</code>-style Browsers
    do not cause the libraries from the other native browser renderer to be loaded (see
    <a href="#browserspecifydefault">How do I specify the default type of native renderer that is used by the Browser?</a>).  </p>
  </dd>

  <dt><strong><a name="browserwebkitgtk">Q: How do I use the WebKit renderer on Linux-GTK?</a></strong></dt>
  <dd>A: In Eclipse/SWT 3.7 and newer the Browser attempts to use WebKitGTK for SWT.NONE-style Browsers created on GTK.  For this to succeed, WebKitGTK
      1.2.0 or newer must be in the library load path.  Examples of Linux distros that meet this requirement by default include Red Hat
      Enterprise Linux 6 and Ubuntu 10.04.  Linux installations that do not meet this requirement will fall back to using Mozilla for SWT.NONE-style Browsers.
      <p>
      Eclipse/SWT 3.6.x can also use WebKitGTK for SWT.NONE-style Browsers created on GTK, but the user must explicitly request this by setting java property
      "<code>org.eclipse.swt.browser.UseWebKitGTK</code>" to "<code>true</code>".  In the absence of this property being set, Mozilla is used for all SWT.NONE-style
      Browsers.  (Note that Eclipse/SWT 3.6.x is only able to use WebKitGTK 1.2.x; it will fail if a newer WebKitGTK release is found.)
  </dd>

  <dt><strong><a name="browserapplets">Q: Can I view Java applets in the SWT Browser?</a></strong></dt>
  <dd>A: Browser support for applets varies by platform:
    <ul>
      <li>Windows: As of Eclipse/SWT 3.5, applets can be viewed in a Browser if <em>all</em> of the following conditions are met:
        <ol>
          <li>For Browsers created with style SWT.NONE, the installed IE version is 7.0 or newer</li>
          <li>For Browsers created with style SWT.MOZILLA, the installed XULRunner version is 1.9.2.x or 3.6.x</li>
          <li>The installed Java plug-in is Sun JRE 1.6u10 or newer, with the Next Generation Java Plug-in enabled (this plug-in is enabled by default when the JRE is installed)</li>
          <li>The application is launched with the same JRE that provides the installed Java plug-in</li>
          <li>The application adds the JRE's plugin.jar, deploy.jar and javaws.jar jars to the JRE's boot classpath.  For example, to launch eclipse:
          <code>eclipse -vmargs -Xbootclasspath/a:"C:\Program Files\Java\jre6\lib\plugin.jar;C:\Program Files\Java\jre6\lib\deploy.jar;C:\Program Files\Java\jre6\lib\javaws.jar"</code></li>
        </ol>
      </li>
      <li>Linux (Mozilla): Applets can be viewed with Mozilla-based Browsers as long as the Mozilla Java plug-in is found at runtime.
      For info about adding directories to the Mozilla plug-in search path see <a href="#mozillaPlugins">How can my Mozilla-based Browser find my Mozilla plug-ins?</a></li>
      <li>OS X (WebKit): Applets cannot be viewed with WebKit-based Browsers on OS X because the launching of a JRE to execute the applet collides with the
      JRE that is running the application.</li>
    </ul>
  </dd>

  <dt><strong><a name="specifyxulrunner">Q: Can I specify which XULRunner installation gets used?</a></strong></dt>
  <dd>A: Typically a Mozilla-based Browser uses XULRunner's lookup mechanism to find a registered XULRunner at runtime,
    in which case a XULRunner location does not need to be specified.  However if you wish to override this mechanism you
    can set the value of java system property <code>org.eclipse.swt.browser.XULRunnerPath</code> to the full path of a
    specific XULRunner to use.  This property must be set before the <em>first</em> Browser instance is created.
    <p>
    The best opportunity for a user to set this property is by launching their application with a <code>-D</code>
    VM switch (eg.- add to the end of the eclipse.ini file: <code>-Dorg.eclipse.swt.browser.XULRunnerPath=...</code>).
    <p>
    An alternate approach that an eclipse application may use is to provide a <code>XULRunnerInitializer</code>
    implementation that sets this property.  This implementation will be invoked when the first Mozilla-based Browser
    is about to be created.  The steps to do this are:
    <ul>
      <li>Create a fragment with host plug-in <code>org.eclipse.swt</code>.</li>
      <li>In this fragment create class <code>org.eclipse.swt.browser.XULRunnerInitializer</code>.</li>
      <li>Implement a static initializer in this class that sets the <code>org.eclipse.swt.browser.XULRunnerPath</code> property.
      As an example, the class below will set the property to the win32 xulrunner plug-in if it is present.
      <pre>
package org.eclipse.swt.browser;

import java.io.*;
import java.net.*;
import org.eclipse.core.runtime.*;
import org.osgi.framework.Bundle;

public class XULRunnerInitializer {
    static {
        Bundle bundle = Platform.getBundle("org.mozilla.xulrunner.win32.win32.x86"); //$NON-NLS-1$
        if (bundle != null) {
            URL resourceUrl = bundle.getResource("xulrunner"); //$NON-NLS-1$
            if (resourceUrl != null) {
                try {
                    URL fileUrl = FileLocator.toFileURL(resourceUrl);
                    File file = new File(fileUrl.toURI());
                    System.setProperty("org.eclipse.swt.browser.XULRunnerPath",file.getAbsolutePath()); //$NON-NLS-1$
                } catch (IOException e) {
                    // log the exception
                } catch (URISyntaxException e) {
                    // log the exception
                }
            }
        }
    }
}
      </pre></li>
    </ul>
  </dd>

  <dt><strong><a name="specifyprofile">Q: Can I specify which Mozilla profile gets used?</a></strong></dt>
  <dd>A: (<em>@since 4.4</em>) A profile can be specified for use by all Mozilla-based Browser instances by setting Java property <code>org.eclipse.swt.browser.MOZ_PROFILE_PATH</code> to the
    path of the profile before the first instance of a Mozilla-based Browser is created.  The best opportunity for a user to set this property is by launching their application with a <code>-D</code>
    VM switch (eg.- add to the end of the eclipse.ini file: <code>-Dorg.eclipse.swt.browser.MOZ_PROFILE_PATH=...</code>).
  </dd>

  <dt><strong><a name="howdetectmozilla">Q: How does the Browser detect a native Mozilla browser to use?</a></strong></dt>
  <dd>A: The first Mozilla-based Browser instance performs the steps below, in order, until a native browser is found.  All subsequent Mozilla-based Browser instances will use this same detected browser.
    <ol>
      <li>If Java property <code>org.eclipse.swt.browser.XULRunnerPath</code> is defined then use it (see <a href="#specifyxulrunner">Can I specify which XULRunner installation is used?</a>).
      <li>Attempt to detect an OS-registered XULRunner in the version range 1.8.1.2 <= version < 4.0 (in order to enable JavaXPCOM use).  Note that only XULRunner installations that are compiled for the
        same architecture as the running SWT will be considered.
      <li>Attempt to detect an OS-registered XULRunner with a version earlier than 1.8.1.2 (again, the architecture must match that of SWT).
      <li><em>(if running on Linux or Solaris, and the Browser's style is <code>SWT.NONE</code>)</em> Attempt to use the native browser pointed at by OS environment variable <code>MOZILLA_FIVE_HOME</code>, which may be any of
        the browsers listed <a href="#browserlinux">here</a>.  Note that if this environment variable is not set when eclipse is run then on linux the eclipse launcher will try to set it by checking various
        potential installation locations.
      <li>At this point a native Mozilla browser could not be found, so an <code>SWTError</code> is thrown from the constructor, which should be caught and handled by the application.  Subsequent attempts to
        create Mozilla-based Browsers will go through these detection steps again.
    </ol>
  </dd>

  <dt><strong><a name="printmozillapath">Q: How can I determine which installed Mozilla browser is being used to render Browser content?</a></strong></dt>
  <dd>A: The first Mozilla-based Browser instance performs a series of <a href="#howdetectmozilla">steps</a> to detect a native browser to use.  The SWT snippet below can be used to print the location of the
      Mozilla browser that was found.
      <pre>
import org.eclipse.swt.SWT;
import org.eclipse.swt.browser.*;
import org.eclipse.swt.graphics.*;
import org.eclipse.swt.widgets.*;

public class DisplayMozillaVersion {
    public static void main(String[] args) {
        Device.DEBUG = true;
        Display display = new Display();
        Shell shell = new Shell(display);
        System.out.println(">>>Snippet creating SWT.MOZILLA-style Browser");
        try {
            new Browser(shell, SWT.MOZILLA);
            System.out.println(">>>succeeded");
        } catch (Error e) {
            System.out.println(">>>This failed with the following error:");
            e.printStackTrace();
            System.out.println("\n\nSnippet creating SWT.NONE-style Browser");
            try {
                new Browser(shell, SWT.NONE);
                System.out.println(">>>succeeded");
            } catch (Error e2) {
                System.out.println(">>>This failed too, with the following error:");
                e2.printStackTrace();
            }
        }
        display.dispose();
    }
}
      </pre>
  </dd>

  <dt><strong><a name="mozillaplugins">Q: How can my Mozilla-based Browser find my Mozilla plug-ins?</a></strong></dt>
  <dd>A: As of eclipse 3.3 the default set of Mozilla plug-in paths that are searched can be augmented by defining
    environment variable <code>MOZ_PLUGIN_PATH</code>. For example: <code>export MOZ_PLUGIN_PATH=/usr/lib/browser-plugins</code>.
  </dd>

  <dt><strong><a name="howusejavaxpcom">Q: How do I use JavaXPCOM with the Browser?</a></strong></dt>
  <dd>A: First, ensure that you have all of the requirements listed in
    <a href="/swt/faq.php#howusemozilla">How do I explicitly use Mozilla as the Browser's underlying renderer?</a>.
    Once these are in place then you can reference JavaXPCOM as follows:
    <p><ul>
      <li>If your application runs as an Eclipse plug-in:
      <ul>
    <li>download the <a href="http://releases.mozilla.org/pub/mozilla.org/xulrunner/releases/">XULRunner SDK</a> for the XULRunner version that you will be embedding</li>
    <li>add its lib/MozillaInterfaces.jar and (if present) lib/MozillaGlue.jar files to your plugin root
        <li>open your plug-in's META-INF/MANIFEST.MF file in the Plug-in Manifest editor</li>
          <ul>
            <li>switch to its "Runtime" tab</li>
            <li>add the jar(s) in the "Classpath" section</li>
            <li>add all of the org.mozilla.* packages in the "Exported Packages" section</li>
            <li>save these changes</li>
          </ul>
      </ul>
      <li>If your application runs as a stand-alone application:
      <ul>
        <li>download the <a href="http://releases.mozilla.org/pub/mozilla.org/xulrunner/releases/">XULRunner SDK</a> for the XULRunner version that you will be embedding</li>
        <li>add its lib/MozillaInterfaces.jar and (if present) lib/MozillaGlue.jar files to your application's java build path</li>
      </ul>
    </ul>
  </dd>

  <dt><strong><a name="32eclipsegtk64"> Q:  Why do I get strange drawing behaviour when running 32 bit Eclipse on a 64 bit GTK platform?</a></strong></dt>
  <dd>A: A 64 bit Linux OS comes configured by default with 64 bit libraries. If you wish to run the 32 bit version of Eclipse, you must ensure that you have
  a 32 bit JRE as well as the 32 bit version of the GTK libraries. Red Hat bundles the 32 bit libraries in their installer under the "Compatibility Arch Support" package.
  </dd>

  <dt><strong><a name="printOnGTKHangs">Q: Why does Eclipse 3.3 freeze when I open an editor on GTK 2.10 and GTK 2.12 (Linux, UNIX)?</a></strong></dt>
  <dd>A: There is a bug in some versions of GTK that causes certain print backends to hang.
  <p>If you do not want to upgrade your GTK to a fixed version, you can make use of the org.eclipse.swt.internal.gtk.disablePrinting
   flag available in Eclipse 3.3.1 maintenance builds as well as 3.4 M1 and later. To use this, you must pass the flag to eclipse on startup:
   <br>./eclipse -vmargs -Dorg.eclipse.swt.internal.gtk.disablePrinting
  </dd>

  <dt><strong><a name="rtlgtk28"> Q:  Why doesn't SWT.RIGHT_TO_LEFT work on some GTK versions (less than 2.8)?</a></strong></dt>
  <dd>A: SWT relies on the Cairo graphics library to render strings and GTK started using Cairo in version 2.8.
  </dd>

  <dt><strong><a name="swtawtsolaris">Q: Why does the SWT_AWT bridge not work for me on AIX or Solaris?</a></strong></dt>
  <dd>A: The SWT_AWT bridge requires that AWT be using XToolkit, since this implements the XEmbed
      protocol.  However by default AWT on AIX and Solaris use MToolkit.  This can be easily changed as
      described in <a href="http://java.sun.com/j2se/1.5.0/docs/guide/awt/1.5/xawt.html">XToolkit on Solaris/Linux</a>.
  </dd>

</dl>
</div>
<?php
$html = ob_get_clean();

$App->AddExtraHtmlHeader('<style type="text/css">dt { margin-top: 10px; }</style>');

# Generate the web page
$App->generatePage($theme, $Menu, $Nav, $pageAuthor, $pageKeywords, $pageTitle, $html);
?>
