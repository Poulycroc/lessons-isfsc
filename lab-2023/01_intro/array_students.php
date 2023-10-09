<?php
$students = [
	[
    'name' => 'John',
    'lastname' => 'Doe',
    'note' => 13,
  ], 
  [
    'name' => 'Jean',
    'lastname' => 'DADA',
    'note' => 11,
  ], 
  [
    'name' => 'Tom',
    'lastname' => 'OIOIH',
    'note' => 9,
  ], 
];
?>
<html>
<body>
  <ul>
    <?php foreach ($students as $student) { ?>
      <li>
        <?php echo $student['name'] .' '.  $student['lastname']; ?>
          <span
            style="background-color:<?php if ($student['note'] < 10) {
              echo 'red';
            }  else { 
              echo 'green'; 
            } ?>;"
          >
            <?php echo '(' . $student['note'] . ')'; ?>
          </span>
      </li>
    <?php } ?>
  </ul>
</body>
</html>


<?php
$moyennes = [];
$students = [
[
	'nom' => 'Doe',
    'prenom' => 'John',
    'age' => 23,
    'notes' => [12, 13, 16]
],
[
	'nom' => 'SansNom',
    'prenom' => 'Jean',
    'age' => 30,
    'notes' => [21, 14, 8]
],
[
	'nom' => 'NoName',
    'prenom' => 'Max',
    'age' => 14,
    'notes' => [0, 20, 4]
]
];
?>
<body>
<br><br><br><br><br><br><br><br><br><br>
<br><br><br><br><br><br><br><br><br><br>
<br><br><br><br><br><br><br><br><br><br>
<ul>
<?php 
	foreach($students as $student) { 
    $moyenne = array_sum($student['notes']) / count($student['notes']);
    $moyennes[] = $moyenne;
?>
<li style="<?php if ($moyenne < 10) { 
echo 'background-color: red;'; 
} ?>">
<?php 
echo $student['prenom'] . ' ' . $student['nom']; 
echo ' (' . $student['age'] . 'ans)';
echo ' -> ' . $moyenne;
?>
</li>
<?php } ?>
</ul>

<?php 
$total = array_sum($moyennes) / count($moyennes);
?>
<h2>total: <?php echo $total; ?></h2>
</body>
