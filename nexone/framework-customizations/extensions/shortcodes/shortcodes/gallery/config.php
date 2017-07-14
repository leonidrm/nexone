<?php
if (!defined('FW')) die('Forbidden');

$cfg = array(
    'page_builder' => array(
        'title'         => esc_html__('Gallery', 'nex'),
        'description'   => esc_html__('Blocks with images, image + full screen zoom', 'nex'),
        'tab'           => esc_html__('Nex', 'nex'),
        'popup_size'    => 'large', // can be large, medium or small
        'icon'          => 'fa fa-picture-o'
    )
);