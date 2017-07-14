<?php if ( ! defined( 'ABSPATH' ) ) {
    die( 'Direct access forbidden.' );
}

if ( defined( 'FW' ) ) {
    class Nex_Widget_Info extends WP_Widget {
     
        /**
         * Widget constructor.
         */
        private $options;
        private $prefix;
        function __construct() {
     
            parent::__construct(
                NEX_THEME_SLUG . '_info_widget',
                esc_html__('['.ucfirst(NEX_THEME_SLUG).'] Info','nex'),
                array(
                    'description' => esc_html__('Displays info fields', 'nex'),
                    'classname' => 'nex-widget-vx-opentime',
                )
            );
            
            //Create our options by using Unyson option types
            $this->options = array(
                'title' => array(
                    'type'  => 'text',
                    'label' => esc_html__('Title', 'nex'),
                ),
                'info_fields' => array(
                    'type' => 'addable-box',
                    'label' => esc_html__('Info Fields', 'nex'),
                    'template' => '{{- label }}',
                    'add-button-text' => esc_html__('Add info', 'nex'),
                    'sortable' => true,
                    'box-options' => array(
                        'label' => array(
                            'type'  => 'text',
                            'label' => esc_html__('Info Label', 'nex'),
                        ),
                        'value' => array(
                            'type'  => 'text',
                            'label' => esc_html__('Info value', 'nex'),
                        ),
                    )
                )
            );
            $this->prefix = NEX_THEME_SLUG;
        }
     
        function widget($args, $instance) {
            extract($args);
            extract($instance);
            $title = apply_filters('widget_title', $title, $instance, $this->id_base);
            include( get_theme_file_path( 'inc/widgets/info/views/widget.php' ));

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