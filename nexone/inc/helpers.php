<?php if ( ! defined( 'ABSPATH' ) ) { die( 'Direct access forbidden.' ); }
/**
 * Helper functions and classes with static methods for usage in theme
 */

/* INSTAGRAM */
if(!function_exists('nex_instagram_data')){
    function nex_instagram_data( $username, $cache_hours, $nr_images, $img_size = 'standard_resolution' ) {
        
        $opt_name       = 'nex_insta_' . md5( $username . $nr_images );
        $instaData      = get_transient( $opt_name );
        
        if ( !$instaData ) {
            $instaData      = array();
            $insta_url      = 'http://instagram.com/';
            $user_profile   = $insta_url . $username;
            $user_options   = compact('username', 'cache_hours', 'nr_images');
            update_option($opt_name, $user_options);
            $json           = wp_remote_retrieve_body(
                wp_remote_get( $user_profile . "/media/", array( 'sslverify' => false, 'timeout'=> 60 ) )
                );
            if ( $json ) {                
                ( $arr = json_decode( $json, true ) ) && json_last_error() == JSON_ERROR_NONE;

                if ( !empty($arr['items']) && is_array( $arr['items'] ) ) {
                    foreach( $arr['items'] as $nr => $item ) {
                        if( $nr >= $nr_images ) 
                            break;
                        array_push( $instaData, array(
                            'id'            => $item['id'],
                            'user_name'     => $username,
                            'user_url'      => $user_profile,
                            'created_time'  => $item['created_time'],
                            'caption'       => !empty($item['caption']) && !empty($item['caption']['text']) ? $item['caption']['text'] : '',
                            'image'         => $item['images'][$img_size]['url'],
                            'thumb'         => $item['images']['thumbnail']['url'],
                            'link'          => $item['link'],
                            'comments_count'=> $item['comments']['count'],
                            'likes_count'   => $item['likes']['count'],
                            'width'         => $item['images']['standard_resolution']['width'],
                            'height'        => $item['images']['standard_resolution']['height'],
                        ));
                    
                    }
                
                }
            
            }
            
            if ( $instaData && !empty($cache_hours)) {
                set_transient( $opt_name, $instaData, $cache_hours * HOUR_IN_SECONDS );
            }
        
        }
        
        return $instaData;
    }

} // end !function_exist

if(!function_exists('nex_instagram_generate_output')){
    function nex_instagram_generate_output( $username, $cache_hours, $nr_images , $thumbs = true, $callback = '' ){
        if(empty($username)){
            return esc_html__('No username inserted in instagram widget','nex');
        }
        $images = nex_instagram_data( $username, $cache_hours, $nr_images );
        $output = '';
        if(!empty($images)) : 
            if(!empty($callback))
                call_user_func( $callback , $images , $thumbs);
            $output = '<ul class="nex-instagram-feed">';
                foreach ($images as $key => $image) :
                    $image_src = $thumbs ? $image['thumb'] : $image['image'];
                    $output .= '<li>';
                        $output .= '<a target="_blank" href="' . esc_url($image['link']) . '">';
                            $output .= '<img class="nex-instagram-img" src="' . esc_attr($image_src) . '" width="' . esc_attr( $image['width'] ) . '" height="' . esc_attr( $image['height'] ) . '" alt="' . esc_attr( $image['caption'] ) . '"/>';
                        $output .= '</a>';
                    $output .= '</li>';
                endforeach;
            $output .= '</ul>';
        endif;
        return $output;
    }
}

/* TWITTER */

if(!function_exists('nex_twitter_get_tweets')){
    function nex_twitter_get_tweets($twitteruser,$param,$instance = null){
	    delete_transient('nex_twitter');
        $cache = get_transient('nex_twitter');

        if(is_array($cache)&&array_key_exists($twitteruser, $cache))
           return $cache[$twitteruser];

        $connection = fw_ext_social_twitter_get_connection();

        $counter = explode(',', $param);

        if(count($counter) <= 1)
            $tweets = $connection->get("statuses/user_timeline", array("screen_name" => $twitteruser, "count" => $param[0]));
        else
            $tweets = $connection->get("statuses/lookup", array("id" => $param));

        if(!is_array($cache))
            $cache = array();

        if(empty($tweets->error)){
            $cache[$twitteruser] = $tweets;
            set_transient('nex_twitter',$cache,5 * MINUTE_IN_SECONDS);
        }

        return $tweets;
    }
}

