<?php  
include "admin/includes/database.php";
include "admin/includes/user.php";
include "admin/includes/categories.php";
include "admin/includes/blogs.php";
include "admin/includes/contact.php";

$database = new database;
$db = $database->connect();
$contact = new contact($db);

$user = new user($db);
$cate = new categories($db);
$blog = new blogs($db);


if($_SERVER['REQUEST_METHOD']=='POST'){
    // if($_REQUEST['frm']=='add'){
    $contact->contact_name = $_REQUEST['contact_name'];
    $contact->contact_phone = $_REQUEST['contact_phone'];
    $contact->contact_email = $_REQUEST['contact_email'];
    $contact->contact_message = $_REQUEST['contact_message'];
    if($contact->add()){
        header('location:admin/blog_contacts.php?add=success');
    }
}


  


$stmt = $contact->read_all();



?>
<!DOCTYPE HTML>
<html lang="en">
<head>
	<title>TITLE</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="UTF-8">


	<!-- Font -->

	<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500" rel="stylesheet">


	<!-- Stylesheets -->

	<link href="common-css/bootstrap.css" rel="stylesheet">

	<link href="common-css/ionicons.css" rel="stylesheet">


	<link href="04-Contact/css/styles.css" rel="stylesheet">

	<link href="04-Contact/css/responsive.css" rel="stylesheet">

</head>
<body>
  <!-- header
    ================================================== -->
    <?php  
        include "header_s.php";
    ?>


	<section class="blog-area">
		<div class="container">
			<div class="row">

				<div class="col-lg-8 col-md-12">
					<div class="blog-posts">

						<div class="single-post">
							<div class="image-wrapper"><img src="uploads/main/angiang_01.jpg" alt="Blog Image"></div>

					

						</div><!-- single-post -->

						<div class="leave-comment-area">
                        <h3 class="title"><b class="light-color">Contact me</b></h3>
							<div class="leave-comment">

							<form role="cform" id="cform" method="post" class="s-content__form" action="contact.php" enctype="multipart/form-data"  onsubmit="return check_all()">
                                        <fieldset>
                                        <div class="form-field">
                                        <input name="contact_name" type="text" id="contact_name" onblur="check_name()" class="h-full-width h-remove-bottom" placeholder="Your Name" value="">
                                    <p id="message_name"></p>                                           
                                            </div>
                                            <div class="form-field">
                                        <input name="contact_phone" type="text" id="contact_phone" onblur="check_phone()" class="h-full-width h-remove-bottom" placeholder="Your Phone" value="">
                                        <p id="message_phone"></p>
                                    </div>
                                    <div class="form-field">
                                        <input name="contact_email" type="text" id="contact_email" onblur="check_email()" class="h-full-width h-remove-bottom" placeholder="Email"  value="">
                                        <p id="message_email"></p>
                                    </div>
                                    <div class="message form-field">
                                        <textarea name="contact_message" id="contact_message" class="h-full-width" placeholder="Your Message" ></textarea>
                                    </div>
                                           
                                    <br>
                                    <button type="submit" class="submit btn btn--primary h-full-width" >Submit</button>
                                            </fieldset>
                                        </form>
                                      

							</div><!-- leave-comment -->

						</div><!-- comments-area -->

					</div><!-- blog-posts -->
				</div><!-- col-lg-4 -->


				<div class="col-lg-4 col-md-12">
					<div class="sidebar-area">

						
					<?php  
						include "content_admin.php";
						?>

						



						<?php  
						include "content_sub.php";
						?>

						<!-- <div class="sidebar-section advertisement-area">
							<h4 class="title"><b class="light-color">Advertisement</b></h4>
							<a class="advertisement-img" href="#">
								<img src="images/advertise-1-400x500.jpg" alt="Advertisement Image">
								<h6 class="btn btn-2 discover-btn">DISCOVER</h6>
							</a>
						</div> -->
                        <!-- sidebar-section advertisement-area -->

					</div><!-- sidebar-area -->
				</div><!-- col-lg-4 -->

			</div><!-- row -->
		</div><!-- container -->
	</section><!-- section -->

						<?php
						include "content_footer.php";
						?>
	


				<?php  
				include "footer.php";
				?>


	<!-- SCIPTS -->

	<script src="common-js/jquery-3.1.1.min.js"></script>

	<script src="common-js/tether.min.js"></script>

	<script src="common-js/bootstrap.js"></script>

	<script src="common-js/scripts.js"></script>

	<script>
        function check_name(){
            var status=false;
            var message="";
            var pattern=/\w+/;
            if(document.cform.contact_name.value==""){
                message="Name is require.";
                document.cform.contact_name.focus();
            }else {
                if(!pattern.test(document.cform.contact_name.value)){
                message="Name is incvalid";
                document.cform.contact_name.focus();
            }
            status=true;
        }
        document.getElementById("message_name").innerHTML=message;
        return status;
    }

    function check_phone(){
            var status=false;
            var message="";
            // var pattern=/^(84|0[3|5|7|8|9])+([0-9]{8})$/;
            var pattern=/\d{10}/;

            if(document.cform.contact_phone.value==""){
                message="Phone is require.";
                document.cform.contact_phone.focus();
            }else {
                if(!pattern.test(document.cform.contact_phone.value)){
                message="Phone is incvalid";
                document.cform.contact_phone.focus();
            }
            status=true;
        }
        document.getElementById("message_phone").innerHTML=message;
        return status;
    }

    function check_email(){
            var status=false;
            var message="";
            var pattern=/^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/;
            if(document.cform.contact_email.value==""){
                message="Email is require.";
                document.cform.contact_email.focus();
            }else {
                if(!pattern.test(document.cform.contact_email.value)){
                message="Email is incvalid";
                document.cform.contact_phone.focus();
            }
            status=true;
        }
        document.getElementById("message_email").innerHTML=message;
        return status;
    }

    function check_all(){
        if(!check_name()&&check_email()&&check_phone()){
            return true;
        }
        return false;
    }
        
    </script>

</body>
</html>
