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
		'label' => esc_html__('Twitter account', 'nex'),
		'type' => 'text',
	),
	'number' => array(
		'label' => esc_html__('Number of tweets', 'nex'),
		'type'  => 'slider',
		'value' => 4,
		'properties' => array(
			'min'  => 0,
			'max'  => 20,
			'step' => 1, // Set slider step. Always > 0. Could be fractional.
		),
	),
	'cols' => $cols
);