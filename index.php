<?php
	require 'config/env.php';
	require_once 'config/db.php';

	$stmt = $conn->prepare('select * from contestants');
	$stmt->execute();
	$results = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);

	

?>

<?php include 'inc/header.php' ?>
	
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
      <div class="container-fluid">
        <a class="navbar-brand js-scroll-trigger" href="index.html">
			<img class="img-fluid" src="images/b_x.png" style="height: 60px !important; width: 60px;" alt="" />
		</a>
      </div>
    </nav>
	
	<?php include 'inc/carousel.php' ;?>
    
	
	<div id="gallery" class="section lb">
		<div class="container">
			<div class="section-title text-center">
				<h3>Contestants</h3>
				<p>These are your Contestants. Cheer on! Don't Stop there. Vote! </p>
			</div><!-- end title -->
		
			<div class="gallery-menu text-center row">
				<div class="col-md-12">
					<div class="button-group filter-button-group">
						<button class="active " data-filter="*">All</button>
						<button data-filter=".photo_a">Group 1</button>
						<button data-filter=".photo_b">Group 2</button>
						<button data-filter=".photo_c" class="mt-2" >Group 3</button>
					</div>
				</div>
			</div>
		
			<div class="gallery-list row">
				<?php foreach($results as $result): ?>
					<?php extract($result) ?>
					<?php
						switch ($church_group) {
							case 'GROUP 2':
								# code...
								$photo = 'photo_b';
								break;
							case 'GROUP 3':
								# code...
								$photo = 'photo_c';
								break;
							default:
								# code...
								$photo = 'photo_a';
								break;
						}
					 ?>

					<form id="<?= $id ?>" class="paymentForm">
						<div class="col-md-4 col-sm-6 gallery-grid <?= $photo ?>">
							<div class="gallery-single fix">
								<img src="<?= $image_path ?>" class="img-fluid" alt="Image">
								<div class="box-content">
									<div class="inner-content">
										<h3 class="title"><?= $fullname ?></h3>
										<span class="post"><?= $church_group ?></span>
										<span class="post">
											<a class="color: white" href="<?= $kc_link ?>">KingsChat</a>
										</span>
									</div>
									<ul class="icon">
										<li><a href="<?= $image_path ?>" data-rel="prettyPhoto[gal]"><i class="fa fa-search"></i></a></li>
									
										<li>
											<button class="xd" type="submit" >
												<i class="fa fa-link"></i>
											</button>
										</li>
									</ul>

									
								</div>
							</div>
						</div>

					</form>
					
					
				<?php endforeach; ?>	
				
			</div>
		</div>
	</div>
	
	<div id="services" class="section lb">
        <div class="container">
            <div class="section-title text-center">
                <h3>Vote</h3>
                <p>Each of these candidates have gone through a rigorous vetting process. Oh yes, and they are up for your votes. Send them coming!</p>
            </div><!-- end title -->

            <?php include 'inc/services.php' ?>
        </div><!-- end container -->
    </div><!-- end section -->
	
	
	<!-- Reviews Here -->
	<!--  -->
	
	<?php include 'inc/footer.php'; ?>

    <div class="copyrights">
        <div class="container">
            <div class="footer-distributed">
                <div class="footer-left">                    
                    <p class="footer-company-name">All Rights Reserved. &copy; <script>document.write((new Date()).getFullYear())</script> Design by : 
					<a href="#" target="_top">html design</a> Distributed by: <a href="#">ThemeWagon</a>
                    </p>
                </div>
            </div>
        </div><!-- end container -->
    </div><!-- end copyrights -->

    <a href="#" id="scroll-to-top" class="dmtop global-radius"><i class="fa fa-paper-plane-o" aria-hidden="true"></i></a>

    <!-- ALL JS FILES -->
    <script src="js/all.js"></script>
	<!-- Camera Slider -->
	<script src="js/jquery.mobile.customized.min.js"></script>
	<script src="https://js.paystack.co/v2/inline.js"></script>
	<script src="js/jquery.easing.1.3.js"></script> 
	<script src="js/parallaxie.js"></script>
	<script src="js/jquery.appear.min.js"></script>
	<script src="js/skill.bars.jquery.js"></script>
	<script src="js/responsiveslides.min.js"></script>
	<!-- Contact form JavaScript -->
    <script src="js/jqBootstrapValidation.js"></script>
    <script src="js/contact_me.js"></script>
    <!-- ALL PLUGINS -->
	<script src="js/jquery.fatNav.min.js"></script>
	<script src="js/menu-overlay.js"></script>
    <script src="js/custom.js"></script>
	<script src="js/zepto.min.js"></script>
	<script src="js/imagesloaded.pkgd.min.js"></script>
	<script src="js/slider.js"></script>
	<script src="js/payment.js"></script>
	
</body>
</html>