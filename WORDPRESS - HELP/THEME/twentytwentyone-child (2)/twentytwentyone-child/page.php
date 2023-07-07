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
global $templates;
$post_id = get_the_ID();	
$bg_img = get_page_banner($post_id);
?>
<section class="procedure-area">
	<div class="container">
		<!-- ============================= Banner Section ===================== -->
		<?php get_template_part( 'template-parts/header-banner'); ?>
		<!-- ================ Page Content =================== -->				
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
<?php
get_footer();
