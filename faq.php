<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
    <title>The SWT FAQ</title>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
    <link rel="stylesheet" href="http://dev.eclipse.org/default_style.css" type="text/css">
    <link rel="stylesheet" href="swt.css" type="text/css">
    <link rel="shortcut icon" href="http://www.eclipse.org/images/eclipse.ico" type="image/x-icon">
    <style type="text/css"> dt { padding-top: 20px; padding-bottom: 5px; } </style>
</head>
<body bgcolor="#ffffff" text="#000000">
<table width="825px" class="swtpage">
<colgroup><col width="125px"><col width="700px"></colgroup>
<tr><?php include "sidebar.php"; ?>
<td valign="top" style="padding: 10px"><h1 style="padding: 0; margin: 0; border-bottom: 1px solid #000000;">The SWT FAQ</h1>

<p>If you have questions you believe should go in here, please let us know on
the <a href="http://dev.eclipse.org/mailman/listinfo/platform-swt-dev">SWT developer mailing list</a>.</p>

<ul>
  <li><a href="#whatpackagesinSWT">What packages make up SWT?</a></li>
  <li><a href="#supportJavaBeans">Does SWT support JavaBeans?</a></li>
  <li><a href="#guibuilder">Is there a GUI Builder for SWT?</a></li>
  <li><a href="#whatisasnippet">What is a snippet and why do I care?</a></li>
  <li><a href="#swtsource">Where do I find the SWT source?</a></li>
  <p></p>
  <li><a href="#howbuildjar">How do I build an SWT jar for my platform?</a></li>
  <li><a href="#howbuildplugin">How do I build the SWT Eclipse plug-in for my platform?</a></li>
  <li><a href="#howbuilddll">How do I build the SWT JNI libraries for my platform?</a></li>
  <li><a href="#howaddnatives">How do I add a new native to the SWT JNI libraries for my platform?</a></li>
  <li><a href="#howaddnativescocoa">How do I add a new native to the SWT JNI libraries for Cocoa?</a></li>
  <li><a href="#buildeclipseexe">How do I build the Eclipse executable for my platform?</a></li>
  <li><a href="#gtk64">How do I build the 64-bit version of SWT GTK?</a></li>
  <p></p>
  <li><a href="#gtkstartup">What do I need to run SWT on Linux/GTK?</a></li>
  <li><a href="#carbonapp">On Mac Carbon, how do I run an SWT application from the command line?</a></li>
  <li><a href="#javawebstart">How can I deploy my standalone SWT application with Java Web Start?</a></li>
  <li><a href="#pocketpcstart">What do I need to do to run SWT on the PocketPC?</a></li>
  <li><a href="#pocketpclibrary">Where is the SWT library for the PocketPC?</a></li>
  <p></p>
  <li><a href="#xpthemes">How do I make SWT use the Windows XP themes?</a></li>
  <li><a href="#gtkfontsandcolors">On gtk, how do I change the default fonts and colors of widgets?</a></li>
  <li><a href="#motiffontsandcolors">On motif, how do I change the default fonts and colors of widgets?</a></li>
  <li><a href="#keyboardshortcuts">What are the standard keyboard shortcuts on Windows, Mac OS X, GTK?</a></li>
  <p></p>
  <li><a href="#missingjar">Why do I get the error "java.lang.NoClassDefFoundError: org/eclipse/swt/internal/XXX/OS."?</a></li>
  <li><a href="#missingdll">Why do I get the error "java.lang.UnsatisfiedLinkError: no swt-win32-3232 in java.library.path."?</a></li>
  <li><a href="#konquerorUnzip">Why do I get an error beginning with "...SWTException: Unsupported or unrecognized format" on startup?</a></li>
  <li><a href="#useUnzip">Why do I get the error "error while loading shared libraries: ./libXm.so.2: file too short" on startup?</a></li>
  <li><a href="#missinglibXm">Why do I get the error "java.lang.UnsatisfiedLinkError: libXm.so.2: cannot open shared object file: No such file or directory."?</a></li>
  <li><a href="#usingLesstif">Why do I get the warning "XmParseMappingCreate() is not implemented yet" on Linux/Motif?</a></li>
  <li><a href="#reflectionX">Why do I get an error beginning with "org.eclipse.swt.SWTError: Font not valid" on startup?</a></li>
  <li><a href="#notenoughheap">Why do I get the error "java.lang.OutOfMemoryError: Java heap space" when I try to create a very large Image?</a></li>
  <li><a href="#debugmode">How do I enable debug mode in Eclipse for SWT?</a></li>
  <p></p>
  <li><a href="#swinginswt">Can I use Swing or AWT inside Eclipse?</a></li>
  <li><a href="#subclassing">Why can't I subclass SWT widgets like Button and Table?</a></li>
  <li><a href="#noeventfire">Why are some events like Selection not fired in response to programmatic widget changes?</a></li>
  <li><a href="#printstacktrace">Why don't SWTError and SWTException override all printStackTrace methods?</a></li>
  <li><a href="#printOnX">How do I print using my favorite Unix print program?</a></li>
  <li><a href="#noprintimage">How do I print a snapshot of a widget?</a></li>
  <li><a href="#smallprint">Why does everything I print seem so small?</a></li>
  <li><a href="#printertrim">What does computeTrim mean for a Printer?</a></li>
  <li><a href="#autotest">How can I implement user interaction tests?</a></li>
  <li><a href="#gtkselectiongone">On gtk, why does my widget's selection disappear when it loses focus?</a></li>
  <p></p>
  <li><a href="#whatisbrowser">What is the SWT Browser widget?</a></li>
  <li><a href="#howusemozilla">How do I use Mozilla as the Browser's underlying renderer?</a></li>
  <li><a href="#specifyxulrunner">Can I specify which XULRunner installation gets used?</a></li>
  <li><a href="#howdetectmozilla">How does the Browser detect a native Mozilla browser to use?</a></li>
  <li><a href="#printmozillapath">How can I determine which installed Mozilla browser is being used to render Browser content?</a></li>
  <li><a href="#mozillaplugins">How can my Mozilla-based Browser find my Mozilla plug-ins?</a></li>
  <li><a href="#howusejavaxpcom">How do I use JavaXPCOM with the Browser?</a></li>
  <li><a href="#browserplatforms">Which platforms support the SWT Browser?</a></li>
  <li><a href="#browserlinux">What do I need to run the SWT Browser inside Eclipse on Linux/GTK or Linux/Motif?</a></li>
  <li><a href="#browserlinuxrcp">What do I need to run the SWT Browser in a standalone application on Linux/GTK or Linux/Motif?</a></li>
  <li><a href="#browserlinuxibm">How can I get the SWT Browser to work with the IBM 1.4 VM?</a></li>
  <li><a href="#browserplugins">Why can't I run Java applets in the SWT Browser?</a></li>
  <li><a href="#browserscrollbar">How do I hide the Browser's scrollbars?</a></li>
  <li><a href="#browserproxy">How do I set a proxy for the Browser to use?</a></li>
  <p></p>
  <li><a href="#swtawtosx">Why does the SWT_AWT bridge not work for me on OS X?</a></li>
  <li><a href="#swtawtsolaris">Why does the SWT_AWT bridge not work for me on AIX or Solaris?</a></li>
  <li><a href="#printOnGTK">Why is the Print menu item disabled in Eclipse on GTK (Linux, UNIX)?</a></li>
  <li><a href="#printOnGTKHangs">Why does Eclipse 3.3 freeze when I open an editor on GTK 2.10 (Linux, UNIX)?</a></li>
  <li><a href="#printOnMotif">Why is the Print menu item disabled in Eclipse on Motif?</a></li>
  <li><a href="#uithread">Why do I get the error "org.eclipse.swt.SWTException: Invalid thread access"?</a></li>
  <li><a href="#noautolayout">Why do I have to resize my shell to get my changed widgets to lay out again?</a></li>
  <li><a href="#nographicslibrary">Why do I get "SWTException: Unable to load graphics library" using GC?</a></li>
  <li><a href="#scrollonlinux">Why doesn't mouse scrolling work on Linux/Motif?</a></li>
  <li><a href="#twmfocusfollowsmouse">Why can't I move my mouse into certain controls using TWM on Linux/Motif?</a></li>
  <li><a href="#twmmodaldialogs">Why don't modal dialogs stay on top of other windows on Solaris 10 using CDE and DTWM?</a></li>
  <li><a href="#32eclipsegtk64">Why do I get strange drawing behaviour when running 32 bit Eclipse on a 64 bit GTK platform?</a></li>
  <li><a href="#rtlgtk28">Why doesn't SWT.RIGHT_TO_LEFT work on some GTK versions (less than 2.8)?</a></li>
  <li><a href="#decorationHints">Why doesn't my Shell have the trim decorations that I specified in its constructor?</a></li>
  <li><a href="#noevents">Why doesn't a widget send events when I change it programmatically?</a></li>
  <li><a href="#relayout">Why doesn't my layout update when I create/dispose/move/resize a control?</a></li>
  <li><a href="#scrolledcomposite">How do I programmatically scroll a Composite?</a></li>
  <li><a href="#copypastewithKlipper">Why does Copy/Paste sometimes not work on Linux?</a></li>
