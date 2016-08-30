<?php 	
	error_reporting(E_ALL);
	require_once "config.php";
	require_once "guestbook.php";
	
	require_once "/vendor/twig/twig/lib/Twig/Autoloader.php";	
	Twig_Autoloader::register();
	
	$loader = new Twig_Loader_Filesystem('./templates');
	$twig = new Twig_Environment($loader, array(
	 'cache' => './tmp/cache',
	));	

	$guestbook = new Guestbook(DB_HOST, DB_NAME, DB_USER_NAME, DB_USER_PASSWORD, "guestbook");
	
	$template = $twig->loadTemplate('./index.phtml');
	$params = array("guestbook" => $guestbook->last());
	$template->display($params);

	