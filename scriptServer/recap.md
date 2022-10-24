## Exercice 1 

Parmi les variables suivantes, lesquelles ont un nom valide : `$a`, `$_a`, `$a_a`, `$AAA`, `$a!`, `$1a` et `$a1` ?


## Exercice 2

Modifier le code ci-dessous pour calculer la moyenne des notes.
```php
<?php
   $note_maths = 15;
   $note_francais = 12;
   $note_histoire_geo = 9;
   $moyenne = 0;
   echo 'La moyenne est de '.$moyenne.' / 20.';
?>
```

## Exercice 3

Calculer le prix TTC du produit.
```php
<?php
   $prix_ht = 50;
   $tva = 20;
   $prix_ttc = 0;
   echo 'Le prix TTC du produit est de '.$prix_ttc.' €.';
?>
```

## Exercice 4

Déclarer une variable `$test` qui contient la valeur 42. En utilisant la fonction `var_dump()`, faire en sorte que le type de la variable `$test` soit string et que la valeur soit bien de 42


# LES CONDITIONS (IF, ELSE ET ELSEIF)

## Exercice 5

Déclarer une variable `$sexe` qui contient une chaîne de caractères. Créer une condition qui affiche un message différent en fonction de la valeur de la variable.

## Exercice 6

Déclarer une variable `$budget` qui contient la somme de 1 553,89 €. Déclarer une variable `$achats` qui contient la somme de 1 554,76 €. Afficher si le budget permet de payer les achats.

## Exercice 7

Déclarer une variable`$age` qui contient la valeur de type integer de votre choix. Réaliser une condition pour afficher si la personne est mineure ou majeure.

## Exercice 8

Déclarer une variable `$heure` qui contient la valeur de type integer de votre choix comprise entre 0 et 24. Créer une condition qui affiche un message si l'heure est le matin, l'après-midi ou la nuit.


# LES BOUCLES

## Exercice 9
En utilisant la boucle `while`, afficher tous les codes postaux possibles pour le département 77.

## Exercice 10
En utilisant la boucle `for`, afficher la table de multiplication du chiffre 5.

## Exercice 11
En utilisant deux boucles `for`, écrire un script qui produit le résultat ci-dessous.

résultat: 
```bash
1
22
333
4444
55555
```

# Les tableaux

## Exercice 13
Déclarer une variable de type array qui stocke les informations suivantes :

<ul>
<li>France : Paris</li>
<li>Allemagne : Berlin</li>
<li>Italie : Rome</li>
</ul>
Afficher les valeurs de tous les éléments du tableau en utilisant la boucle `foreach`.

## Exercice 14
En utilisant la fonction `rand()`, remplir un tableau avec 10 nombres aléatoires. Puis, tester si le chiffre 42 est dans le tableau et afficher un message en conséquence. Enfin, afficher le contenu de votre tableau avec `var_dump`.

## Exercice 15
En utilisant le tableau ci-dessous, afficher seulement les pays qui ont une population supérieure ou égale à 20 millions d'habitants.

php:
```php
<?php
   $pays_population = array(
      'France' => 67595000,
      'Suede' => 9998000,
      'Suisse' => 8417000,
      'Kosovo' => 1820631,
      'Malte' => 434403,
      'Mexique' => 122273500,
      'Allemagne' => 82800000,
   );
?>
```

## Exercice 16
En utilisant le tableau ci-dessous, compter le nombre d'éléments du tableau.

php:
```php
<?php
   $pays_population = array(
      'France' => 67595000,
      'Suede' => 9998000,
      'Suisse' => 8417000,
      'Kosovo' => 1820631,
      'Malte' => 434403,
      'Mexique' => 122273500,
      'Allemagne' => 82800000,
   );
?>
```

## Exercice 17
Quelle syntaxe permet d'afficher l'âge de Manuel ?

php:
```php
<?php
   $personnes = array(
      'Jean' => 16,
      'Manuel' => 19,
      'André' => 66
   );
?>
```

## Exercice 18
Quelle syntaxe permet d'afficher le deuxième élément du tableau `$cocktails` ?

php:
```php
<?php
   $cocktails = array('Mojito', 'Long Island Iced Tea', 'Gin Fizz', 'Moscow mule');
?>
```

## Exercice 19
En utilisant la fonction `rand()`, remplir un tableau avec 10 nombres aléatoires. Puis, trier les valeurs dans deux tableaux distincts. Le premier contiendra les valeurs inférieures à 50 et le second contiendra les valeurs supérieures ou égales à 50. Enfin, afficher le contenu des deux tableaux.

# BONUS 

## Exercices 20 
Faire cette liste [d'exos](https://github.com/Poulycroc/lessons-isfsc/tree/master/scriptServer/06__functions)