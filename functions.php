<?php
/**
 * WpAutomate functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WpAutomate
 */

if ( ! function_exists( 'wpautomate_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function wpautomate_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on WpAutomate, use a find and replace
	 * to change 'wpautomate' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'wpautomate', get_template_directory() . '/languages' );

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
	Editor Style
	 */
	add_editor_style('css/editor-style.css');

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary Menu', 'wpautomate' ),
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

	/*
	 * Enable support for Post Formats.
	 * See https://developer.wordpress.org/themes/functionality/post-formats/
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'wpautomate_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	
}
endif; // wpautomate_setup
add_action( 'after_setup_theme', 'wpautomate_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function wpautomate_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'wpautomate_content_width', 640 );
}
add_action( 'after_setup_theme', 'wpautomate_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function wpautomate_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'wpautomate' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'wpautomate_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function wpautomate_scripts() {

	wp_enqueue_style( 'wpautomate-style', get_stylesheet_uri() );
	wp_enqueue_style( 'vendor-css', get_template_directory_uri() . '/css/vendor.css', array(), 'v1' );
	wp_enqueue_style( 'main-css', get_template_directory_uri() . '/css/main.css', array(), 'v1' );

	 wp_enqueue_script( 'jquery' );

	wp_enqueue_script( 'wpautomate-vendorscript', get_template_directory_uri() . '/js/vendor/bootstrap.min.js', array(), 'v1', true );
	wp_enqueue_script( 'wpautomate-mainscrpt', get_template_directory_uri() . '/js/main.js', array(), 'v1', true );


	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'wpautomate_scripts' );

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


/**
 * Load Plugin activation
 */
require get_template_directory() . '/inc/plugin-activation/plugin-activation.php';

/**
 * Redux Options
 */
require get_template_directory() . '/admin/admin-init.php';

/*
MetaBox
 */
require_once get_template_directory() . '/inc/metabox/metabox-init.php';

/*
Woocommerce Support 
 */
add_action( 'after_setup_theme', 'woocommerce_support' );
function woocommerce_support() {
    add_theme_support( 'woocommerce' );
}

/*
Editor RTL Support
*/
$theme_options = get_option('theme_options');
global $theme_options;
$rtl_editor_support = $theme_options['opt-rtl-editor'];
if ($rtl_editor_support==='1') {
	require_once get_template_directory() . '/inc/plugins/wp-rtl.php';
}
