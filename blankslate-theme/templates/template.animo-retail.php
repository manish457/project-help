<?php

/*

 * Template Name: AnimoRetail template

 * Description: Template file for the AnimoRetail Page Only

 */

 

get_header(); ?>
<?php get_template_part( 'template-parts/header-banner' ); ?>
  <!-- ======= retail management Section ======= -->

  <section id="retail resturant" class="retail resturant">
    <div class="container aos-init aos-animate" data-aos="fade-up">
      <div class="row gx-0">
        <?php the_field('retail_management_heading');?>
        <div class="col-lg-6 d-flex flex-column justify-content-center aos-init aos-animate" data-aos="fade-up"
          data-aos-delay="200">
          <div class="content resturant-content">
             <?php the_field('retail_management_content');?>
          </div>
        </div>
        <div class="col-lg-6 d-flex align-items-center aos-init aos-animate" data-aos="zoom-out" data-aos-delay="200">
          <img src="<?php the_field('retail_management_image');?>" class="img-fluid" alt="">
        </div>
      </div>
    </div>
  </section>

  <!-- End retail management  Section -->

  <!-- ======= Benifits Section ======= -->
   <?php echo do_shortcode( '[business-benifit-inject]')?>
  <!-- ======= BUSINESS SEGMENTS Section ======= -->
  <?php if(get_field('show_business_segments')==true):?>
  <section class="segments">
    <h2><?php the_field('business_segments_heading');?></h2>
    <div class="container">
      <div class="row">
         <?php if( have_rows('business_segments_manager') ): ?>
         <?php $k=1; while( have_rows('business_segments_manager') ): the_row();?>
        <div class="col-lg-2 col-md-4 col-6 sigmnt-box <?php if($k>12){?>d-none<?php }?>">
          <div class="lists">
            <a href="<?php the_sub_field('business_segments_link'); ?>"><?php the_sub_field('business_segments_icon'); ?>
              <p><?php the_sub_field('business_segments_title'); ?></p>
            </a>
          </div>
        </div>
        <?php $k++; endwhile; ?> 
        <?php endif;?>
      </div>
      <a class="btn-add-more animate__animated animate__fadeInUp scrollto" id="loadmore" style="cursor: pointer;">And Many More <i
          class="bi bi-plus"></i></a>
    </div>
  </section>
 <?php endif;?>
  <!-- End #main -->

  <!-- ======= Buy And Sales Section ======= -->
  <!-- Start Configuration and Integration -->
  <section id="configuration" class="configuration position-relative"  style="background: url(<?php the_field('configuration_and_integration_bg'); ?>) center center/cover">
    <div class="container">
      <div class="row gy-4 align-items-center configuration-item" data-aos="fade-up">
        <h3><?php the_field('configuration_and_integration_heading'); ?></h3>
        <div class="col-md-5">
          <img src="<?php the_field('configuration_and_integration_img'); ?>" class="img-fluid" alt="configaration_img">
        </div>
        <div class="col-md-7">
          <?php the_field('configuration_and_integration_content'); ?>
        </div>
      </div>
    </div>
  </section><!-- End Configuration and Integration Section -->

  <!-- Start Inventory Management -->
  <section id="inventory" class="inventory">
    <div class="container">
     <div class="row gy-4 align-items-center inventory-item" data-aos="fade-up">
        <h3><?php the_field('inventory_management_heading'); ?></h3>
        <div class="col-md-5 order-1 order-md-2">
          <img src="<?php the_field('inventory_management_img'); ?>" class="img-fluid" alt="inventory_management">
        </div>
        <div class="col-md-7 order-2 order-md-1">
          <?php the_field('inventory_management_content'); ?>
        </div>
      </div>
    </div>
  </section>

  <!-- End Inventory Management -->

  <!-- Start Distribution & Stock Transfers -->
  <section id="distribution" class="distribution position-relative" style="background: url(<?php the_field('distribution_&_stock_transfers_bg'); ?>) center center/cover">
    <div class="container">
      <div class="row gy-4 align-items-center distribution-item" data-aos="fade-up">
        <h3><?php the_field('distribution_&_stock_transfers_heading'); ?></h3>
        <div class="col-md-5">
          <img src="<?php the_field('distribution_&_stock_transfers_img'); ?>" class="img-fluid" alt="distribution-stock_transfers">
        </div>
        <div class="col-md-7">
           <?php the_field('distribution_&_stock_transfers_content'); ?>
        </div>
      </div>
    </div>
  </section>
  <!-- End Distribution & Stock Transfers -->
  <!-- Start Promotions & CRM Management -->
  <section id="promotions" class="promotions">
    <div class="container">
      <div class="row gy-4 align-items-center promotions-item" data-aos="fade-up">
        <h3><?php the_field('promotions_&_crm_heading'); ?></h3>
        <div class="col-md-5 order-1 order-md-2">
          <img src="<?php the_field('promotions_&_crm_img'); ?>" class="img-fluid" alt="inventory_management">
        </div>
        <div class="col-md-7 order-2 order-md-1">
         <?php the_field('promotions_&_crm_content'); ?>
        </div>
      </div>
    </div>
  </section>

  <!-- End Promotions & CRM Transfers -->

  <!-- Start Purchase Management -->

  <section id="purchase" class="purchase position-relative" style="background: url(<?php the_field('purchase_management_bg'); ?>) center center/cover">
    <div class="container">
      <div class="row gy-4 align-items-center purchase-item" data-aos="fade-up">
        <h3><?php the_field('purchase_management_heading'); ?></h3>
        <div class="col-md-5">
          <img src="<?php the_field('purchase_management_img'); ?>" class="img-fluid" alt="distribution-stock_transfers">
        </div>
        <div class="col-md-7">
           <?php the_field('purchase_management_content'); ?>
        </div>
      </div>
    </div>
  </section>

  <!-- End Purchase Management -->

  <!-- Start B2B Sales / Wholesale -->

  <section id="sales" class="sales">
    <div class="container">
      <div class="row gy-4 align-items-center sales-item" data-aos="fade-up">
        <h3><?php the_field('b2b_sales_or_wholesale_heading'); ?></h3>
        <div class="col-md-5 order-1 order-md-2">
          <img src="<?php the_field('b2b_sales_or_wholesale_img'); ?>" class="img-fluid" alt="inventory_management">
        </div>
        <div class="col-md-7 order-2 order-md-1">
          <?php the_field('b2b_sales_or_wholesale_content'); ?>
        </div>
      </div>
    </div>
  </section>

  <!-- End B2B Sales / Wholesale -->

  <!-- Start Employee Management -->

  <section id="employee" class="employee position-relative" style="background: url(<?php the_field('employee_management_bg'); ?>) center center/cover">
    <div class="container">
      <div class="row gy-4 align-items-center employees" data-aos="fade-up">
        <h3><?php the_field('employee_management_heading'); ?></h3>
        <div class="col-md-5">
          <img src="<?php the_field('employee_management_img'); ?>" class="img-fluid" alt="distribution-stock_transfers">
        </div>
        <div class="col-md-7">
          <?php the_field('employee_management_content'); ?>
        </div>
      </div>
    </div>
  </section>

  <!-- End Employee Management -->

  <!-- Start POS Billing -->
  <section id="pos" class="pos">
    <div class="container">
      <div class="row gy-4 align-items-center billing" data-aos="fade-up">
        <h3><?php the_field('pos_billing_heading'); ?></h3>
        <div class="col-md-5 order-1 order-md-2">
          <img src="<?php the_field('pos_billing_img'); ?>" class="img-fluid" alt="inventory_management">
        </div>
        <div class="col-md-7 order-2 order-md-1">
          <?php the_field('pos_billing_content'); ?>
        </div>
      </div>
    </div>
  </section>

  <!-- End POS Billing -->

  <!-- ======= End Buy And Sales Section ======= -->


<?php get_footer(); ?>