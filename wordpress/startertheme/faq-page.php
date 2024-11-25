<?php

/** Template Name: My FAQ Page */
get_header();
?>

<div class="container">
  <h1>Page About</h1>
</div>

<main>
  <div class="container">
    <?php echo do_shortcode(the_content()); ?>
  </div>

  <div class="container">
    <?php
    $faqs = new WP_Query([
      'post_type' => 'faqs',
      'post_status' => 'publish'
    ]);

    if ($faqs->have_posts()) :
      $i = 1;
    ?>
      <div class="accordion" id="accordionExample">
        <?php while ($faqs->have_posts()) : $faqs->the_post(); ?>
          <div class="accordion-item">
            <h2 class="accordion-header">
              <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?= $i; ?>" aria-expanded="true" aria-controls="collapse<?= $i; ?>">
                <?php the_title(); ?><strong><?php echo get_field('prix'); ?></strong>
              </button>
            </h2>
            <div id="collapse<?= $i; ?>" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
              <div class="accordion-body">
                <?php the_content(); ?><br>

                <a href="<?php echo get_field('url_video'); ?>" class="btn" target="_blank">
                  Vidéo
                </a>

                <a href="<?php the_permalink(); ?>" class="btn btn-primary">
                  En savoir plus
                </a>
              </div>
            </div>
          </div>
        <?php
          $i++;
        endwhile;
        ?>
      </div>
    <?php endif; ?>
  </div>
</main>

<
