<?php
/*
$serverName = "sql5.freemysqlhosting.net";
$dBUsername = "sql5687781";
$dBPassword = "LZuWfXvCg5";
$dBName = "sql5687781";
*/

$serverName = "sql2.njit.edu";
$dBUsername = "sgm28";
$dBPassword = "hM77K+B#qx(G+/v3";
$dBName = "sgm28";


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