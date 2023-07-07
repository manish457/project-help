<?php

/*

 * Template Name: Home template

 * Description: Template file for the Home Page Only

 */

 

get_header(); ?>
   <!-- ======= Hero Section ======= -->
 <?php if(get_field('show_banner')== true):?>
  <section id="hero" class="hero">
    <div class="hero-container">
      <div id="heroCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="5000">
        <ol class="carousel-indicators" id="hero-carousel-indicators">
        </ol>
        <?php if( have_rows('banner_slide') ): ?>
        <div class="carousel-inner" role="listbox">
          <?php $i = 1; while( have_rows('banner_slide') ): the_row();?>
          <div class="carousel-item <?php if($i==1){?>active<?php }?>" style="background-image: url('<?php the_sub_field('background_img'); ?>');">
            <div class="carousel-container">
              <div class="carousel-content container">
                <div class="row">
                  <div class="col-lg-6 order-lg-2 order-1">
                    <img src="<?php the_sub_field('banner_img'); ?>" alt="" />
                  </div>
                  <div class="col-lg-6 order-lg-1 order-2">
                    <div class="hero_text">
                      <p class="user">For All Users</p>
                      <h2 class="animate__animated animate__fadeInDown"><?php the_sub_field('banner_title'); ?></h2>
                      <p class="animate__animated animate__fadeInUp"><?php the_sub_field('banner_content'); ?></p>
                      <a href="<?php the_sub_field('get_in_touch_btn_link'); ?>" class="btn-get-started animate__animated animate__fadeInUp scrollto">GET IN TOUCH</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
         <?php $i++; endwhile; ?> 
        </div>
        <?php endif;?>
         <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
           <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
         </a> 
         <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next"> 
           <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span> 
         </a>
      </div>
    </div>
  </section>
 <?php endif;?>
  <!-- End Hero -->



  <main id="main">

    <!-- ======= store Section ======= -->
<?php if(get_field('show_retail_store_chain')== true):?>
    <section id="store" class="store">
      <div class="container" data-aos="fade-up">
        <h2 class="heading"><?php the_field('retail_store_chain_heading');?></h2>
        <p class="paragraph"><?php the_field('retail_store_chain_content');?></p>
        <div class="row no-gutters d-flex justify-content-center align-items-center">
          <div class="col-lg-6 video-box">
            <img src="<?php the_field('retail_store_chain_img');?>" class="img-fluid" alt="" />
          </div>
          <?php if( have_rows('retail_chain') ): ?>
          <div class="col-lg-6 d-flex flex-column about-content">
            <?php  while( have_rows('retail_chain') ): the_row();?>
            <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
              <div class="icon">
                <img src="<?php the_sub_field('chain_icon'); ?>" alt="vector" />
              </div>
              <p class="description"><?php the_sub_field('chain_content'); ?></p>
            </div>
            <?php endwhile; ?> 
          </div>
         <?php endif;?>
        </div>
      </div>
    </section>
 <?php endif;?>
    <!-- End store Section -->
    <!-- ======= customer Section ======= -->
<?php if(get_field('show_customer_experience')== true):?>
    <section id="customer_sec" class="customer_sec">
      <div class="container" data-aos="fade-up">
        <header class="section-header">
           <?php the_field('customer_experience_heading');?>
        </header>
        <?php if( have_rows('customer_experience_manager') ): ?>
        <div class="row justify-content-center">
          <?php while( have_rows('customer_experience_manager') ): the_row();?>
          <div class="col-lg-4" data-aos="fade-up" data-aos-delay="200">
            <div class="box">
              <img src="<?php the_sub_field('customer_img'); ?>" class="img-fluid" alt="" />
              <p><?php the_sub_field('customer_content'); ?></p>
            </div>
          </div> 
          <?php endwhile; ?> 
        </div>
        <?php endif;?>
      </div>
    </section>
<?php endif;?>
    <!-- End Values Section -->



    <!-- ======= multifold Section ======= -->
