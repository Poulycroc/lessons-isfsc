<?php get_header(); ?>

<div class="container">
  <div class="row">
    <?php while(have_posts()): the_post(); ?>
      <div class="col">

        <div class="card" style="width: 18rem;">
          <?php the_post_thumbnail('thumbnail', ['class' => 'card-img-top']); ?>
          <div class="card-body">
            <h5 class="card-title"><?php the_title() ?></h5>
            <p class="card-text"><?php the_content() ?></p>
            <a href="<?php the_permalink(); ?>" class="btn btn-primary">lire l'article</a>
          </div>
        </div>

      </div>
    <?php endwhile; ?>
  </div>
</div>

<?php get_footer(); ?>
