<?php
/**
 * Core theme setup: theme supports, nav menus, content width.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Set up theme defaults and register support for various WordPress features.
 */
function konda_maloba_setup() {

	// Translations.
	load_theme_textdomain( 'konda-maloba', KONDA_MALOBA_DIR . '/languages' );

	// Let WordPress manage the document title.
	add_theme_support( 'title-tag' );

	// Featured images.
	add_theme_support( 'post-thumbnails' );

	// HTML5 markup for common elements.
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Custom logo. Sizes are placeholders — adjust once design is final.
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 100,
			'width'       => 300,
			'flex-height' => true,
			'flex-width'  => true,
		)
	);

	// Nav menus.
	register_nav_menus(
		array(
			'primary' => esc_html__( 'Primary Menu', 'konda-maloba' ),
			'footer'  => esc_html__( 'Footer Menu', 'konda-maloba' ),
		)
	);

	// TODO: add_theme_support( 'editor-styles' ), 'align-wide', block-editor color/font
	// palettes, etc. once design tokens are defined.
}
add_action( 'after_setup_theme', 'konda_maloba_setup' );

/**
 * Set the $content_width global (used by embeds and some core features).
 */
function konda_maloba_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'konda_maloba_content_width', 1200 );
}
add_action( 'after_setup_theme', 'konda_maloba_content_width', 0 );
