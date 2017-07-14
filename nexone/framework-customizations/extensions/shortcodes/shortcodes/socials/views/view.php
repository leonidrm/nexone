<?php
if (!defined('FW')) die('Forbidden');
/**
 * @var $atts
 */

$icon_size = $atts['icon_size'];
$bg_style = $atts['bg_style'];?>

<!-- /socials -->
<div class="nex-vx-socials <?php echo 'nex-icon-' . $icon_size . ' nex-bg-' . $bg_style ?>">
    <?php if(!empty($atts['title'])) printf('<h4 style="color:%s">%s</h4>', esc_attr($atts['title_color']), esc_attr($atts['title']) ) ?>
    <?php nex_the_social_icons() ?>
</div>
<!-- /socials -->