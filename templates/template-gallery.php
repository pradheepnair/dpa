<?php
/**
 * Template Name: Gallery
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
    <section class="breadcrumb-main pb-20 pt-14" style="background-image: url(<?php echo $about_image_url; ?>);">
        <div class="section-shape section-shape1 top-inherit bottom-0" style="background-image: url(<?php echo DPA_THEME_URI; ?>/assets/images/shapes/shape8.png);"></div>
        <div class="breadcrumb-outer">
            <div class="container">
                <div class="breadcrumb-content text-center">
                    <h1 class="mb-3">Gallery</h1>
                    <nav aria-label="breadcrumb" class="d-block">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo get_home_url(); ?>">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Gallery</li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        <div class="dot-overlay"></div>
    </section>
    <!-- BreadCrumb Ends --> 
    <!-- Gallery starts -->
    <div class="gallery pb-0 pt-6">
        <div class="container">
            <div class="section-title mb-6 text-center w-75 mx-auto">
                <?php echo $post->post_content; ?>
                <h4 class="mb-1 theme1">Our Gallery</h4>
                <h2 class="mb-1">Some Beautiful <span class="theme">Snapshoots</span></h2> 
            </div>
            <?php if (count($images) > 0) { ?>
            <div class="row">
                <?php foreach($images as $image) { ?>
                <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
                    <div class="gallery-item mb-4 rounded overflow-hidden">
                        <div class="gallery-image">
                            <img src="<?php echo HOST_URL; ?>/assets/images/2023/gallery/<?php echo $image['image_url']; ?>" alt="image">
                            <div class="overlay"></div>
                        </div>
                        <div class="gallery-content">
                            <!--<h5 class="white text-center position-absolute bottom-0 pb-4 left-50 mb-0 w-100">Barcelona - Spain</h5>-->
                            <ul>
                                <li><a href="<?php echo HOST_URL; ?>/assets/images/2023/gallery/<?php echo $image['image_url']; ?>" data-lightbox="gallery" data-title="Our Gallery"><i class="fa fa-eye"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>   
                <?php } ?>
            </div> 
            <?php } ?>
        </div>
    </div>
    <!-- Gallery Ends -->
<?php
get_footer();
?> 