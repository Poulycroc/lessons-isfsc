[Version en ligne](https://github.com/Poulycroc/lessons-isfsc/blob/master/scriptServer/recap.md)

## Exercice 1 

Parmi les variables suivantes, lesquelles ont un nom valide : `$a`, `$_a`, `$a_a`, `$AAA`, `$a!`, `$1a` et `$a1` ?
<details>
<summary>Réponse 1</summary>
Les variables valides sont: `$a`, `$_a`, `$a_a`, `$AAA`, `$a1`.
</details>

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
<details>
<summary>Réponse 2</summary>

```php
<?php
   $note_maths = 15;
   $note_francais = 12;
   $note_histoire_geo = 9;
   $moyenne = ($note_maths + $note_francais + $note_histoire_geo) / 3;
   echo 'La moyenne est de '.$moyenne.' / 20.';
?>
```
</details>

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
<details>
<summary>Réponse 3</summary>

```php
<?php
   $prix_ht = 50;
   $tva = 20;
   $prix_ttc = $prix_ht + ($prix_ht * $tva / 100);
   echo 'Le prix TTC du produit est de '.$prix_ttc.' €.';
?>
```
</details>

## Exercice 4

Déclarer une variable `$test` qui contient la valeur 42. En utilisant la fonction `var_dump()`, faire en sorte que le type de la variable `$test` soit string et que la valeur soit bien de 42
<details>
<summary>Réponse 4</summary>

```php
<?php
   $test = "42";
   var_dump($test);
?>
```
</details>


# LES CONDITIONS (IF, ELSE ET ELSEIF)

## Exercice 5

Déclarer une variable `$sexe` qui contient une chaîne de caractères. Créer une condition qui affiche un message différent en fonction de la valeur de la variable.
<details>
<summary>Réponse 5</summary>

```php
<?php
    $sexe = "homme"; // exemple
    if ($sexe == "homme") {
        echo "C'est un homme.";
    } else {
        echo "C'est une femme.";
    }

    // aussi valable 
    echo "C'est un " . $sexe === 'homme' ? 'homme' : 'femme' . "."
?>
```
</details>

## Exercice 6

Déclarer une variable `$budget` qui contient la somme de 1 553,89 €. Déclarer une variable `$achats` qui contient la somme de 1 554,76 €. Afficher si le budget permet de payer les achats.
<details>
<summary>Réponse 6</summary>

```php
<?php
    $budget = 1553.89;
    $achats = 1554.76;

    if ($budget >= $achats) {
       echo "Le budget permet de payer les achats.";
    } else {
       echo "Le budget ne permet pas de payer les achats.";
    }

// Autre réponse plus avancée

    $total = $budget - $achats;

    if ($total > 0) {
        echo "Il reste $total";
    } elseif ($total == 0) {
       echo "Il n'y a plus de sous";
    } else {
       echo "Achats impossible";
    }
?>

```
</details>


## Exercice 7

Déclarer une variable`$age` qui contient la valeur de type integer de votre choix. Réaliser une condition pour afficher si la personne est mineure ou majeure.
<details>
<summary>Réponse 7</summary>

```php
<?php
   $age = 20; // exemple
   if ($age < 18) {
       echo "La personne est mineure.";
   } else {
       echo "La personne est majeure.";
   }
?>
```
</details>

## Exercice 8

Déclarer une variable `$heure` qui contient la valeur de type integer de votre choix comprise entre 0 et 24. Créer une condition qui affiche un message si l'heure est le matin, l'après-midi ou la nuit.
<details>
<summary>Réponse 8</summary>

```php
<?php
   $heure = 15; // exemple
   if ($heure >= 0 && $heure < 12) {
       echo "C'est le matin.";
   } elseif ($heure >= 12 && $heure < 18) {
       echo "C'est l'après-midi.";
   } else {
       echo "C'est la nuit.";
   }
?>
```
</details>

# LES BOUCLES

## Exercice 9
En utilisant la boucle `while`, afficher tous les codes postaux possibles pour le département 77.
<!-- <details> -->
<!-- <summary>Réponse 9</summary> -->
<!---->
<!-- ```php -->
<!-- <?php -->
<!--    $code_postal = 77000; -->
<!--    while ($code_postal <= 77999) { -->
<!--        echo $code_postal . '<br>'; -->
<!--        $code_postal++; -->
<!--    } -->
<!-- ?> -->
<!-- ``` -->
<!-- </details> -->

## Exercice 10
En utilisant la boucle `for`, afficher la table de multiplication du chiffre 5.
<!-- <details> -->
<!-- <summary>Réponse 10</summary> -->
<!---->
<!-- ```php -->
<!-- <?php -->
<!--    for ($i = 1; $i <= 10; $i++) { -->
<!--        echo '5 x ' . $i . ' = ' . (5 * $i) . '<br>'; -->
<!--    } -->
<!-- ?> -->
<!-- ``` -->
<!-- </details> -->

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
<!-- <details> -->
<!-- <summary>Réponse 11</summary> -->
<!---->
<!-- ```php -->
<!-- <?php -->
<!--    for ($i = 1; $i <= 5; $i++) { -->
<!--        for ($j = 1; $j <= $i; $j++) { -->
<!--            echo $i; -->
<!--        } -->
<!--        echo '<br>'; -->
<!--    } -->
<!-- ?> -->
<!-- ``` -->
<!-- </details> -->

# Les tableaux

## Exercice 12
Déclarer une variable de type array qui stocke les informations suivantes :

<ul>
<li>France : Paris</li>
<li>Allemagne : Berlin</li>
<li>Italie : Rome</li>
</ul>
Afficher les valeurs de tous les éléments du tableau en utilisant la boucle `foreach`.

<!-- <details> -->
<!-- <summary>Réponse 12</summary> -->
<!---->
<!-- ```php -->
<!-- <?php -->
<!--    $pays_capitales = [ -->
<!--        'France' => 'Paris', -->
<!--        'Allemagne' => 'Berlin', -->
<!--        'Italie' => 'Rome' -->
<!--    ]; -->
<!---->
<!--    foreach ($pays_capitales as $pays => $capitale) { -->
<!--        echo $pays . ': ' . $capitale . '<br>'; -->
<!--    } -->
<!-- ?> -->
<!-- ``` -->
<!-- </details> -->

## Exercice 13
En utilisant la fonction `rand()`, remplir un tableau avec 10 nombres aléatoires. Puis, tester si le chiffre 42 est dans le tableau et afficher un message en conséquence. Enfin, afficher le contenu de votre tableau avec `var_dump`.
<!-- <details> -->
<!-- <summary>Réponse 13</summary> -->
<!---->
<!-- ```php -->
<!-- <?php -->
<!--    $nombres = []; -->
<!--    for ($i = 0; $i < 10; $i++) { -->
<!--        $nombres[] = rand(0, 100); -->
<!--    } -->
<!---->
<!--    if (in_array(42, $nombres)) { -->
<!--        echo "Le chiffre 42 est dans le tableau.<br>"; -->
<!--    } else { -->
<!--        echo "Le chiffre 42 n'est pas dans le tableau.<br>"; -->
<!--    } -->
<!---->
<!--    var_dump($nombres); -->
<!-- ?> -->
<!-- ``` -->
<!-- </details> -->

## Exercice 14
En utilisant le tableau ci-dessous, afficher seulement les pays qui ont une population supérieure ou égale à 20 millions d'habitants.

php:
```php
<?php
    $pays_population = [
        'France' => 67595000,
        'Suede' => 9998000,
        'Suisse' => 8417000,
        'Kosovo' => 1820631,
        'Malte' => 434403,
        'Mexique' => 122273500,
        'Allemagne' => 82800000,
    ];
?>
```
<!-- <details> -->
<!-- <summary>Réponse 14</summary> -->
<!---->
<!-- ```php -->
<!-- <?php -->
<!--    foreach ($pays_population as $pays => $population) { -->
<!--        if ($population >= 20000000) { -->
<!--            echo $pays . '<br>'; -->
<!--        } -->
<!--    } -->
<!-- ?> -->
<!-- ``` -->
<!-- </details> -->

## Exercice 15
En utilisant le tableau ci-dessous, compter le nombre d'éléments du tableau.

php:
```php
<?php
    $pays_population = [
        'France' => 67595000,
        'Suede' => 9998000,
        'Suisse' => 8417000,
        'Kosovo' => 1820631,
        'Malte' => 434403,
        'Mexique' => 122273500,
        'Allemagne' => 82800000,
    ];
?>
```
<!-- <details> -->
<!-- <summary>Réponse 15</summary> -->
<!---->
<!-- ```php -->
<!-- <?php -->
<!--    echo 'Il y a ' . count($pays_population) . ' éléments dans le tableau.'; -->
<!-- ?> -->
<!-- ``` -->
<!-- </details> -->

## Exercice 16
Quelle syntaxe permet d'afficher l'âge de Manuel ?

php:
```php
<?php
    $personnes = [
        'Jean' => 16,
        'Manuel' => 19,
        'André' => 66
    ];
?>
```
<!-- <details> -->
<!-- <summary>Réponse 16</summary> -->
<!---->
<!-- ```php -->
<!-- <?php -->
<!--    echo 'L\'âge de Manuel est ' . $personnes['Manuel'] . ' ans.'; -->
<!-- ?> -->
<!-- ``` -->
<!-- </details> -->

## Exercice 17
Quelle syntaxe permet d'afficher le deuxième élément du tableau `$cocktails` ?

php:
```php
<?php
   $cocktails = ['Mojito', 'Long Island Iced Tea', 'Gin Fizz', 'Moscow mule'];
?>
```
<!-- <details> -->
<!-- <summary>Réponse 17</summary> -->
<!---->
<!-- ```php -->
<!-- <?php -->
<!--    echo 'Le deuxième élément du tableau $cocktails est ' . $cocktails[1] . '.'; -->
<!-- ?> -->
<!-- ``` -->
<!-- </details> -->


# BONUS 

## Exercice 18
En utilisant la fonction [`rand()`](https://www.php.net/manual/fr/function.rand.php), remplir un tableau avec 10 nombres aléatoires. Puis, trier les valeurs dans deux tableaux distincts. Le premier contiendra les valeurs inférieures à 50 et le second contiendra les valeurs supérieures ou égales à 50. Enfin, afficher le contenu des deux tableaux.
<!-- <details> -->
<!-- <summary>Réponse 18</summary> -->
<!---->
<!-- ```php -->
<!-- <?php -->
<!--    $nombres = []; -->
<!--    $inferieur_50 = []; -->
<!--    $superieur_50 = []; -->
<!--     -->
<!--    for ($i = 0; $i < 10; $i++) { -->
<!--        $nombre = rand(0, 100); -->
<!--        $nombres[] = $nombre; -->
<!---->
<!--        if ($nombre < 50) { -->
<!--            $inferieur_50[] = $nombre; -->
<!--        } else { -->
<!--            $superieur_50[] = $nombre; -->
<!--        } -->
<!--    } -->
<!--     -->
<!--    echo "Tableau des valeurs inférieures à 50 :<br>"; -->
<!--    var_dump($inferieur_50); -->
<!--     -->
<!--    echo "<br>Tableau des valeurs supérieures ou égales à 50 :<br>"; -->
<!--    var_dump($superieur_50); -->
<!-- ?> -->
<!-- ``` -->
<!-- </details> -->

## Exercices 19
Faire cette liste [d'exos](https://github.com/Poulycroc/lessons-isfsc/tree/master/scriptServer/06__functions)
