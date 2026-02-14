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
    'post_type' => 'post', 
    'posts_per_page' => 3,  
    'orderby' => array('menu_order' => 'ASC'), 
);  
$articles = get_posts($args); 
if (count($articles) > 0) {
    $i = 0;
?>
    <!-- recent-articles starts -->
    <section class="trending recent-articles pb-6 pt-6">
        <div class="container">
            <div class="section-title mb-6 w-75 mx-auto text-center">
                <!-- <h4 class="mb-1 theme1">Our Blogs</h4> -->
                <h2 class="mb-1 theme"> Recent Articles & Posts</h2> 
            </div>
            <div class="recent-articles-inner">
                <div class="row">
                    <?php 
                        foreach($articles as $article) { 
                            $blog_title = $article->post_title;
                            $blog_description = $article->post_excerpt;
                            $blog_image = get_the_post_thumbnail_url($article->ID, 'full');
                            $blog_date = date('d M, Y', strtotime($article->post_date));  
                            $blog_url = get_permalink($article->ID);
                    ?>
                    <div class="col-lg-4">
                        <div class="trend-item box-shadow bg-white mb-4 rounded">
                            <a href="<?php echo $blog_url; ?>"><div class="trend-image">
                                <img src="<?php echo $blog_image; ?>" alt="<?php echo $blog_title; ?>">
                            </div></a>
                            <div class="trend-content-main p-4 pb-2">
                                <div class="trend-content trend-content-alt">
                                    <div class="entry-meta-top">
                                        <!-- <h5 class="theme mb-1">Technology</h5> -->
                                        <h4><a href="<?php echo $blog_url; ?>"><?php echo $blog_title; ?></a></h4>
                                        <p class="mb-3"><?php echo $blog_description; ?></p>
                                    </div>
                                    <div class="entry-meta d-flex align-items-center justify-content-between"> 
                                        <div class="entry-button d-flex align-items-center mb-2">
                                            <a href="<?php echo $blog_url; ?>" class="nir-btn">Read More</a>
                                        </div>
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
    </section>
    <!-- recent-articles ends -->
<?php } ?>