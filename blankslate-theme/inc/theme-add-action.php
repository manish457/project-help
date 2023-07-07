<?php
global $templates;
//show_admin_bar(false);
flush_rewrite_rules( false );

//EOROR 404 at pagination in archive page
function custom_posts_per_page( $query ) {
	if ( !is_admin() && ($query->is_archive('video') || $query->is_archive()) ) {
		set_query_var('posts_per_page', 1);
	}
}
add_action( 'pre_get_posts', 'custom_posts_per_page' );

// remove filter in from parent theme
add_action( 'wp' , 'remove_filter_from_theme_twenty_twenty_one' );
function remove_filter_from_theme_twenty_twenty_one(){
	remove_filter( 'walker_nav_menu_start_el', 'twenty_twenty_one_add_sub_menu_toggle', 10, 4 );
	// remove filter excerpt more twenty_twenty_one_continue_reading_link_excerpt
	remove_filter( 'excerpt_more', 'twenty_twenty_one_continue_reading_link_excerpt', 10, 4 );
	// Filter the excerpt more link.
	remove_filter( 'the_content_more_link', 'twenty_twenty_one_continue_reading_link', 10, 4 );
}

/* ==== Ecerpt More ==== */
function child_twenty_twenty_one_continue_reading_link_excerpt() {
	if ( ! is_admin() ) {
		return '...';
	}
}

// Filter the excerpt more link.
add_filter( 'excerpt_more', 'child_twenty_twenty_one_continue_reading_link_excerpt', 9999 );

function wpdocs_custom_excerpt_length( $length ) {
    return 24;
}
add_filter( 'excerpt_length', 'wpdocs_custom_excerpt_length', 999 );


/**
 * Display advanced TinyMCE editor in taxonomy page
 */
//add_action("gallery-category_edit_form_fields", 'editor_for_description_taxonomy', 10, 2);

function editor_for_description_taxonomy($term, $taxonomy){
    ?>
    <tr valign="top" style="display:none">
        <th scope="row">Description</th>
        <td>
            <?php wp_editor(html_entity_decode($term->description), 'description', array('media_buttons' => true)); ?>
            <script>
                /*jQuery(window).ready(function(){
                    jQuery('label[for=description]').parent().parent().remove();
                });*/
            </script>
        </td>
    </tr>
    <?php
} 

/* ========== Load More Gallery Category Case ========= */
function load_more_gallery_category_case(){
	$page = $_POST['page_no'];
	$tax_query = $_POST['query_id'];
	$post_type = $_POST['post_type'];
	$taxonomy_slug = $_POST['taxonomy_slug'];
	$posts_per_page = $_POST['posts_per_page'];
	$paged = $_POST['paged'];
	
	$args = array(
		'post_type'      => $post_type,
		'posts_per_page' => $posts_per_page,
		'paged'			 => $page,
		'tax_query' => array(
			array(
				'taxonomy' => $taxonomy_slug,
				'field' => 'term_id',
				'terms' => $tax_query,
			)
		),
	);
	$gallery_archive = new WP_Query( $args );
	if($gallery_archive->have_posts()):
		$post_count = 0; 
		while ( $gallery_archive->have_posts() ) : $gallery_archive->the_post();
			if($post_count > 1 && $post_count % 2 == 0)
			echo '<div class="col-lg-12"> <hr class="divider-before-after"> </div>';
			get_template_part( 'template-parts/gallery-category-case' );
			$post_count++; 
		endwhile;
		wp_reset_query(); 
		echo '<div class="col-lg-12"> <hr class="divider-before-after"> </div>';
	endif; //gallery_archive

} // end of function

add_action( 'wp_ajax_load_more_gallery_category_case', 'load_more_gallery_category_case' );
add_action( 'wp_ajax_nopriv_load_more_gallery_category_case', 'load_more_gallery_category_case' );

add_filter('show_admin_bar', '__return_false');

