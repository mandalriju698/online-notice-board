<?php
session_start();
include("../inc/db.php");
if(isset($_POST['signin'])){

$email=$_POST['email'];
$password=$_POST['password'];

$select_student="SELECT * FROM student_signup WHERE student_email='$email' AND student_password='$password' ";
$rs=$con->query($select_student);
if($rs->num_rows>0)
{
	
	while($row =$rs->fetch_assoc()){
		$_SESSION['sid']=$row['student_id'];
		$_SESSION['semail']=$row['student_email'];
		$_SESSION['sname']=$row['student_name'];
		$_SESSION['simg']=$row['student_pic'];
		$_SESSION['syear']=$row['student_year'];
		
   if($row['status']==1)
   {
	header("location:student_dashboard.php");
   }
   else
   {
	echo
	" <script>
	alert ('Account not verified!!   verify first then try ...');
	window.location.href='signin.php';
  </script>"; 
   }
	}
	
		
		
	
}

}
else
{
	?>
	<script>
		alert("...invalid login....!"); 
		window.location="signup.php";
		
	</script>
	<?php
}
?>