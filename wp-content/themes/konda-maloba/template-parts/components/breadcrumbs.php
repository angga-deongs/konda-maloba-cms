<?php
/**
 * Reusable breadcrumb navigation component.
 *
 * Invoked via konda_maloba_breadcrumbs() in inc/template-tags.php.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( is_front_page() ) {
	return;
}
?>
<nav class="breadcrumbs" aria-label="<?php esc_attr_e( 'Breadcrumb', 'konda-maloba' ); ?>">
	<?php // TODO: render Home > Parent > Current trail based on the current query. ?>
</nav>
