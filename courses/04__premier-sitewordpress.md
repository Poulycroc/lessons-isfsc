# Notre premier site WordPress

## Télécharger le projet wordpress 


1. Allé sur [WordPress.org](https://fr-be.wordpress.org/)
2. Allé sur le lien [Get WordPress](https://fr-be.wordpress.org/download/)
3. Dans notre dossier de travail MAMP (`htdocs` on se souviens..) on crée un dossier `test-wordpress`
4. On dézip le notre récent téléchargement et on dépose le contenu dans `test-wordpress`


## Découverte
on devrait avoir quelque chose comme ça<br>
<img alt="Dossier de travail avec wordpress" src="./.screenshots/Screenshot 2022-10-23 at 18.06.48.png" />

comme on peut le constater on a une fichier `index.php` on va donc pouvoir ovrire notre projet dans notre navigateur préféré...

pour ce faire rendons nous sur l'url [http://localhost:8888/test-wordpress/wp-admin/setup-config.php](http://localhost:8888/test-wordpress/wp-admin/setup-config.php) on devrait y trouver quelque chose qui ressemble a ça<br>
<img alt="Selection de langue dans wordpress" src="./.screenshots/Screenshot 2022-10-23 at 18.12.12.png" /><br/>
on peut choisir la lanque que l'on veut pour ma part j'ai pris 'Français Belgique', on arrive sur cet écran<br/>
<img alt="Ecran d'introduction Wordpress" src="./.screenshots/Screenshot 2022-10-23 at 18.14.59.png" /><br/>

comme indiqué on va devoir créer notre base de donnée pour ce faire...

## Installation 

### Base de donnée
1. Sur mon application MAMP je clique sur WebStart <img alt="Trouver WebStart sur MAMP" src="./.screenshots/Screenshot 2022-10-23 at 18.18.05.png" />
2. Sur la page qui devrait s'ouvrire je vais dans "Tools/phpMyAdmin" <img alt="Cliquer sur phpMyAdmin" src="./.screenshots/Screenshot 2022-10-23 at 18.17.52.png" />
3. Sur la page qui vient de s'ouvrire je cherche en haut a gauche "New" <img alt="Create DataBase" src="./.screenshots/Screenshot 2022-10-23 at 18.22.49.png" />
4. Je crée donc un nom pour ma base `mabaseamoi`, on oublie pas de cliquer sur "Create" (sinon ça ne marche pas) <br/><img alt="Nom de ma base de donnée" src="./.screenshots/Screenshot 2022-10-23 at 18.24.56.png" />
5. Voila on devrait avoir ça l'écran <img alt="Final database" src="./.screenshots/Screenshot 2022-10-23 at 18.27.29.png" />
6. On ne touche plus a rien pour cet écran 

De retour sur notre WordPress (pour moi [http://localhost:8888/test-wordpress/wp-admin/setup-config.php?step=1&language=fr_BE](http://localhost:8888/test-wordpress/wp-admin/setup-config.php?step=1&language=fr_BE) ) on va pouvoir renseigner nos informations 

<img alt="Info dataBase dans WordPress" src="./.screenshots/Screenshot 2022-10-23 at 18.30.13.png" />

---
**NOTE:** 
<details>
<summary>Ou trouver les infos de connection</summary>
pour s'assurer que les informations que je rentre sont les bonne je peux me rendre sur mon MAMP et cliquer sur WebStart sur la page qui s'affiche je peux me rendre dans la section `MySQL`<br/>
<img alt="Info de connections" src="./.screenshots/Screenshot 2022-10-23 at 18.38.56.png" />
</details>

---

un foi nos informations remplie je clique sur "Envoyer" j'arrive sur un nouvel écran je confirme encore une foi j'arrive ici <br/>
<img alt="Configuration de mon application" src="./.screenshots/Screenshot 2022-10-23 at 18.43.22.png" />

je remplis ce qu'on me demande de remplir (je prends évidement soins de ne pas oublier ni mon identifiant ni mon mot de passe) voila ce que j'ai pour ma part<br>
<img alt="Remplissage des donnée pour notre site" src="./.screenshots/Screenshot 2022-10-23 at 18.47.36.png" /><br />
Je clique évidemennt sur "Installer WordPress", j'arrive ici:<br />
<img alt="What a success..." src="./.screenshots/Screenshot 2022-10-23 at 18.48.55.png" /><br/>
je choisi de me connecter (c'est mieux...), j'arrive ici:<br />
<img alt="Connection a WordPress" src="./.screenshots/Screenshot 2022-10-23 at 18.49.15.png" /><br/>
je me connecte (oui oui l'identifiant et le mot de passe qu'il ne fallait pas oublier c'est maintenant), j'arrive ici:<br/>
<img alt="Welcome wur WordPress" src="./.screenshots/Screenshot 2022-10-23 at 18.49.31.png" />

on peut retourner sur notre `phpMyAdmin` qu'on avait laissé de coté et recharger la page je me retrouve avec ça sur mon écran<br/>
<img alt="phpMyAdmin ftw" src="./.screenshots/Screenshot 2022-10-23 at 18.49.47.png" />
