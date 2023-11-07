# Installation Locale du Thème WordPress avec MAMP

Suivez ces étapes pour installer le thème WordPress `demo--06-november` sur votre installation locale gérée par MAMP.

## Prérequis

- Avoir MAMP installé et en cours d'exécution sur votre machine locale.
- Une installation WordPress en local via MAMP.
- Le dossier du thème `demo--06-november`.

## Installation du Thème en Local

1. **Lancement de MAMP**  
   Ouvrez MAMP et démarrez les serveurs. Assurez-vous que les serveurs Apache et MySQL sont en cours d'exécution.

2. **Accès au Répertoire de WordPress**  
   Localisez le dossier où votre site WordPress est installé en local. Si vous n'avez pas changé le chemin par défaut, il se trouve dans `/Applications/MAMP/htdocs/` si vous êtes sur MacOS ou `C:\MAMP\htdocs` si vous êtes sur Windows.

3. **Accès au Répertoire des Thèmes**  
   Dans le dossier de votre site WordPress, naviguez vers `wp-content/themes/`.

4. **Copie du Thème**  
   Copiez le dossier `demo--06-november` dans le répertoire `themes`.

## Activation du Thème

1. **Accès au Tableau de Bord WordPress**  
   Ouvrez votre navigateur et allez à l'adresse de votre site local, généralement `http://localhost:8888/nom_de_votre_site`, pour rappel vous pouvez vérifier ça dans l'application MAMP dans `préférences -> ports`.
   
2. **Connexion au Tableau de Bord**  
   Connectez-vous en utilisant vos identifiants administrateur.

3. **Activation du Thème**  
   Dans la barre latérale gauche, cliquez sur `Apparence` puis sur `Thèmes`. Vous devriez voir le thème `demo--06-november`. Survolez-le et cliquez sur `Activer`.

## Vérification de l'Installation

Une fois le thème activé :

- **Vérifiez le Front-End**  
   Naviguez sur le front-end de votre site WordPress local pour voir le nouveau thème en action.

## Problèmes et Solutions

- **Thème Manquant la Feuille de Style (`style.css`)**  
   Assurez-vous que le dossier `demo--06-november` contient le fichier `style.css` à la racine de celui-ci.

- **Droits de Fichiers en Local**  
   Les problèmes de permissions sont rares en local, mais assurez-vous que votre utilisateur a les droits nécessaires pour lire et écrire dans le dossier du thème.

- **Images et Liens Cassés**  
   Vérifiez que les chemins d'accès aux images et aux fichiers CSS sont correctement définis dans les fichiers du thème.

Si vous rencontrez des difficultés, la documentation de MAMP et celle de WordPress sont de bonnes ressources pour trouver des solutions.

## Conclusion

Vous avez maintenant installé avec succès le thème `demo--06-november` sur votre installation WordPress locale gérée par MAMP. Profitez de cette installation locale pour développer et tester votre site en toute sécurité.
