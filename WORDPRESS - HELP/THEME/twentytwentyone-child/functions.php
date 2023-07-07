<?php
/* ============= child theme ============== */
function remone_parent_n_add_child_stylesheet() {
	wp_dequeue_style( 'twenty-twenty-one-style' );
	wp_deregister_style( 'twenty-twenty-one-style' );

	wp_dequeue_style( 'twenty-twenty-one-print-style' );
	wp_deregister_style( 'twenty-twenty-one-print-style' );

	// Now register your styles and scripts here
	wp_register_style( 'twenty-twenty-one-child-style', get_stylesheet_directory_uri() . '/style.css', false, '1.0.1' ); 
	wp_enqueue_style( 'twenty-twenty-one-child-style' );
}
add_action( 'wp_enqueue_scripts', 'remone_parent_n_add_child_stylesheet', 20 );

/* Set Global Variable */
$templates = 'templates/';
$blogs_per_page = 12;
$galleries_per_page = 6;
global $templates, $blogs_per_page, $galleries_per_page;


// ACF Option and ACF Field
require get_theme_file_path( 'inc/theme-acf.php' );
// Custom Post Type
require get_theme_file_path( 'inc/theme-post-type.php' );
// Shortcodes
require get_theme_file_path( 'inc/theme-shortcodes.php' );
// Action and Filter
require get_theme_file_path( 'inc/theme-add-action.php' );
// Custom Function
require get_theme_file_path( 'inc/theme-function.php' );

function admin_bar(){
	  if(is_user_logged_in()){
		add_filter( 'show_admin_bar', '__return_false' , 1000 );
	  }
}
add_action('init', 'admin_bar' );