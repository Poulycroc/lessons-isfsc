<?php
add_theme_support('post-thumbnails');
add_theme_support('title-tag');
add_theme_support('menus');

register_nav_menu('header', 'En tête du menu');

function styles_scripts()
{
  wp_enqueue_style(
    'bootstrap',
    'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css'
  );
  wp_enqueue_style(
    'style',
    get_template_directory_uri() . '/assets/css/app.css'
  );

  wp_enqueue_script(
    'bootstrap-bundle',
    'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js',
    false,
    1,
    true
  );
  wp_enqueue_script(
    'app-js',
    get_template_directory_uri() . '/assets/js/app.js',
    ['bootstrap-bundle'],
    1,
    true
  );
}
add_action('wp_enqueue_scripts', 'styles_scripts');

// CUSTOM POSTS TYPES

function create_post_type()
{
  register_post_type('faqs', [
    'labels' => ['name' => 'FAQs'],
    'supports' => ['title', 'editor', 'thumbnail'],
    'public' => true,
    'has_archive' => true,
    'rewrite' => ['slug' => 'faqs']
  ]);
  register_post_type('services', [
    'labels' => ['name' => 'Services'],
    'supports' => ['title', 'editor', 'thumbnail'],
    'public' => true,
    'has_archive' => true,
    'rewrite' => ['slug' => 'services']
  ]);
}
add_action('init', 'create_post_type');

// MENUS
function menuheader_class($classes)
{
  $classes[] = 'nav-item';
  return $classes;
}
add_filter('nav_menu_css_class', 'menuheader_class');

function menuheader_link_class($attributes)
{
  $attributes['class'] = 'nav-link';
  return $attributes;
}
add_filter('nav_menu_link_attributes', 'menuheader_link_class');




