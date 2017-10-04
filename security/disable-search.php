<?php
/**
* @link              http://thewpleague.com
* @package           WP_POWERUP
*
* @wordpress-plugin
* Plugin Name:       Disable wordpress search
* Plugin URI:        http://thewpleague.com/wp-powerup/
* Description:       The snippet will disable wordpress search functionality.
* Version:           1.0.0
* Author:            TheWpLeague
* Author URI:        http://thewpleague.com/
*/

if ( ! is_admin() ) {

	add_action( 'parse_query', 'wpl_disable_search_filter_query' );
	/**
	 * Disable search
	 * @param  WP_Query  $query
	 */
	function wpl_disable_search_filter_query( $query ) {
		if ( is_search() ) {
			unset( $_GET['s'], $_POST['s'], $_REQUEST['s'], $query->query['s'] );
			$query->set( 's', false );
			$query->is_search = false;
			$query->set_404();
			status_header( 404 );
			nocache_headers();
		}
	}

	// Disable search form
	add_filter( 'get_search_form', '__return_null' );

	// Remove search widget
	add_action( 'widgets_init', function() {
		unregister_widget( 'WP_Widget_Search' );
	}, 1 );

}
