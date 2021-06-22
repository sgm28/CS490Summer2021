<?php
class post_class
{
	private $error = "";
	public function create_post($userid, $data){
		if (!empty($data['post'])){
			require_once 'functions.inc.php';
			
			$post = addslashes($data['post']); //addslahes -> escape any special characters the user had used
			$postid = $this->create_postid();
			$parent = 0;
			
			if (isset($data['parent']) && is_numeric($data['parent'])){
				$parent = $data['parent'];
			}
			
			$sql = "insert into posts (userid,postid,post_text,parent) values ('$userid', '$postid', '$post', '$parent')";
			
			$result = saveQuery($sql);
			/*
			$stmt = mysqli_stmt_init($conn);
			if(!mysqli_stmt_prepare($stmt, $sql)){
				header("location: login.php?error=stmtfailed");
				exit();
			}
			mysqli_stmt_bind_param($stmt, "sss", $userid, $postid, $post);
			mysqli_stmt_execute($stmt);
			mysqli_stmt_close($stmt);*/
			
			//header("location: main.php?error=none");
			//exit();
			
		}else{
			$this->error .= "Please type something!";
		}
		return $this->error;
	}
	public function get_posts($id){
		require_once 'functions.inc.php';
		
		$sql = "select * from posts where userid = '$id' order by id desc limit 10";
		$result = readData($sql);
		if($result){ return $result;} else {return false;}
	}
	
	public function get_user_posts_by_date($id){
		require_once 'functions.inc.php';
		
		$sql = "select * from posts where userid = '$id' AND parent = '0' order by date desc limit 10";
		$result = readData($sql);
		if($result){ return $result;} else {return false;}
	}
	
	public function get_posts_by_date(){
		require_once 'functions.inc.php';
		
		$sql = "select * from posts where parent = '0' order by date desc limit 10";
		$result = readData($sql);
		if($result){ return $result;} else {return false;}
	}
	
	public function get_comments($id){
		require_once 'functions.inc.php';
		
		$sql = "select * from posts where parent = '$id' order by id asc limit 10";
		$result = readData($sql);
		if($result){ return $result;} else {return false;}
	}
	
	public function get_one_post($postid){
		require_once 'functions.inc.php';
		
		if(!is_numeric($postid)){return false;}
		
		$sql = "select * from posts where postid = '$postid' limit 1";
		$result = readData($sql);
		if($result){ return $result;} else {return false;}
	}
	
	private function create_postid(){
		$length = rand(4,19);
		$number = "";
		for ($i=0; $i < $length; $i++){
			$new_rand = rand(0,9);
			$number = $number . $new_rand;
		}
		return $number;
	}
}
?>