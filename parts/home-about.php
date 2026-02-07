<?php
/**
 * The template for displaying home page videos.
 *
 * @package     Dubai Private Adventure Theme
 * @author      Pradheep Nair <pradheep.pnair@gmail.com>
 * @since       1.0.0
 */
$page_slug = 'about-us';
$page = get_page_by_path($page_slug, OBJECT, 'page');
$page_image_url = get_the_post_thumbnail_url($page->ID, 'full');
?>
    <!-- about-us starts -->
    <section class="about-us p-0">
        <div class="container">
            <div class="about-image-box">
                <div class="row d-flex align-items-center justify-content-between">
                    <div class="col-lg-3 pe-lg-4 mt-2 mb-3 ">
                        <img src="<?php echo $page_image_url; ?>" class="img-responsive" alt="<?php echo $page->post_title; ?>" />
                    </div>
                    <div class="col-lg-6 mb-4 ps-lg-4">
                        <div class="about-content text-center text-lg-start mb-4 mt-10"> 
                            <?php echo $page->post_excerpt; ?>
                            <p><a href="<?php echo get_permalink($page->ID); ?>" class="wp-block-button__link wp-element-button">Learn more</a></p>
                        </div>
                    </div>
                    <div class="col-lg-3 mb-4 pe-lg-4 mt-3">
                        <div id="TA_selfserveprop893" class="TA_selfserveprop"><ul id="UgLUG3f2m9N" class="TA_links y4LkQUQ8fig"><li id="PLvsX804" class="9XRJdsJ"><a target="_blank" href="https://www.tripadvisor.com/Attraction_Review-g295424-d6902277-Reviews-Dubai_Private_Adventure-Dubai_Emirate_of_Dubai.html"><img src="https://www.tripadvisor.com/img/cdsi/img2/branding/v2/Tripadvisor_lockup_horizontal_secondary_registered-11900-2.svg" alt="TripAdvisor"/></a></li></ul></div><script async src="https://www.jscache.com/wejs?wtype=selfserveprop&amp;uniq=893&amp;locationId=6902277&amp;lang=en_US&amp;rating=true&amp;nreviews=5&amp;writereviewlink=true&amp;popIdx=true&amp;iswide=false&amp;border=true&amp;display_version=2" data-loadtrk onload="this.loadtrk=true"></script>
                    </div>
                </div>
            </div>
        </div>
        <div class="white-overlay"></div>
    </section>
    <!-- about-us ends -->