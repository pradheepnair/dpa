<?php
/**
 * Template Name: Tours
 *
 * @package     Dubai Private Adventure Theme
 * @author      Pradheep Nair <pradheep.pnair@gmail.com>
 * @since       1.0.0
 */

global $wp_query; 
get_header(); 
$page_image_url = get_the_post_thumbnail_url($post->ID, 'full');
?>
    <!-- BreadCrumb Starts -->  
    <section class="breadcrumb-main pb-20 pt-14" style="background-image: url(<?php echo $page_image_url; ?>);">
        <div class="section-shape section-shape1 top-inherit bottom-0" style="background-image: url(<?php echo DPA_THEME_URI; ?>/assets/images/shapes/shape8.png);"></div>
        <div class="breadcrumb-outer">
            <div class="container">
                <div class="breadcrumb-content text-center">
                    <h1 class="mb-3">Our Tours & Packages</h1>
                    <nav aria-label="breadcrumb" class="d-block">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo get_home_url(); ?>">Home</a></li> 
                            <li class="breadcrumb-item active" aria-current="page">Our Tours & Packages</li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        <div class="dot-overlay"></div>
    </section>
    <!-- BreadCrumb Ends --> 
                            <?php
$args = array( 
    'post_type' => 'tour', 
    'posts_per_page' => -1,  
    'orderby' => array('menu_order' => 'ASC'), 
);  
$tours = get_posts($args);
$total_tours = count($tours);
if ($total_tours > 0) {
?>
    <!-- top Destination starts -->
    <section class="trending pt-6 pb-0 bg-lgrey">
        <div class="container"> 
            <div class="row">
                <?php  
                    foreach($tours as $tour) { 
                        $tour_image = get_the_post_thumbnail_url($tour->ID, 'full');
                        $tour_title = $tour->post_title;
                        $tour_description = $tour->post_excerpt; 
                        $tour_url = get_permalink($tour->ID); 
                        $tour_duration = get_field('tour_duration', $tour->ID);
                        $tour_price = get_field('tour_price', $tour->ID);
                        $no_of_pax = get_field('no_of_pax', $tour->ID);

                ?>
                <div class="col-lg-4 col-md-4 mb-4">
                    <div class="trend-item rounded box-shadow">
                        <a href="<?php echo $tour_url; ?>"><div class="trend-image position-relative">
                            <img src="<?php echo $tour_image; ?>" alt="image" class="<?php echo $tour_title; ?>">
                            <div class="color-overlay"></div>
                        </div></a>
                        <div class="trend-content trend-content-details p-4 pt-5 position-relative tour-brief"> 
                            <div class="trend-meta bg-theme white px-3 py-2 rounded">
                                <div class="entry-author">
                                    <i class="icon-clock"></i>
                                    <span class="fw-bold"><?php echo $tour_hours; ?></span>
                                </div>
                            </div>
                            <div class="tour-info tour-info-alt border-b pb-2 mb-2">
                                <h3 class="mb-1"><a href="<?php echo $tour_url; ?>"><?php echo $tour_title; ?></a></h3> 
                                <h4><?php echo $tour_price; ?> <span>(<?php echo $no_of_pax; ?>)</span></h4>
                                <p><?php echo $tour_description; ?></p>
                            </div>
                            <div class="entry-meta">
                                <div class="entry-author d-flex align-items-center justify-content-between">
                                    <p class="mb-0"><a data-id="#" data-action="book_form" class="nir-btn btn_action">Book now</a></p> 
                                    <p class="mb-0"><a href="<?php echo $tour_url; ?>" class="nir-btn nir-btn-secondary">Know more</a></p> 
                                </div>
                            </div> 
                        </div>
                    </div>
                </div>
                <?php } ?> 
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="logo-appreciations" style="justify-content: center;">
                        <a href="https://www.tripadvisor.com/Attraction_Review-g295424-d6902277-Reviews-Dubai_Private_Adventure-Dubai_Emirate_of_Dubai.html" target="_blank"><img src="/assets/images/2023/trip-advisor.webp" alt=""></a> 
                        <a href="https://www.google.com/search?q=dubai+private+adventure&amp;rlz=1C1CHWL_enIN1019IN1019&amp;oq=dubai+private+adventure&amp;aqs=chrome.0.0i355i512j46i175i199i512j0i512j0i390i650l2j69i60l3.11239j0j7&amp;sourceid=chrome&amp;ie=UTF-8#lrd=0x3e5f4280caa5f721:0x6e658adc92c83b9b,1,,," target="_blank"><img src="/assets/images/2023/google-reviews.svg" alt=""></a>
                    </div>                    
                </div>
            </div>
        </div>
    </section>
    <!-- top Destination ends -->
<?php
}
get_footer();
?>