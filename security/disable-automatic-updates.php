<?php
/**
 * @link              http://thewpleague.com
 * @package           WP_POWERUP
 *
 * @wordpress-plugin
 * Plugin Name:       Disable WordPress Update
 * Plugin URI:        http://thewpleague.com/wp-powerup/
 * Description:       This snippet let’s you disable WordPress REST API, if you for some reason don’t want to use it.
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

add_filter( 'pre_site_transient_update_core', '__return_null' );
