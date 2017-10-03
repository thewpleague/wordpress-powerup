<?php
/**
 * @link              http://thewpleague.com
 * @package           WP_POWERUP
 *
 * @wordpress-plugin
 * Plugin Name:       Clean your <head> tag
 * Plugin URI:        http://thewpleague.com/wp-powerup/
 * Description:       This snippet let’s you clean your <head> tag from unnecesary metas.
 * Version:           1.0.0
 * Author:            TheWpLeague
 * Author URI:        http://thewpleague.com/
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

// Remove extra feed links
remove_action( 'wp_head', 'feed_links', 2 );
remove_action( 'wp_head', 'feed_links_extra', 3 );

// Remove RSD link
remove_action( 'wp_head', 'rsd_link' );

// Remove wlwmanifest
remove_action( 'wp_head', 'wlwmanifest_link' );

// Remove relational links for the posts adjacent to the current post.
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 );

// Remove meta generator
remove_action( 'wp_head', 'wp_generator' );
add_filter( 'the_generator', '__return_empty_string' );

// Remove shortlink if is defined
remove_action( 'wp_head', 'wp_shortlink_wp_head', 10, 0 );

// Remove index rel link
remove_action( 'wp_head', 'index_rel_link' );

// Remove prev post link
remove_action( 'wp_head', 'parent_post_rel_link', 10, 0 );

// Remove start post link
remove_action( 'wp_head', 'start_post_rel_link', 10, 0 );
