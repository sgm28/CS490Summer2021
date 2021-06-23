<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
//  include '../../autoload.php';
//   session_start();
 // if(isset($POST['id'])
 // {
 //   echo "Have data";
  //} 

?>

<!DOCTYPE html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<script type="text/javascript" src="./script.js"></script>
<style>
body {font-family: Arial;}

/* Style the tab */
.tab {
  overflow: hidden;
  border: 1px solid #ccc;
  background-color: #f1f1f1;
}

/* Style the buttons inside the tab */
.tab button {
  background-color: inherit;
  float: left;
  border: none;
  outline: none;
  cursor: pointer;
  padding: 14px 16px;
  transition: 0.3s;
  font-size: 17px;
}

/* Change background color of buttons on hover */
.tab button:hover {
  background-color: #ddd;
}

/* Create an active/current tablink class */
.tab button.active {
  background-color: #ccc;
}

/* Style the tab content */
.tabcontent {
  display: none;
  padding: 6px 12px;
  border: 1px solid #ccc;
  border-top: none;
}
</style>
</head>
<body>

<h2>Admin</h2>


<div class="tab">
  <button class="tablinks" onclick="operation(event, 'Register')">Add user</button>
  <button class="tablinks" onclick="operation(event, 'Remove')">Delete User</button>
  <button class="tablinks" onclick="operation(event, 'Disable')">Disable User</button>
</div>

<div id="Register" class="tabcontent">
  <form action="../../signup.inc.php" method="post">
  <div class="container">
    <h3>Register</h3>
    <p>Please fill in this form to create an account.</p>
    <hr>
	
	<label for="email"><b>Full Name</b></label>
    <input type="text" placeholder="John/Jane Doe" name="name" id="name" required>
	

    <label for="email"><b>Email</b></label>
    <input type="text" placeholder="Enter Email" name="email" id="email" required>
	
	<label for="uid"><b>Username</b></label>
    <input type="text" placeholder="superstar123" name="uid" id="uid" required>
	
	

    <label for="pwd"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="pwd" id="pwd" required>

    <label for="cpwd"><b>Repeat Password</b></label>
    <input type="password" placeholder="Repeat Password" name="pwdrepeat" id="cpwd" required>
    <hr>
    <!-- <p>By creating an account you agree to our <a href="#">Terms & Privacy</a>.</p> -->


  </div>
  
  <!-- <div class="container signin">
    <p>Already have an account? <a href="#">Sign in</a>.</p>
  </div> -->
  <!-- <button type="submit" id="submit" name="submit" class="registerbtn" value="Log In">Register</button> -->
  <input type="submit" id="submit" name="submit" value="Sign Up" class="registerbtn">
</form>
</div>

<div id="Remove" class="tabcontent">
  <h3>Remove User</h3>
  <form>
  <input type="radio" id="html" name="fav_language" value="HTML">
  <label for="html">A</label><br>
  <input type="radio" id="css" name="fav_language" value="CSS">
  <label for="css">B</label><br>
  <input type="radio" id="javascript" name="fav_language" value="JavaScript">
  <label for="javascript">C</label>
  <hr>
  <button type="submit" class="deletebtn">Delete</button>

  <!-- <?php include './BackEnd/DisplayuserForDelete.php'; ?> -->

  <hr>
  <button type="submit" class="deactivatebtn">Deactive</button>

</form>  
</div>

<div id="Disable" class="tabcontent">
  <h3>Disable User</h3>
  <form method="post">
    
  <input type="checkbox" id="user1" name="user1" value="user1">
  <label for="vehicle1"> User 1</label><br>
  <input type="checkbox" id="user2" name="user2" value="user2">
  <label for="vehicle2"> User 2</label><br>
  <input type="checkbox" id="user3" name="user3" value="user3">
  <label for="vehicle3"> User 3</label>

  

 <!-- <?php include './BackEnd/Displayuser.php'; ?> -->
  <hr>
  <button type="submit" class="deactivatebtn">Deactive</button>



</form>
</div>

<script>
function operation(evt, cityName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
}
</script>
   
</body>
<script>

</script>
</html> 
<script>
function operation(evt, cityName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
}
</script>