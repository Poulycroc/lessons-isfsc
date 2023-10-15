<?php
// Création d'un tableau multidimensionnel contenant les informations des étudiants
$students = [
	[
    	'name' => 'John', // Prénom de l'étudiant
        'lastname' => 'Doe', // Nom de famille de l'étudiant
        'notes' => [13, 20, 14], // Tableau contenant les notes de l'étudiant
    ], 
    [
    	'name' => 'Jean',
        'lastname' => 'DADA',
        'notes' => [14, 0, 2],
    ], 
    [
    	'name' => 'Tom',
        'lastname' => 'OIOIH',
        'notes' => [4, 5, 1],
    ], 
];
?>

<html>
<body>
<ul>
<?php 
  // Boucle sur chaque étudiant
  foreach ($students as $student) { 
    // Calcule de la moyenne des notes pour l'étudiant actuel
    $note = array_sum($student['notes']) / count($student['notes']);
?>
    <li>
      <!-- Affichage du prénom et du nom de l'étudiant -->
      <?php echo $student['name'] .' '.  $student['lastname']; ?>
        <span
         // Changer la couleur de fond selon la moyenne de l'étudiant
         style="background-color:<?php if ($note < 10) {
          echo 'red'; // Si la moyenne est inférieure à 10, la couleur est rouge
         }  else { 
          echo 'green';  // Sinon, la couleur est verte
         } ?>;"
        >
          <!-- 
            Il est possible faire d'afficher des conditions comme ça 
            // background-color:<?= $note < 10) ? 'red' : 'green' ?>;
          --> 

          <!-- Affichage de la moyenne de l'étudiant -->
          <?php echo '(' . $note . ')'; ?>
        </span>
    </li>
<?php } ?>
</ul>
</body>
</html>

