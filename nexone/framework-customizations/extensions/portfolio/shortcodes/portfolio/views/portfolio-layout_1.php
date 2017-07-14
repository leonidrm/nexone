<?php
/**
 * @var array $load_more
 */
?>
<!-- Portfolio v1 start -->
<div class="nex-v1-portfolio">
	<div class="container">
		<?php if ( ! empty( $posts_categories ) && $show_filter !== 'off') : ?>
			<ul class="isotopeFilter" data-ajax='<?php echo json_encode($load_more) ?>'>
				<li>
					<button class="nex-cc nex-bgcb nex-bgca button active" data-filter="*">
						<?php esc_html_e('ALL','nex')?>
					</button>
				</li>
				<?php foreach($posts_categories as $posts_category)
					printf('<li><button class="nex-cc nex-bgcb nex-bgca button" data-filter=".%s">%s</button></li>',
						$posts_category['slug'], $posts_category['name']) ?>
			</ul>
		<?php endif ?>
		<div class="row isotope-container">
			<?php if( $nex_query->have_posts() ) :
				while ( $nex_query->have_posts() ) : $nex_query->the_post();
					include(  fw()->extensions->get( 'portfolio' )->locate_view_path('loop-item-v2') );
				endwhile;
				wp_reset_postdata();
			else :
				get_template_part( 'content', 'none' );
			endif; ?>
		</div>
		<?php if( $button['show_button'] !== 'no' && $nex_query->max_num_pages > 1 ) :?>
			<div class="nex-portfolio-loadmore" data-ajax='<?php echo json_encode($load_more) ?>'>
				<a href="#" class="nex-v5-button nex-bc nex-bgca nex-bgcb"><?php esc_html_e($button['yes']['button_label']) ?></a>
			</div>
		<?php endif; ?>
	</div>
</div>
<!-- /Portfolio v1 -->