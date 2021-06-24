<?php 

Class  Messages{

	private $error = "";

	public function send($data){
		if (!empty($data['message'])){
			require_once 'functions.inc.php';
			
			$msgid = $this->create_msgid(60);
			$sender = esc($_SESSION["userid"]);
			$receiver = esc($_GET['id']); 
			$message = $data['message'];
			
			//check for existing thread
			$sql = "select * from messages where (sender = '$sender' && receiver = '$receiver') || (receiver = '$sender' && sender = '$receiver') limit 1";
			$data = readData($sql);

			if(is_array($data)){
				$msgid = $data[0]['msgid'];
			}

			$sql = "insert into messages (sender,msgid,receiver,message) values ('$sender','$msgid','$receiver','$message')";
			
			$result = saveQuery($sql);		
		}else{
			$this->error .= "Please type something!";
		}
		return $this->error;
	}

	public function read_threads(){
		require_once 'functions.inc.php';

		$me = esc($_SESSION["userid"]);
		
		//$sql = "select * from messages where (sender = '$me' || receiver = '$me') group by msgid order by id desc limit 20";
		//replacement for group by since it doesnt work on njit servers.
		$sql = "select msgid from messages where (sender = '$me' || receiver = '$me') group by msgid";
		$msgids = readData($sql);
		$all_users = array();
		if(is_array($msgids)){
		foreach($msgids as $msgid_array){
			$msgid = $msgid_array['msgid'];
			$sql = "select * from messages where msgid = '$msgid' ORDER BY id desc limit 1";
			$result = readData($sql);
			array_push($all_users, $result[0]);
		};
		return $all_users;
	}
	else{
		$temp = array();
		return $temp;
	}
	}

	public function read($userid){
		require_once 'functions.inc.php';
			
		$me = esc($_SESSION["userid"]);
		$other_userid = esc($userid);
		
		$sql = "select * from messages where (sender = '$me' && receiver = '$other_userid') || (receiver = '$me' && sender = '$other_userid') order by id desc limit 20";
		$result = readData($sql);

		if(is_array($result)){
			sort($result);	
		}
		return $result;
	}
	private function create_msgid($length){
		$array = array(0,1,2,3,4,5,6,7,8,9,'a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z','A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z');
		$text = "";
		$length = rand(4,$length);

		for($i=0;$i<$length;$i++){
			$random = rand(0,61);
			$text .= $array[$random];
		}
		return $text;
	}
}

?>