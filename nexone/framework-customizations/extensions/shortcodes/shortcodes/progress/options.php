<?php
if (!defined('FW')) die('Forbidden');
$options = array(
	'progress' => array(
		'type'  => 'multi-picker',
		'label' => false,
		'desc'  => false,
		'value' => array(
			'layout_type' => 'layout_1',
		),
		'picker' => array(
			'layout_type' => array(
				'type'  => 'image-picker',
				'value' => 'layout_4',
				'label' => esc_html__('Layout Type', 'nex'),
				'desc'  => esc_html__('Choose between the layout types available', 'nex'),
				'help'  => esc_html__('This will modify how the section looks on frontend', 'nex'),
				'choices' => array(
					'layout_1' => fw_get_template_customizations_directory_uri('/extensions/shortcodes/shortcodes/progress/static/img/progress_v1.png'),
					'layout_2' => fw_get_template_customizations_directory_uri('/extensions/shortcodes/shortcodes/progress/static/img/progress_v2.png'),
				),
			),
		),
		'choices' => array(
			'layout_1' => array(
				'cols'   => array(
					'type'  => 'select',
					'value' => 'col-md-3',
					'label' => esc_html__('Columns', 'nex'),
					'desc'  => esc_html__('Pick the number of columns', 'nex'),
					'choices' => array(
						'col-md-6' => esc_html__('2 Columns', 'nex'),
						'col-md-4' => esc_html__('3 Columns', 'nex'),
						'col-md-3' => esc_html__('4 Columns', 'nex'),
					)
				),
				'steps' => array(
					'type' => 'addable-popup',
					'label' => esc_html__('Progress steps', 'nex'),
					'desc'  => esc_html__('Add your progress step here. Each will be a block.', 'nex'),
					'template' => '{{- title }}',
					'popup-title' => null,
					'size' => 'small', // small, medium, large
					'limit' => 0, // limit the number of popup`s that can be added
					'add-button-text' => esc_html__('Add a step', 'nex'),
					'sortable' => true,
					'popup-options' => array(
						'title' => array(
							'label' => esc_html__('Progress step Title', 'nex'),
							'type' => 'text',
							'value' => 'Demo stat title',
							'desc' => esc_html__('Title of your progress step block', 'nex')
						),
						'image' => array(
							'type'  => 'upload',
							'label' => esc_html__('Block image background', 'nex'),
							'help'  => esc_html__('Recommended size 300x300 px', 'nex'),
							'images_only' => true,
						),
					)
				)
			),
			'layout_2' => array(
				'cols'   => array(
					'type'  => 'select',
					'value' => 'col-md-3',
					'label' => esc_html__('Columns', 'nex'),
					'desc'  => esc_html__('Pick the number of columns', 'nex'),
					'choices' => array(
						'col-md-6' => esc_html__('2 Columns', 'nex'),
						'col-md-4' => esc_html__('3 Columns', 'nex'),
						'col-md-3' => esc_html__('4 Columns', 'nex'),
					)
				),
				'steps' => array(
					'type' => 'addable-popup',
					'label' => esc_html__('Progress steps', 'nex'),
					'desc'  => esc_html__('Add your progress step here. Each will be a block.', 'nex'),
					'template' => '{{- title }}',
					'popup-title' => null,
					'size' => 'small', // small, medium, large
					'limit' => 0, // limit the number of popup`s that can be added
					'add-button-text' => esc_html__('Add a step', 'nex'),
					'sortable' => true,
					'popup-options' => array(
						'title' => array(
							'label' => esc_html__('Progress step Title', 'nex'),
							'type' => 'text',
							'value' => 'Demo stat title',
							'desc' => esc_html__('Title of your progress step block', 'nex')
						),
						'percentage' => array(
							'label' => esc_html__('Progress percentage', 'nex'),
							'type' => 'text',
							'value' => '85',
							'desc' => esc_html__('Value of your progress. Ex: 85%', 'nex')
						),
					)
				)
			)
		)
	)
);