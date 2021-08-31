<?php

$studentId = $_POST["id"];

$conn = mysqli_connect('localhost', 'root', '', 'ajaxphp') or die("CONNECTION ERRO");

$sql = "DELETE FROM details WHERE id = {$studentId}";

$result = mysqli_query($conn, $sql) or die("SQL ERROR");

if(mysqli_query($conn, $sql)){
    echo 1;
}else{
    echo 0;
}



?>
