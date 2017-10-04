<?php
/**
* @link              http://thewpleague.com
* @package           WP_POWERUP
*
* @wordpress-plugin
* Plugin Name:       Remove "private" and "protected" from the post title
* Plugin URI:        http://thewpleague.com/wp-powerup/
* Description:       Each time you define a specific post as being private or password-protected, WordPress automatically add "Private" or "Protected" to your blog post title. This snippet let you remove that.
* Version:           1.0.0
* Author:            TheWpLeague
* Author URI:        http://thewpleague.com/
*/

add_filter( 'the_title', 'wpl_remove_labels_from_title' );
/**
 * Remove defind labels from post title
 * @param  string $title
 * @return string
 */
function wpl_remove_labels_from_title( $title ) {

	$find_these = array(
		'#Protected:#',
		'#Private:#',
	);
	$replace_with = array(
		'', // What to replace "Protected:" with
		'', // What to replace "Private:" with
	);

	$title = attribute_escape( $title );
	$title = preg_replace( $find_these, $replace_with, $title );

	return $title;
}
