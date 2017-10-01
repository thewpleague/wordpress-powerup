<?php
/**
 * @link              http://thewpleague.com
 * @package           WP_POWERUP
 *
 * @wordpress-plugin
 * Plugin Name:       Change WordPress Mail From and Name
 * Plugin URI:        http://thewpleague.com/wp-powerup/
 * Description:       This snippet will change from name and email address of emails sent from WordPress.
 * Version:           1.0.0
 * Author:            TheWpLeague
 * Author URI:        http://thewpleague.com/
 */

add_filter( 'wp_mail_from', 'wpl_mail_from' );
/**
 * Email addres to send from.
 *
 * @param	string	$from_email	Email address to send from.
 * @return	string
 */
function wpl_mail_from( $from_email ) {
	return 'info@thewpleague.com';
}

add_filter( 'wp_mail_from_name', 'wpl_mail_from_name' );
/**
 * Name to associate with the "from" email addres.
 *
 * @param	string	$from_name	Email address to send from.
 * @return	string
 */
function wpl_mail_from_name( $from_name ) {
	return 'The WordPress League';
}
