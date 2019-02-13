<?php
/**
 * Trainosys functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Trainosys
 */

if ( ! function_exists( 'trainosys_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function trainosys_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Trainosys, use a find and replace
		 * to change 'trainosys' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'trainosys', get_template_directory() . '/languages' );

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
			'menu-1' => esc_html__( 'Primary', 'trainosys' ),
			'menu-footer' => esc_html__( 'Secondary', 'trainosys' ),
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
		add_theme_support( 'custom-background', apply_filters( 'trainosys_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'trainosys_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function trainosys_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'trainosys_content_width', 640 );
}
add_action( 'after_setup_theme', 'trainosys_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function trainosys_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'trainosys' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'trainosys' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'trainosys_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function trainosys_scripts() {
	wp_enqueue_style( 'trainosys-style-theme', get_stylesheet_uri() );
	
	wp_enqueue_style( 'Bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', array(), '20181213');
	
	wp_enqueue_style( 'Opensans-Font', 'https://fonts.googleapis.com/css?family=Open+Sans:400,400i,600,700,800', array(), '20181213');
	
	wp_enqueue_style( 'Fontawsome', 'https://use.fontawesome.com/releases/v5.6.1/css/all.css', array(), '20181213');
	
	wp_enqueue_style( 'trainosys-style',  get_template_directory_uri() . '/css/trainosys.css', array(), '2019118');

	wp_enqueue_script( 'JQUERY-Libraray', 'https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js', array(), '20181213', true );
	
	wp_enqueue_script( 'Bootstrap-js', get_template_directory_uri() . '/js/bootstrap.min.js', array(), '20181213', true );
	
	wp_enqueue_script( 'trainosys-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'trainosys-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );
	
	if( is_page( 27 ) || is_page( 35) ) {//IF COURSES or TRAINING PAGE
		wp_enqueue_script( 'inquiry-popen', get_template_directory_uri() . '/js/inquire.js', array(), '2019118', true );
	}
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'trainosys_scripts' );

function add_stylesheet_attributes( $html, $handle ) {
    if ( 'Fontawsome' === $handle ) {
        return str_replace( "rel='stylesheet'", "rel='stylesheet' title='something'", $html );
    }
    return $html;
}
add_filter( 'style_loader_tag', 'add_stylesheet_attributes', 10, 2 );
/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Remove empty paragraphs created by wpautop()
 * @author Ryan Hamilton
 * @link https://gist.github.com/Fantikerz/5557617
 */