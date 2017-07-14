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
    <div id="post-<?php the_ID(); ?>" <?php post_class('nex-v5-post') ?>>
        <?php if(has_post_thumbnail()) : ?>
            <div class="nex-cover">
                <?php the_post_thumbnail() ?>
            </div>
        <?php endif ?>
        <div class="nex-header">
            <h2><a href="<?php the_permalink() ?>" class="nex-cch"><?php the_title() ?></a></h2>
        </div>
        <div class="nex-footer">
            <p><?php
                esc_html_e('By ', 'nex');
                the_author();
                esc_html_e(' on ', 'nex');
                the_time('F j, Y');
                esc_html_e(' in ', 'nex');
                the_category(' | '); ?></p>
        </div>
    </div>
</div>

<?php if( $loop->current_post > 0 && ($loop->current_post + 1) % $col_nr == 0 && $loop->current_post + 1 < $loop->post_count) echo '</div><div class="row">';