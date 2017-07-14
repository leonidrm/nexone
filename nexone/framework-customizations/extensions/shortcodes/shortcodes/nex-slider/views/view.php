<?php
if (!defined('FW')) die('Forbidden');
/**
* @var $atts
*/
$slides = fw_akg('slides', $atts);
?>
<div class="nex-vx-slider">
    <div class="nex-slider" data-arrows="<?php esc_attr_e($atts['arrows']) ?>" data-bullets="<?php esc_attr_e($atts['bullets']) ?>">
        <?php foreach ($slides as $slide) :
	        $bg_img         = $slide['bg_image']['url'];
	        $bg_filter      = $slide['bg_image_filter'];
	        $message        = do_shortcode($slide['slide_content']);
	        $message        = $slide['slide_content'];
	        $message_color  = $slide['message_color'];
	        $buttons_layer  = '';
	        if(!empty($slide['buttons'])) :
                $buttons_layer  .= '<div class="nex-footer ' . $slide['buttons_align'] . '">';
                foreach($slide['buttons'] as $button) $buttons_layer .= nex_get_button_type($button);
                $buttons_layer  .= '</div>';
            endif;
            $text_layer     = !empty($message) || !empty($buttons_layer) ? '<div class="nex-bg-trans" style="background:' . $bg_filter . ';"></div><div class="nex-slide-text"  style="color:' . $message_color . '">' . $message . $buttons_layer . '</div>' : '';
            $pattern        = '<div>%s<img src="%s" alt="%s" /></div>';
            printf( $pattern, $text_layer, esc_attr($bg_img), esc_html__('slider','nex') );
        endforeach; ?>
    </div>
</div>