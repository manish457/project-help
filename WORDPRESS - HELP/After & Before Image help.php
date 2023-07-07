<?php
// [inject_video_slider]
function inject_video_slider_function(){
	$content = '';
	global $post;
	$post_id = $post->ID;
	ob_start();	
	if(get_field('inject_before_&_after', $post_id) || get_field('show_before_&_after', 'option')):
?>
<?php 
	$choose_gallery = get_field('before_&_after_manger', $post_id);
	if($choose_gallery):
?>
<hr>
<section class="inject-image-slider text-center">
    <h2>Before & After</h2>
    <div class="swiper-container">
        <div class="swiper-wrapper">
			<?php foreach( $choose_gallery as $post ): 
        	// Setup this post for WP functions (variable must be named $post).
        	setup_postdata($post); ?>
            <div class="swiper-slide">
				<?php if(have_rows('before_after_images')):
					while(have_rows('before_after_images')): the_row();
				?>
				<?php if(get_sub_field('before_after_image_combined')['url']):?>
				<div class="single-marged-image">
					<img src="<?php echo get_sub_field('before_after_image_combined')['url'];?>">
				</div>
				<?php elseif(get_sub_field('before_image_gallery')['url'] || get_sub_field('after_image_gallery')['url']):?>
				<div class="each-single-img">
					<div class="col-md-6 befor-img-area">
						<img src="<?php echo get_sub_field('before_image_gallery')['url'];?>">
					</div>
					<div class="col-md-6 after-img-area">
						<img src="<?php echo get_sub_field('after_image_gallery')['url'];?>">
					</div>
				</div>
				<?php endif;?>
				<?php 
					break; endwhile;  wp_reset_postdata();
				endif;
					
				?>
            </div>
			<?php endforeach; ?>
             <?php 
			// Reset the global post object so that the rest of the page works correctly.
			wp_reset_postdata(); ?>
        </div>
    </div>
    <div class="swiper-button-next">
         <img src="/wp-content/uploads/2022/05/right-circle-arrow.svg" class="w-100">
    </div>
    <div class="swiper-button-prev">
       <img src="/wp-content/uploads/2022/05/left-circle-arrow.svg" class="w-100">
    </div>
    <?php if(get_field('more_gallery_case_links')):?>
     <div class="view-more mt-3">
         <a href="<?=the_field('more_gallery_case_links');?>">View More Cases</a>
     </div>
	<?php endif;?>
     
</section>
<hr>
<?php else:
	$choose_default_gallery = get_field('before_&_after_manger', 'option');
	if($choose_default_gallery):
?>
<section class="inject-image-slider text-center">
    <h2>Before & After</h2>
    <div class="swiper-container">
        <div class="swiper-wrapper">
			<?php foreach( $choose_default_gallery as $post ): 
        	// Setup this post for WP functions (variable must be named $post).
        	setup_postdata($post); ?>
            <div class="swiper-slide">
				<?php if(have_rows('before_after_images')):
					while(have_rows('before_after_images')): the_row();
				?>
				<?php if(get_sub_field('before_after_image_combined')['url']):?>
				<div class="single-marged-image">
					<img src="<?php echo get_sub_field('before_after_image_combined')['url'];?>">
				</div>
				<?php elseif(get_sub_field('before_image_gallery')['url'] || get_sub_field('after_image_gallery')['url']):?>
				<div class="each-single-img">
					<div class="col-md-6 befor-img-area">
						<img src="<?php echo get_sub_field('before_image_gallery')['url'];?>">
					</div>
					<div class="col-md-6 after-img-area">
						<img src="<?php echo get_sub_field('after_image_gallery')['url'];?>">
					</div>
				</div>
				<?php endif;?>
				<?php 
					break; endwhile;  wp_reset_postdata();
				endif;
					
				?>
            </div>
			<?php endforeach; ?>
             <?php 
			// Reset the global post object so that the rest of the page works correctly.
			wp_reset_postdata(); ?>
        </div>
    </div>
    <div class="swiper-button-next">
         <img src="/wp-content/uploads/2022/05/right-circle-arrow.svg" class="w-100">
    </div>
    <div class="swiper-button-prev">
       <img src="/wp-content/uploads/2022/05/left-circle-arrow.svg" class="w-100">
    </div>
	<?php if(get_field('more_gallery_case_links','option')):?>
     <div class="view-more mt-3">
         <a href="<?=the_field('more_gallery_case_links','option');?>">View More Cases</a>
     </div>
	<?php endif;?>
     
</section>
<hr>
<?php endif;?>
<?php endif;?>
<?php
	endif;
	$content = ob_get_clean();
	return $content;
}
add_shortcode( 'inject-before-after', 'inject_video_slider_function' );



?>