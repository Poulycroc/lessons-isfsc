<?php
$skills = [
    'Frameworks et CMS : Bootstrap, jQuery, Wordpress',
    'Conception d\'Interfaces Utilisateur (UI)',
    'Méthodologies Agile (Scrum)',
];
?>
<h3>Compétence<?= count($skills) > 1 ? 's' : '' ?></h3>
<ul>
    <?php foreach ($skills as $skill): ?>
        <li><?= $skill; ?></li>
        <li><?php echo $skill; ?></li>
    <?php endforeach; ?>
</ul>
