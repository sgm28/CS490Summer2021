<?php
session_start();
include("Classes/post_class.php");
include("Classes/user.php");
include("Classes/profile_class.php");

//Check if there is a user logged in
//Get user and profile data
$results = 0;
if (isset($_SESSION["useruid"])){
	//echo "<li><a href='logout.inc.php'>Log Out</a></li>";
	//echo "</p>Hello there " . $_SESSION["username"]. "</p>";
	$current_user = $_SESSION["username"];

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

<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link href="search.css" type="text/css" rel="stylesheet">

<div id="nav-bar-main">
	<div class="nav-bar-margin"></div>
  <div class="size-limiter">
  <form id="search-main-form" method="get" action="search.php">
    <input name="find" type="text" id="search-main" placeholder="Search users ..." spellcheck="false"/>
    <span class="material-icons">search</span>
   </form>
  </div>
	<div class="nav-bar-margin">
    <div class="pfp">
      <div class="profile-menu hidden">
        <div class="profile-menu-header">
					<?php echo $current_user; ?>
				</div>
        <div class="profile-menu-body">
          <div class="profile-menu-option-list">
            <a href="profile.php" class="profile-menu-option">Profile</a>
            <a class="profile-menu-option">Option 2</a>
            <a class="profile-menu-option">Option 3</a>
          </div>
          <div class="profile-menu-sidebar">
            <a href="logout.inc.php" class="log-out">
              <span class="material-icons">logout</span>
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div id="content-main">
	<div class="size-limiter">
		<div id="search-results">
			<?php
				if ($results){
					foreach ($results as $FRIEND_ROW) {
						include("friend.php");
					}
				}
			?>
		</div>
	</div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="search.js"></script>
