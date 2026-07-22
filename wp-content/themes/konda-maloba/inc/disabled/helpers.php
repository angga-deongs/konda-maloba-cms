<?php
/**
 * Generic utility/helper functions that don't belong to a specific
 * feature area. Keep these framework-agnostic where possible.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! function_exists( 'konda_maloba_get_option' ) ) {
	/**
	 * Thin wrapper around get_theme_mod() with a consistent default.
	 *
	 * @param string $key     Theme mod key.
	 * @param mixed  $default Fallback value.
	 * @return mixed
	 */
	function konda_maloba_get_option( $key, $default = '' ) {
		return get_theme_mod( $key, $default );
	}
}

if ( ! function_exists( 'konda_maloba_excerpt' ) ) {
	/**
	 * Get a trimmed excerpt with a custom length/more marker.
	 *
	 * @param int    $length Word count.
	 * @param string $more   "Read more" marker.
	 * @return string
	 */
	function konda_maloba_excerpt( $length = 20, $more = '&hellip;' ) {
		// TODO: implement using wp_trim_words( get_the_excerpt(), $length, $more ).
		return '';
	}
}
