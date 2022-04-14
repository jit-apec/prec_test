<?php
session_start();
error_reporting(0);
include('include/config.php');
include('include/checklogin.php');
if(isset($_POST['submit']))
{
	
	$sql=mysqli_query($con,"SELECT password FROM  users where password='".md5($_POST['oldpass'])."' && id='".$_SESSION['id']."'")or die("error in select Query");
	$num=mysqli_fetch_array($sql);
	if($num>0)
	{
		$con=mysqli_query($con,"update users set password='".md5($_POST['npass'])."' where id='".$_SESSION['id']."'")or die("error in update Query");
		echo "<script>alert('Password Changed Successfully !!');</script>";
	}
	else
	{
		echo "<script>alert('Old Password Not Metch !!');</script>";
	}
}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
	<script type="text/javascript">
			function valid()
			{
			 if(document.validation.npass.value!= document.validation.cfpass.value)
			{
			alert("Password and Confirm Password Field do not match  !!");
			document.validation.cfpass.focus();
			return false;
			}
			return true;
			}
		</script>	
		<style><?php include('assets/css/style1.css') ?></style>
	</head>
<body>
<?php include('include/header.php');?>
    <div class="main-wrapper">
<?php include('include/sidebar.php');?>
        <div class="page-wrapper">
            <div class="content">
                <div class="row">
                    <div class="col-md-6 offset-md-3">
                        <h4 class="page-title">Change Password</h4>
                        <form name="validation" id="validation"  method="post" onSubmit="return valid();">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Old password</label>
                                        <input type="password" name="oldpass" class="form-control"  placeholder="New Password" required="required">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>New password</label>
                                        <div class="input-group">
											<input type="password" id="psw"name="npass" placeholder="New Password"class="form-control" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"required>
											<div class="input-group-append from-control">
												<button type="button" class="fa fa-eye"onclick="myFunction()"></button>
											</div>
										</div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Confirm password</label>
                                        <input type="password" name="cfpass" class="form-control"  placeholder="New Password" id="txtConfirmPassword"required="required">
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
                            <div class="row">
                                <div class="col-sm-12 text-center m-t-20">
                                    <button type="submit" id="btnSubmit" class="btn btn-primary submit-btn" name="submit">Update Password</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="sidebar-overlay" data-reff=""></div>
    <script src="assets/js/jquery-3.2.1.min.js"></script>
	<script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery.slimscroll.js"></script>
    <script src="assets/js/app.js"></script>
	<script type="text/javascript">
    function Validate() {
        var password = document.getElementById("txtPassword").value;
        var confirmPassword = document.getElementById("txtConfirmPassword").value;
        if (password != confirmPassword) {
            alert("Passwords do not match.");
            return false;
        }
        return true;
    }
</script>
<script><?php include('assets/js/script.js') ?></script>
</body>


<!-- change-password24:06-->
</html>