<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link href="profile.css" type="text/css" rel="stylesheet">

<?php
include "autoload.php";

//Check if there is a user logged in
//Get user and profile data
if (isset($_SESSION["useruid"])){
	$current_user = $_SESSION["username"];
	$user = new User();
	$user_data = $user->get_user($_SESSION["userid"]);

	//Check if on a different profile page
	if(isset($_GET['id'])){
		$post = new post_class();
		$post_data = $post->get_one_post($_GET['id']);
	}

	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		$id = $_SESSION["userid"];
		$post = new post_class();
		$result = $post->create_post($id, $_POST);

		//prevent user from resending data
		if($result == ""){
			header("Location: single_post.php?id=" . $_GET['id']);
			die;
		}
		else{
			echo "error";
		}
	}
}
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
	<?php if ($post_data){
		  foreach ($post_data as $ROW) {
			  $user = new user();
			  $ROW_USER = $user->get_user($ROW['userid']);
			  include("post.php");
		  }
	  }
	 ?>
  <div class="add-comment">
  <div class="pfp-col">
   <div class="pfp"></div>
 </div>
 <div class="add-comment-col">
 <form method="post" id="self-post-text">
   <div class="msg-input-wrap">
     <textarea name="post" type="text" class="msg-input" placeholder="Write a reply ..." rows="3" maxlength="200" spellcheck="false"></textarea>
	 <input type="hidden" name="parent" value="<?php echo $ROW['postid'] ?>">
   </div>
   <div class="comment-action-bar">
     <div class="comment-option">
       <span class="material-icons">insert_photo</span>
     </div>
     <div class="comment-option">
      <span class="material-icons">gif</span>
     </div>
     <div class="comment-btn-wrap">
       <button class="comment-btn">Comment</button>
     </div>
   </div>
   </form>
 </div>
 </div>

<!--<div id="content-main">
  <div class="size-limiter">
<form method = "post">
	<textarea name="post" placeholder="Post a comment"></textarea>
	<input type="hidden" name="parent" value="<?php echo $ROW['postid'] ?>">
	<button type="submit" value="Post" class="w3-button w3-theme"><i class="fa fa-pencil"></i>  Post</button>
</form>-->

<?php
$comments = $post->get_comments($ROW['postid']);
if(is_array($comments)){
	foreach ($comments as $COMMENT){
		$comment_user = $user->get_user($COMMENT['userid']);
		include("comment.php");
	}
}
?>
  </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="profile.js"></script>
