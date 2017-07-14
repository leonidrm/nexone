<?php
if (!defined('FW')) die('Forbidden');

$options = array(
    'title' => array(
        'type'  => 'text',
        'label' => esc_html__('Title', 'nex'),
        'desc'  => esc_html__('Title of the section', 'nex')
    ),
    'title_color' => array(
        'type'  => 'color-picker',
        'label' => esc_html__('Title Color', 'nex'),
        'desc'  => esc_html__('Text color', 'nex'),
    ),
    'descr' => array(
        'type'  => 'textarea',
        'label' => esc_html__('Description', 'nex'),
        'desc'  => esc_html__('Description of the section / Subtitle', 'nex'),
        'help'  => esc_html__('Will appear below title', 'nex')
    ),
    'descr_color' => array(
        'type'  => 'color-picker',
        'label' => esc_html__('Description Color', 'nex'),
        'desc'  => esc_html__('Text color', 'nex'),
    ),
);