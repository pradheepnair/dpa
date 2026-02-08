<?php
/**
 * The footer for our theme.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package     Dubai Private Adventure Theme
 * @author      Pradheep Nair <pradheep.pnair@gmail.com>
 * @since       1.0
 */

 $footer_script = get_option('dpa_script_footer');
?>
<!-- footer starts -->
    <footer class="pt-20 pb-4"  style="background-image: url(<?php echo DPA_THEME_URI; ?>/assets/images/bg/bg-footer.png);background-size:cover;">
        <div class="section-shape top-0" style="background-image: url(<?php echo DPA_THEME_URI; ?>/assets/images/shapes/shape8.png);"></div> 
        <div class="footer-upper pb-4">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-6 col-sm-12 mb-4 pe-4">
                        <div class="footer-about">
                            <img src="<?php echo esc_url(get_theme_mod('site_logo_alt')); ?>" alt="<?php echo get_option('blogname'); ?>" width="140" />

                            <p class="mt-3 mb-3 white">
                                <?php echo get_option('dpa_footer_bio_text'); ?>
                            </p>
                            <ul>
                                <li class="white"><strong>Call:</strong> <a href="tel:<?php echo get_option('dpa_general_mobile'); ?>"><?php echo get_option('dpa_general_mobile'); ?></a></li> 
                                <li class="white"><strong>Email:</strong> <a href="mailto:<?php echo get_option('dpa_general_email'); ?>"><?php echo get_option('dpa_general_email'); ?></a></li> 
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                        <div class="footer-links">
                            <h3 class="white">Quick links</h3>
                            <?php wp_nav_menu( array('theme_location' => 'quick-links', 'menu_class' => '')); ?>  
                        </div>
                    </div> 
                    <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                        <div class="footer-links">
                            <h3 class="white">Newsletter</h3>
                            <div class="newsletter-form ">
                                <p class="mb-3">Join our community of over 200,000 global readers who receives emails filled with news, promotions, and other good stuff.</p>
                                <form action="#" method="get" accept-charset="utf-8" class="border-0 d-flex align-items-center">
                                    <input type="text" placeholder="Email Address">
                                    <button class="nir-btn ms-2">Subscribe</button>
                                </form>
                            </div> 
                        </div>  
                    </div>
                </div>
            </div>
        </div>

        <div class="footer-payment">
            <div class="container">
                <div class="row footer-pay align-items-center justify-content-between text-lg-start text-center">
                    <div class="col-lg-8 footer-payment-nav mb-4">
                        <ul class="">
                            <li class="me-2">We accept:</li>
                            <li class="me-2"><i class="fab fa-cc-mastercard fs-4"></i></li>
                            <li class="me-2"><i class="fab fa-cc-paypal fs-4"></i></li>
                            <li class="me-2"><i class="fab fa-cc-stripe fs-4"></i></li>
                            <li class="me-2"><i class="fab fa-cc-visa fs-4"></i></li>
                            <li class="me-2"><i class="fab fa-cc-discover fs-4"></i></li>
                        </ul>
                    </div> 
                </div>    
            </div>
        </div>
        <?php 
            $social_handle_fb = get_option('dpa_social_fb');
            $social_handle_ig = get_option('dpa_social_ig');
            $social_handle_tw = get_option('dpa_social_tw');
            $social_handle_yt = get_option('dpa_social_yt');
            $social_handle_li = get_option('dpa_social_li'); 
            $copyright_text = get_option('dpa_copyright_text');
        ?>
        <div class="footer-copyright">
            <div class="container">
                <div class="copyright-inner rounded p-3 d-md-flex align-items-center justify-content-between">
                    <div class="copyright-text">
                        <p class="m-0 white"><?php echo $copyright_text; ?></p>
                    </div>
                    <div class="social-links">
                        <ul>
                            <?php if (trim($social_handle_fb)) { ?>
                                <li><a href="<?php echo esc_url($social_handle_fb); ?>" target="_blank"><i class="fab fa-facebook" aria-hidden="true"></i></a></li>
                            <?php } ?>
                            <?php if (trim($social_handle_tw)) { ?>
                                <li><a href="<?php echo esc_url($social_handle_tw); ?>" target="_blank"><i class="fab fa-twitter" aria-hidden="true"></i></a></li>
                            <?php } ?>
                            <?php if (trim($social_handle_ig)) { ?>
                                <li><a href="<?php echo esc_url($social_handle_ig); ?>" target="_blank"><i class="fab fa-instagram" aria-hidden="true"></i></a></li>
                            <?php } ?>
                            <?php if (trim($social_handle_li)) { ?>
                                <li><a href="<?php echo esc_url($social_handle_li); ?>" target="_blank"><i class="fab fa-linkedin" aria-hidden="true"></i></a></li>
                            <?php } ?>
                            <?php if (trim($social_handle_yt)) { ?>
                                <li><a href="<?php echo esc_url($social_handle_yt); ?>" target="_blank"><i class="fab fa-youtube" aria-hidden="true"></i></a></li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>    
            </div>
        </div>
        <div id="particles-js"></div>
    </footer>
    <!-- footer ends -->
    
    <!-- Back to top start -->
    <div id="back-to-top">
        <a href="#"></a>
    </div>
    <!-- Back to top ends --> 
    
    <div style="display:none">
        <div id="popupWin" class="dpa_popup">Here</div> 
    </div>
<?php wp_footer(); ?>
<?php echo $footer_script; ?>
</body>
</html>