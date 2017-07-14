<?php if ( ! defined( 'ABSPATH' ) ) { die( 'Direct access forbidden.' ); }
/**
 * Include static files in admin: javascript and css
 */

if ( !is_admin() ) {
	return;
}

if (!defined('FW')) return; // prevent fatal error when the framework is not active

$admin_screen = get_current_screen();

//Enqueue admin style
if ( in_array($admin_screen->id, array('post','page','fw-portfolio')) ) {
	wp_enqueue_style( NEX_THEME_SLUG . '-admin', get_template_directory_uri() . '/css/admin.css' );
}

//Enqueue admin scripts
if ( $admin_screen->id == 'widgets' ) {
	wp_enqueue_script( NEX_THEME_SLUG . '-admin', get_template_directory_uri() . '/js/admin.js', array( 'jquery' ) );
}