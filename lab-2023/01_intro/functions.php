<?php

// Une fonction pour saluer une personne par son prénom.
function salut($nom) {
    // Concatène le mot 'Salut' avec le prénom donné en paramètre.
    echo 'Salut ' . $nom;
}

// Une fonction pour calculer la moyenne d'une liste de nombres.
function moyenne($nbrs) {
    // `array_sum` additionne tous les éléments d'un tableau.
    // `count` compte le nombre d'éléments dans un tableau.
    // La fonction retourne la somme divisée par le nombre d'éléments.
    return array_sum($nbrs) / count($nbrs);
}

// Une fonction qui vérifie si l'âge est supérieur à 18.
function ageOk($age) {
    if ($age > 18) {
        return 'OK';
    }
    return 'NON';
}

// Une fonction qui vérifie si le prénom est 'Jhon' et l'âge est supérieur ou égal à 18.
function isNameAndAge($name, $age) {
    return ($name === 'Jhon' && $age >= 18);
}

?>

<h1 style="background-color:<?php echo isNameAndAge('Jhon', 19) ? 'green' : 'red' ?>">
  TITRE
</h1>

<span><?php salut('John'); ?></span>
<br/>
<span><?php echo moyenne([12, 23, 45]); ?></span>
<br/>
<span><?php echo ageOk(19); ?></span>

