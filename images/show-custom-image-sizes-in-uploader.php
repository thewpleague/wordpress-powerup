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
 *
 * To secure that your client doesn’t mess up the theme you created for him by updating to a WP-version your theme doesn’t have support for, just add this to disable WordPress Update function.
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

function show_image_sizes( $sizes ) {
    $new_sizes = array();
    $added_sizes = get_intermediate_image_sizes();

    // $added_sizes is an indexed array, therefore need to convert it
    // to associative array, using $value for $key and $value
    foreach( $added_sizes as $key => $value) {
        $new_sizes[$value] = $value;
    }

    // This preserves the labels in $sizes, and merges the two arrays
    $new_sizes = array_merge( $new_sizes, $sizes );

    return $new_sizes;
}
add_filter('image_size_names_choose', 'show_image_sizes', 11, 1);
