<?php
require 'connection.php';
if($_SERVER['REQUEST_METHOD']=='POST'){
    $email = $_POST['email'];
    $passowrd = md5($_POST['password']);

    $sql = "select * from users_data where email='$email' and password='$passowrd'";
    $op = mysqli_query($con,$sql);
    if(mysqli_num_rows($op)==0){
        echo 'Invalid email or password';
    }else{
        echo 'Logged in succefully';
        
        $data = mysqli_fetch_assoc($op);
        $_SESSION['id'] = $data['id'];
        $_SESSION['name'] = $data['name'];
        $_SESSION['email'] = $data['email'];
        echo $_SESSION['name'].'<br>'.$_SESSION['email'];
    }
}













?>