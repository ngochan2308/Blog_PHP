<?php
include "includes\database.php";
include "includes\categories.php";
include "includes\blogs.php";

$database = new database;   
$db = $database->connect();
$blog = new blogs($db);
$cate = new categories($db);
$stmt_cate = $cate->read_all();

if($_SERVER['REQUEST_METHOD']=='POST'){
    $blog->blog_name = $_REQUEST['blog_name'];
    $blog->category_id = $_REQUEST['category_id'];
    $blog->blog_summary = $_REQUEST['blog_summary'];
    $blog->blog_content = $_REQUEST['blog_content'];
    $blog->blog_main_image = $_FILES['blog_main_image']['name'];
    $blog->blog_alt_image = $_FILES['blog_alt_image']['name'];

     if(isset($_FILES['blog_main_image']['name'])){
        $path = "./uploads/main/";
        move_uploaded_file($_FILES['blog_main_image']['tmp_name'], $path.$_FILES['blog_main_image']['name']);
    }
    if(isset($_FILES['blog_alt_image']['name'])){
        $path = "./uploads/alt/";
        move_uploaded_file($_FILES['blog_alt_image']['tmp_name'], $path.$_FILES['blog_alt_image']['name']);
    }
   

    if($blog->add()){
        header('location:blogs.php?add=success');
    }
}
/*echo "<pre>";
print_r($_REQUEST);
print_r($_FILES);
echo "</pre>";*/
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
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
	<script src="http://kit.fontawesome.com/d8627d2dca.js" crossorigin="anonymous"></script>
    <!-- Fontfaces CSS-->
    <link href="css/font-face.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />

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
    

</head>

<body class="animsition">
    <div class="page-wrapper">
      

        <!-- MENU SIDEBAR-->
       <?php include "includes/sidebar.php"?>
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->
            <?php include "includes/header.php" ?>
            <!-- HEADER DESKTOP-->

            <!-- MAIN CONTENT-->
            <br>
            <br>
            <br>
            <div class="container p-4">


    <div class="row">
    <div class="col p-3 bg-success text-white text d-flex">
			<h3>WRITE A BLOG</h3>
			<div class="d-flex ms-auto">
				<!-- <button class="btn btn-danger btn-sm" data-bs-target="#modal_delete" data-bs-toggle="modal">Delete All</button>
				&nbsp; -->
								
			</div>
			
		</div>
        
                <hr>
                <div class="panel-body">
                     <div class="row"> 
                         <div class="col-lg-12">
                             <form role="form" method="post" action="write_blog.php" enctype="multipart/form-data" >

                                <div class="form-group">
                                    <label>Category name</label>
                                    <select class="form-control" name="category_id">
                                        <option>Select category</option>
                                        <?php  
                                        while($row_cate = $stmt_cate->fetch()){
                                            echo "<option value='".$row_cate['category_id']."''>".$row_cate['category_name']."</option>";
                                        }
                                        ?>
                                                                                            
                                    </select>       
                                </div>


                                <div class="form-group">
                                    <label>Blog name</label>
                                    <input class="form-control" name="blog_name">   
                                </div>

        
                                <div class="form-group">
                                   <label for="blog_main_image" class=" form-control-label">Blog Main Image</label>
                                      <input type="file" id="blog_main_image" name="blog_main_image" class="form-control-file">
                                </div>

                                <div class="form-group">
                                      <label for="blog_alt_image" class=" form-control-label">Blog Alt Image</label>
                                     <input type="file" id="blog_alt_image" name="blog_alt_image" class="form-control-file">
                                </div>

                                <div class="form-group">
                                    <label>Blog summary</label>
                                    <textarea class="form-control" rows="3" id="blog_summary" name="blog_summary" ></textarea>
                                </div>

                                <div class="form-group">
                                    <label>Blog content</label>
                                    <textarea class="form-control" rows="3" id="blog_content" name="blog_content"></textarea>
                                </div>
<!-- 
                                <div class="form-group">
                                    <label>Blog home place</label>
                                    <label class="radio-inline">
                                        <input type="radio" name="blog_place" id="blog_place1" value="1" >1
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="blog_place" id="blog_place2" value="2">2
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="blog_place" id="blog_place3" value="3">3
                                    </label>
                                </div> -->

                                <button type="submit" class="btn btn-primary">Submit Button</button>
                                <button type="reset" class="btn btn-warning">Reset Button</button>
                                            
                            </form>
                            
                         </div>
                     </div>
                </div>
            </div>
            
    <?php
    include "includes/footer.php"?>
        </div>
    </div>


    


            <!-- END MAIN CONTENT-->
   

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

        <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
        <script>
      $('#blog_summary').summernote({
        placeholder: 'Hello Bootstrap 4',
        tabsize: 2,
        height: 100
      });
      $('#blog_content').summernote({
        placeholder: 'Hello Bootstrap 4',
        tabsize: 2,
        height: 100
      });
    </script>

    

</body>

</html>
<!-- end document-->
