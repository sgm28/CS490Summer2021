<?php
include "../../autoload.php";
$user = new User();

if(isset($_GET['id'])){
  foreach ($_GET['id'] as $id){
   $result = $user->delete_user($id);
  };

  header("Location: Home.php");
  exit();
}

?>