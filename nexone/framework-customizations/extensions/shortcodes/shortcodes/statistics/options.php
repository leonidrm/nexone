<?php
if (!defined('FW')) die('Forbidden');

$options = array(
	'statistics' => array(
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
					'layout_1' => fw_get_template_customizations_directory_uri('/extensions/shortcodes/shortcodes/statistics/static/img/statistics_v1.png'),
					'layout_2' => fw_get_template_customizations_directory_uri('/extensions/shortcodes/shortcodes/statistics/static/img/statistics_v2.png'),
					'layout_3' => fw_get_template_customizations_directory_uri('/extensions/shortcodes/shortcodes/statistics/static/img/statistics_v3.png'),
					'layout_4' => fw_get_template_customizations_directory_uri('/extensions/shortcodes/shortcodes/statistics/static/img/statistics_v4.png'),
					'layout_5' => fw_get_template_customizations_directory_uri('/extensions/shortcodes/shortcodes/statistics/static/img/statistics_v5.png'),
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
						'col-md-12' => esc_html__('1 Column', 'nex'),
						'col-md-6' => esc_html__('2 Columns', 'nex'),
						'col-md-4' => esc_html__('3 Columns', 'nex'),
						'col-md-3' => esc_html__('4 Columns', 'nex'),
					)
				),
				'statistics' => array(
					'type' => 'addable-popup',
					'label' => esc_html__('statistics', 'nex'),
					'desc'  => esc_html__('Add your statistics here. Each will be a block.', 'nex'),
					'template' => '{{- title }}',
					'popup-title' => null,
					'size' => 'medium', // small, medium, large
					'add-button-text' => esc_html__('Add statistics block', 'nex'),
					'sortable' => true,
					'popup-options' => array(
						'icon' => array(
							'type'  => 'icon-v2',
							'preview_size'  => 'medium',
							'modal_size'    => 'medium',
							'label'         => esc_html__('Statistics icon', 'nex'),
							'desc'          => esc_html__('Icon of the statistics block', 'nex'),
						),
						'title' => array(
							'type'  => 'text',
							'label' => esc_html__('Statistics Title', 'nex'),
							'desc'  => esc_html__('Title of your statistics block', 'nex')
						),
						'data' => array(
							'type'  => 'textarea',
							'label' => esc_html__('Statistics data', 'nex'),
							'desc'  => esc_html__('Description of your statistics block', 'nex')
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
				'statistics' => array(
					'type' => 'addable-popup',
					'label' => esc_html__('statistics', 'nex'),
					'desc'  => esc_html__('Add your statistics here. Each will be a block.', 'nex'),
					'template' => '{{- title }}',
					'popup-title' => null,
					'size' => 'medium', // small, medium, large
					'add-button-text' => esc_html__('Add statistics block', 'nex'),
					'sortable' => true,
					'popup-options' => array(
						'title' => array(
							'type'  => 'text',
							'label' => esc_html__('Statistics Title', 'nex'),
							'desc'  => esc_html__('Title of your statistics block', 'nex')
						),
						'data' => array(
							'type'  => 'textarea',
							'label' => esc_html__('Statistics data', 'nex'),
							'desc'  => esc_html__('Description of your statistics block', 'nex')
						),
					)
				)
			),
			'layout_3' => array(
				'cols'   => array(
					'type'  => 'select',
					'value' => 'col-md-3',
					'label' => esc_html__('Columns', 'nex'),
					'desc'  => esc_html__('Pick the number of columns', 'nex'),
					'choices' => array(
						'col-md-12' => esc_html__('1 Column', 'nex'),
						'col-md-6' => esc_html__('2 Columns', 'nex'),
						'col-md-4' => esc_html__('3 Columns', 'nex'),
						'col-md-3' => esc_html__('4 Columns', 'nex'),
					)
				),
				'statistics' => array(
					'type' => 'addable-popup',
					'label' => esc_html__('statistics', 'nex'),
					'desc'  => esc_html__('Add your statistics here. Each will be a block.', 'nex'),
					'template' => '{{- title }}',
					'popup-title' => null,
					'size' => 'medium', // small, medium, large
					'add-button-text' => esc_html__('Add statistics block', 'nex'),
					'sortable' => true,
					'popup-options' => array(
						'bg_image' => array(
							'type'  => 'upload',
							'preview_size'  => 'medium',
							'modal_size'    => 'medium',
							'label'         => esc_html__('Statistics image', 'nex'),
							'desc'          => esc_html__('Background image of the statistics block', 'nex'),
							'images_only'   => true
						),
						'bg_color' => array(
							'type'  => 'color-picker',
							'value' => '#707070',
							'label' => esc_html__('BG Color for statistics block', 'nex'),
							'desc'  => esc_html__('Color that will appear if the image was not provided', 'nex'),
						),
						'title' => array(
							'type'  => 'text',
							'label' => esc_html__('Statistics Title', 'nex'),
							'desc'  => esc_html__('Title of your statistics block', 'nex')
						),
						'data' => array(
							'type'  => 'textarea',
							'label' => esc_html__('Statistics data', 'nex'),
							'desc'  => esc_html__('Description of your statistics block', 'nex')
						),
					)
				)
			),
			'layout_4' => array(
				'cols'   => array(
					'type'  => 'select',
					'value' => 'col-md-3',
					'label' => esc_html__('Columns', 'nex'),
					'desc'  => esc_html__('Pick the number of columns', 'nex'),
					'choices' => array(
						'col-md-12' => esc_html__('1 Column', 'nex'),
						'col-md-6' => esc_html__('2 Columns', 'nex'),
						'col-md-4' => esc_html__('3 Columns', 'nex'),
						'col-md-3' => esc_html__('4 Columns', 'nex'),
					)
				),
				'statistics' => array(
					'type' => 'addable-popup',
					'label' => esc_html__('statistics', 'nex'),
					'desc'  => esc_html__('Add your statistics here. Each will be a block.', 'nex'),
					'template' => '{{- title }}',
					'popup-title' => null,
					'size' => 'medium', // small, medium, large
					'add-button-text' => esc_html__('Add statistics block', 'nex'),
					'sortable' => true,
					'popup-options' => array(
                        'icon' => array(
                            'type'  => 'icon-v2',
                            'preview_size'  => 'medium',
                            'modal_size'    => 'medium',
                            'label'         => esc_html__('Statistics icon', 'nex'),
                            'desc'          => esc_html__('Icon of the statistics block', 'nex'),
                        ),
						'title' => array(
							'type'  => 'text',
							'label' => esc_html__('Statistics Title', 'nex'),
							'desc'  => esc_html__('Title of your statistics block', 'nex')
						),
						'data' => array(
							'type'  => 'textarea',
							'label' => esc_html__('Statistics data', 'nex'),
							'desc'  => esc_html__('Description of your statistics block', 'nex')
						),
					)
				)
			),
			'layout_5' => array(
				'cols'   => array(
					'type'  => 'select',
					'value' => 'col-md-3',
					'label' => esc_html__('Columns', 'nex'),
					'desc'  => esc_html__('Pick the number of columns', 'nex'),
					'choices' => array(
						'col-md-12' => esc_html__('1 Column', 'nex'),
						'col-md-6' => esc_html__('2 Columns', 'nex'),
						'col-md-4' => esc_html__('3 Columns', 'nex'),
						'col-md-3' => esc_html__('4 Columns', 'nex'),
					)
				),
				'statistics' => array(
					'type' => 'addable-popup',
					'label' => esc_html__('statistics', 'nex'),
					'desc'  => esc_html__('Add your statistics here. Each will be a block.', 'nex'),
					'template' => '{{- title }}',
					'popup-title' => null,
					'size' => 'medium', // small, medium, large
					'add-button-text' => esc_html__('Add statistics block', 'nex'),
					'sortable' => true,
					'popup-options' => array(
                        'icon' => array(
                            'type'  => 'icon-v2',
                            'preview_size'  => 'medium',
                            'modal_size'    => 'medium',
                            'label'         => esc_html__('Statistics icon', 'nex'),
                            'desc'          => esc_html__('Icon of the statistics block', 'nex'),
                        ),
						'title' => array(
							'type'  => 'text',
							'label' => esc_html__('Statistics Title', 'nex'),
							'desc'  => esc_html__('Title of your statistics block', 'nex')
						),
                        'data' => array(
                            'type'  => 'textarea',
                            'label' => esc_html__('Statistics data', 'nex'),
                            'desc'  => esc_html__('Description of your statistics block', 'nex')
                        ),
					)
				)
			)
		)
	)
);