<?php
/**
 * The template for displaying home page videos.
 *
 * @package     Dubai Private Adventure Theme
 * @author      Pradheep Nair <pradheep.pnair@gmail.com>
 * @since       1.0.0
 */
global $wp_query; 
$args = array( 
    'post_type' => 'testimonial', 
    'posts_per_page' => -1,  
    'orderby' => array('menu_order' => 'ASC'), 
);  
$testimonials = get_posts($args); 
if (count($testimonials) > 0) {
    $i = 0;
?>
<section class="testimonials min-width-wrapper pt-5 pb-6" style="background-image:url(<?php echo DPA_THEME_URI; ?>/assets/images/bg/testimonials.jpeg)">
    <div class="container"> 
        <div class="section-title mb-6 w-75 mx-auto text-center"> 
            <h2 class="mb-1 white">What our travelers have to say about us.</h2>
        </div>
        <div class="row align-items-center">
            <div class="col-md-12"> 
                <div class="testimonials-slider review-slider">
                    <?php 
                    foreach ($testimonials as $testimonial) { 
                        $testimonial_image_url = get_the_post_thumbnail_url($testimonial->ID, 'full');
                    ?>
                    <div class="testimonials-slider-item">
                        <div class="testimonials-slider-item-top">
                            <div class="testimonials-slider-item-user">
                                <div class="testimonials-slider-item-user_image">
                                    <a href="<?php echo get_field('location', $testimonial->ID); ?>" target="_blank"><img src="<?php echo $testimonial_image_url; ?>" alt="<?php echo $testimonial->post_title; ?>" /></a>
                                </div>
                                <div class="testimonials-slider-item-user_bio">
                                    <p><b><?php echo $testimonial->post_title; ?></b></p>
                                    <p><?php echo get_field('profile_url', $testimonial->ID); ?></p>
                                </div>
                            </div>
                            <div class="testimonials-slider-item-logo"><a href="https://www.tripadvisor.com/Attraction_Review-g295424-d6902277-Reviews-Dubai_Private_Adventure-Dubai_Emirate_of_Dubai.html" target="_blank"><img src="<?php echo DPA_THEME_URI; ?>/assets/images/tripadvisor.png" alt="Tripadvisor" /></a></div>
                        </div>
                        <div class="testimonials-slider-item-bottom">
                        <?php echo $testimonial->post_content; ?>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
}
?>