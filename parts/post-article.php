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

global $wp_query; 
$post = $wp_query->post; 
$page = get_page_by_path('blogs', OBJECT, 'page'); 
if(!$page) {
    wp_redirect(home_url()); 
    exit;
}
$page_title = $page->post_title;
$page_url = get_permalink($page->ID);
$tour_title = $post->post_title;
$page_image_url = get_field('header_image', $post->ID);
$duration = get_field('duration', $post->ID);
?>