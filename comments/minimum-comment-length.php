<?php
/**
 * @link              http://thewpleague.com
 * @package           WP_POWERUP
 *
 * @wordpress-plugin
 * Plugin Name:       Require Minimum Comment Length
 * Plugin URI:        http://thewpleague.com/wp-powerup/
 * Description:       The snippet allow you to have a minimum length for comment.
 * Version:           1.0.0
 * Author:            TheWpLeague
 * Author URI:        http://thewpleague.com/
 *
 * A good way to tackle spam and encourage better comments is to apply a minimum length for comments. This helps stop small irrelevant comments such as “Great post” and “Thanks!”.
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

add_filter( 'preprocess_comment', 'wpl_minimal_comment_length' );
/**
 * Require minium length
 * @param  array $commentdata
 * @return array
 */
function wpl_minimal_comment_length( $commentdata ) {

	$min_length = 20;
	if ( strlen( trim( $commentdata['comment_content'] ) ) < $min_length ) {
		wp_die( 'All comments must be at least ' . $min_length . ' characters long.' );
	}

	return $commentdata;
}