if(!function_exists('nex_twitter_generate_output')){
    function nex_twitter_generate_output($user, $number, $callback='', $step_callback='', $before=false, $after=false, $instance = null){

        $tweets = nex_twitter_get_tweets($user, $number, $instance);

        if(is_null($tweets))
            return 'Twitter is not configured.';
        if(is_object($tweets) && !empty($tweets->error))
            return $tweets->error;
        if(is_object($tweets) && !empty($tweets->errors)){
            foreach ($tweets->errors as $error) {
                $errors[] = $error->message;
            }
            return implode('; ', $errors);
        }

        $number = min(20,$number);

        $tweets = array_slice($tweets,0,$number);

        if(!empty($callback))
            return call_user_func($callback,$tweets);

        $output = $before===false?'<div class="nex_twitter"><ul class="twitter">':$before;

        $time = time();
        $last = count($tweets)-1;
        if(!empty($tweets))
            foreach($tweets as $i => $tweet){

                $date = $tweet->created_at;
                $date = date_parse($date);
                $date = mktime(0,0,0,$date['month'],$date['day'],$date['year']);
                $date = $time - $date;

                $seconds = (int)$date;
                $date=floor($date/60);
                $minutes = (int)$date;
                if($minutes){
                    $date=floor($date/60);
                    $hours = (int)$date;
                    if($hours){
                        $date=floor($date/24);
                        $days = (int)$date;
                        if($days){
                            $date=floor($date/7);
                            $weeks = (int)$date;
                            if($weeks)
                                $date = $weeks.' week'.(1===$weeks?'':'s').' ago';
                            else
                                $date = $days.' day'.(1===$days?'':'s').' ago';
                        }
                        else
                            $date = $hours.' hour'.(1===$hours?'':'s').' ago';
                    }
                    else
                        $date = $minutes.' minute'.(1===$minutes?'':'s').' ago';
                }
                else
                    $date = 'less than a minute ago';

                $output .=
                    $step_callback===''?
                        '<li'.($i===$last?' class="last"':'').'>'.
                        nex_linkify($tweet->text).
                        '<span class="date">'.
                        esc_html($date).
                        '</span>'.
                        '</li>'
                        :
                        call_user_func($step_callback,$i,nex_linkify($tweet->text),$date);

            }

        $output .= $after===false?'</ul></div>':$after;

        return $output;
    }
}

if(!function_exists('nex_twitter_sc_generate_output')){
	function nex_twitter_sc_generate_output($user, $number, $cols='col-md-3', $callback='', $step_callback='', $before=false, $after=false, $instance = null){

		$tweets = nex_twitter_get_tweets($user, $number, $instance);

		if(is_null($tweets))
			return 'Twitter is not configured.';
		if(is_object($tweets) && !empty($tweets->error))
			return $tweets->error;
		if(is_object($tweets) && !empty($tweets->errors)){
			foreach ($tweets->errors as $error) {
				$errors[] = $error->message;
			}
			return implode('; ', $errors);
		}

		$number = min(20,$number);

		$tweets = array_slice($tweets,0,$number);

		if(!empty($callback))
			return call_user_func($callback,$tweets);

		$output = $before===false?'<div class="nex-tweet-feed"><div class="row">':$before;

		$time = time();
		$last = count($tweets)-1;
		if(!empty($tweets))
			foreach($tweets as $i => $tweet){

				$date = $tweet->created_at;
				$date = date_parse($date);
				$date = mktime(0,0,0,$date['month'],$date['day'],$date['year']);
				$date = $time - $date;

				$seconds = (int)$date;
				$date=floor($date/60);
				$minutes = (int)$date;
				if($minutes){
					$date=floor($date/60);
					$hours = (int)$date;
					if($hours){
						$date=floor($date/24);
						$days = (int)$date;
						if($days){
							$date=floor($date/7);
							$weeks = (int)$date;
							if($weeks)
								$date = $weeks.' week'.(1===$weeks?'':'s').' ago';
							else
								$date = $days.' day'.(1===$days?'':'s').' ago';
						}
						else
							$date = $hours.' hour'.(1===$hours?'':'s').' ago';
					}
					else
						$date = $minutes.' minute'.(1===$minutes?'':'s').' ago';
				}
				else
					$date = 'less than a minute ago';

				$output .=
					$step_callback===''?
						'<div class="' . $cols . '">'.
						nex_linkify($tweet->text).
						'<span class="date">'.
						esc_html($date).
						'</span>'.
						'</div>'
						:
						call_user_func($step_callback,$i,nex_linkify($tweet->text),$date);

			}

		$output .= $after===false?'</div></div>':$after;

		return $output;
	}
}

