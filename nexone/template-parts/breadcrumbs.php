<?php
$output = $breadcrumb_style = '';
if(defined('FW')) {
    $breadcrumb_style = nex_get_breadcrumb_style();
} ?>
<!-- Breadcrumbs vx start -->
<div class="nex-vx-breadcrumbs" <?php if(!empty($breadcrumb_style['pattern'])) printf($breadcrumb_style['pattern'], $breadcrumb_style['args']) ?>>
    <?php if(!empty($breadcrumb_style['bg_image_filter']))
        echo '<div class="bg-transparency" style="background:' . esc_attr($breadcrumb_style['bg_image_filter']) . ';"></div>' ?>

    <div class="container">
        <div class="site-title">
            <h1 class="nex-bgca"><?php nex_the_page_title() ?></h1>
            <?php $subtitle = nex_get_page_subtitle();
            if(!empty($subtitle))
                echo "<p>" . esc_html($subtitle) . "</p>"; ?>
        </div>
    </div>
</div>
<!-- Breadcrumbs vx end -->