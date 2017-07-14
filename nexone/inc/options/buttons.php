<?php
return
    array(
        'type'  => 'addable-popup',
        'label' => esc_html__('Buttons', 'nex'),
        'desc'  => esc_html__('Add buttons to the section', 'nex'),
        'size'    => 'medium',
        'popup-options' => array(
            'type' => array(
                'type'  => 'image-picker',
                'value' => 'v1',
                'label' => esc_html__('Button Type', 'nex'),
                'desc'  => esc_html__('Choose between the button types available', 'nex'),
                'help'  => esc_html__('This will modify how the button looks on frontend', 'nex'),
                'choices' => array(
                    'v1' => fw_get_template_customizations_directory_uri('/extensions/shortcodes/shortcodes/buttons/static/img/button_v1.png'),
                    'v2' => fw_get_template_customizations_directory_uri('/extensions/shortcodes/shortcodes/buttons/static/img/button_v2.png'),
                    'v3' => fw_get_template_customizations_directory_uri('/extensions/shortcodes/shortcodes/buttons/static/img/button_v3.png'),
                    'v4' => fw_get_template_customizations_directory_uri('/extensions/shortcodes/shortcodes/buttons/static/img/button_v4.png'),
                    'v5' => fw_get_template_customizations_directory_uri('/extensions/shortcodes/shortcodes/buttons/static/img/button_v5.png'),
                    'v6' => fw_get_template_customizations_directory_uri('/extensions/shortcodes/shortcodes/buttons/static/img/button_v6.png'),
                ),
            ),
            'icon' => array(
	            'type'  => 'icon-v2',
	            'preview_size' => 'medium',
	            'modal_size' => 'medium',
	            'label' => esc_html__('Button icon', 'nex'),
	            'desc'  => esc_html__('Icon will appear at the left of the button', 'nex'),
            ),
            'button_label'   => array(
                'label'   => esc_html__('Button label', 'nex'),
                'desc'    => esc_html__('Text to appear in the button of the hero', 'nex'),
                'help'    => esc_html__('If empty , button will not appear', 'nex'),
                'type'    => 'text',
                'value'   => esc_html__('Button label', 'nex'),
            ),
            'button_link'   => array(
                'label'   => esc_html__('Button link', 'nex'),
                'desc'    => esc_html__('Url to which the button should be linked', 'nex'),
                'help'    => esc_html__('If empty , button will not appear', 'nex'),
                'type'    => 'text',
                'value'   => '#'
            ),
        ),
        'template' => '{{- button_label }}', // box title
        'add-button-text' => esc_html__('Add Button', 'nex'),
    );