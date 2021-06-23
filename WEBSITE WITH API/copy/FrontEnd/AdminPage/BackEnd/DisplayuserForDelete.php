<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

		require '../../dbh.inc.php';

$sql = "SELECT * FROM users";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    //echo "id: " . $row["usersName"] . "<br>";

	echo "<input type='radio'" . "id='" . $row["usersName"] . "'" .  "name='" . "id[]" . "'" . "value='"
	. $row['usersId'] . "'" . ">";
	echo "<label for='" . $row["usersId"] . "'>" . $row["usersName"] . "</label><br>";
    
	
  }
} else {
  echo "0 results";
}

 
	  
?>
 
