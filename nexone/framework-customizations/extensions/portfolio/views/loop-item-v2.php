<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
$categs = get_the_terms( get_the_ID(), $taxonomy );
$classes = array();
if ( ! empty( $categs ) ) {
    foreach ( $categs as $categ ) {
        $classes[ ] = $categ->slug;
    }
}
$col_class = isset($col_class) ? $col_class : 'col-md-3';
?>
<div class="<?php esc_attr_e($col_class) ?> isotopeItem <?php echo implode(' ', $classes) ?>">
    <div class="nex-item">
	    <?php
	    $attachment = get_post( get_post_thumbnail_id() );
	    $captions[ get_post_thumbnail_id() ] = $attachment->post_title;
	    $image = fw_resize( get_post_thumbnail_id(), $width, $height, true );
	    ?>
        <div class="nex-hover nex-bgcb">
            <a href="<?php the_post_thumbnail_url() ?>" class="swipebox nex-zoom" title="<?php esc_attr_e($attachment->post_title) ?>">
                <i class="fa fa-plus-circle"></i>
            </a>
            <h4><a href="<?php the_permalink( ); ?>"><?php the_title() ?> <i class="ion-ios-play"></i></a></h4>
        </div>

        <img src="<?php esc_attr_e($image) ?>"
             alt="<?php esc_attr_e($attachment->post_title) ?>"
             width="<?php esc_attr_e($width) ?>"
             height="<?php esc_attr_e($height) ?>"
        />
    </div>
</div>