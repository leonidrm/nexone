<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'layout_type' => array(
		'type'  => 'image-picker',
		'value' => 'layout_1',
		'label' => esc_html__('Layout Type', 'nex'),
		'desc'  => esc_html__('Choose between the layout types available', 'nex'),
		'help'  => esc_html__('This will modify how the section looks on frontend', 'nex'),
		'choices' => array(
			'layout_1' => fw_get_template_customizations_directory_uri('/extensions/shortcodes/shortcodes/accordion/static/img/accordion_v1.png'),
			'layout_2' => fw_get_template_customizations_directory_uri('/extensions/shortcodes/shortcodes/accordion/static/img/accordion_v2.png'),
		),
	),
	'tabs' => array(
		'type'          => 'addable-popup',
		'label'         => esc_html__( 'Tabs', 'nex' ),
		'popup-title'   => esc_html__( 'Add/Edit Tabs', 'nex' ),
		'desc'          => esc_html__( 'Create your tabs', 'nex' ),
		'template'      => '{{=tab_title}}',
		'size'          => 'medium',
		'popup-options' => array(
			'state' => array(
				'type'  => 'switch',
				'value' => 'off',
				'label' => esc_html__('Tab state', 'nex'),
				'left-choice' => array(
					'value' => 'off',
					'label' => esc_html__('Collapsed', 'nex'),
				),
				'right-choice' => array(
					'value' => 'on',
					'label' => esc_html__('Active', 'nex'),
				),
			),
			'tab_title'   => array(
				'type'  => 'text',
				'label' => esc_html__('Title', 'nex')
			),
			'tab_content' => array(
				'type'  => 'wp-editor',
				'label' => esc_html__('Content', 'nex')
			)
		)
	)
);