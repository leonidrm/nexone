<?php
if (!defined('FW')) die('Forbidden');
$sliders = array();
if ( class_exists( 'RevSlider' ) ) {
	$rev_slider = new RevSlider();
	$sliders = $rev_slider->getAllSliderAliases();
	//crate array where key equals to value
	$sliders = array_combine($sliders, $sliders);
}
$options = array(
    'alias' => array(
	    'type'  => 'select',
	    'label' => __('Slider Alias', 'nex'),
	    'desc'  => __('Pick a slider alias from the ones created with the revolution slider plugin', 'nex'),
	    'choices' => $sliders
    )
);