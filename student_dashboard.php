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
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <meta http-equiv="X-UA-Compatible" content="ie=edge">
                <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
                       <script>
                      $(document).ready(function()

                      {
                        $("#edit_profile_btn").click(function(){
                         $("#main_contain").load('edit_profile.php')
                        })

                        $("#view_all_notice_btn").click(function(){
                         $("#main_contain").load('notice.php')
                        })




                      });     
                    




                       </script>

                <title>Student dashboard</title>
               
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


.left img {
        width:7em;
        

        
 }


.row img {
  border-radius: 120px;
  width : 85px;
  }




    
</style>
<body>
  
  
  
  
    <div class ="row">
      <div class="col-md-2">
        
        <div class="left">
        <img src="http://3.bp.blogspot.com/-1nhbYgKhBA4/Txl9Fd6Iu5I/AAAAAAAAAFM/cAKrupxcep8/s1600/JIS+logo+1.png" alt="">
        
    </div>
      </div>
      <div class="col-md-8">
       <center><h1>Dashboard</h1></center> 
        
      </div>

      <div class ="col-md-2" id ="left-sidebar">
 <img src="../upload_pic/<?php echo $_SESSION['simg'];?>" class="img-circle" > <br>
        <h5 style="color: blue  ; font-family: 'Charm'; margin:5px " ><?php echo  $_SESSION['sname'];  ?></h5>
      <button type="button" class="btn  btn-primary" id="edit_profile_btn"  > edit profile</button><br>

  
  
  <button type="button" class="btn btn-success" id="view_all_notice_btn"  > view all notice</button>
  <br>
  <a href="logout.php"><button type="button" class="btn btn-danger" id="logout notice_btn"  > logout</button></a>
      </div>
    </div>
    
  
  

<div class="container">
<div class="row">
  <div class="col-md-12">
    <div class="mb-3" id="main_contain">
  <center> <p style="font-style: italic;">welcome to jis college of engineering</p></center>
</div>
  </div>
  
</div>

</div>
</body>
</html>