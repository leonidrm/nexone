<?php if ( ! defined( 'ABSPATH' ) ) {
	die( 'Direct access forbidden.' );
}

if ( defined( 'FW' ) && function_exists( 'fw_ext_social_twitter_get_connection' ) && function_exists( 'curl_exec' ) ) {

    class Nex_Widget_Twitter extends WP_Widget {
     
        /**
         * Widget constructor.
         */
        private $options;
        private $prefix;
        function __construct() {
     
            parent::__construct(
                NEX_THEME_SLUG . '_widget_twitter',
                esc_html__('['.ucfirst(NEX_THEME_SLUG).'] Twitter', 'nex'),
                array(
                    'description' => esc_html__('Displays a grid of images from twitter', 'nex'),
                    'classname' => 'nex-widget-vx-twitter',
                )
            );
            
            //Create our options by using Unyson option types
            $this->options = array(
                'title' => array(
                    'label' => esc_html__('Widget title', 'nex'),
                    'type' => 'text',
                ),
                'username' => array(
                    'label' => esc_html__('Twitter account', 'nex'),
                    'type' => 'text',
                ),
                'number' => array(
                    'label' => esc_html__('Number of tweets', 'nex'),
                    'type' => 'text',
                    'value' => 3
                )
            );
            $this->prefix = NEX_THEME_SLUG;
        }
     
        function widget($args, $instance) {
            extract($args);
            extract($instance);
            $title = apply_filters('widget_title', $title, $instance, $this->id_base);
            print $before_widget;
            if (!empty($title))
                print $before_title . $title . $after_title;
            echo nex_twitter_generate_output($username, $number);
                    
            print $after_widget;
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

            $this->print_widget_javascript($id);
            return $values;
        }
        
        /*
         * Initialize options after saving.
         */
        private function print_widget_javascript($id) {
            ?><script type="text/javascript">
                jQuery(function($) {
                    var timeoutId;
                    $(document).on('widget-updated widget-added', function(){
                        clearTimeout(timeoutId);
                        timeoutId = setTimeout(function(){ // wait a few milliseconds for html replace to finish
                            fwEvents.trigger('fw:options:init', { $elements: $('#widgets-right .fw-theme-admin-widget-wrap') });
                        }, 100);
                    });
                });
            </script><?php
        }
     
    }

}