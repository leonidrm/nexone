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
		<div class="nex-post-container">
			<div class="nex-header">
				<?php if(has_category()) : ?>
					<h5><?php the_category(' ') ?></h5>
				<?php endif ?>
				<h4><a class="nex-cch" href="<?php the_permalink() ?>"><?php the_title() ?></a></h4>
			</div>
			<div class="nex-content">
				<?php the_excerpt() ?>
			</div>
			<div class="nex-footer">
				<a class="read-more" href="<?php the_permalink() ?>"><?php esc_html_e('read more','nex') ?></a>
				<?php printf('<p>%s %s</p>', human_time_diff( get_the_time('U'), current_time('timestamp') ), esc_html__('ago', 'nex')) ?>
			</div>
		</div>
	</div>
</div>