</ul>

<p></p>
<hr>
<p></p>

<dl>
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
  There are, however, several mature 'third-party' products listed at
  <a href="http://www.eclipseplugincentral.com/">http://www.eclipseplugincentral.com/</a>.
  Or you can follow the progress on the <a href="http://www.eclipse.org/vep/">Eclipse Visual Editor Project</a>.
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
  <dd>A: SWT's source can be retrieved directly from CVS as described in <a href="http://www.eclipse.org/swt/cvs.php">Using SWT from CVS</a>.  It's also included
      in eclipse as follows:
      <ul>
        <li>eclipse 3.4 and newer: <code>plugins/org.eclipse.swt.<em>&lt;ws&gt;</em>.<em>&lt;os&gt;</em>.<em>&lt;arch&gt;</em>.source_<em>X.X.X.&lt;version&gt;</em>.jar</code></li>
        <li>eclipse 3.3.2 and earlier: directory <code>plugins/org.eclipse.rcp.source.<em>&lt;os&gt;</em>.<em>&lt;ws&gt;</em>.<em>&lt;arch&gt;</em>_<em>X.X.X.&lt;version&gt;</em>/src/</code></li>
      </ul>
  </dd>

  <dt><strong><a name="howbuildjar">Q: How do I build an SWT jar for my platform?</a></strong>
  </dt>
  <dd>A: The SWT jar can be built from the eclipse CVS repository using an Ant task:
    <ol>
      <li>Connect a CVS client (such as eclipse) to <strong>:pserver:anonymous@dev.eclipse.org:/cvsroot/eclipse</strong>.
      <li>Check out the projects <strong>org.eclipse.swt</strong> and <strong>org.eclipse.swt.</strong><em>WS.OS.ARCH</em> where <em>WS.OS.ARCH</em> are the names of the
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
  <dd>A: The SWT eclipse plug-in can be built (excluding the signing of the jar) with the steps below.
    <ol>
      <li>In eclipse's CVS Repositories view create a connection to <strong>:pserver:anonymous@dev.eclipse.org:/cvsroot/eclipse</strong>.
      <li>Check out the projects <strong>org.eclipse.swt</strong> and <strong>org.eclipse.swt.</strong><em>WS.OS.ARCH</em> where <em>WS.OS.ARCH</em> are the names of the
        windowing system, operating system and architecture of interest, respectively.  For example, <strong>org.eclipse.swt.gtk.linux.x86</strong>.
      <li>In the project <strong>org.eclipse.swt.</strong><em>WS.OS.ARCH</em>, locate the file <strong>build.xml</strong>.  This is an Ant script.
      <li>If your swt version is 3.4.x or earlier then open the <strong>build.xml</strong> file and add the target below anywhere within its
        <strong>&lt;project&gt;</strong> tags (if your swt version is 3.5 or newer then this target will already be there).
      <pre>
&lt;target name="jar.plugin" depends="init"&gt;
    &lt;delete dir="${temp.folder}"/&gt;
    &lt;mkdir dir="${temp.folder}"/&gt;
    &lt;antcall target="build.jars"/&gt;
    &lt;antcall target="gather.bin.parts"&gt;
        &lt;param name="destination.temp.folder" value="${temp.folder}/"/&gt;
    &lt;/antcall&gt;
    &lt;jar jarfile="${plugin.destination}/${full.name}.jar" basedir="${temp.folder}/${full.name}" filesonly="true"/&gt;
    &lt;delete dir="${temp.folder}"/&gt;
