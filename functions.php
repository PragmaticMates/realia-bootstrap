<?php

/**
 * Libraries
 */
require_once 'assets/libraries/class-tgm-plugin-activation.php';

/**
 * Constants
 */
define( 'PROPERTY_EXCERPT_LENGTH', 22 );
define( 'AGENCY_EXCERPT_LENGTH', 20 );

/**
 * Custom excerpt length
 *
 * @param $length
 * @return int
 */
function realia_bootstrap_excerpt_length( $length ) {
	global $post;

	if ( $post->post_type == 'property' ) {
		return PROPERTY_EXCERPT_LENGTH;
	} elseif ( $post->post_type == 'agency' ) {
		return AGENCY_EXCERPT_LENGTH;
	}

	return $length;
}
add_filter('excerpt_length', 'realia_bootstrap_excerpt_length' );

/**
 * Enqueue scripts & styles
 *
 * @return void
 */
function realia_bootstrap_enqueue_files() {
	wp_register_script( 'bootstrap-collapse', get_template_directory_uri() . '/assets/libraries/bootstrap/javascripts/bootstrap/collapse.js' );
	wp_enqueue_script( 'bootstrap-collapse' );

	wp_register_style( 'realia-bootstrap', get_template_directory_uri() . '/assets/css/realia-bootstrap.css' );
	wp_enqueue_style( 'realia-bootstrap' );
	
	wp_register_style( 'style', get_stylesheet_directory_uri() . '/style.css' );
	wp_enqueue_style( 'style' );
}
add_action( 'wp_enqueue_scripts', 'realia_bootstrap_enqueue_files' );

/**
 * Additional after theme setup functions
 *
 * @return void
 */
function realia_bootstrap_after_theme_setup() {
	add_theme_support( 'realia-custom-styles' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'custom-header', array() );
	add_theme_support( 'custom-background' );
	add_theme_support( 'menus' );
	add_theme_support( 'title-tag' );

	if ( ! isset( $content_width ) ) {
		$content_width = 1170;
	}
}
add_action( 'after_setup_theme', 'realia_bootstrap_after_theme_setup' );

/**
 * Register menus
 *
 * @return void
 */
function realia_bootstrap_menus() {
	register_nav_menu( 'primary', __( 'Primary', 'realia-bootstrap' ) );
}
add_action( 'init', 'realia_bootstrap_menus' );

/**
 * Custom widget areas
 *
 * @return void
 */
function realia_bootstrap_sidebars() {
	register_sidebar( array( 'name' => __( 'Primary', 'realia-bootstrap' ), 'id' => 'sidebar-1', 'before_widget' => '<div id="%1$s" class="widget %2$s">', 'after_widget' => '</div>' ) );
	register_sidebar( array( 'name' => __( 'Top Fullwidth', 'realia-bootstrap' ), 'id' => 'sidebar-top-fullwidth', 'before_widget' => '<div id="%1$s" class="widget %2$s">', 'after_widget' => '</div>' ) );
	register_sidebar( array( 'name' => __( 'Top', 'realia-bootstrap' ), 'id' => 'sidebar-top', 'before_widget' => '<div id="%1$s" class="widget %2$s">', 'after_widget' => '</div>' ) );
	register_sidebar( array( 'name' => __( 'Content Top', 'realia-bootstrap' ), 'id' => 'sidebar-content-top', 'before_widget' => '<div id="%1$s" class="widget %2$s">', 'after_widget' => '</div>' ) );
	register_sidebar( array( 'name' => __( 'Content Bottom', 'realia-bootstrap' ), 'id' => 'sidebar-content-bottom', 'before_widget' => '<div id="%1$s" class="widget %2$s">', 'after_widget' => '</div>' ) );
	register_sidebar( array( 'name' => __( 'Bottom', 'realia-bootstrap' ), 'id' => 'sidebar-bottom', 'before_widget' => '<div id="%1$s" class="widget %2$s">', 'after_widget' => '</div>' ) );
	register_sidebar( array( 'name' => __( 'Footer First', 'realia-bootstrap' ), 'id' => 'footer-first', 'before_widget' => '<div id="%1$s" class="widget %2$s">', 'after_widget' => '</div>' ) );
	register_sidebar( array( 'name' => __( 'Footer Second', 'realia-bootstrap' ), 'id' => 'footer-second', 'before_widget' => '<div id="%1$s" class="widget %2$s">', 'after_widget' => '</div>' ) );
	register_sidebar( array( 'name' => __( 'Footer Third', 'realia-bootstrap' ), 'id' => 'footer-third', 'before_widget' => '<div id="%1$s" class="widget %2$s">', 'after_widget' => '</div>' ) );
	register_sidebar( array( 'name' => __( 'Footer Fourth', 'realia-bootstrap' ), 'id' => 'footer-fourth', 'before_widget' => '<div id="%1$s" class="widget %2$s">', 'after_widget' => '</div>' ) );
	register_sidebar( array( 'name' => __( 'Footer Bottom Left', 'realia-bootstrap' ), 'id' => 'footer-bottom-left', 'before_widget' => '<div id="%1$s" class="widget %2$s">', 'after_widget' => '</div>' ) );
	register_sidebar( array( 'name' => __( 'Footer Bottom Right', 'realia-bootstrap' ), 'id' => 'footer-bottom-right', 'before_widget' => '<div id="%1$s" class="widget %2$s">', 'after_widget' => '</div>' ) );
}
add_action( 'widgets_init', 'realia_bootstrap_sidebars' );

