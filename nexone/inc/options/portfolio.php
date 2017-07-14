<?php
return array(
	'title'   => esc_html__( 'Portfolio', 'nex' ),
	'type'    => 'tab',
	'options' => array(
		'portfolio_header_on_top' => array(
			'type'  => 'image-picker',
			'value' => 'nex-header',
			'label' => esc_html__('Show Header on Top', 'nex'),
			'desc'  => esc_html__('Displays the site logo and main navigation menu on top of breadcrumb or hero image', 'nex'),
			'choices' => array(
				'nex-header'    => fw_get_template_customizations_directory_uri('/theme/options/static/img/header.png'),
				'nex-header-top'=> fw_get_template_customizations_directory_uri('/theme/options/static/img/header-on-top.png'),
			),
		),
		'portfolio_sticky_header' => array(
			'type'  => 'switch',
			'value' => 'off',
			'label' => esc_html__('Sticky Header', 'nex'),
			'desc'  => esc_html__('Make the header stick to the top while scrolling', 'nex'),
			'left-choice' => array(
				'value' => 'off',
				'label' => esc_html__('Off', 'nex'),
			),
			'right-choice' => array(
				'value' => 'on',
				'label' => esc_html__('On', 'nex'),
			)
		),
		'portfolio_archive_title' => array(
			'type'  => 'text',
			'label' => esc_html__('Portfolio Archive Title', 'nex'),
			'desc'  => esc_html__('Text to appear in the header of portfolio archive.', 'nex'),
			'help'  => esc_html__('Breadcrumbs must be enabled in general tab settings.', 'nex'),
			'value' => esc_html__('Our Works','nex'),
		),
		'portfolio_archive_subtitle' => array(
			'type'  => 'text',
			'label' => esc_html__('Portfolio Archive Subtitle', 'nex'),
			'desc'  => esc_html__('Text to appear in the header of portfolio archive under the title.', 'nex'),
			'help'  => esc_html__('Breadcrumbs must be enabled in general tab settings.', 'nex'),
			'value' => esc_html__('Our awesome and creative work','nex'),
		),
	)
);