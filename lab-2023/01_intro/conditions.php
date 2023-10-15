<?php 
// Définir une variable pour l'âge
$age = 17;
?>
<html>
  <style>
    /* Style pour un fond rouge */
    .red {
      background-color: red;
    }
    /* Style pour un fond jaune */
    .yellow {
      background-color: yellow;
    }
    /* Style pour une couleur de texte verte */
    .font-color {
      color: green;
    }
  </style>
  <body 
    <?php // Appliquer une couleur de fond selon l'âge ?>
    class="font-color <?php if ($age >= 18) {echo 'red';} else { echo 'yellow'; }?>"
  >
    <?php 
      // Afficher un message différent selon l'âge
      if ($age >= 18) { 
    ?>

        <h1>ok</h1>
      <?php 
        } else { 
      ?>
        <h1>NON</h1>

    <?php } ?>
  </body>
</html>
