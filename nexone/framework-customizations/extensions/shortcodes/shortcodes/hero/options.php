<?php
if (!defined('FW')) die('Forbidden');
$button_options = nex_get_options('buttons');

$options = array(
    'content' => array(
	    'type'  => 'wp-editor',
	    'label' => __('Hero Content', 'nex'),
	    'desc'  => __('Description', 'nex'),
	    'help'  => __('Help tip', 'nex'),
    ),
    'image' => array(
        'type'  => 'upload',
        'label' => esc_html__('Image', 'nex'),
        'desc'  => esc_html__('Hero image', 'nex'),
        'images_only' => true,
    ),
    'message_color' => array(
	    'type'  => 'color-picker',
	    'value' => '#fff',
	    'label' => esc_html__('Message Color', 'nex'),
    ),
    'bg_image_filter' => array(
	    'type'  => 'rgba-color-picker',
	    'value' => 'rgba(0,0,0,0.5)',
	    'label' => esc_html__('RGBA Image Filter', 'nex'),
    ),
    'buttons_align' => array(
		'type'    => 'select',
		'label'   => esc_html__('Buttons alignment', 'nex'),
		'value'   => 'nex-aligncenter',
		'choices' => array(
			'nex-alignleft'  => esc_html__('Left', 'nex'),
			'nex-aligncenter' => esc_html__('Center', 'nex'),
			'nex-alignright' => esc_html__('Right', 'nex'),
		)
	),
    'buttons' => $button_options
);
