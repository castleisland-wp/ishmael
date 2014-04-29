<?php
/**
 * Ishael functions and definitions
 *
 * @package Ishael
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

if ( ! function_exists( 'ishmael_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function ishmael_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Ishael, use a find and replace
	 * to change 'ishmael' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'ishmael', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	//add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'ishmael' ),
	) );

	// Enable support for Post Formats.
	add_theme_support( 'post-formats', array( 'aside', 'image', 'video', 'quote', 'link' ) );

	// Setup the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'ishmael_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	// Enable support for HTML5 markup.
	add_theme_support( 'html5', array(
		'comment-list',
		'search-form',
		'comment-form',
		'gallery',
	) );

}
endif; // ishmael_setup
add_action( 'after_setup_theme', 'ishmael_setup' );

/**
 * Register widgetized area and update sidebar with default widgets.
 */
function ishmael_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Top Widget Area', 'ishmael' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => __( 'Second Widget Area', 'ishmael' ),
		'id'            => 'sidebar-2',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => __( 'Third Widget Area', 'ishmael' ),
		'id'            => 'sidebar-3',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => __( 'Lower Widget Area', 'ishmael' ),
		'id'            => 'sidebar-4',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => __( 'Footer Widget Area', 'ishmael' ),
		'id'            => 'sidebar-5',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', 'ishmael_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function ishmael_scripts() {
	wp_enqueue_style( 'ishmael-style', get_stylesheet_uri() );
	wp_enqueue_style( 'custom', get_stylesheet_directory_uri() . '/css/custom.css' );
	wp_enqueue_style( 'custom-ie8', get_stylesheet_directory_uri() . '/css/custom-ie8.css' );

	wp_enqueue_script( 'ishmael-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

	wp_enqueue_script( 'ishmael-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );
	wp_enqueue_script( 'small-menu', get_template_directory_uri() . '/js/small-menu.js', 'jquery', '20120206', true );


	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'ishmael_scripts' );

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

add_filter( 'style_loader_tag', 'child_make_ie8_style_sheet_conditional', 10, 2 );
/**
 * Add conditional comments around IE-specific style sheet link.
 *
 * @author Gary Jones & Michael Fields (@_mfields)
 * @link http://code.garyjones.co.uk/ie-conditional-style-sheets-wordpress/
 *
 * @param string $tag    Existing style sheet tag.
 * @param string $handle Name of the enqueued style sheet.
 * 
 * @return string Amended markup
 */
function child_make_ie8_style_sheet_conditional( $tag, $handle ) {

	switch($handle) 
	{
		case 'custom-ie8':
			$tag = '<!--[if (lt IE 9) & (!IEMobile)] >' . "\n" . $tag . '<![endif]-->' . "\n";
			break;
		case 'custom2':
			$tag = '<!--[if (gte IE 9) | (IEMobile)] >' . "\n" . $tag . '<![endif]-->' . "\n";
			break;
	}
		
	return $tag;
	
}
