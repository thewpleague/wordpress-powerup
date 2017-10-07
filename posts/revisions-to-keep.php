<?php
/**
* @link              http://thewpleague.com
* @package           WP_POWERUP
*
* @wordpress-plugin
* Plugin Name:       Revisions to keep or disable at all
* Plugin URI:        http://thewpleague.com/wp-powerup/
* Description:       This snippet let you save room in your database by disabling or limiting post revisions.
* Version:           1.0.0
* Author:            TheWpLeague
* Author URI:        http://thewpleague.com/
*/

// Disable post revisions entirely.
add_filter( 'wp_revisions_to_keep', '__return_false' );

// If you want to set post revision to specific number
//add_filter( 'wp_revisions_to_keep', 'wpl_wp_revisions_keep_specific', 10, 2 );
/**
 * Specific number of post revisions
 *
 * @param int     $num  Number of revisions to store.
 * @param WP_Post $post Post object.
 *
 * @return init
 */
function wpl_wp_revisions_keep_specific( $num, $post ) {

	// If you want to limit post revision by post type.
	// Uncomment me
	/*if ( 'page' === $post->post_type ) {
		return 2;
	}*/

	return 2;
}

// If you want to set post revision to specific number by post type
//add_filter( 'wp_revisions_to_keep', 'wpl_wp_revisions_keep_by_post_type', 10, 2 );
/**
 * Specific number of post revisions by post type
 *
 * @param int     $num  Number of revisions to store.
 * @param WP_Post $post Post object.
 *
 * @return init
 */
function wpl_wp_revisions_keep_by_post_type( $num, $post ) {

	// If you want to limit post revision by post type.
	if ( 'page' === $post->post_type ) {
		return 2;
	}

	return $num;
}
