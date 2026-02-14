<?php
/**
 * The template for displaying home page videos.
 *
 * @package     Dubai Private Adventure Theme
 * @author      Pradheep Nair <pradheep.pnair@gmail.com>
 * @since       1.0.0
 */
global $wp_query; 
$homepage_id = get_option('page_on_front');  
$description = get_field('description', $homepage_id);
$yt_video_url = get_field('youtube_video_link', $homepage_id);
$read_more_url = get_field('read_more_link', $homepage_id);
?>
    <!-- Explore starts -->
    <section class="discount-action pt-0 pb-8" style="background-image: url(<?php echo DPA_THEME_URI; ?>/assets/images/shapes/shape-1.png); background-attachment:unset">
        <div class="container">
            <div class="call-banner1 rounded" style="background-image: url(<?php echo DPA_THEME_URI; ?>/assets/images/museum.jpg); background-position:right;">
                <div class="row d-flex align-items-center">
                    <div class="col-lg-6 col-md-6 p-0">
                        <div class="call-banner-inner bg-theme p-5 pt-10 pb-10 my-5 rounded ms-4">
                            <?php echo $description; ?>
                            <a href="<?php echo $read_more_url; ?>" class="nir-btn-black">Read More</a>
                        </div>
                    </div>  
                    <div class="col-lg-6 col-md-6 p-0">
                        <div class="video-button text-center position-relative z-index2">
                            <div class="call-button text-center">
                                <button class="play-btn mfp-youtube" data-url="<?php echo $yt_video_url; ?>">
                                    <i class="fa fa-play bg-blue"></i> 
                                </button>
                            </div>
                            <div class="video-figure"></div>
                        </div>
                    </div> 
                </div> 
            </div>  
        </div>    
    </section>
    <!-- Explore Ends -->