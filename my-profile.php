<?php
session_start();
error_reporting(0);
include('include/config.php');
include('include/checklogin.php');
?>
<!DOCTYPE html>
<html lang="en">


<!-- profile22:59-->

<body>
    <?php include('include/header.php'); ?>
    <div class="main-wrapper">
        <?php include('include/sidebar.php'); ?>
        <div class="page-wrapper">
            <div class="content">
                <div class="row">
                    <div class="col-sm-7 col-6">
                        <h4 class="page-title">My Profile</h4>
                    </div>

                    <div class="col-sm-5 col-6 text-right m-b-30">
                        <a href="edit-profile.php" class="btn btn-primary btn-rounded"><i class="fa fa-plus"></i> Edit Profile</a>
                    </div>
                </div>
                <form enctype="multipart/form-data">
                    <?php
                    echo "select * from users where id='" . $_SESSION['id'] . "'";
                    $sql = mysqli_query($con, "select * from users where id='" . $_SESSION['id'] . "'");
                    $cnt = 1;
                    while ($row = mysqli_fetch_array($sql)) { ?>
                        <div class="card-box profile-header">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="profile-view">
                                        <div class="profile-img-wrap">
                                            <div class="profile-img">

                                                <img class="avatar" src=".//assets/img/<?php echo $data['image']; ?>" onerror="this.src='./assets/img/user.jpg';" alt="Missing Image" style="height:100px; width:100px; border:1px green solid;">
                                            </div>
                                        </div>
                                        <div class="profile-basic">
                                            <div class="row">
                                                <div class="col-md-5">
                                                    <div class="profile-info-left">First Name
                                                        <h4 class="user-name m-t-0 mb-0"><?php echo $row['first_name']; ?></h4>
                                                    </div>
                                                    <div class="profile-info-left">Last Name
                                                        <h4 class="user-name m-t-0 mb-0"><?php echo $row['last_name']; ?></h4>
                                                    </div>
                                                    <div class="profile-info-left"><br><br>Email
                                                        <h5 class="user-name m-t-0 mb-0"><?php echo $row['email']; ?></h5>
                                                    </div>

                                                    <div class="profile-info-left"><br>Gender
                                                        <h5 class="user-name m-t-0 mb-0"><?php echo $row['gender']; ?></h5>
                                                    </div>
                                                    <div class="profile-info-left"><br>Hobbies
                                                        <h5 class="user-name m-t-0 mb-0"><?php echo $row['hobbies']; ?></h5>
                                                    </div>
                                                </div>

                                                <div class="col-md-7">
                                                    <ul class="personal-info">

                                                        <li>
                                                            <span class="title">Updatation Date:</span>
                                                            <span class="text"><?php echo $row['updated_at']; ?></span>
                                                        </li></br>
                                                        <li>
                                                            <span class="title">Registration Date:</span>
                                                            <span class="text"><?php echo $row['created_at']; ?></span>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </form>
            </div>

        </div>
    </div>
    <div class="sidebar-overlay" data-reff=""></div>
    <script src="assets/js/jquery-3.2.1.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery.slimscroll.js"></script>
    <script src="assets/js/app.js"></script>
</body>


<!-- profile23:03-->

</html>