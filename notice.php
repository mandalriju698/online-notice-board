<?php
session_start();
if (!($_SESSION['semail'])) {
  header("location:signup.php");
}
include("../inc/db.php");

 
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>college notice</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>All Notice </h2>
  <p>JIS COLLEGE OF ENGINEERING</p><br>
 <!-- <a href="student_dashboard.php"><button type="button" class="btn btn-primary" style="display: flex; justify-content:space-around ; border: 1px solid green;" >Back to Dashboard</button></a> -->
 <form action="search.php" method="post">
        <p><input type="text" name="notice_search" class="form-control" width="25%"></p>
        <p><button type="submit" class ="btn btn-success" placeholder="search notice by date" name="search_btn" id="notice_search_btn">Search  
        </button></p>
</form>


  <table class="table table-hover">
    <thead>
      <tr>
        <th>For </th>
        <th>Notice Date</th>
        <th>Notice subject</th>
        <th>Notice description</th>
        <th>Uploaded Notice</th>
      </tr>
    </thead>
    <tbody>
      <?php
    $sel_notice="SELECT *FROM notice    ORDER BY student_date DESC LIMIT 4 ";

    $result=mysqli_query($con,$sel_notice);
    $files=mysqli_fetch_all($result,MYSQLI_ASSOC);
// code...
   foreach($files as $row):
  // code...
?>
      <tr>
        <td><?php echo $row['student_year']; ?></td>
        <td><?php echo $row['student_date']; ?></td>
        <td><?php echo $row['student_subject']; ?></td>
        <td><?php echo $row['student_description']; ?></td>
        <td><a href="download_file.php?file_id=<?php echo $row['notice_id'];?>" target="_blank"><?php echo $row['notice_file']; ?></a></td>
      </tr>
    <?php endforeach;?>


    </tbody>
  </table>
</div>

</body>
</html>

