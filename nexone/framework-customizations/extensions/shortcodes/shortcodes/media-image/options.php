<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'image'            => array(
		'type'  => 'upload',
		'label' => __( 'Choose Image', 'nex' ),
		'desc'  => __( 'Either upload a new, or choose an existing image from your media library', 'nex' )
	),
	'size'             => array(
		'type'    => 'group',
		'options' => array(
			'width'  => array(
				'type'  => 'text',
				'label' => __( 'Width', 'nex' ),
				'desc'  => __( 'Set image width', 'nex' ),
				'value' => 300
			),
			'height' => array(
				'type'  => 'text',
				'label' => __( 'Height', 'nex' ),
				'desc'  => __( 'Set image height', 'nex' ),
				'value' => 200
			)
		)
	),
	'image-link-group' => array(
		'type'    => 'group',
		'options' => array(
			'link'   => array(
				'type'  => 'text',
				'label' => __( 'Image Link', 'nex' ),
				'desc'  => __( 'Where should your image link to?', 'nex' )
			),
			'target' => array(
				'type'         => 'switch',
				'label'        => __( 'Open Link in New Window', 'nex' ),
				'desc'         => __( 'Select here if you want to open the linked page in a new window', 'nex' ),
				'right-choice' => array(
					'value' => '_blank',
					'label' => __( 'Yes', 'nex' ),
				),
				'left-choice'  => array(
					'value' => '_self',
					'label' => __( 'No', 'nex' ),
				),
			),
		)
	),
	'align' => array(
		'type'    => 'select',
		'label'   => esc_html__('Image alignment', 'nex'),
		'choices' => array(
			'nex-alignleft'  => esc_html__('Left', 'nex'),
			'nex-aligncenter' => esc_html__('Center', 'nex'),
			'nex-alignright' => esc_html__('Right', 'nex'),
		)
	),
);

