<?php	//Page banner at Header	global $templates;	$post_id = get_the_ID();	$bg_img = get_page_banner($post_id);?><section class="breadcrumbs d-flex align-items-center" style="background-image:url(<?=$bg_img?>)" >		<div class="container position-relative d-flex flex-column align-items-center">			<h2><?php 			if ( is_tag() ): //tag				single_tag_title( __( '', 'textdomain' ) ); 			elseif(is_404()) :  //Error Page				echo __('Error 404', 'twentytwenty');			elseif(is_search()) :  // Serach Page				echo __('Serach', 'twentytwenty') . ': ' . get_search_query(); 			elseif(is_category()): // Category Page				if(get_the_category()) : the_category(', '); else: $term = get_queried_object(); echo $term->name; endif; 			elseif(is_archive()): // Archive Page				if(get_the_category()) : the_category(', '); else: $term = get_queried_object(); echo $term->name;  endif; 			elseif(is_single() && get_post_type() == 'gallery'): // Single Page				the_title();  			else: // Default Page				if(get_field('banner_title')): 					the_field('banner_title'); 				else: 					the_title(); 					//if ( is_page_template( $templates.'template.procedure-overview.php' ) ): echo ' Procedures'; endif;				endif;			endif; 			?></h2>			<ol>	          <li>	            <a href="<?php echo home_url();?>">Home</a>	          </li>	          <li><?php the_title();?></li>	        </ol><!-- 			<div class="site-breadcrumb">				<?php				if (function_exists('simple_breadcrumb')) {					simple_breadcrumb();				} ?>			</div> -->		</div></section>