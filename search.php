<?php
session_start();
if (!($_SESSION['semail'])) {
  header("location:signin.php");
}
include("../inc/db.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Searched notices</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

</head>
<style>
    body {

      box-sizing: content-box;
      padding: 10px;
      background: url('../image/dasgboard.png');
      color: rgb(27, 17, 17);
      font-family: 'Charm';
      font-size: 22px;
} 
</style>
<body>

<div class="container">
  <h2>All Notice</h2>
  <p>JIS COLLEGE OF ENGINEERING</p><br>
 <!-- <a href="dashboard.php"><button type="button" class="btn btn-primary" style="display: flex; justify-content:space-around ; border: 1px solid green;" >Back to Dashboard</button></a> -->
         <!-- Search by date
       
  <form action="" method="post">
        <p><input type="text" name="notice_search" class="form-control" width="25%"></p>
   <button type="submit"><i class="fa fa-search">Search</i></button></form>
      

          -->

  <table class="table table-hover" id="table">
     <a href="student_dashboard.php"><button class="btn btn-success">Back to dashboard</button></a>
    <thead>
      <tr>
        <th>For</th>
        <th>Notice Date</th>
        <th>Notice subject</th>
        <th>Notice description</th>
        
      </tr>
    </thead>
    <tbody>
      <?php
    $s= $_POST['notice_search'];
       $sel_notice="SELECT *FROM notice  WHERE student_date LIKE '$s%' OR student_year LIKE '$s%' ";
$rs=$con->query($sel_notice);
while ($row=$rs->fetch_assoc()) {
  // code...
?>
      <tr>
        <td><?php echo $row['student_year']; ?></td>
        <td><?php echo $row['student_date']; ?></td>
        <td><?php echo $row['student_subject']; ?></td>
        <td><?php echo $row['student_description']; ?></td>
        
      </tr>
    <?php }?>


    </tbody>
  </table>
</div>

</body>
</html>

