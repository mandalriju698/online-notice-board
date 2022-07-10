
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>login to your account</title>
	<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="signin.css">
</head>
<body style="background-image: url(../image/jisce_college.jpg)" >
	<div><p>
	</p></div>
	<div class="signin-form -my-4"  >
		<form action="signin_user.php" method="post">
			<div class="form-header">
				<h4>login to JIS College's Notice board</h4>
				
				
			</div>
			
		

			<div class="form-group ">
				<label>Email</label>
				<input type="email" class="form-control" name="email" placeholder="someone@gmail.com" autocomplete="off" required>
				
			</div>
			<div class="form-group">
				<label>password</label>
				<input type="password" class="form-control" name="password" placeholder="password" autocomplete="off" required>
				
			</div>
			
			<div class="form-group">
				<button type="submit" class="btn btn-primary btn-block btn-lg" name="signin">sign in</button>
				
			</div>
			
				

			
				
			</div>

			
		</form>
	</div>
		<div class="text-center small" style="color: #f8f9fa;font-weight: bolder;">don't have an account?<a href="signup.php">create account</a></div>

		<div class="text-center small" style="color: black; font-weight: bolder;">Back to website??...<a href="../notice_board.php"><small style="color:red;">Back</small></a></div>
	


</body>
</html>