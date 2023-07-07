<?php
/*
 * Single Post Type Patient Template 
 */
 
 get_header(); ?>
 <?php
	$post_type = 'gallery';
	$taxonomy_slug = 'gallery-category';
	$current_post_categories = get_the_terms( get_the_ID(), $taxonomy_slug )[0];
	$tax_query = $current_post_categories->term_id;
	//print_r($current_post_categories);
?>
<section class="inner-back-image gallery-post-area">
	<div class="container">
		<div class="inner-head">
			<h1><?php the_title(); ?></h1>
			<?php
			if (function_exists('parent_gallery_category_breadcrumb')) {
				parent_gallery_category_breadcrumb($tax_query, $taxonomy_slug);
			} ?>
		</div>
		<div class="gallery-post-slider">
			<div class="swiper-container mySwiper">
				<div class="swiper-wrapper">
					<?php
						if( have_rows('before_after_images') ):
							while( have_rows('before_after_images') ): the_row();
					?>
					<div class="swiper-slide">
						<?php if(get_sub_field('before_after_combined')):?>
						<!-- <div class="g-post-each"></div> -->
						<img src="<?php the_sub_field('before_after_combined'); ?>" alt="">
						<?php elseif(get_sub_field('before_image_gallery') && get_sub_field('after_image_gallery')): ?>
						<div class="after-before-slider">
							<div class="row no-gutters">
								<div class="col-6">
									<img src="<?php the_sub_field('before_image_gallery'); ?>" border="0" alt="" class="w-100">
								</div>
								<div class="col-6">
									<img src="<?php the_sub_field('after_image_gallery'); ?>" border="0" alt="" class="w-100">
								</div>
							</div>
						</div>
						<?php endif;?>
					</div>
					<?php endwhile;
						endif;
					?>
				</div>
			</div>
			<div class="gallery-post-button">
				<div class="swiper-button-next"><span>Next case</span><img src="<?php echo get_stylesheet_directory_uri()?>/assets/images/next.png" border="0" alt=""></div>
				<div class="swiper-button-prev"><img src="<?php echo get_stylesheet_directory_uri()?>/assets/images/prev.png" border="0" alt=""><span>Previous case</span></div>
			</div>
		</div>
		<?php the_content();?>
	</div>
</section>
 <?php get_footer(); ?>