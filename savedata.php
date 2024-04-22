<?php

 $stu_name = $_POST['Student_Name'];
 $stu_address = $_POST['Student_Address'];
 $stu_class = $_POST['class'];
 $stu_phone = $_POST['Student_Phone'];

$conn = mysqli_connect("localhost","root","","crud") or die("Connection Failed");

$sql = "INSERT INTO student(Student_Name,Student_Address,Student_Class,Student_Phone)

VALUES ('{$stu_name}','{$stu_address}','{$stu_class}','{$stu_phone}')";
$result = mysqli_query($conn, $sql) or die("Query Unsuccessful.");


header("Location: http://localhost/CRUD/crud/crud/index.php");
mysqli_close($conn);

?>
