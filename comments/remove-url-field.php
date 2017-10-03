<?php
/**
 * @link              http://thewpleague.com
 * @package           WP_POWERUP
 *
 * @wordpress-plugin
 * Plugin Name:       Remove the URL Field from Comment Form
 * Plugin URI:        http://thewpleague.com/wp-powerup/
 * Description:       The snippet allow you to remove url field from comment form.
 * Version:           1.0.0
 * Author:            TheWpLeague
 * Author URI:        http://thewpleague.com/
 *
 * Marking comments that have very long URLs in the website field will help you tackle spammers. However, if you find that spam is getting out of control, you may want to consider removing the website URL field altogether.
 * If you implement the snippet below and configure your WordPress discussion settings so that any comment with a link is held for moderation; you can effectively stop all spam entirely.
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

add_filter( 'comment_form_default_fields', 'wpl_comment_remove_url_field' );
/**
 * Remove url field
 * @param  array $fields
 * @return array
 */
function wpl_comment_remove_url_field( $fields ) {
	unset( $fields['url'] );
	return $fields;
}
