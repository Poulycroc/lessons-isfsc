# Navigation et Searchbar

[Voir Github Version](https://github.com/Poulycroc/lessons-isfsc/blob/master/courses/08__navbar_search.md)<br>
[le projet 'montheme' complet](https://github.com/Poulycroc/lessons-isfsc/tree/master/wordpress/montheme)

## Navbar

[source](https://www.youtube.com/watch?v=8SWt8bc2gK0&list=PLjwdMgw5TTLWF1VV9TFWrsUTvWjtGS7Qt&index=9)

Nous allons donc mettre en place la navigation parce que notre site commence à prendre forme, mais il est assez difficile de naviguer entre les pages. Dans un premier temps, nous allons avoir envie de gérer notre menu dans les configurations de WordPress. Malheureusement, notre thème ne le supporte pas encore. Nous allons donc devoir lui demander de le faire.

Dans notre fichier `functions.php` je vais ajouter une function `add_theme_support`.

```php
add_theme_support('title-tag'); // support de mon title tag
add_theme_support('post-thumbnails'); // support du thumbnail sur mes articles
add_theme_support('menus'); // support des menus par notre theme
```

Dans notre administration WordPress je devrais maintenant avoir la possibilité de gérer mes menus.<br><img src=".screenshots/Screenshot 2022-11-21 at 18.25.39.png" alt="gestion des menus dans apparence">

Malheureusement on n'a pas encore les emplacement de menus, je vais devoir revenir dans mon fichier `functions.php` pour ajouter ça.. WordPress nous donne accès a 2 functions pour ça [register_nav_menu](https://developer.wordpress.org/reference/functions/register_nav_menu/) et [register_nav_menus](https://developer.wordpress.org/reference/functions/register_nav_menus/) dans notre cas on va utiliser `register_nav_menu()`

1. `register_nav_menu` permet d'enregistrer une bar de navigation.
2. `register_nav_menus` permet d'en ajouter plusieurs.

```php
register_nav_menu('header', 'En tête du menu');
// header -> l'endroit ou sera situé notre manu
// En tête du menu -> description de notre menu
```

On ajoute donc cette ligne dans notre fichier `functions.php`.

<details>
<summary>Note</summary>

---

Notre fichier `functions.php` pour le moment :

```php
<?php

add_theme_support('title-tag'); // support de mon title tag
add_theme_support('post-thumbnails'); // support du thumbnail sur mes articles
add_theme_support('menus'); // support des menus par notre theme
register_nav_menu('header', 'En tête du menu');

function wpbootstrap_styles_scripts() {
  wp_enqueue_style('style', get_stylesheet_uri());
  wp_enqueue_style('bootstrap', '	https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css');
  wp_enqueue_script('bootstrap-bundle', '	https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js', false, '1.0.0', true);
}
add_action('wp_enqueue_scripts', 'wpbootstrap_styles_scripts');

```

---

</details>
<br>
<details>
<summary>Configurer notre menu dans l'admin</summary>

---

1. Quand on retourne dans notre configuration, a première vue rien de bien fou je vois simplement que j'ai la possibilité de sélectionner "en tête du menu".<br><img src=".screenshots/Screenshot 2022-11-21 at 18.41.30.png"  alt="après l'enregistrement du register_nav_menu">
2. Je vais pouvoir continuer la configuration..<br><img src=".screenshots/Screenshot 2022-11-21 at 18.43.43.png" alt="menu configuration">
3. Je vais pouvoir ajouter mes pages à mon menu<br><img src=".screenshots/Screenshot 2022-11-21 at 18.46.50.png" alt="ajouter des pages a mon menu header">

---

</details><br>

On va pouvoir retourner dans notre partie "affichage"

Pour afficher un joli menu dans notre site on va aller chercher un [bout de code chez Bootstrap](https://getbootstrap.com/docs/5.2/components/navbar/), on veut quelque chose qui ressemble a ceci : <br><img src=".screenshots/Screenshot 2022-11-21 at 18.53.07.png" alt="notre future navigation">

On copie simplement le code qui est présenté dans la documentation, et on va le coller dans notre `header.php` juste avant notre `<div class="container">`.

J'aimerais aussi commenter la partie `<ul class="navbar-nav me-auto mb-2 mb-lg-0"></ul>` histoire de travailler plus tranquillement.

Notre fichier `header.php` :

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

On va maintenant pouvoir y intégrer notre navigation générée par WordPress grace a la function [wp_nav_menu()](https://developer.wordpress.org/reference/functions/wp_nav_menu/), on va avoir besoin de faire appel la methode `theme_location`, qui permetra de faire appel a la navigation que l'on a appelé `header`.

Donc:

```php
<?php wp_nav_menu(['theme_location' => 'header']); ?>
```

Que je vais du coup placer juste avant le `<ul class="navbar-nav me-auto mb-2 mb-lg-0"></ul>` que j'ai commenté.

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

</details><br>

Ça devrait nous donner quelque chose comme ceci:<br><img src=".screenshots/Screenshot 2022-11-21 at 22.43.23.png" alt="premier affichage de la navbar" />

Si on inspecte le code que WordPress nous a généré, on voit que ce n'est pas tout a fait le code qu'on aimerais pour notre template.

```html
<div class="menu-navigation-container">
  <ul id="menu-navigation" class="menu">
    <li
      id="menu-item-32"
      class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home current-menu-item page_item page-item-28 current_page_item menu-item-32"
    >
      <a href="http://localhost:8888/test-wordpress/" aria-current="page">
        Accueil
      </a>
    </li>
    <li
      id="menu-item-33"
      class="menu-item menu-item-type-post_type menu-item-object-page menu-item-33"
    >
      <a href="http://localhost:8888/test-wordpress/actualites/">
        Actualités
      </a>
    </li>
  </ul>
</div>
```

Les classes et autres éléments ne correspondent pas vraiment à ce que Bootstrap demande pour obtenir une belle navigation. Je vais donc devoir personnaliser tout ça un peu...

On va déjà commencer par nettoyer un peu ce que nous propose WordPress.

1. Retirer le container `<div class="menu-navigation-container"></div>` qui entour mon menu
2. Changer la classe par défaut de mon `<ul id="menu-navigation" class="menu">`

Pour ce faire je vais ajouter des options dans mon ma function `wp_nav_menu`

```php
<?php wp_nav_menu([
  'theme_location' => 'header', // localisation de mon menu
  'container' => false, // permet de retirer mon container
  'menu_class' => 'navbar-nav me-auto' // la classe que je veux dans mon <ul></ul>
]); ?>
```

Voila ce que ça donne quand je change ces options:<br><img src=".screenshots/Screenshot 2022-11-21 at 22.56.15.png" alt="après une première couche d'options">

C'est bien mais c'est encore loin de ressembler a ce que Bootstrap nous propos. Pour aller plus loins dans la customisation de notre navbar je vais devoir retourner dans notre chère et bie aimé `functions.php`.

Je vais devoir:

1. Changer mes `<li class="menu-item">` par des `<li class="nav-item">`.
1. Changer mes `<a>` par des `<a class="nav-link">`.

Je me rend donc dans mon fichier `functions.php` pour y ajouter 2 [add_filter](https://developer.wordpress.org/reference/functions/add_filter/) :

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

</details><br>

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

## Formulaire de recherche

[source](https://www.youtube.com/watch?v=3khRV9BGRo0&list=PLjwdMgw5TTLWF1VV9TFWrsUTvWjtGS7Qt&index=10)

On va rendre le formulaire de recherche du code qu'on a récupéré sur bootstrap :

```html
<form class="d-flex" role="search">
  <input
    class="form-control me-2"
    type="search"
    placeholder="Search"
    aria-label="Search"
  />
  <button class="btn btn-outline-success" type="submit">Search</button>
</form>
```

Dans un premier temps on va ajouter une petite function de génération de formulaire de recherche qui nous vient directement de wordpress `get_search_form()`, et on va placer

```php
<?php echo get_search_form(); ?>
```

entre `</nav>` et `<div class="container">` pour voir un peu ce que ça nous rend.<br>
ça devrait nous rendre quelque chose dans le genre<br><img src=".screenshots/Screenshot 2022-11-27 at 19.11.37.png" alt="search input"><br>
niveau `html` ça nous a écrit quelque chose comme ceci :

```html
<div>
  <label class="screen-reader-text" for="s">Rechercher&nbsp;:</label>
  <input type="text" value="" name="s" id="s" />
  <input type="submit" id="searchsubmit" value="Rechercher" />
</div>
```

Un code assez simple donc

J'aimerais évidement remplacer le code actuel de bootstrap avec le code généré par wordpress histoire que ce soit un peu plus sympa, pour ça il faudra créer notre propre formulaire de recherche :

1. On va créer un fichier `searchform.php` a la racine de notre theme.
2. On va y coller le code html de notre formulaire qui vient de bootstrap<br><img src=".screenshots/Screenshot 2022-11-27 at 19.19.00.png" alt="notre formulaire de recherche">.
3. On va maintenant ajouter les functions de wordpress qui active la recherche automatique.

Voila donc notre résultat :

```php
<form class="d-flex" role="search" action="<?php echo esc_url(home_url('/')); ?>">
  <input class="form-control me-2" type="search" placeholder="Recherche" aria-label="Search" name="s" value="<?php echo get_search_query(); ?>">
  <button class="btn btn-outline-success" type="submit">Rechercher</button>
</form>
```

1. Dans `<form>` -> `action="<?php echo esc_url(home_url('/')); ?>"` on indique ici l'url de notre page de recherche.
2. dans `<input>` -> `name="s"` le nom de notre input doit obligatiorement s'appeler 's' (c'est important pour WordPress).
3. Toujours dans `<input>` -> `value="<?php echo get_search_query(); ?>"` c'est la recherche qu'on vient de faire.

Voila ce que ça donne:<br><img src=".screenshots/Screenshot 2022-11-27 at 19.25.16.png" alt="le résultat de notre première recherche"><br>

Il ne me reste plus donc qu'a remplacer l'input du code bootstrap par notre fameux formulaire.

Donc ce code la :

```html
<form class="d-flex" role="search">
  <input
    class="form-control me-2"
    type="search"
    placeholder="Search"
    aria-label="Search"
  />
  <button class="btn btn-outline-success" type="submit">Search</button>
</form>
```

par celui-ci :

```php
<?php echo get_search_form(); ?>
```

ça nous donnera donc ceci :

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
      <?php
        wp_nav_menu([
          'theme_location' => 'header',
          'container' => false,
          'menu_class' => 'navbar-nav me-auto'
        ]);

        echo get_search_form();
      ?>
    </div>
  </div>
</nav>



<div class="container">
```

<details>
<summary>oui j'ai effectivement</summary>

---

```php
// j'ai préféré faire ça:
<?php
  wp_nav_menu([
    'theme_location' => 'header',
    'container' => false,
    'menu_class' => 'navbar-nav me-auto'
  ]);

  echo get_search_form();
?>

// plutot que ça
<?php wp_nav_menu([
  'theme_location' => 'header',
  'container' => false,
  'menu_class' => 'navbar-nav me-auto'
]); ?>
<?php echo get_search_form(); ?>

// je trouve ça plus clean
```

---

</details>
<br>

### Plus de personalisation pour la recherches

Dans cet exemple, je vais ajouter une suite de custom `post type` "services" (que l'on a déjà utilisé pour l'application [supershoes](https://github.com/Poulycroc/lessons-isfsc/blob/master/courses/09__integration_cordonnier.md#services)) :

<img src=".screenshots/Screenshot 2023-01-03 at 14.02.14.png" alt="page services" /><br>

Ce que j'aimerais ? c'est avoir une page spécial pour récupérer mes données de recherche comme celle-ci par exemple :<br><img src=".screenshots/Screenshot 2023-01-03 at 14.15.30.png" alt="page de résultats de recherches"><br>

**C'est parti!**, On connait déjà notre fichier `searchform.php`

```php
<form class="d-flex" role="search" action="<?php echo home_url(); ?>">
  <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="s" value="<?php echo get_search_query(); ?>">
  <button class="btn btn-outline-success" type="submit">Search</button>
</form>
```

J'aimerais avoir une page spécial pour voir mes résultats.. pour ce faire je vais simplement ajouter une nouvelle page `search.php`

dans cette page je vais ajouter le code suivant..

```php
<?php
/**
 * The template for displaying Search Results pages.
 */
get_header(); ?>

<section id="primary" class="content-area">
    <div id="content" class="site-content" role="main">
      <?php if ( have_posts() ) : ?>

        <header class="page-header">
            <h1 class="page-title">
              Résultats pour: <span class="font-weight-light font-italic"><?php echo get_search_query(); ?></span>
            </h1>
        </header><!-- .page-header -->
        <?php while ( have_posts() ): the_post(); ?>

          <div class="card">
            <div class="card-body">
              <h5 class="card-title"><?php the_title(); ?></h5>
              <p class="card-text"><?php the_content(); ?></p>
            </div>
          </div>


        <?php endwhile; ?>
      <?php else : ?>
        pas de résultats
      <?php endif; ?>
    </div><!-- #content .site-content -->
</section><!-- #primary .content-area -->

<?php get_footer(); ?>
```

Dans ce fichier rien de bien fou, on reconnait notre boucle while `<?php while ( have_posts() ): the_post(); ?>` qui va simplement retourner nos articles filtré par notre recherche et `<?php echo get_search_query(); ?>` qui va retourner la string de ce qu'on a tapé dans la bar de recherche je pourrais don ajouter un lien dans chaque card pour avoir plus de détails sur l'article en question.

### Et si on ne veux voir les résultats que pour services ?

Effectivement si je ne veux pas voir mes article qui ont les même références que mes `services`, je vais devoir dire a mon formulaire qu'il ne doit filtrer que les ces fameux `services` pour ça j'ajoute :

```php
<input type="hidden" name="post_type" value="services" />
```

Dans mon fichier `searchform.php`

Ce qui nous donne quelque chose comme ceci :

```php
<form class="d-flex" role="search" action="<?php echo home_url(); ?>">
  <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="s" value="<?php echo get_search_query(); ?>">
  <input type="hidden" name="post_type" value="services" />
  <button class="btn btn-outline-success" type="submit">Search</button>
</form>
```
