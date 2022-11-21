# Création de contenu 

[Voir Github Version](https://github.com/Poulycroc/lessons-isfsc/blob/master/courses/06__nos_premier_contenu.md)

## Les Articles

Comme on l'a vu précédement WordPress permet de créer des `articles (posts en anglais)`, j'aimerais évidement pouvoir visualiser ces articles dans mon site web...  
<details>
<summary>(pour rappel) - Création d'artcle dans WordPress</summary>

-------------------
1. Je me dirige la page `articles` (`posts` en anglais)<br><img src=".screenshots/Screenshot 2022-11-20 at 17.20.50.png" alt="création d'un article étape 1">
2. je clique sur ajouter<br><img src=".screenshots/Screenshot 2022-11-20 at 17.24.03.png" alt="création d'un article étape 2">
3. J'écris mon article intéressant<br><img src=".screenshots/Screenshot 2022-11-20 at 17.25.42.png" alt="création d'un article étape 3">
3. Je le publie en cliquant sur "publier"<br><img src=".screenshots/Screenshot 2022-11-20 at 17.25.53.png" alt="création d'un article étape 3">
4. je vais pouvoir confirmer mes modification en cliquant encore sur publier (au passage WordPress m'indiquera quelque information sur mon article)<br><img src=".screenshots/Screenshot 2022-11-20 at 17.26.19.png" alt="publicatuion d'article dernière étape">
5. je peux donc voir mon `article` dans la liste d'articles de WordPress<br><img src=".screenshots/Screenshot 2022-11-20 at 17.33.34.png" alt="résultats">

-------------------
</details>

<br>

### Lister mes `articles`
Je vais me rendre sur le fichier `index.php` de mon theme 

<details>
<summary>(pour rappel) - Mon fichier `index.php` se trouve ici</summary>

-------------------
**Mac** : \Application\MAMP\htdocs\test-wordpress\wp-content\themes\montheme\index.php
**Windows** : C:\MAMP\htdocs\test-wordpress\wp-content\themes\montheme\index.php

<img src=".screenshots/Screenshot 2022-11-20 at 17.41.17.png" alt="localisation de mon fichier index.php">

-------------------
</details>
<br>

Premièrement on va vérifier son a des articles avec la `function` [have_posts()](https://developer.wordpress.org/reference/functions/have_posts/) , cette `function` va donc être utilisé dans une condition `if (have_posts())` si j'ai des articles je les affiche sinon je préviens le visiteurs que je n'ai pas d'article a lui montrer

le code de ma page `index.php` devrait ressember a ça
```php
<?php get_header(); ?>
  <?php if (have_posts()): ?>
    <h1>Mes articles</h1>
    // on fera ici une boucle sur les articles que jai écris
  <?php else: ?>
    <h1>Aucun articles disponible pour le moment</h1>
  <?php endif; ?>
<?php get_footer(); ?>
```

pour parcourir nos article on va donc utiliser une boucle `while` (afficher mes `articles` tant que j'en ai) pour ce la faire je vais utiliser la `function` [have_posts()](https://developer.wordpress.org/reference/functions/have_posts/) et je vais évidement devoir afficher chacun des `articles` pour ça je vais récupérer une function WordPress [the_post()](https://developer.wordpress.org/reference/functions/the_post/) qui va me permettre de construire mon `article` et va me donner accès a d'autre function comme [the_title()](https://developer.wordpress.org/reference/functions/the_title/), [the_author()](https://developer.wordpress.org/reference/functions/the_author/) et [the_permalink()](https://developer.wordpress.org/reference/functions/the_permalink/) par exemple

je peux donc intégrer se code: 
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
dans ma condition `have_posts()` que l'on a vu plus haut ce qui va nous donner
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

---- 

### Charger une image pour notre article

pour rendre mes `articles` un peu plus sexy j'aimerais ajouter une `Image mise en avant` (`thumbnail` en anglais) (c'est une image qui va être affiché en tête de notre article) problème.. quand je me rend dans l'édition de mon article pour ajouter cette fameuse image je me rend compte que je n'ai pas la possibilité de le faire <br><img src=".screenshots/Screenshot 2022-11-20 at 19.04.17.png" alt="pas de possibilité d'ajouter une image a la une dans notre article"><br>c'est normal notre theme ne le support pas pour ajouter l'option on va devoir aller dans notre fichier `functions.php` et ajouter une function [add_theme_support()](https://developer.wordpress.org/reference/functions/add_theme_support/)

dans mon fichier `functions.php`:
```php
<?php

add_theme_support('title-tag'); // support de mon title tag
add_theme_support('post-thumbnails'); // support des images a la une
```

si je me rends a nouveau dans l'édition de ce même article je vois que j'ai une nouvelle option qui s'affiche:<br><img src=".screenshots/Screenshot 2022-11-20 at 19.13.55.png" alt="nouvelle option pour ajouter des image a la une">

<details>
<summary>ajouter une image</summary>

-------------------
1. J'ouvre "Image mise en avant"
2. Définir l'image mise en avant <br><img src=".screenshots/Screenshot 2022-11-20 at 19.16.20.png" alt="add image">
3. J'ai une modal qui s'ouvre dans la quel je vais pouvoir sélectionner mon image a mettre en avant <br><img src=".screenshots/Screenshot 2022-11-20 at 19.16.40.png" alt="image selection">
4. Une foi mon image selectionée je vais avoir quelque informations dessus et aussi pouvoir confirmer mon ajout <br><img src=".screenshots/Screenshot 2022-11-20 at 19.17.25.png" alt="confirm image selection">
5. Je me retrouve donc avec mon image<br><img src=".screenshots/Screenshot 2022-11-20 at 19.17.36.png" alt="resluts">
6. on oublie évidement pas d'enregistrer notre article<br><img src=".screenshots/Screenshot 2022-11-20 at 19.23.36.png" alt="save image">

-------------------
</details>

pour afficher cette image dans ma liste d'article je vais évidement devoir revenir dans le code et ajouter [the_post_thumbnail()](https://developer.wordpress.org/reference/functions/the_post_thumbnail/) la ou j'ai envie, cette function va nous générer une tag `img` dans mon code j'ajoute donc:

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
et sur notre site...<br><img src=".screenshots/Screenshot 2022-11-20 at 19.33.24.png" alt="première image"><br>
je vois que mon image est bien trop grande je vais avoir envie de la réduire en utilisant les fonctionnalité par défaut de WordPress que je peux retrouver dans **Réglages > Médias**

<details>
<summary>réglages medias de WordPress</summary>

-------------------
1. Réglages > Médias<br><img src=".screenshots/Screenshot 2022-11-20 at 19.35.59.png" alt="Réglages > Médias">
1. Je vois que j'ai 3 tailles par défaut on va choisir une petite taille pour le moment<br><img src=".screenshots/Screenshot 2022-11-20 at 19.40.10.png" alt="Réglages > Médias">

-------------------
</details>

pour choisir la petite taille de mes image je vais simplement ajouter une option dans ma `function` `the_post_thumbnail`, j'ai plusieurs choix possible
```php
<?php
the_post_thumbnail('thumbnail'); // pour une taille de 150px × 150px
the_post_thumbnail('medium'); // pour une taille de 300px × 300px
the_post_thumbnail('medium_large'); // pour une taille de 768px × 0px
the_post_thumbnail('large'); // pour une taille de 1024px × 1024px
```
dans notre cas `thumbnail` me semble bien

on applique les changements
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
voyons ce que ça donne en `html`
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
et sur notre site...<br><img src=".screenshots/Screenshot 2022-11-20 at 19.48.58.png" alt="première image"><br>


----
### Ajouter encore plus des sexy a notre theme avec **Bootstrap**

On commence a avoir quelque chose de sympa mais c'est pas super super ça serait plus rapide et surtout plus simple d'ajouter [Bootstrap](https://getbootstrap.com/) a notre theme

Je vous propose d'aller [dans le cours suivant](https://github.com/Poulycroc/lessons-isfsc/blob/master/courses/07__bootstrap_dans_wordpress.md) pour ça.