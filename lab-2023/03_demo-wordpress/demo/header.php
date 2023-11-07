<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/app.css"> 
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    
  <?php wp_body_open(); ?>

  <header class="header">
    <div class="container">
      <a class="logo" href="<?php echo home_url('/'); ?>">
        <img
          src="<?php echo get_template_directory_uri(); ?>/assets/img/logo.png"
          alt="Brand logo | <?php bloginfo('title'); ?>"
        />
      </a>
      <h1><?php bloginfo('title'); ?></h1>
    </div>
  </header>
