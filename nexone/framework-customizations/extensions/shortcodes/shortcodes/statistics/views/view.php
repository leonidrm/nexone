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
<?php if(fw_akg('statistics/layout_type', $atts) === 'layout_1') :
	$cols = fw_akg('statistics/layout_1/cols', $atts);
	$statistics = fw_akg('statistics/layout_1/statistics', $atts); ?>
    <!-- statistics v1-->
    <div class="row">
        <?php foreach($statistics as $i => $data) : ?>
            <div class="<?php esc_attr_e($cols) ?> col-xs-6">
                <div class="nex-v1-statistic">
                    <?php if($data['icon']['type'] === 'custom-upload') : ?>
                        <img src="<?php esc_attr_e( $data['icon']['url'] ); ?>" alt="<?php esc_attr_e('service image','nex') ?>" />
                    <?php else: ?>
                        <i class="<?php esc_attr_e( $data['icon']['icon-class'] ); ?>"></i>
                    <?php endif; ?>
                    <?php if(!empty($data['data'])) printf('<h3>%s</h3>', esc_attr($data['data'])) ?>
                    <?php if(!empty($data['title'])) printf('<h6>%s</h6>', esc_attr($data['title'])) ?>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <!-- /statistics v1-->
<?php elseif(fw_akg('statistics/layout_type', $atts) === 'layout_2') :
	$cols = fw_akg('statistics/layout_2/cols', $atts);
	$statistics = fw_akg('statistics/layout_2/statistics', $atts); ?>
    <!-- statistics v2-->
    <div class="row">
        <?php foreach($statistics as $i => $data) : ?>
            <div class="<?php esc_attr_e($cols) ?> col-xs-6">
                <div class="nex-v2-statistic">
                    <?php if(!empty($data['title'])) printf('<h3>%s</h3>', esc_attr($data['title'])) ?>
                    <?php if(!empty($data['data'])) printf('<h4 class="nex-bgca">%s</h4>', esc_attr($data['data'])) ?>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <!-- /statistics v2-->
<?php elseif(fw_akg('statistics/layout_type', $atts) === 'layout_3') :
	$cols = fw_akg('statistics/layout_3/cols', $atts);
	$statistics = fw_akg('statistics/layout_3/statistics', $atts); ?>
    <!-- statistics v3-->
    <div class="row">
        <?php foreach($statistics as $i => $data) : ?>
            <div class="<?php esc_attr_e($cols) ?> col-sm-6 col-xs-12">
                <div class="nex-v3-statistic"
                <?php if(!empty($data['bg_image']))
                    printf('style="background-image: url(\'%s\');"', $data['bg_image']['url']);
                else
	                printf('style="background: %s;"', $data['bg_color'])?>>
                    <div class="nex-content">
                        <?php if(!empty($data['title'])) printf('<h3>%s</h3>', esc_attr($data['title'])) ?>
                        <?php if(!empty($data['data']))  printf('<h4>%s</h4>', esc_attr($data['data'])) ?>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <!-- /statistics v3-->
<?php elseif(fw_akg('statistics/layout_type', $atts) === 'layout_4') :
	$cols = fw_akg('statistics/layout_4/cols', $atts);
	$statistics = fw_akg('statistics/layout_4/statistics', $atts); ?>
    <!-- /statistics v4-->
    <div class="row">
        <?php foreach($statistics as $data) : ?>
            <div class="<?php esc_attr_e($cols) ?> col-xs-6 col-sm-6">
                <div class="nex-v4-statistic nex-bc nex-bgcb nex-bgca">
                    <?php if($data['icon']['type'] === 'custom-upload') : ?>
                        <img src="<?php esc_attr_e( $data['icon']['url'] ); ?>" alt="<?php esc_attr_e('service image','nex') ?>" />
                    <?php else: ?>
                        <i class="nex-cc  <?php esc_attr_e( $data['icon']['icon-class'] ); ?>"></i>
                    <?php endif; ?>
                    <?php if(!empty($data['data'])) printf('<h4>%s</h4>', esc_attr($data['data'])) ?>
	                <?php if(!empty($data['title'])) printf('<h6>%s</h6>', wp_kses($data['title'], $kses_args)) ?>
                    <div class="lines nex-bgcb nex-bgca"></div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <!-- /statistics v4-->
<?php elseif(fw_akg('statistics/layout_type', $atts) === 'layout_5') :
	$cols = fw_akg('statistics/layout_5/cols', $atts);
	$statistics = fw_akg('statistics/layout_5/statistics', $atts); ?>
    <!-- statistics v5-->
    <div class="row">
        <?php foreach($statistics as $i => $data) : ?>
            <div class="<?php esc_attr_e($cols) ?>">
                <div class="nex-v5-statistic">
                    <div class="nex-data">
                        <?php if($data['icon']['type'] === 'custom-upload') : ?>
                            <img src="<?php esc_attr_e( $data['icon']['url'] ); ?>" alt="<?php esc_attr_e('service image','nex') ?>" /><?php esc_attr_e($data['title']) ?>
                        <?php else: ?>
                            <i class="nex-cc  <?php esc_attr_e( $data['icon']['icon-class'] ); ?>"></i><?php esc_attr_e($data['title']) ?>
                        <?php endif; ?>
                    </div>
                    <?php if(!empty($data['data'])) printf('<h4>%s</h4>', esc_attr($data['data'])) ?>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <!-- /statistics v5-->
<?php endif;