/**
 * Disable admin's bar top margin
 *
 * @return void
 */
function realia_bootstrap_disable_admin_bar_top_margin() {
	remove_action( 'wp_head', '_admin_bar_bump_cb' );
}
add_action( 'get_header', 'realia_bootstrap_disable_admin_bar_top_margin' );

/**
 * Read more for post excerpt
 *
 * @param $more
 * @return void|string
 */
function realia_bootstrap_excerpt_read_more( $more ) {
	global $post;

	if ( $post->post_type == 'property' || $post->post_type == 'agency' ) {
		return null;
	}

	return '<a class="post-read-more" href="'. get_permalink( $post->ID ) . '">' . __( 'Read more', 'megareal' ) . '</a>';
}
add_filter( 'excerpt_more', 'realia_bootstrap_excerpt_read_more' );

/**
 * Registers sessions
 *
 * @return void
 */
function realia_bootstrap_register_session(){
	if( ! session_id() ) {
		session_start();
	}
}
add_action( 'init', 'realia_bootstrap_register_session' );

/**
 * Customizations
 *
 * @param $wp_customize
 * @return void
 */
function realia_bootstrap_customizations( $wp_customize ) {
	$wp_customize->add_section( 'realia_bootstrap_general', array( 'title' => __( 'Realia Bootstrap General', 'realia-bootstrap' ), 'priority' => 0 ) );

	$wp_customize->add_setting( 'realia_bootstrap_general_logo', array( 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'header_logo', array(
		'label'         => __( 'Logo', 'realia-bootstrap' ),
		'section'       => 'realia_bootstrap_general',
		'settings'      => 'realia_bootstrap_general_logo',
		'description'   => __( 'Logo displayed in header. By default it has some opacity added by CSS which will change after hover.', 'realia-bootstrap' ),
	) ) );
}
add_action( 'customize_register', 'realia_bootstrap_customizations' );

/**
 * Register plugins
 *
 * @return void
 */
function realia_bootstrap_register_required_plugins() {
	$plugins = array(
		array(
			'name'                  => 'Realia',
			'slug'                  => 'realia',
			'is_automatic'          => true,
			'required'              => true,
		),
	);

	tgmpa( $plugins );
}
add_action( 'tgmpa_register', 'realia_bootstrap_register_required_plugins' );

/**
 * Class Realia_Bootstrap_Menu_Walker
 */
class Realia_Bootstrap_Menu_Walker extends Walker_Nav_Menu {
	/**
	 * Custom parent menu item class
	 *
	 * @param string $output
	 * @param int $depth
	 * @param array $args
	 * @return void
	 */
	public function start_lvl( &$output, $depth = 0, $args = array() ) {
		$indent = str_repeat("\t", $depth);
		$output .= "\n$indent<ul class=\"dropdown-menu sub-menu\">\n";
	}
}
