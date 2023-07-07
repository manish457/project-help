<?php
/*
 * Template Name:Contact Us Template
 * Description: Template file for the Contact Us Page Only
 */
 
get_header(); ?>
<section class="contact-area">
	<div class="container">
		<div class="row">
			<div class="col-lg-7">
				<div class="inner-head">
					<h1><?php the_title()?></h1>
					<?php simple_breadcrumb(); ?>      
				</div>
			</div>
			<div class="col-lg-5">
				<div class="contact-right">
					<?php if(get_field('full_address', 'option')) : ?>
					<div class="contact-each">
						<h5>Visit us</h5>
						<p><?php the_field('full_address', 'option')?></p>
					</div>
					<?php endif; ?>
					<?php if(get_field('phone_number', 'option')) : ?>
					<div class="contact-each">
						<h5>Call us</h5>
						<p><a href="tel:<?php the_field('phone_number', 'option')?>"><?php the_field('phone_number', 'option')?></a></p>
					</div>
					<?php endif; ?>
				</div>
				<div class="contact-map">
					<?php the_field('map', 'option')?>
				</div>
			</div>
		</div>
	</div>
</section>
<?php echo do_shortcode('[meet-the-doctor-inject]'); ?>
<?php get_footer(); ?>
