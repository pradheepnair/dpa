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
$gallery_image_url = get_the_post_thumbnail_url($post->ID, 'full');
?>
    <!-- BreadCrumb Starts -->  
    <section class="breadcrumb-main pb-20 pt-14" style="background-image: url(<?php echo $gallery_image_url; ?>);">
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
            </div>
            <?php
            $args = array(
                'post_type' => 'image',
                'posts_per_page' => -1,
                'orderby' => array('menu_order' => 'ASC'),
            );
            $images = get_posts($args);
            $total_images = count($images);
            if ($total_images > 0) {  ?>
            <div class="row">
                <?php foreach($images as $image) { 
                    $image_url = get_the_post_thumbnail_url($image->ID, 'full');
                    $image_title = $image->post_title;
                    ?>
                <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
                    <div class="gallery-item mb-4 rounded overflow-hidden">
                        <div class="gallery-image">
                            <img src="<?php echo $image_url; ?>" alt="image">
                            <div class="overlay"></div>
                        </div>
                        <div class="gallery-content"> 
                            <ul>
                                <li><a href="<?php echo $image_url; ?>" data-lightbox="gallery" data-title="<?php echo $image_title; ?>"><i class="fa fa-eye"></i></a></li>
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