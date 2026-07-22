<?php
/**
 * Homepage section: Facilities.
 *
 * Grid/list of resort facilities (pool, spa, restaurant, etc).
 * Intended to loop over the "facility" CPT once registered in
 * inc/custom-post-types.php.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<section id="facilities" class="section section-facilities">
	<div class="container">
		<?php // TODO: WP_Query over 'facility' post type, render via template-parts/components/card.php. ?>
	</div>
</section><!-- #facilities -->
