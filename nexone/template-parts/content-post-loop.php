<?php if ( ! defined( 'ABSPATH' ) ) { die( 'Direct access forbidden.' ); }
$cols = fw_get_db_settings_option('blog_cols');
switch ($cols) {
    case '1';
        $col_class = 'col-md-12';
        break;
	case '2';
		$col_class = 'col-md-6';
		break;
	case '3';
		$col_class = 'col-md-4';
		break;
	case '4';
		$col_class = 'col-md-3';
		break;
    default:
        $col_class = 'col-md-6';
        break;
}

$blog_layout = fw_get_db_settings_option('blog_layout_type');

include( get_theme_file_path( 'template-parts/blog/loop-' . $blog_layout . '.php' ) );