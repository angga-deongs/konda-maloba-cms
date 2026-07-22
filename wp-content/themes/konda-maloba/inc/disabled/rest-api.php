<?php
/**
 * Custom REST API endpoints.
 *
 * Register routes under a dedicated namespace so they're easy to version
 * and don't collide with core or plugin routes.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'KONDA_MALOBA_REST_NAMESPACE', 'konda-maloba/v1' );

/**
 * Register custom REST routes.
 */
function konda_maloba_register_rest_routes() {

	/*
	 * Example — GET /wp-json/konda-maloba/v1/facilities
	 *
	 * register_rest_route(
	 *     KONDA_MALOBA_REST_NAMESPACE,
	 *     '/facilities',
	 *     array(
	 *         'methods'             => WP_REST_Server::READABLE,
	 *         'callback'            => 'konda_maloba_rest_get_facilities',
	 *         'permission_callback' => '__return_true',
	 *     )
	 * );
	 */
}
add_action( 'rest_api_init', 'konda_maloba_register_rest_routes' );
