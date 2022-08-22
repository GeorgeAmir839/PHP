<?php
require 'connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name=$_POST['name'];
    echo($name);
    $name = strip_tags(htmlspecialchars(trim($_POST['name'])));
    $phone = strip_tags(trim($_POST['phone']));
    $email = strip_tags(trim($_POST['email']));
    $password = md5(trim($_POST['password']));

    if (empty($name) || empty($phone) || empty($email) || empty($password)) {
        echo "empty valied";
        echo '<div class="container">
        <form method="post">
            <button type="submit" class="btn btn-primary con" name="returnregister">return to register page</button>
        </form>
     </div>';
        if (isset($_POST['returnregister'])) {
            header('Location: register.php');
        }
    } else {
        $sql  = "insert into user (name,phone,email,password) values ('$name','$phone','$email','$password') ";
        $op = mysqli_query($conn, $sql);
        if ($op) {
            echo "valied Register";
            header('Location: showalluser.php');
        }
    }
}
   