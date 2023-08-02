# Bootstrap dans WordPress

[Voir Github Version](https://github.com/Poulycroc/lessons-isfsc/blob/master/courses/07__bootstrap_dans_wordpress.md)<br>
[le projet 'montheme' complet](https://github.com/Poulycroc/lessons-isfsc/tree/master/wordpress/montheme)

## Importer Bootstrap
[source](https://www.tutowp.fr/comment-integrer-bootstrap-a-wordpress/)


### Ajoutons les éléments du framework Bootstrap à notre thème WordPress

Pour ajouter les fichiers du framework Bootstrap, nous allons créer un fichier "functions.php" à la racine de notre thème.

On va se rendre sur la [documentation Bootstrap](https://getbootstrap.com/docs/5.2/getting-started/introduction/) dans la partie [CDN links](https://getbootstrap.com/docs/5.2/getting-started/introduction/)

Comme vu précédemment, Bootstrap est constitué d’un ensemble de fichiers :
1. Un fichier « `bootstrap.css` » qui regroupe l’ensemble des styles du framework.
1. Un fichier « `bootstrap.bundle.js` » qui regroupe l’ensemble des js du framework.

Installons ces fichiers dans notre thème WordPress.<br>
dans notre fichier `functions.php`, on va ajouter quelques lignes, ce qui nous donnera :
```php
<?php

add_theme_support('title-tag'); // support de mon title tag
add_theme_support('post-thumbnails'); // support des images a la une

// Chargement des styles et des scripts Bootstrap sur WordPress
function wpbootstrap_styles_scripts(){
  wp_enqueue_style('style', get_stylesheet_uri());
    wp_enqueue_style('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css');
    wp_enqueue_script('bootstrap-bundle', 'https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js', false, 1, true);
}
add_action('wp_enqueue_scripts', 'wpbootstrap_styles_scripts'); // function qui va nous permettre de charger des function (perso ou autre a la chaine)
```

Nous utilisons une fonction « `wpbootstrap_styles_scripts` » que nous accrochons au hook « wp_enqueue_scripts ». Ce hook permet de charger les styles et scripts sur un thème WordPress.

Dans la fonction « `wpbootstrap_styles_scripts` », voici ce que nous faisons :

Nous ajoutons le style de base de notre thème, le fichier « style.css » avec la fonction « `wp_enqueue_style` » qui prends deux paramètres : le nom du style et l’url du fichier.

Nous ajoutons le fichier css de Bootstrap de la même manière.

<details>
<summary>Note:</summary>

On peut directement charger la librairie jQuery si on en besoin grâce à la fonction « `wp_enqueue_script` ». Il suffit d’indiquer « `jquery` » comme paramètre pour la charger car la librairie est présente par défaut dans WordPress.

```php
wp_enqueue_script('jquery');
```

si l'un de nos scripts a besoin de `jQuery` comme dépendence nous indiquerons `jquery` pour le deuxième paramètre nous indiquons que « `jquery` » doit être chargés.

```php
wp_enqueue_script('monscript', 'monscript.js', ['jquery']);
```
</details>
<br>

Nous chargeons le fichier « `bootstrap.bundle.js` » toujours grâce à la fonction « `wp_enqueue_script` » mais là, nous ajoutons des paramètres : 
1. le premier est le nom du script.
2. le deuxième est l’url des scripts.
3. le troisième permet de déterminer les dépendances nécessaires pour charger ces scripts (dans notre cas pas besoin de dépendence), on indiquera `false`.
4. Le quatrième paramètre désigne la version du script (nous mettons 1 par défaut).
5. Le cinquième paramètre détermine si oui ou non le script doit être chargé dans le footer. Pour ces deux fichiers, c’est bien le cas. Pourquoi ? Parce que les scripts chargés dans le footer ne bloquent pas le chargement de la page.

Maintenant que nous avons ajouté Bootstrap à WordPress, nous allons pouvoir passer à la création du thème à proprement parler.

## Redesign de nos articles

Pour le moment on a quelque chose comme ça dans notre `index.php`
```php
<?php get_header(); ?>
  <div class="container">
    <?php if (have_posts()): ?>
      <h1>Mes articles</h1>
      <ul>
        <?php while(have_posts()): the_post(); ?>
          <li>
            <?php the_post_thumbnail('thumbnail'); ?><br>
            <?php the_title() ?> - <?php the_author(); ?>
            <a href="<?php the_permalink(); ?>">lire l'article</a>
          </li>
        <?php endwhile; ?>
      </ul>
    <?php else: ?>
      <h1>Aucun articles disponible pour le moment</h1>
    <?php endif; ?>
  </div>
<?php get_footer(); ?>
```
C'est sympa, mais j'aimerais quand même avoir quelque chose de plus propre avec les [cards de chez bootstrap](https://getbootstrap.com/docs/5.2/components/card/).

On va simplement reprendre le code proposé par bootstrap et le placer dans une classe `.row` et `.col` pour les mettre en forme.

```html
<div class="row"> <!-- mon container -->
  <div class="col"> <!-- élément sur le quel je vais boucler -->
    <div class="card" style="width: 18rem;"> <!-- mon article -->
      <img src="..." class="card-img-top" alt="..."> <!-- mon thumbnail -->
      <div class="card-body">
        <h5 class="card-title">Card title</h5>
        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
        <a href="#" class="btn btn-primary">Go somewhere</a>
      </div>
    </div>
  </div>
</div>
```

Pour ajouter dynamiquement nos données dans nos cards je vais pouvoir y ajouter mes variables.
```php
<div class="row">
  <?php while(have_posts()): the_post(); ?>
    <div class="col">

      <div class="card" style="width: 18rem;">
        <?php the_post_thumbnail('thumbnail', ['class' => 'card-img-top']); ?>
        <div class="card-body">
          <h5 class="card-title"><?php the_title() ?></h5>
          <p class="card-text"><?php the_content() ?></p>
          <a href="<?php the_permalink(); ?>" class="btn btn-primary">lire l'article</a>
        </div>
      </div>

    </div>
  <?php endwhile; ?>
</div>
```
On peut noter que la seul grosse différence dans mon code c'est :
```php
<?php the_post_thumbnail('thumbnail', ['class' => 'card-img-top']); ?>
```
J'appelle ici `the_post_thumbnail` comme précédement mais j'ai ajouté des [attributs html](https://developer.mozilla.org/fr/docs/Web/HTML/Attributes#:~:text=Les%20%C3%A9l%C3%A9ments%20HTML%20ont%20descrit%C3%A8res%20souhait%C3%A9s%20par%20les%20utilisateurs.) . Dans ce cas, si j'ai ajouté la classe `card-img-top` pour corresponde a la documentation Bootstrap.

<details>
<summary>Note</summary>

---
Je peux utiliser `the_excerpt()` au lieu de `the_content()` si j'ai configuré des extraits pour mon article.

---
</details>

---
<br>

## Design d'une page d'article
[source](https://www.youtube.com/watch?v=CFbYbKu5dTg&list=PLjwdMgw5TTLWF1VV9TFWrsUTvWjtGS7Qt&index=8)

Pour le moment, on a une jolie page d'accueil, mais j'aimerais bien pouvoir designer mes pages d'article de manière un peu plus avancée. Pour cela, on va avoir besoin de comprendre comment WordPress fonctionne au niveau de sa [hiérarchie](https://fr.wordpress.org/support/article/hierarchie-des-fichiers-modeles/) ([hierarchy](https://developer.wordpress.org/themes/basics/template-hierarchy/) en anglais) visuelement ça donne ça :<br><img src="https://fr.wordpress.org/support/files/2022/07/wordpress-hierarchie-des-fichiers-modeles-juillet-2022.png" alt="wordpress.org - hierarchie" />

Dans cette image, on peut voir que quand WordPress charge une page d'article, on a besoin d'un fichier qui s'appelle `single-post.php` .

Je vais donc créer le fichier `single-post.php` dans mon projet et ajouter le code suivant dedans :
```php
<?php get_header(); ?>


  <?php if (have_posts()): ?>
    <h1 class="h1">Mes articles</h1>
    
    <?php while(have_posts()): the_post(); ?>
        
        <h1><?php the_title(); ?></h1>
        

        <p>
          <img src="<?php the_post_thumbnail_url(); ?>" style="width:100%;height:auto;" />
        </p>
        <?php the_content(); ?>

    <?php endwhile; ?>

  <?php else: ?>
    <h1>Aucun articles disponible pour le moment</h1>
  <?php endif; ?>

<?php get_footer(); ?>
```

<details>
<summary>Note</summary>

---
Je vois ici que j'ai utilisé `the_post_thumbnail_url()` plutot que `the_post_thumbnail()` c'est pour montrer que je peux simplement charger l'url directement plutot que le tag `img` directement.

---
</details>

ça va me donner quelque chose comme ça:<br><img src=".screenshots/Screenshot 2022-11-21 at 09.42.48.png" alt="ma page article">

---

## Page 404
Je vois dans l'image de ma [hiérarchie WordPress](https://fr.wordpress.org/support/files/2022/07/wordpress-hierarchie-des-fichiers-modeles-juillet-2022.png) que je peux aussi créer une page [404](https://www.1ere-position.fr/definitions/erreur-404/) (pour gérer mes erreurs) pour ça il me suffit de créer une fichier `404.php` dans mon projet.

Au niveau du code `php` on va se retrouver avec quelque chose comme ceci :
```php
<?php get_header(); ?>
  <h1>Page introuvable</h1>
  <p>
    y a rien a voir ici retournez a <a href="<?php echo home_url('/'); ?>">la page d'accueil</a>
  </p>
<?php get_footer(); ?>
```
<details>
<summary>Note</summary>

---
Pour rappel `home_url('/')` nous permet de générer une URL qui mène à notre page d'accueil.

---
</details>

Donc, lorsque vous saisissez une URL qui n'existe pas dans votre application, vous serez redirigé vers une page comme celle-ci :<br><img src=".screenshots/Screenshot 2022-11-21 at 09.51.43.png" alt="une page 404"/>


---

## Un home

Actuellement, nous avons une page d'accueil qui affiche simplement la liste de nos `articles`. Cependant, si je souhaite créer une page d'accueil plus sexy, comment puis-je procéder ?

<details>
<summary>Note</summary>

---
Je fais référence à ce genre de page, pour parler un peu de ce que l'on veut, par exemple...<br><img src="https://undsgn.com/wp-content/uploads/2018/06/des-5.jpg" alt="home page example" />

---
</details>

Dans ma [hiérarchie WordPress](https://fr.wordpress.org/support/files/2022/07/wordpress-hierarchie-des-fichiers-modeles-juillet-2022.png), je peux voir qu'on me propose de faire un fichier `front-page.php`<br><img src=".screenshots/Screenshot 2022-11-21 at 13.44.11.png" alt="make front-page.php" />

Dans mon fichier `front-page.php` je vais simplement ajouter 
```php
salut
```
Pour le moment, quand je me dirige vers l'url de base de mon site, je vois que je tombe sur mon fameux "salut".

Dans mon administration WordPress, je vais pouvoir ajouter et manager mes différentes pages, pour ce faire dans l'onglet **Pages** je vais ajouter 2 pages.

1. `Accueil` page qui va nous service de "home page".
2. `Actualités` page qui va simplement listé ma liste d'articles.

<img src=".screenshots/Screenshot 2022-11-21 at 17.59.24.png" alt="créer des pages" />

Ensuite toujours dans mon administration, je vais manager ses pages dans **Réglages -> Lecture**<br><img src=".screenshots/Screenshot 2022-11-21 at 13.57.48.png" alt="link pages">

1. Je séléctionne "page statique".
2. En page d'accueil, je vais chercher ma page nouvellement créée.
3. En page des articles, je vais chercher ma page "Actualités".
4. J'enregistre les modifications évidemment.

Je n'ai plus qu'à me rendre sur le fichier `front-page.php`.
```php
<?php get_header(); ?>

<?php while (have_posts()):  ?>
  <?php the_post(); ?>
  
  <h1><?php the_title(); ?></h1>

  <?php the_content(); ?>

  <a href="<?php echo get_post_type_archive_link('post') ?>">
    Voir les dernières actus
  </a>
<?php endwhile; ?>

<?php get_footer(); ?>
```
La function `get_post_type_archive_link` va me permettre de générer un lien vers les archives de type 'post' dans ce cas si (donc `get_post_type_archive_link('post')`)

Je devrais me retrouver avec une page comme celle-ci :<br><img src=".screenshots/Screenshot 2022-11-21 at 18.15.02.png" alt="front-page">

Je vous propose d'aller [dans le cours suivant](https://github.com/Poulycroc/lessons-isfsc/blob/master/courses/08__navbar_search.md) pour créer une navigation et un champ de recherche.