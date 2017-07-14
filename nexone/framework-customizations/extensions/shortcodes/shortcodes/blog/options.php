<?php
if (!defined('FW')) die('Forbidden');

$options = array(
	'layout_type' => array(
		'type'  => 'image-picker',
		'value' => 'layout_3',
		'label' => esc_html__('Layout Type', 'nex'),
		'desc'  => esc_html__('Choose between the layout types available', 'nex'),
		'help'  => esc_html__('This will modify how the section looks on frontend', 'nex'),
		'choices' => array(
			'layout_1' => fw_get_template_customizations_directory_uri('/extensions/shortcodes/shortcodes/blog/static/img/blog_v1.png'),
			'layout_2' => fw_get_template_customizations_directory_uri('/extensions/shortcodes/shortcodes/blog/static/img/blog_v2.png'),
			'layout_3' => fw_get_template_customizations_directory_uri('/extensions/shortcodes/shortcodes/blog/static/img/blog_v3.png'),
			'layout_4' => fw_get_template_customizations_directory_uri('/extensions/shortcodes/shortcodes/blog/static/img/blog_v4.png'),
			'layout_5' => fw_get_template_customizations_directory_uri('/extensions/shortcodes/shortcodes/blog/static/img/blog_v5.png'),
			'layout_6' => fw_get_template_customizations_directory_uri('/extensions/shortcodes/shortcodes/blog/static/img/blog_vx.png'),
		),
	),
	'cols'   => array(
		'type'  => 'select',
		'value' => 'col-md-6',
		'label' => esc_html__('Columns', 'nex'),
		'desc'  => esc_html__('Pick the number of columns', 'nex'),
		'choices' => array(
			'col-md-6' => esc_html__('2 Columns', 'nex'),
			'col-md-4' => esc_html__('3 Columns', 'nex'),
			'col-md-3' => esc_html__('4 Columns', 'nex'),
		)
	),
    'nr' => array(
        'type'  => 'text',
        'label' => esc_html__('Number', 'nex'),
        'desc'  => esc_html__('Number of posts to display', 'nex'),
        'value' => '2'
    ),
    'ignore_sticky' => array(
	    'type'  => 'switch',
	    'value' => 'on',
	    'label' => esc_html__('Ignore sticky post', 'nex'),
	    'left-choice' => array(
		    'value' => 'on',
		    'label' => esc_html__('Yes', 'nex'),
	    ),
	    'right-choice' => array(
		    'value' => 'off',
		    'label' => esc_html__('No', 'nex'),
	    ),
    ),
    'category' => array(
	    'type'  => 'text',
	    'label' => esc_html__('Category', 'nex'),
	    'desc'  => esc_html__('Post category slug separated by comma. Posts from all categories will be displayed if left blank', 'nex'),
    ),
);