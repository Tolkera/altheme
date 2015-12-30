<?php
/**
 * alexbondarev theme functions and definitions
 *
 * @package WordPress
 * @subpackage alexbondarev
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) )
	$content_width = 970;

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * @uses add_theme_support() To add support for post thumbnails, automatic feed links, and Post Formats.
 * @uses register_nav_menus() To add support for navigation menus.
 *
 */
	
function theme_setup() {

	/* Make theme available for translation.
	 * Translations can be added to the /languages/ directory.
	 */
	load_theme_textdomain( 'alla', get_template_directory() . '/languages' );
	
	// Load up our additional custom functions
	include_once( get_template_directory().'/inc/custom.php' );

	// Load up our additional custom meta boxes
	include_once( get_template_directory().'/inc/meta-boxes.php' );

	// Load up our additional custom taxonomies
	include_once( get_template_directory().'/inc/taxonomies.php' );

	// Load up our additional custom widgets
	include_once( get_template_directory().'/inc/widgets.php' );

	// Load up our additional custom shortcodes
	include_once( get_template_directory().'/inc/shortcodes.php' );

	// Load up our additional theme scripts & styles
	include_once( get_template_directory().'/inc/utils.php' );
		
	// Load up our additional theme widgets
	include_once( get_template_directory().'/inc/script-style.php' );

	// Some files are backend only
	if ( is_admin() )	{
		// Load up Theme options class
		include_once( get_template_directory().'/inc/options.php' );
	}

	// This theme uses wp_nav_menus() in two locations.
	register_nav_menus(array(
		'primary' => __( 'Primary Menu', 'alla' ),
        'secondary' => __( 'Secondary menu', 'alla' )
	));

    //remove paragraph tags in the excerpt
    remove_filter( 'the_excerpt', 'wpautop' );

    function filter_ptags_on_images($content){
        return preg_replace('/<p>\s*(<a .*>)?\s*(<img .* \/>)\s*(<\/a>)?\s*<\/p>/iU', '\1\2\3', $content);
    }

    add_filter('the_content', 'filter_ptags_on_images');
	
	if ( function_exists( 'add_theme_support' ) ) {
		// Add default posts and comments RSS feed links to <head>.
		add_theme_support( 'automatic-feed-links' );
	
		add_theme_support( 'post-thumbnails' );
		set_post_thumbnail_size( 500, 200 ); // default Post Thumbnail dimensions (cropped)

		// additional image sizes
		add_image_size( 'news-blog-thumbnail', 540, 250, true );
		add_image_size( 'news-preview-thumbnail', 600, 250, true );

	}
}

/**
 * Tell WordPress to run theme_setup() when the 'after_setup_theme' hook is run.
 */
add_action( 'after_setup_theme', 'theme_setup' );

/**
 * Register our sidebars and widgetized areas. Also register theme widgets
 *
 * @since alla 1.0
 */
function theme_widgets_init() {

    if ( function_exists( 'register_sidebar' ) ) {
        register_sidebar(array(
            'name' => __( 'Home page sidebar', 'alla' ),
            'id'   => 'index-sidebar-widgets',
            'description'   => __( 'These are widgets for the homepage sidebar.', 'alla' ),
            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
            'after_widget'  => '</aside>'
        ));
    }
}
add_action( 'widgets_init', 'theme_widgets_init' );

// Clean up the <head>
function remove_head_links() {
    remove_action( 'wp_head', 'rsd_link' );
    remove_action( 'wp_head', 'wlwmanifest_link' );
    remove_action( 'wp_head', 'wp_generator' );
}
add_action( 'init', 'remove_head_links' );

function register_my_menus() {
	register_nav_menus(
		array(
			'footer-nav-1' => __( 'Footer menu 1' ),
			'footer-nav-2' => __( 'Footer menu 2' ),
		)
	);
}
add_action( 'init', 'register_my_menus' );