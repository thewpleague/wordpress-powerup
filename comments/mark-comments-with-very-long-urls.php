<?php
/**
 * @link              http://thewpleague.com
 * @package           WP_POWERUP
 *
 * @wordpress-plugin
 * Plugin Name:       Mark Comments with Very Long URLs as Spam
 * Plugin URI:        http://thewpleague.com/wp-powerup/
 * Description:       The snippet below allows you to mark a comment as spam that has a website URL over 50 characters.
 * Version:           1.0.0
 * Author:            TheWpLeague
 * Author URI:        http://thewpleague.com/
 *
 * Spammers frequently link to web pages with very long URLs. Therefore, if someone publishes a comment and enters a long URL in the website field, there is a high chance that the comment was published by a spammer.
 * The snippet below allows you to mark a comment as spam that has a website URL over 50 characters. You can increase or decrease this limit to suit your own needs.
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

add_filter( 'pre_comment_approved', 'wpl_check_spam_url', 99, 2 );
/**
 * Url spam checker
 * @param  string $approved
 * @param  array $commentdata
 * @return string
 */
function wpl_check_spam_url( $approved, $commentdata ) {
	return ( strlen( $commentdata['comment_author_url'] ) > 50 ) ? 'spam' : $approved;
}
