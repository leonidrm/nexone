<?php if ( ! defined( 'ABSPATH' ) ) { die( 'Direct access forbidden.' ); }
/**
 * @var $col_class
 */
?>

<div class="<?php esc_attr_e($col_class) ?> col-xs-12 col-sm-6">
	<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
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