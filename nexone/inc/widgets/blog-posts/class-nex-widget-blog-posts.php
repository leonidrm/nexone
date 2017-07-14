<?php if ( ! defined( 'ABSPATH' ) ) { die( 'Direct access forbidden.' ); }

class Nex_Widget_Blog_Posts extends WP_Widget {

    /**
     * @internal
     */
    public function __construct() {
        parent::__construct(
            NEX_THEME_SLUG . '_blog_posts_widget',
            esc_html__('['.ucfirst(NEX_THEME_SLUG).'] Blog Posts', 'nex'),
            array(
                'description' => esc_html__('Displays latest posts in a fancy way', 'nex'),
                'classname' => 'nex-widget-vx-latestposts',
            )
        );
    }

    /**
     * @param array $args
     * @param array $instance
     */
    public function widget( $args, $instance ) {
        extract( $args );
        extract( $instance );
        $number = ( (int) ( $number ) > 0 ) ? $number : 5;
        $title = apply_filters('widget_title', $title, $instance, $this->id_base);
        
        $recent_posts_query = new WP_Query( array(
            'post_type'      => 'post',
            'posts_per_page' => $number
        ) );

        include( get_theme_file_path( 'inc/widgets/blog-posts/views/widget.php' ));

        wp_reset_postdata();
    }

    /**
     * @param array $new_instance
     * @param array $old_instance
     *
     * @return array
     */
    public function update( $new_instance, $old_instance ) {
        return $new_instance;
    }

    /**
     * @param array $instance
     *
     * @return string|void
     */
    public function form( $instance ) {
        $instance = wp_parse_args( (array) $instance, array( 'number' => '', 'title' => '', 'show_comments' => '' ) );
        $number         = $instance['number'];
        $title          = $instance['title'];
        $show_comments  = $instance['show_comments'];
        ?>
        <p>
            <label for="<?php esc_attr_e($this->get_field_id( 'title' )); ?>"><?php esc_html_e( 'Widget Title', 'nex' ); ?>
                :</label>
            <input type="text" name="<?php esc_attr_e($this->get_field_name( 'title' )); ?>" value="<?php esc_attr_e($title); ?>"
                   class="widefat" id="<?php esc_attr_e($this->get_field_id( 'title' )); ?>"/>
        </p>
        <p>
            <label for="<?php esc_attr_e($this->get_field_id( 'number' )); ?>"><?php esc_html_e( 'Number of Blog posts', 'nex' ); ?>
                :</label>
            <input type="text" name="<?php esc_attr_e($this->get_field_name( 'number' )); ?>" value="<?php esc_attr_e($number); ?>"
                   class="widefat" id="<?php esc_attr_e($this->get_field_id( 'number' )); ?>"/>
        </p>
        <p>
            <label for="<?php esc_attr_e($this->get_field_id( 'show_comments' )); ?>"><?php esc_html_e( 'Show comments number', 'nex' ); ?>
                :</label>
            <input type="checkbox" name="<?php esc_attr_e($this->get_field_name( 'show_comments' )); ?>" value="on" class="widefat" id="<?php esc_attr_e($this->get_field_id( 'show_comments' )); ?>" <?php checked( $show_comments, 'on' ); ?>/>
        </p>
    <?php
    }
}
