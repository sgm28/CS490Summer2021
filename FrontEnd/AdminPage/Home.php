<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link href="admin1.css" type="text/css" rel="stylesheet">


<?php
include "../../autoload.php";

$user = new User();

$all_users = $user->get_friends($_SESSION["userid"]);



?>

<div id="content-main">
  <div id="header">
    <div>Manage Users</div>
    <div id="add-user" class="btn-header no-select">
      <div>
        <span class="material-icons">add</span>
      </div>
      Add User
    </div>
    <a id="log-out" class="btn-header no-select" href="../../logout.inc.php">
      <span class="material-icons">logout</span>
      Log Out
    </a>
  </div>
  <div id="content-wrap">
    <div id="user-list-header">
      <div>Name</div>
      <div>Username</div>
      <div>Change Status</div>
      <div>Delete</div>
    </div>
 
    <div id="user-list"> 
     
    	<?php 
    	$user = new User();
    	$all_other_users = $user->get_friends($_SESSION["userid"]);

    	foreach($all_other_users as $USER){
    		include "single_user.php"; 
    	}
    	?>
    	<!--<button type="submit" class="deactivatebtn">Change Status</button>-->
   
    </div>

    <div id="panel-add-user">
      <div id="add-user-header">Create New User</div>
      <form method="post" action="../../signup.inc.php" id="form-add-user">
        <div class="add-user-field">
          <label for="name">Full Name</label><br>
          <input class="text-in" type="text" id="name" name="name" spellcheck="false">
        </div>
        <div class="add-user-field">
          <label for="email">Email</label><br>
          <input class="text-in" type="text" id="email" name="email" spellcheck="false">
        </div>
        <div class="add-user-field">
          <label for="uid">Username</label><br>
          <input class="text-in" type="text" id="uid" name="uid" spellcheck="false">
        </div>
        <div class="add-user-field">
          <label for="pwd">Password</label><br>
          <input class="text-in" type="password" id="pwd" name="pwd">
        </div>
        <div class="add-user-field">
          <label for="pwdrepeat">Confirm Password</label><br>
          <input class="text-in" type="password" id="pwdrepeat" name="pwdrepeat">
        </div>
        <div id="submit-wrap">
           <!--<div id="submit">Create</div>-->
         <input type="submit" id="submit" name="submit" value="Create">
        </div>
      </form>
    </div>
  </div>
</div>
<!--<?php $user = new User();

$all_users = $user->get_friends($_SESSION['userid']);
foreach ($all_users as $users){
  echo $user->get_active($users['usersId']);
}?>-->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.isotope/3.0.6/isotope.pkgd.min.js"></script>
<script src="admin.js"></script>
