<?php

require 'connect.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "delete from user where id=$id";
    $op =  mysqli_query($conn, $sql);
    //   mysqli_num_rows($op);
    if ($op) {
        header("Location: showalluser.php"); 
    } else {
        echo 'error';
    }
} else {
    header("Location: showalluser.php");
}
