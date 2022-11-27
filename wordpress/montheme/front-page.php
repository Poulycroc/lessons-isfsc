<?php get_header(); ?>

<?php while (have_posts()):  ?>
  <?php the_post(); ?>
  
  <h1><?php the_title(); ?></h1>

  <?php the_content(); ?>

  <a href="<?php echo get_post_type_archive_link('post') ?>">
    Voir les dernières actus
  </a>
<?php 
  $i++;
  endwhile; 
?>

<?php get_footer(); ?>

