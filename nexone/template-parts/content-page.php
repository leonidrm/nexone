<?php if ( ! defined( 'ABSPATH' ) ) { die( 'Direct access forbidden.' ); } ?>

<div id="page-<?php the_ID(); ?>" <?php post_class(); ?>>
    <?php the_content( ); ?>

    <?php if ( comments_open() || get_comments_number() )
        comments_template(); ?>
</div>
