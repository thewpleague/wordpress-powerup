<?php
/**
 * @link              http://thewpleague.com
 * @package           WP_POWERUP
 *
 * @wordpress-plugin
 * Plugin Name:       Remove class and ID’s from Custom Menus
 * Plugin URI:        http://thewpleague.com/wp-powerup/
 * Description:       This snippet let’s you remove id's and classes from menus.
 * Version:           1.0.0
 * Author:            TheWpLeague
 * Author URI:        http://thewpleague.com/
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

add_filter( 'nav_menu_item_id', '__return_null', 99 );
add_filter( 'nav_menu_css_class', 'wpl_nav_filter_css_attributes', 100, 1 );
add_filter( 'page_css_class', 'wpl_nav_filter_css_attributes', 100, 1 );
/**
 * Filter attributes
 * @param  array $classes
 * @return array
 */
function wpl_nav_filter_css_attributes( $classes ) {
	return is_array( $classes ) ? array_intersect( $classes, array( 'current-menu-item' ) ) : '';
}
