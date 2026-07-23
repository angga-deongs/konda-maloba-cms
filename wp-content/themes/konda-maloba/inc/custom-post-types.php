<?php
/**
 * Custom Post Type registrations.
 *
 * Register one function per CPT (or a small loop over a config array once
 * there are several) so each type stays easy to find and remove.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Register custom post types.
 */
function konda_maloba_register_post_types() {

	/*
	 * "Properties" — accommodation units (villas, bungalows, cottages, etc).
	 * Named "Properties" rather than "Villa" so other accommodation types
	 * can be added later without renaming the post type. Type differences
	 * (villa/bungalow/cottage) are handled by the property_category
	 * taxonomy in custom-taxonomies.php, not by separate post types.
	 */
	register_post_type(
		'property',
		array(
			'labels'       => array(
				'name'               => esc_html__( 'Properties', 'konda-maloba' ),
				'singular_name'      => esc_html__( 'Property', 'konda-maloba' ),
				'add_new'            => esc_html__( 'Add New', 'konda-maloba' ),
				'add_new_item'       => esc_html__( 'Add New Property', 'konda-maloba' ),
				'edit_item'          => esc_html__( 'Edit Property', 'konda-maloba' ),
				'new_item'           => esc_html__( 'New Property', 'konda-maloba' ),
				'view_item'          => esc_html__( 'View Property', 'konda-maloba' ),
				'view_items'         => esc_html__( 'View Properties', 'konda-maloba' ),
				'search_items'       => esc_html__( 'Search Properties', 'konda-maloba' ),
				'not_found'          => esc_html__( 'No properties found', 'konda-maloba' ),
				'not_found_in_trash' => esc_html__( 'No properties found in Trash', 'konda-maloba' ),
				'all_items'          => esc_html__( 'All Properties', 'konda-maloba' ),
				'menu_name'          => esc_html__( 'Properties', 'konda-maloba' ),
			),
			'public'       => true,
			'has_archive'  => true,
			'show_in_rest' => true,
			'menu_icon'    => 'dashicons-building',
			'supports'     => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
			'taxonomies'   => array( 'property_category' ),
			'rewrite'      => array( 'slug' => 'properties' ),
		)
	);

	/*
	 * "Activities" — resort activities/experiences on offer.
	 */
	register_post_type(
		'activity',
		array(
			'labels'       => array(
				'name'               => esc_html__( 'Activities', 'konda-maloba' ),
				'singular_name'      => esc_html__( 'Activity', 'konda-maloba' ),
				'add_new'            => esc_html__( 'Add New', 'konda-maloba' ),
				'add_new_item'       => esc_html__( 'Add New Activity', 'konda-maloba' ),
				'edit_item'          => esc_html__( 'Edit Activity', 'konda-maloba' ),
				'new_item'           => esc_html__( 'New Activity', 'konda-maloba' ),
				'view_item'          => esc_html__( 'View Activity', 'konda-maloba' ),
				'view_items'         => esc_html__( 'View Activities', 'konda-maloba' ),
				'search_items'       => esc_html__( 'Search Activities', 'konda-maloba' ),
				'not_found'          => esc_html__( 'No activities found', 'konda-maloba' ),
				'not_found_in_trash' => esc_html__( 'No activities found in Trash', 'konda-maloba' ),
				'all_items'          => esc_html__( 'All Activities', 'konda-maloba' ),
				'menu_name'          => esc_html__( 'Activities', 'konda-maloba' ),
			),
			'public'       => true,
			'has_archive'  => true,
			'show_in_rest' => true,
			'menu_icon'    => 'dashicons-tickets-alt',
			'supports'     => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
			'rewrite'      => array( 'slug' => 'activities' ),
		)
	);
}
add_action( 'init', 'konda_maloba_register_post_types' );

/**
 * Reorder the wp-admin sidebar to: Posts, Properties, Activities, Pages,
 * Media. menu_position (on register_post_type above) can't achieve this
 * on its own — it only slots a CPT at a fixed numeric position and can't
 * move built-in items like Media below Pages, so this pulls the four
 * known slugs out and reinserts them as a block right after Posts.
 * Everything else (Dashboard, separators, Appearance, any plugin-added
 * menus) keeps its original relative order untouched.
 */
function konda_maloba_admin_menu_order( $menu_order ) {
	if ( ! $menu_order ) {
		return $menu_order;
	}

	$block = array(
		'edit.php?post_type=property',
		'edit.php?post_type=activity',
		'edit.php?post_type=page',
		'upload.php',
	);

	$rest        = array_values( array_diff( $menu_order, $block ) );
	$posts_index = array_search( 'edit.php', $rest, true );

	if ( false === $posts_index ) {
		return $menu_order;
	}

	array_splice( $rest, $posts_index + 1, 0, $block );

	return $rest;
}
add_filter( 'custom_menu_order', '__return_true' );
add_filter( 'menu_order', 'konda_maloba_admin_menu_order' );
