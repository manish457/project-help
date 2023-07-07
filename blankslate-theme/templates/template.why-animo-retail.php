<?php

/*

 * Template Name: Why AnimoRetail template

 * Description: Template file for the Why AnimoRetail Page Only

 */

 

get_header(); ?>
<?php get_template_part( 'template-parts/header-banner' ); ?>
 <!-- ======= start STARTUP TO ENTERPRISE VERSIONS Section ======= -->
 <?php if( have_rows('why_animoretail_manage') ): ?>
  <section id="startup" class="startup">
    <div class="container aos-init aos-animate" data-aos="fade-up">
      <ul class="nav nav-tabs row d-flex" role="tablist">
        <?php $l=1; while( have_rows('why_animoretail_manage') ): the_row();?> 
        <li class="nav-item col-6 col-lg-3" role="presentation">
          <a class="nav-link <?php if($l==1){?> show active<?php }?>" data-bs-toggle="tab" data-bs-target="#tab-<?=$l;?>" aria-selected="false" role="tab"
            tabindex="-1">
            <?php the_sub_field('why_animoretail_icon'); ?>
            <h4 class="d-lg-block"><?php the_sub_field('why_animoretail_heading'); ?></h4>
          </a>
        </li>
        <?php $l++; endwhile; wp_reset_postdata(); ?>
      </ul>
      
      <div class="tab-content">
         <?php $l=1; while( have_rows('why_animoretail_manage') ): the_row();?> 
        <div class="tab-pane <?php if($l==1){?> show active<?php }?>" id="tab-<?=$l;?>" role="tabpanel">
          <div class="row">
            <div class="col-lg-6 order-2 order-lg-1 mt-3 mt-lg-0 aos-init aos-animate" data-aos="fade-up"
              data-aos-delay="100">
              <?php the_sub_field('why_animoretail_content'); ?>
            </div>
            <div class="col-lg-6 order-1 order-lg-2 text-center aos-init aos-animate" data-aos="fade-up"
              data-aos-delay="200">
              <img src="<?php the_sub_field('why_animoretail_img'); ?>" class="img-fluid" />
            </div>
          </div>
        </div>
         <?php $l++; endwhile; wp_reset_postdata(); ?>
      </div>
    </div>
  </section>
<?php endif;?>
  <!-- End STARTUP TO ENTERPRISE VERSIONS Section -->

<?php get_footer(); ?>