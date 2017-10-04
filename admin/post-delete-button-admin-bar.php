<?php
/**
* @link              http://thewpleague.com
* @package           WP_POWERUP
*
* @wordpress-plugin
* Plugin Name:       Add DELETE button to admin bar
* Plugin URI:        http://thewpleague.com/wp-powerup/
* Description:       The snippet let you add a DELETE button to WordPress admin bar.
* Version:           1.0.0
* Author:            TheWpLeague
* Author URI:        http://thewpleague.com/
*/

add_action( 'admin_bar_menu', 'wpl_add_admin_bar_trash_menu', 99 );
function wpl_add_admin_bar_trash_menu() {
	global $wp_admin_bar;

	if ( ! is_super_admin() || ! is_admin_bar_showing() ) {
		return;
	}

	$current_object = get_queried_object();
	if ( empty( $current_object ) ) {
		return;
	}

	if ( ! empty( $current_object->post_type )
		&& ( $post_type_object = get_post_type_object( $current_object->post_type ) )
		&& current_user_can( $post_type_object->cap->edit_post, $current_object->ID )
		&& $post_type_object->show_in_admin_bar
	) {
		$wp_admin_bar->add_menu( array(
			'id' => 'delete',
			'title' => __( 'Move to Trash' ),
			'href' => get_delete_post_link( $current_object->term_id ),
		) );
	}
}
