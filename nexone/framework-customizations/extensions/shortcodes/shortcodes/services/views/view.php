<?php
if (!defined('FW')) die('Forbidden');
/**
 * @var $atts
 */
?>

<?php if(fw_akg('services/layout_type', $atts) === 'layout_1') :
	$cols = fw_akg('services/layout_1/cols', $atts);
	$services = fw_akg('services/layout_1/services', $atts); ?>
    <!-- services v1-->
    <div class="row">
        <?php foreach($services as $service) : ?>
            <div class="<?php esc_attr_e($cols) ?> col-sm-4 col-xs-12">
                <div class="nex-v1-service">
                    <div class="nex-cover">
	                    <?php if($service['icon']['type'] === 'custom-upload') : ?>
                            <img src="<?php esc_attr_e( $service['icon']['url'] ); ?>" alt="<?php esc_html_e('service image','nex') ?>" />
	                    <?php else: ?>
                            <i class="<?php esc_attr_e( $service['icon']['icon-class'] ); ?>"></i>
	                    <?php endif; ?>
                    </div>
                    <div class="nex-content">
	                    <?php if(!empty($service['title'])) printf('<h4 class="nex-cc">%s</h4>', esc_attr($service['title'])) ?>
	                    <?php echo do_shortcode($service['descr']) ?>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <!-- /services v1-->
<?php elseif(fw_akg('services/layout_type', $atts) === 'layout_2') :
    $cols = fw_akg('services/layout_2/cols', $atts);
    $services = fw_akg('services/layout_2/services', $atts); ?>
    <!-- services v2-->
    <div class="row">
        <?php foreach($services as $service) : ?>
            <div class="<?php esc_attr_e($cols) ?>">
                <div class="nex-v2-service <?php echo 'default' !== $service['icon_pos'] ? 'nex-cover-right' : ''?>">
                    <div class="nex-cover nex-cc">
	                    <?php if($service['icon']['type'] === 'custom-upload') : ?>
                            <img src="<?php esc_attr_e( $service['icon']['url'] ); ?>" alt="<?php esc_html_e('service image','nex') ?>" />
	                    <?php else: ?>
                            <i class="<?php esc_attr_e( $service['icon']['icon-class'] ); ?>"></i>
	                    <?php endif; ?>
                    </div>
                    <div class="nex-content">
	                    <?php if(!empty($service['title'])) printf('<h3>%s</h3>', esc_attr($service['title'])) ?>
	                    <?php echo do_shortcode($service['descr']) ?>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <!-- /services v2-->
<?php elseif(fw_akg('services/layout_type', $atts) === 'layout_3') :
	$cols = fw_akg('services/layout_3/cols', $atts);
	$services = fw_akg('services/layout_3/services', $atts); ?>
    <!-- services v3-->
    <div class="row">
		<?php foreach($services as $service) : ?>
            <div class="<?php esc_attr_e($cols) ?>">
                <div class="nex-v3-service">
	                <?php if($service['icon']['type'] === 'custom-upload') : ?>
                        <img src="<?php esc_attr_e( $service['icon']['url'] ); ?>" alt="<?php esc_html_e('service image','nex') ?>" />
	                <?php else: ?>
                        <i class="<?php esc_attr_e( $service['icon']['icon-class'] ); ?>"></i>
	                <?php endif; ?>
	                <?php if(!empty($service['title'])) printf('<h4>%s</h4>', esc_attr($service['title'])) ?>
	                <?php echo do_shortcode($service['descr']) ?>
                </div>
            </div>
		<?php endforeach; ?>
    </div>
    <!-- /services v3-->
<?php elseif(fw_akg('services/layout_type', $atts) === 'layout_4') :
	$cols = fw_akg('services/layout_4/cols', $atts);
	$services = fw_akg('services/layout_4/services', $atts); ?>
    <!-- services v4-->
    <div class="row">
		<?php foreach($services as $service) : ?>
            <div class="<?php esc_attr_e($cols) ?> col-xs-6 col-sm-6">
                <div class="nex-v4-service nex-bc nex-bgca nex-bgcb">
					<?php if($service['icon']['type'] === 'custom-upload') : ?>
                        <img src="<?php esc_attr_e( $service['icon']['url'] ); ?>" alt="<?php esc_html_e('service image','nex') ?>" />
					<?php else: ?>
                        <i class="<?php esc_attr_e( $service['icon']['icon-class'] ); ?>"></i>
					<?php endif; ?>
					<?php if(!empty($service['title'])) printf('<h3 class="nex-cc">%s</h3>', esc_attr($service['title'])) ?>
                    <?php echo do_shortcode($service['descr']) ?>
                </div>
            </div>
		<?php endforeach; ?>
    </div>
    <!-- /services v4-->
