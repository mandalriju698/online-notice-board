<?php
session_start();
if (!($_SESSION['aemail'])) {
  header("location:form.php");
}
include("../inc/db.php");
if (isset($_POST['notice_search'])) {
         $s=$_POST['notice_search'];
$sel="SELECT * FROM notice WHERE student_date LIKE '$s%' ";

$results=$con->query($sel);

}
?>

<!DOCTYPE html>
<html lang="en">

<head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <meta http-equiv="X-UA-Compatible" content="ie=edge">
               <title> Dashboard</title>
          <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
                <script>
                  $(document).ready(function(){
                    $("#edit_profile_btn").click(function()
                    {
                      $("#main_contain").load('edit_profile.php')
                    })

                    $("#create_notice_btn").click(function()
                    {
                      $("#main_contain").load('create_notice.php')
                    })

                    $("#view_all_notice_btn").click(function()
                    {
                      $("#main_contain").load('view_notice.php')
                    })

                   $("#notice_search_btn").click(function()
                     {
                       $("#main_contain").load('search.php')
                     })
                  });

                </script>
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
 
    <div class="row">
      <div class="col-md-2">
  
    <div class="left">
        <img src="http://3.bp.blogspot.com/-1nhbYgKhBA4/Txl9Fd6Iu5I/AAAAAAAAAFM/cAKrupxcep8/s1600/JIS+logo+1.png" alt="">
       
    </div>
    </div>
  <div class="col-md-8">
        <center><h1>Dashboard </h1></center>
  </div>
  <div class="col-md-2">
     <div class ="profile" id ="left-sidebar">
 <img src="admin_upload_pic/<?php echo $_SESSION['aimg'];?>" class="img-circle"  > <br>
     <h3 style="color: black  ; font-family: 'Charm'; margin:5px " ><?php echo  $_SESSION['adesignation'];  ?></h3>
        <h4 style="color: blue  ; font-family: 'Charm'; margin:5px " ><?php echo  $_SESSION['aname'];  ?></h4>

      <button type="button" class="btn btn-primary" id="edit_profile_btn"  > edit profile</button> <a href="logout.php"><button type="button" class="btn btn-danger" id="logout notice_btn"  > logout</button></a><br>

  <button type="button" class="btn btn-primary" id="create_notice_btn"  > Create Notice</button>
  <button type="button" class="btn btn-success" id="view_all_notice_btn"  > view all notice</button>
  <button type="button" class="btn btn-primary" id="view_all_notice_btn">Attendence Remarks</button>

 <!-- <button type="button" class="btn btn-success" id="notice_search_btn"  > Search notice</button>-->
  <br>
  
      </div>
  </div>

</div>

  <div class ="container">
    <div class ="row">
     
  <div class="col-md-12" id="main_contain">
 <center> <p style="font-style: italic;">welcome to jis college of engineering</p></center>
</div>
 </div>
 </div>
</body>
</html>