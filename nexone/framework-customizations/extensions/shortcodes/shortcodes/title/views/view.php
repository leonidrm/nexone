<?php
if (!defined('FW')) die('Forbidden'); 
$title_style = '';
if(!empty($atts['title_color']))
	$title_style = ' style="color: '.esc_attr($atts['title_color']).';"';
$descr_style = '';
if(!empty($atts['descr_color']))
	$descr_style = ' style="color: '.esc_attr($atts['descr_color']).';"';
?>
<div class="site-title">
    <?php if(!empty($atts['title'])) printf('<h1 class="nex-title" %s>%s</h1>', $title_style, $atts['title']) ?>
    <?php if(!empty($atts['descr'])) printf('<h4 class="nex-undertitle" %s>%s</h4>', $descr_style, $atts['descr']) ?>
</div>