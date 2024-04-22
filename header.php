<?php
include "config.php";
session_start();

if (!isset($_SESSION["username"])) {
    header("Location: http://localhost/CRUD/crud/crud/login.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CRUD</title>
    <link rel="stylesheet" href="../crud/css/style.css">
</head>

<body style="background-color: white;">
    <div id="wrappersty">
        <div id="header">
            <h1>ABC School system</h1>
        </div>
        <div id="menu">
            <ul>
                <li>
                    <a href="index.php">Home</a>
                </li>
                <li>
                    <a href="add.php">Add</a>
                </li>
                <li>
                    <a href="update.php">Update</a>
                </li>
                <li>
                    <a href="delete.php">Delete</a>
                </li>

            </ul>
            </div>
           
</div>
            <ul id="admin-login">
                <li style="list-style: none;">
                    <!-- LOGO-Out -->
                        <a href="logout.php" style="
                        position:absolute;
                        text-decoration: none;
                        color:white;
                        margin-left:84vw;
                        font-weight: 600;
                        margin-top:-3%;
                                        ">Hello <?php echo $_SESSION["username"]; ?>, logout</a>
                    
                    <!-- /LOGO-Out -->
                </li>
            </ul>
