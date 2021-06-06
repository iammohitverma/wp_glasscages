<?php
/**
 * Glass Cage functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Glass_Cage
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'glass_cage_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function glass_cage_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Glass Cage, use a find and replace
		 * to change 'glass-cage' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'glass-cage', get_template_directory() . '/languages' );

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
		register_nav_menus(
			array(
				'menu-1' => esc_html__( 'Primary', 'glass-cage' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'glass_cage_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
	}
endif;
add_action( 'after_setup_theme', 'glass_cage_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function glass_cage_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'glass_cage_content_width', 640 );
}
add_action( 'after_setup_theme', 'glass_cage_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function glass_cage_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'glass-cage' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'glass-cage' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'glass_cage_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function glass_cage_scripts() {
	wp_enqueue_style( 'glass-cage-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'glass-cage-style', 'rtl', 'replace' );

	wp_enqueue_script( 'glass-cage-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'glass_cage_scripts' );

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




/**** custom ****/
/**** custom ****/
/**** custom ****/
/**** custom ****/

/*!
** registered nav bar 
!*/

function register_my_menu() {
   register_nav_menu('header-menu',__( 'header' ));
   register_nav_menu('footer-menu',__( 'footer' ));
   register_nav_menu('sidebar-menu',__( 'sidebar' ));
}

add_action( 'init' , 'register_my_menu' );

/*!
** add class in li
!*/

add_filter ( 'nav_menu_css_class', 'add_class_to_menu_list', 10, 4 );

function add_class_to_menu_list ( $classes, $item, $args, $depth ){
    if ($args->theme_location == 'header') { /**** according to theme location *****/
      $classes[] = 'gc-nav-item'; 
    }
    
    if ($args->theme_location == 'sidebar') { /**** according to theme location *****/
      $classes[] = 'gc-sidebar-item'; 
    }
    return $classes;
}

/*!
** add class in anchor
!*/

add_filter( 'nav_menu_link_attributes', 'add_class_to_list_anchor', 10, 4 );

function add_class_to_list_anchor($atts, $item, $args, $depth) {
    if ($args->theme_location == 'header') { /**** according to theme location *****/
        $atts['class'] = "gc-nav-link";
    }
  return $atts;
}

/*!
** override class for submenu
!*/

add_filter( 'nav_menu_submenu_css_class', 'add_sub_menu_class', 10, 4);

function add_sub_menu_class($atts, $args, $depth) {
    if ($args->theme_location == 'sidebar') { /**** according to theme location *****/
        return array('gc-sidebar-submenu');
    }
}

/*** reguister sidebar ***/

register_sidebar(
    array(
        'name' => _x('Mail Widget', 'backend', 'cargopress-pt'),
        'id' => 'mail-widgets',
        'description' => _x('Header area for Mail ID.', 'backend', 'cargopress-pt'),
        'before_widget' => '<div class="widget  %2$s">',
        'after_widget' => '</div>',
    )
);

register_sidebar(
    array(
        'name' => _x('Social Widget', 'backend', 'cargopress-pt'),
        'id' => 'social-widgets',
        'description' => _x('Header area for Icon Box and Social Icons widgets.', 'backend', 'cargopress-pt'),
        'before_widget' => '<div class="widget  %2$s">',
        'after_widget' => '</div>',
    )
);

register_sidebar(
    array(
        'name' => _x('Short Desc Widget', 'backend', 'cargopress-pt'),
        'id' => 'footer-short-desc-widgets',
        'description' => _x('Footer area for short description.', 'backend', 'cargopress-pt'),
        'before_widget' => '<div class="widget  %2$s">',
        'after_widget' => '</div>',
    )
);



/**** custom shortcode ***/
/**** custom shortcode ***/
/**** custom shortcode ***/

/*
for gallery with lightbox 
*/

function gc_gallery_function($gc_atts){
    $gc_default = array(
        'id' => '0',
    );
    $gc_page_id = shortcode_atts($gc_default, $gc_atts);
    
    /** include file **/
    include 'inc/gc-sc/gallery.php';
}

add_shortcode( 'gc_gallery_sc' , 'gc_gallery_function' );
     
/**** custom shortcode ***/
/**** custom shortcode ***/
/**** custom shortcode ***/

/*
for timeline
*/
function gc_timeline_function(){
//    $gc_default = array(
//        'id' => '0',
//    );
//    $gc_page_id = shortcode_atts($gc_default, $gc_atts);
    
    /** include file **/
    include 'inc/gc-sc/timeline.php';
}

add_shortcode( 'gc_timeline_sc' , 'gc_timeline_function' );