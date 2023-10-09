<?php
function salut($nom) {
	echo 'Salut ' . $nom;
}

function moyenne($nbrs) {
	return array_sum($nbrs) / count($nbrs);
}

function ageOk($age) {
	if ($age > 18) {
    	return 'OK';
    }
    return 'NON';
}
?>


<span><?php salut('John'); ?></span>
<br/>
<span><?php echo moyenne([12, 23, 45]); ?></span>
<br/>
<span><?php echo ageOk(19); ?></span>
