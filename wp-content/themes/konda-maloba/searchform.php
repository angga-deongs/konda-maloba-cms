<?php
/**
 * Custom search form markup.
 *
 * Loaded automatically by get_search_form() instead of WordPress' default
 * markup. Keep this file presentation-only; no logic here.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$unique_id = wp_unique_id( 'search-form-' );
?>
<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label for="<?php echo esc_attr( $unique_id ); ?>" class="screen-reader-text">
		<?php esc_html_e( 'Search for:', 'konda-maloba' ); ?>
	</label>
	<input type="search" id="<?php echo esc_attr( $unique_id ); ?>" class="search-field"
		placeholder="<?php esc_attr_e( 'Search &hellip;', 'konda-maloba' ); ?>"
		value="<?php echo get_search_query(); ?>" name="s" />
	<button type="submit" class="search-submit">
		<?php esc_html_e( 'Search', 'konda-maloba' ); ?>
	</button>
</form>
