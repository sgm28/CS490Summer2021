<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
  include '../../autoload.php';
	session_start();

if(isset($_POST['id']))
  {
	  if($_POST['formid']=='Remove')
	  {
	  	echo "Delete tab was called";

      require '../../dbh.inc.php';

     echo var_dump($_POST); 
      $sql = "DELETE FROM users WHERE usersId ='" .  $_POST['id'][0]. "'";
		$result = $conn->query($sql);

		if ($result = $conn->query($sql)) {
	
	 echo "Delete operation successful";
		}
	else {
   		 printf("Delete operation unsuccesful: %s\n", $conn->error);
	}
           

                 
          
         
          
   } else {
          echo "No form has been clicked";
	  
        }






  } 
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
  <form method="post" id="Remove" name="Remove">

 

  <?php include './BackEnd/DisplayuserForDelete.php'; ?>

  <hr>
   <input type="hidden" id="custId" name="formid" value="Remove">
   <button type="submit" class="deletebtn">Delete</button>

</form>  
</div>

<div id="Disable" class="tabcontent">
  <h3>Disable User</h3>
  <form method="post">
    
  

  <?php include './BackEnd/Displayuser.php'; ?> 
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
