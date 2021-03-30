<?php  				
require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/app.class.php");	
require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/nav.class.php"); 	
require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/menu.class.php"); 	

$App = new App();	
$Nav = new Nav();	
$Menu = new Menu();		

include($App->getProjectCommon());

	#*****************************************************************************
	#
	# Copyright (c) 2008, 2011 IBM Corporation and others.
 	# All rights reserved. This program and the accompanying materials
 	# are made available under the terms of the Eclipse Public License v1.0
 	# which accompanies this distribution, and is available at
 	# http://www.eclipse.org/legal/epl-v10.html
 	# Contributors:
	#     IBM Corporation - initial implementation
	#
	# Author: 		Ant Team
	# Date:			November 26, 2008
	#
	# Description: This is the new main page for the Platform Ant Team website, the old main
	#			   page will redirect to this one in case community members are using old links
	#
	#
	#****************************************************************************
	
	$pageTitle 		= "Platform Ant Project";
	$pageKeywords	= "ant, script, build, xml, platform, debugging, debugger, breakpoints";
	$pageAuthor		= "Ant Team";
	
	include("_sideCommon.php");
	
	$html = <<<EOHTML

<div id="maincontent">
	<div id="midcolumn">
		<h1>$pageTitle</h1>
		<div class="homeitem3col">
			<h2><b>Ant Project Overview</b></h2>
				<p>
					The Ant component is designed to bring the power of Ant and Eclipse together. 
        			Ant is a Java based build tool. In theory it is kind of like make without 
        			make's wrinkles. It exists independent of Eclipse as an <a target="_blank" href="http://ant.apache.org/" target="_top">Apache 
        			open source project</a>. Integrating Ant into Eclipse means:
        		</p>
      			<ul>
        			<li>Executing Ant buildfiles from Eclipse</li>
        			<li>Enabling access to Eclipse resources/function from Ant buildfiles (i.e., 
          				providing Ant tasks for Eclipse)</li>
        			<li>Providing UI support for running Ant buildfiles and managing their output</li>
        			<li>Providing Ant buildfile development facilities (e.g., buildfile editors, 
          				debuggers, ...)</li>
      			</ul>
      			<p>
      				The goal of this component is to make Eclipse's Ant tooling the environment 
        			of choice for Ant users and support Eclipse-based developers in their 
        			product build requirements.
        		</p>
		</div>
		<div class="homeitem3col">
			<h2><b>New and Noteworthy</b></h2>
		    <p>The following is a list of some of the newest and more interesting additions to the component.</p>
			<ul>
                <li>Bugs fixed so far in: <a href="https://bugs.eclipse.org/bugs/buglist.cgi?list_id=3164739&resolution=FIXED&classification=Eclipse&query_format=advanced&bug_status=RESOLVED&bug_status=VERIFIED&bug_status=CLOSED&component=Ant&product=Platform&target_milestone=4.2.1&target_milestone=4.2.2&target_milestone=4.3&target_milestone=4.3%20M1&target_milestone=4.3%20M2&target_milestone=4.3%20M3&target_milestone=4.3%20M4&target_milestone=4.3%20M5&target_milestone=4.3%20M6&target_milestone=4.3%20M7&target_milestone=4.3">4.3 / 4.2.x</a></li>
                <li>Latest <a href="http://download.eclipse.org/eclipse/downloads/drops4/S-4.3M2-201209201300/news/">New and Noteworthy</a> for Eclipse 4.3M2</li>
            </ul>
		</div>
		<div class="homeitem3col">
			<h2><b>Up To The Minute</b></h2>
			<ul>
			     <li>Platform Ant has been migrated to Git, the new repository can be found <a href="http://git.eclipse.org/c/platform/eclipse.platform.git/">here</a> 
			     with all of the ant-specific projects in the <em>ant</em> sub-folder within the repo.</li>
			</ul>
		</div>
	</div>
	<div id="rightcolumn">
		$commonside
	</div>
</div>

EOHTML;

	# Generate the web page
	$App->generatePage($theme, $Menu, $Nav, $pageAuthor, $pageKeywords, $pageTitle, $html);
?>
