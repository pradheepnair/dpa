<?php
/**
 * Template Name: About Us
 *
 * @package     Dubai Private Adventure Theme
 * @author      Pradheep Nair <pradheep.pnair@gmail.com>
 * @since       1.0.0
 */

global $wp_query; 
get_header(); 
$about_image_url = get_the_post_thumbnail_url($post->ID, 'full');
?>
<section class="about-us pt-6" style="background-image:url(<?php echo DPA_THEME_URI; ?>/assets/images/bg/background_pattern.png); background-position:bottom right;">
    <div class="container">
        <div class="about-image-box">
            <div class="row d-flex align-items-center justify-content-between">
                <div class="col-lg-6 ps-4">
                    <?php echo $post->post_content; ?>
                </div>
                <div class="col-lg-6 mb-4 pe-4">
                    <div class="about-image" style="animation:none; background:transparent;">
                            <img src="<?php echo $about_image_url; ?>" alt="" class="img-responsive" />
                    </div>
                </div>
                <div class="col-lg-12">
                    <?pbp get_template_part('parts/home-counter', 'home'); ?>
                </div>
            </div>
        </div>
    </div>
    <div class="white-overlay"></div>
</section>