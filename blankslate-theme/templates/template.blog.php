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

           <?php                    
                $i = 0;                 
                while ($the_query -> have_posts()) : 
                $the_query -> the_post();   
                $featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full');                    
            ?>

             <?php endwhile;?>
         

<?php get_footer(); ?>