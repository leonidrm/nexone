<?php
if (!defined('FW')) die('Forbidden');

$cfg = array(
    'page_builder' => array(
        'title'         => esc_html__('Pricing List', 'nex'),
        'description'   => esc_html__('Blocks with pricing list, title + description + price', 'nex'),
        'tab'           => esc_html__('Nex', 'nex'),
        'popup_size'    => 'small', // can be large, medium or small
        'icon'          => 'fa fa-list-alt'
    )
);