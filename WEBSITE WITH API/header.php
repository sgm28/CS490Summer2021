<?php 
	session_start();
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<meta charset="utf-8">
		<title>PHP Project 01</title>
		<link href="style.css" type="text/css" rel="stylesheet">
	</head>
	
	<nav>
 	<div class="wrapper">
		<a href=main.php"></a>
		<ul>
			<li><a href="main.php">Home</a></li>
			<?php 
			if (isset($_SESSION["useruid"])){
				echo "<li><a href='profile.php'>Profile</a></li>";
				echo "<li><a href='logout.inc.php'>Log Out</a></li>";
			}
			else {
				echo "<li><a href='signup.php'>Sign In</a></li>";
				echo "<li><a href='login.php'>Log In</a></li>";
			}
			?>	
		</ul>
	</div>
	</nav>