<?php
session_start();
error_reporting(0);
include("include/config.php");
//Checking Details for reset password
if(isset($_POST['submit']))
{
	$contactno=$_POST['phoneno'];
	$email=$_POST['email'];
	echo "select id from  users where phone='$contactno' and email='$email'";
	$query=mysqli_query($con,"select id from  users where phone='$contactno' and email='$email'") or die("Error in Select Query");
	$row=mysqli_num_rows($query);
	if($row>0)
	{
		
$_SESSION['name']=$name;
$_SESSION['email']=$email;
header('location:reset-password.php');

	}
	else
	{
		echo "<script>alert('Invalid details. Please try with valid details');</script>";
		echo "<script>window.location.href ='forget-password.php'</script>";
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
</head>

<body>
    <div class="main-wrapper account-wrapper">
        <div class="account-page">
			<div class="account-center">
				<div class="account-box">
                    <form method="post" class="form-signin">
					<legend>
								Forget Password
							</legend>
							<p>
								<span style="color:red;"><?php echo htmlentities($_SESSION['errmsg']); ?><?php echo htmlentities($_SESSION['errmsg']="");?></span>
							</p>
							
						<div class="account-logo">
                            <img src="assets/img/logo-dark.png" alt=""></a>
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email"name="email" autofocus="" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Phone Numbar</label>
                            <input type="text"name="phoneno" class="form-control">
                        </div>
                        <div class="form-group text-center">
                            <button type="submit"name="submit" class="btn btn-primary account-btn">Reset</button>
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
	
</body>


<!-- login23:12-->
</html>