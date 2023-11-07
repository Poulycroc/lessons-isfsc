# Petit projet list d'articles / page article

## Structure des Fichiers

Votre structure de thème se compose comme suit :

- `assets/` : Ce dossier contiendra vos ressources statiques comme les CSS et les images.
- `footer.php` : Contient le pied de page de votre site.
- `functions.php` : Utilisé pour ajouter des fonctionnalités au thème.
- `header.php` : Contient l'en-tête de votre site.
- `index.php` : Le fichier principal qui affiche le contenu de votre site.
- `single.php` : Utilisé pour afficher un post ou un article individuel.
- `style.css` : Le fichier principal CSS qui gère le style global du thème.

## Les Fichiers en Détail

### Fichier `assets/css/app.css`

Ce fichier contient tous les styles de votre thème. Vous avez défini des variables CSS pour gérer les couleurs et vous avez écrit des règles CSS pour structurer votre site. Les commentaires vous guident sur la partie avancée du CSS qui peut ne pas être compatible avec tous les navigateurs.

### Fichier `footer.php`

```php
<footer>
  <span>
    ISFSC Wordpress demo | 2023
  </span>
</footer>

<?php wp_footer(); ?>
</body>
</html>
```

Ce fichier termine le HTML de chaque page. La fonction `wp_footer();` est importante car elle permet à WordPress d'injecter des scripts nécessaires avant la fermeture de la balise `body`.

### Fichier `functions.php`

```php
<?php

// Ajouter la prise en charge des images mises en avant
add_theme_support( 'post-thumbnails' );
```

Ce fichier est le cœur de votre thème WordPress. Ici, vous avez activé la prise en charge des images mises en avant pour vos articles. Vous pouvez également y ajouter des menus personnalisés, des zones de widgets, et plus encore.

### Fichier `header.php`

```php
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/app.css"> 
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    
  <?php wp_body_open(); ?>

  <header class="header">
    <div class="container">
      <a class="logo" href="<?php echo home_url('/'); ?>">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo.png" alt="Brand logo | <?php bloginfo('title'); ?>">
      </a>
      <h1><?php bloginfo('title'); ?></h1>
    </div>
  </header>
```

C'est la première partie de votre HTML qui apparaît sur chaque page. Elle contient des balises META pour la compatibilité des navigateurs, elle charge le fichier CSS principal et elle ouvre la balise `body` avec des classes spécifiques à WordPress.

### Fichier `single.php`

```php
<?php get_header(); ?>

<main>
  <div class="container">
    <?php if (have_posts()): ?>
        <?php while(have_posts()): the_post(); ?>
          <div class="post-page-header">
            <?php the_post_thumbnail(); ?>
          </div>
          <h1><?php the_title() ?></h1>

          <article>
            <p><?php the_content(); ?></p>
          </article>

          <div class="single-post--footer">
            <span><?php the_date(); ?></span>
            <span><b><?php the_author(); ?></b></span>
          </div>
        <?php endwhile; ?>
    <?php else: ?>
      <h1>L'article n'est pas disponible</h1>
    <?php endif; ?>
  </div>
</main>

<?php get_footer(); ?>
```

Ce fichier s'occupe d'afficher les posts individuellement. Il appelle le header et le footer et contient la boucle principale WordPress qui vérifie s'il y a des posts à afficher.

## Conseils Supplémentaires sur les Fonctions

- `wp_head();` : Placez cette fonction juste avant la fermeture de la balise `head` pour permettre à WordPress d'injecter des scripts et des styles nécessaires.
- `wp_footer();` : Doit être placée juste avant la fermeture de la balise `body

## Quelque explications sur le CSS

```css
ul {
  margin: 0;
  padding: 0;
  & li {
    list-style: none;
    &:not(:last-child) {
      margin-bottom: 20px;
    }
  }
}
```

Cette syntaxe permettent d'écrire du CSS de façon plus dynamique et organisée. Cette syntaxe n'est reconnue que par les navigateurs web récent il faut donc faire attention a la compatibilité.

La syntaxe `&` permet de faire référence au parent direct dans les préprocesseurs CSS. Voici comment le code donné pourrait être traduit en CSS classique :

```css
ul {
  margin: 0;
  padding: 0;
}
ul li {
  list-style: none;
}
ul li:not(:last-child) {
  margin-bottom: 20px;
}
```

Détail de ce que fait chaque règle :

- `ul { margin: 0; padding: 0; }` : Cette règle supprime la marge et le rembourrage par défaut sur tous les éléments `<ul>`, ce qui permet d'avoir un meilleur contrôle sur le style de ces éléments.
- `ul li { list-style: none; }` : Cela supprime le style de liste (comme les puces devant les éléments de liste) pour tous les éléments `<li>` qui sont enfants de `<ul>`.
- `ul li:not(:last-child) { margin-bottom: 20px; }` : Cette règle ajoute une marge en bas de tous les éléments `<li>` sauf le dernier enfant de chaque `<ul>`. Cela crée un espace entre les éléments de la liste mais ne laisse pas d'espace après le dernier élément.

Dans le "vieux" CSS, sans préprocesseurs, vous devriez écrire chaque règle séparément comme ci-dessus, sans pouvoir imbriquer les sélecteurs ou utiliser des références parentes avec `&`. Cela rend le code moins compact et potentiellement plus répétitif, mais c'est le standard reconnu par tous les navigateurs.
