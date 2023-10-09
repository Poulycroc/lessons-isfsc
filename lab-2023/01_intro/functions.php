<?php
// Cette function affiche un message de 'salutation'
// récupération d'un text et retourne le un 'Salut ' suivi du text introduit
function salut($nom) {
  // impression du message par défaut suivit du text qu'on a ici appelé `$nom`
	echo 'Salut ' . $nom;
}

// function qui calcule une moyenne 
// on entre un tableau de chiffres `$nbrs`
function moyenne($nbrs) {
  // array_sum -> https://www.php.net/manual/en/function.array-sum.php
  // count -> https://www.php.net/manual/en/function.count.php
  // retourne une division des deux valeurs
	return array_sum($nbrs) / count($nbrs);
}

// retourn si un age est 'OK' ou 'NON'
function ageOk($age) {
  // condition -> si `$age` supérieur a `18`
  if ($age > 18) {
    // alors retourner 'OK'
    return 'OK';
  }

  // sinon retourner 'NON'
  return 'NON';
}
?>


<span><?php salut('John'); ?></span>
<br/>
<span><?php echo moyenne([12, 23, 45]); ?></span>
<br/>
<span><?php echo ageOk(19); ?></span>
