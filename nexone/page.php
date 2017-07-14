<?php if ( ! defined( 'ABSPATH' ) ) { die( 'Direct access forbidden.' ); }
get_header();
$sidebar_position = nex_get_sidebar_position();
$page_class = $page_layout = '';

if( defined('FW') ){
	$page_class  = fw_ext_page_builder_is_builder_post( get_the_ID() ) ? ' page-builder-used' : '';
	$page_layout = fw_get_db_post_option(get_the_ID(), 'layout_type');
}
?>
<div id="main" role="main" class="nex_site_container<?php esc_attr_e( $page_class );?>">
    <?php if($page_layout === 'boxed') echo '<div class="container">' ?>
    <?php if($sidebar_position != 'full_width'): ?>
        <div class="row">
            <?php endif ?>
            <?php if($sidebar_position == 'left') get_sidebar() ?>
            <?php if($sidebar_position != 'full_width'): ?>
                <div class="col-md-9">
                    <?php endif ?>
                    <?php
                        while ( have_posts() ) : the_post();

                            get_template_part( 'template-parts/content', 'page' );

                        endwhile; // End of the loop.
                    ?>
                    <?php if($sidebar_position != 'full_width'): ?>
                </div><!-- col -->
            <?php endif ?>
            <?php if($sidebar_position == 'right') get_sidebar() ?>
            <?php if($sidebar_position != 'full_width'): ?>
        </div>
    <?php endif ?>
	<?php if($page_layout === 'boxed') echo '</div>' ?>
</div><!-- #main -->
<?php
get_footer();