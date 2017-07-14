<?php
if (!defined('FW')) die('Forbidden');

$options = array(
	'services' => array(
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
					'layout_1' => fw_get_template_customizations_directory_uri('/extensions/shortcodes/shortcodes/services/static/img/services_v1.png'),
					'layout_2' => fw_get_template_customizations_directory_uri('/extensions/shortcodes/shortcodes/services/static/img/services_v2.png'),
					'layout_3' => fw_get_template_customizations_directory_uri('/extensions/shortcodes/shortcodes/services/static/img/services_v3.png'),
					'layout_4' => fw_get_template_customizations_directory_uri('/extensions/shortcodes/shortcodes/services/static/img/services_v4.png'),
					'layout_5' => fw_get_template_customizations_directory_uri('/extensions/shortcodes/shortcodes/services/static/img/services_v5.png'),
					'layout_6' => fw_get_template_customizations_directory_uri('/extensions/shortcodes/shortcodes/services/static/img/services_v6.png'),
					'layout_7' => fw_get_template_customizations_directory_uri('/extensions/shortcodes/shortcodes/services/static/img/services_v7.png'),
					'layout_8' => fw_get_template_customizations_directory_uri('/extensions/shortcodes/shortcodes/services/static/img/services_v8.png'),
					'layout_9' => fw_get_template_customizations_directory_uri('/extensions/shortcodes/shortcodes/services/static/img/services_v9.png'),
                    'layout_10' => fw_get_template_customizations_directory_uri('/extensions/shortcodes/shortcodes/services/static/img/services_v10.png'),
					'layout_11' => fw_get_template_customizations_directory_uri('/extensions/shortcodes/shortcodes/services/static/img/services_v11.png'),
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
				'services' => array(
					'type' => 'addable-popup',
					'label' => esc_html__('Services', 'nex'),
					'desc'  => esc_html__('Add your Services here. Each will be a block.', 'nex'),
					'template' => '{{- title }}',
					'popup-title' => null,
					'size' => 'large', // small, medium, large
					'add-button-text' => esc_html__('Add Services block', 'nex'),
					'sortable' => true,
					'popup-options' => array(
						'title' => array(
							'type'  => 'text',
							'label' => esc_html__('Service Title', 'nex'),
							'desc'  => esc_html__('Title of your service block', 'nex')
						),
						'descr' => array(
							'type'  => 'wp-editor',
							'label' => esc_html__('Text', 'nex'),
							'desc'  => esc_html__('Description or quote', 'nex'),
							'size' => 'small', // small, large
							'editor_height' => 300,
							'wpautop' => true,
							'editor_type' => false, // tinymce, html
						),
						'icon' => array(
							'type'  => 'icon-v2',
							'preview_size'  => 'medium',
							'modal_size'    => 'medium',
							'label'         => esc_html__('Service icon', 'nex'),
							'desc'          => esc_html__('Icon of the service block', 'nex'),
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
						'col-md-12' => esc_html__('1 Column', 'nex'),
						'col-md-6' => esc_html__('2 Columns', 'nex'),
						'col-md-4' => esc_html__('3 Columns', 'nex'),
						'col-md-3' => esc_html__('4 Columns', 'nex'),
					)
				),
				'services' => array(
					'type' => 'addable-popup',
					'label' => esc_html__('Services', 'nex'),
					'desc'  => esc_html__('Add your Services here. Each will be a block.', 'nex'),
					'template' => '{{- title }}',
					'popup-title' => null,
					'size' => 'medium', // small, medium, large
					'add-button-text' => esc_html__('Add Services block', 'nex'),
					'sortable' => true,
					'popup-options' => array(
						'title' => array(
							'type'  => 'text',
							'label' => esc_html__('Service Title', 'nex'),
							'desc'  => esc_html__('Title of your service block', 'nex')
						),
						'descr' => array(
							'type'  => 'wp-editor',
							'label' => esc_html__('Text', 'nex'),
							'desc'  => esc_html__('Description or quote', 'nex'),
							'size' => 'small', // small, large
							'editor_height' => 300,
							'wpautop' => true,
							'editor_type' => false, // tinymce, html
						),
						'icon' => array(
							'type'  => 'icon-v2',
							'preview_size'  => 'medium',
							'modal_size'    => 'medium',
							'label'         => esc_html__('Service icon', 'nex'),
							'desc'          => esc_html__('Icon of the service block', 'nex'),
						),
						'icon_pos' => array(
							'type'  => 'switch',
							'value' => 'default',
							'label' => esc_html__('Icon position', 'nex'),
							'left-choice' => array(
								'value' => 'default',
								'label' => esc_html__('Default', 'nex'),
							),
							'right-choice' => array(
								'value' => 'right',
								'label' => esc_html__('Right', 'nex'),
							),
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
				'services' => array(
					'type' => 'addable-popup',
					'label' => esc_html__('Services', 'nex'),
					'desc'  => esc_html__('Add your Services here. Each will be a block.', 'nex'),
					'template' => '{{- title }}',
					'popup-title' => null,
					'size' => 'medium', // small, medium, large
					'add-button-text' => esc_html__('Add Services block', 'nex'),
					'sortable' => true,
					'popup-options' => array(
						'title' => array(
							'type'  => 'text',
							'label' => esc_html__('Service Title', 'nex'),
							'desc'  => esc_html__('Title of your service block', 'nex')
						),
						'descr' => array(
							'type'  => 'wp-editor',
							'label' => esc_html__('Text', 'nex'),
							'desc'  => esc_html__('Description or quote', 'nex'),
							'size' => 'small', // small, large
							'editor_height' => 300,
							'wpautop' => true,
							'editor_type' => false, // tinymce, html
						),
						'icon' => array(
							'type'  => 'icon-v2',
							'preview_size'  => 'medium',
							'modal_size'    => 'medium',
							'label'         => esc_html__('Service icon', 'nex'),
							'desc'          => esc_html__('Icon of the service block', 'nex'),
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
				'services' => array(
					'type' => 'addable-popup',
					'label' => esc_html__('Services', 'nex'),
					'desc'  => esc_html__('Add your Services here. Each will be a block.', 'nex'),
					'template' => '{{- title }}',
					'popup-title' => null,
					'size' => 'medium', // small, medium, large
					'add-button-text' => esc_html__('Add Services block', 'nex'),
					'sortable' => true,
					'popup-options' => array(
						'title' => array(
							'type'  => 'text',
							'label' => esc_html__('Service Title', 'nex'),
							'desc'  => esc_html__('Title of your service block', 'nex')
						),
						'descr' => array(
							'type'  => 'wp-editor',
							'label' => esc_html__('Text', 'nex'),
							'desc'  => esc_html__('Description or quote', 'nex'),
							'size' => 'small', // small, large
							'editor_height' => 300,
							'wpautop' => true,
							'editor_type' => false, // tinymce, html
						),
						'icon' => array(
							'type'  => 'icon-v2',
							'preview_size'  => 'medium',
							'modal_size'    => 'medium',
							'label'         => esc_html__('Service icon', 'nex'),
							'desc'          => esc_html__('Icon of the service block', 'nex'),
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
				'services' => array(
					'type' => 'addable-popup',
					'label' => esc_html__('Services', 'nex'),
					'desc'  => esc_html__('Add your Services here. Each will be a block.', 'nex'),
					'template' => '{{- title }}',
					'popup-title' => null,
					'size' => 'medium', // small, medium, large
					'add-button-text' => esc_html__('Add Services block', 'nex'),
					'sortable' => true,
					'popup-options' => array(
						'title' => array(
							'type'  => 'text',
							'label' => esc_html__('Service Title', 'nex'),
							'desc'  => esc_html__('Title of your service block', 'nex')
						),
						'descr' => array(
							'type'  => 'wp-editor',
							'label' => esc_html__('Text', 'nex'),
							'desc'  => esc_html__('Description or quote', 'nex'),
							'size' => 'small', // small, large
							'editor_height' => 300,
							'wpautop' => true,
							'editor_type' => false, // tinymce, html
						),
						'link' => array(
							'type'  => 'text',
							'label' => esc_html__('Button Link', 'nex'),
							'desc'  => esc_html__('If left blank, the button will not be displayed', 'nex')
						),
						'label' => array(
							'type'  => 'text',
							'value' => esc_html__('View Study','nex'),
							'label' => esc_html__('Button Label', 'nex'),
							'desc'  => esc_html__('Button Label', 'nex')
						),
					)
				)
			),
			'layout_6' => array(
				'services' => array(
					'type' => 'addable-popup',
					'label' => esc_html__('Services', 'nex'),
					'desc'  => esc_html__('Add your Services here. Each will be a block.', 'nex'),
					'template' => '{{- title }}',
					'popup-title' => null,
					'size' => 'medium', // small, medium, large
					'add-button-text' => esc_html__('Add Services block', 'nex'),
					'sortable' => true,
					'popup-options' => array(
						'icon' => array(
							'type'  => 'icon-v2',
							'preview_size'  => 'medium',
							'modal_size'    => 'medium',
							'label'         => esc_html__('Service icon', 'nex'),
							'desc'          => esc_html__('Icon of the service block', 'nex'),
						),
						'title' => array(
							'type'  => 'text',
							'label' => esc_html__('Service Title', 'nex'),
							'desc'  => esc_html__('Title of your service block', 'nex')
						),
						'descr' => array(
							'type'  => 'wp-editor',
							'label' => esc_html__('Text', 'nex'),
							'desc'  => esc_html__('Description or quote', 'nex'),
							'size' => 'small', // small, large
							'editor_height' => 300,
							'wpautop' => true,
							'editor_type' => false, // tinymce, html
						),
						'link' => array(
							'type'  => 'text',
							'label' => esc_html__('Button Link', 'nex'),
							'desc'  => esc_html__('If left blank, the button will not be displayed', 'nex')
						),
						'label' => array(
							'type'  => 'text',
							'value' => esc_html__('View Study','nex'),
							'label' => esc_html__('Button Label', 'nex'),
							'desc'  => esc_html__('Button Label', 'nex')
						),
					)
				)
			),
			'layout_7' => array(
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
				'services' => array(
					'type' => 'addable-popup',
					'label' => esc_html__('Services', 'nex'),
					'desc'  => esc_html__('Add your Services here. Each will be a block.', 'nex'),
					'template' => '{{- title }}',
					'popup-title' => null,
					'size' => 'medium', // small, medium, large
					'add-button-text' => esc_html__('Add Services block', 'nex'),
					'sortable' => true,
					'popup-options' => array(
						'icon' => array(
							'type'  => 'icon-v2',
							'preview_size'  => 'medium',
							'modal_size'    => 'medium',
							'label'         => esc_html__('Service icon', 'nex'),
							'desc'          => esc_html__('Icon of the service block', 'nex'),
						),
						'title' => array(
							'type'  => 'text',
							'label' => esc_html__('Service Title', 'nex'),
							'desc'  => esc_html__('Title of your service block', 'nex')
						),
						'descr' => array(
							'type'  => 'wp-editor',
							'label' => esc_html__('Text', 'nex'),
							'desc'  => esc_html__('Description or quote', 'nex'),
							'size' => 'small', // small, large
							'editor_height' => 300,
							'wpautop' => true,
							'editor_type' => false, // tinymce, html
						)
					)
				)
			),
			'layout_8' => array(
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
				'services' => array(
					'type' => 'addable-popup',
					'label' => esc_html__('Services', 'nex'),
					'desc'  => esc_html__('Add your Services here. Each will be a block.', 'nex'),
					'template' => '{{- title }}',
					'popup-title' => null,
					'size' => 'medium', // small, medium, large
					'add-button-text' => esc_html__('Add Services block', 'nex'),
					'sortable' => true,
					'popup-options' => array(
						'icon' => array(
							'type'  => 'icon-v2',
							'preview_size'  => 'medium',
							'modal_size'    => 'medium',
							'label'         => esc_html__('Service icon', 'nex'),
							'desc'          => esc_html__('Icon of the service block', 'nex'),
						),
						'title' => array(
							'type'  => 'text',
							'label' => esc_html__('Service Title', 'nex'),
							'desc'  => esc_html__('Title of your service block', 'nex')
						),
						'descr' => array(
							'type'  => 'wp-editor',
							'label' => esc_html__('Text', 'nex'),
							'desc'  => esc_html__('Description or quote', 'nex'),
							'size' => 'small', // small, large
							'editor_height' => 300,
							'wpautop' => true,
							'editor_type' => false, // tinymce, html
						)
					)
				)
			),
			'layout_9' => array(
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
				'services' => array(
					'type' => 'addable-popup',
					'label' => esc_html__('Services', 'nex'),
					'desc'  => esc_html__('Add your Services here. Each will be a block.', 'nex'),
					'template' => '{{- title }}',
					'popup-title' => null,
					'size' => 'medium', // small, medium, large
					'add-button-text' => esc_html__('Add Services block', 'nex'),
					'sortable' => true,
					'popup-options' => array(
						'icon' => array(
							'type'  => 'icon-v2',
							'preview_size'  => 'medium',
							'modal_size'    => 'medium',
							'label'         => esc_html__('Service icon', 'nex'),
							'desc'          => esc_html__('Icon of the service block', 'nex'),
						),
						'title' => array(
							'type'  => 'text',
							'label' => esc_html__('Service Title', 'nex'),
							'desc'  => esc_html__('Title of your service block', 'nex')
						),
						'descr' => array(
							'type'  => 'wp-editor',
							'label' => esc_html__('Text', 'nex'),
							'desc'  => esc_html__('Description or quote', 'nex'),
							'size' => 'small', // small, large
							'editor_height' => 300,
							'wpautop' => true,
							'editor_type' => false, // tinymce, html
						),
						'link' => array(
							'type'  => 'text',
							'label' => esc_html__('Button Link', 'nex'),
							'desc'  => esc_html__('If left blank, the button will not be displayed', 'nex')
						),
						'label' => array(
							'type'  => 'text',
							'value' => esc_html__('View Study','nex'),
							'label' => esc_html__('Button Label', 'nex'),
							'desc'  => esc_html__('Button Label', 'nex')
						),
					)
				)
			),
            'layout_10' => array(
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
                'services' => array(
                    'type' => 'addable-popup',
                    'label' => esc_html__('Services', 'nex'),
                    'desc'  => esc_html__('Add your Services here. Each will be a block.', 'nex'),
                    'template' => '{{- title }}',
                    'popup-title' => null,
                    'size' => 'medium', // small, medium, large
                    'add-button-text' => esc_html__('Add Services block', 'nex'),
                    'sortable' => true,
                    'popup-options' => array(
                        'title' => array(
                            'type'  => 'text',
                            'label' => esc_html__('Service Title', 'nex'),
                            'desc'  => esc_html__('Title of your service block', 'nex')
                        ),
                        'descr' => array(
							'type'  => 'wp-editor',
							'label' => esc_html__('Text', 'nex'),
							'desc'  => esc_html__('Description or quote', 'nex'),
							'size' => 'small', // small, large
							'editor_height' => 300,
							'wpautop' => true,
							'editor_type' => false, // tinymce, html
						),
                        'icon' => array(
                            'type'  => 'icon-v2',
                            'preview_size'  => 'medium',
                            'modal_size'    => 'medium',
                            'label'         => esc_html__('Service icon', 'nex'),
                            'desc'          => esc_html__('Icon of the service block', 'nex'),
                        ),
                    )
                )
            ),
			'layout_11' => array(
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
				'services' => array(
					'type' => 'addable-popup',
					'label' => esc_html__('Services', 'nex'),
					'desc'  => esc_html__('Add your Services here. Each will be a block.', 'nex'),
					'template' => '{{- title }}',
					'popup-title' => null,
					'size' => 'large', // small, medium, large
					'add-button-text' => esc_html__('Add Services block', 'nex'),
					'sortable' => true,
					'popup-options' => array(
						'image' => array(
							'type'  => 'upload',
							'label' => esc_html__('Service image', 'nex'),
							'help'  => esc_html__('Recommended size 360x240 px', 'nex'),
							'images_only' => true,
						),
						'title' => array(
							'type'  => 'text',
							'label' => esc_html__('Service Title', 'nex'),
							'desc'  => esc_html__('Title of your service block', 'nex')
						),
						'descr' => array(
							'type'  => 'wp-editor',
							'label' => esc_html__('Text', 'nex'),
							'desc'  => esc_html__('Description or quote', 'nex'),
							'size' => 'small', // small, large
							'editor_height' => 300,
							'wpautop' => true,
							'editor_type' => false, // tinymce, html
						),
						'footer_right' => array(
							'type' => 'box',
							'title' => esc_html__('Footer right', 'nex'),
							'options' => array(
								'data_right' => array(
									'label' => esc_html__('Title', 'nex'),
									'type' => 'text',
								),
								'icon_right' => array(
									'type'  => 'icon-v2',
									'preview_size' => 'medium',
									'modal_size' => 'medium',
									'label' => esc_html__('Social icon', 'nex'),
									'desc'  => esc_html__('Icon of the social profile', 'nex'),
								)
							)
						),
						'footer_left' => array(
							'type' => 'box',
							'title' => esc_html__('Footer left', 'nex'),
							'options' => array(
								'data_left' => array(
									'label' => esc_html__('Title', 'nex'),
									'type' => 'text',
								),
								'icon_left' => array(
									'type'  => 'icon-v2',
									'preview_size' => 'medium',
									'modal_size' => 'medium',
									'label' => esc_html__('Social icon', 'nex'),
									'desc'  => esc_html__('Icon of the social profile', 'nex'),
								)
							)
						),
					)
				)
			),
		)
	)
);