<?php

		require '../../dbh.inc.php';

$sql = "SELECT usersName FROM users";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    //echo "id: " . $row["usersName"] . "<br>";
    echo "<input type='checkbox'" . "id='" .  $row["usersName"] . "'" . "name='" . "id"
	    . "'". "value='" . $row["usersId"] . "'" . ">";
	 echo "<label for='" . $row["usersName"] . "'>" . $row["usersName"] . "</label><br>";
  }
} else {
  echo "0 results";
}

 <input type="checkbox" id="user3" name="user3" value="user3">

	  
?>
 
