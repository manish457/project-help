<?php
/**
 * The header.
 *
 * This is the template that displays all of the <head> section and everything up until main.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

?>
<!doctype html>
<html <?php language_attributes(); ?> <?php twentytwentyone_the_html_classes(); ?>>
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!-- Font Css -->
		<!-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous"> -->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
		<!-- Css Link -->
		<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri()?>/assets/css/bootstrap.min.css" >
		<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri()?>/assets/css/main.css" >
		<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri()?>/assets/css/media-queries.css" >
		<!-- Js Link -->
		<script src="<?php echo get_stylesheet_directory_uri()?>/assets/js/jquery-3.4.1.min.js"></script>
		<?php wp_head(); ?>
	</head>
	<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>
	<div id="page" class="site">
		
		<!-- Header area -->
		<header class="header-area">
			<ul class="dextop-menu">
				<?php
				if ( has_nav_menu( 'primary' ) ) {
					wp_nav_menu(
						array(
						'container' => '',
						'items_wrap' => '%3$s',
						'theme_location' => 'primary',
					)
				);
				}
				?>
			</ul>
		</header>		
		<main>
		