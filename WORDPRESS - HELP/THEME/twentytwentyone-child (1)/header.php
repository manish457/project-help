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

		<link rel="stylesheet" href="https://use.typekit.net/bgv5jlr.css">
		<!-- Css Link -->
		<link href="<?php echo get_stylesheet_directory_uri()?>/assets/css/bootstrap.min.css" rel="stylesheet">
		<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri()?>/assets/css/swiper.css">
		<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri()?>/assets/css/animate.css">
		<link href="<?php echo get_stylesheet_directory_uri()?>/assets/css/main.css" rel="stylesheet">
		<link href="<?php echo get_stylesheet_directory_uri()?>/assets/css/media-queries.css" rel="stylesheet">
		<!-- Js Link -->
		<script src="<?php echo get_stylesheet_directory_uri()?>/assets/js/jquery-3.4.1.min.js"></script>
		<?php wp_head(); ?>
	</head>
	<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>
	<div id="page" class="site">
		<div class="top-up-button">
			<div class="up-button-image" id="up-button-image">
				<a href="javscript:void(0)"><img src="<?php echo get_stylesheet_directory_uri()?>/assets/images/up-arrow.png" border="0" alt="" class="mw-100"></a>
			</div>
		</div>
		<!-- Header area -->
		<header class="header-area">
			<div class="container">
				<div class="header-wrapper">
					<div class="row align-items-center">
						<div class="col-lg-5">
							<div class="header-area-left">
								<div class="search-box">
									<a href="javascript:void(0)"><img src="assets/images/search.png" border="0" alt=""></a>
								</div>
								<div class="navbar-link">
									<ul>
										<li><a href="">Haar </a></li>
										<li><a href="">Huid</a></li>
										<li><a href="">Make-up</a></li>
										<li><a href="">Man</a></li>
										<li><a href="">Nieuw</a></li>
									</ul>
								</div>
							</div>
						</div>
						<div class="col-lg-2">
							<div class="logo-area">
								<img src="assets/images/logo.png" border="0" alt="">
							</div>
						</div>
						<div class="col-lg-5">
							<div class="header-right justify-content-end">
								<div class="navbar-link">
									<ul>
										<li><a href="">Merken</a></li>
										<li><a href="">Salons</a></li>
										<li><a href="">Hoe werkt het?</a></li>
									</ul>
								</div>
								<div class="profile-and-cart-area">
									<ul>
										<li><a href=""><img src="assets/images/profile.png" border="0" alt=""></a></li>
										<li><a href=""><img src="assets/images/Cart.png" border="0" alt=""></a></li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</header>
		<div class="search-area">
			<div class="search-close">
				<a href="javascript:void(0)"><img src="assets/images/cross.svg"></a>
			</div>
			<div class="container">
				<div class="search-form-wrapper">
					<form class="d-flex">
						<div class="searh-feild">
							<input type="text" placeholder="Zoek mijn product">
						</div>
						<div class="search-button">
							<button><img src="assets/images/search.png" border="0" alt=""></button>
						</div>
					</form>
				</div>
			</div>
		</div>
		<!-- End::Header area -->

		<!-- Header area -->
		<!-- <header class="header-area">
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
		</header>		 -->
		<main>
		