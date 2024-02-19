<?php
include "./includes/database.php";
include "./classes/Customer.php";
include "./includes/show_alert.php";

$database = new database();
$db = $database->connect();
$Customer = new Customer($db);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if ($_REQUEST['frm'] == 'delete') {
        $Customer->MaTK = $_REQUEST['MaTK'];
        if ($Customer->delete()) {
            $status = "Delete success";
        }
    }
}

$stmt = $Customer->read_all();
$Customers = $stmt->fetchAll();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <?php include "./includes/meta.php"?>

    <?php include "./includes/style.php"?>

</head>

<body class="animsition">
    <div class="page-wrapper">

        <?php
            include "./includes/header_mb.php"
        ?>

        <?php
            include "./includes/sidebar.php"
        ?>
        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <?php
                include "./includes/header.php"
            ?>
            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="overview-wrap">
                                    <h2 class="title-1">THÔNG TIN KHÁCH HÀNG </h2>
                                    <div class="card-body">
                                        <button type="button" class="btn btn-success"><a href="Customer_create.php">THÊM KHÁCH HÀNG</a></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php if(isset($status)):  
                            show_alert($status);
                        endif;?>                        
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="table-responsive table--no-card m-b-40">
                                    <table class="table table-borderless table-striped table-earning">
                                        <thead>
                                            <tr>
                                                <th>MaTK</th>
                                                <th>UserName</th>
                                                <th>Password</th>
                                                <th class="text-right">FullName</th>
                                                <th class="text-right">Gender</th>
                                                <th class="text-right">Năm sinh</th>
                                                <th class="text-right">Phone</th>
                                                <th class="text-right">Email</th>
                                                <th class="text-right">Address</th>
                                                <th class="text-right">Action</th>
                                                
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                foreach($Customers as $row):
                                            ?>
                                            <?php if ($row['MaLoaiTK'] == 2): ?>
                                            <tr>
                                                <td><?= $row['MaTK']?></td>
                                                <td><?= $row['UserName']?></td>
                                                <td><?= $row['Password']?></td>
                                                <td class="text-right"><?= $row['FullName']?></td>
                                                <td class="text-right"><?= $row['Gender']?></td>
                                                <td class="text-right"><?= $row['NamSinh']?></td>
                                                <td class="text-right"><?= $row['Phone']?></td>
                                                <td class="text-right"><?= $row['Email']?></td>
                                                <td class="text-right"><?= $row['Address']?></td> 
                                                <td>
                                                    <a href="Customer_edit.php?MaTK=<?= $row['MaTK'] ?>" class="btn btn-warning"> Edit</a>
                                                    <button class="btn btn-danger" data-toggle="modal" data-target="<?php echo '#deleteCustomer'.$row['MaTK'] ?>">Delete</button>
                                                </td>                                             
                                            </tr>
                                            <?php endif; ?>                                           
                                            <?php
                                                endforeach;
                                            ?>                             
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <?php   
                            include "./includes/footer.php"

                        ?>
                    </div>
                </div>
            </div>
            <!-- END MAIN CONTENT-->
            <!-- END PAGE CONTAINER-->
             <?php foreach($Customers as $num=>$row):?>                                   
                <!-- Modal Delete -->
                <div class="modal fade" id="<?php echo 'deleteCustomer'.$row['MaTK'] ?>" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <form action="" method="post" novalidate="novalidate">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="mediumModalLabel">Medium Modal</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <p>
                                        Are you sure Delete Category??
                                    </p>
                                    <input type="hidden" name="frm" value="delete">
                                    <input type="hidden" name='MaTK' value="<?php echo $row['MaTK'] ?>">
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary">Delete</button>
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!--End Modal Delete --> 
            <?php endforeach;?> 
        </div>

    </div>
    <?php 
        include "./includes/script.php"
    ?>

</body>

</html>
<!-- end document-->
