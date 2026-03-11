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
<!-- BreadCrumb Starts -->  
<section class="breadcrumb-main pb-20 pt-14" style="background-image: url(<?php echo DPA_THEME_URI; ?>/assets/images/bg/about.jpg);">
    <div class="section-shape section-shape1 top-inherit bottom-0" style="background-image: url(<?php echo DPA_THEME_URI; ?>/assets/images/shapes/shape8.png);"></div>
    <div class="breadcrumb-outer">
        <div class="container">
            <div class="breadcrumb-content text-center">
                <h1 class="mb-3">About Us</h1>
                <nav aria-label="breadcrumb" class="d-block">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo get_home_url(); ?>">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">About Us</li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
    <div class="dot-overlay"></div>
</section>
<!-- BreadCrumb Ends --> 
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
                    <?php get_template_part('parts/home-counter', 'home'); ?>
                </div>
            </div>
        </div>
    </div>
    <div class="white-overlay"></div>
</section>
<?php
$why_us = get_field('why_choose_us', $post->ID);
if ($why_us) {
    $count_why_us = count($why_us);
    if ($count_why_us > 0) {        
?>
<!-- about-us starts -->
<section class="about-us pb-0">
    <div class="section-shape section-shape1" style="background-image: url(<?php echo HOST_URL; ?>/assets/images/2023/shapes/shape8.png);"></div>
    <div class="container">
        <div class="section-title mb-6 w-50 mx-auto text-center"> 
            <h2 class="mb-1 theme">Why Choose Us?</h2> 
        </div>

        <!-- why us starts -->
        <div class="why-us">
            <div class="why-us-box">
                <div class="row">
            <?php
                foreach ($why_us as $item) {
                    $icon = $item['icon'];
                    $title = $item['title'];
                    $description = $item['description'];
                    ?>

                    <div class="col-lg-6 col-md-6 col-sm-6 mb-4">
                        <div class="why-us-item p-5 pt-6 pb-6 border rounded bg-white">
                            <div class="why-us-content">
                                <div class="why-us-icon mb-1">
                                    <i class="<?php echo $icon; ?> theme"></i>
                                </div>
                                <h4><?php echo $title; ?></h4>
                                <p class="mb-2"><?php echo $description; ?></p> 
                            </div>
                        </div>
                    </div>
            <?php
                }
            ?>
                         
                    </div>
                </div>
            </div>
            <!-- why us ends -->
        </div>
    </section>
    <!-- about-us ends -->
<?php 
    }
}
?>