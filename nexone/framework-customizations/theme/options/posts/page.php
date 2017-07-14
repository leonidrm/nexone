<?php if (!defined( 'FW' )) die('Forbidden');
$breadcrumb_options = nex_get_theme_breadcrumb_settings();
$options = array(
    'page_box' => array(
        'type' => 'box',
        'title' => esc_html__('Page Options', 'nex'),
        'options' => array(
	        'sidebar_pos' => array(
		        'type'  => 'image-picker',
		        'value' => 'full_width',
		        'label' => esc_html__('Sidebar position', 'nex'),
		        'desc'  => esc_html__('Choose between the layout types available', 'nex'),
		        'choices' => array(
			        'full_width' => fw_get_template_customizations_directory_uri('/theme/options/static/img/sidewide.png'),
			        'left'       => fw_get_template_customizations_directory_uri('/theme/options/static/img/left_sidebar.png'),
			        'right'      => fw_get_template_customizations_directory_uri('/theme/options/static/img/right_sidebar.png'),
		        ),
	        ),
	        'layout_type' => array(
		        'type'  => 'image-picker',
		        'value' => 'full',
		        'label' => esc_html__('Layout Type', 'nex'),
		        'desc'  => esc_html__('Choose between: Full Width layout and Boxed layout', 'nex'),
		        'help'  => esc_html__('By default: full width, but if you select container mode you can add bg image', 'nex'),
		        'choices' => array(
			        'full' => fw_get_template_customizations_directory_uri('/theme/options/static/img/sidewide.png'),
			        'boxed' => fw_get_template_customizations_directory_uri('/theme/options/static/img/sideboxed.png'),
		        ),
	        ),
            'header_on_top' => array(
                'type'  => 'image-picker',
                'value' => 'nex-header',
                'label' => esc_html__('Show Header on Top', 'nex'),
                'desc'  => esc_html__('Displays the site logo and main navigation menu on top of breadcrumb or hero image', 'nex'),
                'choices' => array(
                    'nex-header'    => fw_get_template_customizations_directory_uri('/theme/options/static/img/header.png'),
                    'nex-header-top'=> fw_get_template_customizations_directory_uri('/theme/options/static/img/header-on-top.png'),
                ),
            ),
	        'sticky_header' => array(
		        'type'  => 'switch',
		        'value' => 'off',
		        'label' => esc_html__('Sticky Header', 'nex'),
		        'desc'  => esc_html__('Make the header stick to the top while scrolling', 'nex'),
		        'left-choice' => array(
			        'value' => 'off',
			        'label' => esc_html__('Off', 'nex'),
		        ),
		        'right-choice' => array(
			        'value' => 'on',
			        'label' => esc_html__('On', 'nex'),
		        ),
	        ),
        )
    )
);

if(!empty($breadcrumb_options))
    $options['page_box']['options']['breadcrumbs'] = $breadcrumb_options;