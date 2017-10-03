<?php
/**
 * @link              http://thewpleague.com
 * @package           WP_POWERUP
 *
 * @wordpress-plugin
 * Plugin Name:       Disable JSON Rest API
 * Plugin URI:        http://thewpleague.com/wp-powerup/
 * Description:       This snippet let’s you disable WordPress REST API, if you for some reason don’t want to use it.
 * Version:           1.0.0
 * Author:            TheWpLeague
 * Author URI:        http://thewpleague.com/
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

// @codingStandardsIgnoreStart

// WordPress 4.7+ disables the REST API via authentication short-circuit.
if ( version_compare( get_bloginfo( 'version' ), '4.7', '>=' ) ) {

	add_filter( 'rest_authentication_errors', 'wpl_disable_rest_api' );
	/**
	 * [wpl_disable_rest_api description]
	 * @param  null|bool|WP_Error $access
	 *         null if authentication method wasn't used
	 *         true if authentication succeeded.
	 *         false if authentication failed.
	 *         WP_Error if authentication error,
	 * @return null|bool|WP_Error
	 */
	function wpl_disable_rest_api( $access ) {
		return new WP_Error( 'rest_disabled', __( 'The REST API on this site has been disabled.' ), array( 'status' => rest_authorization_required_code() ) );
	}

// WordPress < 4.7, disable the REST API via filters
} else {

	// Filters for WP-API version 1.x
	add_filter( 'json_enabled', '__return_false' );
	add_filter( 'json_jsonp_enabled', '__return_false' );

	// Filters for WP-API version 2.x
	add_filter( 'rest_enabled', '__return_false' );
	add_filter( 'rest_jsonp_enabled', '__return_false' );
}

// @codingStandardsIgnoreEnd

// Remove REST API info from head and headers
remove_action( 'xmlrpc_rsd_apis', 'rest_output_rsd' );
remove_action( 'wp_head', 'rest_output_link_wp_head', 10 );
remove_action( 'template_redirect', 'rest_output_link_header', 11 );

// Switching off REST API filters
remove_action( 'auth_cookie_malformed', 'rest_cookie_collect_status' );
remove_action( 'auth_cookie_expired', 'rest_cookie_collect_status' );
remove_action( 'auth_cookie_bad_username', 'rest_cookie_collect_status' );
remove_action( 'auth_cookie_bad_hash', 'rest_cookie_collect_status' );
remove_action( 'auth_cookie_valid', 'rest_cookie_collect_status' );
remove_filter( 'rest_authentication_errors', 'rest_cookie_check_errors', 100 );

// Switching off REST API events
remove_action( 'init', 'rest_api_init' );
remove_action( 'rest_api_init', 'rest_api_default_filters', 10, 1 );
remove_action( 'parse_request', 'rest_api_loaded' );

// Switching off Embeds mixed up with REST API
remove_action( 'rest_api_init', 'wp_oembed_register_route' );
remove_filter( 'rest_pre_serve_request', '_oembed_rest_pre_serve_request', 10, 4 );

remove_action( 'wp_head', 'wp_oembed_add_discovery_links' );