<?php if(get_field('show_increase_your_sales')== true):?>
    <section class="multifold section-bg">
      <div class="container">
        <h2><?php the_field('increase_your_sales_heading');?></h2>
        <div class="row">
          <?php if( have_rows('sales_box') ): ?>
          <div class="col-lg-6  text-center" data-aos="fade-up">
            <?php while( have_rows('sales_box') ): the_row();?>
            <div class="sales-box" style="background-image:url(<?php the_sub_field('sales_bg'); ?>);">
              <img src="<?php the_sub_field('sales_img'); ?>" alt="img" />
              <p><?php the_sub_field('sales_text'); ?></p>
            </div>
          <?php endwhile; ?> 
          </div>
          <?php endif;?>
          <div class="col-lg-6  text-center mt-4" data-aos="fade-up">
            <div class="image_1">
              <img src="<?php the_field('increase_your_sales_img');?>" alt="" />
            </div>
          </div>
        </div>
      </div>
    </section>
<?php endif;?>
    <!-- End multifold Section -->


  <!-- ======= Transparency Section ======= -->
<?php if(get_field('show_increase_your_sales')== true):?>
    <section id="transparency" class="transparency">
      <div class="container">
        <header class="section-header">
          <h1><?php the_field('transparency_heading');?></h1>
        </header>
        <?php if( have_rows('transparency_manager') ): ?>
        <div class="row">
          <?php $j=1; while( have_rows('transparency_manager') ): the_row();?>
          <div class="col-lg-4 <?php if($j==2){?>unique_item<?php }?>">
            <div class="box">
              <img src="<?php the_sub_field('transparency_img'); ?>" class="img-fluid" alt="" />
              <p><?php the_sub_field('transparency_content'); ?></p>
            </div>
          </div>
          <?php $j++; endwhile; ?> 
        </div>
        <?php endif;?>
      </div>

    </section>
<?php endif;?>
    <!-- End Transparency Section -->

    <!-- ======= customer experience Section ======= -->
<?php if(get_field('show_experience')== true):?>
    <section id="customer" class="customer" data-aos="fade-up">
      <div class="container">
        <?php if( have_rows('experience_manager') ): ?>
          <?php while( have_rows('experience_manager') ): the_row();?>
        <div class="item">
           <?php if( have_rows('each_experience') ): ?>
            <?php $k=1; while( have_rows('each_experience') ): the_row();?>
          <div class="row d-flex justify-content-center align-items-center <?php if($k%2==0){?>flex-row-reverse<?php }?>">
            <div class="col-lg-6">
              <div class="customers-cont">
                <?php the_sub_field('each_content'); ?>
              </div>
            </div>
            <div class="col-lg-6 ">
              <div class="experience-img">
                <img src="<?php the_sub_field('each_img'); ?>" alt="Img" />
              </div>
            </div>
          </div>
           <?php $k++; endwhile; ?> 
          <?php endif;?>
        </div>
        <?php endwhile; ?> 
      <?php endif;?>
      </div>
    </section>
<?php endif;?>
    <!-- End customer experienc Section -->



    <!-- ======= offer Section ======= -->
<?php if(get_field('show_experience')== true):?>
    <section id="offer" class="offer">
      <div class="container aos-init aos-animate" data-aos="fade-up">
        <div class="section-header">
          <h2><?php the_field('what_we_offer_heading');?></h2>
        </div>
        <?php if( have_rows('offer_manager') ): ?>
        <div class="row gy-5">
        <?php $l=1; while( have_rows('offer_manager') ): the_row();?>
          <div class="col-xl-4 col-12 d-flex justify-content-center aos-init aos-animate" data-aos="zoom-in" data-aos-delay="<?=$l*2?>00">
            <div class="offer-sec">
              <div class="offer-img">
                <img src="<?php the_sub_field('offer_img'); ?>" class="img-fluid" alt="" />
              </div>
                <a class="offer-info" href="<?php the_sub_field('offer_btn_link'); ?>">
                  <img src="<?php the_sub_field('offer_icon'); ?>" alt="logo">
                 <?php the_sub_field('offer_btn_text'); ?>
                </a> 
            </div>
          </div>
          <?php $l++; endwhile; ?> 
        </div>
       <?php endif;?>
      </div>
    </section>
<?php endif;?>
    <!-- End offer Section -->
    <!-- ======= Benifits Section ======= -->
    <?php echo do_shortcode( '[business-benifit-inject]')?>
    <!-- ======= Manage & improve Section ======= -->
