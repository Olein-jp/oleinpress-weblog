<?php
/**
 * oleinpress-weblog functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package oleinpress-weblog
 */

if ( ! function_exists( 'op_weblog_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function op_weblog_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on oleinpress-weblog, use a find and replace
		 * to change 'op-weblog' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'op-weblog', get_template_directory() . '/languages' );

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
			'header-menu'    => esc_html__( 'Header menu', 'op-weblog' ),
			'sp-footer-menu' => esc_html__( 'Footer menu for smartphone', 'op-weblog' ),
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
//		add_theme_support( 'custom-background', apply_filters( 'op_weblog_custom_background_args', array(
//			'default-color' => 'ffffff',
//			'default-image' => '',
//		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 100,
			'width'       => 400,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'op_weblog_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function op_weblog_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'op_weblog_content_width', 640 );
}
add_action( 'after_setup_theme', 'op_weblog_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function op_weblog_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'op-weblog' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'op-weblog' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer', 'op-weblog' ),
		'id'            => 'footer',
		'description'   => esc_html__( 'Add widgets here.', 'op-weblog' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s c-footer-widget">',
		'after_widget'  => '</section>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );

}
add_action( 'widgets_init', 'op_weblog_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function op_weblog_scripts() {
	wp_enqueue_style( 'op-weblog-style', get_template_directory_uri() . '/assets/css/style.min.css' );

	wp_enqueue_style( 'op-weblog-fontawesome-style',  'https://use.fontawesome.com/releases/v5.6.0/css/all.css' );

	wp_enqueue_script( 'op-weblog-app-js', get_template_directory_uri() . '/assets/js/app.min.js', array( 'jquery' ), '20181208', true );

	wp_enqueue_script( 'op-weblog-superfish', get_template_directory_uri() . '/assets/packages/superfish/js/superfish.min.js', array( 'jquery' ), '1.7.10', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'op_weblog_scripts' );

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
require get_template_directory() . '/inc/customizer/initialize.php';
require get_template_directory() . '/inc/customizer/customizer.php';
require get_template_directory() . '/inc/customizer/customizer-styles.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Load composer autoload.php
 */
require get_template_directory() . '/vendor/autoload.php';

/**
 * Comment format / callback from wp_list_comments on comments.php
 */
require get_template_directory() . '/template-parts/comment-setting.php';

/**
 * Load WP GitHub Theme Updater
 *
 * @link https://github.com/inc2734/wp-github-theme-updater
 */
require_once get_template_directory() . '/inc/update/updater.php';

/**
 * @param $output
 * @param $args
 *
 * @return string|string[]|null
 *
 * Customize category widget output source
 */
function op_weblog_widget_categories_custom_post_counter( $output, $args ) {
	$replaced_text = preg_replace('/<\/a> \(([0-9,]*)\)/', ' <span class="c-post-counter">${1}</span></a>', $output );
	if ( $replaced_text != NULL ) {
		return $replaced_text;
	} else {
		return $output;
	}
}
add_filter( 'wp_list_categories', 'op_weblog_widget_categories_custom_post_counter', 10, 2 );

/**
 * @param $output
 *
 * @return string|string[]|null
 *
 * Customize wrchive widget output source
 */
function op_weblog_widget_archive_custom_post_counter( $output ) {
	$output = preg_replace('/<\/a>\s*(&nbsp;)\((\d+)\)/',' <span class="c-post-counter">${2}</span></a>', $output);
	return $output;
}
add_filter( 'get_archives_link', 'op_weblog_widget_archive_custom_post_counter' );


function op_weblog_widget_tagcloud_custom( $args ) {
	$my_args = array(
		'orderby'  => 'count',
		'order'    => 'DESC',
		'number'   => 0,
		'largest'  => 12,
		'smallest' => 12,
		'unit'     => 'px',
	);
	$args = wp_parse_args( $args, $my_args );
	return $args;
}
add_filter( 'widget_tag_cloud_args', 'op_weblog_widget_tagcloud_custom' );

/**
 * There is a case that comes back to GitHub's zip url.
 * In that case it returns false because it is illegal.
 */
add_filter(
	'inc2734_github_theme_updater_zip_url',
	function( $url ) {
		if ( 0 !== strpos( $url, 'https://olein-design.com/' ) ) {
			return false;
		}
		return $url;
	}
);

/**
 * Customize request URL that for updating
 */
add_filter(
	'inc2734_github_theme_updater_request_url',
	function( $url ) {
		return 'https://olein-design.com/webhooks/weblog/response.json';
	}
);

/**
 * wp share buttons
 * @link https://github.com/inc2734/wp-share-buttons
 */
require get_template_directory() . '/inc/wp-share-buttons.php';

/**
 * Google Adsense verification code
 */
//add_action(
//	'wp_enqueue_scripts',
//	function() {
//		if ( ! get_option( 'op-google-adsense-verification-code' ) ) {
//			return;
//		}
//
//		wp_add_inline_script(
//			'google-adsense',
//			get_option( 'op-google-adsense-verification-code' ),
//			'after'
//		);
//	}
//);