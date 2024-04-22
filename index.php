<?php
include 'header.php';
?>
<div id="main-content">
  <h2 style="margin-left:13%;">Students Record</h2>
  <div class="col-md-12">
    <?php
    include 'config.php'; // database configuration
    /* Calculate Offset Code */
    $limit = 4; //limit per page
    if (isset($_GET["page"])) {
      $page = $_GET["page"];
    } else {
      $page = 1;
    };
    $offset = ($page - 1) * $limit;

    include 'config.php';
    $conn = mysqli_connect("localhost", "root", "", "crud") or die("Connection Unsuccessful"); //server name,username,password,datbase name
    $sql = "SELECT * FROM student JOIN class_data WHERE student.Student_Class = class_data.Class_ID limit {$offset},{$limit}";
    $result = mysqli_query($conn, $sql) or die("Query Unsuccessful.");
    if (mysqli_num_rows($result) > 0) {
    ?>
      <table cellpadding="7px", style="width: 950px;
      margin-left:13%">

        <thead>
          <th>Id</th>
          <th>Name</th>
          <th>Address</th>
          <th>Class</th>
          <th>Phone</th>
          <th>Action</th>
        </thead>
        <tbody>
          <?php
          while ($row = mysqli_fetch_assoc($result)) {
          ?>
            <tr>
              <td><?php echo $row['Student_ID']; ?></td>
              <td><?php echo $row['Student_Name']; ?></td>
              <td><?php echo $row['Student_Address']; ?></td>
              <td><?php echo $row['Class_Name']; ?></td>
              <td><?php echo $row['Student_Phone']; ?></td>
              <td>
                <a href='edit.php?id=<?php echo $row['Student_ID']; ?>'>Edit</a>
                <a href='delete-inline.php?id=<?php echo $row['Student_ID']; ?>'>Delete</a>
              </td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
    <?php } else {
      echo "<h2>No Record Found</h2>";
    }

    $sql1 = "SELECT * FROM student";
    $result1 = mysqli_query($conn, $sql1) or die("Query Failed.");
    if (mysqli_num_rows($result1) > 0) {
      $total_record = mysqli_num_rows($result1);
      
      $total_page = ceil($total_record / $limit);
      echo  "<ul class='pagination admin-pagination'>";

      echo "<div style='width: 600px; margin: 0 auto; text-align: center;'>";

      if ($page > 1) {
        echo "<li><a href='index.php?page=" . ($page - 1) . "' style='font-size: 13px;'>Prev</a></li>";
      }

      if ($total_record > $limit) {
        for ($i = 1; $i <= $total_page; $i++) {
          if ($i == $page) {
            $active = "active";
            $bgColor = "grey"; // Background color for active page
          } else {
            $active = "";
            $bgColor = ""; // Default background color
          }
          echo '<li class="' . $active . '"><a href="index.php?page=' . $i . '" style="font-size: 13px; color: ' . ($active ? 'blue' : 'black') . '; background-color: ' . $bgColor . ';">' . $i . '</a></li>';
        }
      }

      if ($total_page > $page) {
        echo "<li><a href='index.php?page=" . ($page + 1) . "' style='font-size: 13px;'>Next</a></li>";
      }
      echo "</div>";
      echo "</ul>";
    }

    mysqli_close($conn);
    ?>
  </div>
</div>

</body>

</html>
