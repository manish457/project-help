<?php
// ============================= [faq-inject] =================================
function faq_inject_shortcode( $atts ){
	global $templates;
	global $post;
	$post_id = $post->ID;
	ob_start();
	if(get_field('inject_faq', $post_id)==true):
	?>
	<div class="procedure-faq">
		<h2><?php the_field('faq_section_title', $post_id); ?></h2>
		<?php if( have_rows('manage_faq', $post_id) ): ?>
		<ul id="accordion">
			<?php  while( have_rows('manage_faq', $post_id) ): the_row(); ?>
			<li>
				<span><?php the_sub_field('question') ?></span>
				<div>
					<p><?php the_sub_field('answer') ?></p>
				</div>
			</li>
			<?php endwhile; ?>			
		</ul>
		<?php endif; ?>
	</div>	
	<?php
	endif;
	$content = ob_get_clean();
	return $content;
}
add_shortcode( 'faq-inject', 'faq_inject_shortcode' );
// ============================= [faq-inject] =================================

// ============================= [testimonial-inject] =================================
function testimonial_inject_shortcode( $atts ){
	global $templates;
	global $post;
	$post_id = $post->ID;
	ob_start();
	//echo $post_id;
	if(get_field('inject_testimonial', $post_id)==true):
	$featured_posts = get_field('select_testimonial', $post_id);
	if( $featured_posts ): 
	?>
	<div class="say-area full-width">
		<div class="container">
			<div class="say-slider-wrapper text-center">
				<h2><?=get_field('inject_testimonial_title', $post_id)?></h2>
				<div class="say-slider">
					<div class="swiper-container mySwiper-2">
						<div class="swiper-wrapper">
							<?php foreach( $featured_posts as $post ): 
							setup_postdata($post); ?>
							<div class="swiper-slide">
								<div class="say-each">
									<p>“<?php $content = get_the_content(); echo wp_filter_nohtml_kses( $content );?>”</p>
								</div>
							</div>
							<?php endforeach; ?>							
						</div>
					</div>
					<div class="procedure-say-button">
						<div class="swiper-button-next"><img src="<?php echo get_stylesheet_directory_uri()?>/assets/images/next.png" border="0" alt=""></div>
						<div class="swiper-button-prev"><img src="<?php echo get_stylesheet_directory_uri()?>/assets/images/prev.png" border="0" alt=""></div>
					</div>
				</div>
				<a href="<?php the_field('testimonial_page_link', 'option')?>" class="common-button">Read Testimonials</a>
			</div>
		</div>
	</div>	
	<?php 
    wp_reset_postdata(); ?>
	<?php endif; ?>
	<?php
	endif;
	$content = ob_get_clean();
	return $content;
}
add_shortcode( 'testimonial-inject', 'testimonial_inject_shortcode' );
// ============================= [testimonial-inject] =================================

// ============================= [gallery-inject] =================================
function gallery_inject_shortcode( $atts ){
	global $templates;
	global $post;
	$post_id = $post->ID;
	ob_start();
	//echo $post_id;
	if(get_field('inject_gallery', $post_id)==true):	
	?>
	<!-- Gallery Module -->	
	<section class="pr-over-area procedure-pr-over-area full-width">
		<div class="pr-over-image-area procedure-pr-over-image-area common-background-style" style="background-image:url('<?php echo (get_field('inject_gallery_image', $post_id) != '' ? get_field('inject_gallery_image', $post_id) : get_field('inject_gallery_image', 'option'))?>');background-repeat:no-repeat;background-size:cover;background-position:center center;">
			<div class="pr-over-image-for-mob d-lg-none">
				<img src="<?php echo (get_field('inject_gallery_image', $post_id) != '' ? get_field('inject_gallery_image', $post_id) : get_field('inject_gallery_image', 'option'))?>" alt="">
			</div>
		</div>
		<div class="container">
			<div class="row flex-row-reverse">
				<div class="col-lg-6">
					<div class="pr-over-text procedure-pr-over-text">
						<h2><?php echo (get_field('inject_gallery_title', $post_id) != '' ? get_field('inject_gallery_title', $post_id) : get_field('inject_gallery_title', 'option'))?></h2>
						<a href="<?php echo (get_field('inject_gallery_button_link', $post_id) != '' ? get_field('inject_gallery_button_link', $post_id) : get_field('inject_gallery_button_link', 'option'))?>" class="common-button"><?php echo (get_field('inject_gallery_button_text', $post_id) != '' ? get_field('inject_gallery_button_text', $post_id) : get_field('inject_gallery_button_text', 'option'))?></a>
					</div>
				</div>
			</div>
		</div>
	</section>
	<?php
	endif;
	$content = ob_get_clean();
	return $content;
}
add_shortcode( 'gallery-inject', 'gallery_inject_shortcode' );
// ============================= [gallery-inject] =================================

