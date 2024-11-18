<?php get_header(); ?>

<div class="container">

<h1>Starter Theme</h1>

<div class="row">
    <?php if (have_posts()) { ?>
        <?php while(have_posts()): the_post(); ?>
            <div class="col">
                <div class="card">
                    <?php the_post_thumbnail('medium', [
                        'class' => 'card-img-top',
                        'alt' => 'coucou'
                    ]); ?>
                    <div class="card-body">
                        <h5 class="card-title">
                            <?php the_title(); ?>
                        </h5>
                        <p class="card-text">
                            <?php the_excerpt(); ?>
                        </p>
                        <a
                            href="<?php the_permalink(); ?>"
                            class="btn btn-primary"
                        >
                            Voir plus
                        </a>
                    </div>
                </div>
            </div>
        <?php endwhile; ?>
    <?php } else { ?>
        Pas de recettes 
    <?php } ?>
</div>

</div>

<?php get_footer(); ?>