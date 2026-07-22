<?php
/**
 * The default template for displaying archive pages
 * (category, tag, author, date, and custom post type archives).
 *
 * Override per post type with archive-{post_type}.php when needed.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();
?>

<div id="content" class="archive-content">
	<h1>Archive</h1>
</div><!-- #content -->

<?php
get_footer();
