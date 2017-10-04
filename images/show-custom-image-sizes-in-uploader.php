<?php
/**
 * @link              http://thewpleague.com
 * @package           WP_POWERUP
 *
 * @wordpress-plugin
 * Plugin Name:       Show Custom Image Sizes in Admin Media Uploader
 * Plugin URI:        http://thewpleague.com/wp-powerup/
 * Description:       This snippet let’s you show additional sizes in the media uploader.
 * Version:           1.0.0
 * Author:            TheWpLeague
 * Author URI:        http://thewpleague.com/
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

add_filter( 'image_size_names_choose', 'wpl_show_image_sizes', 11, 1 );
/**
 * Show image sizes to choose
 * @param  array $sizes
 * @return array
 */
function wpl_show_image_sizes( $sizes ) {
	$new_sizes = array();
	$added_sizes = get_intermediate_image_sizes();

	// $added_sizes is an indexed array, therefore need to convert it
	// to associative array, using $value for $key and $value
	foreach ( $added_sizes as $key => $value ) {
		$new_sizes[ $value ] = $value;
	}

	// This preserves the labels in $sizes, and merges the two arrays
	$new_sizes = array_merge( $new_sizes, $sizes );

	return $new_sizes;
}
