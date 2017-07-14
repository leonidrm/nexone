<?php if (!defined( 'FW' )) die('Forbidden');
$breadcrumb_options = nex_get_theme_breadcrumb_settings();
$options = array(
    'post_box' => array(
        'type' => 'box',
        'title' => esc_html__('Post Options', 'nex'),
        'options' => array(
            'sidebar_pos' => array(
                'type'  => 'image-picker',
                'value' => 'default',
                'label' => esc_html__('Sidebar position', 'nex'),
                'desc'  => esc_html__('Choose between the layout types available', 'nex'),
                'help'  => esc_html__('This choice will overwrite Default Theme Settings', 'nex'),
                'choices' => array(
                    'default'    => fw_get_template_customizations_directory_uri('/theme/options/static/img/default.png'),
                    'full_width' => fw_get_template_customizations_directory_uri('/theme/options/static/img/sidewide.png'),
                    'left'       => fw_get_template_customizations_directory_uri('/theme/options/static/img/left_sidebar.png'),
                    'right'      => fw_get_template_customizations_directory_uri('/theme/options/static/img/right_sidebar.png'),
                ),
            ),
        )
    )
);

if(!empty($breadcrumb_options))
    $options['post_box']['options']['breadcrumbs'] = $breadcrumb_options;