if(!function_exists('nex_linkify')){
    function nex_linkify($status_text){
        // linkify URLs
        $status_text = preg_replace(
            '/(https?:\/\/\S+)/',
            '<a href="\1">\1</a>',
            $status_text
        );

        // linkify twitter users
        $status_text = preg_replace(
            '/(^|\s)@(\w+)/',
            '\1<a href="http://twitter.com/\2">@\2</a>',
            $status_text
        );

        // linkify tags
        $status_text = preg_replace(
            '/(^|\s)#(\w+)/',
            '\1<a href="http://twitter.com/search?q=%23\2&amp;src=hash">#\2</a>',
            $status_text
        );

        return $status_text;
    }
}

if(!function_exists('nex_twitter_generate_output')){
    function nex_twitter_generate_output($user, $number, $callback='', $step_callback='', $before=false, $after=false, $instance = null){

        $tweets = nex_twitter_get_tweets($user, $number, $instance);

        if(is_null($tweets))
            return 'Twitter is not configured.';
        if(is_object($tweets) && !empty($tweets->error))
            return $tweets->error;
        if(is_object($tweets) && !empty($tweets->errors)){
            foreach ($tweets->errors as $error) {
                $errors[] = $error->message;
            }
            return implode('; ', $errors);
        }

        $number = min(20,$number);

        $tweets = array_slice($tweets,0,$number);

        if(!empty($callback))
            return call_user_func($callback,$tweets);

        $output = $before===false?'<div class="nex_twitter"><ul class="twitter">':$before;

        $time = time();
        $last = count($tweets)-1;
        if(!empty($tweets))
            foreach($tweets as $i => $tweet){

                $date = $tweet->created_at;
                $date = date_parse($date);
                $date = mktime(0,0,0,$date['month'],$date['day'],$date['year']);
                $date = $time - $date;

                $seconds = (int)$date;
                $date=floor($date/60);
                $minutes = (int)$date;
                if($minutes){
                    $date=floor($date/60);
                    $hours = (int)$date;
                    if($hours){
                        $date=floor($date/24);
                        $days = (int)$date;
                        if($days){
                            $date=floor($date/7);
                            $weeks = (int)$date;
                            if($weeks)
                                $date = $weeks.' week'.(1===$weeks?'':'s').' ago';
                            else
                                $date = $days.' day'.(1===$days?'':'s').' ago';
                        }
                        else
                            $date = $hours.' hour'.(1===$hours?'':'s').' ago';
                    }
                    else
                        $date = $minutes.' minute'.(1===$minutes?'':'s').' ago';
                }
                else
                    $date = 'less than a minute ago';

                $output .= 
                $step_callback===''?
                '<li'.($i===$last?' class="last"':'').'>'.
                    nex_linkify($tweet->text).
                    '<span class="date">'.
                        esc_html($date).
                    '</span>'.
                '</li>'
                :
                call_user_func($step_callback,$i,nex_linkify($tweet->text),$date);

            }

        $output .= $after===false?'</ul></div>':$after;

        return $output;
    }
}

/* get share links */
if ( ! function_exists( 'nex_get_share_link' ) ) {
    function nex_get_share_link($platform){
        $curr_link = get_permalink();
        $title = urlencode(get_the_title( ));
        $url = '';
        switch ($platform) {
            case 'facebook' :
                $url = "http://www.facebook.com/sharer/sharer.php?u=$curr_link&title=$title";
                break;
            case 'twitter' :
                $url = "http://twitter.com/intent/tweet?status=$title+$curr_link";
                break;
            case 'tumblr' :
                $url = "https://www.tumblr.com/widgets/share/tool?canonicalUrl=$curr_link&title=$title";
                break;
            case 'google' :
                $url = "https://plus.google.com/share?url=$curr_link";
                break;
            case 'reddit' :
                $url = "https://reddit.com/submit?url=$curr_link&title=$title";
                break;
            case 'pinterest' :
                $url = "http://pinterest.com/pin/create/bookmarklet/?url=$curr_link&is_video=false&description=$title";
                break;
            case 'linkedin':
                $url = "http://www.linkedin.com/shareArticle?mini=true&url=$curr_link&title=$title";
                break;
        }
        return esc_url($url);
    }
}