<?php elseif(fw_akg('services/layout_type', $atts) === 'layout_5') :
	$cols = fw_akg('services/layout_5/cols', $atts);
	$services = fw_akg('services/layout_5/services', $atts); ?>
    <!-- services v5-->
	<?php foreach($services as $i => $service) : ?>
        <div class="no-padding <?php esc_attr_e($cols) ?>">
            <div class="nex-v5-service <?php echo ++$i % 2 ? 'nex-second' : '' ?>">
	            <?php if(!empty($service['title'])) printf('<h3>%s</h3>', esc_attr($service['title'])) ?>
                <?php echo do_shortcode($service['descr']) ?>
	            <?php if(!empty($service['link'])) printf('<a class="nex-button nex-v4-button" href="%s">%s</a>', $service['link'], $service['label']) ?>
            </div>
        </div>
    <?php endforeach; ?>
    <!-- /services v5-->
<?php elseif(fw_akg('services/layout_type', $atts) === 'layout_6') :
	$cols = fw_akg('services/layout_6/cols', $atts);
	$services = fw_akg('services/layout_6/services', $atts);
	$counter = 0; ?>
    <!-- services v6-->
	<?php foreach($services as $service) : $counter++ ?>
        <div class="nex-v6-service">
            <div class="row">
                <?php if($counter % 2 == 0) : ?>
                    <div class="col-md-7">
                        <div class="nex-content">
                            <?php echo do_shortcode($service['descr']) ?>
			                <?php if(!empty($service['link'])) printf('<a class="nex-button nex-v4-button" href="%s">%s</a>', $service['link'], $service['label']) ?>
                        </div>
                    </div>
                <?php endif ?>
                <div class="col-md-5">
                    <div class="nex-cover">
                        <?php if(!empty($service['title'])) printf('<div class="nex-hover"><h3>%s</h3></div>', esc_attr($service['title'])) ?>
	                    <?php if($service['icon']['type'] === 'custom-upload') : ?>
                            <img src="<?php esc_attr_e( $service['icon']['url'] ); ?>" alt="<?php esc_html_e('service image','nex') ?>" />
	                    <?php else: ?>
                            <i class="<?php esc_attr_e( $service['icon']['icon-class'] ); ?>"></i>
	                    <?php endif; ?>
                    </div>
                </div>
	            <?php if($counter % 2 !== 0) : ?>
                    <div class="col-md-7">
                        <div class="nex-content">
                            <?php echo do_shortcode($service['descr']) ?>
				            <?php if(!empty($service['link'])) printf('<a class="nex-button nex-v4-button" href="%s">%s</a>', $service['link'], $service['label']) ?>
                        </div>
                    </div>
	            <?php endif ?>
            </div>
        </div>
    <?php endforeach ?>
    <!-- /services v6-->
<?php elseif(fw_akg('services/layout_type', $atts) === 'layout_7') :
	$cols = fw_akg('services/layout_7/cols', $atts);
	$services = fw_akg('services/layout_7/services', $atts) ?>
    <!-- services v7-->
    <div class="row">
		<?php foreach($services as $service) : ?>
            <div class="<?php esc_attr_e($cols) ?> col-xs-6 col-sm-6">
                <div class="nex-v7-service">
                    <div class="service-icon">
	                    <?php if($service['icon']['type'] === 'custom-upload') : ?>
                            <img src="<?php esc_attr_e( $service['icon']['url'] ); ?>" alt="<?php esc_html_e('service image','nex') ?>" />
	                    <?php else: ?>
                            <i class="nex-cc <?php esc_attr_e( $service['icon']['icon-class'] ); ?>"></i>
	                    <?php endif; ?>
                    </div>
	                <?php if(!empty($service['title'])) printf('<h4>%s</h4>', esc_attr($service['title'])) ?>
                    <?php echo do_shortcode($service['descr']) ?>
                </div>
            </div>
		<?php endforeach ?>
    </div>
    <!-- /services v7-->
<?php elseif(fw_akg('services/layout_type', $atts) === 'layout_8') :
	$cols = fw_akg('services/layout_8/cols', $atts);
	$services = fw_akg('services/layout_8/services', $atts) ?>
    <!-- services v8-->
    <div class="row">
		<?php foreach($services as $service) : ?>
            <div class="<?php esc_attr_e($cols) ?>">
                <div class="nex-v8-service">
                    <div class="nex-cover">
	                    <?php if($service['icon']['type'] === 'custom-upload') : ?>
                            <img src="<?php esc_attr_e( $service['icon']['url'] ); ?>" alt="<?php esc_html_e('service image','nex') ?>" />
	                    <?php else: ?>
                            <i class="nex-cc <?php esc_attr_e( $service['icon']['icon-class'] ); ?>"></i>
	                    <?php endif; ?>
                    </div>
	                <?php if(!empty($service['title'])) printf('<h3>%s</h3>', esc_attr($service['title'])) ?>
                    <?php echo do_shortcode($service['descr']) ?>
                </div>
            </div>
		<?php endforeach ?>
    </div>
    <!-- /services v8-->