// ============================= [meet-the-doctor-inject] =================================
function doctor_inject_shortcode( $atts ){
	global $templates;
	global $post;
	$post_id = $post->ID;
	ob_start();
	//echo $post_id;
	if(get_field('inject_meet_the_doctor', $post_id)==true):	
	$featured_posts = get_field('select_doctor', $post_id);
	if( $featured_posts ): 
	?>
	<!-- Doctor Module -->
	<section class="meet-the-doctor full-width">
		<div class="container">
			<div class="meet-the-doctor-wrapper">
				<h2><?php the_field('meet_the_doctor_title', $post_id)?></h2>
				<div class="row">
					<?php foreach( $featured_posts as $post ): 
					setup_postdata($post); ?>
					<div class="col-lg-3">
						<div class="each-doctor text-center">
							<?php if(get_field('doctor_image')) : ?>
							<div class="doctor-image ml-auto mr-auto">
								<img src="<?php the_field('doctor_image')?>" border="0" alt="">
							</div>
							<?php endif; ?>
							<div class="doctor-content">
								<h4><?=get_field('doctor_first_name')?> <?=get_field('doctor_last_name')?></h4>
								<h5><?php the_field('designation')?></h5>
								<a href="<?php the_permalink(); ?>" class="common-button">Meet Dr. <?=get_field('doctor_last_name')?></a>
							</div>
						</div>
					</div>
					<?php endforeach; ?>				
				</div>
			</div>
		</div>
	</section>	
	<?php 
    wp_reset_postdata(); ?>
	<?php endif; ?>
	<?php
	endif;
	$content = ob_get_clean();
	return $content;
}
add_shortcode( 'meet-the-doctor-inject', 'doctor_inject_shortcode' );
// ============================= [meet-the-doctor-inject] =================================
// ============================= [inject-contact-us] =================================
function contact_us_inject_shortcode( $atts ){
	global $templates;
	global $post;
	$post_id = $post->ID;
	ob_start();	
	if(get_field('inject_contacts_us_banner', $post_id)==true):	
	?>
	<!-- Contact Us Module -->		
	<section class="about-us-section procedure-about full-width">
		<div class="container">
			<div class="row">
				<div class="col-lg-6">
					<div class="about-us-content procedure-about-text">
						<?php echo (get_field('contact_us_banner_content', $post_id) != '' ? get_field('contact_us_banner_content', $post_id) : get_field('contact_us_banner_content', 'option'))?>
						<a href="<?php echo (get_field('contact_us_banner_button_link', $post_id) != '' ? get_field('contact_us_banner_button_link', $post_id) : get_field('contact_us_banner_button_link', 'option'))?>" class="common-button"><?php echo (get_field('contact_us_banner_button_text', $post_id) != '' ? get_field('contact_us_banner_button_text', $post_id) : get_field('contact_us_banner_button_text', 'option'))?></a>
					</div>
				</div>
			</div>
		</div>
		<div class="about-us-image procedure-contact-image" style="background-image:url('<?php echo (get_field('contact_us_banner_image', $post_id) != '' ? get_field('contact_us_banner_image', $post_id) : get_field('contact_us_banner_image', 'option'))?>');background-repeat:no-repeat;background-size:cover;background-position:center center;">
			<img src="<?php echo (get_field('contact_us_banner_image', $post_id) != '' ? get_field('contact_us_banner_image', $post_id) : get_field('contact_us_banner_image', 'option'))?>" border="0" alt="">
		</div>
	</section>
	<?php
	endif;
	$content = ob_get_clean();
	return $content;
}
add_shortcode( 'inject-contact-us', 'contact_us_inject_shortcode' );
// ============================= [inject-contact-us] =================================