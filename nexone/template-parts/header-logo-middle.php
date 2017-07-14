<div class="col-md-5">
    <div class="main-nav nex-vx-main-nav">
        <a class="nex-menu-toggle" href="#"></a>
        <ul class="main-menu main-menu-hidden">
            <?php 
            if(has_nav_menu( 'mobile' ))
                wp_nav_menu( array(
                    'theme_location' => 'mobile',
                    'fallback_cb' => 'wp_list_pages',
                    'title_li' => false,
                    'container' => false,
                    'items_wrap' => '%3$s'
                ) );
            else {
                wp_nav_menu( array(
                    'theme_location' => 'primary',
                    'fallback_cb' => 'wp_list_pages',
                    'title_li' => false,
                    'container' => false,
                    'items_wrap' => '%3$s'
                ) );
            } ?>
        </ul>
        <ul class="main-menu">
            <?php wp_nav_menu( array(
                'theme_location' => 'primary',
                'fallback_cb' => 'wp_list_pages',
                'title_li' => false,
                'container' => false,
                'items_wrap' => '%3$s',
                'nex_half' => 'left'
            ) ); ?>
        </ul>
    </div>
</div>
<div class="col-md-2">
    <div class="nex-logo nex-logo-center">
	    <?php do_action( NEX_THEME_SLUG . '_logo_header', 'header_logo/' ); ?>
    </div>
</div>
<div class="col-md-5">
    <div class="main-nav nex-vx-main-nav main-second-nav">
        <ul class="main-menu">
            <?php wp_nav_menu( array(
                'theme_location' => 'primary',
                'fallback_cb' => 'wp_list_pages',
                'title_li' => false,
                'container' => false,
                'items_wrap' => '%3$s',
                'nex_half' => 'right'
            ) ); ?>
        </ul>
    </div>
</div>