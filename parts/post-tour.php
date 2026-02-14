<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Dubai Private Adventure Theme
 * @author Pradheep Nair <pradheep.pnair@gmail.com>
 * @subpackage V1
 * @since 1.0
 */

global $wp_query; 
$post = $wp_query->post; 
$page = get_page_by_path('tours', OBJECT, 'page'); 
if(!$page) {
    wp_redirect(home_url()); 
    exit;
}
$page_title = $page->post_title;
$page_url = get_permalink($page->ID);
$tour_title = $post->post_title;
$page_image_url = get_field('header_image', $post->ID);
$duration = get_field('duration', $post->ID);
?>
    <!-- BreadCrumb Starts -->  
    <section class="breadcrumb-main pb-20 pt-14" style="background-image: url(<?php echo $page_image_url; ?>);">
        <div class="section-shape section-shape1 top-inherit bottom-0" style="background-image: url(<?php echo DPA_THEME_URI; ?>/assets/images/shapes/shape8.png);"></div>
        <div class="breadcrumb-outer">
            <div class="container">
                <div class="breadcrumb-content text-center">
                    <h1 class="mb-3"><?php echo $page_title; ?></h1>
                    <nav aria-label="breadcrumb" class="d-block">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo get_home_url(); ?>">Home</a></li>
                            <li class="breadcrumb-item"><a href="<?php echo $page_url; ?>"><?php echo $page_title; ?></a></li>
                            <li class="breadcrumb-item active" aria-current="page"><?php echo $tour_title; ?></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        <div class="dot-overlay"></div>
    </section>
    <!-- BreadCrumb Ends -->  
    <!-- top Destination starts -->
    <section class="trending pt-6 pb-0 bg-lgrey">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="single-content">
                        <div class="single-full-title border-b mb-2 pb-2">
                            <div class="single-title">
                                <h2 class="mb-1"><?php echo $tour_title; ?></h2>
                                <div class="rating-main d-lg-flex align-items-center text-lg-start text-center">
                                    <p class="mb-0 me-2"><i class="icon-clock"></i> <?php echo $duration; ?></p> 
                                </div>
                            </div>
                        </div>

                        <!-- Summary -->
                        <?php
                        $summary = get_field('summary', $post->ID);
                        if($summary) { ?>
                        <div class="tour-includes mb-4"> 
                            <?php 
                                $count_summary = count($summary);
                                foreach($summary as $item) { ?>
                                <div class="include_item" >
                                    <div class="include_item_key"><?php echo $item['title']; ?></div>
                                    <div class="include_item_val"><?php echo $item['description']; ?></div>
                                </div>    
                            <?php } ?>
                        </div>
                        <?php } ?>

                        <!-- Gallery -->
                        <?php
                        $images = get_field('images', $post->ID);
                        if($images) { 
                            $count_images = count($images);
                            if ($count_images > 0) {
                        ?>
                        <div class="description-images mb-4 overflow-hidden">
                            <div class="thumbnail-images position-relative">
                                <div class="slider-store rounded overflow-hidden">
                                    <?php foreach($images as $image) { ?>
                                    <div><img src="<?php echo $image['image']; ?>" alt=""></div>
                                    <?php } ?>
                                </div>
                                <div class="slider-thumbs" style="display:none">
                                    <?php foreach ($images as $image) {  ?>
                                    <div><img src="<?php echo $image['image']; ?>" alt=""></div>
                                    <?php } ?>  
                                </div>
                            </div>
                        </div>   
                        <?php
                            } 
                        } ?>

                        <!-- Description -->
                        <div class="description mb-2">
                            <?php echo $post->post_content; ?>
                        </div> 

                        <!-- Itinerary -->
                        <?php
                        $itinerary = get_field('itinerary', $post->ID);
                        if($itinerary) { 
                            $count_itinerary = count($itinerary);
                            if ($count_itinerary > 0) {
                                $description = get_field('introduction', $post->ID);
                        ?>
                        <div class="description mb-4 mt-5">
                            <h3>Itinerary</h3>
                            <p><?php echo $description; ?></p>               
                        </div>
                        <div class="accrodion-grp faq-accrodion mb-4" data-grp-name="faq-accrodion">
                            <?php 
                            $k = 0;
                            foreach($itinerary as $item) {  
                            ?>
                            <div class="accrodion <?php echo $k == 0 ? 'active': ''; ?>">
                                <div class="accrodion-title rounded">
                                    <h5 class="mb-0"><?php echo $item['title']; ?></h5>
                                </div>
                                <div class="accrodion-content" style="display: <?php echo $k == 0 ? 'block': 'none'; ?>;">
                                    <div class="inner">
                                        <p><?php echo $item['description']; ?></p>
                                    </div>
                                </div>

                            </div> 
                            <?php
                                $k ++;
                            }
                            ?>
                        </div>
                        <?php
                            }
                        }
                        ?> 

                        <!-- Add-ons -->
                        <?php
                        $addons_list = get_field('add-ons', $post->ID);
                        if($addons_list) {
                            $addons = get_posts(array('post_type' => 'add-on', 'post__in' => $addons_list, 'posts_per_page' => -1, 'orderby' => 'menu_order', 'order' => 'ASC'));
                    
                            foreach ($addons as $addon) {
                                $addon_image = get_the_post_thumbnail_url($addon->ID, 'full');
                                ?>
                                <div class="trend-full bg-white rounded box-shadow overflow-hidden p-4 mb-4">
                                    <div class="row">
                                        <div class="col-lg-4 col-md-3">
                                        <div class="trend-item2 rounded">
                                                <a style="background-image: url(<?php echo $addon_image; ?>);"></a>
                                                <div class="color-overlay"></div>
                                            </div> 
                                        </div>
                                        <div class="col-lg-8 col-md-9">
                                            <div class="trend-content position-relative text-md-start text-center tour-addons-info"> 
                                                <h3 class="mb-1"><?php echo $addon->post_title; ?></h3> 
                                                <?php echo $addon->post_content; ?>
                                            </div>
                                        </div> 
                                    </div>
                                </div>
                                <?php
                             }
                        } 
                        ?>

                        <!-- Additional Information -->
                        <?php
                        $additionals = get_field('additionals', $post->ID);
                        if($additionals) {
                            $count_additionals = count($additionals);
                            if ($count_additionals > 0) {
                                foreach ($additionals as $additional) { ?>
                            <div class="row">
                                <div class="col-md-12"> 
                                    <p>&nbsp;</p>
                                    <h3><?php echo $additional['title']; ?></h3> 
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12"> 
                                    <div class="tour-addons-info">
                                    <?php echo $additional['description']; ?>
                                    </div>
                                </div>
                            </div> 
                            <?php
                                }
                            }
                        }
                        ?> 
                    </div>
                </div>
                <div class="col-lg-4 ps-lg-4">
                    <div class="sidebar-sticky">
                        <div class="list-sidebar">
                            <div class="sidebar-item">
                                <p>&nbsp;</p>
                                <form class="form-content rounded overflow-hidden bg-theme">
                                    <h4 class="white text-center border-b pb-2">So, what are you waiting for? Book your package now!</h4>
                                    <a href="#" class="nir-btn w-100 bg-title btn_action">Book Now</a> 
                                </form>
                                <div class="logo-appreciations" style="justify-content: center;">
                                    <a href="https://www.tripadvisor.com/Attraction_Review-g295424-d6902277-Reviews-Dubai_Private_Adventure-Dubai_Emirate_of_Dubai.html" target="_blank"><img src="<?php echo DPA_THEME_URI; ?>/assets/images/trip-advisor.webp" alt=""></a> 
                                    <a href="https://www.google.com/search?q=dubai+private+adventure&amp;rlz=1C1CHWL_enIN1019IN1019&amp;oq=dubai+private+adventure&amp;aqs=chrome.0.0i355i512j46i175i199i512j0i512j0i390i650l2j69i60l3.11239j0j7&amp;sourceid=chrome&amp;ie=UTF-8#lrd=0x3e5f4280caa5f721:0x6e658adc92c83b9b,1,,," target="_blank"><img src="<?php echo DPA_THEME_URI; ?>/assets/images/google-reviews.svg" alt=""></a>
                                </div>
                            </div> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- top Destination ends -->