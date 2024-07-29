<?php  																														require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/app.class.php");	require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/nav.class.php"); 	require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/menu.class.php"); 	$App 	= new App();	$Nav	= new Nav();	$Menu 	= new Menu();		include($App->getProjectCommon());    # All on the same line to unclutter the user's desktop'

	#*****************************************************************************
	#
	# team-leaders.php
	#
	# Author: 		
	# Date:			2018-04-01
	#
	# Description: Details about the Eclipse Project PMC
	#
	#
	#****************************************************************************
	
	#
	# Begin: page-specific settings.  Change these. 
	$pageTitle 		= "Eclipse Project PMC";
	$pageKeywords	= "PMC";
	$pageAuthor		= "McQ";
	
	# Add page-specific Nav bars here
	# Format is Link text, link URL (can be http://www.someothersite.com/), target (_self, _blank), level (1, 2 or 3)
	# $Nav->addNavSeparator("My Page Links", 	"downloads.php");
	# $Nav->addCustomNav("My Link", "mypage.php", "_self", 3);
	# $Nav->addCustomNav("Google", "http://www.google.com/", "_blank", 3);

	# End: page-specific settings
	#
		
	# Paste your HTML content between the markers!	
ob_start();
?>		

	<div id="midcolumn">
		<h1><?= $pageTitle ?></h1>
		<h2>Who's running this project?</h2>
      <p>This page lists the people that are currently playing the PMC and subproject 
        leadership roles described in the <a href="eclipse-charter.php">project 
        charter</a>. We welcome new people who want to get involved and can make a contribution. 
        The Eclipse Project is a meritocracy. The more you contribute the more 
        responsibility you will earn. </p>
      <p>We ask that you do not e-mail us directly. Instead - use the <a href="http://www.eclipse.org/mail/index_all.php" target="_top">mailing 
        lists</a>. Mailing lists have been set up for each area of work, and are 
        the best way to get involved.</p>
      <p>The Eclipse Project is managed by a small group known as the Eclipse 
        Project Management Committee (<a href="eclipse-charter.php#PMC">PMC</a>). 
        The work of the project is organized into subprojects. Each subproject 
        has a leader who has overall responsibility for its success. Large subprojects 
        are further divided into component teams, each of who has a leader that 
        is responsible for its overall success. We have listed just the PMC and 
        subproject leaders here but you will encounter many dedicated Eclipse 
        Project committers and developers in the <a href="http://www.eclipse.org/mail/index_all.php" target="_top">mailing lists</a>.</p>

		<div class="homeitem3col">
			<h3>Project Management Committee Members</h3>
		      <ul>
		        <li> 
		          <b><a id="aleksandar"></a>Aleksandar Kurtakov, Red Hat Inc.</b><br>
					Aleksandar is the overall lead for the Eclipse Project aka PMC Lead.
					He is part of Red Hat's Eclipse team. He is Platform SWT committer, Tools PMC member and leads the <a href="http://www.eclipse.org/linuxtools/">Linux Tools</a> project.
					He is very interested in deeper native platform integration both as runtime experience and as distribution channel.
					He is also interested in growing the contributors and better aligning with modern systems.
		        </li>
				<li>
		          <b><a id="tom"></a>Tom Watson, IBM Austin</b><br>
					Tom is one of the initial committers of the Equinox project and was involved in the initial migration of the Eclipse runtime to the OSGi Framework.
					Currently he leads the Equinox Project, represents IBM in the Eclipse Planning Council, and is also a member of the Eclipse Architecture Council.
					He focuses is on modularity and the OSGi Framework design and development. Tom is also a leader in the specification development process at the OSGi Alliance.
		        </li>
		        <li>
		          <b><a id="jay"></a>Jay Arthanareeswaran, IBM India</b><br>
					Jay is a long time committer and a lead of the Eclipse JDT subproject. In his current role, 
					Jay is responsible for the Eclipse Compiler, especially supporting new Java Language features. 
					In the past, he has also contributed to the Orion and Flux Projects. Jay has been an Eclipse
					user since its inception.
		        </li>
		        <li>
		          <b><a id="ed"></a>Ed Merks, Macromodeling GmbH</b><br>
					Ed has been involved with Eclipse since its inception.
					He is a committer on more than <a href="https://accounts.eclipse.org/users/emerks#tab-projects">20 Eclipse projects</a>.
					He is a coauthor of the authoritative book <a href="http://www.informit.com/store/product.aspx?isbn=9780321331885">EMF: Eclipse Modeling Framework</a>
					which is published as a second expanded edition. 
					He works hard to ensure that the barriers to entry for contributors to Eclipse's diverse projects is as low possible.
		        </li>
				<li>
				  <b><a id="hannes"></a>Hannes Wellmann</b><br>
					Hannes is a lead of the Eclipse PDE subproject and passionate about improving developer tooling and build tools.
					He works on modernising Eclipse at its core and establishing new technologies.
					He also supports new contributors and aims to strengthen and enlarge the Eclipse developer community.
				</li>
		      </ul>
		</div>
		<div class="homeitem3col">
			<h3>Past PMC members</h3>
			The following are Eclipse Project PMC Emeriti:
		      <ul>
		        <li> 
		          <b><a id="erich"></a>Erich Gamma</b><br>
					Erich was the original lead of the Eclipse Java development environment.
					Prior to working on Eclipse he contributed to VA/Micro Edition (part
					of IBM's Java solution for embedded device programming). Erich is well known for
					his work on Design Patterns and <a href="http://www.junit.org/" target="_top">JUnit</a>.
		        </li>
		        <li> 
		          <b><a id="kevin"></a>Kevin Haaland</b><br>
					Kevin was a key contributor to the design and implementation of the
					Platform UI. He was previously component lead for the Platform UI, and
					has a long history of building user interface technology at OTI. In a past
					life he was the lead for the SWT team. Kevin also played a key role in
					the IBM VA/Java project.
		        </li>
		        <li> 
		          <b><a id="jeff"></a>Jeff McAffer</b><br>
		           Jeff McAffer co-led the RT Equinox project and is the Founder of <a href="http://code9.com">Code 9</a>.
			       He is one of the architects of the Eclipse Platform and a co-author of
			       <a href="http://eclipsercp.org">The Eclipse Rich Client Platform</a> (Addison-Wesley).
			       Previous lives include being a Senior Technical Staff
			       Member at IBM and work in distributed/parallel OO computing (Server Smalltalk,
			       massively parallel Smalltalk, etc) as well as expert systems, meta-level architectures
			       and a PhD at the University of Tokyo.
		        </li>
		        <li> 
		          <b><a id="andrew"></a>Andrew Overholt, Mozilla</b><br>
					Andrew works on open source technologies at Mozilla in Toronto.
					He has been involved with the Eclipse community since 2005
					and is a member of the Eclipse <a href="http://wiki.eclipse.org/Architecture_Council">Architecture Council</a>.
					For some time Andrew also led the <a href="http://www.eclipse.org/linuxtools/">Linux Tools</a> project. He is very interested in continuing to grow the
					Eclipse community and to improve native platform integration.
		        </li>
		        <li> 
		          <b><a id="philippe"></a>Philippe Mulet</b><br>
					Philippe is a former PMC and JDT project lead. Prior to Eclipse,
					Philippe was responsible for the compiler and codeassist in IBM VA/Java
					and VA/Micro Edition. Philippe was a member of the expert group on compiler
					API (JSR199), representing IBM. His main interests are in compilation,
					performance, scalability and meta-level architectures.
		        </li>
		        <li>
		          <b><a id="steve"></a>Steve Northover</b><br>
			      Steve Northover is the father of SWT (the Standard Widget Toolkit). Prior to
			      working on Eclipse, he worked on IBM Smalltalk, VA/Java, VA/Micro Edition.
			      His interests include programming languages, API design, operating systems,
			      user interfaces and code optimization.
		        </li>
		        <li> 
		          <b><a id="johnw"></a>John Wiegand</b><br>
					John was a principal architect for the platform infrastructure. John played
					a central role in the development of IBM VA/Java, VA/Micro Edition, and
					Eclipse. His interests are in the areas of performance, scalability,
					compilers, and just about anything that's hard.
		        </li>
		        <li> 
		          <b><a id="john"></a>John Arthorne</b><br>
			      John has worked on the <a href="http://eclipse.org/eclipse">Eclipse</a> and <a href="http://eclipse.org/equinox">Equinox</a> 
			      projects for the past decade in many different areas. He was the main developer on the resource model for many years, 
			      and designed the platform's concurrency infrastructure. In recent years he has focused on the Orion project, provisioning (p2), 
			      e4, and overall platform API quality. John has authored numerous <a href="http://www.eclipse.org/articles/">articles</a> 
			      and a <a href="http://www.amazon.com/Official-Eclipse-3-0-FAQs/dp/0321268385/ref=sr_1_1?ie=UTF8&s=books&qid=1221163807&sr=8-1">
			      book</a> on Eclipse.
		        </li>
				<li>
		          <b><a id="sergey"></a>Sergey Prigogin, Google</b><br>
					Sergey is part of Google's Eclipse team. He is CDT and Platform UI committer and co-leads Platform Resources.
					His primary areas of interest are C++ parsing, indexing, refactoring and making Eclipse faster and more responsive.
					He is also interested in growing the number of Platform committers and contributors and making contributing to the
					Eclipse Platform projects as frictionless as possible.
		        </li>
		        <li> 
		          <b><a id="martin"></a>Martin Oberhuber, Wind River</b><br>
			      Martin was on the PMC representing the Community aspect of Eclipse and
			      the e4 project. He is a Platform Core Resources and e4 committer,
			      co-leading the e4 Resources work. Martin also serves on the 
			      <a href="http://wiki.eclipse.org/DSDP/PMC">DSDP PMC</a> and as 
			      <a href="/dsdp/tm/">Target Management</a> Project lead, and revitalized
			      the Eclipse <a href="http://wiki.eclipse.org/Architecture_Council">
			      Architecture Council</a> as its chair. His interests include programming
			      languages, patterns and paradigms, optimizing development processes,
			      skiing, hiking, and playing all sorts of musical instruments.
		        </li>
		         <li> 
		          <b><a id="dani"></a>Dani Megert, IBM Research - Zurich</b><br>
			      Dani is one of the initial Eclipse committers.He led the <a href="https://wiki.eclipse.org/Platform">Platform</a> and the <a href="http://eclipse.org/jdt">JDT</a> subprojects,
			      represented the project in the Eclipse <a href="http://wiki.eclipse.org/Planning_Council">Planning Council</a>, and was also a
			      a member of the Eclipse <a href="http://wiki.eclipse.org/Architecture_Council">
			      Architecture Council</a>.
			      He was elected by the committers to represent them in the <a href="https://eclipse.org/org/foundation/directors.php">Eclipse Foundation Board of Directors</a>.
			      Dani worked at OTI and IBM Research GmbH. His interests included user interface and API design, editors, software quality and performance.
		        </li>
		        <li> 
		          <b><a id="McQ"></a>Mike ("McQ") Wilson, IBM Ottawa</b><br>
			      McQ was the overall lead for the Eclipse Project aka PMC Lead until 2023.
			      He is a senior architect of the Eclipse SDK, a member of the Eclipse <a href="http://wiki.eclipse.org/Architecture_Council">
			      Architecture Council</a> and one of the original Eclipse Founders. His interests include computer
			      language design and implementation, semantic content publishing, web development,
			      and playing the cello.
		        </li>
				<li>
				  <b><a id="lars"></a>Lars Vogel, vogella GmbH</b><br>
					Lars represents the user and adopter community of Eclipse. Lars is founder and CEO of the vogella GmbH based in Hamburg, Germany.
					He is an active Platform UI and PDE committer, contributor to other Eclipse projects and co-leads the <a href="http://www.eclipse.org/e4/">e4</a>  and
					<a href="https://www.eclipse.org/eclipse/platform-ui/">Platform UI</a> project.
					His interests include API and UI simplification, code clean and growing the number of committers and contributors in the project.
				</li>
		      </ul>
		</div>
		
	</div>

	<!-- remove the entire <div> tag to omit the right column!  -->
	<div id="rightcolumn">
		<div class="sideitem">
			<h6>Subprojects</h6>
			<ul>
				<li><a href="https://projects.eclipse.org/projects/eclipse.platform">Platform</a></li>
				<li><a href="https://projects.eclipse.org/projects/eclipse.jdt">JDT</a></li>
				<li><a href="https://projects.eclipse.org/projects/eclipse.pde">PDE</a></li>
				<li><a href="https://projects.eclipse.org/projects/eclipse.equinox">Equinox</a></li>
				<li><a href="https://projects.eclipse.org/projects/eclipse.e4">e4</a></li>
      		</ul>		
	</div>

<?php
	$html = ob_get_contents();
	ob_end_clean();

	# Generate the web page
	$App->generatePage($theme, $Menu, $Nav, $pageAuthor, $pageKeywords, $pageTitle, $html);
?>
