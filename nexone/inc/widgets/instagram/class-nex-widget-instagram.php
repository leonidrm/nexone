<?php if ( ! defined( 'ABSPATH' ) ) {
    die( 'Direct access forbidden.' );
}

if ( defined( 'FW' ) ) {
    class Nex_Widget_Instagram extends WP_Widget {
     
        /**
         * Widget constructor.
         */
        private $options;
        private $prefix;
        function __construct() {
     
            parent::__construct(
                NEX_THEME_SLUG . '_instagram_widget',
                esc_html__('['.ucfirst(NEX_THEME_SLUG).'] Instagram','nex'),
                array(
                    'description' => esc_html__('Displays a grid of images from instagram', 'nex'),
                    'classname' => 'nex-widget-vx-instagram',
                )
            );
            
            //Create our options by using Unyson option types
            $this->options = array(
                'title' => array(
                    'label' => esc_html__('Widget title', 'nex'),
                    'type' => 'text',
                ),
                'username' => array(
                    'label' => esc_html__('Instagram account', 'nex'),
                    'type' => 'text',
                ),
                'nr_images' => array(
                    'label' => esc_html__('Number of images', 'nex'),
                    'type' => 'text',
                    'value' => 6
                ),
                'cache_hours' => array(
                    'label' => esc_html__('Cache Hours', 'nex'),
                    'type' => 'text',
                    'value' => 12
                ),
            );
            $this->prefix = NEX_THEME_SLUG;
        }
     
        function widget($args, $instance) {
            extract($args);
            extract($instance);
            $title = apply_filters('widget_title', $title, $instance, $this->id_base);
            include( get_theme_file_path( 'inc/widgets/instagram/views/widget.php' ) );
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