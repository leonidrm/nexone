<?php
if (!defined('FW')) die('Forbidden');
/**
 * @var $atts
 */
$kses_args = array(
	'span'=>array(),
	'br'=>array(),
	'i'=>array(),
	'u'=>array(),
	'b'=>array()
) ?>
<?php if(fw_akg('team/layout_type', $atts) === 'layout_1') :
$cols = fw_akg('team/layout_1/cols', $atts);
$team_members = fw_akg('team/layout_1/team_members', $atts); ?>
    <!-- team v1-->
    <div class="row">
        <?php foreach($team_members as $data) : ?>
            <div class="<?php esc_attr_e($cols) ?> col-sm-6">
                <div class="nex-v1-team">
	                <?php if(!empty($data['image']['url'])) printf('<div class="nex-cover"><img src="%s" alt="%s" /></div>', esc_attr($data['image']['url']), esc_html_x('team image','image alt','nex')) ?>
                    <div class="nex-team-container">
                        <div class="nex-header">
                            <?php if(!empty($data['role'])) printf('<h5 class="nex-cc">%s</h5>', esc_attr($data['role'])) ?>
                            <?php if(!empty($data['title'])) printf('<h4>%s</h4>', esc_attr($data['title'])) ?>
                        </div>
                        <?php if(!empty($data['message'])) printf('<div class="nex-content"><p>%s</p></div>', esc_attr($data['message'])); ?>
                        <div class="nex-footer">
                            <ul>
                                <?php foreach($data['social_profiles'] as $social) : ?>
                                    <li>
                                        <a target="_blank" class="nex-cch" href="<?php echo esc_url($social['link']) ?>">
                                            <?php if($social['icon']['type'] === 'custom-upload') : ?>
                                                <img src="<?php esc_attr_e( $social['icon']['url'] ); ?>" alt="<?php esc_html_e('social image','nex') ?>" />
                                            <?php else: ?>
                                                <i class="<?php esc_attr_e( $social['icon']['icon-class'] ); ?>"></i>
                                            <?php endif; ?>
                                        </a>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <!-- /team v1-->
<?php elseif(fw_akg('team/layout_type', $atts) === 'layout_2') :
    $cols = fw_akg('team/layout_2/cols', $atts);
    $team_members = fw_akg('team/layout_2/team_members', $atts); ?>
    <!-- team v2-->
    <div class="row">
        <?php foreach($team_members as $data) : ?>
            <div class="<?php esc_attr_e($cols) ?> col-sm-4 col-xs-6">
                <div class="nex-v2-team">
	                <?php if(!empty($data['image']['url'])) printf('<div class="nex-cover"><img src="%s" alt="%s" /></div>', esc_attr($data['image']['url']), esc_html_x('team image','image alt','nex')) ?>
                    <div class="nex-header">
                        <?php if(!empty($data['title'])) printf('<h4>%s</h4>', esc_attr($data['title'])) ?>
                        <?php if(!empty($data['role'])) printf('<h5>%s</h5>', esc_attr($data['role'])) ?>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <!-- /team v2-->
<?php elseif(fw_akg('team/layout_type', $atts) === 'layout_3') :
    $cols = fw_akg('team/layout_3/cols', $atts);
    $team_members = fw_akg('team/layout_3/team_members', $atts); ?>
    <!-- team v3-->
    <div class="row">
        <?php foreach($team_members as $data) : ?>
            <div class="<?php esc_attr_e($cols) ?> col-sm-6">
                <div class="nex-v3-team">
                    <div class="nex-header">
                        <?php if(!empty($data['title'])) printf('<h4>%s</h4>', esc_attr($data['title'])) ?>
                        <?php if(!empty($data['role'])) printf('<h5>%s</h5>', esc_attr($data['role'])) ?>
                    </div>
	                <?php if(!empty($data['image']['url'])) printf('<div class="nex-cover"><img src="%s" alt="%s" /></div>', esc_attr($data['image']['url']), esc_html_x('team image','image alt','nex')) ?>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <!-- /team v3-->
