<?php
add_theme_support('post-thumbnails');
add_theme_support('title-tag');

function styles_scripts() {
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