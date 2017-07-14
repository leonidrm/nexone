<?php
if (!defined('FW')) die('Forbidden');
/**
 * @var $atts
 */
$posts_categories = $categs_slug = array();
$show_filter = $show_category = $show_load_more = $order = $col_class = $nr ='';
extract($atts);
//Portfolio settings
$ext_portfolio_instance = fw()->extensions->get( 'portfolio' );
$ext_portfolio_settings = $ext_portfolio_instance->get_settings();

//Portfolio thumbnails size
$height = false;
$crop   = true;

switch ( $col_class ) {
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
$image_size = fw_akg('image_size/img_size', $atts);

if($image_size !== 'auto') {
	$width  = fw_akg('image_size/manual/width', $atts) ? : $width;
	$height = fw_akg('image_size/manual/height', $atts) ? : $height;
}

$taxonomy = $ext_portfolio_settings['taxonomy_name'];

$layout = $atts['layout_type'];

$args = array( 
    'post_type'      => 'fw-portfolio',
    'post_status'    => 'publish',
    'posts_per_page' => $nr,
    'order'          => $order,
);

if(!empty($category)) {
    $categs_slug = explode(',', $category);
    $args['tax_query'] = array(
        array(
            'taxonomy' => $taxonomy,
            'field'    => 'slug',
            'terms'    => $categs_slug,
        ),
    );
}

$nex_query = new WP_Query( $args );

if($show_filter !== 'off' && $nex_query->have_posts()) {
    while($nex_query->have_posts()){
        $nex_query->the_post();
        $categs = wp_get_post_terms(get_the_ID(), $taxonomy );
        foreach($categs as $category) {
            if($show_category !== 'on' && in_array($category->slug, $categs_slug)) continue;
            if ( ! in_array( $category->term_id, $posts_categories ) ) {
                $posts_categories[ $category->term_id ] = array(
                    'slug' => $category->slug,
                    'name' => $category->name,
                );
            }
        }
    }
}

$load_more = array(
    'terms'         => $categs_slug,
    'posts_per_page'=> $nr,
    'paged'         => 2,
    'order'         => $order,
    'button_label'  => $button['yes']['button_label'],
    'no_posts_text' => esc_html__('No more Items','nex'),
    'col_class'     => $col_class,
	'width'         => $width,
    'height'        => $height,
);

include(  fw()->extensions->get( 'portfolio' )->locate_path('/shortcodes/portfolio/views/portfolio-' . $layout . '.php'));

unset( $ext_portfolio_instance );
unset( $ext_portfolio_settings );