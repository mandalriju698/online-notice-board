
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
<link rel="stylesheet" type="text/css" href="../student/signup.css">
</head>
<body>
	<div><p>
	</p></div>
	<div class="signup-form"  >
		<form action="admin_signupinc.php" method="post" enctype="multipart/form-data" >
			<div class="form-header">
				<h2 style="color:brown;">Registration</h2>
				<p style="color:blue;">Welcome to JIS College Of Engineering</p>
			</div>
			<div class="form-group">
				<label style="font-weight: bold;" > Name</label>
				<input type="text" class="form-control" name="admin_name" placeholder="Example: Riju Mandal" autocomplete="off" required>
				
			</div>
			
		

			<div class="form-group">
				<label style="font-weight: bold;" >Email Address</label>
				<input type="email" class="form-control" name="admin_email" placeholder="someone@gmail.com"  required>
				
			</div>

			<div class="form-group">
				<label style="font-weight: bold;" > Phone no</label>
				<input type="number" class="form-control" name="admin_phone"  autocomplete="off" required>
				
			</div>

        
			

			<div class="form-group">
				<label style="font-weight: bold;"  >Gender</label>
			<input type="radio" name="admin_gender" value="male">Male
			<input type="radio" name="admin_gender" value="female">Female
				</div>

             <div class="form-group">
				<label ><small>Designation</small></label>
				<select class="form-control" name="designation" required>
					<option value="">-select designation-</option>
					<option>Principle</option>
					<option>Dean</option>
					<option>HOD</option>
					<option>faculty staff</option>
					
					
					</select>
				
			</div>
           

             <div class="form-group">
				<label style="font-weight: bold;"  >password</label>
				<input type="password" class="form-control" name="admin_password" placeholder="password" autocomplete="off" required>
				
			</div>

			<div class="form-group">
				<label style="font-weight: bold;"  >Confirm password</label>
				<input type="password" class="form-control" name="admin_confirm" placeholder="confirm password" autocomplete="off" required>
				
			</div>
            

            <div class="form-group">
				<label style="font-weight: bold;"  >Picture</label>
				<input type="file" class="form-control" name="admin_picture"  required>
				
			</div>
            


             

		<div class="form-group">
				<button type="submit" class="btn btn-primary btn-block btn-lg" name="sign_up">sign up</button>
				
			</div>
			
				

			
				
			</div>

			
		</form>
	</div>
		<div class="text-center small" style="color: #f8f9fa;">already have account?<a href="form.php">signin here</a></div>
		
	


</body>
</html>