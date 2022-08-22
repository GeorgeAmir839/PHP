<?php
require 'connect.php';
if(isset($_SESSION['id']) ){

$sql = "select * from user";
$op = mysqli_query($conn, $sql);   // object 
?>

<!DOCTYPE HTML>
<html>
<head>
    <title>PDO - Read Records - PHP CRUD Tutorial</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
    <style>
        .m-r-1em {margin-right: 1em;}.m-b-1em { margin-bottom: 1em;
        } .m-l-1em {margin-left: 1em; }.mt0 {
 margin-top: 0;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="page-header">
            <h1>Read Products || <a href="add.php">add</a></h1>

        </div>
        <table class='table table-hover table-responsive table-bordered'>
            <!-- creating our table heading -->
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>phone</th>
                <th>email</th>
                <th>Action</th>
            </tr>>
            <?php
                echo '<tr>';
                echo '<td>' . $_SESSION["id"] . '</td>';
                echo '<td>' . $_SESSION["name"] . '</td>';
                echo '<td>' . $_SESSION["phone"] . '</td>';
                echo '<td>' . $_SESSION["email"] . '</td>';
                echo "<td>";
                echo "<a href='delete.php?id=" . $_SESSION['id'] . "' class='btn btn-danger m-r-1em'>Delete</a>";
                echo "<a href='edit.php?id=" . $_SESSION['id'] . "' class='btn btn-primary m-r-1em'>Edit</a> ";
                echo "</td>";
                echo '</tr>';
            ?>
        </table>
    </div>
    <div class="container">
        <form method="post">
            <button type="submit" class="btn btn-primary con" name="returnregister">return to register page</button>
            <button type="submit" class="btn btn-primary con" name="returnlogin">go logout</button>
            <button type="submit" class="btn btn-primary con" name="showalluser">show all user</button>
        </form>
    </div>
    <?php
    if (isset($_POST['returnregister'])) {
        header('Location: register.php');
    }
    if (isset($_POST['returnlogin'])) {
        header('Location: login.php');
    }
    if (isset($_POST['showalluser'])) {
        header('Location: showalluser.php');
    }
    ?>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>

</html>
<?php 
}else{
    header("Location: login.php");
}
?>