<?php
session_start();
include("Classes/post_class.php");
include("Classes/user.php");
include("Classes/profile_class.php");

//Check if there is a user logged in
//Get user and profile data
$results = 0;
if (isset($_SESSION["useruid"])){
	echo "<li><a href='logout.inc.php'>Log Out</a></li>";
	echo "</p>Hello there " . $_SESSION["username"]. "</p>";
	
	$user = new User();
	$user_data = $user->get_user($_SESSION["userid"]);
	
	if(isset($_GET['find'])){
		$find = addslashes($_GET['find']);
		$sql = "select * from users where usersName like '%$find%' || usersUid like '%$find%'"; 
		$results = readData($sql);
	}else{
		echo "error";
	}	
}
?>
 <div style="min-height: 400px;flex:1;">
		<div id="friends_bar">
			Users<br>
			<?php	  
			if ($results){
				foreach ($results as $FRIEND_ROW) {
					include("friend.php");
				}
			}			
			?>
		</div>
	  </div>