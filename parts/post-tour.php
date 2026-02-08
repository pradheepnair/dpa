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
                            <li class="breadcrumb-item"><a href="<?php echo DPA_THEME_URI; ?>">Home</a></li>
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
                        <?php
                        $summary = get_field('summary', $post->ID);
                        if($summary) {
                            $col = 4;
                            $j = 1;
                        ?>
                        <div class="tour-includes mb-4">
                            <div class="row no-gutters">
                                <?php 
                                $count_summary = count($summary);
                                foreach($summary as $item) { 
                                    if ($count_summary === $j) $col = 8;
                                    if ($count_summary === $j && $count_summary == 4) $col = 12;
                                    if ($count_summary === $j && $count_summary == 6) $col = 4;
                                    ?>
                                    <div class="col-md-<?php echo $col; ?> include_item" >
                                    <div class="include_item_key"><?php echo $item['title']; ?></div>
                                    <div class="include_item_val"><?php echo $item['description']; ?></div>
                                </div>    
                                <?php } ?>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- top Destination ends -->