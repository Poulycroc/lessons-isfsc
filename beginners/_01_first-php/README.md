# Backend CMS - ISFSC

**sources**:

- [http://maxime.gueriau.fr/teaching/iut_lyon1/info/programmation-web/php.html](Introduction au PHP)
- [https://www.php.net/manual/fr/index.php](PHP: Hypertext Preprocessor)
- [https://github.com/Poulycroc/lessons-isfsc/blob/master/courses/01__php.md](Cours PHP - ISFSC)

## Introduction au PHP

### Le PHP, c’est quoi ?

#### PHP: Hypertex Preprocessor

- Un acronyme récursif !
- Un langage de script exécuté côté serveur,
- Qui permet d’écrire des pages web dynamiques.
- Une extension de fichier (`.php`).
- Un outil incontournable pour intéragir avec une [base de données](http://maxime.gueriau.fr/teaching/iut_lyon1/info/programmation-web/bdd.html) (MySQL).

C’est aussi un site web [http://php.net/](http://php.net/) rempli d’autres informations utiles.

#### Comment ça marche ?

- Reprenons l’architecture client serveur ; pour une page statique (`HTML`) :<br/><img scr="http://maxime.gueriau.fr/teaching/iut_lyon1/info/programmation-web/_images/client-serveur_HTML.png" />
- pour une page dynamique (`PHP`) :<br/><img src="http://maxime.gueriau.fr/teaching/iut_lyon1/info/programmation-web/_images/client-serveur_PHP.png" />

#### Quel lien avec HTML/CSS ?

- PHP permet de générer du HTML.
- Le client (navigateur) est incapable de lire du code PHP, mais il sait afficher du code HTML et/ou CSS.
- PHP est interprété côté serveur :<br><img src="http://maxime.gueriau.fr/teaching/iut_lyon1/info/programmation-web/_images/client-serveur_PHP2.png" />

#### Quel lien avec JavaScript ?

**JavaScript :**

- est un langage de script, tout comme PHP ;
- permet de modifier dynamiquement le contenu HTML/CSS ;
- mais s’éxécute côté client et non côté serveur.

<img src="http://maxime.gueriau.fr/teaching/iut_lyon1/info/programmation-web/_images/client-serveur_JS.png" />

#### Pourquoi utiliser PHP alors ?

- Parce que les données sont centralisées sur le serveur.
- Parce que le résultat de l’éxécution sera identique pour tous les clients.
- Parce que ces données brutes manipulées par le serveur sont inacessibles par les clients.

### Ma première page en PHP

#### Les fichiers PHP

- Les fichiers contenant du _PHP_ doivent porter l’extension ”`.php`”.
- Le script PHP doit toujours être situé entre les balises `<?php` et `?>`.
- Les commentaires peuvent être :
  - Multilignes (`/* ... */`)
  - Monoligne (`//`, `#`)
- Toutes les instructions se terminent par ;
- PHP est insensible à la casse pour les noms de fonction mais pas pour les noms de variables.

> _Note_: Il est aussi possible d’utiliser les balises courtes <? et ?> pour signaler du code PHP. On préférera toutefois les balises longues qui assurent une portabilité totale sur tous les serveurs et avec toutes les versions de PHP.

#### Exemple de script PHP

```php
<!DOCTYPE html>
<html>
  <head>
        <meta charset="utf-8"/>
        <title>Ma première page en PHP !</title>
  </head>
  <body>
        <?php echo("Ce texte est écrit par du script PHP!"); ?>
  </body>
</html>
```

> _Note_: L’instruction echo est une fonction PHP. Elle permet d’écrire la chaîne de caractères passée en paramètre dans le fichier HTML généré.

- Cet exemple est aussi un script PHP valide :

```php
<?php echo("Ce texte est écrit par du script PHP!"); ?>
```
