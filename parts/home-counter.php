<?php
/**
 * The template for displaying home page videos.
 *
 * @package     Dubai Private Adventure Theme
 * @author      Pradheep Nair <pradheep.pnair@gmail.com>
 * @since       1.0.0
 */
global $wp_query; 
$post = $wp_query->post; 
$homepage_id = get_option('page_on_front');  
$years_of_experience = 15;  
$tour_packages = 530;  
$happy_customers = 850;  
$award_winning = 320;  
if ($homepage_id) { 
    $years_of_experience = get_field('experience', $homepage_id);
    $tour_packages = get_field('packages', $homepage_id);
    $happy_customers = get_field('customers', $homepage_id);
    $award_winning = get_field('awards', $homepage_id);
}
?>
    <!-- Counter -->
    <section class="counter-main pt-6">
        <div class="container">
            <div class="counter p-4 pb-0 box-shadow bg-white rounded m-0">
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-sm-6 mb-4">
                        <div class="counter-item border-end pe-4 d-flex align-items-center">
                            <i class="icon-clock bg-theme p-3 rounded me-3 white fs-4"></i>
                            <div class="counter-content">
                                <h2 class="value mb-0"><?php echo $years_of_experience; ?></h2>
                                <span class="m-0">Years Experiences</span>
                            </div>
                        </div>    
                    </div>

                    <div class="col-lg-3 col-md-6 col-sm-6 mb-4">
                        <div class="counter-item border-end pe-4 d-flex align-items-center">
                            <i class="icon-magnifier bg-theme p-3 rounded me-3 white fs-4"></i>
                            <div class="counter-content">
                                <h2 class="value mb-0"><?php echo $tour_packages; ?></h2>
                                <span class="m-0">Tour Packages</span>
                            </div>
                        </div>    
                    </div>

                    <div class="col-lg-3 col-md-6 col-sm-6 mb-4">
                        <div class="counter-item border-end pe-4 d-flex align-items-center">
                            <i class="icon-user-following bg-theme p-3 rounded me-3 white fs-4"></i>
                            <div class="counter-content">
                                <h2 class="value mb-0"><?php echo $happy_customers; ?></h2>
                                <span class="m-0">Happy Customers</span>
                            </div>
                        </div>    
                    </div>

                    <div class="col-lg-3 col-md-6 col-sm-6 mb-4">
                        <div class="counter-item d-flex align-items-center">
                            <i class="icon-trophy bg-theme p-3 rounded me-3 white fs-4"></i>
                            <div class="counter-content">
                                <h2 class="value mb-0"><?php echo $award_winning; ?></h2>
                                <span class="m-0">Award Winning</span>
                            </div>
                        </div>    
                    </div>
                </div>
            </div> 
        </div>
    </section>
    <!-- End Counter -->