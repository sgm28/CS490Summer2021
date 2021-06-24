<?php

class profile_class{
	
	function get_profile($id){
		require_once "dbh.inc.php";
		require_once "functions.inc.php";
		
		$query = "select * from users where usersUid = '$id' limit 1";
		$data = readData($query);
		return $data;
		
		
	}
	
}

?>