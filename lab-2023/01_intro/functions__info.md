# Explication du code PHP/HTML

## Introduction sur les fonctions

Une fonction est un bloc de code réutilisable. En PHP, une fonction est définie par le mot-clé `function`, suivi d'un nom pour cette fonction, puis de parenthèses `()`. Les informations peuvent être passées aux fonctions à travers des paramètres (inclus dans les parenthèses). Les fonctions sont utiles pour :

1. Réduire les répétitions et éviter le code redondant.
2. Augmenter la lisibilité du code.
3. Permettre la modularité et la réutilisabilité du code.

## Fonctions définies

1. **salut($nom)**:
   - Utilité : Cette fonction sert à afficher un message de salutation.
   - Fonctionnement : Elle prend en entrée un nom (par exemple "John") et affiche "Salut John".

2. **moyenne($nbrs)**:
   - Utilité : Calculer la moyenne des nombres d'une liste.
   - Fonctionnement : Utilise les fonctions natives `array_sum` pour obtenir la somme des éléments et `count` pour obtenir le nombre total d'éléments, puis divise la somme par ce nombre.

3. **ageOk($age)**:
   - Utilité : Vérifier si un âge est supérieur à 18.
   - Fonctionnement : Retourne 'OK' si l'âge donné est supérieur à 18, sinon 'NON'.

4. **isNameAndAge($name, $age)**:
   - Utilité : Vérifier si le prénom est 'Jhon' et l'âge est supérieur ou égal à 18.
   - Fonctionnement : Utilise une expression logique pour vérifier les deux conditions et retourne un booléen (`true` ou `false`).

## Affichage

1. Un titre `<h1>` dont la couleur de fond est déterminée par la fonction `isNameAndAge`. Si les conditions sont remplies (prénom 'Jhon' et âge >= 18), le fond sera vert, sinon il sera rouge.
2. Une salutation pour 'John'.
3. La moyenne des nombres [12, 23, 45] affichée.
4. Une vérification pour savoir si l'âge 19 est supérieur à 18 (doit retourner 'OK').

<hr />

## Plus d'info
Différencier une fonction qui utilise `echo` de celle qui utilise `return` est une notion fondamentale en programmation.

### `echo` vs `return`

1. **echo** : Lorsqu'une fonction utilise `echo`, elle affiche directement le résultat sur la sortie (en général, la page web). Elle ne renvoie aucune valeur, et vous ne pouvez pas utiliser la sortie d'une fonction `echo` pour d'autres opérations ou affectations.

2. **return** : Lorsqu'une fonction utilise `return`, elle renvoie une valeur qui peut ensuite être utilisée pour d'autres opérations ou affectations. Elle ne produit aucune sortie visible par elle-même, sauf si vous choisissez de l'afficher.

### Exemple:

Considérez deux fonctions qui calculent la moyenne :

```php
// Fonction qui "echo" la moyenne
function afficherMoyenne($nbrs) {
    $moy = array_sum($nbrs) / count($nbrs);
    echo $moy;
}

// Fonction qui "return" la moyenne
function calculerMoyenne($nbrs) {
    return array_sum($nbrs) / count($nbrs);
}
```

Supposons que vous ayez un tableau de nombres et que vous souhaitiez afficher la moyenne puis ajouter 5 à la moyenne et l'afficher à nouveau :

```php
$notes = [12, 23, 45];

// Utilisation de la fonction "echo"
afficherMoyenne($notes);  // Affichera directement la moyenne, par exemple "26.6666666666667"
echo "\n";  // Pour sauter une ligne

// Utilisation de la fonction "return"
$moyenne = calculerMoyenne($notes);  // La valeur retournée est stockée dans $moyenne
echo $moyenne;  // Affiche la moyenne
echo "\n";  // Pour sauter une ligne
echo $moyenne + 5;  // Affiche la moyenne + 5, par exemple "31.6666666666667"
```

### Conclusion:

- Utilisez `echo` dans une fonction si vous voulez que cette fonction produise une sortie directe.
- Utilisez `return` si vous voulez que la fonction produise une valeur qui peut être utilisée ailleurs dans votre code.
