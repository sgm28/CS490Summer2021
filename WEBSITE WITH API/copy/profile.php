<!DOCTYPE html>

<link href="profile.css" type="text/css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<?php 
include "autoload.php";

function checkMainProfile(){
	return (isset($_GET['id']) == false || $_GET['id'] == $_SESSION["useruid"]);
}

/*
function split_url(){
	$url = isset($_GET['url']) ? $_GET['url'] : "profile";
	$url = explode("/", filter_var(trim($url,"/"),FILTER_SANITIZE_URL));

	return $url;
}
$URL = split_url();*/

//Check if there is a user logged in
//Get user and profile data
if (isset($_SESSION["useruid"])){
	//echo "</p>Hello there " . $_SESSION["username"]. "</p>";
	// Variable to store username for recall
	$current_user = $_SESSION["username"];

	$user = new User();
	$user_data = $user->get_user($_SESSION["userid"]);

	$profile = new profile_class();
	//Check if on a different profile page
	if(isset($_GET['id'])){
		$profile_data = $profile->get_profile($_GET['id']);
		$user_data = $profile_data[0];
	}
	//echo "</p>You are viewing " . $user_data["usersUid"]. "</p>";
	}
else{
	header("Location: main.php");
	exit();
}

if (isset($_SESSION["userlevel"])){
	if ($_SESSION["userlevel"] == 1){
		header('Location: ./FrontEnd/AdminPage/Home.php');
		exit();
	}
}

//create post
if($_SERVER['REQUEST_METHOD'] == "POST")
{
	$id = $_SESSION["userid"];
	$post = new post_class();
	$result = $post->create_post($id, $_POST);

	//prevent user from resending data
	if($result == ""){
	header("Location: profile.php");
	die;
	}
	else{
		echo "error";
	}
}

//collect posts
$id = $user_data["usersId"];
$post = new post_class();
//$posts = $post->get_posts($id);
$posts = $post->get_user_posts_by_date($id);

//collect friends
$friend = new user();
$friends = $friend->get_friends($id);

//If first enterting home profile or entering home profile
if(checkMainProfile()){
	$all_posts = $post->get_posts_by_date();
	$posts = $all_posts;
}

//attempt to join posts by friends
/*foreach ($friends as $FRIEND){
	$friend_id = $FRIEND["usersId"];
	$friends_posts = $post->get_posts_order_by_date($friend_id);
	if($friends_posts != false && $posts != false){
		$posts = array_merge($posts,$friends_posts);
	}
}*/
?>

<div id="nav-bar-main">
<div class="nav-bar-margin"></div>
  <div class="size-limiter">
  <form id="search-main-form" method="get" action="search.php">
    <input name="find"type="text" id="search-main" placeholder="Search users ..." spellcheck="false"/>
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
						<?php if(checkMainProfile()): ?>
						<a href="messages.php?id=<?php echo $user_data["usersId"]?>&new=0" class="profile-menu-option">Messages</a>
						<?php else: ?>
						<a href="messages.php?id=<?php echo $user_data["usersId"]?>&new=1" class="profile-menu-option">Message</a>
						<?php endif; ?>
            <a class="profile-menu-option">Option 3</a>
          </div>
          <div class="profile-menu-sidebar">
            <a href="logout.inc.php" class="log-out">
              <span class="material-icons">logout</span>
            </a>

          </div>
        </div>
      </div>
    </div >
  </div>
</div>
<div id="content-main">
	
  <div class="size-limiter">
  	<form id="search-main-form" method="post" action="recipe_search.php">
    <input name="search"type="text" id="search-main" placeholder="Search recipes ..." spellcheck="false"/>
    <span class="material-icons">search</span>
   </form>
   	<?php if(checkMainProfile()){ ?>
		<div id="add-post">
		  <div class="pfp-col">
		    <div class="pfp"></div>
		  </div>
		  <div class="self-post-col">
				<form method="post" id="self-post-text">
			    <div class="msg-input-wrap">
			      <textarea name="post" type="text" id="self-post-text" class="msg-input" placeholder="What's happening?" rows="4" maxlength="200" spellcheck="false"></textarea>
			    </div>
			    <div class="post-action-bar">
			      <div class="post-option">
			        <span class="material-icons">insert_photo</span>
			      </div>
			      <div class="post-option">
			        <span class="material-icons">gif</span>
			      </div>
			      <div class="post-btn-wrap">
			        <button type="submit" value="Post" id="self-post" class="post-btn">Post</button>
						</div>
					</div>
				</form>
		  </div>
		</div>
	  <?php } ?>

		<?php //display posts
			if ($posts){
			  foreach ($posts as $ROW) {
				  $user = new user();
				  $ROW_USER = $user->get_user($ROW['userid']);
				  include("post.php");
			  }
			}
	  ?>

  </div>
</div>

<!--<script src="js/scripts.js"></script>-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="profile.js"></script>