if(!function_exists('nex_the_share_platforms')){
    function nex_the_share_platforms(){
        if(!defined('FW')) return;
        $share_platforms = fw_get_db_settings_option('share_platforms');
        if(!empty($share_platforms)) : ?>
            <ul class="nex-share">
                <li><?php _e('Share:','nex') ?></li>
                <?php nex_the_share_platforms_list($share_platforms) ?>
            </ul>
        <?php endif;
    }
}

if(!function_exists('nex_the_share_platforms_list')){
    function nex_the_share_platforms_list($share_platforms = false){
        if(!defined('FW')) return;
        if(!$share_platforms)
            $share_platforms = fw_get_db_settings_option('share_platforms');
        if(!empty($share_platforms))
            foreach ($share_platforms as $share_platform) : ?>
                <li>
                    <a class="nex-bgch" href="#" onclick="window.open('<?php echo esc_js(nex_get_share_link($share_platform['platform'])) ?>', 'sharewindow','left=20,top=20,width=600,height=700,toolbar=0,resizable=1'); return false;">
                        <i class="<?php esc_attr_e($share_platform['icon']['icon-class']) ?>"></i>
                    </a>
                </li>
            <?php endforeach;
    }
}

if(!function_exists('nex_the_social_icons')){
    function nex_the_social_icons( ){
        if(!defined('FW')) return;?>
        <ul class="nex-socials">
            <li><?php esc_html_e('Find us on:', 'nex') ?></li>
            <?php $social_profiles = fw_get_db_settings_option('social_profiles');
            if(!empty($social_profiles)) :
                foreach ($social_profiles as $social_profile) : ?>
                    <li>
                        <a href="<?php echo esc_url($social_profile['link']) ?>" target="_blank"><i class="<?php esc_attr_e($social_profile['icon']['icon-class']) ?>"></i>
                        </a>
                    </li>
                <?php endforeach;
            endif; ?>
        </ul>
        <?php
    }
}

if(!function_exists('nex_the_post_pagination')){
    function nex_the_post_pagination(){
        ?>
        <div class="post-pagination">
            <?php wp_link_pages(array(
                'before'           => '<ul class="page-numbers center"><li>',
                'after'            => '</li></ul>',
                'link_before'      => '',
                'link_after'       => '',
                'next_or_number'   => 'number',
                'separator'        => '</li><li>',
                'nextpagelink'     => esc_html__( 'Next page','nex' ),
                'previouspagelink' => esc_html__( 'Previous page','nex' ),
                'pagelink'         => '%',
                'echo'             => 1
            )); ?>
        </div>
        <?php
    }
}

//====================View count for single posts===========================
if(!function_exists('nex_set_post_views')){
    function nex_set_post_views($post_id = null) {
        if(!$post_id){
            $post_id = get_the_ID();
        }
        $count_key = 'nex_post_views_count';
        $count = get_post_meta($post_id, $count_key, true);
        if ($count == '') {
            $count = 0;
            delete_post_meta($post_id, $count_key);
            add_post_meta($post_id, $count_key, '0');
        } else {
            $count++;
            update_post_meta($post_id, $count_key, $count);
        }
    }
}

if(!function_exists('nex_get_post_views')){
    function nex_get_post_views($post_id = null) {
        if(!$post_id){
            $post_id = get_the_ID();
        }
        return get_post_meta($post_id, 'nex_post_views_count', true) ? : 0;
    }
}

if(!function_exists('nex_the_post_views')){
    function nex_the_post_views($post_id = null) {
        echo nex_get_post_views($post_id);
    }
}

/* Comments */
/***********************************************************************************************/
if(!function_exists('nex_custom_comments')){
    function nex_custom_comments( $comment, $args, $depth ) {
        $GLOBALS['comment'] = $comment;
        extract($args, EXTR_SKIP);

        if ( 'div' == $args['style'] ) {
            $tag = 'div';
            $add_below = 'comment';
        } else {
            $tag = 'li';
            $add_below = 'div-comment';
        }
        ?>
        <<?php print $tag ?> id="comment-<?php comment_ID() ?>" <?php comment_class('comment-li') ?>>
            <div class="nex-comment-box">
                <div class="comment-li-avatar">
                    <?php if ($args['avatar_size'] != 0)
                        echo get_avatar( $comment, $args['avatar_size'], false,'avatar image' ); ?>
                </div>
                <?php comment_reply_link(array_merge( $args, array('add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth'], 'reply_text'=> '<i class="ion-ios-undo-outline"></i>' . esc_html__('Reply','nex') ))) ?>

                <h5 class="comment-author"><?php echo get_comment_author() ?>
                <span><i class="ion-ios-time-outline"></i><?php printf( esc_html_x( '%1$s ago', '%2$s = human-readable time difference', 'nex' ),
                            human_time_diff( get_comment_time('U'))
                        ); ?></span></h5>
                <?php comment_text() ?>

                <?php if ($comment->comment_approved == '0') : ?>
                    <em class="comment-awaiting-moderation">
                        <?php esc_html_e('Your comment is awaiting moderation.','nex') ?>
                    </em>
                    <br />
                <?php endif; ?>
                <?php if ( 'div' != $args['style'] ) : ?>
                    <div id="div-comment-<?php comment_ID() ?>" ></div>
                <?php endif; ?>

                <?php edit_comment_link(esc_html__('(Edit)','nex'),'  ','' );?>
            </div>
        <?php
    }
}

