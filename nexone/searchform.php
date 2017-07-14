<?php if ( ! defined( 'ABSPATH' ) ) { die( 'Direct access forbidden.' ); } ?>
<form method="get" role="search" action="<?php echo esc_url(home_url('/')) ?>" class="search-form">
	<input class="nex-bcf" type="text" name="s" value="" placeholder="<?php esc_attr_e( 'Search...', 'nex' ); ?>" />
	<input type="submit" value="" />
</form>