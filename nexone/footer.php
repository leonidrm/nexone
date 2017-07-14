<?php if ( ! defined( 'ABSPATH' ) ) { die( 'Direct access forbidden.' ); }
$show_footer_logo = $show_footer_menu = $bg_footer_style = $bg_footer_border = '';;
$footer_style = array();
if(defined('FW')) {
    $footer_style = nex_get_footer_style();
	$show_footer_logo = fw_get_db_settings_option( 'footer_logo/show' );
	$show_footer_menu = fw_get_db_settings_option( 'show_footer_menu' );
} ?>
<!-- footer start -->
<footer class="nex-vx-footer" <?php if(!empty($footer_style['pattern'])) vprintf($footer_style['pattern'], $footer_style['args']) ?>>

    <?php if(!empty($footer_style['bg_image_filter'])) printf('<div class="bg-transparency" style="background: %s"></div>', esc_attr($footer_style['bg_image_filter'])) ?>

    <div class="container">
	    <?php if($show_footer_logo === 'on') : ?>
            <div class="nex-logo">
			    <?php do_action( NEX_THEME_SLUG . '_logo_footer', 'footer_logo/on/footer_logo/' ); ?>
            </div>
	    <?php endif?>
	    <?php if($show_footer_menu === 'on') : ?>
            <ul class="nex-footer-menu">
			    <?php wp_nav_menu( array(
				    'theme_location'=> 'footer',
				    'fallback_cb'   => 'wp_list_pages',
				    'title_li'      => false,
				    'container'     => false,
				    'items_wrap'    => '%3$s'
			    ) ); ?>
            </ul>
	    <?php endif?>
	    <?php if(is_active_sidebar( 'footer' )) : ?>
            <div class="row">
			    <?php dynamic_sidebar( 'footer' ); ?>
            </div>
	    <?php endif; ?>
    </div>

    <div class="nex-underfooter nex-bgc">
        <div class="container">
	        <?php if(defined('FW')) :
                $left_copyright_class = 'center';
                if( fw_get_db_settings_option( 'footer_right/style' ) === 'menu' ) : 
                    $left_copyright_class = 'left' ?>
                    <ul class="nex-footer-nav">
                        <?php wp_nav_menu( array(
                            'theme_location'=> 'under_footer',
                            'fallback_cb'   => 'wp_list_pages',
                            'title_li'      => false,
                            'container'     => false,
                            'items_wrap'    => '%3$s'
                        ) ); ?>
                    </ul>
                <?php elseif(fw_get_db_settings_option('footer_right/style') === 'text') : 
                    $left_copyright_class = 'left' ?>
                    <p class="nex-copyright right-side"><?php if (defined('FW')) echo wp_kses( fw_get_db_settings_option('footer_right/text/copyright_right'), array('a' => array('href' => array(),'target' => array()), 'div' => array('class'=>array()),'p') ) ?></p>
                <?php endif; ?>
		        <?php if(fw_get_db_settings_option('copyright_left')) : ?>
                    <p class="nex-copyright <?php echo esc_attr($left_copyright_class) ?>-side"><?php echo wp_kses( fw_get_db_settings_option('copyright_left'), array('a' => array('href' => array(),'target' => array()), 'div' => array('class'=>array()),'p') ) ?></p>
                <?php endif; ?>
	        <?php endif; ?>
        </div>
    </div>
</footer>
<!-- footer end -->
</div><!-- / opened in header.php -->
<?php wp_footer() ?>
</body>
</html>