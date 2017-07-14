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

<?php if(fw_akg('pricing/layout_type', $atts) === 'layout_1') :
	$cols = fw_akg('pricing/layout_1/cols', $atts);
	$items = fw_akg('pricing/layout_1/items', $atts); ?>
    <!-- /price v1-->
    <?php foreach($items as $data) :?>
        <div class="nex-v1-pricing-list">
            <?php if(!empty($data['price'])) printf('<span>%s</span>', esc_attr($data['price'])) ?>
	        <?php if(!empty($data['title'])) printf('<h4>%s</h4>', wp_kses($data['title'], $kses_args)) ?>
	        <?php if(!empty($data['desc']))  printf('<p>%s</p>', wp_kses($data['desc'], $kses_args)) ?>
        </div>
    <?php endforeach ?>
    <!-- /price v1-->
<?php elseif(fw_akg('pricing/layout_type', $atts) === 'layout_2') :
	$cols = fw_akg('pricing/layout_2/cols', $atts);
	$items = fw_akg('pricing/layout_2/items', $atts); ?>
    <!-- /price v2-->
    <?php foreach($items as $data) :?>

    <?php endforeach ?>
    <!-- /price v2-->
<?php endif;