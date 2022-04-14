<?php
session_start();
#-----------------------------------
include_once('include/config.php');
if (isset($_POST['submit'])) {
	$fname = $_POST['first_name'];
	$lname = $_POST['last_name'];
	$email = $_POST['email'];
	$gender = $_POST['gender'];
	$hobbies=implode(',',$_POST['hobby']);
	$password = md5($_POST['password']);
	  $query = mysqli_query($con, "insert into users(first_name,last_name,email,gender,hobbies,password) values('$fname','$lname','$email','$gender','$hobbies','$password')") or die("Error in insert Query");
	
	if ($query) {
		echo "<script>alert('Successfully Registered. You can login now');</script>";
		echo "<script>window.location.href ='index.php'</script>";
	}
}



?>


<!DOCTYPE html>
<html lang="en">

<head>
	<title>User Registration</title>

	<link href="http://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/styles.css">
	<link rel="stylesheet" href="assets/css/plugins.css">
	<link rel="stylesheet" href="assets/css/themes/theme-1.css" id="skin_color" />

	<script type="text/javascript">
		function valid() {
			if (document.registration.password.value != document.registration.password_again.value) {
				alert("Password and Confirm Password Field do not match  !!");
				document.registration.password_again.focus();
				return false;
			}
			return true;
		}
	</script>
	<style>
		<?php include('assets/css/style1.css') ?>
	</style>
</head>

<body class="login">
	<!-- start: REGISTRATION -->
	<div class="row">
		<div class="main-login col-xs-15 col-xs-offset-10 col-sm-15 col-sm-offset-2 col-md-4 col-md-offset-4">
			<div class="box-register">
				<form name="registration" id="registration" method="post" onSubmit="return valid();">
					<div class="account-logo" align="center">
						<a href="index-2.html"><img src="assets/img/logo-dark.png" hight="50" width="50" alt=""></a>
					</div>
					<fieldset>
						<legend>
							Sign Up
						</legend>
						<p>
							Enter your personal details below:
						</p>
						<div class="form-group">
							<label>Fist Name</label>
							<input type="text" class="form-control" name="first_name" placeholder="Firsat Name" required>
						</div>
						<div class="form-group">
							<label>Last Name</label>
							<input type="text" class="form-control" name="last_name" placeholder="Last Name" required>
						</div>
						<div class="form-group">
							<label class="block">
								Gender
							</label>
							<div class="clip-radio radio-primary">
								<input type="radio" id="rg-male" name="gender" value="male" checked>
								<label for="rg-male">
									Male
								</label>
								<input type="radio" id="rg-female" name="gender" value="female">
								<label for="rg-female">
									Female
								</label>
							</div>
						</div>
						<div class="form-group">
							<fieldset>
								<input type="checkbox" name="hobby[]" value="sports" id="sport">
								<label for="sport">Sports</label>
								<input type="checkbox" name="hobby[]" value="music" id="music">
								<label for="music">Music</label>
								<input type="checkbox" name="hobby[]" value="reading" id="read">
								<label for="read">Reading</label>
							</fieldset>
						</div>
						<div class="form-group">
							<label>Email</label>
							<span class="input-icon">
								<input type="email" class="form-control" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" name="email" id="email" placeholder="example@gmail.com" required>
								<i class="fa fa-envelope"></i> </span>
							<span id="user-availability-status1" style="font-size:12px;"></span>
						</div>
						<div class="form-group">
							<label>Password</label>
							<div class="input-icon">
								<input type="password" id="psw" name="password" class="form-control" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>

							</div>
						</div>
						<div class="form-group">
							<label>Confirm Password</label>
							<span class="input-icon">
								<input type="password" class="form-control" name="password_again" placeholder="Password Again" required>
								<i class="fa fa-lock"></i> </span>
						</div>
						<div id="message">
							<h3>Password must contain the following:</h3>
							<p id="letter" class="invalid">A <b>lowercase</b> letter</p>
							<p id="capital" class="invalid">A <b>capital (uppercase)</b> letter</p>
							<p id="number" class="invalid">A <b>number</b></p>
							<p id="length" class="invalid">Minimum <b>8 characters</b></p>
						</div>
						<div class="form-actions">
							<p>
								Already have an account?
								<a href="user-login.php">
									Log-in
								</a>
							</p>
							<button type="submit" class="btn btn-primary pull-right" id="submit" name="submit">
								Submit <i class="fa fa-arrow-circle-right"></i>
							</button>
						</div>
					</fieldset>
				</form>

				<div class="copyright">
					&copy; <span class="current-year"></span><span class="text-bold text-uppercase"> test</span>. <span>All rights reserved</span>
				</div>

			</div>

		</div>
	</div>
	<script src="assets/js/main.js"></script>
	<script src="assets/js/login.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<script>
		jQuery(document).ready(function() {
			Main.init();
			Login.init();
		});
	</script>
	<script>
		<?php include('assets/js/script.js') ?>
	</script>
</body>
<!-- end: BODY -->

</html>