<?php if ( ! defined( 'ABSPATH' ) ) { die( 'Direct access forbidden.' ); }
nex_set_post_views();?>
<!-- start post v6 -->
<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <?php if(has_post_thumbnail()) : ?>
        <div class="nex-cover">
            <?php the_post_thumbnail() ?>
        </div>
    <?php endif ?>
    <div class="nex-header">
        <h2><?php the_title() ?></h2>
        <ul>
            <li><i class="nex-cc ion-ios-list-outline"></i><?php esc_html_e('on','nex'); ?> <?php the_date('F j, Y'); ?></li>
            <li><i class="nex-cc ion-ios-person-outline"></i><?php esc_html_e('by','nex'); ?> <?php the_author_posts_link() ?> </li>
            <li><i class="nex-cc ion-ios-folder-outline"></i><?php esc_html_e('in','nex'); ?> <?php the_category(', '); ?></li>
            <li><i class="nex-cc ion-ios-eye-outline"></i><?php nex_the_post_views() ?> <?php esc_html_e('views','nex'); ?></li>
            <li><i class="nex-cc ion-ios-chatbubble-outline"></i><?php comments_number( esc_html__('no comments','nex'), esc_html__('1 comment','nex'), esc_html__('% comments','nex') ); ?></li>
        </ul>
    </div>
    <div class="nex-content">
        <?php the_content() ?>
    </div>
    <?php nex_the_post_pagination() ?>
    <div class="nex-footer">
        <?php nex_the_share_platforms() ?>
        <?php the_tags('<ul class="nex-tags"><li><i class="nex-cc ion-ios-pricetags-outline"></i></li><li>',',</li><li>','</li></ul> ') ?>
    </div>
    <?php if (defined('FW') && fw_get_db_settings_option('show_bio') === 'on' && get_the_author_meta('description')) : ?>
        <div class="nex-about-author">
            <div class="nex-avatar">
                <?php echo get_avatar( get_the_author_meta('user_email'), $size = '100' ); ?>
            </div>
            <h4><?php the_author(); ?></h4>
            <?php the_author_meta( 'description' ); ?>
        </div>
    <?php endif; ?>
    <ul class="nex-pagination-arrows">
        <li><a class="nex-cch" href="<?php echo esc_url( get_permalink( get_next_post() ) ); ?>"><?php esc_html_e( 'NEXT POST', 'nex' ); ?> <i class="ion-ios-arrow-thin-right"></i></a></li>
        <li><a class="nex-cch" href="<?php echo esc_url( get_permalink( get_previous_post() ) ); ?>"><i class="ion-ios-arrow-thin-left"></i> <?php esc_html_e( 'PREVIOUS POST', 'nex' ); ?></a></li>
    </ul>
</div>
<!-- end post v6-->
<?php if ( comments_open() || get_comments_number() )
    comments_template(); ?>