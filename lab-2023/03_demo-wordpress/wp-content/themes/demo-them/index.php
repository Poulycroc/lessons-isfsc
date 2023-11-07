<?php get_header(); // Inclut le fichier header.php ?>

<main>
  <div class="container">
    <?php if (have_posts()): // Vérifie si des articles sont disponibles ?>
      <h1>Mes articles</h1>
      <ul class="articles--list">
        <?php while(have_posts()): the_post(); // Boucle à travers les articles ?>
          <li class="articles--list-item">
            <div class="thumb-holder">
              <?php if(has_post_thumbnail()): // Si l'article a une image mise en avant ?>
                <?php the_post_thumbnail('thumbnail'); // Affiche l'image mise en avant ?>
              <?php endif; ?>
            </div>

            <div class="content">
              <h3><?php the_title(); ?></h3>
              <article>
                <p><?php the_excerpt(); ?></p>
              </article>
              
              <div class="content--footer">
                <small>Write by: <b><?php the_author(); ?></b> (<?php the_date(); ?>)</small>
                <a href="<?php the_permalink(); ?>">lire l'article</a>
              </div>
            </div>
          </li>
        <?php endwhile; ?>
      </ul>
    <?php else: // si pas d'articles ?>
      <h1>Aucun articles disponible pour le moment</h1>
    <?php endif; ?>
  </div>
</main>

<?php get_footer(); // Inclut le fichier footer.php ?>
