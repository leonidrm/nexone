<?php
if (!defined('FW')) die('Forbidden');
$options = array(
	'pricing' => array(
		'type'  => 'multi-picker',
		'label' => false,
		'desc'  => false,
		'value' => array(
			'layout_type' => 'layout_1',
		),
		'picker' => array(
			'layout_type' => array(
				'type'  => 'image-picker',
				'value' => 'layout_1',
				'label' => esc_html__('Layout Type', 'nex'),
				'desc'  => esc_html__('Choose between the layout types available', 'nex'),
				'help'  => esc_html__('This will modify how the section looks on frontend', 'nex'),
				'choices' => array(
					'layout_1' => fw_get_template_customizations_directory_uri('/extensions/shortcodes/shortcodes/pricing-list/static/img/pricing_list_v1.png'),
					'layout_2' => fw_get_template_customizations_directory_uri('/extensions/shortcodes/shortcodes/pricing-list/static/img/pricing_list_v2.png'),
				),
			),
		),
		'choices' => array(
			'layout_1' => array(
				'items' => array(
					'type' => 'addable-popup',
					'label' => esc_html__('List Items', 'nex'),
					'desc'  => esc_html__('Add a price line.', 'nex'),
					'template' => '{{- title }}',
					'popup-title' => null,
					'size' => 'small', // small, medium, large
					'limit' => 0, // limit the number of popup`s that can be added
					'add-button-text' => esc_html__('Add a Price line', 'nex'),
					'sortable' => true,
					'popup-options' => array(
						'title' => array(
							'label' => esc_html__('Price Title', 'nex'),
							'type' => 'text',
						),
						'desc' => array(
							'label' => esc_html__('Short description', 'nex'),
							'type' => 'textarea',
						),
						'price' => array(
							'label' => esc_html__('Price', 'nex'),
							'type' => 'text',
						),
					)
				)
			),
			'layout_2' => array(

			)
		)
	)
);