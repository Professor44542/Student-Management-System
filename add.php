<?php include 'header.php'; ?>
<div id="main-content">
    <h2 style="margin-left: 13%;">Add New Record</h2>
    <form 
    style="width:72%"
    class="post-form" action="savedata.php" method="post">
        <div class="form-group">
            <label>Name</label>
            <input type="text" name="Student_Name" />
        </div>
        <div class="form-group">
            <label>Address</label>
            <input type="text" name="Student_Address" />
        </div>
        <div class="form-group">
            <label>Class</label>
            <select name="class">
                <option value="" selected disabled>Select Class</option>
                <?php
                include 'config.php';

                $sql = "SELECT * FROM Class_Data";
                $result = mysqli_query($conn, $sql) or die("Query Unsuccessful.");

                while($row = mysqli_fetch_assoc($result)){
                ?>
                <option value="<?php echo $row['Class_ID']; ?>"><?php echo $row['Class_Name']; ?></option>

              <?php } ?>
            </select>
        </div>
        <div class="form-group">
            <label>Phone</label>
            <input type="text" name="Student_Phone" />
        </div>
        <input class="submit" type="submit" value="Save"  />
    </form>
</div>
</div>
</body>
</html>
