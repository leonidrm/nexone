<?php
/**
 * @var $cols
 */
switch ($cols) :
	case 'col-md-6';
		$col_nr = 2;
		break;
	case 'col-md-4';
		$col_nr = 3;
		break;
	case 'col-md-3';
		$col_nr = 4;
		break;
	case 'col-md-2';
		$col_nr = 6;
		break;
	default:
		$col_nr = 2;
endswitch;
?>

<div class="<?php esc_attr_e($cols) ?> col-xs-12 col-sm-6">
    <div id="post-<?php the_ID(); ?>" <?php post_class('nex-vx-post'); ?>>
        <?php if(has_post_thumbnail()): ?>
            <div class="nex-cover">
                <?php the_post_thumbnail() ?>
            </div>
        <?php endif ?>
        <div class="nex-header">
            <?php if(has_category()) : ?>
                <h4 class="nex-cc"><?php the_category(', ') ?></a></h4>
            <?php endif ?>
            <h2><a href="<?php the_permalink() ?>" class="nex-cch"><?php the_title() ?></a></h2>
            <?php printf('<p>%s %s <span><i class="ion-ios-time-outline"></i> %s</span></p>',
                esc_html__('by','nex'),
                get_the_author(),
                get_the_time(' F j, Y')) ?>
        </div>
        <div class="nex-content">
            <?php the_excerpt() ?>
        </div>
        <div class="nex-footer">
            <ul class="nex-details">
                <li><i class="ion-ios-eye-outline"></i> <?php nex_the_post_views() ?></li>
                <li><i class="ion-ios-chatbubble-outline"></i> <?php comments_number('0','1', '%') ?></li>
            </ul>
            <a href="<?php the_permalink() ?>" class="nex-readmore nex-cch"><?php esc_html_e('read more','nex') ?> <i class="ion-ios-arrow-thin-right"></i></a>
        </div>
    </div>
</div>

<?php if( $loop->current_post > 0 && ($loop->current_post + 1) % $col_nr == 0 && $loop->current_post + 1 < $loop->post_count) echo '</div><div class="row">';