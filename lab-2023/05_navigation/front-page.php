<?php get_header(); ?>

<div id="primary" class="content-area">
    <main id="main" class="site-main">

        <!-- Section pour les 3 derniers articles -->
        <section>
          <div class="container">
            <h2>Derniers Articles</h2>
            <?php
              $recent_posts_query = new WP_Query(array(
                  'posts_per_page' => 3,
                  'post_type' => 'post'
              ));
              if ($recent_posts_query->have_posts()) :
                  while ($recent_posts_query->have_posts()) : $recent_posts_query->the_post();
                      ?>
                      <div class="card">
                        <div class="card-body">
                          <article  <?php post_class(); ?>>
                              <header class="entry-header">
                                  <?php the_title(); ?>
                              </header>
                              <div class="entry-content">
                                  <?php the_excerpt(); ?>
                              </div>
                          </article>
                        </div>
                      </div>
                      <?php
                  endwhile;
              endif;
            ?>

            <a href="<?php echo get_permalink( get_page_by_path( 'articles' ) ); ?>">
              Voir tous les articles
            </a>
          <div>
        </section>

        <!-- Section FAQ -->
        <section class="mt-4">
          <div class="container">
            <h2>FAQ</h2>
            <div class="accordion" id="accordionExample">
              <?php
                $faq_posts_query = new WP_Query(array(
                    'post_type' => 'faqs',
                    'posts_per_page' => -1  // Affiche tous les posts de FAQ
                ));
                if ($faq_posts_query->have_posts()) :
                $i = 0;
                while ($faq_posts_query->have_posts()) : $faq_posts_query->the_post();
              ?>
                  <div class="accordion-item">
                    <h2 class="accordion-header">
                      <button 
                        class="accordion-button" 
                        type="button" 
                        data-bs-toggle="collapse" 
                        data-bs-target="#faq_<?php echo $i; ?>" 
                        aria-expanded="<?php echo $i === 1 ? 'true' : 'false' ?>" 
                        aria-controls="faq_<?php echo $i; ?>"
                      >
                        <?php the_title(); ?>
                      </button>
                    </h2>
                    <div 
                      id="faq_<?php echo $i; ?>" 
                      class="accordion-collapse collapse show" 
                      data-bs-parent="#accordionExample"
                    >
                      <div class="accordion-body"><?php the_content(); ?></div>
                    </div>
                  </div>
              <?php $i++; ?>
              <?php endwhile; endif; ?>
          </div>
        </section>

    </main><!-- #main -->
</div><!-- #primary -->

<?php get_footer(); ?>
