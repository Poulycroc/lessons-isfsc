# Premier template WordPress

[Voir Github Version](https://github.com/Poulycroc/lessons-isfsc/blob/master/courses/05__premier-template-custom.md)

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
