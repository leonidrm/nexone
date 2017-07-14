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

<?php if(fw_akg('skills/layout_type', $atts) === 'layout_1') :
	$cols = fw_akg('skills/layout_1/cols', $atts);
	$skills = fw_akg('skills/layout_1/skills', $atts); ?>
    <!-- /skills v1-->
    <div class="row">
        <?php foreach($skills as $data) :?>
            <!-- loop -->
            <div class="<?php esc_attr_e($cols) ?>">
                <div class="nex-v1-skill">
                    <?php if(!empty($data['title'])) printf('<h5>%s</h5>', $data['title']) ?>
                    <div class="nex-bar">
                        <?php printf('<div style="width: %s;" class="nex-bgc nex-fill"><span>%s</span></div>', esc_attr($data['percentage']), esc_attr($data['percentage'])) ?>
                    </div>
                </div>
            </div>
            <!-- /loop -->
        <?php endforeach ?>
    </div>
    <!-- /skills v1-->
<?php elseif(fw_akg('skills/layout_type', $atts) === 'layout_2') :
	$cols = fw_akg('skills/layout_2/cols', $atts);
	$skills = fw_akg('skills/layout_2/skills', $atts); ?>
    <!-- skills v2-->
    <div class="row">
        <?php foreach($skills as $i => $data) : ?>
            <div class="<?php esc_attr_e($cols) ?>">
                <div class="nex-v2-skill">
                    <div class="nex-fill">
                        <?php if(!empty($data['percentage'])) printf('<h5>%s</h5>', $data['percentage']) ?>
                        <span class="nex-bgc" style="height: <?php esc_attr_e($data['percentage']) ?>"></span>
                    </div>
                    <div class="nex-data">
                        <?php if(!empty($data['title'])) printf('<h4>%s</h4>', $data['title']) ?>
                        <?php if(!empty($data['subtitle'])) printf('<h5 class="nex-cc">%s</h5>', $data['subtitle']) ?>
                        <?php if(!empty($data['desc'])) printf('<p>%s</p>', wp_kses($data['desc'], $kses_args)) ?>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <!-- /skills v2-->
<?php endif;