<?php elseif(fw_akg('team/layout_type', $atts) === 'layout_4') :
    $cols = fw_akg('team/layout_4/cols', $atts);
    $team_members = fw_akg('team/layout_4/team_members', $atts); ?>
    <!-- team v4-->
    <div class="row">
        <?php foreach($team_members as $data) : ?>
            <div class="<?php esc_attr_e($cols) ?> col-sm-4 col-xs-6">
                <div class="nex-v4-team">
	                <?php if(!empty($data['image']['url'])) printf('<div class="nex-cover"><img src="%s" alt="%s" /></div>', esc_attr($data['image']['url']), esc_html_x('team image','image alt','nex')) ?>
                    <div class="nex-header">
                        <?php if(!empty($data['title'])) printf('<h2>%s</h2>', esc_attr($data['title'])) ?>
                        <?php if(!empty($data['role'])) printf('<h4>%s</h4>', esc_attr($data['role'])) ?>
                    </div>
                    <div class="nex-content">
                        <ul>
                            <?php if(!empty($data['email'])) printf('<li><i class="nex-cc fa fa-envelope-o"></i> <a href="mailto:%s">%s</a></li>', esc_attr($data['email']), esc_attr($data['email'])) ?>
                            <?php if(!empty($data['phone'])) printf('<li><i class="nex-cc fa fa-phone"></i> <a href="tel:%s">%s</a></li>', esc_attr($data['phone']), esc_attr($data['phone'])) ?>
                        </ul>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <!-- /team v4-->
<?php elseif(fw_akg('team/layout_type', $atts) === 'layout_5') :
	$cols = fw_akg('team/layout_5/cols', $atts);
	$team_members = fw_akg('team/layout_5/team_members', $atts); ?>
    <!-- /team v5-->
    <div class="row">
        <?php foreach($team_members as $data) : ?>
            <div class="<?php esc_attr_e($cols) ?> col-xs-6 col-sm-6">
                <div class="nex-v5-team">
	                <?php if(!empty($data['image']['url'])) printf('<div class="team-cover"><img src="%s" alt="%s" /></div>', esc_attr($data['image']['url']), esc_html_x('team image','image alt','nex')) ?>
                    <div class="team-hover nex-bgca">
                        <?php if(!empty($data['title'])) printf('<h3>%s</h3>', esc_attr($data['title'])) ?>
                        <?php if(!empty($data['role'])) printf('<p>%s</p>', esc_attr($data['role'])) ?>
                        <ul class="team-socials">
                            <?php foreach($data['social_profiles'] as $social) : ?>
                                <li>
                                    <a target="_blank" href="<?php echo esc_url($social['link']) ?>">
                                        <?php if($social['icon']['type'] === 'custom-upload') : ?>
                                            <img src="<?php esc_attr_e( $social['icon']['url'] ); ?>" alt="<?php esc_html_e('social image','nex') ?>" />
                                        <?php else: ?>
                                            <i class="<?php esc_attr_e( $social['icon']['icon-class'] ); ?>"></i>
                                        <?php endif; ?>
                                    </a>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <!-- /team v5-->
<?php elseif(fw_akg('team/layout_type', $atts) === 'layout_6') :
    $cols = fw_akg('team/layout_6/cols', $atts);
    $team_members = fw_akg('team/layout_6/team_members', $atts); ?>
    <!-- team v6-->
    <div class="row">
        <?php foreach($team_members as $data) : ?>
            <div class="<?php esc_attr_e($cols) ?> col-xs-12 col-sm-6">
                <div class="nex-v6-team">
	                <?php if(!empty($data['image']['url'])) printf('<div class="team-image"><img src="%s" alt="%s" /></div>', esc_attr($data['image']['url']), esc_html_x('team image','image alt','nex')) ?>
                    <div class="team-detail">
                        <?php if(!empty($data['title'])) printf('<h4 class="nex-bgca">%s</h4>', esc_attr($data['title'])) ?>
                        <?php if(!empty($data['role'])) printf('<p>%s</p>', esc_attr($data['role'])) ?>
                        <ul class="team-socials">
                            <?php foreach($data['social_profiles'] as $social) : ?>
                                <li>
                                    <a target="_blank" class="nex-cc nex-bc nex-bgch" href="<?php echo esc_url($social['link']) ?>">
                                        <?php if($social['icon']['type'] === 'custom-upload') : ?>
                                            <img src="<?php esc_attr_e( $social['icon']['url'] ); ?>" alt="<?php esc_html_e('social image','nex') ?>" />
                                        <?php else: ?>
                                            <i class="<?php esc_attr_e( $social['icon']['icon-class'] ); ?>"></i>
                                        <?php endif; ?>
                                    </a>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <!-- /team v6-->
