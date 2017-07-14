<?php if ( ! defined( 'ABSPATH' ) ) { die( 'Direct access forbidden.' ); }

print $before_widget;

if (!empty($title))
    print $before_title . $title . $after_title;

echo nex_instagram_generate_output( $username, $cache_hours, $nr_images , $thumbs = true, $callback = '' );
        
print $after_widget;