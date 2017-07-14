<?php if ( ! defined( 'ABSPATH' ) ) { die( 'Direct access forbidden.' ); }

$breadcrumb_options = nex_get_theme_breadcrumb_settings();

$options = array(
    'portfolio_box' => array(
        'type' => 'box',
        'title' => esc_html__('Portfolio Options', 'nex'),
        'options' => array(
            'proj_info'  => array(
                'type'  => 'addable-box',
                'label' => esc_html__('Project Info', 'nex'),
                'desc'  => esc_html__('Add info of the current portfolio/project item', 'nex'),
                'help'  => esc_html__('Will be displayed in rows on the single portfolio page.', 'nex'),
                'box-options' => array(
                    'title' => array(
                        'type'  => 'text',
                        'label' => esc_html__('Title', 'nex'),
                        'desc'  => esc_html__('Project info title', 'nex'),
                        'help'  => esc_html__('Example: Client.', 'nex'),
                    ),
                    'value' => array(
                        'type'  => 'text',
                        'label' => esc_html__('Value', 'nex'),
                        'desc'  => esc_html__('Project info text that corresponds to the title', 'nex'),
                        'help'  => esc_html__('Example: X-MAS Enterprises.', 'nex'),
                    ),
                ),
                'template' => '{{- title }}', // box title
                'limit' => 0, // limit the number of boxes that can be added
                'add-button-text' => esc_html__('Add Project Info', 'nex'),
                'sortable' => true,
            ),
            'proj_link_url' => array(
	            'type'  => 'text',
	            'label' => esc_html__('Link URL', 'nex'),
	            'desc'  => esc_html__('Link of the project', 'nex')
            ),
            'proj_link_label' => array(
	            'type'  => 'text',
	            'label' => esc_html__('Link Label', 'nex'),
	            'desc'  => esc_html__('Text on the link button', 'nex')
            ),
            'breadcrumbs' => $breadcrumb_options
        ),
    ),
);