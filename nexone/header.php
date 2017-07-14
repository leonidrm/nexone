<?php if ( ! defined( 'ABSPATH' ) ) { die( 'Direct access forbidden.' ); }?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <?php if (defined('FW') && !empty(fw_get_db_settings_option('favicon'))) printf('<link rel="icon" type="image/x-icon" href="%s">', fw_get_db_settings_option('favicon')['url']) ?>
    <?php wp_head(); ?>
</head>
<?php 
$bg_img_style = $business_bar = $breadcrumb_theme_setting = $breadcrumb_post_setting = '';
$header_classes = array();
$header_logo_position = 'left';
if( defined('FW') ){

    //site layout style settings
    if ( fw_get_db_settings_option('layout_picker/layout_type') === 'boxed' ) {
        $img = fw_get_db_settings_option('layout_picker/boxed/bg_image/url');
        $bg_img_style = ' style="background-image: url('.esc_url($img).')"';
    }

    //business bar settings
    $business_bar = fw_get_db_settings_option( 'business-bar/state' );
    $show_socials = fw_get_db_settings_option( 'business-bar/nav-on/business-bar-socials' );
    $contact_info = fw_get_db_settings_option( 'business-bar/nav-on/contact_data' );

    //logo settings
    $header_logo_position = fw_get_db_settings_option( 'header_logo_position', 'left' );

    //breadcrumbs settings
    $breadcrumb_theme_setting = fw_get_db_settings_option( 'header_style/layout_type' );
    $breadcrumb_post_setting  = fw_get_db_post_option(nex_get_page_id(), 'breadcrumbs/show_breadcrumbs');

    //header classes
    $header_classes = nex_the_header_class();

}?>
<body <?php body_class(); print $bg_img_style?>>
    <div class="boxed_fluid">
        <?php if($business_bar == 'nav-on') : ?>
        <!-- Header business bar -->
        <div class="nex-header-bar">
            <div class="container">
                <?php nex_the_social_icons() ?>
                <?php if(!empty($contact_info)) : ?>
                    <ul class="nex-details">
                        <?php foreach($contact_info as $info)
                            printf('<li><i class="%s"></i> %s </li>', $info['icon']['icon-class'], $info['contact']) ?>
                    </ul>
                <?php endif ?>
            </div>
        </div>
        <!-- Header business bar -->
    <?php endif ?>
        <!-- header start -->
        <header class="nex-vx-header <?php echo implode(' ', $header_classes) ?>">
            <div class="container">
                <div class="row">
                    <?php get_template_part( 'template-parts/header-logo', $header_logo_position ); ?>
                </div>
            </div>
        </header>
        <!-- header end -->
        <?php
        if($breadcrumb_theme_setting !== 'no_breadcrumbs')
            if(((is_singular(array('post','product', 'fw-portfolio')) || is_home() ) && $breadcrumb_post_setting !== 'off') || (is_page() && $breadcrumb_post_setting !== 'off'))
                get_template_part( 'template-parts/breadcrumbs' ); ?>