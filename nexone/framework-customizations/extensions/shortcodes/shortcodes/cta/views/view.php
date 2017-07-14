<?php
if (!defined('FW')) die('Forbidden');
/**
 * @var $atts
 */
?>
<?php if(fw_akg('cta/layout_type', $atts) === 'layout_1') :
	$message = fw_akg('cta/layout_1/text', $atts);
	$buttons = fw_akg('cta/layout_1/buttons', $atts); ?>
    <!-- Call to action v1 start -->
    <div class="nex-v1-callaction nex-vx-callaction">
        <div class="container">
            <?php echo do_shortcode($message) ?>
	        <?php if(!empty($buttons)) : ?>
                <div class="nex-footer">
			        <?php foreach($buttons as $button) echo nex_get_button_type($button) ?>
                </div>
	        <?php endif; ?>
        </div>
    </div>
    <!-- Call to action v1 end -->
<?php elseif(fw_akg('cta/layout_type', $atts) === 'layout_2') :
	$message = fw_akg('cta/layout_2/text', $atts);
	$buttons = fw_akg('cta/layout_2/buttons', $atts); ?>
    <!-- Call to action v2 start -->
    <div class="nex-v2-callaction nex-vx-callaction nex-bgc">
        <div class="container">
	        <?php if(!empty($buttons)) : ?>
                <?php foreach($buttons as $button) echo nex_get_button_type($button) ?>
	        <?php endif; ?>
	        <?php echo do_shortcode($message) ?>
        </div>
    </div>
    <!-- Call to action v2 end -->
<?php elseif(fw_akg('cta/layout_type', $atts) === 'layout_3') :
	$message = fw_akg('cta/layout_3/text', $atts);
	$buttons = fw_akg('cta/layout_3/buttons', $atts);
	$image = fw_akg('cta/layout_3/image', $atts) ?>
    <!-- Call to action v3 start -->
    <div class="nex-v3-callaction nex-vx-callaction nex-bgrl">
        <div class="container">
	        <?php if(!empty($image)) : ?>
                <div class="nex-cover">
                    <img src="<?php echo esc_url($image['url']) ?>" alt="<?php esc_html_x('team image','image alt','nex') ?>">
                </div>
	        <?php endif ?>
	        <?php echo do_shortcode($message) ?>
	        <?php if(!empty($buttons)) : ?>
		        <?php foreach($buttons as $button) echo nex_get_button_type($button) ?>
	        <?php endif; ?>
        </div>
    </div>
    <!-- Call to action v3 end -->
<?php endif;