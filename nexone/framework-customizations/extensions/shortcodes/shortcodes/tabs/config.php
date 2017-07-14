<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$cfg = array();

$cfg['page_builder'] = array(
	'title'       => esc_html__( 'Tabs', 'nex' ),
	'description' => esc_html__( 'Add some Tabs', 'nex' ),
	'tab'         => esc_html__( 'Content Elements', 'nex' ),
);