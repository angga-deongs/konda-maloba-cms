<?php
/**
 * Baseline security/hardening tweaks that are safe defaults for most
 * brochure/company-profile sites. Review before enabling anything that
 * affects functionality (e.g. disabling XML-RPC, REST user endpoints).
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Remove the WordPress version number from head, RSS, and script/style URLs.
 */
function konda_maloba_remove_version_info() {
	return '';
}
add_filter( 'the_generator', 'konda_maloba_remove_version_info' );

// TODO: consider disabling XML-RPC (add_filter('xmlrpc_enabled', '__return_false'))
// and restricting the REST API user endpoint once requirements are confirmed —
// both can break legitimate integrations (Jetpack, mobile app, etc.) if
// disabled blindly.
