<?php
/**
 * @link              http://thewpleague.com
 * @package           WP_POWERUP
 *
 * @wordpress-plugin
 * Plugin Name:       Obscure Login Error Messages
 * Plugin URI:        http://thewpleague.com/wp-powerup/
 * Description:       This snippet don't people know which is incorrect: the username or password.
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

add_filter( 'login_errors', 'wpl_obscure_login_errors' );
/**
 * Obsure login errors.
 * @return html
 */
function wpl_obscure_login_errors() {
	return '<strong>Sorry</strong>: Think you have gone wrong somwhere!';
}
