<?php
if (!defined('FW')) die('Forbidden');
/**
 * @var $atts
 */

$username = $atts['username'];

$number = $atts['number'];

$cols = $atts['cols'];

echo nex_twitter_sc_generate_output($username, $number, $cols);