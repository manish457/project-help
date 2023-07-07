<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

?>
		
		</main>
		<footer class="footer-area">
			<div class="container">
				<div class="footer-wrapper">
					<div class="row">
						<div class="col-lg-3">
							<div class="footer-logo">
								<a href=""><img src="assets/images/logo.png" border="0" alt=""></a>
							</div>
						</div>
						<div class="col-lg-6">
							<div class="footer-link-area">
								<div class="card-columns">
									<div class="card">
										<div class="each-footer-listing">
											<h4>Voor jou</h4>
											<ul>
												<li><a href="">Producten</a></li>
												<li><a href="">Beauty tips</a></li>
												<li><a href="">Een salon aanbevelen</a></li>
											</ul>
										</div>
									</div>
									<div class="card">
										<div class="each-footer-listing">
											<h4>Over ons</h4>
											<ul>
												<li><a href="">Hoe werkt het?</a></li>
												<li><a href="">Klantenservice</a></li>
												<li><a href="">Contact</a></li>
											</ul>
										</div>
									</div>
									<div class="card">
										<div class="each-footer-listing">
											<h4>Voor Salons</h4>
											<ul>
												<li><a href="">Informatie</a></li>
												<li><a href="">Salon aanmelden</a></li>
											</ul>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-3">
							<div class="footer-button">
								<a href="" class="common-button">zakelijke klanten</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</footer>
		<!-- End::Footer area -->
		<!-- All js links -->
		<script src="<?php echo get_stylesheet_directory_uri()?>/assets/js/swiper.min.js"></script>
		<script src="<?php echo get_stylesheet_directory_uri()?>/assets/js/bootstrap.min.js"></script>
		<script src="<?php echo get_stylesheet_directory_uri()?>/assets/js/wow.js"></script>
		<script src="<?php echo get_stylesheet_directory_uri()?>/assets/js/custom.js"></script>
		<script>
			wow = new WOW(
			  {
				animateClass: 'animated',
				offset:       100,
				callback:     function(box) {
				  console.log("WOW: animating <" + box.tagName.toLowerCase() + ">")
				}
			  }
			);
			wow.init();
		</script>	
		<?php wp_footer(); ?>
	</body>
</html>