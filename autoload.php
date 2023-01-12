<?php
session_start();

include("Classes/post_class.php");
include("Classes/user.php");
include("Classes/profile_class.php");
include("Classes/message_class.php");


if(!defined("ROOT")){
	//create root 
	$root = $_SERVER['REQUEST_SCHEME'] . "://" . $_SERVER['SERVER_NAME'] . $_SERVER['PHP_SELF'];
	$root = trim(str_replace("router.php", "", "$root"), "/");

	define("ROOT", $root . "/");
}
