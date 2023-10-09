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
