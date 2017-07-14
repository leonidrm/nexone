<?php if ( ! defined( 'ABSPATH' ) ) { die( 'Direct access forbidden.' ); }
get_header();
$sidebar_position = nex_get_sidebar_position();
?>
<!-- start post -->
<section class="section">
    <div class="container">
        <?php if($sidebar_position != 'full_width'): ?>
            <div class="row">
                <?php endif ?>
                <?php if($sidebar_position == 'left') get_sidebar() ?>
                    <div class="col-md-<?php print $sidebar_position != 'full_width' ? '9' : '12' ?>">
                        <?php while ( have_posts() ) : the_post();

                            get_template_part( 'template-parts/content', 'post-single' );

                        endwhile; ?>
                    </div><!-- /col -->
                <?php if($sidebar_position == 'right') get_sidebar() ?>
                <?php if($sidebar_position != 'full_width'): ?>
            </div><!-- /row -->
        <?php endif ?>
    </div><!-- /container -->
</section>
<!-- end post -->

<?php
get_footer();
