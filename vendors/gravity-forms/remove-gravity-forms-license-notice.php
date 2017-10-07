<?php
/**
* @link              http://thewpleague.com
* @package           WP_POWERUP
*
* @wordpress-plugin
* Plugin Name:       Remove Gravity Forms License Notice
* Plugin URI:        http://thewpleague.com/wp-powerup/
* Description:       The snippet makes it easy to remove the Gravity Forms license notice from the WP Admin plugins page.
* Version:           1.0.0
* Author:            TheWpLeague
* Author URI:        http://thewpleague.com/
*
* https://plugins.trac.wordpress.org/browser/wpspring-remove-gravity-forms-license-notice/trunk/readme.txt
*/

add_action( 'init', 'wpl_remove_gravity_forms_license_notice', 99 );
/**
 * Remove filters for notices
 * @return void
 */
function wpl_remove_gravity_forms_license_notice() {
	if ( is_admin() && class_exists( 'GFForms' ) && null !== RG_CURRENT_PAGE && 'plugins.php' === RG_CURRENT_PAGE ) {

		// Gravity Forms Core
		remove_action( 'after_plugin_row_gravityforms/gravityforms.php', array( 'GFForms', 'plugin_row' ) );

		// Legacy PayPal Pro Add-On
		if ( is_plugin_active( 'gravityformspaypalpro/paypalpro.php' ) ) {
			remove_action( 'after_plugin_row_gravityformspaypalpro/paypalpro.php', array( 'GFPayPalPro', 'plugin_row' ) );
		}

		// Gravity Forms Zapier Add-On
		if ( is_plugin_active( 'gravityformszapier/zapier.php' ) ) {
			remove_action( 'after_plugin_row_gravityformszapier/zapier.php', array( 'GFZapier', 'plugin_row' ) );
		}

		// Gravity Forms Add-Ons
		$plugin_paths_array = array(
			'activecampaign/activecampaign',
			'aweber/aweber',
			'campaignmonitor/campaignmonitor',
			'cleverreach/cleverreach',
			'emma/emma',
			'getresponse/getresponse',
			'icontact/icontact',
			'madmimi/madmimi',
			'mailchimp/mailchimp',
			'agilecrm/agilecrm',
			'authorizenet/authorizenet',
			'batchbook/batchbook',
			'breeze/breeze',
			'campfire/campfire',
			'capsulecrm/capsulecrm',
			'chainedselects/chainedselects',
			'coupons/coupons',
			'dropbox/dropbox',
			'freshbooks/freshbooks',
			'helpscout/helpscout',
			'highrise/highrise',
			'hipchat/hipchat',
			'partialentries/partialentries',
			'paypal/paypal',
			'paypalpaymentspro/paypalpaymentspro',
			'pipe/pipe',
			'polls/polls',
			'quiz/quiz',
			'signature/signature',
			'slack/slack',
			'stripe/stripe',
			'survey/survey',
			'trello/trello',
			'twilio/twilio',
			'userregistration/userregistration',
			'webhooks/webhooks',
			'zohocrm/zohocrm',
		);

		foreach ( $plugin_paths_array as $plugin_path ) {
			if ( is_plugin_active( $plugin_path ) ) {
				wpl_remove_anonymous_object_filter( 'after_plugin_row_gravityforms' . $plugin_path . '.php', 'GFAutoUpgrade', 'rg_plugin_row' );
			}
		}
	}
}

/**
 * Remvove filter
 *
 * @see     https://wordpress.stackexchange.com/questions/57079/how-to-remove-a-filter-that-is-an-anonymous-object/57088#57088
 * @return  void
 */
function wpl_remove_anonymous_object_filter( $tag, $class, $method ) {
	if ( ! isset( $GLOBALS['wp_filter'][ $tag ] ) ) {
		return;
	}

	$filters = $GLOBALS['wp_filter'][ $tag ];
	if ( empty( $filters ) ) {
		return;
	}

	foreach ( $filters as $priority => $filter ) {
		foreach ( $filter as $identifier => $function ) {
			if ( is_array( $function ) and is_a( $function['function'][0], $class ) and $method === $function['function'][1] ) {
				remove_filter( $tag, array( $function['function'][0], $method ), $priority );
			}
		}
	}
}
