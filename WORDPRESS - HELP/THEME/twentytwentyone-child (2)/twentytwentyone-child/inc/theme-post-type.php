<?php
/* ====================== DOCTOR ====================== */
function cptui_register_my_cpts_Team() {
	/**
	 * Post Type: Doctor.
	 */
	$labels = array(
		"name" => __( "Doctor", 'twentychild' ),
		"singular_name" => __( "Doctor", 'twentychild' ),
	);
	$args = array(
		"label" => __( "Doctors", 'twentychild' ),
		"labels" => $labels,
		"description" => "",
		"public" => false, //false>> remove permalink from back-end
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => true,
		"rest_base" => "",
		"has_archive" => false,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => array( "slug" => "doctor", "with_front" => false ),
		"query_var" => true,
		"supports" => array( "title", "editor", "thumbnail" ),
		"menu_icon" => 'dashicons-groups',
		'menu_position' => 5,
		
	);
	register_post_type( "doctor", $args );
}
add_action( 'init', 'cptui_register_my_cpts_Team' ); 
/* ====================== End :: DOCTOR ====================== */

/* ====================== Testimonials ====================== */
function cptui_register_my_cpts_testimonials() {
	/**
	 * Post Type: Testimonials.
	 */
	$labels = array(
		"name" => __( "Testimonials", 'twentychild' ),
		"singular_name" => __( "Testimonial", 'twentychild' ),
	);
	$args = array(
		"label" => __( "Testimonials", 'twentychild' ),
		"labels" => $labels,
		"description" => "",
		"public" => false, //false>> remove permalink from back-end
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => true,
		"rest_base" => "",
		"has_archive" => false,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => array( "slug" => "/testimonials", "with_front" => false ),
		"query_var" => true,
		"supports" => array( "title", "editor", "thumbnail" ),
		"menu_icon" => 'dashicons-format-quote',
		'menu_position' => 5,
	);
	register_post_type( "testimonials", $args );
}
add_action( 'init', 'cptui_register_my_cpts_testimonials' ); 
/* ====================== End :: Testimonials ====================== */
/* ====================== Gallery ====================== */
function cptui_register_my_cpts_gallery() {
	/**
	 * Post Type: Galleries.
	 */
	$labels = array(
		"name" => __( "Galleries", 'twentychild' ),
		"singular_name" => __( "Gallery", 'twentychild' ),
	);
	$args = array(
		"label" => __( "Galleries", 'twentychild' ),
		"labels" => $labels,
		"description" => "",
		"public" => true, 
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => true,
		"rest_base" => "",
		"has_archive" => false,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => array( "slug" => "/gallery", "with_front" => false ),
		"query_var" => true,
		"supports" => array( "title", "editor", "thumbnail" ),
		"menu_icon" => 'dashicons-format-gallery',
		'menu_position' => 5,
	);
	register_post_type( "gallery", $args );
}
add_action( 'init', 'cptui_register_my_cpts_gallery' );
/* ====================== End :: Gallery ====================== */

/* ====================== Gallery Category ====================== */
function cptui_register_my_taxes_gallery_category() {
	/**
	 * Taxonomy: Gallery Categories.
	 */
	$labels = array(
		"name" => __( "Gallery Categories", 'twentychild' ),
		"singular_name" => __( "Gallery Category", 'twentychild' ),
	);
	$args = array(
		"label" => __( "Gallery Categories", 'twentychild' ),
		"labels" => $labels,
		"public" => true,
		"hierarchical" => true,
		"label" => "Gallery Categories",
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => array( 'slug' => '/gallery-category', 'with_front' => false, 'hierarchical' => False,),
		"show_admin_column" => true,
		"show_in_rest" => true,
		"rest_base" => "gallery-category",
		"show_in_quick_edit" => true,
	);
	register_taxonomy( "gallery-category", array( "gallery" ), $args );
}
add_action( 'init', 'cptui_register_my_taxes_gallery_category' );
/* ====================== End :: Gallery Category ====================== */




