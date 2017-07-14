<?php
if (!defined('FW')) die('Forbidden');

$cfg = array(
    'page_builder' => array(
        'title'         => esc_html__('Hero', 'nex'),
        'description'   => esc_html__('Big section with text, background image and buttons', 'nex'),
        'tab'           => esc_html__('Nex', 'nex'),
        'popup_size'    => 'medium', // can be large, medium or small
        'icon'          => 'fa fa-arrows-alt',
        'title_template'=> '{{- title }} - {{= o.title }}',
    )
);