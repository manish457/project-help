
<?php



/*============= plugin hide ================*/

function custom_menu_page_removing() {
        remove_menu_page( 'edit.php?post_type=acf-field-group' );
        //remove_menu_page( 'edit-comments.php' );
        remove_menu_page( 'plugins.php' );
        remove_menu_page( 'tools.php' );
        remove_menu_page( 'users.php' );
        //remove_menu_page( 'aiowpsec' );

        global $submenu;

        //print_r($submenu);
	    if ( isset( $submenu[ 'themes.php' ] ) ) {
	    	foreach ( $submenu[ 'index.php' ] as $index => $menu_item ) {
	    		if ( in_array( 'update-core.php', $menu_item ) ) {
	                unset( $submenu[ 'index.php' ][ $index ] );
	            }
	    	}
	    	foreach ( $submenu[ 'edit.php' ] as $index => $menu_item ) {
	    		/*if ( in_array( 'manage_categories', $menu_item ) ) {
	                unset( $submenu[ 'edit.php' ][ $index ] );
	            }
	            if ( in_array( 'manage_post_tags', $menu_item ) ) {
	                unset( $submenu[ 'edit.php' ][ $index ] );
	            }*/
	    	}
	        foreach ( $submenu[ 'themes.php' ] as $index => $menu_item ) {
	            if ( in_array( 'customize', $menu_item ) ) {
	                unset( $submenu[ 'themes.php' ][ $index ] );
	            }
	            if ( in_array( 'themes.php', $menu_item ) ) {
	                unset( $submenu[ 'themes.php' ][ $index ] );
	            }
	        }
	        foreach ( $submenu[ 'options-general.php' ] as $index => $menu_item ) {
	            if ( in_array( 'Writing', $menu_item ) ) {
	                unset( $submenu[ 'options-general.php' ][ $index ] );
	            }
	            /*if ( in_array( 'Reading', $menu_item ) ) {
	                unset( $submenu[ 'options-general.php' ][ $index ] );
	            }*/
	            if ( in_array( 'Discussion', $menu_item ) ) {
	                unset( $submenu[ 'options-general.php' ][ $index ] );
	            }
	            if ( in_array( 'Media', $menu_item ) ) {
	                unset( $submenu[ 'options-general.php' ][ $index ] );
	            }
	            if ( in_array( 'Permalinks', $menu_item ) ) {
	                unset( $submenu[ 'options-general.php' ][ $index ] );
	            }
	            if ( in_array( 'Privacy', $menu_item ) ) {
	                unset( $submenu[ 'options-general.php' ][ $index ] );
	            }
	        }
	    }

}
add_action( 'admin_menu', 'custom_menu_page_removing' );
/*============= END: plugin hide ================*/