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
    'post_type' => 'guest', 
    'posts_per_page' => -1,  
    'orderby' => array('post_title' => 'ASC'), 
);  
$guests = get_posts($args); 
if (count($guests) > 0) {
    $i = 0;
?>
    <!-- guests starts -->
    <section class="our-partner pb-6 pt-6">
        <div class="container">
            <div class="section-title mb-6 mx-auto text-center"> 
                <h2 class="mb-1 theme">Here are some of the countries our guests have visited us from</h2>
                <p>We take pride in providing exceptional service to all our guests, and we are thrilled to have had delighted guests from around the world.</p>
            </div>
            <div class="row align-items-center partner-in partner-slider">
                <?php 
                    foreach($guests as $guest) { 
                        $guest_image_url = get_the_post_thumbnail_url($guest->ID, 'full');
                ?>
                <div class="col-md-2 col-sm-3">
                    <div class="partner-item p-4 py-2 rounded bg-lgrey slick-slide-flag">
                        <p><img src="<?php echo $guest_image_url; ?>" alt="<?php echo $guest->post_title; ?>" class="img-responsive"></p>
                        <p><?php echo $guest->post_title; ?></p>
                    </div>
                </div> 
                <?php } ?>
            </div>
        </div>
    </section>
    <!-- guests ends -->
<?php } ?>