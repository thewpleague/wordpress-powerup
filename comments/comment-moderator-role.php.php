<?php
/**
 * @link              http://thewpleague.com
 * @package           WP_POWERUP
 *
 * @wordpress-plugin
 * Plugin Name:       Comment Moderator
 * Plugin URI:        http://thewpleague.com/wp-powerup/
 * Description:       Add a new user role, Comment Moderator, that allows a new user to only manage comments.
 * Version:           1.0.0
 * Author:            TheWpLeague
 * Author URI:        http://thewpleague.com/
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

add_action( 'init', 'wpl_comment_moderator_register_role' );
/**
 * Create new role.
 * @return void
 */
function wpl_comment_moderator_register_role() {

	$role = 'wpl_comment_moderator';
	if ( is_role( $role ) ) {
		return;
	}

	add_role(
		'wpl_comment_moderator',
		esc_html__( 'Comment Moderator' ),
		array(
			'read'				=> true,
			'moderate_comments'	=> true,
			'level_0'			=> true,
		)
	);
}

add_action( 'admin_menu', 'wpl_manage_menu_comment_moderator' );
/**
 * Remove menu according to role.
 * @return void
 */
function wpl_manage_menu_comment_moderator() {
	$user = wp_get_current_user();

	if ( current_user_can( 'wpl_comment_moderator' ) ) {

		remove_menu_page( 'edit.php' );
		remove_menu_page( 'tools.php' );

		$post_types = get_post_types( '', 'names' );

		foreach ( $post_types as $post_type ) {
			remove_menu_page( 'edit.php?post_type=' . $post_type );
		}
	}
}
