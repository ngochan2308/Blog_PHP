<?php
include "includes\database.php";
include "includes\categories.php";

$database = new database;
$db = $database->connect();
$categories = new categories($db);

/*echo "<pre>";  
print_r($_SERVER);
echo "</pre>";*/

if($_SERVER['REQUEST_METHOD']=='POST'){
    if($_REQUEST['frm']=='edit'){
        $categories->category_id = $_REQUEST['id'];
        $categories->category_name = $_REQUEST['category_name'];
        $categories->category_description = $_REQUEST['category_description'];
        if($categories->update()){
            $status = "Update category successfully!";
        }
    }
    if($_REQUEST['frm']=='add'){
        $categories->category_name = $_REQUEST['category_name'];
        $categories->category_description = $_REQUEST['category_description'];
        if($categories->add()){
            $status = "Add category successfully!";
        }
    }
    if($_REQUEST['frm']=='delete'){
        $categories->category_id = $_REQUEST['id'];
        if($categories->delete()){
            $status = "Delete category successfully!";
        }
    }

    // if($_REQUEST['frm']=='deleteAll'){
    //     $categories->category_id = $_REQUEST['id'];
    //     if($categories->delete()){
    //         $status = "Delete category successfully!";
    //     }
    // }

        
    /*echo "<pre>";  
    print_r($_REQUEST);
    echo "</pre>";*/
}

$stmt = $categories->read_all();

/*echo "<pre>";
print_r($stmt->fetchall());
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
		<div class="col p-3 bg-primary text-white text d-flex">
			<h3>BLOG CATEGORIES</h3>
			<div class="d-flex ms-auto">
				<!-- <button class="btn btn-danger btn-sm" data-bs-target="#modal_delete" data-bs-toggle="modal">Delete All</button>
				&nbsp; -->
				<button class="btn btn-success btn-sm" data-bs-target="#modal_add" data-bs-toggle="modal">Add New Category</button>
								
			</div>
			
		</div>

        </div>
                    <!-- Modal add -->
                    <div class="modal fade" id="modal_add">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <form role="form" name="frm_category_add" method="post" action="<?php echo $_SERVER['PHP_SELF']?>">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                    <h4 class="modal-title" id="myModalLabel">Add category</h4>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-lg-12">                                
                                            <div class="form-group">
                                                <label>Category name</label>
                                                <input class="form-control" name="category_name" id="category_name">                           
                                            </div>
                                            <div class="form-group">
                                                <label>Description</label>
                                                <input class="form-control" name="category_description" id="category_description">                           
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <input type="hidden" name="frm" value="add">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                </div>
                                </form>
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
                                                <th>Category</th>
                                                <th>Description</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $num = 1;  
                                            while($row = $stmt->fetch()){

                                            ?>
                                            <tr>
                                                <td style="width:5%"><?php echo $num ?></td>
                                                <td style="width:40%"><?php echo $row['category_name'] ?></td>
                                                <td style="width:40%"><?php echo $row['category_description'] ?></td>
                                                <td style="width:14%"><button class="btn btn-warning btn-sm" data-toggle="modal" data-target="<?php echo '#modal_edit'.$row['category_id'] ?>"><i class="fa-solid fa-pencil"></i>Edit</button>
                                                    <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="<?php echo '#modal_delete'.$row['category_id'] ?>"><i class="fa-solid fa-trash"></i>Delete</button>
                                                </td>
                                            </tr>                                            

                                            <!-- Modal edit -->
                                            <div class="modal fade" id="<?php echo 'modal_edit'.$row['category_id'] ?>">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <form role="form" name="frm_category_edit" method="post" action="<?php echo $_SERVER['PHP_SELF']?>">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                            <h4 class="modal-title" id="myModalLabel">Edit category</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="row">
                                                                <div class="col-lg-12">                                
                                                                    <div class="form-group">
                                                                        <label>Category name</label>
                                                                        <input class="form-control" name="category_name" id="category_name" value="<?php echo $row['category_name'] ?>">                           
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>Description</label>
                                                                        <input class="form-control" name="category_description" id="category_description" value="<?php echo $row['category_description'] ?>">                           
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <input type="hidden" name="frm" value="edit">
                                                            <input type="hidden" name="id" value="<?php echo $row['category_id'] ?>">
                                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-primary">Save changes</button>
                                                        </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Modal end edit -->

                                            <!-- Modal delete -->
                                            <div class="modal fade" id="<?php echo 'modal_delete'.$row['category_id'] ?>">
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
                                                                    Are you sure? you want delete this category.
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <input type="hidden" name="frm" value="delete">
                                                            <input type="hidden" name="id" value="<?php echo $row['category_id'] ?>">
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
