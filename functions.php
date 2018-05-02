<?php
/**
 * Developer Bio functions and definitions
 *
 * Set up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 * When using a child theme you can override certain functions (those wrapped
 * in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before
 * the parent theme's file, so the child theme functions would be used.
 *
 * @link https://codex.wordpress.org/Theme_Development
 * @link https://codex.wordpress.org/Child_Themes
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are
 * instead attached to a filter or action hook.
 *
 * For more information on hooks, actions, and filters,
 * {@link https://codex.wordpress.org/Plugin_API}
 *
 * @package WordPress
 * @subpackage Developer_Bio
 * @since Developer Bio 1.0
 */

/**
 * Developer Bio only works in WordPress 4.4 or later.
 */
if ( version_compare( $GLOBALS['wp_version'], '4.4-alpha', '<' ) ) {
	require get_template_directory() . '/inc/back-compat.php';
}

if ( ! function_exists( 'devbio_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 *
 * Create your own devbio_setup() function to override in a child theme.
 *
 * @since Developer Bio 1.0
 */
function devbio_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed at WordPress.org. See: https://translate.wordpress.org/projects/wp-themes/devbio
	 * If you're building a theme based on Developer Bio, use a find and replace
	 * to change 'devbio' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'devbio' );

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
	 * Enable support for custom logo.
	 *
	 *  @since Developer Bio 1.2
	 */
	add_theme_support( 'custom-logo', array(
		'height'      => 170,
		'width'       => 170,
		'flex-height' => true,
	) );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	
	// ----------------------------------------------
	// ------ post-thumbnails ----------------------- 
	// ----------------------------------------------
	if ( function_exists( 'add_theme_support' ) ) {
		add_theme_support( 'post-thumbnails' );
		add_image_size( 'thumbnail-blog', 658, '', true ); // Blog thumbnails
		add_image_size( 'thumbnail-widget-small', 80, 80, true ); // Small Widget thumbnails
		add_image_size( 'thumbnail-widget-big', 354, 200, true ); // Big Widget thumbnails
		add_image_size( 'thumbnail-recent-posts', 200, 200, true ); // Recent Posts thumbnails
		add_image_size( 'thumbnail-slider-post', 658, 380, true ); // Slider Post thumbnails
	}
	set_post_thumbnail_size( 700 );

	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'devbio' ),
		'social'  => __( 'Social Links Menu', 'devbio' ),
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
	 *
	 * See: https://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
		'gallery',
		'status',
		'audio',
		'chat',
	) );

	/*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, icons, and column width.
	 */
	add_editor_style( array( 'css/editor-style.css', devbio_fonts_url() ) );

	// Indicate widget sidebars can use selective refresh in the Customizer.
	add_theme_support( 'customize-selective-refresh-widgets' );
	
	//Set the display status of the Toolbar for the front side of your website (you cannot turn off the toolbar on the WordPress dashboard).
	//show_admin_bar( false );
}
endif; // devbio_setup
add_action( 'after_setup_theme', 'devbio_setup' );

/**
 * Sets the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 *
 * @since Developer Bio 1.0
 */
function devbio_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'devbio_content_width', 840 );
}
add_action( 'after_setup_theme', 'devbio_content_width', 0 );

/**
 * Registers a widget area.
 *
 * @link https://developer.wordpress.org/reference/functions/register_sidebar/
 *
 * @since Developer Bio 1.0
 */
function devbio_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'devbio' ),
		'id'            => 'sidebar-1',
		'description'   => __( 'Add widgets here to appear in your sidebar.', 'devbio' ),
		'before_widget' => '<section class="section"> <section id="%1$s" class="section-inner widget %2$s">',
		'after_widget'  => '</section></section>',
		'before_title'  => '<h2 class="heading widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => __( 'Content Top', 'devbio' ),
		'id'            => 'sidebar-2',
		'description'   => __( 'Appears at the top of the content on the landing page', 'devbio' ),
		'before_widget' => '<section class="section"> <section id="%1$s" class="section-inner widget %2$s">',
		'after_widget'  => '</section></section>',
		'before_title'  => '<h2 class="heading widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => __( 'Content Bottom', 'devbio' ),
		'id'            => 'sidebar-3',
		'description'   => __( 'Appears at the bottom of the content on posts and pages.', 'devbio' ),
		'before_widget' => '<section class="section"> <section id="%1$s" class="section-inner widget %2$s">',
		'after_widget'  => '</section></section>',
		'before_title'  => '<h2 class="heading widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'devbio_widgets_init' );

