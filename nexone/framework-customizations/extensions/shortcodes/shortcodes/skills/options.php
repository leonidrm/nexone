<?php
if (!defined('FW')) die('Forbidden');
$options = array(
	'skills' => array(
		'type'  => 'multi-picker',
		'label' => false,
		'desc'  => false,
		'value' => array(
			'layout_type' => 'layout_1',
		),
		'picker' => array(
			'layout_type' => array(
				'type'  => 'image-picker',
				'value' => 'layout_2',
				'label' => esc_html__('Layout Type', 'nex'),
				'desc'  => esc_html__('Choose between the layout types available', 'nex'),
				'help'  => esc_html__('This will modify how the section looks on frontend', 'nex'),
				'choices' => array(
					'layout_1' => fw_get_template_customizations_directory_uri('/extensions/shortcodes/shortcodes/skills/static/img/skills_v1.png'),
					'layout_2' => fw_get_template_customizations_directory_uri('/extensions/shortcodes/shortcodes/skills/static/img/skills_v2.png'),
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
				'skills' => array(
					'type' => 'addable-popup',
					'label' => esc_html__('Skills', 'nex'),
					'desc'  => esc_html__('Add your skills here. Each will be a line block.', 'nex'),
					'template' => '{{- title }}',
					'popup-title' => null,
					'size' => 'small', // small, medium, large
					'limit' => 0, // limit the number of popup`s that can be added
					'add-button-text' => esc_html__('Add a Skill block', 'nex'),
					'sortable' => true,
					'popup-options' => array(
						'title' => array(
							'label' => esc_html__('Skill Title', 'nex'),
							'type' => 'text',
							'value' => 'Demo stat title',
							'desc' => esc_html__('Title of your skill block', 'nex')
						),
						'percentage' => array(
							'label' => esc_html__('Skill percentage', 'nex'),
							'type' => 'text',
							'value' => '85',
							'desc' => esc_html__('Value of your skill. Ex: 85%', 'nex')
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
				'skills' => array(
					'type' => 'addable-popup',
					'label' => esc_html__('Skills', 'nex'),
					'desc'  => esc_html__('Add your skills here. Each will be a line block.', 'nex'),
					'template' => '{{- title }}',
					'popup-title' => null,
					'size' => 'small', // small, medium, large
					'limit' => 0, // limit the number of popup`s that can be added
					'add-button-text' => esc_html__('Add a Skill block', 'nex'),
					'sortable' => true,
					'popup-options' => array(
						'title' => array(
							'label' => esc_html__('Skill Title', 'nex'),
							'type' => 'text',
							'value' => 'Demo stat title',
							'desc' => esc_html__('Title of your skill block', 'nex')
						),
						'subtitle' => array(
							'label' => esc_html__('Skill subtitle', 'nex'),
							'type' => 'text',
							'value' => 'Demo stat subtitle',
							'desc' => esc_html__('Subtitle of your skill block', 'nex')
						),
						'desc' => array(
							'label' => esc_html__('Skill description', 'nex'),
							'type' => 'text',
							'value' => 'Demo stat description',
							'desc' => esc_html__('Describe your skill block', 'nex')
						),
						'percentage' => array(
							'label' => esc_html__('Skill percentage', 'nex'),
							'type' => 'text',
							'value' => '85',
							'desc' => esc_html__('Value of your skill. Ex: 85%', 'nex')
						),
					)
				)
			)
		)
	)
);