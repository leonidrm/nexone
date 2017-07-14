<?php if ( ! defined( 'ABSPATH' ) ) { die( 'Direct access forbidden.' ); }

$ext_portfolio_instance = fw()->extensions->get( 'portfolio' );
$ext_portfolio_settings = $ext_portfolio_instance->get_settings();
$fw_ext_projects_gallery_image = $ext_portfolio_instance->get_config( 'image_sizes' );
$fw_ext_projects_gallery_image = $fw_ext_projects_gallery_image['gallery-image'];
$proj_infos = fw_get_db_post_option(get_the_ID(), 'proj_info');
$proj_link_url = fw_get_db_post_option(get_the_ID(), 'proj_link_url');
$proj_link_label = fw_get_db_post_option(get_the_ID(), 'proj_link_label');
$thumbnails = fw_ext_portfolio_get_gallery_images();

$taxonomy = $ext_portfolio_settings['taxonomy_name'];

get_header();
if(!defined('FW') || defined('FW') && fw_get_db_settings_option('show_post_breadcrumb') == 'on')
    get_template_part( 'template-parts/breadcrumbs' );
?>
<!-- === START PROJECT === -->
<section class="section">
    <?php while ( have_posts() ) : the_post(); ?>
        <!-- start project v1 -->
        <div id="post-<?php the_ID(); ?>" <?php post_class('nex-v1-projectpage'); ?>>
            <div class="container">
                <div class="col-md-8">
                    <div class="project-content">
                        <div class="row nex-project-slider">
	                        <?php foreach ( $thumbnails as $thumbnail ) :
		                        $attachment = get_post( $thumbnail['attachment_id'] );

		                        $captions[ $thumbnail['attachment_id'] ] = $attachment->post_title;

		                        $image = fw_resize( $thumbnail['attachment_id'], $fw_ext_projects_gallery_image['width'], $fw_ext_projects_gallery_image['height'], $fw_ext_projects_gallery_image['crop'] );
		                        ?>
                                <div class="col-md-12">
                                    <img src="<?php esc_attr_e($image) ?>"
                                         alt="<?php esc_attr_e($attachment->post_title) ?>"
                                         width="<?php esc_attr_e($fw_ext_projects_gallery_image['width']) ?>"
                                    />
                                </div>
	                        <?php endforeach ?>
                        </div>
                        <div class="row nex-project-nav">
	                        <?php foreach ( $thumbnails as $thumbnail ) :
		                        $attachment = get_post( $thumbnail['attachment_id'] );

		                        $captions[ $thumbnail['attachment_id'] ] = $attachment->post_title;

		                        $image = fw_resize( $thumbnail['attachment_id'], $fw_ext_projects_gallery_image['width'], $fw_ext_projects_gallery_image['height'], $fw_ext_projects_gallery_image['crop'] );
		                        ?>
                                <div class="col-md-3">
                                    <img src="<?php esc_attr_e($image) ?>"
                                         alt="<?php esc_attr_e($attachment->post_title) ?>"
                                         width="<?php esc_attr_e($fw_ext_projects_gallery_image['width']) ?>"
                                    />
                                </div>
	                        <?php endforeach ?>
                        </div>
                        <div class="nex-project-footer">
                            <?php echo get_the_term_list( get_the_ID(), $taxonomy , '<ul class="nex-project-category"><li><i class="ion-ios-copy-outline"></i> </li><li>', ',&nbsp;</li><li>', '</li></ul>' ); ?>
                            <?php echo get_the_term_list( get_the_ID(), 'fw-portfolio-tag' , '<ul class="nex-project-tags"><li><i class="ion-ios-pricetags-outline"></i> </li><li>', ',&nbsp;</li><li>', '</li></ul>' ); ?>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="project-sidebar">
                        <h1 class="project-title"><?php the_title() ?></h1>
                        <?php the_content() ?>
                        <ul class="project-details">
	                        <?php foreach($proj_infos as $info) : ?>
                                <li>
			                        <?php if(!empty($info['title'])) printf('<span>%s</span>', esc_html($info['title'])) ?>
			                        <?php if(!empty($info['value'])) esc_html_e($info['value']) ?>
                                </li>
	                        <?php endforeach; ?>
                        </ul>
                        <?php if(!empty($proj_link_url)) : ?>
                            <a href="<?php echo esc_url($proj_link_url) ?>" class="nex-v5-button nex-bc nex-bgca nex-bgcb"><?php esc_html_e($proj_link_label) ?></a>
                        <?php endif ?>
                    </div>
                </div>
            </div>
        </div>
        <!-- end project v1 -->
    <?php endwhile ?>
</section>


<div class="container">
    <?php if ( comments_open() || get_comments_number() )
        comments_template(); ?>
</div>

<div class="nex-related-projects">
    <!-- Our works -->
    <div class="nex-v2-portfolio">
        <div class="container">
            <?php nex_get_related_portfolio() ?>
            <div class="navigation-footer">
                <?php next_post_link( '%link', esc_html__( 'Next', 'nex' ) ); ?>
                <?php previous_post_link( '%link', esc_html__( 'Prev', 'nex' ) ) ?>
            </div>
        </div>
    </div>
    <!-- /our works -->
</div>
<?php
get_footer();