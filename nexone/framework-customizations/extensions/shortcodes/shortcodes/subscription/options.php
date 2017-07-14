<?php
if (!defined('FW')) die('Forbidden');

$options = array(
    'title' => array(
        'type'  => 'text',
        'label' => esc_html__('Title', 'nex'),
        'desc'  => esc_html__('Subscription form title', 'nex')
    ),
    'lists' => array(
	    'type'  => 'text',
	    'label' => esc_html__('List(s) Name', 'nex'),
	    'desc'  => esc_html__('List(s) name you want to add all the subscribers to. Use comma to specify more lists', 'nex'),
	    'value' => esc_attr__('list1,list2', 'nex')
    ),
    'placeholder' => array(
	    'type'  => 'text',
	    'label' => esc_html__('Placeholder', 'nex'),
	    'desc'  => esc_html__('Subscription form input placeholder', 'nex'),
	    'value' => esc_attr__('Enter your Email Address', 'nex')
    )
);