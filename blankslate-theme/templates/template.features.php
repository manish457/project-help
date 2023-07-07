<?php

/*

 * Template Name: Features template

 * Description: Template file for the Features Page Only

 */
get_header(); ?>
<?php get_template_part( 'template-parts/header-banner' ); ?>

<!-- ======= Features Section ======= -->

  <!-- Start Configuration and Integration -->

  <section id="integration" class="integration">
    <div class="container">
      <div class="row gy-4 align-items-center integration-item" data-aos="fade-up">
        <h3><?php the_field('configuration_and_integration_heading');?></h3>
        <div class="col-md-5">
          <img src="<?php the_field('configuration_and_integration_img');?>" class="img-fluid" alt="configaration_img">
        </div>
        <div class="col-md-7">
          <?php the_field('configuration_and_integration_content');?>
        </div>
      </div>
    </div>
  </section><!-- End Configuration and Integration Section -->

  <!-- Start STORE OPERATIONS -->

  <section id="store-sec" class="store-sec position-relative" style="background: url(<?php the_field('store_operations_bg');?>) center center/cover">
    <div class="container">
      <div class="row gy-4 align-items-center store_operation" data-aos="fade-up">
        <h3><?php the_field('store_operations_heading');?></h3>
        <div class="col-md-5 order-1 order-md-2">
          <img src="<?php the_field('store_operations_img');?>" class="img-fluid" alt="store_operation">
        </div>
        <div class="col-md-7 order-2 order-md-1">
          <?php the_field('store_operations_content');?>
          <?php if(get_field('store_operations_btn_link')):?>
          <a href="<?php the_field('store_operations_btn_link');?>" class="btn-get-started animate__animated animate__fadeInUp scrollto"> Schedule Demo</a>
         <?php endif;?>
        </div>
      </div>
    </div>
  </section>

  <!-- End  STORE OPERATIONS -->

  <!-- Start INVENTORY -->

  <section id="inventory_sec" class="inventory_sec">
    <div class="container">
      <div class="row gy-4 align-items-center inventory_sec-item" data-aos="fade-up">
        <h3><?php the_field('inventory_heading');?></h3>
        <div class="col-md-5">
          <img src="<?php the_field('inventory_img');?>" class="img-fluid" alt="inventory">
        </div>
        <div class="col-md-7">
           <?php the_field('inventory_content');?>
           <?php if(get_field('inventory_btn_link')):?>
          <a href="<?php the_field('inventory_btn_link');?>" class="btn-get-started animate__animated animate__fadeInUp scrollto"> Schedule Demo</a>
           <?php endif;?>
        </div>
      </div>
    </div>
  </section>

  <!-- End INVENTORY -->

  <!-- Start HRMS -->

  <section id="hrm" class="hrm position-relative" style="background: url(<?php the_field('hrms_bg');?>) center center/cover">
    <div class="container">
      <div class="row gy-4 align-items-center hrm-item" data-aos="fade-up">
        <h3><?php the_field('hrms_heading');?></h3>
        <div class="col-md-5 order-1 order-md-2">
          <img src="<?php the_field('hrms_img');?>" class="img-fluid" alt="hrm">
        </div>
        <div class="col-md-7 order-2 order-md-1">
         <?php the_field('hrms_content');?>

           <?php if(get_field('hrms_btn_link')):?>
          <a href="<?php the_field('hrms_btn_link');?>" class="btn-get-started animate__animated animate__fadeInUp scrollto"> Schedule Demo</a>
           <?php endif;?>

        </div>
      </div>
    </div>
  </section>

  <!-- End HRMS -->

  <!-- Start LOYALTY & PROMOTIONS -->

  <section id="loyality" class="loyality">
    <div class="container">
      <div class="row gy-4 align-items-center loyality-item" data-aos="fade-up">
        <h3><?php the_field('loyalty_&_promotions_heading');?></h3>
        <div class="col-md-5">
          <img src="<?php the_field('loyalty_&_promotions_img');?>" class="img-fluid" alt="loyality">
        </div>

        <div class="col-md-7">
          <?php the_field('loyalty_&_promotions_content');?>

          <?php if(get_field('loyalty_&_promotions_btn_link')):?>
          <a href="<?php the_field('loyalty_&_promotions_btn_link');?>" class="btn-get-started animate__animated animate__fadeInUp scrollto"> Schedule Demo</a>
           <?php endif;?>

        </div>
      </div>
    </div>
  </section>

  <!-- End LOYALTY & PROMOTIONS -->

  <!-- Start REPORTS -->

  <section id="report" class="report position-relative" style="background: url(<?php the_field('reports_bg');?>) center center/cover">
    <div class="container">
      <div class="row gy-4 align-items-center report-item" data-aos="fade-up">
        <h3><?php the_field('reports_heading');?></h3>
        <div class="col-md-5 order-1 order-md-2">
          <img src="<?php the_field('reports_img');?>" class="img-fluid" alt="inventory_management">
        </div>

        <div class="col-md-7 order-2 order-md-1">
          <?php the_field('reports_content');?>
          <?php if(get_field('reports_btn_link')):?>
          <a href="<?php the_field('reports_btn_link');?>" class="btn-get-started animate__animated animate__fadeInUp scrollto"> Schedule Demo</a>
           <?php endif;?>
        </div>
      </div>
    </div>
  </section>

  <!-- End REPORTS -->

    <!-- ======= End Features Section ======= -->


<?php get_footer(); ?>