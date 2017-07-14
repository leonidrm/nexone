<?php
if (!defined('FW')) die('Forbidden');
/**
 * @var $atts
 */
$cols        = $atts['cols'];

$username    = $atts['username'];

$cache_hours = $atts['cache_hours'];

$nr_images   = $atts['nr_images'];

$img_size    = $atts['img_size'];

$images = nex_instagram_data( $username, $cache_hours, $nr_images, $img_size );

if(!empty($images)) :

	echo '<div class="row">';

	foreach($images as $image) printf('<div class="%s"><a target="_blank" href="%s"><img class="nex-instagram-img" src="%s" alt="%s"/></a></div>', $cols, esc_url($image['link']), esc_attr($image['image']), esc_attr( $image['caption'] ));

	echo '</div>';

endif;