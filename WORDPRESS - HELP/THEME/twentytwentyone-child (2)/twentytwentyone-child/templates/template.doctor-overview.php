<?php
/*
 * Template Name:Doctor Overview Template
 * Description: Template file for the Doctor Overview Page Only
 */
 
get_header(); ?>
<section class="inner-back-image meet-doctor-area">
	<div class="container">
		<div class="inner-head">
			<h1><?php the_title()?></h1>
			<?php simple_breadcrumb(); ?>      
		</div>
		<?php
		$args = array(  
        'post_type' => 'doctor',
        'post_status' => 'publish',
        'posts_per_page' => 8, 
        //'orderby’ => 'title', 
        'order' => 'ASC', 
		);

		$loop = new WP_Query( $args ); 		
		?>
		<div class="meet-doctor-wrapper">
			<div class="row">
				<?php while ( $loop->have_posts() ) : $loop->the_post();  ?>
				<div class="col-lg-12">
					<a href="">
						<div class="meet-each">
							<div class="row align-items-center">
								<?php if(get_field('doctor_image')) : ?>
								<div class="col-lg-3">
									<div class="meet-image">
										<a href="<?php the_permalink(); ?>"><img src="<?php the_field('doctor_image')?>" border="0" alt=""></a>
									</div>
								</div>
								<?php endif; ?>
								<div class="col-lg-9">
									<div class="meet-text">
										<h2><?=get_field('doctor_first_name')?> <?=get_field('doctor_last_name')?>, <?php the_field('designation')?></h2>
										<?php if(get_field('website_name')) : ?>
										<h6><a style="color:inherit;" href="<?php the_field('website_url')?>"><?php the_field('website_name')?></a></h6>
										<?php endif; ?>
										<a href="<?php the_permalink(); ?>" class="common-button">Meet Dr. <?=get_field('doctor_last_name')?></a>
									</div>
								</div>
							</div>
						</div>
					</a>
				</div>
				<?php endwhile; ?>
			</div>
		</div>
	</div>
</section>
<?php  wp_reset_postdata(); ?>
<?php get_footer(); ?>
