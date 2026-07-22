<?php
/**
 * Custom template tags for use inside templates and template-parts.
 *
 * Keep these presentation-oriented helpers here; anything that isn't
 * about "printing something in a template" belongs in helpers.php instead.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! function_exists( 'konda_maloba_posted_on' ) ) {
	/**
	 * Prints HTML with the post date.
	 */
	function konda_maloba_posted_on() {
		// TODO: output published/updated date markup.
	}
}

if ( ! function_exists( 'konda_maloba_entry_footer' ) ) {
	/**
	 * Prints categories, tags, and edit link for the current post.
	 */
	function konda_maloba_entry_footer() {
		// TODO: output taxonomy terms + edit_post_link().
	}
}

if ( ! function_exists( 'konda_maloba_breadcrumbs' ) ) {
	/**
	 * Prints simple breadcrumb navigation.
	 *
	 * Wraps template-parts/components/breadcrumbs.php.
	 */
	function konda_maloba_breadcrumbs() {
		get_template_part( 'template-parts/components/breadcrumbs' );
	}
}
