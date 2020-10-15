<?php 
	session_start();
	date_default_timezone_set('Asia/Ho_Chi_Minh');
	// ini_set('error_reporting', E_ALL);
	// error_reporting(E_ALL);

	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);
	define('app_path', __DIR__);
	define('controller_path', app_path.'/controllers');
	define('model_path', app_path.'/models');
	define('layout_path', app_path.'/views/layout');
	define('base_path', '/mini-project-1-remake');
	define('admin_templatte_url',base_path.'/public/template-admin');
	define('rows_per_page', 3);

	require_once 'config/config.php';
	require 'core/autoload.php';
	$objMVC = new AppMVC();
	$objMVC->run();
	die();
?>