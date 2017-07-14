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
    <div id="post-<?php the_ID(); ?>" <?php post_class('nex-v4-post'); ?>>
        <?php if(has_post_thumbnail()) : ?>
            <div class="post-cover">
                <?php the_post_thumbnail() ?>
            </div>
        <?php endif ?>
        <div class="post-header">
            <?php printf('<div class="nex-author"><div class="nex-avatar nex-bc">%s</div><h4>%s %s</h4></div>', get_avatar(get_the_author_meta( 'ID' ), 92),esc_html__(' by ','nex'), get_the_author()) ?>
            <h2><a class="nex-cch" href="<?php the_permalink() ?>"><?php the_title() ?></a></h2>
        </div>
        <div class="post-content">
            <?php the_excerpt() ?>
        </div>

        <div class="post-footer">
            <p><i class="nex-cc fa fa-comments-o"></i> <?php comments_number('0','1 comment', '% comments') ?></p>
        </div>

    </div>
</div>
<?php if( $loop->current_post > 0 && ($loop->current_post + 1) % $col_nr == 0 && $loop->current_post + 1 < $loop->post_count) echo '</div><div class="row">';