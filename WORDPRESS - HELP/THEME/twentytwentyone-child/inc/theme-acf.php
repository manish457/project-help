<?php
	global $templates;
	/*:::::::::::::::::::: ACF OPTION ::::::::::::::::::::::::::::::*/
	if( function_exists('acf_add_options_page') ) {		
		acf_add_options_page(array(
			'page_title' 	=> 'Theme Settings',
			'menu_title'	=> 'Theme Settings',
			'menu_slug' 	=> 'global-settings',
			'capability'	=> 'edit_posts',
			'redirect'		=> true,
			'position' => 9
		));
		acf_add_options_sub_page(array(
			'page_title' 	=> 'Common Settings',
			'menu_title'	=> 'Common Settings',
			'menu_slug' 	=> 'common-setting',
			'parent_slug'	=> 'global-settings',
		));
		acf_add_options_sub_page(array(
			'page_title' 	=> 'Social Media Settings',
			'menu_title'	=> 'Social Media Settings',
			'menu_slug' 	=> 'social-media',
			'parent_slug'	=> 'global-settings',
		));
	}	