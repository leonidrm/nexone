<?php
if (!defined('FW')) die('Forbidden');
$button_options = nex_get_options('buttons');
$options = array(
	'cta' => array(
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
					'layout_1' => fw_get_template_customizations_directory_uri('/extensions/shortcodes/shortcodes/cta/static/img/cta_v1.png'),
					'layout_2' => fw_get_template_customizations_directory_uri('/extensions/shortcodes/shortcodes/cta/static/img/cta_v2.png'),
					'layout_3' => fw_get_template_customizations_directory_uri('/extensions/shortcodes/shortcodes/cta/static/img/cta_v3.png'),
				),
			),
		),
		'choices' => array(
			'layout_1' => array(
				'text' => array(
					'type'  => 'wp-editor',
					'label' => esc_html__('Text', 'nex'),
					'desc'  => esc_html__('CTA message', 'nex'),
					'size' => 'large',
					'editor_height' => 200,
					'wpautop' => true,
					'editor_type' => false,
				),
				'buttons' => $button_options
			),
			'layout_2' => array(
				'text' => array(
					'type'  => 'wp-editor',
					'label' => esc_html__('Text', 'nex'),
					'desc'  => esc_html__('CTA message', 'nex'),
					'size' => 'large',
					'editor_height' => 200,
					'wpautop' => true,
					'editor_type' => false,
				),
				'buttons' => $button_options
			),
			'layout_3' => array(
				'image' => array(
					'type'  => 'upload',
					'label' => esc_html__('Section image', 'nex'),
					'help'  => esc_html__('Recommended size 400x250 px', 'nex'),
					'images_only' => true,
				),
				'text' => array(
					'type'  => 'wp-editor',
					'label' => esc_html__('Text', 'nex'),
					'desc'  => esc_html__('CTA message', 'nex'),
					'size' => 'large',
					'editor_height' => 200,
					'wpautop' => true,
					'editor_type' => false,
				),
				'buttons' => $button_options
			),
		)
	)
);