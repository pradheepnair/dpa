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

?>
<!-- footer starts -->
    <footer class="pt-20 pb-4"  style="background-image: url(<?php echo DPA_THEME_URI; ?>/assets/images/bg/bg-footer.png);background-size:cover;">
        <div class="section-shape top-0" style="background-image: url(<?php echo DPA_THEME_URI; ?>/assets/images/shapes/shape8.png);"></div> 
        <div class="footer-upper pb-4">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-6 col-sm-12 mb-4 pe-4">
                        <div class="footer-about">
                            <img src="<?php echo DPA_THEME_URI; ?>/assets/images/logo-white.svg" alt="" width="140">
                            <p class="mt-3 mb-3 white">
                                Welcome to Dubai Private Adventure, your one-stop shop for all your Desert Safari and Sightseeing needs. Our team of experienced and authorized guides, drivers, and support staffs are dedicated to making sure that every customer has a memorable experience.
                            </p>
                            <ul>
                                <li class="white"><strong>Call:</strong> +971 581113485</li> 
                                <li class="white"><strong>Email:</strong> info@dubaiprivateadventure.com</li> 
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

        <div class="footer-copyright">
            <div class="container">
                <div class="copyright-inner rounded p-3 d-md-flex align-items-center justify-content-between">
                    <div class="copyright-text">
                        <p class="m-0 white">© 2023 - D P A TRAVEL & TOURISM L.L.C. Dubai. (License No: DXB 829951) All Rights Reserved.</p>
                    </div>
                    <div class="social-links">
                        <ul>  
                            <li><a href="https://www.facebook.com/dubaiprivateadventure/" target="_blank"><i class="fab fa-facebook" aria-hidden="true"></i></a></li>
                            <li><a href="https://twitter.com/dubaiprivate/" target="_blank"><i class="fab fa-twitter" aria-hidden="true"></i></a></li>
                            <li><a href="https://www.instagram.com/dubaiprivateadventure/" target="_blank"><i class="fab fa-instagram" aria-hidden="true"></i></a></li>
                            <li><a href="https://www.linkedin.com/company/dubai-private-adventure" target="_blank"><i class="fab fa-linkedin" aria-hidden="true"></i></a></li>
                            <li><a href="https://www.youtube.com/@dubaiprivateadventure" target="_blank"><i class="fab fa-youtube" aria-hidden="true"></i></a></li>
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
</body>
</html>