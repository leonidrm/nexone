<?php if ( ! defined( 'ABSPATH' ) ) { die( 'Direct access forbidden.' ); }
/**
 * Theme Includes
 */
require_once get_template_directory() . '/inc/init.php';

/**
 * TGM Plugin Activation
 */
{
    require_once get_template_directory() . '/plugins/TGM-Plugin-Activation/class-tgm-plugin-activation.php';

    /** @internal */
    function nex_action_register_required_plugins() {
        tgmpa( array(
            array(
                'name'      => 'Unyson',
                'slug'      => 'unyson',
                'required'  => false,
            ),
	        array(
		        'name'      => 'Time table',
		        'slug'      => 'mp-timetable',
		        'required'  => false,
	        ),
	        array(
		        'name'      => 'MailPoet',
		        'slug'      => 'wysija-newsletters',
		        'required'  => false,
	        ),
        ) );

    }
    add_action( 'tgmpa_register', NEX_THEME_SLUG . '_action_register_required_plugins' );
}