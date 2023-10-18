# PHP

[Voir Github version](https://github.com/Poulycroc/lessons-isfsc/blob/master/courses/01__php.md)

## Les variables

[PHP net](https://www.php.net/manual/fr/language.variables.basics.php)


#### Qu'est-ce que c'est ?
Une variable est un conteneur servant à stocker des informations de manière temporaire, comme une chaîne de caractères (un texte) ou un nombre par exemple.

Le propre d’une variable est de pouvoir varier, c’est-à-dire de pouvoir stocker différentes valeurs au fil du temps.

En PHP, les variables ne servent à stocker une information que temporairement. Plus précisément, une variable ne va exister que durant le temps de l’exécution du script l’utilisant.

#### Validité des noms de variables
```php
<?php
  $var = 'Jean';
  $Var = 'Paul';
  echo "$var, $Var";          // affiche "Jean, Paul"

  // $4site = 'pas encore';      // invalide : commence par un nombre
  $_4site = 'pas encore';     // valide : commence par un souligné
  $täyte = 'mansikka';        // valide : 'ä' est ASCII (étendu) 228.
?>
```
> [!IMPORTANT]  
> Le nom d'une variable en *PHP* commence toujours par le symbole du dollar (`$`). Il ne peut pas commencer par un nombre.

## Les tableaux

[PHP net](https://www.php.net/manual/fr/language.types.array.php#:~:text=Un%20tableau%20en%20PHP%20est,d'attente%20et%20probablement%20plus.)


#### Qu'est-ce que c'est ?
Un tableau en PHP est en fait une carte ordonnée. Une carte est un type qui associe des valeurs à des clés. Ce type est optimisé pour différentes utilisations ; il peut être considéré comme un tableau, une liste, une table de hachage, un dictionnaire, une collection, une pile, une file d'attente et probablement plus.

#### Déclaration et initialisation de tableaux
```php
<?php
  // Déclaration d'un tableau vide
  $fruits = []; // nouvelle manière d'écrire un tableau
  $fruits = array(); // ancienne manière
 
  // Déclaration d'un tableau indexé numériquement
  $legumes = ['carotte', 'poivron', 'aubergine', 'chou'];
 
  // Déclaration d'un tableau associatif
  $identite = [
      'nom' => 'Hamon', 
      'prenom' => 'Hugo', 
      'age' => 19, 
      'estEtudiant' => true
  ];
?>
```
> [!IMPORTANT]  
> Un tableau peut être déclaré de deux manières différentes en PHP : avec les crochets [] ou avec la fonction array(). Les deux sont correctes, mais la première est plus récente et généralement plus utilisée.


#### Ajout d'une nouvelle entrée dans un tableau
```php
<?php
  // Ajout d'un légume au tableu indexé numériquement
  $legumes[] = 'salade';
 
  // Ajout de la taille de la personne dans le tableau associatif
  $identite['taille'] = 180;
  

  // Ajout de légumes au tableu 
  $legumes[12] = 'endive';
  $legumes[20] = 'piment';
?>
```
> [!IMPORTANT]  
> Vous pouvez ajouter de nouveaux éléments à un tableau existant en utilisant la syntaxe `$tableau[] = 'nouvelle valeur';`. Si le tableau est numérique, l'index du nouvel élément sera automatiquement défini comme le dernier index du tableau +1.

#### Récupération de données

##### Tableau non indéexé
```php
<?php
  // Déclaration d'un tableau indexé numériquement
  $legumes = ['carotte', 'poivron', 'aubergine', 'chou'];
  // Ajout d'un légume au tableu
  $legumes[] = 'salade';
  
  echo $legumes[2]; // retourne 'aubergine'
?>
```
##### Tableau associatif
```php
<?php
  $identite = [
      'nom' => 'Hamon', 
      'prenom' => 'Hugo', 
      'age' => 19, 
      'estEtudiant' => true
  ];

  echo $identite['prenom']; // retourne 'Hugo'
?>
```
> [!IMPORTANT]  
> Dans un tableau associatif, on utilise le nom de la clé pour accéder à la valeur correspondante.

##### Tableau multidimensionnels
```php
<?php
  $matrice = [
    ['X','O','X'],
    ['X','X','O'],
    ['X','O','O']
  ];

  echo $matrice[1][1]; // retourne 'X'
?>
```
> [!IMPORTANT]  
> Un tableau multidimensionnel est un tableau qui contient un ou plusieurs tableaux. Pour accéder à une valeur, on doit spécifier tous les indices.

#### Parcours d'un tableau
```php
<?php
// Affichage des valeurs d'un tableau
foreach($leTableau as $valeur) {  
  echo $valeur ,'<br/>';
}

// Affichage des couples clé / valeur
foreach($leTableau as $cle => $valeur) {
  echo $cle ,' : ', $valeur ,'<br/>';
}
?>
```
Cette structure prend en paramètre le nom du tableau à parcourir puis les données qu'il faut récupérer (valeurs uniquement ou bien valeurs et clés). Dans la première syntaxe, la valeur de l'élément courant du tableau est directement assignée à la variable $valeur. Dans la seconde, la clé courante de l'élément du tableau est affectée à la variable $cle et sa valeur stockée dans la variable $valeur.

### Quelques exemples de boucles:

#### Boucle `for` :

```php
<?php
for ($i = 0; $i < 5; $i++) {
    echo $i . '<br />';
}
?>
```

Ce code affichera les nombres de 0 à 4.

#### Boucle `while` :

```php
<?php
$i = 0;
while ($i < 5) {
    echo $i . '<br />';
    $i++;
}
?>
```

Ce code produira également les nombres de 0 à 4.

#### Boucle à 2 dimensions avec une liste HTML :

```php
<?php
$categories = [
    'Fruits' => ['Pomme', 'Banane', 'Cerise'],
    'Légumes' => ['Carotte', 'Brocoli']
];

echo '<ul>';
foreach ($categories as $categorie => $items) {
    echo '<li>' . $categorie;
    echo '<ul>';
    foreach ($items as $item) {
        echo '<li>' . $item . '</li>';
    }
    echo '</ul>';
    echo '</li>';
}
echo '</ul>';
?>
```

Ce code produira une liste à deux niveaux affichant des catégories (Fruits et Légumes) et les items correspondants.

> **Exercice**
> Créez un tableau associatif contenant votre nom, prénom et âge. Utilisez une boucle foreach pour > afficher toutes les valeurs.

##### Parcours d'un tableau à indexes numériques contigus avec une boucle `for()`
```php
<?php 
 
  // `sizeof()` Calcul de la taille du tableau $tailleLegumes
  // on peut utiliser `count()`
  $tailleLegumes = sizeof($legumes);
 
  // Parcours du tableau
  for($i=0; $i<$tailleLegumes; $i++)
  {
    echo $legumes[ $i ] ,'<br/>';  
  }
?>
```

##### Affichage du contenu d'un tableau
```php
<?php
  echo '<pre>';
  print_r($identite);
  echo '</pre>';
?>
```
-> retourne 
```html
Array  
(  
    [nom] => Hamon  
    [prenom] => Hugo  
    [age] => 19  
    [estEtudiant] => 1  
    [taille] => 180  
) 
```
La fonction `print_r()` permet d'afficher de manière lisible pour une ressource humaine, information sur une variable, y compris ses valeurs privées, statiques et protégées en cas d'objets. 

Le tag HTML `<pre>` préserve les espaces et les sauts de ligne qui sont présents dans le texte. 

## Les conditions

[PHP net](https://www.php.net/manual/fr/control-structures.if.php)
[lab - vu en cours](https://github.com/Poulycroc/lessons-isfsc/blob/master/lab-2023/01_intro/conditions.php)

#### Qu'est-ce que c'est ?
Les structures de contrôle sont des éléments du langage qui altèrent le flux d'exécution en fonction de certaines conditions.
```php
if (expression)
  commandes
```

#### Les opérateurs de comparaison
```php
$a == $b   // Égal à. Vrai si $a est égal à $b après conversion de type.
$a === $b  // Identique à. Vrai si $a est égal à $b, et qu'ils sont du même type.
$a != $b   // Non égal à. Vrai si $a n'est pas égal à $b après conversion de type.
$a <> $b   // Non égal à. Vrai si $a n'est pas égal à $b après conversion de type.
$a !== $b  // Non identique à. Vrai si $a n'est pas égal à $b, ou s'ils ne sont pas du même type.
$a < $b    // Inférieur à. Vrai si $a est strictement inférieur à $b.
$a > $b    // Supérieur à. Vrai si $a est strictement supérieur à $b.
$a <= $b   // Inférieur ou égal à. Vrai si $a est inférieur ou égal à $b.
$a >= $b   // Supérieur ou égal à. Vrai si $a est supérieur ou égal à $b.
```

#### Les opérateurs logiques
```php
$a and $b  // And. Vrai si $a et $b sont vrais.
$a or $b   // Or. Vrai si $a ou $b est vrai.
$a xor $b  // Xor. Vrai si soit $a soit $b est vrai, mais pas les deux.
! $a       // Not. Vrai si $a n'est pas vrai.
$a && $b   // And. Vrai si $a et $b sont vrais.
$a || $b   // Or. Vrai si $a ou $b est vrai.
```

#### if - elseif - else ?
```php
<?php
  $a = 5;
  $b = 10;

  if ($a > $b) {
    echo "$a est supérieur à $b";
  } elseif ($a == $b) {
    echo "$a est égal à $b";
  } else {
    echo "$a est inférieur à $b";
  }
?>
```
> **Note**: La structure `if - elseif - else` permet d'exécuter différentes parties du code en fonction de conditions spécifiques. Si la condition `if` est vraie, son bloc de code associé est exécuté. Si elle est fausse, PHP vérifie les conditions `elseif` (si elles existent) dans l'ordre. Si une condition `elseif` est vraie, le bloc de code correspondant est exécuté. Si aucune des conditions `if` ou `elseif` n'est vraie, le bloc de code `else` est exécuté (s'il existe).

Comme nous l'avons vu dans le paragraphe consacré aux expressions, expression est convertie en sa valeur booléenne. Si l'expression vaut true, PHP exécutera l'instruction et si elle vaut false, l'instruction sera ignorée. Plus de détails sur les valeurs qui valent false sont disponibles dans la section [Conversion en booléen](https://www.php.net/manual/fr/language.types.boolean.php#language.types.boolean.casting).

#### switch
```php
<?php
  $note = 15;

  switch ($note) {
    case 0:
      echo "Tu es vraiment nul !";
      break;

    case 5:
      echo "Tu es très mauvais";
      break;

    case 10:
      echo "La moyenne, tu peux mieux faire !";
      break;

    case 15:
      echo "Pas mal !";
      break;

    case 20:
      echo "Parfait !";
      break;

    default:
      echo "Désolé, je n'ai pas de message à afficher pour cette note";
  }
?>
```
> **Note**: La structure switch est similaire à une série de if sur la même expression. Elle sert à comparer une expression à différentes valeurs possibles et à exécuter le bloc de code correspondant. Si aucune valeur ne correspond, le bloc de code default est exécuté (s'il existe).


## Les Fonctions
[PHP net](https://www.php.net/manual/fr/functions.user-defined.php)


#### Qu'est-ce que c'est ?
Une fonction est une portion de code qui réalise une tâche précise et qui peut être appelée à n'importe quel endroit de votre programme, évitant ainsi de réécrire le même code plusieurs fois.

Imaginons qu'une fonction soit comme une petite machine ou un outil dans une usine. Voici comment elle fonctionne schématiquement :

```
          +-------------------------+
Entrée -> |                         | -> Sortie
          |         Fonction        |
Paramètre |                         | Résultat
(s)       |          (Code)         |
          +-------------------------+
                |
                v
           Actions/Logique
```

1. **Entrée/Paramètre(s)** : Ces sont les informations que vous donnez à la fonction pour qu'elle puisse faire son travail. Dans l'exemple de code que vous avez donné précédemment, pour la fonction `salut`, le paramètre est `$nom`.

2. **Fonction (Code)** : C'est ici que toutes les actions et la logique sont effectuées. C'est le cœur de la machine.

3. **Sortie/Résultat** : Une fois que la fonction a traité les paramètres à l'aide de son code, elle produit généralement un résultat. Ce résultat est ce que renvoie la fonction. Pour certaines fonctions, comme `salut`, il n'y a pas de valeur renvoyée mais une action directe (affichage dans ce cas).

4. **Actions/Logique** : C'est la partie du code à l'intérieur de la fonction qui traite l'entrée et produit la sortie. Par exemple, dans la fonction `moyenne`, la logique est de sommer tous les nombres et de diviser par leur nombre total pour obtenir la moyenne.

L'idée principale derrière l'utilisation de fonctions est la modularité et la réutilisabilité. Au lieu d'écrire le même code encore et encore, vous pouvez l'écrire une fois dans une fonction et l'appeler autant de fois que nécessaire.

#### Définition d'une fonction
```php
<?php
  function salut($nom) {
    echo 'Salut ' . $nom;
  }
?>
```
> **Note**: Une fonction est définie avec le mot-clé `function`, suivi du nom de la fonction et d'une paire de parenthèses (). Les arguments de la fonction sont spécifiés dans les parenthèses. Vous pouvez définir autant d'arguments que vous le souhaitez, séparés par des virgules.

#### Appel d'une fonction
```php
<?php
  salut('Hugo');
?>
```
Ce code affichera :
```bash
Salut Hugo
```
> **Note**: Une fois la fonction définie, elle peut être appelée à n'importe quel endroit de votre programme en utilisant son nom suivi d'une paire de parenthèses.

#### Fonctions avec plusieurs arguments
```php
<?php
  function addition($nombre1, $nombre2) {
    $somme = $nombre1 + $nombre2;
    echo 'La somme est ' . $somme;
  }
?>
```
> **Note**: Une fonction peut avoir plusieurs arguments. Il suffit de les séparer par une virgule.

#### Fonction avec valeur de retour
```php
<?php
  function addition($nombre1, $nombre2) {
    $somme = $nombre1 + $nombre2;
    return $somme;
  }

  $resultat = addition(5, 10);
  echo 'La somme est ' . $resultat;
?>
```
> **Note**: Une fonction peut retourner une valeur en utilisant le mot-clé `return`. Cette valeur peut ensuite être utilisée ou stockée dans une variable.
> **Note**: Les fonctions en PHP commencent toujours par le mot-clé function suivi du nom de la fonction. Les instructions de la fonction sont encadrées par des accolades `{` `}`. Pour appeler la fonction, utilisez son nom suivi de parenthèses.

## Utilisation de `require()`

Le mot-clé `require` en PHP est utilisé pour inclure et exécuter un fichier spécifié.

Exemple de base :

dans le fichier `functions.php`
```php
<?php
function addition($a, $b) {
    return $a + $b;
}
```

dans le fichier `principal.php`
```php
<?php
require 'functions.php';

$resultat = addition(5, 10);
echo "Le résultat est : " . $resultat;  // Affiche : Le résultat est : 15
```

Dans cet exemple, nous avons défini une fonction `addition` dans un fichier séparé `functions.php`. Nous utilisons ensuite `require` pour inclure ce fichier dans `principal.php`. Cela nous permet d'utiliser la fonction `addition` comme si elle était définie dans `principal.php`.

> **Note**: Si le fichier spécifié dans `require()` ne peut pas être trouvé, PHP générera une erreur fatale et arrêtera l'exécution du script. Si vous souhaitez que le script continue à s'exécuter même si le fichier n'est pas trouvé, utilisez `include()` à la place de `require()`.
