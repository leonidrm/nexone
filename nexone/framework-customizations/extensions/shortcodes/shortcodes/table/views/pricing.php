<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

/**
 * @var array $atts
 */

$class_width = 'fw-col-sm-' . ceil(12 / count($atts['table']['cols']));

/** @var FW_Extension_Shortcodes $shortcodes */
$shortcodes = fw_ext('shortcodes');
/** @var FW_Shortcode_Table $table */
$table = $shortcodes->get_shortcode('table');

$layout = fw_akg('layout/layout_type', $atts);

$bg_image = fw_akg('layout/v6/bg_image', $atts);
$logo_images = fw_akg('layout/v6/images', $atts);

$style = $layout === 'v6' && !empty($bg_image) ? 'style="background: url(' . $bg_image['url'] .')"' : '';
?>
<!-- Pricing <?php esc_attr_e($layout) ?> start -->
<div class="row">
	<?php foreach ($atts['table']['cols'] as $col_key => $col): ?>
        <div class="<?php echo str_replace('fw-','', $class_width) ?> col-xs-12">
            <div class="<?php echo 'nex-' . $layout . '-pricing ' . $col['name'] ?>" <?php echo 'highlight-col' !== $col['name'] ? $style : ''?>>
				<?php foreach ($atts['table']['rows'] as $row_key => $row): ?>
					<?php if( $col['name'] == 'desc-col' ) : ?>
                        <div class="nex-content">
							<?php echo !empty($atts['table']['content'][$row_key][$col_key]['textarea']) ? $atts['table']['content'][$row_key][$col_key]['textarea'] : '' ; ?>
                        </div>
						<?php continue; endif; ?>
					<?php if ($row['name'] === 'heading-row'): ?>
                        <div class="nex-header-title">
							<?php
                            $value = $atts['table']['content'][$row_key][$col_key]['textarea'];
                            switch ($layout) {
                                case 'v3' || 'v6':
                                    $tag = 'h4';
                                    break;
                                case 'v5':
	                                $tag = 'h2';
	                                break;
                                default :
		                            $tag = 'h3';
		                            break;
                            }
                            printf('<%s>%s</%s>', $tag, $value, $tag) ?>
                        </div>
					<?php elseif ($row['name'] === 'pricing-row'): ?>
                        <div class="nex-header">
							<?php
							$desc   = $atts['table']['content'][$row_key][$col_key]['description'];
							$amount = $atts['table']['content'][$row_key][$col_key]['amount'];
							preg_match('(\d+)', $amount, $price);
							$currency = str_replace($price[0], '', $amount);

							if($layout == 'v6' && !empty($logo_images[$col_key])) printf('<div class="nex-cover"><img src="%s" alt="%s" /></div>', $logo_images[$col_key]['image']['url'],esc_html__('pricing icon','nex'));

                            if($layout !== 'v2') {
                                if($layout == 'v1') {
	                                $pattern_1 = '<h4><span>%s</span>%s</h4>';
	                                $pattern_2 = '<h6 class="nex-cc">%s</h6>';
                                }
                                elseif($layout == 'v3' || $layout == 'v4' || $layout == 'v5') {
	                                $pattern_1 = '<h3><span>%s</span>%s</h3>';
	                                $pattern_2 = '<p>%s</p>';
                                } else {
	                                $pattern_1 = '<h6><span>%s</span>%s</h6>';
	                                $pattern_2 = '<p>%s</p>';
                                }

	                            printf( $pattern_1, $currency, $price[0] );
	                            printf( $pattern_2, $desc );

                            } else {
	                            printf('<h4 class="nex-cc"><span class="nex-value">%s</span>%s <span class="nex-period">%s</span></h4>', $currency, $price[0], $desc);
							} ?>

                        </div>
					<?php elseif ( $row['name'] == 'button-row' ) : ?>
						<?php if ($button = $table->get_button_shortcode()): ?>
                            <div class="nex-footer">
								<?php if ( false === empty( $atts['table']['content'][ $row_key ][ $col_key ]['button'] ) and false === empty($button) ) : ?>
									<?php print $button->render($atts['table']['content'][ $row_key ][ $col_key ]['button']); ?>
								<?php else : ?>
                                    <span>&nbsp;</span>
								<?php endif; ?>
                            </div>
						<?php endif; ?>
					<?php elseif ($row['name'] === 'switch-row') : ?>
                        <div class="nex-switch-row">
							<?php $value = $atts['table']['content'][$row_key][$col_key]['switch']; ?>
                            <span>
								<i class="fa fw-price-icon-<?php esc_attr_e($value) ?>"></i>
							</span>
                        </div>
					<?php elseif ($row['name'] === 'default-row') : ?>
                        <div class="nex-content">
							<?php $value = $atts['table']['content'][$row_key][$col_key]['textarea']; ?>
							<?php print $value ?>
                        </div>
					<?php endif; ?>
				<?php endforeach; ?>
            </div>
        </div>
	<?php endforeach; ?>
</div>
<!-- Pricing <?php esc_attr_e($layout) ?> end -->
