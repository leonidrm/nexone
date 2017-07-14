<?php if (!defined('FW')) die('Forbidden');

$manifest = array();

/**
 * An unique id to identify your theme
 * For e.g. this is used to store Theme Settings in wp_option 'fw_theme_settings_options:{theme_id}'
 */
$manifest['id'] = 'nex';

/**
 * Specify extensions that you customized, that will look good and work well with your theme.
 * After plugin activation, the user will be redirected to a page to install these extensions.
 */
$manifest['supported_extensions'] = array(
    'page-builder' => array(),
    'backups'   => array(),
    'wp-shortcodes' => array(),
    'social' => array(),
    'portfolio' => array()
);

$manifest['requirements'] = array(
    'wordpress' => array(
        'min_version' => '4.1',
        /*'max_version' => '4.99.9'*/
    ),
    'framework' => array(
        'min_version' => '2.6.15',
        //'max_version' => '1.99.9
    ),
    'extensions' => array(
        'page-builder' => array(
            /*'min_version' => '1.0.0',
            'max_version' => '2.99.9'*/
        ),
        'backups'   => array(),
        'wp-shortcodes' => array(),
        'social' => array(),
        'portfolio' => array()
    ),
    
);