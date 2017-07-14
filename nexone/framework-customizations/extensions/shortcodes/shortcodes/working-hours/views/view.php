<?php
if (!defined('FW')) die('Forbidden');
/**
* @var $atts
*/
$bg_image = $atts['bg_image'];
$text_color = $atts['text_color'];
$bg_image = fw_akg('bg_image', $atts);
$bg_style = !empty($bg_image) ? 'background: url(' . $bg_image['url'] . ');' : '';
$text_style = !empty($text_color) ? 'color:' . $text_color. ';' : '';

$items = fw_akg('items', $atts); ?>
<!-- WorkingHours start -->
<div class="nex-vx-workHours" <?php if(!empty($bg_style) || !empty($text_style)) echo 'style="' .$text_style . $bg_style .'"' ?>>
    <ul>
        <?php foreach($items as $data) printf('<li><span>%s</span>%s</li>', $data['time'], $data['day']) ?>
    </ul>
</div>
<!-- WorkingHours end -->