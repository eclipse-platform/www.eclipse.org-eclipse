<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/app.class.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/nav.class.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/menu.class.php");
$App  = new App();
$Nav = new Nav();
$Menu  = new Menu();
$right_nav = FALSE;
$keyword = 'readme, eclipse';
require_once($_SERVER['DOCUMENT_ROOT'] ."/eclipse/development/nova/_projectCommon.php");