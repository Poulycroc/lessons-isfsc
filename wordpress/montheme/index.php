<?php get_header(); ?>

<?php if (have_posts()): ?>

  <div class="row">
    <?php while (have_posts()): ?>
      <?php the_post(); ?>
      
      <div class="col-4">
        <div class="card">
          <?php the_post_thumbnail('medium', ['class' => 'card-img-top']); ?>
          <div class="card-body">
            <h5 class="card-title"><?php the_title(); ?></h2></h5>
            <p class="card-text"><?php the_excerpt(); ?></p>
            <a 
              href="<?php the_permalink(); ?>" 
              title="<?php the_title_attribute(); ?>" 
              class="btn btn-primary"
            >
              Lire
            </a>
          </div>
        </div>
      </div><!-- end .col -->
    <?php endwhile; ?>
  </div><!-- end .row -->
  
<?php else: ?>
  j'ai pas pas d'article
<?php endif; ?>

<?php get_footer(); ?>

