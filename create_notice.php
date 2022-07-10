<?php
session_start();

if (!($_SESSION['aemail'])) {
  header("location:form.php");
}
include("../inc/db.php");
////

//////
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
function sendmail($year)
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
  ////
   $con=mysqli_connect("localhost","root","","notice_board");
  if($year!='All year')
  {
    $sel="SELECT student_email  FROM `student_signup` WHERE student_year='$year' ";
    $result=$con->query($sel);
    $email=array();
while($result_fetch=$result->fetch_assoc())
{


 $email=$result_fetch['student_email'];
 $mail->setFrom('devilshadow8617@gmail.com', 'JIS College Of Engineering');
 $mail->addAddress($email);
        }
    /////
  }elseif($year='All year')
  {
    $sel="SELECT `student_email`  FROM `student_signup`  ";
    
    $result=$con->query($sel);
    $email=array();
    while($result_fetch=$result->fetch_assoc())
    {
 
    
     $email=$result_fetch['student_email'];
     $mail->setFrom('devilshadow8617@gmail.com', 'JIS College Of Engineering');
     $mail->addAddress($email);
         
             }
  }
  ////
 //Attachments
 //$mail->addAttachment('maillogo/logo.jpeg');         //Add attachments
 //$mail->addAttachment('');    //Optional name

  //Content
  $mail->isHTML(true);                                  //Set email format to HTML
  $mail->Subject = 'NOTICE UPLOADED';
  $mail->Body    = "New notice uploaded...please check the notice..<br><a href='http://localhost/online_notice/notice_board.php'>click here to login JISCE Notice portal..</a>
 <br>
 <br>
 <br>
 <br>
  *************************************
  <br>Thanks and Regards,
  <br>JIS College of Engineering
  <br>Kalyani, West Bengal, 741235
  <br>Contact: +91 9474733974
  <br>*************************************
  <br>
  <img src='https://www.jiscollege.ac.in/JISTech2k20/Hack_img/JISCELogo.png' width='50px'>
  
  <br>
  Ask...Believe...Receive";
  //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

  $mail->send();
  return true;
} catch (Exception $e) {
 return false;
}
}



 ///
 if(isset($_POST['send_notice'])){
  $year=$_POST['year'];
  $date=$_POST['date'];
  $subject=$_POST['subject'];
  $des=$_POST['description'];

if ($_FILES['upload_file']['name']) {
      
      $img= time().$_FILES['upload_file']['name'];

     $destination='notice_file/'.$img;
     $extension=pathinfo($img,PATHINFO_EXTENSION);
     $file=$_FILES['upload_file']['tmp_name'];
     $size=$_FILES['upload_file']['size'];
     if (!in_array($extension,['pdf','docx'])) {
      header("Refresh:3; url=dashboard.php");     
      die("File type not supported");
           
            

     }
     elseif($_FILES['upload_file']['size']>1000000000000)
     {
       echo "File Size is very large....!";
     }
     else
     {
       if(move_uploaded_file($file,$destination))
       {
          $ins="INSERT INTO notice (student_year,student_date,student_subject,student_description,notice_file) 
          VALUES ('$year','$date','$subject','$des','$img') ";
          mysqli_query($con,$ins);
         ////
        
         //
       }
     // 
      sendmail($year);
     header("Refresh:3; url=dashboard.php");
       die("Notice uploaded successfully!!");

    }
 

 }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
  <!-- Latest compiled and minified CSS -->
             <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

            <!-- jQuery library -->
               <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

                   <!-- Latest compiled JavaScript -->
                 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <title>Create a notice</title>

</head>
<body>
    <style >
body
{    
    
    background-color: aliceblue;
}
</style>
<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" enctype="multipart/form-data" >
        <div class="form-group">
    <label for="to_whom">To Whom:</label>
   <select name="year" required="">
         <option value="">Select Year</option>

         <option >First year</option>
         <option>Second year</option>
         <option>Third year</option>
         <option>Fourth year</option>
           <option >All year</option>
         </select>
  </div>
  <div class="form-group">
    <label for="date">Date</label>
    <input type="date" name="date" class="form-control" id="date" required="">
  </div>
  <div class="form-group">
    <label for="subject">Subject</label>
    <input type="text" name="subject" class="form-control" id="subject" autocomplete="off" required="">
  </div>
  <div class="form-group">
    <label for="description">Description</label>
   <textarea rows="5" cols="50" name="description"id="Description" autocomplete="off" required=""></textarea>
  </div>
  <div>
      <center>OR</center>
  </div>

<div class="form-group">
    <label for="file">Upload File</label>
    <input type="file" name="upload_file" class="form-control" >
  </div>

  <button onclick="return confirm('are you sure?');" type="submit" class="btn btn-primary" name="send_notice" value="send_notice">Send notice</button>

  </form>
</body>
</html>