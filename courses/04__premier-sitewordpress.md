# Notre premier site WordPress

[Voir Github Version](https://github.com/Poulycroc/lessons-isfsc/blob/master/courses/04__premier-sitewordpress.md)

## Télécharger le projet wordpress 


1. Aller sur [WordPress.org](https://fr-be.wordpress.org/)
2. Aller sur le lien [Get WordPress](https://fr-be.wordpress.org/download/)
3. Dans notre dossier de travail MAMP (`htdocs` on se souvient..) on crée un dossier `test-wordpress`
4. On """dézip""" notre récent téléchargement et on dépose le contenu dans `test-wordpress`


## Découverte
on devrait avoir quelque chose comme ça<br>
<img alt="Dossier de travail avec wordpress" src="https://raw.githubusercontent.com/Poulycroc/lessons-isfsc/master/courses/.screenshots/Screenshot 2022-10-23 at 18.06.48.png" />

comme on peut le constater on a une fichier `index.php` on va donc pouvoir ouvrir notre projet dans notre navigateur préféré...

pour ce faire rendons nous sur l'url [http://localhost:8888/test-wordpress/wp-admin/setup-config.php](http://localhost:8888/test-wordpress/wp-admin/setup-config.php) on devrait y trouver quelque chose qui ressemble à ça<br>
<img alt="Selection de langue dans wordpress" src="https://raw.githubusercontent.com/Poulycroc/lessons-isfsc/master/courses/.screenshots/Screenshot 2022-10-23 at 18.12.12.png" /><br/>
on peut choisir la langue que l'on veut pour ma part j'ai pris 'Français Belgique', on arrive sur cet écran<br/>
<img alt="Ecran d'introduction Wordpress" src="https://raw.githubusercontent.com/Poulycroc/lessons-isfsc/master/courses/.screenshots/Screenshot 2022-10-23 at 18.14.59.png" /><br/>

comme indiqué on va devoir créer notre base de données pour ce faire...

## Installation 

### Base de données
1. Sur mon application MAMP je clique sur WebStart <br/><img alt="Trouver WebStart sur MAMP" src="https://raw.githubusercontent.com/Poulycroc/lessons-isfsc/master/courses/.screenshots/Screenshot 2022-10-23 at 18.18.05.png" />
2. Sur la page qui devrait s'ouvrire je vais dans "Tools/phpMyAdmin" <br/><img alt="Cliquer sur phpMyAdmin" src="https://raw.githubusercontent.com/Poulycroc/lessons-isfsc/master/courses/.screenshots/Screenshot 2022-10-23 at 18.17.52.png" />
3. Sur la page qui vient de s'ouvrire je cherche en haut a gauche "New" <br/><img alt="Create DataBase" src="https://raw.githubusercontent.com/Poulycroc/lessons-isfsc/master/courses/.screenshots/Screenshot 2022-10-23 at 18.22.49.png" />
4. Je crée donc un nom pour ma base `mabaseamoi`, on oublie pas de cliquer sur "Create" (sinon ça ne marche pas) <br/><img alt="Nom de ma base de donnée" src="https://raw.githubusercontent.com/Poulycroc/lessons-isfsc/master/courses/.screenshots/Screenshot 2022-10-23 at 18.24.56.png" />
5. Voila on devrait avoir ça l'écran <br/><img alt="Final database" src="https://raw.githubusercontent.com/Poulycroc/lessons-isfsc/master/courses/.screenshots/Screenshot 2022-10-23 at 18.27.29.png" />
6. On ne touche plus à rien pour cet écran 

---


De retour sur notre WordPress (pour moi [http://localhost:8888/test-wordpress/wp-admin/setup-config.php?step=1&language=fr_BE](http://localhost:8888/test-wordpress/wp-admin/setup-config.php?step=1&language=fr_BE) ) on va pouvoir renseigner nos informations 

<img alt="Info dataBase dans WordPress" src="https://raw.githubusercontent.com/Poulycroc/lessons-isfsc/master/courses/.screenshots/Screenshot 2022-10-23 at 18.30.13.png" />

---
**NOTE:** 
<details>
<summary>Ou trouver les infos de connexion</summary>
pour s'assurer que les informations que je rentre sont les bonnes je peux me rendre sur mon MAMP et cliquer sur WebStart sur la page qui s'affiche je peux me rendre dans la section `MySQL`<br/>
<img alt="Info de connections" src="https://raw.githubusercontent.com/Poulycroc/lessons-isfsc/master/courses/.screenshots/Screenshot 2022-10-23 at 18.38.56.png" />
</details>

---

une fois nos informations remplies je clique sur "Envoyer" j'arrive sur un nouvel écran je confirme encore une fois j'arrive ici <br/>
<img alt="Configuration de mon application" src="https://raw.githubusercontent.com/Poulycroc/lessons-isfsc/master/courses/.screenshots/Screenshot 2022-10-23 at 18.43.22.png" />

je remplis ce qu'on me demande de remplir (je prends évidement soins de ne pas oublier ni mon identifiant ni mon mot de passe) voila ce que j'ai pour ma part<br>
<img alt="Remplissage des donnée pour notre site" src="https://raw.githubusercontent.com/Poulycroc/lessons-isfsc/master/courses/.screenshots/Screenshot 2022-10-23 at 18.47.36.png" /><br />
Je clique évidement sur "Installer WordPress", j'arrive ici:<br />
<img alt="What a success..." src="https://raw.githubusercontent.com/Poulycroc/lessons-isfsc/master/courses/.screenshots/Screenshot 2022-10-23 at 18.48.55.png" /><br/>
je choisis de me connecter (c'est mieux...), j'arrive ici:<br />
<img alt="Connection a WordPress" src="https://raw.githubusercontent.com/Poulycroc/lessons-isfsc/master/courses/.screenshots/Screenshot 2022-10-23 at 18.49.15.png" /><br/>
je me connecte (oui oui l'identifiant et le mot de passe qu'il ne fallait pas oublier c'est maintenant), j'arrive ici:<br/>
<img alt="Welcome wur WordPress" src="https://raw.githubusercontent.com/Poulycroc/lessons-isfsc/master/courses/.screenshots/Screenshot 2022-10-23 at 18.49.31.png" />

on peut retourner sur notre `phpMyAdmin` qu'on avait laissé de coté et recharger la page je me retrouve avec ça sur mon écran<br/>
<img alt="phpMyAdmin ftw" src="https://raw.githubusercontent.com/Poulycroc/lessons-isfsc/master/courses/.screenshots/Screenshot 2022-10-23 at 18.49.47.png" /><br />
sur mon WordPress je peux aller voir ce que mon tout nouveau site donne en allant en haut a gauche sur `monsite`<br/>
<img alt="Me rendre sur mon site" src="https://raw.githubusercontent.com/Poulycroc/lessons-isfsc/master/courses/.screenshots/Screenshot 2022-10-23 at 19.19.55.png" /><br />
et j'arrive donc sur mon premier site: <br/>
<img alt="Mon premier site" src="https://raw.githubusercontent.com/Poulycroc/lessons-isfsc/master/courses/.screenshots/Screenshot 2022-10-23 at 19.20.47.png" />