<?php elseif(fw_akg('services/layout_type', $atts) === 'layout_9') :
	$services = fw_akg('services/layout_9/services', $atts) ?>
    <!-- services v9-->
    <div class="row nex-slick nex-slick-study">
		<?php foreach($services as $service) : ?>
            <div class="col-md-3 col-xs-6">
                <div class="nex-v9-service">
                    <div class="nex-cover">
	                    <?php if($service['icon']['type'] === 'custom-upload') : ?>
                            <img src="<?php esc_attr_e( $service['icon']['url'] ); ?>" alt="<?php esc_html_e('service image','nex') ?>" />
	                    <?php else: ?>
                            <i class="nex-cc <?php esc_attr_e( $service['icon']['icon-class'] ); ?>"></i>
	                    <?php endif; ?>
                    </div>
                    <div class="nex-content">
                        <?php echo do_shortcode($service['descr']) ?>
                    </div>
	                <?php if(!empty($service['link'])) printf('<div class="nex-footer"><a href="%s">%s</a></div>', $service['link'], $service['label']) ?>
                </div>
            </div>
		<?php endforeach ?>
    </div>
    <!-- /services v9-->
<?php elseif(fw_akg('services/layout_type', $atts) === 'layout_10') :
    $cols = fw_akg('services/layout_10/cols', $atts);
    $services = fw_akg('services/layout_10/services', $atts) ?>
    <!-- services v10-->
    <div class="row">
        <?php foreach($services as $service) : ?>
            <div class="<?php esc_attr_e($cols) ?> col-xs-6 col-sm-6">
                <div class="nex-v10-service">
                    <div class="nex-cover">
                        <?php if($service['icon']['type'] === 'custom-upload') : ?>
                            <img src="<?php esc_attr_e( $service['icon']['url'] ); ?>" alt="<?php esc_html_e('service image','nex') ?>" />
                        <?php else: ?>
                            <i class="nex-cc <?php esc_attr_e( $service['icon']['icon-class'] ); ?>"></i>
                        <?php endif; ?>
                    </div>
                    <div class="nex-content">
                        <?php if(!empty($service['title'])) printf('<h3>%s</h3>', esc_attr($service['title'])) ?>
                        <?php echo do_shortcode($service['descr']) ?>
                    </div>
                </div>
            </div>
        <?php endforeach ?>
    </div>
    <!-- /services v10-->
<?php elseif(fw_akg('services/layout_type', $atts) === 'layout_11') :
	$cols = fw_akg('services/layout_11/cols', $atts);
	$services = fw_akg('services/layout_11/services', $atts) ?>
    <!-- services v11-->
    <div class="row nex-services-slider">
		<?php foreach($services as $service) : ?>
            <div class="<?php esc_attr_e($cols) ?>">
                <div class="nex-v11-service">
	                <?php if(!empty($service['image'])) : ?>
                        <div class="nex-cover">
                            <img src="<?php echo esc_url($service['image']['url']) ?>" alt="<?php esc_html_x('service image','image alt','nex') ?>" />
                        </div>
	                <?php endif ?>
                    <?php if(!empty($service['title'])) printf('<div class="nex-header"><h2>%s</h2></div>', esc_attr($service['title'])) ?>
                    <div class="nex-content">
                        <?php echo do_shortcode($service['descr']) ?>
                    </div>
                    <div class="nex-footer">
                        <?php if(!empty( $service['data_right'])) : ?>
                            <div class="nex-date">
                                <?php if($service['icon_right']['type'] === 'custom-upload') : ?>
                                    <img src="<?php esc_attr_e( $service['icon_right']['url'] ); ?>" alt="<?php esc_html_e('service image','nex') ?>" /> <?php esc_attr_e( $service['data_right']) ?>
                                <?php else: ?>
                                    <i class="nex-cc <?php esc_attr_e( $service['icon_right']['icon-class'] ); ?>"></i> <?php esc_attr_e( $service['data_right']) ?>
                                <?php endif; ?>
                            </div>
                        <?php endif ?>
                        <?php if(!empty( $service['data_left'])) : ?>
                            <div class="nex-category">
                                <?php if($service['icon_left']['type'] === 'custom-upload') : ?>
                                    <img src="<?php esc_attr_e( $service['icon_left']['url'] ); ?>" alt="<?php esc_html_e('service image','nex') ?>" /> <?php esc_attr_e( $service['data_left']) ?>
                                <?php else: ?>
                                    <i class="nex-cc <?php esc_attr_e( $service['icon_left']['icon-class'] ); ?>"></i><?php esc_attr_e( $service['data_left']) ?>
                                <?php endif; ?>
                            </div>
                        <?php endif ?>
                    </div>
                </div>
            </div>
		<?php endforeach ?>
    </div>
    <!-- /services v11-->
<?php endif;