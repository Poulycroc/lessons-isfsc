<?php
$students = [
	[
    	'name' => 'John',
        'lastname' => 'Doe',
        'notes' => [13, 20, 14],
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
  foreach ($students as $student) { 
    // calcule de la moyenne des notes
    $note = array_sum($student['notes']) / count($student['notes']);
?>
    <li>
      <?php echo $student['name'] .' '.  $student['lastname']; ?>
        <span
         style="background-color:<?php if ($note < 10) {
          echo 'red';
         }  else { 
          echo 'green'; 
         } ?>;"
        >
          <!-- 
          // peu $etre écrit comme ça 
          <span
         style="background-color:<?= $note < 10) ? 'red' : 'green' ?>;"
        >-->
          <?php echo '(' . $note . ')'; ?>
        </span>
    </li>
<?php } ?>
</ul>
</body>
</html>


