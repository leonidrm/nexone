<?php
if (!defined('FW')) die('Forbidden');

$cfg = array(
    'page_builder' => array(
        'title'         => esc_html__('Working hours', 'nex'),
        'description'   => esc_html__('Blocks with a table with working hours. Week day + time period', 'nex'),
        'tab'           => esc_html__('Nex', 'nex'),
        'popup_size'    => 'small', // can be large, medium or small
        'icon'          => 'fa fa-clock-o'
    )
);