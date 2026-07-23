<?php
/**
 * The header for our theme.
 *
 * Displays everything up to the opening of #main.
 */

if ( ! defined( 'ABSPATH' ) ) {
  exit;
}
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta http-equiv="X-UA-Compatible" content="IE=9" />
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>
    <?php
    if ( is_front_page() ) {
      echo esc_html( 'Home - ' . get_bloginfo( 'name' ) );
    } elseif ( is_page() ) {
      echo esc_html( get_the_title() . ' - ' . get_bloginfo( 'name' ) );
    } else {
      echo wp_get_document_title();
    }
    ?>
  </title>

  <meta name="description" content="<?= esc_attr( get_bloginfo('description') ) ?>" />
  <meta name="keywords" content="<?= esc_attr( (is_front_page() ? 'Home' : get_the_title()) . ', ' . get_bloginfo('name') ) ?>" />

  <!-- author -->
  <meta name="author" content="<?= esc_attr( get_bloginfo('name') ) ?>" />
  <meta name="copyright" content="&copy; <?= esc_html( date('Y') ) ?> • Konda Maloba" />

  <!-- web favicon -->
  <link rel="shortcut icon" href="<?= get_template_directory_uri() ?>/assets/img/homescreen/favicon.ico" />

  <!-- android add to home screen -->
  <link rel="manifest" href="<?= get_template_directory_uri() ?>/assets/js/data/manifest.json" />
  <meta name="application-name" content="Konda Maloba" />
  <meta name="mobile-web-app-capable" content="yes" />
  <meta name="theme-color" content="#fff" />
  <link rel="icon" type="image/png" sizes="16x16" href="<?= get_template_directory_uri() ?>/assets/img/homescreen/favicon-16x16.png" />
  <link rel="icon" type="image/png" sizes="32x32" href="<?= get_template_directory_uri() ?>/assets/img/homescreen/favicon-32x32.png" />
  <link rel="icon" type="image/png" sizes="96x96" href="<?= get_template_directory_uri() ?>/assets/img/homescreen/favicon-96x96.png" />
  <link rel="icon" type="image/png" sizes="144x144" href="<?= get_template_directory_uri() ?>/assets/img/homescreen/android-icon-144x144.png" />
  <link rel="icon" type="image/png" sizes="192x192" href="<?= get_template_directory_uri() ?>/assets/img/homescreen/android-icon-192x192.png" />

  <!-- windows microsoft -->
  <meta name="msapplication-TileColor" content="#fff" />
  <meta name="msapplication-TileImage" content="<?= get_template_directory_uri() ?>/assets/img/homescreen/ms-icon-144x144.png" />

  <!-- apple add to home screen -->
  <meta name="apple-mobile-web-app-title" content="<?= bloginfo('name') ?>" />
  <meta name="apple-mobile-web-app-capable" content="yes" />
  <meta name="apple-mobile-web-app-status-bar-style" content="#fff" />
  <link rel="apple-touch-icon" href="<?= get_template_directory_uri() ?>/assets/img/homescreen/apple-icon.png" />
  <link rel="apple-touch-icon" sizes="57x57" href="<?= get_template_directory_uri() ?>/assets/img/homescreen/apple-icon-57x57.png" />
  <link rel="apple-touch-icon" sizes="60x60" href="<?= get_template_directory_uri() ?>/assets/img/homescreen/apple-icon-60x60.png" />
  <link rel="apple-touch-icon" sizes="72x72" href="<?= get_template_directory_uri() ?>/assets/img/homescreen/apple-icon-72x72.png" />
  <link rel="apple-touch-icon" sizes="76x76" href="<?= get_template_directory_uri() ?>/assets/img/homescreen/apple-icon-76x76.png" />
  <link rel="apple-touch-icon" sizes="114x114" href="<?= get_template_directory_uri() ?>/assets/img/homescreen/apple-icon-114x114.png" />
  <link rel="apple-touch-icon" sizes="120x120" href="<?= get_template_directory_uri() ?>/assets/img/homescreen/apple-icon-120x120.png" />
  <link rel="apple-touch-icon" sizes="144x144" href="<?= get_template_directory_uri() ?>/assets/img/homescreen/apple-icon-144x144.png" />
  <link rel="apple-touch-icon" sizes="152x152" href="<?= get_template_directory_uri() ?>/assets/img/homescreen/apple-icon-152x152.png" />
  <link rel="apple-touch-icon" sizes="180x180" href="<?= get_template_directory_uri() ?>/assets/img/homescreen/apple-icon-180x180.png" />
  <link rel="apple-touch-startup-image" href="<?= get_template_directory_uri() ?>/assets/img/homescreen/apple-icon.png" />

  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<?php get_template_part( 'template-parts/components/site-header' ); ?>

<main id="primary" class="site-main">
