<?php
include "includes/database.php";

include "includes/subscribers.php";

$database = new database;
$db = $database->connect();
$sub = new subscribers($db);


if($_SERVER['REQUEST_METHOD']=='POST'){
    if($_REQUEST['frm']=='delete'){
        $sub->sub_id = $_REQUEST['id'];
        if($sub->delete()){
            $status = "Delete sub successfully!";
        }
    }


}

$stmt = $sub->read_all();

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
		<div class="col p-3 bg-info text-white text d-flex">
			<h3>BLOG SUBSCRIBERS</h3>
			<div class="d-flex ms-auto">
				<!-- <button class="btn btn-danger btn-sm" data-bs-target="#modal_delete" data-bs-toggle="modal">Delete All</button>
				&nbsp; -->
								
			</div>
			
		</div>

        </div>
                 <!-- Modal add -->
                 <div class="modal fade" id="modal_add">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <form role="form" name="frm_sub_add" method="post" action="<?php echo $_SERVER['PHP_SELF']?>">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title" id="myModalLabel">Add sub</h4>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-lg-12">                                
                                                    
                                                    <div class="form-group">
                                                        <label>Email</label>
                                                        <input class="form-control" name="sub_email" id="sub_email">                           
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
                                                <th>Email</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $num = 1;  
                                            while($row = $stmt->fetch()){

                                            ?>
                                            <tr>
                                                <td style="width:5%"><?php echo $num ?></td>
                                            
                                                <td style="width:80%"><?php echo $row['sub_email'] ?></td>
                                        
                                                <td style="width:20%">
                                                    <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="<?php echo '#modal_delete'.$row['sub_id'] ?>"><i class="fa-solid fa-trash"></i>Delete</button>
                                                </td>
                                            </tr>                                            

                                            <!-- Modal edit -->
                                            <div class="modal fade" id="<?php echo 'modal_edit'.$row['sub_id'] ?>">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <form role="form" name="frm_sub_edit" method="post" action="<?php echo $_SERVER['PHP_SELF']?>">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                            <h4 class="modal-title" id="myModalLabel">Edit sub</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="row">
                                                                <div class="col-lg-12"> 
                                                                                                   
            
                                                                   
                                                                    <div class="form-group">
                                                                        <label>Email</label>
                                                                        <input class="form-control" name="sub_email" id="sub_email" value="<?php echo $row['sub_email'] ?>">                           
                                                                    </div>
                                                                   
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <input type="hidden" name="frm" value="edit">
                                                            <input type="hidden" name="id" value="<?php echo $row['sub_id'] ?>">
                                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-primary">Save changes</button>
                                                        </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Modal end edit -->

                                            <!-- Modal delete -->
                                            <div class="modal fade" id="<?php echo 'modal_delete'.$row['sub_id'] ?>">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <form role="form" name="frm_sub_delete" method="post" action="<?php echo $_SERVER['PHP_SELF']?>">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                            <h4 class="modal-title" id="myModalLabel">Delete sub</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="row">
                                                                <div class="col-lg-12">
                                                                    Are you sure? you want delete this subscriber.
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <input type="hidden" name="frm" value="delete">
                                                            <input type="hidden" name="id" value="<?php echo $row['sub_id'] ?>">
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
	</div>



<!-- footer -->
<div class="container">
	<div class="row">
		<div class="col d-flex bg-light m-2">
			<div class="my-auto">Showing 5 out of 25 entries</div>
			<div class="d-flex ms-auto pt-3">
				<nav aria-label="Page navigation example">
				  <ul class="pagination justify-content-end">
				    <li class="page-item disabled">
				      <a class="page-link">Previous</a>
				    </li>
				    <li class="page-item"><a class="page-link" href="#">1</a></li>
				    <li class="page-item"><a class="page-link" href="#">2</a></li>
				    <li class="page-item"><a class="page-link" href="#">3</a></li>
				    <li class="page-item">
				      <a class="page-link" href="#">Next</a>
				    </li>
				  </ul>
				</nav>
			</div>
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
