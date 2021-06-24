<?php
include "../../autoload.php";

$user = new User();

if(isset($_GET['id'])){
  foreach ($_GET['id'] as $id){
   $result = $user->swap_active($id);
  };

  header("Location: Home.php");
  exit();
}

?>