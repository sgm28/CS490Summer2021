<?php
//Enter a new user into the database
function createUser($conn, $name, $email, $username, $pwd){
	$sql = "INSERT INTO users (usersName, usersEmail, usersUid, usersPwd) VALUES (?, ?, ?, ?);"; //? = Placeholders
	$stmt = mysqli_stmt_init($conn);
	
	if(!mysqli_stmt_prepare($stmt, $sql)){
		header("location: main.php?error=stmtfailed");
		exit();
	}
	$hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
	
	mysqli_stmt_bind_param($stmt, "ssss", $name, $email, $username, $hashedPwd);
	mysqli_stmt_execute($stmt);
	mysqli_stmt_close($stmt);
	header("location: main.php?error=none");
	exit();
	
}
function saveQuery($query){
	require 'dbh.inc.php';
	$result = mysqli_query($conn, $query);
	
	if(!$result){ return false;}
	else {return true;}
}

function readData($query){
	require 'dbh.inc.php';
	$result = mysqli_query($conn, $query);
	if(!$result){ return false;}
	else {
		$data = false;
		while($row = mysqli_fetch_assoc($result))
		{	
			$data[] = $row;
		}
		return $data;
		//$row = mysqli_fetch_assoc($result);
		//return $row;
	}	
}

function checkRows(){
	require 'dbh.inc.php';
	$sql = "select count(*) from messages";
	$result = readData($sql)[0];
	$last_message_count = $result['count(*)'];
	return $last_message_count;
}

//Return true(error) username/email already exists in the database
function uidExists($conn, $username, $email){
	//$sql = "SELECT * FROM users WHERE usersUid = ? OR usersEmail = ?;"; //? = Placeholders
	$sql = "SELECT * FROM users WHERE usersUid = '$username' OR usersEmail = '$email';"; //? = Placeholders
	$result = readData($sql);
	//echo $result;
	if ($result){
		return $result;
	}
	else{
		return false;
	}
	/*if (mysqli_num_rows($result) > 0) {
		$row = mysqli_fetch_assoc($result);
		return $row;
	} else {
		return false;
	}
	mysqli_stmt_close($stmt);*/
	
	/*Create a prepared statement to prevent user from writing in destructive code to the input fields
	$stmt = mysqli_stmt_init($conn);
	//Test sql statement by running it inside the database. Exit with error code: stmtfailed
	if(!mysqli_stmt_prepare($stmt, $sql)){
		header("location: ../signup.php?error=stmtfailed");
		exit();
	}
	//Bind user data to the statement
	//mysqli_stmt_bind_param($stmt, "ss", $username, $email);
	//mysqli_stmt_execute($stmt);

	//$string = mysqli_real_escape_string($conn, $sql);
	
	//$resultData = mysqli_stmt_get_result($stmt);
	//Check if the user already exists inside the database
	if($row = mysqli_fetch_assoc($result)){
		echo "5";
		return $row; //Returns all the data of the user if exists inside the database
	}
	else{
		echo "6";
		$result = false;
		return $result;
	}*/
}
//Return true(error) if any fields were empty
function emptyInputSignup($name, $email, $username, $pwd, $pwdRepeat){
	$result;
	if (empty($name) || empty($email) || empty($username) || empty($pwd) || empty($pwdRepeat)){
		$result = true;
	}
	else{
		$result = false;
	}
	return $result;
}
//Return true(error) if username contains anything other than lower/upper case letters and numbers
function invalidUid($username){
	$result;
	if (!preg_match("/^[a-zA-Z0-9]*$/", $username)){
		$result = true;
	}
	else{
		$result = false;
	}
	return $result;
}
//Return true(error) if improper email
function invalidEmail($email){
	$result;
	if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
		$result = true;
	}
	else{
		$result = false;
	}
	return $result;
}
//Return true(error) if passwords dont match
function pwdMatch($pwd, $pwdRepeat) {
	$result;
	if ($pwd !== $pwdRepeat){
		$result = true;
	}
	else {
		$result = false;
	}
	return $result;
}


//Login functions
function emptyInputLogin($username, $pwd){
	$result;
	if (empty($username) || empty($pwd)){
		$result = true;
	}
	else{
		$result = false;
	}
	return $result;
}
function loginUser($conn, $username, $pwd){
	$result = uidExists($conn, $username, $username);
	
	if ($result == false){
		header("location: main.php?error=wronglogin");
		exit();
	}
	
	$uidExists = $result[0];
	$pwdHashed = $uidExists["usersPwd"];
	$checkPwd = password_verify($pwd, $pwdHashed);
	
	if($checkPwd == false){
		header("location: main.php?error=wronglogin");
		exit();
	}
	else if($checkPwd == true){
		session_start();
		/*if (adminCheck($username) == 1){
			header("location: main.php?admin");
			exit();
		}*/
		$_SESSION["userid"] = $uidExists["usersId"];
		$_SESSION["useruid"] = $uidExists["usersUid"];
		$_SESSION["userlevel"] = $uidExists["user_level"];
		$_SESSION["username"] = $uidExists["usersName"];
		//adminCheck($username);
		header("location: profile.php");
		exit();
	}
}

function esc($value){
	return addslashes($value);
}

function split_url(){
	$url = isset($_GET['url']) ? $_GET['url'] : "profile";
	$url = explode("/", filter_var(trim($url,"/"),FILTER_SANITIZE_URL));

	return $url;
}

function i_own_content($row){
	$myid = $_SESSION['userid'];

	if(isset($row['sender']) && $myid == $row['sender']){
		return true;
	}else{
		return false;
	}

}
/*function adminCheck(&$username){
	//echo "inside admin check";
	$servername = "sql2.njit.edu";
	$server_username = "gm348";
	$password = "Mccsql@0317";
	//$_SESSION["userlevel"] = $username;
	try {
		session_start();
		$conn = new PDO("mysql:host=$servername;dbname=gm348", $server_username, $password);

      // set the PDO error mode to exception
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


       $stmt = $conn->prepare("SELECT * FROM 'users'  WHERE usersName= :UserName");
       $params  = array('UserName' => $username);
  
     $stmt->execute($params);
     $count = $stmt->rowCount();
      if($count > 1)
      {
		header('Location: ./FrontEnd/AdminPage/Home.html');
		exit();
        //echo "Inside if";
		$_SESSION["userlevel"] = 2;
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        //echo var_dump($result);
        //echo $result['username'];
        //echo var_dump($result["password"]);
       // echo $resutl['user_level'];
        $userLevel = $result["user_level"];
       // echo $userLevel;
        if($_SESSION["userlevel"] == 4)
        {
		  //$_SESSION["userlevel"] = 1;
          //echo "Inside second if";
          //header("./Login.php");
          header('Location: ./FrontEnd/AdminPage/Home.html');
          exit();
        }
      }
	}
catch(PDOException $e)
  {
          echo "Connection failed " . $e->getMessage();
  }
}*/