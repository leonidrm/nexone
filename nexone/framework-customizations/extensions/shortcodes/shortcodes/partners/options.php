<?php
if (!defined('FW')) die('Forbidden');
$options = array(
	'slider' => array(
		'type'  => 'switch',
		'value' => 'slider',
		'label' => esc_html__('View type', 'nex'),
		'left-choice' => array(
			'value' => 'slider',
			'label' => esc_html__('Slider', 'nex'),
		),
		'right-choice' => array(
			'value' => 'grid',
			'label' => esc_html__('Grid', 'nex'),
		),
	),
	'cols'   => array(
		'type'  => 'select',
		'value' => '4',
		'label' => esc_html__('Columns', 'nex'),
		'desc'  => esc_html__('Pick the number of columns', 'nex'),
		'choices' => array(
			'2' => esc_html__('2 Columns', 'nex'),
			'3' => esc_html__('3 Columns', 'nex'),
			'4' => esc_html__('4 Columns', 'nex'),
			'6' => esc_html__('6 Columns', 'nex'),
		)
	),
	'partners' => array(
		'type' => 'addable-popup',
		'label' => esc_html__('Partners', 'nex'),
		'desc'  => esc_html__('Add your partners here. Each will be a block.', 'nex'),
		'template' => '<img src="{{- image[\'url\'] }}" width="50" height="50">',
		'popup-title' => null,
		'size' => 'small', // small, medium, large
		'limit' => 0, // limit the number of popup`s that can be added
		'add-button-text' => esc_html__('Add a Partner', 'nex'),
		'sortable' => true,
		'popup-options' => array(
			'image' => array(
				'type'  => 'upload',
				'label' => esc_html__('Partner logo', 'nex'),
				'help'  => esc_html__('Recommended size 100x100 px', 'nex'),
				'images_only' => true,
			),
			'link' => array(
				'label' => esc_html__('Partner URL', 'nex'),
				'type' => 'text',
				'desc' => esc_html__('Logo without link if left blank', 'nex')
			),
		)
	)
);