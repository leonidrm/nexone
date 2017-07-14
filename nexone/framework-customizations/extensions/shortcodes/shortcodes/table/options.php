<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'layout' => array(
		'type'  => 'multi-picker',
		'label' => false,
		'desc'  => false,
		'value' => array(
			'layout_type' => 'v1',
		),
		'picker' => array(
			'layout_type' => array(
				'type'  => 'image-picker',
				'value'   => 'v1',
				'label' => esc_html__('Layout Type', 'nex'),
				'desc'  => esc_html__('Choose between the layout types available', 'nex'),
				'help'  => esc_html__('Works only with pricing table styling', 'nex'),
				'choices' => array(
					'v1' => fw_get_template_customizations_directory_uri('/extensions/shortcodes/shortcodes/table/static/img/pricing_v1.png'),
					'v2' => fw_get_template_customizations_directory_uri('/extensions/shortcodes/shortcodes/table/static/img/pricing_v2.png'),
					'v3' => fw_get_template_customizations_directory_uri('/extensions/shortcodes/shortcodes/table/static/img/pricing_v3.png'),
					'v4' => fw_get_template_customizations_directory_uri('/extensions/shortcodes/shortcodes/table/static/img/pricing_v4.png'),
					'v5' => fw_get_template_customizations_directory_uri('/extensions/shortcodes/shortcodes/table/static/img/pricing_v5.png'),
					'v6' => fw_get_template_customizations_directory_uri('/extensions/shortcodes/shortcodes/table/static/img/pricing_v6.png'),
					'v7' => fw_get_template_customizations_directory_uri('/extensions/shortcodes/shortcodes/table/static/img/pricing_v7.png'),
				),
			),
		),
		'choices' => array(
			'v1' => array(),
			'v2' => array(),
			'v3' => array(),
			'v4' => array(),
			'v5' => array(),
			'v6' => array(
				'bg_image' => array(
					'type'  => 'upload',
					'label' => esc_html__('Background image', 'nex'),
					'desc'  => esc_html__('Background image for default columns', 'nex'),
					'images_only' => true,
				),
				'images' => array(
					'type' => 'addable-popup',
					'label' => esc_html__('Images', 'nex'),
					'desc'  => esc_html__('Add images to the Pricing Blocks (pricing row). They will be applied from the left to the right', 'nex'),
					'template' => '<img src="{{- image[\'url\'] }}" height="80" width="80">',
					'add-button-text' => esc_html__('Add a image', 'nex'),
					'sortable' => true,
					'popup-options' => array(
						'image' => array(
							'type'  => 'upload',
							'label' => esc_html__('Price block image', 'nex'),
							'help'  => esc_html__('Recommended size 80x80 px', 'nex'),
							'images_only' => true,
						),
					)
				)
			),
		)
	),
	'table' => array(
		'type'  => 'table',
		'label' => false,
		'desc'  => false,
	)
);