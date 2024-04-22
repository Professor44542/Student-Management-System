<?php include 'header.php'; ?>
<div id="main-content">
    <h2 style="margin-left: 13%;">Edit Record</h2>
    <form
    style="width: 72%;"
    class="post-form" action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
        <div class="form-group">
            <label>Id</label>
            <input type="text" name="Student_ID" />
        </div>
        <input class="submit" type="submit" name="showbtn" value="Show" />
    </form>

    <?php
      if(isset($_POST['showbtn'])){
        include 'config.php';

        $stu_id = $_POST['Student_ID'];

        $sql = "SELECT * FROM student WHERE Student_ID = {$stu_id}";
        $result = mysqli_query($conn, $sql) or die("Query Unsuccessful.");

        if(mysqli_num_rows($result) > 0)  {
          while($row = mysqli_fetch_assoc($result)){
    ?>
    <form class="post-form" action="updatedata.php" method="post">
        <div class="form-group">
            <label for="">Name</label>
            <input type="hidden" name="Student_ID"  value="<?php echo $row['Student_ID']; ?>" />
            <input type="text" name="Student_Name" value="<?php echo $row['Student_Name']; ?>" />
        </div>
        <div class="form-group">
            <label>Address</label>
            <input type="text" name="Student_Address" value="<?php echo $row['Student_Address']; ?>" />
        </div>
        <div class="form-group">
        <label>Class</label>
        <?php
          $sql1 = "SELECT * FROM class_data";
          $result1 = mysqli_query($conn, $sql1) or die("Query Unsuccessful.");

          if(mysqli_num_rows($result1) > 0)  {
            echo '<select name="Student_Class">';
            while($row1 = mysqli_fetch_assoc($result1)){
              if($row['Student_Class'] == $row1['Class_ID']){
                $select = "selected";
              }else{
                $select = "";
              }
              echo  "<option {$select} value='{$row1['Class_ID']}'>{$row1['Class_Name']}</option>";
            }
        echo "</select>";
      }
          ?>
        </div>
        <div class="form-group">
            <label>Phone</label>
            <input type="text" name="Student_Phone" value="<?php echo $row['Student_Phone']; ?>" />
        </div>
    <input class="submit" type="submit" value="Update"  />
    </form>
    <?php
  }
}
}

    ?>
</div>
</div>
</body>
</html>
