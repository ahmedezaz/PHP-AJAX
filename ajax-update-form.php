<?php

$student_id = $_POST["id"];
$firstName = $_POST["first_name"];
$age = $_POST["last_age"];

$conn = mysqli_connect("localhost","root","","ajaxphp") or die("Connection Failed");

$sql = "UPDATE details SET name = '{$firstName}',age = '{$age}' WHERE id = {$student_id}";

if(mysqli_query($conn, $sql)){
  echo 1;
}else{
  echo 0;
}

?>
