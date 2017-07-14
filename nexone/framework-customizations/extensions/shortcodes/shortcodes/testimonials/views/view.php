<?php
if (!defined('FW')) die('Forbidden');
/**
 * @var $atts
 */
?>
<?php if(fw_akg('testimonials/layout_type', $atts) === 'layout_1') :
    $cols = fw_akg('testimonials/layout_1/cols', $atts);
    $testimonials = fw_akg('testimonials/layout_1/testimonials', $atts); ?>
    <!-- testimonials v1-->
    <div class="row">
        <?php foreach($testimonials as $data) : ?>
            <div class="<?php esc_attr_e($cols) ?> col-sm-6 col-xs-12">
                <div class="nex-v1-testimonial">
                    <div class="nex-content">
                        <ul>
                            <?php for($i = 0; $i < $data['rating']; $i++) echo '<li><i class="fa fa-star"></i></li>' ?>
                            <?php for($i = 0; $i < 5 - $data['rating']; $i++) echo '<li><i class="fa fa-star-o"></i></li>' ?>
                        </ul>
                        <?php echo do_shortcode( $data['text'] ); ?>
                    </div>
                    <div class="nex-footer">
                        <?php if(!empty($data['title'])) printf('<h4>%s</h4>', esc_attr($data['title'])) ?>
                        <?php if(!empty($data['role'])) printf('<h5>%s</h5>', esc_attr($data['role'])) ?>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <!-- /testimonials v1-->
<?php elseif(fw_akg('testimonials/layout_type', $atts) === 'layout_2') :
	$cols = fw_akg('testimonials/layout_2/cols', $atts);
	$testimonials = fw_akg('testimonials/layout_2/testimonials', $atts); ?>
    <!-- testimonials v2-->
    <div class="row">
        <?php foreach($testimonials as $data) : ?>
            <div class="<?php esc_attr_e($cols) ?>">
                <div class="nex-v2-testimonial">
                    <div class="nex-content">
                        <?php echo do_shortcode( $data['text'] ); ?>
                    </div>
                    <div class="nex-footer">
	                    <?php if(!empty($data['image']['url'])) printf('<div class="nex-cover"><img src="%s" alt="%s" /></div>', esc_attr($data['image']['url']), esc_html_x('team image','image alt','nex')) ?>
                        <?php if(!empty($data['title'])) printf('<h4>%s</h4>', esc_attr($data['title'])) ?>
                        <?php if(!empty($data['role'])) printf('<h6>%s</h6>', esc_attr($data['role'])) ?>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <!-- /testimonials v2-->
<?php elseif(fw_akg('testimonials/layout_type', $atts) === 'layout_3') :
	$cols = fw_akg('testimonials/layout_3/cols', $atts);
	$testimonials = fw_akg('testimonials/layout_3/testimonials', $atts); ?>
    <!-- testimonials v3-->
    <div class="row">
        <?php foreach($testimonials as $data) : ?>
            <div class="<?php esc_attr_e($cols) ?> col-sm-6 col-xs-12">
                <div class="nex-v3-testimonial">
                    <?php if(!empty($data['image']['url'])) printf('<div class="nex-cover"><img src="%s" alt="%s" /></div>', esc_attr($data['image']['url']), esc_html_x('team image','image alt','nex')) ?>
                    <div class="nex-header">
                        <?php if(!empty($data['title'])) printf('<h4>%s</h4>', esc_attr($data['title'])) ?>
                        <?php if(!empty($data['role'])) printf('<h6 class="nex-cc">%s</h6>', esc_attr($data['role'])) ?>
                    </div>
                    <div class="nex-content">
                        <?php echo do_shortcode( $data['text'] ); ?>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <!-- /testimonials v3-->
<?php elseif(fw_akg('testimonials/layout_type', $atts) === 'layout_4') :
	$testimonials = fw_akg('testimonials/layout_4/testimonials', $atts); ?>
    <!-- testimonials v4-->
    <div class="nex-testimonial-v4 nex-slick">
        <?php foreach($testimonials as $data) :?>
            <div class="nex-v4-testimonial nex-bc">
                <?php if(!empty($data['image']['url'])) printf('<div class="testimonial-avatar nex-bc"><img src="%s" alt="%s" /></div>', esc_attr($data['image']['url']), esc_html_x('team image','image alt','nex')) ?>
                <?php echo do_shortcode( $data['text'] ); ?>
                <?php if(!empty($data['title'])) printf('<h4>%s</h4>', esc_attr($data['title'])) ?>
                <?php if(!empty($data['role'])) printf('<h6 class="nex-cc">%s</h6>', esc_attr($data['role'])) ?>
            </div>
        <?php endforeach; ?>
    </div>
    <!-- /testimonials v4-->
<?php elseif(fw_akg('testimonials/layout_type', $atts) === 'layout_5') :
	$testimonials = fw_akg('testimonials/layout_5/testimonials', $atts); ?>
    <!-- testimonials v5-->
    <div class="nex-slider nex-slick nex-v5-testimonial-box">
        <?php foreach($testimonials as $data) : ?>
            <div class="nex-v5-testimonial">
	            <?php if(!empty($data['image']['url'])) printf('<div class="testimonial-avatar nex-bc"><img src="%s" alt="%s" /></div>', esc_attr($data['image']['url']), esc_html_x('team image','image alt','nex')) ?>
                <?php echo do_shortcode( $data['text'] ); ?>
                <?php if(!empty($data['title'])) printf('<h4>%s</h4>', esc_attr($data['title'])) ?>
                <?php if(!empty($data['role'])) printf('<h6 class="nex-cc">%s</h6>', esc_attr($data['role'])) ?>
            </div>
        <?php endforeach; ?>
    </div>
    <!-- /testimonials v5-->
<?php elseif(fw_akg('testimonials/layout_type', $atts) === 'layout_6') :
	$testimonials = fw_akg('testimonials/layout_6/testimonials', $atts); ?>
    <!-- testimonials v6-->
    <div class="nex-testimonials-slider">
        <?php foreach($testimonials as $data) : ?>
            <div class="nex-v6-testimonial">
	            <?php if(!empty($data['image']['url'])) printf('<div class="nex-cover"><img src="%s" alt="%s" /></div>', esc_attr($data['image']['url']), esc_html_x('team image','image alt','nex')) ?>
                <div class="nex-content">
	                <?php echo do_shortcode( $data['text'] ); ?>
                </div>
	            <?php if(!empty($data['role']) || !empty($data['title'])) printf('<div class="nex-footer"><h4>%s, <span class="nex-cc">%s</span></h4></div>', esc_attr($data['title']), esc_attr($data['role'])) ?>
            </div>
        <?php endforeach; ?>
    </div>
    <!-- /testimonials v6-->
<?php endif;