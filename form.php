<?php
session_start();

include("../inc/db.php");

if(isset($_POST['login'])){


$e=$_POST['email'];
$p=$_POST['password'];

$sel="SELECT * FROM admin WHERE admin_email='$e' AND admin_password='$p' ";


$rs=$con->query($sel);

if($rs->num_rows>0){
    while($row=$rs->fetch_assoc()){

          $_SESSION['aimg']=$row['admin_image'];
        $_SESSION['aid']=$row['admin_id'];
        $_SESSION['aname']=$row['admin_name'];
        $_SESSION['aemail']=$row['admin_email'];
         $_SESSION['adesignation']=$row['designation'];
         if($row['status']==1)
        {
            header("location:dashboard.php");
        }
        else
        {
            echo
            " <script>
            alert ('Account not verified!!   verify first then try ...');
            window.location.href='form.php';
          </script>"; 
        }
    }
}
else
{?>
 <script>

 alert("Invalid username or password....!!!!");
 window.location="form.php";
</script>   
<?php  
}
}
?>






<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>ADMIN Form</title>
</head>
<body style="background-image: url(../image/JISCE_Campus.jpg);">
    <div class="container">
        <form action="" method="post">
        <div class="heading">
            
                <h1>Admin Login</h1>
                </div>
      
        
        <p>Email: * <input type="email" name="email" placeholder="abc@gmail.com" required > </p>
        
       
        <p>Password *  </p>
        
        <p><input type="password" name="password" required > </p>
        
        <input type="submit" id="btn" name="login" value="login" >

    </form>
   <div class="text-center small" style="color: blue;">don't have an account?<a href="admin_signup.php"><small style="color:red;">create account</small></a></div>
   <div class="text-center small" style="color: black;">Back to website??...<a href="../notice_board.php"><small style="color:red;">Back</small></a></div>
       


</div>
    
</body>
</html>