<?php
if (!defined('FW')) die('Forbidden'); ?>
<!-- Hero vx start -->
<div class="nex-vx-hero" <?php if(!empty($atts['image'])) echo ' style="background-image: url(' . esc_url($atts['image']['url']) . '); color: ' . $atts['message_color'] . '"' ?>>
    <?php if(!empty($atts['content'])) echo '<div class="nex-hero-filter" style="background-color:' . $atts['bg_image_filter'] . ';"></div>'; ?>
    <div class="container">
        <div class="nex-content" <?php echo ' style="color: ' . $atts['message_color'] . '"' ?>>
            <?php echo do_shortcode($atts['content']) ?>
        </div>
	    <?php if(!empty($atts['buttons'])) : ?>
            <div class="nex-footer <?php esc_attr_e($atts['buttons_align']) ?>">
                <?php foreach($atts['buttons'] as $button) echo nex_get_button_type($button) ?>
            </div>
        <?php endif; ?>
    </div>
</div>
<!-- Hero vx end -->