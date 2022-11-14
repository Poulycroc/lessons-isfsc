# Premier template WordPress

[Voir Github Version](https://github.com/Poulycroc/lessons-isfsc/blob/master/courses/05__premier-template-custom.md)

## Quelque sites utils pour commencer

1. [WordPress.org](https://wordpress.org/) (pour la doc en anglais)
2. [wpfr](https://wpfr.net/) (pour la doc en fr)
3. [Grafikart](https://www.youtube.com/watch?v=fjm5jaQsvSw&list=PLjwdMgw5TTLWF1VV9TFWrsUTvWjtGS7Qt) (une suite de vidéos très complète sur l'utilisation de WordPress)

PS: en parlant de Grafikart il a une [suite de vidéos](https://www.youtube.com/watch?v=B_vCy1uTg68&list=PLjwdMgw5TTLXQ7eBAiC7giFbm4NUisryc) sur la découverte de WordPress si vous voulez compléter n'hésitez pas..

## C'est quoi en fait ?

Dans WordPress, un `thème` est un ensemble de fichiers modèles (`templates`) et de feuilles de style utilisés pour définir l’apparence et la présentation du contenu d’un site. On pourrait vulgairement appeler cela un design de site.

Ils peuvent être ajoutés, modifiés, et gérés dans le menu `Apparence > Thèmes`.

## Création de notre theme

### Ou ça se passe ?
1. Se rentre dans notre dosser de travail `WordPress` (`MAMP/htdocs/test-wordpress/`)
2. Dans ce dossier vous devriez voirs un dossier `wp-content`, allez-y
3. Le dossier qui nous intéresse c'est `themes` ici on va pouvoir créer notre premier theme

### Création du theme (le fun commence!)
1. Créer un dossier au nom de notre theme (dans mon cas `montheme`)
2. Créer 2 fichiers `index.php` et `style.css` <br/>les fichiers se présente comme suit

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
`Theme Name: ` est important c'est lui qui va permettre d'avoir un nom dans notre WordPress
</details>

3. Dans notre WordPress (L'administration de notre application) se rendre dans `Apparence > Thèmes`<br/><img src="./.screenshots/Screenshot 2022-11-13 at 17.58.46.png" alt="apparence theme wordpress" />
4. Une foi sur cette page vous devriez trouver votre theme<br/><img src="./.screenshots/Screenshot 2022-11-13 at 17.59.36.png" alt="notre nouveau theme" />
5. Il ne nous reste plus qu'a l'activer<br/><img src="./.screenshots/Screenshot 2022-11-13 at 18.01.07.png" alt="activer le theme" />
6. Quand on se rend sur notre site en allant dans l'onglet en haut a gauche on devrait tomber sur une page blanche avec l'inscription "Bonjour tout le monde"<br /><img src="./.screenshots/Screenshot 2022-11-13 at 18.06.12.png" alt="se rendre sur la page d'accueil de notre site" />

## Super... et maintenant ?

On va avoir envie de créer notre propre `html` et pour se faire on va devoir se familiariser avec les propriété de de wordpress 

notre site pour le moment ne paie pas de mine : <img src=".screenshots/Screenshot 2022-11-14 at 07.57.04.png" alt="notre site bonjour tout le monde" />

dans un premier temps on va avoir envie de récupérer notre `header` et `footer` et pour ça rien de plus simple.. 

on a les deux [function](https://www.php.net/manual/en/language.functions.php) proposée par WordPress qui vont nous aider `get_header()` et `get_footer()`

<details>
<summary>get_header()</summary>

------------------------------------------------------------------

Va nous premettre d'importer un header prédéfini a notre theme, si on n'a pas de fichier `header.php` dans notre projet alors il va aller chercher le header de WordPress pas défaut

pour l'utiliser:
```php
<?php get_header(); ?>
```

voila ce que ça donne: <img src="./.screenshots/Screenshot 2022-11-14 at 08.18.19.png" alt="juste avec le get_header()" />

on peut ajouter des argument dans notre fichier `header.php` si on en a un.. par exemple

`index.php`
```php
// in index.php or where you want to include header
<?php get_header( '', array( 'name' => 'Ruhul Amin', 'age' => 23 ) ); ?>

Bonjour tout le monde
```

`header.php`
```php
<h2>This is a Header</h2>
<p>Hey, <?php echo $args['name']; ?>, You are <?php echo $args['age']; ?> years old</p>
```

de qui va donner: <img src="./.screenshots/Screenshot 2022-11-14 at 08.22.51.png" alt="avec un get_header() qui a des options" />

------------------------------------------------------------------
</details>
<details>
<summary>get_footer()</summary>

------------------------------------------------------------------

Va nous premettre d'importer la barre d'outil WordPress avec quelque information sur notre site

pour l'utiliser:
```php
<?php get_footer(); ?>
```

si on l'utilise seul comme ça dans notre `index.php`
```php
Bonjour tout le monde

<?php get_footer(); ?>
```
ça va nous donner ça: <img src="./.screenshots/Screenshot 2022-11-14 at 08.35.36.png" alt="utilisation seul de notre get_footer()" /> 

a noter que ne vois plus notre "Bonjour tout le monde" parcequ'il est caché derrière la bar d'options wordpress

------------------------------------------------------------------
</details>

si on les appliques...
```php
<?php get_header(); ?>

Bonjour tout le monde

<?php get_footer(); ?>
```
ça donne ça...<img src="./.screenshots/Screenshot 2022-11-14 at 08.05.39.png" alt="notre site avec le get_header() et le get_footer()" /> 


## Super pour l'import de Header et Footer mais on fait quoi maintenant ?

[source](https://capitainewp.io/formations/developper-theme-wordpress/header-footer-theme/)

On va donc aller un peu plus loin dans notre découpage.. pour ce faire:

On va donc isoler le haut et le bas du site dans des fichiers à part afin d’éviter toute répétition de code dans la suite de la formation.

Je vous invite alors à créer 2 nouveaux fichiers à la racine de votre thème :

1. `header.php` : où l’on mettra la base du HTML et le haut du site ;
2. `footer.php` : où l’on mettra le bas du site et les balises fermantes de notre page.

on va avoir quelque chose comme ça dans notre dossier de travail: <img src=".screenshots/Screenshot 2022-11-14 at 08.43.49.png" alt="notre dossier de travail">

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

dans notre `index.php` on garde (évidement on peut changer "Bonjour tout le monde" par "coucou")
```php
<?php get_header(); ?>
Coucou
<?php get_footer(); ?>
```

on devrait avoir quelque chose comme ça: <img src=".screenshots/Screenshot 2022-11-14 at 08.49.48.png" alt="notre premier découpage plus avancé" />

Si la manipulation a bien fonctionné, vous devriez voir apparaitre la barre d’administration WordPress (en noir en haut du site) et le titre dans l’onglet du navigateur. Concernant le code de la page via l’inspecteur, on remarque qu’il y a bien plus de HTML que ce qu’on en a écrit ! C’est dû aux fonctions que l’on vient d’ajouter et que l’on va analyser juste après.

De manière générale, on utilisera les fonctions `get_header()` et `get_footer()` sur tous les templates de page que l’on créera par la suite avec WordPress.





