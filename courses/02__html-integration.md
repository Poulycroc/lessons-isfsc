# HTML intégration

[Voir Github Version](https://github.com/Poulycroc/lessons-isfsc/blob/master/courses/02__html-integration.md)

## Le but ?
L'idée d'utiliser le php dans le monde du webdev est de dynamiser les pages `HTML`

par exemple afficher les informations de l'utilisateur (Nom, prénom,...) directement dans l'affichage des pages du site


### Installation de notre serveur php

Pour lire des fichiers `fichier.php` nous allons avoir besoin d'un serveur php de type [Apache](https://fr.wikipedia.org/wiki/Apache_HTTP_Server), nous allons pour ça utiliser MAMP



<details>
<summary>Téléchargement</summary>

##### Se rendre sur [https://www.mamp.info/en/downloads/](https://www.mamp.info/en/downloads/)
<img src=".screenshots/Screenshot 2022-10-23 at 13.57.13.png" alt="Download MAMP" />

#### Mac

##### si vous êtes sur M1 / M2 
prendre 'MAMP & MAMP PRO 6.6 (M1)'

##### si vous êtes sur Intel
prendre 'MAMP & MAMP PRO 6.6 (Intel)'

---
**NOTE:**
Si vous ne savez pas: se rendre dans le menu 'pomme' puis 'a propos de ce mac' regarder section 'processeur'

---

#### Windows
prendre 'MAMP & MAMP PRO 5.0.5'
</details>
<details>
<summary>Utilisation</summary>
#### De quoi ça a l'aire ? 

Vous pouvez appuyer sur "Start" 

---
**NOTE:**
Ne pas utiliser la version 'pro'
---

<img alt="MAMP mac" src="./.screenshots/Screenshot 2022-10-23 at 14.35.39.png" />
<img alt="MAMP windows" src="./.screenshots/Screenshot 2022-10-23 at 14.40.35.png" />


### Dans l'onglet 'préférence'
vous retrouverez 2 sections importante `Ports` et `Server`

#### Server
<img alt="MAMP Server" src="./.screenshots/Screenshot 2022-10-23 at 14.45.59.png" /><br>
ici on va retrouver les informations relative a notre "espace de travail"
dans mon cas mon il se trouve dans Application, MAMP, htdocs
il n'y a pas de raisons d'y toucher pour l'instant 

#### Ports
<img alt="MAMP Ports" src="./.screenshots/Screenshot 2022-10-23 at 14.45.50.png" />

ici vous retrouverez les information sur les ports 
<ol>
  <li>Apache port: le port sur le quel votre application va tourner</li>
  <li>MySql port: le port sur le quel votre base de données va tourner</li>
</ol>

pour accéder a votre première application il vous faudra donc vous rendre sur votre navigateur préféré entrer [http://localhost:8888/](http://localhost:8888/)
vous devrier arriver sur une page de présentation
<img alt="MAMP welcome page" src="./.screenshots/Screenshot 2022-10-23 at 14.53.22.png" />

l'information la plus importante pour nous c'est `Document root: /Applications/MAMP/htdocs` c'est la que va se trouver notre dossier de travail pour 

</details>


## Votre première page PHP


Rendez dans votre espace de travail MAMP (`/Applications/MAMP/htdocs` sur mac et `/Local Disk (C:)/MAMP/htdocs` sur widnows)

---
**NOTE:**
<p>si vous n'êtes pas sur de l'endroit ou se trouve votre "espace de travail" allé sur `MAMP - Preference - Server - cliquez sur "Open in finder"`</p>

---

créer un dossier que vous nommerez `monpremiersite` ouvrez ce dossier dans votre éditeur de code favori dans mon cas [VSCodium](https://vscodium.com/) (le plus connu étant [Visual Studio Code](https://code.visualstudio.com/) )
avec votre éditeur de code créer un fichier `index.php` vous devriez avoir quelque chose qui resssemble a ça 
<img alt="Premier Fichier index dans vscode" src=".screenshots/Screenshot 2022-10-23 at 15.43.31.png" />

collez y le code-ci dessous
```php
<html>
  <head>
    <title>Test PHP</title>
  </head>
  <body>
    <?php echo '<p>Bonjour le monde</p>'; ?>
  </body>
</html>
```
<img alt="premier code dans notre index" src="./.screenshots/Screenshot 2022-10-23 at 15.46.31.png" />

allez dans votre navigateur préféré et entrez [http://localhost:8888/monpremiersite/](http://localhost:8888/monpremiersite/) 

vous devriez avoir quelque chose qui ressemble a ça<br>
<img alt="premier site" src="./.screenshots/Screenshot 2022-10-23 at 15.49.33.png" />


## Exemple #2 Récupération des informations du système depuis PHP

```php
<?php phpinfo(); ?>
```

## Entrainez vous! 

il serait intéressant de reprendre quelque exercices que nous avons fait ensemble dans [la section précédente](https://github.com/Poulycroc/lessons-isfsc/blob/master/courses/01__php.md) et de les ajouter dans vos `fichier.php` 

