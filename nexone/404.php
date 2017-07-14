<?php if ( ! defined( 'ABSPATH' ) ) { die( 'Direct access forbidden.' ); }
$page_title = esc_html__('Page not found','nex');
$page_message = esc_html__('Use the search below to find something else','nex');
if(defined('FW')) {
    $page_title = wp_kses( fw_get_db_settings_option('404_title', $page_title), array('a' => array('href' => array(),'target' => array())) );
    $page_message = wp_kses( fw_get_db_settings_option('404_message', $page_message), array('a' => array('href' => array(),'target' => array()), 'p' => array(), 'br' => array()) );
    $img = fw_get_db_settings_option('404_img');
}
get_header();
?>
<section class="section">
    <div class="container">
        <div class="nex-vx-error404">
            <h1><?php print $page_title ?></h1>
            <?php if(isset($img) && !empty($img['url'])) : ?>
                <img src="<?php echo esc_url($img['url']) ?>">
            <?php endif ?>
            <h4><?php print $page_message ?></h4>
            <?php get_search_form(); ?>
        </div>
    </div>
</section>
<?php
get_footer();