&lt;/target&gt;
      </pre>
      <li>Right-click the <strong>build.xml</strong> file and select <strong>Run As</strong> &gt; <strong>Ant Build...</strong>.
      <li>Select <strong>jar.plugin</strong> as the Ant target to be run.
      <li>On the <strong>JRE</strong> tab select <strong>Run in the same JRE as the workspace</strong>.
      <li>On the <strong>Classpath</strong> tab add the jars from your JRE's <strong>lib</strong> directory to the "User Entries" classpath item.
      <li>Press the Run button to run the script, which will create file <strong>org.eclipse.swt.</strong><em>WS.OS.ARCH_&lt;version.suffix&gt;</em>
        in the root directory of the <strong>org.eclipse.swt.</strong><em>WS.OS.ARCH</em> project.  When it has finished running you can Refresh
        this project to bring this jar into your eclipse workspace.
    </ol>  
  </dd>
     
  <dt><strong><a name="howbuilddll">Q: How do I build the SWT JNI libraries for my platform?</a></strong>
  </dt>
  <dd>A: SWT uses JNI to interact with the native widgets in the
   operating system.  The SWT JNI libraries must be compiled for the
   windowing system, operating system and hardware architecture of
   interest.  The libraries can be built either from the code in the CVS
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

     <li>In the directory <tt><em>&lt;eclipseRoot&gt;</em>/plugins/org.eclipse.rcp.source.platform_X.X.X</tt>,
         find the source zip in the SWT subdirectory.

     <li>Unzip contained file <tt>src.zip</tt>.

     <li>Edit the file <strong>build.sh</strong> (or <strong>build.bat</strong> on Windows)
         in the current directory. Set the environment variables defined in that file to
         match the location of your JRE, etc. Save the file and close it.

     <li>Run the <tt>build</tt> command (<strong>sh build.sh</strong> for UNIX and Linux
         platforms, <strong>build.bat</strong> for Windows).  This will create the appropriate
         library file(s) in the current directory.  For example, this will create
         <tt>swt-XXXX.dll</tt> files on windows, or <tt>libswt-XXXX.so</tt> files on Linux
         and Solaris.
   </ol>

   <p>This description was originally contributed by Colin R Devilbiss.</p>

    
   <p><strong>Building the SWT JNI libraries from the eclipse CVS repository:</strong><br>
   <strong>NOTE</strong>: These instructions require you to use Eclipse

   <ol>
     <li>Follow <a href="cvs.php">these instructions</a> to checkout SWT from CVS.

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
  </dd>

  <dt><strong><a name="howaddnatives">Q: How do I add a new native to the SWT JNI libraries for my platform?</a></strong>
  </dt>
  <dd>A: For the steps to add new natives to the SWT JNI libraries, see <a href="http://www.eclipse.org/swt/jnigen.php">
  Generating the SWT JNI Code.</a> 
  </dd>
  
  <dt><strong><a name="howaddnativescocoa">Q: How do I add a new native to the SWT JNI libraries for Cocoa?</a></strong>
  </dt>
  <dd>A: For the steps to add new natives to the SWT Cocoa JNI libraries, see <a href="http://www.eclipse.org/swt/macgen.php">
  Generating the SWT PI Code for Cocoa.</a> 
  </dd>
  
  <dt><strong><a name="buildeclipseexe">Q: How do I build the Eclipse executable for my platform?</a></strong>
  </dt>
  <dd>A: Eclipse is launched by a binary executable which puts up a splash screen and launches a Java VM. 
    The executable must be compiled for the windowing system, operating system and hardware architecture of interest.
    The libraries can be built either from the code in the CVS repository or from an eclipse SDK download. 
    
    <p><strong>Building the Eclipse executable from the eclipse SDK download:</strong>
    <ol>
      <li>In order to build the required libraries and run Eclipse, 
        you will require a JDK (Java Development Kit) of version 1.4.2 or later.
        Download an Eclipse distribution from
        <a href="http://www.eclipse.org/downloads/index.php">http://www.eclipse.org/downloads/index.php</a>.</li>

      <li>Unzip the distribution.  This will create a directory called <tt>eclipse</tt>.
        This directory is subsequently referred to as <em>&lt;eclipseRoot&gt;</em>.

      <li>In the directory <tt><em>&lt;eclipseRoot&gt;</em>/plugins/org.eclipse.platform.source_X.X.X/src</tt>,
        find the <tt>launchersrc.zip</tt> file under <tt>org.eclipse.platform_X.X.X</tt>.

      <li>Unzip the file <tt>launchersrc.zip</tt>.  This will create a directory called <tt>library</tt>.

      <li>Change directory into <tt>library/<em>WS</em></tt>, where <em>WS</em> is the name of the windowing system 
        e.g. win32, motif, gtk, photon, or carbon.
        Modify any incorrect <tt>_HOME</tt> variables defined at the top of the appropriate <tt>.mak</tt> file.

      <li>Run the <tt>build</tt> command (<strong>sh build.sh</strong> for UNIX and Linux, <strong>build.bat</strong> for Windows).
        This will create an executable launcher called <tt>eclipse</tt>.
        Move this <tt>eclipse</tt> executable to <em>&lt;eclipseRoot&gt;</em>.

      <li>As of eclipse 3.3 an <tt>eclipse_<em>&lt;version&gt;</em></tt> shared library is also created by the previous step.
       Move this library to the appropriate <tt>org.eclipse.equinox.launcher.<em>&lt;ws&gt;</em>.<em>&lt;os&gt;</em>.<em>&lt;arch&gt;</em></tt>
       fragment.
    </ol>

    <p>This description was originally contributed by Colin R Devilbiss.</p>
  </dd>

  <dt><strong><a name="gtk64">Q: How do I build the 64-bit version of SWT GTK?</a></strong></dt>
  <dd>A: Follow these steps to extract the 64-bit SWT GTK source code from CVS and produce your own build:
  <ol>
    <li>Start Eclipse and retrieve the <code>org.eclipse.swt</code>, <code>org.eclipse.swt.gtk.linux.x86_64</code> and
      <code>org.eclipse.swt.tools</code> projects from dev.eclipse.org (see
      <a href="http://www.eclipse.org/swt/cvs.php">How to use SWT from CVS</a>, use <code>.classpath_gtk</code>
      as the <code>.classpath</code> file in the <code>org.eclipse.swt</code> project).</li>
    <li>Convert SWT's Java and C code from its 32-bit form to 64-bit:</li>
    <ul>
      <li>To convert the Java code in-place, go to the <code>build.xml</code> ant script in the <code>org.eclipse.swt.gtk.linux.x86_64</code>
        project and run its "replace.32.to.64" target.  Once this target has completed you must refresh (F5)
        the <code>org.eclipse.swt</code> project in order to pick up the changes.</li>
      <li>To convert and build the C code, run the "buildNatives" target in the same <code>build.xml</code> file.  Refresh (F5)
        the <code>org.eclipse.swt.gtk.linux.x86_64</code> project when this target has completed, to pick up the new libraries.</li>
    </ul>
    <li>You're done!  The <code>org.eclipse.swt.gtk.linux.x86_64</code> project will now contain the 64-bit native libraries, and if you're
      interested, the 64-bit source code will now be available in the <code>org.eclipse.swt.gtk.linux.x86_64/src</code> folder.  
  </ol>
  </dd>
  
  <dt><strong><a name="gtkstartup">Q: What do I need to run SWT on Linux/GTK?</a></strong></dt>
  <dd>A: SWT requires the following libraries with the specified versions or later:
    <p>For Eclipse 3.0 and newer:</p>
    <ul>
      <li>GTK 2.2.1</li>
      <li>ATK 1.2.0</li>
      <li>glib 2.2.1</li>
      <li>Pango 1.2.1</li>
      <li>Freetype 2.1.3</li>
    </ul>
    <p>For Eclipse 2.1:</p>
    <ul>
      <li>GTK 2.0.6</li>
      <li>ATK 1.0.1</li>
      <li>glib 2.0.4</li>
      <li>Pango 1.0.3</li>
      <li>Freetype 2.1.2</li>
    </ul>
    <p>
    You can determine which version of GTK you are running using <tt>rpm -q gtk2</tt>.
    </p>
  </dd>

  <dt><strong><a name="carbonapp">Q: On Mac Carbon, how do I run an SWT application from the command line?</a></strong></dt>
  <dd>A: If you run a Java application that uses Carbon via JNI, the application is not registered with the OS as 
      a 'normal' UI application.  As a consequence, it has no entry in the dock and it cannot be activated. AWT 
      (or Swing) based applications don't have this problem because they seem to use undocumented SPI to register 
      themselves.

      <p>To work around this problem you'll have to pass the -XstartOnFirstThread option to the
      java executable as follows:</p>
      <pre>
         java -XstartOnFirstThread -cp swt.jar:. ControlExample
      </pre>
	
      <p>If you want to run a bundled application, take a look at this
      <a href="http://www.eclipse.org/swt/macosx/">article</a>.</p>
  </dd>

  <dt><strong><a name="javawebstart">Q: How can I deploy my standalone SWT application with Java Web Start?</a></strong></dt>
  <dd>A: For steps that can be used to package and deploy an SWT application with Java Web Start (JWS) see
    <a href="http://www.eclipse.org/swt/jws/">How to deploy SWT Applications with Java Web Start</a>.  A related article
    that describes the deployment of SWT applications with JWS (but does not outline the process of packaging SWT) can be found at
    <a href="http://www-106.ibm.com/developerworks/opensource/library/os-jws/">http://www-106.ibm.com/developerworks/opensource/library/os-jws/</a>.
    <p>Note: As of eclipse 3.3, SWT applications cannot be deployed via JWS to clients on Mac OS X (see <a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=63306">bug 63306</a>).
  </dd>

  <dt><strong><a name="pocketpcstart">Q: What do I need to do to run SWT on the PocketPC?</a></strong>
  </dt>
  <dd>A: There is an experimental version of SWT for WinCE devices. If you wish to
    give it a try, the following steps may help you with getting started.
    <ol>
      <li>Install a VM on your PocketPC.
        <br>The port is tested using the J9 VM for ARM WinCE PocketPC.
        <ul>
          <li>For information on how to get the J9 VM, see at the WebSphere Studio Device Developer website (which ships J9):
            <br><a href="http://www.embedded.oti.com/wdd">http://www.embedded.oti.com/wdd</a>
          <li>For questions on how to use the J9 VM, see the WebSphere newsgroup:
            <br><a href="news://news.software.ibm.com/ibm.software.websphere.studio.device-developer">ibm.software.websphere.studio.device-developer</a>
        </ul>
      <li>Get the swt.jar and SWT dll for PocketPC. See <a href="#pocketpclibrary">Where is the SWT library for the PocketPC?</a>
      <li>Copy the swt.jar and SWT dll to your device.
      <li>Copy your SWT app to your device.
        <br>For example, compile the following class inside Eclipse and copy the resulting
          class file to your device.
        <pre>
import org.eclipse.swt.*;
import org.eclipse.swt.widgets.*;
import org.eclipse.swt.layout.*;

public class HelloWorld {
public static void main(String[] args) {
    Display display = new Display();
  
    /* 
     * Create a Shell with the default style
     * i.e. full screen, no decoration on PocketPC.
     * Alternative: 'new Shell(display, SWT.CLOSE)'
     * to get the Pocket PC 'Ok' button.
     */
    Shell shell = new Shell(display);
  
    /* 
     * Set a text so that the top level Shell
     * also appears in the Pocket PC task list
     */
    shell.setText("HelloWorld");
  
    /*
     * Set a menu bar to follow UI guidelines
     * on Pocket PC
     */
    Menu mb = new Menu(shell, SWT.BAR);
    shell.setMenuBar(mb);
  
    /* 
     * Add widgets
     */
    FillLayout layout = new FillLayout();
    layout.type = SWT.VERTICAL;
    shell.setLayout(layout);
    Label label = new Label(shell, SWT.CENTER);
    label.setText("Hello World");
    
    shell.open();
    while (!shell.isDisposed()) {
        if (!display.readAndDispatch())
            display.sleep();
    }  
}
}
</pre>

      <li>Run your SWT application.
        <br>One way to start your application is to create a shortcut file.
        <ol>
          <li>On your desktop, create a file 'HelloWorld.lnk'. Insert the following line.
<pre>68#\j9\bin\j9.exe -Djava.home=\j9
     -cp:\java\swt.jar;\java HelloWorld</pre>
            This is assuming that you have installed the J9 VM in the folder \j9, and that
            you have copied the swt.jar and your application HelloWorld.class into the folder \java.
            It also assumes that the SWT dll was copied into the folder \j9\bin where it will be
            found by the VM.
          <li>Save the shortcut file. Copy the file to your device.
          <li>Using the file explorer on your device, click on the shortcut file.
             <br>If everything is correctly setup, the SWT app should come up.
      </ol>
    </ol>
  </dd>

  <dt><strong><a name="pocketpclibrary">Q: Where is the SWT library for the PocketPC?</a></strong></dt>
  <dd>A: There is an experimental version of SWT for WinCE devices. The swt.jar and ARM Pocket PC
    dll are available from the Eclipse download page.
    <p>Choose which swt.jar fits your project requirements. You can also build a custom
    version. A custom version allows you, for example, to exclude image decoders or layouts, to
    further reduce the size.</p>
    <ol>
      <li>win32-ce-arm-ppc.zip
		<ul>
		  <li>J2SE profile</li>
		  <li>Emulated Drag and Drop (no OLE support)</li>
		  <li>Native widgets only (no custom widgets)</li>
		  <li>No class file debug information (for reduced size)</li>
		</ul>
		<br>
    <li>win32-ce-arm-ppc-j2me.zip
	  <ul>
        <li>J2ME profile (CLDC)</li>
        <li>Emulated Drag and Drop (no OLE support)</li>
        <li>Native widgets only (no custom widgets)</li>
        <li>No class file debug information (for reduced size)</li>
      </ul>
      <br>
    <li>Custom SWT library
      <ol>
		<li>From Eclipse, check out the projects org.eclipse.swt and org.eclipse.swt.win32.wce_ppc.arm
		from the head stream. These projects reside in the Eclipse repository
		<li>Build the swt.jar
		<br>Open the file org.eclipse.swt.win32.wce_ppc.arm/build_custom.xml
		<br>The file contains indications on how to build the swt.jar as recommended for WinCE PocketPC.
	  <li>Get the corresponding dll
	  <br>The latest dll is available under org.eclipse.swt.win32.wce_ppc.arm
	  </ol>
	</ol>
  </dd>

  <dt><strong><a name="xpthemes">Q: How do I make SWT use the Windows XP themes?</a></strong></dt>
  <dd> A: In order for an application to use Windows XP themes, there must be a manifest file 
    located in the same place as the executable that launches the application.
    Here is a <a href="javaw.exe.manifest">sample manifest file</a> to download.
    
    <p>The name of the manifest file must match the name of the executable.  
    In the case of eclipse, the executable is <tt>javaw.exe</tt> and the manifest file 
    must have the name <tt>javaw.exe.manifest</tt>.  The manifest file must be in the
    <tt>jre\bin</tt> folder for the VM you use to launch Eclipse.  Note: the 
    <tt>eclipse.exe</tt> executable does not launch Eclipse; <tt>eclipse.exe</tt>
    displays a splash screen and then invokes the Java VM.</p>
    
    <p>Note: As of SWT 3.2, the manifest file is no longer needed.</p>
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

  <dt><strong><a name="motiffontsandcolors">Q: On motif, how do I change the default fonts and colors of widgets?</a></strong></dt>
  <dd>A: Motif uses a file called <tt>.Xdefaults</tt> which is located in your home directory.
    Here is an example of the content of that file which sets the font and colors for Eclipse:
<pre>Eclipse*spacing:0
Eclipse*XmForm.background:#e8e7e3
Eclipse*XmList.background:#e8e7e3
Eclipse*XmTextField.background:#e8e7e3
Eclipse*background:#d6d3ce
Eclipse*fontList:-misc-fixed-medium-r-normal-*-10-100-75-75-c-60-iso8859-1
</pre>
    
    After creating/modifying this file, you must run "xrdb ~/.Xdefaults" or restart X to make the changes take effect.
  </dd>

  <dt><strong><a name="keyboardshortcuts">Q: What are the standard keyboard shortcuts on Windows, Mac OS X, GTK?</a></strong></dt>
  <dd>A: Since SWT uses native controls, standard keyboard shortcuts can be used in SWT applications.
  Here is a useful <a href="http://en.wikipedia.org/wiki/Table_of_keyboard_shortcuts">Table of Keyboard Shortcuts</a>.
  <br>On Mac OS X, the OS screen reader, VoiceOver, can also be used to navigate through controls using the keyboard.
  Here is the <a href="http://www.apple.com/accessibility/voiceover/manual.html">VoiceOver User's Manual</a>.
  <br>Eclipse has additional keyboard shortcuts. For a list, type Ctrl + Shift + L.
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

  <dt><strong><a name="usingLesstif">Q: Why do I get the warning "XmParseMappingCreate() is not implemented yet" on Linux/Motif?</a></strong></dt>
  <dd>A: This warning is shown if you're accessing installed LessTif libraries instead of the
    shipped OpenMotif libraries.  If you see this warning, add the eclipse install directory 
    to your LD_LIBRARY_PATH before launching eclipse. For example, if you are using csh: <br>
    
    <pre>setenv LD_LIBRARY_PATH /opt/eclipse:${LD_LIBRARY_PATH}</pre>
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
	<p>All messages from SWT will be printed to the console window.
  </dd>
  
  <dt><strong><a name="swinginswt">Q: Can I use Swing or AWT inside Eclipse?</a></strong></dt>
  <dd>A: Yes.  As of Eclipse 3.2, Swing and AWT can be embedded in SWT on Windows, Motif, GTK and OS X.
  However it is important to note that a supporting JDK is required on some platforms in order for this
  to work.  Specifically, Motif and GTK require that JDK 1.5 or newer be used, and OS X requires that
  the JDK specified in <a href="#swtawtosx">Why does the SWT_AWT bridge not work for me on OS X?</a> be used.
  Additionally, AIX and Solaris users must ensure that AWT is using XToolkit, as described in
  <a href="#swtawtsolaris">Why does the SWT_AWT bridge not work for me on AIX or Solaris?</a>
  
  <p>See this <a href="http://dev.eclipse.org/viewcvs/index.cgi/%7Echeckout%7E/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet135.java">snippet</a> for an example of how to use the API.
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
  <dd>A: This is a design decision that was made in order to minimize
      notification of potentially unwanted events.  For example, when the
      selection of a control is changed programmatically, SWT does not issue a
      selection event.  If this were not the case then changing the selection
      multiple times would send multiple notifications and run application
      listener code multiple times, thereby leading to a potential performance
      problem.  Clients that wish to notify widget listeners of changes made
      programatically can do so by creating an <code>Event</code> object and
      invoking <code>Widget.notifyListeners(int, Event)</code> on the widget.
      Note that some programmatically-triggered events are sent, typically in
      response to low-level widget operations such as focus, move and resize
      changes.
  </dd>

  <dt><strong><a name="printstacktrace">Q: Why don't SWTError and SWTException override all printStackTrace methods?</a></strong></dt>
  <dd>A: SWTError and SWTException each contain a slot which records the original
    exception (if it is known) that caused the SWTError or SWTException to be thrown.
    The printStackTrace() method in these classes has been overridden to print the
    stacktrace of the original exception as well.

    <p>The problem with the other two API methods (i.e. printStackTrace(PrintStream) and 
    printStackTrace(PrintWriter)) is that the classes mentioned in their arguments 
    (PrintStream and PrintWriter) are not available in the CLDC class library.
    Because we need to maintain compatability with CLDC, we can not override them.
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
    on the same device that I am now trying to draw to?"
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
    will definitely have to give it some thought.
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
        <li><a href="http://www.instantiations.com/windowtester/">Instantiations Window Tester</a> (commercial)</li>
      </ul>
      </p>
  </dd>

  <dt><strong><a name="gtkselectiongone">Q: On GTK, why does my widget's selection disappear when it loses focus?</a></strong></dt>
  <dd>A: This effect may be seen if KDE color settings are being
      utilized.  This can be fixed by unchecking the "Apply KDE colors to
      non-KDE apps" option in the KDE colors control panel.
  </dd>

  <dt><strong><a name="whatisbrowser">Q: What is the SWT Browser widget?</a></strong></dt>
  <dd>A: The SWT Browser widget is used to display HTML documents. It is
      designed to provide a basic and portable API sufficient for essential
      HTML browsing and rendering on the platforms on which it is implemented.
  </dd>

  <dt><strong><a name="howusemozilla">Q: How do I use Mozilla as the Browser's underlying renderer?</a></strong></dt>
  <dd>A: The Browser has been extended as of Eclipse 3.3 to facilitate the use of Mozilla's HTML renderer on all
      supported browser platforms, provided that the following are satisfied:
    <ul>
	  <li>The Browser instance is created with style <code>SWT.MOZILLA</code></li>
	  <li><a href="http://developer.mozilla.org/en/docs/XULRunner">XULRunner</a> is properly
	    <a href="http://developer.mozilla.org/en/docs/XULRunner_1.8.0.1_Release_Notes#Installing_XULRunner">installed</a></li>
	  <li>The installed XULRunner version is 1.8.1.2 or newer if any of the following are true:
	    (<a href="http://releases.mozilla.org/pub/mozilla.org/xulrunner/releases/1.8.1.3/contrib/">download XULRunner 1.8.1.3</a>)
	    <ul>
	      <li>Running on OS X</li>
	      <li><code>Browser.getWebBrowser()</code> is used</li>
	      <li>JavaXPCOM is referenced</li>
	    </ul>
	    If none of these cases apply then any XULRunner version can be used.
	  </li>
	  <li><b>OSX only:</b> The JRE must be "Java for Mac OS X 10.4, Release 5" or newer</li>
    </ul>
  </dd>

  <dt><strong><a name="specifyxulrunner">Q: Can I specify which XULRunner installation gets used?</a></strong></dt>
  <dd>A: Typically a Mozilla-based Browser uses XULRunner's lookup mechanism to find a registered XULRunner at runtime.
    If you wish to override this mechanism you can set the value of java system property
    <code>org.eclipse.swt.browser.XULRunnerPath</code> to point at the target XULRunner's path.  This property must be set
    before the <em>first</em> Browser instance is created.
  </dd>

  <dt><strong><a name="howdetectmozilla">Q: How does the Browser detect a native Mozilla browser to use?</a></strong></dt>
  <dd>A: The first Mozilla-based Browser instance performs the steps below, in order, until a native browser is found.  All subsequent Mozilla-based Browser instances will use this same detected browser.
    <ol>
      <li>If Java property <code>org.eclipse.swt.browser.XULRunnerPath</code> is defined then use it (see <a href="#specifyxulrunner">Can I specify which XULRunner installation is used?</a>).
      <li>Attempt to detect an OS-registered XULRunner with version 1.8.1.2 or newer (in order to enable JavaXPCOM use).
      <li>Attempt to detect an OS-registered XULRunner with a version earlier than 1.8.1.2.
      <li><em>(if running on Linux and the Browser's style is <code>SWT.NONE</code>)</em> Attempt to use the native browser pointed at by OS environment variable <code>MOZILLA_FIVE_HOME</code>, which may be any of
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
    <a href="http://www.eclipse.org/swt/faq.php#howusemozilla">How do I use Mozilla as the Browser's underlying renderer?</a>.
    Once these are in place then you can reference JavaXPCOM as follows:
    <p><ul>
      <li>If your application runs as an Eclipse plug-in:
      <ul>
        <li>download the org.mozilla.xpcom Eclipse plug-in
          (<a href="http://releases.mozilla.org/pub/mozilla.org/xulrunner/releases/1.8.1.3/contrib/eclipse/plugins/org.mozilla.xpcom_1.8.1.3-20080312.jar">download XULRunner 1.8.1.3 Eclipse plug-in</a>)</li>
        <li>import it into your Eclipse workspace</li>
        <li>add it to your plug-in's list of Required Plug-ins (specified in your plug-in's META-INF/MANIFEST.MF file)</li>
      </ul>
      <li>If your application runs as a stand-alone application:
      <ul>
        <li>download the XULRunner SDK for your platform (<a href="http://releases.mozilla.org/pub/mozilla.org/xulrunner/releases/1.8.1.3/contrib/sdk/">download XULRunner 1.8.1.3 SDK</a>)</li>
        <li>add its lib/MozillaInterfaces.jar file to your application's java build path</li>
      </ul>
    </ul>
    <p>You can use <code>Browser.getWebBrowser()</code> to access the JavaXPCOM <code>nsIWebBrowser</code> that represents the Browser instance.  For an example of using JavaXPCOM see
      <a href="http://dev.eclipse.org/viewcvs/index.cgi/%7Echeckout%7E/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet267.java">Snippet 267</a>.
  </dd>

  <dt><strong><a name="browserplatforms">Q: Which platforms support the SWT Browser?</a></strong></dt>
  <dd>A: The SWT Browser is currently available on the following platforms:
  <br>
  <ol>
    <li>Windows (Internet Explorer 5 and above)</li>
    <li>Mac (Panther OS X 10.3 and above. Safari-based)</li>
    <li>Linux GTK and Linux Motif (XULRunner-1.8.0.1 and above, Firefox 1.0 and above, Mozilla 1.4 GTK2 and above)
    <br>The following Linux distributions meet the Mozilla/Firefox requirements for using the Browser widget:
    <ul>
    	<li>RedHat Enterprise Linux 3</li>
    	<li>SuSE 9</li>
    </ul>
    Older Linux distributions may require a supported version of Mozilla to be installed. (<a href="#browserlinux">instructions</a>)
    <li>Photon</li>
  </ol>
  </dd>
  
  <dt><strong><a name="browserlinux">Q: What do I need to run the SWT Browser inside Eclipse on Linux/GTK or Linux/Motif?</a></strong></dt>
  <dd>A: You need one of the following:
    <ul>
      <li>Mozilla 1.4 GTK2 - 1.6 GTK2 can be used with Eclipse 3.0 and newer.</li>
      <li>Mozilla 1.4 GTK2 - 1.7.8 GTK2 can be used with Eclipse 3.1 and newer.</li>
      <li>Mozilla 1.4 GTK2 - 1.7.12 GTK2 can be used with Eclipse 3.2 and newer.</li>
      <li>Firefox can be used with Eclipse 3.1 and newer (Linux only), provided that it has been compiled with linkable Gecko libraries.  It is 
      important to note that Firefox downloads from mozilla.org currently do <em>not</em> satisfy this criteria, but Firefox installations
      that are included in major Linux distributions often do in the absence of a XULRunner installation.  Attempting to use a statically-linked
      Firefox install will display the error message "No more handles [NS_InitEmbedding...error -2147221164]".</li>
      <li>XULRunner 1.8.x can be used with Eclipse 3.3 and newer</li>
      <li>XULRunner 1.9.x can be used with Eclipse 3.4 and newer</li>
    </ul>

    <br>The version of Mozilla or Firefox installed on your system varies with your Linux distribution.
    <br>The following Linux distributions meet the Mozilla requirements for using the Browser widget.
    <ul>
    	<li>RedHat Enterprise Linux 3</li>
    	<li>Suse 9</li>
    </ul>
    <br>The following Linux distributions meet the Firefox requirements for using the Browser widget.
    <ul>
    	<li>RedHat Enterprise Linux 4
  		<br>Note that you may need to set the environment variable MOZILLA_FIVE_HOME to the folder containing your Firefox install. e.g.
  			<code>setenv MOZILLA_FIVE_HOME /usr/lib/firefox-1.0.4</code></li>
    </ul>
    <br>If you use the IBM 1.4 VM <a href="#browserlinuxibm">check this.</a>
    <br>
	<br>If you are running with eclipse 3.2.1 or newer then you can just run eclipse and it will attempt to detect a browser on your system to use.
		If it fails to find one then you will need to download and install a GRE such as Mozilla, as outlined below:
  <ol>
  	<li>If you are using Eclipse 3.0, download the Mozilla 1.6 Xft and GTK2 build from <a href="http://www.mozilla.org/releases/#1.6">Mozilla.org</a>. If you are using Eclipse 3.1 or newer, you can choose to use a more recent
  	Mozilla 1.7.x GTK2 from <a href="http://www.mozilla.org/releases/">Mozilla.org</a>.</li>
  	<li>Uninstall any prior Mozilla version.</li>
  	<li>Extract and install the Mozilla download.</li>
  	<li>Run Mozilla once. Verify that the application runs correctly and check the version number in the Mozilla About dialog.</li>
  </ol>
  <br>
  If you are using an eclipse prior to version 3.2.1, or if you want the Browser to use a GRE (such as Mozilla) that you have installed yourself, then you must set the MOZILLA_FIVE_HOME environment variable to the folder
  containing your GRE (e.g. <code>setenv MOZILLA_FIVE_HOME /usr/lib/mozilla</code>), and prepend this directory to your LD_LIBRARY_PATH environment variable</li>.
  </dd>

  <dt><strong><a name="browserlinuxrcp">Q: What do I need to run the SWT Browser in a standalone application on Linux GTK or Linux Motif?</a></strong></dt>
  <dd>A: Follow the steps below to use the SWT Browser widget in your standalone SWT application.
    <ol>
    	<li>A supported version of XULRunner, Firefox or Mozilla must be installed. (<a href="#browserlinux">instructions</a>)</li>
    	<li>Set the environment variable MOZILLA_FIVE_HOME to your XULRunner/Firefox/Mozilla installation folder. e.g. <code>setenv MOZILLA_FIVE_HOME /usr/lib/mozilla</code></li>
    	<li>Set the environmnent variable LD_LIBRARY_PATH to include MOZILLA_FIVE_HOME. e.g. <code>setenv LD_LIBRARY_PATH ${MOZILLA_FIVE_HOME}:${LD_LIBRARY_PATH}</code></li>
    	<li>Your standalone SWT application can now use the Browser widget.
    </ol>
    <br>If you use the IBM 1.4 VM <a href="#browserlinuxibm">check this.</a>
    <br>
  </dd>

  <dt><strong><a name="browserlinuxibm">Q: How can I get the SWT Browser to work with the IBM 1.4 VM?</a></strong></dt>
  <dd>A: The IBM 1.4 VM accidentally removes certain entries of the environment variable LD_LIBRARY_PATH. This occurs in particular
  for entries starting with /usr/lib. It will leave untouched entries such as /usr/../usr/lib.
  
  <br>Instructions for Red Hat Enterprise Linux 3 users:
    <ol>
    	<li>Mozilla is installed in <code>/usr/lib/mozilla-1.x</code> on this platform. Set the environment variable MOZILLA_FIVE_HOME to <code>/usr/../usr/lib/mozilla-1.x</code></li>
    	<li>Start Eclipse. If you are not using Eclipse, add MOZILLA_FIVE_HOME to LD_LIBRARY_PATH before starting your standalone SWT application.</li>
		<li>The Browser widget should now work with the IBM VM.</li>
    </ol>
  </dd>

  <dt><strong><a name="browserplugins">Q: Why can't I run Java applets in the SWT Browser?</a></strong></dt>
  <dd>A: Applets usually don't show up in the SWT Browser. On Windows (Internet Explorer) and OSX (Safari), the Java
  plugin fails to run a second Java virtual machine to execute the applet because two Java virtual machines cannot run
  in the same process. On Linux (Mozilla), the Java plug-in has been reported to work because it executes in its own process.
  <a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=59506">See bug 59506</a> .
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
  <dd>A: This is dependent on the platform and native renderer being used:
  	<ul>
  	  <li>On Windows all instances of Internet Explorer use a shared set of global proxy settings.  Since on Windows the
  	  	SWT Browser embeds the IE renderer by default (ie.- if the Browser is created with style <code>SWT.NONE</code>),
  	  	the Browser automatically inheirits these proxy settings.  These settings can be changed at any time in the Internet
  	  	Options of a running IE instance and the Browser will automatically use the new values.</li>
  	  <li>Similarly, on OSX all instances of Safari use a shared set of global proxy settings.  Since on OSX the
  	  	SWT Browser embeds the Safari renderer by default (ie.- if the Browser is created with style <code>SWT.NONE</code>),
  	  	the Browser automatically inheirits these proxy settings.  These settings can be changed at any time in the OSX
  	  	System Preferences and the Browser will automatically use the new values.</li>
  	  <li>Mozilla-based Browser instances (ie.- those that are either running on Linux or are created with style
  	    <code>SWT.MOZILLA</code>) do not access any global proxy settings, so proxy information must be explicitly specified
  	    for them.  There are two ways to do this:
  	    <ul>
  	      <li>As of Eclipse 3.4, a user can do this by setting values for java properties <code>network.proxy_host</code> and
  	        <code>network.proxy_port</code>.  These properties are checked the first time a Mozilla-based Browser is created, and
  	        if set, will be used for all non-local HTTP, HTTPS and FTP requests in all Mozilla-based Browser instances.  A user
  	        wishing to set these values should do so by passing <code>-D...</code> VM arguments to the JRE at startup.</li>
  	      <li>As of Eclipse 3.3, an application can do this at any time by using JavaXPCOM to update the values in the shared
  	        preferences.  An example of this is shown in <a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=82295#c18">bug 82295 comment 18</a>.
  	        For more general information about using JavaXPCOM with a Browser see
  	        <a href="#howusejavaxpcom">How do I use JavaXPCOM with the Browser?</a></li>.
  	    </ul> 
    </ul>
  </dd>

  <dt><strong><a name="swtawtosx">Q: Why does the SWT_AWT bridge not work for me on OS X?</a></strong></dt>
  <dd>A: This was an SWT-AWT incompatibility that existed prior to eclipse 3.2.
      This problem has since been fixed in SWT, but requires that an OS X jre with
      support for this fix be used as well.  Specifically, the jre must be version 1.5.0
      Release 4 (or greater), and the additional "SWT Compatibility Libraries" must
      be installed.  These libraries can be downloaded from the Downloads section
      of <a href="http://connect.apple.com">Apple Developer Connection</a>.  It's
      free to create an account at Apple Developer Connection to access the download,
      which is approximately 180K.  For more information about this issue see
      <a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=67384">bug 67384</a>.
  </dd>

  <dt><strong><a name="swtawtsolaris">Q: Why does the SWT_AWT bridge not work for me on AIX or Solaris?</a></strong></dt>
  <dd>A: The SWT_AWT bridge requires that AWT be using XToolkit, since this implements the XEmbed
      protocol.  However by default AWT on AIX and Solaris use MToolkit.  This can be easily changed as
      described in <a href="http://java.sun.com/j2se/1.5.0/docs/guide/awt/1.5/xawt.html">XToolkit on Solaris/Linux</a>.
  </dd>

  <dt><strong><a name="printOnGTK">Q: Why is the Print menu item disabled in Eclipse on GTK (Linux, UNIX)?</a></strong></dt>
  <dd>A: GTK+ began supporting printing in version 2.10. To print in Eclipse, you need to have Eclipse version 3.3 or later,
  and at least GTK+ 2.10.0. To determine what GTK+ version you are running, type: <tt>rpm -q gtk2</tt>.
  <p>Prior to Eclipse 3.3, printing was not implemented on GTK; however you can use the External Tools support in Eclipse
  to print files using lpr or some other printing utility. See <a href="#printOnX">here</a> for the steps to set this up.
  </dd>
  
  <dt><strong><a name="printOnGTKHangs">Q: Why does Eclipse 3.3 freeze when I open an editor on GTK 2.10 and GTK 2.12 (Linux, UNIX)?</a></strong></dt>
  <dd>A: There is a bug in some versions of GTK that causes certain print backends to hang.
  <p>If you do not want to upgrade your GTK to a fixed version, you can make use of the org.eclipse.swt.internal.gtk.disablePrinting
   flag available in Eclipse 3.3.1 maintenance builds as well as 3.4 M1 and later. To use this, you must pass the flag to eclipse on startup: 
   <br>./eclipse -vmargs -Dorg.eclipse.swt.internal.gtk.disablePrinting
  </dd>
  
  <dt><strong><a name="printOnMotif">Q: Why is the Print menu item disabled in Eclipse on Motif?</a></strong></dt>
  <dd>A: Printing on Motif requires that Xprint be installed on your machine.  A good FAQ regarding Xprint can be found at
      <a href="http://xprint.mozdev.org/docs/Xprint_FAQ.html">http://xprint.mozdev.org/docs/Xprint_FAQ.html</a>.
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
  
  <dt><strong><a name="scrollonlinux"> Q: Why doesn't mouse scrolling work on Linux/Motif?</a></strong></dt>
  <dd>A: Mouse scrolling on Linux/Motif relies on the IMWheel driver.  Here is how it works:
    <ol>
      <li>The X Server gets the wheel event.</li>
      <li>Your /etc/X11/XF86Config must contain "ZAxisMap 4 5" (or the equivalent "Option" 
        line if you use XFree86 4.x) in the Mouse section.  This maps the wheel to emulated
        mouse buttons "4" and "5".</li>
      <li>IMWheel has a global hook on the mouse, only looking for button4/5 events.
        When it sees one, it looks in /etc/X11/imwheel which is a table of what to do for
        which application.  E.g., GTK-based applications support the idea of 5-button mice
        natively, so the imwheel file says "do nothing (pass through) for gtk".
        On the other hand, no known Motif-based app seems to know about these, so imwheel
        eats the mouse event and emits an accelerator event for "PgUp" or whatever your
        preference is.  It has some clever pre-sets for xterm, netscape, and so on.</li>
    </ol>
  </dd>
  
  <dt><strong><a name="twmfocusfollowsmouse"> Q: Why can't I move my mouse into certain controls using TWM on Linux/Motif?</a></strong></dt>
  <dd>A: TWM by default is configured with focus-follows-mouse. It has been noticed that in this mode
  it is not possible to enter any secondary window brought up by a widget (such as a ToolTip or a drop down
  box on a Combo).
  <br>The two possible workarounds are:
    <ol>
      <li>Add NoTitleFocus to your $HOME/.twmrc file. By doing this you are instructing TWM not 
      to set keyboard focus to each window as it is entered. <a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=188135#c11">Bug 188135</a> 
      has an example .twmrc file attachment.</li>
      <li>Switch to another window manager.</li>
    </ol>
  </dd>
  
  <dt><strong><a name="twmmodaldialogs"> Q: Why don't modal dialogs stay on top of other windows on Solaris 10 using CDE and DTWM?</a></strong></dt>
  <dd>A: The default setting of CDE is to allow modal dialogs to be hidden by other windows. To change this, you must:
  <ol>
   <li>Add the following line to your $HOME/.Xdefaults file: <tt>Dtwm*secondariesOnTop: True</tt></li>
   <li>Make sure that the "Allow primary windows on top" option is disabled in CDE. Under Style Manager>Windows, uncheck "Allow Primary windows on top" and click "Apply".</li>
   <li>Reload the .Xdefaults - <tt>xrdb $HOME/.Xdefaults</tt> - and restart the window manager. <tt>killall dtwm</tt> followed by <tt>/usr/dt/bin/dtwm &</tt></li>
  </ol>
  </dd>
  
  <dt><strong><a name="32eclipsegtk64"> Q:  Why do I get strange drawing behaviour when running 32 bit Eclipse on a 64 bit GTK platform?</a></strong></dt>
  <dd>A: A 64 bit Linux OS comes configured by default with 64 bit libraries. If you wish to run the 32 bit version of Eclipse, you must ensure that you have
  a 32 bit JRE as well as the 32 bit version of the GTK libraries. Red Hat bundles the 32 bit libraries in their installer under the "Compatibility Arch Support" package.
  </dd>

  <dt><strong><a name="rtlgtk28"> Q:  Why doesn't SWT.RIGHT_TO_LEFT work on some GTK versions (less than 2.8)?</a></strong></dt>
  <dd>A: SWT relies on the Cairo graphics library to render strings and GTK started using Cairo in version 2.8. 
  </dd>

  <dt><strong><a name="decorationHints"> Q:  Why doesn't my Shell have the trim decorations that I specified in its constructor?</a></strong></dt>
  <dd>A: The native window system is responsible for creating the decorations for all windows, and has the right to not fully honor the set of requested decorations.
    For this reason, styles that are passed to a Shell's constructor are considered to be hints.  For example, on some window managers, creating
    a shell with SWT.RESIZE, will also create a minimize and maximize button.  This is a constraint that all native applications are subject to.
  </dd>

  <dt><strong><a name="noevents"> Q:  Why doesn't a widget send events when I change it programmatically?</a></strong></dt>
  <dd>A: This is a design decision that is applied throughout SWT.  Events are usually not sent in response to programmatic changes (as opposed to user actions)
    in order to reduce redundant events that listeners must handle.  As a result, patterns like the following are <em>not</em> needed:
    <pre>
    ignoreNextSelectionEvent = true;
    myTable.select(2);
    ignoreNextSelectionEvent = false;
    </pre>
    Since a programmatic change implies that the application is already aware of the change being made, it can trigger the appropriate action directly.  If firing
    an event is still desired (for instance, to preserve object de-coupling) then the application can create the event and send it to the widget's listeners
    with <code>Widget.notifyListeners(int,Event)</code>. 
  </dd>
  
  <dt><strong><a name="relayout"> Q:  Why doesn't my layout update when I create/dispose/move/resize a control?</a></strong></dt>
  <dd>A: A layout is only performed automatically on a Composite's children when the Composite
      is resized, including when it is initially shown.  To make a Composite lay out its
      children under any other circumstances, such as when children are created or disposed,
      its <em>layout()</em> method must be called.  For an example of this see SWT snippet
      <a href="http://dev.eclipse.org/viewcvs/index.cgi/%7Echeckout%7E/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet98.java">create and dispose children of a composite</a>.
  </dd>
  
  <dt><strong><a name="scrolledcomposite"> Q:  How do I programmatically scroll a Composite?</a></strong></dt>
  <dd>A: This is done by using a ScrolledComposite instead of a Composite, and invoking
      <code>ScrolledComposite.setOrigin(...)</code> to scroll it.  For an example of this see SWT snippet
      <a href="http://dev.eclipse.org/viewcvs/index.cgi/%7Echeckout%7E/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet296.java">use a ScrolledComposite to scroll a Tree vertically</a>. 
  </dd>

  <dt><strong><a name="copypastewithKlipper"> Q:  Why does Copy/Paste sometimes not work on Linux?</a></strong></dt>
  <dd>A: There's a known Copy/Paste problem for people who run Klipper Clipboard applet which 
  		cause Eclipse clipboard operations to fail. For more information about this issue see 
  		<a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=153809">Bug 153809</a> 
  		<a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=226540">Bug 226540</a> 
  </dd>
</dl>
</table>
</body>
</html>