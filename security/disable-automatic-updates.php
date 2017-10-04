<?php
/**
 * @link              http://thewpleague.com
 * @package           WP_POWERUP
 *
 * @wordpress-plugin
 * Plugin Name:       Disable WordPress Update
 * Plugin URI:        http://thewpleague.com/wp-powerup/
 * Description:       This snippet let’s you disable all automatic updates of WordPress core, themes, plugins, translations.
 * Version:           1.0.0
 * Author:            TheWpLeague
 * Author URI:        http://thewpleague.com/
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

// Core
add_filter( 'automatic_updater_disabled', '__return_true' );
add_filter( 'auto_update_core', '__return_false' );
add_filter( 'allow_minor_auto_core_updates', '__return_false' );
add_filter( 'allow_major_auto_core_updates', '__return_false' );
add_filter( 'allow_dev_auto_core_updates', '__return_false' );

// Plugins
add_filter( 'auto_update_plugin', '__return_false' );

// Thems
add_filter( 'auto_update_theme', '__return_false' );

// Translation
add_filter( 'auto_update_translation', '__return_false' );

// Update emails
add_filter( 'auto_core_update_send_email', '__return_false' );
add_filter( 'send_core_update_notification_email', '__return_false' );
add_filter( 'automatic_updates_send_debug_email', '__return_false' );
add_filter( 'automatic_updates_is_vcs_checkout', '__return_true' );
