<?php 
include "admin/includes/database.php";
include "admin/includes/user.php";
include "admin/includes/categories.php";
include "admin/includes/blogs.php";
include "admin/includes/human_user.php";
include "admin/includes/contact.php";
include "admin/includes/subscribers.php";



$database = new database;
$db = $database->connect();

$user = new user($db);
$categories = new categories($db);
$blog = new blogs($db);
$human_user = new human_user($db);
$contact = new contact($db);
$sub = new subscribers($db);

if($_SERVER['REQUEST_METHOD']=='POST'){
    // if($_REQUEST['frm']=='add'){
   
    $sub->sub_email = $_REQUEST['sub_email'];
 
    if($sub->add()){
        header('location:admin/blog_subscribers.php?add=success');
    }
}


// if($_SERVER['REQUEST_METHOD']=='POST'){
//     echo "<pre>";
//     // print_r($_REQUEST);
//     echo "1234567";
//     echo "</pre>";
// }

 ?>

<!DOCTYPE HTML>
<html lang="en">
<head>
	<title>TRANG BLOG CA NHAN</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="UTF-8">


	<!-- Font -->

	<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500" rel="stylesheet">


	<!-- Stylesheets -->

	<link href="common-css/bootstrap.css" rel="stylesheet">

	<link href="common-css/ionicons.css" rel="stylesheet">

	<link href="common-css/layerslider.css" rel="stylesheet">


	<link href="01-homepage/css/styles.css" rel="stylesheet">

	<link href="01-homepage/css/responsive.css" rel="stylesheet">

</head>
<body>
      <!-- header
    ================================================== -->
    <?php  
    include "header.php";
    ?>
    <!-- end s-header -->

    <!-- banner
    ================================================== -->
    <?php  
    include "banner.php";
    ?>
    <!-- end s-banner -->

    <!-- content
    ================================================== -->
    <?php  
    include "content.php";
    ?>
    <!-- end s-content -->

   
	
    <!-- footer
    ================================================== -->
    <?php  
    include "footer.php";
    ?>
    <!-- end s-footer -->

    
	<!-- SCIPTS -->

	<script src="common-js/jquery-3.1.1.min.js"></script>

<script src="common-js/tether.min.js"></script>

<script src="common-js/bootstrap.js"></script>

<script src="common-js/layerslider.js"></script>

<script src="common-js/scripts.js"></script>

</body>
</html>
