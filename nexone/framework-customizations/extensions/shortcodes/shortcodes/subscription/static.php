<?php if (!defined('FW')) die('Forbidden');

$uri = fw_get_template_customizations_directory_uri('/extensions/shortcodes/shortcodes/subscription');

wp_enqueue_script(
	'fw-shortcode-nex-subscription',
	$uri . '/static/js/scripts.js'
);