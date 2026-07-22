<?php
/**
 * Reusable button component.
 *
 * Pass data via $args when calling:
 *   get_template_part( 'template-parts/components/button', null, array(
 *       'label' => ..., 'url' => ..., 'style' => 'primary|secondary',
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
		'label' => '',
		'url'   => '#',
		'style' => 'primary',
	)
);
?>
<a class="btn btn-<?php echo esc_attr( $args['style'] ); ?>" href="<?php echo esc_url( $args['url'] ); ?>">
	<?php echo esc_html( $args['label'] ); ?>
</a>
