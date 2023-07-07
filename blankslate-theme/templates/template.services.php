<?php

/*

 * Template Name: Services template

 * Description: Template file for the Services Page Only

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
  <!-- Start FAQ Section -->

  <section id="faq" class="faq">
    <div class="container aos-init aos-animate" data-aos="fade-up">
      <div class="row gy-4">
        <div class="col-lg-4">
          <div class="content px-xl-5">
            <h3><?php the_field('faq_heading'); ?></h3>
          </div>
        </div>
         <?php if( have_rows('faq_manage') ): ?>
        <div class="col-lg-8">
          <div class="accordion accordion-flush aos-init aos-animate" id="faqlist" data-aos="fade-up"
            data-aos-delay="100">
            <?php $k=1; while( have_rows('faq_manage') ): the_row();?> 
            <div class="accordion-item">
              <h3 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"

                  data-bs-target="#faq-content-<?=$k;?>" aria-expanded="false">

                  <i class='bx bxs-bolt-circle'></i>

                 <?php the_sub_field('faq_title'); ?>

                </button>
              </h3>

              <div id="faq-content-<?=$k;?>" class="accordion-collapse collapse" data-bs-parent="#faqlist" style="">
                <div class="accordion-body">
                  <?php the_sub_field('faq_text'); ?>
                </div>
              </div>
            </div>
            <?php $k++; endwhile; wp_reset_postdata(); ?>
          </div>
        </div>
        <?php endif;?>
      </div>
    </div>
  </section>



  <!-- End FAQ Section -->



<!-- ======= Talk Section ======= -->

<section id="talk" class="talk" style="background-image: url(<?php the_field('talk_bg'); ?>);">
  <div class="container" data-aos="fade-up">
    <div class="row" data-aos="fade-up" data-aos-delay="100">
      <div class="col-lg-6">
       <?php the_field('talk_heading'); ?>
      </div>

      <div class="col-lg-6">
        <?php echo do_shortcode('[contact-form-7 id="770" title="Contact form 2"]');?>
      </div>
    </div>
  </div>
</section><!-- End Contact Section -->



<?php get_footer(); ?>