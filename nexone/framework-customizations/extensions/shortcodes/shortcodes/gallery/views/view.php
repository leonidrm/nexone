<?php
if (!defined('FW')) die('Forbidden');
/**
* @var $atts
*/
$layout_type = $atts['layout_type'];
$cols = $atts['cols'];
$images = fw_akg('images', $atts);
$image_size = fw_akg('image_size/img_size', $atts);
$width  = 555;
$height = false;
$crop   = true;

switch ( $cols ) {
    case 'col-md-6';
        $width = 555;
        break;
    case 'col-md-4';
        $width = 360;
        break;
    case 'col-md-3';
        $width = 263;
        break;
    default:
        $width = 360;
        break;
}

if($image_size !== 'auto') {
	$width  = fw_akg('image_size/manual/width', $atts) ? : $width;
	$height = fw_akg('image_size/manual/height', $atts) ? : $height;
}
?>

<!-- Gallery v1 start -->
<div class="nex-v1-gallery">
    <div class="row isotope-container">
        <?php foreach ($images as $image) :
            $attachment = get_post($image['attachment_id']);
            $captions[ get_post_thumbnail_id() ] = $attachment->post_title;
            $image = fw_resize( $attachment->ID, $width, $height, $crop );
            ?>
            <div class="<?php esc_attr_e($cols) ?>">
                <div class="nex-item">
                    <div class="nex-hover">
                        <?php printf('<a href="%s" class="swipebox" title="%s"><i class="fa fa-plus-circle"></i></a>',$attachment->guid, $attachment->post_title) ?>
                    </div>
                    <img src="<?php esc_attr_e($image) ?>"
                         alt="<?php esc_attr_e($attachment->post_title) ?>"
                    />
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
<!-- Gallery v1 end -->
