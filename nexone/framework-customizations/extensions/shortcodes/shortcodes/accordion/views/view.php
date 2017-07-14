<?php
if (!defined('FW')) die('Forbidden');
/**
 * @var $atts
 */
$kses_args = array(
	'span'=>array(),
	'br'=>array(),
	'i'=>array(),
	'u'=>array(),
	'b'=>array()
) ?>

<?php if(fw_akg('layout_type', $atts) === 'layout_1') :
    $accordion_id = uniqid('accordion-');
	$tabs = fw_akg('tabs', $atts); ?>
    <!-- Accordion v2 start -->
    <div class="nex-v1-accordion">
        <div class="panel-group" id="<?php esc_attr_e($accordion_id) ?>" role="tablist" aria-multiselectable="true">
			<?php foreach($tabs as $data) : $tab_id = uniqid('-')?>
                <!-- loop -->
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="heading<?php esc_attr_e($tab_id)?>">
                        <h4 class="panel-title">
                            <a <?php echo 'off' == $data['state'] ? 'class="collapsed"' : ''; echo 'off' == $data['state'] ? 'aria-expanded="false"' : 'aria-expanded="true"' ?>role="button" data-toggle="collapse" data-parent="#<?php esc_attr_e($accordion_id) ?>" href="#collapse<?php esc_attr_e($tab_id)?>" aria-controls="collapse<?php esc_attr_e($tab_id)?>">
                                <?php echo wp_kses($data['tab_title'], $kses_args) ?>
                            </a>
                        </h4>
                    </div>
                    <div id="collapse<?php esc_attr_e($tab_id)?>" class="panel-collapse collapse <?php echo 'on' == $data['state'] ? 'in' : '' ?>" role="tabpanel" aria-labelledby="heading<?php esc_attr_e($tab_id)?>">
                        <div class="panel-body">
                            <?php echo do_shortcode($data['tab_content']) ?>
                        </div>
                    </div>
                </div>
                <!-- /loop -->
			<?php endforeach ?>
        </div>
    </div>
    <!-- Accordion v2 end -->
<?php elseif(fw_akg('layout_type', $atts) === 'layout_2') :
	$accordion_id = uniqid('accordion-');
	$tabs = fw_akg('tabs', $atts); ?>
    <!-- Accordion v2 start -->
    <div class="nex-v2-accordion">
        <div class="panel-group" id="<?php esc_attr_e($accordion_id)?>" role="tablist" aria-multiselectable="false">
	        <?php foreach($tabs as $data) : $tab_id = uniqid('-')?>
                <!-- loop -->
                <div class="panel panel-default">
                    <div class="panel-heading <?php echo 'on' == $data['state'] ? 'active' : '' ?>" role="tab" id="heading<?php esc_attr_e($tab_id)?>">
                        <h4 class="panel-title">
                            <a <?php echo 'off' == $data['state'] ? 'class="collapsed"' : ''; echo 'off' == $data['state'] ? 'aria-expanded="false"' : 'aria-expanded="true"' ?>role="button" data-toggle="collapse" data-parent="#<?php esc_attr_e($accordion_id) ?>" href="#collapse<?php esc_attr_e($tab_id)?>" aria-controls="collapse<?php esc_attr_e($tab_id)?>">
                                <?php echo wp_kses($data['tab_title'], $kses_args) ?>
                            </a>
                        </h4>
                    </div>
                    <div id="collapse<?php esc_attr_e($tab_id)?>" class="panel-collapse collapse <?php echo 'on' == $data['state'] ? 'in' : '' ?>" role="tabpanel" aria-labelledby="heading<?php esc_attr_e($tab_id)?>">
                        <div class="panel-body"><?php echo do_shortcode($data['tab_content']) ?></div>
                    </div>
                </div>
                <!-- /loop -->
			<?php endforeach; ?>
        </div>
    </div>
    <!-- Accordion v2 end -->
<?php endif;