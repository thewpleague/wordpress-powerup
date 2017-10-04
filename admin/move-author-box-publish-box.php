<?php
/**
* @link              http://thewpleague.com
* @package           WP_POWERUP
*
* @wordpress-plugin
* Plugin Name:       Move author metabox to publish metabox
* Plugin URI:        http://thewpleague.com/wp-powerup/
* Description:       Adding this snippet will move the author metabox from the bottom of the page into the publish post metabox.
* Version:           1.0.0
* Author:            TheWpLeague
* Author URI:        http://thewpleague.com/
*/

add_action( 'admin_menu', 'wpl_remove_author_metabox' );
/**
 * Remove author metabox
 * @return void
 */
function wpl_remove_author_metabox() {
	remove_meta_box( 'authordiv', 'post', 'normal' );
}

add_action( 'post_submitbox_misc_actions', 'wpl_add_authoe_to_publish_metabox' );
/**
 * Add authorbox to publish metabox
 * @return void
 */
function wpl_add_authoe_to_publish_metabox() {
	global $post_id;
	$post = get_post( $post_id );

	?>
	<div id="author" class="misc-pub-section" style="border-top-style:solid; border-top-width:1px; border-top-color:#EEEEEE; border-bottom-width:0px;">
		<strong>Author: </strong><?php post_author_meta_box( $post ) ?>
	</div>
	<?php
}
