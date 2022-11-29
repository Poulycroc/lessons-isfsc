# Bootstrap dans WordPress

[Voir Github Version](https://github.com/Poulycroc/lessons-isfsc/blob/master/courses/09__integration_cordonnier.md)<br>
<!-- [le projet 'montheme' complet](https://github.com/Poulycroc/lessons-isfsc/tree/master/wordpress/montheme) -->

## Introduction

Récupérer le projet sur le [Github](https://github.com/gregholvoet/supershoes)
il y a 3 branches sur ce projet 
1. **start** le projet de départ sans aucunes modification, sans `html` ni `css`
2. **static** le projet est maintenant terminé sans de manière `static` donc le contenu est écrit en dur et n'est donc pas `dynamique`
3. **wordpress** branche de travail pour notre projet wordpress on va donc rendre notre le contenu `dynamique` 

<details>
<summary>Télécharger et placer le dossier</summary>

1. on va donc se rendre sur [le Github](https://github.com/gregholvoet/supershoes) et sélectionner la branche `static`<br><img src=".screenshots/Screenshot 2022-11-29 at 11.55.35.png" alt="selcetionner la banche static">
2. télécharger cette branche dans l'onglet **Code** > **Download Zip**<br><img src=".screenshots/Screenshot 2022-11-29 at 12.06.13.png" alt="télécharger la branche static">
3. on va simplement placer le dossier télécharger dans notre **wordpress** > **wp-content** > **themes** et renommer le dossier en "supershoes"<br><img src=".screenshots/Screenshot 2022-11-29 at 12.10.04.png" alt="placer le dossier dans themes">
</details>
<details>
<summary>Activer notre theme au yeux de wordpress</summary>

A la racine de notre nouveau projet on va ajouter `2 nouveaux fichiers` 
1. **functions.php** 
2. **style.css**

et finalement modifier le **index.html** en **index.php** 

dans notre fichier **style.css** on va simplement ajouter le nom de notre theme
```css
/*
Theme Name: Super Shoes
*/
```

c'est parti il ne reste plus qu'a activer notre theme<br><img src=".screenshots/Screenshot 2022-11-29 at 12.30.33.png" alt="activer notre nouveau theme">

</details>
<br>

## On entre dans le vif du sujet
Je vais donc m'attaquer a cette intégration dans **WordPress** comme on a déjà vu de manière plus détaillée chaque élémént d'un développement WordPress j'irais beaucoup plus rapidement sur les différente étapes n'hésitez donc pas a revenir dans les cours précédent si vous ne comprennez pas ce que je fais 

<details>
<summary>On découpe un peu l'application</summary>

---
on va déjà commencer par séparer notre header et footer du corps de notre theme histoire d'avoir quelque chose de plus propre..
on créer donc 2 fichiers
1. **header.php** qui va donc accueillir la partie `<head></head>` et `<header></header>` (dans la quel on a notre navigation)
2. **footer.php** qui va donc accueillir la partie `<footer></footer>`

dans notre fichier `index.php` on récupère
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
qu'on placer dans le fichier `header.php`
opn va évidement penser a y mettre la function `get_header()` a la place de que l'on vient de retirer
```php
<?php get_header(); ?>
```

pour le footer pareil!.. on récupère:
```html
  <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  <script src="js/script.js"></script>
</body>
</html>
```
que l'on va placer dans `footer.php` on oublie évidement pas non plus de remplacer ce code par la function `get_footer()`
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
comme vu dans le cours je vais avoir besoin d'ajouter pas mal de petit élément de functions propre a wordpress

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

1. remplacer l'attribu `lang` de notre balise `<html>` pour le rendre dynamique
2. on retir notre balise `<title></title>` puisqu'elle sera chargnée dans `functions.php`
3. on supprime les lignes `<link />` qui chargent le css de bootstrap et notre css custom
4. on ajoute `<?php wp_head(); ?>` pour charger le header de worpress
5. on va customiser le lien `navbar-brand` avec `bloginfo()` et `home_url()`
6. on ajoute `body_class()` au cas ou on aurait besoin dans notre design
7. ajoute finalement `wp_body_open()` pour prévenir wordpress qu'on ouvre le body a cet endroit
---
</details>
<details>
<summary>On s'occupe du footer.php</summary>

---
dans le footer ça ira un peu plus vite

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

1. retirer toutes les lignes de `<scripts>` (on les ajoutera dans functions.php)
2. ajouter la function `wp_footer()`
---
</details>
<details>
<summary>Dans notre fichier préféré... functions.php</summary>

---
pour ce theme si j'ai envie de cahrger mes style perso directement dans `functions.php` pour vous montrer comment ça marche


```php
<?php

add_theme_support('title-tag'); // support de mon title tag
add_theme_support('post-thumbnails'); // support du thumbnail sur mes articles
add_theme_support('menus'); // support des menus WordPress

function wpbootstrap_styles_scripts() {
  wp_enqueue_style('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css');
  wp_enqueue_style('style', get_template_directory_uri() .'/css/style.css', ['bootstrap'], true);

  wp_enqueue_script('jquery');
  wp_enqueue_script('bootstrap-bundle', 'https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js', false, '1.0.0', true);
  wp_enqueue_script('scripts', get_template_directory_uri().'/js/script.js', ['jquery'], '1.0.0', true);
}
add_action('wp_enqueue_scripts', 'wpbootstrap_styles_scripts');
```

1. J'ajoute mes `add_theme_support()`
2. j'ajoute `wpbootstrap_styles_scripts()` dans le quel je charge `bootstrap` **css** et **bundle** 

donc si jamais:
```php
wp_enqueue_style('style', get_template_directory_uri() .'/css/style.css', ['bootstrap'], true);
```
la je charge mon style perso en lui précisent qu'il a besoin de "bootstrap" avant d'être chargé.. même chose pour nos script js perso, sauf que lui il a besoin de [jQuery](https://jquery.com/)
```php
wp_enqueue_script('scripts', get_template_directory_uri().'/js/script.js', ['jquery'], '1.0.0', true);
```

on peut aussi remarquer que pour `jQuery` je n'ai pas eu besoind de préciser a wordpress ou le trouver, c'est simplement parcequ'il embarque cette librairie directement avec lui donc il l'a connait

---
</details>

---
### NavBar
---
<img src=".screenshots/Screenshot 2022-11-28 at 10.08.28.png" alt="découpage maquette navbar">

---
### Header
---
<img src=".screenshots/Screenshot 2022-11-28 at 10.08.46.png" alt="découpage maquette header">

---
### About
---
<img src=".screenshots/Screenshot 2022-11-28 at 10.08.53.png" alt="découpage maquette about">

---
### Services
---
<img src=".screenshots/Screenshot 2022-11-28 at 10.09.00.png" alt="découpage maquette services"><br>
pour le moment j'ai quelque chose comme ça:<br><img src=".screenshots/Screenshot 2022-11-29 at 14.00.29.png" alt="mes services sans les images"><br>
c'est évidement problématique pour plusiers raisons

1. le contenu n'est pas mofifiable a moin d'aller le faire dans notre fichier `index.php`
2. les images manquent

ce que je propose ici c'est de rendre tout ça dynamique avec WordPress on va créer un "type d'article" que l'on va appeler `servcices`

1. on va donc se rendre dans notre fichier `functions.php` et ajouter:
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
ça donne ça dans l'admin wordpress<br>
<img src=".screenshots/Screenshot 2022-11-29 at 14.14.59.png" alt="post type services">

<details>
<summary>Notes</summary>

---
Je peux retrouver la liste d'icons pour les menu wordpress [ici](https://developer.wordpress.org/resource/dashicons/#clipboard)

---
</details>

on se rend maintenant dans `index.php` au niveau de nos services..
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
      <div class="col-sm">
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

---
### Contact Form
---
<img src=".screenshots/Screenshot 2022-11-28 at 10.09.08.png" alt="découpage maquette contact">

---
### Footer
---
<img src=".screenshots/Screenshot 2022-11-28 at 10.09.15.png" alt="découpage maquette footer">
