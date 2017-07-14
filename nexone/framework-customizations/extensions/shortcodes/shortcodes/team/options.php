<?php
if (!defined('FW')) die('Forbidden');

$cols = array(
	'type'  => 'select',
	'value' => 'col-md-3',
	'label' => esc_html__('Columns', 'nex'),
	'desc'  => esc_html__('Pick the number of columns', 'nex'),
	'choices' => array(
		'col-md-6' => esc_html__('2 Columns', 'nex'),
		'col-md-4' => esc_html__('3 Columns', 'nex'),
		'col-md-3' => esc_html__('4 Columns', 'nex'),
	)
);

$options = array(
	'team' => array(
		'type'  => 'multi-picker',
		'label' => false,
		'desc'  => false,
		'value' => array(
			'layout_type' => 'layout_1',
		),
		'picker' => array(
			'layout_type' => array(
				'type'  => 'image-picker',
				'value' => 'layout_1',
				'label' => esc_html__('Layout Type', 'nex'),
				'desc'  => esc_html__('Choose between the layout types available', 'nex'),
				'help'  => esc_html__('This will modify how the section looks on frontend', 'nex'),
				'choices' => array(
					'layout_1' => fw_get_template_customizations_directory_uri('/extensions/shortcodes/shortcodes/team/static/img/team_v1.png'),
					'layout_2' => fw_get_template_customizations_directory_uri('/extensions/shortcodes/shortcodes/team/static/img/team_v2.png'),
					'layout_3' => fw_get_template_customizations_directory_uri('/extensions/shortcodes/shortcodes/team/static/img/team_v3.png'),
					'layout_4' => fw_get_template_customizations_directory_uri('/extensions/shortcodes/shortcodes/team/static/img/team_v4.png'),
					'layout_5' => fw_get_template_customizations_directory_uri('/extensions/shortcodes/shortcodes/team/static/img/team_v5.png'),
					'layout_6' => fw_get_template_customizations_directory_uri('/extensions/shortcodes/shortcodes/team/static/img/team_v6.png'),
					'layout_7' => fw_get_template_customizations_directory_uri('/extensions/shortcodes/shortcodes/team/static/img/team_v7.png'),
					'layout_8' => fw_get_template_customizations_directory_uri('/extensions/shortcodes/shortcodes/team/static/img/team_v8.png'),
				),
			),
		),
		'choices' => array(
			'layout_1' => array(
				'cols'   => $cols,
				'team_members' => array(
					'type' => 'addable-popup',
					'label' => esc_html__('Team Members', 'nex'),
					'template' => '{{- title }}',
					'add-button-text' => esc_html__('Add team member', 'nex'),
					'size'  => 'medium',
					'popup-options' => array(
						'image' => array(
							'type'  => 'upload',
							'label' => esc_html__('Member photo', 'nex'),
							'help'  => esc_html__('Recommended size 300x380 px', 'nex'),
							'images_only' => true,
						),
						'title' => array(
							'label' => esc_html__('Member name', 'nex'),
							'type' => 'text',
						),
						'role' => array(
							'label' => esc_html__('Member role or job', 'nex'),
							'type' => 'text',
						),
						'message' => array(
							'label' => esc_html__('Member short description', 'nex'),
							'type' => 'text',
						),
						'social_profiles' => array(
							'type' => 'addable-popup',
							'label' => esc_html__('Social Profiles', 'nex'),
							'desc'  => esc_html__('Add team social profiles.', 'nex'),
							'template' => '<i class="{{- icon[\'icon-class\'] }}"> {{- link }}',
							'add-button-text' => esc_html__('Add social profile', 'nex'),
							'sortable' => true,
							'popup-options' => array(
								'link' => array(
									'label' => esc_html__('Social link', 'nex'),
									'type' => 'text',
									'value' => '',
									'desc' => esc_html__('Url of the social profile', 'nex')
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
				)
			),
			'layout_2' => array(
				'cols'   => $cols,
				'team_members' => array(
					'type' => 'addable-popup',
					'label' => esc_html__('Team Members', 'nex'),
					'template' => '{{- title }}',
					'add-button-text' => esc_html__('Add team member', 'nex'),
					'popup-options' => array(
						'title' => array(
							'label' => esc_html__('Member name', 'nex'),
							'type' => 'text',
						),
						'role' => array(
							'label' => esc_html__('Member role or job', 'nex'),
							'type' => 'text',
						),
						'image' => array(
							'type'  => 'upload',
							'label' => esc_html__('Member photo', 'nex'),
							'help'  => esc_html__('Recommended size 300x380 px', 'nex'),
							'images_only' => true,
						)
					)
				)
			),
			'layout_3' => array(
				'cols'   => $cols,
				'team_members' => array(
					'type' => 'addable-popup',
					'label' => esc_html__('Team Members', 'nex'),
					'template' => '{{- title }}',
					'add-button-text' => esc_html__('Add team member', 'nex'),
					'popup-options' => array(
						'title' => array(
							'label' => esc_html__('Member name', 'nex'),
							'type' => 'text',
						),
						'role' => array(
							'label' => esc_html__('Member role or job', 'nex'),
							'type' => 'text',
						),
						'image' => array(
							'type'  => 'upload',
							'label' => esc_html__('Member photo', 'nex'),
							'help'  => esc_html__('Recommended size 300x380 px', 'nex'),
							'images_only' => true,
						),
					)
				)
			),
			'layout_4' => array(
				'cols'   => $cols,
				'team_members' => array(
					'type' => 'addable-popup',
					'label' => esc_html__('Team Members', 'nex'),
					'template' => '{{- title }}',
					'add-button-text' => esc_html__('Add team member', 'nex'),
					'popup-options' => array(
						'title' => array(
							'label' => esc_html__('Member name', 'nex'),
							'type' => 'text',
						),
						'role' => array(
							'label' => esc_html__('Member role or job', 'nex'),
							'type' => 'text',
						),
						'email' => array(
							'label' => esc_html__('Member email address', 'nex'),
							'type' => 'text',
						),
						'phone' => array(
							'label' => esc_html__('Member phone number', 'nex'),
							'type' => 'text',
						),
						'image' => array(
							'type'  => 'upload',
							'label' => esc_html__('Member photo', 'nex'),
							'help'  => esc_html__('Recommended size 300x380 px', 'nex'),
							'images_only' => true,
						),

					)
				)
			),
			'layout_5' => array(
				'cols'   => $cols,
				'team_members' => array(
					'type' => 'addable-popup',
					'label' => esc_html__('Team Members', 'nex'),
					'template' => '{{- title }}',
					'add-button-text' => esc_html__('Add team member', 'nex'),
					'popup-options' => array(
						'title' => array(
							'label' => esc_html__('Member name', 'nex'),
							'type' => 'text',
						),
						'role' => array(
							'label' => esc_html__('Member role or job', 'nex'),
							'type' => 'text',
						),
						'image' => array(
							'type'  => 'upload',
							'label' => esc_html__('Member photo', 'nex'),
							'help'  => esc_html__('Recommended size 300x380 px', 'nex'),
							'images_only' => true,
						),
						'social_profiles' => array(
							'type' => 'addable-popup',
							'label' => esc_html__('Social Profiles', 'nex'),
							'desc'  => esc_html__('Add team social profiles.', 'nex'),
							'template' => '<i class="{{- icon[\'icon-class\'] }}"> {{- link }}',
							'add-button-text' => esc_html__('Add social profile', 'nex'),
							'sortable' => true,
							'popup-options' => array(
								'link' => array(
									'label' => esc_html__('Social link', 'nex'),
									'type' => 'text',
									'value' => '',
									'desc' => esc_html__('Url of the social profile', 'nex')
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
				)
			),
			'layout_6' => array(
				'cols'   => $cols,
				'team_members' => array(
					'type' => 'addable-popup',
					'label' => esc_html__('Team Members', 'nex'),
					'template' => '{{- title }}',
					'add-button-text' => esc_html__('Add team member', 'nex'),
					'popup-options' => array(
						'title' => array(
							'label' => esc_html__('Member name', 'nex'),
							'type' => 'text',
						),
						'role' => array(
							'label' => esc_html__('Member role or job', 'nex'),
							'type' => 'text',
						),
						'image' => array(
							'type'  => 'upload',
							'label' => esc_html__('Member photo', 'nex'),
							'help'  => esc_html__('Recommended size 300x380 px', 'nex'),
							'images_only' => true,
						),
						'social_profiles' => array(
							'type' => 'addable-popup',
							'label' => esc_html__('Social Profiles', 'nex'),
							'desc'  => esc_html__('Add team social profiles.', 'nex'),
							'template' => '<i class="{{- icon[\'icon-class\'] }}"> {{- link }}',
							'add-button-text' => esc_html__('Add social profile', 'nex'),
							'sortable' => true,
							'popup-options' => array(
								'link' => array(
									'label' => esc_html__('Social link', 'nex'),
									'type' => 'text',
									'value' => '',
									'desc' => esc_html__('Url of the social profile', 'nex')
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
				)
			),
			'layout_7' => array(
				'cols'   => $cols,
				'team_members' => array(
					'type' => 'addable-popup',
					'label' => esc_html__('Team Members', 'nex'),
					'template' => '{{- title }}',
					'add-button-text' => esc_html__('Add team member', 'nex'),
					'popup-options' => array(
						'title' => array(
							'label' => esc_html__('Member name', 'nex'),
							'type' => 'text',
						),
						'role' => array(
							'label' => esc_html__('Member role or job', 'nex'),
							'type' => 'text',
						),
						'image' => array(
							'type'  => 'upload',
							'label' => esc_html__('Member photo', 'nex'),
							'help'  => esc_html__('Recommended size 300x380 px', 'nex'),
							'images_only' => true,
						),
						'social_profiles' => array(
							'type' => 'addable-popup',
							'label' => esc_html__('Social Profiles', 'nex'),
							'desc'  => esc_html__('Add team social profiles.', 'nex'),
							'template' => '<i class="{{- icon[\'icon-class\'] }}"> {{- link }}',
							'add-button-text' => esc_html__('Add social profile', 'nex'),
							'sortable' => true,
							'popup-options' => array(
								'link' => array(
									'label' => esc_html__('Social link', 'nex'),
									'type' => 'text',
									'value' => '',
									'desc' => esc_html__('Url of the social profile', 'nex')
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
				)
			),
			'layout_8' => array(
				'cols'   => $cols,
				'team_members' => array(
					'type' => 'addable-popup',
					'size' => 'medium',
					'label' => esc_html__('Team Members', 'nex'),
					'template' => '{{- title }}',
					'add-button-text' => esc_html__('Add team member', 'nex'),
					'popup-options' => array(
						'title' => array(
							'label' => esc_html__('Member name', 'nex'),
							'type' => 'text',
						),
						'role' => array(
							'label' => esc_html__('Member role or job', 'nex'),
							'type' => 'text',
						),
						'image' => array(
							'type'  => 'upload',
							'label' => esc_html__('Member photo', 'nex'),
							'help'  => esc_html__('Recommended size 300x380 px', 'nex'),
							'images_only' => true,
						),
						'social_profile_right' => array(
							'type' => 'box',
							'title' => esc_html__('Social Profiles at the right', 'nex'),
							'options' => array(
								'link_type_right' => array(
									'label' => esc_html__('Link type', 'nex'),
									'type' => 'select',
									'value' => 'default',
									'desc' => esc_html__('Choose link type', 'nex'),
									'choices' => array(
										'default' => esc_html__('Default','nex'),
										'mailto:' => esc_html__('E-mail','nex'),
										'tel:'    => esc_html__('Phone number','nex'),
									),
								),
								'link_right' => array(
									'label' => esc_html__('Social link', 'nex'),
									'type' => 'text',
									'value' => '',
									'desc' => esc_html__('Url of the social profile', 'nex')
								),
								'icon_right' => array(
									'type'  => 'icon-v2',
									'preview_size' => 'medium',
									'modal_size' => 'medium',
									'label' => esc_html__('Social icon', 'nex'),
									'desc'  => esc_html__('Icon of the social profile', 'nex'),
									//'icons_only' => true,
								)
							)
						),
						'social_profile_left' => array(
							'type' => 'box',
							'title' => esc_html__('Social Profiles at the left', 'nex'),
							'options' => array(
								'link_type_left' => array(
									'label' => esc_html__('Link type', 'nex'),
									'type' => 'select',
									'value' => 'default',
									'desc' => esc_html__('Choose link type', 'nex'),
									'choices' => array(
										'default' => esc_html__('Default','nex'),
										'mailto:' => esc_html__('E-mail','nex'),
										'tel:'    => esc_html__('Phone number','nex'),
									),
								),
								'link_left' => array(
									'label' => esc_html__('Social link', 'nex'),
									'type' => 'text',
									'value' => '',
									'desc' => esc_html__('Url of the social profile', 'nex')
								),
								'icon_left' => array(
									'type'  => 'icon-v2',
									'preview_size' => 'medium',
									'modal_size' => 'medium',
									'label' => esc_html__('Social icon', 'nex'),
									'desc'  => esc_html__('Icon of the social profile', 'nex'),
									'icons_only' => true,
								)
							)
						),
					)
				)
			),
		)
	)
);