<?php

global $templates;

/*========== Banner Content ===============*/

function header_banner_content(){

	$content = '';

	ob_start();

	?>

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

	<!-- Breadcrumb -->

	<?php simple_breadcrumb(); ?>

	<!-- Banner Content -->

	<?php if(!is_404() && !is_search() && !is_category()): ?>

	<?php if(get_field('banner_description')) the_field('banner_description'); ?>

	<?php endif; ?>

	<?php

	$content = ob_get_clean();

	echo $content;

}

/*========= Manage Page Banner Image ======*/

if (!function_exists('get_page_banner')) {

	function get_page_banner( $post_ID = '' ){

		global $templates;

		$default_banner = get_field('default_banner_image', 'option');

		if($post_ID == '') return $default_banner;



		if(get_field('banner_image', $post_ID)){

			return get_field('banner_image', $post_ID);

		}else{

			$parent_page = wp_get_post_parent_id( $post_ID );

			if($parent_page > 0){

				if(get_field('banner_image', $post_ID)){

					return get_field('banner_image', $post_ID);

				}else{

					return get_page_banner( $parent_page );

				}

			}else{

				if(get_post_type() != 'page' ){

					if(get_post_type() == 'gallery'):

						$template_file_path = $templates.'template.gallery-overview.php';

					else:

						$template_file_path = $templates.'template.blog.php';

					endif;

					$template_post_id =  get_id_by_template_name($template_file_path);

					if(get_field('banner_image', $template_post_id)){

						$blog_banner = get_field('banner_image', $template_post_id);

					}else{

						$blog_banner = $default_banner;

					}

					if ( is_single() ) {

						$featured_img_url = get_field('banner_image', $post_ID);

						if($featured_img_url){

							return $featured_img_url;

						}else{

							return $blog_banner;

						}

						

					}else{

						return $blog_banner;

					}

				}else{

					return $default_banner;

				}

			}

		}

	}

}

if (!function_exists('get_id_by_template_name')) {

	function get_id_by_template_name($template_file_path = ''){

		if($template_file_path == '') return false;

		$located = locate_template( $template_file_path );

		if ( empty( $located ) ) {

			return false;

		}

		wp_reset_query();

		$query = new WP_Query( array(

			'post_type'  => 'any',

			'meta_key'   => '_wp_page_template',

			'meta_value' => $template_file_path,

		) );

		$main_page_id = '';

		if ( $query->have_posts() ) {

			while ( $query->have_posts() ) : $query->the_post(); // WP loop

				$main_page_id =  get_the_ID();

			endwhile; // end of the loop.

		} else { // in case there are no pages with this template

			$main_page_id =  0;

		}

		wp_reset_query();

		return $main_page_id;

	}

}



/*=================== Gravity Form ======================*/

/*function form_submit_button( $button, $form ) {

	return "<div class='gravity-from-submit'><button type='submit' class='green-button' id='gform_submit_button_{$form['id']}'><span>{$form['button']['text']}</span></button></div>";

}

add_filter( 'gform_submit_button', 'form_submit_button', 10, 2 );*/

/* ================= bread crumbs =======================*/

