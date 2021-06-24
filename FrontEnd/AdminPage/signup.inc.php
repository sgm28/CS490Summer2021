<?php 
include "autoload.php";
//Makes sure the users can only access this page by clicking the sign up button. 
//isset checks if specfic data is sent through the URL. 
//Super Global $_POST method is 
$header = "location: main.php";

if(isset($_SESSION['userlevel'])){
	
		$header = "location: FrontEnd/AdminPage/Home.php";
	
}

if(isset($_POST["submit"])) {
	//Grabbing data from the URL
	$name = $_POST["name"];
	$email = $_POST["email"];
	$username = $_POST["uid"];
	$pwd = $_POST["pwd"];
	$pwdRepeat = $_POST["pwdrepeat"];
	
	//Give access to outside documents
	require_once 'dbh.inc.php';
	require_once 'functions.inc.php';
	
	//Send users back to signup page if:
	//Any fields are empty. Error Code: emptyinput
	if (emptyInputSignup($name, $email, $username, $pwd, $pwdRepeat) !== false){
		header($header . "?error=emptyinput");
		exit();
	}
	//Invalid Username. Error Code: invaliduid
	if (invalidUid($username) !== false) {
		header($header . "?error=invaliduid");
		exit();
	}
	//Invalid Email. Error Code: invalidemail
	if (invalidEmail($email) !== false) {
		header($header . "?error=invalidemail");
		exit();
	}
	//Passwords don't match. Error Code: pwdbadmatch
	if (pwdMatch($pwd, $pwdRepeat) !== false) {
		header($header . "?error=pwdbadmatch");
		exit();
	}
	//Username/email already exists. Error Code: usernametaken
	if (uidExists($conn, $username, $email) !== false) {
		header($header . "?error=usernametaken");
		exit();
	}	
	createUser($conn, $name, $email, $username, $pwd);
}

//Send user back to signup page if illegally accessing
//header(): php function which allows users to be sent to differnt URL
else {
	header($header);
	exit();
}