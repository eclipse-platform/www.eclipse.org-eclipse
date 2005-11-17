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
  <li><a href="#howbuildjar">How do I build an SWT jar for my platform?</a></li>
  <li><a href="#howbuilddll">How do I build the SWT JNI libraries for my platform?</a></li>
  <li><a href="#buildeclipseexe">How do I build the Eclipse executable for my platform?</a></li>
  <li><a href="#guibuilder">Is there a GUI Builder for SWT?</a></li>
  <li><a href="#missingjar">Why do I get the error "java.lang.NoClassDefFoundError: org/eclipse/swt/internal/XXX/OS."?</a></li>
  <li><a href="#missingdll">Why do I get the error "java.lang.UnsatisfiedLinkError: no swt-win32-2034 in java.library.path."?</a></li>
  <li><a href="#missinglibXm">Why do I get the error "java.lang.UnsatisfiedLinkError: libXm.so.2: cannot open shared object file: No such file or directory."?</a></li>
  <li><a href="#uithread">Why do I get the error "org.eclipse.swt.SWTException: Invalid thread access"?</a></li>
  <li><a href="#pocketpcstart">What do I need to do to run SWT on the PocketPC?</a></li>
  <li><a href="#pocketpclibrary">Where is the SWT library for the PocketPC?</a></li>
  <li><a href="#gtkstartup">What do I need to run SWT on Linux/GTK?</a></li>
  <li><a href="#motiffontsandcolors">On motif, how do I change the default fonts and colors of widgets?</a></li>
  <li><a href="#gtkfontsandcolors">On gtk, how do I change the default fonts and colors of widgets?</a></li>
  <li><a href="#gtkselectiongone">On gtk, why does my widget's selection disappear when it loses focus?</a></li>
  <li><a href="#carbonapp">On carbon, how do I run an SWT application from the command line?</a></li>
  <li><a href="#xpthemes">How do I make SWT use the Windows XP theme?</a></li>
  <li><a href="#swinginswt">Can I use Swing or AWT inside Eclipse?</a></li>
  <li><a href="#smallprint">Why does everything I print seem so small?</a></li>
  <li><a href="#supportJavaBeans">Does SWT support JavaBeans?</a></li>
  <li><a href="#scrollonlinux">Why doesn't mouse scrolling work on Linux/Motif?</a></li>
  <li><a href="#printstacktrace">Why don't SWTError and SWTException override all printStackTrace methods?</a></li>
  <li><a href="#noprintimage">How do I print a snapshot of a widget?</a></li>
  <li><a href="#printOnMotif">Why is the Print menu item disabled in Eclipse on Motif?</a></li>
  <li><a href="#printOnGTK">Why is the Print menu item disabled in Eclipse on GTK?</a></li>
  <li><a href="#printOnX">How do I print using my favorite Unix print program?</a></li>
  <li><a href="#usingLesstif">Why do I get the warning "XmParseMappingCreate() is not implemented yet" on Linux/Motif?</a></li>
  <li><a href="#konquerorUnzip">Why do I get an error beginning with "...SWTException: Unsupported or unrecognized format" on startup?</a></li>
  <li><a href="#useUnzip">Why do I get the error "error while loading shared libraries: ./libXm.so.2: file too short" on startup?</a></li>
  <li><a href="#subclassing">Why can't I subclass SWT widgets like Button and Table?</a></li>
  <li><a href="#javawebstart">How can I package my standalone SWT app for Java Web Start?</a></li>
  <li><a href="#whatisasnippet">What is a snippet and why do I care?</a></li>
  <li><a href="#whatisbrowser">What is the SWT Browser widget?</a></li>
  <li><a href="#browserlinux">What do I need to run the SWT Browser inside Eclipse on Linux/GTK or Linux/Motif?</a></li>
  <li><a href="#browserlinuxrcp">What do I need to run the SWT Browser in a standalone application on Linux/GTK or Linux/Motif?</a></li>
  <li><a href="#browserlinuxibm">How can I get the SWT Browser to work with the IBM 1.4 VM?</a></li>
  <li><a href="#browserplatforms">Which platforms are supported by the SWT Browser?</a></li>
  <li><a href="#browserplugins">Why can't I run Java applets in the SWT Browser?</a></li>
  <li><a href="#gtk64">How do I build the 64 bit version of SWT GTK?</a></li>
  <li><a href="#autotest">How can I implement user interaction test cases?</a></li>
  <li><a href="#noeventfire">Why are some events not fired in response to programmatic widget changes?</a></li>
  <li><a href="launcher.html">What are the arguments for the Eclipse Launcher?</a></li>
  <li><a href="#nographicslibrary">Why do I get "SWTException: Unable to load graphics library" using GC?</a></li>
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
 
  <dt><strong><a name="howbuildjar">Q: How do I build an SWT jar for my platform?</a></strong>
  </dt>
  <dd>A: The SWT jar can be built from the eclipse CVS repository using an Ant task:
    <ol>
      <li>Connect a CVS client (such as eclipse) to <strong>:pserver:anonymous@dev.eclipse.org:/home/eclipse</strong>.
      <li>Checkout the projects <strong>org.eclipse.swt</strong> and <strong>org.eclipse.swt.</strong><em>WS</em> where <em>WS</em> is the name of the 
        windowing system of interest.  For example <strong>org.eclipse.swt.gtk</strong>.
      <li>In the project <strong>org.eclipse.swt.</strong><em>WS</em>, locate the file <strong>build.xml</strong>.  This is an Ant script.
      <li>Run Ant on the target <strong>build.jars</strong>.  If you are using eclipse as your development environment, you can run 
        Ant by selecting the file in the <strong>Navigator</strong> or <strong>Packages</strong> view, then selecting <strong>Run Ant...</strong> from the context
        menu.
      <li>This will create a file called <strong>swt.jar</strong> and put it in the folder 
        <strong>org.eclipse.swt.</strong><em>WS</em><strong>/ws/</strong><em>WS</em>.
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
         library file(s) in the current directory.  For example, this will create a
         <tt>swt_XXXX.dll</tt> file on windows, or a <tt>libswt_XXXX.so</tt> file on Linux
         and Solaris.  On some platforms multiple libraries will be created.
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
         library file(s) in the current directory.  For example, this will create a
         <tt>swt_XXXX.dll</tt> file on windows, or a <tt>libswt_XXXX.so</tt> file on Linux
         and Solaris.  On some platforms, more than one library will be created.
  </ol>
  </dd>

  <dt><strong><a name="buildeclipseexe">Q: How do I build the Eclipse executable for my platform?</a></strong>
  </dt>
  <dd>A: Eclipse is launched by a binary executable which puts up a splash screen and launches a Java VM. 
    The executable must be compiled for the windowing system, operating system and hardware architecture of interest.
    The libraries can be built either from the code in the CVS repository or from an eclipse SDK download. 
    
    <p><strong>Building the Eclipse executable from the eclipse SDK download:</strong>
    <ol>
      <li>In order to build the required libraries and run Eclipse, 
        you will require a JDK (Java Development Kit) of version 1.4.1 or later.
        Download an Eclipse distribution from
        <a href="http://www.eclipse.org/downloads/index.php">http://www.eclipse.org/downloads/index.php</a>.</li>

      <li>Unzip the distribution.  This will create a directory called <tt>eclipse</tt>.
        This directory is subsequently referred to as <em>&lt;eclipseRoot&gt;</em>.

      <li>In the directory <tt><em>&lt;eclipseRoot&gt;</em>/plugins/org.eclipse.platform.source_X.X.X</tt>,
        find the <tt>launchersrc.zip</tt> file under <tt>org.eclipse.platform_X.X.X</tt>.

      <li>Unzip the file <tt>launchersrc.zip</tt>.  This will create a directory called <tt>library</tt>.

      <li>Change directory into <tt>library/<em>WS</em></tt>, where <em>WS</em> is the name of the windowing system 
        e.g. win32, motif, gtk, photon, or carbon.
        Modify any incorrect <tt>_HOME</tt> variables defined at the top of the appropriate <tt>.mak</tt> file.

      <li>Run the <tt>build</tt> command (<strong>sh build.sh</strong> for UNIX and Linux, <strong>build.bat</strong> for Windows).
        This will create an executable launcher called <tt>eclipse</tt>.
        Move this <tt>eclipse</tt> executable to <em>&lt;eclipseRoot&gt;</em>.
    </ol>

    <p>This description was originally contributed by Colin R Devilbiss.</p>
  </dd>

  <dt><strong><a name="guibuilder">Q: Is there a GUI Builder for SWT?</a></strong></dt>
  <dd>A: SWT itself does not provide a GUI Builder (also known as "GUI Designer", "GUI Editor",
  "Visual Builder", "Visual Designer", "Visual Editor", or "Visual Composition Editor").
  There are, however, several mature 'third-party' products listed at
  <a href="http://www.eclipseplugincentral.com/">http://www.eclipseplugincentral.com/</a>.
  Or you can follow the progress on the <a href="http://www.eclipse.org/vep/">Eclipse Visual Editor Project</a>.
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
  

  <dt><strong><a name="missingdll">Q: Why do I get the error "java.lang.UnsatisfiedLinkError: no swt-win32-2034 in java.library.path."?</a></strong></dt>
  <dd>A: You need to place the SWT JNI libraries that allow Java to use 
    the native widgets in a place where the Java Virtual Machine 
    will find them.
    
    <p>The SWT JNI libraries are included in the eclipse download.  The location of
    the libraries depends on the operating system and windowing system of interest.
    
    <ul>
      <li>Windows:
        <ul>
          <li>Eclipse 3.0 - <em>&lt;eclipseRoot&gt;</em>\plugins\org.eclipse.swt.win32_3.0.0\os\win32\x86
          <li>Eclipse 2.1 - <em>&lt;eclipseRoot&gt;</em>\plugins\org.eclipse.swt.win32_2.1.0\os\win32\x86
        </ul>
      <li>Linux:
        <ul>
          <li>Eclipse 3.0 - <em>&lt;eclipseRoot&gt;</em>/plugins/org.eclipse.swt.WS_3.0.0/os/linux/x86
          <li>Eclipse 2.1 - <em>&lt;eclipseRoot&gt;</em>/plugins/org.eclipse.swt.WS_2.1.0/os/linux/x86
        </ul>
    </ul>
      
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
    <br>in Win 9X this is done by editing the Autoexec.bat file,
    <br>on NT or 2K the variable is edited through <strong>My Computer</strong> &gt; <strong>Properties</strong> &gt; <strong>Advanced</strong> &gt; <strong>Environment Variables</strong>.
	<p>On linux/unix, modify the LD_LIBRARY_PATH environment variable to include the runtime-library-path.
	<p></p>
	
	<li>Copy the SWT library to a directory that is already on the Java library path.  For example, the jre/bin directory.
    <p>The disadvantage of this solution is that every time you upgrade eclipse you have to remember to copy the native code library.
   </ol>
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

  <dt><strong><a name="pocketpcstart">Q: What do I need to do to run SWT on the PocketPC?</a></strong>
  </dt>
  <dd>A: There is an experimental version of SWT for WinCE devices. If you feel like
    giving it a try, the following steps might help you getting started.
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
     * Set a menubar to follow UI guidelines
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
		(from the head stream). These projects reside in the Eclipse repository
		<li>Build the swt.jar
		<br>Open the file org.eclipse.swt.win32.wce_ppc.arm/build_custom.xml
		<br>The file contains indications on how to build the swt.jar as recommended for WinCE PocketPC.
	  <li>Get the corresponding dll
	  <br>The latest dll is available under org.eclipse.swt.win32.wce_ppc.arm
	  </ol>
	</ol>
  </dd>
  
  <dt><strong><a name="gtkstartup">Q: What do I need to run SWT on Linux/GTK?</a></strong></dt>
  <dd>A: SWT requires the following libraries with the specified versions or later:
    <p>For Eclipse 3.0:</p>
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

  <dt><strong><a name="gtkselectiongone">Q: On GTK, why does my widget's selection disappear when it loses focus?</a></strong></dt>
  <dd>A: This effect may be seen if KDE color settings are being
      utilized.  This can be fixed by unchecking the "Apply KDE colors to
      non-KDE apps" option in the KDE colors control panel.
  </dd>

  <dt><strong><a name="carbonapp">Q: On carbon, how do I run an SWT application from the command line?</a></strong></dt>
  <dd>A: If you run a Java application that uses Carbon via JNI, the application is not registered with the OS as 
      a 'normal' UI application.  As a consequence, it has no entry in the dock and it cannot be activated. AWT 
      (or Swing) based applications don't have this problem because they seem to use undocumented SPI to register 
      themselves.

      <p>To work around this problem you'll have to use the executable 'java_swt' that is part of the 
      Eclipse distribution (you can find it inside the Eclipse application Eclipse.app/Contents/MacOS/java_swt). 
      Basically it is a replacement for /usr/bin/java and the 'JavaApplicationStub' used in bundled applications.</p>

      <p>If you want to run your SWT-based application from the command line just use 'java_swt' instead of 'java':</p>
      <pre>
         java_swt -cp swt.jar:. ControlExample
      </pre>
	
      <p>If you want to run a bundled application, you'll have to replace the executable found in the Contents/MacOS 
      subdirectory of the application bundle with (a renamed) 'java_swt' program.</p>

      <p>If you need to create a new application bundle from scratch, please refer to comment #5 in 
      <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=40003">bug #40003</a>.</p>

  </dd>
  
  <dt><strong><a name="xpthemes">Q: How do I make SWT use the Windows XP theme?</a></strong></dt>
  <dd> A: In order for an application to use the Windows XP theme, there must be a manifest file 
    located in the same place as the executable that launches the application.
    Here is a <a href="javaw.exe.manifest">sample manifest file</a> to download.
    
    <p>The name of the manifest file must match the name of the executable.  
    In the case of eclipse, the executable is <tt>javaw.exe</tt> and the manifest file 
    must have the name <tt>javaw.exe.manifest</tt>.  The manifest file must be in the
    <tt>jre\bin</tt> folder for the VM you use to launch Eclipse.  Note: the 
    <tt>eclipse.exe</tt> executable does not launch Eclipse; <tt>eclipse.exe</tt>
    displays a splash screen and then invokes the Java VM.</p>
  </dd>
  
  <dt><strong><a name="swinginswt">Q: Can I use Swing or AWT inside Eclipse?</a></strong></dt>
  <dd>A: Yes.  As of Eclipse 3.0, Swing and AWT can be embedded in SWT on Windows, Motif and GTK 
  using JDK 1.5.
  
  <p>See this <a href="http://dev.eclipse.org/viewcvs/index.cgi/org.eclipse.swt.snippets/src/org/eclipse/swt/snippets/Snippet135.java?rev=HEAD&amp;content-type=text/vnd.viewcvs-markup">snippet</a> for an example of how to use the API.
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

  <dt><strong><a name="printOnMotif">Q: Why is the Print menu item disabled in Eclipse on Motif?</a></strong></dt>
  <dd>A: Printing on Motif requires that Xprint be installed on your
      machine.

      <p>A good FAQ regarding Xprint can be found at
      <a href="http://xprint.mozdev.org/docs/Xprint_FAQ.html">http://xprint.mozdev.org/docs/Xprint_FAQ.html</a>.</p>
  </dd>

  <dt><strong><a name="printOnGTK">Q: Why is the Print menu item disabled in Eclipse on GTK?</a></strong></dt>
  <dd>A: Printing on GTK has not been implemented yet. You can use the
      External Tools support in Eclipse to print files using lpr or some other
      printing utility.
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

  <dt><strong><a name="usingLesstif">Q: Why do I get the warning "XmParseMappingCreate() is not implemented yet" on Linux/Motif?</a></strong></dt>
  <dd>A: This warning is shown if you're accessing installed LessTif libraries instead of the
    shipped OpenMotif libraries.  If you see this warning, add the eclipse install directory 
    to your LD_LIBRARY_PATH before launching eclipse. For example, if you are using csh: <br>
    
    <pre>setenv LD_LIBRARY_PATH /opt/eclipse:${LD_LIBRARY_PATH}</pre>
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
    
  <dt><strong><a name="subclassing">Q: Why can't I subclass SWT widgets like Button and Table?</a></strong></dt>
  <dd>A: You can but it is not recommended.  The article <a href="http://eclipse.org/articles/Article-Writing%20Your%20Own%20Widget/Writing%20Your%20Own%20Widget.htm">Creating Your Own Widget using SWT</a> describes the reasons in detail:
  
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
    
	For a list of sample snippets, see the <a href="snippets.php">SWT snippets page</a>.
    
  </dd>

  <dt><strong><a name="javawebstart">Q: How can I package my standalone SWT app for Java Web Start?</a></strong></dt>
  <dd>A: Follow the steps below to deploy your SWT app with Java Web
      Start. You can also follow the article from Jeff Gunther on how to
      <a href="http://www-106.ibm.com/developerworks/opensource/library/os-jws/">Deploy
      an SWT application using Java Web Start</a>.

      <p>NOTE: As of 2.1, SWT Java Web Start apps can only be deployed
      on Windows and GTK.  <p>Example:  Package the SWT ControlExample
      application.</p>
    <ol>
	<li>Create the file "<a href="swtexamples.jnlp.txt">swtexamples.jnlp</a>".
            In the file, replace the value of the codebase attribute with your own URI.
    	<li>Create the file "<a href="swt.jnlp.txt">swt.jnlp</a>"
            In the file, replace the value of the codebase attribute with your own URI.
    	<li>Create the following folders and files:
	    	<ul>
    			<li>root (e.g. d:/jws or the URL of your website)
    			<ul>
    				<li>apps/swtexamples/swtexamples.jar contains the SWT ControlExample
	    			<li>apps/swtexamples/swtexamples.jnlp (Java Web Start extension file)
	    			<li>swt/swt.jnlp (Java Web Start extension file)
	    			<li>swt/os/linux/x86/swtNativeLib.jar contains the GTK linux native libraries: libswt-gtk-xxxx.so, libswt-pi-gtk-xxxx.so, libswt-gnome-gtk-xxxx.so
	    			<li>swt/os/win32/x86/swtNativeLib.jar contains the Win32 native library: swt-win32-xxxx.dll
					<li>swt/ws/linux/swt.jar contains the SWT Linux GTK jar library
					<li>swt/ws/linux/swt-pi.jar contains the SWT Linux GTK jar library
					<li>swt/ws/win32/swt.jar contains the SWT Win32 jar library
    			</ul>
	    	</ul>
	    	<br>- The swtexamples.jar can be found in the Example Plug-ins section of the Eclipse download page.
	    	<br>- The SWT jars and native libraries can also be downloaded from the Eclipse download page.
	    	<br>- You need to create the swtNativeLib.jar files described previously. Create empty jars with the name 'swtNativeLib.jar'.  Add the native SWT library into the swtNativeLib.jar file you just created. As indicated previously, insert the SWT Win32 native library (swt-win32-xxxx.dll) into the swt/os/win32/x86/swtNativeLib.jar file. Insert the SWT GTK linux native libraries in the swt/os/linux/x86/swtNativeLib.jar.
	    <li>Sign the jar files
	    	<br>Each jar file must be signed with your own key certificate.
	    <li>Create a web page linking to the extension file root/apps/swtexamples/swtexamples.jnlp
    </ol>
    
    <p>This description was originally contributed by &Oslash;yvind Harboe.</p>
  </dd>

  <dt><strong><a name="whatisbrowser">Q: What is the SWT Browser widget?</a></strong></dt>
  <dd>A: The SWT Browser widget is used to display HTML documents. It is
      designed to provide a basic and portable API sufficient for essential
      HTML browsing and rendering on the platforms on which it is implemented.
  </dd>
  
  <dt><strong><a name="browserlinux">Q: What do I need to run the SWT Browser inside Eclipse on Linux/GTK or Linux/Motif?</a></strong></dt>
  <dd>A: You need one of the following:
    <ul>
      <li>Mozilla version 1.4 GTK2 - Mozilla 1.6 GTK2 can be used with SWT 3.0.</li>
      <li>Mozilla version 1.4 GTK2 - Mozilla 1.7.8 GTK2 can be used with SWT 3.1.</li>
      <li>Firefox can be used with SWT 3.1 (Linux only), provided that it has been compiled with linkable Gecko libraries.  It is 
      important to note that Firefox downloads from mozilla.org currently do <em>not</em> satisfy this criteria, but Firefox installations
      that are included in major Linux distributions <em>typically</em> do.  Attempting to use a statically-linked Firefox install will
      display the error message "No more handles [NS_InitEmbedding...error -2147221164]".</li>
    </ul>

    <br>The version of Mozilla installed on your system varies with your Linux distribution.  The following Linux distributions meet the Mozilla
    requirements for using the Browser widget.
    <ul>
    	<li>RedHat Enterprise Linux 3 and 4</li>
    	<li>Suse 9</li>
    </ul>
    <br>If you use the IBM 1.4 VM <a href="#browserlinuxibm">check this.</a>
    <br>
    <br>Instructions for RedHat 9 users:
  	<br>You need the Mozilla version 1.4 GTK2 RPMs for RedHat 9. Mozilla 1.5 GTK2 or Mozilla 1.6 GTK2 can also be used. For example, the RPMs for the Mozilla version 1.6 GTK2 can be downloaded from the
	  <a href="http://ftp26moz.newaol.com/pub/mozilla.org/mozilla/yum/SeaMonkey/releases/1.6/redhat/1/i386/">Mozilla ftp site</a>.
	<br>
	<ol>
    	<li>Uninstall any prior Mozilla version</li>
	    <li>Install the Mozilla RPMs</li>
    	<li>Run Mozilla once. Verify the application opens HTML documents correctly. Check the version number (1.6) in the Mozilla About dialog.. Verify you now have the Mozilla configuration file /etc/gre.conf.</li>
    	<li>Start Eclipse. Eclipse is now ready to use the Browser widget.</li>
	</ol>
	<br>Instructions for other Linux distributions:
	<br>You need the Mozilla version 1.4 GTK2 for your distribution. Mozilla 1.5 GTK2 or Mozilla 1.6 GTK2 can also be used.
  <ol>
  	<li>If you are using SWT 3.0, download the Mozilla 1.6 Xft and GTK2 build available from <a href="http://www.braindrain.be/mozilla/">the Mozilla XFT website</a>. If you are using SWT 3.1, you can choose to use the more recent <a href="http://ftp.mozilla.org/pub/mozilla.org/mozilla/releases/mozilla1.7.3/contrib/mozilla-i686-pc-linux-gnu-1.7.3-gtk2+xft.tar.gz">Mozilla 1.7.3 GTK2 from Mozilla.org</a>.</li>
  	<li>Uninstall any prior Mozilla version.</li>
  	<li>Extract and install the Mozilla build.</li>
  	<li>Run Mozilla once. Verify the application run correctly and check the version number (1.6) in the Mozilla About dialog.</li>
  	<li>Set the environment variable MOZILLA_FIVE_HOME to the folder containing your Mozilla install. e.g. <code>setenv MOZILLA_FIVE_HOME /usr/lib/mozilla</code></li>
  	<li>Start Eclipse. Eclipse is now ready to use the Browser widget.</li>
  </ol>
  </dd>

  <dt><strong><a name="browserlinuxrcp">Q: What do I need to run the SWT Browser in a standalone application on Linux GTK or Linux Motif?</a></strong></dt>
  <dd>A: Follow the steps below to use the SWT Browser widget in your standalone SWT application.
    <ol>
    	<li>A supported version of Mozilla or Firefox must be installed (<a href="#browserlinux">instructions here</a>).</li>
    	<li>Set the environment variable MOZILLA_FIVE_HOME to your Mozilla/Firefox installation folder. e.g. <code>setenv MOZILLA_FIVE_HOME /usr/lib/mozilla</code></li>
    	<li>Set the environmnent variable LD_LIBRARY_PATH to include MOZILLA_FIVE_HOME. e.g. <code>setenv LD_LIBRARY_PATH ${MOZILLA_FIVE_HOME}:${LD_LIBRARY_PATH}</code></li>
    	<li>Your standalone SWT application can now use the Browser widget.
    </ol>
    <br>If you use the IBM 1.4 VM <a href="#browserlinuxibm">check this.</a>
    <br>
  </dd>

  <dt><strong><a name="browserlinuxibm">Q: How can I get the SWT Browser to work with the IBM 1.4 VM?</a></strong></dt>
  <dd>A: The IBM 1.4 VM accidentally removes certain entries of the environment variable LD_LIBRARY_PATH. This occurs in particular
  for entries starting with /usr/lib. It will leave untouched entries such as /usr/../usr/lib.
  
  <br>Instructions for Red Hat users:
    <ol>
    	<li>Mozilla is installed in <code>/usr/lib/mozilla-1.x</code> on this platform. Set the environment variable MOZILLA_FIVE_HOME to <code>/usr/../usr/lib/mozilla-1.x</code></li>
    	<li>Start Eclipse. If you are not using Eclipse, add MOZILLA_FIVE_HOME to LD_LIBRARY_PATH before starting your standalone SWT application.</li>
		<li>The Browser widget should now work with the IBM VM.</li>
    </ol>
  </dd>

  <dt><strong><a name="browserplatforms">Q: Which platforms are supported by the SWT Browser?</a></strong></dt>
  <dd>A: The SWT Browser is currently available on the following platforms:
  <br>
  <ol>
    <li>Windows (Internet Explorer 5 or above)</li>
    <li>Mac (Panther OS X.3 or above. Safari based)</li>
    <li>Linux GTK and Linux Motif (both using Mozilla 1.4 GTK2 - or above 1.4)
    <br>The following Linux distributions meet the Mozilla requirements for using the Browser widget:
    <ul>
    	<li>RedHat Enterprise Linux 3</li>
    	<li>Suse 9</li>
    </ul>
    Other Linux distributions require a supported version of Mozilla to be installed. <a href="#browserlinux">See instructions</a>
    <li>Photon</li>
  </ol> 
  </dd>
  
  <dt><strong><a name="browserplugins">Q: Why can't I run Java applets in the SWT Browser?</a></strong></dt>
  <dd>A: Applets usually don't show up in the SWT Browser. On Windows (Internet Explorer), the Java
  plugin fails to run a second Java virtual machine to execute the applet because two Java virtual machines cannot run
  in the same process. On Linux (Mozilla), the Java plug-in has been reported to work because it executes in its own process.
  <a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=59506">See bug 59506</a> .
  </dd>

  <dt><strong><a name="gtk64">Q: How do I build the 64 bit version of SWT GTK?</a></strong></dt>
  <dd>Sept. 29th 2004. An SWT GTK library is under development for the 64 bit platform. It is being developed and tested on an AMD64 machine.
  The SWT build for the AMD64 Linux platform is available from the Eclipse download page along with the other SWT ports.
  <br>Follow these steps to extract the 64 bit SWT GTK source code and produce your own build.
  <ol>
  	<li>Start Eclipse and download the following projects from dev.eclipse.org: org.eclipse.swt, org.eclipse.swt.gtk64, org.eclipse.swt.tools</li>
  	<li>Open the file build.xml located into the org.eclipse.swt.gtk64 fragment. Run Ant to execute the ant task build.nativeLibraries defined in build.xml.</li>
  	<li>Refresh the project org.eclipse.swt.gtk64</li>
  </ol>
  The project org.eclipse.swt.gtk64 now contains the 64 bit native libraries. The 64 bit java and C source code
  has been copied under the org.eclipse.swt.gtk64/src folder.
  </dd>

  <dt><strong><a name="autotest">Q: How can I implement user interaction test cases?</a></strong></dt>
  <dd>A: The method <code>org.eclipse.swt.widgets.Display.post(Event)</code> can be used to
      post mouse and keyboard events into the OS, which emulates a user
      performing the specified action.  Also, open source application
      <a href="http://sourceforge.net/projects/abbot/">"Abbot for SWT"</a> assists
      in the writing of automated test suites.
  </dd>

  <dt><strong><a name="noeventfire">Q: Why are some events not fired in response to programmatic widget changes?</a></strong></dt>
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
  
  <dt><strong><a name="nographicslibrary">Q: Why do I get "SWTException: Unable to load graphics library" using GC?</a></strong></dt>
  <dd>A: Support for advanced graphics operations such as path for curvers and
      lines, alpha blending, antialiasing, patterns and transformations was
      added to SWT 3.1. On Windows, <a href="http://msdn.microsoft.com/library/default.asp?url=/library/en-us/gdicpp/gdiplus/gdiplus.asp">GDI+</a>
      is required. On X Windows platforms (i.e. GTK and Motif),
      <a href="http://cairographics.org/introduction">Cairo 0.4.0</a> is
      required. If your Windows platform does not have GDI+ by default, you can
      <a href="http://www.microsoft.com/downloads/details.aspx?FamilyID=6a63ab9c-df12-4d41-933c-be590feaa05a&amp;DisplayLang=en">download</a>
      a redistributable package from Microsoft.
  </dd>
</dl>
</table>
</body>
</html>