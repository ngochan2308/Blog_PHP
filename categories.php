<?php 
include "admin/includes/database.php";
include "admin/includes/user.php";
include "admin/includes/categories.php";
include "admin/includes/blogs.php";


$database = new database;
$db = $database->connect();


$categories = new categories($db);
$blog = new blogs($db);



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

    <div class="container single-page">
    <div class="row">
		<div class="col-lg-12">
			<div class="card">
				<div class="card-body">
					<ul class="nav nav-tabs">
						<li class="nav-item">
							<a class="nav-link active" href="#">Categories</a>
						</li>
                            <?php  
                            $stmt_cate = $categories->read_all();
                            while($row=$stmt_cate->fetch()){
                            echo "<li class='nav-item'><a class='nav-link' href='categories.php?cate=".$row['category_id']."'>".$row['category_name']."</a></li>"; 
                            }
                            ?> 
					</ul>
				</div>
			</div>
		</div>
    </div>

</div><!-- .outer-container -->















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
