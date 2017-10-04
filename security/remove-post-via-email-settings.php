<?php
/**
* @link              http://thewpleague.com
* @package           WP_POWERUP
*
* @wordpress-plugin
* Plugin Name:       Remove post via email settings
* Plugin URI:        http://thewpleague.com/wp-powerup/
* Description:       The snippet will remove the post by emails settings within the settings menu under writing..
* Version:           1.0.0
* Author:            TheWpLeague
* Author URI:        http://thewpleague.com/
*/

add_filter( 'enable_post_by_email_configuration', '__return_false' );