<?php elseif(fw_akg('team/layout_type', $atts) === 'layout_7') :
	$cols = fw_akg('team/layout_7/cols', $atts);
	$team_members = fw_akg('team/layout_7/team_members', $atts); ?>
    <!-- team v7-->
    <div class="row">
        <?php foreach($team_members as $i => $data) : ?>
            <div class="<?php esc_attr_e($cols) ?> col-xs-12 col-sm-6">
                <div class="nex-v7-team">
                    <?php if(!empty($data['image'])) : ?>
                        <div class="team-image">
                            <ul class="team-socials">
                                <?php foreach($data['social_profiles'] as $social) : ?>
                                    <li>
                                        <a target="_blank" class="nex-cc nex-bc nex-bgch" href="<?php echo esc_url($social['link']) ?>">
                                            <?php if($social['icon']['type'] === 'custom-upload') : ?>
                                                <img src="<?php esc_attr_e( $social['icon']['url'] ); ?>" alt="<?php esc_html_e('social image','nex') ?>" />
                                            <?php else: ?>
                                                <i class="<?php esc_attr_e( $social['icon']['icon-class'] ); ?>"></i>
                                            <?php endif; ?>
                                        </a>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
	                        <?php if(!empty($data['image']['url'])) printf('<img src="%s" alt="%s" />', esc_attr($data['image']['url']), esc_html_x('team image','image alt','nex')) ?>
                        </div>
                    <?php endif ?>
                    <div class="team-detail">
	                    <?php if(!empty($data['title'])) printf('<h4>%s</h4>', esc_attr($data['title'])) ?>
	                    <?php if(!empty($data['role'])) printf('<h6>%s</h6>', esc_attr($data['role'])) ?>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <!-- /team v7-->
<?php elseif(fw_akg('team/layout_type', $atts) === 'layout_8') :
	$cols = fw_akg('team/layout_8/cols', $atts);
	$team_members = fw_akg('team/layout_8/team_members', $atts); ?>
    <!-- team v8-->
    <div class="row">
        <?php foreach($team_members as $i => $data) :?>
            <div class="<?php esc_attr_e($cols) ?> col-sm-6 col-xs-12">
                <div class="nex-v8-team">
	                <?php if(!empty($data['image']['url'])) printf('<div class="nex-cover"><img src="%s" alt="%s" /></div>', esc_attr($data['image']['url']), esc_html_x('team image','image alt','nex')) ?>
                    <div class="nex-header">
                        <?php if(!empty($data['link_type_right'])) {
	                        if($data['icon_right']['type'] === 'custom-upload') :
		                        $icon_pattern = '<img src="%s" alt="' . esc_html__('social image','nex') . '"/>';
		                        $icon_right = $data['icon_right']['url'];
	                        else:
		                        $icon_pattern = '<i class="%s"></i>';
		                        $icon_right = $data['icon_right']['icon-class'];
	                        endif;
                            $link_type = $data['link_type_right'] != 'default' ? $data['link_type_right'] : '';
                            if(!empty($data['icon_right']['url']) || !empty($data['icon_right']['icon-class']))
                                printf( '<a href="%s%s" class="nex-bgch nex-right">' . $icon_pattern . '</a>', $link_type, esc_attr($data['link_right']), $icon_right );
                        }
                        if(!empty($data['link_type_left'])) {
	                        if($data['icon_left']['type'] === 'custom-upload') :
		                        $icon_pattern = '<img src="%s" alt="' . esc_html__('social image','nex') . '"/>';
		                        $icon_left = $data['icon_left']['url'];
	                        else:
		                        $icon_pattern = '<i class="%s"></i>';
		                        $icon_left = $data['icon_left']['icon-class'];
	                        endif;
                            $link_type = $data['link_type_left'] != 'default' ? $data['link_type_left'] : '';
	                        if(!empty($data['icon_left']['url']) || !empty($data['icon_left']['icon-class']))
                                printf( '<a href="%s%s" class="nex-bgch">' . $icon_pattern . '</a>', $link_type, esc_attr($data['link_left']), $icon_left );
                        } ?>
                        <?php if(!empty($data['title'])) printf('<h5>%s</h5>', esc_attr($data['title'])) ?>
                        <?php if(!empty($data['role'])) printf('<p class="nex-cc">%s</p>', esc_attr($data['role'])) ?>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <!-- /team v8-->
<?php endif;
