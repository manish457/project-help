<?php
/*
 * Template Name:Procedure Overview Template
 * Description: Template file for the Procedure Overview Page Only
 */
 
get_header(); ?>
<section class="procedure-overview-area">
	<div class="container">
		<div class="inner-head">
			<h1><?php the_title()?> Procedures</h1>
			<?php simple_breadcrumb(); ?>      
		</div>
		<section class="pr-over-area full-width">
			<?php if(get_field('overview_page_image')) : ?>
			<div class="pr-over-image-area common-background-style" style="background-image:url('<?php the_field('overview_page_image')?>')">
				<div class="pr-over-image-for-mob d-lg-none">
					<img src="<?php the_field('overview_page_image')?>" border="0" alt="" class="w-100">
				</div>
			</div>
			<?php endif; ?>
			<?php if( have_rows('manage_overview_page_list') ): ?>
			<div class="container">
				<div class="row flex-row-reverse">
					<div class="col-lg-7">
						<div class="pr-over-text">
							<ul>
								<?php  while( have_rows('manage_overview_page_list') ) : the_row(); ?>
								<li><a href="<?php the_sub_field('page_link')?>"><?php the_sub_field('page_name')?></a></li>
								<?php endwhile; ?>								
							</ul>
						</div>
					</div>
				</div>
			</div>
			<?php endif; ?>
		</section>
		<?php echo do_shortcode('[meet-the-doctor-inject]'); ?>
	</div>
</section>
<?php get_footer(); ?>
