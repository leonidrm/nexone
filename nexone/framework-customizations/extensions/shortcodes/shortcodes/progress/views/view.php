<?php
if (!defined('FW')) die('Forbidden');
/**
* @var $atts
*/
?>
<?php if(fw_akg('progress/layout_type', $atts) === 'layout_1') :
	$cols = fw_akg('progress/layout_1/cols', $atts);
	$steps = fw_akg('progress/layout_1/steps', $atts); ?>
    <!-- Progress v1 start -->
    <div class="container">
        <div class="row">
    		<?php foreach($steps as $i => $data) : ?>
                <div class="<?php esc_attr_e($cols) ?>">
                    <div class="nex-v1-progress">
                        <div class="nex-number nex-bc"><?php esc_attr_e($i + 1) ?></div>
    					<?php if(!empty($data['title'])) printf('<div class="nex-hover"><h3>%s</h3></div>', $data['title']) ?>
    					<?php if(!empty($data['image'])) printf('<img src="%s" alt="" />', esc_url($data['image']['url']), esc_attr_x('progress image','image alt','nex')) ?>
                    </div>
                </div>
    		<?php endforeach ?>
        </div>
    </div>
    <!-- Progress v1 end -->
<?php elseif(fw_akg('progress/layout_type', $atts) === 'layout_2') :
	$cols = fw_akg('progress/layout_2/cols', $atts);
	$steps = fw_akg('progress/layout_2/progress', $atts); ?>
    <!-- Progress v2 start -->
    <div class="container">
        <div class="row">
            <?php foreach($steps as $i => $data) : ?>
                <div class="<?php esc_attr_e($cols) ?>">
                    <div class="nex-v2-progress">
    	                <?php if(!empty($data['title'])) printf('<h5>%s</h5>', $data['title']) ?>
    	                <?php if(!empty($data['percentage'])) printf('<div class="nex-bar"><div style="width: %s;" class="nex-bgc nex-fill"><span>%s</span></div></div>', $data['percentage'], $data['percentage']) ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <!-- Progress v2 start -->
<?php endif;