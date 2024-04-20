<?php

class User{
	
	public function get_data($id){
		require_once "functions.inc.php";
		$query = "select * from UsersCS490 where usersId = '$id' limit 1";
		
		$result = readData($query);
		
		if($result){
			$row = $result[0];
			return $row;
		}
		else { return false;}		
	}
	
	public function get_user($id){
		require_once "functions.inc.php";
		$query = "select * from UsersCS490 where usersId = '$id' limit 1";
		$result = readData($query);
		if($result){
			$row = $result[0];
			return $row;
		}
		else { return false;}		
	}
	
	public function get_friends($id){
		require_once "functions.inc.php";
		$query = "select * from UsersCS490 where usersId != '$id'";
		$result = readData($query);
		if($result){
			$row = $result;
			return $row;
		}
		else { return false;}		
	}


	public function get_active($id){
		require_once "functions.inc.php";
		$query = "select active from UsersCS490 where usersId = '$id' || usersUid = '$id'";
		$result = readData($query);
		if($result){
			$row = $result[0]['active'];
			return $row;
		}
		else { return false;}		
	}

	public function swap_active($id){
		require_once "functions.inc.php";
		$status = $this->get_active($id);
		if($status == 0){$status=1;}
		elseif ($status == 1){$status=0;}

		$query = "update UsersCS490 set active = '$status' where usersId = '$id'";
		$result = saveQuery($query);
		if($result){
			return true;
		}
		else { return false;}		
	}

	public function delete_user($id){
		require_once "functions.inc.php";
		
		$query = "DELETE FROM UsersCS490 WHERE usersId = '$id'";
		$result = saveQuery($query);

		$query = "DELETE FROM posts WHERE userid = '$id'";
		$result = saveQuery($query);

		if($result){
			return true;
		}
		else { return false;}		
	}


}
?>