<?php get_header(); ?>

<?php if (have_posts()): ?>

  <?php while (have_posts()): ?>
    <?php the_post(); ?>
    <h1 class="h1"><?php the_title(); ?></h1>
    <p>
      <?php the_post_thumbnail('large'); ?>
    </p>
    <?php the_content(); ?>
  <?php endwhile; ?>
  
<?php else: ?>
  j'ai pas pas d'article
<?php endif; ?>

<?php get_footer(); ?>

