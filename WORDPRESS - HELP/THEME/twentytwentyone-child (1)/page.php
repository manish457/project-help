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
get_header();
?>
<!-- ============ Page Banner ============ -->
<?php get_template_part( 'template-parts/header-banner' ); ?>
<!-- ============ END :: Page Banner ============ -->
<div class="home-body-content">
	<section class="procedure-page-content">
		<div class="container">
				<!-- ================ Page Content =================== -->
				<?php echo do_shortcode('[inject-quick-links]'); ?>
				<?php
					/* Start the Loop */
					while ( have_posts() ) :
						the_post();
						the_content();
					endwhile; // End of the loop.
				?>
				<!-- ================ End :: Page Content ============ -->			
		</div>
	</section>
</div>
<?php
get_footer();
