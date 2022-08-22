<?php


session_start();

$host = "localhost";
$userName = "root";
$password = "";
$dbname = "task1";

$conn = mysqli_connect($host,$userName,$password,$dbname);
if(!$conn){
    die('error: '.mysqli_connect_error());
}
?>
