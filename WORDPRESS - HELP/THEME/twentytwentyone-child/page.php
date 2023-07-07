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
<section class="">
	<div class="container">
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
