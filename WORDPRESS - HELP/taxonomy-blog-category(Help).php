<?php

/**

** The template for displaying Post Category pages

**/



get_header(); ?>
<?php
	$format = get_post_format();
	$post_type = get_post_type();
	$category_type = get_query_var( 'taxonomy' );
	$category_slug = get_query_var( 'term' ); 
	
?>
<?php
	$term = get_queried_object();
	$post_type = 'post';
	$taxonomy_slug = 'category';
	$current_tax = $wp_query->get_queried_object();
	$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
	$posts_per_page = 12;

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
<section class="inner-banner-area common-background-style" style="background-image:url('assets/images/service-banner-image.jpg')">
	<div class="container">
		<div class="inner-container">
			<div class="inner-banner-wrapper">
				<h1><?php echo $term-> name;?></h1>
				<div class="site-breadcrumb">
					<a href="">Home</a> 
					<span class="spt">/</span>
					<a href="">conditions</a> 
					<span class="spt">/</span>
					<a href="">arousal disorders</a> 
					<span class="spt">/</span>
					<strong>  persistent genital arousal disorder</strong>
				</div>
			</div>
		</div>
	</div>
</section>
<?php if($post_archive->have_posts()):?>
<section class="blog-area">
	<div class="container">
		<div class="blog-wrapper">
			<?php
				$terms = get_terms( array(
				'taxonomy' => $taxonomy_slug,
				'hide_empty' => false,
				) );
			?>
			<?php if($terms):?>
			<select class="select-style form-control" onchange="if(this.value!='') window.location.href=this.value;">
				<option selected="true" disabled="disabled"><?=__('Categories','twentychild')?></option>
				<?php foreach($terms as $terms_post): ?>
				<option value="<?=get_term_link($terms_post)?>"><?=$terms_post->name?></option>
				<?php endforeach; ?>
			</select>
			<?php endif;?>
			<div class="row">
				<?php while($post_archive->have_posts()): $post_archive->the_post();
					$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full'); 
				?>
				<div class="col-md-6 col-lg-4">
					<div class="each-blog h-100">
						<?php if($featured_img_url): ?>
						<div class="blog-image">
							<img src="<?php echo $featured_img_url; ?>" border="0" alt="" class="w-100">
						</div>
						<?php endif;?>
						<div class="blog-details">
							<h3><?php the_title();?></h3>
							<?php the_excerpt();?>
							<a href="<?php echo get_permalink();?>" class="common-link"><?=__('Read More','twentychild')?></a>
						</div>
					</div>
				</div>
				<?php endwhile; ?>
				<!-- %%%% Pagination %%%%% -->
				<div class="col-lg-12">
					<div class="pegination-area">
						<?php if($post_archive->max_num_pages): ?>
						<!-- Pagination -->
						<?php if (function_exists("pagination")) {
							pagination($post_archive->max_num_pages);
						} ?>
						<?php endif; ?>
					</div>
				</div>
				<!--  %%% Pagination end %%%% -->
			</div>
		</div>
	</div>
</section>
<?php else:?>
<section class="blog-area no-blog-area">
	<div class="container">
		<div class="blog-wrapper">
			<h3>SORRY! No Post Found Under This Category.</h3>
		</div>
	</div>
</div>
<?php endif;?>
<!-- ============================= End :: Blog Listing ======================= -->

<?php get_footer(); ?>

