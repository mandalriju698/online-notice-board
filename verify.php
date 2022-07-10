<?php
include("../inc/db.php");
$con=mysqli_connect("localhost","root","","notice_board");

if(isset($_GET['email'])&& isset($_GET['v_code']))
{   
   echo $query="SELECT * FROM `student_signup` WHERE `student_email`='$_GET[email]' AND `verification`='$_GET[v_code]'   ";
    $result=$con->query($query);
    if($result)
    {
       if(mysqli_num_rows($result)==1)
       {
           $result_fetch=mysqli_fetch_assoc($result);
        $e=$result_fetch['student_email'];
           if($result_fetch['status']==0)
           {

             echo $update="UPDATE student_signup SET `status`='1' WHERE student_email='$e' ";
             if(mysqli_query($con,$update))
             {
                 echo
                 " <script>
                 alert ('Email verification successfull!!');
                 window.location.href='signin.php';
               </script>"; 
             }
             else
             {
                " <script>
                alert ('Can not run query ..some error found!!');
                window.location.href='signup.php';
              </script>"; 
             }
           }
           else
           {
            echo
            " <script>
               alert ('Email Already verified');
               window.location.href='signup.php';
             </script>";  
           }
       }
    }
    else
    {
        echo
        " <script>
           alert ('Cannot run Query');
           window.location.href='signup.php';
         </script>";
    }
}




?>