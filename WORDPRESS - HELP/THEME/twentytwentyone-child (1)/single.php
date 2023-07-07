<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

get_header(); ?>
<style type="text/css">
.header-area{
	position:absolute;	
	background:#fff;	
	-webkit-box-shadow: 0px 0px 29px -3px rgba(0,0,0,0.3);
	-moz-box-shadow: 0px 0px 29px -3px rgba(0,0,0,0.3);
	box-shadow: 0px 0px 29px -3px rgba(0,0,0,0.3);
}
.header-area .phone-number{
	color:#222222;
}
.header-area .site-logo{    
    pointer-events: all;
    opacity: 1;
}
.header-area rect, .header-area text{    
    fill:#222222 !important;
}
.header-are .phone-number:hover{
    color: #043F5F;
}
</style>
<div class="home-body-content">
	<section class="contact-banner white-banner default-blog" >
		<div class="container">
			<div class="row">
				<div class="col-lg-8 blog-content">	
					<h1><?php the_title(); ?></h1>
					<div class="site-breadcrumb">
						<?php
						if (function_exists('simple_breadcrumb')) {
							simple_breadcrumb();
						} ?>
					</div>
					<?php
					while ( have_posts() ) : the_post();
						the_content();
					endwhile; 
					?>
				</div>
				<div class="col-lg-4">
					<?php $featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full'); ?>
					<?php if($featured_img_url != ''): ?>
						<img src="<?php echo $featured_img_url; ?>" border="0" alt="" class="w-100 blog-img">
						<?php endif; ?>
					<?php
					$terms_post = get_terms( array(
						'taxonomy' => 'category',
						'hide_empty' => false,
					) ); ?>
					<div class="select-area">
						<select onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
							<option>Choose Category</option>
							<?php foreach($terms_post as $terms_posts): ?>
							<option value="<?php echo get_category_link($terms_posts); ?>"><?php echo $terms_posts->name; ?></option>
							<?php endforeach; ?>
						</select>
					</div>
					<?php if( have_rows('manage_sidebar_buttons', 'option') ): ?>
					<?php while( have_rows('manage_sidebar_buttons', 'option') ): the_row(); 
						$image = get_sub_field('button_image');
						?>
						<div class="blog-big-button">
							<a href="<?php the_sub_field('button_link');?>">
								<div class="each-button" style="background:url(<?php echo $image; ?>)no-repeat center center /cover">						
									<div class="button-content">
										<?php if(get_sub_field('button_name')) : ?>
										<?php the_sub_field('button_name');?>
										<?php endif; ?>
									</div>						
								</div>
							</a>
						</div>
						<?php endwhile; ?>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</section>
</div>
<?php get_footer(); ?>


