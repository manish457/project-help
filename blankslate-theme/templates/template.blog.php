<?php

/*

 * Template Name: Blog template

 * Description: Template file for the Blog Page Only

 */

 

get_header(); ?>
<?php get_template_part( 'template-parts/header-banner' ); ?>
<?php
$post_type = 'post';
$taxonomy_slug = 'category';
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
$args_post = array(
    'orderby' => 'DATE', 
    'order' => 'DESC', 
    'post_type' => $post_type, 
    'posts_per_page' => 12, 
    'paged'=> $paged,
);
$the_query = new WP_Query( $args_post );
?>
  <!-- ======= Recent Blog Posts Section ======= -->
      <section id="recent-blog-posts" class="recent-blog-posts">
        <div class="container" data-aos="fade-up">
          <div class="section-header">
            <?php the_field('blog_heading');?>
          </div>
          <div class="row">
           <?php                    
                $i = 0;                 
                while ($the_query -> have_posts()) : 
                $the_query -> the_post();   
                $featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full');                    
            ?>
            <div class="col-lg-4" data-aos="fade-up" data-aos-delay="400">
              <div class="post-box">
                <?php if($featured_img_url != ''): ?>
                <div class="post-img"><img src="<?php echo $featured_img_url; ?>" class="img-fluid" alt=""></div>
                <?php endif; ?>
                <div class="meta">
                  <span class="post-author"> <i class="bi bi-person"></i><?php the_author();?></span>
                  <span class="post-date"><i class="bi bi-calendar-check"></i><?php echo get_the_date('Y-m-d'); ?></span>
                </div>
                <h3 class="post-title"><?php the_title();?></h3>
                <?php
                    $string= get_the_content();
                    $string = strip_tags($string);
                    if (strlen($string) > 500) {

                        // truncate string
                        $stringCut = substr($string, 0, 200);
                        $endPoint = strrpos($stringCut, ' ');

                        //if the string doesn't contain any space then it will cut without word basis.
                        $string = $endPoint? substr($stringCut, 0, $endPoint) : substr($stringCut, 0);
                        $string .= '.....';
                    }
                    ?>
                <p><?php echo $string;?></p>

                <a href="<?php echo get_permalink();?>" class="readmore stretched-link"><span>Read More</span><i class="bi bi-arrow-right"></i></a>
              </div>
            </div>
             <?php endwhile;?>
          </div>
        </div>
      </section><!-- End Recent Blog Posts Section -->

<?php get_footer(); ?>