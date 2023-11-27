<?php
/**
 * The template for displaying Search Results pages.
 */
get_header(); ?>

<section id="primary" class="content-area">
  <div id="content" class="container site-content" role="main">
    <?php if ( have_posts() ) : ?>

      <header class="page-header">
        <h1 class="page-title">
          Résultats pour: <span class="font-weight-light font-italic"><?php echo get_search_query(); ?></span>
        </h1>
      </header><!-- .page-header -->

      <?php while ( have_posts() ): the_post(); ?>
        <div class="card">
          <div class="card-body">
            <h5 class="card-title"><?php the_title(); ?></h5>
            <p class="card-text"><?php the_content(); ?></p>
            <a class="btn btn-primary" href="<?php the_permalink(); ?>">Voir l'article</a>
          </div>
        </div>
      <?php endwhile; ?>
    <?php else : ?>
      pas de résultats
    <?php endif; ?>
  </div><!-- #content .site-content -->
</section><!-- #primary .content-area -->

<?php get_footer(); ?>
