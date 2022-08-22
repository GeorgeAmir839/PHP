<?php

require 'connect.php';
// $dataforthisuser=$_SERVER['PHP_SELF'];
// echo($_SESSION['id']);
if(isset($_SESSION['id'])){

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    // echo $id;
    if($_SESSION['id'] != $id){
        header("Location: errorpage.php");
    }
    $sql = "select * from user where id=" . $id;
    $op =  mysqli_query($conn, $sql);
    //   mysqli_num_rows($op);
    if (mysqli_num_rows($op) == 0) {
        echo "error";
    } else {
        $data = mysqli_fetch_assoc($op);
    }
} else {
    
    header("Location: showalluser.php");
}


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $id = $_POST['id'];
    echo 1;
    // $password = trim($_POST['f3']);
    $sql = "update user set name='$name',phone='$phone',email='$email' where id=".$id;
    $op = mysqli_query($conn, $sql);

    if ($op) {
        header("Location: showalluser.php");
    } else {

        echo 'error in update';
    }
}
?>
<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>

    <section class="container mt-3">
        <form action="<?php htmlspecialchars($_SERVER['PHP_SELF'])  ?>" method="post">
            <input type="hidden" class="form-control" value="<?php echo $data["id"] ?>" id="exampleInputEmail1" aria-describedby="emailHelp" name="id">

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">name</label>
                <input type="text" class="form-control" value="<?php echo $data["name"] ?>" id="exampleInputEmail1" aria-describedby="emailHelp" name="name">

            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">phone</label>
                <input type="text" class="form-control" value="<?php echo $data["phone"] ?>" id="exampleInputPassword1" name="phone">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input type="text" class="form-control" value="<?php echo $data["email"] ?>" id="exampleInputEmail1" aria-describedby="emailHelp" name="email">

            </div>


            <button type="submit" class="btn btn-primary" name="f4">Submit</button>
        </form>
    </section>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>

<?php
}else{
   
    header("Location: login.php");
}

?>