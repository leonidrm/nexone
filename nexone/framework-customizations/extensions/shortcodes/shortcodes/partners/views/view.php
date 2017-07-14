<?php
if (!defined('FW')) die('Forbidden');
/**
* @var $atts
*/
$type = $atts['slider'];
$class = $type == 'slider' ? 'nex-slick nex-slick-clients' : '';
$cols = $atts['cols'];
$partners = $atts['partners']; ?>
<!-- /partners-->
<div class="nex-vx-partners">
    <div class="container">
        <div class="row <?php esc_attr_e($class) ?>" data-cols="<?php esc_attr_e($cols) ?>">
            <?php foreach($partners as $data) :
                $args = array($data['image']['url'], esc_html_x('client','Partners','nex'));
                if(!empty($data['link'])) array_unshift($args, $data['link']);
                $pattern = '<img src="%s" alt="%s" />';
                $pattern = !empty($data['link']) ? '<a target="_blank" href="%s">' . $pattern . '</a>' : $pattern;
                ?>
                <!-- loop -->
                <div class="col-sm-3 col-xs-4">
                    <?php vprintf($pattern, $args) ?>
                </div>
                <!-- /loop -->
            <?php endforeach ?>
        </div>
    </div>
</div>
<!-- /partners-->