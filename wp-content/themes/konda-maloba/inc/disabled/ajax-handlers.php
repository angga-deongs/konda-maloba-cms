<?php
/**
 * admin-ajax.php handlers.
 *
 * Register one wp_ajax_{action} (+ wp_ajax_nopriv_{action} if the request
 * must work for logged-out visitors) pair per handler function.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Example — handle a contact form submission via AJAX.
 *
 * function konda_maloba_ajax_contact_form() {
 *     check_ajax_referer( 'konda_maloba_contact_form', 'nonce' );
 *
 *     // TODO: validate + sanitize $_POST fields, process, wp_send_json_success/error().
 *
 *     wp_send_json_success();
 * }
 * add_action( 'wp_ajax_konda_maloba_contact_form', 'konda_maloba_ajax_contact_form' );
 * add_action( 'wp_ajax_nopriv_konda_maloba_contact_form', 'konda_maloba_ajax_contact_form' );
 */
