<?php
  $mysqli = new mysqli("mysql.eecs.ku.edu","jrlee","dog","jrlee");

  if ($mysqli->connect_errno)
  {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
  }

  $posts = array_filter($_POST["checkbox"]);
  echo "Deleting ".count($posts)." posts<br>";

  for($i=0; $i<count($posts); $i++)
  {
    echo "Deleting post id: ".$posts[$i]."<br>";
    $query = "DELETE FROM Posts WHERE post_id LIKE '$posts[$i]'";
    $mysqli->query($query);
  }
 ?>
