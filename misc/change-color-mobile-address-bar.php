<?php
/**
* @link              http://thewpleague.com
* @package           WP_POWERUP
*
* @wordpress-plugin
* Plugin Name:       Mobile address bar color changer
* Plugin URI:        http://thewpleague.com/wp-powerup/
* Description:       The snippet below allows you to change color of mobile browser address bar.
* Version:           1.0.0
* Author:            TheWpLeague
* Author URI:        http://thewpleague.com/
*/

// Chrome, Firefox OS, Opera and Vivaldi
add_action( 'wp_head', function() {
	echo '<meta name="theme-color" content="#ff0">';
});
