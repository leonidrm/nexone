<?php
if (!defined('FW')) die('Forbidden');
/**
 * @var $atts
 */
$title = $atts['title'];
?>
<!-- Subscription v1 start -->
<div class="nex-v1-subscription">
    <div class="row">
        <?php if(!empty($title)) printf('<div class="col-md-4"><h3>%s</h3></div>', $title) ?>
        <div class="col-md-<?php echo !empty($title) ? '8' : '12' ?>">
            <form class="nex-bgca nex-form-subscribe" method="post" action="#">
                <input type="email" name="email" placeholder="<?php echo esc_attr($atts['placeholder']) ?>" required/>
                <input type="submit" value="" />
                <input type="hidden" name="lists" value="<?php echo esc_attr($atts['lists']) ?>">
                <p class="result-message"></p>
            </form>
        </div>
    </div>
</div>
<!-- Subscription v1 end -->