/* =========== Advance Search ===========*/
function advance_search_result(){
	if (isset($_POST['search'])) {
		$search_query = $_POST['search'];
		/* ======================== Page ================ */
		$pages = get_posts(array(
			'post_type' => 'page',
			'post_status' => 'publish',
			'posts_per_page' => -1,
			'orderby' => 'title',
			'order' => 'ASC',
			's' => $search_query
		));
		if(!empty($pages)){
		?>
			<h5><?=__('Pages', 'twentytwenty')?></h5>
			<ul>
		<?php foreach($pages as $page){ ?>
				<a href="<?=get_permalink($page->ID)?>">
				<li onclick="fill('<?=htmlentities($page->post_title)?>', '<?=get_permalink($page->ID)?>')">
					<h4><?=$page->post_title; ?></h4>
					<p><?=get_the_excerpt($page->ID); ?></p>
				</li>
				</a>
		<?php } ?>
			</ul>
		<?php
		}
		/* ======================== Blog ================ */
		$blogs = get_posts(array(
			'post_type' => 'post',
			'post_status' => 'publish',
			'posts_per_page' => -1,
			'orderby' => 'title',
			'order' => 'ASC',
			's' => $search_query
		));
		if(!empty($blogs)){
		?>
			<h5><?=__('Blogs', 'twentytwenty')?></h5>
			<ul>
		<?php foreach($blogs as $blog){ ?>
				<a href="<?=get_permalink($blog->ID)?>">
				<li onclick="fill('<?=htmlentities($blog->post_title)?>', '<?=get_permalink($blog->ID)?>')">
					<h4><?=$blog->post_title; ?></h4>
					<p><?=get_the_excerpt($blog->ID); ?></p>
				</li>
				</a>
		<?php } ?>
			</ul>
		<?php
		}
		/* ======================== Gallery ================ */
		global $wpdb;
		$term_slug = "gallery-category";
		$post_type = 'gallery';
		$term_ids=array(); 
		//SELECT t.*  FROM `wpdlm_terms` as t INNER JOIN  wpdlm_term_taxonomy as tt ON t.term_id = tt.term_id  WHERE tt.taxonomy = 'gallery-category' AND t.`name` LIKE '%Face%'
		//$cat_Args="SELECT * FROM $wpdb->terms WHERE name LIKE '%".$_REQUEST['s']."%' ";
		$cat_Args="SELECT t.*  FROM $wpdb->terms as t INNER JOIN $wpdb->term_taxonomy as tt ON t.`term_id` = tt.`term_id`  WHERE tt.`taxonomy` = '".$term_slug."' AND t.`name` LIKE '%".$search_query."%' ";
		$cats = $wpdb->get_results($cat_Args, OBJECT);
		foreach($cats as $cat){
			//echo '<pre>'; print_r($cat) ; echo '</pre>';
			array_push($term_ids,$cat->term_id);
		}
		$q1 = get_posts(array(
				'fields' => 'ids',
				'post_type' => $post_type,
				'post_status' => 'publish',
				'posts_per_page' => -1,
				's' => $search_query 

		));
		/*$q2 = get_posts(array(
				'fields' => 'ids',
				'post_type' => $post_type,
				'post_status' => 'publish',
				'posts_per_page' => -1,
				'category' =>$term_ids
		));*/
		//echo '<pre>'; print_r($term_ids) ; echo '</pre>';
		$q2 = get_posts(
			array(
				'fields' => 'ids',
				'posts_per_page' => -1,
				'post_type' =>  $post_type,
				'tax_query' => array(
					array(
						'taxonomy' => $term_slug,
						'field' => 'term_id',
						'terms' => $term_ids,
					)
				)
			)
		);
		$unique = array_unique( array_merge( $q1, $q2 ) );
		if(!empty($unique)){
			$galleries = get_posts(array(
				'post_type' => $post_type,
				'post__in' => $unique,
				'posts_per_page' => -1,
				'orderby' => 'title',
				'order' => 'ASC',
			));
		}else{
			$galleries = array();
		}
		if(!empty($galleries)){
		?>
			<h5><?=__('Galleries', 'twentytwenty')?></h5>
			<ul>
		<?php foreach($galleries as $gallery){ ?>
				<a href="<?=get_permalink($gallery->ID)?>">
				<li onclick="fill('<?=htmlentities($gallery->post_title)?>', '<?=get_permalink($gallery->ID)?>')">
					<h4><?=$gallery->post_title; ?></h4>
					<p><?=get_the_excerpt($gallery->ID); ?></p>
				</li>
				</a>
		<?php } ?>
			</ul>
		<?php
		}
		//print_r($pages);
	}
}
add_action( 'wp_ajax_advance_search_result', 'advance_search_result' );
add_action( 'wp_ajax_nopriv_advance_search_result', 'advance_search_result' );
/* =========== End :: Advance Search ===========*/