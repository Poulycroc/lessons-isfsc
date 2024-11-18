<?php
/* Template Name: My about page */
get_header();
?>

<div class="container">
  <h1>Hello, world!</h1>
  <p>Welcome to my custom PHP page on WordPress.</p>
</div>

<div class="container">
  <?php echo do_shortcode(the_content()); ?>
</div>

<?php get_footer(); ?>
