<?php
/**
 * Enqueue frontend and admin CSS/JS.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Enqueue theme stylesheets and scripts on the frontend.
 *
 * Matches the bundled HTML template asset layout under assets/:
 * css/app.css (framework + template styles) -> css/custom-style.css (overrides)
 * js/vendor.js (jQuery + plugins, bundled)   -> js/app.js (template scripts) -> js/custom-script.js (overrides)
 *
 * .min files are served unless SCRIPT_DEBUG is on, so debugging uses the
 * readable originals without changing any enqueue call.
 */
function konda_maloba_enqueue_assets() {

	$suffix = ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ? '' : '.min';

	wp_enqueue_style(
		'konda-maloba-style',
		get_stylesheet_uri(),
		array(),
		KONDA_MALOBA_VERSION
	);

	wp_enqueue_style(
		'konda-maloba-app',
		KONDA_MALOBA_URI . '/assets/css/app' . $suffix . '.css',
		array( 'konda-maloba-style' ),
		KONDA_MALOBA_VERSION
	);

	wp_enqueue_style(
		'konda-maloba-custom-style',
		KONDA_MALOBA_URI . '/assets/css/custom-style.css',
		array( 'konda-maloba-app' ),
		KONDA_MALOBA_VERSION
	);

	// No 'jquery' dependency here on purpose — vendor.js already bundles its
	// own jQuery build, so pulling in WP core's jquery handle too would load
	// jQuery twice.
	wp_enqueue_script(
		'konda-maloba-vendor',
		KONDA_MALOBA_URI . '/assets/js/vendor' . $suffix . '.js',
		array(),
		KONDA_MALOBA_VERSION,
		true
	);

	wp_enqueue_script(
		'konda-maloba-app',
		KONDA_MALOBA_URI . '/assets/js/app' . $suffix . '.js',
		array( 'konda-maloba-vendor' ),
		KONDA_MALOBA_VERSION,
		true
	);

	wp_enqueue_script(
		'konda-maloba-custom-script',
		KONDA_MALOBA_URI . '/assets/js/custom-script.js',
		array( 'konda-maloba-app' ),
		KONDA_MALOBA_VERSION,
		true
	);

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	// TODO: wp_localize_script() / wp_add_inline_script() here for data
	// passed from PHP to app.js/custom-script.js (ajax url, nonces, etc.) once needed.
}
add_action( 'wp_enqueue_scripts', 'konda_maloba_enqueue_assets' );

/**
 * Enqueue assets for wp-admin (e.g. Customizer preview, editor tweaks).
 */
function konda_maloba_admin_enqueue_assets( $hook_suffix ) {
	// TODO: enqueue admin-only assets when needed.
}
add_action( 'admin_enqueue_scripts', 'konda_maloba_admin_enqueue_assets' );
