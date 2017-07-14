<?php if ( ! defined( 'ABSPATH' ) ) { die( 'Direct access forbidden.' ); }

print $before_widget;
if (!empty($title))
    print $before_title . $title . $after_title;
?>
<ul>
    <?php if($recent_posts_query->have_posts()) :
        while ( $recent_posts_query->have_posts() ) : $recent_posts_query->the_post() ?>
            <li<?php if(!has_post_thumbnail()) echo ' class="no-thumb"' ?>>
                <?php if(has_post_thumbnail()) : ?>
                    <a href="<?php the_permalink() ?>">
                        <?php the_post_thumbnail( 'thumbnail' ); ?>
                    </a>
                <?php endif ?>
                <h4><a class="nex-cch" href="<?php the_permalink() ?>"><?php the_title() ?></a></h4>
                <p>
                    <?php if(!empty($show_comments)) : ?>
                        <span>
                            <i class="ion-ios-chatbubble-outline"></i>
                            <?php comments_number( '0', '1', '%'); ?>
                        </span>
                    <?php endif; ?>
                    <?php the_time('F j, Y') ?>
                </p>
            </li>
        <?php endwhile;
    endif;?>
</ul>
<?php print $after_widget;