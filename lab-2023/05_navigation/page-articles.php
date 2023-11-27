<?php /* Template Name: Articles Page */ ?>
<?php get_header(); ?>

<div class="container">
  <div class="row">
    <?php 
      $articlesList = new WP_Query([
          'posts_per_page' => -1,
          'post_type' => 'post'
      ]);
      $counter = 0;

      while ($articlesList->have_posts()): $articlesList->the_post();
      $counter++;
    ?>
      <div class="col">

        <div class="card">
          <?php the_post_thumbnail('thumbnail', ['class' => 'card-img-top']); ?>
          <div class="card-body">
            <h5 class="card-title"><?php the_title() ?></h5>
            <p class="card-text"><?php the_content() ?></p>
            <a href="<?php the_permalink(); ?>" class="btn btn-primary">lire l'article</a>
          </div>
        </div>

      </div>
      <?php 
        if ($counter % 3 == 0 && $articlesList->current_post + 1 < $articlesList->post_count) {
            echo '</div><div class="row">';
        }
      ?>
    <?php endwhile; ?>
  </div>
</div>

<?php get_footer(); ?>
