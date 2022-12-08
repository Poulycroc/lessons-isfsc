<!DOCTYPE html>
<?php get_header(); ?>

  <main>
    <section 
      class="hero" 
      id="home" 
      style="background-image: url(<?php echo get_template_directory_uri() .'/'. get_option('header-hero_background-url'); ?>);"
    >
      <header>
        <h1 class="visually-hidden"><?php echo bloginfo('name'); ?></h1>
        <p class="h1 text-white">
          <span class="bg-primary"><?php echo get_option('header-hero_main-title'); ?></span><br>
          <small class="bg-secondary"><?php echo get_option('header-hero_under-title'); ?></small>
        </p>
        <a href="#about" class="please-scroll"><?php echo get_option('header-hero_scroll-label'); ?></a>
      </header>
    </section>
    <section class="container section about" id="about">
      <div class="row align-items-center">
        <div class="col-md">
          <?php $aboutSection = get_page_by_title('about'); ?>
          <header>
            <h2 class="mb-3"><?php 
              // echo $aboutSection->post_title; 
              echo get_post_meta($aboutSection->ID, '_wporg_meta_key')[0];
            ?></h2>
          </header>
          <p class="lead"><?php echo $aboutSection->post_content; ?></p>
        </div>
        <div class="col-md">
          <img class="img-fluid" src="<?php echo get_the_post_thumbnail_url($aboutSection->ID, 'medium'); ?>" alt="cordonnier au travail">
        </div>
      </div>
    </section>
    <section class="container section services" id="services">
      <header>
        <h2 class="text-center mb-3">Nos services</h2>
      </header>
      <?php
        $services = new WP_Query([
          'post_type' => 'services',
          'post_status' => 'publish',
          'limit' => 3,
          'orderby' => 'date',
          'date' => true
        ]);

        if ($services->have_posts()):
      ?>
        <div class="row">
          <?php while ($services->have_posts()): $services->the_post(); ?>
            <div class="col-sm">
              <div class="card">
                <img 
                  src="<?php the_post_thumbnail_url(); ?>"
                  class="card-img-top"
                  alt="<?php the_title() ?> | service | <?php echo bloginfo('name'); ?>"
                >
                <div class="card-body">
                  <h3 class="card-title h5"><?php the_title(); ?></h3>
                  <p class="card-text"><?php the_content(); ?></p>
                </div><!-- end .card-body -->
              </div><!-- end .card -->
            </div><!-- end .col-sm -->
          <?php endwhile; ?>
        </div><!-- end .row -->
      <?php else: ?>
        <h5>On a pas encore de services a vous proposer mais ça arrive !</h5>
      <?php endif; ?>
    </section>

    <div class="container section contact" id="contact">
      <header>
        <h2 class="text-center mb-3">Contactez-nous</h2>
      </header>
      <div class="row">
        <?php
          $contactPage = get_page_by_title( 'contact' ); // je récupère la page contact
          echo apply_filters('the_content', $contactPage->post_content); // j'affiche le contenu qui vient de la page contact
        ?>
        <!-- <form action="#" class="col-md">
          <p class="form-group">
            <label for="name">Votre nom et prénom</label>
            <input name="name" id="name" type="text" class="form-control">
          </p>
          <p class="form-group">
            <label for="subject">Sujet</label>
            <select name="subject" id="subject" class="form-control">
              <option value="0">Choisissez un sujet</option>
              <option value="devis">Demande de devis</option>
              <option value="question">Question</option>
              <option value="other">Autres</option>
            </select>
          </p>
          <p class="form-group">
            <label for="message">Votre message</label>
            <textarea name="message" id="message" class="form-control" rows="5"></textarea>
          </p>
          <p class="text-right">
            <button class="btn btn-primary">Envoyer</button>
          </p>
        </form> -->
      </div>
    </div>
  </main>

<?php get_footer(); ?>
