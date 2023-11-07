<?php get_header(); // Inclut le fichier header.php ?>

<main>
  <div class="container">
    <?php if (have_posts()): // Vérifie si des articles sont disponibles ?>
        <?php while(have_posts()): the_post(); ?>
          <?php if(has_post_thumbnail()): // Si l'article a une image mise en avant ?>
            <div class="post-page-header">
              <?php the_post_thumbnail(); // Affiche l'image mise en avant si elle existe ?>
            </div>
          <?php endif; ?>
          <h1><?php the_title() ?></h1> <!-- Affiche le titre de l'article -->

          <article>
            <p><?php the_content(); // Affiche le contenu de l'article ?></p>
          </article>

          <div class="single-post--footer">
            <span><?php the_date(); // Affiche la date de l'article ?></span>
            <span><b><?php the_author(); // Affiche l'auteur de l'article ?></b></span>
          </div>
        <?php endwhile; ?>
    <?php else: // Si aucun article n'est trouvé ?>
      <h1>L'article n'est pas disponible</h1>
    <?php endif; ?>
  </div>
</main>

<?php get_footer(); // Inclut le fichier footer.php ?>
