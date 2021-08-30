<?php

$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];


$conn = mysqli_connect('localhost', 'root', '', 'ajaxphp') or die("CONNECTION ERROR");

$sql = "INSERT INTO details(name, age) VALUES ('{$first_name}', '{$last_name}')";

//values inside should use {'', '', ''}

if(mysqli_query($conn, $sql)){
    echo 1;
}else{
    echo 0;
}

?>
