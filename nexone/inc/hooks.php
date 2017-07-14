<?php if ( ! defined( 'ABSPATH' ) ) { die( 'Direct access forbidden.' ); }
/**
 * Filters and Actions
 */

if ( ! function_exists( NEX_THEME_SLUG . '_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function nex_setup() {
    /*
     * Make theme available for translation.
     * Translations can be filed in the /languages/ directory.
     */
    load_theme_textdomain( 'nex', get_template_directory() . '/languages' );

    // Add default posts and comments RSS feed links to head.
    add_theme_support( 'automatic-feed-links' );

    /*
     * Let WordPress manage the document title.
     * By adding theme support, we declare that this theme does not use a
     * hard-coded <title> tag in the document head, and expect WordPress to
     * provide it for us.
     */
    add_theme_support( 'title-tag' );

    /*
     * Enable support for Post Thumbnails on posts and pages.
     *
     * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
     */
    add_theme_support( 'post-thumbnails' );

    // This theme uses wp_nav_menu() in one location.
    register_nav_menus( array(
        'primary' => esc_html__( 'Primary', 'nex' ),
        'mobile' => esc_html__( 'Mobile', 'nex' ),
        'footer'  => esc_html__( 'Footer', 'nex' ),
        'under_footer'  => esc_html__( 'Under Footer', 'nex' ),
    ) );

    /*
     * Switch default core markup for search form, comment form, and comments
     * to output valid HTML5.
     */
    add_theme_support( 'html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
    ) );

    add_theme_support( 'custom-logo', array(
        'height'        => 45,
        'width'         => 200,
        'flex-height'   => true,
        'flex-width'    => true,
    ) );

    add_image_size(NEX_THEME_SLUG . '_blog_cover', 400, 230, true);
}
endif;
add_action( 'after_setup_theme', NEX_THEME_SLUG . '_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function nex_content_width() {
    $GLOBALS['content_width'] = apply_filters( NEX_THEME_SLUG . '_content_width', 1170 );
}
add_action( 'after_setup_theme', NEX_THEME_SLUG . '_content_width', 0 );

