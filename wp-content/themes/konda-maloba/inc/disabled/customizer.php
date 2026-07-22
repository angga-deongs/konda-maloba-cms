<?php
/**
 * Theme Customizer (Appearance > Customize) settings.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Register Customizer panels, sections, settings, and controls.
 *
 * @param WP_Customize_Manager $wp_customize
 */
function konda_maloba_customize_register( $wp_customize ) {

	/*
	 * Example — a "Contact Info" section for footer phone/email/address,
	 * used by template-parts/footer/footer-bottom.php and
	 * template-parts/sections/contact.php.
	 *
	 * $wp_customize->add_section(
	 *     'konda_maloba_contact',
	 *     array( 'title' => esc_html__( 'Contact Info', 'konda-maloba' ) )
	 * );
	 *
	 * $wp_customize->add_setting( 'konda_maloba_phone', array( 'default' => '' ) );
	 * $wp_customize->add_control(
	 *     'konda_maloba_phone',
	 *     array(
	 *         'label'   => esc_html__( 'Phone Number', 'konda-maloba' ),
	 *         'section' => 'konda_maloba_contact',
	 *         'type'    => 'text',
	 *     )
	 * );
	 */
}
add_action( 'customize_register', 'konda_maloba_customize_register' );
