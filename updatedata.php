<?php
$stu_id = $_POST['Student_ID'];
$stu_name = $_POST['Student_Name'];
$stu_address = $_POST['Student_Address'];
$stu_class = $_POST['Student_Class'];
$stu_phone = $_POST['Student_Phone'];

include 'config.php';

$sql = "UPDATE student SET Student_Name = '{$stu_name}', Student_Address = '{$stu_address}',Student_Class = '{$stu_class}', Student_Phone = '{$stu_phone}' WHERE Student_ID = {$stu_id}";
$result = mysqli_query($conn, $sql) or die("Query Unsuccessful.");

header("Location: http://localhost/CRUD/crud/crud/index.php");

mysqli_close($conn);

?>
