<?php
session_start();
if (!($_SESSION['semail'])) {
  header("location:signin.php");
}
include("../inc/db.php");

/*  Update code*/
if(isset($_POST['update_profile'])){

$password=$_POST['student_password'];
$confirm_password=$_POST['student_confirm'];

$year=$_POST['student_year'];
$name=$_POST['student_name'];

$email=$_POST['student_email'];
$gender=$_POST['gender'];
$phone=$_POST['student_phone'];
$jis_id=$_POST['jis_id'];
$department=$_POST['department'];
$roll=$_POST['student_roll'];


if ($_FILES['student_picture']['name']) {
      
      $img= time().$_FILES['student_picture']['name'];

     $extar=explode(".","$img");
     $exta=array_reverse($extar);
     $ext=$exta[0];

     if ($ext=='jpg' || $ext='jpeg' || $ext=='png') 
     {
          
       $buf=$_FILES['student_picture']['tmp_name'];
       move_uploaded_file($buf,"../upload_pic/".$img);

       }  

       else
       {

        echo "Picture type not supported";
       }

   


if(strlen($password)<8){
  echo "<script>alert('password shoud be minimum 8 characters!!')</script>";
exit();


}

  //$con=mysqli_connect("localhost","root","","notice_board");

  $update="UPDATE student_signup SET student_name='$name',student_password='$password',student_email='$email',student_roll='$roll', student_pic='$img',student_phone='$phone', jis_id='$jis_id', student_confirm='$confirm_password' WHERE student_email='$_SESSION[semail]' "; 
 $con->query($update);



header("location:student_dashboard.php");
 }

$update="UPDATE student_signup SET student_name='$name',student_password='$password',student_email='$email',student_roll='$roll',student_phone='$phone', jis_id='$jis_id', student_confirm='$confirm_password',department='$department',student_year='$year' WHERE student_email='$_SESSION[semail]' "; 
 $con->query($update);



header("location:student_dashboard.php");


}
?>



<!DOCTYPE html>
<html >
<head>
  <title>Edit profile</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Edit profile</h2>
  <?php
	 include("../inc/db.php");
	$sel="SELECT * FROM student_signup WHERE student_email='$_SESSION[semail]'";
	$rs=$con->query($sel);
	while($row=$rs->fetch_assoc()){

 ?>
  <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);  ?>" method="post" enctype="multipart/form-data">
        
      
      <div><img src="../upload_pic/<?php echo $row['student_pic'] ;?>" class="img-circle" alt="Cinque Terre" width=100px; > </div>
             
        <div class="form-group">
				<label style="font-weight: bold;"  >Student Picture</label>
          <input type="file" class="form-control" name="student_picture">
				</div>

        <div class="form-group">
      <label for="admin_name">Student Name</label>
      <input type="text" class="form-control"   name="student_name" value="<?php echo $row['student_name'];?>">
    </div>       

    <div class="form-group">
      <label for="student_email">Student email</label>
      <input type="email" class="form-control"   name="student_email" value="<?php echo $row['student_email'];?>">
    </div>

     <div class="form-group">
      <label for="student_phone">Student phone</label>
      <input type="number" class="form-control"   name="student_phone" value="<?php echo $row['student_phone'];?>">
    </div>

<div class="form-group">
        <label >Department</label>
        <select class="form-control" name="department" \>
          <option value="<?php echo $row['department'];?>"><?php echo $row['department'];?></option>
          <option>CSE</option>
          <option>ME</option>
          <option>IT</option>
          <option>ECE</option>
          <option>CE</option>
          <option>BME</option>
          <option>EE</option>
          
        </select>
        
      </div>
      <div class="form-group">
        <label ><small>Select Year(im which you studied)</small></label>
        <select class="form-control" name="student_year">
          <option value="<?php echo $row['student_year'];?>"><?php echo $row['student_year'];?></option>
          <option>First Year</option>
          <option>Second Year</option>
          <option>Third Year</option>
          <option>Fourth Year</option>
          
          </select>
        
      </div>
      
      <div class="form-group">
        <label >Student JIS Id</label>
        <input type="text" class="form-control" name="jis_id" 
        value="<?php echo $row['jis_id'];?>">
        
      </div>

      <div class="form-group">
        
        <label  >Student Roll</label>
        <input type="number" class="form-control" name="student_roll"  
        value="<?php echo $row['student_roll'];?>">
        
      </div>

    <div class="form-group">
      <label for="password">Password:</label>
      <input type="password" class="form-control"   name="student_password" value="<?php echo $row['student_password'];?>">
    </div>

     <div class="form-group">
      <label for="password">Password:</label>
      <input type="password" class="form-control"   name="student_confirm" value="<?php echo $row['student_confirm'];?>">
    </div>
  

    
    <button type="submit" class="btn btn-primary" name="update_profile">Update</button>
    <?php
  }
  ?>
  </form>
</div>

</body>
</html>
