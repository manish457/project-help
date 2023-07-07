<?php
get_header(); ?>

<?php
$post_type = 'video';
$taxonomy_slug = 'video-category';
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
$args_post = array(
	'orderby' => 'DATE', 
	'order' => 'DESC', 
	'post_type' => $post_type, 
	'posts_per_page' => 3, 
	'paged'=> $paged,
);
$the_query = new WP_Query( $args_post );
?>
<section class="blog-post-area single-video-section">
	
</section>
<section class="single-video-section">
	<div class="container">
		<?php if ( have_posts() ) : 
		while ( have_posts() ) : the_post(); 
?>
		<div class="single-video-content">
			<h2><?php the_title();?></h2>
			<p>Posted on <?=get_the_date( 'F j, Y' )?> by <?php echo get_the_author(); ?></p>
			<?php if(get_field('youtube_embed_url')):?>
			<iframe width="100%" height="475" src="<?php the_field('youtube_embed_url')?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
			<?php endif;?>
		</div>
		<div class="sigle-editor-content">
			<?php the_content();?>
			<div class="text-center">
			<a href="/video-gallery/" class="common-button">BACK TO ALL VIDEOS</a>
			</div>
		</div>
		<?php endwhile; endif;?>
		<?php
			if($the_query->have_posts()): 
			?>
		<div class="recent-gallery">
			<h2>Related Videos</h2>
			<hr>
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
							<iframe width="100%" height="240" src="<?php the_field('youtube_embed_url')?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
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
		</div>
		<?php endif;?>
	</div>
</section>
<?php get_footer(); ?>

