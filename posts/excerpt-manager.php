<?php
/**
* @link              http://thewpleague.com
* @package           WP_POWERUP
*
* @wordpress-plugin
* Plugin Name:       Make excerpt better
* Plugin URI:        http://thewpleague.com/wp-powerup/
* Description:       The snippet allows you to make your excerpt better thorughout the website.
* Version:           1.0.0
* Author:            TheWpLeague
* Author URI:        http://thewpleague.com/
*/

add_filter( 'excerpt_length', 'wpl_excerpt_length' );
function wpl_excerpt_length( $length ) {
	return 100;
}
