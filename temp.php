<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">


<link href="message.css" type="text/css" rel="stylesheet">
<link href="search.css" type="text/css" rel="stylesheet">

<?php

include "autoload.php";
require_once "functions.inc.php";
$url  = "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
$display_users = false;
//$last_message_count = checkRows();

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
    $user_class = new User();
    //if user exists
    if(is_array($user_class->get_user($_GET['id']))){

      $msg_class = new Messages();
      $error = $msg_class->send($_POST);

      header("Location: temp.php?id=" . $_GET['id'] . "&read=1");
      exit();
    }

    //prevent user from resending data
  if($error == ""){
  header("Location: " . $url);
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
   <!--<div class="add-comment">
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
 </div>-->

<!--<div id="content-main">
  <div class="size-limiter">
<form method = "post">
  <textarea name="post" placeholder="Post a comment"></textarea>
  <input type="hidden" name="parent" value="<?php echo $ROW['postid'] ?>">
  <button type="submit" value="Post" class="w3-button w3-theme"><i class="fa fa-pencil"></i>  Post</button>
</form>-->
<?php 
//Display messages
if (isset($_GET['read']) && $_GET['read'] == 1) {
  require_once "functions.inc.php";

  $msg_class = new Messages();
  $data = $msg_class->read($_GET['id']);

  $user = new User();
  $FRIEND_ROW = $user->get_user($_GET['id']);

  include("friend.php");

  if(is_array($data)){

  foreach ($data as $MESSAGE){
    $ROW_USER = $user->get_user($MESSAGE['sender']);

    
    if(i_own_content($MESSAGE)){

      include "message_right.php";
    }else{  
      include "message_left.php";
    }
  
  }
}
  
 //Send message input
  echo '<div id="add-post">
      <div class="pfp-col">
        <div class="pfp"></div>
      </div>
  <div class="self-post-col">
        <form method="post" id="self-post-text">
          <div class="msg-input-wrap">
            <textarea name="message" type="text" id="self-post-text" class="msg-input" placeholder="Write your message here" rows="4" maxlength="200" spellcheck="false"></textarea>
          </div>
          <div class="post-action-bar">
            <div class="post-option">
              <span class="material-icons">insert_photo</span>
            </div>
            <div class="post-option">
              <span class="material-icons">gif</span>
            </div>
            <div class="post-btn-wrap">
              <button type="submit" value="Send" id="self-post" class="post-btn">Post</button>
            </div>
          </div>
        </form>
      </div> </div>';  
}

//If never chatted with user before
else if (isset($_GET['new']) && $_GET['new'] == 1) {
  $msg_class = new Messages();
  $old_thread = $msg_class->read($_GET['id']);
  if(is_array($old_thread)){
      header("Location: temp.php?id=" . $_GET['id'] . "&read=1");
      exit();
  }

  echo "Start new message";
  $user = new User();
  $FRIEND_ROW = $user->get_user($_GET['id']);

  include("friend.php");

  //Send message input
  echo '<div id="add-post">
      <div class="pfp-col">
        <div class="pfp"></div>
      </div>
  <div class="self-post-col">
        <form method="post" id="self-post-text">
          <div class="msg-input-wrap">
            <textarea name="message" type="text" id="self-post-text" class="msg-input" placeholder="Write your message here" rows="4" maxlength="200" spellcheck="false"></textarea>
          </div>
          <div class="post-action-bar">
            <div class="post-option">
              <span class="material-icons">insert_photo</span>
            </div>
            <div class="post-option">
              <span class="material-icons">gif</span>
            </div>
            <div class="post-btn-wrap">
              <button type="submit" value="Send" id="self-post" class="post-btn">Post</button>
            </div>
          </div>
        </form>
      </div> </div>';
}else{
  if(isset($_GET['new']) && $_GET['new'] == 0){
    echo "MESSAGES";
    $display_users = true;
    $msg_class = new Messages();
    $existing_messages = $msg_class->read_threads(); 
    $all_users = array();
    $user = new user();
    foreach($existing_messages as $MESSAGE){
      if($MESSAGE['sender'] == $_SESSION['userid']){
        $receiver = $user->get_user($MESSAGE['receiver']);
        array_push($all_users, $receiver);
      }
      else{
        $sender = $user->get_user($MESSAGE['sender']);
        array_push($all_users, $sender);
      }
    }
  }else{
    echo "error";
  }
}
  ?>

<div id="content-main">
  <div class="size-limiter">
    <div id="search-results">
      <?php
        if ($display_users){
          foreach ($all_users as $FRIEND_ROW) {
            include("thread.php");
          }
        }
      ?>
  </div>
</div>
</div>

  </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!--<script>
var auto_refresh = setInterval(
function ()
{
window.location.reload();
}, 5000); // refresh every 10000 milliseconds
</script>-->
<script src="profile.js"></script>
<script src="message1.js"></script>

