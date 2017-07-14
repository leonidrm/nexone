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
	)
);

$popup_options = array(
	'title' => array(
		'label' => esc_html__('Title/Name', 'nex'),
		'type' => 'text',
	),
	'role' => array(
		'label' => esc_html__('Role or job', 'nex'),
		'type' => 'text',
	),
	'image' => array(
		'type'  => 'upload',
		'label' => esc_html__('Photo', 'nex'),
		'help'  => esc_html__('Recommended size 125x125 px', 'nex'),
		'images_only' => true,
	),
	'text' => array(
		'type'  => 'wp-editor',
		'label' => esc_html__('Text', 'nex'),
		'desc'  => esc_html__('Description or quote', 'nex'),
		'size' => 'small', // small, large
		'editor_height' => 300,
		'wpautop' => true,
		'editor_type' => false, // tinymce, html
	)
);

$options = array(
	'testimonials' => array(
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
					'layout_1' => fw_get_template_customizations_directory_uri('/extensions/shortcodes/shortcodes/testimonials/static/img/testimonials_v1.png'),
					'layout_2' => fw_get_template_customizations_directory_uri('/extensions/shortcodes/shortcodes/testimonials/static/img/testimonials_v2.png'),
					'layout_3' => fw_get_template_customizations_directory_uri('/extensions/shortcodes/shortcodes/testimonials/static/img/testimonials_v3.png'),
					'layout_4' => fw_get_template_customizations_directory_uri('/extensions/shortcodes/shortcodes/testimonials/static/img/testimonials_v4.png'),
					'layout_5' => fw_get_template_customizations_directory_uri('/extensions/shortcodes/shortcodes/testimonials/static/img/testimonials_v5.png'),
					'layout_6' => fw_get_template_customizations_directory_uri('/extensions/shortcodes/shortcodes/testimonials/static/img/testimonials_v6.png'),
				),
			),
		),
		'choices' => array(
			'layout_1' => array(
				'cols'   => $cols,
				'testimonials' => array(
					'type' => 'addable-popup',
					'label' => esc_html__('Testimonial', 'nex'),
					'template' => '{{- title }}',
					'add-button-text' => esc_html__('Add testimonial', 'nex'),
					'size'  => 'large',
					'popup-options' => array(
						'title' => array(
							'label' => esc_html__('Title/Name', 'nex'),
							'type' => 'text',
						),
						'role' => array(
							'label' => esc_html__('Role or job', 'nex'),
							'type' => 'text',
						),
						'rating' => array(
							'type'  => 'slider',
							'value' => 5,
							'properties' => array(
								'min' => 1,
								'max' => 5,
								'step' => 1, // Set slider step. Always > 0. Could be fractional.
							),
							'label' => esc_html__('Rating', 'nex'),
						),
						'text' => array(
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
			'layout_2' => array(
				'cols'   => $cols,
				'testimonials' => array(
					'type' => 'addable-popup',
					'label' => esc_html__('Testimonial', 'nex'),
					'template' => '{{- title }}',
					'add-button-text' => esc_html__('Add testimonial', 'nex'),
					'size'  => 'large',
					'popup-options' => $popup_options
				)
			),
			'layout_3' => array(
				'cols'   => $cols,
				'testimonials' => array(
					'type' => 'addable-popup',
					'label' => esc_html__('Testimonial', 'nex'),
					'template' => '{{- title }}',
					'add-button-text' => esc_html__('Add testimonial', 'nex'),
					'size'  => 'large',
					'popup-options' => $popup_options
				)
			),
			'layout_4' => array(
				'testimonials' => array(
					'type' => 'addable-popup',
					'label' => esc_html__('Testimonial', 'nex'),
					'template' => '{{- title }}',
					'add-button-text' => esc_html__('Add testimonial', 'nex'),
					'size'  => 'large',
					'popup-options' => $popup_options
				)
			),
			'layout_5' => array(
				'testimonials' => array(
					'type' => 'addable-popup',
					'label' => esc_html__('Testimonial', 'nex'),
					'template' => '{{- title }}',
					'add-button-text' => esc_html__('Add testimonial', 'nex'),
					'popup-options' => $popup_options
				)
			),
			'layout_6' => array(
				'testimonials' => array(
					'type' => 'addable-popup',
					'label' => esc_html__('Testimonial', 'nex'),
					'template' => '{{- title }}',
					'add-button-text' => esc_html__('Add testimonial', 'nex'),
					'size'  => 'large',
					'popup-options' => $popup_options
				)
			)
		)
	)
);