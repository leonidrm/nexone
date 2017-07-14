<?php
if (!defined('FW')) die('Forbidden');

$button_options = nex_get_options('buttons');

$options = array(
	'arrows' => array(
		'type'  => 'switch',
		'value' => 'true',
		'label' => esc_html__('Show Arrows', 'nex'),
		'desc'  => esc_html__('The slider will have navigation arrows', 'nex'),
		'left-choice' => array(
			'value' => 'false',
			'label' => esc_html__('Off', 'nex'),
		),
		'right-choice' => array(
			'value' => 'true',
			'label' => esc_html__('On', 'nex'),
		),
	),
	'bullets' => array(
		'type'  => 'switch',
		'value' => 'true',
		'label' => esc_html__('Show Bullets', 'nex'),
		'desc'  => esc_html__('The slider will have navigation bullets', 'nex'),
		'left-choice' => array(
			'value' => 'false',
			'label' => esc_html__('Off', 'nex'),
		),
		'right-choice' => array(
			'value' => 'true',
			'label' => esc_html__('On', 'nex'),
		),
	),
	'slides' => array(
		'type' => 'addable-popup',
		'label' => esc_html__('Slides', 'nex'),
		'desc'  => esc_html__('Add a slide. Each will be an image with description', 'nex'),
		'template' => '<img src="{{- bg_image[\'url\'] }}" width="300">',
		'popup-title' => null,
		'size' => 'large', // small, medium, large
		'add-button-text' => esc_html__('Add a Slide', 'nex'),
		'sortable' => true,
		'popup-options' => array(
			'bg_image' => array(
				'label' => esc_html__('Slide image', 'nex'),
				'type' => 'upload',
				'images_only' => true
			),
			'slide_content' => array(
				'label' => esc_html__('Message', 'nex'),
				'type'  => 'wp-editor',
				'desc'  => esc_html__('Slide content that will appear on top of the image', 'nex')
			),
			'message_color' => array(
				'type'  => 'color-picker',
				'value' => '#fff',
				'label' => esc_html__('Message Color', 'nex'),
			),
			'bg_image_filter' => array(
				'type'  => 'rgba-color-picker',
				'value' => '',
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
		)
	)
);