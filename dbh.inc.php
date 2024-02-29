<?php
$serverName = "sql5.freemysqlhosting.net";
$dBUsername = "sql5687781";
$dBPassword = "LZuWfXvCg5";
$dBName = "sql5687781";



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
