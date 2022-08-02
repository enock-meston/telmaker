<?php
session_start();
include '../../include/condig.php';

$userID = $_SESSION['user_id'];
  $reference=date("i").rand(9999, 100000000);
  $status=0;
  $file_name =  $_FILES['file']['name']; //getting file name
  $tmp_name = $_FILES['file']['tmp_name']; //getting temp_name of file
  $file_up_name = time().$file_name; //making file name dynamic by adding time before file name
  $filePath = "files/".$file_up_name;

   //moving file to the specified folder with dynamic name

  // query
  if (move_uploaded_file($tmp_name, "files/".$file_up_name)) {
    $_SESSION['reference']=$reference;
    $_SESSION['musicName']=$file_up_name;
    $query = mysqli_query($con,"INSERT INTO `musictbl`(`musicname`, `path`, `clentId`,`referece`,`status`) 
  VALUES ('$file_up_name','$filePath','$userID','$reference','$status')");

  }
  
?>