/* google links */
if (!function_exists('nex_get_remote_fonts')) :
    function nex_enqueue_gf($typography_options_ids){
        if( is_array($typography_options_ids) && !empty($typography_options_ids) ){
            foreach ($typography_options_ids as $option_id) {
                $option_val = fw_get_db_settings_option($option_id);
                // if is google font
                if( $option_val['google_font'] && !empty($option_val['family']) ){
                    $query_args = array(
                        'family' => $option_val['family'],
                        'subset' => isset($option_val['subset']) ? $option_val['subset'] : '',
                        'variation' => isset($option_val['variation']) ? $option_val['variation'] : '',
                    );
                    wp_enqueue_style( NEX_THEME_SLUG. '-gf-' . sanitize_title($option_val['family']), add_query_arg( $query_args, "//fonts.googleapis.com/css" ), array(), null );
                }
            }
        }
    }
endif;

if(!function_exists('nex_get_page_id')){
    function nex_get_page_id($shop=false){
        global $wp_query;
        if(is_archive() || is_search() || is_home())
            return get_option( 'page_for_posts' );
        if(get_query_var('page_id'))
            $page_id = get_query_var('page_id');
        elseif(!empty($wp_query->queried_object) && !empty($wp_query->queried_object->ID))
            $page_id = $wp_query->queried_object->ID;
        elseif($shop)
            $page_id = get_option( 'woocommerce_shop_page_id' );
        else
            $page_id = false;
        return $page_id;
    }
}

if(!function_exists('nex_the_page_title')){
    function nex_the_page_title(){
        //check page options override first

        if(defined('FW') && fw_get_db_post_option(nex_get_page_id(), 'breadcrumbs/on/title') && is_singular(array('post','page','fw-portfolio')))
            echo fw_get_db_post_option( nex_get_page_id(), 'breadcrumbs/on/title' );

        elseif(class_exists('Woocommerce') && is_shop())
            echo get_the_title( get_option( 'woocommerce_shop_page_id' ) ) ;

        elseif( is_post_type_archive( 'fw-portfolio' ) ){
            if(!defined('FW')) return;
            echo esc_html(fw_get_db_settings_option('portfolio_archive_title'));
        }
        elseif ( is_tax('fw-portfolio-category')) {
            $taxonomy = get_queried_object();
	        echo esc_html__( 'Portfolio Category: ', 'nex' ) . $taxonomy->name;
        }
        elseif ( is_tax('fw-portfolio-tag')) {
	        $taxonomy = get_queried_object();
	        echo esc_html__( 'Portfolio Tag: ', 'nex' ) . $taxonomy->name;
        }
        elseif(function_exists('bbp_forum_archive_title') && is_post_type_archive( 'forums' ))
            bbp_forum_archive_title();

        elseif( is_front_page( ) ){
            if( get_option( 'page_on_front' ) !== '0' )
                if(defined('FW') && fw_get_db_post_option(get_option( 'page_on_front' ), 'breadcrumbs/on/title'))
                    echo fw_get_db_post_option(get_option( 'page_on_front' ), 'breadcrumbs/on/title');
                else
                    echo get_the_title( get_option( 'page_on_front' ) );
            elseif( get_option('show_on_front') === 'posts' )
                esc_html_e( 'Blog', 'nex' );
        }

        elseif( is_home( ) || is_single() ) {
            echo get_the_title( get_option( 'page_for_posts' ) );
        }

        elseif( is_category( ) ){
            esc_html_e('Category: ','nex');
            single_cat_title('');
        }

        elseif( is_tag( ) ){
            esc_html_e('Tag: ','nex');
            single_tag_title('');
        }

        elseif( is_author( ) )
            esc_html_e('Author Page','nex');

        elseif( is_archive( ) ){
            esc_html_e('Archive: ','nex');
            echo get_the_date();
        }

        elseif( is_attachment( ) )
            esc_html_e('Attachment','nex');

        elseif( is_search( ) ){
            esc_html_e('Search Results for ','nex');
            echo "<i>'" . get_search_query() . "'</i>";
        }
        elseif(is_404())
            esc_html_e('ERROR 404','nex');

        else
            echo get_the_title();
        return;
    }
}

