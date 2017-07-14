<?php
if (!defined('FW')) die('Forbidden');

$cfg = array(
    'page_builder' => array(
        'title'         => esc_html__('Statistics', 'nex'),
        'description'   => esc_html__('Blocks with statistics, icon + title + text', 'nex'),
        'tab'           => esc_html__('Nex', 'nex'),
        'popup_size'    => 'medium', // can be large, medium or small
        'title_template'=> '{{- title }}',
        'icon'          => 'fa fa-line-chart'
    )
);