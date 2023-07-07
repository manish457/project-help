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
		<!-- Footer area -->
		<footer class="footer-area">
			<div class="footer-top">
				<div class="container">
					<div class="footer-content-wrapper">
						<div class="row">
							<div class="col-lg-4 each-footer-content our-doctors">
								<h5>OUR Doctors</h5>
								<ul>
									<li><a href="">Richard Fryer, M.D., F.A.C.S.</a></li>
									<li><a href="">Nicholas K. Howland, M.D., F.A.C.S.</a></li>
									<li><a href="">Steven H. Warnock, M.D., F.A.C.S.</a></li>
									<li><a href="">Paul A. Watterson, M.D., F.A.C.S.</a></li>
								</ul>
							</div>
							<?php if(get_field('site_logo', 'option')) : ?>
							<div class="col-lg-4 footer-logo-area text-center">
								<a href="<?=get_home_url()?>"><img src="<?=get_field('site_logo', 'option')['url']?>" border="0" title="<?=get_field('site_logo', 'option')['title']?>" alt="<?=get_field('site_logo', 'option')['alt']?>"></a>
							</div>
							<?php endif; ?>
							<div class="col-lg-4 text-right">
								<div class="each-footer-content footer-location text-left d-inline-block">
									<h5>Location</h5>
									<?php if(get_field('full_address', 'option')) : ?>
									<p><a href="<?=get_field('google_map_url', 'option')?> "><?=get_field('full_address', 'option')?></a></p>
									<?php endif; ?>
									<h5>Phone</h5>
									<?php if(get_field('phone_number', 'option')) : ?>
									<p><a href="tel:<?=get_field('phone_number', 'option')?>"><?=get_field('phone_number', 'option')?></a></p>
									<?php endif; ?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="footer-bottom">
				<div class="container">
					<div class="footer-bottom-content-wrapper ">
						<div class="privacy-and-cookie">
							<?=get_field('footer_menu', 'option')?>
						</div>
						<?php if(get_field('copyright_text', 'option')) : ?>
						<div class="copy-right-text">
							<p><?php the_field('copyright_text', 'option')?></p>
						</div>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</footer>
		<!-- End::Footer area -->
		<!-- All js links -->
		<script src="<?php echo get_stylesheet_directory_uri()?>/assets/js/swiper.min.js"></script>
		<script src="<?php echo get_stylesheet_directory_uri()?>/assets/js/bootstrap.min.js"></script>
		<script src="<?php echo get_stylesheet_directory_uri()?>/assets/js/custom.js"></script>
		<script>
			$('.nav-tab-list > ul > li').click( function(event){		
					index = $(this).index();
					//alert(index);
					$(this).parents('.services-area').find('.service-tab-listing-wrapper .each-tab-content').removeClass('active');
					$(this).parents('.services-area').find('.service-tab-listing-wrapper .each-tab-content').eq(index).addClass('active');
					$(this).parents('.services-area').find('.each-service-image').removeClass('active');
					$(this).parents('.services-area').find('.each-service-image').eq(index).addClass('active');
					$('.nav-tab-list > ul > li').removeClass('active')
					$(this).addClass('active')
				});
		 </script>
		

		<?php wp_footer(); ?>

	</body>
</html>