<?php
if (!defined('FW')) die('Forbidden');
$options = array(
	'title' => array(
		'type'  => 'text',
		'label' => esc_html__('Title', 'nex'),
	),
	'title_color' => array(
		'type'  => 'color-picker',
		'value' => '#eee',
		'label' => esc_html__('Title Color', 'nex'),
	),
	'bg_style' => array(
		'type'  => 'switch',
		'value' => 'dark',
		'label' => esc_html__('Color style', 'nex'),
		'left-choice' => array(
			'value' => 'dark',
			'label' => esc_html__('Dark', 'nex'),
		),
		'right-choice' => array(
			'value' => 'bright',
			'label' => esc_html__('Bright', 'nex'),
		),
	),
	'icon_size' => array(
		'type'  => 'switch',
		'value' => 'small',
		'label' => esc_html__('Icons size', 'nex'),
		'left-choice' => array(
			'value' => 'small',
			'label' => esc_html__('Small', 'nex'),
		),
		'right-choice' => array(
			'value' => 'big',
			'label' => esc_html__('Big', 'nex'),
		),
	),
);