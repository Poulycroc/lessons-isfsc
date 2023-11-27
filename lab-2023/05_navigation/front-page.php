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
                            <h3><?php the_title(); ?></h3>
                        </header>
                        <div class="entry-content">
                            <?php the_excerpt(); ?>
                        </div>
                    </article>
            
                    <a class="btn btn-primary" href="<?php the_permalink(); ?>">Voir</a>
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
                if ($faq_posts_query->have_posts()):
                $count = 0;
                while ($faq_posts_query->have_posts()): $faq_posts_query->the_post(); $count++;
              ?>
                  <div class="accordion-item">
                    <h2 class="accordion-header">
                      <button 
                        class="accordion-button" 
                        type="button" 
                        data-bs-toggle="collapse" 
                        data-bs-target="#faq_<?= $count; ?>" 
                        aria-controls="faq_<?= $count; ?>"
                        <?php if ($count === 1) { echo "aria-expanded='true'"; } ?>
                      >
                        <?php the_title(); ?>
                      </button>
                    </h2>
                    <div 
                      id="faq_<?= $count; ?>" 
                      class="accordion-collapse collapse show" 
                      data-bs-parent="#accordionExample"
                    >
                      <div class="accordion-body"><?php the_content(); ?></div>
                    </div>
                  </div>
              <?php endwhile; endif; ?>
          </div>
        </section>

    </main><!-- #main -->
</div><!-- #primary -->

<?php get_footer(); ?>
