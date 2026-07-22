<?php
/**
 * Filters that modify markup/output produced by WordPress core
 * (body_class, excerpt length, etc.). For new template tags, use
 * template-tags.php instead.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Add custom classes to the array of body classes.
 */
function konda_maloba_body_classes( $classes ) {

	// TODO: add classes for page templates, front page sections, etc.

	return $classes;
}
add_filter( 'body_class', 'konda_maloba_body_classes' );

/**
 * Add a pingback url auto-discovery header.
 */
function konda_maloba_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">' . "\n", esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'konda_maloba_pingback_header' );
