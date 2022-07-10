<?php
session_start();
if (!($_SESSION['aemail'])) {
  header("location:form.php");
}
include("../inc/db.php");








?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  
</head>
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
<form action="search.php" method="post">
        <p><input type="text" name="notice_search" class="form-control" width="25%"></p>
        <p><button type="submit" class ="btn btn-success" placeholder="search notice by date" name="search_btn" id="notice_search_btn">Search  
        </button></p>
</form>
          

  <table class="table table-hover" id="table">
     
    <thead>
      <tr>
        <th>To Whom</th>
        <th>Notice Date</th>
        <th>Notice subject</th>
        <th>Notice description</th>
        <th>Uploaded notice </th>
      </tr>
    </thead>
    <tbody>
      <?php
       $sel_notice="SELECT *FROM notice    ORDER BY student_date DESC LIMIT 4 ";

       $result=mysqli_query($con,$sel_notice);
       $files=mysqli_fetch_all($result,MYSQLI_ASSOC);
  // code...
      foreach($files as $row):
?>    
      <tr>
        <td><?php echo $row['student_year']; ?></td>
        <td><?php echo $row['student_date']; ?></td>
        <td><?php echo $row['student_subject']; ?></td>
        <td><?php echo $row['student_description']; ?></td>
        <td><?php echo $row['notice_file']; ?>"</td>
         <td><a onclick="return confirm('are you sure?');" href="delete_notice.php?del_id=<?php echo $row['notice_id']; ?>"><button class="btn btn-danger"> Remove</button></a></td>

      </tr>
    <?php endforeach; ?>


    </tbody>
  </table>
</div>

</body>
</html>

