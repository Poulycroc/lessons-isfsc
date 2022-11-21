# Bootstrap dans WordPress

[Voir Github Version](https://github.com/Poulycroc/lessons-isfsc/blob/master/courses/07__bootstrap_dans_wordpress.md)

## Importer Bootstrap
[source](https://www.tutowp.fr/comment-integrer-bootstrap-a-wordpress/)


### Ajoutons les éléments du framework Bootstrap à notre thème WordPress

Pour ajouter les fichiers du framework Bootstrap, nous allons créer un fichier « functions.php » à la racine de notre thème.

on va se rendre sur la [documentation Bootstrap](https://getbootstrap.com/docs/5.2/getting-started/introduction/) dans la partie [CDN links](https://getbootstrap.com/docs/5.2/getting-started/introduction/)

Comme vu précédemment, Bootstrap est constitué d’un ensemble de fichiers :
1. Un fichier « `bootstrap.css` » qui regroupe l’ensemble des styles du framework
1. Un fichier « `bootstrap.bundle.js` » qui regroupe l’ensemble des js du framework

Installons ces fichiers sur notre thème WordPress.<br>
dans notre fichier `functions.php` on va ajouter quelque ligne ce qui nous donnera:
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

si l'un de nos scripts a besoin de `jQuery` comme dépendence nous indiquerons `jquery` pour le deuxième paramètre nous indiquons que « `jquery` » doivent être chargés.

```php
wp_enqueue_script('monscript', 'monscript.js', ['jquery']);
```
</details>
<br>

Nous chargeons le fichier « `bootstrap.bundle.js` » toujours grâce à la fonction « `wp_enqueue_script` » mais là, nous ajoutons des paramètres : 
1. le premier est le nom du script, 
2. le deuxième est l’url des scripts,
3. le troisième permet de déterminer les dépendances nécessaires pour charger ces scripts (dans notre cas pas besoin de dépendence), on indiquera `false`
4. Le quatrième paramètre désigne la version du script (nous mettons 1 par défaut)
5. le cinquième détermine si oui ou non le script doit être chargé dans le footer. Pour ces deux fichiers, c’est bien le cas. Pourquoi ? Parce que les scripts chargés dans le footer ne bloque pas le chargement de la page

Maintenant que nous avons ajouté Bootstrap à WordPress, nous allons pouvoir passer à la création du thème à proprement parler.

## Redesign de nos articles

pour le moment on a quelque chose comme ça dans notre `index.php`
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
c'est sympa mais j'aimerais quand même avoir quelque chose de plus propre avec les [cards de chez bootstrap](https://getbootstrap.com/docs/5.2/components/card/)

on va simplement reprendre le code proposé par bootstrap et le placer dans une classe `.row` et `.col` pour les mettre en formes

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

pour ajouter dynamiquement nos données dans nos cards je vais pouvoir y ajouter mes variables
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
on peut noter que la seul grosse différence dans mon code c'est
```php
<?php the_post_thumbnail('thumbnail', ['class' => 'card-img-top']); ?>
```
j'appel ici `the_post_thumbnail` comme précédement mais j'ai jouter des [attributs html](https://developer.mozilla.org/fr/docs/Web/HTML/Attributes#:~:text=Les%20%C3%A9l%C3%A9ments%20HTML%20ont%20des,crit%C3%A8res%20souhait%C3%A9s%20par%20les%20utilisateurs.) dans ce cas si j'ai ajouté la classe `card-img-top` pour corresponde a la documentation Bootstrap