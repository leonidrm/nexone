<?php if ( ! defined( 'ABSPATH' ) ) die( 'Direct access forbidden.' );

print $before_widget;
if (!empty($title))
    print $before_title . $title . $after_title;?>
<ul>
    <?php foreach($info_fields as $field) : ?>
        <li><span><?php echo wp_kses( $field['value'], array('a' => array('href' => array(),'target' => array()), 'b' => array(), 'strong'=>array())); ?></span><p><?php echo wp_kses( $field['label'], array('a' => array('href' => array(),'target' => array()), 'b' => array(), 'strong'=>array())); ?></p></li>
    <?php endforeach ?>
</ul>
<?php print $after_widget;