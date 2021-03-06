

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
$keyword = 'eclipse, 4.11, 2019-03, acknowledgements, acknowledgments, thanks';

include($App->getProjectCommon());

#echo '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">';

#*****************************************************************************
#
# index.php
#
# Author:    Sravan Kumar Lakkimsetti and others on Eclipse Project
# Date:      2019-02-25
#
# Description: Eclipse project 2019-03 release acknowledgments page
#
#
#****************************************************************************

#
# Begin: page-specific settings.  Change these.
$pageTitle     = "Eclipse 2019-03 Acknowledgements";
$pageKeywords  = "eclipse, 4.11, 2019-03, acknowledgements, acknowledgments, thanks";
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
  
  
    <h3>Eclipse 2019-03 Acknowledgements</h3>
    
    <p>The entire Eclipse Project team would like to thank the Eclipse Foundation staff for their tireless efforts, including: Denis Roy, Matt Ward, Fred Gurr and Mikael Barbero for not only 
    keeping all that infrastructure going, but also constantly improving it; Sharon Corbett for guiding us through the Eclipse legal process; Cydnie Smith and Wayne Beaton for giving us process 
    support and improved tools to simplify and manage our development process; Thabang Mashologu and Stephanie Swart for help with marketing the release and providing Logos and artwork; 
    and Mike Milinkovich for running the whole show. 
    <p>
      We would also like to thank the users and adopters who support our efforts, through a range of activities, including early testing, being a <a href="https://eclipse.org/donate/">Friend of
        Eclipse</a>, contracting special work, or outright employment.
    </p>
    
     <p>
      A special thanks goes to Holger Voormann for his Eclipse IDE promotion videos.
    </p>

  
    <p>The Platform team would like to thank
      everyone who has helped us to improve the quality by testing and reporting bugs and enhancement requests. And a special thanks to other Eclipse projects we prereq: EMF and ECF who 
     also provide timely updates so that we can be ontime. Special thanks to the following list of
      people, in alphabetical order, who contributed code to the project:
     Alexander Kurtakov, Alexandr Miloslavskiy, Andrey Loskutov, Andrzej Witecki, Bing-Yi Wong, Bj??rn Michael, Brian de Alwis, Christian Pontesegger, Dani Megert, Denis Ungemach, Ed Merks, Elliott Baron, Eric Williams, Fabian Pfaff, Jayaprakash Arthanareeswaran, Jens Reimann, Jonas Hungershausen, Julian Honnen, Kalyan Prasad Tatavarthi, Karsten Thoms, Kit Lo, Lakshmi Priya Shanmugam, Lars Vogel, Laurent Caron, Manoj Palat, Marcus Hoepfner, Mat Booth, Matthew Khouzam, Matthias Becker, Michael Keppler, Mickael Istria, Mike Marchand, Mykola Nikishov, Mykola Zakharchuk, Nikita Nemkin, Niraj Modi, Noopur Gupta, Phillip Webb, Ralph Gerbig, Reto Weiss, Roland Grunberg, Rolf Theunissen, Sarika Sinha, Sebastian Ratz, Simeon Andreev, Simon Scholz, Sravan Kumar Lakkimsetti, Stephan Herrmann, Thomas Watson, Thomas Wolf, Till Brychcy, Tim Neumann, Tom Schindl, Umair Sair, Vikas Chandra, Vladimir Piskarev, Wim Jongman and Xi Yan.
    </p>

    Also, the webmasters (Frederic Gurr, Denis Roy, Matt Ward and Mikael Barbero) at the Eclipse Foundation for their constant help and education and improvements. And      
      we also thank the other Eclipse projects that make up a part of the infrastructure we 
      depend on: Tycho, EGit, Jenkins for providing fixes and steady improvements.
    </p>

    <p>The JDT team would like to thank everyone who filed good enhancement requests, helped us improve quality by testing and filing good bug reports, and provided answers on JDT forums/newsgroups. Special thanks to the following list of
      people, in alphabetical order, who contributed code to the project: Alexander Kurtakov, Andrey Loskutov, Christoph Langer, Dani Megert, Fabian Pfaff, Igor Fedorenko, Jayaprakash Arthanareeswaran, Jeff Johnston, Kalyan Prasad Tatavarthi, Kenneth, Manoj Palat, Mark Hoffmann, Mateusz Matela, Matthias Becker, Mickael Istria, Motonori Iwamuro, Niraj Modi, Noopur Gupta, Paul Pazderski, Pierre-Yves B., Roland Grunberg, Sarika Sinha, Shawn Kleese, Simeon Andreev, Sravan Kumar Lakkimsetti, Stephan Herrmann, Till Brychcy and Vikas Chandra for features and bug fixes.
      We would also like to acknowledge Niraj Modi for all the build and releng support.
    </p>
    
    <p>The Plug-in Development Environment team would like to thank the numerous contributors who continue to improve the component every release.
        Special thanks to those who contributed code:
       Alexander Fedorov, Alexander Kurtakov, Andrey Loskutov, Dani Megert, Julian Honnen, Karsten Thoms, Kit Lo, Lars Vogel, Matthias Becker, Mykola Zakharchuk, Niraj Modi, Simeon Andreev, Sravan Kumar Lakkimsetti, Vikas Chandra and Wim Jongman.
      </p>

    <p>The Equinox team would like to thank all the contributors that helped improve the project by filing bug reports and enhancement requests.  We also would like to thank the community of developers that have contributed to the Equinox code base this release:
       Alexander Kurtakov, Andrey Loskutov, Anjum Fatima, J??rgen Bogdahn, Julian Honnen, Karsten Thoms, Lars Vogel, Michael Keppler, Mykola Nikishov, Niraj Modi, Raymond Auge, Sebastian Ratz, Sravan Kumar Lakkimsetti and Thomas Watson.
      </p>

  </div>

</div>



<?php
$html = ob_get_contents();
ob_end_clean();

# Generate the web page
$App->generatePage($theme, $Menu, $Nav, $pageAuthor, $pageKeywords, $pageTitle, $html);
?>

