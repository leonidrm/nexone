<?php
/** @var array $atts */
if (!defined('FW')) die('Forbidden');

if(!empty($atts['alias']))
	echo do_shortcode('[rev_slider alias="'.esc_html($atts['alias']).'"]');