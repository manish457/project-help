<?php 
	global $templates;
	/*::::::::::::::::::::::: CUSTOM POST TYPE :::::::::::::::::::::::*/
	function cptui_register_my_cpts_project() {
		/**
		 * Post Type: project.
		 */
		$labels = array(
			"name" => __( "Projects", 'twentychild' ),
			"singular_name" => __( "Project", 'twentychild' ),
		);
		$args = array(
			"label" => __( "Projects", 'twentychild' ),
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
			"rewrite" => array( "slug" => "/projects", "with_front" => false ),
			"query_var" => true,
			"supports" => array( "title", "editor", "thumbnail" ),
			"menu_icon" => 'dashicons-portfolio',
			'menu_position' => 5,
		);
		register_post_type( "project", $args );
	}
	add_action( 'init', 'cptui_register_my_cpts_project' );
	
	/* ====================== END::project ====================== */

/* ====================== project Category ====================== */
function cptui_register_my_taxes_project_category() {
	/**
	 * Taxonomy: project-category.
	 */
	$labels = array(
		"name" => __( "Project Categories", 'twentychild' ),
		"singular_name" => __( "Project Category", 'twentychild' ),
	);
	$args = array(
		"label" => __( "Project Categories", 'twentychild' ),
		"labels" => $labels,
		"public" => true,
		"hierarchical" => true,
		"label" => "Project Categories",
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => array( 'slug' => '/project-category', 'with_front' => false, 'hierarchical' => False,),
		"show_admin_column" => true,
		"show_in_rest" => true,
		"rest_base" => "project-category",
		"show_in_quick_edit" => true,
	);
	register_taxonomy( "project-category", array( "project" ), $args );
}
add_action( 'init', 'cptui_register_my_taxes_project_category' );
/* ====================== End :: project Category ====================== */
/* ====================== Team ====================== */
	function cptui_register_my_cpts_Teams() {
		/**
		 * Post Type: team.
		 */
		$labels = array(
			"name" => __( "Teams", 'twentychild' ),
			"singular_name" => __( "Team", 'twentychild' ),
		);
		$args = array(
			"label" => __( "Teams", 'twentychild' ),
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
			"rewrite" => array( "slug" => "/team", "with_front" => false ),
			"query_var" => true,
			"supports" => array( "title", "editor", "thumbnail" ),
			"menu_icon" => 'dashicons-businessperson',
			'menu_position' => 5,
		);
		register_post_type( "team", $args );
	}
	add_action( 'init', 'cptui_register_my_cpts_Teams' ); 
	/* ====================== End :: Team ====================== */
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

/* ====================== testimonial Category ====================== */
function cptui_register_my_taxes_testimonial_category() {
	/**
	 * Taxonomy: testimonial-category.
	 */
	$labels = array(
		"name" => __( "Testimonial Categories", 'twentychild' ),
		"singular_name" => __( "Testimonial Category", 'twentychild' ),
	);
	$args = array(
		"label" => __( "Testimonial Categories", 'twentychild' ),
		"labels" => $labels,
		"public" => true,
		"hierarchical" => true,
		"label" => "Testimonial Categories",
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => array( 'slug' => '/testimonial-category', 'with_front' => false, 'hierarchical' => False,),
		"show_admin_column" => true,
		"show_in_rest" => true,
		"rest_base" => "testimonial-category",
		"show_in_quick_edit" => true,
	);
	register_taxonomy( "testimonial-category", array( "testimonial" ), $args );
}
add_action( 'init', 'cptui_register_my_taxes_testimonial_category' );
/* ====================== End :: testimonial Category ====================== */


/* ====================== Faq ====================== */
function cptui_register_my_cpts_faq() {
	/**
	 * Post Type: faq.
	 */
	$labels = array(
		"name" => __( "Faqs", 'twentychild' ),
		"singular_name" => __( "Faq", 'twentychild' ),
	);
	$args = array(
		"label" => __( "Faqs", 'twentychild' ),
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
		"rewrite" => array( "slug" => "/faqs", "with_front" => false ),
		"query_var" => true,
		"supports" => array( "title", "editor", "thumbnail" ),
		"menu_icon" => 'dashicons-info',
		'menu_position' => 5,
	);
	register_post_type( "faq", $args );
}
add_action( 'init', 'cptui_register_my_cpts_faq' ); 
/* ====================== End :: Faq ====================== */

/* ====================== faq Category ====================== */
function cptui_register_my_taxes_faq_category() {
	/**
	 * Taxonomy: faq-category.
	 */
	$labels = array(
		"name" => __( "Faq Categories", 'twentychild' ),
		"singular_name" => __( "Faq Category", 'twentychild' ),
	);
	$args = array(
		"label" => __( "Faq Categories", 'twentychild' ),
		"labels" => $labels,
		"public" => true,
		"hierarchical" => true,
		"label" => "Faq Categories",
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => array( 'slug' => '/faq-category', 'with_front' => false, 'hierarchical' => False,),
		"show_admin_column" => true,
		"show_in_rest" => true,
		"rest_base" => "faq-category",
		"show_in_quick_edit" => true,
	);
	register_taxonomy( "faq-category", array( "faq" ), $args );
}
add_action( 'init', 'cptui_register_my_taxes_faq_category' );
/* ====================== End :: faq Category ====================== */


/* ====================== Portfolio ====================== */
function cptui_register_my_cpts_portfolio() {
	/**
	 * Post Type: portfolio.
	 */
	$labels = array(
		"name" => __( "Portfolios", 'twentychild' ),
		"singular_name" => __( "Portfolio", 'twentychild' ),
	);
	$args = array(
		"label" => __( "Portfolios", 'twentychild' ),
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
		"rewrite" => array( "slug" => "/portfolios", "with_front" => false ),
		"query_var" => true,
		"supports" => array( "title", "editor", "thumbnail" ),
		"menu_icon" => 'dashicons-format-gallery',
		'menu_position' => 5,
	);
	register_post_type( "portfolio", $args );
}
add_action( 'init', 'cptui_register_my_cpts_portfolio' ); 
/* ====================== End :: Portfolio ====================== */

/* ====================== Portfolio Category ====================== */
function cptui_register_my_taxes_Portfolio_category() {
	/**
	 * Taxonomy: Portfolio-category.
	 */
	$labels = array(
		"name" => __( "Portfolio Categories", 'twentychild' ),
		"singular_name" => __( "Portfolio Category", 'twentychild' ),
	);
	$args = array(
		"label" => __( "Portfolio Categories", 'twentychild' ),
		"labels" => $labels,
		"public" => true,
		"hierarchical" => true,
		"label" => "Portfolio Categories",
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => array( 'slug' => '/portfolio-category', 'with_front' => false, 'hierarchical' => False,),
		"show_admin_column" => true,
		"show_in_rest" => true,
		"rest_base" => "portfolio-category",
		"show_in_quick_edit" => true,
	);
	register_taxonomy( "portfolio-category", array( "portfolio" ), $args );
}
add_action( 'init', 'cptui_register_my_taxes_portfolio_category' );
/* ====================== End :: Portfolio Category ====================== */

