# Bootstrap dans WordPress

[Voir Github Version](https://github.com/Poulycroc/lessons-isfsc/blob/master/courses/08__navbar_search.md)

## Navbar
[source](https://www.youtube.com/watch?v=8SWt8bc2gK0&list=PLjwdMgw5TTLWF1VV9TFWrsUTvWjtGS7Qt&index=9)

Nous allons donc mettre en place la navigation parce-que notre site commence a prendre forme mais il est assez difficile de naviguer entre les pages, on va avoir envie de dans un premier temps de gérer notre menu dans les configuration de WordPress malheureusement notre theme ne le supporte pas encore on va donc devoir lui demander de le faire

dans notre fichier `functions.php` je vais ajouter une function `add_theme_support`
```php
add_theme_support('title-tag'); // support de mon title tag
add_theme_support('post-thumbnails'); // support du thumbnail sur mes articles
add_theme_support('menus'); // support des menus par notre theme
```

dans notre administration WordPress je devrais maintenant avoir la possibilité de gérer mes menus..<br><img src=".screenshots/Screenshot 2022-11-21 at 18.25.39.png" alt="gestion des menus dans apparence">

malheureusement on n'a pas encore les emplacement de menus je vais devoir revenir dans mon fichier `functions.php` pour ajouter ça.. WordPress nous donne accès a 2 functions pour ça [register_nav_menu](https://developer.wordpress.org/reference/functions/register_nav_menu/) et [register_nav_menus](https://developer.wordpress.org/reference/functions/register_nav_menus/) dans notre cas on va utiliser `register_nav_menu()`

1. `register_nav_menu` permet d'enregistrer une bar de navigation
2. `register_nav_menus` permet d'en ajouter plusieurs

```php
register_nav_menu('header', 'En tête du menu');
// header -> l'endroit ou sera situé notre manu 
// En tête du menu -> description de notre menu
```

on ajoute donc cette ligne dans notre fichier `functions.php`

<details>
<summary>Note</summary>

---
Notre fichier `functions.php` pour le moment 
```php
<?php

add_theme_support('title-tag'); // support de mon title tag
add_theme_support('post-thumbnails'); // support du thumbnail sur mes articles
add_theme_support('menus'); // support des menus par notre theme
register_nav_menu('header', 'En tête du menu');

function wpbootstrap_styles_scripts() {
  wp_enqueue_style('style', get_stylesheet_uri());
  wp_enqueue_style('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css');
  wp_enqueue_script('bootstrap-bundle', 'https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js', false, '1.0.0', true);
}
add_action('wp_enqueue_scripts', 'wpbootstrap_styles_scripts');

```
---
</details>
<br>
<details>
<summary>Configurer notre menu dans l'admin</summary>

---
1. quand on retourne dans notre configuration, a première vue rien de bien fou je vois simplement que j'ai la possibilité de sélectionner "en tête du menu"<br><img src=".screenshots/Screenshot 2022-11-21 at 18.41.30.png"  alt="après l'enregistrement du register_nav_menu">
2. je vais pouvoir continuer la configuration..<br><img src=".screenshots/Screenshot 2022-11-21 at 18.43.43.png" alt="menu configuration">
3. je vais pouvoir ajouter des pages a mon menu<br><img src=".screenshots/Screenshot 2022-11-21 at 18.46.50.png" alt="ajouter des pages a mon menu header">
---
</details>

On va pouvoir retourner dans notre partie "affichage"

Pour afficher un joli menu dans notre site on va aller chercher un [bout de code chez Bootstrap](https://getbootstrap.com/docs/5.2/components/navbar/) on veut quelque chose qui ressemble a ça: <br><img src=".screenshots/Screenshot 2022-11-21 at 18.53.07.png" alt="notre future navigation">

on copie simplement le code qui est présenté dans la documentation... et on va le coller dans notre `header.php` juste avant notre `<div class="container">`

J'aimerais aussi commenter la partie `<ul class="navbar-nav me-auto mb-2 mb-lg-0"></ul>` histoire de travailler plus tranquillement

notre fichier `header.php`
```php
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php wp_head(); ?>
  <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/app.css">
</head>
<body>

<nav class="navbar navbar-expand-lg bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <!-- <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Link</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Dropdown
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled">Disabled</a>
        </li>
      </ul> -->
      <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>

<div class="container">
```

On va maintenant pouvoir y intégrer notre navigation générée par WordPress grace a la function [wp_nav_menu()](https://developer.wordpress.org/reference/functions/wp_nav_menu/) on va avoir besoin de faire appel la methode `theme_location` qui permetra de faire appel a la navigation que l'on a appelé `header`

donc: 
```php 
<?php wp_nav_menu(['theme_location' => 'header']); ?>
```

que je vais du coup placer juste avant le `<ul class="navbar-nav me-auto mb-2 mb-lg-0"></ul>` que j'ai commenté
<details>
<summary>Code du fichier header.php pour le moment</summary>

---
```php
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php wp_head(); ?>
  <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/app.css">
</head>
<body>

<nav class="navbar navbar-expand-lg bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <?php wp_nav_menu(['theme_location' => 'header']); ?>
      <!-- <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Link</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Dropdown
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled">Disabled</a>
        </li>
      </ul> -->
      <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>

<div class="container">
```
---
</details>

ça devrait nous donner quelque chose comme ça:<br><img src=".screenshots/Screenshot 2022-11-21 at 22.43.23.png" alt="premier affichage de la navbar" />

si on inspecte le code que WordPress nous a généré on voit que ce n'est pas tout a fait le code qu'on aimerais pour notre template 
```html
<div class="menu-navigation-container">
  <ul id="menu-navigation" class="menu">
    <li id="menu-item-32" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home current-menu-item page_item page-item-28 current_page_item menu-item-32">
      <a href="http://localhost:8888/test-wordpress/" aria-current="page">
        Accueil
      </a>
    </li>
    <li id="menu-item-33" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-33">
      <a href="http://localhost:8888/test-wordpress/actualites/">
        Actualités
      </a>
    </li>
  </ul>
</div>
```
les classes et autre éléments ne corresponde pas vraiment a ce que Bootstrap me demande faire pour avoir une belle navigation je vais donc devoir customiser un peu ça...

on va déjà commencer par nettoyer un peu ce que nous propose WordPress
1. retirer le container `<div class="menu-navigation-container"></div>` qui entour mon menu
2. changer le la classe par défaut de mon `<ul id="menu-navigation" class="menu">`

pour ce faire je vais ajouter des options dans mon ma function `wp_nav_menu`
```php
<?php wp_nav_menu([
  'theme_location' => 'header', // localisation de mon menu
  'container' => false, // permet de retirer mon container
  'menu_class' => 'navbar-nav me-auto' // la classe que je veux dans mon <ul></ul>
]); ?>
```
voila ce que ça donne quand je change ces options:<br><img src=".screenshots/Screenshot 2022-11-21 at 22.56.15.png" alt="après une première couche d'options">

c'est bien mais c'est encore loin de ressembler a ce que Bootstrap nous propose... pour aller plus loins dans la customisation de notre navbar je vais devoir retrouner dans notre chère et bie aimé `functions.php` 

je vais devoir:
1. changer mes `<li class="menu-item">` par des `<li class="nav-item">`
1. changer mes `<a>` par des `<a class="nav-link">`

je me rend donc dans mon fichier `functions.php` pour y ajouter 2 [add_filter](https://developer.wordpress.org/reference/functions/add_filter/) 
```php
function montheme_menu_class($classes) {
  // va permettre de customizer les classe de nos items (donc nos `li`)
  $classes[] = 'nav-item';
  return $classes;
}
function montheme_menu_link_class($attrs) {
  // va permettre de customizer les classe de nos liens (donc nos `a`)
  $attrs['class'] = 'nav-link';
  return $attrs;
}

add_filter('nav_menu_css_class', 'montheme_menu_class');
add_filter('nav_menu_link_attributes', 'montheme_menu_link_class');
```
<details>
<summary>Code du fichier functions.php pour le moment</summary>

---
```php
<?php

add_theme_support('title-tag'); // support de mon title tag
add_theme_support('post-thumbnails'); // support du thumbnail sur mes articles
add_theme_support('menus'); // support des menus par notre theme
register_nav_menu('header', 'En tête du menu');

function wpbootstrap_styles_scripts() {
  wp_enqueue_style('style', get_stylesheet_uri());
  wp_enqueue_style('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css');
  wp_enqueue_script('bootstrap-bundle', 'https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js', false, '1.0.0', true);
}
add_action('wp_enqueue_scripts', 'wpbootstrap_styles_scripts');


function montheme_menu_class($classes) {
  $classes[] = 'nav-item';
  return $classes;
}
function montheme_menu_link_class($attrs) {
  $attrs['class'] = 'nav-link';
  return $attrs;
}

add_filter('nav_menu_css_class', 'montheme_menu_class');
add_filter('nav_menu_link_attributes', 'montheme_menu_link_class');
```
---
</details>

ça devrait donner quelque chose comme ça:<br><img src=".screenshots/Screenshot 2022-11-21 at 23.08.28.png" alt="notre navbar ressemble de plus en plus a celle de Bootstrap">

ps: pour remplacer "Navbar" de notre nav bar par le titre de notre application je vais utiliser la function `bloginfo('name')`


<details>
<summary>Code du fichier header.php pour le moment</summary>

---
```php
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php wp_head(); ?>
  <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/app.css">
</head>
<body>

<nav class="navbar navbar-expand-lg bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#"><?php bloginfo('name'); ?></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <?php wp_nav_menu([
        'theme_location' => 'header',
        'container' => false,
        'menu_class' => 'navbar-nav me-auto'
      ]); ?>
      <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>

<div class="container">
```
---
</details>

--- 


