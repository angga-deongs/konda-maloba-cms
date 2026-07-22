<?php
/**
 * Konda Maloba theme bootstrap file.
 *
 * This file only wires up the theme: it defines shared constants and loads
 * every module from inc/. Actual logic must live inside inc/, not here.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

define( 'KONDA_MALOBA_VERSION', '1.0.0' );
define( 'KONDA_MALOBA_DIR', get_template_directory() );
define( 'KONDA_MALOBA_URI', get_template_directory_uri() );

/**
 * Theme modules.
 * Keep this list alphabetical-ish by responsibility, not by filename.
 */
require_once KONDA_MALOBA_DIR . '/inc/setup.php';
require_once KONDA_MALOBA_DIR . '/inc/enqueue.php';
require_once KONDA_MALOBA_DIR . '/inc/template-functions.php';
require_once KONDA_MALOBA_DIR . '/inc/security.php';
require_once KONDA_MALOBA_DIR . '/inc/custom-taxonomies.php';
require_once KONDA_MALOBA_DIR . '/inc/custom-post-types.php';

// Belum dipakai — pindahkan balik ke inc/ (dan uncomment) saat fitur terkait mulai dibangun.
// require_once KONDA_MALOBA_DIR . '/inc/disabled/image-sizes.php';
// require_once KONDA_MALOBA_DIR . '/inc/disabled/template-tags.php';
// require_once KONDA_MALOBA_DIR . '/inc/disabled/helpers.php';
// require_once KONDA_MALOBA_DIR . '/inc/disabled/customizer.php';
// require_once KONDA_MALOBA_DIR . '/inc/disabled/ajax-handlers.php';
// require_once KONDA_MALOBA_DIR . '/inc/disabled/rest-api.php';

/**
 * Flush rewrite rules once on theme activation so /properties/ and
 * /activities/ archives (and property_category term pages) work
 * immediately instead of 404ing until Settings > Permalinks is
 * manually re-saved.
 */
function konda_maloba_flush_rewrites_on_activation() {
	konda_maloba_register_taxonomies();
	konda_maloba_register_post_types();
	flush_rewrite_rules();
}
add_action( 'after_switch_theme', 'konda_maloba_flush_rewrites_on_activation' );
