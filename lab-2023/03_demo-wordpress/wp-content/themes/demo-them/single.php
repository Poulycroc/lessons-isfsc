
<?php get_header(); ?>

<main>
  <div class="container">
    <?php if (have_posts()): ?>
        <?php while(have_posts()): the_post(); ?>
    
            <?php the_post_thumbnail(); ?><br>
      
            <?php the_title() ?> - <?php the_author(); ?>
        <?php endwhile; ?>
    <?php else: ?>
      <h1>Aucun articles disponible pour le moment</h1>
    <?php endif; ?>
  </div>
</main>


<?php get_footer(); ?>
