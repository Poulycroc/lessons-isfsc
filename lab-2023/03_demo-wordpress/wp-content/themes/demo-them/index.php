<?php get_header(); ?>

<header class="header">
  <a class="logo" href="<?php echo home_url('/'); ?>">
    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo.png" alt="Logo">
    <h1><?php bloginfo('title'); ?></h1>
  </a>
</header>


<main>
  <div class="container">
    <?php if (have_posts()): ?>
      <h1>Mes articles</h1>
      <ul>
        <?php while(have_posts()): the_post(); ?>
          <li>
            <?php the_post_thumbnail(); ?><br>
            <?php the_title() ?> - <?php the_author(); ?>
            <a href="<?php the_permalink(); ?>">lire l'article</a>
          </li>
        <?php endwhile; ?>
      </ul>
    <?php else: ?>
      <h1>Aucun articles disponible pour le moment</h1>
    <?php endif; ?>
  </div>
</main>


<?php get_footer(); ?>
