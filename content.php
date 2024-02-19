

<section class="section blog-area">
	
		<div class="container">
			
			<div class="row">
				
			

				<!-- <div class="col-lg-9 col-md-12"> -->
				<div class="col-12 col-lg-8">

		
				
					<div class="blog-posts">

						<div class="single-post">
							<div class="image-wrapper"><img src="uploads/main/hagiang_04.jpg" alt="Blog Image"></div>

							<div class="icons">
								<div class="left-area">
									<!-- <a class="btn caegory-btn" href="#"><b>TRAVEL</b></a> -->
								</div>
								<ul class="right-area social-icons">
									<li><a href="#"><i class="ion-android-share-alt"></i>Share</a></li>
									<li><a href="#"><i class="ion-android-favorite-outline"></i>03</a></li>
									<li><a href="#"><i class="ion-android-textsms"></i>06</a></li>
								</ul>
							</div>
							<!-- <p class="date"><em>Monday, October 13, 2017</em></p>
							<h3 class="title"><a href="#"><b class="light-color">This is post about travel, adventure and fun</b></a></h3>
							<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
								 laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi
								 architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas
								 consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et
								dolore magnam aliquam quaerat voluptatem.</p> -->
							
						</div>

				
						<div class="row">
						<?php 
								$stmt = $blog->read_all();
								while($row = $stmt->fetch()){


							?>
				<div class="col-12 col-lg-4">
							
								<div class="single-post">
									<div class="image-wrapper"><img src="uploads/alt/<?php echo $row['blog_alt_image']?>" 
                                 alt=""></div>

									<h3 class="title"><a href="#"><p>
									<?php echo $row['blog_name']?>
									</p></a></h3>
									<p>
									<?php echo $row['blog_summary']?>
									</p>
									<a class="btn read-more-btn" href="#"><b>READ MORE</b></a>
								</div><!-- single-post -->
							</div><!-- col-sm-6 -->

					

							
							<?php 
                    }
                ?>


						</div><!-- row -->

						<!-- <a class="btn load-more-btn" target="_blank" href="#">LOAD OLDER POSTS</a> -->

					</div><!-- blog-posts -->
				</div><!-- col-lg-4 -->

				<div class="col-lg-3 col-md-12">
					<div class="sidebar-area">



					<?php
						include "content_admin.php";
						?>






						<div class="sidebar-section src-area">

							<form action="post">
								<input class="src-input" type="text" placeholder="Search">
								<button class="src-btn" type="submit"><i class="ion-ios-search-strong"></i></button>
							</form>

						</div><!-- sidebar-section src-area -->



						<?php
						include "content_sub.php";
						?>



						<?php
						include "content_cate.php";
						?>



						<div class="sidebar-section latest-post-area">
							<h4 class="title"><b class="light-color">Latest Posts</b></h4>

							<div class="latest-post" href="#">
								<div class="l-post-image"><img src="images/recent-post-1-150x200.jpg" alt="Category Image"></div>
								<div class="post-info">
									<a class="btn category-btn" href="#">TRAVEL</a>
									<h5><a href="#"><b class="light-color">One more night in the clubs</b></a></h5>
									<h6 class="date"><em>Monday, October 13, 2017</em></h6>
								</div>
							</div>

							<div class="latest-post" href="#">
								<div class="l-post-image"><img src="images/recent-post-2-150x200.jpg" alt="Category Image"></div>
								<div class="post-info">
									<a class="btn category-btn" href="#">TRAVEL</a>
									<h5><a href="#"><b class="light-color">Travel lights in winter</b></a></h5>
									<h6 class="date"><em>Monday, October 13, 2017</em></h6>
								</div>
							</div>
							<div class="latest-post" href="#">
								<div class="l-post-image"><img src="images/recent-post-3-150x200.jpg" alt="Category Image"></div>
								<div class="post-info">
									<a class="btn category-btn" href="#">TRAVEL</a>
									<h5><a href="#"><b class="light-color">How to travel with no money</b></a></h5>
									<h6 class="date"><em>Monday, October 13, 2017</em></h6>
								</div>
							</div>

							<div class="latest-post" href="#">
								<div class="l-post-image"><img src="images/recent-post-4-150x200.jpg" alt="Category Image"></div>
								<div class="post-info">
									<a class="btn category-btn" href="#">TRAVEL</a>
									<h5><a href="#"><b class="light-color">Smile 10 times a day</b></a></h5>
									<h6 class="date"><em>Monday, October 13, 2017</em></h6>
								</div>
							</div>

						</div><!-- sidebar-section latest-post-area -->

						<!-- <div class="sidebar-section advertisement-area">
							<h4 class="title"><b class="light-color">Advertisement</b></h4>
							<a class="advertisement-img" href="#">
								<img src="images/advertise-1-400x500.jpg" alt="Advertisement Image">
								<h6 class="btn btn-2 discover-btn">DISCOVER</h6>
							</a>
						</div> -->
						<!-- sidebar-section advertisement-area -->


						<?php
						include "content_ins.php";
						?>

						
	


					</div><!-- about-author -->
				
				</div><!-- col-lg-4 -->

				
				<?php
						include "ptrang.php";
						?>
			</div><!-- row -->
		</div><!-- container -->
	</section><!-- section -->

	<?php
						include "content_footer.php";
						?>
	


