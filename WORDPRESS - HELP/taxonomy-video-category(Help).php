<?php
get_header(); ?>
<!-- ----------- START: PAGE BANNER --------- -->
<?//php get_template_part( 'template-parts/header-banner' ); ?>
<!-- ----------- END: PAGE BANNER --------- -->
<?php
	$format = get_post_format();
	$post_type = get_post_type();
	$category_type = get_query_var( 'taxonomy' );
	$category_slug = get_query_var( 'term' ); 
	$current_taxonomy = $wp_query->get_queried_object();
?>
<?php
$term = get_queried_object();
$post_type = 'video';
$taxonomy_slug = 'video-category';
$current_taxonomy = $wp_query->get_queried_object();
$tax_query = $current_taxonomy-> term_id;
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
$args_post = array(
	'orderby' => 'DATE', 
	'order' => 'DESC', 
	'post_type' => $post_type, 
	'posts_per_page' => -1, 
	'paged'=> $paged,
	'tax_query' => array(
		array(
			'taxonomy' => 'video-category',
			'field' => 'term_id',
			'terms' => $current_taxonomy -> term_id,
		)
	)
);
$the_query = new WP_Query( $args_post );
$term = get_term( $tax_query, $taxonomy_slug );
	$term_link = get_term_link( $term );
?>
<?php 
$terms_post = get_terms( array(
	'taxonomy' => 'video-category',
	'hide_empty' => false,
) ); ?>
<section class="blog-post-area">
   <div class="container">
	   <div class="catagory-information text-center">
		   <h1>
			   <?php  echo $term-> name;?>
		   </h1>
	   </div>
	</div>

</section>
<section class="video-gallery-area">
	<div class="container">
		<div class="video-gallery-wrapper">
			<h2 class="text-center">Sort by Category</h2>
			<?php  echo $term-> description;?>
			<select class="select-style form-control" name="category_id" id="category_id" onchange="if (this.value) window.location.href=this.value">
				<option value="all"><?=__('All categories','twentychild')?></option>
				<?php foreach($terms_post as $terms_post_cat): ?>
				<option value="<?php echo get_category_link($terms_post_cat); ?>"><?php echo $terms_post_cat->name; ?></option>
				<?php endforeach; wp_reset_postdata();?>
			</select>
		</div>
		<div class="video-gallery-cat-name">
			<h2 class="text-center">
				<?php echo $terms_posts->name; ?>
			</h2>
			<?php 
				if($the_query->have_posts()): 
			?>
			<div class="row">
				<?php					
					//$i = 0;					
					while ($the_query -> have_posts()) : 
					$the_query -> the_post();	
					$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full');					
				?>
				<div class="col-md-4">
					<div class="each-video-gallery">
						<div class="blog-each-text">
							<?php if(get_field('youtube_embed_url')):?>
							<iframe width="100%" height="207" src="<?php the_field('youtube_embed_url')?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
							<?php else:?>
							<img src="/wp-content/uploads/2022/06/Houman_Video-Thumbnail-1.jpg" alt="">
							<?php endif;?>
							<h2><a href="<?php echo get_permalink(); ?>"><?php the_title();?></a></h2>
							<a href="<?php echo get_permalink(); ?>" class="rd-btn"><?=__('Watch Video','twentychild')?></a>
						</div>
					</div>
				</div>
				<?php endwhile; wp_reset_postdata();?>
			</div>
			<?php endif;?>
		</div>
	</div>
</section>
<?php get_footer(); ?>