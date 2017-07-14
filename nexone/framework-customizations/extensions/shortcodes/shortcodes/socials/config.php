<?php
if (!defined('FW')) die('Forbidden');

$cfg = array(
    'page_builder' => array(
        'title'         => esc_html__('Socials', 'nex'),
        'description'   => esc_html__('Section with social links from Theme Options', 'nex'),
        'tab'           => esc_html__('Nex', 'nex'),
        'popup_size'    => 'small', // can be large, medium or small
        'icon' => 'fa fa-share-alt',
    )
);