

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
$keyword = 'eclipse, 4.27, 2023-03, acknowledgements, acknowledgments, thanks';

include($App->getProjectCommon());
header('Content-type: text/plain; charset=utf-8');

#echo '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">';

#*****************************************************************************
#
# index.php
#
# Author:    Sravan Kumar Lakkimsetti and others on Eclipse Project
# Date:      2023-02-28
#
# Description: Eclipse project 2023-03 release acknowledgments page
#
#
#****************************************************************************

#
# Begin: page-specific settings.  Change these.
$pageTitle     = "Eclipse 2023-03 Acknowledgements";
$pageKeywords  = "eclipse, 4.27, 2023-03, acknowledgements, acknowledgments, thanks";
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
  
  
    <h3>Eclipse 2023-03 Acknowledgements</h3>
    
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
     
      Alexander Bunkowski, Alexander Fedorov, Alexander Kurtakov, AlexOnisa, Andreas Poppiehn, Andrej ten Brummelhuis, andrewL-avlq, Andrew Niefer, Andrey Loskutov, Angelo Zerr, 
      BeckerWdf, Benedikt Kuntz, bkuntz, Bogdan Gheorghe, Boris Bokowski, Brian de Alwis, Burcu Karlidag, Carsten Hammer, Christian Zahl, Christof Joswig, Christopher Hermann, 
      Christoph L&#xC3;ubrich, Daniel Rolka, Dani Megert, David Williams, Deepika Udayagiri , Dirk Fauth, Dmitry Spiridenok, Dominic Scharfe, droberts, D. Spiridenok, dvasyn, Ed Merks, 
      Elias Volanakis, Erdal Karaca, Eric Moffatt, Eugen Neufeld, Fabian Miehe, Fabian Pfaff, Gerald Mitchell, Hannes Wellmann, initialflame, Jason Wang, Jeff Johnston, Jens Lidestrom, 
      John Arthorne, jonas, Jonas Helming, Jonathan Meier, J&#xC3;rg Kubitz, Joseph Carrol, Kalyan Prasad Tatavarthi, Karsten Thoms, Kenneth Styrberg, Kit Lo, klevis, Klevis, Kyle Smith, 
      Lars Vogel, Leo Denault, l.ripeynih, Marcel Bruch, Marco Descher, Marco Drescher, Mark, mark.hoffmann, Markus Alexander Kuppe, Markus Keller, Mat Booth, Max Hohenegger, 
      Michael Keppler, Mickael Istria, Mihai Nita, Mika&#xC3;l Barbero, Nicolaj Hoess, Niraj Modi, Olivier Prouvost, Patrik Suzzi, Paul Webster, Petr Bodnar, psuzzi, Raghunandana Murthappa, 
      Rahul Mohanan, Remy Suen, Ren&#xC3; Brandstetter, Robert Koehler, Rolf Theunissen, Samantha Dawley, scela, Sebastian Ratz, Shawn Kleese, Simeon Andreev, Simon, Simon Scholz,  
      Sopot &#xC3;ela, Sravan Kumar Lakkimsetti, Stefan N&#xC3;bauer, Stefan Winkler, Steven Spungin, Thomas Schindl, Thomas Singer, tobbaumann, Tommy Redel, Tom Schindl, Toni umbreit, 
      Tracy Miranda, Unai Martinez, Veselin Markov, Victor Rubezhny, Vikas Chandra, Vincenzo Caselli, Wim Jongman and Wojciech Sudol
     We would also like to acknowledge Samantha Dawley for all the build and releng support.
    </p>

    <p>
    We also thank the other Eclipse projects that make up a part of the infrastructure we 
      depend on: Tycho, Orbit, EGit, EMF, ECF  for providing fixes and steady improvements.
    </p>

    <p>The JDT team would like to thank everyone who filed good enhancement requests, helped us improve quality by testing and filing good bug reports, and provided answers on JDT forums/newsgroups. Special thanks to the following list of
      people, in alphabetical order, who contributed code to the project: 
      Andrey Loskutov, Chixiaye, Christoph L&#xC3;ubrich, coehlrich, David Thompson, Dominik Wiedner, Ed Merks, fladdimir, Gayan Perera, Hannes Wellmann, 
      H&#xC3;lios GILLES, Jay Arthanareeswaran, Jeff Johnston, Jessica He, Jinbo Wang, J&#xC3;rg Kubitz, Laurent, Manoj N Palat, Mateusz Matela, Michael Keppler, 
      Patrick Ziegler, Sarika Sinha, Sebastian Ratz, Shi Chen, Simeon Andreev, Snjezana Peco, Stephan Herrmann, Till Brychcy, Vikas Chandra for features and bug fixes.
    </p>
    
    <p>The Plug-in Development Environment team would like to thank the numerous contributors who continue to improve the component every release.
        Special thanks to those who contributed code:
        Alshama MS, Christoph L&#xC3;ubrich, Ed Merks, Gireesh Punathil, Hannes Wellmann, J&#xC3;rg Kubitz, Kyle Smith, Lars Vogel, Mickael Istria, Sebastian Ratz and Vikas Chandra 
      </p>

    <p>The Equinox team would like to thank all the contributors that helped improve the project by filing bug reports and enhancement requests.  We also would like to thank the community of developers that have contributed to the Equinox code base this release:
    Andrew Johnson, Andrey Loskutov, Christoph L&#xE4;ubrich, Ed Merks, Eugen Neufeld, Hannes Wellmann, Lars Vogel, Mickael Istria, Rahul Mohanan, Samantha Dawley and Sravan Kumar Lakkimsetti.
      </p>
      
  </div>

</div>



<?php
$html = ob_get_contents();
ob_end_clean();

# Generate the web page
$App->generatePage($theme, $Menu, $Nav, $pageAuthor, $pageKeywords, $pageTitle, $html);
?>

