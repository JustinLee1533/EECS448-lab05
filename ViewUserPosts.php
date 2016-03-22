<?php

    $mysqli = new mysqli("mysql.eecs.ku.edu","jrlee","dog","jrlee");

    if ($mysqli->connect_errno)
    {
      printf("Connect failed: %s\n", $mysqli->connect_error);
      exit();
    }

    $uname = $_POST["username"];


    echo "You chose ".$uname." to view posts <br> <br>";

    $query = "SELECT content FROM Posts WHERE author_id LIKE '$uname'";

    if($result = $mysqli->query($query))
    {
      echo "Posts<br>";
      echo "<td>";
      while ($row = $result->fetch_assoc())
      {
        echo "<tr>";
        echo $row["content"];
        echo "<br></td>";
      }
      echo "</tr>";

      $result->free();
    }

    $mysqli->close();

?>
