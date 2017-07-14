<?php if ( ! defined( 'ABSPATH' ) ) { die( 'Direct access forbidden.' ); }
get_header();
get_template_part( 'template-parts/breadcrumbs' );

$ext_portfolio_instance = fw()->extensions->get( 'portfolio' );
$ext_portfolio_settings = $ext_portfolio_instance->get_settings();
$col_class = 'col-md-4';

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

$taxonomy        = $ext_portfolio_settings['taxonomy_name'];
$term            = get_term_by( 'slug', get_query_var( 'term' ), $taxonomy );
$term_id         = ( ! empty( $term->term_id ) ) ? $term->term_id : 0;
$categories      = fw_ext_portfolio_get_listing_categories( $term_id );

$load_more = array(
    'posts_per_page'=> get_option( 'posts_per_page' ),
    'paged'         => 2,
    'no_posts_text' => esc_html__('No more Items','nex'),
    'col_class'     => $col_class
);
?>
<div class="section">
    <!-- Portfolio v2 start -->
    <div class="nex-v2-portfolio">
        <div class="container">
            <?php if ( ! empty( $categories ) ) : ?>
                <ul class="isotopeFilter">
                    <li><button class="nex-cc nex-bgcb nex-bgca button active" data-filter="*"><?php esc_html_e( 'All', 'nex' ); ?></button></li>
                    <?php foreach ( $categories as $category ) : ?>
                        <li><button class="nex-cc nex-bgcb nex-bgca button" data-filter=".<?php esc_attr_e($category->slug) ?>"><?php esc_html_e($category->name); ?></button></li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>
            <div class="row isotope-container">
                <?php if ( have_posts() ) :
                    while ( have_posts() ) : the_post();
                        include(  fw()->extensions->get( 'portfolio' )->locate_view_path('loop-item') );
                    endwhile;
                else :
                    get_template_part( 'content', 'none' );
                endif; ?>
            </div>
            <?php global $wp_query;
            if($wp_query->max_num_pages > 1) : ?>
                <div class="nex-portfolio-loadmore" data-ajax='<?php echo json_encode($load_more) ?>'>
                    <a href="#" class="nex-v5-button nex-bc nex-bgca nex-bgcb"><?php esc_html_e( 'Load More', 'nex' ); ?></a>
                </div>
            <?php endif; ?>
        </div>
    </div>
    <!-- Portfolio v2 end -->
</div>
<?php 
unset( $ext_portfolio_instance );
unset( $ext_portfolio_settings );
set_query_var( 'fw_portfolio_loop_data', '' );
get_footer();