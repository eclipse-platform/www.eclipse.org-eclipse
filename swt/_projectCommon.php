<?php

/*******************************************************************************
 * Copyright (c) 2009 Denys Digtiar and others.
 * All rights reserved. This program and the accompanying materials
 * are made available under the terms of the Eclipse Public License v1.0
 * which accompanies this distribution, and is available at
 * http://www.eclipse.org/legal/epl-v10.html
 *
 * Contributors:
 *    Denys Digtiar <duemir@gmail.com> - Bug 221524 - Update website to the "new" Phoenix look 
 *******************************************************************************/

	# Set the theme for your project's web pages.
	# See http://eclipse.org/phoenix/
	$theme = "solstice";
	

	# Define your project-wide Navigation here
	# This appears on the left of the page if you define a left nav
	# Format is Link text, link URL (can be http://www.someothersite.com/), target (_self, _blank), level (1, 2 or 3)
	# these are optional
	
	# If you want to override the eclipse.org navigation, uncomment below.
	#$Nav->setLinkList(array());
	
	# Break the navigation into sections
	$Nav->addNavSeparator("SWT Home", 	"/swt/");
	$Nav->addCustomNav("Widgets", "/swt/widgets/", "_self", 3);
	$Nav->addCustomNav("Snippets", "/swt/snippets/", "_self", 3);
	$Nav->addCustomNav("Examples", "/swt/examples.php", "_self", 3);
	$Nav->addCustomNav("FAQ", "/swt/faq.php", "_self", 3);
	$Nav->addCustomNav("Tools", "/swt/tools.php", "_self", 3);
	$Nav->addCustomNav("Javadoc", "/swt/javadoc.php", "_self", 3);
	$Nav->addCustomNav("Documentation", "/swt/docs.php", "_self", 3);
	$Nav->addCustomNav("Community", "/swt/community.php", "_self", 3);
	$Nav->addCustomNav("Bugs", "/swt/bugs.php", "_self", 3);
	$Nav->addCustomNav("Contact Us", "/swt/#contact", "_self", 3);
	
	# Define keywords, author and title here, or in each PHP page specifically
	$pageKeywords	= "eclipse, swt";
	$pageTitle 		= "SWT: The Standard Widget Toolkit";

	# top navigation bar
	# To override and replace the navigation with your own, uncomment the line below.
	$Menu->setMenuItemList(array());
	$Menu->addMenuItem("Eclipse", "/", "_self");
	$Menu->addMenuItem("Platform", "/platform/", "_self");
	$Menu->addMenuItem("SWT", "/swt/", "_self");
	$Menu->addMenuItem("About", "/projects/project_summary.php?projectid=eclipse.platform.swt", "_self");
	
	# To define additional CSS or other pre-body headers
	# $App->AddExtraHtmlHeader('<link rel="stylesheet" type="text/css" href="/default/style.css"/>');
	
	# To enable occasional Eclipse Foundation Promotion banners on your pages (EclipseCon, etc)
	$App->Promotion = TRUE;
	
	# If you have Google Analytics code, use it here
	#$App->SetGoogleAnalyticsTrackingCode("YOUR-CODE");
?>
