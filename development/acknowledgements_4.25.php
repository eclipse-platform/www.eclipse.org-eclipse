

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
$keyword = 'eclipse, 4.25, 2022-09, acknowledgements, acknowledgments, thanks';

include($App->getProjectCommon());
header('Content-type: text/plain; charset=utf-8');

#echo '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">';

#*****************************************************************************
#
# index.php
#
# Author:    Sravan Kumar Lakkimsetti and others on Eclipse Project
# Date:      2022-08-30
#
# Description: Eclipse project 2022-09 release acknowledgments page
#
#
#****************************************************************************

#
# Begin: page-specific settings.  Change these.
$pageTitle     = "Eclipse 2022-09 Acknowledgements";
$pageKeywords  = "eclipse, 4.25, 2022-09, acknowledgements, acknowledgments, thanks";
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
  
  
    <h3>Eclipse 2022-09 Acknowledgements</h3>
    
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
     Adam Kiezun, Alexander Fedorov, Alexander Kiselev, Alexander Kurtakov, Alexandr Miloslavskiy, Alexandros Karypidis, Alex Blewitt, 
     Andrew Bachmann, Andre Weinand, Andrew Niefer, Andrey Loskutov, Ardit Ymeri, Atsuhiko Yamanaka, Baltasar Belyavsky, Benjamin Cabe, 
     Benno Baumgartner, BJ Hargrave, Bogdan Gheorghe, Boris Bokowski, Brian de Alwis, Carsten Hammer, Carsten Reckord, Chris McGee, 
     Christoph L&#xE4;ubrich, Conrad Groth, Daniel Christian Mieg, Dani Megert, David Williams, Dean Roberts, Denis Ungemach, Dirk Baeumer, 
     Dirk Fauth, DJ Houghton, Ed Merks, Erich Gamma, Eric Williams, Fabian Pfaff, Frederic Gurr, Gayan Perera, Grant Gayed, Grzegorz Abramczyk, 
     Hannes Wellmann, Holger Voormann, Igor Fedorenko, Ingo Mohr, Ivan Furnadjiev, James Blackburn, Jan Koehnlein, Jason Wang, 
     Jean Michel-Lemieux, Jeff Johnston, Jeff McAffer, Jeremy Flicker, Jeremy Whiting, J&#xF6;rg Kubitz, Johan Compagner, John Arthorne, 
     John Hendrikx, Jonah Graham, Jonas Helming, Jonas Hungershausen, Jonathan Meier, Julian Honnen, Kalyan Prasad Tatavarthi, Karsten Thoms, 
     Keerthi Vasan, Kevin Macguire, Kim Moir, Kit Lo, Krzysztof Daniel, Kyle Smith, Lakshmi P Shanmugam, Lars Vogel, Ludwig Werzowa, 
     Malgorzata Janczarska, Manju Mathew, Marc-Andre Laperle, Mark Aeschlimann, Markus Alexander Kuppe, Markus Keller, Markus Lang, 
     Martin Lippert, Martin Oberhuber, Martin Schreiber, Martin Tauber, Mat Booth, Matthias Becker, Matthias Webhofer, Michael Haubenwallner, 
     Michael Keppler, Michael Valenta, Mickael Istria, Mihai Nita, Mika&#xEB;l Barbero, Mike Majewski, Mykola Nikishov, Mykola Zakharchuk, 
     Niklas Kellner, Niraj Modi, Nitin Dahyabhai, Noopur Gupta, Oleg Besedin, Olivier Croquette, Olivier Thomann, Pascal Rapicault, Patrick Tasse, 
     Patrick Ziegler, Patrik Suzzi, Paul Elder, Paul Pazderski, Paul Webster, Pawel Piech, Pawel Pogorzelski, Petr Bodnar, Phillipus, Piotr Aniola, 
     Ragnar Nevries, Ralf Sternberg, Rastislav Wagner, Remy Suen, Reto Weiss, Richard Gobeli, Robin Stocker, Rodrigo Perretti, Rolf Theunissen, 
     Samantha Dawley, Sarika Sinha, Sebastian Ratz, Serge Beauchamp, Sergey Prigogin, Simeon Andreev, Simon, Simon Scholz, Snjezana Peco, 
     Sonia Dimitrov, Sopot Cela, Sravan Kumar Lakkimsetti, Stefan Dirix, Stefan Winkler, Stefan Xenos, Stephan Herrmann, Steve Francisco, 
     Steven Spungin, Susan Franklin, Szymon Brandys, Szymon Ptaszkiewicz, Terry Parker, Thanh Ha, Thirumala Reddy Mutchukota, Thomas M&#xE4;der, 
     Thomas Schindl, Thomas Watson, Thomas Wolf, Tobias Melcher, Tomasz Zarna, Tom Hochstein, Tom Schindl, Torbj&#xF6;rn Svensson, Torkild U. Resheim, 
     Vasili Gulevich, Veselin Markov, Vikas Chandra, Wayne Beaton, Wim Jongman, Wojciech Sudol, Xi Yan and Zsombor Gegesy.
     We would also like to acknowledge Samantha Dawley for all the build and releng support.
    </p>

    <p>
    We also thank the other Eclipse projects that make up a part of the infrastructure we 
      depend on: Tycho, Orbit, EGit, EMF, ECF  for providing fixes and steady improvements.
    </p>

    <p>The JDT team would like to thank everyone who filed good enhancement requests, helped us improve quality by testing and filing good bug reports, and provided answers on JDT forums/newsgroups. Special thanks to the following list of
      people, in alphabetical order, who contributed code to the project: Alexander Kurtakov, Andrey Loskutov, Carsten Hammer, Christoph L&#xE4;ubrich, 
      Ed Merks, Gayan Perera, Hannes Wellmann, Holger Voormann, Jay Arthanareeswaran, Jeff Johnston, Jinbo Wang, J&#xF6;rg Kubitz, Kalyan Prasad Tatavarthi, 
      Michael Keppler, Mickael Istria, Noopur Gupta, Roland Grunberg, Sarika Sinha, Samantha Dawley, Simeon Andreev, Snjezana Peco, Sravan Kumar Lakkimsetti, 
      Stephan Herrmann, Thomas M&#xE4;der and Zsombor Gegesy for features and bug fixes.
    </p>
    
    <p>The Plug-in Development Environment team would like to thank the numerous contributors who continue to improve the component every release.
        Special thanks to those who contributed code:
        Alexander Kurtakov, Andrey Loskutov, Christoph L&#xE4;ubrich, Ed Merks, Hannes Wellmann, Lars Vogel, Michael Keppler, Mickael Istria, 
        Patrick Ziegler, Samantha Dawley, Sravan Kumar Lakkimsetti and, Vikas Chandra.
      </p>

    <p>The Equinox team would like to thank all the contributors that helped improve the project by filing bug reports and enhancement requests.  We also would like to thank the community of developers that have contributed to the Equinox code base this release:
    Alexander Kurtakov, Andrey Loskutov, Christoph L&#xE4;ubrich, Ed Merks, Frederic Gurr, Hannes Wellmann, Jeff Johnston, J&#xF6;rg Kubitz, Lars Vogel, 
    Mickael Istria, Samantha Dawley, Sarika Sinha, Sravan Kumar Lakkimsetti, Thomas Watson, Torkild U. Resheim and Vikas Chandra.
      </p>
      
  </div>

</div>



<?php
$html = ob_get_contents();
ob_end_clean();

# Generate the web page
$App->generatePage($theme, $Menu, $Nav, $pageAuthor, $pageKeywords, $pageTitle, $html);
?>

