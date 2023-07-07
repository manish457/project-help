<?php
/*
 * Template Name: Gallery Template
 * Description: Template file for the Gallery Page Only
 */
 
get_header(); 
global $galleries_per_page;
	$term = get_queried_object();
	$post_type = 'gallery';
	$taxonomy_slug = 'gallery-category';
	$current_tax = $wp_query->get_queried_object();
	$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
	$posts_per_page = 6;

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
<section class="inner-back-image gallery-area">
	<div class="container">
		<div class="inner-head">
			<h1><?php the_title()?></h1>
			<?php simple_breadcrumb(); ?>      
		</div>
		<div class="gallery-faq-wrapper">
			<?php
			$terms_gallery = get_terms( $taxonomy_slug, array(
			'hide_empty' => false,
			'parent'   => 0,
			) );
			if($terms_gallery):
		?>
			<ul id="accordion">		
				<?php foreach($terms_gallery as $key => $gallery_category): ?>
				<?php 
				$child_terms = get_terms( $taxonomy_slug, array(
					'hide_empty' => false,
					'parent'   => $gallery_category->term_id
				) );
				if($child_terms): ?>
				<li>
					<span><?php echo $gallery_category->name; ?></span>
					<div style="display: none;">								
						<ul>
						<?php foreach($child_terms as $key => $child_term): ?>
						<li><a href="<?php echo esc_url( get_term_link( $child_term ) ) ?>"><?=$child_term->name?></a></li>
						<?php endforeach; ?>
						</ul>
					</div>
				<?php else: ?>
				<li><a href="<?php echo esc_url( get_term_link( $gallery_category ) ) ?>"><?php echo $gallery_category->name; ?></a></li>
				<?php endif; ?>
				</li>
				<?php endforeach; ?>			
			</ul>
		<?php endif; ?>		
			
		</div>
	</div>
</section>
<?php get_footer(); ?>
