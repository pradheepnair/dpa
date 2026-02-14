<?php
/**
 * Template Name: Blogs
 *
 * @package     Dubai Private Adventure Theme
 * @author      Pradheep Nair <pradheep.pnair@gmail.com>
 * @since       1.0.0
 */

global $wp_query; 
get_header(); 
$blog_image_url = get_the_post_thumbnail_url($post->ID, 'full');
?>
    <!-- BreadCrumb Starts -->  
    <section class="breadcrumb-main pb-20 pt-14" style="background-image: url(<?php echo $blog_image_url; ?>);">
        <div class="section-shape section-shape1 top-inherit bottom-0" style="background-image: url(<?php echo $DPA_THEME_URI; ?>/assets/images/shapes/shape8.png);"></div>
        <div class="breadcrumb-outer">
            <div class="container">
                <div class="breadcrumb-content text-center">
                    <h1 class="mb-3">Blog</h1>
                    <nav aria-label="breadcrumb" class="d-block">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo get_home_url(); ?>">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Blogs</li>
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
    'post_type' => 'post', 
    'posts_per_page' => -1,  
    'orderby' => array('menu_order' => 'ASC'), 
);  
$articles = get_posts($args);
if (count($articles) > 0) {
    $i = 0;
    ?>
    <!-- blog starts -->
    <section class="blog">
        <div class="container">
            <div class="listing-inner px-5"> 
                <?php
                foreach ($articles as $article) {
                    $blog_title = $article->post_title;
                    $blog_description = $article->post_content;
                    $blog_image = get_the_post_thumbnail_url($article->ID, 'full');
                    $blog_date = date('d M, Y', strtotime($article->post_date)); //date_format(strtotime($blog['dated']), "d M, Y");
                    $blog_url = get_permalink($article->ID);
                    ?>
                <div class="blog-full mb-4 border-b bg-white box-shadow p-4 rounded border-all">
                    <div class="row">
                        <div class="col-lg-5 col-md-4 blog-height">
                            <div class="blog-image rounded">
                                <a href="<?php echo $blog_url; ?>" style="background-image: url(<?php echo $blog_image; ?>);"></a>
                            </div> 
                        </div>
                        <div class="col-lg-7 col-md-8">
                            <div class="blog-content"> 
                                <h3 class="mb-2"><a href="<?php echo $blog_url; ?>" class=""><?php echo $blog_title; ?></a></h3>
                                <p class="date-cats mb-2">
                                    <!--<a href="post-grid-2.html" class="me-2"><i class="fa fa-file"></i> Categories</a> -->
                                    <a href="<?php echo $blog_url; ?>" class="me-2"><i class="fa fa-calendar-alt"></i> <?php echo $blog_date; ?></a>
                                    <a href="<?php echo $blog_url; ?>" class=""><i class="fa fa-user"></i> DPA</a>
                                </p> 
                                <p class="mb-4"><?php echo $blog_description; ?></p>  
                                <p class="mb-0"><a href="<?php echo $blog_url; ?>" class="nir-btn">Read More</a></p>
                            </div>
                        </div>
                    </div>
                </div>
                <?php } ?>  
            </div>
        </div>
    </section>
    <!-- blog Ends --> 
<?php
}
get_footer();
?>