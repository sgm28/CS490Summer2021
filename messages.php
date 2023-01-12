<!DOCTYPE html>
<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link href="message.css" type="text/css" rel="stylesheet">

<?php

include "autoload.php";
require_once "functions.inc.php";
$url  = "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
$display_users = false;
//$last_message_count = checkRows();

function get_users(){
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

    return $all_users;
}

if (isset($_SESSION["useruid"])){
  $current_user = $_SESSION["username"];
  $user = new User();
  $user_data = $user->get_user($_SESSION["userid"]);
  $recipient_data = $user->get_user($_GET['id']);

  //Check if on a different profile page
  if(isset($_GET['id'])){
    $post = new post_class();
    $post_data = $post->get_one_post($_GET['id']);
  }

  if($_SERVER['REQUEST_METHOD'] == "POST")
  {
    //if user exists
    if(is_array($recipient_data)){

      $msg_class = new Messages();
      $error = $msg_class->send($_POST);

      header("Location: messages.php?id=" . $_GET['id'] . "&read=1");
      exit();
    }

    //prevent user from resending data
  if($error == ""){ header("Location: " . $url); die;}
  else{echo "error"; }
  }

  $all_users = get_users();
}
?>
<div id="sidebar">
  <div id="sidebar-header">
    <a id="btn-menu" class="no-select"><span class="material-icons">menu</span></a>
    <h1 id="main-title">Messages</h1>
    <!--<div id="title-wrap">
      <div id="title-msg">Messages</div>
      <div id="title-usn" class="hidden">User Name</div>
    </div>-->
  </div>
  <div id="main-menu-struct-wrap">
    <div id="main-menu">
      <a class="menu-option" href="profile.php">
        <span class="material-icons">person</span>
        Profile
      </a>
      <a class="menu-option">
        <span class="material-icons">settings</span>
        Preferences
      </a>
      <a class="menu-option" href="logout.inc.php">
        <span class="material-icons">logout</span>
        Log Out
      </a>
    </div>
    <div id="quick-search-wrap">
      <input type="text" id="quick-search" placeholder="Search ..." />
    </div>
    <div id="user-list">
      
      <?php 
      foreach($all_users as $USER){
        if(is_array($USER)){
        include "messages_user.php";
      }
      }

      ?>
    </div>
  </div>
</div>
<div id="main-panel">
  <div id="message-panel">
    <div id="message-panel-header">
      <div class="pfp-wrap">
        <div class="pfp"></div>
      </div>
      <div class="recipients"><?php echo $recipient_data['usersName']?></div>
      <div id="btn-convo-info" class="no-select"><span class="material-icons">more_horiz</span></div>
    </div>
    <div id="message-panel-main-wrap" class="hide-scrollbar">
      <div id="message-panel-main" class="hide-scrollbar">
        
        <?php 
//Display messages
if (isset($_GET['read']) && $_GET['read'] == 1) {
  require_once "functions.inc.php";

  $msg_class = new Messages();
  $data = $msg_class->read($_GET['id']);

  $user = new User();
  $FRIEND_ROW = $user->get_user($_GET['id']);

  //include("friend.php");

  if(is_array($data)){

  foreach ($data as $MESSAGE){
    $ROW_USER = $user->get_user($MESSAGE['sender']);

    
    if(i_own_content($MESSAGE)){
        
      include "message_right.php";
    }else{  
      include "message_left.php";
    }
  
  }
}} ?>
    
      </div>
    </div>
    <form id="message-panel-input-panel">
      <!--<div id="message-panel-option-toggle" class="non-input no-select"><div><span class="material-icons">add_circle</span></div></div>-->
      <div id="message-panel-add-options" class="non-input no-select">
        <div class="message-panel-add-option"><span class="material-icons">insert_photo</span></div>
        <div class="message-panel-add-option"><span class="material-icons">gif</span></div>
      </div>
      <!--<div id="message-panel-text-input">
        <span id="message-panel-text-input" class="textarea" role="textbox" contenteditable></span>
      </div>-->
      <!--<textarea type="text" id="message-panel-text-input" placeholder="Aa" spellcheck="false"></textarea>-->
      <div id="message-panel-text-input-outer-wrap">
        <div id="message-panel-text-input-wrap">
          <span id="message-panel-text-input" class="textarea" role="textbox" contenteditable="true" spellcheck="false"style="white-space:nowrap"></span>
        </div>
      </div>
      <div id="message-panel-send" class="non-input no-select"><span class="material-icons">send</span></div>
    </form>
  </div>
  <div id="convo-info-panel" class="active">
    <div class="pfp"></div>

    <div class="recipients"><?php echo $recipient_data['usersName']?></div>
    <div id="convo-options-list">
      <a href='profile.php?id=<?php echo $FRIEND_ROW['usersUid'];?>' class="convo-option">
        <span class="material-icons">person</span>
        Profile
      </a>
      <a class="convo-option">
        <span class="material-icons">more_horiz</span>
        Option 2
      </a>
      <a class="convo-option">
        <span class="material-icons">more_horiz</span>
        Option 3
      </a>
    </div>
  </div>
</div>
<div id="submit-catalyst" class="debug">
  <form method="post" id="form-msg">
    <input name="message" type="text" id="form-msg-input" spellcheck="false">
    <input type="submit" id="submit" value="Submit">
  </form>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.isotope/3.0.6/isotope.pkgd.min.js"></script>
<script src="message1.js"></script>
<script>
var auto_refresh = setInterval(
function ()
{
window.location.reload();
}, 6000); // refresh every 10000 milliseconds
</script>

