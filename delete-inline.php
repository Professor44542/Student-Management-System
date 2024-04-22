<?php

$stu_id = $_GET['id'];

include 'config.php';

$sql = "DELETE FROM student WHERE Student_ID = {$stu_id}";
$result = mysqli_query($conn, $sql) or die("Query Unsuccessful.");

header("Location: http://localhost/CRUD/crud/crud/index.php");


mysqli_close($conn);

?>
