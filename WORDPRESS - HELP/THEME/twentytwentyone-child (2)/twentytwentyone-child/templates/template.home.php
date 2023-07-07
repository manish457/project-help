<?php
/*
 * Template Name: Home template
 * Description: Template file for the Home Page Only
 */
 
get_header(); ?>
<section class="banner-area d-flex align-items-center common-background-style" style="background-image:url('<?=get_field('home_banner_image')?>')">
	<div class="container">
		<?php if(get_field('site_logo', 'option')) : ?>
		<div class="banner-logo">
			<a href="<?=get_home_url()?>"><img src="<?=get_field('site_logo', 'option')['url']?>" border="0" title="<?=get_field('site_logo', 'option')['title']?>" alt="<?=get_field('site_logo', 'option')['alt']?>"></a>
		</div>
		<?php endif; ?>
	</div>
</section>
<section class="about-us-section">
	<div class="container">
		<div class="row">
			<div class="col-lg-7">
				<div class="about-us-content">
					<?=get_field('about_us_section_content')?>
					<?php if(get_field('about_us_section_button_text')) : ?>
					<a href="<?=get_field('about_us_section_button_link')?>" class="common-button"><?php the_field('about_us_section_button_text')?></a>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
	<?php if(get_field('about_us_section_image')) : ?>
	<div class="about-us-image">
		<img src="<?=get_field('about_us_section_image')?>" border="0" alt="">
	</div>
	<?php endif; ?>
</section>
<section class="meet-the-doctor">
	<div class="container">
		<div class="meet-the-doctor-wrapper">
			<?php if(get_field('meet_the_doctors_title')) : ?>
			<h2><?php the_field('meet_the_doctors_title')?></h2>
			<?php endif; ?>
			<?php
			$featured_posts = get_field('select_doctor_for_home_page');
			if( $featured_posts ): ?>
			<div class="row">
				 <?php foreach( $featured_posts as $post ):				
				setup_postdata($post); ?>
				<div class="col-lg-3">
					<div class="each-doctor text-center">
						<?php if(get_field('doctor_image')) : ?>
						<div class="doctor-image ml-auto mr-auto">
							<img src="<?php the_field('doctor_image')?>" border="0" alt="">
						</div>
						<?php endif; ?>
						<div class="doctor-content">
							<h4><?=get_field('doctor_first_name')?> <?=get_field('doctor_last_name')?></h4>
							<h5><?php the_field('designation')?></h5>
							<a href="<?php the_permalink(); ?>" class="common-button">Meet Dr. <?=get_field('doctor_last_name')?></a>
						</div>
					</div>
				</div>
				<?php endforeach; ?>				
			</div>
			<?php 				
				wp_reset_postdata(); ?>
			<?php endif; ?>
		</div>
	</div>
</section>
<section class="services-area desktop-view">
	<div class="services-area-image">
		<?php if( have_rows('manage_our_services') ): ?>
		<?php $i = 1; ?>
			<?php while( have_rows('manage_our_services') ) : the_row(); ?>
				<?php if(get_sub_field('service_image')) : ?>
				<div class="each-service-image <?php if($i == 1) : ?>active<?php endif; ?>"><img src="<?php the_sub_field('service_image')?>" border="0" alt=""></div>
				<?php endif; ?>
			<?php $i++; endwhile; ?>
		<?php endif; ?>
	</div>
	<div class="container">
		<div class="row flex-row-reverse">
			<div class="col-lg-6">
				<div class="services-content">
					<?php if(get_field('our_services_section_title')) : ?>
					<h2><?php the_field('our_services_section_title')?></h2>
					<?php endif; ?>
					<?php if( have_rows('manage_our_services') ): ?>
					<?php $j = 1; ?>
					<div class="nav-tab-list">
						<ul>
							<?php while( have_rows('manage_our_services') ) : the_row(); ?>
							<li <?php if($j == 1) : ?>class="active"<?php endif; ?>><a href="javascript:void(0)"><?php the_sub_field('service_name')?></a></li>
							<?php $j++; endwhile; ?>
						</ul>
					</div>
					
					<div class="service-tab-listing-wrapper">
						<?php $k = 1; ?>
						<?php while( have_rows('manage_our_services') ) : the_row(); ?>
						<div class="each-tab-content <?php if($k == 1) : ?>active<?php endif; ?>">
							<?php if( have_rows('manage_service_inner_page') ): ?>
							<ul>
								<?php while( have_rows('manage_service_inner_page') ) : the_row(); ?>
								<li><a href="<?php the_sub_field('service_inner_page_link')?>"><?php the_sub_field('service_inner_page_name')?></a></li>
								<?php endwhile; ?>
							</ul>
							<?php endif; ?>
						</div>
						<?php $k++; endwhile; ?>
					</div>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
</section>
<section class="service-area mob-view">
	<div class="container">
		<?php if(get_field('our_services_section_title')) : ?>
		<h2><?php the_field('our_services_section_title')?></h2>
		<?php endif; ?>
		<?php if( have_rows('manage_our_services') ): ?>
		<div class="mob-service-list-wrapper">
			<ul id="accordion">
				<?php while( have_rows('manage_our_services') ) : the_row(); ?>
				<li><span><?php the_sub_field('service_name')?></span>
					<?php if( have_rows('manage_service_inner_page') ): ?>
					<div>
						<ul>
							<?php while( have_rows('manage_service_inner_page') ) : the_row(); ?>
							<li><a href="<?php the_sub_field('service_inner_page_link')?>"><?php the_sub_field('service_inner_page_name')?></a></li>
							<?php endwhile; ?>						
						</ul>
					</div>
					<?php endif; ?>
				</li>
				<?php endwhile; ?>				
			</ul>
		</div>
		<?php endif; ?>
	</div>
</section>
<section class="medical-spas">
	<?php if(get_field('our_medical_spas_section_image')) : ?>
	<div class="about-us-image">
		<img src="<?php the_field('our_medical_spas_section_image')?>" border="0" alt="">
	</div>
	<?php endif; ?>
	<div class="container">
		<div class="row">
			<div class="col-lg-6">
				<div class="medical-spas-content">
					<?php the_field('our_medical_spas_section_content')?>
					<?php if(get_field('our_medical_spas_section_button_text')) : ?>
					<a href="<?php the_field('our_medical_spas_section_button_link')?>" class="common-button"><?php the_field('our_medical_spas_section_button_text')?></a>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
</section>
<?php get_footer(); ?>
