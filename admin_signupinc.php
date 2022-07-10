
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
  <a href='http://localhost/online_notice/admin/verify.php?email=$email&v_code=$activationcode'>Verify </a>
  ";
  //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

  $mail->send();
  return true;
} catch (Exception $e) {
 return false;
}
}


/////////

$password=$_POST['admin_password'];
$confirm_password=$_POST['admin_confirm'];

 $email = $_POST["admin_email"];
   // check if e-mail address is well-formed
   if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

     $emailErr = "Invalid email format";
   }
if($password==$confirm_password )
{


if(isset($_POST['sign_up'])){


$name=$_POST['admin_name'];

$activationcode=md5($name.time());
$gender=$_POST['admin_gender'];
$phone=$_POST['admin_phone'];
$designation=$_POST['designation'];


if ($_FILES['admin_picture']['name']) {
     
     $img= time().$_FILES['admin_picture']['name'];

    $extar=explode(".","$img");
    $exta=array_reverse($extar);
    $ext=$exta[0];

    if ($ext=='jpg' || $ext='jpeg' || $ext=='png') 
    {
         
      $buf=$_FILES['admin_picture']['tmp_name'];
      move_uploaded_file($buf,"admin_upload_pic/".$img);

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

echo $ins="INSERT INTO admin SET admin_name='$name',admin_password='$password',admin_email='$email',
 designation='$designation' ,admin_image='$img',admin_phone='$phone', admin_confirm='$confirm_password',admin_gender='$gender',
 
 verification='$activationcode',status=0 "; 

if (mysqli_query($con,$ins) && sendmail( $_POST['admin_email'],$activationcode)) {
  #If data inserted
  echo
 " <script>
    alert ('Registraion successful....Check Your email to verify .....');
    window.location.href='admin_signup.php';
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
 
header("Refresh:3; url=admin_signup.php");
  die("Password not matched!!!!");
//header("location:signup.php");

}

?>
<h1>Name : <?php echo $name; ?></h1>
<h1>Email : <?php echo $email; ?></h1>
