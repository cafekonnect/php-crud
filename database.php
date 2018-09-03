<?php
session_start();
//initialize variables
$name="";
$address="";
$id=0;
$edit_state=false;
        //1.0 create a connection
  $dbhost ="localhost";
  $dbuser = "root";
  $dbpass ="";
  $dbname="crud";
  $connection= mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
   //if save button is clicked
  if(isset($_POST['save'])){
      $name=$_POST['name'];
      $address=$_POST['address'];
      $query="INSERT INTO info(name, address) VALUES('$name', '$address')";
      mysqli_query($connection, $query);
      $_SESSION['msg']= "Address saved";
      header("Location: index.php");
  }
  if(isset($_POST['update'])){
    $name=  mysqli_real_escape_string($_POST['name']);
    $address=  mysqli_real_escape_string($_POST['address']);   
    $id=  mysqli_real_escape_string($_POST['id']);
  }

  //read from database
  
  $results =  mysqli_query($connection,"SELECT * FROM info " );