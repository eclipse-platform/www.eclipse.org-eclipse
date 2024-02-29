

<?php
//ini_set("display_errors", "true");
//error_reporting (E_ALL);
require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/app.class.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/nav.class.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/menu.class.php");
$App   = new App();
$Nav  = new Nav();
$Menu   = new Menu();
$right_nav = FALSE;
$keyword = 'eclipse, 4.31, 2024-03, acknowledgements, acknowledgments, thanks';

include($App->getProjectCommon());
header('Content-type: text/plain; charset=utf-8');

#echo '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">';

#*****************************************************************************
#
# index.php
#
# Author:    Rahul Mohanan and others on Eclipse Project
# Date:      2024-02-28
#
# Description: Eclipse project 2024-03 release acknowledgments page
#
#
#****************************************************************************

#
# Begin: page-specific settings.  Change these.
$pageTitle     = "Eclipse 2024-03 Acknowledgements";
$pageKeywords  = "eclipse, 4.31, 2024-03, acknowledgements, acknowledgments, thanks";
$pageAuthor    = "Rahul Mohanan and the Eclipse Project Team";

# Add page-specific Nav bars here
# Format is Link text, link URL (can be http://www.someothersite.com/), target (_self, _blank), level (1, 2 or 3)
# $Nav->addNavSeparator("My Page Links",   "downloads.php");
# $Nav->addCustomNav("My Link", "mypage.php", "_self", 3);
# $Nav->addCustomNav("Google", "http://www.google.com/", "_blank", 3);

# End: page-specific settings
#
# I could not find a place to put "style" element that was 
# "legal". I'm sure there is a way, if suspect the table will 
# look fine without it. 
# <style>
#  table.center {
#    width:92%; 
#    margin-left:4%; 
#    margin-right:4%;
#  }
#</style>
 
# Paste your HTML content between the markers!
ob_start();
?>

<div id="midcolumn">

  <div class="homeitem3col">
  
  
    <h3>Eclipse 2024-03 Acknowledgements</h3>
    
    <p>The entire Eclipse Project team would like to thank the Eclipse Foundation staff for their tireless efforts, including: Denis Roy, Matt Ward, Eric Poirier, Pawel Stankiewicz, Frederic Gurr and Mika&#xEB;l Barbero for not only 
    keeping all that infrastructure going, but also constantly improving it; Sharon Corbett for guiding us through the Eclipse legal process; Wayne Beaton for giving us process 
    support and improved tools to simplify and manage our development process; and Mike Milinkovich for running the whole show. 
    </p>
    <p>
      We would also like to thank the users and adopters who support our efforts, through a range of activities, including early testing, being a <a href="https://eclipse.org/donate/">Friend of
        Eclipse</a>, contracting special work, or outright employment.
    </p>
    
     <p>
      A special thanks goes to Holger Voormann for his Eclipse IDE promotion videos.
    </p>

  
    <p>The Platform team would like to thank
      everyone who has helped us to improve the quality by testing and reporting bugs and enhancement requests. And a special thanks to other Eclipse projects we build upon: EMF and ECF who 
     also provide timely updates so that we can release on time. Special thanks to the following list of
      people, in alphabetical order, who contributed code to the project:
      
      Alexandr Miloslavskiy, Alexander Kurtakov, Amartya Parijat, András Péteri, Andrey Loskutov, Alshama MS, Christoph Läubrich, Deepika Udayagiri, Denis Ungemach, Dietrich Travkin, Dinesh, Ed Merks, Elsa Zacharia, 
      Federico Jeanne, Gesa Hentschke, Hans-Peter Schaerges, Hannes Wellmann, Heiko Klare, Hernan Martinez, Jay Arthanareeswaran, Jennifer Nerlich, John Dallaway, Jörg Kubitz, Kellner, Niklas, Lars Vogel, 
      Laurent Redor, Marcus Hoepfner, Matthias Becker, Maximilian Wittmer, Michael Bangas, Michael Keppler, Mickael Istria, Mihai Nita, M Kamel, Oleksandr Krutko, Patrick Tief, Patrick Ziegler, Peter Krätel, 
      Phillipus, Praveen S K, Patrick Tief, Raghunandana, Rahul Mohanan, Rob Stryker, Ronald Clauss, Sebastian Ratz, Shubham Waghmare, Simeon Andreev, Sravan Kumar Lakkimsetti, Suby S Surendran, Thomas Singer, 
      Thomas Watson, Tobias Melcher, Umair Sair, Vasili Gulevich and Wim Jongman
      
    </p>

    <p>
    We also thank the other Eclipse projects that make up a part of the infrastructure we 
      depend on: Tycho, Orbit, EGit, EMF, ECF  for providing fixes and steady improvements.
    </p>

    <p>The JDT team would like to thank everyone who filed good enhancement requests, helped us improve quality by testing and filing good bug reports, and provided answers on JDT forums/newsgroups. Special thanks to the following list of
      people, in alphabetical order, who contributed code to the project: 
      
      Alexander Kurtakov, Amartya Parijat, Andrey Loskutov, Christoph Läubrich, David Thompson, Ed Merks, Eric Milles, Federico Jeanne, Gayan Perera, Hannes Wellmann, Heiko Klare, Hope Hadfield, Jay Arthanareeswaran, 
      Jeff Johnston, Jörg Kubitz, Jozef Tomek, Kalyan Prasad Tatavarthi, Lars Vogel, Manoj  N Palat, Mateusz Matela, Michael Haubenwallner, Mickael Istria, Noopur Gupta, Ole Osterhagen, Patrick Ziegler, 
      Piotr P. Karwasz, Rahul Mohanan, Rob Stryker, Hélios Gilles, Roland Grunberg, Simeon Andreev, Snjeza, Srikanth Sankaran, Stephan Herrmann and Suby S Surendran
    </p>
    
    <p>The Plug-in Development Environment team would like to thank the numerous contributors who continue to improve the component every release.
        Special thanks to those who contributed code:
        Alshama MS, Andrey Loskutov, Alexander Kurtakov, Christoph Läubrich, Dinesh, Ed Merks, Hannes Wellmann, Heiko Klare, Jennifer Nerlich, Jörg Kubitz, Lars Vogel, Michael Haubenwallner, Michael Keppler, Mickael Istria, Niklas Kellner and Rahul Mohanan 
      </p>

    <p>The Equinox team would like to thank all the contributors that helped improve the project by filing bug reports and enhancement requests.  We also would like to thank the community of developers that have contributed to the Equinox code base this release:
       Andrey Loskutov, Christoph Läubrich, Dietrich Travkin, Ed Merks, Elsa Zacharia, Federico Jeanne, Hannes Wellmann, Heiko Klare, Jay Arthanareeswaran, Jörg Kubitz, Lars Vogel, Matthias Becker, Rahul Mohanan, Shubham Waghmare, Sravan Kumar Lakkimsetti and Suby S Surendran
      </p>
      
  </div>

</div>



<?php
$html = ob_get_contents();
ob_end_clean();

# Generate the web page
$App->generatePage($theme, $Menu, $Nav, $pageAuthor, $pageKeywords, $pageTitle, $html);
?>

