<?php
/**
 * arcpolitics functions and definitions
 *
 * @package arcpolitics
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

if ( ! function_exists( 'arcpolitics_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function arcpolitics_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on arcpolitics, use a find and replace
	 * to change 'arcpolitics' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'arcpolitics', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );
	add_image_size( 'invitae-thumb', 300, 9999 ); //300 pixels wide (and unlimited height)

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'arcpolitics' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'quote', 'link',
	) );

	// Setup the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'arcpolitics_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif; // arcpolitics_setup
add_action( 'after_setup_theme', 'arcpolitics_setup' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function arcpolitics_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'arcpolitics' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
	register_sidebar(array(
		'name'=> 'Menu Sidebar',
		'id' => 'sidebar-2',
		'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	));
}
add_action( 'widgets_init', 'arcpolitics_widgets_init' );

/**
 * Custom 'Read More' link
 */
function new_excerpt_more( $more ) {
	return ' <a class="more-link" href="'. get_permalink( get_the_ID() ) . '">' . __( '  <span class="meta-nav fa fa-newspaper-o"></span>&nbsp;Read More', 'arcpolitics' ) . '</a>';
}
add_filter( 'excerpt_more', 'new_excerpt_more' );

function modify_read_more_link() {
	return ' <a class="more-link" href="'. get_permalink( get_the_ID() ) . '">' . __( '  <span class="meta-nav fa fa-newspaper-o"></span>&nbsp;Read More', 'arcpolitics' ) . '</a>';
}
add_filter( 'the_content_more_link', 'modify_read_more_link' );

/**
 * Enqueue scripts and styles.
 */
function arcpolitics_scripts() {
	// wp_enqueue_style( 'bootstrap-style', get_template_directory_uri() . '/css/bootstrap.min.css' );
	//wp_enqueue_style( 'bootstrap-style', 'http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css' );
	// wp_enqueue_style( 'arcpolitics-style', get_template_directory_uri() . '/css/init.css' );

	wp_enqueue_style( 'arcpolitics-base', get_stylesheet_uri() );


	wp_enqueue_script( 'bootstrap-js', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), '20120206', true );
	//wp_enqueue_script( 'bootstrap-js', 'http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js', array(), '20120206', true );

	wp_enqueue_script( 'arcpolitics-antiscroll', get_template_directory_uri() . '/js/nicescroll.js', array('jquery'), '20120206', true );

	wp_enqueue_script( 'arcpolitics-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

	wp_enqueue_script( 'arcpolitics-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	wp_enqueue_script( 'arcpolitics-js', get_template_directory_uri() . '/js/init.js', array('jquery'), '20120206', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'arcpolitics_scripts' );

/**
 * Implement the Custom Header feature.
 */
//require get_template_directory() . '/inc/custom-header.php';

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
