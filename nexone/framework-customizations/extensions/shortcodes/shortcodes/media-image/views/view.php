<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

/**
 * @var array $atts
 */

if ( empty( $atts['image'] ) ) {
	return;
}

$width  = ( is_numeric( $atts['width'] ) && ( $atts['width'] > 0 ) ) ? $atts['width'] : '';
$height = ( is_numeric( $atts['height'] ) && ( $atts['height'] > 0 ) ) ? $atts['height'] : '';

if ( ! empty( $width ) && ! empty( $height ) ) {
	$image = fw_resize( $atts['image']['attachment_id'], $width, $height, true );
} else {
	$image = $atts['image']['url'];
}

$alt = get_post_meta($atts['image']['attachment_id'], '_wp_attachment_image_alt', true);

$img_attributes = array(
	'src' => $image,
	'alt' => $alt ? $alt : $image
);

if(!empty($width)){
	$img_attributes['width'] = $width;
}

if(!empty($height)){
	$img_attributes['height'] = $height;
}

$align_class = $atts['align'];

if ( empty( $atts['link'] ) ) {
	echo '<div class="' . $align_class .'">' . fw_html_tag('img', $img_attributes) . '</div>';
} else {
	echo '<div class="' . $align_class .'">' . fw_html_tag('a', array(
		'href' => $atts['link'],
		'target' => $atts['target'],
	), fw_html_tag('img',$img_attributes)) . '</div>';
}
