<?php
include "includes/database.php";
include "includes/human_user.php";


$database = new database();
$db = $database->connect();
$human_user = new human_user($db);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $human_user->human_id = 1;
    $human_user->human_fullname = $_REQUEST['human_fullname'];
    $human_user->human_phone = $_REQUEST['human_phone'];
    $human_user->human_email = $_REQUEST['human_email'];
    $human_user->human_message = $_REQUEST['human_message'];
    $human_user->human_date_updated = date('Y-m-d', time());

    if ($human_user->update()) {
        $status = "Update successful!";
    }
}

$human_user->human_id = 1;
$human_user->read();
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>Dashboard</title>

    <!-- Fontfaces CSS-->
    <link href="css/font-face.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/theme.css" rel="stylesheet" media="all">
    <script src="http://kit.fontawesome.com/d8627d2dca.js" crossorigin="anonymous"></script>

</head>


<body class="animsition">
    <div class="page-wrapper">

        <?php include 'includes/sidebar.php' ?>

        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->
            <?php include 'includes/header.php' ?>
            <!-- HEADER DESKTOP-->

            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="overview-wrap">
                                    <h2 class="title-1">EDIT USER PROFILE</h2>
                                </div>
                            </div>
                        </div>

                        <?php if(isset($status)){ ?>
                        <div class="alert alert-success">
                            <?php echo $status?>
                        </div>
                        <?php } ?>  

                        <div class="row m-t-15">
                            <div class="col-md-12">
                                <form action="human.php" method="post" enctype="multipart/form-data" class="form-horizontal">
                                    <div class="card">
                                        <div class="card-header">
                                            USER PROFILE
                                        </div>
                                        <div class="card-body card-block">
                                        <!-- //cách up được ảnh lên -->
                           
                                            <!-- cách truyền ảnh trực tiếp -->
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="human_image" class=" form-control-label">Image</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <img src="./images/chandung/ngochan.jpg" alt="Ảnh user" width="200">
                                                    <input type="file" id="human_image" name="human_image" class="form-control-file">

                                                </div>
                                            </div>




                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="human_fullname" class=" form-control-label">Fullname</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="human_fullname" name="human_fullname" class="form-control" value="<?= $human_user->human_fullname ?>">
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="human_phone" class=" form-control-label">Phone</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="human_phone" name="human_phone" class="form-control" value="<?= $human_user->human_phone ?>">
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="human_email" class=" form-control-label">Email</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="human_email" name="human_email" class="form-control" value="<?= $human_user->human_email ?>">
                                                </div>
                                            </div>
                        
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="human_message" class=" form-control-label">Message</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <textarea name="human_message" id="human_message" rows="4" placeholder="Content..." class="form-control"><?= $human_user->human_message ?></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- <div class="card-footer">
                                        <a href="edit_profile.php" class="btn btn-success btn-sm" ><i class="fa-solid fa-pencil"></i>Edit user profile</a>
                                        </div> -->
                                    </div>
                                    <button type="submit" class="btn btn-primary">Submit Button</button>

                                </form>
                            </div>
                        </div>
                        

                        <!-- footer -->
                    </div>
                </div>
            </div>
            <!-- END MAIN CONTENT-->
            <!-- END PAGE CONTAINER-->
        </div>
    </div>

     <!-- Jquery JS-->
     <script src="vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="vendor/slick/slick.min.js">
    </script>
    <script src="vendor/wow/wow.min.js"></script>
    <script src="vendor/animsition/animsition.min.js"></script>
    <script src="vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="vendor/circle-progress/circle-progress.min.js"></script>
    <script src="vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="vendor/select2/select2.min.js">
    </script>

    <!-- Main JS-->
    <script src="js/main.js"></script>

</body>

</html>
<!-- end document-->