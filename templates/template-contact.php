<?php
/**
 * Template Name: Contact Us
 *
 * @package     Dubai Private Adventure Theme
 * @author      Pradheep Nair <pradheep.pnair@gmail.com>
 * @since       1.0.0
 */

global $wp_query; 
get_header(); 
$contact_image_url = get_the_post_thumbnail_url($post->ID, 'full');
?>
    <!-- BreadCrumb Starts -->  
    <section class="breadcrumb-main pb-20 pt-14" style="background-image: url(<?php echo $contact_image_url; ?>);">
        <div class="section-shape section-shape1 top-inherit bottom-0" style="background-image: url(<?php echo DPA_THEME_URI; ?>/assets/images/shapes/shape8.png);"></div>
        <div class="breadcrumb-outer">
            <div class="container">
                <div class="breadcrumb-content text-center">
                    <h1 class="mb-3">Contact Us</h1>
                    <nav aria-label="breadcrumb" class="d-block">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo get_home_url(); ?>">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Contact Us</li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        <div class="dot-overlay"></div>
    </section>
    <!-- BreadCrumb Ends --> 

    <!-- contact starts -->
    <section class="contact-main pt-6 pb-60">
        <div class="container">
            <div class="contact-info-main mt-0">
                <div class="row">
                    <div class="col-lg-10 col-offset-lg-1 mx-auto">
                        <div class="contact-info bg-white">
                            <div class="contact-info-title text-center mb-4 px-5">
                                <?php echo $post->post_content; ?> 
                            </div>
                            <div class="contact-info-content row mb-1">
                                <div class="col-lg-4 col-md-6 mb-4">
                                    <div class="info-item bg-lgrey px-4 py-5 border-all text-center rounded">
                                        <div class="info-icon mb-2">
                                            <i class="fa fa-map-marker-alt theme"></i>
                                        </div>
                                        <div class="info-content">
                                            <h3>Office Location</h3>
                                            <p class="m-0"><?php echo get_option('dpa_general_address'); ?></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 mb-4">
                                    <div class="info-item bg-lgrey px-4 py-5 border-all text-center rounded">
                                        <div class="info-icon mb-2">
                                            <i class="fa fa-phone theme"></i>
                                        </div>
                                        <div class="info-content">
                                            <h3>Phone Number</h3>
                                            <p class="m-0"><a href="tel:<?php echo get_option('dpa_general_mobile'); ?>"><?php echo get_option('dpa_general_mobile'); ?></a></p> 
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-12 mb-4">
                                    <div class="info-item bg-lgrey px-4 py-5 border-all text-center rounded">
                                        <div class="info-icon mb-2">
                                            <i class="fa fa-envelope theme"></i>
                                        </div>
                                        <div class="info-content ps-4">
                                            <h3>Email Address</h3>
                                            <p class="m-0"><a href="mailto:<?php echo get_option('dpa_general_email'); ?>"><?php echo get_option('dpa_general_email'); ?></a></p> 
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="contact-form1" class="contact-form">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="map rounded overflow-hiddenb rounded mb-md-4">
                                            <div style="width: 100%">
                                                <iframe src="<?php echo get_option('dpa_general_google_location'); ?>" width="100%" height="460" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
    <div class="d5_form d5_form-alt">
        <form method="post">
            <div class="row"> 
                <div class="col-md-6">
                    <fieldset class="required" data-message="required">
                        <label>First name</label> 
                        <input id="dpa_contact_first_name" name="dpa_contact_first_name" data-id="contact_first_name" class="input alpha" maxlength="50" type="text" placeholder="Enter your first name" value="">
                    </fieldset>
                </div>
                <div class="col-md-6">
                    <fieldset class="required" data-message="required">
                        <label>Last name</label> 
                        <input id="dpa_contact_last_name" name="dpa_contact_last_name" data-id="contact_last_name" class="input alpha" maxlength="50" type="text" placeholder="Enter your last name" value="">
                    </fieldset>
                </div>
            </div>
            <div class="row">  
                <div class="col-md-12">
                    <fieldset class="required" data-message="required">
                        <label>Email address</label> 
                        <input id="dpa_contact_email" name="dpa_contact_email" data-id="contact_email" class="input email" maxlength="150" type="text" placeholder="eg: name@website.com" value="">
                    </fieldset>
                </div>
            </div>
            <div class="row">  
                <div class="col-md-12">
                    <fieldset class="required" data-message="required">
                        <label>Mobile number</label> 
                        <input id="dpa_contact_mobile" name="dpa_contact_mobile" data-id="contact_mobile" class="input num" maxlength="20" type="text" placeholder="eg: 971581113485" value="">
                    </fieldset>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <fieldset data-message="required">
                        <label>Message</label> 
                        <textarea id="dpa_contact_message" name="dpa_contact_message" data-id="contact_message" class="input alpha" rows="3" placeholder="Enter your message here"></textarea>
                        <span class="helper">Mention feedback, complaints, suggestions, etc</span>
                    </fieldset>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <fieldset>
                        <a data-id="0" data-action="contact_submit" class="nir-btn white btn_action">Submit</a>
                    </fieldset>
                </div>
            </div>
        </form>
        <div class="d5_message"></div>
    </div>
                                         
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- contact Ends -->
<?php
get_footer();
?> 