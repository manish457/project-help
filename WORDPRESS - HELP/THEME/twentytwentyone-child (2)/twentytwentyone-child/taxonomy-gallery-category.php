<?php
/**
** The template for displaying Post Type Gallery Category pages
**/

get_header(); ?>
<?php
	global $galleries_per_page;
	$term = get_queried_object();
	$post_type = 'gallery';
	$taxonomy_slug = 'gallery-category';
	$current_tax = $wp_query->get_queried_object();
	$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
	$posts_per_page = 9;

	$search_meta_query_featured = array('relation' => 'AND');
	
	$tax_query = $current_tax-> term_id;

	$args_galleries = array(
		'post_type' => $post_type, 
		'posts_per_page' => $posts_per_page,
		//'orderby' => 'DATE',
		//'order'   => 'DESC',
		'paged'=> $paged,
		'tax_query' => array(
			array(
				'taxonomy' => $taxonomy_slug,
				'field' => 'term_id',
				'terms' => $tax_query,
			)
		),
		'meta_query'	=> $search_meta_query_featured,
	);
	$gallery_archive = new WP_Query( $args_galleries );
	$pagesTotal = $gallery_archive->max_num_pages;

	$term = get_term( $tax_query, $taxonomy_slug );
	$term_link = get_term_link( $term );

	//$pagesTotal = $gallery_archive->max_num_pages;
?>
<?php if($gallery_archive->have_posts()):?>
<section class="inner-back-image gallery-procedure-area">
	<div class="container">
		<div class="inner-head">
			<h1><?php echo $term->name;?></h1>
			<?php
			if (function_exists('parent_gallery_category_breadcrumb')) {
				parent_gallery_category_breadcrumb($term->term_id, $taxonomy_slug);
			} ?>
		</div>
		<div class="gallery-procedure-wrapper">
			<div class="row">
				<?php while ( $gallery_archive->have_posts() ) : 
					$gallery_archive->the_post(); 
				?>
				<div class="col-lg-4 col-md-6">
					<a href="<?php echo get_permalink(); ?>">
						<div class="blog-each text-center">
							<?php
									if( have_rows('before_after_images') ):
										while( have_rows('before_after_images') ): the_row();
											if(get_sub_field('before_after_combined')):
								?>
							<!-- <div class="blog-each-image">
								
							</div> -->
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
								<?php	endif;
										break;
									endwhile; 
								endif; ?>
							<a href="<?php echo get_permalink(); ?>">View Case</a>
					</div>
					</a>
				</div>
				<?php endwhile;?>
				<!-- pagination  -->					
				<div class="col-lg-12">
					<div class="pegination-area">
						<?php if($gallery_archive->max_num_pages): ?>
						<!-- Pagination -->
						<?php if (function_exists("pagination")) {
							pagination($gallery_archive->max_num_pages);
						} ?>
						<?php endif; ?>
						<div class="clearfix"></div>
					</div>
				</div>
				<!-- pagination end -->
			</div>
		</div>
	</div>
</section>
<?php endif;?>
<?php get_footer(); ?>