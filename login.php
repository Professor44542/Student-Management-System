<?php
include "config.php";
session_start();

if (isset($_SESSION["username"])) {
    header("Location: http://localhost/CRUD/crud/crud/index.php");
}
$conn = mysqli_connect("localhost", "root", "", "crud") or die("Connection Failed");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        form {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            width: 300px;
        }

        input[type="text"],
        input[type="password"] {
            width: calc(100% - 20px);
            padding: 10px;
            margin: 5px 0;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        input[type="submit"] {
            width: 100%;
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px;
            margin-top: 10px;
            border-radius: 3px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body style="background-image: url('3.jpg');
opacity: 0.9 ;
background-repeat: no-repeat;
background-attachment: fixed;
background-size: cover;">
    <div id="wrapper-admin" class="body-content">
        <div class="container">
            <div class="row">
                <div class="col-md-offset-4 col-md-4">


                    <!-- Form Start -->
                    <form 
                    action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
                        <h3 class="heading">Admin Login</h3>
                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" name="username" class="form-control" placeholder="" required>
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control" placeholder="" required>
                        </div>
                        <input type="submit" name="login" class="btn btn-primary" value="login" />
                    </form>
                    <!-- /Form  End -->
                    <?php
                    if (isset($_POST['login'])) {
                        include "config.php";
                        if (empty($_POST['username']) || empty($_POST['password'])) {
                            echo '<div class="alert alert-danger">All Fields must be entered.</div>';
                            die();
                        } else {
                            $username = mysqli_real_escape_string($conn, $_POST['username']);
                            $password = ($_POST['password']);
                            $sql = "SELECT user_id, username FROM users WHERE username = '{$username}' AND password = '{$password}'";
                            $result = mysqli_query($conn, $sql) or die("Query Failed.");

                            if (mysqli_num_rows($result) > 0) {

                                while ($row = mysqli_fetch_assoc($result)) {
                                    session_start();
                                    $_SESSION["username"] = $row['username'];
                                    $_SESSION["user_id"] = $row['user_id'];

                                    header("Location: http://localhost/CRUD/crud/crud/index.php");
                                }
                            } else {
                                echo '<div class="alert alert-danger">Username and Password are not matched.</div>';
                            }
                        }
                    }
                    ?>
                    </form>
</body>

</html>
<form