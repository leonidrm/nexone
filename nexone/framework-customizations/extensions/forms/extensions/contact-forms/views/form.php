<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
/**
 * @var string $form_id
 * @var string $form_html
 * @var array $extra_data
 */
?>
<div class="form-wrapper contact-form <?php esc_attr_e($extra_data['style']) ?>">
	<?php print $form_html; ?>
</div>