/** @internal */
function _nex_add_option_type_code() {
	require_once dirname(__FILE__) . '/includes/option-types/code/class-fw-option-type-code.php';
}
add_action('fw_option_types_init', '_nex_add_option_type_code');

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function nex_action_widgets_init() {
    register_sidebar( array(
        'name'          => esc_html__( 'Blog', 'nex' ),
        'id'            => 'blog',
        'description'   => esc_html__( 'Add widgets to blog area.', 'nex' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="widget-title">',
        'after_title'   => '</h4>',
    ) );
    register_sidebar( array(
        'name'          => esc_html__( 'Footer', 'nex' ),
        'id'            => 'footer',
        'description'   => esc_html__( 'Add widgets to footer area.', 'nex' ),
        'before_widget' => '<div class="col-md-3 col-sm-6 col-xs-12"><div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div></div>',
        'before_title'  => '<h4 class="widget-title">',
        'after_title'   => '</h4>',
    ) );
}
add_action( 'widgets_init', NEX_THEME_SLUG . '_action_widgets_init' );

add_action( NEX_THEME_SLUG . '_logo_header', NEX_THEME_SLUG . '_action_logo', 10, 1 );
add_action( NEX_THEME_SLUG . '_logo_footer', NEX_THEME_SLUG . '_action_logo', 10, 1 );
if ( ! function_exists( NEX_THEME_SLUG . '_action_logo' ) ) :
    function nex_action_logo($settings_prefix){
        if (defined('FW')){

            $logo_type = fw_get_db_settings_option($settings_prefix . 'logo_type');

            if($logo_type === 'image'){
	            $logo_image = fw_get_db_settings_option($settings_prefix . 'image/logo_image');
	            if($logo_image)
	                echo '<a href="' . home_url( '/' ) . '">
	                        <img src="'.esc_url($logo_image["url"]).'" alt="'.esc_attr__('logo','nex').'" />
	                    </a>';
            } else {
                $logo_text = fw_get_db_settings_option($settings_prefix . 'text/logo_text');
                $logo_icon = fw_get_db_settings_option($settings_prefix . 'text/icon');
                $icon_pos  = fw_get_db_settings_option($settings_prefix . 'text/icon_pos');
                if($logo_text) {
                    $logo_text_style = fw_get_db_settings_option($settings_prefix . 'text/logo_text_style');
                    $style = $icon_pattern = $icon = '';
                    if($logo_text_style) {
                        $style = ' style="';
                        if(!empty($logo_text_style['family']))
                            $style .= 'font-family: ' . esc_attr($logo_text_style['family']) . ';';
                        if(!empty($logo_text_style['size']))
                            $style .= 'font-size: ' . esc_attr($logo_text_style['size']) . 'px;';
                        if(!empty($logo_text_style['color']))
                            $style .= 'color: ' . esc_attr($logo_text_style['color']) . ';';
                        $style .= '"';
                        $style = $style === ' style=""' ? '' : $style;
                    }

                    if ( $logo_icon ) {
	                    if ( $logo_icon['type'] === 'custom-upload' ) :
		                    $icon_pattern = '<img src="%s" alt="' . esc_html__( 'logo icon image', 'nex' ) . '"/>';
		                    $icon   = $logo_icon['url'];
	                    else:
		                    $icon_pattern = '<i class="%s"></i>';
		                    $icon   = $logo_icon['icon-class'];
	                    endif;
                    }

                    echo '<h1'.$style.'>';
                    echo '<a href="' . home_url( '/' ) . '">';
                    if($logo_icon && $icon_pos === 'left' )
						printf($icon_pattern, $icon);
                    echo wp_kses( $logo_text , array('span' => array(), 'br' => array()) );
	                if($logo_icon && $icon_pos === 'right' )
		                printf($icon_pattern, $icon);
                    echo '</a></h1>';
                } else {
                    nex_the_default_logo();
                }
            }
        } else if(function_exists( 'the_custom_logo' )){
            the_custom_logo();
            if(!has_custom_logo()){
                nex_the_default_logo();
            }
        }
    }
endif;

add_action( 'wp_enqueue_scripts', NEX_THEME_SLUG . '_action_custom_css', 99 );
if ( ! function_exists( NEX_THEME_SLUG . '_action_custom_css' ) ) :
    function nex_action_custom_css(){
        if (!defined('FW')) return; // prevent fatal error when the framework is not active
        $color_1 = fw_get_db_settings_option('color_1');
        $color_2 = fw_get_db_settings_option('color_2');
        $text_style = fw_get_db_settings_option('text_style');
        $inline_css = '';

        /*primary color*/
        if($color_1){
            $inline_css .= "
            .nex-v3-button:hover,
            .nex-v2-portfolio .isotopeFilter li button.active,
            .nex-v2-portfolio .isotopeFilter li button:hover,
            .nex-v3-post .post-header p a,
            .nex-vx-footer .nex-footer-menu li a:hover,
            .nex-services-slider .slick-arrow.slick-prev:after,
            .nex-services-slider .slick-arrow.slick-next:after,
            .current-menu-item .nex-cch,
            .nex-vx-main-nav .main-menu > li:hover > a, 
            .nex-vx-main-nav .main-menu > li.current-menu-item > a,
            .widget .widget-title span,
            .widget.nex-widget-vx-twitter ul li a,
            .nex-header-bar .nex-socials li a:hover,
            .nex-v7-pricing .nex-switch-row,
            .nex-v7-pricing .nex-content,
            .nex-vx-post .nex-footer .nex-tags li a:hover,
            .nex-v7-pricing .nex-footer a:hover,
            .nex-cch:hover,
            .nex-v2-post .nex-header h2 a:hover,
            .nex-v5-post .nex-footer p a:hover,
            .nex-cca:after,
            .nex-v9-service .nex-footer a,
            .nex-v5-pricing.highlight-col .nex-footer a, 
            .nex-v5-pricing.highlight-col .nex-content span, 
            .nex-v5-pricing.highlight-col .nex-header h3,
            .mptt-shortcode-wrapper ul.mptt-menu li a:hover,
            .nex-v2-accordion .panel-group .panel-heading a:focus,
            .nex-v2-accordion .panel-group .panel-heading a:hover,
            .mptt-shortcode-wrapper ul.mptt-menu li.active a,
            .nex-vx-footer .logo a span,
            .nex-logo h1 a span,
            .nex-slide-text span,
            .nex-cc {
                color: $color_1 !important;
            }
            .nex-v7-pricing .nex-footer a,
            .nex-v2-accordion .panel-group .panel .panel-heading:before,
            .nex-v2-accordion .panel-group .panel .panel-heading:after,
            .nex-title:after,
            .nex-v3-button,
            .nex-v1-pricing .nex-footer a,
            .nex-v3-pricing.highlight-col .nex-header-title h4,
            .nex-bgactive.active,
            .nex-v2-pricing .nex-footer a:hover,
            .nex-v2-pricing.highlight-col .nex-footer a,
            .nex-v4-pricing .nex-footer a:hover,
            .nex-v4-pricing.highlight-col .nex-footer a,
            .nex-v4-pricing.highlight-col .nex-header,
            .nex-v4-pricing.highlight-col .nex-header-title,
            .nex-v9-service .nex-footer a:hover,
            .nex-bgch:hover,
            .nex-bgca:after,
            .nex-bgcb:before,
            .nex-bgc {
                background-color: $color_1 !important;
            }
            .nex-v7-pricing .nex-footer a,
            .mptt-shortcode-wrapper ul.mptt-menu li a:hover,
            .mptt-shortcode-wrapper ul.mptt-menu li.active a,
            .nex-v2-portfolio .isotopeFilter li button.active,
            .nex-v2-portfolio .isotopeFilter li button:hover,
            .nex-v2-portfolio .nex-cc:hover,
            .nex-v2-portfolio .nex-cc.active,
            .nex-v1-portfolio .nex-cc:hover,
            .nex-v3-button,
            .nex-v1-pricing.highlight-col,
            .nex-v1-portfolio .nex-cc.active,
            .nex-v9-service .nex-footer a,
            .nex-v4-pricing.highlight-col,
            .nex-bch:hover,
            .nex-bcf:focus,
            .nex-v5-pricing.highlight-col .nex-footer a,
            .nex-v5-pricing.highlight-col .nex-header, 
            .nex-v5-pricing.highlight-col,
            .nex-bc {
                border-color: $color_1 !important;
            }";
        }

        /*secondary color*/
        if($color_2) {
            $inline_css .= "
            .nex-v6-pricing .nex-footer a:hover,
            .nex-v6-pricing.highlight-col .nex-footer a,
            .nex-cch2:hover,
            .nex-cca2:after,
            .nex-cc2 {
                color: $color_2 !important;
            }
            .nex-v6-pricing.highlight-col,
            .nex-v6-pricing .nex-footer a,
            .nex-bgactive2.active,
            .nex-bgch2:hover,
            .nex-bgca2:after,
            .nex-bgcb2:before,
            .nex-bgc2 {
                background-color: $color_2 !important;
            }
            .nex-v6-pricing .nex-footer a:hover,
            .nex-bch2:hover,
            .nex-bcf2:focus,
            .nex-bc2 {
                border-color: $color_2 !important;
            }
            .mptt-shortcode-wrapper .mptt-shortcode-table tr.mptt-shortcode-row th {
                color: #fff;
                background-color: $color_2 !important;
            }
            ";
        }

        /*gradients from primary and secondary*/
        if($color_1 && $color_2){
            $inline_css .= "
            .nex-testimonials-slider .slick-dots li button:hover,
            .nex-testimonials-slider .slick-dots li.slick-active button,
            .nex-vx-slider .slick-dots li button:hover,
            .nex-vx-slider .slick-dots li.slick-active button,
            .nex-services-slider .slick-dots li button:hover,
            .nex-services-slider .slick-dots li.slick-active button,
            .nex-bglrh:hover,
            .nex-bglr {
                background-image: linear-gradient(45deg, $color_1 0%, $color_2 100%) !important;
            }
            .bg-image:before {
                background-image: linear-gradient(-225deg, $color_1 0%, $color_2 100%) !important;
            }
            .nex-bgrl {
                background-image: linear-gradient(-45deg, $color_1 0%, $color_2 100%) !important;
            }
            .nex-v7-pricing .nex-header-title h4 {
                background-image: linear-gradient(-90deg, $color_1 3%, $color_2 100%) !important;
            }";
        }

        /*header colors*/
        $header_color_style = fw_get_db_settings_option('header_color/state');
        if($header_color_style !== 'gradient'){
	        $header_bg_color = fw_get_db_settings_option('header_color/solid/header_bg_color');
            $inline_css .= "
            header.nex-vx-header {
                background-color: $header_bg_color;
            }";
        } else {
	        $header_bg_color = fw_get_db_settings_option('header_color/gradient/header_bg_color');
            if ( !empty( $header_bg_color['primary'] ) || !empty( $header_bg_color['secondary'] ) ) {
                $inline_css .= "
                header.nex-vx-header {
                    background-image:linear-gradient(225deg, {$header_bg_color['primary']} 0%, {$header_bg_color['secondary']} 100%) !important;
                }";
            }
        }
        /*header bar color*/
        $business_bar_style = fw_get_db_settings_option( 'business-bar/nav-on' );
        if(!empty($business_bar_style)) {
            $inline_css .= "
            .nex-header-bar {
                background-color: " . $business_bar_style['bg_color'] . ";
                color: " . $business_bar_style['text_color'] . ";
            }
            .nex-header-bar .nex-socials li,
            .nex-header-bar .nex-socials li a {
                color: " . $business_bar_style['text_color'] . ";
            }";
        }

        /*typography css*/
        if($text_style) {
            $inline_css .= "body,h1,h2,h3,h4,h5,h6{";
            if(!empty($text_style['family']))
                $inline_css .= 'font-family: ' . $text_style['family'] . ';';
            if(!empty($text_style['size']))
                $inline_css .= 'font-size: ' . $text_style['size'] . 'px;';
            if(!empty($text_style['color']))
                $inline_css .= 'color: ' . $text_style['color'] . ';';
            $inline_css .= "}";
        }

        $custom_css = fw_get_db_settings_option('css_area');

        if($custom_css)
        	$inline_css .= $custom_css;

        if($inline_css)
            wp_add_inline_style(NEX_THEME_SLUG . '-main', $inline_css);
    }
endif;

//Adding comments to Portfolio CPT
//https://github.com/ThemeFuse/Unyson/issues/2309
add_action('fw_init', NEX_THEME_SLUG . '_action_add_comments_to_portfolio', 20);
function nex_action_add_comments_to_portfolio(){
    add_post_type_support( 'fw-portfolio', array( 'comments') );    
}

/* Body and post classes - add by filter to be able to remove in child themes (TF requirement) */
add_filter( 'body_class', NEX_THEME_SLUG . '_filter_body_class' );
function nex_filter_body_class( $classes ) {
    if( defined('FW') ){
        if ( fw_get_db_settings_option('layout_picker/layout_type') === 'boxed' ) {
            $classes[] = 'boxed';
        }
    }
    return $classes;
}

add_filter( 'post_class', NEX_THEME_SLUG . '_filter_post_class' );
function nex_filter_post_class( $classes ) {
	$blog_class = fw_get_db_settings_option('blog_layout_type');
    if( is_archive() || is_home() || is_search() )
        $classes[] = 'nex-' . $blog_class . '-post';
    if ( !has_post_thumbnail() )
        $classes[] = 'no-thumb';
    if ( is_singular( 'post' ) )
        $classes[] = 'nex-vx-post';
    return $classes;
}

/* Likes */
add_action('wp_ajax_' . NEX_THEME_SLUG . '_like_post', NEX_THEME_SLUG . '_like_post');
add_action('wp_ajax_nopriv_' . NEX_THEME_SLUG . '_like_post', NEX_THEME_SLUG . '_like_post');
if(!function_exists(NEX_THEME_SLUG . '_like_post')){
    function nex_like_post(){
        if(!empty($_POST['id'])){
            $post_id = $_POST['id'];
            if( isset( $_COOKIE[NEX_THEME_SLUG . '_club' . '_likes_'. $post_id]) )
                die('already liked');
            $likes = get_post_meta($post_id, NEX_THEME_SLUG . '_club' . '_likes', true);
            if(!$likes)
                $likes = 0 ;
            $likes++;
            if(update_post_meta($post_id, NEX_THEME_SLUG . '_club' .'_likes', $likes)){
                setcookie('nex' . '_likes_'. $post_id, $post_id, time()*20, '/');
                die('liked');
            }
            else{
                die('error');
            }
        }
        die('no post id');
    }
}

/* Subscribe to mailpoet lists */
add_action('wp_ajax_' . NEX_THEME_SLUG . '_subscribe', NEX_THEME_SLUG . '_subscribe');
add_action('wp_ajax_nopriv_' . NEX_THEME_SLUG . '_subscribe', NEX_THEME_SLUG . '_subscribe');
function nex_subscribe(){
    $result = array();
    if( !empty($_POST['lists']) && !empty($_POST['email']) ) {
        $lists = explode(',', $_POST['lists']);
        if(!empty($lists) && is_array($lists)){
            $email = $_POST['email'] ;
            
            $user_data = array(
                'email' => $email
            );
         
            $data_subscriber = array(
              'user' => $user_data,
              'user_list' => array('list_ids' => $lists)
            );

            if(class_exists('WYSIJA')){
                $helper_user = WYSIJA::get('user','helper');
                $result['status'] = $helper_user->addSubscriber($data_subscriber);
                if($result['status'])
                    if($result['status'] === true)
                        $result['message'] = esc_html_x('Email already exists','subscribe result','nex');
                    else
                        $result['message'] = esc_html_x('Successfully Subscribed','subscribe result','nex');
                else
                    $result['message'] = esc_html_x('Subscription failed','subscribe result','nex');
            }
        }
    } else {
        $result['status'] = false;
        $result['message'] = esc_html_x('Error: missing lists or email','subscribe result','nex');
    }

    echo json_encode($result);
    die();
}


function nex_change_footer_sidebar_size($params) {

    global $my_widget_num; // Global a counter array
    $sidebar_id = $params[0]['id'];

    if ( $sidebar_id == 'footer' ) {

        $registered_widgets = wp_get_sidebars_widgets();
        if(!isset($registered_widgets[$sidebar_id]) || !is_array($registered_widgets[$sidebar_id])) { // Check if the current sidebar has no widgets
            return $params; // No widgets in this sidebar... bail early.
        }

        if(!$my_widget_num) {// If the counter array doesn't exist, create it
            $my_widget_num = array();
        }

        if(isset($my_widget_num[$sidebar_id])) { // See if the counter array has an entry for this sidebar
            $my_widget_num[$sidebar_id] ++;
        } else { // If not, create it starting with 1
            $my_widget_num[$sidebar_id] = 1;
        }
        for($i = 1; $i <= 4; $i++) {
            if ( $my_widget_num[ $sidebar_id ] == $i ) {
                $data                       = fw_get_db_settings_option( 'widget_' . $i, 'default' );
                $size                       = $data != 'default' ? $data : '3';
                $classes                    = 'col-md-' . $size;
                $params[0]['before_widget'] = str_replace('col-md-3', $classes, $params[0]['before_widget']);
            }
        }
    }

    return $params;
}
add_filter('dynamic_sidebar_params',NEX_THEME_SLUG . '_change_footer_sidebar_size');

/* Rename Theme Settings to Theme Options */
if (!function_exists(NEX_THEME_SLUG . '_custom_framework_settings_menu')){
    function nex_custom_framework_settings_menu($data) {
        add_theme_page(
            esc_html__( 'Theme Options', 'nex' ),
            esc_html__( 'Theme Options', 'nex' ),
            $data['capability'],
            $data['slug'],
            $data['content_callback']
        );
        add_action( 'admin_menu', NEX_THEME_SLUG . '_admin_change_theme_settings_order', 9999 );
    }
}
add_action('fw_backend_add_custom_settings_menu', NEX_THEME_SLUG . '_custom_framework_settings_menu');

function nex_admin_change_theme_settings_order() {
    global $submenu;

    if ( ! isset( $submenu['themes.php'] ) ) {
        // probably current user doesn't have this item in menu
        return;
    }

    $id    = fw()->backend->_get_settings_page_slug();
    $index = null;

    foreach ( $submenu['themes.php'] as $key => $sm ) {
        if ( $sm[2] == $id ) {
            $index = $key;
            break;
        }
    }

    if ( ! empty( $index ) ) {
        $item = $submenu['themes.php'][ $index ];
        unset( $submenu['themes.php'][ $index ] );
        array_unshift( $submenu['themes.php'], $item );
    }
}

/* Load Portfolios */
add_action('wp_ajax_' . NEX_THEME_SLUG . '_load_portfolio', NEX_THEME_SLUG . '_load_portfolio');
add_action('wp_ajax_nopriv_' . NEX_THEME_SLUG . '_load_portfolio', NEX_THEME_SLUG . '_load_portfolio');
if(!function_exists(NEX_THEME_SLUG . '_load_portfolio')){
    function nex_load_portfolio(){
        if(!empty($_POST['loadMoreData'])){
            $load_more_data =  $_POST['loadMoreData'];
            $order = !empty($load_more_data['order']) ? $load_more_data['order'] : null;
            $page = $load_more_data['paged'];
            $nr = $load_more_data['posts_per_page'];
            $no_more_posts = $load_more_data['no_posts_text'];
            $col_class = $load_more_data['col_class'];
            $category = !empty($load_more_data['terms']) ? $load_more_data['terms'] : null;
            $width = $load_more_data['width'];
	        $height = $load_more_data['height'];

            $ext_portfolio_instance = fw()->extensions->get( 'portfolio' );
            $ext_portfolio_settings = $ext_portfolio_instance->get_settings();
//          $fw_ext_related_projects_image = $ext_portfolio_instance->get_config( 'image_sizes' );
//          $fw_ext_related_projects_image = $fw_ext_related_projects_image['cover-image'];
            $taxonomy = $ext_portfolio_settings['taxonomy_name'];


            $args = array(
                'post_type'           => 'fw-portfolio',
                'paged'               => $page,
                'posts_per_page'      => $nr,
                'order'               => $order,
            );

            if(!empty($category)) {
                $args['tax_query'] = array(
                    array(
                        'taxonomy' => $taxonomy,
                        'field'    => 'slug',
                        'terms'    => $category,
                    ),
                );
            }

            $loop = new WP_Query( $args );
            $html = '';
            ob_start();
            if($loop->have_posts()):
                while ( $loop->have_posts() ) : $loop->the_post();
                    include( $ext_portfolio_instance->locate_view_path('loop-item') );
                endwhile;
                $result = $loop->post_count < $nr ? '0' : '1';
            else:
                $result = '0';
            endif;
            $html = ob_get_clean();
            wp_reset_postdata();
        }else {
            $result = '-1';
        }
        echo json_encode(array('result' => $result, 'html' => $html));
        wp_die();
    }
}

add_filter( 'fw:ext:portfolio:enable-tags', '__return_true' );

add_filter( 'wp_nav_menu_objects', NEX_THEME_SLUG . '_menu_half', 10, 2 );
if(!function_exists(NEX_THEME_SLUG . '_menu_half')){
    function nex_menu_half( $items, $args ) {
        if(!empty($args->nex_half)) {
            $count_first_lvl = 0;
            foreach ( $items as $key => $item ) {
                if ($item->menu_item_parent != 0 ) continue;
                $count_first_lvl++;
            }
            $half_items = ceil($count_first_lvl / 2);
            $i = 0;
            foreach ( $items as $key => $item ) {
                if ($item->menu_item_parent != 0 ) continue;
                $i++;
                if($args->nex_half === 'left'){
                    if ( $i > $half_items ) {
                        nex_remove_child_menu_items($items,$items[$key]->ID);
                        //remove parent item
                        unset( $items[$key] );
                    }
                } elseif ($args->nex_half === 'right') {
                    if ( $i <= $half_items ) {
                        nex_remove_child_menu_items($items,$items[$key]->ID);
                        //remove parent item
                        unset( $items[$key] );
                    }
                }
            }
        }
        return $items;
    }
}

/*allow upload of svg*/
if(!function_exists(NEX_THEME_SLUG . '_mime_types')){
    function nex_mime_types($mimes) {
        $mimes['svg'] = 'image/svg+xml';
        $mimes['ico'] = 'image/x-icon';
        return $mimes;
    }
}
add_filter('upload_mimes', NEX_THEME_SLUG . '_mime_types');

/*add class to reply link in comments*/
if(!function_exists(NEX_THEME_SLUG . '_comment_reply_link')){
    function nex_comment_reply_link($link, $args, $comment, $post){
        return str_replace('comment-reply-link', 'comment-reply-link nex-cch', $link);
    }
}
add_filter('comment_reply_link', NEX_THEME_SLUG . '_comment_reply_link', 10, 4);

/*allow html tags by writing them with [] instead of <>*/
if(!function_exists(NEX_THEME_SLUG . '_html_widget_title')) {
    function nex_html_widget_title( $var) {
        $var = (str_replace( '[', '<', $var ));
        $var = (str_replace( ']', '>', $var ));
        return $var ;
    }
}
add_filter( 'widget_title', NEX_THEME_SLUG . '_html_widget_title', 9999 );

if(!function_exists(NEX_THEME_SLUG . '_excerpt_length')) {
    function nex_excerpt_length( $length ) {
        if ( defined( 'FW' ) ) {
            $length = fw_get_db_settings_option( 'excerpt_length' );
        }

        return $length;
    }
}
add_filter( 'excerpt_length', 'nex_excerpt_length', 999 );

/* Add ionicons font pack to unyson icon option */
if(!function_exists(NEX_THEME_SLUG . '_add_ionicons_pack')) {
    function nex_add_ionicons_pack($default_packs) {
        return array(
            'ionicons' => array(
                'name' => 'ionicons',
                'title' => 'Ionicons',
                'css_class_prefix' => '',
                'css_file' => get_parent_theme_file_path('css/ionicons.min.css'),
                'css_file_uri' => get_theme_file_uri('css/ionicons.min.css'),
                'frontend_wp_enqueue_handle' => 'ionicons-min',
            )
        );
    }
}
add_filter('fw:option_type:icon-v2:packs', NEX_THEME_SLUG . '_add_ionicons_pack');

function nex_fw_ext_portfolio_tag_template_include($template) {
	/**
	 * @var FW_Extension_Portfolio $portfolio
	 */
	$portfolio = fw()->extensions->get( 'portfolio' );
	if ( ( is_tax( $portfolio->get_taxonomy_name() ) || is_tax( 'fw-portfolio-tag' )) && $portfolio->locate_view_path( 'taxonomy' ) ) {
		if ( preg_match( '/taxonomy-' . '.*\.php/i', basename( $template ) ) === 1 ) {
			return $template;
		}
		return $portfolio->locate_view_path( 'taxonomy' );
	}
	return $template;
}

add_filter( 'template_include', 'nex_fw_ext_portfolio_tag_template_include' );