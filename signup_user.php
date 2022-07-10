<?php
session_start();
include("../inc/db.php");
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
function sendmail($email,$activationcode)
{
 require("PHPMailer/PHPMailer.php") ;
 require("PHPMailer/SMTP.php") ;
 require("PHPMailer/Exception.php") ;
 $mail=new PHPMailer(true);

 
try {
  //Server settings
                        //Enable verbose debug output
  $mail->isSMTP();                                            //Send using SMTP
  $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
  $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
  $mail->Username   = 'devilshadow8617@gmail.com';                     //SMTP username
  $mail->Password   = 'saha@@2000';                               //SMTP password
  $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
  $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

  //Recipients
  $mail->setFrom('devilshadow8617@gmail.com', 'JIS College Of Engineering');
  $mail->addAddress($email);     //Add a recipient

  //Content
  $mail->isHTML(true);                                  //Set email format to HTML
  $mail->Subject = 'Email verification for registraion';
  $mail->Body    = "Thank For the registraion click the link below 
  <a href='http://localhost/online_notice/student/verify.php?email=$email&v_code=$activationcode'>Verify </a>
  ";
  //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

  $mail->send();
  return true;
} catch (Exception $e) {
 return false;
}
}

//////

$password=$_POST['student_password'];
$confirm_password=$_POST['student_confirm'];

$email=$_POST['student_email'];

if($password==$confirm_password  )
{
  

if(isset($_POST['sign_up'])){

$year=$_POST['student_year'];
$name=$_POST['student_name'];
$gender=$_POST['gender'];
$phone=$_POST['student_phone'];
$jis_id=$_POST['jis_id'];
$department=$_POST['department'];
$roll=$_POST['student_roll'];
$activationcode=md5($name.time());

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

    }


if(strlen($password)<8){
	echo "<script>alert('password shoud be minimum 8 characters!!')</script>";
exit();


}

  //$con=mysqli_connect("localhost","root","","notice_board");

  $ins="INSERT INTO student_signup SET student_name='$name',
  student_password='$password',student_email='$email',student_roll='$roll',	
  student_pic='$img',student_phone='$phone', jis_id='$jis_id', student_confirm='$confirm_password'
  ,student_gender='$gender',department='$department',student_year='$year', verification='$activationcode' "; 
 


 if (mysqli_query($con,$ins) && sendmail( $_POST['student_email'],$activationcode)) {
  #If data inserted
  echo
 " <script>
    alert ('Registraion successful....Check your to verify ...');
    window.location.href='signup.php';
  </script>";
  
} 
 
else
{
  echo " <script>
  alert ('Server error!!!');
  
</script>";
  
}
}


}
elseif($password!=$confirm_password)
{
  
header("Refresh:3; url=signup.php");
   die("Password not matched!!!!");
 //header("location:signup.php");

}
?>

