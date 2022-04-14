<?php
session_start();
error_reporting(0);
include("include/config.php");
if(isset($_POST['submit']))
{
	$result=mysqli_query($con,"SELECT * FROM users WHERE email='".$_POST['username']."' and password='".md5($_POST['password'])."'");
	echo "SELECT * FROM users WHERE email='".$_POST['username']."' and password='".md5($_POST['password'])."'";
	$num=mysqli_fetch_array($result);
	if($num>0)
	{

		$_SESSION['id']=$num['id'];
		header("location:dashboard.php");
		exit();
	}
	else
	{
		$_SESSION['errmsg']="Invalid username or password";
		header("location:index.php");
		exit();
	}
}
?>

<!DOCTYPE html>
<html lang="en">


<!-- login23:11-->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">
    <title>HMS</title>
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <!--[if lt IE 9]>
		<script src="assets/js/html5shiv.min.js"></script>
		<script src="assets/js/respond.min.js"></script>
	<![endif]-->
	<style><?php include('assets/css/style1.css') ?></style>
</head>

<body>
    <div class="main-wrapper account-wrapper">
        <div class="account-page">
			<div class="account-center">
				<div class="account-box">
                    <form method="post" class="form-signin">
					<legend>
								Sign in to your account
							</legend>
							<p>
								<span style="color:red;"><?php echo htmlentities($_SESSION['errmsg']); ?><?php echo htmlentities($_SESSION['errmsg']="");?></span>
							</p>
							
						<div class="account-logo">
                            <img src="assets/img/logo-dark.png" alt=""></a>
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="text"name="username"placeholder="example@gmail.com"pattern="[^ @]*@[^ @]*" autofocus="" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Password</label><div class="input-group">
                            
							<div class="input-group">
								<input type="password" id="psw"name="password" class="form-control" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"required>
								<div class="input-group-append from-control">
									<button type="button" class="fa fa-eye"onclick="myFunction()"></button>
									
								</div>
							</div>
						</div>
						        
						<div id="message">
						  <h3>Password must contain the following:</h3>
						  <p id="letter" class="invalid">A <b>lowercase</b> letter</p>
						  <p id="capital" class="invalid">A <b>capital (uppercase)</b> letter</p>
						  <p id="number" class="invalid">A <b>number</b></p>
						  <p id="length" class="invalid">Minimum <b>8 characters</b></p>
						</div>
                        <div class="form-group text-right">
                            <a href="forget-password.php">Forgot your password?</a>
                        </div>
                        <div class="form-group text-center">
                            <button type="submit"name="submit" class="btn btn-primary account-btn">Login</button>
                        </div>
						
                        <div class="text-center register-link">
                            Don’t have an account? <a href="registration.php">Register Now</a>
                        </div>
                    </form>
                </div>
			</div>
        </div>
    </div>
    <script src="assets/js/jquery-3.2.1.min.js"></script>
	<script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/app.js"></script>
	<script>
			jQuery(document).ready(function() {
				Main.init();
				Login.init();
			});
		</script>
		<script><?php include('assets/js/script.js') ?></script>
	
</body>


<!-- login23:12-->
</html>