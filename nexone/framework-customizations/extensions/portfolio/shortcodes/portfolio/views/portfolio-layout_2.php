<?php
/**
 * @var array $load_more
 */
?>
<!-- Portfolio v2 start -->
<div class="nex-v2-portfolio">
	<?php if ( ! empty( $posts_categories ) && $show_filter !== 'off') : ?>
        <div class="container">
            <ul class="isotopeFilter">
                <li>
                    <button class="button nex-ccactive nex-bcactive nex-bch nex-cch active" data-filter="*">
	                    <?php esc_html_e('ALL','nex')?>
                    </button>
                </li>
	            <?php foreach($posts_categories as $posts_category)
		            printf('<li><button class="button nex-ccactive nex-bcactive nex-bch nex-cch" data-filter=".%s">%s</button></li>',
			            $posts_category['slug'], $posts_category['name']) ?>
            </ul>
        </div>
    <?php endif ?>
    <div class="row isotope-container">
	    <?php if( $nex_query->have_posts() ) :
		    while ( $nex_query->have_posts() ) : $nex_query->the_post();
			    include(  fw()->extensions->get( 'portfolio' )->locate_view_path('loop-item-v3') );
		    endwhile;
		    wp_reset_postdata();
	    else :
		    get_template_part( 'content', 'none' );
	    endif; ?>
    </div>
</div>
<!-- Portfolio v2 end -->