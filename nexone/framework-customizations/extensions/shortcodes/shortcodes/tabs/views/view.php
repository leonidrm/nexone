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
	$tabs_id = uniqid('tabs-');
	$tabs = fw_akg('tabs', $atts); ?>
    <!-- Tabs v1 start -->
    <div class="nex-v1-tabs">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs" role="tablist">
	        <?php foreach($tabs as $i => $data) : $tab_id = uniqid('tab-'); $tabs[$i]['tab_id'] = $tab_id ?>
                <li role="presentation" <?php echo 0 == $i ? 'class="active"' : '' ?>>
                    <a href="#<?php esc_attr_e($tab_id) ?>" aria-controls="<?php esc_attr_e($tab_id) ?>" role="tab" data-toggle="tab">
                        <?php echo wp_kses($data['tab_title'], $kses_args) ?>
                    </a>
                </li>
            <?php endforeach ?>
        </ul>
        <!-- Tab panes -->
        <div class="tab-content">
            <?php foreach ($tabs as $i => $data) : ?>
                <div role="tabpanel" class="tab-pane fade <?php echo 0 == $i ? 'in active' : '' ?>" id="<?php esc_attr_e($data['tab_id']) ?>">
                    <p><?php echo do_shortcode($data['tab_content']) ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <!-- Tabs v1 end -->
<?php elseif(fw_akg('layout_type', $atts) === 'layout_2') :
	$tabs_id = uniqid('tabs-');
	$tabs = fw_akg('tabs', $atts); ?>

<?php endif;