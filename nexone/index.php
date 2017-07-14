<?php if ( ! defined( 'ABSPATH' ) ) { die( 'Direct access forbidden.' ); }
global $wp_query;
get_header();
$sidebar_position = nex_get_sidebar_position();
?>
<!-- content start -->
<section class="section">
    <div class="container">
        <?php if($sidebar_position != 'full_width'): ?>
            <div class="row">
                <?php endif ?>
                <?php if($sidebar_position == 'left')
                    get_sidebar() ?>
                <div class="col-md-<?php print $sidebar_position != 'full_width' ? '9' : '12' ?>">
                    <div class="row isotope-container">
                        <?php
                        if ( have_posts() ) :

                            while ( have_posts() ) : the_post();

                                get_template_part( 'template-parts/content', 'post-loop' );

                            endwhile;

                        else :

                            get_template_part( 'template-parts/content', 'none' );

                        endif; ?>
                    </div><!-- /row -->
                    <?php get_template_part( 'template-parts/blog/blog-nav' ); ?>
                </div><!-- /col -->
                <?php if($sidebar_position == 'right')
                    get_sidebar() ?>
                <?php if($sidebar_position != 'full_width'): ?>
            </div><!-- /row -->
        <?php endif ?>
    </div><!-- /container -->
</section>
<!-- content end -->
<?php
get_footer();