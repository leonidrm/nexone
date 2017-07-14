<?php
if (!defined('FW')) die('Forbidden');

$cfg = array(
    'page_builder' => array(
        'title'         => esc_html__('Twitter', 'nex'),
        'description'   => esc_html__('Section with twits from Twitter', 'nex'),
        'tab'           => esc_html__('Nex', 'nex'),
        'popup_size'    => 'small',
        'title_template'=> '{{- title }} - {{- o.title }}',
        'icon'          => 'fa fa-twitter',
    )
);