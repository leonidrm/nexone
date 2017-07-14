<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'main' => array(
		'type'    => 'box',
		'title'   => '',
		'options' => array(
			'id'       => array(
				'type'  => 'unique',
			),
			'builder'  => array(
				'type'    => 'tab',
				'title'   => __( 'Form Fields', 'nex' ),
				'options' => array(
					'form' => array(
						'label' => false,
						'type'  => 'form-builder',
						'value' => array(
							'json' => apply_filters('fw:ext:forms:builder:load-item:form-header-title', true)
								? json_encode( array(
									array(
										'type'      => 'form-header-title',
										'shortcode' => 'form_header_title',
										'width'     => '',
										'options'   => array(
											'title'    => '',
											'subtitle' => '',
										)
									)
								) )
								: '[]'
						),
						'fixed_header' => true,
					),
				),
			),
			'settings' => array(
				'type'    => 'tab',
				'title'   => __( 'Settings', 'nex' ),
				'options' => array(
					'settings-options' => array(
						'title'   => __( 'Options', 'nex' ),
						'type'    => 'tab',
						'options' => array(
							'form_email_settings' => array(
								'type'    => 'group',
								'options' => array(
									'email_to' => array(
										'type'  => 'text',
										'label' => __( 'Email To', 'nex' ),
										'help' => __( 'We recommend you to use an email that you verify often', 'nex' ),
										'desc'  => __( 'The form will be sent to this email address.', 'nex' ),
									),
								),
							),
							'form_text_settings'  => array(
								'type'    => 'group',
								'options' => array(
									'subject-group' => array(
										'type' => 'group',
										'options' => array(
											'subject_message'    => array(
												'type'  => 'text',
												'label' => __( 'Subject Message', 'nex' ),
												'desc' => __( 'This text will be used as subject message for the email', 'nex' ),
												'value' => __( 'Contact Form', 'nex' ),
											),
										)
									),
									'submit-button-group' => array(
										'type' => 'group',
										'options' => array(
											'submit_button_text' => array(
												'type'  => 'text',
												'label' => __( 'Submit Button', 'nex' ),
												'desc' => __( 'This text will appear in submit button', 'nex' ),
												'value' => __( 'Send', 'nex' ),
											),
										)
									),
									'success-group' => array(
										'type' => 'group',
										'options' => array(
											'success_message'    => array(
												'type'  => 'text',
												'label' => __( 'Success Message', 'nex' ),
												'desc' => __( 'This text will be displayed when the form will successfully send', 'nex' ),
												'value' => __( 'Message sent!', 'nex' ),
											),
										)
									),
									'failure_message'    => array(
										'type'  => 'text',
										'label' => __( 'Failure Message', 'nex' ),
										'desc' => __( 'This text will be displayed when the form will fail to be sent', 'nex' ),
										'value' => __( 'Oops something went wrong.', 'nex' ),
									),
								),
							),
						)
					),
					'mailer-options'   => array(
						'title'   => __( 'Mailer', 'nex' ),
						'type'    => 'tab',
						'options' => array(
							'mailer' => array(
								'label' => false,
								'type'  => 'mailer'
							)
						)
					),
					'style-options'   => array(
						'title'   => __( 'Styles', 'nex' ),
						'type'    => 'tab',
						'options' => array(
							'style'   => array(
								'type'  => 'image-picker',
								'value' => 'nex-v1-contact',
								'label' => esc_html__('Layout', 'nex'),
								'desc'  => esc_html__('Choose the contact form layout', 'nex'),
								'choices' => array(
									'nex-v1-contact' => fw_get_template_customizations_directory_uri('/extensions/forms/extensions/contact-forms/shortcodes/contact-form/static/img/contact_v1.png'),
									'nex-v2-contact' => fw_get_template_customizations_directory_uri('/extensions/forms/extensions/contact-forms/shortcodes/contact-form/static/img/contact_v2.png'),
								)
							)
						)
					),
				),
			),
		),
	)
);