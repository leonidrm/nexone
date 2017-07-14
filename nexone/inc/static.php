<?php if ( ! defined( 'ABSPATH' ) ) { die( 'Direct access forbidden.' ); }
/**
 * Include static files: javascript and css
 */

if ( is_admin() ) {
	return;
}

/**
 * Enqueue scripts and styles for the front end.
 */

$query_args = array(
	'family' => 'Montserrat:300,400,400i,600'
);
wp_enqueue_style( NEX_THEME_SLUG . '-google-fonts', add_query_arg( $query_args, "//fonts.googleapis.com/css" ), array(), null );

wp_enqueue_style( 'bootstrap-min', get_template_directory_uri() . '/css/bootstrap.min.css' );

wp_enqueue_style( 'ionicons-min', get_template_directory_uri() . '/css/ionicons.min.css' );

wp_enqueue_style( 'swipebox-min', get_template_directory_uri() . '/css/swipebox.min.css' );

wp_enqueue_style( NEX_THEME_SLUG . '-core', get_template_directory_uri() . '/css/screen.css' );

wp_enqueue_style( NEX_THEME_SLUG . '-main', get_template_directory_uri() . '/screen-theme.css' );

/*SCRIPTS*/
wp_enqueue_script( 'bootstrap-min', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), null, true );

wp_enqueue_script( 'isotope-min', get_template_directory_uri() . '/js/isotope.pkgd.min.js', array('jquery'), null, true );

wp_enqueue_script( 'jquery-swipebox', get_template_directory_uri() . '/js/jquery.swipebox.min.js', array('jquery'), null, true );

wp_enqueue_script( 'jquery-sticky', get_template_directory_uri() . '/js/jquery.sticky.js', array('jquery'), null, true );

wp_enqueue_script( 'slick-script', get_template_directory_uri() . '/js/slick.min.js', array('jquery'), null, true );

wp_enqueue_script( NEX_THEME_SLUG . '-main', get_template_directory_uri() . '/js/script.js', array('jquery','slick-script','jquery-swipebox','jquery-sticky','isotope-min'), null, true );

wp_localize_script( NEX_THEME_SLUG . '-main', 'nex_ajax_object', array( 'ajax_url' => admin_url( 'admin-ajax.php' ) ) );

if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
	wp_enqueue_script( 'comment-reply' );
}

//FW specific enqueues
if (!defined('FW')) return; // prevent fatal error when the framework is not active
//TODO: enqueue only font families used
fw()->backend->option_type('icon-v2')->packs_loader->enqueue_frontend_css();

//ajaxify forms from unyson shortcode
wp_enqueue_script( 'fw-form-helpers', fw_get_framework_directory_uri('/static/js/fw-form-helpers.js'), null, true );

wp_enqueue_script( 'fw-form-ajaxify', get_template_directory_uri() . '/js/fw-form-ajaxify.js', null, true );

//Enqueue google fonts from typography selectors - insert options ids in the array below
nex_enqueue_gf(array('logo_text_style', 'footer_logo/on/logo_text_style', 'text_style'));

$custom_js = fw_get_db_settings_option('js_area') ? fw_get_db_settings_option('js_area') : '';

wp_add_inline_script(NEX_THEME_SLUG . '-main', $custom_js);
