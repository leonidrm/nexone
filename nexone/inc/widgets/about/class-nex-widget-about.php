<?php if ( ! defined( 'ABSPATH' ) ) {
    die( 'Direct access forbidden.' );
}

if ( defined( 'FW' ) ) {
    class Nex_Widget_About extends WP_Widget {
     
        /**
         * Widget constructor.
         */
        private $options;
        private $prefix;

        function __construct() {
     
            parent::__construct(
                NEX_THEME_SLUG . '_about_widget',
                esc_html__('['.ucfirst(NEX_THEME_SLUG).'] About','nex'),
                array(
                    'description' => esc_html__('Displays about info, logo and social icons', 'nex'),
                    'classname' => 'nex-widget-vx-aboutus',
                )
            );
            
            //Create our options by using Unyson option types
            $this->options = array(
                'title' => array(
                    'type'  => 'text',
                    'label' => esc_html__('Title', 'nex'),
                ),
                'logo_image' => array(
                    'type'  => 'upload',
                    'label' => esc_html__('Logo Image', 'nex'),
                    'desc'  => esc_html__('Logo of your website that will appear in header of each page', 'nex'),
                    'help'  => esc_html__('Recommended size 201x45 px', 'nex'),
                    'images_only' => true,
                ),
                'logo_text' => array(
                    'type'  => 'text',
                    'label' => esc_html__('Logo Text', 'nex'),
                    'desc'  => esc_html__('Logo in text format.', 'nex'),
                    'help'  => esc_html__('Will be used only if Logo Image is empty.', 'nex'),
                ),
                'text' => array(
                    'type'  => 'wp-editor',
                    'label' => esc_html__('About Info Text', 'nex'),
                    'help'  => esc_html__('Help tip', 'nex'),
                    'size' => 'small', // small, large
                    'editor_height' => 100,
                    'wpautop' => true,
                    'editor_type' => false, // tinymce, html
                ),
                'socials' => array(
	                'type'         => 'switch',
	                'label'        => __( 'Show socials?', 'nex' ),
	                'right-choice' => array(
		                'value' => true,
		                'label' => __( 'Yes', 'nex' ),
	                ),
	                'left-choice'  => array(
		                'value' => false,
		                'label' => __( 'No', 'nex' ),
	                ),
                ),
                'info_fields' => array(
                    'type' => 'addable-box',
                    'label' => esc_html__('Contact Info', 'nex'),
                    'desc'  => esc_html__('Add the info with related icon.', 'nex'),
                    'template' => '{{- label }}',
                    'add-button-text' => esc_html__('Add info', 'nex'),
                    'sortable' => true,
                    'box-options' => array(
                        'label' => array(
                            'type'  => 'text',
                            'label' => esc_html__('Info.', 'nex'),
                        ),
                        'icon' => array(
                            'type'  => 'icon',
                            'label' => esc_html__('Icon', 'nex'),
                        )
                    )
                )
            );
            $this->prefix = NEX_THEME_SLUG;
        }
     
        function widget($args, $instance) {
            extract($args);
            extract($instance);
            $title = apply_filters('widget_title', $title, $instance, $this->id_base);
            include( get_theme_file_path( 'inc/widgets/about/views/widget.php' ));

        }
     
        function update( $new_instance, $old_instance ) {
            return fw_get_options_values_from_input(
                $this->options,
                FW_Request::POST(fw_html_attr_name_to_array_multi_key($this->get_field_name($this->prefix)), array())
            );
        }
     
        function form( $values ) {
     
            $prefix = $this->get_field_id($this->prefix); // Get unique prefix, preventing dupplicated key
            $id = 'fw-widget-options-'. $prefix;
     
            // Print our options
            echo '<div class="fw-force-xs fw-theme-admin-widget-wrap" id="'. esc_attr($id) .'">';
            echo fw()->backend->render_options($this->options, $values, array(
                'id_prefix' => $prefix .'-',
                'name_prefix' => $this->get_field_name($this->prefix),
            ));
            echo '</div>';

            return $values;
        }
    }
}