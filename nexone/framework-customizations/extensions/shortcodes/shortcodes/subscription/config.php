<?php
if (!defined('FW')) die('Forbidden');

if (class_exists('WYSIJA'))

$cfg = array(
    'page_builder' => array(
        'title'         => esc_html__('Subscription', 'nex'),
        'description'   => esc_html__('Section with subscription form', 'nex'),
        'tab'           => esc_html__('Nex', 'nex'),
        'popup_size'    => 'medium',
        'title_template'=> '{{- title }} - {{- o.title }}',
        'icon'          => 'fa fa-envelope-o',
    )
);