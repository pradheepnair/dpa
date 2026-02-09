<?php
/**
 * Template Name: Home
 *
 * @package     Dubai Private Adventure Theme
 * @author      Pradheep Nair <pradheep.pnair@gmail.com>
 * @since       1.0.0
 */

get_header(); 
get_template_part('parts/home-banner', 'home'); 
get_template_part('parts/home-about', 'home'); 
get_template_part('parts/home-counter', 'home'); 
get_template_part('parts/home-testimonials', 'home'); 
get_template_part('parts/home-faqs', 'home');
get_footer();
?>