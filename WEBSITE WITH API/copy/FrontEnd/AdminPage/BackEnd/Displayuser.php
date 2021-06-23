<?php

		require '../../dbh.inc.php';

$sql = "SELECT * FROM users";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    //echo "id: " . $row["usersName"] . "<br>";
    echo "<input type='checkbox'" . "id='" .  $row["usersName"] . "'" . "name='" . "id"
	    . "'". "value='" . $row["usersId"] . "'" . ">";
	 echo "<label for='" . $row["usersId"] . "'>" . $row["usersName"] . "</label><br>";
  }
} else {
  echo "0 results";
}

 
	  
?>
 
