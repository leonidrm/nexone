<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$section_id = !empty($atts['section_id']) ? "id='" . sanitize_html_class($atts['section_id']) . "'" : '';

$pad_top = 'padding-top:100px;';
if ( isset( $atts['padding_top'] ) && $atts['padding_top'] != '' ) {
	$pad_top = 'padding-top:' . $atts['padding_top'] . 'px;';
}

$pad_bottom = 'padding-bottom: 60px;';
if ( isset( $atts['padding_bottom'] ) && $atts['padding_bottom'] != '' ) {
	$pad_bottom = 'padding-bottom:' . $atts['padding_bottom'] . 'px;';
}

$pad_right = 'padding-right:0px;';
if ( isset( $atts['padding_right'] ) && $atts['padding_right'] != '' ) {
	$pad_right = 'padding-right:' . $atts['padding_right'] . 'px;';
}

$pad_left = 'padding-bottom: 0px;';
if ( isset( $atts['padding_left'] ) && $atts['padding_left'] != '' ) {
	$pad_left = 'padding-left:' . $atts['padding_left'] . 'px;';
}

$margin_top = 'margin-top:' . $atts['margin_top'] . 'px;';
$margin_bottom = 'margin-bottom:' . $atts['margin_bottom'] . 'px;';

$bg_color       = '';
$bg_gradient    = '';
$bg_image       = '';
$bg_size        = '';
$bg_filter      = '';
$bg_video_data_attr    = '';
$section_extra_classes = '';
$bd_top_size    = '';
$bd_bottom_size = '';
$bd_top_color   = '';
$bd_bottom_color= '';
$bd_style       = '';

if(fw_akg('borders/border_type', $atts) === 'on'){
    $bd_top_size    = fw_akg('borders/on/bd_top_size', $atts);
    $bd_bottom_size = fw_akg('borders/on/bd_bottom_size', $atts);
    $bd_top_color   = fw_akg('borders/on/bd_top_color', $atts);
    $bd_bottom_color   = fw_akg('borders/on/bd_bottom_color', $atts);

    $bd_style = "border-top: " . $bd_top_size . "px solid " . $bd_top_color . ";";
    $bd_style .="border-bottom: " . $bd_bottom_size . "px solid " . $bd_bottom_color . ";";
}

if($atts['background']['background_type'] == 'background_color') {
	if ( ! empty( $atts['background']['background_color']['bg_color'] ) ) {
		$bg_color = 'background-color:' . $atts['background']['background_color']['bg_color'] . ';';
	} elseif ( ! empty( $atts['background']['background_color']['bg_gradient']['primary'] ) || ! empty( $atts['background']['background_color']['bg_gradient']['secondary'] ) ) {
		$gradient    = $atts['background']['background_color']['bg_gradient'];
		$bg_gradient = 'background-image:linear-gradient(225deg, ' . $gradient['primary'] . ' 0%, ' . $gradient['secondary'] . ' 100%);';
	}
} elseif ( $atts['background']['background_type'] == 'background_image' && ! empty( $atts['background']['background_image']['bg_image'] ) && ! empty( $atts['background']['background_image']['bg_image']['data']['icon'] ) ) {
	$bg_image  = 'background-image:url(' . $atts['background']['background_image']['bg_image']['data']['icon'] . ');';
	$bg_filter = !empty($atts['background']['background_image']['bg_image_filter']) ? '<div class="bg-transparency" style="background: ' . $atts['background']['background_image']['bg_image_filter'] . '"></div>' : '';
	$bg_size = !empty($atts['background']['background_image']['bg_size']) && $atts['background']['background_image']['bg_size'] == 'on' ? 'background-size: cover;' : '';
} elseif ( $atts['background']['background_type'] == 'background_video' && ! empty( $atts['background']['background_video']['bg_video'] ) ) {
	$filetype           = wp_check_filetype( $atts['background']['background_video']['bg_video'] );
	$filetypes          = array( 'mp4' => 'mp4', 'ogv' => 'ogg', 'webm' => 'webm', 'jpg' => 'poster' );
	$filetype           = array_key_exists( (string) $filetype['ext'], $filetypes ) ? $filetypes[ $filetype['ext'] ] : 'video';
	$data_name_attr = version_compare( fw_ext('shortcodes')->manifest->get_version(), '1.3.9', '>=' ) ? 'data-background-options' : 'data-wallpaper-options';
	$bg_video_data_attr = $data_name_attr.'="' . fw_htmlspecialchars( json_encode( array( 'source' => array( $filetype => $atts['background']['background_video']['bg_video'] ) ) ) ) . '"';
	$section_extra_classes .= ' background-video';
}

$section_style   = ( $bg_gradient || $bg_color || $bg_image || $pad_right || $pad_left || $pad_top || $pad_bottom || $bd_style ) ? 'style="' . esc_attr($bg_gradient . $bg_color . $bg_image . $bg_size . $pad_top . $pad_bottom . $pad_right . $pad_left . $margin_top . $margin_bottom . $bd_style) . '"' : '';
$container_class = ( isset( $atts['is_fullwidth'] ) && $atts['is_fullwidth'] ) ? 'fw-container-fluid' : 'fw-container';
?>

<section <?php print $section_id ; ?> class="fw-main-row <?php print $section_extra_classes ?>" <?php print $section_style; ?> <?php print $bg_video_data_attr; ?>>
    <?php print $bg_filter ?>
	<div class="<?php esc_attr_e($container_class); ?>">
		<?php echo do_shortcode( $content ); ?>
	</div>
</section>
