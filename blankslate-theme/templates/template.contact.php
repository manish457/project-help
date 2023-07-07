<?php

/*

 * Template Name: Contact template

 * Description: Template file for the Contact Page Only

 */

 

get_header(); ?>
<?php get_template_part( 'template-parts/header-banner' ); ?>

        <!-- ======= office Section ======= -->

        <section id="office_sec" class="office_sec">
          <div class="container" data-aos="fade-up">
              <div class="row justify-content-center">
                <div class="col-lg-6 col-md-6" data-aos="fade-up" data-aos-delay="200">
                  <div class="office_info">
                    <h4><i class='bx bx-buildings' ></i>Corp. Office</h4>
                    <ul>
                      <?php if(get_field('address','option')):?>
                      <li><i class="bi bi-pin-map"></i><?php echo get_field('address','option');?></li>
                      <?php endif;?>
                      <?php if(get_field('email','option')):?>
                      <li><i class='bx bx-envelope'></i><a href="mailto:<?php echo get_field('email','option');?>"><?php echo get_field('email','option');?></a></li>
                      <?php endif;?>
                      <?php if(get_field('phone','option')):?>
                      <li><i class='bx bx-phone-call' ></i><a href="tel:+91 <?php echo get_field('phone','option');?>">+91 <?php echo get_field('phone','option');?></a></li>
                      <?php endif;?> 
                      </ul>
                </div>
              </div>

            <div class="col-lg-6 col-md-6" data-aos="fade-up" data-aos-delay="200">
              <div class="office_info">
                <h4><i class='bx bx-buildings' ></i>Jodhpur Office</h4>
               <ul>
                  <?php if(get_field('address(jodhpur_office)','option')):?>
                  <li><i class="bi bi-pin-map"></i><?php echo get_field('address(jodhpur_office)','option');?></li>
                  <?php endif;?>
                  <?php if(get_field('email(jodhpur_office)','option')):?>
                  <li><i class='bx bx-envelope'></i><a href="mailto:<?php echo get_field('email(jodhpur_office)','option');?>"><?php echo get_field('email(jodhpur_office)','option');?></a></li>
                  <?php endif;?>
                  <?php if(get_field('phone(jodhpur_office)','option')):?>
                  <li><i class='bx bx-phone-call' ></i><a href="tel:+91 <?php echo get_field('phone(jodhpur_office)','option');?>">+91 <?php echo get_field('phone(jodhpur_office)','option');?></a></li>
                  <?php endif;?>
                  </ul> 
            </div>
          </div>

          <div class="col-lg-6 col-md-6" data-aos="fade-up" data-aos-delay="200">
            <div class="office_info">
              <h4><i class='bx bx-buildings' ></i>Dubai Office</h4>
             <ul>
                  <?php if(get_field('address(dubai_office)','option')):?>
                  <li><i class="bi bi-pin-map"></i><?php echo get_field('address(dubai_office)','option');?></li>
                  <?php endif;?>
                  <?php if(get_field('email(dubai_office)','option')):?>
                  <li><i class='bx bx-envelope'></i><a href="mailto:<?php echo get_field('email(dubai_office)','option');?>"><?php echo get_field('email(jodhpur_office)','option');?></a></li>
                  <?php endif;?>
                  <?php if(get_field('phone(dubai_office)','option')):?>
                  <li><i class='bx bx-phone-call' ></i><a href="tel:+97 <?php echo get_field('phone(dubai_office)','option');?>">+97 <?php echo get_field('phone(dubai_office)','option');?></a></li>
                  <?php endif;?>
                  </ul> 

          </div>

        </div>

        <div class="col-lg-6 col-md-6" data-aos="fade-up" data-aos-delay="200">
          <div class="office_info">
            <h4><i class='bx bx-buildings' ></i>Botswana Office</h4>
             <ul>
                  <?php if(get_field('address(botswana_office)','option')):?>
                  <li><i class="bi bi-pin-map"></i><?php echo get_field('address(botswana_office)','option');?></li>
                  <?php endif;?>
                  <?php if(get_field('email(botswana_office)','option')):?>
                  <li><i class='bx bx-envelope'></i><a href="mailto:<?php echo get_field('email(botswana_office)','option');?>"><?php echo get_field('email(botswana_office)','option');?></a></li>
                  <?php endif;?>
                  <?php if(get_field('phone(botswana_office)','option')):?>
                  <li><i class='bx bx-phone-call' ></i><a href="tel:+26 <?php echo get_field('phone(botswana_office)','option');?>">+26 <?php echo get_field('phone(botswana_office)','option');?></a></li>
                  <?php endif;?>
                  </ul> 
                </div>
              </div>
            </div>
          </div>
        </section>

        <!-- End Values Section -->

    <!-- ==========map_sec========== -->
    <?php if(get_field('map_area','option')):?>
    <div class="contact_map">
      <div class="map-sec">
        <iframe src="<?php echo get_field('map_area','option');?>" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
      </div>
    </div>
    <?php endif;?>
    <!-- ======= Contact Section ======= -->

    <section id="contact" class="contact" style="background-image:url(<?php the_field('contact_bg' ,'option');?>);">
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