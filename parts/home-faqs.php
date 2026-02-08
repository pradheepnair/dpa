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
    'post_type' => 'faq', 
    'posts_per_page' => -1,  
    'orderby' => array('menu_order' => 'ASC'), 
);  
$faqs = get_posts($args); 
if (count($faqs) > 0) {
    $i = 0;
?>
    <!-- FAQ Start -->
    <section class="faq-main pb-0 pt-0">
        <div class="container">
            <div class="section-title mb-6 text-center w-75 mx-auto"> 
                <h2 class="mb-1 theme">Frequently Asked Questions</h2> 
            </div>
            <div class="faq-accordian">
                <div class="row">
                    <div class="col-lg-5 col-md-5 mb-4">
                        <img src="<?php echo DPA_THEME_URI; ?>/assets/images/generic/faq.jpg" alt="" class="img-responsive" />
                    </div>
                    <div class="col-lg-7 col-md-7 mb-8">
                        <div class="accrodion-grp faq-accrodion" data-grp-name="faq-accrodion1">
                            <?php 
                            foreach($faqs as $faq) {
                            ?>
                            <div class="accrodion <?php echo $i == 0 ? 'active': ''; ?>">
                                <div class="accrodion-title">
                                    <h5><?php echo $faq->post_title; ?></h5>
                                </div>
                                <div class="accrodion-content" style="<?php echo $i == 0 ? 'display: block': ''; ?>">
                                    <div class="inner">
                                        <?php echo $faq->post_content; ?>
                                    </div><!-- /.inner -->
                                </div>
                            </div>
                            <?php
                                $i ++;
                            }
                            ?> 
                        </div>
                    </div> 
                </div>
            </div>
        </div>
    </section>
    <!-- FAQ Ends -->  
<?php
}
?>