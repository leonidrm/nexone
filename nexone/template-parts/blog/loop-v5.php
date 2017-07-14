<?php if ( ! defined( 'ABSPATH' ) ) { die( 'Direct access forbidden.' ); }
/**
 * @var $col_class
 */
?>
<div class="<?php esc_attr_e($col_class) ?> col-xs-12 col-sm-6">
	<div id="post-<?php the_ID(); ?>" <?php post_class() ?>>
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