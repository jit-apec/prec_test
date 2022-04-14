<?php
session_start();
error_reporting(0);
include('include/config.php');
include('include/checklogin.php');
if (isset($_POST['update'])) {
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$email = $_POST['hobbies'];
	if (!empty($img)) {
		move_uploaded_file($_FILES['image']['tmp_name'], "./assets/img/$img");
		$sql = mysqli_query($con, "Update users set first_name='$fname',last_name='$lname',hobbies='$hobbies',image='$img' where id='" . $_SESSION['id'] . "'") or die("Error In update Query");

	} else {
		$sql = mysqli_query($con, "Update users set first_name='$fname',last_name='$lname',hobbies='$hobbies' where id='" . $_SESSION['id'] . "'") or die("Error In update Query");

	}

	if ($sql) {
		echo "<script>alert('profile updated Successfully');</script>";
		echo "<script>window.location.href='dashboard.php'</script>";
	}

	exit();
}

?>

<!DOCTYPE html>
<html lang="en">

<body>
	<?php include('include/header.php'); ?>
	<div class="main-wrapper">
		<?php include('include/sidebar.php'); ?>
		<div class="page-wrapper">
			<div class="content">
				<div class="row">
					<div class="col-lg-8 offset-lg-2">
						<h4 class="page-title">Edit Profile</h4>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-8 offset-lg-2">
						<h5 style="color: green; font-size:18px; ">
							<?php if ($msg) {
								echo htmlentities($msg);
							} ?>
						</h5>
						<?php

						echo "select * from users where id='" . $_SESSION['id'] . "'";
						$sql = mysqli_query($con, "select * from users where id ='" . $_SESSION['id'] . "'");
						while ($data = mysqli_fetch_array($sql)) {	?>
							<form method="post">


								<div class="row">
									<div class="col-sm-6">
										<div class="form-group">
											<label>First Name <span class="text-danger">*</span></label>
											<input type="text" name="fname" value="<?php echo htmlentities($data['first_name']); ?>" class="form-control">
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group">
											<label>Last Name <span class="text-danger">*</span></label>
											<input type="text" name="lname" value="<?php echo htmlentities($data['last_name']); ?>" class="form-control">
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group">
											<label>hobbies</label>
											<input name="hobbies" value="<?php echo htmlentities($data['hobbies']); ?>" class="form-control">

										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group">
											<img src=".//assets/img/<?php echo $data['image']; ?>" onerror="this.src='./assets/img/user.jpg';" alt="Missing Image" style="height:100px; width:100px; border:1px green solid;">
											<input type="file" name="image" class="form-control">
										</div>
									</div>
								<?php } ?>
								<div class="m-t-20 text-center">
									<button type="submit" name="update" class="btn btn-primary submit-btn">Save</button>
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
	<script src="assets/js/select2.min.js"></script>
	<script src="assets/js/moment.min.js"></script>
	<script src="assets/js/bootstrap-datetimepicker.min.js"></script>
	<script src="assets/js/app.js"></script>
</body>


<!-- edit-patient24:07-->

</html>