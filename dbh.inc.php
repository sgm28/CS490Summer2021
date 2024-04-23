<?php


/*

Database information is in text file databaseinformation.txt
I did not include the databaseinformation.txt in the github repository for 
security reasons.


*/

$serverName = "";
$dBUsername = "";
$dBPassword = "";
$dBName = "";


/*
$serverName = "localhost";
$dBUsername = "root";
$dBPassword = "";
$dBName = "phptest";
*/

//Opens connection to the database
$conn = mysqli_connect($serverName, $dBUsername, $dBPassword, $dBName);


//Open connection fails
if(!$conn){
	die("Connection Failed: " . mysqli_connect_error());
}






?>