<?php if(get_field('show_manage_and_improve_business')== true):?>
    <section id="manage" class="manage section-bg">
      <div class="container" data-aos="fade-up">
        <div class="section-header">
          <h2><?php the_field('manage_and_improve_business_heading');?></h2>
        </div>
        <div class="slides-2 swiper">
          <?php if( have_rows('improve_business_manager') ): ?>
          <div class="swiper-wrapper">
            <?php $l=1; while( have_rows('improve_business_manager') ): the_row();?>
            <div class="swiper-slide">
              <div class="manage-wrap">
                <div class="manage-item">
                  <img src="<?php the_sub_field('improve_business_icon'); ?>" class="manage-img" alt="">
                  <h3><?php the_sub_field('improve_business_title'); ?></h3>
                   <?php the_sub_field('improve_business_content'); ?>
                </div>
              </div>
            </div><!-- End Configuration and Integration item -->
            <?php $l++; endwhile; ?> 
          </div>
          <?php endif;?>
          <div class="swiper-pagination"></div>
        </div>
      </div>
    </section><!-- End Manage & improve Section -->
<?php endif;?>

    <!-- ======= BUSINESS SEGMENTS Section ======= -->
<?php if(get_field('show_business_segments')== true):?>
    <section class="business">
      <h2><?php the_field('business_segments_heading');?></h2>
      <div class="container">
        <ul class="each-segments-ul">
        <?php if( have_rows('business_segments_manage') ): ?>
          <?php $l=1; while( have_rows('business_segments_manage') ): the_row();?>
          <li>
            <a href="<?php the_sub_field('segments_link'); ?>">
             <div class="list_item">
                  <div class="list">
                    <figure>
                      <img src="<?php the_sub_field('segments_img'); ?>" alt="">
                    </figure>
                      <p><?php the_sub_field('segments_title'); ?></p>
                  </div>
              </div>
             </a>
           </li>
          <?php $l++; endwhile; ?> 
          <?php endif;?>
          </ul>
      </div>
    </section>
<?php endif;?>
    <!-- End BUSINESS SEGMENTS Section -->



    <!-- ======= Contact Section ======= -->

    <section id="contact" class="contact" style="background-image:url(<?php the_field('contact_bg','option');?>);">
      <div class="container" data-aos="fade-up">
        <div class="row" data-aos="fade-up" data-aos-delay="100">
          <div class="col-lg-6">
            <?php if(get_field('phone','option')):?>
            <h2>Call US - +91 <?php echo get_field('phone','option');?></h2>
            <?php endif;?>
            <div class="row">
               <?php if( have_rows('contact_counter' ,'option') ): ?>
               <?php $l=1; while( have_rows('contact_counter','option') ): the_row();?>
              <div class="col-lg-4 mb-3 col-md-4">
                <div class="stats-item text-center w-100 h-100">
                  <span data-purecounter-start="0" data-purecounter-end="<?php the_sub_field('number'); ?>" data-purecounter-duration="1"
                    class="purecounter"><?php the_sub_field('number'); ?></span>+
                  <p><?php the_sub_field('count_text'); ?></p>
                </div>
              </div><!-- End Stats Item -->
              <?php $l++; endwhile; ?> 
             <?php endif;?>

               <?php if( have_rows('contact_logo_grp' ,'option') ): ?>
               <?php $l=1; while( have_rows('contact_logo_grp','option') ): the_row();?>
              <div class="col-md-3">
                <div class="info-box mt-4">
                  <figure>
                    <img src="<?php the_sub_field('contact_logo'); ?>" alt="">
                  </figure>
                </div>
              </div>
               <?php $l++; endwhile; ?> 
             <?php endif;?>
              
            </div>
          </div>
          <div class="col-lg-6">
            <?php echo do_shortcode('[contact-form-7 id="5" title="Contact form 1"]');?>
          </div>
        </div>
      </div>
    </section><!-- End Contact Section -->
  </main>

  <!-- End #main -->



  <!-- news-letter-sec part start -->

  <div class="news_sec">
    <div class="container">
      <div class="row d-flex justify-content-center align-items-center">
        <div class="col-lg-5 col-md-6">
          <div class="letter">
            <h2>Our Newsletter</h2>
          </div>
        </div>
        <div class="col-lg-7 col-md-6">
          <div class="letter_part">
            <?php echo do_shortcode('[newsletter_form]');?>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- news-letter-sec part end -->
<?php get_footer(); ?>

