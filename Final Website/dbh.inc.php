<?php
$serverName = "mysqlonazure1.mysql.database.azure.com";
$dBUsername = "mysqlonazure1@mysqlonazure1";
$dBPassword = "veryLongPassword1!";
$dBName = "gm348";

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