if(!function_exists('nex_get_page_subtitle')){
    function nex_get_page_subtitle(){
        $subtitle = null;
        if( is_post_type_archive( 'fw-portfolio' ) || is_tax( 'fw-portfolio-category' ) || is_tax( 'fw-portfolio-tag' ) ) {
            if(!defined('FW')) return;
            return esc_html(fw_get_db_settings_option('portfolio_archive_subtitle'));
        } elseif( is_home( ) ) {
            if(!defined('FW')) return;
            return esc_html(fw_akg('on/subtitle', fw_get_db_post_option(get_option( 'page_for_posts' ), 'breadcrumbs')));
        } else {
            if(!defined('FW')) return;
            return esc_html(fw_akg('on/subtitle', fw_get_db_post_option(get_the_ID(), 'breadcrumbs')));
        }
    }
}

/* ===================== Likes ======================== */
/* + ajax function in hooks.php */

if(!function_exists('nex_the_likes')){
    function nex_the_likes($post_id = null){
        if(!$post_id)
            $post_id = get_the_ID();
        echo get_post_meta(get_the_ID(), 'nex' . '_likes', true) ? get_post_meta(get_the_ID(), 'nex' . '_likes', true) : '0';
        return;
    }
}
if(!function_exists('nex_the_liked')){
    function nex_the_liked($post_id = null, $echo = ' nex-post-liked', $default = ''){
        if(!$post_id)
            $post_id = get_the_ID();
        echo nex_get_the_liked($post_id, $echo, $default);
    }
}
if(!function_exists('nex_get_the_liked')){
    function nex_get_the_liked($post_id = null, $liked_return = ' nex-post-liked', $default = ''){
        if(!$post_id)
            $post_id = get_the_ID();
        if( isset($_COOKIE['nex' . '_likes_' . $post_id]) )
            return $liked_return;
        return $default;
    }
}

/* ============== Get Sidebar Position =============== */

if(!function_exists( 'nex_get_sidebar_position')) {
    function nex_get_sidebar_position() {
        if(!is_active_sidebar('blog'))
            return 'full_width';

        if(!defined('FW')){
            if( is_archive() || is_tax() || is_home() || is_search() || is_single() )
                return 'right';
            else
                return 'full_width';
        }

        $post_id = nex_get_page_id();

        $fw_default  = fw_get_db_settings_option('sidebar_pos');

        $post_option = 0 === $post_id || !$post_id ? 'default' : fw_get_db_post_option($post_id, 'sidebar_pos', 'default');

        $sidebar_pos = $post_option !== 'default' ? $post_option : $fw_default;

        return $sidebar_pos;
    }
}

if(!function_exists('nex_get_related_portfolio')) {
    function nex_get_related_portfolio() {
        $portfolio_id = get_the_ID();
        $ext_portfolio_instance = fw()->extensions->get( 'portfolio' );
        $ext_portfolio_settings = $ext_portfolio_instance->get_settings();

        $taxonomy = $ext_portfolio_settings['taxonomy_name'];

//      $fw_ext_related_projects_image = $ext_portfolio_instance->get_config( 'image_sizes' );
//      $fw_ext_related_projects_image = $fw_ext_related_projects_image['cover-image'];

        $width  = 600;
        $height = 370;

        $col_class = "col-md-4";

        $terms = get_the_terms( $portfolio_id , $taxonomy );
        $categories_slug = array();

        foreach ( $terms as $term ) {
            $categories_slug[] = $term->slug;
        }


        $args = array(
                'post_type' =>  'fw-portfolio',
                'posts_per_page' =>  3,
                'tax_query' => array(
                    array(
                        'taxonomy' => $taxonomy,
                        'field'    => 'slug',
                        'terms'    => $categories_slug,
                    ),
                ),
        );
        $related_posts = new WP_Query($args);

        if($related_posts->have_posts()) : ?>
            <h1 class="nex-title"><?php echo esc_html_x('Related Works','Single Portfolio','nex') ?></h1>
            <div class="row">
                <?php if($related_posts->have_posts()) :
                    while ($related_posts->have_posts()) : $related_posts->the_post();
                        include(  fw()->extensions->get( 'portfolio' )->locate_view_path('loop-item') );
                    endwhile;
                endif; ?>
            </div>
        <?php endif;
    }
}

