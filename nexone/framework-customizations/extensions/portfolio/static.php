<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$ext_instance = fw()->extensions->get( 'portfolio' );

fw_include_file_isolated( $ext_instance->get_path( '/static.php' ) );

if ( ! is_admin() ) {

	$settings = $ext_instance->get_settings();
	wp_enqueue_script(
		'fw-extension-' . $ext_instance->get_name() . '-theme-script',
		$ext_instance->locate_js_URI( 'portfolio-script' ),
		array( 'jquery', 'isotope-min' ),
		$ext_instance->manifest->get_version(),
		true
	);

	wp_enqueue_script(
		'imagesloaded-min',
		$ext_instance->locate_js_URI( 'imagesloaded.pkgd.min' ),
		array( 'jquery', 'isotope-min' ),
		$ext_instance->manifest->get_version(),
		true
	);
}



