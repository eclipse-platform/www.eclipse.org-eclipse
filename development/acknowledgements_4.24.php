

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
$keyword = 'eclipse, 4.24, 2022-06, acknowledgements, acknowledgments, thanks';

include($App->getProjectCommon());
header('Content-type: text/plain; charset=utf-8');

#echo '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">';

#*****************************************************************************
#
# index.php
#
# Author:    Sravan Kumar Lakkimsetti and others on Eclipse Project
# Date:      2022-05-24
#
# Description: Eclipse project 2022-06 release acknowledgments page
#
#
#****************************************************************************

#
# Begin: page-specific settings.  Change these.
$pageTitle     = "Eclipse 2022-06 Acknowledgements";
$pageKeywords  = "eclipse, 4.24, 2022-06, acknowledgements, acknowledgments, thanks";
$pageAuthor    = "Sravan Kumar Lakkimsetti and the Eclipse Project Team";

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
  
  
    <h3>Eclipse 2022-06 Acknowledgements</h3>
    
    <p>The entire Eclipse Project team would like to thank the Eclipse Foundation staff for their tireless efforts, including: Denis Roy, Matt Ward, Eric Poirier, Frederic Gurr and Mika&#xEB;l Barbero for not only 
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
     Alexander Kurtakov, Alexandr Miloslavskiy, Alois Zoitl, Andrew Obuchowicz, Andrey Loskutov, Carsten Hammer, Christoph L&#xE4;ubrich, 
     Conrad Groth, Denis Ungemach, Dirk Steinkamp, Ed Merks, fyaling, Hannes Wellmann, Holger Voormann, Jayaprakash Arthanareeswaran, 
     Joel Majano, Jonah Graham, Jonathan Meier, J&#xF6;rg Kubitz, Kalyan Prasad Tatavarthi, Karsten Thoms, Lakshmi P Shanmugam, Lars Vogel, 
     Manoj Palat, Michael Haubenwallner, Michael Keppler, Mickael Istria, Mika&#xEB;l Barbero, Mykola Zakharchuk, Nikita Nemkin, Niraj Modi, 
     Patrick Ziegler, Petr Bodnar, Phillipus, Rolf Theunissen, Samantha Dawley, Sarika Sinha, Sebastian Ratz, Simeon Andreev, 
     Sravan Kumar Lakkimsetti, Thomas Watson, Tim Neumann, Torbj&#xF6;rn Svensson, Vikas Chandra, Wim Jongman and Zsombor Gegesy.
     We would also like to acknowledge Samantha Dawley for all the build and releng support.
    </p>

    <p>
    We also thank the other Eclipse projects that make up a part of the infrastructure we 
      depend on: Tycho, Orbit, EGit, EMF, ECF  for providing fixes and steady improvements.
    </p>

    <p>The JDT team would like to thank everyone who filed good enhancement requests, helped us improve quality by testing and filing good bug reports, and provided answers on JDT forums/newsgroups. Special thanks to the following list of
      people, in alphabetical order, who contributed code to the project: Alexander Kurtakov, Andrey Loskutov, Carsten Hammer, Christian Femers, Christoph L&#xE4;ubrich, Ed Merks, Fabrice Tiercelin, Gayan Perera, Hannes Wellmann, H&#xE9;lios Gilles, Holger Voormann, Jayaprakash Arthanareeswaran, 
      Jeff Johnston, Jesper Steen M&#xF8;ller, Jinbo Wang, Jonah Graham, J&#xF6;rg Kubitz, Kalyan Prasad Tatavarthi, Karsten Thoms, Kenneth Styrberg, Lars Vogel, Laurent Almeras, Manoj N Palat, Manoj Palat, Manoj  Palat, Markus Oley, Mateusz Matela, Michael Keppler, Nikolay Metchev, Paul Pazderski, 
      Peer Valhoegen, Sarika Sinha, Simeon Andreev, Snjezana Peco, Sravan Kumar Lakkimsetti, Stephan Herrmann, Thomas M&#xE4;der, Vikas Chandra and Zsombor Gegesy for features and bug fixes.
    </p>
    
    <p>The Plug-in Development Environment team would like to thank the numerous contributors who continue to improve the component every release.
        Special thanks to those who contributed code:
       Alena Laskavaia, Alexander Fedorov, Alexander Kurtakov, Andrew Niefer, Andrey Loskutov, Carsten Hammer, Christoph L&#xE4;ubrich, 
       Curtis Windatt, Dani Megert, David Williams, Dean Roberts, dejan, Denis Roy, DJ Houghton, Ed Merks, Grant Gayed, Hannes Wellmann, 
       Helge B&#xF6;hme, Igor Fedorenko, Jeff Johnston, Jeff McAffer, John Arthorne, J&#xF6;rg Kubitz, Julian Honnen, Kaloyan Raev, 
       Karsten Thoms, Kim Moir, Kit Lo, Krzysztof Daniel, Lars Vogel, Marc-Andre Laperle, Markus Keller, Mat Booth, Michael Keppler, 
       Mickael Istria, Mykola Nikishov, Niraj Modi, Olivier Prouvost, Pascal Rapicault, Patrick Ziegler, Paul Webster, rodrigo, 
       Sarika Sinha, Sonia Dimitrov, Sravan Kumar Lakkimsetti, Stephan Herrmann, Thanh Ha, Thomas Watson, Vikas Chandra, vlad and Wim Jongman.
      </p>

    <p>The Equinox team would like to thank all the contributors that helped improve the project by filing bug reports and enhancement requests.  We also would like to thank the community of developers that have contributed to the Equinox code base this release:
       Alexander Kurtakov, Andrey Loskutov, Christoph L&#xE4;ubrich, Ed Merks, fyaling, Hannes Wellmann, Kalyan Prasad Tatavarthi, Lars Vogel, Michael Haubenwallner, Mickael Istria, Samantha Dawley, Sebastian Ratz, Simeon Andreev, Simon Goodall, Sravan Kumar Lakkimsetti, Stefan Bischof and Thomas Watson,.
      </p>
      
  </div>

</div>



<?php
$html = ob_get_contents();
ob_end_clean();

# Generate the web page
$App->generatePage($theme, $Menu, $Nav, $pageAuthor, $pageKeywords, $pageTitle, $html);
?>

