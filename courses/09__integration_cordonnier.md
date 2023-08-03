# Bootstrap dans WordPress

[Voir Github Version](https://github.com/Poulycroc/lessons-isfsc/blob/master/courses/09__integration_cordonnier.md)<br>
[le projet 'montheme' complet](https://github.com/Poulycroc/lessons-isfsc/tree/master/wordpress/themecordonnier)

## Introduction

Récupérer le projet sur le [Github](https://github.com/gregholvoet/supershoes)
Il y a 3 branches sur ce projet :
1. **start** : Le projet de départ sans aucunes modification, sans `html` ni `css`.
2. **static** : Le projet est maintenant terminé sans de manière `static` donc le contenu est écrit en dur et n'est donc pas `dynamique`.
3. **wordpress** : branche de travail pour notre projet wordpress on va donc rendre notre le contenu `dynamique`.

<details>
<summary>Télécharger et placer le dossier</summary>

1. On va donc se rendre sur [le Github](https://github.com/gregholvoet/supershoes) et sélectionner la branche `static` :<br><img src=".screenshots/Screenshot 2022-11-29 at 11.55.35.png" alt="selcetionner la banche static">
2. Télécharger cette branche dans l'onglet **Code** > **Download Zip** :<br><img src=".screenshots/Screenshot 2022-11-29 at 12.06.13.png" alt="télécharger la branche static">
3. On va simplement placer le dossier télécharger dans notre **wordpress** > **wp-content** > **themes** et renommer le dossier en "supershoes" :<br><img src=".screenshots/Screenshot 2022-11-29 at 12.10.04.png" alt="placer le dossier dans themes">
</details>
<details>
<summary>Activer notre theme au yeux de wordpress</summary>

A la racine de notre nouveau projet on va ajouter `2 nouveaux fichiers` :
1. **functions.php** 
2. **style.css**

Et finalement modifier le **index.html** en **index.php**.

Dans notre fichier **style.css** on va simplement ajouter le nom de notre theme :
```css
/*
Theme Name: Super Shoes
*/
```

C'est parti il ne reste plus qu'a activer notre thème.<br><img src=".screenshots/Screenshot 2022-11-29 at 12.30.33.png" alt="activer notre nouveau theme">

</details>
<br>

## On entre dans le vif du sujet
Je vais donc m'attaquer a cette intégration dans **WordPress** ,comme on a déjà vu de manière plus détaillée chaque élémént d'un développement WordPress, j'irais beaucoup plus rapidement sur les différente étapes, n'hésitez donc pas a revenir dans les cours précédent si vous ne comprennez pas ce que je fais. 

<details>
<summary>On découpe un peu l'application</summary>

---
On va déjà commencer par séparer notre header et footer du corps de notre theme histoire d'avoir quelque chose de plus propre..
On créer donc 2 fichiers.
1. **header.php** qui va donc accueillir la partie `<head></head>` et `<header></header>` (dans la quel on a notre navigation)
2. **footer.php** qui va donc accueillir la partie `<footer></footer>`

Dans notre fichier `index.php` on récupère :
```html
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Exercice Landingpage</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
  <header class="sticky-top">
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">SuperShoes</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item"><a class="nav-link active" aria-current="page" href="#">Accueil</a></li>
            <li class="nav-item"><a class="nav-link" href="#">À propos</a></li>
            <li class="nav-item"><a class="nav-link" href="#">Services</a></li>
            <li class="nav-item"><a class="nav-link" href="#">Contact</a></li>
          </ul>
        </div>
      </div>
    </nav>
  </header>
```
Qu'on placer dans le fichier `header.php`.
On va évidement penser a y mettre la function `get_header()` a la place de que l'on vient de retirer.
```php
<?php get_header(); ?>
```

Pour le footer pareil ! On récupère:
```html
  <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  <script src="js/script.js"></script>
</body>
</html>
```
Ensuite on va le placer dans `footer.php` on oublie évidement pas non plus de remplacer ce code par la function `get_footer()`
```php
<?php get_footer(); ?>
```

je me retrouve donc avec ça:
  <details>
  <summary>index.php</summary>

  ---
  ```php
  <?php get_header(); ?>

    <main>
      <section class="hero" id="home">
        <header>
          <h1 class="visually-hidden">SuperShoes</h1>
          <p class="h1 text-white">
            <span class="bg-primary">Ici, on répare vos chaussures</span><br>
            <small class="bg-secondary">pour que vous repartiez du bon pied</small>
          </p>
          <a href="#about" class="please-scroll">Scrollez vers le bas</a>
        </header>
      </section>
      <section class="container section about" id="about">
        <div class="row align-items-center">
          <div class="col-md">
            <header>
              <h2 class="mb-3">Notre entreprise</h2>
            </header>
            <p class="lead">
              Lorem, ipsum dolor sit amet consectetur adipisicing elit. Sunt reprehenderit hic eligendi assumenda quos animi consequatur tenetur atque nam. Quos aspernatur placeat fuga excepturi veritatis eos eveniet nemo magni facere.
            </p>
          </div>
          <div class="col-md">
            <img class="img-fluid" src="images/about.jpg" alt="cordonnier au travail">
          </div>
        </div>
      </section>
      <section class="container section services" id="services">
        <header>
          <h2 class="text-center mb-3">Nos services</h2>
        </header>
        <div class="row">
          <div class="col-sm">
            <div class="card">
              <img src="images/cordonnier.jpg" class="card-img-top" alt="...">
              <div class="card-body">
                <h3 class="card-title h5">Réparation</h3>
                <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nisi, accusantium?</p>
              </div>
            </div>
          </div>
          <div class="col-sm">
            <div class="card">
              <img src="images/cordonnier.jpg" class="card-img-top" alt="...">
              <div class="card-body">
                <h3 class="card-title h5">Entretien</h3>
                <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nisi, accusantium?</p>
              </div>
            </div>
          </div>
          <div class="col-sm">
            <div class="card">
              <img src="images/cordonnier.jpg" class="card-img-top" alt="...">
              <div class="card-body">
                <h3 class="card-title h5">Sur mesure</h3>
                <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nisi, accusantium?</p>
              </div>
            </div>
          </div>
        </div>
      </section>
      <div class="container section contact" id="contact">
        <header>
          <h2 class="text-center mb-3">Contactez-nous</h2>
        </header>
        <div class="row">
          <form action="#" class="col-md">
            <p class="form-group">
              <label for="name">Votre nom et prénom</label>
              <input name="name" id="name" type="text" class="form-control">
            </p>
            <p class="form-group">
              <label for="subject">Sujet</label>
              <select name="subject" id="subject" class="form-control">
                <option value="0">Choisissez un sujet</option>
                <option value="devis">Demande de devis</option>
                <option value="question">Question</option>
                <option value="other">Autres</option>
              </select>
            </p>
            <p class="form-group">
              <label for="message">Votre message</label>
              <textarea name="message" id="message" class="form-control" rows="5"></textarea>
            </p>
            <p class="text-right">
              <button class="btn btn-primary">Envoyer</button>
            </p>
          </form>
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d10987.242951252556!2d4.37044401754503!3d50.85271187329156!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47c3c370c43d6195%3A0x94b0e4b9ad97de02!2sHaute%20%C3%89cole%20ISFSC!5e0!3m2!1sfr!2sbe!4v1602328508492!5m2!1sfr!2sbe" class="col-md-8 contact-map" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
        </div>
      </div>
    </main>

  <?php get_footer(); ?>
  ```
  ---
  </details>
  <details>
  <summary>header.php</summary>

  ---
  ```html
  <html lang="fr">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercice Landingpage</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>
    <header class="sticky-top">
      <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">SuperShoes</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item"><a class="nav-link active" aria-current="page" href="#">Accueil</a></li>
              <li class="nav-item"><a class="nav-link" href="#">À propos</a></li>
              <li class="nav-item"><a class="nav-link" href="#">Services</a></li>
              <li class="nav-item"><a class="nav-link" href="#">Contact</a></li>
            </ul>
          </div>
        </div>
      </nav>
    </header>
  ```
  ---
  </details>
  <details>
  <summary>footer.php</summary>
  
  ---
  ```html
    <footer class="bg-secondary">
      <div class="container text-light py-2">
        &copy; SuperShoes 2022, tous droits résérvés
      </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <script src="js/script.js"></script>
  </body>
  </html>
  ```
  ---
  </details>
  
  ---
</details>

<details>
<summary>On s'occupe du header.php</summary>

---
Comme vu dans le cours je vais avoir besoin d'ajouter pas mal de petit élément de functions propre a wordpress.

```php
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
  <?php wp_body_open(); ?>
  
  <header class="sticky-top">
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
      <div class="container-fluid">
        <a class="navbar-brand" href="<?php echo home_url('/') ?>"><?php bloginfo('name'); ?></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item"><a class="nav-link active" aria-current="page" href="#">Accueil</a></li>
            <li class="nav-item"><a class="nav-link" href="#">À propos</a></li>
            <li class="nav-item"><a class="nav-link" href="#">Services</a></li>
            <li class="nav-item"><a class="nav-link" href="#">Contact</a></li>
          </ul>
        </div>
      </div>
    </nav>
  </header>
```

1. Remplacer l'attribut `lang` de notre balise `<html>` pour le rendre dynamique.
2. On retire notre balise `<title></title>` puisqu'elle sera chargée dans `functions.php`.
3. On supprime les lignes `<link />` qui chargent le css de bootstrap et notre css custom.
4. On ajoute `<?php wp_head(); ?>` pour charger le header de wordpress.
5. On va customiser le lien `navbar-brand` avec `bloginfo()` et `home_url()`.
6. On ajoute `body_class()` au cas ou on aurait besoin dans notre design.
7. On ajoute finalement `wp_body_open()` pour prévenir wordpress qu'on ouvre le body a cet endroit.
---
</details>
<details>
<summary>On s'occupe du footer.php</summary>

---
Dans le footer ça ira un peu plus vite.

```php
  <footer class="bg-secondary">
    <div class="container text-light py-2">
      &copy; SuperShoes 2022, tous droits résérvés
    </div>
  </footer>

  <?php wp_footer(); ?>
</body>
</html>
```

1. Retirer toutes les lignes de `<scripts>` (on les ajoutera dans functions.php).
2. ajouter la function `wp_footer()`.
---
</details>
<details>
<summary>Dans notre fichier préféré... functions.php</summary>

---
Pour ce thème-ci, j'ai envie de charger mes style perso directement dans `functions.php` pour vous montrer comment ça marche.


```php
<?php

add_theme_support('title-tag'); // support de mon title tag
add_theme_support('post-thumbnails'); // support du thumbnail sur mes articles
add_theme_support('menus'); // support des menus WordPress

function wpbootstrap_styles_scripts() {
  wp_enqueue_style('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css');
  wp_enqueue_style('style',   () .'/css/style.css', ['bootstrap'], true);

  wp_enqueue_script('jquery');
  wp_enqueue_script('bootstrap-bundle', 'https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js', false, '1.0.0', true);
  wp_enqueue_script('scripts', get_template_directory_uri().'/js/script.js', ['jquery'], '1.0.0', true);
}
add_action('wp_enqueue_scripts', 'wpbootstrap_styles_scripts');
```

1. J'ajoute mes `add_theme_support()`.
2. J'ajoute `wpbootstrap_styles_scripts()` dans le quel je charge `bootstrap` **css** et **bundle** .

Donc si jamais:
```php
wp_enqueue_style('style', get_template_directory_uri() .'/css/style.css', ['bootstrap'], true);
```
L'étape suivante consiste à charger mon style personnalisé en lui précisant qu'il a besoin de "bootstrap" avant d'être chargé, même chose pour nos script js perso, sauf que lui il a besoin de [jQuery](https://jquery.com/).
```php
wp_enqueue_script('scripts', get_template_directory_uri().'/js/script.js', ['jquery'], '1.0.0', true);
```

On peut aussi remarquer que pour `jQuery`, je n'ai pas eu besoin de préciser à wordpress où le trouver, c'est simplement parcequ'il embarque cette librairie directement avec lui, donc il l'a connait.

---
</details>

---
### NavBar
---
<img src=".screenshots/Screenshot 2022-11-28 at 10.08.28.png" alt="découpage maquette navbar">
<details>
<summary>La section NavBar</summary>

La seul chose à faire ici c'est de se rendre dans les réglages :<br><img src=".screenshots/Screenshot 2022-12-04 at 23.43.22.png" alt="changer le titre de l'app"><br>

Ensuite partout ou l'on retrouvera "SuperShoes" (dans l'éditeur )on aura juste a mettre :
```php
<?php echo bloginfo('name'); ?>
```
ce qui retrounera par défaut le titre de notre site
</details>

---
### Header
---
<img src=".screenshots/Screenshot 2022-11-28 at 10.08.46.png" alt="découpage maquette header">
<details>
<summary>La section Header</summary>

Pour le moment dans la section **header**, j'ai un html qui ressemble a ceci :
```html
<section class="hero" id="home">
  <header>
    <h1 class="visually-hidden">SuperShoes</h1>
    <p class="h1 text-white">
      <span class="bg-primary">Ici, on répare vos chaussures</span><br>
      <small class="bg-secondary">pour que vous repartiez du bon pied</small>
    </p>
    <a href="#about" class="please-scroll">Scrollez vers le bas</a>
  </header>
</section>
```

j'aimerais évidement pouvoir rendre le contenu dynamique... je vais avoir **4 sections distincte** 
1. `main-title` "Ici, on répare vos chaussures"
2. `under-title` "Pour que vous repartiez du bon pied"
3. `scroll-label` "Scrollez vers le bas"
4. `background-url` L'image en arrière plant.

(oui c'est moi qui ai inventé les termes) j'ai plusieur solutions pour le faire mais pour cette section de page si je vais opter pour la création `d'une page admin` dans mon `functions.php` (que j'aime tant), je vais ajouter une nouvelle **function** qui va utiliser la méthode [add_menu_page()](https://developer.wordpress.org/reference/functions/add_menu_page/) de wordpress .

Dans mon fichier `functions.php` j'ajoute: 
```php
function my_admin_menu() {
	add_menu_page(
		'Header hero', // nom de mon menu
		'Header hero', // nom affiché dans la sidebar de l'admin wordpress
		'manage_options', // la capacité requise pour que ce menu soit affiché à l'utilisateur.
		'sample-page', // le slug (donc l'url dans l'admin)
		'my_admin_page__header_hero__contents', // notre function qui va construire la page
		'dashicons-schedule', // l'icone dans la side bar
		3
	);
}
add_action( 'admin_menu', 'my_admin_menu' );

function my_admin_page__header_hero__contents() {
  echo '<h1>COUCOU</h1>';
}
```
Ce qui devrait me permettre d'afficher : <br><img src=".screenshots/Screenshot 2022-12-04 at 23.17.14.png" alt="admin menu page" /><br>

C'est cool évidement mais ça ne me permet pas encore de pouvoir entrer les donnée que je veux ni même de pouvoir les récuperer dans le html de mon thème.

La première chose que je vais devoir faire c'est donc créer un formulaire directement dans ma function `my_admin_page__header_hero__contents()`, voici le code complet pour ma page d'option du hero header :
```php
function my_admin_menu() {
	add_menu_page(
		'Header hero', // nom de mon menu
		'Header hero', // nom affiché dans la sidebar de l'admin wordpress
		'manage_options', // la capacité requise pour que ce menu soit affiché à l'utilisateur.
		'sample-page', // le slug (donc l'url dans l'admin)
		'my_admin_page__header_hero__contents', // notre function qui va construire la page
		'dashicons-schedule', // l'icone dans la side bar
		3
	);
}
add_action( 'admin_menu', 'my_admin_menu' );

function my_admin_page__header_hero__contents() {
  // ici je vérifie que que le contenu a bien été modifier 
  // si ce n'est pas le cas.. pas besoin d'enregistrer
  if( $_POST['updated'] === 'true' ){ 

    // si mon contenu a bien été enregistré je vérifie que mon fomulaire existe bien
    if( ! isset( $_POST['header-hero_form'] ) || ! wp_verify_nonce( $_POST['header-hero_form'], 'header-hero_update' ) ){ 
      // si ce n'est pas le cas je retourne une erreur  
    ?>
      <div class="error">
        <p>Sorry, your nonce was not correct. Please try again.</p>
      </div> <?php
      exit;
    } else {
      // si toute les vérifications se sont bien passée j'enregistre mes données

      // 
      // dans cette section je vais simplement récupérer les champs de mon formulaire 
      // "main-title", "under-title", "scroll-label", "background-url"
      // et demander a worpress de les traiter.. en suite j'enregistre ça dans une variable pour chaque champs
      // 
      $mainTitle = sanitize_text_field( $_POST['main-title'] ); 
      $underTitle = sanitize_text_field( $_POST['under-title'] );
      $scrollLabel = sanitize_text_field( $_POST['scroll-label'] );
      $backgroundUrl = sanitize_text_field( $_POST['background-url'] );
      //
      
      // 
      // dans cette section je récupère les variable que j'ai enregistré avant 
      // et je les stock dans une "option" wordpress option que je pourrais récupérer plus tard en fonction de mes besoin
      // avec "get_option" suivi du nom de mon options
      //
      // donc pour enregistrer l'option j'utilise "update_option" pour la récuperer j'utilise "get_option"
      // 
      update_option('header-hero_main-title', $mainTitle );
      update_option('header-hero_under-title', $underTitle );
      update_option('header-hero_scroll-label', $scrollLabel );
      update_option('header-hero_background-url', $backgroundUrl );
      //
    }
  } ?>
  <div class="wrap">
    <h2><?php
      // je récupère le titre de ma page admin dans mon cas "Header hero"
      // c'est la 2eme ligne de "add_menu_page()"
      echo get_admin_page_title();
    ?></h2>
    <form method="POST">
      <input type="hidden" name="updated" value="true" />
      <?php 
        // ici je j'ajoute mon "vérificateur" en utilisant la function "wp_nonce_field" qui permet de nomer mon formulaire
        // c'est grace a lui que je pourrais vérifier l'existance de mon formulaire d'ajout de données
        wp_nonce_field( 'header-hero_update', 'header-hero_form' ); 
      ?>
      <table class="form-table">
        <tbody>
          <tr>
            <th><label for="main-title">Main title</label></th>
            <td><input name="main-title" id="main-title" type="text" value="<?php echo get_option('header-hero_main-title'); ?>" class="regular-text" /></td>
          </tr>
          <tr>
            <th><label for="under-title">Under title</label></th>
            <td><input name="under-title" id="under-title" type="text" value="<?php echo get_option('header-hero_under-title'); ?>" class="regular-text" /></td>
          </tr>
          <tr>
            <th><label for="scroll-label">Scroll label</label></th>
            <td><input name="scroll-label" id="scroll-label" type="text" value="<?php echo get_option('header-hero_scroll-label'); ?>" class="regular-text" /></td>
          </tr>
          <tr>
            <th><label for="background-url">Background image url</label></th>
            <td><input name="background-url" id="background-url" type="text" value="<?php echo get_option('header-hero_background-url'); ?>" class="regular-text" /></td>
          </tr>
        </tbody>
      </table>
      <p class="submit">
        <?php
          // wordpress nous donne la possibilité de générer un bouton pour enregistrer les valeurs de notre formulaire
          submit_button(); 
        ?></p>
    </form>
  </div><?php 
}
```
ps: je sais c'est un code un peu avancé mais je vous encourage à tester de votre coté avec un peu moins de données, peut-être quelque chose de plus simple ?

ça devrait nous donner quelque chose comme ça dans notre administration :<br><img src=".screenshots/Screenshot 2022-12-04 at 23.39.56.png" alt="notre formulaire hero header terminé"><br>

Dans mon `html` maintenant il ne me reste plus qu'a changer les textes `static` par des donnée `dynamique`:
<details>
<summary>mon html d'avant:</summary>

```html
<section class="hero" id="home">
  <header>
    <h1 class="visually-hidden">SuperShoes</h1>
    <p class="h1 text-white">
      <span class="bg-primary">Ici, on répare vos chaussures</span><br>
      <small class="bg-secondary">pour que vous repartiez du bon pied</small>
    </p>
    <a href="#about" class="please-scroll">Scrollez vers le bas</a>
  </header>
</section>
```
</details>

Je vais donc utiliser la même `function` que j'ai utilisé dans mon `functions.php`, à savoir [get_option](https://developer.wordpress.org/reference/functions/get_option/) avec le nom du champs que je veux. Dans mon cas j'ai `4 champs` à récupérer ('`header-hero_background-url`', '`header-hero_main-title`', '`header-hero_under-title`', '`header-hero_scroll-label`').


Ce qui me donnera ça dans mon code :
```php
<section 
  class="hero" 
  id="home" 
  style="background-image: url(<?php echo get_template_directory_uri() .'/'. get_option('header-hero_background-url'); ?>);"
>
  <header>
    <h1 class="visually-hidden"><?php echo bloginfo('name'); ?></h1>
    <p class="h1 text-white">
      <span class="bg-primary"><?php echo get_option('header-hero_main-title'); ?></span><br>
      <small class="bg-secondary"><?php echo get_option('header-hero_under-title'); ?></small>
    </p>
    <a href="#about" class="please-scroll"><?php echo get_option('header-hero_scroll-label'); ?></a>
  </header>
</section>
```
ps: j'utilise `get_template_directory_uri` pour m'assurer que le lien de mon image démarre bien du bon endroit, c'est parfait je dois juste faire un petit changement dans le `css/style.css` pour retirer le style qui chargeait le l'image a l'origine:
```css
.hero {
  background-color: #000;
  /* background-image: url(../images/cordonnier.jpg); */
  background-repeat: no-repeat;
  background-position: center;
  background-size: cover;
  background-attachment: fixed;
}
```

</details>

---
### About
---
<img src=".screenshots/Screenshot 2022-11-28 at 10.08.53.png" alt="découpage maquette about">
<details>
<summary>La section About</summary>

Pour la section about je vais devoir plus tôt créer une "page" dans mon administration qui va me permettre de pouvoir gérer le **titre**, le **text** et **l'image**.

1. Dans mon administration je me rend dans l'onglet `pages`.
2. J'ajoute une page au nom de `About` (histoire de s'y retrouver).
3. J'ajoute mon contenu dans la page en question<br><img src=".screenshots/Screenshot 2022-12-03 at 16.04.48.png" alt="page about">
4. Je pense évidement a publier ma page sinon ça ne marche pas 

Dans notre code on va pouvoir utiliser la function [get_page_by_title()](https://developer.wordpress.org/reference/functions/get_page_by_title/).

Qui va me permettre d'aller chercher le contenu de la page en question (**content** et **thumbnail**).

<details>
<summary>Mon html avant:</summary>

```html
<section class="container section about" id="about">
  <div class="row align-items-center">
    <div class="col-md">
      <header>
        <h2 class="mb-3">Notre entreprise</h2>
      </header>
      <p class="lead">
        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Sunt reprehenderit hic eligendi assumenda quos animi consequatur tenetur atque nam. Quos aspernatur placeat fuga excepturi veritatis eos eveniet nemo magni facere.
      </p>
    </div>
    <div class="col-md">
      <img class="img-fluid" src="images/about.jpg" alt="cordonnier au travail">
    </div>
  </div>
</section>
```
</details>

On se retrouve donc avec un code comme celui-ci :
```php
<section class="container section about" id="about">
  <div class="row align-items-center">
    <div class="col-md">
      <?php $aboutSection = get_page_by_title('about'); ?>
      <header>
        <h2 class="mb-3"><?php echo $aboutSection->post_title; ?></h2>
      </header>
      <p class="lead"><?php echo $aboutSection->post_content; ?></p>
    </div>
    <div class="col-md">
      <img class="img-fluid" src="<?php echo get_the_post_thumbnail_url($aboutSection->ID, 'medium'); ?>" alt="cordonnier au travail">
    </div>
  </div>
</section>
```

On se retrouve donc avec quelque chose comme ça :<br><img src=".screenshots/Screenshot 2022-12-03 at 16.36.22.png" alt="about section result">

</details>

---
### Services
---
<img src=".screenshots/Screenshot 2022-11-28 at 10.09.00.png" alt="découpage maquette services"><br>
<details>
<summary>La section Services</summary>

Pour le moment j'ai quelque chose comme ça :<br><img src=".screenshots/Screenshot 2022-11-29 at 14.00.29.png" alt="mes services sans les images"><br>
C''est évidement problématique pour plusieurs raisons.

1. Le contenu n'est pas modifiable à moins d'aller le faire dans notre fichier `index.php`
2. Les images manquent.

Ce que je propose ici, c'est de rendre tout ça dynamique avec WordPress. On va créer un "type d'article" que l'on va appeler `servcices`.

1. On va donc se rendre dans notre fichier `functions.php` et ajouter :
```php
function create_post_type() {	 // function dans la quel j'ajouterais tous mes type de contenu
	register_post_type('services'/* le nom de mon type de contenu */, [ // tableau avec mes options 
		'labels' => [ // ça sera le nom afficher dans mon menu word press avec la traduction
			'name' => __('Services'), // __() permet a wordpress que c'est contenu de traduction
			'singular_name' => __('Services')
		],
    'supports' => ['title', 'editor', 'thumbnail'], // on precise que notre post_type support title(un titre), editor(l'éditeur de contenu) et thumbnail(une photo a la une)
		'public' => true, // c'est un post_type publique
		'has_archive' => false, // en cas de suppression on peut retrouver notre post disparu
  	'rewrite' => ['slug' => 'services'], // j'applique une réécriture d'url "services" au lieu de "slug"
		'menu_icon' => 'dashicons-clipboard' // je lui précise une icon dans la bar d'outil de l'admin wordpress
	]);
}
add_action('init', 'create_post_type');
```
ça donne ça dans l'admin wordpress :<br>
<img src=".screenshots/Screenshot 2022-11-29 at 14.14.59.png" alt="post type services">

<details>
<summary>Notes</summary>

---
Je peux retrouver la liste d'icons pour les menu wordpress [ici](https://developer.wordpress.org/resource/dashicons/#clipboard)

---
</details>

On se rend maintenant dans `index.php` au niveau de nos services.
```html
<div class="row">
  <div class="col-sm">
    <div class="card">
      <img src="images/cordonnier.jpg" class="card-img-top" alt="...">
      <div class="card-body">
        <h3 class="card-title h5">Réparation</h3>
        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nisi, accusantium?</p>
      </div>
    </div>
  </div>
  <div class="col-sm">
    <div class="card">
      <img src="images/cordonnier.jpg" class="card-img-top" alt="...">
      <div class="card-body">
        <h3 class="card-title h5">Entretien</h3>
        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nisi, accusantium?</p>
      </div>
    </div>
  </div>
  <div class="col-sm">
    <div class="card">
      <img src="images/cordonnier.jpg" class="card-img-top" alt="...">
      <div class="card-body">
        <h3 class="card-title h5">Sur mesure</h3>
        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nisi, accusantium?</p>
      </div>
    </div>
  </div>
</div>
```
on remplace donc nos `3 services` par `1 seul` pour créer une boucle qui fera un appel wordpress
```html
<!-- si on a des Services on les affiches -->
  <div class="row">
    <!-- on récupère nos service et on boucle dessus -->
    <div class="col-sm">
      <div class="card">
        <!-- on va remplacer l'image --><img src="images/cordonnier.jpg" class="card-img-top" alt="...">
        <div class="card-body">
          <!-- on va remplacer le tittre --><h3 class="card-title h5">Réparation</h3>
          <!-- on va remplacer le text --><p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nisi, accusantium?</p>
        </div>
      </div>
    </div>
  </div>
<!-- sinon on dit qu'on travail sur une proposision bientot -->
  <h5>On a pas encore de services a vous proposer mais ça arrive !</h5>
<!-- on continue -->
```
je commence donc par ajouter mes fameux article dans l'administration de mon Wordpress comme je le ferais pour n'importe quel **articles** ici:<br><img src=".screenshots/Screenshot 2022-11-29 at 14.44.29.png" alt="créer mes articles"><br>

ensuite j'ajoute mon code php dans `index.php` comme indiqué au dessus:
```php
<?php
  $services = new WP_Query([ // je crée une variable $services
    'post_type' => 'services', // la je précise quel post_type je veux (dans mon cas "services")
    'post_status' => 'publish', // la je précise que je veux des posts qui sont publié
    'limit' => 3, // dans mon cas je n'en ai besoin que de trois
    'orderby' => 'date', // je les trie par date 
    'date' => true // je récupéère ma date
  ]);

  if ($services->have_posts()): // ici je vérifie que $services posède bien mes posts
?>
  <div class="row">
    <?php 
      while ($services->have_posts()): // la je lance ma boucle sur mes posts contenu dans services
      $services->the_post(); // la récupère mon post
    ?>
      <div class="col-4">
        <div class="card">
          <img 
            src="<?php the_post_thumbnail_url(); ?>" // je vais chercher le lien de mon image
            class="card-img-top"
            alt="<?php the_title() ?> | service | <?php echo bloginfo('name'); ?>" // ici je crée un petit alt avec le titre du service et le nom du site
          >
          <div class="card-body">
            <h3 class="card-title h5"><?php the_title(); ?></h3> // j'intègre mon titre de service
            <p class="card-text"><?php the_content(); ?></p> // j'intègre mon contenu
          </div>
        </div>
      </div>
    <?php endwhile; ?>
  </div>
<?php else: ?>
  <h5>On a pas encore de services a vous proposer mais ça arrive !</h5>
<?php endif; ?>
```
niveau de mon template ça me donne ça:<br><img src=".screenshots/Screenshot 2022-11-29 at 14.54.02.png" alt="ce que donne la génération de mes service"><br>
niveau de mon `html` généré je me retrouve donc avec ce code la:
```html
<div class="row">
  <div class="col-sm">
    <div class="card">
      <img src="http://localhost:8888/test-wordpress/wp-content/uploads/2022/11/Screenshot-2022-11-28-at-11.43.01.png" class="card-img-top" alt="Sur mesure | service | monsite">
      <div class="card-body">
        <h3 class="card-title h5">Sur mesure</h3>
        <p class="card-text"></p><p>Jujubes oat cake cotton candy toffee pastry powder sweet fruitcake. Pudding caramels gummies marzipan gingerbread pudding carrot cake. Chocolate cake lemon drops apple pie oat cake wafer.</p>
        <p></p>
      </div>
    </div>
  </div>
  <div class="col-sm">
    <div class="card">
      <img src="http://localhost:8888/test-wordpress/wp-content/uploads/2022/11/Screenshot-2022-11-28-at-11.43.01.png" class="card-img-top" alt="Entretien | service | monsite">
      <div class="card-body">
        <h3 class="card-title h5">Entretien</h3>
        <p class="card-text"></p><p>Topping pudding wafer cookie jelly beans jelly-o gingerbread. Pie powder marzipan apple pie cake macaroon cheesecake. Soufflé brownie dessert jelly sweet roll. Marzipan gummies apple pie icing cheesecake chocolate cake apple pie.</p>
        <p></p>
      </div>
    </div>
  </div>
  <div class="col-sm">
    <div class="card">
      <img src="http://localhost:8888/test-wordpress/wp-content/uploads/2022/11/Screenshot-2022-11-28-at-11.43.01.png" class="card-img-top" alt="Réparation | service | monsite">
      <div class="card-body">
        <h3 class="card-title h5">Réparation</h3>
        <p class="card-text"></p><p>Cupcake chocolate pudding pastry gingerbread pastry candy. Chocolate bar jelly beans wafer biscuit wafer pudding sweet roll candy. Danish liquorice bonbon apple pie toffee chocolate.</p>
        <p></p>
      </div>
    </div>
  </div>
</div>
```

on pourra évidement proposer a notre client de lui faire un carousel [comme celui-ci](https://getbootstrap.com/docs/4.0/components/carousel/#with-captions) si il veut exposer plus de services a l'avenir

</details>

---
### Contact Form
---
<img src=".screenshots/Screenshot 2022-11-28 at 10.09.08.png" alt="découpage maquette contact">
<details>
<summary>La section Contact</summary>

Je vais maintenant m'attaquer au formulaire de contacte.
<details>
<summary>Le code de notre formulaire ressemble acutellement a ça :</summary>

```html
<div class="row">
  <form action="#" class="col-md">
    <p class="form-group">
      <label for="name">Votre nom et prénom</label>
      <input name="name" id="name" type="text" class="form-control">
    </p>
    <p class="form-group">
      <label for="subject">Sujet</label>
      <select name="subject" id="subject" class="form-control">
        <option value="0">Choisissez un sujet</option>
        <option value="devis">Demande de devis</option>
        <option value="question">Question</option>
        <option value="other">Autres</option>
      </select>
    </p>
    <p class="form-group">
      <label for="message">Votre message</label>
      <textarea name="message" id="message" class="form-control" rows="5"></textarea>
    </p>
    <p class="text-right">
      <button class="btn btn-primary">Envoyer</button>
    </p>
  </form>
  <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d10987.242951252556!2d4.37044401754503!3d50.85271187329156!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47c3c370c43d6195%3A0x94b0e4b9ad97de02!2sHaute%20%C3%89cole%20ISFSC!5e0!3m2!1sfr!2sbe!4v1602328508492!5m2!1sfr!2sbe" class="col-md-8 contact-map" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
</div>
```
</details>
Pour cette partie on va utiliser ce qu'on appel un [short code](https://www.wpbeginner.com/wp-tutorials/how-to-add-a-shortcode-in-wordpress/) dans WordPress, ça va nous permettre de générer des petits ou grand bout de code depuis une chaine de caractère dans notre editeur d'article ou de page.

par example dans notre `functions.php`:
```php
function create_shortcode(){
    return "<h2>Hello world !</h2>";
}
add_shortcode('my_shortcode', 'create_shortcode');
```
On va pouvoir utiliser:
```html
[my_shortcode]
```
Dans notre éditeur d'article:<br><img src=".screenshots/Screenshot 2022-12-05 at 10.07.51.png" alt="notre premier shortcode"><br>

Ce qui va du coup écrire `<h2>Hello world !</h2>` dans notre content pour la page Contact, par exemple mais ça peut marcher pour tout un tas d'autre article ou type d'article.

Pour notre formulaire de contact je vais donc créer une page `Contact` dans mon administration, ce que j'aimerais faire ici c'est ajouter du `html` directement dans mon article.

1. Ajouter un block `html` avec l'option :<br><img src=".screenshots/Screenshot 2022-12-05 at 10.24.27.png" alt="ajouter un block html">
2. notre page `Contact` :<br><img src=".screenshots/Screenshot 2022-12-05 at 10.24.33.png" alt="notre page html">
3. Je vais ajouter `[contact-form]` dans le contact.


On récupère la balise `<script></script>` qui permet de générer la carte :
```html
<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d10987.242951252556!2d4.37044401754503!3d50.85271187329156!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47c3c370c43d6195%3A0x94b0e4b9ad97de02!2sHaute%20%C3%89cole%20ISFSC!5e0!3m2!1sfr!2sbe!4v1602328508492!5m2!1sfr!2sbe" class="col-md-8 contact-map" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
```

Et je vais le copier dans le fomulaire je peux donc ajouter ça dans le formulaire de contact :

```html
[contact-form]

<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d10987.242951252556!2d4.37044401754503!3d50.85271187329156!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47c3c370c43d6195%3A0x94b0e4b9ad97de02!2sHaute%20%C3%89cole%20ISFSC!5e0!3m2!1sfr!2sbe!4v1602328508492!5m2!1sfr!2sbe" class="col-md-8 contact-map" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
```
Je devrais avoir ça :<br><img src=".screenshots/Screenshot 2022-12-05 at 10.25.06.png" alt="contact form">

On va construire `[contact-form]` dans `index.php` à la place du formulaire et de la carte je vais ajouter le code php qui me permetra de récupérer le contenu de la page contact.
```php
<div class="row">
  <?php
    $contactPage = get_page_by_title( 'contact' ); // je récupère la page contact
    echo apply_filters('the_content', $contactPage->post_content); // j'affiche le contenu qui vient de la page contact
  ?>
</div>
``` 
Dans mon fichier `functions.php` je vais ajouter le code suivant :
```php
add_shortcode('contact-form', 'display_contact_form');
/**
 * Cette fonction affiche les messages de validation, le message de réussite, le conteneur des messages de 
 * validation et le formulaire de contact.
 */
function display_contact_form() {
	?>
  <div class="col-md">
    <!-- c'est la div dans la quel on va envoyer nos erreurs -->
    <div id="validation-messages-container"></div>

    <form id="contact-form" action="<?php echo esc_url( get_permalink() ); ?>" method="post">
      <input type="hidden" name="contact_form">

      <p class="form-group">
        <label for="name"><?php echo esc_html( 'Votre nom et prénom', 'supershoes-theme' ); ?></label>
        <input type="text" id="name" name="name" class="form-control">
      </p>

      <p class="form-group">
        <label for="subject"><?php echo esc_html( 'Subject', 'supershoes-theme' ); ?></label>
        <select name="subject" id="subject" class="form-control">
          <option value="0">Choisissez un sujet</option>
          <option value="devis">Demande de devis</option>
          <option value="question">Question</option>
          <option value="other">Autres</option>
        </select>
      </p>

      <p class="form-group">
        <label for="message"><?php echo esc_html( 'Message', 'supershoes-theme' ); ?></label>
        <textarea id="message" name="message" class="form-control"></textarea>
      </p>

      <button type="submit" class="btn btn-primary" id="contact-form-submit">
        <?php echo esc_attr( 'Submit', 'supershoes-theme' ); ?>
      </button>

    </form>
  </div>
	<?php
}
```

Je vais me retrouver avec quelque chose comme ceci :<br><img src=".screenshots/Screenshot 2022-12-05 at 14.13.48.png" alt="première vision de notre formulaire"><br>
C'est bien mais ça ne fonctionne pas encore, je ne reçois pas encore de mail et rien n'est la pour indiquer un envoi quelconque du mail à l'utilisateur.

Je vais donc devoir ajouter un peu de `php` pour ça :
```php
add_shortcode('contact-form', 'display_contact_form');
/**
 * Cette fonction affiche les messages de validation, le message de réussite, le conteneur des messages de 
 * validation et le formulaire de contact.
 */
function display_contact_form() {
  $validation_messages = [];
	$success_message = '';

	if (isset($_POST['contact_form']) && $_POST['contact_form'] === 'true') {

		// Assainir les données
    // wordpress utilise "sanitize_text_field" pour récupérer les données de formulaire
		$name = isset( $_POST['name'] ) ? sanitize_text_field( $_POST['name'] ) : '';
		$subject = isset( $_POST['subject'] ) ? sanitize_text_field( $_POST['subject'] ) : '';
		$message = isset( $_POST['message'] ) ? sanitize_textarea_field( $_POST['message'] ) : '';

		// on vérifie les datas c'est par example ici que l'on pourra vérrifier si l'utilisateur a entré un email correct
		if ( strlen( $name ) === 0 ) {
			$validation_messages[] = esc_html__('Entrez un nom valide.', 'supershoes-theme');
		}

		if ( strlen( $message ) === 0 ) {
			$validation_messages[] = esc_html__('Entre un messaage valide.', 'supershoes-theme');
		}

		// envoyer l'mail a l'administrateur wordpress si il n'y a pas d'erreur
		if ( empty( $validation_messages ) ) {
			$mail    = get_option( 'admin_email' );
			$adminSubject = 'New message from ' . $name;
			$message = $message . ' - The email address of the customer is: ' . $mail;

			wp_mail( $mail, $adminSubject, $message );
			$success_message = esc_html__( 'Your message has been successfully sent.', 'supershoes-theme' );
		}
	} 
  
  // on montre les erreur que l'utilisateur a pu faire
  if ( ! empty( $validation_messages ) ) {
    foreach ( $validation_messages as $validation_message ) {
      echo '<div class="alert alert-danger" role="alert">' . esc_html( $validation_message ) . '</div>';
    }
  }

  // on montre que tous c'est bien passé 
  if ( strlen( $success_message ) > 0) {
    echo '<div class="alert alert-success" role="alert">' . esc_html( $success_message ) . '</div>';
  }
	?>
    <div class="col-md">

      <!-- c'est la div dans la quel on va envoyer nos erreurs -->
      <div id="validation-messages-container"></div>

      <form id="contact-form" action="<?php echo esc_url( get_permalink() ); ?>" method="post">
        <input type="hidden" name="contact_form" value="true">

        <p class="form-group">
          <label for="name"><?php echo esc_html( 'Votre nom et prénom', 'supershoes-theme' ); ?></label>
          <input type="text" id="name" name="name" class="form-control">
        </p>

        <p class="form-group">
          <label for="subject"><?php echo esc_html( 'Subject', 'supershoes-theme' ); ?></label>
          <select name="subject" id="subject" class="form-control">
            <option value="0">Choisissez un sujet</option>
            <option value="devis">Demande de devis</option>
            <option value="question">Question</option>
            <option value="other">Autres</option>
          </select>
        </p>

        <p class="form-group">
          <label for="message"><?php echo esc_html( 'Message', 'supershoes-theme' ); ?></label>
          <textarea id="message" name="message" class="form-control"></textarea>
        </p>

        <button type="submit" class="btn btn-primary" id="contact-form-submit">
          <?php echo esc_attr( 'Submit', 'supershoes-theme' ); ?>
        </button>

      </form>
    </div>
	<?php
}
```

</details>

---
### Footer
---
<img src=".screenshots/Screenshot 2022-11-28 at 10.09.15.png" alt="découpage maquette footer">
<details>
<summary>La section Footer</summary>

Rien de particulier à faire ici, je pourrais évidement ajouter une option du même style pour le hero-header... à toi de voir ce que tu veux faire pour cette partie-ci
</details>