/**
 * Add theme options menu
 * *
 *
 * @since Developer Bio 1.0
 */
if( is_admin() )
{
	require_once('inc/options.php');

	function devbio_theme_menu()
	{
		add_theme_page( 'DevBio Theme Options', 'Theme Option', 'manage_options', 'devbio-options', array('DEVBIO_Options', 'index') );
	}
	add_action( 'admin_menu', 'devbio_theme_menu' );
}

if ( ! function_exists( 'devbio_fonts_url' ) ) :
/**
 * Register Google fonts for Developer Bio.
 *
 * Create your own devbio_fonts_url() function to override in a child theme.
 *
 * @since Developer Bio 1.0
 *
 * @return string Google fonts URL for the theme.
 */
function devbio_fonts_url() {
	$fonts_url = '';
	$fonts     = array();
	$subsets   = 'latin,latin-ext';

	/* translators: If there are characters in your language that are not supported by Merriweather, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Merriweather font: on or off', 'devbio' ) ) {
		$fonts[] = 'Merriweather:400,700,900,400italic,700italic,900italic';
	}

	/* translators: If there are characters in your language that are not supported by Montserrat, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Montserrat font: on or off', 'devbio' ) ) {
		$fonts[] = 'Montserrat:400,700';
	}

	/* translators: If there are characters in your language that are not supported by Inconsolata, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Inconsolata font: on or off', 'devbio' ) ) {
		$fonts[] = 'Inconsolata:400';
	}

	if ( $fonts ) {
		$fonts_url = add_query_arg( array(
			'family' => urlencode( implode( '|', $fonts ) ),
			'subset' => urlencode( $subsets ),
		), 'https://fonts.googleapis.com/css' );
	}

	return $fonts_url;
}
endif;

/**
 * Handles JavaScript detection.
 *
 * Adds a `js` class to the root `<html>` element when JavaScript is detected.
 *
 * @since Developer Bio 1.0
 */
function devbio_javascript_detection() {
	echo "<script>(function(html){html.className = html.className.replace(/\bno-js\b/,'js')})(document.documentElement);</script>\n";
}
add_action( 'wp_head', 'devbio_javascript_detection', 0 );

/**
 * Enqueues scripts and styles.
 *
 * @since Developer Bio 1.0
 */
function devbio_scripts() {
	// Add custom fonts, used in the main stylesheet.
	wp_enqueue_style( 'devbio-fonts', devbio_fonts_url(), array(), null );
	wp_enqueue_style( 'devbio-fonts-lato', 'http://fonts.googleapis.com/css?family=Lato:300,400,300italic,400italic', array(), null );
	wp_enqueue_style( 'devbio-fonts-montserrat', 'http://fonts.googleapis.com/css?family=Montserrat:400,700', array(), null );

	// Add Genericons, used in the main stylesheet.
	wp_enqueue_style( 'genericons', get_template_directory_uri() . '/genericons/genericons.css', array(), '3.4.1' );

	// Add Bootstrap stylesheet.
	wp_enqueue_style( 'devbio-bootstrap', get_template_directory_uri() . '/assets/plugins/bootstrap/css/bootstrap.min.css');

	// Add Font-Awesome stylesheet.
	wp_enqueue_style( 'devbio-font-awesome', get_template_directory_uri() . '/assets/plugins/font-awesome/css/font-awesome.css');

	// Theme stylesheet.
	wp_enqueue_style( 'devbio-style', get_stylesheet_uri() );

	// Load the Internet Explorer specific stylesheet.
	wp_enqueue_style( 'devbio-ie', get_template_directory_uri() . '/css/ie.css', array( 'devbio-style' ), '20160816' );
	wp_style_add_data( 'devbio-ie', 'conditional', 'lt IE 10' );

	// Load the Internet Explorer 8 specific stylesheet.
	wp_enqueue_style( 'devbio-ie8', get_template_directory_uri() . '/css/ie8.css', array( 'devbio-style' ), '20160816' );
	wp_style_add_data( 'devbio-ie8', 'conditional', 'lt IE 9' );

	// Load the Internet Explorer 7 specific stylesheet.
	wp_enqueue_style( 'devbio-ie7', get_template_directory_uri() . '/css/ie7.css', array( 'devbio-style' ), '20160816' );
	wp_style_add_data( 'devbio-ie7', 'conditional', 'lt IE 8' );

	// Load the html5 shiv.
	wp_enqueue_script( 'devbio-html5', get_template_directory_uri() . '/js/html5.js', array(), '3.7.3' );
	wp_script_add_data( 'devbio-html5', 'conditional', 'lt IE 9' );

	wp_enqueue_script( 'devbio-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20160816', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	if ( is_singular() && wp_attachment_is_image() ) {
		wp_enqueue_script( 'devbio-keyboard-image-navigation', get_template_directory_uri() . '/js/keyboard-image-navigation.js', array( 'jquery' ), '20160816' );
	}

	wp_enqueue_script( 'devbio-script', get_template_directory_uri() . '/js/functions.js', array( 'jquery' ), '20160816', true );

	wp_localize_script( 'devbio-script', 'screenReaderText', array(
		'expand'   => __( 'expand child menu', 'devbio' ),
		'collapse' => __( 'collapse child menu', 'devbio' ),
	) );
	
	wp_enqueue_script( 'devbio-bootstrap', get_template_directory_uri() . '/assets/plugins/bootstrap/js/bootstrap.min.js');
}
add_action( 'wp_enqueue_scripts', 'devbio_scripts' );

/**
 * Adds custom classes to the array of body classes.
 *
 * @since Developer Bio 1.0
 *
 * @param array $classes Classes for the body element.
 * @return array (Maybe) filtered body classes.
 */
function devbio_body_classes( $classes ) 
{
	// Adds a class of custom-background-image to sites with a custom background image.
	if ( get_background_image() ) {
		$classes[] = 'custom-background-image';
	}

	// Adds a class of group-blog to sites with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	// Adds a class of no-sidebar to sites without active sidebar.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}
	
	return $classes;
}
add_filter( 'body_class', 'devbio_body_classes' );

/**
 * Adds custom classes to the array of post classes.
 *
 * @since Nans GH 1.0
 *
 * @param array $classes Classes for the post element.
 * @return array (Maybe) filtered post classes.
 */
function devbio_post_classes( $classes ) {
	
	// Adds a class of post-area to page.
	if(is_page())
	{
		$classes[] = 'section-inner';
	}
	
	if( !is_page() )
	{
		$classes[] = 'section';
	}
	
	return $classes;
}
add_filter( 'post_class', 'devbio_post_classes' );

/**
 * Converts a HEX value to RGB.
 *
 * @since Developer Bio 1.0
 *
 * @param string $color The original color, in 3- or 6-digit hexadecimal form.
 * @return array Array containing RGB (red, green, and blue) values for the given
 *               HEX code, empty array otherwise.
 */
function devbio_hex2rgb( $color ) {
	$color = trim( $color, '#' );

	if ( strlen( $color ) === 3 ) {
		$r = hexdec( substr( $color, 0, 1 ).substr( $color, 0, 1 ) );
		$g = hexdec( substr( $color, 1, 1 ).substr( $color, 1, 1 ) );
		$b = hexdec( substr( $color, 2, 1 ).substr( $color, 2, 1 ) );
	} else if ( strlen( $color ) === 6 ) {
		$r = hexdec( substr( $color, 0, 2 ) );
		$g = hexdec( substr( $color, 2, 2 ) );
		$b = hexdec( substr( $color, 4, 2 ) );
	} else {
		return array();
	}

	return array( 'red' => $r, 'green' => $g, 'blue' => $b );
}

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Add custom image sizes attribute to enhance responsive image functionality
 * for content images
 *
 * @since Developer Bio 1.0
 *
 * @param string $sizes A source size value for use in a 'sizes' attribute.
 * @param array  $size  Image size. Accepts an array of width and height
 *                      values in pixels (in that order).
 * @return string A source size value for use in a content image 'sizes' attribute.
 */
function devbio_content_image_sizes_attr( $sizes, $size ) {
	$width = $size[0];

	if ( 840 <= $width ) {
		$sizes = '(max-width: 709px) 85vw, (max-width: 909px) 67vw, (max-width: 1362px) 62vw, 840px';
	}

	if ( 'page' === get_post_type() ) {
		if ( 840 > $width ) {
			$sizes = '(max-width: ' . $width . 'px) 85vw, ' . $width . 'px';
		}
	} else {
		if ( 840 > $width && 600 <= $width ) {
			$sizes = '(max-width: 709px) 85vw, (max-width: 909px) 67vw, (max-width: 984px) 61vw, (max-width: 1362px) 45vw, 600px';
		} elseif ( 600 > $width ) {
			$sizes = '(max-width: ' . $width . 'px) 85vw, ' . $width . 'px';
		}
	}

	return $sizes;
}
add_filter( 'wp_calculate_image_sizes', 'devbio_content_image_sizes_attr', 10 , 2 );

/**
 * Add custom image sizes attribute to enhance responsive image functionality
 * for post thumbnails
 *
 * @since Developer Bio 1.0
 *
 * @param array $attr Attributes for the image markup.
 * @param int   $attachment Image attachment ID.
 * @param array $size Registered image size or flat array of height and width dimensions.
 * @return array The filtered attributes for the image markup.
 */
function devbio_post_thumbnail_sizes_attr( $attr, $attachment, $size ) {
	if ( 'post-thumbnail' === $size ) {
		if ( is_active_sidebar( 'sidebar-1' ) ) {
			$attr['sizes'] = '(max-width: 709px) 85vw, (max-width: 909px) 67vw, (max-width: 984px) 60vw, (max-width: 1362px) 62vw, 840px';
		} else {
			$attr['sizes'] = '(max-width: 709px) 85vw, (max-width: 909px) 67vw, (max-width: 1362px) 88vw, 1200px';
		}
	}
	return $attr;
}
add_filter( 'wp_get_attachment_image_attributes', 'devbio_post_thumbnail_sizes_attr', 10 , 3 );

/**
 * Modifies tag cloud widget arguments to display all tags in the same font size
 * and use list format for better accessibility.
 *
 * @since Developer Bio 1.0
 *
 * @param array $args Arguments for tag cloud widget.
 * @return array The filtered arguments for tag cloud widget.
 */
function devbio_widget_tag_cloud_args( $args ) {
	$args['largest']  = 1;
	$args['smallest'] = 1;
	$args['unit']     = 'em';
	$args['format']   = 'list'; 

	return $args;
}
add_filter( 'widget_tag_cloud_args', 'devbio_widget_tag_cloud_args' );

/**
 * Generate breadcrumbs
 * @author CodexWorld
 * @authorURL www.codexworld.com
 */
function get_breadcrumb() {
    echo '<a href="'.home_url().'" rel="nofollow">Home</a>';
    if (is_category() || is_single()) {
        echo " / ";
        the_category(' &bull; ');
            if (is_single()) {
                echo " / ";
                the_title();
            }
    } elseif (is_page()) {
        echo " / ";
        echo the_title();
    } elseif (is_search()) {
        echo " / Search Results for... ";
        echo '"<em>';
        echo the_search_query();
        echo '</em>"';
    }
}