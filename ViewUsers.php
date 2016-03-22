<?php
  $mysqli = new mysqli("mysql.eecs.ku.edu","jrlee","dog","jrlee");

  /* check connection */
  if ($mysqli->connect_errno)
  {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
  }

  $query = "SELECT user_id FROM Users";

  if($result = $mysqli->query($query))
  {
    echo "User List<br>";
    /* fetch associative array */
    echo "<td>";
    while ($row = $result->fetch_assoc())
    {
	echo "<tr>";
        echo $row["user_id"];
	echo "<br></td>";
    }
    echo "</tr>";
    /* free result set */
    $result->free();
  }

/* close connection */
$mysqli->close();
?>
