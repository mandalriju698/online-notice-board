<?php    
session_start();

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>create new account</title>
	<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="signup.css">
</head>
<body>
	<div><p>
	</p></div>
	<div class="signup-form"  >
		<form action="signup_user.php" method="post" enctype="multipart/form-data" >
			<div class="form-header">
				<h2>Student Registration</h2>
				<p>Welcome to JIS College Of Engineering</p>
			</div>
			<div class="form-group">
				<label >Student Name</label>
				<input type="text" class="form-control" name="student_name" placeholder="Example: Riju Mandal" autocomplete="off" required>
				
			</div>
			
		

			<div class="form-group">
				<label>Email Address</label>
				<input type="email" class="form-control" name="student_email" placeholder="someone@gmail.com" autocomplete="off" required>
				
			</div>

			<div class="form-group">
				<label >Student Phone no</label>
				<input type="number" class="form-control" name="student_phone"  autocomplete="off" required>
				
			</div>


			<div class="form-group">
				<label >Department</label>
				<select class="form-control" name="department" required>
					<option value="">-select department-</option>
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
				<select class="form-control" name="student_year" required>
					<option value="">-select year-</option>
					<option>First Year</option>
					<option>Second Year</option>
					<option>Third Year</option>
					<option>Fourth Year</option>
					
					</select>
				
			</div>

			<div class="form-group">
				<label >Gender</label>
			<input type="radio" name="gender" value="male">Male
			<input type="radio" name="gender" value="female">Female
				</div>

             
             <div class="form-group">
				<label >Student JIS Id</label>
				<input type="text" class="form-control" name="jis_id" 
				autocomplete="off" required>
				
			</div>

             <div class="form-group">
				
				<label  >Student Roll</label>
				<input type="number" class="form-control" name="student_roll"  autocomplete="off" required>
				
			</div>


            <div class="form-group">
				<label >password</label>
				<input type="password" class="form-control" name="student_password" placeholder="password" autocomplete="off" required>
				
			</div>

			<div class="form-group">
				<label >Confirm password</label>
				<input type="password" class="form-control" name="student_confirm" placeholder="confrim password" autocomplete="off" required>
				
			</div>
            

            <div class="form-group">
				<label >Student Picture</label>
				<input type="file" class="form-control" name="student_picture"  required>
				
			</div>
            


             <div class="form-group">
				<label class="checkbox-inline"><input type="checkbox" required>I accept the <a href="#">Terms of use</a> @amp; <a href="#">privacy policy</a></label>
				
			</div>

			
			<div class="form-group">
				<button type="submit" class="btn btn-primary btn-block btn-lg" name="sign_up">sign up</button>
				
			</div>
			
				

			
				
			</div>

			
		</form>
	</div>
		<div class="text-center small" style="color: #f8f9fa;">already have account?<a href="signin.php">signin here</a></div>
		
	


</body>
</html>