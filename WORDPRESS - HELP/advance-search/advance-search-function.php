

<?php


/* =========== Advance Search ===========*/
add_filter( 'posts_where', 'where_advance_search_page', 20, 2 );
function where_advance_search_page( $where, $wp_query ) {
	if(isset($_POST['action']) && $_POST['action'] == 'advance_search_result'){
		global $wpdb;
		if (isset($_POST['search'])) {
			$search_query = $_POST['search'];
			$where .= " AND (" . $wpdb->posts . ".post_content LIKE '%" . $search_query. "%' or ".$wpdb->posts.".post_title LIKE '%".$search_query."%') ";
		}
		//echo $where;
	}
	return $where;
}
function advance_search_result(){

	if (isset($_POST['search'])) {

		$search_query = $_POST['search'];

		/* ======================== Page ================ */

		/*$pages = get_posts(array(

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

		}*/
		$args = array(
			'post_type' => 'page',
			'post_status' => 'publish',
			'posts_per_page' => -1,
			'orderby' => 'title',
			'order' => 'DESC',
			's' => $search_query
		);
		$the_query = new WP_Query( $args );
		if($the_query->have_posts()){
		?>
		<h5><?=__('Pages', 'twentytwenty')?></h5>
			<ul>
		<?php
		global $post;
			while ($the_query -> have_posts()) : $the_query -> the_post();
			if($search_query == $post->post_name || $search_query == get_the_title() ){ ?>
				<a href="<?=get_permalink()?>">
				<li onclick="fill('<?=htmlentities(get_the_title())?>', '<?=get_permalink()?>')">
					<h4><?=get_the_title(); ?></h4>
					<p><?=get_the_excerpt(); ?></p> 
				</li>
				</a>
			<?php	
			}
			?>
			<?php
			endwhile;
		?>
		<?php
			while ($the_query -> have_posts()) : $the_query -> the_post();
			if($search_query != $post->post_name){ ?>
				<a href="<?=get_permalink()?>">
				<li onclick="fill('<?=htmlentities(get_the_title())?>', '<?=get_permalink()?>')">
					<h4><?=get_the_title(); ?></h4>
					<p><?=get_the_excerpt(); ?></p> 
				</li>
				</a>

			<?php
			}
			endwhile;
		?>
		
			</ul>
		<?php
		}

		/* ======================== Blog ================ */

		$blogs = get_posts(array(

			'post_type' => 'post',

			'post_status' => 'publish',

			'posts_per_page' => 2,

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

		/* ======================== providers ================ */
		$providers = get_posts(array(
			'post_type' => 'providers',
			'post_status' => 'publish',
			'posts_per_page' => 2,
			'orderby' => 'title',
			'order' => 'ASC',
			's' => $search_query
		));
		if(!empty($providers)){
		?>
			<h5><?=__('Providers', 'twentytwenty')?></h5>
			<ul>
		<?php foreach($providers as $provider){ ?>
				<a href="<?=get_permalink($provider->ID)?>">
				<li onclick="fill('<?=htmlentities($provider->post_title)?>', '<?=get_permalink($provider->ID)?>')">
					<h4><?=$provider->post_title; ?></h4>
					<p><?=get_the_excerpt($provider->ID); ?></p>
				</li>
				</a>
		<?php } ?>
			</ul>
		<?php
		}
		/* ======================== locations ================ */
		$locations = get_posts(array(
			'post_type' => 'locations',
			'post_status' => 'publish',
			'posts_per_page' => -1,
			'orderby' => 'title',
			'order' => 'ASC',
			's' => $search_query
		));
		if(!empty($locations)){
		?>
			<h5><?=__('Locations', 'twentytwenty')?></h5>
			<ul>
		<?php foreach($locations as $location){ ?>
				<a href="<?=get_permalink($location->ID)?>">
				<li onclick="fill('<?=htmlentities($location->post_title)?>', '<?=get_permalink($location->ID)?>')">
					<h4><?=$location->post_title; ?></h4>
					<p><?=get_the_excerpt($location->ID); ?></p>
				</li>
				</a>
		<?php } ?>
			</ul>
		<?php
		}
		/* ======================== Special Media ================ */
		$special_media = get_posts(array(
			'post_type' => 'special-media',
			'post_status' => 'publish',
			'posts_per_page' => -1,
			'orderby' => 'title',
			'order' => 'ASC',
			's' => $search_query
		));
		if(!empty($special_media)){
		?>
			<h5><?=__('Special Media', 'twentytwenty')?></h5>
			<ul>
		<?php foreach($special_media as $special_medias){ ?>
				<a href="<?=get_permalink($special_medias->ID)?>">
				<li onclick="fill('<?=htmlentities($special_medias->post_title)?>', '<?=get_permalink($special_medias->ID)?>')">
					<h4><?=$special_medias->post_title; ?></h4>
					<p><?=get_the_excerpt($special_medias->ID); ?></p>
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