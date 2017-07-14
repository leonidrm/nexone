<?php
if (!defined('FW')) die('Forbidden');

$options = array(
	'layout_type' => array(
		'type'  => 'image-picker',
		'value' => 'layout_1',
		'label' => esc_html__('Layout Type', 'nex'),
		'desc'  => esc_html__('Choose between the layout types available', 'nex'),
		'help'  => esc_html__('This will modify how the section looks on frontend', 'nex'),
		'choices' => array(
			'layout_1' => fw_get_template_customizations_directory_uri('/extensions/portfolio/shortcodes/portfolio/static/img/portfolio_v1.png'),
			'layout_2' => fw_get_template_customizations_directory_uri('/extensions/portfolio/shortcodes/portfolio/static/img/portfolio_v2.png'),
		),
	),
	'nr' => array(
		'type'  => 'text',
		'label' => esc_html__('Number', 'nex'),
		'desc'  => esc_html__('Number of portfolios items to display', 'nex'),
		'value' => '6',
	),
	'category' => array(
		'type'  => 'text',
		'label' => esc_html__('Category', 'nex'),
		'desc'  => esc_html__('Portfolio category slugs separated by comma. Portfolios from all categories will be displayed if left blank', 'nex'),
	),
	'show_category' => array(
		'type'  => 'switch',
		'value' => 'on',
		'label' => esc_html__('Show selected category into the filter?', 'nex'),
		'left-choice' => array(
			'value' => 'on',
			'label' => esc_html__('Yes', 'nex'),
		),
		'right-choice' => array(
			'value' => 'off',
			'label' => esc_html__('No', 'nex'),
		),
	),
	'order' => array(
		'type'  => 'switch',
		'value' => 'DESC',
		'label' => esc_html__('Portfolio Order', 'nex'),
		'left-choice' => array(
			'value' => 'DESC',
			'label' => esc_html__('Descending', 'nex'),
		),
		'right-choice' => array(
			'value' => 'ASC',
			'label' => esc_html__('Ascending', 'nex'),
		),
	),
	'col_class' => array(
		'type'  => 'select',
		'value'   => 'col-md-4',
		'label' => esc_html__('Columns number', 'nex'),
		'desc'  => esc_html__('How many columns should have portfolio grid?', 'nex'),
		'choices' => array(
			'col-md-6'  => esc_html__('2 Columns', 'nex'),
			'col-md-4'  => esc_html__('3 Columns', 'nex'),
			'col-md-3'  => esc_html__('4 Columns', 'nex'),
		)
	),
	'show_filter' => array(
		'type'  => 'switch',
		'value' => 'on',
		'label' => esc_html__('Show Category Filters', 'nex'),
		'left-choice' => array(
			'value' => 'on',
			'label' => esc_html__('On', 'nex'),
		),
		'right-choice' => array(
			'value' => 'off',
			'label' => esc_html__('Off', 'nex'),
		),
	),
	'image_size' => array(
		'type'  => 'multi-picker',
		'label' => false,
		'desc'  => false,
		'value' => array(
			'img_size' => 'auto',
		),
		'picker' => array(
			'img_size' => array(
				'type'  => 'switch',
				'value' => 'auto',
				'label' => esc_html__('Thumbnails size', 'nex'),
				'desc'  => esc_html__('Choose thumbnails generation method', 'nex'),
				'left-choice' => array(
					'value' => 'auto',
					'label' => esc_html__('Auto', 'nex'),
				),
				'right-choice' => array(
					'value' => 'manual',
					'label' => esc_html__('Manual', 'nex'),
				),
			),
		),
		'choices' => array(
			'auto' => array(
			),
			'manual' => array(
				'width' => array(
					'type'  => 'text',
					'label' => esc_html__('Width', 'nex'),
					'desc'  => esc_html__('Left blank for auto width. Ex: 550', 'nex'),
				),
				'height' => array(
					'type'  => 'text',
					'label' => esc_html__('Height', 'nex'),
					'desc'  => esc_html__('Left blank for auto height. Ex: 550', 'nex'),
				),
			)
		)
	),
	'button' => array(
		'type'  => 'multi-picker',
		'label' => false,
		'desc'  => false,
		'value' => array(
			'show_button' => 'show',
		),
		'picker' => array(
			'show_button' => array(
				'type'  => 'switch',
				'value' => 'yes',
				'label' => esc_html__('Show Load More button?', 'nex'),
				'desc'  => esc_html__('Load more button will add portfolios to the grid', 'nex'),
				'left-choice' => array(
					'value' => 'yes',
					'label' => esc_html__('Yes', 'nex'),
				),
				'right-choice' => array(
					'value' => 'no',
					'label' => esc_html__('No', 'nex'),
				),
			),
		),
		'choices' => array(
			'yes' => array(
				'button_label'   => array(
					'label'   => esc_html__('Button label', 'nex'),
					'desc'    => esc_html__('Text to appear in the button of the section', 'nex'),
					'help'    => esc_html__('If empty, button will not appear', 'nex'),
					'value'   => esc_html__('Load More', 'nex'),
					'type'    => 'text'
				)
			),
			'no' => array(
			)
		)
	)
);