if (!function_exists('simple_breadcrumb')) {

	function simple_breadcrumb() {

		global $post;

		global $templates;

		$post_type = get_post_type(); 

		$separator = "<span class='spt'>&nbsp; » &nbsp;</span>"; // Simply change the separator to what ever you need e.g. / or >		

		echo '<div class="site-breadcrumb default-page-breadcamb">';

		if (!is_front_page()) {

			echo '<a href="';

			echo get_option('home');

			echo '">';

			//bloginfo('name');

			echo 'Home';

			echo "</a> ".$separator;

			if ( is_category() || is_single() ) {

				if(get_post_type()==='gallery') {

					$template_file_path = $templates.'template.gallery-overview.php';

				}else if($post_type==='testimonial'){

					$template_file_path = $templates.'template.testimonial.php';

				}else if($post_type==='product'){

					$template_file_path = $templates.'template.product-overview.php';

				}else if($post_type==='patient'){

					if(is_single()) $template_file_path = '';

				}else{

					$template_file_path = $templates.'template.blog.php';

				}

				$template_post_id =  get_id_by_template_name($template_file_path);

				if($template_post_id){

					echo '<a href="'.get_permalink( $template_post_id ).'">'.get_the_title($template_post_id).'</a>'.$separator;

				}else{

					if(get_post_type()==='gallery'){

						echo '<a href="javascript:void(0)">'. __('Gallery', 'twentychild') .'</a>'.$separator;

					}

				}

				if(is_category()){

					echo '<strong class="inherit-color">';

					the_category(', ');

					echo '</strong>';

				}

				if ( is_single() ) {

					echo '<strong> '.get_the_title().'</strong>';

				}

			} elseif ( is_page() && $post->post_parent ) {

				$home = get_page(get_option('page_on_front'));

				for ($i = count($post->ancestors)-1; $i >= 0; $i--) {

					if (($home->ID) != ($post->ancestors[$i])) {

						echo '<a href="';

						echo get_permalink($post->ancestors[$i]); 

						echo '">';

						echo get_the_title($post->ancestors[$i]);

						echo "</a>".$separator;

					}

				}

				//echo '<strong> <a href="'.get_permalink().'">'.get_the_title().'</a></strong>';

				echo '<strong> '.get_the_title().'</strong>';

			} elseif (is_page()) {

				//echo '<strong> <a href="'.get_permalink().'">'.get_the_title().'</a></strong>';

				echo '<strong> '.get_the_title().'</strong>';

			} elseif (is_search()) {

				echo "Search";

			}elseif (is_404()) {

				echo "404";

			}

		} else {

			bloginfo('name');

		}

		echo '</div>';

	}

}

if (!function_exists('parent_gallery_category_breadcrumb')) {

	function parent_gallery_category_breadcrumb($id, $taxonomy_slug, $output = '', $label = 0){

		global $templates;

		if(get_post_type()==='gallery') {

		$template_file='template.gallery-overview.php';

		}

		elseif(get_post_type()==='post') {

		$template_file='template.blog-overview.php';

		}

		$template_file_path = $templates.$template_file;

		$template_post_id =  get_id_by_template_name($template_file_path);

		$separator = "<span class='spt'>&nbsp;&nbsp; » &nbsp;&nbsp;</span>";

		if($id!=''){

		$term = get_term_by('id', $id, $taxonomy_slug);

		$name = $label == 0 ? '<strong>'.$term->name. ' ' . '' . '</strong>' : '<a href="'. get_term_link( $term ) .'">' .$term->name. '</a>';//(get_post_type()==='gallery' ? __('Gallery', 'twentychild') : '')

		$output = $separator . $name . $output;

		}else{

			$output = $output;

		}

		$label ++ ;

		if($term->parent == 0){

			if($template_post_id){

				echo '<a href="'.get_option('home').'">Home</a>'.$separator.'<a href="'.get_permalink( $template_post_id ).'">'.get_the_title($template_post_id).'</a>'.$output;

			}else{

				if(get_post_type()==='gallery'){

					echo '<a href="'.get_option('home').'">Home</a>'.$separator.'<a href="javascript:void(0)">'. __('Gallery', 'twentychild') .'</a>'.$output;

				}else{

					echo '<a href="'.get_option('home').'">Home</a>'.$output;

				}

			}

		}

		if($term->parent!=0){

		   parent_gallery_category_breadcrumb($term->parent, $taxonomy_slug, $output, $label);

		}

	}

}



	//============================ Pagination ==========================================

