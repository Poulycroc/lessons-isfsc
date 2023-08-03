# Premier template WordPress

[Voir Github Version](https://github.com/Poulycroc/lessons-isfsc/blob/master/courses/05__premier-template-custom.md)<br>
[le projet 'montheme' complet](https://github.com/Poulycroc/lessons-isfsc/tree/master/wordpress/montheme)

## Quelque sites utils pour commencer

1. [WordPress.org](https://wordpress.org/) (pour la doc en anglais)
2. [wpfr](https://wpfr.net/) (pour la doc en français)
3. [Grafikart](https://www.youtube.com/watch?v=fjm5jaQsvSw&list=PLjwdMgw5TTLWF1VV9TFWrsUTvWjtGS7Qt) (une suite de vidéos très complète sur l'utilisation de WordPress)

PS: en parlant de Grafikart il a une [suite de vidéos](https://www.youtube.com/watch?v=B_vCy1uTg68&list=PLjwdMgw5TTLXQ7eBAiC7giFbm4NUisryc) sur la découverte de WordPress si vous voulez compléter n'hésitez pas..

## C'est quoi en fait ?

Dans WordPress, un `thème` est un ensemble de fichiers modèles (`templates`) et de feuilles de style (`CSS`) utilisés pour définir l’apparence et la présentation du contenu d’un site. On pourrait vulgairement appeler cela un design de site.

Ils peuvent être ajoutés, modifiés, et gérés dans le menu `Apparence > Thèmes`.

## Création de notre theme

### Ou ça se passe ?
1. Se rentre dans notre dosser de travail `WordPress` (`MAMP/htdocs/test-wordpress/`)
2. Dans ce dossier vous devriez voirs un dossier `wp-content`, allez-y
3. Le dossier qui nous intéresse c'est `themes` ici on va pouvoir créer notre premier theme

### Création du theme (le fun commence!)
1. Créer un dossier au nom de notre theme (dans mon cas `montheme`)
2. Créez deux fichiers : index.php et style.css.

Le contenu des fichiers est le suivant :

`index.php`
```html
Bonjour tout le monde
```

`style.css`
```css
/*
Theme Name: Mon Super Theme
*/
```
<details>
<summary>Note</summary>
Theme Name: est important, car c'est lui qui va permettre d'avoir un nom dans notre WordPress.
</details>

3. Dans notre WordPress (l'administration de notre application), rendez-vous dans `Apparence > Thèmes.`<br/><img src="./.screenshots/Screenshot 2022-11-13 at 17.58.46.png" alt="apparence theme wordpress" />
4. Une fois sur cette page, vous devriez trouver votre thème.<br/><img src="./.screenshots/Screenshot 2022-11-13 at 17.59.36.png" alt="notre nouveau theme" />
5. Il ne nous reste plus qu'à l'activer.<br/><img src="./.screenshots/Screenshot 2022-11-13 at 18.01.07.png" alt="activer le theme" />
6. Quand on se rend sur notre site en allant dans l'onglet en haut à gauche, on devrait arriver sur une page blanche avec l'inscription "Bonjour tout le monde".<br /><img src="./.screenshots/Screenshot 2022-11-13 at 18.06.12.png" alt="se rendre sur la page d'accueil de notre site" />

## Super... et maintenant ?

On va avoir envie de créer notre propre contenu HTML, et pour ce faire, on va devoir se familiariser avec les fonctionnalités de WordPress.

Notre site, pour le moment, ne paye pas de mine :<img src=".screenshots/Screenshot 2022-11-14 at 07.57.04.png" alt="notre site bonjour tout le monde" />

Dans un premier temps, on va avoir envie de récupérer notre en-tête (`header`) et pied de page (`footer`), et pour cela, rien de plus simple...

On a les deux [function](https://www.php.net/manual/en/language.functions.php) proposées par WordPress, les fonctions `get_header()` et `get_footer()` vont nous aider.

<details>
<summary>get_header()</summary>

------------------------------------------------------------------

Va nous premettre d'importer un header prédéfini a notre theme, si on n'a pas de fichier `header.php` dans notre projet alors il va aller chercher le header de WordPress par défaut

Pour l'utiliser :
```php
<?php get_header(); ?>
```

Voila ce que ça donne : <img src="./.screenshots/Screenshot 2022-11-14 at 08.18.19.png" alt="juste avec le get_header()" />

On peut ajouter des arguments dans notre fichier  `header.php` si on en a un.. par exemple

`index.php`
```php
// in index.php or where you want to include header
<?php get_header('', array('name' => 'Ruhul Amin', 'age' => 23)); ?>

<p>Bonjour tout le monde</p>
```

`header.php`
```php
<h2>This is a Header</h2>
<p>Hey, <?php echo $args['name']; ?>, You are <?php echo $args['age']; ?> years old</p>
```

Ce qui va donner: <img src="./.screenshots/Screenshot 2022-11-14 at 08.22.51.png" alt="avec un get_header() qui a des options" />

------------------------------------------------------------------
</details>
<details>
<summary>get_footer()</summary>

------------------------------------------------------------------

Cela va nous permettre d'importer la barre d'outils WordPress avec quelques informations sur notre site.

pour l'utiliser:
```php
<?php get_footer(); ?>
```

Si on l'utilise seul comme ça dans notre `index.php`:
```php
Bonjour tout le monde

<?php get_footer(); ?>
```
ça va nous donner ça: <img src="./.screenshots/Screenshot 2022-11-14 at 08.35.36.png" alt="utilisation seul de notre get_footer()" /> 

À noter que nous ne voyons plus notre "Bonjour tout le monde" parce qu'il est caché derrière la barre d'options WordPress.

------------------------------------------------------------------
</details>

Si on les applique...
```php
<?php get_header(); ?>

<p>Bonjour tout le monde</p>

<?php get_footer(); ?>
```
Ça donne ça...<img src="./.screenshots/Screenshot 2022-11-14 at 08.05.39.png" alt="notre site avec le get_header() et le get_footer()" /> 


## Super pour l'import de Header et Footer mais on fait quoi maintenant ?

[source](https://capitainewp.io/formations/developper-theme-wordpress/header-footer-theme/)

On va donc aller un peu plus loin dans notre découpage. Pour ce faire :

On va isoler le haut et le bas du site dans des fichiers à part afin d'éviter toute répétition de code dans la suite de la formation.

Je vous invite alors à créer deux nouveaux fichiers à la racine de votre thème :

1. `header.php` : où l’on mettra la base du HTML et le haut du site ;
2. `footer.php` : où l’on mettra le bas du site et les balises fermantes de notre page.
2. `functions.php` : Ce fichier est essentiel puisque c’est ici que l’on va activer toutes les fonctionnalités nécessaires de WordPress, mais également ajouter nos propres fonctions sur mesure.<br>
---
**NOTE**
Ne pas oublier le 's' a `functions`.(sinon ça marchera pas ^^')
---

On va avoir quelque chose comme ceci dans notre dossier de travail :<img src=".screenshots/Screenshot 2022-11-14 at 09.01.50.png" alt="notre dossier de travail">

On commence par `functions.php`:
```php
<?php 
// Ajouter la prise en charge des images mises en avant
add_theme_support( 'post-thumbnails' );

// Ajouter automatiquement le titre du site dans l'en-tête du site
add_theme_support( 'title-tag' );
?>
```

Dans `header.php` on vient placer ce code : 
```php
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    
    <?php wp_body_open(); ?>
```
(pas de panique j'explique plus bas ce qu'on vient décrire...)

puis dans `footer.php` on ajout:
```php
  <?php wp_footer(); ?>
</body>
</html>
```

Dans notre `index.php` on garde (évidement on peut changer "Bonjour tout le monde" par "coucou").
```php
<?php get_header(); ?>
Coucou
<?php get_footer(); ?>
```

On devrait avoir quelque chose comme ceci :<img src=".screenshots/Screenshot 2022-11-14 at 08.49.48.png" alt="notre premier découpage plus avancé" />

Si la manipulation a bien fonctionné, vous devriez voir apparaître la barre d’administration WordPress (en noir en haut du site) et le titre dans l’onglet du navigateur. En ce qui concerne le code de la page via l'inspecteur, on remarque qu'il y a bien plus de HTML que ce que nous avons écrit ! Cela est dû aux fonctions que nous venons d'ajouter et que nous allons analyser juste après.

De manière générale, on utilisera les fonctions `get_header()` et `get_footer()` sur tous les templates de page que l’on créera par la suite avec WordPress.


### Découverte de nouvelles fonctions WordPress

Je reviens sur le code que l'on a écrit plus tôt. Comme vous avez pu le remarquer, on a ajouté quelques fonctions de WordPress dans notre HTML.

### dans `functions.php`
<details>
<summary>(on se souvient du code php..)</summary>

------------------------------------------------------------------
```php
// Ajouter la prise en charge des images mises en avant
add_theme_support( 'post-thumbnails' );

// Ajouter automatiquement le titre du site dans l'en-tête du site
add_theme_support( 'title-tag' );
```

------------------------------------------------------------------
</details>
<br>
<strong>Activer la gestion des images mises en avant</strong>

La première chose que l’on demande, c’est d’activer la prise en charge des images mise en avant pour le blog. Ce sont les visuels qui accompagnent l’article et son résumé, anciennement appelés « image à la une » et en anglais les post thumbnails.
<img src="https://capitainewp.io/wp-content/uploads/2019/01/image-une-metabox-1600x613.jpg.webp" alt="post thumbnails" />
<br/>
<br/>
<strong>Activer la gestion automatique du titre de la page</strong>

On lui demande également de créer automatiquement la balise `title` dans l'en-tête. C’est le titre qui apparaît dans l'onglet du navigateur ; il est d'ailleurs important pour le référencement naturel.
<img src="https://capitainewp.io/wp-content/uploads/2019/01/titre-site-wp.jpg.webp" alt="page title" />

<br/><hr/>

### dans `header.php`
<details>
<summary>(on se souvient du code php..)</summary>

------------------------------------------------------------------
```php
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    
    <?php wp_body_open(); ?>
```
------------------------------------------------------------------
</details>

Tout d'abord, on remarque la fonction `language_attributes()`qui permet de définir automatiquement la langue du document. Cette valeur est basée sur le réglage WordPress dans `Réglages > Général > Langue du site`.

Vient ensuite la fonction `bloginfo('charset')` qui permet de définir l'encodage du site. Par défaut, c'est `UTF-8`, et c'est très bien comme ça : votre site prendra en charge les caractères spéciaux, les accents, les caractères non-latins, etc.

Cette fonction nous permettra de récupérer [d’autres informations](https://developer.wordpress.org/reference/functions/bloginfo/) utiles pour notre site.

Je continue pour tomber sur une fonction `wp_head()` qui a une importance capitale : c’est par cette fonction que WordPress, votre thème et les extensions vont pouvoir venir déclarer le chargement des scripts et des styles. On verra un peu plus tard comment en tirer parti.

<strong>La fonction `wp_head()` est essentielle au bon fonctionnement de votre thème alors ne l’oubliez pas!
<strong>

D’ailleurs c’est via cette fonction que WordPress va venir écrire la balise `title` que l’on a activé dans le `functions.php` juste avant.

Ensuite, la fonction `body_class()` nous permet d’obtenir des noms de classe CSS en fonction de la page visitée, ce qui pourra nous faciliter la création de nos styles.

Voila ce que ça donne en `html`
```html
<!DOCTYPE html>
<html lang="fr-FR">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    
    <!–- plein de choses entre (on va revenir dessus mais pas de suite) -–>
</head>

<body class="home blog logged-in admin-bar no-customize-support">
```
<details>
<summary>Ce que ça veut dire</summary>

------------------------------------------------------------------
La langue est définie sur fr-FR, l'encodage sur UTF-8, et dans les classes du `body`, on peut voir :

1. `home` car on est sur la page d’accueil ;
2. `blog` car par défaut la page d’accueil de WordPress affiche les derniers articles (on pourra changer ce réglage) ;
3. `logged-in` car on est un utilisateur connecté ;
4. `admin-bar` car la barre d’administration est affichée en haut du site.

Cette dernière classe nous sera très utile si on veut créer un menu fixe en position absolue ou fixe : la barre d’administration va décaler le site de 32px vers le bas (sa propre hauteur). On pourra donc appliquer un style de ce genre pour compenser :

```css
.menu {
    position: fixed;
    top: 0px;
}

.admin-bar .menu {
	top: 32px; /* on prend en compte le décalage */
}
```

La classe `home` vous permettra d’appliquer des styles différents des autres pages par exemple. On reverra ça plus tard, mais au moins vous avez compris leur utilité. D’ailleurs rien ne vous oblige à utiliser la fonction `body_class()`. Mais si vous le faites, pensez à ne pas réutiliser ces noms de classe proposés par WordPress afin d’éviter des conflits de styles.

<p>Enfin, la fonction `wp_body_open()` a été ajoutée dans WordPress 5.2 afin de permettre à des extensions d’écrire du code au début du `body`. C’est utile notamment pour Yoast qui vient y placer le Google Tag Manager et autres codes de scripts.</p>

------------------------------------------------------------------
</details>

<br/><hr/>

### Dans `footer.php`

Pour finir, on retrouve simplement dans le pied de page une fonction `wp_footer()`:
<details>
<summary>(on se souvient du code php..)</summary>

------------------------------------------------------------------
```php
  <?php wp_footer(); ?>
  <!–- Vous pourriez ajouter votre script Google Analytics ici -–>
</body>
</html>
```
------------------------------------------------------------------
</details>

Il a exactement le même rôle que `wp_head()` : afficher des scripts (et styles) mais cette fois en bas de page.

Pour conclure, ne confondez pas `get_header()` qui permet d’appeler le fichier d’en-tête et `wp_head()` qui permet de récupérer les scripts et styles.


## Ajouter un logo en haut du site
On va profiter du fichier `header.php` pour ajouter la partie haute du site, qui ne bougera jamais d’une page à l’autre.

Pour l’instant on va ajouter simplement un `logo`. Plus tard on mettra également un `menu`.

Tout d'abord, à la racine de notre thème (`montheme` dans mon cas) on va créer un dossier `assets` dans lequel on va créer un dossier `img` à la racine du thème, et poser notre logo au format `PNG` à l’intérieur (ou format `SVG`, comme vous voulez).

Ajoutez ensuite le code suivant dans le body:
```php
<body <?php body_class(); ?>>
  <header class="header">
    <a href="<?php echo home_url('/'); ?>">
      <img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo.png" alt="Logo">
    </a>  
  </header>
```

Vous n’aurez pas le logo centré car on n’a pas encore ajouté de CSS, mais vous devriez pouvoir cliquer dessus, ce qui vous ramène à l’accueil du site grâce à la fonction `home_url()`.

On utilise la fonction `get_template_directory_uri()` afin d’obtenir l’adresse absolue (c’est-à-dire complète) du logo. Sans ça, votre image ne s’affichera pas.

En regardant le code (clic droit, afficher le code source de la page) on voit bien l’url vers l’accueil ainsi que l’url de mon image :

```html
<a class="logo" href="http://wp.local/">
  <img src="http://localhost:8888/test-wordpress/wp-content/themes/montheme/assets/img/logo.png" alt="Logo" />
</a>
```

On peut bien sûr étoffer à volonté cet en-tête et c’est d’ailleurs ce que l’on fera à terme.

## Ajouter une touche de design dans sur notre en-tête

dans un premier temps je vais devoir ajouter une feuille de `style` css histoire de pouvoir agir directement sur mon image et mon header

dans notre dossier `assets` je vais créer un nouveau dossier `css` dans le quel je vais ajouter un fichier que je vais appeler `app.css`

Pour cela, je vais ajouter cette ligne dans mon `<head></head>`
```php
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/app.css">
```

<details>
<summary>Ce qui devrait nous donner a peu près ce code la:</summary>

------------------------------------------------------------------
```php
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    
    <?php wp_head(); ?>
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/app.css">
</head>
```
------------------------------------------------------------------
</details> <br>

Pour tester que notre CSS sera bien appliqué, j'ai envie de faire quelque chose de visible... Pour cela, rien de mieux que d'utiliser du rouge partout.

dans notre `app.css` 
```css
body {
  background-color: red;
}
```

Ça devrait nous donner ceci :
<img src=".screenshots/Screenshot 2022-11-14 at 18.07.49.png" alt="result red">

pour designer de manière "final"

Je vais ajouter dans mon CSS, dans notre fichier `app.css`.
```css
body {
  margin: 0; /* pour éviter d'avoir une bordure blanche autour de notre contenu */
  font-family: Arial, Helvetica, sans-serif; /* je choisi une font */
}

header.header {
  width: 100%;
  height: 280px;
  background-color: #333;
  padding-top: 20px;
}

header.header > a.logo {
  width: 150px;
  display: block;
  margin: 0 auto; /* on centre le logo */
}

header.header > a.logo > img {
  width: 100%;
}
```

Ce qui devrait nous donner quelque chose comme ceci :
<img src=".screenshots/Screenshot 2022-11-15 at 11.15.01.png" alt="notre résultat final" />
