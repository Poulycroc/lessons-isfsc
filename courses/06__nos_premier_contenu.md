# Création de contenu 

[Voir Github Version](https://github.com/Poulycroc/lessons-isfsc/blob/master/courses/06__nos_premier_contenu.md)<br>
[le projet 'montheme' complet](https://github.com/Poulycroc/lessons-isfsc/tree/master/wordpress/montheme)

## Les Articles

Comme nous l'avons vu précédemment, WordPress permet de créer des `articles (posts en anglais)`, j'aimerais évidement pouvoir visualiser ces articles dans mon site web.
<details>
<summary>(pour rappel) - Création d'articles dans WordPress</summary>

-------------------
1. Je me dirige vers la page `articles` (`posts` en anglais)<br><img src=".screenshots/Screenshot 2022-11-20 at 17.20.50.png" alt="création d'un article étape 1">
2. Je clique sur "Ajouter"<br><img src=".screenshots/Screenshot 2022-11-20 at 17.24.03.png" alt="création d'un article étape 2">
3. J'écris mon article intéressant<br><img src=".screenshots/Screenshot 2022-11-20 at 17.25.42.png" alt="création d'un article étape 3">
3. Je le publie en cliquant sur "Publier"<br><img src=".screenshots/Screenshot 2022-11-20 at 17.25.53.png" alt="création d'un article étape 3">
4. Je vais pouvoir confirmer mes modifications en cliquant à nouveau sur "Publier" (au passage, WordPress m'indiquera quelques informations sur mon article).<br><img src=".screenshots/Screenshot 2022-11-20 at 17.26.19.png" alt="publicatuion d'article dernière étape">
5. Je peux donc voir mon `article` dans la liste d'articles de WordPress<br><img src=".screenshots/Screenshot 2022-11-20 at 17.33.34.png" alt="résultats">

-------------------
</details>

<br>

### Lister mes `articles`
Je vais me rendre sur le fichier `index.php` de mon thème 

<details>
<summary>(pour rappel) - Mon fichier `index.php` se trouve ici</summary>

-------------------
**Mac** : \Application\MAMP\htdocs\test-wordpress\wp-content\themes\montheme\index.php
**Windows** : C:\MAMP\htdocs\test-wordpress\wp-content\themes\montheme\index.php

<img src=".screenshots/Screenshot 2022-11-20 at 17.41.17.png" alt="localisation de mon fichier index.php">

-------------------
</details>
<br>

Premièrement on va vérifier si on a des articles avec la `function` [have_posts()](https://developer.wordpress.org/reference/functions/have_posts/) , cette `function` va donc être utilisé dans une condition `if (have_posts())` si j'ai des articles, je les affiche ; sinon, je préviens le visiteur que je n'ai pas d'articles à lui montrer.

Le code de ma page `index.php` devrait ressember a ceci :
```php
<!-- Appel de notre 'header' sur la page -->
<?php get_header(); ?>

<!-- La on place la condition "si articles alors..." -->
<?php if (have_posts()): ?>
    <h1>Mes articles</h1>
    <!-- C'est ici qu'on pourra afficher nos articles -->
<?php else: ?>
    <h1>Aucun articles disponible pour le moment</h1>
<?php endif; ?>

<!-- Appel de notre 'footer' sur la page -->
<?php get_footer(); ?>
```

pour parcourir nos articles on va donc utiliser une boucle `while` (afficher mes `articles` tant que j'en ai) pour ce la faire je vais utiliser la `function` [have_posts()](https://developer.wordpress.org/reference/functions/have_posts/) et je vais évidement devoir afficher chacun des `articles` pour ça je vais récupérer une function WordPress [the_post()](https://developer.wordpress.org/reference/functions/the_post/) qui va me permettre de construire mon `article` et va me donner accès à d'autre function comme [the_title()](https://developer.wordpress.org/reference/functions/the_title/), [the_author()](https://developer.wordpress.org/reference/functions/the_author/) et [the_permalink()](https://developer.wordpress.org/reference/functions/the_permalink/) par exemple

Je peux donc intégrer ce code :
```php
<ul>
  <?php while(have_posts()): the_post(); ?>
    <li>
      <?php the_title() ?> - <?php the_author(); ?>
      <a href="<?php the_permalink(); ?>">lire l'article</a>
    </li>
  <?php endwhile; ?>
</ul>
```
dans ma condition `have_posts()` que l'on a vu plus tôt, ce qui va nous donner :
```php
<?php get_header(); ?>

<div class="container">
    <?php if (have_posts()): ?>
      <h1>Mes articles</h1>

      <ul>
        <?php while(have_posts()): the_post(); ?>
          <li>
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
ce qui donne en `html`
```html
<div class="container">
  <h1>Mes articles</h1>

  <ul>
    <li>  
      Un nouvel article - test
      <a href="http://localhost:8888/test-wordpress/2022/11/20/un-nouvel-article/">lire l'article</a>
    </li>
    <li>
      je sais pas - test
      <a href="http://localhost:8888/test-wordpress/2022/11/07/je-sais-pas/">lire l'article</a>
    </li>
    <li>
      Bonjour - test
      <a href="http://localhost:8888/test-wordpress/2022/10/23/bonjour-tout-le-monde/">lire l'article</a>
    </li>
  </ul>
</div>
```
le résultat:<br><img src=".screenshots/Screenshot 2022-11-20 at 18.26.10.png" alt="notre liste d'articles">

Vous pouvez consulter la liste de toutes les fonctions utiles pour afficher un article dans une boucle [ici](https://developer.wordpress.org/themes/basics/the-loop/)

---- 

### Charger une image pour notre article

Pour rendre mes `articles` un peu plus sexy j'aimerais ajouter une `Image mise en avant` (`thumbnail` en anglais) (c'est une image qui va être affichée en haut de notre article). Cependant, un problème survient : quand je me rends dans l'édition de mon article pour ajouter cette fameuse image, je me rends compte que je n'ai pas la possibilité de le faire.<br><img src=".screenshots/Screenshot 2022-11-20 at 19.04.17.png" alt="pas de possibilité d'ajouter une image a la une dans notre article"><br>c'est normal, notre thème ne le supporte pas. Pour ajouter cette option, on va devoir aller dans notre fichier `functions.php` et ajouter une function [add_theme_support()](https://developer.wordpress.org/reference/functions/add_theme_support/).

Dans mon fichier `functions.php`:
```php
<?php

add_theme_support('title-tag'); // support de mon title tag
add_theme_support('post-thumbnails'); // support des images a la une
```

Si je me rends à nouveau dans l'édition de ce même article, je vois qu'une nouvelle option s'affiche :<br><img src=".screenshots/Screenshot 2022-11-20 at 19.13.55.png" alt="nouvelle option pour ajouter des image a la une">

<details>
<summary>ajouter une image</summary>

-------------------
1. J'ouvre "Image mise en avant"
2. Définir l'image mise en avant <br><img src=".screenshots/Screenshot 2022-11-20 at 19.16.20.png" alt="add image">
3. J'ai une fenêtre modale qui s'ouvre, dans laquelle je vais pouvoir sélectionner mon image à mettre en avant.<br><img src=".screenshots/Screenshot 2022-11-20 at 19.16.40.png" alt="image selection">
4. Une fois mon image sélectionnée, je vais avoir quelques informations à son sujet et je pourrai aussi confirmer mon ajout.<br><img src=".screenshots/Screenshot 2022-11-20 at 19.17.25.png" alt="confirm image selection">
5. Je me retrouve donc avec mon image<br><img src=".screenshots/Screenshot 2022-11-20 at 19.17.36.png" alt="resluts">
6. On oublie évidement pas d'enregistrer notre article<br><img src=".screenshots/Screenshot 2022-11-20 at 19.23.36.png" alt="save image">

-------------------
</details>

Pour afficher cette image dans ma liste d'articles, je vais évidemment devoir revenir dans le code et ajouter :[the_post_thumbnail()](https://developer.wordpress.org/reference/functions/the_post_thumbnail/) là où j'ai envie. Cette fonction va générer une balise `img` dans mon code. J'ajoute donc :

```php
<?php get_header(); ?>
  <div class="container">
    <?php if (have_posts()): ?>
      <h1>Mes articles</h1>
      <ul>
        <?php while(have_posts()): the_post(); ?>
          <li>
            <?php the_post_thumbnail(); ?><br>
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
voyons ce que ça donne en `html`
```html
<div class="container">
  <h1>Mes articles</h1>

  <ul>
    <li>
      <img width="1920" height="1080" src="http://localhost:8888/test-wordpress/wp-content/uploads/2022/11/thumb-1920-941898.jpeg" class="attachment-post-thumbnail size-post-thumbnail wp-post-image" alt="" decoding="async" srcset="http://localhost:8888/test-wordpress/wp-content/uploads/2022/11/thumb-1920-941898.jpeg 1920w, http://localhost:8888/test-wordpress/wp-content/uploads/2022/11/thumb-1920-941898-300x169.jpeg 300w, http://localhost:8888/test-wordpress/wp-content/uploads/2022/11/thumb-1920-941898-1024x576.jpeg 1024w, http://localhost:8888/test-wordpress/wp-content/uploads/2022/11/thumb-1920-941898-768x432.jpeg 768w, http://localhost:8888/test-wordpress/wp-content/uploads/2022/11/thumb-1920-941898-1536x864.jpeg 1536w" sizes="(max-width: 1920px) 100vw, 1920px" /><br> 
      Un nouvel article - test
      <a href="http://localhost:8888/test-wordpress/2022/11/20/un-nouvel-article/">lire l'article</a>
    </li>
    <li>
      je sais pas - test
      <a href="http://localhost:8888/test-wordpress/2022/11/07/je-sais-pas/">lire l'article</a>
    </li>
    <li>
      Bonjour - test
      <a href="http://localhost:8888/test-wordpress/2022/10/23/bonjour-tout-le-monde/">lire l'article</a>
    </li>
  </ul>
</div>
```
Et sur notre site : <br><img src=".screenshots/Screenshot 2022-11-20 at 19.33.24.png" alt="première image"><br>
Je constate que mon image est bien trop grande. J'aurai envie de la réduire en utilisant les fonctionnalités par défaut de WordPress, que je peux retrouver dans : **Réglages > Médias**

<details>
<summary>Réglages medias de WordPress</summary>

-------------------
1. Réglages > Médias<br><img src=".screenshots/Screenshot 2022-11-20 at 19.35.59.png" alt="Réglages > Médias">
2. Je constate que j'ai 3 tailles par défaut. On va choisir une petite taille pour le moment.<br><img src=".screenshots/Screenshot 2022-11-20 at 19.40.10.png" alt="Réglages > Médias">

-------------------
</details>

Pour choisir la petite taille de mes images, je vais simplement ajouter une option dans ma`function` `the_post_thumbnail`, j'ai plusieurs choix possibles.
```php
<?php
the_post_thumbnail('thumbnail'); // pour une taille de 150px × 150px
the_post_thumbnail('medium'); // pour une taille de 300px × 300px
the_post_thumbnail('medium_large'); // pour une taille de 768px × 0px
the_post_thumbnail('large'); // pour une taille de 1024px × 1024px
```
Dans notre cas `thumbnail` me semble bien.

On applique les changements :
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
Voyons ce que ça donne en `html` :
```html
<div class="container">
  <h1>Mes articles</h1>

  <ul>
    <li>
      <img width="150" height="150" src="http://localhost:8888/test-wordpress/wp-content/uploads/2022/11/thumb-1920-941898-150x150.jpeg" class="attachment-thumbnail size-thumbnail wp-post-image" alt="" decoding="async" /><br>
      Un nouvel article - test
      <a href="http://localhost:8888/test-wordpress/2022/11/20/un-nouvel-article/">lire l'article</a>
    </li>
    <li>
      je sais pas - test
      <a href="http://localhost:8888/test-wordpress/2022/11/07/je-sais-pas/">lire l'article</a>
    </li>
    <li>
      Bonjour - test
      <a href="http://localhost:8888/test-wordpress/2022/10/23/bonjour-tout-le-monde/">lire l'article</a>
    </li>
  </ul>
</div>
```
et sur notre site :<br>
<img src=".screenshots/Screenshot 2022-11-20 at 19.48.58.png" alt="première image"><br>


----
### Ajouter encore plus des sexy a notre theme avec **Bootstrap**

On commence à avoir quelque chose de sympa, mais ce n'est pas encore parfait. Ça serait plus rapide et surtout plus simple d'ajouter [Bootstrap](https://getbootstrap.com/) à notre thème

Je vous propose d'aller [dans le cours suivant](https://github.com/Poulycroc/lessons-isfsc/blob/master/courses/07__bootstrap_dans_wordpress.md) pour ça.
