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
    <div id="post-<?php the_ID(); ?>" <?php post_class('nex-v2-post'); ?>>
	    <?php if(has_post_thumbnail()) : ?>
            <div class="nex-cover">
			    <?php the_post_thumbnail(); ?>
            </div>
	    <?php endif ?>
        <div class="nex-header">
            <h2><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h2>
            <p class="nex-cc"><?php printf('<a class="nex-cc" href="%s">%s</a>', get_day_link(get_the_time('Y'), get_the_time('m'),get_the_time('j')), get_the_time('j F Y')); ?></p>
        </div>
    </div>
</div>
<?php if( $loop->current_post > 0 && ($loop->current_post + 1) % $col_nr == 0 && $loop->current_post + 1 < $loop->post_count) echo '</div><div class="row">';