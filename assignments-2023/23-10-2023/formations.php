<?php
$formations = [
    [
        'date' => '2010-2014',
        'info' => 'Je sais plus'
    ],
    [
        'date' => '2010-2014',
        'info' => 'Ecole de la vie'
    ],
];
?>
<?php if (count($formations)) { ?>
    <h3>Formation<?php if (count($formations) > 1) { echo 's'; } ?></h3>
    <ul>
        <?php foreach ($formations as $formation) {
            echo '<li>'. $formation['date'] .' : <b>'. $formation['info'] .'</b></li>';
        } ?>
    </ul>
<?php } ?>
