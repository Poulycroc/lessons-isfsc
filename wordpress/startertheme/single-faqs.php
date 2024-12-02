<?php get_header(); ?>

<main>
  <div class="container">

    <?php
    $faqs = new WP_Query([
      'post_type' => 'faqs',
      'post_status' => 'publish'
    ]);
    if (have_posts()) :
    ?>

      <?php while ($faqs->have_posts()) : $faqs->the_post(); ?>

        <h1><?php the_title(); ?></h1>

        <main>
          <article>
            <?php the_content(); ?>
          </article>
        </main>

      <?php endwhile; ?>

    <?php else : ?>
      Pas d'articles
    <?php endif; ?>

  </div>
</main>

<?php get_footer(); ?>
