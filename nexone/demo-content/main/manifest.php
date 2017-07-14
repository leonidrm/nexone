<?php if (!defined('FW')) die('Forbidden');
/**
 * @var string $uri Demo directory url
 */

$manifest = array();
$manifest['title'] = NEX_SUBTHEME_NAME;
$manifest['screenshot'] = esc_url( $uri . '/screenshot.jpg' );
$manifest['preview_link'] = esc_url('https://demo.nexthemes.co/' . NEX_SUBTHEME_SLUG);