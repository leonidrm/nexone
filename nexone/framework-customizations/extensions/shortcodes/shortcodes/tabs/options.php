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
			'layout_1' => fw_get_template_customizations_directory_uri('/extensions/shortcodes/shortcodes/tabs/static/img/tabs_v1.png'),
			'layout_2' => fw_get_template_customizations_directory_uri('/extensions/shortcodes/shortcodes/tabs/static/img/tabs_v2.png'),
		),
	),
	'tabs' => array(
		'type'          => 'addable-popup',
		'label'         => __( 'Tabs', 'fw' ),
		'popup-title'   => __( 'Add/Edit Tab', 'fw' ),
		'desc'          => __( 'Create your tabs', 'fw' ),
		'template'      => '{{=tab_title}}',
		'popup-options' => array(
			'tab_title' => array(
				'type'  => 'text',
				'label' => __('Title', 'fw')
			),
			'tab_content' => array(
				'type'  => 'textarea',
				'label' => __('Content', 'fw')
			)
		),
	)
);