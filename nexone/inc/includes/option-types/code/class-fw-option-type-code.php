<?php if (!defined('FW')) die('Forbidden');

class FW_Option_Type_Code extends FW_Option_Type
{
	public function get_type()
	{
		return 'code';
	}

	/**
	 * @internal
	 */
	protected function _enqueue_static($id, $option, $data)
	{
		$uri = get_template_directory_uri() .'/inc/includes/option-types/'. $this->get_type() .'/static';

		wp_enqueue_script(
			'fw-option-'. $this->get_type() . '-core-js',
			$uri . '/js/codemirror.js',
			array( 'jquery' )
		);
		wp_enqueue_script(
			'fw-option-'. $this->get_type() . '-mode-js',
			$uri . '/js/mode/css/css.js',
			array( 'fw-option-'. $this->get_type() . '-core-js' )
		);
		wp_enqueue_script(
			'fw-option-'. $this->get_type() . '-javascript-mode',
			$uri . '/js/mode/javascript/javascript.js',
			array( 'fw-option-'. $this->get_type() . '-core-js' )
		);
		wp_enqueue_script(
			'fw-option-'. $this->get_type() . '-addon-closebrakets',
			$uri . '/js/addon/closebrackets.js',
			array( 'fw-option-'. $this->get_type() . '-core-js' )
		);
		wp_enqueue_script(
			'fw-option-'. $this->get_type() . '-addon-matchbrakets',
			$uri . '/js/addon/matchbrackets.js',
			array( 'fw-option-'. $this->get_type() . '-core-js' )
		);
		wp_enqueue_script(
			'fw-option-'. $this->get_type(),
			$uri .'/js/scripts.js',
			array('fw-events', 'jquery','fw-option-'. $this->get_type() . '-core-js')
		);

		wp_enqueue_style(
			'fw-option-'. $this->get_type() . '-core-css',
			$uri . '/css/codemirror.css'
		);
		wp_enqueue_style(
			'fw-option-'. $this->get_type() . '-theme-css',
			$uri . '/css/theme/mdn-like.css'
		);
	}	protected function _render( $id, $option, $data ) {
	$option['value'] = (string) $data['value'];

	unset( $option['attr']['value'] ); // be sure to remove value from attributes

	$option['attr'] = array_merge( array( 'rows' => '6' ), $option['attr'] );
	$option['attr']['class'] .= ' code';

	return '<textarea ' . fw_attr_to_html( $option['attr'] ) . '>' .
	       htmlspecialchars( $option['value'], ENT_COMPAT, 'UTF-8' ) .
	       '</textarea>';
}

	/**
	 * @param array $option
	 * @param array|null|string $input_value
	 *
	 * @return string
	 *
	 * @internal
	 */
	protected function _get_value_from_input( $option, $input_value ) {
		return (string) ( is_null( $input_value ) ? $option['value'] : $input_value );
	}

	/**
	 * @internal
	 */
	protected function _get_defaults() {
		return array(
			'value' => ''
		);
	}

	/**
	 * @internal
	 */
	public function _get_backend_width_type() {
		return 'full';
	}
}

FW_Option_Type::register('FW_Option_Type_Code');