function pagination($pages = '', $range = 2){

    //$showitems = ($range * 2)+1;

 

    global $paged;

    if(empty($paged)) $paged = 1;

 

    if($pages == '')

    {

        global $wp_query;

        $pages = $wp_query->max_num_pages;

        if(!$pages)

        {

            $pages = 1;

        }

    }

	

    if(1 != $pages)

    {

		/* :::::::::::: OLD <56789> ::::::::::::::*/

		//echo '<hr/>';

        /*echo "<div class=\"pegination\">";

        echo "<ul>";

		//echo "<span>Page ".$paged." of ".$pages."</span>";

        //if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo "<a href='".get_pagenum_link(1)."'>&laquo; First</a>";

        if($paged > 1 && $showitems < $pages) echo "<li><a href='".get_pagenum_link($paged - 1)."'><</a></li>";

 

        for ($i=1; $i <= $pages; $i++)

        {

            if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))

            {

                echo ($paged == $i)? "<li class=\"active\">".$i."</li>":"<li><a href='".get_pagenum_link($i)."' >".$i."</a></li>";

            }

        }

 

        if ($paged < $pages && $showitems < $pages) echo "<li><a href=\"".get_pagenum_link($paged + 1)."\">></a></li>";

        //if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo "<a href='".get_pagenum_link($pages)."'>Last &raquo;</a>";

        echo "</ul>";

        echo "</div>\n";

		echo '<div class="clearfix"></div>';*/



		/*::::::::::::: NEW <1...56789...19>  ::::::::::::*/

		echo "<div class=\"pagination\">";

		

		if($paged > 1) {echo "<div class=\"prev\"><a href='" . get_pagenum_link($paged - 1) . "'><span>»</span>previous</a></div>"; } else {echo "<div class=\"prev no-element\"><span>»</span>previous</div>"; }

		if(($paged-3)>0) {

			$output = $output . "<li><a href='" . get_pagenum_link(1) . "' >1</a></li>";

		}

		echo "<div class=\"number-area\">";

		echo "<ul>";

		if(($paged-3)>1) {

			$output = $output . '<li class="dot-dot">...</li>';

		}

		//Loop for provides links for 2 pages before and after current page

		for($i=($paged-2); $i<=($paged+2); $i++)	{

			if($i<1) continue;

			if($i>$pages) break;

			if($paged == $i)

			$output = $output . '<li id='.$i.' class="active">'.$i.'</li>';

			else				

			$output = $output . '<li><a href="' . get_pagenum_link($i) . '" >'.$i.'</a></li>';

		}

		//if pages exists after loop's upper limit

		if(($pages-($paged+2))>1) {

			$output = $output . '<li class="dot-dot">...</li>';

		}

		if(($pages-($paged+2))>0) {

			if($paged == $pages)

				$output = $output . '<li id=' . ($pages) .' class="active">' . ($pages) .'</li>';

			else				

				$output = $output . '<li><a href="' . get_pagenum_link($pages) .'" >' . ($pages) .'</a></li>';

		}

		echo $output;

		echo "</ul>";

		echo "</div>";

		if ($paged < $pages) {echo "<div class=\"next\"><a href=\"" .get_pagenum_link($paged + 1) . "\">Next<span>»</span></a></div>"; } else {echo "<div class=\"next no-element\">Next<span>»</span></div>"; }

		

        echo "</div>\n";

		echo '<div class="clearfix"></div>';

    }

}





/*add_filter( 'gform_submit_button', 'form_submit_button', 10, 2 );

function form_submit_button( $button, $form ) {

    //return "<button class='button gform_button' id='gform_submit_button_{$form['id']}'><span>Submit</span></button>";

	return '<a class="learn-more btn-style button gform_button" id="gform_submit_button_1">

		<span class="circle" aria-hidden="true">

		  <span class="icon arrow"></span>

		</span>

		<span class="button-text">submit form</span>

	</a>';

}*/



function form_submit_button( $button, $form ) {

	//return "<div class='gravity-from-submit'><button type='submit' class='green-button' id='gform_submit_button_{$form['id']}'><span>{$form['button']['text']}</span></button></div>";

	return "<div class='gravity-from-submit'><button type='submit' class='common-solid-button g-button' id='gform_submit_button_{$form['id']}'>

					<span class='circle' aria-hidden='true'>

					  <span class='icon arrow'></span>

					</span>

					<span class='button-text'>{$form['button']['text']}</span>

			</button></div>";

}

add_filter( 'gform_submit_button', 'form_submit_button', 10, 2 );



