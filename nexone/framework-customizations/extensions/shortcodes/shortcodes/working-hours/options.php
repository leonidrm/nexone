<?php
if (!defined('FW')) die('Forbidden');
$options = array(
	'bg_image' => array(
		'type'  => 'upload',
		'label' => esc_html__('Background image', 'nex'),
		'help'  => esc_html__('Dark color image', 'nex'),
		'images_only' => true,
	),
	'text_color' => array(
		'type'  => 'color-picker',
		'value' => '#eee',
		'label' => esc_html__('Text Color', 'nex'),
		'desc'  => esc_html__('Choose bright color for dark background images', 'nex'),
	),
	'items' => array(
		'type' => 'addable-popup',
		'label' => esc_html__('Week Day', 'nex'),
		'desc'  => esc_html__('Add week day time period', 'nex'),
		'template' => '{{- day }}',
		'popup-title' => null,
		'size' => 'small', // small, medium, large
		'limit' => 0, // limit the number of popup`s that can be added
		'add-button-text' => esc_html__('Add a day', 'nex'),
		'sortable' => true,
		'popup-options' => array(
			'day' => array(
				'label' => esc_html__('Week day name', 'nex'),
				'type' => 'text',
				'value' => esc_html__('Monday', 'nex'),
			),
			'time' => array(
				'label' => esc_html__('Time period', 'nex'),
				'type' => 'text',
				'value' => esc_html__('08:00 - 18:00', 'nex'),
			),
		)
	)
);