<?php

/*

 * Template Name: Partnership template

 * Description: Template file for the Partnership Page Only

 */

 

get_header(); ?>
<?php get_template_part( 'template-parts/header-banner' ); ?>

  <!-- ======= Partnership Section ======= -->

  <section id="partnership" class="partnership">
    <div class="container aos-init aos-animate" data-aos="fade-up">
      <div class="row gx-0">
        <?php the_field('partnership_heading');?>
        <div class="col-lg-6 d-flex flex-column justify-content-center aos-init aos-animate" data-aos="fade-up"
          data-aos-delay="200">
          <div class="partnership-content">
            <?php the_field('partner_benefits_content');?>
          </div>
        </div>
        <div class="col-lg-6 d-flex align-items-center aos-init aos-animate" data-aos="zoom-out" data-aos-delay="200">
          <img src="<?php the_field('partner_benefits_img');?>" class="img-fluid" alt="">
        </div>
      </div>
    </div>
  </section>

  <!-- End Partnership   Section -->

  <!-- ======= Partner Details Section ======= -->

  <section id="partner" class="partner" data-scroll-index="6">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h3><?php the_field('partner_type,_responsibility_heading');?></h3>
           <?php the_field('partner_type,_responsibility_content');?>
        </div>
      </div>
    </div>
  </section>

  <!-- ======= Channel Partner Growth Section ======= -->

  <section id="channel" class="channel" data-scroll-index="6">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h3><?php the_field('channel_partner_growth_heading');?></h3>
          <?php the_field('channel_partner_growth_content');?>
        </div>
      </div>
    </div>
  </section>

  <!-- End #main -->

<?php get_footer(); ?>