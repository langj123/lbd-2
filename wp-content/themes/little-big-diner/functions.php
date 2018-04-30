<?php
/**
 * Little Big Diner functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Little_Big_Diner
 */

if ( ! function_exists( 'little_big_diner_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function little_big_diner_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Little Big Diner, use a find and replace
	 * to change 'little-big-diner' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'little-big-diner', get_template_directory() . '/languages' );

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
	add_image_size('lbd-portrait', 1605, 1260, array('center', 'center'));
	add_image_size('lbd-landscape', 1605, 630, array('center', 'center'));
	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary Menu', 'little-big-diner' ),
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
	add_theme_support( 'custom-background', apply_filters( 'little_big_diner_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif; // little_big_diner_setup
add_action( 'after_setup_theme', 'little_big_diner_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function little_big_diner_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'little_big_diner_content_width', 640 );
}
add_action( 'after_setup_theme', 'little_big_diner_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
// function little_big_diner_widgets_init() {
// 	register_sidebar( array(
// 		'name'          => esc_html__( 'Sidebar', 'little-big-diner' ),
// 		'id'            => 'sidebar-1',
// 		'description'   => '',
// 		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
// 		'after_widget'  => '</aside>',
// 		'before_title'  => '<h2 class="widget-title">',
// 		'after_title'   => '</h2>',
// 	) );
// }
// add_action( 'widgets_init', 'little_big_diner_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function little_big_diner_scripts() {

	wp_enqueue_script( 'little-big-diner-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

	wp_enqueue_script( 'little-big-diner-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'little_big_diner_scripts' );

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
* Register TypeKit fonts
*/
function lbd_my_scripts() {
	wp_enqueue_script('adele-font', 'https://use.typekit.net/rbg1nig.js');
	wp_enqueue_script('adele-font-try',  get_template_directory_uri() . "/js/adele-font-try.js", array('adele-font'));
	wp_enqueue_script('lbd-scripts', get_template_directory_uri() . "/js/lbd-scripts.js", array('jquery'));
	wp_enqueue_script( 'cray-egg', get_template_directory_uri() . '/js/crazy-egg.js', array());

	wp_register_style('bootstrap', get_template_directory_uri() . "/style/bootstrap.css" );
	wp_register_style('lbd', get_stylesheet_uri(), array("bootstrap"));
	wp_enqueue_style('lbd');
}
add_action( 'wp_enqueue_scripts', 'lbd_my_scripts' );
/**
* Gallery Generator
*/
function lbd_gallery_gen($g, $t) {
	if (function_exists('get_field')) {

		$images = array();
		for ($i = 0; $i < $t; $i++) {
			array_push($images, $g[$i]);
		}
		return $images;
	}
}
add_action('before_header', 'lbd_gallery_gen', 10, 2);
/**
* Global Variables for use with ACF
*/
if (function_exists('get_field')) {
	$home_id = get_option('page_on_front');
	$rest_menu = get_field('restaurant_menu', $home_id);
	$rest_hours = get_field('restaurant_hours', $home_id);
	$rest_address = get_field('restaurant_address', $home_id);
	$rest_city = get_field('restaurant_city_st_zip', $home_id);
	$rest_about = get_field('restaurant_about', $home_id);
	$rest_email = get_field('restaurant_email', $home_id);
	$rest_phone = get_field('restaurant_phone', $home_id);
	$rest_gift = get_field('rest_gift_cards', $home_id);
	$rest_fb = get_field('rest_facebook', $home_id);
	$rest_twt = get_field('rest_twitter', $home_id);
	$rest_inst = get_field('rest_instagram', $home_id);
	$rest_hire = get_field('hiring_email', $home_id);
	$rest_hiring = get_field('hiring', $home_id);
}

/**
* Remove menu items from backend
*/
 function remove_menus () {
 global $menu;
 $user = wp_get_current_user();
 // if ($user->ID!=1) { // can add this in so admin can have posts
    $restricted = array('Posts', 'Comments');
    end ($menu);
    while (prev($menu)){
        $value = explode(' ',$menu[key($menu)][0]);
        if(in_array($value[0] != NULL?$value[0]:"" , $restricted)){unset($menu[key($menu)]);}
     }
   }

 add_action('admin_menu', 'remove_menus');
/**
* Redirect All non homepage requests
*/
 function lbd_page_template_redirect()
{
    if( !is_front_page() )
    {
        wp_redirect( home_url( '' ) );
        exit();
    }
}
add_action( 'template_redirect', 'lbd_page_template_redirect' );


function cc_mime_types($mimes) {
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');
