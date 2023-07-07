<?php
	global $templates;
	/*::::::::::::::::::::::: CUSTOM POST TYPE :::::::::::::::::::::::*/
	function cptui_register_my_cpts_location() {
		/**
		 * Post Type: Location.
		 */
		$labels = array(
			"name" => __( "Locations", 'twentychild' ),
			"singular_name" => __( "Location", 'twentychild' ),
		);
		$args = array(
			"label" => __( "Locations", 'twentychild' ),
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
			"rewrite" => array( "slug" => "/locations", "with_front" => false ),
			"query_var" => true,
			"supports" => array( "title", "editor", "thumbnail" ),
			"menu_icon" => 'dashicons-location',
			'menu_position' => 5,
		);
		register_post_type( "location", $args );
	}
	add_action( 'init', 'cptui_register_my_cpts_location' );
	
	/* ====================== Location ====================== */

	function cptui_register_my_cpts_Services() {
		/**
		 * Post Type: Service.
		 */
		$labels = array(
			"name" => __( "Services", 'twentychild' ),
			"singular_name" => __( "Service", 'twentychild' ),
		);
		$args = array(
			"label" => __( "Services", 'twentychild' ),
			"labels" => $labels,
			"description" => "",
			"public" => true,//false>> remove permalink from back-end
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
			"rewrite" => array( "slug" => "/service", "with_front" => false ),
			"query_var" => true,
			"supports" => array( "title", "editor", "thumbnail" ),
			"menu_icon" => 'dashicons-hammer',
			'menu_position' => 5,
		);
		register_post_type( "service", $args );
	}
	add_action( 'init', 'cptui_register_my_cpts_Services' ); 
	/* ====================== Service ====================== */


	function cptui_register_my_cpts_Providers() {
		/**
		 * Post Type: Providers.
		 */
		$labels = array(
			"name" => __( "Providers", 'twentychild' ),
			"singular_name" => __( "Provider", 'twentychild' ),
		);
		$args = array(
			"label" => __( "Providers", 'twentychild' ),
			"labels" => $labels,
			"description" => "",
			"public" => true,//false>> remove permalink from back-end
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
			"rewrite" => array( "slug" => "/provider", "with_front" => false ),
			"query_var" => true,
			"supports" => array( "title", "editor", "thumbnail" ),
			"menu_icon" => 'dashicons-businessperson',
			'menu_position' => 5,
		);
		register_post_type( "provider", $args );
	}
	add_action( 'init', 'cptui_register_my_cpts_Providers' ); 
	/* ====================== Provider ====================== */
	/* ====================== Testimonial ====================== */
function cptui_register_my_cpts_testimonial() {
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
		"menu_icon" => 'dashicons-editor-quote',
		'menu_position' => 5,
	);
	register_post_type( "testimonial", $args );
}
add_action( 'init', 'cptui_register_my_cpts_testimonial' ); 
/* ====================== End :: Testimonial ====================== */
/* ====================== Gallery ====================== */
function cptui_register_my_cpts_gallery() {
	/**
	 * Post Type: Testimonials.
	 */
	$labels = array(
		"name" => __( "Gallerys", 'twentychild' ),
		"singular_name" => __( "Gallery", 'twentychild' ),
	);
	$args = array(
		"label" => __( "Gallerys", 'twentychild' ),
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
		"menu_icon" => 'dashicons-format-image',
		'menu_position' => 5,
	);
	register_post_type( "gallery", $args );
}
add_action( 'init', 'cptui_register_my_cpts_gallery' ); 