//Get Mailpoet Lists
//this will return an array of results with the name and list_id of each mailing list
if(!function_exists('nex_get_mailpoet_lists')) {
    function nex_get_mailpoet_lists() {
        $mailpoet_lists = array();
        if(class_exists('WYSIJA')):
            $model_list = WYSIJA::get('list','model');
            $mp_lists = $model_list->get(array('name','list_id'),array('is_enabled'=>1));
            foreach ($mp_lists as $list) {
                $mailpoet_lists[$list['list_id']] = $list['name'];
            }
            return $mailpoet_lists;
        endif;
        return $mailpoet_lists;
    }
}

if(!function_exists('nex_the_default_logo')) {
    function nex_the_default_logo() {
        if( get_bloginfo('name') ) {
            echo '<h1><a href="' . home_url( '/' ) . '">' . get_bloginfo('name') . '</a></h1>';
        } else {
            $theme = wp_get_theme();
            echo '<h1><a href="' . home_url( '/' ) . '">' . esc_html($theme->get( 'Name' )) . '</a></h1>';
        }
    }
}

if(!function_exists('nex_the_header_class')) {
    function nex_the_header_class($classes = array()){
        $classes['header_on_top'] = 'nex-header';
        if( defined('FW') ) {
            $post_id = nex_get_page_id();

            if(is_singular(array('page'))) {
	            $classes['header_on_top'] = fw_get_db_post_option( $post_id, 'header_on_top' );
	            if ( fw_get_db_post_option( $post_id, 'sticky_header' ) === 'on' ) {
		            $classes['sticky'] = 'sticker';
	            }
            } elseif(fw_get_db_settings_option( 'header_style/layout_type' ) !== 'no_breadcrumbs') {
                if(is_singular('fw-portfolio')) {
	                $classes['header_on_top'] = fw_get_db_settings_option( 'portfolio_header_on_top' );
	                if ( fw_get_db_settings_option( 'portfolio_sticky_header' ) === 'on' ) {
		                $classes['sticky'] = 'sticker';
	                }
                } else {
	                $classes['header_on_top'] = fw_get_db_settings_option( 'header_style/' . fw_get_db_settings_option( 'header_style/layout_type' ) . '/header_on_top' );
	                if ( fw_get_db_settings_option( 'sticky_header' ) === 'on' ) {
		                $classes['sticky'] = 'sticker';
	                }
                }
            }
        }
        if(in_array('nex-header-top', $classes) && in_array('sticker', $classes)) {
	        add_filter( 'body_class', 'nex_body_classes' );
        }

        return $classes;
    }
}

function nex_body_classes( $classes ) {

	$classes[] = 'head_stickytop';

	return $classes;

}

if(!function_exists('nex_get_button_type')) {
    function nex_get_button_type(array $button_data) {
        $icon = '';
        if(!empty($button_data['icon'])) {
	        if($button_data['icon']['type'] === 'custom-upload')
	            $icon = '<img src="' . $button_data['icon']['url'] . '" alt="' . esc_html__('button icon', 'nex' ) . '" />';
	        else
	            $icon = '<i class="' . esc_attr__($button_data['icon']['icon-class']) . '"></i>';
        }
        $pattern = '<a href="%s" class="nex-%s-button">%s%s</a>';
        $output = sprintf($pattern, $button_data['button_link'], $button_data['type'], $icon, $button_data['button_label'] );
        return $output;
    }
}

function nex_get_options($option_name) {
    $output = include ( get_template_directory(). '/inc/options/' . $option_name . '.php');
    return $output;
}

