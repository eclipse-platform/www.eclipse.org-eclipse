<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">

<?php  																														require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/app.class.php");	require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/nav.class.php"); 	require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/menu.class.php"); 	$App 	= new App();	$Nav	= new Nav();	$Menu 	= new Menu();		include($App->getProjectCommon());    # All on the same line to unclutter the user's desktop'

	#*****************************************************************************
	#
	# index.php
	#
	# Author: 		
	# Date:			2008-04-23
	#
	# Description: Eclipse project development main page
	#
	#
	#****************************************************************************
	
	#
	# Begin: page-specific settings.  Change these. 
	$pageTitle 		= "Eclipse 3.4 Acknowledgements";
	$pageKeywords	= "eclipse, 3.4, acknowledgements, thanks";
	$pageAuthor		= "";
	
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


<div class="homeitem3col">
<h3>Eclipse 3.4 Acknowledgements</h3>


<head>
<title>Eclipse 3.4 Acknowledgements</title>

<p>
The Eclipse project (Platform, JDT, PDE, Equinox) development team received a tremendous amount of support from the Eclipse community throughout the 3.4 release cycle. 
The enormous collective effort of opening bug reports, providing patches, testing, consuming the latest builds and participating in discussions always results in a better 
release. To everyone that helped a big "Thank you!/Merci!/Danke!".  In particular, the team would like to express its appreciation to the following people.
</p>

<p>
Contributors to the Eclipse Platform: Remy Chi Jian Suen, Adam Archer, Francis Upton, Pawel Piech, Matthew Hall,
Jan-Hendrik Diederich, Sebastian Davids, Brock Janiczak, Krzysztof Michalski, Andrew Overholt, Stefan Liebig,
Matt McCutchen, Nikolay Botev, Benjamin Muskalla, Jim Perry, Semion Chichelnitsky, Jakub Jurkiewicz, Jason Brennan,
Matt Carter, Dakshinamurthy Karra, Eric Rizzo, Jacek Pospychala, Micah Hainline, Anton Leherbauer, Oliver Schaefer,
Benjamin CABE, Sky Yan, Chris Torrence, Janusz Lembicz, Billy Biggs, Mark Melvin, Markus Alexander Kuppe, Ed Merks,
Robert Taniwa, Stefan M?cke, Stephan Orcaforge, Tonny Madsen, Carsten Pfeiffer, Willian Mitsuda, Cagatay Calli,
Michael Krauter, David Green, Allan Godding, Martin Oberhuber, Rafael Chaves, Jesper S M?ller, Manuel Selva,
Neil Rickards, Martin Karpisek, Mikhail Khodjaiants, Dan Heidinga, Ted Williams, David Kyle, Isaac Pacht, Leo Dos Santos,
Bartosz Michalik, Holger Oehm, Luma Maruojie, Tobias Gerdin, Danail Nachev, Markus Schorn, Mark Powell, Ashley Cambrell,
Aaron Siri, Andrew Ferguson
</p>

<p>
The Equinox team (framework, bundles, security, p2) would like thank the many
people who contributed code, testing, and good bug reports in this release. This
includes code contributions from Alex Blewitt, Andrew Overholt, Benson Wong, 
Chris Gross, Danail Nachev, Dmitriy Parkhonin, Guenther Koegel, Helmut J. Haigermoser, 
Holger Voormann, James D. Miles, Jed Anderson, Kelly Campbell , Max Rydahl Andersen, 
Mike Mansell, Patrick Dempsey, Paul Gardiner, Philippe Ombredanne, Prashant Deva, 
Rafik Jaouani, Ray Braithwood, Sebastian Davids, Simon Archer, Stefan Xenos, 
Thomas Hallgren, Timothy Mok, and Timothy Webb.  The p2 component would like to
give a special thanks to Andrew Overholt and Timothy Webb for their significant contributions
to all aspects of p2, from design to implementation and testing. The p2 component
also thanks Daniel Le Berre and Anne Parrain from the SAT4J team for their work on integrating
the SAT4J solver with p2, and Scott Lewis for his work on integrating ECF transfer
support into p2. Finally we thank our families for putting up with our crazy work hours
as we pried this truculent, screaming beast of a release out the door.
</p>

<p>
The User Assistance team would like to thank Guillermo Hurtado for his
contribution allowing an infocenter to be built as a war file and also thank
Guillermo Hurtado and and James Perry for their contribution which allows for
multiple remote infocenters. We would also like to thank Robert Taniwa, Jacek
Pospychala, Stefan Xenos, Stefan M?cke, Nick Edgar, Kai Nacke, Kim Sullivan 
and Chris Torrence for the bug fixes they contributed.</p>


<br>Platform Search wishes to thank
<p>Juerg Billeter, Ulrich Etter, Roman Fuchs, Markus Schorn and Cagatay Calli</p>
 
<br>The Platform and JDT Text team would like to thank everyone who filed good bug reports and enhancement requests. Special thanks go to:
 <p>Guy Gurfinkel, Genady Beryozkin, Brock Janiczak, Anton Leherbauer, Andr?
 S?reng, Nathan Beyer, Stephan Wahlbrink, Benjamin Muskalla, Andrew Ferguson,
 Cagatay Calli, Steffen Pingel, Dakshinamurthy Karra, Nikolay Botev and Lina Kemmel</p>

<br>JDT UI sends thanks to
<p>Ferenc Hechler, Benjamin Muskalla, Stephan Herrmann, Eric Rizzo, Brock
Janiczak, Francis Upton, Rob Fuhrer and Karsten Becker</p>


<br>PDE would like to thank:

<p>Adam Archer, Ian Bull, Benjamin Cabe, Patrick Dempsey, Joern Dinkla, Kevin
Doyle, Gary Duprex, Peter Friese, Brock Janiczak, Les Jones, Jakub Jurkiewicz,
Bernd Kolb, Blazej Kroll, Eric Li, Fabio Mancinelli, Ed Merks, Bartosz
Michalik, Danial Nachev, Ketan Padegaonkar, Jacek Pospychala, Michael Rennie,
Gaetano Santoro, Darin Swanson, Remy Suen</p>


<br>The SWT team would like to thank everyone who filed bugs and helped improve the
toolkit.  Special thanks go to:

<p>Alex Blewitt, Andrew Overholt, Anton Tarasov, Benjamin Pasero, Boris Bokowski,
Christopher Deckers, Daniel Megert, Eric Rizzo, Eric Scharff, Florian Priester,
Jeff Wu, Leo dos Santos, Mark Powell, Markus Keller, Martin Aeschlimann,
Matthew Hatem, McQ, Mik Kersten, Oleg Krasilnikov, Phil Loats, Remy Suen, Scott
Kovatch, Sky Yan, Tom Schindl</p>


<br>The Releng team would like to thank:

<p>The p2 posse of John Arthorne, DJ Houghton, Andrew Niefer and Pascal Rapicault for assistance
p2izing the build and improvements to PDE build. Frederic Fusier for his improvements to the performance
framework.  Olivier Thomann for his numerous patches and assistance implementing API tooling in the 
build.  Sonia Dimitrov for helpful build suggestions and kite flying expeditions.  Jennifer Charland for 
her super sysadmin skills in our our build lab.  The Eclipse foundation webmasters 
for keeping the eclipse.org servers healthy. The releng team would like to also to thank their family and 
friends for their understanding regarding the long work hours that this release entailed.
</p>

  </div>
  </div>

<?php
	$html = ob_get_contents();
	ob_end_clean();

	# Generate the web page
	$App->generatePage($theme, $Menu, $Nav, $pageAuthor, $pageKeywords, $pageTitle, $html);
?>

