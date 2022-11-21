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