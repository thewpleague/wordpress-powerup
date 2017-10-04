<?php
/**
* @link              http://thewpleague.com
* @package           WP_POWERUP
*
* @wordpress-plugin
* Plugin Name:       Change the Author Slug URL Base
* Plugin URI:        http://thewpleague.com/wp-powerup/
* Description:       The snippet let you change default URL slug for author to your desired name i.e. profile, member or account.
* Version:           1.0.0
* Author:            TheWpLeague
* Author URI:        http://thewpleague.com/
*/

add_action( 'init', 'wpl_change_author_url_base' );
function wpl_change_author_url_base() {
	global $wp_rewrite;
	$author_slug = 'profile';
	$wp_rewrite->author_base = $author_slug;
}
