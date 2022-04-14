<?php
session_start();
error_reporting(0);
include('include/config.php');
include('include/checklogin.php');
if(isset($_POST['submit']))
{
	$cno=$_SESSION['cnumber'];
	$email=$_SESSION['email'];
	$newpassword=md5($_POST['pass']);
	date_default_timezone_set('Asia/Kolkata');
	$currentTime = date( 'd-m-Y h:i:s A', time () );
	$query=mysqli_query($con,"update users set password='$newpassword',updationDate='$currentTime' where phoneno='$cno' and email='$email'")or die("error in Update password");
	
	if ($query) {
	echo "<script>alert('Password successfully updated.');</script>";
	echo "<script>window.location.href ='index.php'</script>";
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
	<style><?php include('assets/css/style1.css') ?></style>
    <!--[if lt IE 9]>
		<script src="assets/js/html5shiv.min.js"></script>
		<script src="assets/js/respond.min.js"></script>
	<![endif]-->
<script type="text/javascript">
function valid()
{
 if(document.chngpwd.pass.value!= document.chngpwd.cfpass.value)
{
alert("Password and Confirm Password Field do not match  !!");
document.chngpwd.cfpass.focus();
return false;
}
return true;
}

</script>
</head>

<body>
    <div class="main-wrapper account-wrapper">
        <div class="account-page">
			<div class="account-center">
				<div class="account-box">
                    <form class="form-login" name="chngpwd" method="post" onSubmit="return valid();">
						<legend>
							reset Password
						</legend>
						<p>
							<span style="color:red;"><?php echo htmlentities($_SESSION['errmsg']); ?><?php echo htmlentities($_SESSION['errmsg']="");?></span>
						</p>
							
						<div class="account-logo">
                            <img src="assets/img/logo-dark.png" alt=""></a>
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <div class="input-group">
								<input type="password" id="psw"name="pass" class="form-control" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"required>
								<div class="input-group-append from-control">
									<button type="button" class="fa fa-eye"onclick="myFunction()"></button>
									
								</div>
							</div>
                        </div>
                        <div class="form-group">
                            <label>Confirm Password</label>
							<input type="password" id="cfpass" name="cfpass" class="form-control" placeholder="Confirm Password" required="required">
                        </div>
						<div id="message">
						  <h3>Password must contain the following:</h3>
						  <p id="letter" class="invalid">A <b>lowercase</b> letter</p>
						  <p id="capital" class="invalid">A <b>capital (uppercase)</b> letter</p>
						  <p id="number" class="invalid">A <b>number</b></p>
						  <p id="length" class="invalid">Minimum <b>8 characters</b></p>
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
	<script><?php include('assets/js/script.js') ?></script>
</body>


<!-- login23:12-->
</html>