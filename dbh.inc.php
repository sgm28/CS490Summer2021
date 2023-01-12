<?php
$serverName = "us-cdbr-east-04.cleardb.com";
$dBUsername = "b7b26247d5c94b";
$dBPassword = "deff33f1";
$dBName = "heroku_f15190f36edb630";



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
