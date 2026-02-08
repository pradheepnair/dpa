<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Dubai Private Adventure Theme
 * @author Pradheep Nair <pradheep.pnair@gmail.com>
 * @subpackage V1
 * @since 1.0
 */

get_header();

// Tour
if (is_single() && get_post_type() == 'speaker') { 
    get_template_part('parts/post-tour', 'post');
} 

get_footer();
?>