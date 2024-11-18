<!DOCTYPE html>
<html <?php language_attributes(); ?> >
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>  >
    <?php wp_body_open(); ?>

<nav class="navbar bg-body-tertiary">
  <div class="container">
    <a
        class="navbar-brand"
        href="<?php echo home_url('/'); ?>"
    >
        Home
    </a>
  </div>
</nav>