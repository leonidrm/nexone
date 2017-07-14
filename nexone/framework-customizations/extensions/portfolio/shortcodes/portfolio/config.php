<?php
if (!defined('FW')) die('Forbidden');

$cfg = array(
    'page_builder' => array(
        'title'         => esc_html__('Portfolio', 'nex'),
        'description'   => esc_html__('Section that displays latest projects from portfolio posts', 'nex'),
        'tab'           => esc_html__('Nex', 'nex'),
        'popup_size'    => 'medium', // can be large, medium or small
        'title_template'=> '{{- title }}',
        'icon'          => 'fa fa-briefcase'
    )
);