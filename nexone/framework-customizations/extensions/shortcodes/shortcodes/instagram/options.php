<?php
if (!defined('FW')) die('Forbidden');

$cols = array(
	'type'  => 'select',
	'value' => 'col-md-3',
	'label' => esc_html__('Columns', 'nex'),
	'desc'  => esc_html__('Pick the number of columns', 'nex'),
	'choices' => array(
		'col-md-6' => esc_html__('2 Columns', 'nex'),
		'col-md-4' => esc_html__('3 Columns', 'nex'),
		'col-md-3' => esc_html__('4 Columns', 'nex'),
		'col-md-2' => esc_html__('6 Columns', 'nex'),
	)
);

$options = array(
	'username' => array(
		'label' => esc_html__('Instagram account', 'nex'),
		'type' => 'text',
	),
	'img_size' => array(
		'type'  => 'select',
		'value' => 'standard_resolution',
		'label' => esc_html__('Image Size', 'nex'),
		'desc'  => esc_html__('Pick the instagram image size', 'nex'),
		'choices' => array(
			'thumbnail' => esc_html__('Small 150', 'nex'),
			'low_resolution' => esc_html__('Medium 320', 'nex'),
			'standard_resolution' => esc_html__('Big 640', 'nex'),
		)
	),
	'cols' => $cols,
	'nr_images' => array(
		'label' => esc_html__('Number of images', 'nex'),
		'type'  => 'slider',
		'value' => 4,
		'properties' => array(
			'min'  => 0,
			'max'  => 20,
			'step' => 1, // Set slider step. Always > 0. Could be fractional.
		)
	),
	'cache_hours' => array(
		'label' => esc_html__('Cache Hours', 'nex'),
		'type'  => 'slider',
		'value' => 1,
		'properties' => array(
			'min'  => 0,
			'max'  => 12,
			'step' => 1, // Set slider step. Always > 0. Could be fractional.
		)
	)
);