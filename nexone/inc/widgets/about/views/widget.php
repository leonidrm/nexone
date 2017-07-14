<?php if ( ! defined( 'ABSPATH' ) ) die( 'Direct access forbidden.' );

print $before_widget;
if (!empty($title))
    print $before_title . $title . $after_title;

if( !empty($logo_image['url']) || !empty($logo_text) ) {
    echo '<div class="logo"><a href="'.home_url( '/' ).'">';
    if( !empty($logo_image['url']) )
        echo '<img src="'.esc_url($logo_image['url']).'" alt="'.esc_attr__('logo', 'nex').'" />';
    else
        echo wp_kses( $logo_text , array('span' => array(), 'br' => array()) );
    echo '</a></div>';
}?>
<?php if(!empty($text))
    echo do_shortcode( $text );
if(!empty($info_fields)) : ?>
<ul>
    <?php foreach($info_fields as $field) : ?>
        <li>
            <?php if(!empty($field['icon'])) : ?>
                <i class="nex-cc <?php esc_attr_e($field['icon']) ?>"></i>
            <?php endif;
            echo wp_kses( $field['label'], array('a' => array('href' => array(),'target' => array()), 'b' => array(), 'strong'=>array())); ?>
        </li>
    <?php endforeach ?>
</ul>
<?php endif;
if($socials)
    nex_the_social_icons();
print $after_widget;