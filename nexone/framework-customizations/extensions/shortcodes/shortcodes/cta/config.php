<?php
if (!defined('FW')) die('Forbidden');

$cfg = array(
    'page_builder' => array(
        'title'         => esc_html__('CTA', 'nex'),
        'description'   => esc_html__('Call to action. Appealing section with text and button', 'nex'),
        'tab'           => esc_html__('Nex', 'nex'),
        'popup_size'    => 'large',
        'title_template'=> '{{- title }} - {{- o.button_label }}',
        'icon'          => 'fa fa-exclamation'
    )
);