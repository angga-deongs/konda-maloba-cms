<?php
/**
 * Reusable card component (image, title, excerpt, link).
 *
 * Pass data via $args when calling:
 *   get_template_part( 'template-parts/components/card', null, array(
 *       'title' => ..., 'excerpt' => ..., 'image_id' => ..., 'url' => ...,
 *   ) );
 *
 * @var array $args
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$args = wp_parse_args(
	$args ?? array(),
	array(
		'title'    => '',
		'excerpt'  => '',
		'image_id' => 0,
		'url'      => '',
	)
);
?>
<div class="card">
	<?php // TODO: render $args['image_id'], $args['title'], $args['excerpt'], $args['url']. ?>
</div><!-- .card -->
