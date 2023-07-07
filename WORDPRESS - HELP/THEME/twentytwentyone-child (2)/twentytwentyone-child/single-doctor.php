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
<section class="inner-back-image meet-dr-post-area">
	<div class="container">
		<div class="inner-head">
			<h1><?=get_field('doctor_first_name')?> <?=get_field('doctor_last_name')?><br>
				<?php the_field('designation')?>
			</h1>
			<?php simple_breadcrumb(); ?>
		</div>
		<div class="meet-dr-wrapper">
			<?php if(get_field('doctor_image')) : ?>
			<div class="meet-dr-image">
				<img src="<?php the_field('doctor_image')?>" border="0" alt="">
			</div>
			<?php endif; ?>
			<?php
				/* Start the Loop */
				while ( have_posts() ) :
					the_post();
					the_content();
				endwhile; // End of the loop.
			?>
			<?php if(get_field('website_name')) : ?>
			<h6><a href="<?php the_field('website_url')?>" style="color:inherit;"><?php the_field('website_name')?></a></h6>
			<?php endif; ?>
		</div>
	</div>
</section>
<?php get_footer(); ?>


