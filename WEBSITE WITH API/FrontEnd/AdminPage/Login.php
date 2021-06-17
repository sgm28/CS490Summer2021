<?php

$username = $password = "";

//Retriving the data from index.html
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $username = clean_data($_POST["usn"]);
  $password = clean_data($_POST["pw"]);

  //hashing password
  $hashPass = password_hash($password, PASSWORD_BCRYPT); 

  //attemting to connect to database
  connect(); 
}


//Function to clean the data to prevent cross site scripting
function clean_data($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}


//function to connect to database
function connect() {
        //TODO validate user credentials

  $servername = "sql2.njit.edu";
  $username = "sgm28";
  $password = "hM77K+B#qx(G+/v3";

  try {

      $conn = new PDO("mysql:host=$servername;dbname=sgm28", $username, $password);

      // set the PDO error mode to exception
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      echo "Connected successfully";
  }

  catch(PDOException $e)
  {
          echo "Connection failed " . $e->getMessage();
  }
}

function AdminCheck($username)
{
    $conn = new PDO("mysql:host=$servername;dbname=sgm28", $username, $password);

      // set the PDO error mode to exception
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      $stmt = $conn->prepare("SELECT username FROM `UsersCS490`  WHERE username= :UserName");

      $params  = array('UserName' => $username);
  
      $stmt->execute($params);
      $count => $stmt->rowCount();
      if($count > 0)
      {
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $userLevel = $result['user_level'];

        if($userLevel == 1)
        {
          header("./index.html", TRUE, 301);
          exit();
        }
      }
}




?>
