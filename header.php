<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package seo
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<div class="header-area">
		<div class="container">
			<div class="row">
				<div class="header-top">
					<div class="col-md-6">
						<div class="header-social">
							<a href="#"><i class="fa fa-facebook"></i></a>
							<a href="#"><i class="fa fa-twitter"></i></a>
							<a href="#"><i class="fa fa-linkedin"></i></a>
							<a href="#"><i class="fa fa-skype"></i></a>
							<a href="#"><i class="fa fa-pinterest"></i></a>
							<a href="#"><i class="fa fa-youtube"></i></a>
						</div>
					</div>
					<div class="col-md-6">
						<div class="header-contact">
							<a href=""><i class="fa fa-phone"></i>+22 666-888-999</a>
							<a href=""><i class="fa fa-envelope"></i>sepexpert@gmail.com</a>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="header-navbar">
					<div class="col-md-3">
						<div class="site-logo">
							<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><img src="<?php echo esc_url(get_template_directory_uri().'/assets/images/site-logo.png')?>" alt="SEO"></a>
						</div>
					</div>
					<div class="col-md-9">
						<div class="main-menu">
							<?php wp_nav_menu( array( 'theme_location' => 'menu-1', 'menu_id' => 'primary-menu' ) ); ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
