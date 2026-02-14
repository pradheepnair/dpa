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
$page = get_page_by_path('blogs', OBJECT, 'page'); 
if(!$page) {
    wp_redirect(home_url()); 
    exit;
}
$page_image_url = get_the_post_thumbnail_url($page->ID, 'full');
$post = $wp_query->post; 
$blog_title = $post->post_title;
$blog_url = get_permalink($post->ID); 
$blog_story = $post->post_content;  
$blog_image_url = get_the_post_thumbnail_url($post->ID, 'full');
?>
    <!-- BreadCrumb Starts -->  
    <section class="breadcrumb-main pb-20 pt-14" style="background-image: url(<?php echo $page_image_url; ?>);">
        <div class="section-shape section-shape1 top-inherit bottom-0" style="background-image: url(<?php echo DPA_THEME_URI; ?>/assets/images/shapes/shape8.png);"></div>
        <div class="breadcrumb-outer">
            <div class="container">
                <div class="breadcrumb-content text-center">
                    <h1 class="mb-3">Blog</h1>
                    <nav aria-label="breadcrumb" class="d-block">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo get_home_url(); ?>">Home</a></li>
                            <li class="breadcrumb-item"><a href="<?php echo get_permalink($page->ID); ?>">Blogs</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><?php echo $blog_title; ?></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        <div class="dot-overlay"></div>
    </section>
    <!-- BreadCrumb Ends --> 
    <!-- about-us starts -->
    <section class="about-us pt-6 pb-0">
        <div class="container">
            <div class="about-image-box">
                <div class="row">
                    <div class="col-lg-8 col-sm-12 pe-lg-4">

                        <div class="about-content mb-3">
                            <div class="about-image rounded mb-3 overflow-hidden">
                                <img src="<?php echo $blog_image_url; ?>" alt="<?php echo $blog_title; ?>" class="w-100">
                            </div>
                            <h2 class="mb-3"><?php echo $blog_title; ?></h2>
                            <div class="blog-story">
                            <?php echo $blog_story; ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-12 ps-lg-4">
                        <div class="sidebar-sticky">
                            <div class="list-sidebar"> 
                            <?php
$args = array( 
    'post_type' => 'post', 
    'posts_per_page' => 3,  
    'orderby' => array('menu_order' => 'ASC'), 
);  
$articles = get_posts($args);  
                                if (count($articles) > 0) {
                            ?>
                                <div class="popular-post sidebar-item mb-4">
                                    <h3 class="">Related Posts</h3>
                                    <div class="sidebar-tabs">
                                        <div class="post-tabs">
                                            <!-- tab contents -->
                                            <div class="tab-content" id="postsTabContent1">
                                                <!-- popular posts -->
                                                <div class="tab-pane fade active show" id="popular" role="tabpanel">
                                                    <?php foreach($articles as $article) { 
                                                        $post_title = $article->post_title;
                                                        $post_description = $article->post_excerpt;
                                                        $post_image = get_the_post_thumbnail_url($article->ID, 'full'); 
                                                        $post_url = get_permalink($article->ID);
                                                        $post_date = date('d M, Y', strtotime($article->post_date));
                                                    ?>
                                                    <article class="post mb-3 border-b pb-3">
                                                        <div class="s-content d-flex align-items-center justify-space-between">
                                                            <div class="sidebar-image w-25 me-3">
                                                                <a href="<?php echo $post_url; ?>"><img src="<?php echo $post_image; ?>" alt="<?php echo $post_title; ?>"></a>
                                                            </div>
                                                            <div class="content-list w-75">
                                                                <h5 class="mb-1"><a href="<?php echo $post_url; ?>"><?php echo $post_title; ?></a></h5>
                                                                <div class="date"><?php echo $post_date; ?></div>
                                                            </div>    
                                                        </div> 
                                                    </article>
                                                    <?php
                                                    } ?> 
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> 
                            <?php
                                } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </section>
    <!-- about-us ends -->