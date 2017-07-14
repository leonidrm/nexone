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
            'layout_1' => fw_get_template_customizations_directory_uri('/extensions/shortcodes/shortcodes/gallery/static/img/gallery_v1.png'),
            'layout_2' => fw_get_template_customizations_directory_uri('/extensions/shortcodes/shortcodes/gallery/static/img/gallery_v2.png'),
        ),
    ),
    'cols'   => array(
        'type'  => 'select',
        'value' => 'col-md-3',
        'label' => esc_html__('Columns', 'nex'),
        'desc'  => esc_html__('Pick the number of columns', 'nex'),
        'choices' => array(
            'col-md-6' => esc_html__('2 Columns', 'nex'),
            'col-md-4' => esc_html__('3 Columns', 'nex'),
            'col-md-3' => esc_html__('4 Columns', 'nex'),
            'col-md-2' => esc_html__('6 Columns', 'nex'),
        )
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
    'images' => array(
        'type'  => 'multi-upload',
        'label' => esc_html__('Images', 'nex'),
        'help'  => esc_html__('Recommended size 1920x960 px', 'nex'),
        'images_only' => true,
    ),

);