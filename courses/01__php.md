# PHP

## Les variables

[PHP net](https://www.php.net/manual/fr/language.variables.basics.php)


#### C'est quoi ?
Une variable est un conteneur servant à stocker des informations de manière temporaire, comme une chaine de caractères (un texte) ou un nombre par exemple.

Le propre d’une variable est de pouvoir varier, c’est-à-dire de pouvoir stocker différentes valeurs au fil du temps.

En PHP, les variables ne servent à stocker une information que temporairement. Plus précisément, une variable ne va exister que durant le temps de l’exécution du script l’utilisant.

#### Validité des noms de variables
```php
<?php
  $var = 'Jean';
  $Var = 'Paul';
  echo "$var, $Var";          // affiche "Jean, Paul"

  $4site = 'pas encore';      // invalide : commence par un nombre
  $_4site = 'pas encore';     // valide : commence par un souligné
  $täyte = 'mansikka';        // valide : 'ä' est ASCII (étendu) 228.
?>
```

## Les tableaux

[PHP net](https://www.php.net/manual/fr/language.types.array.php#:~:text=Un%20tableau%20en%20PHP%20est,d'attente%20et%20probablement%20plus.)


#### C'est quoi ?
Un tableau en PHP est en fait une carte ordonnée. Une carte est un type qui associe des valeurs à des clés. Ce type est optimisé pour différentes utilisations ; il peut être considéré comme un tableau, une liste, une table de hachage, un dictionnaire, une collection, une pile, une file d'attente et probablement plus.

#### Déclaration et initialisation de tableaux
```php
<?php
  // Déclaration d'un tableau vide
  $fruits = []; // nouvelle manière d'écrire un tableau
  $fruits = array(); // ancienne manière
 
  // Déclaration d'un tableau indexé numériquement
  $legumes = ['carotte', 'poivron', 'aubergine', 'chou']
 
  // Déclaration d'un tableau associatif
  $identite = [
      'nom' => 'Hamon', 
      'prenom' => 'Hugo', 
      'age' => 19, 
      'estEtudiant' => true
  ];
?>
```
#### Ajout d'une nouvelle entrée dans un tableau
```php
  // Ajout d'un légume au tableu indexé numériquement
  $legumes[] = 'salade';
 
  // Ajout de la taille de la personne dans le tableau associatif
  $identite['taille'] = 180;
  

  // Ajout de légumes au tableu 
  $legumes[12] = 'endive';
  $legumes[20] = 'piment';
<?php
?>
```
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

##### Parcours d'un tableau à indexes numériques contigus avec une boucle `for()`
```php
<?php 
 
  // Calcul de la taille du tableau $legumes
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

## Les conditions

[PHP net](https://www.php.net/manual/fr/control-structures.if.php)


#### C'est quoi ?
L'instruction if est une des plus importantes instructions de tous les langages, PHP inclus. Elle permet l'exécution conditionnelle d'une partie de code. Les fonctionnalités de l'instruction if sont les mêmes en PHP qu'en C :

```
<?php>
if (expression)
  commandes
```
Comme nous l'avons vu dans le paragraphe consacré aux expressions, expression est convertie en sa valeur booléenne. Si l'expression vaut true, PHP exécutera l'instruction et si elle vaut false, l'instruction sera ignorée. Plus de détails sur les valeurs qui valent false sont disponibles dans la section [Conversion en booléen](https://www.php.net/manual/fr/language.types.boolean.php#language.types.boolean.casting).

#### Exemple
```php
<?php
if ($a > $b) {
  echo "a est plus grand que b";
}
?>
```

##### dans un fichier `html`
```php
<?php if (condition): ?>

html code to run if condition is true

<?php else: ?>

html code to run if condition is false

<?php endif ?>
```
##### simplicité === rapidité
```php
<?php
if( $a == 1 || $a == 2 ) {
    if( $b == 3 || $b == 4 ) {
        if( $c == 5 || $ d == 6 ) {
          // faire quelque chose ici
        }
    }
}
?>

// vous pouvez simplement faire ça:

<?php
if( ($a==1 || $a==2) && ($b==3 || $b==4) && ($c==5 || $c==6) ) {
  // faire quelque chose ici
}
?>
```

## Les Fonctions

[PHP net](https://www.php.net/manual/fr/functions.user-defined.php)


#### C'est quoi ?
C'est un bout de code qui pourra être utilisé un peu partout dans votre application


#### Exemple
```php
<?php
function foo($arg_1, $arg_2, /* ..., */ $arg_n)
{
    echo "Exemple de fonction.\n";
    return $retval;
}
?>
```

Tout code PHP, correct syntaxiquement, peut apparaître dans une fonction et dans des définitions de classe.

Les noms de fonctions suivent les mêmes règles que les autres labels en PHP. Un nom de fonction valide commence par une lettre ou un souligné, suivi par un nombre quelconque de lettres, de nombres ou de soulignés. Ces règles peuvent être représentées par l'expression rationnelle suivante : ^[a-zA-Z_\x80-\xff][a-zA-Z0-9_\x80-\xff]*$

#### Comment ça marche

```php
<?php
    $prenom = 'Pierre';
    $x = 4;
    $y = 5;
    
    function bonjour($p){
        echo 'Bonjour ' .$p. '<br>';
    }
    
    function addition($p1, $p2){
        echo $p1. ' + ' .$p2. ' = ' .($p1 + $p2). '<br>';
    }
    
    bonjour($prenom);
    bonjour('Mathilde');
    addition($x, $y);
    addition(1, 1);
?>
```
-> retourne
```html
Bonjour Pierre
Bonjour Mathilde
4 + 5 = 9
1 + 1 = 2
```