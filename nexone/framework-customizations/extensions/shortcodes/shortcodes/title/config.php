<?php
if (!defined('FW')) die('Forbidden');

$cfg = array(
    'page_builder' => array(
        'title'         => esc_html__('Title', 'nex'),
        'description'   => esc_html__('Section with title and subtitle', 'nex'),
        'tab'           => esc_html__('Nex', 'nex'),
        'popup_size'    => 'medium',
        'title_template'=> '{{- title }} - {{- o.title }}',
        'icon'          => 'fa fa-header',
    )
);