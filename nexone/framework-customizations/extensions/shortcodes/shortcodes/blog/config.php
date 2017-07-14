<?php
if (!defined('FW')) die('Forbidden');

$cfg = array(
    'page_builder' => array(
        'title'         => esc_html__('Blog posts', 'nex'),
        'description'   => esc_html__('Show blog posts', 'nex'),
        'tab'           => esc_html__('Nex', 'nex'),
        'title_template'=> '{{- title }}',
        'icon'          => 'fa fa-newspaper-o',
        'popup_size'          => 'medium',
    )
);