if(!function_exists('nex_get_footer_style')) {
    function nex_get_footer_style() {
        $pattern          = $bg_image_filter = '';
        $args             = array();
        $bg_footer_style  = fw_get_db_settings_option( 'footer_background/background_type' );
        $bg_footer_border = fw_get_db_settings_option( 'footer_border/show' );

        if ( $bg_footer_style == 'color_background' ) {
            $bg_color  = fw_get_db_settings_option( 'footer_background/color_background/bg_color' );
            $pattern  .= 'background-color: %s;'; //$bg_color
            $args[]    = $bg_color;
        } elseif ( $bg_footer_style == 'image_background' ) {
            $bg_image        = fw_get_db_settings_option( 'footer_background/image_background/bg_image' );
            $bg_image_filter = fw_get_db_settings_option( 'footer_background/image_background/bg_image_filter' );

            if ( ! empty( $bg_image ) ) {
                $pattern .= "background: url('%s') no-repeat top center ;";
                $args[]  = $bg_image['url'];
            }
        }
        if ( $bg_footer_border === 'on' ) {
            $bg_footer_border_size   = fw_get_db_settings_option( 'footer_border/on/border_size' );
            $bg_footer_border_color  = fw_get_db_settings_option( 'footer_border/on/border_color' );
            $pattern                .= 'border-top: %spx solid %s;';
            $args[]                  = $bg_footer_border_size;
            $args[]                  = $bg_footer_border_color;
        }
        $pattern                   = ! empty( $pattern ) ? 'style="' . $pattern . '"' : '';
        $output['pattern']         = $pattern;
        $output['args']            = $args;
        $output['bg_image_filter'] = $bg_image_filter;

        return $output;
    }
}

if(!function_exists('nex_get_breadcrumb_style')) {
    function nex_get_breadcrumb_style( ) {
        $output = array();
        $pattern = $bg_image_filter = $args = '';

        $bg_header_style = fw_get_db_settings_option( 'header_style/layout_type' );

        if ( $bg_header_style !== 'no_breadcrumbs' ) {
            if ( $bg_header_style == 'color_breadcrumbs' ) {
                $bg_color = fw_get_db_settings_option( 'header_style/color_breadcrumbs/bg_color' );
                $pattern  = 'background-color: %s;';
                $args = $bg_color;
            } elseif ( $bg_header_style == 'image_breadcrumbs' ) {
                $bg_image        = fw_get_db_settings_option( 'header_style/image_breadcrumbs/bg_image' );
                $bg_image_filter = fw_get_db_settings_option( 'header_style/image_breadcrumbs/bg_image_filter' );

                if ( ! empty( $bg_image ) ) {
                    $pattern = "background: url( '%s' ) no-repeat top center;";
                    $args = $bg_image['url'];
                }
            }
        }
        $pattern                   = ! empty( $pattern ) ? 'style="' . $pattern . '"' : '';
        $output['pattern']         = $pattern;
        $output['args']            = $args;
        $output['bg_image_filter'] = $bg_image_filter;
        return $output;
    }
}

if(!function_exists('nex_array_push_assoc')) {
    function nex_array_push_assoc($array, $key, $value){
        $array[$key] = $value;
        return $array;
    }
}

if(!function_exists('nex_get_theme_breadcrumb_settings')) {
    function nex_get_theme_breadcrumb_settings() {
        $output = array();
        if(fw_get_db_settings_option('header_style/layout_type') !== 'no_breadcrumbs') {
            $output = array(
                'type'  => 'multi-picker',
                'label' => false,
                'desc'  => false,
                'value' => array(
                    'show_breadcrumbs' => 'on'
                ),
                'picker' => array(
                    'show_breadcrumbs' => array(
                        'type'  => 'switch',
                        'value' => 'on',
                        'label' => esc_html__('Show Header Breadcrumb', 'nex'),
                        'desc'  => esc_html__('Displays a heading section above the content of page with title and subtitle.', 'nex'),
                        'left-choice' => array(
                            'value' => 'off',
                            'label' => esc_html__('Off', 'nex'),
                        ),
                        'right-choice' => array(
                            'value' => 'on',
                            'label' => esc_html__('On', 'nex'),
                        ),
                    ),
                ),
                'choices' => array(
                    'off' => array(

                    ),
                    'on' => array(
                        'title' => array(
                            'type'  => 'text',
                            'label' => esc_html__('Title', 'nex'),
                            'desc'  => esc_html__('Text to appear in the header. Defaults to WP page title.', 'nex'),
                        ),
                        'subtitle' => array(
                            'type'  => 'text',
                            'label' => esc_html__('Subtitle', 'nex'),
                            'desc'  => esc_html__('Text to appear in the header under the title.', 'nex'),
                        ),
                    ),
                ),
                'show_borders' => false,
            );
        }
        return $output;
    }
}


//remove child of parent menu item
if(!function_exists('nex_remove_child_menu_items')) {
    function nex_remove_child_menu_items(&$menu_items, $parent_id){
        foreach ( $menu_items as $key => $menu_item ) {
            if($menu_item->menu_item_parent == $parent_id){
                nex_remove_child_menu_items($menu_items,$menu_items[$key]->ID);
                unset($menu_items[$key]);
            }
        }
    }
}