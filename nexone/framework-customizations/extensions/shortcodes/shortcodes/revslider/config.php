<?php
if (!defined('FW')) die('Forbidden');

if(class_exists('RevSliderFront'))

$cfg = array(
    'page_builder' => array(
        'title'         => esc_html__('RevSlider', 'nex'),
        'description'   => esc_html__('Inserts slider created with revolution slider plugin', 'nex'),
        'tab'           => esc_html__('Nex', 'nex'),
        'popup_size'    => 'small',
        'title_template'=> '{{- title }} - {{- o.alias }}',
        'icon'          => 'dashicons dashicons-update',
    )
);