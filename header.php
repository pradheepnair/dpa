<?php
/**
 * The header for our theme.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package     Dubai Private Adventure Theme
 * @author      Pradheep Nair <pradheep.pnair@gmail.com>
 * @since       1.0
 * Domain Path: /languages/
 */
 global $wp; 
 $header_script = get_option('dpa_script_header');
 $body_script = get_option('dpa_script_body');
?>
<!doctype html>
<html xml:lang="en" lang="en" dir="ltr" itemscope itemtype="http://schema.org/WebPage">
<head>
  	<title><?php echo get_the_title(); ?> | <?php echo get_option('blogname'); ?></title>
  	<meta charset="<?php bloginfo( 'charset' ); ?>">  
  	<meta name="viewport" content="width=device-width, initial-scale=1"> 
  	<meta name="description" content="Create lifelong memories with our immersive tours across UAE. We provide the best Dubai private tours, and desert safari services" /> 
	<link rel="canonical" href="<?php echo DPA_THEME_URI; ?>" />
	<meta property="og:locale" content="en_US" />
	<meta property="og:type" content="website" />
	<meta property="og:title" content="Dubai Private Adventure - Experience the magic of UAE with our unforgettable tours" />
	<meta property="og:description" content="Create lifelong memories with our immersive tours across UAE. We provide the best Dubai private tours, and desert safari services" />
	<meta property="og:url" content="<?php echo DPA_THEME_URI; ?>" />
	<meta property="og:site_name" content="Dubai Private Adventure - Experience the magic of UAE with our unforgettable tours" />
	<meta property="article:modified_time" content="2023-06-22T05:13:56+00:00" />
	<meta property="og:image" content="<?php echo DPA_THEME_URI; ?>/assets/images/2023/tours/popular/desert-safari.jpg" />
	<meta name="twitter:card" content="summary_large_image" />

	<link rel="shortcut icon" type="image/x-icon" href="<?php echo get_site_icon_url(); ?>"> 
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

	<?php wp_head(); ?>
	<?php echo $header_script; ?>
</head>
<body>
<?php echo $body_script; ?> 
    <!-- header starts -->
    <header class="main_header_area">
        <!-- Navigation Bar -->
        <div class="header_menu" id="header_menu">
            <nav class="navbar navbar-default">
                <div class="container">
                    <div class="navbar-flex d-flex align-items-center justify-content-between w-100 pb-3 pt-3">
                        <!-- Brand and toggle get grouped for better mobile display -->
                        <div class="navbar-header">
                            <a class="navbar-brand" href="<?php echo DPA_THEME_URI; ?>">
                                <img src="<?php echo esc_url(get_theme_mod('site_logo')); ?>" alt="Dubai Private Adventure" class="logo-image">
                            </a>
                        </div>

						<!-- Collect the nav links, forms, and other content for toggling -->
                        <div class="navbar-collapse1 d-flex align-items-center" id="bs-example-navbar-collapse-1">
							<?php wp_nav_menu( array('theme_location' => 'main-nav', 'menu_class' => 'nav navbar-nav')); ?> 
                        </div><!-- /.navbar-collapse -->    
                        <div class="register-login d-flex align-items-center"> 
                            <a href="#"  class="nir-btn white btn_action">Book Now</a>
                        </div> 

                        <div id="slicknav-mobile"></div>
					</div>
				</div>
			</nav>
		</div>
        <!-- Navigation Bar Ends -->
    </header>
    <!-- header ends -->
 