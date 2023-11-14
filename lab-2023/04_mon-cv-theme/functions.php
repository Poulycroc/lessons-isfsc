<?php
add_theme_support( 'title-tag' );

function create_posttypes() {
    // Formations
    register_post_type('formations', [
        'labels' => [
            'name' => __( 'Formations' ),
            'singular_name' => __( 'Formation' )
        ],
        'public' => true,
        'has_archive' => true,
        'rewrite' => ['slug' => 'formations'],
        'show_in_rest' => true,
    ]);

    // Formations
    register_post_type('experiences_pro', [
        'labels' => [
            'name' => __( 'Expériences Professionnelles' ),
            'singular_name' => __( 'Expériences Professionnelle' )
        ],
        'public' => true,
        'rewrite' => ['slug' => 'experiences-professionnelles'],
        'show_in_rest' => true,
        'supports' => ['title', 'editor']
    ]);

    // Compétences
    register_post_type('competences', [
        'labels' => [
            'name' => __( 'Compétences' ),
            'singular_name' => __( 'Compétence' )
        ],
        'public' => true,
        'has_archive' => true,
        'rewrite' => ['slug' => 'competences'],
    ]);

    // Langues
    register_post_type('langues', [
        'labels' => [
            'name' => __( 'Langues' ),
            'singular_name' => __( 'Langue' )
        ],
        'public' => true,
        'has_archive' => true,
        'rewrite' => ['slug' => 'langues'],
    ]);

    // Centres d'Intérêt
    register_post_type('centres_d_interet', [
        'labels' => [
            'name' => __( 'Centres d\'Intérêt' ),
            'singular_name' => __( 'Centre d\'Intérêt' )
        ],
        'public' => true,
        'has_archive' => true,
        'rewrite' => ['slug' => 'centres-d-interet'],
    ]);
}
add_action('init', 'create_posttypes');
