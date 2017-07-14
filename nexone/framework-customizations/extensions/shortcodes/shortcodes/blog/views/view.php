<?php if (!defined('FW')) die('Forbidden');
/**
 * @var $atts
 * @var FW_Extension_Shortcodes $shortcodes
 * @var FW_Shortcode_Table $table
 *
 */

$shortcodes = fw_ext('shortcodes');

$blog = $shortcodes->get_shortcode('blog');
?>
<!-- blog -->
<div class="row">
    <?php
    $layout = $atts['layout_type'];
    $cols = $atts['cols'];

    $args = array(
        'post_type'           => 'post',
        'posts_per_page'      => $atts['nr'],
        'order'               => 'DESC',
    );

    if(!empty($atts['category'])) {
        $categories = explode(',', $atts['category']);
        $args['tax_query'] = array(
            array(
                'taxonomy' => 'category',
                'field'    => 'slug',
                'terms'    => $categories,
            ),
        );
    }

    if( $atts['ignore_sticky'] !== 'off')
        $args['ignore_sticky_posts'] = 1;

    if($layout == 'layout_5')
        $args['meta_key'] = '_thumbnail_id';

    $loop = new WP_Query( $args );

    while ( $loop->have_posts() ) : $loop->the_post();
        include( $blog->locate_path('/views/view-parts/content-' . $layout .'.php'));
    endwhile;
    wp_reset_postdata(); ?>
</div>
<!-- /blog -->