<?php 
get_header(); 
if (have_posts()):
while (have_posts()): the_post();
?>

  <div class="container">
    <h1><?php the_title(); ?></h1>
    <article><?php the_content(); ?></article>
  </div>

<?php endwhile; else: ?>

Pas d'article

<?php 
endif;
get_footer(); 
?>
