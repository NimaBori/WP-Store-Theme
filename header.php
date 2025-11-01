<?php
/*
 * Header template file
 *
 * @package Store
 * @version 1.0
 */
?>
<!DOCTYPE html>
<html lang="?php language_attributes(); ?">
<head>
  <meta charset="?php bloginfo( 'charset' ); ?">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">  
  <?php wp_head(); ?>
</head>
<body <?php body_class( 'sample-class'); ?>>

<?php wp_body_open(); ?>

<div id="page" class="site">
  <header id="masthead" class="site-header" role="banner">
    <?php get_template_part('assets/template-parts/header/nav'); ?>
  </header>
  <div id="content" class="site-content">

  