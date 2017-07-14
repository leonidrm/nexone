<?php
if (!defined('FW')) die('Forbidden');

$cfg = array(
    'page_builder' => array(
        'title'         => esc_html__('Progress', 'nex'),
        'description'   => esc_html__('Section with progress steps', 'nex'),
        'tab'           => esc_html__('Nex', 'nex'),
        'popup_size'    => 'small', // can be large, medium or small
        'icon'          => 'fa fa-bar-chart'
    )
);