<?php

		require '../../dbh.inc.php';

$sql = "SELECT * FROM users";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    
    //echo "id: " . $row["usersName"] . "<br>";
    echo "<input type='checkbox'" . "id='" .  $row["usersName"] . "'" . "name='" . "id[]"
	    . "'". "value='" . $row["usersId"] . "'" . ">";
	 echo "<label for='" . $row["usersName"] . "'>" . $row["usersName"] . " Status: ";

if(isset($row["active"])){
    if($row["active"] == 1){
      echo "[Enabled]"; }
    else{
      echo "[Disabled]";
    }
}
    echo "</label><br>";

  }


 
  
} else {

  echo "0 results";
}



	  
?>
 
