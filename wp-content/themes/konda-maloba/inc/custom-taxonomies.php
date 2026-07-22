<?php
/**
 * Custom taxonomy registrations.
 *
 * Pair with the post types declared in custom-post-types.php.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Register custom taxonomies.
 */
function konda_maloba_register_taxonomies() {

	register_taxonomy(
		'property_category',
		array( 'property' ),
		array(
			'labels'            => array(
				'name'              => esc_html__( 'Property Categories', 'konda-maloba' ),
				'singular_name'     => esc_html__( 'Property Category', 'konda-maloba' ),
				'search_items'      => esc_html__( 'Search Property Categories', 'konda-maloba' ),
				'all_items'         => esc_html__( 'All Property Categories', 'konda-maloba' ),
				'parent_item'       => esc_html__( 'Parent Property Category', 'konda-maloba' ),
				'parent_item_colon' => esc_html__( 'Parent Property Category:', 'konda-maloba' ),
				'edit_item'         => esc_html__( 'Edit Property Category', 'konda-maloba' ),
				'update_item'       => esc_html__( 'Update Property Category', 'konda-maloba' ),
				'add_new_item'      => esc_html__( 'Add New Property Category', 'konda-maloba' ),
				'new_item_name'     => esc_html__( 'New Property Category Name', 'konda-maloba' ),
				'menu_name'         => esc_html__( 'Categories', 'konda-maloba' ),
			),
			'hierarchical'      => true,
			'public'            => true,
			'show_ui'           => true,
			'show_admin_column' => true,
			'show_in_rest'      => true,
			'rewrite'           => array( 'slug' => 'property-category' ),
		)
	);
}
add_action( 'init', 'konda_maloba_register_taxonomies' );
