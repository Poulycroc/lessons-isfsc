# Notre premier site WordPress

[Voir Github Version](https://github.com/Poulycroc/lessons-isfsc/blob/master/courses/04__premier-sitewordpress.md)<br>
[le projet 'montheme' complet](https://github.com/Poulycroc/lessons-isfsc/tree/master/wordpress/montheme)

## Télécharger le projet wordpress 


1. Aller sur [WordPress.org](https://fr-be.wordpress.org/)
2. Aller sur le lien [Get WordPress](https://fr-be.wordpress.org/download/)
3. Dans notre répertoire de travail MAMP (souvenez-vous de htdocs), créons un dossier nommé test-wordpress.
4. Extrayez le contenu de votre téléchargement récent et placez-le dans le dossier test-wordpress.


## Découverte

On devrait avoir quelque chose comme ceci :<br>
<img alt="Dossier de travail avec wordpress" src="https://raw.githubusercontent.com/Poulycroc/lessons-isfsc/master/courses/.screenshots/Screenshot 2022-10-23 at 18.06.48.png" />

Comme on peut le constater, il y a un fichier index.php. Par conséquent, nous pouvons maintenant ouvrir notre projet dans notre navigateur préféré.

Pour ce faire rendons nous sur l'url [http://localhost:8888/test-wordpress/wp-admin/setup-config.php](http://localhost:8888/test-wordpress/wp-admin/setup-config.php) on devrait y trouver quelque chose qui ressemble à ça<br>
<img alt="Selection de langue dans wordpress" src="https://raw.githubusercontent.com/Poulycroc/lessons-isfsc/master/courses/.screenshots/Screenshot 2022-10-23 at 18.12.12.png" /><br/>
on peut choisir la langue que l'on veut pour ma part j'ai pris 'Français Belgique', on arrive sur cet écran<br/>
<img alt="Ecran d'introduction Wordpress" src="https://raw.githubusercontent.com/Poulycroc/lessons-isfsc/master/courses/.screenshots/Screenshot 2022-10-23 at 18.14.59.png" /><br/>

Comme indiqué, nous allons devoir créer notre base de données. Pour ce faire...

## Installation 

### Base de données
1. Sur mon application MAMP je clique sur WebStart <br/><img alt="Trouver WebStart sur MAMP" src="https://raw.githubusercontent.com/Poulycroc/lessons-isfsc/master/courses/.screenshots/Screenshot 2022-10-23 at 18.18.05.png" />
2. Sur la page qui devrait s'ouvrire je vais dans "Tools/phpMyAdmin" (en haut a gauche) <br/><img alt="Cliquer sur phpMyAdmin" src="https://raw.githubusercontent.com/Poulycroc/lessons-isfsc/master/courses/.screenshots/Screenshot 2022-10-23 at 18.17.52.png" />
3. Sur la page qui vient de s'ouvrir, je cherche en haut à gauche "Nouveau" (ou "New" en anglais). <br/><img alt="Create DataBase" src="https://raw.githubusercontent.com/Poulycroc/lessons-isfsc/master/courses/.screenshots/Screenshot 2022-10-23 at 18.22.49.png" />
4. Je crée donc un nom pour ma base : mabaseamoi. N'oublions pas de cliquer sur "Créer" (ou "Create" en anglais) sinon ça ne fonctionnera pas. <br/><img alt="Nom de ma base de donnée" src="https://raw.githubusercontent.com/Poulycroc/lessons-isfsc/master/courses/.screenshots/Screenshot 2022-10-23 at 18.24.56.png" />
5. Voilà, nous devrions avoir cet écran : <br/><img alt="Final database" src="https://raw.githubusercontent.com/Poulycroc/lessons-isfsc/master/courses/.screenshots/Screenshot 2022-10-23 at 18.27.29.png" />
6. On ne touche plus à rien sur cet écran.

---


De retour sur notre WordPress (pour moi [http://localhost:8888/test-wordpress/wp-admin/setup-config.php?step=1&language=fr_BE](http://localhost:8888/test-wordpress/wp-admin/setup-config.php?step=1&language=fr_BE) ) on va pouvoir renseigner nos informations 

<img alt="Info dataBase dans WordPress" src="https://raw.githubusercontent.com/Poulycroc/lessons-isfsc/master/courses/.screenshots/Screenshot 2022-10-23 at 18.30.13.png" />

---
**NOTE:** 
<details>
<summary>Ou trouver les infos de connexion</summary>
Pour vous assurer que les informations que vous avez saisies sont correctes, vous pouvez vous rendre sur MAMP et cliquer sur "Démarrer le serveur Web". Sur la page qui s'affiche, vous pouvez accéder à la section MySQL.<br/>
<img alt="Info de connections" src="https://raw.githubusercontent.com/Poulycroc/lessons-isfsc/master/courses/.screenshots/Screenshot 2022-10-23 at 18.38.56.png" />
</details>

---

Une fois vos informations remplies, cliquez sur "Submit" (ou "Envoyer"). Vous arriverez sur un nouvel écran où vous devrez confirmer à nouveau. Une fois confirmé, vous devriez arriver ici.<br/>
<img alt="Configuration de mon application" src="https://raw.githubusercontent.com/Poulycroc/lessons-isfsc/master/courses/.screenshots/Screenshot 2022-10-23 at 18.43.22.png" />

Je remplis ce qu'on me demande de remplir (je prends évidemment soin de ne pas oublier ni mon identifiant ni mon mot de passe). Voilà ce que j'ai pour ma part :<br>
<img alt="Remplissage des donnée pour notre site" src="https://raw.githubusercontent.com/Poulycroc/lessons-isfsc/master/courses/.screenshots/Screenshot 2022-10-23 at 18.47.36.png" /><br />

Je clique évidemment sur "Installer WordPress", j'arrive ici :<br />
<img alt="What a success..." src="https://raw.githubusercontent.com/Poulycroc/lessons-isfsc/master/courses/.screenshots/Screenshot 2022-10-23 at 18.48.55.png" /><br/>
je choisis de me connecter (c'est mieux...), j'arrive ici:<br />
<img alt="Connection a WordPress" src="https://raw.githubusercontent.com/Poulycroc/lessons-isfsc/master/courses/.screenshots/Screenshot 2022-10-23 at 18.49.15.png" /><br/>
Je me connecte (oui, oui, avec l'identifiant et le mot de passe qu'il ne fallait pas oublier). J'arrive ici :<br/>
<img alt="Welcome wur WordPress" src="https://raw.githubusercontent.com/Poulycroc/lessons-isfsc/master/courses/.screenshots/Screenshot 2022-10-23 at 18.49.31.png" />

On peut retourner sur notre phpMyAdmin que nous avions laissé de côté, puis recharger la page. Je me retrouve avec cela sur mon écran :<br/>
<img alt="phpMyAdmin ftw" src="https://raw.githubusercontent.com/Poulycroc/lessons-isfsc/master/courses/.screenshots/Screenshot 2022-10-23 at 18.49.47.png" /><br />

Sur mon WordPress, je peux aller voir comment mon tout nouveau site se présente en allant en haut à gauche sur "Mon site".<br/>
<img alt="Me rendre sur mon site" src="https://raw.githubusercontent.com/Poulycroc/lessons-isfsc/master/courses/.screenshots/Screenshot 2022-10-23 at 19.19.55.png" /><br />

Et j'arrive donc sur mon premier site :<br/>
<img alt="Mon premier site" src="https://raw.githubusercontent.com/Poulycroc/lessons-isfsc/master/courses/.screenshots/Screenshot 2022-10-23 at 19.20.47.png" />
