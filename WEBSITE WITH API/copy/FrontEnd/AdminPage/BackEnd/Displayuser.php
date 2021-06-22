<?php

		require '../../dbh.inc.php';

$sql = "SELECT usersName FROM users";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "id: " . $row["usersName"] . "<br>";
  }
} else {
  echo "0 results";
}


?>
