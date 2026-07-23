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

/**
 * Comments are not used on this site and were a recurring spam vector on
 * the previous one. Disabled at every layer below (not just hidden in the
 * UI) since spam bots post directly to wp-comments-post.php and the REST
 * API, bypassing any front-end form entirely.
 *
 * To turn comments back on later, reverse each piece:
 *   1. Delete/comment-out konda_maloba_disable_comment_support() below.
 *   2. Delete/comment-out the comments_open / pings_open filters below.
 *   3. Delete/comment-out konda_maloba_disable_rest_comments() below.
 *   4. Delete/comment-out konda_maloba_remove_comments_menu() above.
 *   5. Delete/comment-out konda_maloba_remove_admin_bar_comments() below.
 *   6. Re-check comment_status is "Open" on the posts/pages you want
 *      commentable (bulk edit) — closing it was step 2's side effect.
 *   7. Optionally delete/comment-out konda_maloba_disable_xmlrpc_pingback()
 *      below if you also want pingbacks/trackbacks back (unrelated to the
 *      other steps — safe to leave this one alone).
 */

/**
 * Hide the Comments menu in wp-admin — this site doesn't use comments.
 */
function konda_maloba_remove_comments_menu() {
	remove_menu_page( 'edit-comments.php' );
}
add_action( 'admin_menu', 'konda_maloba_remove_comments_menu' );

/**
 * Remove comment/trackback support from built-in post types. The custom
 * post types in custom-post-types.php (property, activity) never declared
 * comments support, so there's nothing to remove there.
 */
function konda_maloba_disable_comment_support() {
	remove_post_type_support( 'post', 'comments' );
	remove_post_type_support( 'post', 'trackbacks' );
	remove_post_type_support( 'page', 'comments' );
	remove_post_type_support( 'page', 'trackbacks' );
}
add_action( 'init', 'konda_maloba_disable_comment_support', 100 );

/**
 * Belt-and-braces: force comments/pings closed even if support gets
 * re-added above, or an existing post still has comment_status = open.
 * This also silently blocks the <link rel="pingback"> tag and X-Pingback
 * HTTP header (both core-gated on pings_open()), so nothing else needs
 * to change for those.
 */
add_filter( 'comments_open', '__return_false', 20 );
add_filter( 'pings_open', '__return_false', 20 );

/**
 * Block the REST API comments endpoint — spam bots can POST straight to
 * /wp-json/wp/v2/comments, skipping the comment form (and the filters
 * above) entirely.
 */
function konda_maloba_disable_rest_comments( $endpoints ) {
	foreach ( $endpoints as $route => $handlers ) {
		if ( 0 === strpos( $route, '/wp/v2/comments' ) ) {
			unset( $endpoints[ $route ] );
		}
	}
	return $endpoints;
}
add_filter( 'rest_endpoints', 'konda_maloba_disable_rest_comments' );

/**
 * Remove the comment bubble/count from the admin bar.
 */
function konda_maloba_remove_admin_bar_comments( $wp_admin_bar ) {
	$wp_admin_bar->remove_node( 'comments' );
}
add_action( 'admin_bar_menu', 'konda_maloba_remove_admin_bar_comments', 999 );

/**
 * Remove only the pingback XML-RPC methods (the actual comment-spam
 * vector) instead of disabling XML-RPC outright — a full xmlrpc_enabled
 * => false would also break legitimate integrations (Jetpack, remote
 * publishing clients), which the TODO this replaced had warned about.
 */
function konda_maloba_disable_xmlrpc_pingback( $methods ) {
	unset( $methods['pingback.ping'] );
	unset( $methods['pingback.extensions.getPingbacks'] );
	return $methods;
}
add_filter( 'xmlrpc_methods', 'konda_maloba_disable_xmlrpc_pingback' );
