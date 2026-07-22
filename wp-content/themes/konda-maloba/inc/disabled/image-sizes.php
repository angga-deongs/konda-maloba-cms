<?php
/**
 * Custom image sizes.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Register custom image sizes used across templates.
 *
 * Dimensions below are placeholders — adjust to the final design.
 */
function konda_maloba_image_sizes() {

	add_image_size( 'konda-maloba-hero', 1920, 1080, true );
	add_image_size( 'konda-maloba-card', 600, 400, true );
	add_image_size( 'konda-maloba-thumbnail', 300, 300, true );
}
add_action( 'after_setup_theme', 'konda_maloba_image_sizes' );

/**
 * Make custom image sizes selectable in the media library / block editor.
 */
function konda_maloba_custom_image_sizes( $sizes ) {

	return array_merge(
		$sizes,
		array(
			'konda-maloba-hero'      => esc_html__( 'Hero', 'konda-maloba' ),
			'konda-maloba-card'      => esc_html__( 'Card', 'konda-maloba' ),
			'konda-maloba-thumbnail' => esc_html__( 'Thumbnail', 'konda-maloba' ),
		)
	);
}
add_filter( 'image_size_names_choose', 'konda_maloba_custom_image_sizes' );
