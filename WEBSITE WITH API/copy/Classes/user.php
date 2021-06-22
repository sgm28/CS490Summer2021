<?php

class User{
	
	public function get_data($id){
		require_once "functions.inc.php";
		$query = "select * from users where usersId = '$id' limit 1";
		
		$result = readData($query);
		
		if($result){
			$row = $result[0];
			return $row;
		}
		else { return false;}		
	}
	
	public function get_user($id){
		require_once "functions.inc.php";
		$query = "select * from users where usersId = '$id' limit 1";
		$result = readData($query);
		if($result){
			$row = $result[0];
			return $row;
		}
		else { return false;}		
	}
	
	public function get_friends($id){
		$query = "select * from users where usersId != '$id'";
		$result = readData($query);
		if($result){
			$row = $result;
			return $row;
		}
		else { return false;}		
	}
}
?>