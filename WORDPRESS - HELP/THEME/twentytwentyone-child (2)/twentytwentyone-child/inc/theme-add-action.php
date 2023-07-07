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