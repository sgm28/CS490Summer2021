<!-- Put this before any PHP -->
<!DOCTYPE html>
<head>
  <title>Recipe Results</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="recipe_search.css" type="text/css" rel="stylesheet">
</head>
<?php
//Check if there is a user logged in
//Get user and profile data
if (isset($_SESSION["useruid"])){
  //echo "</p>Hello there " . $_SESSION["username"]. "</p>";
  // Variable to store username for recall
  $current_user = $_SESSION["username"];
  $user = new User();
  $user_data = $user->get_user($_SESSION["userid"]);

} else {
  header("Location: main.php");
  exit();
}
?>
<body>
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
            <a href="messages.php?id=<?php echo $user_data["usersId"]?>&read=1" class="profile-menu-option">Messages</a>
            <?php else: ?>
            <a href="messages.php?id=<?php echo $user_data["usersId"]?>&read=1" class="profile-menu-option">Message</a>
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
  <form id="search-main-form" method="post" action="recipe_search.php">
    <input name="search"type="text" id="search-main" placeholder="Search recipes/ingredients ..." spellcheck="false"/>
    <span class="material-icons">search</span>
  </form>
  <div id="recipe-list">
    <!-- OUTPUT THE RECIPES HERE -->
  </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="recipe_search.js"></script>
</body>
