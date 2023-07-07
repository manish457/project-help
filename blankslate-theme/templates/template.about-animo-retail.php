<?php

/*

 * Template Name: About-AnimoRetail template

 * Description: Template file for the About-AnimoRetail Page Only

 */

 

get_header(); ?>
<?php get_template_part( 'template-parts/header-banner' ); ?>
  <!-- ======= retail management Section ======= -->

  <section id="abt-retail" class="abt-retail">
    <div class="container aos-init aos-animate" data-aos="fade-up">
      <div class="row">
        <div class="col-lg-6 d-flex flex-column justify-content-center aos-init aos-animate" data-aos="fade-up"
          data-aos-delay="200">
          <div class="content">
             <?php the_field('about_animo_retail_content');?>
          </div>
        </div>

        <div class="col-lg-6 d-flex align-items-center aos-init aos-animate" data-aos="zoom-out" data-aos-delay="200">
          <img src="<?php the_field('about_animo_retail_img');?>" class="img-fluid" alt="">
        </div>
      </div>
    </div>
  </section>

  <!-- End retail management  Section -->

<section class="vision-mission">
<div class="container aos-init aos-animate" data-aos="fade-up">
<div class="row">
<?php if( have_rows('vision-mission_manage') ): ?>
<?php $l=1; while( have_rows('vision-mission_manage') ): the_row();?>   
<div class="col-lg-6">
<div class="vm-block">
<img src="<?php the_sub_field('vision-mission_icon'); ?>" alt="Img" >
<h3><?php the_sub_field('vision-mission_title'); ?></h3>
<p><?php the_sub_field('vision-mission_content'); ?></p>
</div>
</div>
 <?php $l++; endwhile; ?> 
<?php endif;?>

</div>
</div>
</section>

<?php get_footer(); ?>