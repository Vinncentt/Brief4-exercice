<?php

session_start();



 $mysqli = new mysqli('localhost', 'root', '', 'crud');

 $id = 0; 
  $update = false;
 $firstname = "";
 $lastname = "";

  if(isset($_POST['save'])){
    $nameV = $_POST['firstname'];
    $lastNameV = $_POST['lastname'];

    $mysqli->query("INSERT INTO datastudent (nameS, last_nameS) VALUES ('$nameV', '$lastNameV')");

    // $_SESSION['message'] = "Recorde has been saved!";
    // $_SESSION['msg_type'] = "succes";

    header("location: crud-exe.php");
  }

  if (isset($_GET['delete'])){
    $id = $_GET['delete'];
    $mysqli->query("DELETE FROM datastudent WHERE id = $id"); 
    // $_SESSION['message'] = "Recorde has been deleted!";
    // $_SESSION['msg_type'] = "danger";

    header("location: crud-exe.php");

  }

  if(isset($_GET['edit'])){
    $id = $_GET['edit'];
    $update = true;
    $result = $mysqli->query("SELECT * FROM datastudent WHERE id=$id");
      // if(count($result)==1){}
      $row = $result->fetch_array();
      $firstname = $row['nameS'];
      $lastname = $row['last_nameS']; 
  }
  

  if(isset($_POST['update'])){
    $id = $_POST['id'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];

    $mysqli->query("UPDATE datastudent SET nameS='$firstname', last_nameS='$lastname' WHERE id=$id");

    header('location: crud-exe.php');

  }


?> 