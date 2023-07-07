<?php
/**
** The template for displaying Post Category pages
**/

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
<?php
	$term = get_queried_object();
	$post_type = 'post';
	$taxonomy_slug = 'category';
	$current_tax = $wp_query->get_queried_object();
	$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
	$posts_per_page = 10;

	$search_meta_query_featured = array('relation' => 'AND');
	
	$tax_query = $current_tax-> term_id;
	$args_post = array(
		'post_type' => $post_type, 
		'posts_per_page' => $posts_per_page, 
		'paged'=> $paged,
		//'orderby' => 'DATE',
		//'order'   => 'DESC',
		'tax_query' => array(
			array(
				'taxonomy' => $taxonomy_slug,
				'field' => 'term_id',
				'terms' => $tax_query,
			)
		),
		'meta_query'	=> $search_meta_query_featured,
	);
	$post_archive = new WP_Query( $args_post );

	$term = get_term( $tax_query, $taxonomy_slug );
	$term_link = get_term_link( $term );

	$banner_image = get_field('banner_image');
	if($banner_image == '') {
		$banner_image = get_field('common_banner_image', 'option');
	}
?>

<div class="home-body-content">
	<section class="contact-banner white-banner">
		<div class="container">
			<h1><?php the_title(); ?></h1>
			<div class="site-breadcrumb">
				<?php
				if (function_exists('simple_breadcrumb')) {
					simple_breadcrumb();
				} ?>
			</div>
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
		</div>
	</section>
	
	<section class="our-blog">
		<div class="container">			
			<?php if($post_archive->have_posts()): ?>
			<div class="before-after-gallery-image">
				<img src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/Body-Graphic-1.png" border="0" alt="" class="w-100">
			</div>
			<div class="gallery-wrapper">
				<div class="row ottawa-gallery">
					<?php
					$difference = 100;
					$each_row_columns = 3;
					$i = 0;
					$first_jsuplxperspective = $difference;
					while ($post_archive -> have_posts()) : 
					$post_archive -> the_post();	
					$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full');
					$jsuplxperspective = $difference + ($difference * ($i % $each_row_columns));
					?>
					<div class="col-lg-4 procedure-item" data-jsuplxperspective="<?php echo $jsuplxperspective; ?>">
					<div class="each-blog" onclick="window.location.href='<?php echo get_permalink(); ?>'">
						<?php if($featured_img_url != ''): ?>
						<img src="<?php echo $featured_img_url; ?>" border="0" alt="" class="w-100">
						<?php endif; ?>
						<div class="blogtext">
							<p class="blog-category">
							<?php 
							foreach ( get_the_terms( get_the_ID(), 'category' ) as $tax ) {
								echo '<span>' . __( $tax->name ) . '</span>';
							}
							?>
							</p>
							<h2><?php the_title();?></h2>
							<?php the_excerpt();?>
							<a href="<?php echo get_permalink(); ?>">Read more</a>
						</div>
					</div>
				</div>
					<?php $i++; endwhile; ?>
					<div class="col-lg-12">
						<div class="pagination-area">
							<?php if($post_archive->max_num_pages): ?>
							<?php if (function_exists("pagination")) {
								pagination($post_archive->max_num_pages);
							} ?>
							<?php endif; ?>
						</div>
					</div>
				</div>
			</div>
			<?php else: ?>
			<div class="text-center p-5">
				<h3>No post yet under this category</h2>
			</div>
			<?php endif; ?>
		</div>
	</section>
	
</div>
<!-- ============================= End :: Blog Listing ======================= -->
<?php get_footer(); ?>
