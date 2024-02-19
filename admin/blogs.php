<?php  
include "includes\database.php";
include "includes\categories.php";
include "includes\blogs.php";

$database = new database;
$db = $database->connect();
// $cate = new categories($db);

$blog = new blogs($db);
$categories = new categories($db);

if(isset($_GET['add'])){
    $status = "Add blog post successfully!";


}




    if($_SERVER['REQUEST_METHOD']=='POST'){

        if(isset($_FILES['blog_main_image']['name'])){
            $path = "../uploads/main/";
            move_uploaded_file($_FILES['blog_main_image']['tmp_name'], $path.$_FILES['blog_main_image']['name']);
        }
        if(isset($_FILES['blog_alt_image']['name'])){
            $path = "../uploads/alt/";
            move_uploaded_file($_FILES['blog_alt_image']['tmp_name'], $path.$_FILES['blog_alt_image']['name']);
        }
       
        if($_REQUEST['frm']=='edit'){
            $blog->blog_id = $_REQUEST['id'];
            $blog->blog_name = $_REQUEST['blog_name'];
            $blog->category_id = $_REQUEST['category_id'];
            $blog->blog_summary = $_REQUEST['blog_summary'];
            $blog->blog_content = $_REQUEST['blog_content'];
            $blog->blog_main_image = $_REQUEST['blog_main_image'];
            $blog->blog_alt_image = $_REQUEST['blog_alt_image'];
            // $blog->blog_home_place = $_REQUEST['blog_home_place'];


            //$blog->blog_description = $_REQUEST['blog_description'];
            if($blog->update()){
                $status = "Update category successfully!";
            }
        }
        if($_REQUEST['frm']=='add'){
            $blog->blog_name = $_REQUEST['category_name'];
            $blog->blog_summary = $_REQUEST['blog_summary'];
            if($blog->add()){
                $status = "Add category successfully!";
            }
        }
        if($_REQUEST['frm']=='delete'){
            $blog->blog_id = $_REQUEST['id'];
            if($blog->delete()){
                $status = "Delete category successfully!";
            }
        }


        /*echo "<pre>";  
        print_r($_REQUEST);
        echo "</pre>";*/
    }
    /*echo "<pre>";  
    print_r($_SERVER);
    echo "</pre>";*/
    $stmt = $blog->read_all();
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
		<div class="col p-3 bg-warning text-white text d-flex">
			<h3>BLOGS</h3>
			<div class="d-flex ms-auto">
				<!-- <button class="btn btn-danger btn-sm" data-bs-target="#modal_delete" data-bs-toggle="modal">Delete All</button>
				&nbsp; -->
                <a href="write_blog.php" class="btn btn-success btn-sm" >Add blog post</a>
								
			</div>
			
		</div>
        

        </div>
                   
                            <!-- Modal end --> 
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>STT</th>
                                                <th>Blog Name</th>
                                                <th>Category Name</th>
                                                <th>Blog Summary</th>
                                                <th>Blog Content</th>
                                                <th>Blog Main Image</th>
                                                <th>Blog Alt Image</th>
                                                <!-- <th>Blog Home Place</th> -->
                                                <!-- <th>Date created</th> -->
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $num = 1;  
                                            while($row = $stmt->fetch()){
                                                $categories->category_id = $row['category_id'];
                                                $categories->read();
                                            ?>
                                             <tr>
                                                <td style="width:5% "><?php echo $num ?></td>
                                                <td style="width:10%"><?php echo $row['blog_name'] ?></td>
                                                <td style="width:15%"><?php echo $categories->category_name ?></td>
                                                <td style="width:12%"><?php echo $row['blog_summary'] ?></td>
                                                <td style="width:10%"><?php echo $row['blog_content'] ?></td>

                                                <!-- ảnh của main image -->
                                                <td style="width:12%" data-sortable="true">
                                                    <span class="thumb"><img width="80px" height="150px" 
                                                    src="../uploads/main/<?php echo $row['blog_main_image']; ?>" /></span>

                                                </td> 

                                                <!-- ảnh alt image -->
                                                <td style="width:12%" data-sortable="true">
                                                    <span class="thumb"><img width="80px" height="150px" 
                                                    src="../uploads/alt/<?php echo $row['blog_alt_image']; ?>" /></span>

                                                </td> 

                                           
                                                <td style="width:10%"><button class="btn btn-warning btn-sm" data-toggle="modal" data-target="<?php echo '#modal_edit'.$row['blog_id'] ?>"><i class="fa-solid fa-pencil"></i></button>
                                                    <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="<?php echo '#modal_delete'.$row['blog_id'] ?>"><i class="fa-solid fa-trash"></i></button>
                                                </td>
                                            </tr> 


                                                 <!-- Modal edit -->
                                             <div class="modal fade" id="<?php echo 'modal_edit'.$row['blog_id'] ?>">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <form role="form" name="frm_blog_edit" method="post" action="<?php echo $_SERVER['PHP_SELF']?>">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                            <h4 class="modal-title" id="myModalLabel">Edit blog</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="row">
                                                                <div class="col-lg-12">                                
                                                                    <div class="form-group">
                                                                        <label>Blog name</label>
                                                                        <input class="form-control" name="blog_name" id="blog_name" value="<?php echo $row['blog_name'] ?>">          
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label>Catrgory ID</label>
                                                                        <input class="form-control" name="category_id" id="category_id" value="<?php echo $row['category_id'] ?>">          
                                                                    </div>


                                                                      <div class="form-group">
                                                                        <label>Blog summary</label>
                                                                        <input class="form-control" name="blog_summary" id="blog_summary" value="<?php echo $row['blog_summary'] ?>">  </div>


                                                                      

                                                                      <div class="form-group">
                                                                        <label>Blog content</label>
                                                                        <input class="form-control" name="blog_content" id="blog_content" value="<?php echo $row['blog_content'] ?>">                           
                                                                    </div>     


                                                                    <div class="form-group">
                                                                        <label>Blog main image <label>
                                                                        <input class="form-control" type="file" name="blog_main_image">                            
                                                                    </div>   



                                                                    <div class="form-group">
                                                                        <label>Blog alt image <label>
                                                                        <input class="form-control" type="file" name="blog_alt_image">                            
                                                                    </div> 

                                                                  


                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <input type="hidden" name="frm" value="edit">
                                                            <input type="hidden" name="id" value="<?php echo $row['blog_id'] ?>">
                                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-primary">Save changes</button>
                                                        </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Modal end edit -->

                                            <!-- Modal delete -->
                                            <div class="modal fade" id="<?php echo 'modal_delete'.$row['blog_id'] ?>">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <form role="form" name="frm_category_delete" method="post" action="<?php echo $_SERVER['PHP_SELF']?>">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                            <h4 class="modal-title" id="myModalLabel">Delete category</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="row">
                                                                <div class="col-lg-12">
                                                                    Are you sure? you want delete this blog.
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <input type="hidden" name="frm" value="delete">
                                                            <input type="hidden" name="id" value="<?php echo $row['blog_id'] ?>">
                                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-primary">Save changes</button>
                                                        </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Modal end delete --> 
                                            <?php
                                                $num++;  
                                            }
                                            ?>                                           
                                        </tbody>
                                    </table>
                                </div>
                            </div>

		<!-- Modal Delete all-->
		<div class="modal" id="modal_delete">
			<div class="modal-dialog ">
				<div class="modal-content">
					<!-- Modal header -->
					<div class="modal-header">
						<h4 class="modal-title">Delete Categories</h4>
						<button class="btn-close" data-bs-dismiss="modal"></button>
					</div>

					<!-- Modal body -->
					<div class="modal-body">
						Are you sure you want to delete these records?
					</div>

					<!-- Modal footer -->
					<div class="modal-footer">
						<button class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
						<button type="button" class="btn btn-danger" data-bs-dismiss="modal">Delete</button>
					</div>
				</div>
			</div>	
            
		</div>
	</div>


    <?php
    include "includes/footer.php"?> 
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
