<?php include_once "header.php" ?>
	
<!---->
<section class="signup-form">	
	<?php //Display proper error messages
	if(isset($_GET["error"])){
		if ($_GET["error"] == "emptyinput"){
			echo "<p>Fill in all fields!</p>";
		}
		else if ($_GET["error"] == "invaliduid"){
			echo "<p>Choose a proper username!</p>";
		}
		else if ($_GET["error"] == "invalidemail"){
			echo "<p>Choose a proper email!</p>";
		}
		else if ($_GET["error"] == "pwdbadmatch"){
			echo "<p>Passwords don't match!</p>";
		}
		else if ($_GET["error"] == "stmtfailed"){
			echo "<p>Something went wrong, try again!</p>";
		}
		else if ($_GET["error"] == "usernametaken"){
			echo "<p>Username already taken!</p>";
		}
		else if ($_GET["error"] == "none"){
			echo "<p>You have signed up!</p>";
		}
	}
?>
</section>



<?php include_once "footer.php" ?>