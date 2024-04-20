<?php
include "autoload.php";
?>
<link href="styles.css" type="text/css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
<div class="box-center">
<section class="login-error">
	<?php //Display proper error messages
	if(isset($_GET["error"])){
		if ($_GET["error"] == "emptyinput"){
			echo "<p>Fill in all fields!</p>";
		}
		else if ($_GET["error"] == "wronglogin"){
			echo "<p>Wrong login!</p>";
		}
		else if ($_GET["error"] == "disabled"){
			echo "<p>Your account is disabled :( </p>";
		}
	}
?>
</section>
<!---->
<section class="signup-error">	
	<?php //Display proper error messages
	if(isset($_GET["error"])){
		if ($_GET["error"] == "invaliduid"){
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
  <img src="https://capsource-bucket.s3.us-west-2.amazonaws.com/wp-content/uploads/2019/10/08181040/njit.png" alt="NJIT" width="60%">
  <div class="box-error hidden"><p>test message</p></div>
  <h3> Website will not allow you to sign up because you need to connect to school network using a vpn.
  Please click on the links to watch a video demostration of the website
  </h3>
  <h3> <a href="https://www.loom.com/share/f0208df0516b4b01b1cd4103487f8253?sid=11c25dff-df11-4629-a205-ad67c9667e47">Video 1</a></h3>
  <h3><a href="https://www.loom.com/share/e7f5a5258c6d4aecb6f6f8e63175f29b">Video 2</a></h3>
  <h3><a href="https://www.loom.com/share/d174d1446b794ddfacd61f72b9d626e7">Video 3</a></h3>
  <form class="" id="form" action="login.inc.php" method="post">
    <div class="field sign-up-toggle hidden">
      <label for="name">Full Name</label><br>
      <input class="text-in" type="text" id="name" name="name" spellcheck="false">
    </div>
    <div class="field sign-up-toggle hidden">
      <label for="email">Email</label><br>
      <input class="text-in" type="text" id="email" name="email" spellcheck="false">
    </div>
    <div class="field">
      <label for="uid">Username</label><br>
      <input class="text-in" type="text" id="uid" name="uid" spellcheck="false">
    </div>
    <div class="field">
      <label for="pwd">Password</label><br>
      <input class="text-in" type="password" id="pwd" name="pwd">
    </div>
    <div class="field sign-up-toggle hidden">
      <label for="cpwd">Confirm Password</label><br>
      <input class="text-in" type="password" id="cpwd" name="pwdrepeat">
    </div>
    <input type="submit" id="submit" name="submit" value="Log In">
  </form>
  <p class="sign-up-toggle">Don't have an account yet? <span id="sign-up">Sign up here!</span></p>
  <p class="sign-up-toggle hidden">Already have an account? <span id="log-in">Log in here!</span></p>
</div>
<!--<button class="btn" id="btn">test btn</btn>-->
<!--<button class="btn2" id="btn2"></btn>-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="login_page.js"></script>

