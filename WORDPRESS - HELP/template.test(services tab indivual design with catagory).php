<?php

/*

 * Template Name: Test template

 * Description: Template file for the Test Page Only

 */



get_header(); ?>
<?php get_template_part('template-parts/header-banner'); ?>
<section class="inner-service-section">
  <div class="container">
    <div class="inner-service-heading">
      <?php the_field('staffing_heading'); ?>
    </div>
    <?php $staffing_img = get_field('staffing_img'); ?>
    <?php if ($staffing_img): ?>
      <div class="tabImg">
        <img src="<?php echo esc_url($staffing_img['url']); ?>" alt="<?php echo esc_attr($staffing_img['alt']); ?>" />
      </div>
    <?php endif; ?>
  </div>
</section>



<section class="main-service-section" id="serve">
  <div class="container">
    <div class="section-heading">
      <h4 class="heading">Our Services</h4>
    </div>

    <div class="inner-img-one">
      <img class="img-fluid worldRotate"
        src="<?php echo get_template_directory_uri() ?>/images/mitech-slider-cybersecurity-global-image.webp" alt="">
    </div>
    <div class="tab-teaser">
      <div class="tab-menu">
        <ul>
          <?php
          // Get all categories
          
          $categories = get_terms(
            array(
              'taxonomy' => 'service-category',
              'hide_empty' => false,
            )
          );

          // Loop through categories
          foreach ($categories as $category) {

            $category_id = $category->term_id;
            $category_name = $category->name;


            // Create a list item for each category
            echo '<li><a href="javascript:" data-rel="tab-' . $category_id . '" class="' . ($category_id === $categories[0]->term_id ? 'active' : '') . '">
                ' . $category_name . '
              </a></li>';
          }
          ?>
        </ul>
      </div>

      <div class="tab-main-box">
        <?php
        // Loop through categories to create tab boxes
        foreach ($categories as $category) {
          $category_id = $category->term_id;

          echo '<div class="tab-box" id="tab-' . $category_id . '" ' . ($category_id === $categories[0]->term_id ? 'style="display:block;"' : '') . '>';
          echo '<div class="tabContentArea">';
          echo '<div class="tabHeader">';

          if ($category->slug == 'it-staffing') {
            the_field('it__staffing');
          } else if ($category->slug == 'automation-testing') {
            the_field('automation_testing');
          } else if ($category->slug == 'digital-solutions') {
            the_field('digital_solutions');
          } else if ($category->slug == 'bpo-kpo-lpo-mpo') {
            the_field('bpokpo_lpompo');
          } else if ($category->slug == 'managed-services') {
            the_field('managed_services');
          } else if ($category->slug == 'onshore-it-staffing-services') {
            the_field('onshore_it_staffing_services');
          }

          echo '</div>';
          echo '<div class="row">';

          // Query posts from the current category
          $args = array(
            'post_type' => 'services',
            'posts_per_page' => -1,
            'tax_query' => array(
              array(
                'taxonomy' => 'service-category',
                'field' => 'term_id',
                'terms' => $category_id
              )
            )
          );
          $query = new WP_Query($args);

          // Loop through posts in the current category
          if ($query->have_posts()) {
            while ($query->have_posts()) {
              $query->the_post();

              $html = '';

              if ($category->slug == 'it-staffing') {
                $html = '<div class="col-lg-4 col-md-6">
                <div class="bst-box-images style-04">
                   <div class="image-box-wrap">
                   <div class="box-image">
                     <img class="img-fulid" src="' . esc_url(get_the_post_thumbnail_url()) . '" alt="' . the_post_thumbnail_caption() . '" />
                   </div>
                   <div class="content">
                   <h4 class="heading">' . esc_html(get_the_title()) . '</h4>
                   <div class="text">' . get_the_content() . '</div>
                   </div>
                   </div>
                 </div>
                </div>';
              } else if ($category->slug == 'automation-testing') {
                $html = '<div class="col-lg-4 col-md-6">
                        <div class="services-item">
                          <div class="services-item-overlay"></div>
                          <header class="services-item-header d-flex align-items-center">
                            <div class="iconDiv"><img src="' . esc_url(get_the_post_thumbnail_url()) . '" alt="' . the_post_thumbnail_caption() . '" /></div>
                              <h3 class="services-item-title">' . esc_html(get_the_title()) . '</h3>
                              </header>
                              <div class="services-item-content">
                              <div class="services-item-paragraph">
                              ' . get_the_content() . '
                            </div>
                          </div>
                        </div>
                      </div>';
              } else if ($category->slug == 'digital-solutions') {
                $html = '<div class="col-xl-4 col-md-6">
                        <div class="feature-s2  wow animate__animated animate__fadeInLeft" data-wow-duration="1.5s" data-wow-delay=".5s">
                        <div class="icon">
                      <img src="' . esc_url(get_the_post_thumbnail_url()) . '" alt="' . the_post_thumbnail_caption() . '" />
                        </div>
                        <div class="content">
                        <h4>' . esc_html(get_the_title()) . '</h4>
                        <div> ' . get_the_content() . ' </div>
                        </div>
                        </div>
                        </div>';

              } else if ($category->slug == 'bpo-kpo-lpo-mpo') {
                $html = '<div class="col-lg-4 col-md-6">
                          <div class="tab4-icon-box tab4-style-2">
                            <div class="tab4-icon-box-icon">
                              <span class="tab4-icon">
                              <img src="' . esc_url(get_the_post_thumbnail_url()) . '" alt="' . the_post_thumbnail_caption() . '" />
                              </span>
                              </div>
                              <div class="tab4-icon-box-content">
                              <h4 class="tab4-icon-box-title">' . esc_html(get_the_title()) . '</h4>
                            <div class="tab4-icon-box-description">' . get_the_content() . '</div>
                          </div>
                        </div>
                        </div>';

              } else if ($category->slug == 'managed-services') {

                $html .= '<div class="laptop-img">
                      <img src="' . esc_url(get_the_post_thumbnail_url()) . '" alt="' . the_post_thumbnail_caption() . '" />
                      ' . get_the_content() . '';

                if (get_field('pdf')):
                  $html .= '<h6>To know more in details</h6>';
                  $html .= '<a class="cta" href="' . get_field("pdf") . '" target="_blank" download>Download PDF</a>';
                endif;

                $html .= '</div>';


              } else if ($category->slug == 'onshore-it-staffing-services') {
                $html = '<div class="col-lg-3 col-sm-6">
                            <div class="single-developer">
                              <div class="developer-img">
                                <img src="' . esc_url(get_the_post_thumbnail_url()) . '" alt="' . the_post_thumbnail_caption() . '" />
                              </div>
                              <div class="developer-content">
                                <h3 class="name">' . esc_html(get_the_title()) . '</h3>
                              </div>
                            </div>                       
                          </div>';

              } else {
                $html = '<div class="col-lg-4 col-md-6">
                <div class="bst-box-images style-04">
                   <div class="image-box-wrap">
                   <div class="box-image">
                     <img class="img-fulid" src="' . esc_url(get_the_post_thumbnail_url()) . '" alt="' . the_post_thumbnail_caption() . '" />
                   </div>
                   <div class="content">
                   <h4 class="heading">' . esc_html(get_the_title()) . '</h4>
                   <div class="text">' . get_the_content() . '</div>
                   </div>
                   </div>
                 </div>
                </div>';
              }

              echo $html;

            }
          }
          wp_reset_postdata();

          echo '</div>'; // Close the "row" div
          echo '</div>'; // Close the "tabContentArea" div
          echo '</div>'; // Close the "tab-box" div
        }
        ?>
      </div>
    </div>

  </div>
</section>




<section class="actionArea">
  <div class="container">
    <h2>
      <?php the_field('appoinment_heading', 'option'); ?>
    </h2>

    <?php $cta_btn = get_field('cta_btn', 'option'); ?>
    <?php if ($cta_btn): ?>
      <a href="<?php echo esc_url($cta_btn['url']); ?>" target="<?php echo esc_attr($cta_btn['target']); ?>">
        <?php echo esc_html($cta_btn['title']); ?>
      </a>
    <?php endif; ?>
    <?php $cta_btn2 = get_field('cta_btn2', 'option'); ?>
    <?php if ($cta_btn2): ?>
      <a class="org-bg" href="<?php echo esc_url($cta_btn2['url']); ?>"
        target="<?php echo esc_attr($cta_btn2['target']); ?>">
        <?php echo esc_html($cta_btn2['title']); ?>
      </a>
    <?php endif; ?>

  </div>
</section>

<?php get_footer(); ?>