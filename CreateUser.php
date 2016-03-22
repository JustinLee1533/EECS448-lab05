<?php
  $uname = $_POST["un"];

  function addUser()
  {
    $uname = $_POST["un"];

    $mysqli = new mysqli("mysql.eecs.ku.edu","jrlee","dog","jrlee");

    /* check connection */
    if ($mysqli->connect_errno) {
        printf("Connect failed: %s\n", $mysqli->connect_error);
        exit();
    }

    if(($mysqli->query("INSERT INTO Users (user_id) VALUES ('".$uname."')"))===true)
    {
      echo "adding username ".$uname." to the list";
    }else
    {
      echo "Username taken";
    }
    /* close connection */
    $mysqli->close();
  }

  if($uname != "")  //called from html
  {
    addUser();
  }else
  {
    echo "No username entered";
  }


?>
