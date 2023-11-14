<?php get_header(); ?>

<h1>Curriculum Vitae</h1>
<h2>Thomas Martin</h2>

<img src="assets/img/thomas.jpeg" alt="Thomas Martin">

<h3>Informations Personnelles</h3>
<ul>
<li><strong>Nom :</strong> Martin</li>
<li><strong>Prénom :</strong> Thomas</li>
<li><strong>Date de Naissance :</strong> 15 mars 1992 (31 ans)</li>
<li><address><strong>Adresse :</strong> 456, Avenue Virtuelle, 1000 Bruxelles, Belgique</address></li>
<li><strong>Téléphone :</strong> <a href="tel:+32 2 34 56 78">+32 2 34 56 78</a></li>
<li><strong>Email :</strong> <a href="mailto:thomas.martin@email.com">thomas.martin@email.com</a></li>
</ul>

<?php
    $formationsList = new WP_Query([
        'post_type' => 'formations',
        'posts_per_page' => -1
    ]);
?>
<?php if ($formationsList->have_posts()): ?>
    <h3>Formations</h3>
    <ul>
        <?php while ($formationsList->have_posts()): $formationsList->the_post(); ?>
            <li>
                <?php the_title(); ?>
            </li>
        <?php endwhile; ?>
    </ul>
<?php endif; ?>

<?php
    $experiencesList = new WP_Query([
        'post_type' => 'experiences_pro',
        'posts_per_page' => -1
    ]);

    if ($experiencesList->have_posts()):
?>
    <h3>Expériences Professionnelles</h3>
    <ul>
        <?php while ($experiencesList->have_posts()) : $experiencesList->the_post(); ?>
            <li>
                <strong><?php the_title(); ?></strong>
                <?php the_content(); ?>
            </li>
        <?php endwhile; ?>
    </ul>
<?php endif; ?>

<h3>Compétences</h3>
<?php
    $competencesList = new WP_Query([
        'post_type' => 'competences',
        'posts_per_page' => -1
    ]);
?>
<ul>
    <?php while ($competencesList->have_posts()) : $competencesList->the_post(); ?>
        <li><?php the_title(); ?></li>
    <?php endwhile; ?>
</ul>

<h3>Langues</h3>
<?php
    $languesList = new WP_Query([
        'post_type' => 'langues',
        'posts_per_page' => -1
    ]);
?>
<ul>
    <?php while ($languesList->have_posts()) : $languesList->the_post(); ?>
        <li><?php the_title(); ?></li>
    <?php endwhile; ?>
</ul>

<h3>Centres d'Intérêt</h3>
<?php
    $centres_d_interetList = new WP_Query([
        'post_type' => 'centres_d_interet',
        'posts_per_page' => -1
    ]);
?>
<ul>
    <?php while ($centres_d_interetList->have_posts()) : $centres_d_interetList->the_post(); ?>
        <li><?php the_title(); ?></li>
    <?php endwhile; ?>
</ul>

<?php get_footer(); ?>