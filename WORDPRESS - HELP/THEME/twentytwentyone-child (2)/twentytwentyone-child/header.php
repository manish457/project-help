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
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
		<link rel="stylesheet" href="https://use.typekit.net/dyc4iau.css">
		<!-- Css Link -->
		<link href="<?php echo get_stylesheet_directory_uri()?>/assets/css/bootstrap.min.css" rel="stylesheet">
		<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri()?>/assets/css/swiper.css">
		<link href="<?php echo get_stylesheet_directory_uri()?>/assets/css/main.css" rel="stylesheet">
		<link href="<?php echo get_stylesheet_directory_uri()?>/assets/css/style.css" rel="stylesheet">
		<link href="<?php echo get_stylesheet_directory_uri()?>/assets/css/media-queries.css" rel="stylesheet">
		<!-- Js Link -->
		<script src="<?php echo get_stylesheet_directory_uri()?>/assets/js/jquery-3.4.1.min.js"></script>
		<?php wp_head(); ?>
	</head>
	<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>
	<div id="page" class="site">
		<!-- Header area -->
		<header class="header-area">
			<div class="top-header">
				<div class="top-header-content text-center">
					<ul>
						<?php if(get_field('phone_number', 'option')) : ?>
						<li><a href="tel:<?=get_field('phone_number', 'option')?>"><?=get_field('phone_number', 'option')?></a></li>
						<?php endif; ?>
						<?php if(get_field('location', 'option')) : ?>
						<li><a href="<?=get_field('google_map_url', 'option')?>"><?=get_field('location', 'option')?></a></li>
						<?php endif; ?>
					</ul>
				</div>
			</div>
			<div class="header-nav-area">
				<div class="container-fluid">
					<div class="menu-content-wrapper">
						<?php if(get_field('sticky_logo', 'option')) : ?>
						<div class="menu-logo">
							<a href="<?=get_home_url()?>"><img src="<?=get_field('sticky_logo', 'option')['url']?>" border="0" title="<?=get_field('sticky_logo', 'option')['title']?>" alt="<?=get_field('sticky_logo', 'option')['alt']?>"></a>
						</div>
						<?php endif; ?>
						<div class="menu-area">
							<ul>
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
						</div>
						<div class="menu-contact-button">
							<a href="<?php the_field('contact_us_page_link', 'option');?>" class="common-button">Contact Us</a>
						</div>
						<div class="search-icon">
							<img src="<?php echo get_stylesheet_directory_uri()?>/assets/images/Icon feather-search.svg"/>
						</div>
					</div>
				</div>
			</div>
		</header>
		<!-- End::Header area -->						
		<main>
		