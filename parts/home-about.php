<?php
/**
 * The template for displaying home page videos.
 *
 * @package     Dubai Private Adventure Theme
 * @author      Pradheep Nair <pradheep.pnair@gmail.com>
 * @since       1.0.0
 */
$page_slug = 'about-us';
$page = get_page_by_path($page_slug, OBJECT, 'page');
$page_image_url = get_the_post_thumbnail_url($page->ID, 'full');
?>
    <!-- about-us starts -->
    <section class="about-us p-0">
        <div class="container">
            <div class="about-image-box">
                <div class="row d-flex align-items-center justify-content-between">
                    <div class="col-lg-3 pe-lg-4 mt-2 mb-3 ">
                        <img src="<?php echo $page_image_url; ?>" class="img-responsive" alt="<?php echo $page->post_title; ?>" />
                    </div>
                    <div class="col-lg-6 mb-4 ps-lg-4">
                        <div class="about-content text-center text-lg-start mb-4 mt-10"> 
                            <?php echo $page->post_excerpt; ?>
                            <p><a href="<?php echo get_permalink($page->ID); ?>" class="wp-block-button__link wp-element-button">Learn more</a></p>
                        </div>
                    </div>
                    <div class="col-lg-3 mb-4 pe-lg-4 mt-3">
                        <?php echo get_theme_mod('dpa_general_tripadvisor'); ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="white-overlay"></div>
    </section>
    <!-- about-us ends -->