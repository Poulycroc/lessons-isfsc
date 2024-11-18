<?php get_header(); ?>

<main>
    <div class="container">

    <?php if (have_posts()): ?>

        <?php while(have_posts()): the_post(); ?>

            <h1><?php the_title(); ?></h1>

            <main>
                <article>
                    <?php the_content(); ?>
                </article>
            </main>
            

            <?php echo previous_post_link(); ?> /
            <?php echo next_post_link(); ?>


        <?php endwhile; ?>

    <?php else: ?>
        Pas d'articles
    <?php endif; ?>

    </div>
</main>

<?php get_footer(); ?>