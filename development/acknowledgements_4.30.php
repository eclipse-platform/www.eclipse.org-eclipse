

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
$keyword = 'eclipse, 4.30, 2023-12, acknowledgements, acknowledgments, thanks';

include($App->getProjectCommon());
header('Content-type: text/plain; charset=utf-8');

#echo '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">';

#*****************************************************************************
#
# index.php
#
# Author:    Rahul Mohanan and others on Eclipse Project
# Date:      2023-11-20
#
# Description: Eclipse project 2023-12 release acknowledgments page
#
#
#****************************************************************************

#
# Begin: page-specific settings.  Change these.
$pageTitle     = "Eclipse 2023-12 Acknowledgements";
$pageKeywords  = "eclipse, 4.30, 2023-12, acknowledgements, acknowledgments, thanks";
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
  
  
    <h3>Eclipse 2023-12 Acknowledgements</h3>
    
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
     
      Andrey Loskutov, Alexander Kurtakov, Alshama MS, Christoph L&#xC3;ubrich, David Erdös, Deepika Udayagiri, Dawid Pakuła, 
      Ed Merks, Elsa Zacharia, Federico Jeanne, Hannes Wellmann, Heiko Klare, James Yuzawa, Jeff Johnston, John Dallaway, Jonah Graham, J&#xC3;rg Kubitz, Konrad Windszus, Lars Vogel, Louis Detweiler, Marcus Hoepfner, Martin Jobst, 
      Matthias Becker, Michael Brown, Maximilian Wittmer, Michael Bangas, Michael Keppler, Mickael Istria, Nikifor Fedorov, Niklas Kellner, Ole Osterhagen, Patrick Ziegler, Petru Florin Mihancea, Phillipus, Raghunandana, Rahul Mohanan, Rob Stryker, 
      Sebastian Ratz, Suby S Surendran and Vasili Gulevich.
    </p>

    <p>
    We also thank the other Eclipse projects that make up a part of the infrastructure we 
      depend on: Tycho, Orbit, EGit, EMF, ECF  for providing fixes and steady improvements.
    </p>

    <p>The JDT team would like to thank everyone who filed good enhancement requests, helped us improve quality by testing and filing good bug reports, and provided answers on JDT forums/newsgroups. Special thanks to the following list of
      people, in alphabetical order, who contributed code to the project: 

      Andrey Loskutov, Alexander Kurtakov, Christoph L&#xC3;ubrich, Coehlrich, Deepika Udayagiri, DongChunHao, Ed Merks, Federico Jeanne, Gayan Perera, Hannes Wellmann, howlger, Jay Arthanareeswaran, 
      Jeff Johnston, J&#xC3;rg Kubitz, Jozef Tomek, Manoj N Palat, Michael Keppler, Mickael Istria, Nitin Dahyabhai, Noopur Gupta, Raghunandana, Rahul Mohanan, Rob Stryker, Sarika Sinha, Simeon Andreev, Srikanth Sankaran, 
      Stephan Herrmann, Suby S Surendran and Thomas Watson.
    </p>
    
    <p>The Plug-in Development Environment team would like to thank the numerous contributors who continue to improve the component every release.
        Special thanks to those who contributed code:
        Alshama MS, Andrey Loskutov, Alexander Kurtakov, Christoph L&#xC3;ubrich, Ed Merks, Federico Jeanne, Hannes Wellmann, Heiko Klare, Johan Compagner, J&#xC3;rg Kubitz, Lars Vogel, Michael Haubenwallner, Michael Keppler and Rahul Mohanan 
      </p>

    <p>The Equinox team would like to thank all the contributors that helped improve the project by filing bug reports and enhancement requests.  We also would like to thank the community of developers that have contributed to the Equinox code base this release:
       Andrey Loskutov, Christoph L&#xE4;ubrich, Deepika Udayagiri, Ed Merks, Elsa Zacharia, Federico Jeanne, Hannes Wellmann, Heiko Klare, J&#xE4;rg Kubitz, Matthias Becker, Mickael Istria, Rahul Mohanan, Sebastian Ratz, Suby S Surendran and Vasili Gulevich
      </p>
      
  </div>

</div>



<?php
$html = ob_get_contents();
ob_end_clean();

# Generate the web page
$App->generatePage($theme, $Menu, $Nav, $pageAuthor, $pageKeywords, $pageTitle, $html);
?>

