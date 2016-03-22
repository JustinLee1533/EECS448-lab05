<?php
  $uname = $_POST["un"];
  $post = $_POST["post"];

  //dont save if:
  //The post has no text
  //The post was not written by an existing user

  $mysqli = new mysqli("mysql.eecs.ku.edu","jrlee","dog","jrlee");

  if ($mysqli->connect_errno)
  {
      printf("Connect failed: %s\n", $mysqli->connect_error);
      exit();
  }

  if($post == "")
  {
    echo "No text Entered";
  }else if(empty($mysqli->query("SELECT * FROM Users WHERE user_id LIKE '$uname'")->fetch_assoc()))
  {
    echo "User Does not exist";
  }else
  {
    $sql="INSERT INTO Posts (content, author_id) VALUES ('$post', '$uname')";
    $mysqli->query($sql);
    //query it
    echo "Saving Post";
  }
  /* free result set */
  $result->free();
  $mysqli->close();
 ?>
