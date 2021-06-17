<?php

$serverName = "sql2.njit.edu";
$dBUsername = "gm348";
$dBPassword = "Mccsql@0317";
$dBName = "gm348";


// $serverName = "localhost";
// $dBUsername = "root";
// $dBPassword = "";
// $dBName = "phptest";


//Opens connection to the database
$conn = mysqli_connect($serverName, $dBUsername, $dBPassword, $dBName);

//Open connection fails
if(!$conn){
	die("Connection Failed: " . mysqli_connect_error());
}