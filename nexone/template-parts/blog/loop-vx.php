<?php if ( ! defined( 'ABSPATH' ) ) { die( 'Direct access forbidden.' ); }
/**
 * @var $col_class
 */
?>

<div id="post-<?php the_ID(); ?>" class="<?php echo esc_attr($col_class) ?>">
	<div <?php post_class() ?>>
		<?php if(has_post_thumbnail()): ?>
			<div class="nex-cover">
				<?php the_post_thumbnail() ?>
			</div>
		<?php endif ?>
		<div class="nex-header">
			<?php if(has_category()) : ?>
			    <h4 class="nex-cc"><?php the_category(', '); ?></h4>
            <?php endif ?>
			<h2><a class="nex-cch" href="<?php the_permalink() ?>"><?php the_title() ?></a></h2>
			<p>
				<?php _e('by', 'nex') ?>
				<?php the_author_posts_link() ?>
				<span><i class="ion-ios-time-outline"></i>
					<?php the_time('F j, Y'); ?>
                </span>
			</p>
		</div>
		<div class="nex-content">
			<?php the_excerpt() ?>
		</div>
		<div class="nex-footer">
			<ul class="nex-details">
				<li><i class="ion-ios-eye-outline"></i> <?php nex_the_post_views() ?></li>
				<li><i class="ion-ios-chatbubble-outline"></i> <?php comments_number( '0', '1', '%' ); ?></li>
			</ul>
			<a href="<?php the_permalink() ?>" class="nex-readmore nex-cch"><?php _e('read more','nex') ?> <i class="ion-ios-arrow-thin-right"></i></a>
		</div>
	</div>
</div>
