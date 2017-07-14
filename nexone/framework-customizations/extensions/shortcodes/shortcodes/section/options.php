<?php if (!defined('FW')) {
	die('Forbidden');
}

$options = array(
	'is_fullwidth' => array(
		'label'        => esc_html__('Full Width', 'nex'),
		'type'         => 'switch',
	),
	'background' => array(
		'type'  => 'multi-picker',
		'label' => false,
		'desc'  => false,
		'value' => array(
			'background_type' => 'no_background',
		),
		'picker' => array(
			'background_type' => array(
				'type'  => 'select',
				'value' => 'no_background',
				'label' => esc_html__('Background type', 'nex'),
				'choices' => array(
					'no_background'    => esc_html__('Without Background', 'nex'),
					'background_color' => esc_html__('Background Color', 'nex'),
					'background_image' => esc_html__('Background Image', 'nex'),
					'background_video' => esc_html__('Background Video', 'nex'),
				),
			),
		),
		'choices' => array(
			'no_background' => array(

			),
			'background_color' => array(
				'bg_color' => array(
					'type'  => 'color-picker',
					'value' => '',
					'label' => esc_html__('BG Color', 'nex'),
					'help'  => esc_html__('Must be empty to enable gradient.', 'nex'),
				),
				'bg_gradient' => array(
					'type'  => 'gradient',
					/*'value' => array(
						'primary'   => '#FF0000',
						'secondary' => '#0000FF',
					),*/
				    'label' => esc_html__('BG Color Gradient', 'nex'),
					'help'  => esc_html__('Will be applied if BG Color is empty.', 'nex'),
				)
			),
			'background_image' => array(
				'bg_image' => array(
					'type'  => 'background-image',
					'label' => esc_html__('BG Image', 'nex'),
					'images_only' => true,
				),
				'bg_image_filter' => array(
					'type'  => 'rgba-color-picker',
					'value' => '',
					'label' => esc_html__('RGBA Image Filter', 'nex'),
				),
				'bg_size' => array(
					'label'        => esc_html__('BG Image size', 'nex'),
					'type'         => 'switch',
					'value'        => 'on',
					'left-choice' => array(
						'value' => 'on',
						'label' => esc_html__('Cover', 'nex'),
					),
					'right-choice' => array(
						'value' => 'off',
						'label' => esc_html__('Repeat', 'nex'),
					),
				),
			),
			'background_video' => array(
				'bg_video' => array(
					'label' => esc_html__('Background Video', 'nex'),
					'desc'  => esc_html__('Insert the Video URL to embed it', 'nex'),
					'type'  => 'text',
				),
			),
		)
	),
    'borders' => array(
        'type'  => 'multi-picker',
        'label' => false,
        'desc'  => false,
        'value' => array(
            'border_type' => 'no_border',
        ),
        'picker' => array(
            'border_type' => array(
                'type'         => 'switch',
                'value'        => 'off',
                'label'        => esc_html__( 'Show borders (Top/Bottom)', 'nex' ),
                'desc'         => esc_html__( 'Switch it on to show section borders', 'nex' ),
                'right-choice' => array(
                    'value' => 'on',
                    'label' => esc_html__( 'Yes', 'nex' ),
                ),
                'left-choice'  => array(
                    'value' => 'off',
                    'label' => esc_html__( 'No', 'nex' ),
                ),
            ),
        ),
        'choices' => array(
            'off' => array(

            ),
            'on' => array(
                'bd_top_size' => array(
                    'type'  => 'slider',
                    'value' => 0,
                    'properties' => array(
                        'min' => 0,
                        'max' => 10,
                        'step' => 1, // Set slider step. Always > 0. Could be fractional.
                    ),
                    'label' => esc_html__('Top border size', 'nex'),
                    'help'  => esc_html__('Size in pixels', 'nex'),
                ),
                'bd_top_color' => array(
                    'type'  => 'color-picker',
                    'value' => '#727272',
                    'label' => esc_html__('Border top color', 'nex'),
                    'help'  => esc_html__('Choose a color for the top border', 'nex'),
                ),
                'bd_bottom_size' => array(
                    'type'  => 'slider',
                    'value' => 0,
                    'properties' => array(
                        'min' => 0,
                        'max' => 10,
                        'step' => 1, // Set slider step. Always > 0. Could be fractional.
                    ),
                    'label' => esc_html__('Bottom border size', 'nex'),
                    'help'  => esc_html__('Size in pixels', 'nex'),
                ),
                'bd_bottom_color' => array(
                    'type'  => 'color-picker',
                    'value' => '#727272',
                    'label' => esc_html__('Border bottom color', 'nex'),
                    'help'  => esc_html__('Choose a color for the bottom border', 'nex'),
                )
            )
        )
    ),
	'section_id' => array(
		'label' => esc_html__('Section ID', 'nex'),
		'desc'  => esc_html__('Give this section an ID to be pointed by CSS or href tag', 'nex'),
        'type'  => 'text',
	),
	'padding_top' => array(
		'label' => esc_html__('Padding Top', 'nex'),
		'desc'  => esc_html__('Add space above the section content in px. Default 100. Ex: 90', 'nex'),
        'type'  => 'slider',
        'value' => 100,
        'properties' => array(
            'min'  => 0,
            'max'  => 200,
            'step' => 1, // Set slider step. Always > 0. Could be fractional.
        ),
	),
	'padding_bottom' => array(
		'label' => esc_html__('Padding Bottom', 'nex'),
		'desc'  => esc_html__('Add space bellow the section content in px. Default 70. Ex: 90', 'nex'),
        'type'  => 'slider',
        'value' => 60,
        'properties' => array(
            'min'  => 0,
            'max'  => 200,
            'step' => 1, // Set slider step. Always > 0. Could be fractional.
        ),
	),
	'padding_left' => array(
		'label' => esc_html__('Padding Left', 'nex'),
		'desc'  => esc_html__('Add space at the left of the section content in px. Default 0. Ex: 90', 'nex'),
		'type'  => 'slider',
		'value' => 0,
		'properties' => array(
			'min'  => 0,
			'max'  => 200,
			'step' => 1, // Set slider step. Always > 0. Could be fractional.
		),
	),
	'padding_right' => array(
		'label' => esc_html__('Padding Right', 'nex'),
		'desc'  => esc_html__('Add space at the right of the section content in px. Default 0. Ex: 90', 'nex'),
		'type'  => 'slider',
		'value' => 0,
		'properties' => array(
			'min'  => 0,
			'max'  => 200,
			'step' => 1, // Set slider step. Always > 0. Could be fractional.
		),
	),
	'margin_top' => array(
		'label' => esc_html__('Margin Top', 'nex'),
		'desc'  => esc_html__('Add/remove margin above the section content in px. Default 0.', 'nex'),
        'type'  => 'slider',
        'value' => 0,
        'properties' => array(
            'min'  => -200,
            'max'  => 200,
            'step' => 1, // Set slider step. Always > 0. Could be fractional.
        ),
	),
	'margin_bottom' => array(
		'label' => esc_html__('Margin Bottom', 'nex'),
		'desc'  => esc_html__('Add/remove space bellow the section content in px. Default 0.', 'nex'),
        'type'  => 'slider',
        'value' => 0,
        'properties' => array(
            'min'  => -200,
            'max'  => 200,
            'step' => 1, // Set slider step. Always > 0. Could be fractional.
        ),
	)
);