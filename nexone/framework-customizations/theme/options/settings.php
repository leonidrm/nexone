<?php if (!defined( 'FW' )) die('Forbidden');

$portfolio_options = nex_get_options('portfolio');

$options = array(
    'general' => array(
        'title'   => esc_html__( 'General', 'nex' ),
        'type'    => 'tab',
        'options' => array(
            'favicon' => array(
                'type'  => 'upload',
                'label' => esc_html__('Favicon Image', 'nex'),
                'desc'  => esc_html__('Favicon of your website that will appear in browser tab', 'nex'),
                'help'  => esc_html__('Recommended size 32x32 px', 'nex'),
                'images_only' => true,
            ),
            'layout_picker' => array(
                'type'  => 'multi-picker',
                'label' => false,
                'desc'  => false,
                'value' => array(
                    'layout_type' => 'full',
                ),
                'picker' => array(
                    'layout_type' => array(
                        'type'  => 'image-picker',
                        'value' => 'full',
                        'label' => esc_html__('Layout Type', 'nex'),
                        'desc'  => esc_html__('Choose between: Full Width layout and Boxed layout', 'nex'),
                        'help'  => esc_html__('By default: full width, but if you select container mode you can add bg image', 'nex'),
                        'choices' => array(
                            'full' => fw_get_template_customizations_directory_uri('/theme/options/static/img/sidewide.png'),
                            'boxed' => fw_get_template_customizations_directory_uri('/theme/options/static/img/sideboxed.png'),
                        ),
                    ),
                ),
                'choices' => array(
                    'full' => array(
                        
                    ),
                    'boxed' => array(
                        'bg_image' => array(
                            'type'  => 'upload',
                            'label' => esc_html__('BG Image', 'nex'),
                            'desc'  => esc_html__('Image that will appear in the website\'s background.', 'nex'),
                            'help'  => esc_html__('You can also use textures.', 'nex'),
                            'images_only' => true,
                        ),
                    )
                )
            ),
            'gmaps_api_key' => array(
                'type' => 'gmap-key',
                'label' => esc_html__('Google Maps API Key', 'nex'),
                'desc'  => sprintf(
                    __( 'Create an application in %sGoogle Console%s and add the Key here.', 'nex' ),
                    '<a href="https://console.developers.google.com/flows/enableapi?apiid=places_backend,maps_backend,geocoding_backend,directions_backend,distance_matrix_backend,elevation_backend&keyType=CLIENT_SIDE&reusekey=true">',
                    '</a>'
                ),
                'value' => 'AIzaSyBPYvNEs2gbMV70avmo0AUImLewytjmDVQ'
            ),
        ),
    ),
    'header' => array(
        'title'   => esc_html__( 'Header', 'nex' ),
        'type'    => 'tab',
        'options' => array(
	        'header_logo' => array(
		        'type'  => 'multi-picker',
		        'label' => false,
		        'desc'  => false,
		        'value' => array(
			        'logo_type' => 'text',
		        ),
		        'picker' => array(
			        'logo_type' => array(
				        'type'  => 'switch',
				        'value' => 'text',
				        'label' => esc_html__('Logo type', 'nex'),
				        'left-choice' => array(
					        'value' => 'image',
					        'label' => esc_html__('Image', 'nex'),
				        ),
				        'right-choice' => array(
					        'value' => 'text',
					        'label' => esc_html__('Text', 'nex'),
				        ),
			        ),
		        ),
		        'choices' => array(
			        'image' => array(
				        'logo_image' => array(
					        'type'  => 'upload',
					        'label' => esc_html__('Logo Image', 'nex'),
					        'help'  => esc_html__('Recommended size 151x73 px', 'nex'),
					        'images_only' => true,
				        ),
			        ),
			        'text' => array(
				        'logo_text' => array(
					        'type'  => 'text',
					        'label' => esc_html__('Logo Text', 'nex'),
					        'desc'  => esc_html__('Logo in text format. Use <span>Logo Here</span> to enhance your logo or part of it.', 'nex'),
				        ),
				        'logo_text_style' => array(
					        'type' => 'typography-v2',
					        'value' => array(
						        'family' => '',
						        'style' => '',
						        'weight' => '400',
						        'subset' => '',
						        'variation' => '',
						        'size' => '',
						        'color' => ''
					        ),
					        'components' => array(
						        'family'         => true,
						        'size'           => true,
						        'line-height'    => false,
						        'letter-spacing' => false,
						        'color'          => true
					        ),
					        'label' => esc_html__('Logo Text Style', 'nex'),
					        'desc'  => esc_html__('Style of your logo - when it is in text format.', 'nex'),
				        ),
				        'icon' => array(
					        'type'  => 'icon-v2',
					        'preview_size' => 'medium',
					        'modal_size' => 'medium',
					        'label' => esc_html__('Logo Icon', 'nex'),
					        'desc'  => esc_html__('Displayed near text logo', 'nex'),
				        ),
				        'icon_pos' => array(
					        'type'  => 'switch',
					        'value' => 'left',
					        'label' => esc_html__('Icon position', 'nex'),
					        'left-choice' => array(
						        'value' => 'left',
						        'label' => esc_html__('Left', 'nex'),
					        ),
					        'right-choice' => array(
						        'value' => 'right',
						        'label' => esc_html__('Right', 'nex'),
					        ),
				        )
			        )
		        )
	        ),
            'header_logo_position' => array(
                'type'  => 'select',
                'value' => 'left',
                'label' => esc_html__('Header Logo Position', 'nex'),
                'desc'  => esc_html__('Position of the logo regardin menu', 'nex'),
                'choices' => array(
                    'left' => esc_html__('Left', 'nex'),
                    'middle' => esc_html__('Middle', 'nex'),
                    'right' => esc_html__('Right', 'nex'),
                ),
            ),
            'sticky_header' => array(
                'type'  => 'switch',
                'value' => 'off',
                'label' => esc_html__('Sticky Header for posts/products pages', 'nex'),
                'desc'  => esc_html__('Make the header stick to the top while scrolling', 'nex'),
                'left-choice' => array(
                    'value' => 'off',
                    'label' => esc_html__('Off', 'nex'),
                ),
                'right-choice' => array(
                    'value' => 'on',
                    'label' => esc_html__('On', 'nex'),
                ),
            ),
            'header_color' => array(
	            'type'  => 'multi-picker',
	            'label' => false,
	            'desc'  => false,
	            'value' => array(
		            'style' => 'solid',
	            ),
	            'picker' => array(
		            'state' => array(
			            'type'  => 'switch',
			            'value' => 'solid',
			            'label' => esc_html__('Header color', 'nex'),
			            'desc'  => esc_html__('Choose between solid and gradient color', 'nex'),
			            'left-choice' => array(
				            'value' => 'solid',
				            'label' => esc_html__('Solid', 'nex'),
			            ),
			            'right-choice' => array(
				            'value' => 'gradient',
				            'label' => esc_html__('Gradient', 'nex'),
			            ),
		            ),
	            ),
	            'choices' => array(
		            'solid' => array(
			            'header_bg_color' => array(
				            'type'  => 'color-picker',
				            'label' => esc_html__('Header BG Color', 'nex'),
			            ),
		            ),
		            'gradient' => array(
			            'header_bg_color' => array(
				            'type'  => 'gradient',
				            'label' => esc_html__('Header BG Color Gradient', 'nex'),
			            ),
		            )
	            )
            ),
            'header_style' => array(
	            'type'  => 'multi-picker',
	            'label' => false,
	            'desc'  => false,
	            'value' => array(
		            'layout_type' => 'color_breadcrumbs',
	            ),
	            'picker' => array(
		            'layout_type' => array(
			            'type'  => 'image-picker',
			            'label' => esc_html__('Header Breadcrumb Area Type', 'nex'),
			            'desc'  => esc_html__('Choose between: No Breadcrumbs, Color bg Breadcrumbs and Image bg Breadcrumbs', 'nex'),
			            'help'  => esc_html__('You can still hide/show it per page in it\'s options', 'nex'),
			            'choices' => array(
				            'no_breadcrumbs'    => fw_get_template_customizations_directory_uri('/theme/options/static/img/sidewide.png'),
				            'color_breadcrumbs' => fw_get_template_customizations_directory_uri('/theme/options/static/img/color_breadcrumbs.png'),
				            'image_breadcrumbs' => fw_get_template_customizations_directory_uri('/theme/options/static/img/image_breadcrumbs.png'),
			            ),
		            ),
	            ),
	            'choices' => array(
		            'no_breadcrumbs' => array(

		            ),
		            'color_breadcrumbs' => array(
			            'bg_color' => array(
				            'type'  => 'color-picker',
				            'value' => '#707070',
				            'label' => esc_html__('BG Color for Breadcrumb Area', 'nex'),
				            'desc'  => esc_html__('Color that will appear in the website\'s breadcrumb area.', 'nex'),
			            ),
			            'header_on_top' => array(
				            'type'  => 'image-picker',
				            'value' => 'nex-header',
				            'label' => esc_html__('Header style for posts/products', 'nex'),
				            'desc'  => esc_html__('Displays the site logo and main navigation menu on top of breadcrumb or hero image', 'nex'),
				            'choices' => array(
					            'nex-header'    => fw_get_template_customizations_directory_uri('/theme/options/static/img/header.png'),
					            'nex-header-top'=> fw_get_template_customizations_directory_uri('/theme/options/static/img/header-on-top.png'),
				            )
			            )
		            ),
		            'image_breadcrumbs' => array(
			            'bg_image' => array(
				            'type'  => 'upload',
				            'label' => esc_html__('BG Image for Breadcrumb Area', 'nex'),
				            'desc'  => esc_html__('Image that will appear in the website\'s breadcrumb area.', 'nex'),
				            'help'  => esc_html__('Will not appear on single page header. Recommended size 1920x145 px', 'nex'),
				            'images_only' => true,
			            ),
			            'bg_image_filter' => array(
				            'type'  => 'rgba-color-picker',
				            'value' => 'rgba(0,0,0,0.7)',
				            'label' => esc_html__('RGBA Image Filter', 'nex'),
			            ),
			            'header_on_top' => array(
				            'type'  => 'image-picker',
				            'show_borders' => true,
				            'value' => 'nex-header',
				            'label' => esc_html__('Default posts/products header style', 'nex'),
				            'desc'  => esc_html__('Displays the site logo and main navigation menu on top of breadcrumb or hero image', 'nex'),
				            'choices' => array(
					            'nex-header'    => fw_get_template_customizations_directory_uri('/theme/options/static/img/header.png'),
					            'nex-header-top'=> fw_get_template_customizations_directory_uri('/theme/options/static/img/header-on-top.png'),
				            )
			            )
		            ),
	            )
            ),
            'business-bar' => array(
                'type'  => 'multi-picker',
                'label' => false,
                'desc'  => false,
                'value' => array(
                    'style' => 'nav-off',
                ),
                'picker' => array(
                    'state' => array(
                        'type'  => 'switch',
                        'value' => 'nav-off',
                        'label' => esc_html__('Show Business bar', 'nex'),
                        'desc'  => esc_html__('Display a bar with social networks links and contact data. It will be activated if only the header will be above the content', 'nex'),
                        'left-choice' => array(
                            'value' => 'nav-off',
                            'label' => esc_html__('Off', 'nex'),
                        ),
                        'right-choice' => array(
                            'value' => 'nav-on',
                            'label' => esc_html__('On', 'nex'),
                        ),
                    ),
                ),
                'choices' => array(
                    'nav-off' => array(
                    ),
                    'nav-on' => array(
                    	'style' => array(
		                    'title'   => esc_html__( 'Style', 'nex' ),
		                    'type'    => 'group',
		                    'options' => array(
			                    'bg_color' => array(
				                    'type'  => 'color-picker',
				                    'value' => '#43484c',
				                    'label' => esc_html__('BG Color for Business Bar', 'nex'),
				                    'desc'  => esc_html__('Color that will appear in the business bar area.', 'nex'),
			                    ),
			                    'text_color' => array(
				                    'type'  => 'color-picker',
				                    'value' => '#fff',
				                    'label' => esc_html__('Text Color for Business Bar', 'nex'),
				                    'desc'  => esc_html__('Text Color that will appear in the business bar area.', 'nex'),
			                    ),
		                    )
	                    ),
                        'business-bar-socials' => array(
                            'type'  => 'switch',
                            'value' => 'off',
                            'label' => esc_html__('Show social links in  Business bar', 'nex'),
                            'desc'  => esc_html__('Social links need to be set up in social tab and business bar need to be active', 'nex'),
                            'left-choice' => array(
                                'value' => 'off',
                                'label' => esc_html__('Off', 'nex'),
                            ),
                            'right-choice' => array(
                                'value' => 'on',
                                'label' => esc_html__('On', 'nex'),
                            ),
                        ),
                        'contact_data' => array(
                            'type' => 'addable-box',
                            'label' => esc_html__('Contact Data', 'nex'),
                            'desc'  => esc_html__('Add the contact data with related icon. Business bar need to be active', 'nex'),
                            'template' => '<i class="{{- icon[\'icon-class\'] }}"></i> {{- contact }}',
                            'size' => 'small', // small, medium, large
                            'limit' => 0, // limit the number of popup`s that can be added
                            'add-button-text' => esc_html__('Add contact info', 'nex'),
                            'sortable' => true,
                            'box-options' => array(
                                'contact' => array(
                                    'type'  => 'text',
                                    'value' => false,
                                    'label' => esc_html__('Contact info.', 'nex'),
                                    'desc'  => esc_html__('Ex: phone/fax number, location', 'nex'),
                                ),
                                'icon' => array(
                                    'type'  => 'icon-v2',
                                    'preview_size' => 'medium',
                                    'modal_size' => 'medium',
                                    'label' => esc_html__('Contact data icon', 'nex'),
                                    'desc'  => esc_html__('Choose the related data icon', 'nex'),
                                )
                            )
                        )
                    )
                )
            )
        )
    ),
    'footer' => array(
        'title'   => esc_html__( 'Footer', 'nex' ),
        'type'    => 'tab',
        'options' => array(
            'footer_background' => array(
                'type'  => 'multi-picker',
                'label' => false,
                'desc'  => false,
                'value' => array(
                    'layout_type' => 'color_background',
                ),
                'picker' => array(
                    'background_type' => array(
                        'type'  => 'select',
                        'label' => esc_html__('Footer Background Type', 'nex'),
                        'desc'  => esc_html__('Choose between: Background Color and Background Image', 'nex'),
                        'choices' => array(
                            'color_background' => esc_html__('Background Color', 'nex'),
                            'image_background' => esc_html__('Background Image', 'nex'),
                        ),
                    ),
                ),
                'choices' => array(
                    'color_background' => array(
                        'bg_color' => array(
                            'type'  => 'color-picker',
                            'value' => '#fff',
                            'label' => esc_html__('BG Color for Footer Area', 'nex'),
                            'desc'  => esc_html__('Color that will appear in the website\'s footer area.', 'nex'),
                        ),
                    ),
                    'image_background' => array(
                        'bg_image' => array(
                            'type'  => 'upload',
                            'label' => esc_html__('BG Image for Footer Area', 'nex'),
                            'desc'  => esc_html__('Image that will appear in the website\'s Footer area.', 'nex'),
                            'help'  => esc_html__('Recommended size 1920x500 px', 'nex'),
                            'images_only' => true,
                        ),
                        'bg_image_filter' => array(
                            'type'  => 'rgba-color-picker',
                            'value' => 'rgba(255,255,255,0.7)',
                            'label' => esc_html__('RGBA Image Filter', 'nex'),
                        ),
                    )
                )
            ),
            'footer_logo' => array(
                'type'  => 'multi-picker',
                'label' => false,
                'desc'  => false,
                'value' => array(
                    'show' => 'off',
                ),
                'picker' => array(
                    'show' => array(
                        'type'  => 'switch',
                        'label' => esc_html__('Show Footer Logo', 'nex'),
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
	                    'footer_logo' => array(
		                    'type'  => 'multi-picker',
		                    'label' => false,
		                    'desc'  => false,
		                    'value' => array(
			                    'logo_type' => 'text',
		                    ),
		                    'picker' => array(
			                    'logo_type' => array(
				                    'type'  => 'switch',
				                    'value' => 'text',
				                    'label' => esc_html__('Logo type', 'nex'),
				                    'left-choice' => array(
					                    'value' => 'image',
					                    'label' => esc_html__('Image', 'nex'),
				                    ),
				                    'right-choice' => array(
					                    'value' => 'text',
					                    'label' => esc_html__('Text', 'nex'),
				                    ),
			                    ),
		                    ),
		                    'choices' => array(
			                    'image' => array(
				                    'logo_image' => array(
					                    'type'  => 'upload',
					                    'label' => esc_html__('Footer Logo Image', 'nex'),
					                    'desc'  => esc_html__('Logo of your website for the footer', 'nex'),
					                    'help'  => esc_html__('Recommended size 151x73 px', 'nex'),
					                    'images_only' => true,
				                    ),
			                    ),
			                    'text' => array(
				                    'logo_text' => array(
					                    'type'  => 'text',
					                    'label' => esc_html__('Footer Logo Text', 'nex'),
					                    'desc'  => esc_html__('Logo in text format. Use <span>Logo Here</span> to enhance your logo or part of it.', 'nex'),
				                    ),
				                    'logo_text_style' => array(
					                    'type' => 'typography-v2',
					                    'value' => array(
						                    'family' => '',
						                    'style' => '',
						                    'weight' => '400',
						                    'subset' => '',
						                    'variation' => '',
						                    'size' => '',
						                    'color' => ''
					                    ),
					                    'components' => array(
						                    'family'         => true,
						                    'size'           => true,
						                    'line-height'    => false,
						                    'letter-spacing' => false,
						                    'color'          => true
					                    ),
					                    'label' => esc_html__('Footer Logo Text Style', 'nex'),
					                    'desc'  => esc_html__('Style of your logo - when it is in text format.', 'nex'),
				                    ),
				                    'icon' => array(
					                    'type'  => 'icon-v2',
					                    'preview_size' => 'medium',
					                    'modal_size' => 'medium',
					                    'label' => esc_html__('Logo Icon', 'nex'),
					                    'desc'  => esc_html__('Displayed near text logo', 'nex'),
				                    ),
				                    'icon_pos' => array(
					                    'type'  => 'switch',
					                    'value' => 'left',
					                    'label' => esc_html__('Icon position', 'nex'),
					                    'left-choice' => array(
						                    'value' => 'left',
						                    'label' => esc_html__('Left', 'nex'),
					                    ),
					                    'right-choice' => array(
						                    'value' => 'right',
						                    'label' => esc_html__('Right', 'nex'),
					                    ),
				                    )
			                    )
		                    )
	                    )
                    )
                )
            ),
            'footer_border' => array(
	            'type'  => 'multi-picker',
	            'label' => false,
	            'desc'  => false,
	            'value' => array(
		            'show' => 'off',
	            ),
	            'picker' => array(
		            'show' => array(
			            'type'  => 'switch',
			            'label' => esc_html__('Show Footer top border', 'nex'),
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
			            'border_size' => array(
				            'type'  => 'slider',
				            'value' => 0,
				            'properties' => array(
					            'min' => 0,
					            'max' => 10,
					            'step' => 1, // Set slider step. Always > 0. Could be fractional.
				            ),
				            'label' => esc_html__('Top border size', 'nex'),
				            'help'  => esc_html__('Size in pixels', 'nex'),
			            ),
			            'border_color' => array(
				            'type'  => 'color-picker',
				            'value' => '#727272',
				            'label' => esc_html__('Border top color', 'nex'),
				            'help'  => esc_html__('Choose a color for the top border', 'nex'),
			            )
		            )
	            )
            ),
            'show_footer_menu' => array(
                'type'  => 'switch',
                'label' => esc_html__('Show Footer Menu', 'nex'),
                'help'  => esc_html__('Assign it in Appearance -> Menus.', 'nex'),
                'left-choice' => array(
                    'value' => 'off',
                    'label' => esc_html__('Off', 'nex'),
                ),
                'right-choice' => array(
                    'value' => 'on',
                    'label' => esc_html__('On', 'nex'),
                ),
            ),
            'widget_1' => array(
                'type'  => 'select',
                'value' => 'default',
                'label' => esc_html__('1 / 4 Widget size', 'nex'),
                'desc'  => esc_html__('1 / 4 widget size. Count from the left side of the footer', 'nex'),
                'help'  => esc_html__('Default option will keep the theme design', 'nex'),
                'choices' => array(
                    'default' => esc_html__('Default', 'nex'),
                    '12'      => esc_html__('12 / 12', 'nex'),
                    '6'       => esc_html__('6 / 12', 'nex'),
                    '5'       => esc_html__('5 / 12', 'nex'),
                    '4'       => esc_html__('4 / 12', 'nex'),
                    '3'       => esc_html__('3 / 12', 'nex'),
                    '2'       => esc_html__('2 / 12', 'nex'),
                ),
            ),
            'widget_2' => array(
                'type'  => 'select',
                'value' => 'default',
                'label' => esc_html__('2 / 4 Widget size', 'nex'),
                'desc'  => esc_html__('2 / 4 widget size. Count from the left side of the footer', 'nex'),
                'help'  => esc_html__('Default option will keep the theme design', 'nex'),
                'choices' => array(
                    'default' => esc_html__('Default', 'nex'),
                    '12'      => esc_html__('12 / 12', 'nex'),
                    '6'       => esc_html__('6 / 12', 'nex'),
                    '5'       => esc_html__('5 / 12', 'nex'),
                    '4'       => esc_html__('4 / 12', 'nex'),
                    '3'       => esc_html__('3 / 12', 'nex'),
                    '2'       => esc_html__('2 / 12', 'nex'),
                ),
            ),
            'widget_3' => array(
                'type'  => 'select',
                'value' => 'default',
                'label' => esc_html__('3 / 4 Widget size', 'nex'),
                'desc'  => esc_html__('3 / 4 widget size. Count from the left side of the footer', 'nex'),
                'help'  => esc_html__('Default option will keep the theme design', 'nex'),
                'choices' => array(
                    'default' => esc_html__('Default', 'nex'),
                    '12'      => esc_html__('12 / 12', 'nex'),
                    '6'       => esc_html__('6 / 12', 'nex'),
                    '5'       => esc_html__('5 / 12', 'nex'),
                    '4'       => esc_html__('4 / 12', 'nex'),
                    '3'       => esc_html__('3 / 12', 'nex'),
                    '2'       => esc_html__('2 / 12', 'nex'),
                ),
            ),
            'widget_4' => array(
                'type'  => 'select',
                'value' => 'default',
                'label' => esc_html__('4 / 4 Widget size', 'nex'),
                'desc'  => esc_html__('4 / 4 widget size. Count from the left side of the footer', 'nex'),
                'help'  => esc_html__('Default option will keep the theme design', 'nex'),
                'choices' => array(
                    'default' => esc_html__('Default', 'nex'),
                    '12'      => esc_html__('12 / 12', 'nex'),
                    '6'       => esc_html__('6 / 12', 'nex'),
                    '5'       => esc_html__('5 / 12', 'nex'),
                    '4'       => esc_html__('4 / 12', 'nex'),
                    '3'       => esc_html__('3 / 12', 'nex'),
                    '2'       => esc_html__('2 / 12', 'nex'),
                ),
            ),
            'copyright_left' => array(
                'type'  => 'text',
                'label' => esc_html__('Copyright (left side)', 'nex'),
                'desc'  => esc_html__('Footer copyright text displayed on left side of the footer', 'nex'),
                'help'  => esc_html__('You can use links tags', 'nex'),
                'value' => esc_html__('&copy; Copyright 2017 by NexThemes. All rights reserved.','nex')
            ),
            'footer_right' => array(
                'type'  => 'multi-picker',
                'label' => false,
                'desc'  => false,
                'value' => array(
                    'style' => '',
                ),
                'picker' => array(
                    'style' => array(
                        'type'  => 'select',
                        'value' => 'menu',
                        'label' => esc_html__('Right Under Footer', 'nex'),
                        'desc'  => esc_html__('Choose what to show in the right side of the under footer', 'nex'),
                        'help'  => esc_html__('If you choose menu, assign it in Appearance -> Menus.', 'nex'),
                        'choices' => array(
                            '' => esc_html__('Nothing', 'nex'),
                            'menu' => esc_html__('Menu', 'nex'),
                            'text' => esc_html__('Text', 'nex'),
                        )
                    ),
                ),
                'choices' => array(
                    'menu' => array(

                    ),
                    'text' => array(
                        'copyright_right' => array(
                            'type'  => 'text',
                            'label' => esc_html__('Copyright (right side)', 'nex'),
                            'desc'  => esc_html__('Footer copyright text displayed on right side of the footer', 'nex'),
                            'help'  => esc_html__('You can use links tags', 'nex'),
                            'value' => esc_html__('&copy; Copyright 2017 by NexThemes. All rights reserved.','nex')
                        ),
                    )
                )
            ),
        ),
    ),
    'social' => array(
        'title'   => esc_html__( 'Social', 'nex' ),
        'type'    => 'tab',
        'options' => array(
            'social_profiles' => array(
                'type' => 'addable-popup',
                'label' => esc_html__('Social Profiles', 'nex'),
                'desc'  => esc_html__('Add your social profiles. Will be displayed in the Social shortcode and widget', 'nex'),
                'template' => '<i class="{{- icon[\'icon-class\'] }}"> {{- link }}',
                'add-button-text' => esc_html__('Add social profile', 'nex'),
                'sortable' => true,
                'popup-options' => array(
                    'link' => array(
                        'label' => esc_html__('Social link', 'nex'),
                        'type' => 'text',
                        'value' => '',
                        'desc' => esc_html__('URL of your social profile', 'nex')
                    ),
                    'icon' => array(
                        'type'  => 'icon-v2',
                        'preview_size' => 'medium',
                        'modal_size' => 'medium',
                        'label' => esc_html__('Social icon', 'nex'),
                        'desc'  => esc_html__('Icon of the social profile', 'nex'),
                    )
                )
            ),
            'share_platforms' => array(
                'type' => 'addable-box',
                'label' => esc_html__('Share To Platforms', 'nex'),
                'desc'  => esc_html__('Add sharing platform. Will be displayed in the posts.', 'nex'),
                'template' => '<i class="{{- icon[\'icon-class\'] }}"> {{- platform }}',
                'size' => 'small', // small, medium, large
                'limit' => 0, // limit the number of popup`s that can be added
                'add-button-text' => esc_html__('Add share platform', 'nex'),
                'sortable' => true,
                'box-options' => array(
                    'platform' => array(
                        'type'  => 'select',
                        'value' => 'facebook',
                        'label' => esc_html__('Type', 'nex'),
                        'choices' => array(
                            'facebook' => esc_html__('Facebook', 'nex'),
                            'twitter' => esc_html__('Twitter', 'nex'),
                            'tumblr' => esc_html__('Tumblr', 'nex'),
                            'google' => esc_html__('Google+', 'nex'),
                            'reddit' => esc_html__('Reddit', 'nex'),
                            'pinterest' => esc_html__('Pinterest', 'nex'),
                            'linkedin' => esc_html__('Linkedin', 'nex')
                        ),
                    ),
                    'icon' => array(
                        'type'  => 'icon-v2',
                        'preview_size' => 'medium',
                        'modal_size' => 'medium',
                        'label' => esc_html__('Social icon', 'nex'),
                        'desc'  => esc_html__('Icon of the social profile', 'nex'),
                    )
                )
            )
        )
    ),
    'colors' => array(
        'title'   => esc_html__( 'Colors', 'nex' ),
        'type'    => 'tab',
        'options' => array(
            'color_1' => array(
                'type'  => 'color-picker',
                'label' => esc_html__('Primary', 'nex'),
                'desc'  => esc_html__('Main site color', 'nex')
            ),
            'color_2' => array(
                'type'  => 'color-picker',
                'label' => esc_html__('Secondary', 'nex'),
                'desc'  => esc_html__('Secondary site color', 'nex')
            ),
        )
    ),
    'typography' => array(
        'title'   => esc_html__( 'Typography', 'nex' ),
        'type'    => 'tab',
        'options' => array(
            'text_style' => array(
                'type' => 'typography-v2',
                'value' => array(
                    'family' => '',
                    // For standard fonts, instead of subset and variation you should set 'style' and 'weight'.
                    'style' => '',
                    'weight' => '400',
                    'subset' => '',
                    'variation' => '',
                    'size' => '',
                    'color' => ''
                ),
                'components' => array(
                    'family'         => true,
                    // 'style', 'weight', 'subset', 'variation' will appear and disappear along with 'family'
                    'size'           => true,
                    'line-height'    => false,
                    'letter-spacing' => false,
                    'color'          => true
                ),
                'label' => esc_html__('General Text Style', 'nex'),
                'desc'  => esc_html__('Style of your text', 'nex'),
                'help'  => esc_html__('Affects headers and the paragraphs.', 'nex'),
            ),
        )
    ),
    'additional' => array(
        'title'   => esc_html__( 'Additional Options', 'nex' ),
        'type'    => 'tab',
        'options' => array(
            '404_page' => array(
                'type'      => 'group',
                'label'     => esc_html__('404 page', 'nex'),
                'desc'      => esc_html__('Options to configure 404 page', 'nex'),
                'modal-size'=>  'large',
                'options' => array(
                    '404_title'  => array(
                        'type'  => 'text',
                        'label' => esc_html__('404 Title', 'nex'),
                        'desc'  => esc_html__('Text to appear in the header of 404 page.', 'nex'),
                        'value' => esc_html__('Error 404','nex'),
                    ),
                    '404_img' => array(
                        'type'  => 'upload',
                        'label' => esc_html__('404 Image', 'nex'),
                        'help'  => esc_html__('Recommended size 508x168 px', 'nex'),
                        'images_only' => true,
                    ),
                    '404_message' => array(
                        'type'  => 'text',
                        'label' => esc_html__('404 Message', 'nex'),
                        'desc'  => esc_html__('Text to appear in the content of 404 page.', 'nex'),
                        'help'  => esc_html__('You can use links tags', 'nex'),
                        'value' => esc_html__('Page not found, try again!','nex')
                    )
                ),
            ),
        )
    ),
    'developer' => array(
	    'title'   => esc_html__( 'Developer Tools', 'nex' ),
	    'type'    => 'tab',
	    'options' => array(
		    'css_area'  => array(
			    'type'  => 'code',
			    'label' => esc_html__('Custom CSS', 'nex'),
			    'desc'  => esc_html__('Customize your theme style', 'nex'),
			    'help' => esc_html__('Css code that will be included in the header','nex'),
		    ),
		    'js_area'  => array(
			    'type'  => 'code',
			    'label' => esc_html__('Custom JS', 'nex'),
			    'desc'  => esc_html__('Add custom javascript code to your site', 'nex'),
			    'help' => esc_html__('JS code that will be included in the footer','nex'),
		    )
	    )
    ),
    'blog_options' => array(
	    'title'   => esc_html__( 'Blog Posts', 'nex' ),
	    'type'    => 'tab',
	    'options' => array(
		    'blog_layout_type' => array(
			    'type'  => 'image-picker',
			    'value' => 'vx',
			    'label' => esc_html__('Blog Page Layout Type', 'nex'),
			    'desc'  => esc_html__('Choose between the layout types available', 'nex'),
			    'help'  => esc_html__('This will modify how the section looks on frontend', 'nex'),
			    'choices' => array(
				    'v1' => fw_get_template_customizations_directory_uri('/extensions/shortcodes/shortcodes/blog/static/img/blog_v1.png'),
				    'v2' => fw_get_template_customizations_directory_uri('/extensions/shortcodes/shortcodes/blog/static/img/blog_v2.png'),
				    'v5' => fw_get_template_customizations_directory_uri('/extensions/shortcodes/shortcodes/blog/static/img/blog_v5.png'),
				    'vx' => fw_get_template_customizations_directory_uri('/extensions/shortcodes/shortcodes/blog/static/img/blog_vx.png'),
			    ),
		    ),
		    'blog_cols' => array(
			    'type'  => 'slider',
			    'value' => 2,
			    'label' => esc_html__('Columns', 'nex'),
			    'desc'  => esc_html__('Set number of columns on blog/archive post page', 'nex'),
			    'properties' => array(
				    'min'  => 1,
				    'max'  => 4,
				    'step' => 1, // Set slider step. Always > 0. Could be fractional.
			    ),
		    ),
		    'excerpt_length' => array(
			    'type'  => 'slider',
			    'value' => 55,
			    'label' => esc_html__('Excerpt length', 'nex'),
			    'desc' => esc_html__('Set number of words', 'nex'),
			    'properties' => array(
				    'min' => 0,
				    'max' => 110,
				    'step' => 1, // Set slider step. Always > 0. Could be fractional.
			    ),
		    ),
		    'sidebar_pos' => array(
			    'type'  => 'image-picker',
			    'value' => 'right',
			    'label' => esc_html__('Default Posts sidebar position', 'nex'),
			    'desc'  => esc_html__('Choose between: No Sidebar, Left Sidebar and Right Sidebar', 'nex'),
			    'help'  => esc_html__('This choice will be applied over the entire site, but could be overwritten from Post editor settings', 'nex'),
			    'choices' => array(
				    'full_width' => fw_get_template_customizations_directory_uri('/theme/options/static/img/sidewide.png'),
				    'left' => fw_get_template_customizations_directory_uri('/theme/options/static/img/left_sidebar.png'),
				    'right' => fw_get_template_customizations_directory_uri('/theme/options/static/img/right_sidebar.png'),
			    ),
		    ),
		    'show_bio' => array(
			    'type'  => 'switch',
			    'value' => 'on',
			    'label' => esc_html__('Show biography', 'nex'),
			    'desc'  => esc_html__('Display author biography/about section under post content', 'nex'),
			    'left-choice' => array(
				    'value' => 'off',
				    'label' => esc_html__('Off', 'nex'),
			    ),
			    'right-choice' => array(
				    'value' => 'on',
				    'label' => esc_html__('On', 'nex'),
			    ),
		    ),
	    )
    ),
);

if(!empty($portfolio_options) && fw_ext('portfolio') )
	$options['portfolio'] = $portfolio_options;