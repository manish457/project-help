<?php
	//Page banner at Header
	global $templates;
	$post_id = get_the_ID();
	$category_type = get_query_var( 'taxonomy' );
	$category_slug = get_query_var( 'term' ); 
	if((is_archive() && get_post_type()==='gallery') || $category_type =='gallery-category'): 
		$template_file_path = $templates.'template.gallery-overview.php';
		$post_id =  get_id_by_template_name($template_file_path);
	endif;
	$bg_img = get_page_banner($post_id);
?>
<section class="about-us-section procedure-about full-width">
	<div class="container">
		<div class="row">
			<div class="col-lg-7">
				<div class="about-us-content procedure-about-text">
					<h1><?php
							if ( is_tag() ): //tag
								single_tag_title( __( '', 'twentychild' ) ); 
							elseif(is_404()) :  //Error Page
								echo __('Error 404', 'twentychild');
							elseif(is_search()) :  // Serach Page
								echo __('Serach', 'twentychild') . ': ' . get_search_query(); 
							elseif(is_category()): // Category Page
								if(get_the_category()) : the_category(', '); else: $term = get_queried_object(); echo $term->name; endif; 
							elseif(is_archive()): // Archive Page
								if(get_the_category()) : the_category(', '); else: $term = get_queried_object(); echo $term->name;  endif; 
							elseif(is_single() && get_post_type() == 'gallery'): // Single Page
								the_title();  
							else: // Default Page
								if(get_field('banner_title')): 
									the_field('banner_title'); 
								else: 
									the_title(); 
									//if ( is_page_template( $templates.'template.procedure-overview.php' ) ): echo ' Procedures'; endif;
								endif;
							endif; 
						?></h1>
				</div>
			</div>
		</div>
	</div>
	<div class="about-us-image">
		<img src="<?php echo $bg_img; ?>" border="0" alt="">
	</div>
</section>
<div class="inner-head">
	<?php simple_breadcrumb(); ?>
</div>
